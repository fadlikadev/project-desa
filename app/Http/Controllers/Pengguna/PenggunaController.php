<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Alert;
use App\Models\User;
use App\Models\Biodata;
use File;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pengguna.index', compact('data'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'unique:biodatas'],
            'foto' => ['required', 'mimes:jpg,jpeg,png'],
            'jenis_kelamin' => ['required'],
            'no_hp' => ['required', 'unique:biodatas'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $file = $request->file('foto');
        $nama = $user->nama_lengkap;
        $imgName = $nama . '-' . date('dmYHis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/profil/foto'),$imgName);

        Biodata::create([
            'user_id' => $user->id,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'foto' => $imgName,
        ]);

        alert()->success('Berhasil', 'Tambah User ' . $nama);
        return redirect('/pengguna');
    }

    public function verifikasi(Request $request, $id)
    {
        $user = User::find($id);
        User::find($id);

        Biodata::where('user_id', $user->id)->update([
            'user_id' => $user->id,
            'nik' => \DB::raw('nik'),
            'status_verifikasi' => $request->status_verifikasi,
            'foto' => \DB::raw('foto'),
            'tempat_lahir' => \DB::raw('tempat_lahir'),
            'tanggal_lahir' => \DB::raw('tanggal_lahir'),
            'jenis_kelamin' => \DB::raw('jenis_kelamin'),
            'no_hp' => \DB::raw('no_hp'),
            'alamat' => \DB::raw('alamat'),
        ]);

        alert()->success('Berhasil', 'Update Verifikasi Akun ' . $user->nama_lengkap);
        return redirect('/pengguna');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('pengguna.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required'],
            'foto' => ['mimes:jpg,jpeg,png'],
            'jenis_kelamin' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::find($id);

        User::find($id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
        ]);

        if($request->hasFile('foto')){
            $data = Biodata::where('user_id', $user->id)->first();
            File::delete(public_path('assets/profil/foto/'. $data->foto));

            $file = $request->file('foto');
            $nama = $user->nama_lengkap;
            $imgName = $nama . '-' . date('dmYHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/profil/foto'),$imgName);
        }

        Biodata::where('user_id', $user->id)->update([
            'user_id' => $user->id,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'foto' => $imgName ?? \DB::raw('foto'),
        ]);

        alert()->success('Berhasil', 'Update User ' . $request->nama_lengkap);
        return redirect('/pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $data = Biodata::where('user_id', $user->id)->first();
        File::delete(public_path('assets/profil/foto/'. $data->foto));
        
        $user->delete();

        alert()->success('Berhasil', 'Hapus User');
        return back();
    }
}
