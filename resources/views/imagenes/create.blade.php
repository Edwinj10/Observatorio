<html>
<head>
    <meta charset="utf-8">
</meta>
</head>
<body>
    <div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
        <div class="form-group">
            <label for="titulo">
                Titulo
            </label>
            <input class="form-control" name="titulo" placeholder="Ingrese el Titulo" required="" type="text" value="{{old('titulo')}}">
        </input>
    </div>
</div>
<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
    <div class="form-group">
        <label for="foto">
            Imagen
        </label>
        <input class="form-control" id="imagen" name="foto" required="" type="file" value="{{old('foto')}}">
    </input>
</div>
</div>
</body>
</html>
