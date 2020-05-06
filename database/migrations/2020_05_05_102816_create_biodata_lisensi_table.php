<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataLisensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_lisensi', function (Blueprint $table) {
            $table->id();
            $table->string('bil_kategori', 20);
            $table->string('bil_jenis', 20);
            $table->string('bil_nomor', 30);
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
        Schema::dropIfExists('biodata_lisensi');
    }
}
