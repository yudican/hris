<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_permission', function (Blueprint $table) {
            $table->BigInteger('menu_id')->unsigned();            
            $table->BigInteger('permission_id')->unsigned(); 

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');           
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');  
            
            $table->primary(['menu_id', 'permission_id'], 'menu_permission_menu_id_foreign');
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
        Schema::dropIfExists('menu_permission');
    }
}
