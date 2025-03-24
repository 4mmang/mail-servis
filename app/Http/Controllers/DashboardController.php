<?php

namespace App\Http\Controllers;

use App\Models\DaftarPerbaikan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendapatanSetahunTerakhir = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i); // Ambil bulan mundur dari sekarang
            $labels[] = $bulan->translatedFormat('F'); // Format nama bulan dalam bahasa lokal

            $pendapatanSetahunTerakhir[] = DaftarPerbaikan::where('status', 'selesai')
                ->whereMonth('updated_at', $bulan->month)
                ->whereYear('updated_at', $bulan->year)
                ->sum('biaya_pengerjaan');
        }

        $perbaikan = DaftarPerbaikan::where('status', 'selesai')->get();
        $pendapatan = 0;
        foreach ($perbaikan as $p) {
            $pendapatan += $p->biaya_pengerjaan;
        }

        $perbaikanBulanIni = DaftarPerbaikan::where('status', 'selesai')
            ->whereMonth('updated_at', Carbon::now()->month)
            ->whereYear('updated_at', Carbon::now()->year)
            ->get();

        $pendapatanBulanIni = 0;
        foreach ($perbaikanBulanIni as $p) {
            $pendapatanBulanIni += $p->biaya_pengerjaan;
        }

        // for ($i = 1; $i <= 12; $i++) {
        //     $pendapatanSetahunTerakhir[] = DaftarPerbaikan::where('status', 'selesai')
        //         ->whereMonth('updated_at', $i)
        //         ->whereYear('updated_at', Carbon::now()->year)
        //         ->sum('biaya_pengerjaan');
        // }

        $jumlahProses = DaftarPerbaikan::where('status', 'proses')->count();
        $jumlahSelesai = DaftarPerbaikan::where('status', 'selesai')->count();
        $jumlahTidakBisa = DaftarPerbaikan::where('status', 'tidak bisa')->count();
        return view('admin.dashboard', compact('pendapatan', 'pendapatanBulanIni', 'jumlahProses', 'jumlahSelesai', 'jumlahTidakBisa', 'pendapatanSetahunTerakhir', 'labels'));
    }
}
