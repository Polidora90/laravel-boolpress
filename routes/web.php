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
Route::get('/posts/{post}','PostController@show')->name('posts.show');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        //Route::get('/posts', 'PostController@index');
        Route::resource('/posts', 'PostController');
        //con il metodo sopra creiamo tutte le rotte della crud. Per vederle: 
    });
