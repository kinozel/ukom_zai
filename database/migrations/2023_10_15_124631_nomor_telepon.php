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
        Schema::create('nomor_telepon', function (Blueprint $table) {
            $table->integer('nomor_telepon')->primary();
            $table->char('id_anggota_jamaah', 10);
            $table->foreign('id_anggota_jamaah')->references('id_anggota_jamaah')->on('jamaah');
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
