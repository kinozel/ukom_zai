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
        DB::unprepared("DROP FUNCTION IF EXISTS total_pengeluaran");
        DB::unprepared('
        CREATE FUNCTION total_pengeluaran() 
        RETURNS INT
        BEGIN
            DECLARE total INT;
            
            SELECT SUM(jumlah_pengeluaran) INTO total 
            FROM pengeluaran; 

        RETURN total;
        END
        '); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS total_pengeluaran');
    }
};
