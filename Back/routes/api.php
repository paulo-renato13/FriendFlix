<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listUser','UserController@listUser');
Route::get('showUser/{id}','UserController@showUser');
Route::post('createUser','UserController@createUser');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');

Route::get('listSerie','SerieController@listSerie');
Route::get('showSerie/{id}','SerieController@showSerie');
Route::post('createSerie','SerieController@createSerie');
Route::put('updateSerie/{id}','SerieController@updateSerie');
Route::delete('deleteSerie/{id}','SerieController@deleteSerie');

Route::get('listEpisode','EpisodeController@listEpisode');
Route::get('showEpisode/{id}','EpisodeController@showEpisode');
Route::post('createEpisode','EpisodeController@createEpisode');
Route::put('updateEpisode/{id}','EpisodeController@updateEpisode');
Route::delete('deleteEpisode/{id}','EpisodeController@deleteEpisode');

Route::get('listComment','CommentController@listComment');
Route::get('showComment/{id}','CommentController@showComment');
Route::post('createComment','CommentController@createComment');
Route::put('updateComment/{id}','CommentController@updateComment');
Route::delete('deleteComment/{id}','CommentController@deleteComment');

Route::get('listWatch_party','Watch_partyController@listWatch_party');
Route::get('showWatch_party/{id}','Watch_partyController@showWatch_party');
Route::post('createWatch_party','Watch_partyController@createWatch_party');
Route::put('updateWatch_party/{id}','Watch_partyController@updateWatch_party');
Route::delete('deleteWatch_party/{id}','Watch_partyController@deleteWatch_party');

Route::group(['middleware'=>'auth:api'], function() {
    Route::post('logout', 'API\PassportController@logout');
    Route::post('getDetails', 'API\PassportController@getDetails')->middleware('admin');
});

Route::post('register','API\PassportController@register');
Route::post('login','API\PassportController@login');
Route::get('is_admin/{id}', 'UserController@is_admin')->middleware('admin');