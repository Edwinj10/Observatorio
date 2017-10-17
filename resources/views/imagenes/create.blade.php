<html>
<head>
    <meta charset="utf-8">
</meta>
</head>
<body>
    <div class="form-group">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <b>Se recomienda justificar y dar tamaño uniforme al texto que se ingrese en el campo descripcion</b>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
        <div class="form-group">
            <label for="titulo">
                Titulo
            </label>
            <input class="form-control" name="titulo" placeholder="Ingrese el Titulo" required="" type="text" value="{{old('titulo')}}">
        </input>
    </div>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="form-group">
        <label for="descripcion">
            Descripcion
        </label>
        <textarea class="form-control" id="bodyField" name="descripcion" placeholder="Ingrese la Descripcion" rows="5">
        </textarea>
        @ckeditor('bodyField', ['height' => 200, 'width'=>500])
        <!-- <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Ingrese la Descripcion"> -->
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
{!!Form::close()!!}
