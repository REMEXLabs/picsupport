<?php namespace App\Http\Controllers;

use App\Rating;
use App\Pikto;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($piktoId)
  {
    $pikto = Pikto::findOrFail($piktoId);
    $rating = $pikto->ratings()->avg('value');
    return response()->json(['rating' => round($rating, 1)]);
  }

  public function directIndex($name)
  {
    $piktoId = Pikto::where('name', $name)->value('id');
    return $this->index($piktoId);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($piktoId)
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $piktoId)
  {

    $rated = $request->session()->get('rated', []);

    if (in_array($piktoId, $rated)) {
      return new Response('', 200);
    }

    $this->validate($request, [
      'rating' => 'required|numeric|integer|between:1,5'
    ]);

    $rating = new Rating([
      'value' => $request->input('rating')
    ]);

    Pikto::findOrFail($piktoId)->ratings()->save($rating);

    array_push($rated, $piktoId);

    $request->session()->put('rated', $rated);

    return new Response('', 201);
  }

  public function directStore(Request $request, $name)
  {
    $piktoId = Pikto::where('name', $name)->value('id');
    return $this->store($request, $piktoId);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($piktoId, $ratingId)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($piktoId, $ratingId)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($piktoId, $ratingId)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($piktoId, $ratingId)
  {

  }

}

?>
