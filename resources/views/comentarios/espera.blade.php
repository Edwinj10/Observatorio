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
            <div class="col col-xs-8">
              <h3 class="panel-title">Listado de Comentarios en @foreach ($tipo as $e) {{$e->estado}} @endforeach</h3><br>
              <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$comentarios->total()}}</b></h3><br>
              <div class="form-group">
                <h3 class="panel-title"><b>Filtrar por estado:</b></h3>
                <select name="estado" class="form-control selectpicker" data-live-search="true" onchange="Seleccionar();" id="estado">
                  <option value="">Eliga una opcion</option>
                  <option value="Activo">Activo</option>
                  <option value="Espera">Espera</option>
                </select>
              </div>
            </div>
            <div class="col col-xs-4 text-right">
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
              <a href="/comentarios">
                <button type="button" class="btn btn-sm btn-primary btn-create">Ver todos</button>
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
                  <th>Nombre del Usuario</th>
                  <th>Correo</th>
                  <th>Titulo de la Noticia</th>
                  <th>Comentario</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($comentarios as $c)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-delete-{{$c->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" id="borrar" data-target="#modal-eliminar-{{$c->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>

                  <td>{!! $c->name!!}</td>
                  <td>{!! $c->email!!}</td>
                  <td>{{ $c->titulo}}</td>
                  <td>{{ $c->comentario}}</td>
                  <td>{{ $c->fecha}}</td>
                  <td>{{$c->estado}}</td>
                </tr>
                @include('comentarios.modal')
                @include('comentarios.modal-delete')
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-8">
              {{$comentarios->render()}}
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    @push ('scripts')
    {!!Html::script('/js/tabla.js')!!}
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

    var ruta='/comentarios/estado/'+ id;

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