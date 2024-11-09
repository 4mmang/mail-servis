<?php

namespace App\Http\Controllers;

use App\Models\DaftarPerbaikan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateController extends Controller
{
    public function generatePDF($id)
    {
        // Ambil data `DaftarPerbaikan` berdasarkan ID
        $perbaikan = DaftarPerbaikan::with('kategori')->findOrFail($id);

        // Ubah data menjadi array agar mudah digunakan dalam view
        $data = [
            'nama' => $perbaikan->nama,
            'no_handphone' => $perbaikan->no_handphone,
            'biaya_pengerjaan' => $perbaikan->biaya_pengerjaan,
            'jenis_barang' => $perbaikan->kategori->kategori,
            'nama_barang' => $perbaikan->nama_barang,
            'kerusakan' => $perbaikan->kerusakan,
            'tanggal_selesai' => $perbaikan->tanggal_selesai,
            'deskripsi' => $perbaikan->deskripsi,
            'waktu_masuk' => $perbaikan->waktu_masuk,
        ];

        // Generate PDF dengan data dinamis
        $pdf = PDF::loadView('admin.daftar-perbaikan.nota', $data)
            ->setPaper('A5', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

        return $pdf->stream('form.pdf');
    }

}
