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
    // Home page route direct to the homecontroller index method that return the home page
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);

    // post/create route direct to the postscontroller create method that return the page with form to create a post
    Route::get('/post/create', [
        'uses' => 'PostsController@Create',
        'as'   => 'post.create'
    ]);

    // post/store route direct to the postscontroller store method that creates/populate the post table with new post
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    // posts route direct to the postscontroller index method that will read and fetch the post data created
    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);


    // posts/delete/id route direct to the postscontroller destroy method that will delete/destroy post data created
    Route::get('/posts/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);


    // posts/trashed route direct to the postscontroller trashed method that will read and fetch the trashed post data
    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);


    // posts/edit route direct to the postscontroller edit method that will return the post form with the particular post on it for editing
    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);


    // posts/update route direct to the postscontroller update method that will update/modify the specific post record
    Route::post('/posts/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);


    // posts/kill route direct to the postscontroller kill method that will permanently delete a record from the database
    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);


    // posts/restore route direct to the postscontroller restore method that will restore a post back to the post view
    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);





    // category create route direct to the categories controller create method that return the page with form to create a category
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    // category store route direct to the categories controller store method that creates/populate the category table with new category
    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    // categories  route direct to the categories controller index method that return the category page with the category data fetched from the category table in the database
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    // category edit route direct to the categories controller edit method that return the edit page with form to edit/update a particular category
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    // category update route direct to the categories controller update method that populate the category table with new updated category. thus, it will receive the id of the data to be updated for idenfication purpose
    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    // category destroy route direct to the categories controller destroy that destroy/delete a category with a specified id from the table. thus, it will receive the id of the data to be deleted and directs to the destroy method in the CategoriesController
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);
});
