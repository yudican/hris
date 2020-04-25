<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataKtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_ktp', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ktp_nomor', 16);
            $table->string('ktp_nama', 50);
            $table->string('ktp_tmp_lahir', 50);
            $table->date('ktp_tgl_lahir');
            $table->enum('ktp_gender', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('ktp_gol_darah', 5);
            $table->string('ktp_alamat', 128);
            $table->integer('ktp_rt')->nullable();
            $table->integer('ktp_rw')->nullable();
            $table->string('ktp_kelurahan', 50);
            $table->string('ktp_kecamatan', 50);
            $table->string('ktp_kabupaten', 50);
            $table->string('ktp_propinsi', 50);
            $table->string('ktp_agama', 30);
            $table->string('ktp_pekerjaan', 50);
            $table->enum('ktp_kewarganegaraan', ['WNI', 'WNA'])->nullable();
            $table->string('ktp_perkawinan', 20);
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
        Schema::dropIfExists('biodata_ktps');
    }
}
