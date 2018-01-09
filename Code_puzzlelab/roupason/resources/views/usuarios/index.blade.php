@extends('layouts.principal')

@section('pagina', 'Usuários')

@extends('layouts.botaoNovo')

@section('novo', route("usuarios.create"));

@section('conteudo')

    <link href="/css/tabelas.css" rel="stylesheet">

    <table class="table table-hover">
        <thead>

        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Tipo</th>

        <th><center>Editar</center></th>
        <th><center>Excluir</center></th>


        </thead>
        <tbody>
        @forelse($usuarios as $linha)
            <tr>

                <td>{{ $linha->id }} </td>
                <td>{{ $linha->nome }} </td>
                <td>{{ $linha->cpf }} </td>
                <td>{{ $linha->tipo_usuario_id }} </td>



                <td>
                    <center>  <form class="form-horizontal" action = "{{route('usuarios.edit',['id' => $linha->id ])}}">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <input type = "hidden" name = "_method" value = "PATCH">
                            <div class="col-sm-offset-3 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md edit">\</button>
                            </div>
                        </form>
                    </center>
                </td>

                <td>
                    <center> <form class="form-horizontal" action = "{{route('usuarios.destroy', ['id' => $linha->id])}}" method = "post">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <input type = "hidden" name = "_method" value = "DELETE">

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-md del">X</button>
                                </div>
                            </div>
                        </form>
                    </center>
                </td>

            </tr>

        @empty
            {{--@empty--}}
            <tr>
                <td colspan="2"> Nenhum Usuário Cadastraddo. </td>
            </tr>

            {{--@endforelse--}}

        @endforelse


        </tbody>
    </table>

@endsection



