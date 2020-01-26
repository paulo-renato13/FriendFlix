<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SerieController extends Controller
{
    public function createSerie(Request $request) {

      $serie = new Serie;

      $serie->name = $request->name;
      $serie->genre = $request->genre;
      $serie->synopsis = $request->synopsis;
      $serie->episodes = $request->episodes;
      $serie->seasons = $request->seasons;

      $serie->save();

      return response()->json([$serie]);
    }

    public function listSerie() {
      $serie = Serie::all();
      return response()->json($serie);
    }

    public function showSerie($id) {
      $serie = Serie::findOrFail($id);
      return response()->json([$serie]);
    }

    public function updateSerie(Request $request, $id) {

  		$serie = Serie::find($id);

  		if($serie) {
  			if($request->name) {
  				$serie->name = $request->name;
  			}
  			if ($request->genre) {
  				$serie->genre = $request->genre;
  			}
  			if ($request->synopsis) {
  				$serie->synopsis = $request->synopsis;
  			}
        if ($request->episodes) {
          $serie->episodes = $request->episodes;
        }
        if ($request->followers) {
          $serie->seasons = $request->seasons;
        }

  			$serie->save();

  			return response()->json([$serie]);
  		}
  		else {
  			return response()->json(['Esta série não existe']);
  		}
  	}

    public function deleteSerie($id) {
  		Serie::destroy($id);
  		return response()->json(['Série deletada']);
    }

}
