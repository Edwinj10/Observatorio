@extends('layouts.principal')
@section('title','Busqueda')
@section('content')
<!-- <link rel="stylesheet" href="{{asset('/css/indicadores.css')}}"> -->
 
 </head>

<div class="section" id="noticias">
    <h3 class="widget-title"><span id="noticia">Noticias</span></h3>
    <h4>Resultados de Noticias Encontradas de: <b>"{{$searchText}}"</b> </h4>
    <div class="row">
    
    @forelse ($noticia as $n)
    	@empty
            <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Mensaje del sistema!</h4>
                <p>Lo sentimos no se encontraron registros de la busqueda</p>
              </div>
        @else

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
              <h2 class=" title"><a href="{{ route('noticias.show', $n->id ) }}">{{substr(strip_tags($n->titulo), 0,50)}}...</a></h2>
              <p class="description">{{ $n->descripcion }}</p>
              <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> {{ $n->fecha }}</span></div>
            </div>
          </div>
        </div>
      </div>
      @endforelse
    </div>
    <br>
	<h4>Resultados de Indicadores Encontrados de: <b>"{{$searchText}}"</b> </h4>
    <div class="row">
    	
    	@forelse($indicadores as $d)
    	@empty
            <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Mensaje del sistema!</h4>
                <p>Lo sentimos no se encontraron registros de la busqueda</p>
              </div>
        @else
  		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		    <div class="thumbnail">
		      <div class="caption">
		          <div class='col-lg-12'>
		            <span class="glyphicon glyphicon-credit-card"></span>
		          </div>
		          <div class='col-lg-12 well well-add-card'>
		            <h4 id="nombre">{{$d->nombre}}</h4>
		          </div>
		          <div class='col-lg-12'>
		            <p class="text-muted" id="indi_descripcion">{{$d->descripcion}}</p>
		          </div>
		          <a href="{{ route('informe.show', $d->id ) }}"><button type="button" class="btn btn-primary">Ver Grafica</button>
		          </a>
		          <a href="/listado/{{$d->id}}"><button type="button" class="btn btn-primary">Ver Datos en Tablas</button>
		          </a>
		          <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
		      </div>
		    </div>
		</div>
	</div>
  @endforelse
</div>

  
@push ('scripts')
<script type="text/javascript">

  // $("#indicadorcap").onchange(function(){
  //   var text= $(this).val();
  //   console.log(text);
  // });



  function Seleccionar()
  {

    var id=$('#seleccionar option:selected').val();

    var ruta='/noticia_tipo/'+ id;

     window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
     console.log(ruta);
    
  }

 

</script>  
@endpush  
@endsection