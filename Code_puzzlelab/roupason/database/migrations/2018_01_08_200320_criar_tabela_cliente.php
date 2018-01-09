<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('cpf', 15)->nullable();
            $table->string('email', 110)->unique();
            $table->string('senha');


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
        Schema::dropIfExists('clientes');
    }
}
