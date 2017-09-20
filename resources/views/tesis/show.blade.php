@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<div class="row">
  <div class="col-lg-4">
    <div class="avatar">
        <img class="img-responsive" id="tesis" alt="" src="{{asset('imagenes/tesis/'.$tesis->imagen)}}" height="250px" width="250px">
    </div>
  </div>
  <div class="col-lg-4">
      <h4 class="widget-title">Tema:  {{ $tesis->tema}}</h4>
  </div>
  <div class="col-lg-4">
    <h4 class="widget-title">Autor(es):  {{ $tesis->autor}}</h4>  
  </div>
  <div class="col-lg-4">
    <h4 class="widget-title">Carrera(es):  {{ $tesis->carrera}}</h4>  
  </div>
</div>
<div class="row">
  <div class="col-lg-8">
    <h4 class="widget-title">Introduccion: {{ $tesis->introduccion}}</h4>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <embed src="{{asset('archivos/tesis/'.$tesis->archivo)}}" type="application/pdf" width="100%" height="500"></embed>
  </div>
</div> 
@endsection
