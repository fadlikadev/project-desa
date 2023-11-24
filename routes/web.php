<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataBarang\DataBarangController;
use App\Http\Controllers\DataFasilitas\DataFasilitasController;
use App\Http\Controllers\DataPeminjaman\DataPeminjamanController;
use App\Http\Controllers\Pengguna\PenggunaController;
use App\Http\Controllers\Profil\ProfilController;
use App\Http\Controllers\DataAplikasi\DataAplikasiController;
use App\Http\Controllers\Akun\UbahPassword\UbahPasswordController;
use App\Http\Controllers\Narahubung\NarahubungController;
use App\Http\Controllers\InformasiDashboard\InformasiDashboardController;

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

        Route::prefix('pengguna')->group(function() 
        {
            Route::get('/',[PenggunaController::class,'index']);
            Route::put('/verifikasi-data/{id}',[PenggunaController::class,'verifikasiData']);
            Route::put('/verifikasi/{id}',[PenggunaController::class,'verifikasi']);
            Route::get('/tambah',[PenggunaController::class,'create']);
            Route::post('/',[PenggunaController::class,'store']);
            Route::get('/edit/{id}',[PenggunaController::class,'edit']);
            Route::put('/{id}',[PenggunaController::class,'update']);
            Route::delete('/{id}',[PenggunaController::class,'destroy']);
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

        Route::prefix('data-peminjaman')->group(function() 
        {
            Route::get('/',[DataPeminjamanController::class,'index']);

            // Barang
            Route::prefix('barang')->group(function() 
            {
                Route::get('/tambah',[DataPeminjamanController::class,'createPinjamanBarang']);
                Route::post('/', [DataPeminjamanController::class, 'storePinjamanBarang']);
                Route::post('/getbarang',[DataPeminjamanController::class,'getbarang']);
                Route::put('/approve/{id}',[DataPeminjamanController::class,'approveBarang']);
                Route::get('/edit/{id}',[DataPeminjamanController::class,'editBarang']);
                Route::put('/{id}',[DataPeminjamanController::class,'updateBarang']);
                Route::delete('/{id}',[DataPeminjamanController::class,'destroyBarang']);
            });

            // Fasilitas
            Route::prefix('fasilitas')->group(function() 
            {
                Route::get('/tambah',[DataPeminjamanController::class,'createPinjamanFasilitas']);
                Route::post('/', [DataPeminjamanController::class, 'storePinjamanFasilitas']);
                Route::post('/getFasilitas',[DataPeminjamanController::class,'getFasilitas']);
                Route::put('/approve/{id}',[DataPeminjamanController::class,'approveFasilitas']);
                Route::get('/edit/{id}',[DataPeminjamanController::class,'editFasilitas']);
                Route::put('/{id}',[DataPeminjamanController::class,'updateFasilitas']);
                Route::delete('/{id}',[DataPeminjamanController::class,'destroyFasilitas']);
            });
        });
    });
});

Route::middleware(['auth', 'verified_user'])->group(function()
{
    Route::prefix('/')->group(function() 
    {
        Route::get('/dashboard',[HomeController::class,'index']);

        Route::prefix('profile')->group(function()
        {
            Route::get('/{id}',[ProfilController::class,'index']);
            Route::get('/edit/{id}',[ProfilController::class,'edit']);
            Route::put('/{id}',[ProfilController::class,'update']);
        });

        Route::prefix('data-barang')->group(function() 
        {
            Route::get('/',[DataBarangController::class,'index']);
        });

        Route::prefix('data-fasilitas')->group(function() 
        {
            Route::get('/',[DataFasilitasController::class,'index']);
        });

        Route::prefix('data-peminjaman')->group(function() 
        {
            Route::get('/',[DataPeminjamanController::class,'index']);

            // Barang
            Route::prefix('barang')->group(function() 
            {
                Route::get('/tambah',[DataPeminjamanController::class,'createPinjamanBarang']);
                Route::post('/', [DataPeminjamanController::class, 'storePinjamanBarang']);
                Route::post('/getbarang',[DataPeminjamanController::class,'getbarang']);
                Route::put('/approve/{id}',[DataPeminjamanController::class,'approveBarang']);
                Route::get('/edit/{id}',[DataPeminjamanController::class,'editBarang']);
                Route::put('/{id}',[DataPeminjamanController::class,'updateBarang']);
                Route::delete('/{id}',[DataPeminjamanController::class,'destroyBarang']);
            });

            // Fasilitas
            Route::prefix('fasilitas')->group(function() 
            {
                Route::get('/tambah',[DataPeminjamanController::class,'createPinjamanFasilitas']);
                Route::post('/', [DataPeminjamanController::class, 'storePinjamanFasilitas']);
                Route::post('/getFasilitas',[DataPeminjamanController::class,'getFasilitas']);
                Route::put('/approve/{id}',[DataPeminjamanController::class,'approveFasilitas']);
                Route::get('/edit/{id}',[DataPeminjamanController::class,'editFasilitas']);
                Route::put('/{id}',[DataPeminjamanController::class,'updateFasilitas']);
                Route::delete('/{id}',[DataPeminjamanController::class,'destroyFasilitas']);
            });
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
