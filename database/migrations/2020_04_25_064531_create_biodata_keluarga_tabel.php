<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataKeluargaTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('keluarga_nama', 50)->nullable();
            $table->string('keluarga_jenis', 15)->nullable();
            $table->enum('keluarga_gender', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('keluarga_tanggal_lahir')->nullable();
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
        Schema::dropIfExists('biodata_keluarga');
    }
}
