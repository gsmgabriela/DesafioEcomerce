/**
* Created by PhpStorm.
* User: gsm_g
* Date: 06/01/2018
* Time: 02:27
*/

@extends('layouts.principal')

@section('pagina', 'Cadastrar Produto')


@section('conteudo')


    <fieldset class="posForm">

        <form class=" form-horizontal col-sm-12 " action = "{{route('produtos.store')}}"method = "post" enctype="multipart/form-data">
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
                <label class="control-label col-sm-2" >Categoria:</label>
                <div class="col-sm-6">
                    <select class="form-control" name="categoria" required>
                        @forelse($todCat as $linha)

                            <option value="{{$linha-> id}}"> {{$linha-> nome}} /..{{$linha->descricao}} </option>
                        @empty
                            <option disabled>Não há Categorias Cadastrados</option>

                        @endforelse

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Grupo:</label>
                <div class="col-sm-6">
                    <select class="form-control" name="grupo" required>

                        <option value="feminino"> Feminino </option>
                        <option value="masculino"> Masculino </option>
                        <option value="infantil"> Infantil </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Imagem Produto:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="img" type="file" required></input>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" >Preço:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="preco" type="text" required></input>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Estoque Inícial:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="quantidade" type="text" required></input>
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