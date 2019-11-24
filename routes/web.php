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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Home page route
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);

    Route::get('/post/create', [
        'uses' => 'PostsController@Create',
        'as'   => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);
});
