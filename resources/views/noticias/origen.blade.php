@extends('layouts.principal')
@section('content')
<div class="section" id="noticias">
  <h3 class="widget-title"><span id="noticia">Noticias</span></h3>
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
      <h5 id="descr">Entérese aqui de las noticias económicas que surgen a nivel Local y Nacional en Nicaragua.</h5>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
      <label>Filtrar Noticias por origen:</label>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <select name="importante" class="form-control" onchange="Seleccionar();" id="seleccionar">
          <option value="">Elegir una opcion</option>
          <option value="Nacional">Nacional</option>
          <option value="Local">Local</option>
        </select>
      </div>
    </div>
  </div>

  
  <div class="row">
    
    @foreach ($noticia as $n)

    <div class="col-md-4">
      <div class="column"> 
        
        <!-- Post-->
        <div class="post-module"> 
          <!-- Thumbnail-->
          <div class="thumbnail">
             <!--  <div class="date"> <a href="#0">
                <div class="day"><i class="fa fa-bars" aria-hidden="true"></i></div>
              </a> </div> -->
              <img src="/imagenes/noticias/{{ $n->foto }}" class="img-responsive" alt=""> </div>
              <!-- Post Content-->
              <div class="post-content">
                <div class="category">{{$n->origen}}</div>
                <h2 class=" title"><a href="{{ route('noticias.show', $n->id ) }}">{{$n->titulo}}</a></h2>
                <p class="description">{{ $n->resumen }}</p>
                <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> {{ $n->fecha }}</span></div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
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