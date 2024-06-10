<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenirokok;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;


class jenisrokokController extends Controller
{
   /**
     * index
     *
     * @return View
     */ 
    public function index(): View
    {
        //get posts
        $Jenisrokok = jenirokok::all();
        return view('jenisrokok.index', compact('Jenisrokok'));
    }
    public function create()
    {
        return view('Jenisrokok.create');
    }
    public function store(Request $request)
    {
       $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'isi' => 'required',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $tujuan_upload = 'foto';
        $gambar->move($tujuan_upload, $nama_gambar);

        jenirokok::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'isi' => $request->isi,
            'gambar' => $nama_gambar,
        ]);

        return redirect('jenisrokok');
    }
    public function edit($id_jenis)
    {
        $Jenisrokok = jenirokok::find($id_jenis);
        return view('jenisrokok.edit', compact('Jenisrokok'));
    }

    public function update(Request $request, $id_jenis)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'isi' => 'required',
            'gambar' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $Jenisrokok = jenirokok::find($id_jenis);

        if($request->hasFile('gambar')){

            File::delete('foto/'.$Jenisrokok->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'foto';
            $gambar->move($tujuan_upload, $nama_gambar);
            $Jenisrokok->gambar = $nama_gambar;
        }

        $Jenisrokok->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'isi' => $request->isi,
        ]);

        return redirect('jenisrokok');
    }
    /**
     * Destroy the specified resource.
     *
     * @param  int  $id_jenis
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id_jenis): RedirectResponse
    {
        // Get post by ID
        $Jenisrokok = jenirokok::findOrFail($id_jenis);

        // Delete post
        $Jenisrokok->delete();

        // Redirect to index
        return redirect()->route('jenisrokok.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}