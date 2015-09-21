<?php namespace App\Http\Controllers;

use App\Pikto;
use Auth;
use Illuminate\Http\Request;

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
  public function store(Request $request)
  {
    $this->validate($request, [
        'uri' => 'required|unique:piktos|max:255'
    ]);

    $pikto = new Pikto(['uri' => $request->input('uri')]);

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
  public function update($id, Request $request)
  {
    $pikto = Auth::user()->piktos()->findOrFail($id);
    $pikto->uri = $request->input('uri');
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
