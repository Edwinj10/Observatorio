@extends('layouts.admin')

@section('content')


	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error  }}</li>

				@endforeach

			</ul>


		</div>
	@endif
	
	{!! Form::open(['route' => 'tipo.store' , 'method' =>'POST']) !!}
	<div class="row">			
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="titulo">Tipo</label>
					<input type="text"  id="titulo" name="tipo" required value="{{old('tipo')}}" 
					class="form-control" placeholder="Ingrese el Tipo">
				</div>
				<input type="text" id="mostar_titulo" name="mostar_titulo" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
				
		</div>
		
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
			<!-- este toke nos ayudara a trabajr con las trasaciones -->
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
		</div>
	</div>
	
					
					
		{!!Form::close()!!}
	
@push ('scripts')

@endpush
	@endsection