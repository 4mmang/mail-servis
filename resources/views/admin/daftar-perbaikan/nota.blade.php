<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Nota!</title>
</head>

<body>
    <div class="container">
        <div class="row justify-center">
            <h1 class="text-center mb-3">Mail <span class="text-primary">Serv!s</span></h1>
            <hr class="mt-4">
        </div>
    </div>

    <p class="mt-3 font-weight-bold text-uppercase">Detail Servisan:</p>
    <table class="table table-borderless table-sm">
        <tr>
            <th>Nama</th>
            <td>: {{ $nama }}</td>
        </tr>
        <tr>
            <th>No. Handphone</th>
            <td>: {{ $no_handphone }}</td>
        </tr>
        <tr>
            <th>Biaya Pengerjaan</th>
            <td>: Rp. {{ number_format($biaya_pengerjaan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Jenis Barang</th>
            <td>: {{ $jenis_barang }}</td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td>: {{ $nama_barang }}</td>
        </tr>
        <tr>
            <th>Kerusakan</th>
            <td>: {{ $kerusakan }}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td>: {{ $tanggal_selesai ?? '-' }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>: {{ $deskripsi }}</td>
        </tr>
        <tr>
            <th>Waktu Masuk</th>
            <td>: {{ $waktu_masuk }}</td>
        </tr>
    </table>

    <hr class="mt-4">
    <p class="text-center mt-4 text-sm">HARAP CEK BAIK - BAIK LAPTOP/HP ANDA SEBELUM KELUAR DARI TOKO
        KAMI, KLAIM KERUSAKAN SETELAH KELUAR DARI TOKO KAMI TIDAK
        DAPAT KAMI LAYANI.</p>
        <p class="text-center mt-2 text-danger">#Tidak Ada Garansi Hardware</p>
    <hr class="mt-4">
    <p class="text-center">Terimakasih</p>
</body>

</html>