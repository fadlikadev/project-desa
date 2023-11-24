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
use Carbon\Carbon;
use App\Models\InformasiDashboard;

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
        $today = date('d M y', strtotime(Carbon::now()));
        $allUser = User::where('role_id', 2)->count();
        $allAdmin = User::where('role_id', 1)->count();
        $userVerified = (Biodata::where('status_verifikasi', 1)->count()) - $allAdmin;
        $userNotVerified = (Biodata::where('status_verifikasi', 0)->count());
        $totalBarang = DataBarang::all()->count();
        $totalFasilitas = DataFasilitas::all()->count();
        $totalAjuanBarang = DataPeminjamanBarang::all()->count();
        $totalAjuanFasilitas = DataPeminjamanFasilitas::all()->count();
        $informasi = InformasiDashboard::first();

        // Klasifikasi User
        $lakiLaki = Biodata::where('jenis_kelamin', 'Laki-Laki')->count() - $allAdmin;
        $perempuan = Biodata::where('jenis_kelamin', 'Perempuan')->count();

        // Admin
        $dataPinjamBarang = DataPeminjamanBarang::where('status_pinjaman', 'Menunggu Persetujuan')->orderBy('created_at', 'desc')->get();
        $dataPinjamFasilitas = DataPeminjamanFasilitas::where('status_pinjaman', 'Menunggu Persetujuan')->orderBy('created_at', 'desc')->get();

        // User
        $dataPinjamBarangUser = DataPeminjamanBarang::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();
        $dataPinjamFasilitasUser = DataPeminjamanFasilitas::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();

        // 8 New User
        $newUser = User::orderBy('created_at', 'desc')->where('role_id', 2)->limit(8)->get();

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

            
        }
        else{
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
        
        return view('dashboard.index', compact('allUser', 'userVerified', 'userNotVerified', 'totalBarang', 'totalFasilitas', 'totalAjuanBarang', 'totalAjuanFasilitas', 'ajuanFasilitasSetuju', 'ajuanFasilitasWait', 'ajuanFasilitasReject', 'ajuanBarangSetuju', 'ajuanBarangWait', 'ajuanBarangReject', 'lakiLaki', 'perempuan', 'dataPinjamBarang', 'dataPinjamFasilitas', 'newUser', 'today', 'informasi', 'dataPinjamBarangUser', 'dataPinjamFasilitasUser'));
    }
}
