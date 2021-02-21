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
    return view('index');
});

/*hALAMAN UTAMA MENU Keluahan*/
Route::get('/', 'frontendController@index');
Route::get('/keluhanfront', 'frontendController@showkeluhan')->name('keluhanfront');
Route::post('keluhanfront/tambahkelfront', 'frontendController@tambahkelfront');
Route::post('keluhanfront/updatekeluhan', 'frontendController@updatekeluhan');

/*HAlaman Artikel*/
Route::get('/iumkmfront', 'frontendController@showiumkm')->name('iumkmfront');
Route::post('iumkmfront/tambahkelfront', 'frontendController@tambahiumkm');
Route::post('iumkmfront/updateiumkm', 'frontendController@updateiumkm');

/*Halaman KTP*/
Route::get('/ktpfront', 'frontendController@showktp')->name('ktpfrontend');
Route::post('ktpfront/tambahktp', 'frontendController@tambahktp');
Route::post('ktpfront/updatektp', 'frontendController@updatektp');

/*Halaman Artikel*/
Route::get('/', 'frontendController@index');
Route::get('artikelfront', 'frontendController@showartikel')->name('artikelfront');
Route::get('/artikelfront/{id_post}', 'frontendController@showartikeldetail');

/*Halaman kematian*/
Route::get('/kematianfront', 'frontendController@showkematian')->name('kematianfront');
Route::post('kematianfront/tambahkematian', 'frontendController@tambahkematian');

/*lOHIN ROUTE*/
Route::get('/', 'frontendController@index')->name('profile');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
 	/////////////////////////////HOME Admin////////////////////////////////
    Route::get('home', 'HomeController@index')->name('home');
    // Proses perijinan
    Route::get('Perijinan', 'PerijinanController@index')->name('Perijinan');
    Route::post('Perijinan/store', 'PerijinanController@store');
    Route::post('Perijinan/update', 'PerijinanController@update');
    Route::delete('/Perijinan/{nik}', 'PerijinanController@destroy');

    /*Route Keluhan*/
    Route::get('keluhan', 'KeluhanController@index')->name('keluhan');
    Route::post('keluhan/store', 'KeluhanController@store');
    Route::post('keluhan/update', 'KeluhanController@update');
    Route::delete('/keluhan/{id_kel}', 'KeluhanController@destroy');

    /*Route profile Kecamatan*/
    Route::get('profile', 'ProfilkecController@index')->name('profile');
    Route::post('profile/store', 'ProfilkecController@store');

    /*Route Artikel Kecamatan*/
    Route::get('artikel', 'ArtikelController@index')->name('artikel');
    Route::post('artikel/store', 'ArtikelController@store');
    Route::post('artikel/update', 'ArtikelController@update');
    Route::delete('/artikel/{id_post}', 'artikelController@destroy');

    /*Route data Pegawai*/
    Route::get('pegawai', 'PegawaiController@index')->name('pegawai');
    Route::post('pegawai/store', 'PegawaiController@store');
    Route::post('pegawai/update', 'PegawaiController@update');
    Route::delete('/pegawai/{id_pegawai}', 'PegawaiController@destroy');

    /*Route data KTP*/
    Route::get('KTP', 'KtpController@index')->name('KTP');
    Route::post('KTP/store', 'KtpController@store');
    Route::post('KTP/update', 'KtpController@update');
    Route::delete('/KTP/{nik}', 'KtpController@destroy');

    /*Route data KTP*/
    Route::get('suratkematian', 'SuratKematianController@index')->name('suratkematian');
    Route::post('suratkematian/store', 'SuratKematianController@store');
    Route::post('suratkematian/update', 'SuratKematianController@update');
    Route::delete('/suratkematian/{nik}', 'SuratKematianController@destroy');
    ////////////////////////////LOGOUT//////////////////////////////

    Route::get('logout', 'AuthController@logout')->name('logout');

    ///////////////////////////TABEL////////////////////////////////

});
