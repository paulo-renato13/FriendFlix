<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episode;

class EpisodeController extends Controller
{
  public function createEpisode(Request $request) {

    $episode = new Episode;

    $episode->name = $request->name;
    $episode->description = $request->description;
    $episode->number = $request->number;
    $episode->season = $request->season;
    $episode->serie_id = $request->serie_id;

    $episode->save();

    return response()->json([$episode]);
  }

  public function listEpisode() {
    $episode = Episode::all();
    return response()->json($episode);
  }

  public function showEpisode($id) {
    $episode = Episode::findOrFail($id);
    return response()->json([$episode]);
  }

  public function updateEpisode(Request $request, $id) {

    $episode = Episode::find($id);

    if($episode) {
      if($request->name) {
        $episode->name = $request->name;
      }
      if ($request->description) {
        $episode->description = $request->description;
      }
      if ($request->number) {
        $episode->number = $request->number;
      }
      if ($request->season) {
        $episode->season = $request->season;
      }
      if ($request->serie_id) {
        $episode->serie_id = $request->serie_id;
      }

      $episode->save();

      return response()->json([$episode]);
    }
    else {
      return response()->json(['Este episódio não existe']);
    }
  }

  public function deleteEpisode($id) {
    Episode::destroy($id);
    return response()->json(['Episódio deletado']);
  }

}
