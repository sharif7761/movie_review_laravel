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

Route::get('/', 'LoginController@index');
Route::post('/', 'LoginController@verify');
Route::get('/profile', 'LoginController@profile')->name('profile');
Route::get('/logout', 'LoginController@logout');


Route::get('/add', 'FieldController@index');
Route::post('/add_insert', 'FieldController@insert')->name('dynamic-field.insert');




Route::get('/table', 'TableController@index');
Route::post('/add_rating/{id}', 'TableController@add_rating');
Route::get('/view_details/{id}', 'TableController@details');


