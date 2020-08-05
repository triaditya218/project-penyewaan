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


// untuk menampilkan semua komik
Route::get("komik", "KomikController@tampilKomik");
Route::get("komik/{id}", "KomikController@tampilKomikById");
Route::post("komik", "KomikController@tambahKomik");
Route::put("komik/{id}", "KomikController@ubahKomik");
Route::delete("komik/{id}", "KomikController@hapusKomik");
