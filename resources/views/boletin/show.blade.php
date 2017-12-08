@extends ('layouts.principal')
@section ('content')
@section('title','Boletín Informativo')
<h3 class="widget-title"><span id="noticia">Boletin</span></h3>
<div class="row">
  <div class="col-lg-7 col-md-7">
    <h4 class="widget">Portada:</h4>
    <div class="avatar">
      <img src="{{asset('imagenes/boletines/'.$boletin->portada)}}" alt="" height="300px" width="70%" class="img-thumbail">
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <h4 class="widget">Fecha de publicacion:</h4>
    <p id="show">{{ $boletin->dia }}/{{ $boletin->mes }}/{{$boletin->anio }}</p>
  </div>
  <div class="col-lg-2 col-md-2 col-xs-12">
    <h4 class="widget">Publicado por:</h4>
    <p id="show">{{ $boletin->name}}</p>  
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-xs-12">
    <h4 class="widget">Descripcion</h4>
    <p id="show">{{ $boletin->descripcion}}</p>
    <br>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-md-8 col-xs-12">
    <iframe id="boletin" style="width:100%; height:360px;" src="{{ $boletin->url }}" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group" align="center">
      <a href="{{asset('/archivos/boletines/'.$boletin->archivo)}}" download="CIIEMPBoletin/{{$boletin->dia}}">
        <button class="btn btn-primary" id="descargar"><i class="fa fa-download" id="icontesis" aria-hidden="true"></i>Descargar Archivo</button>
      </a>
      <a href="/archivos/boletines/{{$boletin->archivo}}">
        <button class="btn btn-primary"><i class="fa fa-eye" id="icontesis" aria-hidden="true"></i>Visualizar Archivo</button>
      </a>
      <div class="alert alert-success alert-dismissible" id="message" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        "Archivo Descargado"
      </div>
    </div>
  </div>
</div>
@push ('scripts')
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
