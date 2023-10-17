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
            $table->char('id_pengeluaran', 10)->primary()->autoIncrement()->nullable(false);
            $table->char('id_jenis_pengeluaran', 10);
            $table->foreign('id_jenis_pengeluaran')->references('id_jenis_pengeluaran')->on('jenis_pengeluaran');
            $table->string('jumlah_pengeluaran', 20);
            $table->datetime('tanggal_pengeluaran');
            $table->string('dokumentasi_pengeluaran', 255)->nullable();
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
