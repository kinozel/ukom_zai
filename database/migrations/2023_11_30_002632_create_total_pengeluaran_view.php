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
        DB::unprepared("
            CREATE OR REPLACE VIEW total_pengeluaran_view AS
            SELECT
                SUM(jumlah_pengeluaran) AS total_pengeluaran
            FROM
                pengeluaran
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_pengeluaran_view');
    }
};
