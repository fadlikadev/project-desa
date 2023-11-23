<?php

namespace App\Http\Controllers\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use File;
use App\Models\User;
use App\Models\Biodata;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::find($id);

        if((Auth::user()->id == $data->id) || (Auth::user()->role_id == 1)){
            return view('profil.index', compact('data'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return view('profil.edit', compact('data'));
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
            'foto' => ['mimes:jpg,jpeg,png'],
            'nik' => ['required'],
            'nama_lengkap' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'alamat' => ['required'],
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
            'user_id' => \DB::raw('user_id'),
            'status_verifikasi' => \DB::raw('status_verifikasi'),
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $imgName ?? \DB::raw('foto'),
        ]);

        alert()->success('Berhasil', 'Update Profil ' . $user->nama_lengkap);
        return redirect('/profile/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
