<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>@yield('title','Default')</title>
  <link rel="icon" href="/img/CIIEMP.png" type="image/x-icon">


  {!!Html::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')!!}
  {!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')!!}
  {!!Html::style('http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css')!!}
  {!!Html::style('../css/estilo.css')!!}
  <link rel="stylesheet" href="{{asset('../css/bootstrap-select.min.css')}}">
  {!!Html::script('http://code.jquery.com/jquery-1.11.1.min.js')!!}
  <!-- {!!Html::style('css/bootstrap.css')!!} -->
  {!!Html::script('https://use.fontawesome.com/07b0ce5d10.js')!!}  
  <link rel="shortcut icon" type="/img/CIIEMP.png" href="/favicon.ico">

</head>


<body>
  <div class="hidden-xs">
    <span class="ir-arriba fa fa-arrow-up"></span>
  </div>
  <!-- empieza el headeer -->
  <div class="container" id="menu">
    <div id="first-slider">
      <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <!-- Item 1 -->
          <div class="item active slide1">
            <img src="/img/observatoriomejoradociiemp.png" data-animation="animated zoomInLeft" alt="">
          </div> 
          <!-- Item 2 -->
          <div class="item slide2">
           <img src="/img/observatoriofarem.jpg" data-animation="animated zoomInLeft" alt="">
         </div>
         <!-- Item 3 -->
         <!-- <div class="item slide3">
          <img src="/img/obser3.jpg" data-animation="animated zoomInLeft" alt="">
        </div> -->
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
        <img class="img-responsive" id="logo" src="/img/CIIEMP-2Invertido.png" alt="">
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
                <!-- <li><a href="#">INSS</a></li> -->
                <li><a href="/instituciones">Todas</a></li>
              </ul>
            </li>
            <li class="col-sm-6">
              <ul>
                <!-- <li class="dropdown-header" id="economicos">Indicadores Económicos</li> -->
                <li id="hijos"><a href="/institucion/5">Ministerio del Trabajo</a></li>
                <li id="hijos"><a href="/institucion/2">Camara de Comercio</a></li>
                <li id="hijos"><a href="/institucion/6">Banco Central de Nicaragua</a></li>                            
                <<!-- li id="hijos"><a href="#">Renta</a></li>  -->             
              </ul>
            </li>
          </ul>       
        </li>
        <li class="nav navbar-nav">
          <li><a href="/noticia" id="padres">Noticias</a></li>
        </li>
        <li class="nav navbar-nav">
          <li><a href="/indicadors" id="padres">Indicadores</a></li>
        </li>
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Estudios<span class="caret"></span></a>        
          <ul class="dropdown-menu mega-dropdown-menu" id="hijo7">
            <li class="col-sm-8">
              <ul>
                <!-- <li class="dropdown-header">Economia</li> -->
                <li><a href="/tesisporcarreras/1">Mercadotecnia</a></li>
                <li><a href="/tesisporcarreras/2">Administración de Empresas</a></li>
                <li><a href="/tesisporcarreras/3">Banca y Finanzas</a></li>
                <li><a href="/listartesis">Todos</a></li>            
              </ul>
            </li>
            <!-- <li class="col-sm-6">
              <ul>
                <li class="dropdown-header">Sociales</li>
                <li><a href="#">Turismo</a></li>
                <li><a href="#">Admon Turistica y Hotelera</a></li>
                <li><a href="#">Trabajo Social</a></li>                                                      
              </ul>
            </li> -->
          </ul>       
        </li>
        <li><a href="/boletines_todos" id="padres">Boletines</a></li>
        @if (Auth::guest())
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">Mi Cuenta<span class="caret"></span></a>        
          <ul class="dropdown-menu mega-dropdown-menu" id="hijo3">
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
        @else
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="padres">{{ Auth::user()->name }}<span class="caret"></span></a>        
          <ul class="dropdown-menu mega-dropdown-menu" id="hijo3">
            <li class="col-sm-6">
              <ul>
                @if (Auth::user()->tipo == "Administrador") 
                <li><a href="{{url('/administracion')}}">Administracion</a></li> 
                <li><a href="{{url('/perfil')}}">Perfil</a></li>
                @else       
                <li><a href="{{url('/perfil')}}">Perfil</a></li>
                @endif             
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
        @endif
      </ul>

      {!!Form::open(array('url'=>'busqueda', 'method'=> 'GET', 'autocomplete' => 'off', 'class'=>'pull-xs-right', 'role' => 'search')) !!}
      <div class="search">
        <input type="text" required="" class="form-control" name="searchText" maxlength="64" placeholder="Search" value="">
        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
      </div>
      {{Form::close()}}
    </nav>  
  </div>

  <!-- fin menu -->
  <div class="container" id="menu">
    @yield('content')
  </div>


  <!-- empieza footer -->
  <div class="container" id="menu">
    <footer>
      <div class="container">
        <div class="row text-center">
          <ul class="list-inline">
            <li>
              <a href="https://www.facebook.com/CiiempFaremEsteli/"><i class="fa fa-facebook fa-2x"></i></a>
            </li>
            <li>
              <a href="https://www.youtube.com/channel/UCYqqo6I2mxLsW6PLc5CttKA"><i class="fa fa-youtube-play fa-2x"></i></a>
            </li>
            <li>
              <a href="https://www.instagram.com/ciiempfarem/"><i class="fa fa-instagram fa-2x"></i></a> 
            </li>
            <li>
              <a href="https://twitter.com/ciiempfarem"><i class="fa fa-twitter fa-2x"></i></a>
            </li>               
          </ul>
        </div>
        <div class="row text-center">   
          <ul class="menu list-inline">
            <li>
              <a href="http://www.farem.unan.edu.ni" id="enlaces">Farem-Estelí</a>
            </li>     
            <li>
              <a href="http://www.bcn.gob.ni" id="enlaces">Banco Central de Nicaragua</a>
            </li>
            <!-- <li>
              <a href="#" id="enlaces">CIIEMP</a>
            </li> -->  
            <li>
              <a href="/mail/create" id="enlaces">Contáctanos</a>
            </li>      
          <!-- <li>
              <a href="#" id="enlaces"></a>
          </li>
          <li>
              <a href="#" id="enlaces">Contact</a>
            </li> -->
          </ul>
        </div>   
      </div> 
    </footer>
    <div class="copyright">
      <div class="container">
        <div class="row text-center">
          <p>Copyright © 2017 FAREM-Estelí. Todos los Derechos Reservados.</p>
        </div>
      </div>
    </div>
  </div> 

  <!-- End -->


  {!!Html::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')!!}
  <script src="{{asset('/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('/js/fechas.js')}}"></script>
  <script src="/js/precargar.js"></script>
  <script>
    $(document).ready(function(){

      $('.ir-arriba').click(function(){
        $('body, html').animate({
          scrollTop: '0px'
        },1000 );
      });

      $(window).scroll(function(){
        if ($(this).scrollTop() > 0){
          $('.ir-arriba').slideDown(900);
        } else {
          $('.ir-arriba').slideUp(300);
        };
      });

    });
  </script>
  @stack('scripts')
</body>
</html>
