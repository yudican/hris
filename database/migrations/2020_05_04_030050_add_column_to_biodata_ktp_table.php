<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBiodataKtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodata_ktp', function (Blueprint $table) {
            $table->integer('ktp_tinggi_badan')->nullable();
            $table->integer('ktp_berat_badan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biodata_ktp', function (Blueprint $table) {
            $table->dropColumn('ktp_tinggi_badan');
            $table->dropColumn('ktp_berat_badan');
        });
    }
}
