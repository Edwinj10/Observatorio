<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$t->id}}">
	{{Form::open(array('action'=>array('TipoIndicadorController@update', $t->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Publicacion</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
			<div class="row">			
				<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
					<div class="form-group">
						<label for="t">tipo</label>
						<input type="text" name="tipo" maxlength="50" required value="{{$t->tipo}}" class="form-control" placeholder="Ingrese el Tipo">
					</div>
						
				</div>
				<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
					<div class="form-group">
						<label for="foto">Imagen</label>
							<input type="file" name="imagen"  class="form-control">
								@if(($t->imagen)!="")
									<img src="/imagenes/tipos_indicadores/{{$t->imagen}}" height="200px" width="200px">
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