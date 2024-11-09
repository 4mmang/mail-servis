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

        {{-- <div class="w-full lg:w-1/2">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" autofocus id="nama" name="nama" placeholder="Masukkan nama"
                class="shadow w-full valid:border-green-500 peer @error('nama')
                                    invalid:border-pink-600
                                @enderror  appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('nama')
            <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                Harap masukkan nama customer
            </p>
            @enderror
        </div> --}}

        <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            <form action="{{ route('daftar-perbaikan.store') }}" method="post" id="form">
                @csrf
                <h1 class="text-3xl font-base text-slate-700 mb-4">Tambah Perbaikan</h1>
                <div class="border p-6 shadow-lg bg-slate-100 rounded-md pb-7">
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap ">
                        <div class="w-full lg:w-1/2">
                            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                            <input type="text" autofocus id="nama" name="nama" placeholder="Masukkan nama"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="no_handphone" class="block text-gray-700 text-sm font-bold mb-2">No. HP:</label>
                            <input type="number" id="no_handphone" name="no_handphone"
                                placeholder="Masukkan nomor handphone"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="biaya_pengerjaan" class="block text-gray-700 text-sm font-bold mb-2">Biaya
                                Pengerjaan:</label>
                            <input type="number" id="biaya_pengerjaan" name="biaya_pengerjaan"
                                placeholder="Masukkan biaya pengerjaan"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                                Barang:</label>
                            <select name="kategori_id" class="w-full py-2.5 px-2">
                                <option value="1">Handphone</option>
                                <option value="2">Laptop</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                            <input type="text" autofocus id="nama_barang" name="nama_barang"
                                placeholder="Masukkan jenis barang"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="w-full lg:w-1/2">
                            <label for="kerusakan" class="block text-gray-700 text-sm font-bold mb-2">Kerusakan:</label>
                            <input type="text" id="kerusakan" name="kerusakan" placeholder="Masukkan kerusakan"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="w-full lg:w-1/2">
                            <label for="tanggal_selesai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                Selesai:</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                placeholder="Masukkan tanggal_selesai"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4 mb-6">
                        <div class="w-full">
                            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Kelengkapan
                                Barang:</label>
                            <textarea type="text" cols="5" rows="5" autofocus id="deskripsi" name="deskripsi"
                                placeholder="Masukkan kelengkapan barang"
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required></textarea>
                        </div>
                    </div>
                    <button id="submit-button" type="submit"
                        class="border p-2 px-4 py-2 rounded-md bg-slate-700 text-white"><i
                            class="fas fa-save mr-1"></i>Simpan</button>
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
