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
        DB::unprepared("DROP FUNCTION IF EXISTS total_pemasukan");
        DB::statement('
        CREATE FUNCTION total_pemasukan() 
        RETURNS INT
        BEGIN
            DECLARE total INT;
            
            SELECT SUM(jumlah_pemasukan) INTO total 
            FROM pemasukan; 

        RETURN total;
        END
        '); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS total_pemasukan');
    }
};