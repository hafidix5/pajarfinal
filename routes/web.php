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

Route::get('/', 'PasienController@index')->name('dataDiri')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
Route::get('table-list', 'jawaban_kuesionerController@riwayat')->name('table');
Route::get('riwayat', 'jawaban_kuesionerController@riwayatpribadi')->name('riwayat');

Route::get('isi_kuesioner', 'KuesionerController@index')->name('typography');
Route::get('/riwayat/downloadHasilKuesioner','KuesionerController@export_excel')->name('downloadHasilKuesioner');
Route::post('isi_kuesionerSave', 'jawaban_kuesionerController@store')->name('isi_kuesionerSave');
Route::get('riwayatdetail/{tanggal}/DetailKuesioner/{id}', 'jawaban_kuesionerController@detail')->name('riwayatDetailKuesioner');

    Route::post('pasien/store', ['as' => 'pasien.store', 'uses' => 'PasienController@store']);
    Route::post('pasien/update', ['as' => 'pasien.update', 'uses' => 'PasienController@update']);
    Route::get('dataDiri', 'PasienController@index')->name('dataDiri');
    Route::get('dataAnak', 'AnakController@index')->name('dataAnak');
    Route::get('dataAnak.insert', 'AnakController@insert')->name('dataAnak.insert');
    Route::post('dataAnak.store', ['as' => 'anak.store', 'uses' => 'AnakController@store']);
    Route::get('dataAnak.edit/{id}', ['as' => 'anak.edit', 'uses' => 'AnakController@edit']);
    Route::post('dataAnak.update/{id}', ['as' => 'anak.update', 'uses' => 'AnakController@update']);
    Route::get('dataAnak.hapus/{id}', ['as' => 'anak.hapus', 'uses' => 'AnakController@destroy']);

    Route::get('jenisEdukasi', 'jenisEdukasiController@index')->name('jenisEdukasi');
    Route::get('jenisEdukasi.insert', 'jenisEdukasiController@insert')->name('jenisEdukasi.insert');
    Route::get('pilihAnak/{id}', 'AnakController@pilih')->name('pilihAnak');
    Route::get('pilingIinsting', 'jenisEdukasiController@show')->name('pilihInsting');
    Route::post('jenisEdukasi.store', ['as' => 'jenisEdukasi.store', 'uses' => 'jenisEdukasiController@store']);
    Route::get('jenisEdukasi.edit/{id}', ['as' => 'jenisEdukasi.edit', 'uses' => 'jenisEdukasiController@edit']);
    Route::put('jenisEdukasi.update/{id}', ['as' => 'jenisEdukasi.update', 'uses' => 'jenisEdukasiController@update']);
    Route::get('jenisEdukasi.hapus/{id}', ['as' => 'jenisEdukasi.hapus', 'uses' => 'jenisEdukasiController@destroy']);

    Route::get('insting', 'instingController@index')->name('insting');
    Route::get('insting.insert', 'instingController@insert')->name('insting.insert');
    Route::post('insting.store', ['as' => 'insting.store', 'uses' => 'instingController@store']);
    Route::get('insting.edit/{id}', ['as' => 'insting.edit', 'uses' => 'instingController@edit']);
    Route::put('insting.update/{id}', ['as' => 'insting.update', 'uses' => 'instingController@update']);
    Route::get('insting.hapus/{id}', ['as' => 'insting.hapus', 'uses' => 'instingController@destroy']);


    Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


