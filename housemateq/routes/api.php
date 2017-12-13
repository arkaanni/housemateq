<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/thread', 'ThreadController@allThread');
// Route::get('/thread/{id}', 'ThreadController@lihatThread');
// Route::get('/thread/create', 'ThreadController@create');
Route::post('/thread/create', 'ThreadController@createThread');
Route::post('/thread/block', 'ThreadController@blockThread');
Route::post('/thread/validasi', 'ThreadController@validasiThread');

Route::get('/thread/{id}/wishlist', 'WishlistController@lihatWishlist');
Route::post('/thread/{id}/daftar-wishlist', 'WishlistController@daftarWishlist');

Route::post('/thread/{id}/kirim-komentar', 'KomentarController@addKomentar');
Route::get('/thread/{id}/komentar', 'KomentarController@getKomentar');
Route::post('/komentar/{id}/hapus', 'KomentarController@hapusKomentar');
