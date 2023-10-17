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
            $table->char('id_anggota_jamaah', 10)->primary()->autoIncrement()->nullable(false);
            $table->string('username', 50);
            $table->foreign('username')->references('username')->on('user');
            $table->string('nama_jamaah', 60);
            $table->text('alamat_jamaah');
            $table->string('foto_jamaah', 255)->nullable();
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
