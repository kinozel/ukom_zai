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
        Schema::create('jamaah', function (Blueprint $table) {
            $table->char('id_anggota_jamaah')->primary();
            $table->char('username')->nullable(false);
            $table->string('nama_jamaah', 60)->nullable(false);
            $table->text('alamat_jamaah')->nullable(false);
            $table->string('foto_jamaah')->nullable(true);


            $table->foreign('username')->on('user')->references('username');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah');
    }
};
