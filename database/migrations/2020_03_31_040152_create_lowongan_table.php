<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->string('lowongan_bagian', 128)->nullable();
            $table->string('lowongan_karyawan', 128)->nullable();
            $table->string('lowongan_salary_max', 128)->nullable();
            $table->string('lowongan_wilayah', 128)->nullable();
            $table->string('lowongan_deskripsi', 128)->nullable();
            $table->string('lowongan_kualifikasi', 128)->nullable();
            $table->string('lowongan_status', 128)->nullable();
            $table->date('lowongan_tanggal_open')->nullable();
            $table->date('lowongan_tanggal_close')->nullable();
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
        Schema::dropIfExists('lowongan');
    }
}
