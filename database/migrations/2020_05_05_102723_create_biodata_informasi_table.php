<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('bioin_facebook', 50)->nullable();
            $table->string('bioin_instagram', 50)->nullable();
            $table->string('bioin_twitter', 50)->nullable();
            $table->string('bioin_linkedin', 50)->nullable();
            $table->string('bioin_email', 50)->nullable();
            $table->string('bioin_whatsapp', 15)->nullable();
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
        Schema::dropIfExists('biodata_informasi');
    }
}
