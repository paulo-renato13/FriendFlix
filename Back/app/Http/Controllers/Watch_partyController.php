<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watch_party;

class Watch_partyController extends Controller
{
  public function createWatch_party(Request $request) {

    $watch_party = new Watch_party;

    $watch_party->date = $request->date;
    $watch_party->time = $request->time;
    $watch_party->public = $request->public;
    $watch_party->user_id = $request->user_id;
    $watch_party->episode_id = $request->episode_id;

    $watch_party->save();

    return response()->json([$watch_party]);
  }

  public function listWatch_party() {
    $watch_party = Watch_party::all();
    return response()->json($watch_party);
  }

  public function showWatch_party($id) {
    $watch_party = Watch_party::findOrFail($id);
    return response()->json([$watch_party]);
  }

  public function updateWatch_party(Request $request, $id) {

    $watch_party = Watch_party::find($id);

    if($watch_party) {
      if($request->date) {
        $watch_party->date = $request->date;
      }
      if($request->time) {
        $watch_party->time = $request->time;
      }
      if($request->public) {
        $watch_party->public = $request->public;
      }
      if ($request->user_id) {
        $watch_party->user_id = $request->user_id;
      }
      if ($request->episode_id) {
        $watch_party->episode_id = $request->episode_id;
      }

      $watch_party->save();

      return response()->json([$watch_party]);
    }
    else {
      return response()->json(['Esta watch party não existe']);
    }
  }

  public function deleteWatch_party($id) {
    Watch_party::destroy($id);
    return response()->json(['Watch party deletada']);
  }

}
