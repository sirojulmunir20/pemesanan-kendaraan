@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Form Pemesanan Kendaraan</h1>
    <form method="POST" action="{{ route('orders.store') }}">
      @csrf
      <div class="form-group">
        <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
        <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
      </div>
      <div class="form-group">
        <label for="jenis_kendaraan">Jenis Kendaraan</label>
        <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
          <option value="">Pilih Jenis Kendaraan</option>
          <option value="Mobil">Mobil</option>
          <option value="Motor">Motor</option>
          <option value="Bus">Bus</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tujuan_perjalanan">Tujuan Perjalanan</label>
        <textarea class="form-control" id="tujuan_perjalanan" name="tujuan_perjalanan" required></textarea>
      </div>
      <div class="form-group">
        <label for="jumlah_penumpang_barang">Jumlah Penumpang/Barang</label>
        <input type="number" class="form-control" id="jumlah_penumpang_barang" name="jumlah_penumpang_barang" required>
      </div>
      <div class="form-group">
        <label for="jadwal_keberangkatan">Jadwal Keberangkatan</label>
        <input type="datetime-local" class="form-control" id="jadwal_keberangkatan" name="jadwal_keberangkatan" required>
      </div>
      <div class="form-group">
        <label for="jadwal_kepulangan">Jadwal Kepulangan</label>
        <input type="datetime-local" class="form-control" id="jadwal_kepulangan" name="jadwal_kepulangan" required>
      </div>
      <div class="form-group">
        <label for="atasan_yang_menyetujui">Atasan Yang Menyetujui</label>
        <input type="text" class="form-control" id="atasan_yang_menyetujui" name="atasan_yang_menyetujui" required>
      </div>
      <div class="form-group">
        <label for="driver_yang_mengemudikan">Driver Yang Mengemudikan</label>
        <input type="text" class="form-control" id="driver_yang_mengemudikan" name="driver_yang_mengemudikan" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
