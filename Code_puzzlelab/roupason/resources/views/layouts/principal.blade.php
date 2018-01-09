<!DOCTYPE html>
<html>

//
//session_start();
//
//if((!isset ($_SESSION['usuario_valido']) == true) and (!isset ($_SESSION['nome']) == true))
//{
//unset($_SESSION['usuario_valido']);
//unset($_SESSION['nome']);
//
//session_destroy();
//
//header('location:login');
//
//}
//
//$logado = $_SESSION['usuario_valido']
//
////?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/menu.css" rel="stylesheet">

    <title>Roupas-ON - @yield('titulo', 'Home Page')</title> <!-- yield recebe váriavel -->
</head>


<body>


<div class="navbar-wrapper">

        <div class="navbar navbar-inverse navbar-static-top">

            <div class="navbar-header">
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

            </div>

            <div class=" navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a class="opcoesMenu" href="@yield( 'home', route('home.index'))">Home</a></li>
                    <li><a class="opcoesMenu" href="@yield( 'categorias', route('categorias.index'))">Categorias</a></li>
                    <li><a class="opcoesMenu" href="@yield(  'produtos', route('produtos.index'))">Produtos</a></li>
                    <li><a class="opcoesMenu" href="@yield( 'usuarios', route('usuarios.index'))">Usuários</a></li>

                </ul>

            </div>

        </div>
        </div>
@yield('conteudo')
</body>


</html>


