<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
   //Route::post('details', 'API\UserController@details');
   Route::resource('users-catalog', UsersController::class);
});

Route::get('search/{search?}', [UsersController::class, 'search']);

// handle non-existing routes
Route::fallback(function(){
   return response()->json([
      'message' => 'Page Not Found. Check your route chosen.'], 404);
});
