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
                    <h3 class="panel-title">Listado de Tesis</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/tesis/create">
                      <button type="button" class="btn btn-sm btn-primary btn-create">Crear Nuevo</button>
                    </a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-list table-hover">
                    <thead>
                      <tr>
                          <th><em class="fa fa-cog"></em></th>
                          <!-- <th class="hidden-xs">ID</th> -->
                          <th>Tema</th>
                          <th>Introduccion</th>
                          <th>Autor</th>
                          <th>Carrera</th>
                          <th>Indicador</th>
                          <th>Imagen de Portada</th>
                          <th>PDF</th>
                      </tr> 
                    </thead>
                    <tbody>
                            <tr>
                              @foreach ($tesis as $t)
                              <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                              </td>
                              
                              <td>{!! $t->tema!!}</td>
                              <td>{!! $t->introduccion!!}</td>
                              <td>{{ $t->autor}}</td>
                              <td>{{$t->carrera}}</td>
                              <td>{{$t->nombre}}</td>
                              <td><img src="{{asset('/imagenes/tesis/'.$t->imagen)}}"  height="50px" width="50px" class="img-thumbail"></td>
                              <td>
                                <a href="/tesis/{{$t->id}}" ><img src="/archivos/iconopdf.png" alt="" height="30px" width="30px"></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                  </table>
                </div>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
                    Pagina {{$tesis->currentPage()}} de {{$tesis->lastPage()}}
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      {{$tesis->render()}}
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
@stop