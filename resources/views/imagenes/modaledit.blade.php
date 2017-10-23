<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$i->id}}">
	{{Form::open(array('action'=>array('ImageneController@update', $i->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Imagen de Portada</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Titulo</label>
							<input type="text" name="titulo" maxlength="50" required value="{{$i->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="foto">Imagen</label>
							<input type="file" name="foto"  class="form-control">
							@if(($i->foto)!="")
							<img src="/imagenes/imagenes/{{$i->foto}}" height="200px" width="200px">
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