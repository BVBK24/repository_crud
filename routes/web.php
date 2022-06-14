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

// Route::get('hello', function () {
//     return view('welcome');
// });
Route::resource('patcrud',CrudController::class);
Route::get('/patcrud/getResult/{option?}','CrudController@getResult')->name('getResult');
//Route::post('/patcrud/store', 'CrudController@store');
//Route::get('patcrud/create','CrudController@create')->name('create');
