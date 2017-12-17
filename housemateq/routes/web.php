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

Route::get('/profile', 'AccountController@myAccount');
Route::get('/profile/{id}', 'AccountController@lihatBiodata');

Route::get('/thread/create', 'ThreadController@create');
Route::get('/thread/{id}', 'ThreadController@lihatThread');
Route::get('/cari', 'ThreadController@cari');
Route::get('/kategori/{q}', 'ThreadController@filter');
Route::get('/thread', 'ThreadController@allThread');

Route::get('/member', 'AccountController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/pending/{id}', 'ThreadController@lihatPendingThread');

Route::post('/thread/create', 'ThreadController@createThread');
Route::post('/thread/block', 'ThreadController@blockThread');
Route::post('/thread/validasi', 'ThreadController@validasiThread');

Route::get('/thread/{id}/wishlist', 'WishlistController@lihatWishlist');
Route::post('/thread/{id}/daftar-wishlist', 'WishlistController@daftarWishlist');

Route::post('/thread/{id}/kirim-komentar', 'KomentarController@addKomentar');
Route::get('/thread/{id}/komentar', 'KomentarController@getKomentar');
Route::post('/komentar/{id}/hapus', 'KomentarController@hapusKomentar');

Route::get('/pembayaran/{wishlist_id}', 'PembayaranController@index');
Route::post('/bayar/{wishlist_id}', 'PembayaranController@bayar');
