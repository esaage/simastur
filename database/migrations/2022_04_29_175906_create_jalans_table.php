<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalans', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_ruas')->unique();
            $table->char('nama_ruas');
            $table->foreignId('kecamatan_id')->constrained('kecamatans');
            $table->char('panjang_ruas');
            $table->char('lebar_ruas');
            $table->char('lhr');
            $table->enum('akses',['N','P','K']);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jalans');
    }
};
