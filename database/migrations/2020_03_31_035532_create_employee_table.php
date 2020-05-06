<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan_nama', 100)->nullable();
            $table->text('perusahaan_alamat')->nullable();
            $table->string('perusahaan_kelurahan', 30)->nullable();
            $table->string('perusahaan_kecamatan', 30)->nullable();
            $table->string('perusahaan_kabupaten', 30)->nullable();
            $table->string('perusahaan_provinsi', 30)->nullable();
            $table->string('perusahaan_kodepos', 8)->nullable();
            $table->string('perusahaan_email', 50)->nullable();
            $table->string('perusahaan_fax', 15)->nullable();
            $table->string('perusahaan_telepon', 15)->nullable();
            $table->string('perusahaan_twitter', 128)->nullable();
            $table->string('perusahaan_facebook', 128)->nullable();
            $table->string('perusahaan_instagram', 128)->nullable();
            $table->string('perusahaan_website', 50)->nullable();
            $table->string('perusahaan_logo', 128)->nullable();
            $table->string('perusahaan_favicon', 128)->nullable();
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
        Schema::dropIfExists('employee');
    }
}
