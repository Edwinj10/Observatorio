<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$n->id}}">
	{{Form::open(array('action'=>array('NoticiasController@update', $n->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Noticia</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Titulo</label>
								<input type="text" name="titulo" maxlength="50" required value="{{$n->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
							</div>
							
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
							<div class="form-group">
								<label for="titulo">Resumen</label>
								<input type="text" name="resumen" maxlength="80" required value="{{$n->resumen}}" class="form-control" placeholder="Ingrese el Titulo">
							</div>
							
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="descripcion">Descripcion</label>
							<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" required value="{!!$n->descripcion!!}"></textarea>
							@ckeditor('bodyField', ['height' => 400, 'width'=>500])
						</div>
							
					</div>
				
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="foto">Imagen</label>
							<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
							<input type="file" name="foto"  class="form-control">
								@if(($n->foto)!="")
									<img src="/imagenes/noticias/{{$n->foto}}" height="200px" width="200px">
								@endif
						</div>
						
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
					<div class="form-group">
						<label>Categoria</label>
						<select name="origen" class="form-control">
								<option value="{{$n->origen}}">{{$n->origen}}</option>
								<option value="Local">Local</option>
								<option value="Nacional">Nacional</option>
						</select>

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