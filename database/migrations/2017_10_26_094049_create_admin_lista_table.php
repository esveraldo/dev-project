<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminListaTable extends Migration
{
    public function up()
    {
        Schema::create('admin_lista', function (Blueprint $table) {
            $table->integer('lista_id')->unsigned();
            $table->integer('admin_id')->unsigned();

            $table->foreign('lista_id')
                ->references('id')->on('lists')
                ->onDelete('cascade');

            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_lista');
    }
}
