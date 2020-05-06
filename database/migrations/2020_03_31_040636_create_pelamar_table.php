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
            $table->string('pelamar_nik', 18)->nullable();
            $table->string('pelamar_nama', 50)->nullable();
            $table->text('pelamar_alamat')->nullable();
            $table->string('pelamar_rt', 5)->nullable();
            $table->string('pelamar_rw', 5)->nullable();
            $table->string('pelamar_kelurahan', 30)->nullable();
            $table->string('pelamar_kecamatan', 30)->nullable();
            $table->string('pelamar_kabupaten', 30)->nullable();
            $table->string('pelamar_provinsi', 30)->nullable();
            $table->string('pelamar_kodepos', 8)->nullable();
            $table->string('pelamar_hp', 15)->nullable();
            $table->string('pelamar_email', 50)->nullable();
            $table->string('pelamar_major', 128)->nullable();
            $table->string('pelamar_jurusan', 50)->nullable();
            $table->string('pelamar_foto', 128)->nullable();
            $table->date('pelamar_tanggal_lahir')->nullable();
            $table->string('pelamar_status', 15)->nullable();
            $table->date('pelamar_tanggal')->nullable();
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
