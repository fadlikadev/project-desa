<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataBarang\DataBarangController;
use App\Http\Controllers\DataFasilitas\DataFasilitasController;

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
Route::get('/', 'HomeController@index')->name('home')->middleware('auth', 'verified_user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['superadmin'])->group(function()
{
    Route::prefix('/')->group(function() 
    {
        Route::prefix('informasi')->group(function() 
        {
            Route::get('/deskripsi/edit', [InformasiDashboardController::class, 'editDeskripsi']);
            Route::put('/deskripsi/{id}', [InformasiDashboardController::class, 'updateDeskripsi']);

            Route::get('/',[StatusAplikasiController::class,'index']);
            Route::get('/edit/{id}',[StatusAplikasiController::class,'edit']);
            Route::put('/{id}',[StatusAplikasiController::class,'update']);
        });

        Route::prefix('pendaftar')->group(function() 
        {
            Route::get('/',[PendaftarController::class,'index']);
            Route::put('/verifikasi-data/{id}',[PendaftarController::class,'verifikasiData']);
            Route::put('/verifikasi/{id}',[PendaftarController::class,'verifikasi']);
            Route::get('/tambah',[PendaftarController::class,'create']);
            Route::post('/',[PendaftarController::class,'store']);
            Route::get('/edit/{id}',[PendaftarController::class,'edit']);
            Route::put('/{id}',[PendaftarController::class,'update']);
            Route::delete('/{id}',[PendaftarController::class,'destroy']);
        });

        Route::prefix('contact-person')->group(function()
        {
            Route::get('/create',[NarahubungController::class,'create']);
            Route::post('/', [NarahubungController::class, 'store']);
            Route::get('/edit/{id}',[NarahubungController::class,'edit']);
            Route::put('/{id}',[NarahubungController::class,'update']);
            Route::delete('/{id}',[NarahubungController::class,'destroy']);
        });

        Route::prefix('data-aplikasi')->group(function() 
        {
            Route::get('/',[DataAplikasiController::class,'index']);
            Route::get('/edit/{id}',[DataAplikasiController::class,'edit']);
            Route::put('/{id}',[DataAplikasiController::class,'update']);
        });

        Route::prefix('status-aplikasi')->group(function() 
        {
            Route::get('/',[StatusAplikasiController::class,'index']);
            Route::get('/edit/{id}',[StatusAplikasiController::class,'edit']);
            Route::put('/{id}',[StatusAplikasiController::class,'update']);
        });

        Route::prefix('data-barang')->group(function() 
        {
            Route::get('/',[DataBarangController::class,'index']);
            Route::get('/tambah',[DataBarangController::class,'create']);
            Route::post('/', [DataBarangController::class, 'store']);
            Route::get('/edit/{id}',[DataBarangController::class,'edit']);
            Route::put('/{id}',[DataBarangController::class,'update']);
            Route::delete('/{id}',[DataBarangController::class,'destroy']);
        });

        Route::prefix('data-fasilitas')->group(function() 
        {
            Route::get('/',[DataFasilitasController::class,'index']);
            Route::get('/tambah',[DataFasilitasController::class,'create']);
            Route::post('/', [DataFasilitasController::class, 'store']);
            Route::get('/edit/{id}',[DataFasilitasController::class,'edit']);
            Route::put('/{id}',[DataFasilitasController::class,'update']);
            Route::delete('/{id}',[DataFasilitasController::class,'destroy']);
        });
    });
});

Route::middleware(['auth', 'verified_user'])->group(function()
{
    Route::prefix('/')->group(function() 
    {
        Route::get('/dashboard',[HomeController::class,'index']);

        Route::prefix('tahap-1')->group(function() 
        {
            Route::get('/{id}',[BiodataController::class,'indexBio']);
            Route::get('/edit/{id}',[BiodataController::class,'editBio']);
            Route::put('/{id}',[BiodataController::class,'updateBio']);
        });

        Route::prefix('tahap-2')->group(function() 
        {
            Route::get('/{id}',[BiodataController::class,'indexAlamat']);
            Route::get('/edit/{id}',[BiodataController::class,'editAlamat']);
            Route::put('/{id}',[BiodataController::class,'updateAlamat']);
        });

        Route::prefix('tahap-3')->group(function() 
        {
            Route::get('/{id}',[RiwayatPendidikanController::class,'index']);
            Route::get('/edit/{id}',[RiwayatPendidikanController::class,'edit']);
            Route::put('/{id}',[RiwayatPendidikanController::class,'update']);
        });

        Route::prefix('tahap-4')->group(function() 
        {
            Route::get('/{id}',[DataOrangTuaController::class,'index']);
            Route::get('/edit/{id}',[DataOrangTuaController::class,'edit']);
            Route::put('/{id}',[DataOrangTuaController::class,'update']);
        });

        Route::prefix('tahap-5')->group(function() 
        {
            Route::get('/{id}',[DataNilaiController::class,'index']);

            Route::prefix('bahasa-indonesia')->group(function() 
            {
                Route::get('/edit/{id}',[DataNilaiController::class,'editBI']);
                Route::put('/{id}',[DataNilaiController::class,'updateBI']);
            });

            Route::prefix('nilai-matematika')->group(function() 
            {
                Route::get('/edit/{id}',[DataNilaiController::class,'editMtk']);
                Route::put('/{id}',[DataNilaiController::class,'updateMtk']);
            });

            Route::prefix('nilai-ipa')->group(function() 
            {
                Route::get('/edit/{id}',[DataNilaiController::class,'editIpa']);
                Route::put('/{id}',[DataNilaiController::class,'updateIpa']);
            });
        });

        Route::prefix('tahap-6')->group(function() 
        {
            Route::get('/{id}',[FotoSiswaController::class,'index']);
            Route::get('/edit/{id}',[FotoSiswaController::class,'edit']);
            Route::put('/{id}',[FotoSiswaController::class,'update']);
        });

        Route::prefix('tahap-7')->group(function() 
        {
            Route::get('/{id}',[VerifikasiDataController::class,'index']);
            Route::get('/edit/{id}',[VerifikasiDataController::class,'edit']);
            Route::put('/{id}',[VerifikasiDataController::class,'update']);
        });

        Route::prefix('contact-person')->group(function()
        {
            Route::get('/',[NarahubungController::class,'index']);
        });

        Route::prefix('akun')->group(function() 
        {
            Route::get('/ubah-password', 'UbahPasswordController@index');

            Route::post('/ubah-password', 'UbahPasswordController@store')->name('change.password');
            // Route::post('/ubah-password',[UbahPasswordController::class,'store']);
        });
    });
});
