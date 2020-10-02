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

    Route::get('detekos', 'detekosController@index')->name('detekos');
    Route::get('detekos.insert', 'detekosController@insert')->name('detekos.insert');
    Route::post('detekos.store', ['as' => 'detekos.store', 'uses' => 'detekosController@store']);
    Route::get('detekos.edit/{id}', ['as' => 'detekos.edit', 'uses' => 'detekosController@edit']);
    Route::put('detekos.update/{id}', ['as' => 'detekos.update', 'uses' => 'detekosController@update']);
    Route::get('detekos.hapus/{id}', ['as' => 'detekos.hapus', 'uses' => 'detekosController@destroy']);

    Route::get('ramodif', 'ramodifController@index')->name('ramodif');
    Route::get('ramodif.insert', 'ramodifController@insert')->name('ramodif.insert');
    Route::post('ramodif.store', ['as' => 'ramodif.store', 'uses' => 'ramodifController@store']);
    Route::get('ramodif.edit/{id}', ['as' => 'ramodif.edit', 'uses' => 'ramodifController@edit']);
    Route::put('ramodif.update/{id}', ['as' => 'ramodif.update', 'uses' => 'ramodifController@update']);
    Route::get('ramodif.hapus/{id}', ['as' => 'ramodif.hapus', 'uses' => 'ramodifController@destroy']);

    Route::get('puskesmas', 'puskesmasController@index')->name('puskesmas');
    Route::get('puskesmas.insert', 'puskesmasController@insert')->name('puskesmas.insert');
    Route::post('puskesmas.store', ['as' => 'puskesmas.store', 'uses' => 'puskesmasController@store']);
    Route::get('puskesmas.edit/{id}', ['as' => 'puskesmas.edit', 'uses' => 'puskesmasController@edit']);
    Route::put('puskesmas.update/{id}', ['as' => 'puskesmas.update', 'uses' => 'puskesmasController@update']);
    Route::get('puskesmas.hapus/{id}', ['as' => 'puskesmas.hapus', 'uses' => 'puskesmasController@destroy']);

    Route::get('pertanyaan_insting/{id}', 'pertanyaan_instingController@show')->name('pertanyaan_insting');
    Route::get('pertanyaan_insting.insert/{id}', 'pertanyaan_instingController@insert')->name('pertanyaan_insting.insert');
    Route::post('pertanyaan_insting.store', ['as' => 'pertanyaan_insting.store', 'uses' => 'pertanyaan_instingController@store']);
    Route::get('pertanyaan_insting.edit/{id}', ['as' => 'pertanyaan_insting.edit', 'uses' => 'pertanyaan_instingController@edit']);
    Route::put('pertanyaan_insting.update/{id}', ['as' => 'pertanyaan_insting.update', 'uses' => 'pertanyaan_instingController@update']);
    Route::get('pertanyaan_insting.hapus/{id}', ['as' => 'pertanyaan_insting.hapus', 'uses' => 'pertanyaan_instingController@destroy']);

    Route::get('pertanyaan_detekos/{id}', 'pertanyaan_detekosController@show')->name('pertanyaan_detekos');
    Route::get('pertanyaan_detekos.insert/{id}', 'pertanyaan_detekosController@insert')->name('pertanyaan_detekos.insert');
    Route::post('pertanyaan_detekos.store', ['as' => 'pertanyaan_detekos.store', 'uses' => 'pertanyaan_detekosController@store']);
    Route::get('pertanyaan_detekos.edit/{id}', ['as' => 'pertanyaan_detekos.edit', 'uses' => 'pertanyaan_detekosController@edit']);
    Route::put('pertanyaan_detekos.update/{id}', ['as' => 'pertanyaan_detekos.update', 'uses' => 'pertanyaan_detekosController@update']);
    Route::get('pertanyaan_detekos.hapus/{id}', ['as' => 'pertanyaan_detekos.hapus', 'uses' => 'pertanyaan_detekosController@destroy']);


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


