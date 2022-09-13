<?php

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

Route::get('/', 'HomeController@index')->name('admin.home');
Route::get('/comics', 'ComicController@index')->name('comics.index');
Route::get('/comics/{comic}', 'ComicController@show')->name('comics.show');
// Route::resource('/comics', 'ComicController');
