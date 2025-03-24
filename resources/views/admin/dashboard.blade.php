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
                        <h6 class="text-md font-semibold text-slate-700">Total Pendapatan</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">
                            {{ 'Rp ' . number_format($pendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h6 class="text-md font-semibold text-slate-700">Pendapatan Buulan Ini</h6>
                        <p class="text-4xl font-bold text-slate-700 mt-4">
                            {{ 'Rp ' . number_format($pendapatanBulanIni, 0, ',', '.') }}
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
                <canvas id="myLineChart" class="mt-10" style="height: 300px; width: 100%"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var line = document.getElementById('myLineChart').getContext('2d');
        const pendapatanSetahunTerakhir = @json($pendapatanSetahunTerakhir);
        const labels = @json($labels);
        var myLineChart = new Chart(line, {
            type: 'line',
            data: {
                labels: labels, // Gunakan label dinamis
                datasets: [{
                    label: ' Total Pendapatan',
                    data: pendapatanSetahunTerakhir,
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1.5,
                    tension: 0.1,
                    pointStyle: 'circle',
                }, ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Total Pendapatan Dalam Setahun Terakhir'
                    },
                    legend: {
                        labels: {
                            usePointStyle: true, // Ubah ikon legenda menjadi bulat
                            pointStyle: 'circle', // Pastikan bentuknya lingkaran
                        }
                    }
                },
                animations: {
                    tension: {
                        duration: 2000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false, // Menjaga tinggi chart
                        beginAtZero: true,
                        // ticks: {
                        //     stepSize: 1, // Kenaikan 1 per langkah
                        //     callback: function(value) {
                        //         return Number.isInteger(value) ? value : null; // Hanya tampilkan bilangan bulat
                        //     }
                        // }
                    }
                }
            }
        });
    </script>
@endpush
