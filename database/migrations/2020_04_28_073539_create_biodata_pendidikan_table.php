<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('pendidikan_nama', 100);
            $table->string('pendidikan_kota', 100);
            $table->string('pendidikan_jurusan', 100)->nullable();
            $table->string('pendidikan_jenjang', 10);
            $table->string('pendidikan_fakultas', 100)->nullable();
            $table->string('pendidikan_mulai', 4);
            $table->string('pendidikan_lulus', 4);
            $table->string('pendidikan_ipk', 5)->nullable();
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
        Schema::dropIfExists('biodata_pendidikan');
    }
}
