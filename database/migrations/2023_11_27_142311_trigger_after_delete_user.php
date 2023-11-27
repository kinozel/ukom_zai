<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    private $triggerName = 'trigger_after_delete_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE OR REPLACE TRIGGER $this->triggerName
            AFTER DELETE ON user FOR EACH ROW
            BEGIN
                -- DECLARE j_pengeluaran VARCHAR(100);

                -- SELECT jenis_pengeluaran INTO j_pengeluaran FROM jenis_pengeluaran WHERE id = NEW.id_jenis_pengeluaran;

                -- SET @deskripsi := IFNULL(NEW.deskripsi, 'NULL');
                -- SET @role := IFNULL(OLD.role, 'NULL');

                CALL Logger_user('DELETE',
                    CONCAT(
                        'username: ', OLD.username,
                        ', passowrd: ', OLD.password,
                        -- ', deskripsi: ', @deskripsi,
                        ', role: ', OLD.role
                    )
                );
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared("DROP TRIGGER IF EXISTS $this->triggerName");

    }
};
