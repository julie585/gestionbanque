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
Route::get('/test',function (Request $request) {
    return "salut";
});
Route::post('/connection','Api\LoginController@login');
Route::post('/solde','Api\ClientController@solde');
Route::post('/releveepargne','Api\ClientController@releveepargne');
Route::post('/relevecourant','Api\ClientController@relevecourant');
Route::get('/info','Api\ClientController@info');

