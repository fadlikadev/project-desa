<?php

namespace App\Http\Controllers\InformasiDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiDashboard;
use File;
use Alert;

class InformasiDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function editDeskripsi()
    {
        $data = InformasiDashboard::first();
        return view('dashboard.editDeskripsi', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDeskripsi(Request $request, $id)
    {
        $request->validate([
            'foto_informasi' => ['mimes:jpg,jpeg,png', 'max:2048'],
            'deskripsi_informasi' => ['required']
        ]);

        if($request->hasFile('foto_informasi')){
            $data = InformasiDashboard::first();
            File::delete(public_path('assets/'. $data->foto_informasi));

            $file = $request->file('foto_informasi');
            $imgName = 'foto_informasi' . '-' . date('dmYHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets'),$imgName);
        }

        InformasiDashboard::find($id)->update([
            'foto_informasi' => $imgName ?? \DB::raw('foto_informasi'),
            'deskripsi_informasi' => $request->deskripsi_informasi
        ]);

        alert()->success('Berhasil', 'Update Informasi Dashboard');
        return back();
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
