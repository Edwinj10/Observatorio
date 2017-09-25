@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Indicadores <a href="/tipo/create"><button class="btn btn-primary">Nuevo</button></a></h3>
              
              <p>
                pagina {{$tipo->currentPage()}}
                de {{$tipo->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Id</th>
          <th>Tipo</th>
          <th>Imagen</th>
          <th>Editar</th>
          
        </thead>
        @foreach ($tipo as $t)
        <tr>
          
          <td>{{ $t->id}}</td>
          <td>{!! $t->tipo!!}</td>
          <td>
            <img src="{{asset('imagenes/tipos_indicadores/'.$t->imagen)}}" alt="{{ $t->tipo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>

            <a href="" data-target="#modal-edit-{{$t->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
            
          </td>
        </tr>
        @include('tipoindicador.modal')

        
        @endforeach
        
      </table>
    </div>
    {{$tipo->render()}}
  </div>
</div>      
@stop