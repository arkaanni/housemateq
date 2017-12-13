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
    $thread = App\Models\Thread::where('status', 1)->get();
    $notifikasi = null;
    if (Auth::user()) {
        $notifikasi = App\Models\Notifikasi::where('user_id', Auth::user()->id)->get();
    }

    return view('home', ['title' => $title, 'thread' => $thread, 'notifikasi' => $notifikasi]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/thread/create', 'ThreadController@create');
Route::get('/thread/{id}', 'ThreadController@lihatThread');
Route::get('/cari/{keyword}', 'ThreadController@cari');

Route::get('/member', 'AccountController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/pending/{id}', 'ThreadController@lihatPendingThread');
