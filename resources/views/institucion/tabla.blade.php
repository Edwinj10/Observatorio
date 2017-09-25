@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @foreach ($indicador as $i)
        <h4 class="widget-title">Nombre del Indicador: <b>{{$i->nombre}}</b></h4>
        <h4 class="widget-title">Indicador de : <a href="{{ route('institucion.show', $i->ind ) }}"><b>{{$i->nombres}}</b></a> </h4>
      @endforeach   
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h4 class="widget-title">Seleccionar Indicador</h4>
        <select name="nombre" class="form-control selectpicker" data-live-search="true" id="indicadorcap" onchange="ShowSelected();">
          @foreach ($indicador2 as $in)
            <option value="{{$in->id}}"><a href="/listado/{{$in->id}}">{{$in->nombre}}</a></option>
          @endforeach
            <!-- <input type="hidden" class="form-control" id="capturar">         
            <a href="javascript:ShowSelected();">
            <button onclick="redireccion();" class="btn btn-primary">Buscar</button>
            <! </a>  -->

        </select>           
    </div>
    <div class="col-lg-6 col-sm-6 col-sm-6 col-xs-12">
      <h4 class="widget-title">Exportar datos a Excel <a href="/descargar/{{$i->id}}/excel" class="btn-primary">Descargar</a></h4>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
        <h3 class="widget-title"><span id="noticia">Lista de Precios</span></h3>
      <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title"></h3>
            <div class="pull-right">
              <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Buscar</button>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead id="encabesado_tabla">
              <tr class="filters">
                <th><input type="text" class="form-control" placeholder="Precio" ></th>
                <th><input type="text" class="form-control" placeholder="Dia" ></th>
                <th><input type="text" class="form-control" placeholder="Mes" ></th>
                <th><input type="text" class="form-control" placeholder="Año" ></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($detalle as $det)
              <tr>
                <td>{{$det->precio}}</td>
                <td>{{$det->dia}}</td>
                <td>{{$det->mes}}</td>
                <td>{{$det->anio}}</td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>
    
{!!Html::script('js/tabla.js')!!}
<script type="text/javascript">

  // $("#indicadorcap").onchange(function(){
  //   var text= $(this).val();
  //   console.log(text);
  // });



  function ShowSelected()
  {

    // var cod = document.getElementById("indicadorcap").value;
    //  //` alert(cod);

    //  /* Para obtener el texto */
    // var combo = document.getElementById("indicadorcap");
    // var selected = combo.options[combo.selectedIndex].text;
    
    // document.getElementById('capturar').value = cod;
    // /* Para obtener el valor */
    var id=$('#indicadorcap option:selected').val();

    var ruta='/listado/'+ id;

     window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
     console.log(ruta);
    // $.ajax({
    //   url:''+ruta,
    //   type:'get',
    // });
  }

  // para seleccionar y buscar con el botton
  // function redireccion()
  // {
  //   // var id=$('#capturar').val();
  //   var id=  '/indicadoresid/'+$('#capturar').val();
  //   window.location.href=id;
    
  // }

</script>
</body>
</html>







@stop

