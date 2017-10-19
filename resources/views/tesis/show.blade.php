@extends ('layouts.principal')
@section ('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<div class="row">
  <br>
  <div class="col-lg-4 col-xs-12">
    <h4 class="widget">Portada</h4>
    <div class="avatar">
      <img class="img-responsive" id="tesis" alt="" src="{{asset('/imagenes/tesis/'.$tesis->imagen)}}" height="250px" width="250px">
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <h4 class="widget">Tema</h4>
    <p id="show">{{ $tesis->tema}}</p>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <h4 class="widget">Autor(es)</h4>
    <p id="show">{{ $tesis->autor}}</p>  
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <h4 class="widget">Carrera(es)</h4> 
    <p id="show">{{ $tesis->carrera}}</p> 
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <h4 class="widget">Metodologia</h4> 
    <p id="show">{{ $tesis->metodologia}}</p> 
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-xs-12">
    <h4 class="widget">Introduccion</h4>
    <p id="show">{{ $tesis->introduccion}}</p>
    <br>
    <div class="form-group" align="center">

      <a href="{{asset('archivos/tesis/'.$tesis->archivo)}}" download="{{$tesis->tema}}">
        <button class="btn btn-primary" id="descargar"><i class="fa fa-download" id="icontesis" aria-hidden="true"></i>Descargar Archivo</button>
      </a>
      <a href="/archivos/tesis/{{$tesis->archivo}}">
        <button class="btn btn-primary"><i class="fa fa-eye" id="icontesis" aria-hidden="true"></i>Visualizar Archivo</button>
      </a>
      <div class="alert alert-success alert-dismissible" id="message" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        "Archivo Descargado"
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <h3 class="widget-title"><span id="noticia">Tesis Agregadas Recientemente</span></h3>
    <!-- ITEM -->
    @foreach ($sugerencias as $s)
    <div class="item">
      <div class="thumbnail">
        <div class="caption">
          <div class="descrip">
            <p class="strong"><b>Tema:</b>{{ $s->tema}}</p>
            <p><b>Carrera:</b>{{ $tesis->carrera}}</p>
            <a href="{{ route('tesis.show', $s->id ) }}" class="btn btn-primary" role="button">Leer mas...</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <!-- ITEM -->
  </div>
</div>
@push ('scripts')
{!!Html::script('/js/tabla.js')!!}
<script type="text/javascript">
  $(document).ready(function(){
    $("#descargar").click(function(){
      $('#message').toggle(1000);
    });
  });
  $(document).ready(function(){
    $("#message").hide();
  });
</script>
@endpush
@endsection
