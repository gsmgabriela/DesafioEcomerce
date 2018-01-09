<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Hash;
use Auth;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::all();

        return view('clientes.index', ['todCat' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cliente = new Cliente();

        $cliente->nome = Input::get('nome');
        $cliente->cpf = Input::get('cpf');
        $cliente->email = Input::get('email');
        $cliente->senha = Input::get('senha');


        if ($cliente->save()) {

            $categorias = Categoria::all();


            echo '<script>alert("Cadastrado efetuado com Sucesso");</script>';
            return view('clientes.index', ['todCat' => $categorias]);

        } else {
            echo '<script>alert("Erro ao Salvar!"); </script>';
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $cliente = Cliente::find($id);

        return view('cliente.editar',
            ['cliente' => $cliente]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cliente = Usuario::find($id);

        $cliente->nome = input::get('nome');
        $cliente->cpf = input::get('cpf');
        $cliente->email = input::get('email');
        $cliente->senha = input::get('senha');

        $cliente = Cliente::all();


        if ($cliente->save()) {

            $clientes = Usuario::all();

            echo '<script>alert("Dados Atualizados com Sucesso!");</script>';

            return view('clientes.index');
        } else {
            echo '<script>alert("Erro na atualização!");</script>';


            return view('clientes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ClienteLogin(Request $request)
    {
        //
        $email = input::get('email');


        $cliente = Cliente::where('email', $email)->get();


        $categorias = Categoria::all();

        if ($cliente != null) {

//                Session::put('logado',  [
//                    [
//                        'id'     => $cliente -> id,
//                        'nome'   => $cliente -> nome,
//                    ],
//                ]);


//            $request->session()->put('logado', [
//                [
//                    'id' => $cliente->id,
//                    'nome' => $cliente->nome,
//                ],
//            ]);


            return view('clientes.index', ['todCat' => $categorias], ['cliente' => $cliente]);


        } else {

            echo '<script> alert("Email não cadastrado!")  </script>';
            redirect(route('/'));

        }


    }
}