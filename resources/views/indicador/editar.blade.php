<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<body>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="tema">Nombre</label>
				<input type="text" name="nombre"  required value="{{$i->nombre}}" class="form-control" placeholder="Ingrese el Titulo">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="introduccion">Descripcion</label>
				<input type="text" name="descripcion"  required value="{{$i->descripcion}}" class="form-control" placeholder="Ingrese la Descripcion">
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Indicador</label>
				<select name="tipo" class="form-control">
					@foreach ($tipo as $tip)
					@if($tip->id==$i->indicador_id)
					<option value="{{$tip->id}}" selected>{{$tip->tipo}}</option>
					@else
					<option value="{{$tip->id}}">{{$tip->tipo}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Institucion</label>
				<select name="institucion_id" class="form-control">
					@foreach ($ins as $in)
					@if($in->id==$i->institucion_id)
					<option value="{{$in->id}}" selected>{{$in->nombres}}</option>
					@else
					<option value="{{$in->id}}">{{$in->nombres}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Importante</label>
				<select name="importante" class="form-control">
					@if($i->importante==1)
					<option value="{{$i->importante}}" selected="">Si</option>
					<option value="0">No</option>
					@else
					<option value="{{$i->importante}}" selected="">No</option>
					<option value="1">Si</option>
					@endif
				</select>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		// function seleccionar()
		// {
		// 	var id=$('#indicadorcap option:selected').val();
		// 	document.getElementById('capturar').value = id;

		// }
		// function seleccion()
		// {
		// 	var id2=$('#carreracap option:selected').val();
		// 	document.getElementById('capimportante').value = id2;
 	// 	}
 	// 	function institucion()
		// {
		// 	var id3=$('#institucioncap option:selected').val();
		// 	document.getElementById('capturarins').value = id3;
 	// 	}
 </script>
 </html>