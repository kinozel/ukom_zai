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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_pengeluaran')->nullable(false);
            $table->string('jumlah_pengeluaran',20)->nullable(false);
            $table->datetime('tanggal_pengeluaran')->default('2023-01-01 00:00:00')->nullable(false);
            $table->string('dokumentasi_pengeluaran')->nullable(true);

            $table->foreign('id_jenis_pengeluaran')->on('jenis_pengeluaran')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
