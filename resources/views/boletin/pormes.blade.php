@extends('layouts.principal')
@section('content')
<div class="section" id="noticias">
  <h3 class="widget-title"><span id="noticia">Listado de boletines</span></h3>
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
      </select>
    </div>
  </div>
  <br>
  <div class="row">
   @forelse ($boletines as $b)
   <div class="col-md-4">
    <div class="container-fluid">    
      <iframe id="boletin" style="width:325px; height:240px;" src="{{ $b->url }}" frameborder="0" allowfullscreen></iframe>
      <a href="{{ route ('boletin.show',[$b->id])}}">
        <p id="bole"> Fecha: <b>{{ $b->dia }}/{{ $b->mes }}/{{$b->anio }}</b></p> <button class="btn btn-primary">Ver</button>
      </a>
    </div>
  </div>
  @empty
  @include('error.alert')
  @endforelse

</div>
</div>
@push ('scripts')
<script type="text/javascript">


  function Seleccionar()
  {
    var id=$('#seleccionar option:selected').val();
    var ruta='/boletines_mes/'+ id;
    window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
    // console.log(ruta);
  }

</script>  
@endpush
@endsection