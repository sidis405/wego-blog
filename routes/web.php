<?php

Route::get('/', function () {
    return view('welcome');
});

// RESOURCE - REST
// index - /posts - GET - lista tutti i task
// create - /posts/create - GET - form creazione task
// store - /posts - POST - crea task
// show - /posts/{post} - GET - singolo task
// edit - /posts/{post}/edit - GET - form modifica task
// update - /posts/{post} - PATCH - modifica task
// destroy - /posts/{post} - DELETE - cancella
