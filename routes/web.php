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

Route::group(['middleware' => ['web', 'statusLowongan']], function () {
    Route::get('/', 'Client\ClientController@index')->name('home');

    // halaman karir daftar lowongan kerja
    Route::get('/careers', 'Client\CareerController@index')->name('karir');
    Route::get('/careers/{id}/{title}', 'Client\CareerController@detail')->name('karir.detail');

    // apply lowongan submit lamaran
    Route::get('/careers/apply/{id}/{title}', 'Client\CareerController@apply')->name('karir.apply');
    Route::post('/careers/apply/store/{id}', 'Client\CareerController@store')->name('karir.store');

    // alamat route provinsi/kecamatan/kabupaten/kelurahan/kodepos
    Route::get('/kabupaten/{key}', 'Client\LocationController@kabupaten')->name('location.kabupaten');
    Route::get('/kecamatan/{key}', 'Client\LocationController@kecamatan')->name('location.kecamatan');
    Route::get('/kelurahan/{key}', 'Client\LocationController@kelurahan')->name('location.kelurahan');
    Route::get('/kodepos/{key}', 'Client\LocationController@kodepos')->name('location.kodepos');

    Route::group(['prefix' => 'auth'], function () {
        Auth::routes();
    });
    

    Route::group(['middleware' => ['auth', 'isAuthorization']], function () {
        Route::get('/perusahaan', 'PerusahaanController@index')->name('perusahaan.index');
        Route::post('/perusahaan/store', 'PerusahaanController@store')->name('perusahaan.store');


        Route::resource('lowongan', 'LowonganController')->except(['show']);

        // user authenticable
        Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');

        // role page
        Route::resource('roles', 'RoleController')->except(['show']);;
        Route::get('roles/permissions/{role}', 'RoleController@permissions')->name('roles.permissions');
        Route::post('roles/setpermissions/{role}', 'RoleController@setRolePermissions')->name('roles.setpermissions');

        //permissions page
        Route::resource('permissions', 'PermissionController');

        // user page
        Route::resource('users', 'UserController');

        Route::resource('menu', 'MenuController');
        Route::post('menu/change', 'MenuController@change')->name('menu.change');

        // pelamar page
        Route::get('pelamar/json/{type}', 'PelamarController@json')->name('pelamar.json');
        Route::get('pelamar/Dipanggil', 'PelamarController@index')->name('pelamar.dipanggil');
        Route::get('pelamar/Ditolak', 'PelamarController@index')->name('pelamar.ditolak');
        Route::resource('pelamar', 'PelamarController')->except(['create', 'store', 'edit', 'destroy']);


        /**
         * User Route
         * 
         */
        Route::resource('biodata-ktp', 'Biodata\KtpController'); // biodata ktp

        // biodata kehamilan
        Route::get('biodata-kehamilan/create/{biodata_kehamilan}', 'Biodata\KehamilanController@create')->name('biodata_kehamilan.create');
        Route::post('biodata-kehamilan/store/{biodata_kehamilan}', 'Biodata\KehamilanController@store')->name('biodata_kehamilan.store');
    });
});

