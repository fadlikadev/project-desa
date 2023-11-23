<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\User;
use App\Models\Biodata;
use App\Models\DataBarang;
use App\Models\DataFasilitas;
use App\Models\DataPeminjamanBarang;
use App\Models\DataPeminjamanFasilitas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allUser = User::where('role_id', 2)->count();
        $allAdmin = User::where('role_id', 1)->count();
        $userVerified = (Biodata::where('status_verifikasi', 1)->count()) - $allAdmin;
        $userNotVerified = (Biodata::where('status_verifikasi', 0)->count());
        $totalBarang = DataBarang::all()->count();
        $totalFasilitas = DataFasilitas::all()->count();
        $totalAjuanBarang = DataPeminjamanBarang::all()->count();
        $totalAjuanFasilitas = DataPeminjamanFasilitas::all()->count();

        if(Auth::user()->role_id == 1){
            // ADMIN
            // Ajuan Fasilitas
            $ajuanFasilitasSetuju = DataPeminjamanFasilitas::where('status_pinjaman', 'Disetujui')->count();
            $ajuanFasilitasWait = DataPeminjamanFasilitas::where('status_pinjaman', 'Menunggu Persetujuan')->count();
            $ajuanFasilitasReject = DataPeminjamanFasilitas::where('status_pinjaman', 'Ditolak')->count();

            // Ajuan Barang
            $ajuanBarangSetuju = DataPeminjamanBarang::where('status_pinjaman', 'Disetujui')->count();
            $ajuanBarangWait = DataPeminjamanBarang::where('status_pinjaman', 'Menunggu Persetujuan')->count();
            $ajuanBarangReject = DataPeminjamanBarang::where('status_pinjaman', 'Ditolak')->count();
        }else{
            // USER
            // Ajuan Fasilitas
            $ajuanFasilitasSetuju = DataPeminjamanFasilitas::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Disetujui')->count();
            $ajuanFasilitasWait = DataPeminjamanFasilitas::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Menunggu Persetujuan')->count();
            $ajuanFasilitasReject = DataPeminjamanFasilitas::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Ditolak')->count();

            // Ajuan Barang
            $ajuanBarangSetuju = DataPeminjamanBarang::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Disetujui')->count();
            $ajuanBarangWait = DataPeminjamanBarang::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Menunggu Persetujuan')->count();
            $ajuanBarangReject = DataPeminjamanBarang::where('user_id', Auth::user()->id)->where('status_pinjaman', 'Ditolak')->count();
        }
        
        return view('dashboard.index', compact('allUser', 'userVerified', 'userNotVerified', 'totalBarang', 'totalFasilitas', 'totalAjuanBarang', 'totalAjuanFasilitas', 'ajuanFasilitasSetuju', 'ajuanFasilitasWait', 'ajuanFasilitasReject', 'ajuanBarangSetuju', 'ajuanBarangWait', 'ajuanBarangReject'));
    }
}
