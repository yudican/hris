<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataReferensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_referensi', function (Blueprint $table) {
            $table->id();
            $table->string('br_nama', 50)->nullable();
            $table->string('br_hubungan', 50)->nullable();
            $table->string('br_jabatan', 50)->nullable();
            $table->string('br_cabang', 50)->nullable();
            $table->enum('br_status', ['Tidak', 'Ya']);
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
        Schema::dropIfExists('biodata_referensi');
    }
}
