
/**
 * Created by PhpStorm.
 * User: gsm_g
 * Date: 04/01/2018
 * Time: 17:21
 */


@extends('layouts.principal')

@section('pagina', 'Categorias')

@extends('layouts.botaoNovo')

@section('novo', route("categorias.create"));

@section('conteudo')

    <link href="/css/tabelas.css" rel="stylesheet">

    <table class="table table-hover">
        <thead>

        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th><center>Editar</center></th>



        </thead>
        <tbody>
        @forelse($categorias as $linha)
            <tr>


                <td>{{ $linha->id }} </td>
                <td>{{ $linha->nome }} </td>
                <td>{{ $linha->descricao }} </td>




                <td>
                    <center>  <form class="form-horizontal" action = "{{route('categorias.edit',['id' => $linha->id ])}}">
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
            {{--@empty--}}
            <tr>
                <td colspan="2"> Nenhuma Cetgoria Cadastraddo. </td>
            </tr>

            {{--@endforelse--}}

        @endforelse



        </tbody>
    </table>

@endsection