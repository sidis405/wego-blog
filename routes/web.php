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


Route::get('/', 'PostsController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
