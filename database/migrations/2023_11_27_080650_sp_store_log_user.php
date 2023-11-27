<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $spName = 'Logger_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared("DROP PROCEDURE IF EXISTS $this->spName");
        DB::unprepared(
            "CREATE PROCEDURE Logger_user
            (
                Action ENUM('INSERT', 'UPDATE', 'DELETE'),
                Log TEXT
            )
            MODIFIES SQL DATA
            BEGIN
                INSERT INTO logs_user (action, log)
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
