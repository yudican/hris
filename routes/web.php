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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Client\ClientController@index')->name('home');

    // halaman karir daftar lowongan kerja
    Route::get('/karir', 'Client\ClientController@karir')->name('karir');
    Route::get('/karir/{id}/{title}', 'Client\ClientController@karir_detail')->name('karir.detail');

    // apply lowongan submit lamaran
    Route::get('/apply/{id}/{title}', 'Client\ClientController@apply')->name('karir.apply');
    Route::post('/apply/store/{id}', 'Client\ClientController@store')->name('karir.store');

    // alamat route provinsi/kecamatan/kabupaten/kelurahan/kodepos
    Route::get('/kabupaten/{key}', 'Client\LocationController@kabupaten')->name('location.kabupaten');
    Route::get('/kecamatan/{key}', 'Client\LocationController@kecamatan')->name('location.kecamatan');
    Route::get('/kelurahan/{key}', 'Client\LocationController@kelurahan')->name('location.kelurahan');
    Route::get('/kodepos/{key}', 'Client\LocationController@kodepos')->name('location.kodepos');

    Route::group(['prefix' => 'auth'], function () {
        Auth::routes();
    });
    

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAuthorization']], function () {
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
        Route::resource('pelamar', 'PelamarController')->except(['create', 'store', 'edit', 'destroy']);
    });
});

