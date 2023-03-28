<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('login');
});
// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/chart-data', [DashboardController::class, 'getChartData']);
Route::get('/order/export', [OrderReportController::class, 'export']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/pemesanan-kendaraan', 'PemesananKendaraanController@index');
    Route::post('/pemesanan-kendaraan', 'PemesananKendaraanController@store');
    Route::get('/pemesanan-kendaraan/{id}', 'PemesananKendaraanController@show');
    Route::post('/pemesanan-kendaraan/{id}', 'PemesananKendaraanController@update');
    Route::get('/daftar-pemesanan-kendaraan', 'PihakMenyetujuiController@index');
    Route::get('/persetujuan-kendaraan/{id}', 'PihakMenyetujuiController@show');
    Route::post('/persetujuan-kendaraan/{id}', 'PihakMenyetujuiController@update');
    Route::get('/laporan', 'LaporanController@index');
});

