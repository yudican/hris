<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataPengalamanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_pengalaman_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('bp_perusahan', 100);
            $table->string('bp_jabatan', 100);
            $table->string('bp_kota', 50);
            $table->string('bp_mulai', 20);
            $table->string('bp_akhir', 20)->nullable();
            $table->string('bp_gaji_terakhir', 15);
            $table->string('bp_nama_atasan', 50);
            $table->string('bp_nomor_tlp_atasan', 15);
            $table->string('bp_jobdesc', 128);
            $table->string('bp_alasan_berhenti');
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
        Schema::dropIfExists('biodata_pengalaman_kerja');
    }
}
