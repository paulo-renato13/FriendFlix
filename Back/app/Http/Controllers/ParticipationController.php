<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participation;

class ParticipationController extends Controller
{
  public function createParticipation(Request $request) {

    $participation = new Participation;

    $participation->user_id = $request->user_id;
    $participation->watch_party_id = $request->watch_party_id;

    $participation->save();

    return response()->json([$participation]);
  }

  public function listParticipation() {
    $participation = Participation::all();
    return response()->json($participation);
  }

  public function showParticipation($id) {
    $participation = Participation::findOrFail($id);
    return response()->json([$participation]);
  }

  public function updateParticipation(Request $request, $id) {

    $participation = Participation::find($id);

    if($participation) {
      if($request->user_id) {
        $participation->user_id = $request->user_id;
      }
      if ($request->watch_party_id) {
        $participation->watch_party_id = $request->watch_party_id;
      }

      $participation->save();

      return response()->json([$participation]);
    }
    else {
      return response()->json(['Esta relação de convite não existe']);
    }
  }

  public function deleteParticipation($id) {
    Participation::destroy($id);
    return response()->json(['Relação de convite deletada']);
  }
}
