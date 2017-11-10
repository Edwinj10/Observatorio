<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Nombre</label>
			<h4>{{$inf->nombre}}</h4>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Cantidad</label>
			<input type="text"  name="precio" onkeypress="return validar(event)" required value="{{$inf->precio}}" class="form-control" placeholder="Ingrese el Precio">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Descripcion</label>
			<input type="text"  name="descripcion" required value="{{$inf->descripcion}}" class="form-control" placeholder="Ingrese la Descripcion">
		</div>
	</div>
</div>

</body>
</html>
<script type="text/javascript">
	function validar(e){
		tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9.]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>