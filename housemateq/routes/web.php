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

Route::get('/', function () {
    $title = 'Housemate Q - Cari Teman Kontrakan Online';
    return view('welcome', ['title' => $title]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/thread/create', 'ThreadController@create');
Route::get('/thread/{id}', 'ThreadController@lihatThread');
