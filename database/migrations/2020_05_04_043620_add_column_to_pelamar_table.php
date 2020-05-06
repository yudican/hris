<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelamar', function (Blueprint $table) {
            $table->string('pelamar_tinggal_dengan', 30)->nullable();
            $table->string('pelamar_jenis_tinggal', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelamar', function (Blueprint $table) {
            $table->dropColumn('pelamar_tinggal_dengan');
            $table->dropColumn('pelamar_jenis_tinggal');
        });
    }
}
