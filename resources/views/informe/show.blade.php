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
      ['{{$f->dia}}-{{$f->mes}}'
      
      , {{$f->precio}}],

      @endforeach
      
      ]);
    

    var options = {
      title: 'Crecimiento',
      hAxis: {title: 'Dia y Mes',  titleTextStyle: {color: '#000000'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<!--Div that will hold the pie chart-->

<div class="row">
  <div class="col-lg-12 xs-12">
    <h3 class="widget-title"><span id="noticia">Monitoreo de Indicadores</span></h3>
    <h4>Ultimos Valores de: <b>{{$i->nombre}}</b></h4>
    <div class="form-group">
      @forelse($fechas as $f)  
      @empty
      @include('error.alert')
      @endforelse
    </div>
    <div class="row">
      <div class="col-md-2">
        <h4><b>Click en la Imagen para Buscar Por Meses:</b></h4> 
      </div>
      <div class="col-md-2">
        <input type="hidden" id="datepicker" placeholder="Ingrese la fecha aqui" name="datepicker" readonly="readonly" onchange="redireccion();">
        <input type="hidden" class="form-control" id="capturar" value="{{$i->id}}"> 
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <h4><b>Ver otros indicadores:</b></h4>
          <select name="captura" class="form-control selectpicker" data-live-search="true" onchange="Capturar();" id="captura">
            @foreach ($indicadores as $i)
            <option value="{{$i->id}}">{{$i->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <br><br>
        <button class="btn btn-primary" id="ver">Ver Promedios Anuales</button>
      </div>
      <div class="col-md-2"></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group" id="mostrar">
          <h4><b>Ver promedio de indicadores:</b></h4>
          <select name="captura2" class="form-control selectpicker" data-live-search="true" onchange="Capturar2();" id="captura2">
            @foreach ($indicadores as $indic)
            <option value="{{$indic->id}}">{{$indic->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div id="chart_div" style="width: 100%; height:400px;"></div>
  </div>
  
</div>

@push ('scripts')
<script type="text/javascript">
  
  $(document).ready(function(){
    $("#ver").click(function(){
      $('#mostrar').toggle(1000);
    });
  });
  $(document).ready(function(){
    $("#mostrar").hide();
  });

  function redireccion()
  {
    var fecha= $('#datepicker').val();
    var id= $('#capturar').val();
    var capturar = fecha+ '/'+id;
    var ruta=  '/fechas/'+capturar;
    window.location.href=ruta;
  }
  function Capturar()
  {
    var cap=$('#captura option:selected').val();
    var rutas='/informe/' + cap;
    window.location.href=rutas;
  }
  function Capturar2()
  {
    var fecha2 = new Date();
    var ano2 = fecha2.getFullYear();

    // alert('El año actual es: '+ano2);
    var cap2=$('#captura2 option:selected').val();
    // var fechas= $('#datepicker').val();
    var auxiliar2= ano2+ '/'+cap2;
    var ruta2='/promedios_meses/'+ auxiliar2;
    window.location.href=ruta2;
  }
</script>  
@endpush  
@endsection
