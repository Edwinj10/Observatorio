<html>
<head>
	<meta charset="UTF-8">

</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="tema">Carrera</label>
			<input type="text"  id="carrera" maxlength="50" onkeyup="cuentatitulo();" name="carrera" required value="{{old('carrera')}}" 
			class="form-control" placeholder="Ingrese la carrera">
		</div>
	</div>
</body>
</html>