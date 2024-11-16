<?php

namespace App\Http\Controllers;

use App\Models\DaftarPerbaikan;
use Illuminate\Http\Request;

class DaftarPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarPerbaikan = DaftarPerbaikan::orderBy('waktu_masuk', 'desc')->get();
        return view('admin.daftar-perbaikan.index', compact('daftarPerbaikan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.daftar-perbaikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_handphone' => ['required', 'numeric'],
            'biaya_pengerjaan' => 'required',
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'kerusakan' => 'required',
            'tanggal_selesai' => 'nullable',
            'deskripsi' => 'required',
        ]);

        $perbaikan = new DaftarPerbaikan();
        $perbaikan->nama = $request->nama;
        $perbaikan->no_handphone = $request->no_handphone;
        $perbaikan->biaya_pengerjaan = $request->biaya_pengerjaan;
        $perbaikan->kategori_id = $request->kategori_id;
        $perbaikan->nama_barang = $request->nama_barang;
        $perbaikan->kerusakan = $request->kerusakan;
        $perbaikan->tanggal_selesai = $request->tanggal_selesai;
        $perbaikan->deskripsi = $request->deskripsi;
        $perbaikan->waktu_masuk = \Carbon\Carbon::now('Asia/Makassar');
        $perbaikan->save();
        return redirect()->route('nota.pdf', $perbaikan->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perbaikan = DaftarPerbaikan::findOrFail($id);
        return view('admin.daftar-perbaikan.show', compact('perbaikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_handphone' => ['required', 'numeric'],
            'biaya_pengerjaan' => 'required',
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'kerusakan' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
        ]);

        $perbaikan = DaftarPerbaikan::findOrFail($id);
        $perbaikan->nama = $request->nama;
        $perbaikan->no_handphone = $request->no_handphone;
        $perbaikan->biaya_pengerjaan = $request->biaya_pengerjaan;
        $perbaikan->kategori_id = $request->kategori_id;
        $perbaikan->nama_barang = $request->nama_barang;
        $perbaikan->kerusakan = $request->kerusakan;
        $perbaikan->tanggal_selesai = $request->tanggal_selesai;
        $perbaikan->deskripsi = $request->deskripsi;
        $perbaikan->status = $request->status;
        $perbaikan->save();

        return back()->with([
            'message' => 'Data perbaikan berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perbaikan = DaftarPerbaikan::findOrFail($id);
        $perbaikan->delete();
        return back()->with([
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
