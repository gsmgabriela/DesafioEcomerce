<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;
use App\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuarios = Usuario::all();

        return view('usuarios.index',
            ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.novo');
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


        $usuario = new Usuario();

        $usuario->nome = Input::get('nome');
        $usuario->cpf = Input::get('cpf');
        $usuario->usuario = Input::get('usuario');
        $usuario->senha = Input::get('senha');
        $usuario->tipo_usuario_id = Input::get('tipo');


        if ($usuario->save()) {
            $usuarios = Usuario::all();

            echo '<script>alert("Usuário Cadastrado com Sucesso");</script>';
            return view('usuarios.index',
                ['usuarios' => $usuarios]);


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

        $usuario = Usuario::find($id);

        return view('usuarios.editar',
            ['usuario' => $usuario]);
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

        $usuario = Usuario::find($id);

        $usuario->nome = input::get('nome');
        $usuario->cpf = input::get('cpf');
        $usuario->usuario = input::get('usuario');
        $usuario->senha = input::get('senha');

        $usuarios = Usuario::all();


        if ($usuario->save()) {

            $usuarios = Usuario::all();

            echo '<script>alert("Dados Atualizados com Sucesso!");</script>';

            return view('usuarios.index',
                ['usuarios' => $usuarios]);
        } else {
            echo '<script>alert("Erro na atualização!");</script>';


            return view('usuarios.index',
                ['usuarios' => $usuarios]);
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

        $us = Usuario::find($id);
        $us->delete();
        echo '<script>alert("Usuário Exluído!");</script>';

        $usuarios = Usuario::all();

        return view('usuarios.index',
            ['usuarios' => $usuarios]);


    }



    public function PagLogin (){

        return view('login.login');

    }




    public function login()
    {
        //
//        session_start();
//// as variáveis login e senha recebem os dados digitados na página anterior
//
//        $usu = $_POST['usuario'];
//        $msenha = $_POST['senha'];
//
//
//
//        $usuario = DB::table('usuarios')->where('usuario', $usu)->first();
//
//        if ($usuario) {
//
//
//            if ($usuario->senha == $msenha) {
//
////              $_SESSION['usuario_valido'] = $usuario;
//                $nomeUser = $usuario->nome;

                $categorias = Categoria::all();

                return view('home.index',['todCat' => $categorias]);
//
//            } else {
////                unset ($_SESSION['usuario_valido']);
////                unset ($_SESSION['nome']);
//
//                return view('login.login');
//
//
//            }


//        }

    }


}
