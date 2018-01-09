
/**
 * Created by PhpStorm.
 * User: gsm_g
 * Date: 06/01/2018
 * Time: 03:27
 */


@extends('layouts.principal')

@section('pagina', 'Editar Produto')

@section('novo', route('produtos.create'))

@section('conteudo')

    <fieldset class="posForm">

        <form class=" form-horizontal col-sm-12 " action = "{{route('produtos.update', ['id' => $produto->id ])}}"method = "post" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <input type = "hidden" name = "_method" value = "PATCH">
            <br>

            <div class="form-group">
                <label class="control-label col-sm-2">Nome:</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nome" type="text" required value="{{$produto->nome}}"></input>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Descrição:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="descricao" type="text" required value="{{$produto->descricao}}"></input>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Categoria:</label>
            <div class="col-sm-4">
                <select class="form-control" name="categoria" type= required>
                    @forelse($todCat as $categoria)
                        @if($categoria -> id ==$produto->categoria_id)
                            <option value="{{$categoria-> id}}" id="categoria" selected>{{$categoria-> nome}} /..{{$categoria->descricao}}</option>
                        @else
                            <option value="{{ $categoria -> id }}" id="categoria">{{$categoria-> nome}} /..{{$categoria->descricao}}</option>
                        @endif
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

                        <option value="feminino" selected> Feminino </option>
                        <option value="masculino"> Masculino </option>
                        <option value="infantil"> Infantil </option>

                            @if($produto -> grupo =="feminino")
                                <option value="feminino" selected> Feminino </option>
                                @else
                                @if($produto -> grupo =="masculino")
                                <option value="masculino" selected> Masculino </option>
                                    @else
                                    @if($produto -> grupo =="infantil")
                                <option value="infantil" selected> Infantil </option>
                                @endif
                            @endif
                        @endif
                    </select>
                </div>
            </div>


        <div class="form-group">
            <label class="control-label col-sm-2" >Imagem Produto:</label>
            <div class="col-sm-4">
                <input class="form-control" name="img" value="{{$produto->img}}"  type="file">{{$produto->img}}</input>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Quantidade:</label>
            <div class="col-sm-6">
                <input class="form-control" name="quantidade" type="text" readonly required value="{{$produto->quantidade}}"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Entrada:</label>
            <div class="col-sm-6">
                <input class="form-control" name="entrada" type="text" ></input>
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Preço:</label>
                <div class="col-sm-6">
                    <input class="form-control" name="preco" type="text" required value="{{$produto->preco}}"></input>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Status:</label>
            <div class="checkbox">

                @if($produto -> status =="1"){
                    <label><input  name="status" type="checkbox" ></input> Desativado</label>
                    }
                    @else
                    <label><input  name="status" type="checkbox" checked="true" ></input> Desativado</label>
               @endif


           </div>
        </div>


            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary btn-md bot-salvar">Salvar</button>
                </div>
            </div>
        </form>

    </fieldset>



    <center><p><img  width="250" height="250" src="/{{ $produto -> img }}"name="ImagemAtual"></img></p></center>





@endsection