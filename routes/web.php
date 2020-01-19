<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('posts');
});

Auth::routes();

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('posts')->group(function (){
    Route::resource('', 'PostController');
    Route::get('tag/{tag}', 'PostController@showByTag');
});

Route::prefix('tags')->group(function () {
    Route::get('create', 'TagController@create');
});