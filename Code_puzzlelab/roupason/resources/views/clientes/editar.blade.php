@extends('layouts.ecoPrincipal')

@section('pagina', 'Editar Cliente')

@section('conteudo')

 <fieldset class="posForm">

  <br>
  <form class="form-horizontal "  action = "{{route('clientes.update', ['id' => $cliente-> id])}}"method = "post" enctype="multipart/form-data">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
   <input type = "hidden" name = "_method" value = "PATCH">


   <div class="form-group">
    <label class="control-label col-sm-2">Nome:</label>
    <div class="col-sm-4">
     <input class="form-control" name="nome" value="{{$cliente->nome}}" type="text" required></input>
    </div>
   </div>

   <div class="form-group">
    <label class="control-label col-sm-2">CPF:</label>
    <div class="col-sm-2">
     <input class="form-control" name="cpf" value="{{$cliente->cpf}}" type="text" required></input>
    </div>
   </div>

   <div class="form-group">
    <label class="control-label col-sm-2">CPF:</label>
    <div class="col-sm-2">
     <input class="form-control" name="email" value="{{$cliente->email}}" type="text" required></input>
    </div>
   </div>


   <div class="form-group">
    <label class="control-label col-sm-2" >Senha:</label>
    <div class="col-sm-2">
     <input class="form-control" name="senha" value="{{$cliente->senha}}"  type="password" required></input>
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
