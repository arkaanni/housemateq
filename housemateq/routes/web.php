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
    $thread = App\Models\Thread::all();
    return view('home', ['title' => $title, 'thread' => $thread]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/thread/create', 'ThreadController@create');
Route::get('/thread/{id}', 'ThreadController@lihatThread');

Route::get('/member', 'AccountController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/pending/{id}', 'ThreadController@lihatPendingThread');
