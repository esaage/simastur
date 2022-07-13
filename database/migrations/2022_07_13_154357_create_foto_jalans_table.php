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
        Schema::create('foto_jalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jalan_id')->constrained('jalans');
            $table->enum('jenis',['ujung','pangkal']);
            $table->char('file');
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
        Schema::dropIfExists('foto_jalans');
    }
};
