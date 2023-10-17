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
        Schema::create('dkm', function (Blueprint $table) {
            $table->char('id_dkm', 10)->primary()->autoIncrement()->nullable(false);
            $table->string('username', 50);
            $table->foreign('username')->references('username')->on('user');
            $table->string('nama_dkm', 60);
            $table->string('foto_dkm', 255)->nullable();
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
