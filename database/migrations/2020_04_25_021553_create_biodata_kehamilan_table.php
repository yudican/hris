<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataKehamilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_kehamilan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_ktp', 16);
            $table->enum('kehamilan_status', ['Ya', 'Tidak']);
            $table->integer('kehamilan_usia')->nullable();
            $table->date('kehamilan_akhir')->nullable();
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
        Schema::dropIfExists('kehamilan');
    }
}
