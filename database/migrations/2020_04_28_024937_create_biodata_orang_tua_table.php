<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataOrangTuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_orang_tua', function (Blueprint $table) {
            $table->id();
            $table->enum('ortu_jenis', ['Ayah', 'Ibu']);
            $table->string('ortu_nama', 50);
            $table->date('ortu_tanggal_lahir');
            $table->string('ortu_lulusan', 50);
            $table->string('ortu_alamat', 128);
            $table->integer('ortu_rt')->nullable();
            $table->integer('ortu_rw')->nullable();
            $table->string('ortu_kelurahan', 50);
            $table->string('ortu_kecamatan', 50);
            $table->string('ortu_kabupaten', 50);
            $table->string('ortu_propinsi', 50);
            $table->string('ortu_pekerjaan', 50);
            $table->string('nomor_ktp', 50);
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
        Schema::dropIfExists('biodata_orang_tua');
    }
}
