
/**
* Created by PhpStorm.
* User: gsm_g
* Date: 04/01/2018
* Time: 17:29
*/


@extends('layouts.ecoCliente')

@section('pagina', 'Ítens')


@section('conteudo')

    <link href="/css/tabelas.css" rel="stylesheet">

    <table class="table table-hover">
        <thead>

        <th>ID</th>

        <th>Quantidade</th>
        <th>Produto</th>
        <th>Cliente</th>

        <th><center>Editar</center></th>
        <th><center>Excluir</center></th>

        </thead>
        <tbody>
        @forelse($itens as $linha)
            <tr>


                <td>{{ $linha->id }} </td>
                <td>{{ $linha->quantidade }} </td>
                <td>{{ $linha->produto_id }} </td>

                <td>{{ $linha->cliente_id }} </td>



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