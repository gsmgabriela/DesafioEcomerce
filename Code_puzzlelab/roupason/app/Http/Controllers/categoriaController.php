<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\categoria;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class categoriaController extends Controller
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

        return view ('categorias.index',
            ['categorias' => $categorias]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $categoria = new Categoria();

        $categoria->nome = Input::get('nome');
        $categoria->descricao = Input::get('descricao');
        $categoria->sexo = "1";


        if ($categoria-> save()){
            $categorias = Categoria::all();

            echo '<script>alert("Categoria Cadastrada com Sucesso");</script>';
            return view ('categorias.index',
                ['categorias' => $categorias]);


        }else{
            echo '<script>alert("Erro ao Salvar!"); </script>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $categoria = Categoria::find($id);

        return view('categorias.editar',
            ['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $categoria = Categoria::find($id);

        $categoria -> nome = input::get('nome');
        $categoria -> sexo = "1";
        $categoria -> descricao = input::get('descricao');


        $categorias= Categoria::all();


        if($categoria->save()) {

            $categorias= Categoria::all();

            echo '<script>alert("Dados Atualizados com Sucesso!");</script>';

            return view ('categorias.index',
                ['categorias' => $categorias]);
        }
        else {
            echo '<script>alert("Erro na atualização!");</script>';


            return view ('categorias.index',
                ['categorias' => $categorias]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
