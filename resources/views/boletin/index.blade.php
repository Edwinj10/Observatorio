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
          <h3>Listado de Boletines <a href="/boletin/create"><button class="btn btn-success">Nuevo</button></a></h3>
              
             
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          
          <th>Url</th>
          
        </thead>
        @foreach ($boletin as $b)
        <tr>
          
          <td>{{ $b->url}}</td>
    

        </tr>
        

        
        @endforeach
      </table>
    </div>

  </div>

</div>      
@stop