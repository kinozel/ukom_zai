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
        Schema::create('jenis_pengeluaran', function (Blueprint $table) {
            $table->char('id_jenis_pengeluaran', 10)->primary()->autoIncrement()->nullable(false);
            $table->enum('jenis_pengeluaran', ['jenisA', 'jenisB', 'jenisC']);
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
