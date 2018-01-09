@extends('layouts.principal')

@section('pagina', 'Cadastrar Usuário')


@section('conteudo')


    <fieldset class="posForm">

    <form class=" form-horizontal col-sm-12 " action = "{{route('usuarios.store')}}"method = "post">
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
            <label class="control-label col-sm-2" >Tipo De Usuário:</label>
            <div class="col-sm-6">
                <select class="form-control" name="tipo" required>

                            <option value="Administrador"> Administrador</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Usuário:</label>
            <div class="col-sm-6">
                <input class="form-control" name="usuario" type="text" required></input>
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