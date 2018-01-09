@extends('layouts.ecoPrincipal')

@section('pagina', 'Cadastrar Clientes')


@section('conteudo')


    <fieldset class="posForm">

        <form class=" form-horizontal col-sm-12 " action = "{{route('clientes.store')}}"method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <br>

            <div class="form-group">
                <label class="control-label col-sm-2">Nome:</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nome" type="text" required></input>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >CPF:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="cpf" type="text" required></input>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Email:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="email" type="email" required></input>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Senha:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="senha" type="password" required></input>
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