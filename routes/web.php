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
    // Home page route direct to the controller return the home page
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);

    // post create route direct to the controller that return the page with form to create a post
    Route::get('/post/create', [
        'uses' => 'PostsController@Create',
        'as'   => 'post.create'
    ]);

    // post store route direct to the controller that creates/populate the post table with new post
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    // category create route direct to the controller that return the page with form to create a category
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    // category store route direct to the controller that creates/populate the category table with new category
    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    // categories  route direct to the controller that return the category page with the category data fetched from the category table in the database
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    // category edit route direct to the controller that return the edit page with form to edit/update a particular category
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    // category update route direct to the controller that populate the category table with new updated category
    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);
});
