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
            <div class="col col-xs-6">
              <h3 class="panel-title">Listado de Boletines</h3>
            </div>
            <div class="col col-xs-6 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
            </div>
          </div>
          @include('buscador')
          @include('boletin.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Url</th>
                  <th>Descripcion</th>
                  <th>Imagen de portada</th>
                  <!-- <th>Archivo</th> -->
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($boletin as $b)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$b->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-primary" href="{{ route('boletin.show', $b->id ) }}"><em class="fa fa-eye"></em></a>
                  </td>
                  <td>{!! $b->url!!}</td>
                  <td>{!! $b->descripcion!!}</td>
                  <td>
                    <img src="{{asset('imagenes/boletines/'.$b->portada)}}" alt="{{ $b->titulo}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                              <!-- <td>
                                  <embed src="{{asset('archivos/boletines/'.$b->archivo)}}" type="application/pdf" width="50%" height="200"></embed>
                                </td> -->
                              </tr>
                              @include('boletin.modal') 
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                      <div class="panel-footer">
                        <div class="row">
                          <div class="col col-xs-4">
                            Pagina {{$boletin->currentPage()}} de {{$boletin->lastPage()}}
                          </div>
                          <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right">
                              {{$boletin->render()}}
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