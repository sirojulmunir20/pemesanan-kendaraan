<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getChartData()
    {
        // ambil data dari database
        $orders = DB::table('orders')
            ->select(DB::raw('jenis_kendaraan, region, count(*) as total'))
            ->groupBy('jenis_kendaraan', 'region')
            ->get();

        // siapkan data untuk chart
        $chartData = [
            'labels' => [],
            'datasets' => [],
        ];

        // format data untuk chart.js
        foreach ($orders as $order) {
            if (!in_array($order->jenis_kendaraan, $chartData['labels'])) {
                $chartData['labels'][] = $order->jenis_kendaraan;
            }

            if (empty($chartData['datasets'][$order->region])) {
                $chartData['datasets'][$order->region] = [
                    'label' => $order->region,
                    'data' => [],
                ];
            }

            $chartData['datasets'][$order->region]['data'][] = $order->total;
        }

        return response()->json($chartData);
    }
}

