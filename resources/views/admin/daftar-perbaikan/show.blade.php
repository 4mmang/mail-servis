@extends('layouts.master')
@section('content')
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Navbar di atas konten utama -->
        <nav class="bg-white p-4 sticky top-0 z-10">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold md:hidden">
                    <a href="{{ url('/') }}" class="text-3xl text-slate-700">Mail Serv!s</a>
                </div>
                <!-- Tombol toggle sidebar -->
                <button id="menu-btn" class="p-2 rounded-lg text-dark md:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <!-- Menu navigasi untuk desktop -->
                <ul class="hidden md:flex space-x-4 ml-auto text-red-500">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </ul>
            </div>
        </nav>

        <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            <form action="{{ route('daftar-perbaikan.update', $perbaikan->id) }}" method="post" id="form">
                @method('put')
                @csrf
                <h1 class="text-3xl font-base text-slate-700 mb-4">Detail Perbaikan</h1>
                @if (session('message'))
                <p class="mb-5 border py-2 px-3 w-full bg-green-400 rounded-md text-white">{{ session('message') }}</p>
                @endif
                <div class="border p-6 shadow-lg bg-slate-100 rounded-md pb-7">
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap ">
                        <div class="w-full lg:w-1/2">
                            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                            <input @if ($perbaikan->status === "selesai")
                            disabled
                        @endif type="text" autofocus id="nama" value="{{ $perbaikan->nama }}" name="nama"
                                placeholder="Masukkan nama"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="no_handphone" class="block text-gray-700 text-sm font-bold mb-2">No. HP:</label>
                            <input @if ($perbaikan->status === "selesai")
                            disabled
                        @endif type="number" id="no_handphone" name="no_handphone"
                                value="{{ $perbaikan->no_handphone }}" placeholder="Masukkan nomor handphone"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="biaya_pengerjaan" class="block text-gray-700 text-sm font-bold mb-2">Biaya
                                Pengerjaan:</label>
                            <input @if ($perbaikan->status === "selesai")
                            disabled
                        @endif type="number" id="biaya_pengerjaan" name="biaya_pengerjaan"
                                value="{{ $perbaikan->biaya_pengerjaan }}" placeholder="Masukkan biaya pengerjaan"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                                Barang:</label>
                            <select @if ($perbaikan->status === 'selesai') disabled @endif name="kategori_id"
                                class="w-full py-2.5 px-2">
                                <option value="1" @if ($perbaikan->kategori_id === 1) selected @endif>Handphone</option>
                                <option value="2" @if ($perbaikan->kategori_id === 2) selected @endif>Laptop</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                            <input @if ($perbaikan->status === 'selesai') disabled @endif type="text" autofocus
                                id="nama_barang" name="nama_barang" value="{{ $perbaikan->nama_barang }}"
                                placeholder="Masukkan jenis barang"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="w-full lg:w-1/2">
                            <label for="kerusakan" class="block text-gray-700 text-sm font-bold mb-2">Kerusakan:</label>
                            <input @if ($perbaikan->status === 'selesai') disabled @endif type="text" id="kerusakan"
                                name="kerusakan" placeholder="Masukkan kerusakan" value="{{ $perbaikan->kerusakan }}"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="w-full lg:w-1/2">
                            <label for="tanggal_selesai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                Selesai:</label>
                            <input @if ($perbaikan->status === 'selesai') disabled @endif type="date" id="tanggal_selesai"
                                name="tanggal_selesai" placeholder="Masukkan tanggal_selesai"
                                value="{{ $perbaikan->tanggal_selesai }}"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4 mb-2">
                        <div class="w-full">
                            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Kelengkapan
                                Barang:</label>
                            <textarea @if ($perbaikan->status === 'selesai') disabled @endif type="text" cols="5" rows="5" autofocus
                                id="deskripsi" name="deskripsi" placeholder="Masukkan kelengkapan barang"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>{{ $perbaikan->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="w-full mb-6">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status Perbaikan:</label>
                        <select name="status" @if ($perbaikan->status === 'selesai') disabled @endif class="w-full py-2.5 px-2">
                            <option value="proses" @if ($perbaikan->status === 'proses') selected @endif>Proses</option>
                            <option value="selesai" @if ($perbaikan->status === 'selesai') selected @endif>Selesai</option>
                            <option value="tidak bisa" @if ($perbaikan->status === 'tidak bisa') selected @endif>Tidak bisa
                            </option>
                        </select>
                    </div>
                    @if ($perbaikan->status !== 'selesai')
                        <button id="submit-button" type="submit"
                            class="border p-2 px-4 py-2 rounded-md bg-slate-700 text-white"><i
                                class="fas fa-save mr-1"></i>Update</button>
                    @endif
                    <a href="{{ route('daftar-perbaikan.index') }}"
                        class="border p-2 px-4 py-3 rounded-md bg-indigo-700 text-white"><i
                            class="fas fa-arrow-left mr-1"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('form').addEventListener('submit', function() {
            const submitButton = document.getElementById('submit-button');

            // Nonaktifkan tombol setelah form dikirim
            submitButton.disabled = true;

            // Ubah teks atau tampilkan loading indicator (opsional)
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        });
    </script>
@endpush
