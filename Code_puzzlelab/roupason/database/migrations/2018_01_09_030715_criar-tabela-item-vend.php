<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaItemVend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('item-vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantidade');
            $table->double('total')->nullable();


            $table->integer('produto_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('venda_id')->unsigned();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('item_vendas');
    }
}
