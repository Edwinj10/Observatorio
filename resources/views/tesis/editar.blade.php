<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		<select name="indicador" class="form-control selectpicker" data-live-search="true" id="indicadorcap" onchange="seleccionar();">
			<option value="{{$t->id_indicador}}">{{$t->nombre}}</option>
			@foreach ($indicador as $i)
			<option value="{{$i->id}}">{{$i->nombre}}</option>
			@endforeach
			<input type="hidden" class="form-control" id="capturar" name="capindicador" required value="{{$t->id_indicador}}">
		</select>
	</div>
</div>
<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
	<div class="form-group">
		<label>Carreras</label>
		<select name="carrera" class="form-control selectpicker" data-live-search="true" id="carreracap" onchange="seleccion();">
			<option value="{{$t->id_carrera}}">{{$t->carrera}}</option>
			@foreach ($carreras as $c)
			<option value="{{$c->id}}">{{$c->carrera}}</option>
			@endforeach
			<input type="hidden" class="form-control" id="capcarrera" name="capcarrera" required value="{{$t->id_carrera}}">
		</select>
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

</body>

   <!-- <script src="{{asset('/js/bootstrap-select.min.js')}}"></script -->
<script type="text/javascript">
  function seleccionar()
  {
    var id=$('#indicadorcap option:selected').val();
    document.getElementById('capturar').value = id;
    
  }

  function seleccion()
  {
    var id=$('#carreracap option:selected').val();
    document.getElementById('capcarrera').value = id;
     // alert(id);
  }
</script>  
</html>