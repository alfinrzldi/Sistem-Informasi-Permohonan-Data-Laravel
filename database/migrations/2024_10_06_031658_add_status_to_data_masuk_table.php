<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('data_masuk', function (Blueprint $table) {
        $table->enum('status', ['permohonan_baru', 'permohonan_proses', 'permohonan_selesai'])->default('permohonan_baru');
    });
}

public function down()
{
    Schema::table('data_masuk', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
