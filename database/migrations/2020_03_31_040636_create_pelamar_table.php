<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('lowongan_nik', 18)->nullable();
            $table->string('lowongan_nama', 50)->nullable();
            $table->text('lowongan_alamat')->nullable();
            $table->string('lowongan_rt', 5)->nullable();
            $table->string('lowongan_rw', 5)->nullable();
            $table->string('perusahaan_kelurahan', 30)->nullable();
            $table->string('perusahaan_kecamatan', 30)->nullable();
            $table->string('perusahaan_kabupaten', 30)->nullable();
            $table->string('perusahaan_provinsi', 30)->nullable();
            $table->string('perusahaan_kodepos', 8)->nullable();
            $table->string('lowongan_hp', 15)->nullable();
            $table->string('lowongan_email', 50)->nullable();
            $table->string('lowongan_major', 128)->nullable();
            $table->string('lowongan_jurusan', 50)->nullable();
            $table->string('lowongan_foto', 128)->nullable();
            $table->string('lowongan_status', 15)->nullable();
            $table->date('lowongan_tanggal')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pelamar');
    }
}
