  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Observatorio SocioEconomico</title>
    <link rel="icon" href="img/CIIEMP.png" type="image/x-icon">
    
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {!!Html::style('http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css')!!}
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/iframe-embed.css" rel="stylesheet" type="text/css">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <link href="../css/bootstrap-tabs-x.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap-tabs-x.js" type="text/javascript"></script>

    
    <link rel="shortcut icon" type="img/CIIEMP.png" href="/favicon.ico">
    
  </head>


  <body>
    <!-- empieza el headeer -->
    <div class="container" id="menu">
      <div id="first-slider">
        <div id="carousel-example-generic" class="carousel slide carousel-fade">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <!-- Item 1 -->
            <div class="item active slide1">
              <img src="img/obser1.jpg" data-animation="animated zoomInLeft" alt="">
            </div> 
            <!-- Item 2 -->
            <div class="item slide2">
             <img src="img/obser2.jpg" data-animation="animated zoomInLeft" alt="">
           </div>
           <!-- Item 3 -->
           <div class="item slide3">
            <img src="img/obser3.jpg" data-animation="animated zoomInLeft" alt="">
          </div>
          <!-- Item 4 -->
          <!-- End Item 4 -->
          
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <!-- fin -->
  <!-- comienxo menu -->
  <div class="container" id="menu">
    <nav class="navbar navbar-inverse" id="menu" >
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/">
          <img class="img-responsive" id="logo" src="img/CIIEMP-2Invertido.png" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Instituciones <span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu" id="hijo1">
              <li class="col-sm-6">
                <ul>
                 <!-- <li class="dropdown-header" id="sociales">Indicadores Sociales</li> -->
                 <li id="hijos"><a href="/institucion/4">MINSA</a></li>
                 <li><a href="/institucion/3">MINED</a></li>
                 <li><a href="/institucion/7">Alcaldia de Estelí</a></li>
                 <li><a href="#">INSS</a></li>
                 <li><a href="/instituciones">Todas</a></li>
               </ul>
             </li>
             <li class="col-sm-6">
              <ul>
                <!-- <li class="dropdown-header" id="economicos">Indicadores Económicos</li> -->
                <li id="hijos"><a href="/institucion/5">Ministerio del Trabajo</a></li>
                <li id="hijos"><a href="/institucion/2">Camara de Comercio</a></li>
                <li id="hijos"><a href="/institucion/6">Banco Central</a></li>                            
                <li id="hijos"><a href="#">Renta</a></li>              
              </ul>
            </li>
          </ul>       
        </li>
        <li class="nav navbar-nav">
          <li><a href="/noticia" id="padres">Noticias</a></li>
        </li>
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Indicadores<span class="caret"></span></a>        
          <ul class="dropdown-menu mega-dropdown-menu" id="hijo6">
            <li class="col-sm-12">
              <ul>
                <li class="dropdown-header">Tipos</li>
                @foreach ($menu as $m)
                <li><a href="/indicadores/{{$m->id}}">{{$m->tipo}}</a></li>             
                @endforeach
              </ul>

            </li>        
          </ul>       
        </li>
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Estudios<span class="caret"></span></a>        
          <ul class="dropdown-menu mega-dropdown-menu" id="hijo3">
            <li class="col-sm-6">
              <ul>
                <li class="dropdown-header">Economia</li>
                <li><a href="/tesisporcarreras/1">Mercadotecnia</a></li>
                <li><a href="/tesisporcarreras/2">Admon Empresas</a></li>
                <li><a href="/tesisporcarreras/3">Banca y Finanzas</a></li>
                <li><a href="/listartesis">Todos</a></li>            
              </ul>
            </li>
            <li class="col-sm-6">
              <ul>
                <li class="dropdown-header">Sociales</li>
                <li><a href="#">Turismo</a></li>
                <li><a href="#">Admon Turistica y Hotelera</a></li>
                <li><a href="#">Trabajo Social</a></li>                                                      
              </ul>
            </li>
          </ul>       
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="/boletines_todos" id="padres">Boletines</a></li>
      </ul>
      <!-- <ul class="nav navbar-nav">
        <li><a href="/mail/create" id="padres">Contactenos</a></li>
      </ul> -->
      {!!Form::open(array('url'=>'busqueda', 'method'=> 'GET', 'autocomplete' => 'off', 'class'=>'pull-xs-right', 'role' => 'search')) !!}
      <div class="search">
        <input type="text" required="" class="form-control" name="searchText" maxlength="64" placeholder="Search" value="{{$searchText}}">
        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
      </div>
      {{Form::close()}}
      @if (Auth::guest())
      <div class="collapse navbar-collapse" id="mainNav" >
        <ul class="nav  navbar-nav navbar-right">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Mi Cuenta<span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu" id="hijo4">
              <li class="col-sm-6">
                <ul>
                  <li><a href="{{url('login')}}">Login</a></li>                            
                </ul>
              </li>
              <li class="col-sm-6">
                <ul>
                  <li><a href="{{url('register')}}">Registrarme</a></li>                            
                </ul>
              </li>
            </ul>
          </li> 
        </ul>      
      </div>
      @else
      <div class="collapse navbar-collapse" id="mainNav" >
        <ul class="nav  navbar-nav navbar-right">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">{{ Auth::user()->name }}<span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu" id="hijo4">
              <li class="col-sm-6">
                <ul>
                  <li><a href="{{url('login')}}">Ajustes</a></li>  
                  <li><a href="{{url('/administracion')}}">Administracion</a></li>                          
                </ul>
              </li>
              <li class="col-sm-6">
                <ul>
                  <li>
                    <a href=="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Salir</a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>                                                     
                </ul>
              </li>    
            </ul>
          </li> 
        </ul>      
      </div>
      @endif
    </nav>  
  </div>

  <!-- fin menu -->
  <div class="container" id="menu">
    <section id="blog-section">
      <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
         <div class="row">
          <div class="col-lg-12 col-md-12" id="sli">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>

              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img id="carruse" src="/img/web_esteli_tabaco.jpg"  class="img-responsive" width="100%">
                  <div class="carousel-caption">
                    <h3 class="option animated pulse">Economia en Estelí</h3>
                    <a href="index.html"><button class="btn btn-primary">Leer Mas</button>      
                    </a>
                  </div>
                </div>
                <div class="item ">
                  <img id="carruse" src="/img/esteli2.jpg" class="img-responsive"  width="100%">
                  <div class="carousel-caption">
                    <h3 class="option animated pulse">Economia en Estelí</h3>
                    <a href="index.html"><button class="btn btn-primary">Leer Mas</button></a>
                  </div>
                </div>
                <div class="item ">
                  <img id="carruse" src="/img/esteli3.png" class="img-responsive"  width="100%">
                  <div class="carousel-caption">
                    <h3 class="option animated pulse">Indicadores Socioeconomicos</h3>
                    <a href="index.html"><button class="btn btn-primary">Leer Mas</button></a>
                  </div>
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- recientes post -->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">           
        <div class="widget-sidebar">
         <h3 class="widget-title"><span id="noticia">Indicadores Economicos</span></h3>
         <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
            <thead class="cf">
              <tr>
                <th>Indicador</th>
                <th>Fecha</th>
                <th class="numeric">Precio</th>
                <th>Ver</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($ind as $i)
                <td>{{ $i->nombre}}</td>
                <td>{{ $i->dia}}/{{ $i->mes}}/{{ $i->anio}}</td>
                <td>{{ $i->precio}}</td>
                <td><a href="{{ route('informe.show', $i->id ) }}"><i class="fa fa-eye"></i></a></td>

                <!-- <td><i class="fa fa-line-chart"></i></td> -->
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

