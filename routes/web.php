<?php

// Route::get('/', function () {
//     return view('welcome');
// });

// RESOURCE - REST
// index - /posts - GET - lista tutti i post
// create - /posts/create - GET - form creazione post
// store - /posts - POST - crea post
// show - /posts/{post} - GET - singolo post
// edit - /posts/{post}/edit - GET - form modifica post
// update - /posts/{post} - PATCH - modifica post
// destroy - /posts/{post} - DELETE - cancella


Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

Route::post('posts', 'PostsController@store')->name('posts.store')->middleware('auth');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
