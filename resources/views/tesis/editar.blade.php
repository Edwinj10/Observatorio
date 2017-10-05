<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{!!Html::script('http://code.jquery.com/jquery-1.11.1.min.js')!!}
</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="tema">Tema</label>
			<input type="text" name="tema"  required value="{{$t->tema}}" class="form-control" placeholder="Ingrese el Titulo">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="introduccion">Introducción</label>
			<input type="text" name="introduccion"  required value="{{$t->introduccion}}" class="form-control" placeholder="Ingrese el Titulo">
		</div>

	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="introduccion">Metodologia</label>
			<input type="text" name="metodologia"  required value="{{$t->metodologia}}" class="form-control" placeholder="Ingrese la Metodologia">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Indicador</label>
			<select name="indicador" class="form-control">
				@foreach ($indicador as $ind)
				@if($ind->id==$t->id_indicador)
				<option value="{{$ind->id}}" selected>{{$ind->nombre}}</option>
				@else
				<option value="{{$ind->id}}">{{$ind->nombre}}</option>
				@endif
				@endforeach
				<!-- <input type="text" class="form-control" id="capturar" name="capturar"> -->
				<!-- selectpicker" data-live-search="true" id="indicadorcap" onchange="seleccionar();" -->
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Carreras</label>
			<select name="carrera" class="form-control">
				@foreach ($carreras as $ca)
				@if($ca->id==$t->id_carrera)
				<option value="{{$ca->id}}" selected>{{$ca->carrera}}</option>
				@else
				<option value="{{$ca->id}}">{{$ca->carrera}}</option>
				@endif
				@endforeach
			</select>
			<!-- <input type="text" class="form-control" id="capcarrera" name="capcarrera" required value="{{$t->id_carrera}}"> -->
			<!-- selectpicker" data-live-search="true" id="carreracap" onchange="seleccion(); -->
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Autor</label>
			<input type="tex" name="autor"  required value="{{$t->autor}}" class="form-control" placeholder="Ingrese el Autor">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="imagen">Imagen</label>
			<input type="file" name="imagen"  class="form-control">
			@if(($t->imagen)!="")
			<img src="/imagenes/tesis/{{$t->imagen}}" height="200px" width="200px">
			@endif
		</div>

	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="imagen">PDF</label>
			<input type="file" name="archivo"  class="form-control">
			@if(($t->archivo)!="")
			<embed src="{{asset('archivos/tesis/'.$t->archivo)}}" type="application/pdf" width="200px" height="200px"></embed>
			@endif
		</div>

	</div>
	<!-- <script type="text/javascript">
		$(document).ready(function(){
			$(".form-control.selectpicker").change(function(){
				alert($('select[id=indicador]').val());
				$('#capturar').val($(this).val());
			});
		});
	</script> -->
</body>

<!-- <script src="{{asset('/js/bootstrap-select.min.js')}}"></script -->
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$("#indicador").change(function(){
		// 	alert($('select[id=indicador]').val());
		// 	$('#capturar').val($(this).val());
		// });
		// });
	// $(document).ready(function(){
	// 	seleccionar();
	// 	seleccion();
	// });
	// function seleccionar()
	// {
	// 	var idd=$('#indicadorcap option:selected').val();
	// 	document.getElementById('capturar').value = idd;

	// }

	// function seleccion()
	// {
	// 	var id=$('#carreracap option:selected').val();
	// 	document.getElementById('capcarrera').value = id;

	// }
	

</script>  

</html>