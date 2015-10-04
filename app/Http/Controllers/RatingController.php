<?php namespace App\Http\Controllers;

use App\Rating;
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
    $pikto = Auth::user()->piktos()->findOrFail($piktoId);
    $rating = $pikto->ratings()->avg('value');
    return number_format($rating, 1);
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

    Auth::user()->piktos()->findOrFail($piktoId)->ratings()->save($rating);

    array_push($rated, $piktoId);

    $request->session()->put('rated', $rated);

    return new Response('', 201);
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
