<?php

namespace App\Http\Controllers;
use App\Models\transaksirokok;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
class transaksirokokController extends Controller
{
    public function index()
    {
        $transaksirokok = transaksirokok::all();

        return view('transaksi.transaksi', compact('transaksirokok'));
    }
    public function cetak()
    {
        $transaksiRokok = transaksiRokok::all();
        $pdf = Pdf::loadView('transaksi.transaksi-cetak', compact('transaksiRokok'));
        return $pdf->download('laporan-transaksi.pdf');
    }
}
