<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\PemesananKendaraan;
use App\Models\PersetujuanPemesananKendaraan;

class AdminController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::count();
        $user = User::count();
        $pemesanan = PemesananKendaraan::count();
        $pending = PersetujuanPemesananKendaraan::where('status', 'Pending')->count();
        $approved = PersetujuanPemesananKendaraan::where('status', 'Approved')->count();
        $rejected = PersetujuanPemesananKendaraan::where('status', 'Rejected')->count();

        return view('admin.dashboard', compact('kendaraan', 'user', 'pemesanan', 'pending', 'approved', 'rejected'));
    }

    public function kendaraan()
    {
        $kendaraan = Kendaraan::all();

        return view('admin.kendaraan.index', compact('kendaraan'));
    }

    public function createKendaraan()
    {
        return view('admin.kendaraan.create');
    }

    public function storeKendaraan(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'nomor_polisi' => 'required|unique:kendaraan',
            'kapasitas' => 'required|numeric'
        ]);

        $kendaraan = new Kendaraan;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->nomor_polisi = $request->nomor_polisi;
        $kendaraan->kapasitas = $request->kapasitas;
        $kendaraan->save();

        return redirect()->route('admin.kendaraan')->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function editKendaraan(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    public function updateKendaraan(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'nomor_polisi' => 'required|unique:kendaraan,nomor_polisi,'.$kendaraan->id,
            'kapasitas' => 'required|numeric'
        ]);

        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->nomor_polisi = $request->nomor_polisi;
        $kendaraan->kapasitas = $request->kapasitas;
        $kendaraan->save();

        return redirect()->route('admin.kendaraan')->with('success', 'Kendaraan berhasil diupdate');
    }

    public function deleteKendaraan(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('admin.kendaraan')->with('success', 'Kendaraan berhasil dihapus');
    }

    public function user()
    {
        $user = User::all();

        return view('admin.user.index', compact('user'));
    }

}
