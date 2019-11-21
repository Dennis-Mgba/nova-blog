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

// welcome page route
Route::get('/', function () {
    return view('welcome');
});

//list of routes, hence the Auth routes is pointing at the files in the auth directory
Auth::routes();

// Home page  route
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/create', [
    'uses' => 'PostsController@Create',
    'as'   => 'post.create'
]);

Route::post('/post/store', [
    'uses' => 'PostsController@store',
    'as'   => 'post.store'
]);
