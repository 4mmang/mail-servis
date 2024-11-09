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
            <!--Container-->
            <div class="container w-full mx-auto px-2">

                <!--Title-->
                <h1 class="text-3xl font-base text-slate-700 mb-5">Daftar Perbaikan</h1>
                <a href="{{ url('admin/daftar-perbaikan/create') }}"
                    class="border bg-indigo-600 text-white px-3 py-2 rounded-full"><i
                        class="fas fa-plus mr-1"></i>Tambah</a>
                <!--Card-->
                <div id='recipients' class="p-8 mt-7 rounded shadow-lg bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead class="text-sm">
                            <tr>
                                <th data-priority="1" class="whitespace-nowrap">No</th>
                                <th data-priority="2" class="whitespace-nowrap">Nama</th>
                                <th data-priority="3" class="whitespace-nowrap">Tanggal Masuk</th>
                                <th data-priority="4" class="whitespace-nowrap">Nama Barang</th>
                                <th data-priority="5" class="whitespace-nowrap">Status</th>
                                <th data-priority="6" class="whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($daftarPerbaikan as $perbaikan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $perbaikan->nama }}</td>
                                    <td>{{ $perbaikan->waktu_masuk }}</td>
                                    <td>{{ $perbaikan->nama_barang }}</td>
                                    <td class="whitespace-nowrap">
                                        <span
                                            class="border p-1 px-2 rounded-full text-white
                                            {{ $perbaikan->status === 'selesai' ? 'bg-green-400' : ($perbaikan->status === 'proses' ? 'bg-indigo-500' : 'bg-red-500') }}">
                                            {{ $perbaikan->status }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <form action="{{ route('daftar-perbaikan.destroy', $perbaikan->id) }}"
                                            method="post" id="delete-form-{{ $perbaikan->id }}">
                                            @csrf
                                            @method('delete')
                                            <a target="_blank" href="{{ url('/nota/pdf/' . $perbaikan->id) }}"
                                                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                                Cetak
                                            </a>
                                            <a target="_blank" href="{{ route('daftar-perbaikan.show', $perbaikan->id) }}"
                                                class="inline-block rounded bg-yellow-500 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-600">
                                                Detail
                                            </a>
                                            <button type="submit" onclick="disableDeleteButton({{ $perbaikan->id }})"
                                                class="inline-block rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--/Card-->
            </div>
            <!--/container-->
        </div>
    </div>
    @if (session('message'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('message') }}",
                icon: "success"
            });
        </script>
    @endif
@endsection
@push('scripts')
    <script>
        function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-form-${id} button`);
            button.disabled = true;
            button.textContent = 'Menghapus...'; // Opsional: Ubah teks tombol saat diklik
            document.querySelector(`#delete-form-${id}`).submit(); // Kirim form
        }
    </script>
@endpush
