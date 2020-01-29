<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function createUser(UserRequest $request) {

    	$user = new User;

		$user->name = $request->name;
		$user->cpf = $request->cpf;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->age = $request->age;
      	$user->followers = $request->followers;
      	$user->comments = $request->comments;

      $user->save();

      return response()->json([$user]);
    }

    public function listUser() {
  		$user = User::all();
  		return response()->json($user);
  	}

  	public function showUser($id) {
  		$user = User::findOrFail($id);
  		return response()->json([$user]);
  	}

    public function updateUser(Request $request, $id) {

  		$user = User::find($id);

  		if($user) {
  			if($request->name) {
  				$user->name = $request->name;
  			}
  			if ($request->email) {
  				$user->email = $request->email;
			  }
			if ($request->cpf) {
				$user->cpf = $request->cpf;
			}
  			if ($request->password) {
  				$user->password = $request->password;
  			}
        if ($request->age) {
          $user->age = $request->age;
        }
        if ($request->followers) {
          $user->followers = $request->followers;
        }
        if ($request->comments) {
          $user->comments = $request->comments;
        }

  			$user->save();

  			return response()->json([$user]);
  		}
  		else {
  			return response()->json(['Este usuário não existe']);
  		}
  	}

    public function deleteUser($id) {
  		User::destroy($id);
  		return response()->json(['Usuário deletado']);
    }

}