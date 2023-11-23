<?php

namespace App\Http\Controllers\DataAplikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationName;
use File;
use Alert;

class DataAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplikasi = ApplicationName::first();
        return view('application-configure.index', compact('aplikasi'));
    }

    public function edit($id)
    {
        $aplikasi = ApplicationName::find($id)->first();
        return view('application-configure.edit', compact('aplikasi'));
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
            'application_name' => 'required',
            'application_nickname' => 'required',
            'application_owner' => 'required',
            'application_version' => 'required',
            'application_developer' => 'required',
            'link_application_developer' => 'required',
        ]);

        if($request->hasFile('application_logo')){
            $file = $request->file('application_logo');
            $nama = $request->application_nickname;
            $imgName = date('dmYHis') . '_' . $nama . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/web-config/'),$imgName);

            $data = ApplicationName::find($id);
            File::delete(public_path('assets/web-config/'. $data->application_logo));
        }

        ApplicationName::find($id)->update([
            'application_name' => $request->application_name,
            'application_nickname' => $request->application_nickname,
            'application_owner' => $request->application_owner,
            'application_version' => $request->application_version,
            'application_developer' => $request->application_developer,
            'link_application_developer' => $request->link_application_developer,
            'application_logo' => $imgName ?? \DB::raw('application_logo')
        ]);

        alert()->success('Berhasil', 'Update Data Aplikasi');
        return redirect('/data-aplikasi');
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
