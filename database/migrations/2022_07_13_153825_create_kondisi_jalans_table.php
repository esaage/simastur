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
        Schema::create('kondisi_jalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jalan_id')->constrained('jalans');
            $table->enum('kondisi',['baik','sedang','rusak ringan','rusak berat']);
            $table->char('panjang');
            $table->char('persentase');
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
        Schema::dropIfExists('kondisi_jalans');
    }
};
