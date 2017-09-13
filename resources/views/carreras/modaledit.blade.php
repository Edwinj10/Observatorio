<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$t->id}}">
	{{Form::open(array('action'=>array('TesisController@update', $t->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Tesis</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="tema">Tema</label>
								<input type="text" name="tema" maxlength="50" required value="{{$t->tema}}" class="form-control" placeholder="Ingrese el Titulo">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="introduccion">Introducción</label>
								<input type="text" name="introduccion" maxlength="80" required value="{{$t->introduccion}}" class="form-control" placeholder="Ingrese el Titulo">
							</div>
							
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="autor">Autor</label>
							<textarea rows="5" id="bodyField" name="autor"  class="form-control" required value="{!!$t->autor!!}"></textarea>
						</div>
							
					</div>

				
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="imagen">Imagen</label>
							<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
							<input type="file" name="imagen"  class="form-control">
								@if(($t->imagen)!="")
									<img src="/imagenes/tesis/{{$t->imagen}}" height="200px" width="200px">
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
