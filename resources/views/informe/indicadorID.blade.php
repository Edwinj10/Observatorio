@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<div class="row">
  <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
    <h3>{{$nombre->nombre}} <a href="/tipo/create"><button class="btn btn-success">Nuevo</button></a></h3>         
  </div>
  <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
    <div class="form-group">
      <label>Indicador</label>
        <select name="nombre" class="form-control selectpicker" data-live-search="true" id="indicadorcap" onchange="ShowSelected();">
          @foreach ($indicador as $i)
            <option value="{{$i->id}}"><a href="/indicadoresid/{{$i->id}}">{{$i->nombre}}</a></option>
          @endforeach
          <!-- <input type="hidden" class="form-control" id="capturar">         
            <a href="javascript:ShowSelected();">
              <button onclick="redireccion();" class="btn btn-primary">Buscar</button>
           <! </a>  -->

        </select>
    </div>
  </div>
</div> 
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Dia</th>
          <th>Mes</th>
          <th>Año</th>
          <th>Precio</th>
        </thead>
        @foreach ($informe as $inf)
        <tr>
          <td>{!! $inf->dia!!}</td>
          <td>{!! $inf->mes!!}</td>
          <td>{!! $inf->anio!!}</td>
          <td>{{$inf->precio}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div> 
@push ('scripts')
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

    var ruta='/indicadoresid/'+ id;

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
@endpush   

@stop