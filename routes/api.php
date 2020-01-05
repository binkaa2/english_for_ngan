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

Route::group(['prefix' => 'v1'], function () {

    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');
    Route::post('register_via_social', 'API\AuthController@register_via_social');
    
    Route::group(['middleware' => 'auth:api'], function () {
	    Route::get('get_user_via_token', 'API\AuthController@getUserViaToken');
        Route::post('logout-user', 'API\AuthController@logout');
        
    });


});