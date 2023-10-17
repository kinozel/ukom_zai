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
        Schema::create('jenis_pemasukan', function (Blueprint $table) {
            $table->char('id_jenis_pemasukan', 10)->primary()->autoIncrement()->nullable(false);
            $table->enum('jenis_pemasukan', ['jenis1', 'jenis2', 'jenis3']);
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
