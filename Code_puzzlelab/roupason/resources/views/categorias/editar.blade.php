
/**
 * Created by PhpStorm.
 * User: gsm_g
 * Date: 04/01/2018
 * Time: 22:00
 */


@extends('layouts.principal')

@section('pagina', 'Editar Usuário')

@section('novo', route('categorias.create'))

@section('conteudo')

    <fieldset class="posForm">

        <br>
        <form class="form-horizontal "  action = "{{route('categorias.update', ['id' => $categoria-> id])}}"method = "post" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <input type = "hidden" name = "_method" value = "PATCH">


            <div class="form-group">
                <label class="control-label col-sm-2">Nome:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="nome" value="{{$categoria->nome}}" type="text" required></input>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" >Descrição:</label>
                <div class="col-sm-2">
                    <input class="form-control" name="descricao" value="{{$categoria->descricao}}" type="text" required></input>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-2">
                    <button type="submit" class="btn btn-primary btn-md bot-salvar">Salvar</button>
                </div>
            </div>
        </form>
    </fieldset>
@endsection
