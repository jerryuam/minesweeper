<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('players','PlayerController');//Route for player operations
Route::resource('scores','ScoreGameController');//Route for scoregame operations
Route::resource('savedgames','SavedGameController');//Route for savedgame operations

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
