<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDataColumnInDataMasukTable extends Migration
{
    public function up()
    {
        Schema::table('data_masuk', function (Blueprint $table) {
            $table->string('data')->nullable()->change(); // Ubah kolom data menjadi nullable
        });
    }

    public function down()
    {
        Schema::table('data_masuk', function (Blueprint $table) {
            $table->string('data')->nullable(false)->change(); // Kembalikan ke semula jika diperlukan
        });
    }
}
