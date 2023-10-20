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
            $table->char('id_dkm', 10)->primary()->nullable(false);
            $table->char('username')->nullable(false);
            $table->string('nama_dkm', 60)->nullable(false);
            $table->string('foto_dkm')->nullable(true);

            $table->foreign('username')->on('user')->references('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dkm');
    }
};
