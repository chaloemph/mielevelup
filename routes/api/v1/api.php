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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('login', 'api\v1\LoginController@index')->name('login');
Route::post('login', 'api\v1\LoginController@login');
Route::post('register', 'api\v1\UserController@register');

Route::prefix('/user')->group(function(){
    Route::middleware('auth:api')->get('/', 'api\v1\UserController@index');
    Route::middleware('auth:api')->get('/{id}', 'api\v1\UserController@show');
    Route::middleware('auth:api')->put('/{id}', 'api\v1\UserController@update');
   
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::resource('advertisement', 'api\v1\AdvertisementController');
});


Route::resource('photo', 'api\v1\PhotoController');




