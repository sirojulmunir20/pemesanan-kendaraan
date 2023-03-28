@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Pemesanan Kendaraan</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Tujuan Perjalanan</th>
                                    <th>Jumlah Penumpang/Barang</th>
                                    <th>Jadwal Keberangkatan</th>
                                    <th>Jadwal Kepulangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->tanggal_pemesanan }}</td>
                                        <td>{{ $order->jenis_kendaraan }}</td>
                                        <td>{{ $order->tujuan }}</td>
                                        <td>{{ $order->jumlah_penumpang_barang }}</td>
                                        <td>{{ $order->jadwal_keberangkatan }}</td>
                                        <td>{{ $order->jadwal_kepulangan }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
