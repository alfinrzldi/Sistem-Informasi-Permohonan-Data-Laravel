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
    Schema::create('data_masuk', function (Blueprint $table) {
        $table->id(); // Primary key tetap id
        $table->string('perusahaan');
        $table->string('nama');
        $table->string('email')->unique(); // Membuat email sebagai unique field
        $table->string('telepon');
        $table->string('identitas');
        $table->string('jenis_info');
        $table->string('tujuan_info');
        $table->binary('data');
        $table->date('jam_masuk');
        $table->date('jam_keluar');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_masuk');
    }
};
