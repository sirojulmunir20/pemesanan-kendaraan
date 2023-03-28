<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersetujuanPemesananKendaraan;

class PihakMenyetujuiController extends Controller
{
    public function index()
    {
        $pemesananKendaraan = PersetujuanPemesananKendaraan::all();

        return view('pihak_menyetujui.index', compact('pemesananKendaraan'));
    }

    public function approve($id)
    {
        $pemesananKendaraan = PersetujuanPemesananKendaraan::find($id);
        $pemesananKendaraan->status = 'Approved';
        $pemesananKendaraan->save();

        return redirect()->back()->with('success', 'Pemesanan kendaraan berhasil disetujui.');
    }

    public function reject($id)
    {
        $pemesananKendaraan = PersetujuanPemesananKendaraan::find($id);
        $pemesananKendaraan->status = 'Rejected';
        $pemesananKendaraan->save();

        return redirect()->back()->with('success', 'Pemesanan kendaraan berhasil ditolak.');
    }
}

