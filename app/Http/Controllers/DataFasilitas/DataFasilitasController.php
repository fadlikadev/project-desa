<?php

namespace App\Http\Controllers\DataFasilitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\DataFasilitas;

class DataFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataFasilitas::all();
        return view('data-fasilitas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_fasilitas' => ['required', 'unique:data_fasilitases'],
            'nama_fasilitas' => ['required'],
            'satuan_fasilitas' => ['required'],
            'jumlah_fasilitas' => ['required'],
        ]);

        DataFasilitas::create([
            'kode_fasilitas' => $request->kode_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'satuan_fasilitas' => $request->satuan_fasilitas,
            'jumlah_fasilitas' => $request->jumlah_fasilitas,
        ]);

        alert()->success('Berhasil', 'Tambah Data Fasilitas ' . $request->nama_fasilitas);
        return redirect('/data-fasilitas');
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
        $data = DataFasilitas::find($id);
        return view('data-fasilitas.edit', compact('data'));
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
            'kode_fasilitas' => ['required'],
            'nama_fasilitas' => ['required'],
            'satuan_fasilitas' => ['required'],
            'jumlah_fasilitas' => ['required'],
        ]);

        DataFasilitas::find($id)->update([
            'kode_fasilitas' => $request->kode_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'satuan_fasilitas' => $request->satuan_fasilitas,
            'jumlah_fasilitas' => $request->jumlah_fasilitas,
        ]);

        alert()->success('Berhasil', 'Update Data Fasilitas ' . $request->nama_fasilitas);
        return redirect('/data-fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataFasilitas::find($id)->delete();

        alert()->success('Berhasil', 'Hapus Data Fasilitas');
        return back();
    }
}
