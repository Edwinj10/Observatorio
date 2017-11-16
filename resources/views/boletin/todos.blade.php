@extends('layouts.principal')
@section('content')
<div class="section" id="noticias">
 <h3 class="widget-title"><span id="noticia">Listado de Boletines Informativos Trimestrales</span></h3>
 <div class="row">
  <div class="col-lg-6">

    <label>Filtrar boletines por mes:</label>
    <select name="importante" class="form-control" onchange="Seleccionar();" id="seleccionar">
      <option value="">Selecionar mes</option>
      <option value="01">Enero</option>
      <option value="02">Febrero</option>
      <option value="03">Marzo</option> 
      <option value="04">Abril</option>
      <option value="05">Mayo</option>
      <option value="06">Junio</option>
      <option value="07">Julio</option>
      <option value="08">Agosto</option>
      <option value="09">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
      <option value="">Ver todos</option>
    </select>
  </div>
</div>
<br>
<div class="row">
 @forelse ($boletines as $b)
 <div class="col-md-4">
  <div class="container-fluid">    
    <iframe id="boletin" style="width:325px; height:240px;" src="{{ $b->url }}" frameborder="0" allowfullscreen></iframe>
    
    <p id="bole">{{substr(strip_tags($b->descripcion), 0,200)}}...</b></p>
    <a href="{{ route ('boletin.show',[$b->id])}}">
      <button class="btn btn-primary">Ver Más</button>
    </a>
    
  </div>
</div>
@empty
@include('error.alert')
@endforelse

</div>
<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-4">
    <div class="form-group">
      {{$boletines->render()}}
    </div>
  </div>
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

    var ruta='/boletines_mes/'+ id;

    window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
    console.log(ruta);
    
  }



</script>  
@endpush
@endsection