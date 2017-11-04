@extends ('layouts.admin')
@section ('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@include('error.error')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col-lg-4">
              <h3 class="panel-title">Listado de Precios de Indicador: <b>{{$nombre->nombre}}</b></h3>
              <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$informe->total()}}</b></h3>
            </div>
            <div class="col-lg-4">

              <label>Indicador</label>
              <select name="nombre" class="form-control selectpicker" data-live-search="true" id="indicadorcap" onchange="ShowSelected();">
                <option value="">Elegir una opcion</option>
                @foreach ($indicador as $i)
                <option value="{{$i->id}}"><a href="/indicadoresid/{{$i->id}}">{{$i->nombre}}</a></option>
                @endforeach


              </select>

            </div>
            <br>
            <div class="col-lg-4">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal">Agregar Precio</button>
            </div>
          </div>
          @include('buscador')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Dia</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Precio</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($informe as $inf)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$inf->idp}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-primary" href="/indicadoresid/{{$inf->id}}"><em class="fa fa-eye"></em></a>
                  </td>

                  <td>{!! $inf->dia!!}</td>
                  <td>{!! $inf->mes!!}</td>
                  <td>{!! $inf->anio!!}</td>
                  <td>{{$inf->precio}}</td>
                </tr>
                @include("informe.modaledit")
                @include("informe.modal-create")
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-xs-8">

              {{$informe->render()}}
              
            </div>
          </div>
        </div>
      </div>
    </div></div></div>
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
     // console.log(ruta);
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