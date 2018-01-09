<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Produto;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $produtos = Produto::all();

        $categorias = Categoria::all();

        return view('produtos.index',
            ['produtos' => $produtos], ['todCat' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();

        return view('produtos.novo', ['todCat' => $categorias]);
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

        $imagem = $request->file('img');

        $pasta = public_path() . '/imagensProdutos';

        $nome_imagem = 'produto' . time() . '.' . $imagem->getClientOriginalExtension();

        // Move arquivo para pasta
        $nova_imagem = $imagem->move($pasta, $nome_imagem);
        $sub_var = substr($nova_imagem, 34);
//        return response()-> json($sub_var);

        $produto = new Produto();
        $produto->nome = Input::get('nome');
        $produto->descricao = Input::get('descricao');
        $produto->grupo = Input::get('grupo');
        $produto->preco = Input::get('preco');
        $produto->img = $sub_var;
        $produto->status = "1";
        $produto->quantidade = Input::get('quantidade');
        $produto->categoria_id = Input::get('categoria');


        if ($produto->save()) {
            echo '<script>alert("Produto Cadastrado com Sucesso!");</script>';


            $produtos = Produto::all();
            $categorias = Categoria::all();

            return view('produtos.index',
                ['produtos' => $produtos], ['todCat' => $categorias]);


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
        $categorias = Categoria::all();

        $produto = Produto::find($id);
        return view('produtos.editar',
            ['produto' => $produto], ['todCat' => $categorias]);
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
        $produto = Produto::find($id);


        $imagem = $request->file('img');

        $pasta = public_path() . '/imagensProdutos';

        if ($imagem == null) {

            $produto->img = $produto->img;


        } else {

            $nome_imagem = 'produto' . time() . '.' . $imagem->getClientOriginalExtension();

            // Move arquivo para pasta
            $nova_imagem = $imagem->move($pasta, $nome_imagem);
            $sub_var = substr($nova_imagem, 34);
//        return response()-> json($sub_var);
            $produto->img = $sub_var;
        }

        $produto->nome = Input::get('nome');
        $produto->descricao = Input::get('descricao');
        $produto->grupo = Input::get('grupo');
        $produto->preco = Input::get('preco');


        if (Input::get('status')) {

            $produto->status = "1";
        } else {
            $produto->status = null;
        }

        $quant = Input::get('quantidade');
        $entr = Input::get('entrada');


        $produto->quantidade = $quant + $entr;
        $produto->categoria_id = Input::get('categoria');


        if ($produto->save()) {
            echo '<script>alert("Dados Atualizados com Sucesso!");</script>';


            $produtos = Produto::all();
            $categorias = Categoria::all();

            return view('produtos.index',
                ['produtos' => $produtos], ['todCat' => $categorias]);


        } else {
            echo '<script>alert("Erro ao Salvar!"); </script>';
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

    public function buscaProdutos(Request $request)
    {

        $categoria = Input::get('categoria');
        $grupo = Input::get('grupo');


        $produtos1 = Produto::where('categoria_id', $categoria)->get();



        $categorias = Categoria::all();

        if ($produtos1 == null){

            echo '<script>alert("Não há Produtos com essas Características!"); </script>';
            return view('home.indexx',['todCat' => $categorias]);

        }

        return view('layouts.corpoBusca',['todCat' => $categorias], ['produtos1' => $produtos1]);



    }


}




