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
				<label for="titulo">Precio</label>
				<input type="text"  name="precio" required value="{{$inf->precio}}" class="form-control" placeholder="Ingrese el Precio">
			</div>
		</div>
	</div>

</body>
</html>