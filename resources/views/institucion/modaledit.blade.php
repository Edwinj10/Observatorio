<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$inst->id}}">
	{{Form::open(array('action'=>array('InstitucionController@update', $inst->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Institucion</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Nombre</label>
								<input type="text" name="nombres" required value="{{$inst->nombres}}" class="form-control" placeholder="Ingrese el Nombre">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Direccion</label>
								<input type="text" name="direccion" required value="{{$inst->direccion}}" class="form-control" placeholder="Ingrese la Direccion">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Mision</label>
								<input type="text" name="mision" required value="{{$inst->mision}}" class="form-control" placeholder="Ingrese la Mision">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Vision</label>
								<input type="text" name="vision" required value="{{$inst->vision}}" class="form-control" placeholder="Ingrese la Vision">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="foto">Logo</label>
							<!-- la propiedad required value="{{old('nombres')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
							<input type="file" name="logo"  class="form-control">
								@if(($inst->logo)!="")
									<img src="/imagenes/instituciones/{{$inst->logo}}" height="200px" width="200px">
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