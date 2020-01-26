uommentcommentcomment<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function createComment(Request $request) {

      $comment = new Comment;

      $comment->content = $request->content;
      $comment->user_id = $request->user_id;
      $comment->episode_id = $request->episode_id;

      $comment->save();

      return response()->json([$comment]);
    }

    public function listComment() {
  		$comment = Comment::all();
  		return response()->json($comment);
  	}

  	public function showComment($id) {
  		$comment = Comment::findOrFail($id);
  		return response()->json([$comment]);
  	}

    public function updateComment(Request $request, $id) {

  		$comment = Comment::find($id);

  		if($comment) {
  			if($request->content) {
  				$comment->content = $request->content;
  			}
  			if ($request->user_id) {
  				$comment->email = $request->email;
  			}
  			if ($request->episode_id) {
  				$comment->password = $request->password;
  			}

  			$comment->save();

  			return response()->json([$comment]);
  		}
  		else {
  			return response()->json(['Este comentário não existe']);
  		}
  	}

    public function deleteComment($id) {
  		Comment::destroy($id);
  		return response()->json(['Comentário deletado']);
    }

}
