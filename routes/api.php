<?php

use Illuminate\Http\Request;


Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});

Route::apiResource('/products' , 'ProductController');

Route::group(['prefix' => 'products'], function () {

    Route::apiResource('{product}/reviews' , 'ReviewController');
    
});
