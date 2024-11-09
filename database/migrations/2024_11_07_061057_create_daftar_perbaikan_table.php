<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_perbaikan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_handphone');
            $table->dateTime('waktu_masuk');
            $table->double('biaya_pengerjaan');
            $table->integer('kategori_id');
            $table->string('nama_barang');
            $table->string('kerusakan');
            $table->date('tanggal_selesai');
            $table->text('deskripsi');
            $table->enum('status', ['selesai', 'proses', 'tidak bisa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_perbaikan');
    }
};
