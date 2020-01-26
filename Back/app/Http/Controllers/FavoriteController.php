<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
{
  public function createFavorite(Request $request) {

    $favorite = new Favorite;

    $favorite->user_id = $request->user_id;
    $favorite->serie_id = $request->serie_id;

    $favorite->save();

    return response()->json([$favorite]);
  }

  public function listFavorite() {
    $favorite = Favorite::all();
    return response()->json($favorite);
  }

  public function showFavorite($id) {
    $favorite = Favorite::findOrFail($id);
    return response()->json([$favorite]);
  }

  public function updateFavorite(Request $request, $id) {

    $favorite = Favorite::find($id);

    if($favorite) {
      if($request->user_id) {
        $favorite->user_id = $request->user_id;
      }
      if ($request->serie_id) {
        $favorite->serie_id = $request->serie_id;
      }

      $favorite->save();

      return response()->json([$favorite]);
    }
    else {
      return response()->json(['Esta relação de favorito não existe']);
    }
  }

  public function deleteFavorite($id) {
    Favorite::destroy($id);
    return response()->json(['Relação de favorito deletada']);
  }
}
