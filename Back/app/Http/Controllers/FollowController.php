<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;

class FollowController extends Controller
{
  public function createFollow(Request $request) {

    $follow = new Follow;

    $follow->user1_id = $request->user1_id;
    $follow->user2_id = $request->user2_id;

    $follow->save();

    return response()->json([$follow]);
  }

  public function listFollow() {
    $follow = Follow::all();
    return response()->json($follow);
  }

  public function showFollow($id) {
    $follow = Follow::findOrFail($id);
    return response()->json([$follow]);
  }

  public function updateFollow(Request $request, $id) {

    $follow = Follow::find($id);

    if($follow) {
      if($request->user1_id) {
        $follow->user1_id = $request->user1_id;
      }
      if ($request->user2_id) {
        $follow->user2_id = $request->user2_id;
      }

      $follow->save();

      return response()->json([$follow]);
    }
    else {
      return response()->json(['Esta relação de seguir não existe']);
    }
  }

  public function deleteFollow($id) {
    Follow::destroy($id);
    return response()->json(['Relação de seguir deletada']);
  }
}
