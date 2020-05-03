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

        // biodata kehamilan
        Route::get('sejarah-perusahaan/index', 'SejarahController@index')->name('sejarah-perusahaan.index');
        Route::post('sejarah-perusahaan/store', 'SejarahController@store')->name('sejarah-perusahaan.store');
        
        /**
         * User Route
         * 
         */
        Route::resource('biodata-ktp', 'Biodata\KtpController'); // biodata ktp

        // biodata kehamilan
        Route::get('biodata-kehamilan/create/{biodata_kehamilan}', 'Biodata\KehamilanController@create')->name('biodata_kehamilan.create');
        Route::post('biodata-kehamilan/store/{biodata_kehamilan}', 'Biodata\KehamilanController@store')->name('biodata_kehamilan.store');

        // biodata orang tus
        Route::get('biodata-ortu/create/{biodata_ortu}', 'Biodata\OrtuController@create')->name('biodata-ortu.create');
        Route::post('biodata-ortu/store/{biodata_ortu}', 'Biodata\OrtuController@store')->name('biodata-ortu.store');
        Route::put('biodata-ortu/update/{biodata_ortu}', 'Biodata\OrtuController@update')->name('biodata-ortu.update');

        // biodata keluarga
        Route::get('biodata-keluarga/create/{biodata_keluarga}', 'Biodata\KeluargaController@create')->name('biodata-keluarga.create');
        Route::post('biodata-keluarga/store', 'Biodata\KeluargaController@store')->name('biodata-keluarga.store');
        Route::put('biodata-keluarga/update', 'Biodata\KeluargaController@update')->name('biodata-keluarga.update');

        // biodata pendidikan
        Route::get('biodata-pendidikan/create/{biodata_pendidikan}', 'Biodata\PendidikanController@create')->name('biodata-pendidikan.create');
        Route::post('biodata-pendidikan/store', 'Biodata\PendidikanController@store')->name('biodata-pendidikan.store');
        Route::put('biodata-pendidikan/update', 'Biodata\PendidikanController@update')->name('biodata-pendidikan.update');

        // biodata biodata-susunan-anak
        Route::get('biodata-susunan-anak/create/{biodata_susunan_anak}', 'Biodata\SusunanAnakController@create')->name('biodata-susunan-anak.create');
        Route::post('biodata-susunan-anak/store', 'Biodata\SusunanAnakController@store')->name('biodata-susunan-anak.store');
        Route::put('biodata-susunan-anak/update', 'Biodata\SusunanAnakController@update')->name('biodata-susunan-anak.update');

        // biodata biodata-pengalaman-kerja
        Route::get('biodata-pengalaman-kerja/create/{biodata_pengalaman_kerja}', 'Biodata\PengalamanKerjaController@create')->name('biodata-pengalaman-kerja.create');
        Route::post('biodata-pengalaman-kerja/store', 'Biodata\PengalamanKerjaController@store')->name('biodata-pengalaman-kerja.store');
        Route::put('biodata-pengalaman-kerja/update', 'Biodata\PengalamanKerjaController@update')->name('biodata-pengalaman-kerja.update');

        // biodata biodata-referensi
        Route::get('biodata-referensi/create/{biodata_referensi}', 'Biodata\ReferensiController@create')->name('biodata-referensi.create');
        Route::post('biodata-referensi/store/{biodata_referensi}', 'Biodata\ReferensiController@store')->name('biodata-referensi.store');
        Route::put('biodata-referensi/update', 'Biodata\ReferensiController@update')->name('biodata-referensi.update');

        // biodata biodata-darurat
        Route::get('biodata-darurat/create/{biodata_darurat}', 'Biodata\DaruratController@create')->name('biodata-darurat.create');
        Route::post('biodata-darurat/store', 'Biodata\DaruratController@store')->name('biodata-darurat.store');
        Route::put('biodata-darurat/update', 'Biodata\DaruratController@update')->name('biodata-darurat.update');
        
        // biodata biodata-keahlian
        Route::get('biodata-keahlian/create/{biodata_keahlian}', 'Biodata\KeahlianController@create')->name('biodata-keahlian.create');
        Route::post('biodata-keahlian/store', 'Biodata\KeahlianController@store')->name('biodata-keahlian.store');
        Route::put('biodata-keahlian/update', 'Biodata\KeahlianController@update')->name('biodata-keahlian.update');

        
    });
});

