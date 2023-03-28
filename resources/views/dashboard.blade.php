<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        {{ __('You are logged in!') }}

                        <!-- Tambahkan div untuk grafik -->
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Ambil data dari database atau dari variabel yang telah didefinisikan sebelumnya
        var data = {
            labels: ['Mobil', 'Motor', 'Bis'],
            datasets: [{
                label: 'Pemakaian Kendaraan',
                data: [10, 20, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Konfigurasi opsi Chart.js
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Buat grafik lingkaran (pie chart)
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

        // Perbarui data grafik setiap 5 detik
        setInterval(function() {
            // Ambil data baru dari database atau variabel
            var newData = [15, 20, 4, 7, 8, 10, 12];

            // Perbarui data dan tampilkan grafik
            myChart.data.datasets[0].data = newData;
            myChart.update();
        }, 5000);
    </script>
@endsection
