<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rota chamando View

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('home.indexx');
//});

//Route::get('/index', function ()  {
//    return view('home.index')->middleware('auth');
//});


//Rota HOME CLIENTE
Route:: resource('/', 'homexController');

//Rota HOME
Route:: resource('/home', 'homeController');


//Rota Usuários
Route:: resource('/usuarios', 'usuarioController');


//Rota Categorias
Route:: resource('/categorias', 'categoriaController');


//Rota Produtos
Route:: resource('/produtos', 'produtoController');


Route::get('Paglogin','usuarioController@PagLogin') ->name('paglogin') ;


Route::post('login','usuarioController@Login') ->name('logar');


Route::post('buscaGeral','produtoController@buscaProdutos') ->name('buscaProd') ;




//Rota CLIENTE LOGIN
Route::post('autentic','clienteController@ClienteLogin') ->name('clienteLogin') ;




//Rota CLIENTES
Route:: resource('/clientes', 'clienteController');



//Rota ITEM DE VENDA
Route:: resource('/itens', 'itemVendaController');
