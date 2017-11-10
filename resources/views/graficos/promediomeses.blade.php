@extends('layouts.principal')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Promedio'],
      @foreach ($promedio as $prom)
      ['{{$prom->mes}}', {{$prom->Promedio}}],
      @endforeach
      ]);    
    var options = {
      title: 'Reporte Anual',
      hAxis: {title: 'Meses',  titleTextStyle: {color: '#023455'}},
      vAxis: {minValue: 40}
    };
    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<body>
  <!--Div that will hold the pie chart-->
  <div class="row">
    <div class="col-lg-12">
      <h3 class="widget-title"><span id="noticia">Monitoreo de Indicadores</span></h3>
      <div class="form-group">
        @forelse($promedio as $prom)  
        @empty
        <div class="alert alert-dismissable alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <h4>Mensaje del sistema!</h4>
          <p>No se encuentran registros para este indicador</p>
        </div>
        @endforelse
      </div>
      <div class="col-md-4"><h5 id="ultimo"><b>En la siguiente gráfica se muestra el crecimiento de un indicador determinadado, promediados por meses para un año en específico.</b></h5></div>
      <div class="col-md-4">
        <h4>Año: <b>
          @foreach($anios as $a)
          {{$a->actual}}
          @endforeach
        </b></h4>
      </div>
      <div class="col-md-4">
        <h4>Indicador: <b>{{$i->nombre}}</b></h4>
      </div>
    </div>
    <div class="col-lg-12">
      <h4><b>Ver Promedio de otros indicadores:</b></h4>
      <div class="col-md-4">
        <div class="form-group">
         <label>Elegir el indicador:</label>
         <select name="indicadores" class="form-control selectpicker" data-live-search="true" id="indicadores">
          <option value="">Eliga una opcion</option>
          @foreach ($indicadores as $i)
          <option value="{{$i->id}}">{{$i->nombre}}</option>
          @endforeach
        </select>
        <input type="hidden" name="valor2" id="valor2" class="capturas">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
       <label>Elegir el año:</label>
       <select name="fechas" class="form-control selectpicker" data-live-search="true" id="fechas">
        <option value="">Eliga una opcion</option>
        @foreach ($fechas as $f)
        <option value="{{$f->anio}}">{{$f->anio}}</option>
        @endforeach
      </select>
      <input type="hidden" name="valor1" id="valor1" class="capturas">
    </div>
  </div>
  <div class="col-md-4">
    <br>
    <button class="btn btn-primary" id="redirigir">Buscar</button>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </div>
</div>

</body>
@push ('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#redirigir').click(function(){
      redireccion();
    });
    // primera
    // $("#redirigir").attr('disabled', false);


    $("#indicadores").change(function(){
      // alert($('select[id=indicadores]').val());
      $('#valor2').val($(this).val());
    });
    // segunda
    $("#fechas").change(function(){
      // alert($('select[id=indicadores]').val());
      $('#valor1').val($(this).val());
    });

    // tercera
    // $('#redirigir').attr('disabled', true);
    // $('#valor1').keyup(function(){
    //   if ($(this).val().length !=0) 
    //     $('#redirigir').attr('disabled', false);
    //   else
    //     $('#redirigir').attr('disabled', true);
    // })

    // endtercera
    // otro ejemplo
    // $('select').on('change', function(){
    //   if ($(this).val() == null) {
    //     $('#redirigir').hide();
    //   }else {
    //     $('#redirigir').show();
    //   }
    // }).change();

  });
  // function evaluar()
  // {
  //   var2=$('#indicadores option:selected').val();
  //   var1=$('#fechas option:selected').val();

  //   if (var1!= "" && var2!="")
  //   {
  //     $('#redirigir').attr('disabled', false);
  //   }
  //   else
  //   {
  //     $('#redirigir').attr('disabled', true);
  //   }
  // }
</script>  
<script>
  function redireccion()
  {
      var indi=$('#valor2').val();
      // window.location.href=indi;
      var fecha=$('#valor1').val();
      if (fecha!= "" && indi!="")
      {
        // $('#redirigir').attr('disabled', false);
        var captu= fecha+ '/'+indi;
        var ruta='/promedios_meses/'+ captu;
        window.location.href=ruta;

      }
      else
      {
        alert('Para realizar la peticion, debe seleccionar el indicador y el año');
      }

      
  }

  </script>
  
  @endpush  
  @endsection