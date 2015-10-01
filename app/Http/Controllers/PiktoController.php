<?php namespace App\Http\Controllers;

use App\Pikto;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PiktoRequest;
use Sabre;
use GuzzleHttp;

class PiktoController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $piktos = Auth::user()->piktos()->get();
    return view('piktos.index', ['piktos' => $piktos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('piktos.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(PiktoRequest $request)
  {

    $writer = new Sabre\Xml\Writer();
    $writer->openMemory();

    $props = [
        [ 'name' => 'prop', 'attributes' => [
            'name' => 'http://openurc.org/ns/res#type',
            'val' => 'http://openurc.org/restypes#pictogram'
        ], 'value' => '' ],
        [ 'name' => 'prop', 'attributes' => [
            'name' => 'http://purl.org/dc/elements/1.1/creator',
            'val' => Auth::user()->name
        ], 'value' => '' ],
        [ 'name' => 'prop', 'attributes' => [
            'name' => 'http://purl.org/dc/elements/1.1/publisher',
            'val' => 'http://hdm-stuttgart.de/olb'
        ], 'value' => '' ],
        [ 'name' => 'prop', 'attributes' => [
            'name' => 'http://openurc.org/ns/res#mimeType',
            'val' => $request->file('image')->getMimeType()
        ], 'value' => '' ],
        [ 'name' => 'prop', 'attributes' => [
            'name' => 'http://openurc.org/ns/res#filename',
            'val' => $request->file('image')->getClientOriginalName()
        ], 'value' => '' ],
    ];

    foreach ($request->input('title') as $title) {
        array_push($props, [
            'name' => 'prop',
            'attributes' => [
                'name' => 'http://purl.org/dc/elements/1.1/title',
                'val' => $title['title']
            ],
            'value' => [[
                'name' => 'descriptor',
                'attributes' => [
                    'name' => 'lang',
                    'val' => $title['lang']
                ],
                'value' => ''
            ]]
        ]);
    }

    $base64 = file_get_contents($_FILES['image']['tmp_name']);
    $base64 = base64_encode($base64);

    $data = [
        [ 'name' => 'name', 'value' => $request->file('image')->getClientOriginalName() ],
        [ 'name' => 'data', 'value' => $base64 ],
    ];

    $rights = [
        [ 'name' => 'owner', 'attributes' => [
            'read' => 'true',
            'write' => 'true',
            'query' => 'true',
            'retrieve' => 'true',
        ], 'value' => '' ],
        [ 'name' => 'group', 'attributes' => [
            'query' => 'true',
            'retrieve' => 'true',
        ], 'value' => '' ],
        [ 'name' => 'other', 'attributes' => [
            'query' => 'true',
            'retrieve' => 'true',
        ], 'value' => '' ],
    ];

    $resource = [ 'resource' => [ [
        'name' => 'props',
        'attributes' => [
            'inherit' => 'false',
        ],
        'value' => $props
    ], [
        'name' => 'resourceData',
        'value' => $data
    ], [
        'name' => 'rights',
        'value' => $rights
    ] ] ];

    $writer->startElement('request');

    $writer->write($resource);

    $writer->endElement();

    $xml = $writer->outputMemory();

    $client = new GuzzleHttp\Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://res.openurc.org:9443/'
    ]);

    $response = $client->request('POST', 'upload', [
        'body' => $xml,
        'verify' => false,
        'auth' => [env('RES_MAIL'), env('RES_PASSWORD')]
    ]);

    $code = $response->getStatusCode();
    $body = $response->getBody();

    $reader = new Sabre\Xml\Reader();
    $reader->xml($body);

    $arrayResponse = $reader->parse();

    $uuid = $arrayResponse['value'][0]['attributes']['val'];

    $pikto = new Pikto([
      'title' => $request->input('title.0.title'),
      'name' => $uuid
      ]);

    Auth::user()->piktos()->save($pikto);

    return redirect()->route('pikto.index')->with('success', 'created');

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $pikto = Auth::user()->piktos()->findOrFail($id);
    return view('piktos.show', ['pikto' => $pikto]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $pikto = Auth::user()->piktos()->findOrFail($id);
    return view('piktos.edit', ['pikto' => $pikto]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, PiktoRequest $request)
  {
    $pikto = Auth::user()->piktos()->findOrFail($id);
    $pikto->name = $request->input('title');
    $pikto->save();
    return redirect()->route('pikto.index')->with('success', 'updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $pikto = Auth::user()->piktos()->findOrFail($id)->delete();
    return redirect()->route('pikto.index')->with('success', 'deleted');
  }

}

?>
