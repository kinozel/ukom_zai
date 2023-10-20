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
            $table->id();
            $table->unsignedBigInteger('id_jenis_pemasukan')->nullable(false);
            // $table->char('id_anggota_jamaah')->nullable(false);
            $table->string('jumlah_pemasukan',20)->nullable(false);
            $table->datetime('tanggal_pemasukan')->default('2023-01-01 00:00:00')->nullable(false);
            $table->text('deskripsi')->nullable(true);

            $table->foreign('id_jenis_pemasukan')->on('jenis_pemasukan')->references('id');
            // $table->foreign('id_anggota_jamaah')->on('jamaah')->references('id_anggota_jamaah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
