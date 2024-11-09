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
            <h1 class="text-3xl font-base text-slate-700">Dashboard Admin</h1>
    
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h6 class="text-md font-semibold text-slate-700">Pendapatan</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ 'Rp ' . number_format($pendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h6 class="text-md font-semibold text-slate-700">Total Selesai</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $jumlahSelesai }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h6 class="text-md font-semibold text-slate-700">Total Dalam Proses</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $jumlahProses }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h6 class="text-md font-semibold text-slate-700">Total Tidak Bisa</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $jumlahTidakBisa }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection