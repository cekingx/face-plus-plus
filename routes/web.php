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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pendatang', 'PendatangController');
Route::resource('riwayat_tinggal', 'RiwayatTinggalController');
Route::resource('petugas', 'PetugasController');
Route::resource('identifikasi', 'IdentifikasiController');

Route::get('/hasil_identifikasi/{uuid}', 'IdentifikasiController@show_uuid');
