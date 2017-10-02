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
                    <h3 class="panel-title">Listado de Usuario</h3>
                    <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$usuarios->total()}}</b></h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                   
                      <button type="button" class="btn btn-sm btn-primary btn-create" name="nuevo" id="nuevo">Crear Nuevo</button>
                    
                  </div>
                </div>
                @include('buscador')
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <div id="listar_usuarios"></div>
                </div>
            
              </div>
              
            </div>

</div></div></div>
@push ('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    listar_Usuarios();
  });

  $(document).on("click", ".pagination li a", function(e){
    e.preventDefault();
    var url = $(this).attr("href");

    $.ajax({
      type: 'get',
      url: url,
      success:function(data){
        $('#listar_usuarios').empty().html(data);
      }
    });
  });
  $("#nuevo").click(function(event)
  {
    document.location.href = "{{route('usuarios.create')}}";
  });
var listar_Usuarios=function()
{
  $.ajax({
    type:'get',
    url: '{{url('listall')}}',
    success:function(data){
      $('#listar_usuarios').empty().html(data);
    }
  });
}
</script>
@endpush
@stop