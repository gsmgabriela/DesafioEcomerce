<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('descricao', 100)->nullable();
            $table->string('grupo', 20);
            $table->double('preco');

            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('produtos');
    }
}
