<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('subtotal');
            $table->integer('envio');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('metodo_id');
            $table->foreign('metodo_id')->references('id')->on('metodos_pago');
            $table->unsignedInteger('estado_pedido_id');
            $table->foreign('estado_pedido_id')->references('id')->on('estados_pedidos');
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
        Schema::dropIfExists('ordenes');
    }
}
