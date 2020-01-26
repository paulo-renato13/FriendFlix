<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InvitationController extends Controller
{
  public function createInvitation(Request $request) {

    $invitation = new Invitation;

    $invitation->user_id = $request->user_id;
    $invitation->watch_party_id = $request->watch_party_id;

    $invitation->save();

    return response()->json([$invitation]);
  }

  public function listInvitation() {
    $invitation = Invitation::all();
    return response()->json($invitation);
  }

  public function showInvitation($id) {
    $invitation = Invitation::findOrFail($id);
    return response()->json([$invitation]);
  }

  public function updateInvitation(Request $request, $id) {

    $invitation = Invitation::find($id);

    if($invitation) {
      if($request->user_id) {
        $invitation->user_id = $request->user_id;
      }
      if ($request->watch_party_id) {
        $invitation->watch_party_id = $request->watch_party_id;
      }

      $invitation->save();

      return response()->json([$invitation]);
    }
    else {
      return response()->json(['Esta relação de convite não existe']);
    }
  }

  public function deleteInvitation($id) {
    Invitation::destroy($id);
    return response()->json(['Relação de convite deletada']);
  }
}
