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
        Schema::create('superadmin', function (Blueprint $table) {
            $table->char('superadmin', 10)->primary()->nullable(false);
            $table->string('username', 50);
            $table->foreign('username')->references('username')->on('user');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
