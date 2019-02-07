<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleordensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->unsignedInteger('orden_id');
            $table->foreign('orden_id')->references('id')->on('ordenes');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unique(['orden_id','producto_id']);
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
        Schema::dropIfExists('detalleordens');
    }
}
