<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    private $storeP = 'LogAct';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS $this->storeP");
        DB::unprepared(
            "CREATE PROCEDURE $this->storeP
            (
                Action ENUM('INSERT', 'UPDATE', 'DELETE'),
                Log TEXT
            )
            BEGIN
                INSERT INTO logs (action, log)
                VALUES (Action, Log);
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS $this->storeP");
    }
};
