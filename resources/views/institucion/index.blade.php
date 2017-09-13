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
          <h3>Listado de Instituciones <a href="/institucion/create"><button class="btn btn-success">Nuevo</button></a></h3>
              
              <p>
                pagina {{$instituciones->currentPage()}}
                de {{$instituciones->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Mision</th>
          <th>Vision</th>
          <th>Logo</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($instituciones as $inst)
        <tr>
          
          <td>{{ $inst->nombres}}</td>
          <td>{!! $inst->direccion!!}</td>
          <td>{{ $inst->mision}}</td>
          <td>{{ $inst->vision}}</td>
          <td>
            <img src="{{asset('imagenes/instituciones/'.$inst->logo)}}" alt="{{ $inst->titulo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>

            <a href="" data-target="#modal-edit-{{$inst->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>  
            <a href="" data-target="#modal-delete-{{$inst->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
           
       </tr>
       @include('institucion.modal') 
      @include('institucion.modaledit')
        
       
        @endforeach
      </table>
    </div>
    {{$instituciones->render()}}
  </div>
</div>      
@stop