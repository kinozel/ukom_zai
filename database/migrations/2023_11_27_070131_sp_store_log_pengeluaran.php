<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $spName = 'Logger_pengeluaran';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared("DROP PROCEDURE IF EXISTS $this->spName");
        DB::unprepared(
            "CREATE PROCEDURE Logger_pengeluaran
            (
                Action ENUM('INSERT', 'UPDATE', 'DELETE'),
                Log TEXT
            )
            MODIFIES SQL DATA
            BEGIN
                INSERT INTO logs_pengeluaran (action, log)
                VALUES (Action, Log);
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared("DROP PROCEDURE IF EXISTS $this->spName");

    }
};
