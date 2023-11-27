<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    private $triggerName = 'trigger_after_update_pengeluaran';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE OR REPLACE TRIGGER $this->triggerName
            AFTER UPDATE ON pengeluaran FOR EACH ROW
            BEGIN
                DECLARE j_pengeluaran VARCHAR(100);

                SELECT jenis_pengeluaran INTO j_pengeluaran FROM jenis_pengeluaran WHERE id = NEW.id_jenis_pengeluaran;

                -- SET @deskripsi := IFNULL(NEW.deskripsi, 'NULL');
                SET @jumlah_pengeluaran := IFNULL(NEW.jumlah_pengeluaran, 'NULL');

                CALL Logger_pengeluaran('UPDATE',
                    CONCAT(
                        'id_pengeluaran: ', NEW.id,
                        ', jenis_pengeluaran: ', NEW.jenis_pengeluaran,
                        ', tanggal_pengeluaran: ', NEW.tanggal_pengeluaran,
                        -- ', deskripsi: ', @deskripsi,
                        ', jumlah_pengeluaran: ', @jumlah_pengeluaran
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
