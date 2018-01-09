
/**
 * Created by PhpStorm.
 * User: gsm_g
 * Date: 04/01/2018
 * Time: 21:33
 */


@extends('layouts.principal')

@section('pagina', 'Cadastrar Categoria')

@section('conteudo')


    <fieldset class="posForm">

        <form class=" form-horizontal col-sm-12 " action = "{{route('categorias.store')}}"method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <br>

            <div class="form-group">
                <label class="control-label col-sm-2">Nome:</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nome" type="text" required></input>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" >Descrição:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="descricao" type="text" required></input>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary btn-md bot-salvar">Salvar</button>
                </div>
            </div>
        </form>
    </fieldset>
@endsection