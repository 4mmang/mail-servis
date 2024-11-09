<?php

namespace App\Http\Controllers;

use App\Models\DaftarPerbaikan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $perbaikan = DaftarPerbaikan::where('status', 'selesai')->get();
        $pendapatan = 0;
        foreach ($perbaikan as $p) {
            $pendapatan += $p->biaya_pengerjaan;
        }
        $jumlahProses = DaftarPerbaikan::where('status', 'proses')->count();
        $jumlahSelesai = DaftarPerbaikan::where('status', 'selesai')->count();
        $jumlahTidakBisa = DaftarPerbaikan::where('status', 'tidak bisa')->count();
        return view('admin.dashboard', compact('pendapatan', 'jumlahProses', 'jumlahSelesai', 'jumlahTidakBisa'));
    }
}
