<?php

namespace App\Http\Controllers;
use App\Models\jenirokok;
use App\Models\transaksirokok;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $jenirokoks = jenirokok::all();

        return view('shop', compact('jenirokoks'));
    }

    public function CreateTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'id_jenis' => 'required|integer',
            'recipient-jumlah' => 'required|integer',
            'status' => 'required|string',
        ]);

        Transaksirokok::create([
            'jumlah' => $validatedData['recipient-jumlah'],
            'jenisrokok_id' => $validatedData['id_jenis'],
            'status' => $validatedData['status'],
        ]);

        return redirect('/')->with('success', 'Transaksi berhasil disimpan');
    }
}
