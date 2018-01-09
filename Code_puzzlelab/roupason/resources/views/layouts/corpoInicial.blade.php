@extends('layouts.ecoPrincipal')



<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
$('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="divFundo">

    <div class="container-fluid">
        <div class="row">


            {{--Slides--}}
            <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/css/img/aviso3.jpg" alt="Chania" style="width:80%; height: 15em; overflow: hidden">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="/css/img/aviso1.jpg" alt="Chicago" style="width:80%; height: 15em; overflow: hidden">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="/css/img/aviso2.jpg" alt="New York" style="width:80%; height: 15em; overflow: hidden">
                        <div class="carousel-caption">

                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>




                <form class=" posBusca col-sm-7 " action = "{{route('buscaProd')}}"method = "post" enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                    <br>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Categoria:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="categoria" required>


                                @forelse($todCat as $linha)

                                    <option value="{{$linha-> id}}"> {{$linha-> nome}} /..{{$linha->descricao}} </option>
                                @empty
                                    <option disabled>Não há Categorias Cadastrados</option>

                                @endforelse

                            </select>
                        </div>


                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-md bot-buscar">Buscar</button>
                        </div>

                    </div>

                </form>





    </div>





        <!-- Lateral
    ================================================== -->


        <div class="col-md-2  espaco-acesso-usuario">

                <div class="well ">

                    <form action="{{route('clienteLogin')}}" method="post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <div class="titulo-acesso-usuario form-group">
                            <label >Acesso Cliente</label>
                        </div>

                        <div class="form-acesso-usuario form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-acesso-usuario form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-acesso-usuario checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--/span-->


</div>
    <!--/row-->


</div>
<!--/.fluid-container-->

