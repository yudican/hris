<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataDaruratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_darurat', function (Blueprint $table) {
            $table->id();
            $table->string('bd_jenis', 30);
            $table->string('bd_nama', 50);
            $table->string('bd_pekerjaan', 50);
            $table->string('bd_posisi', 50)->nullable();
            $table->string('bd_domisili');
            $table->string('bd_telepon', 15);
            $table->string('nomor_ktp', 16);
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
        Schema::dropIfExists('biodata_darurat');
    }
}
