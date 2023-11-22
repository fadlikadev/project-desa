<?php

namespace App\Http\Controllers\DataBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Auth;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataBarang::all();
        return view('data-barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-barang.create');
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
            'kode_barang' => ['required', 'unique:data_barangs'],
            'nama_barang' => ['required'],
            'satuan_barang' => ['required'],
            'jumlah_barang' => ['required'],
        ]);

        DataBarang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan_barang' => $request->satuan_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);

        alert()->success('Berhasil', 'Tambah Data Barang ' . $request->nama_barang);
        return redirect('/data-barang');
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
        $data = DataBarang::find($id);
        return view('data-barang.edit', compact('data'));
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
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'satuan_barang' => ['required'],
            'jumlah_barang' => ['required'],
        ]);

        DataBarang::find($id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan_barang' => $request->satuan_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);

        alert()->success('Berhasil', 'Update Data Barang ' . $request->nama_barang);
        return redirect('/data-barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBarang::find($id)->delete();

        alert()->success('Berhasil', 'Hapus Data Barang');
        return back();
    }
}
