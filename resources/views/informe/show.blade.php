 @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@extends('layouts.principal')
@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

            google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Precio'],
          @foreach ($fechas as $f)
          ['{{$f->dia}}/{{$f->mes}}/{{$f->anio}}'
          
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
        <div class="col-lg-12 xs-6">

          <h4>Ultimos Valores de: {{$i->nombre}}</h4>
          <div id="chart_div" style="width: 100%; height: 500px;"></div>
        </div>
        
      </div>
    
      


@endsection
