<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPelamarIdToProsesSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proses_seleksi', function (Blueprint $table) {
            $table->bigInteger('pelamar_id')->unsigned()->nullable();
            $table->foreign('pelamar_id')->references('id')->on('pelamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proses_seleksi', function (Blueprint $table) {
            $table->dropColumn('pelamar_id');
            $table->dropForeign('proses_seleksi_pelamar_id_foreign');
        });
    }
}
