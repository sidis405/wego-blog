<?php

use Illuminate\Http\Request;

Route::post('users', '\App\Api\Http\Controllers\RegistrationController@store')->middleware('guest');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('posts', '\App\Api\Http\Controllers\ApiPostsController@index');
});
