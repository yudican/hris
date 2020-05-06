<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataSusunanAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_susunan_anak', function (Blueprint $table) {
            $table->id();
            $table->string('bsa_nama', 50);
            $table->string('bsa_jenis_anak', 20);
            $table->date('bsa_tanggal_lahir');
            $table->string('bsa_pekerjaan', 50);
            $table->string('bsa_pendidikan', 50);
            $table->string('bsa_alamat');
            $table->string('bsa_nomor_hp', 15);
            $table->enum('bsa_perkawinan', ['Kawin', 'Lajang']);
            $table->string('bsap_jenis', 20)->nullable();
            $table->string('bsap_nama', 50)->nullable();
            $table->string('bsap_pekerjaan', 50)->nullable();
            $table->string('bsap_nomor_hp', 15)->nullable();
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
        Schema::dropIfExists('biodata_susunan_anak');
    }
}
