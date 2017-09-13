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
          <h3>Listado de Noticias <a href="/noticias/create"><button class="btn btn-success">Nuevo</button></a></h3>
              @include('noticias.search')
              <p>
                pagina {{$noticias->currentPage()}}
                de {{$noticias->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Titulo</th>
          <th>Resumen</th>
          <th>Creador</th>
          <th>Indicador</th>
          <th>Fecha</th>
          <th>Imagen</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($noticias as $n)
        <tr>
          
          <td>{{ $n->titulo}}</td>
          <td>{!! $n->resumen!!}</td>
          <td>{{ $n->name}}</td>
          <td>{{ $n->nombre}}</td>
          <td>{{ $n->fecha}}</td>
          <td>
            <img src="{{asset('imagenes/noticias/'.$n->foto)}}" alt="{{ $n->titulo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>

            <a href="" data-target="#modal-edit-{{$n->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>  
            <a href="" data-target="#modal-delete-{{$n->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        
        @include('noticias.modal') 
        @include('noticias.modaledit')
        
        @endforeach
      </table>
    </div>
    {{$noticias->render()}}
  </div>
</div>      
@stop