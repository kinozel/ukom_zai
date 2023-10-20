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
            $table->char('nomor_telepon', 13)->nullable(false)->primary();
            $table->char('id_anggota_jamaah')->nullable(false);
  
  
            $table->foreign('id_anggota_jamaah')->on('jamaah')->references('id_anggota_jamaah');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomor_telepon');
    }
};
