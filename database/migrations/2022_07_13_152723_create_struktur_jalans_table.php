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
        Schema::create('struktur_jalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jalan_id')->constrained('jalans');
            $table->enum('jenis',['hotmix','penetrasi_makadam','perkerasan_beton','kerikil','tanah']);
            $table->char('panjang');
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
        Schema::dropIfExists('struktur_jalans');
    }
};
