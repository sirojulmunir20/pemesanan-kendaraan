<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrderReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderReportController extends Controller
{
    public function export()
    {
        return Excel::download(new OrderReportExport, 'order_report.xlsx');
    }
}

class OrderReportExports implements FromCollection
{
    public function collection()
    {
        return Order::select('tanggal_pemesanan', 'jenis_kendaraan', 'waktu_pemakaian', 'lokasi_awal', 'lokasi_tujuan', 'status')->get();
    }
}

