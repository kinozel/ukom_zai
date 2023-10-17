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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->char('id_pemasukan', 10)->primary()->autoIncrement()->nullable(false);
            $table->char('id_jenis_pemasukan', 10);
            $table->char('id_anggota_jamaah', 10);
            $table->foreign('id_jenis_pemasukan')->references('id_jenis_pemasukan')->on('jenis_pemasukan');
            $table->foreign('id_anggota_jamaah')->references('id_anggota_jamaah')->on('jamaah');
            $table->string('jumlah_pemasukan', 20);
            $table->datetime('tanggal_pemasukan');
            $table->text('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
