<?php

namespace App\Http\Controllers\Narahubung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Narahubung;
use Auth;
use Alert;

class NarahubungController extends Controller
{
    public function index()
    {
        $narahubungs = Narahubung::all();
        return view('narahubung.index', compact('narahubungs'));
    }

    public function create()
    {
        return view('narahubung.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255|min:6',
            'kontak' => 'required|min:6',
        ]);

        Narahubung::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'link' => $request->link,
        ]);

        alert()->success('Berhasil', 'Tambah Narahubung');
        return redirect('/contact-person');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $narahubung = Narahubung::find($id);
        
        return view('narahubung.edit', compact('narahubung'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255|min:6',
            'kontak' => 'required|min:10',
        ]);

        Narahubung::find($id)->update([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'link' => $request->link,
        ]);

        alert()->success('Berhasil', 'Edit Narahubung');
        return redirect('/contact-person');
    }

    public function destroy($id)
    {
        Narahubung::find($id)->delete();

        alert()->success('Berhasil', 'Hapus Narahubung');
        return redirect('/contact-person');
    }
}
