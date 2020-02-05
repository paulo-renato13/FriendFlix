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
Route::get('showPhoto/{id}', 'UserController@showPhoto');

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

Route::get('listFavorite','FavoriteController@listFavorite');
Route::get('showFavorite/{id}','FavoriteController@showFavorite');
Route::post('createFavorite','FavoriteController@createFavorite');
Route::put('updateFavorite/{id}','FavoriteController@updateFavorite');
Route::delete('deleteFavorite/{id}','FavoriteController@deleteFavorite');

Route::get('listFollow','FollowController@listFollow');
Route::get('showFollow/{id}','FollowController@showFollow');
Route::post('createFollow','FollowController@createFollow');
Route::put('updateFollow/{id}','FollowController@updateFollow');
Route::delete('deleteFollow/{id}','FollowController@deleteFollow');

Route::get('listInvitation','InvitationController@listInvitation');
Route::get('showInvitation/{id}','InvitationController@showInvitation');
Route::post('createInvitation','InvitationController@createInvitation');
Route::put('updateInvitation/{id}','InvitationController@updateInvitation');
Route::delete('deleteInvitation/{id}','InvitationController@deleteInvitation');

Route::get('listParticipation','ParticipationController@listParticipation');
Route::get('showParticipation/{id}','ParticipationController@showParticipation');
Route::post('createParticipation','ParticipationController@createParticipation');
Route::put('updateParticipation/{id}','ParticipationController@updateParticipation');
Route::delete('deleteParticipation/{id}','ParticipationController@deleteParticipation');
