<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    private $triggerName = 'trigger_after_delete_pengeluaran';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE OR REPLACE TRIGGER $this->triggerName
            AFTER DELETE ON pengeluaran FOR EACH ROW
            BEGIN
                DECLARE j_pengeluaran VARCHAR(100);

                SELECT jenis_pengeluaran INTO j_pengeluaran FROM jenis_pengeluaran WHERE id = OLD.id_jenis_pengeluaran;

                -- SET @deskripsi := IFNULL(NEW.deskripsi, 'NULL');
                SET @jumlah_pengeluaran := IFNULL(OLD.jumlah_pengeluaran, 'NULL');

                CALL Logger_pengeluaran('DELETE',
                    CONCAT(
                        'id_pengeluaran: ', OLD.id,
                        ', jenis_pengeluaran: ', OLD.jenis_pengeluaran,

                        ', tanggal_pengeluaran: ', OLD.tanggal_pengeluaran,
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
