<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    private $triggerName = 'trigger_after_delete_pemasukan';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE OR REPLACE TRIGGER $this->triggerName
            AFTER DELETE ON pemasukan FOR EACH ROW
            BEGIN
                DECLARE j_pemasukan VARCHAR(100);

                SELECT jenis_pemasukan INTO j_pemasukan FROM jenis_pemasukan WHERE id = OLD.id_jenis_pemasukan;

                -- SET @deskripsi := IFNULL(NEW.deskripsi, 'NULL');
                SET @jumlah_pemasukan := IFNULL(OLD.jumlah_pemasukan, 'NULL');

                CALL Logger('DELETE',
                    CONCAT(
                        'id_pemasukan: ', OLD.id,
                        ', jenis_pemasukan: ', j_pemasukan,

                        ', tanggal_pemasukan: ', OLD.tanggal_pemasukan,
                        -- ', deskripsi: ', @deskripsi,
                        ', jumlah_pemasukan: ', @jumlah_pemasukan
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
