<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanPemesananKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_persetujuan',
        'catatan',
        'status_persetujuan',
        'pemesanan_kendaraan_id',
    ];

    public function pemesanan_kendaraan()
    {
        return $this->belongsTo(PemesananKendaraan::class);
    }
}
