<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$b->id}}">
	{{Form::open(array('action'=>array('BoletinController@update', $b->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Boletin</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Url</label>
							<input type="text" name="url"  required value="{{$b->url}}" class="form-control" placeholder="Ingrese la Url">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Descripcion</label>
							<input type="text" name="descripcion"  required value="{{$b->descripcion}}" class="form-control" placeholder="Ingrese la Descripcion">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="portada">Imagen</label>
							<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
							<input type="file" name="portada"  class="form-control">
							@if(($b->portada)!="")
							<img src="{{asset('imagenes/boletines/'.$b->portada)}}" height="200px" width="200px">
							@endif
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="imagen">PDF</label>
							<input type="file" name="archivo"  class="form-control">
							@if(($b->archivo)!="")
							<embed src="{{asset('archivos/boletines/'.$b->archivo)}}" type="application/pdf" width="200px" height="200px"></embed>
							@endif
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>

		{{Form::close()}}
	</div>