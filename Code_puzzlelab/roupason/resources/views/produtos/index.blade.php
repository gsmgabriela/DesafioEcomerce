
/**
 * Created by PhpStorm.
 * User: gsm_g
 * Date: 04/01/2018
 * Time: 17:29
 */


@extends('layouts.principal')

@section('pagina', 'Produtos')

@extends('layouts.botaoNovo')

@section('novo', route("produtos.create"));

@section('conteudo')

    <link href="/css/tabelas.css" rel="stylesheet">

    <table class="table table-hover">
        <thead>

        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Detalhe</th>
        <th>Grupo</th>
        <th>Preço</th>

        <th>Status</th>

        <th><center>Editar</center></th>

        </thead>
        <tbody>
        @forelse($produtos as $linha)
            <tr>


                <td>{{ $linha->id }} </td>
                <td>{{ $linha->nome }} </td>
                <td>{{ $linha->descricao }} </td>



                @forelse($todCat as $categoria)
                    @if($categoria -> id ==$linha->categoria_id)
                        <td>{{$categoria-> nome}}</td>
                        <td>{{$categoria-> descricao}}</td>
                    @endif
                @empty
                @endforelse

                <td>{{ $linha->grupo }} </td>
                <td>{{ $linha->preco }} </td>

                @if($linha -> status == "1")
                    <td>Inativo</td>
                   @else
                    <td>Ativo</td>
                @endif


                <td>
                    <center>  <form class="form-horizontal" action = "{{route('produtos.edit',['id' => $linha->id ])}}">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <input type = "hidden" name = "_method" value = "PATCH">
                            <div class="col-sm-offset-3 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md edit">\</button>
                            </div>
                        </form>
                    </center>
                </td>



            </tr>

        @empty
            <tr>
                <td colspan="2"> Nenhum Produto Cadastrado. </td>
            </tr>

        @endforelse
        </tbody>
    </table>

@endsection