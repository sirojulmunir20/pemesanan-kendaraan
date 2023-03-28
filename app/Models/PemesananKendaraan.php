<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pemesanan',
        'waktu_pemakaian',
        'lokasi_awal',
        'lokasi_tujuan',
        'keterangan',
        'status_pemesanan',
        'user_id',
        'kendaraan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function persetujuan_pemesanan_kendaraan()
    {
        return $this->hasOne(PersetujuanPemesananKendaraan::class);
    }
}
