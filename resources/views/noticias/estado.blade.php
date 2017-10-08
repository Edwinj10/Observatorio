@extends ('layouts.admin')
@section ('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Listado de Noticas en Estado: @foreach ($tipo as $e) {{$e->estado}} @endforeach</h3>
              <div class="form-group">
                <h3 class="panel-title">Filtrar por estado:</h3>
                <select name="estado" class="form-control selectpicker" data-live-search="true" onchange="Seleccionar();" id="estado">
                  <option value="">Eliga una opcion</option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Espera</option>
                </select>
              </div>
            </div>
            <div class="col col-xs-6 text-right">
              <a href="/noticias/create">
                <button type="button" class="btn btn-sm btn-primary btn-create">Crear Nuevo</button>
              </a>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
              <a href="/noticias">
                <button type="button" id="ver" class="btn btn-sm btn-primary">Ver todos</button>
              </a>
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
                  <th>Titulo</th>
                  <th>Resumen</th>
                  <th>Creador</th>
                  <th>Estado</th>
                  <th>Indicador</th>
                  <th>Fecha</th>
                  <th>Imagen</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($noticias as $n)
                  <td align="center">
                    <a class="btn btn-default" href="{{ route ('noticias.edit',[$n->id])}}"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" href="" data-target="#modal-delete-{{$n->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>

                  <td>{{ $n->titulo}}</td>
                  <td>{!! $n->resumen!!}</td>
                  <td>{{ $n->name}}</td>
                  <td>{{ $n->estado}}</td>
                  <td>{{ $n->nombre}}</td>
                  <td>{{ $n->fecha}}</td>
                  <td>
                    <img src="{{asset('imagenes/noticias/'.$n->foto)}}" alt="{{ $n->titulo}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                </tr>
                @include('noticias.modal') 

                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-4">
              Pagina {{$noticias->currentPage()}} de {{$noticias->lastPage()}}
            </div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
                {{$noticias->render()}}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    @push ('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        $("#ver").click(function(){
          $('.btn-danger').toggle(1000);
        });
      });
      $(document).ready(function(){
        $(".btn-danger").hide();
      });
       function Seleccionar()
      {

    // var cod = document.getElementById("indicadorcap").value;
    //  //` alert(cod);

    //  /* Para obtener el texto */
    // var combo = document.getElementById("indicadorcap");
    // var selected = combo.options[combo.selectedIndex].text;
    
    // document.getElementById('capturar').value = cod;
    // /* Para obtener el valor */
    var id=$('#estado option:selected').val();

    var ruta='/noticias/estado/'+ id;

    window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
     // console.log(ruta);
    // $.ajax({
    //   url:''+ruta,
    //   type:'get',
    // });
  }
    </script>
    @endpush
    @stop