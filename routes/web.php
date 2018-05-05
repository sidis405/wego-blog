<?php

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('tokens', function () {
    return view('tokens');
})->middleware('auth');

// RESOURCE - REST
// index - /posts - GET - lista tutti i post
// create - /posts/create - GET - form creazione post
// store - /posts - POST - crea post
// show - /posts/{post} - GET - singolo post
// edit - /posts/{post}/edit - GET - form modifica post
// update - /posts/{post} - PATCH - modifica post
// destroy - /posts/{post} - DELETE - cancella

// Route::get('/', 'PostsController@index')->name('posts.index');
// Route::get('posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');
// Route::post('posts', 'PostsController@store')->name('posts.store')->middleware('auth');
// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
// Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit')->middleware('auth');
// Route::patch('posts/{post}', 'PostsController@update')->name('posts.update')->middleware('auth');
// Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy')->middleware('auth');

//Comments
Route::post('/posts/{post}/comments', 'PostsCommentsController@store')->name('posts.comment')->middleware('auth');

//POSTS
Route::resource('posts', 'PostsController');

// Categories
Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');

//Tags
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

Auth::routes();
