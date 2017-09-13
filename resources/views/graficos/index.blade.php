@extends ('layouts.principal')
@section ('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

            google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Precio'],
          @foreach ($graficos as $grafico)
          ['{{$grafico->dia}}-{{$grafico->mes}}-{{$grafico->anio}}', {{$grafico->precio}}],
          @endforeach
        ]);
        

        var options = {
          title: 'Reporte Salario Minimo',
          hAxis: {title: 'Dia',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
    <!--Div that will hold the pie chart-->
    
      <div class="row">
        <div class="col-lg-12 xs-6">
          <h3>{{$grafico->nombre}}</h3>
          <div id="chart_div" style="width: 100%; height: 500px;"></div>
        </div>
        
      </div>
    
    

     
@stop