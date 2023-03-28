<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananKendaraan;

class LaporanController extends Controller
{
    public function index()
    {
        $pemesananKendaraan = PemesananKendaraan::all();

        return view('laporan.index', compact('pemesananKendaraan'));
    }

    public function export()
    {
        return Excel::download(new OrderReportExport, 'order_report.xlsx');
    }
}

