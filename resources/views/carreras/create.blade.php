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
	
	{!! Form::open(['route' => 'carreras.store' , 'method' =>'POST','files' => true]) !!}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="tema">Carrera</label>
					<input type="text"  id="carrera" maxlength="50" onkeyup="cuentatitulo();" name="carrera" required value="{{old('carrera')}}" 
					class="form-control" placeholder="Ingrese la carrera">
				</div>
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

<!-- <script type="text/javascript">
	function cuenta(){
		var longi=140;
		var resta="";
		var detalles = document.getElementById("detalles").value.length;
		resta=longi-detalles;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_caracter").value=resta;
		if (detalles==140) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
 -->
<script type="text/javascript">
	function cuentatitulo(){
		var longi=40;
		var resta="";
		var titulo = document.getElementById("titulo").value.length;
		resta=longi-titulo;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_titulo").value=resta;
		if (titulo==40) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
@endpush
	@endsection