</section>   
</div>

<!-- noticias -->

<div class="container" id="menu">
  <div class="section" id="noticias">
    <h3 class="widget-title"><span id="noticia">Noticias</span></h3>
    <div class="row">

      @foreach ($noticias as $n)

      <div class="col-md-4">
        <div class="column"> 

          <!-- Post-->
          <div class="post-module"> 
            <!-- Thumbnail-->
            <div class="thumbnail">
             <!--  <div class="date"> <a href="#0">
                <div class="day"><i class="fa fa-bars" aria-hidden="true"></i></div>
              </a> </div> -->
              <img src="imagenes/noticias/{{ $n->foto }}" class="img-responsive" alt=""> </div>
              <!-- Post Content-->
              <div class="post-content">
                <div class="category">{{$n->tipo}}</div>
                <h2 class=" title"><a href="{{ route('noticias.show', $n->id ) }}">{{$n->titulo}}</a></h2>
                <p class="description">{{ $n->resumen }}</p>
                <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> {{ $n->fecha }}</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 0 comments</a></span></div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
    
  </div>

<!-- <div class="container" id="menu">
  <section id="blog-section-tres">
    <h3 class="widget-title"><span id="noticia">Boletines Trimestrales Publicados</span></h3>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="cuadro_intro_hover " style="background-color:white;">
                  <p style="text-align:center;">
                    <img src="img/fondopdf2.jpg" id="img" class="img-responsive" alt="">
                  </p>
                  <div class="caption">
                    <div class="blur"></div>
                    <div class="caption-text">
                      <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Enero-Marzo</h3>
                      <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                      <a class=" btn btn-default" href="https://plus.google.com/u/0/100371904807783155711/posts" target="_blank"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="cuadro_intro_hover " style="background-color:white;">
                  <p style="text-align:center;">
                    <img src="img/fondopdf2.jpg" id="img" class="img-responsive" alt="">
                  </p>
                  <div class="caption">
                    <div class="blur"></div>
                    <div class="caption-text">
                      <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Abril-Junio</h3>
                      <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                      <a class=" btn btn-default" href="https://plus.google.com/u/0/100371904807783155711/posts" target="_blank"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="cuadro_intro_hover" style="background-color:white;">
                  <p style="text-align:center;">
                    <img src="img/fondopdf2.jpg" id="img" class="img-responsive" alt="">
                  </p>
                  <div class="caption">
                    <div class="blur"></div>
                    <div class="caption-text">
                      <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Julio-Septiembre</h3>
                      <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                      <a class=" btn btn-default" href="https://plus.google.com/u/0/100371904807783155711/posts" target="_blank"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="cuadro_intro_hover " style="background-color:white;">
                  <p style="text-align:center;">
                    <img src="img/fondopdf2.jpg" id="img" class="img-responsive" alt="">
                  </p>
                  <div class="caption">
                    <div class="blur"></div>
                    <div class="caption-text">
                      <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Octubre-Dici</h3>
                      <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                      <a class=" btn btn-default" href="https://plus.google.com/u/0/100371904807783155711/posts" target="_blank"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>
