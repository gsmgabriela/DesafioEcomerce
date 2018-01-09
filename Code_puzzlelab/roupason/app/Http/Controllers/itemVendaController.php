<?php

namespace App\Http\Controllers;

use App\ItemVenda;
use App\Categoria;
use Illuminate\Http\Request;

class itemVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //

        if ($request->session()->has('logado')) {
            dd($request->session()->get('logado'));

            if (session()->has('nome', 'id')) {
                dd(session()->all());

                $itens = ItemVenda::where('cliente_id', dd(session()->id)->get());

                return view('itens.index',
                    ['itens' => $itens]);
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



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

        $categorias= Categoria::all();

        if ($request->session()->has('logado')) {
            dd($request->session()->get('logado'));

            if (session()->has('nome','id'))
                dd(session()->all());

            $item = new ItemVenda();

            $item->quantidade = Input::get('quantidade');
            $item->total = Input::get('quantidade') * Input::get('preco');
            $item->produto_id = Input::get('produto_id');
            $item->cliente_id = $cart = $request->session()->get('logado', id);;
            $item->venda_id = null;


            if ($item->save()) {

                $items = ItemVenda::all();



                echo '<script>alert("Ítem adicionado com Sucesso");</script>';
                return view('itens.index', ['todItens' => $items]);

            } else {
                echo '<script>alert("Erro ao Salvar!"); </script>';

                return view ('home.indexx', ['todCat'=> $categorias]);
            }

        }else{

            echo '<script> alert("Favor se autenticar!")  </script>';


            return view ('home.indexx', ['todCat'=> $categorias]);

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
