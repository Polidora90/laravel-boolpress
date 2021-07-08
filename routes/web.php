<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/posts', 'PostController@index')->name('posts.index');

//slug in url!!
Route::get('/posts/{slug}','PostController@show')->name('posts.show');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        //categorie
        Route::get('/categories', 'CategoryController@index')->name('categories.index');

        //tag
        Route::get('/tags', 'TagController@index')->name('tags.index');

        //utenti
        Route::get('/users', 'UserController@index')->name('users.index');

        //Route::get('/posts', 'PostController@index');
        Route::get('/posts/filter', 'PostController@filter')->name('posts.filter');
        Route::resource('/posts', 'PostController');
    });
