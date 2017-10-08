 @if(Session::has('message'))
 <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@extends('layouts.principal')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Precio'],
      @foreach ($fechas as $f)
      ['{{$f->dia}}/{{$f->mes}}'
      
      , {{$f->precio}}],

      @endforeach
      
      ]);
    

    var options = {
      title: 'Crecimiento',
      hAxis: {title: 'Dia',  titleTextStyle: {color: '#000000'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<!--Div that will hold the pie chart-->

<div class="row">
  <div class="col-lg-12 xs-12">
    <h3 class="widget-title"><span id="noticia">Ultimos Valores de: <u>{{$i->nombre}}</u></span></h3>
    <div class="form-group">
      @forelse($fechas as $f)  
      @empty
      @include('error.alert')
      @endforelse
    </div>
    <div class="row">
      <div class="col-md-4">
        <h4 class="widget-title">Click en la Imagen para Buscar Por Meses:</h4> 
      </div>
      <div class="col-md-8">
        <input type="hidden" id="datepicker" placeholder="Ingrese la fecha aqui" name="datepicker" readonly="readonly" onchange="redireccion();">
        <input type="hidden" class="form-control" id="capturar" value="{{$i->id}}"> 
      </div>
    </div>
    <div id="chart_div" style="width: 100%; height:400px;"></div>
  </div>
  
</div>

@push ('scripts')
<script type="text/javascript">
 

  function redireccion()
  {
    var fecha= $('#datepicker').val();
    var id= $('#capturar').val();
    var capturar = fecha+ '/'+id;
    var ruta=  '/fechas/'+capturar;
    window.location.href=ruta;
    
  }
</script>  
@endpush  
@endsection
