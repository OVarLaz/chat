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


Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/chat', 'HomeController@chatpost')->name('chatpost');
Route::get('/iniciando/{id}', 'HomeController@show');
Route::get('/chat', 'HomeController@chat')->name('chat');


// Route::get('/admin', 'HomeController@admin')->name('admin');
//Route::post('/post-message', 'ChatController@postMessage');
