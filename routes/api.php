<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('isi_kuesioner', 'KuesionerController@index')->name('typography');
Route::put('pasien', ['as' => 'pasien.update', 'uses' => 'PasienController@update']);
Route::post('isi_kuesionerSave', 'jawaban_kuesionerController@store')->name('isi_kuesionerSave');