</div>
-->   
<div class="container" id="menu">
  <div class="section">
    <div class="row">
      <div class="col-md-4">
        <h3 class="widget-title"><span id="noticia">Ubicacion</span></h3>
        <div class="span8">
          <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.9844870824563!2d-86.37052568593182!3d13.10016921559033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f718c57866892dd%3A0xb23ca385a77b0c03!2sUNAN-FAREM+Estel%C3%AD+(Recinto+universitario+Leonel+Rugama)!5e0!3m2!1ses!2ses!4v1502825665128" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
      </div>
      <div class="col-md-8 hidden-xs ">
        <h3 class="widget-title"><span id="noticia">Boletin</span></h3>
        @foreach ($boletines as $b)
        <iframe id="boletin" style="width:700px; height:360px;" src="{{ $b->url }}" frameborder="0" allowfullscreen></iframe>
        <button class="btn btn-primary">Ver mas</button>
        @endforeach
        <!-- /tabs-right -->
      </div>
    </div>
  </div>
</div>
<!-- cargamos las instituciones -->
<div class="container" id="menu">
  <div class="section">
    <div class="row">
      <h3 class="widget-title"><span id="noticia">Instituciones</span></h3>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="carousel carousel-showmanymoveone slide" id="itemslider">
          <div class="carousel-inner">
            @foreach ($inst as $i)
            <div class="item @if($i->id === $i->first()->id) {{ 'active' }} @endif">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <a href="{{ route('institucion.show', $i->id ) }}"><img src="{{asset('imagenes/instituciones/'.$i->logo)}}" class="img-responsive center-block" width="100px" height="100px"></a>
                <h4 class="text-center">{{$i->nombres}}</h4>
              </div>
            </div>
            @endforeach
          </div>
          <div id="slider-control">
            <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
            <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- empieza footer -->
<div class="container" id="menu">
  <footer>
    <div class="container">
      <div class="row text-center">
        <ul class="list-inline">
          <li>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-youtube-play fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a> 
          </li>
          <li>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
          </li>               
        </ul>
      </div>
      <div class="row text-center">   
        <ul class="menu list-inline">
          <li>
            <a href="http://www.farem.unan.edu.ni" id="enlaces">Farem Estelí</a>
          </li>     
          <li>
            <a href="http://www.bcn.gob.ni" id="enlaces">Banco Central de Nicaragua</a>
          </li>
          <li>
            <a href="#" id="enlaces"></a>
          </li>      
          <li>
            <a href="#" id="enlaces">Gallery</a>
          </li>
          <li>
            <a href="#" id="enlaces">Contact</a>
          </li>
        </ul>
      </div>   
    </div> 
  </footer>
  <div class="copyright">
    <div class="container">
      <div class="row text-center">
        <p>Copyright © 2017 All rights reserved</p>
      </div>
    </div>
  </div>
</div>

<!-- End -->
<script src="js/bootstrap.js"></script>
<script>
 $(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});      
</script>
<!-- script carrusel instituciones -->
<script>  
  $(document).ready(function(){

    $('#itemslider').carousel({ interval: 3000 });

    $('.carousel-showmanymoveone .item').each(function(){
      var itemToClone = $(this);

      for (var i=1;i<6;i++) {
        itemToClone = itemToClone.next();

        if (!itemToClone.length) {
          itemToClone = $(this).siblings(':first');
        }

        itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
      }
    });
  });
</script>


</body>
</html>