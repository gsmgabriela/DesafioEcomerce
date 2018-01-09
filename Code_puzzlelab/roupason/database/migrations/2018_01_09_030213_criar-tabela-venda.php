<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantidade');
            $table->double('total_venda')->nullable();


            $table->integer('cliente_id')->unsigned();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');


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
        Schema::dropIfExists('vendas');
    }
}
