<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create">
	{!! Form::open(['route' => 'institucion.store' , 'method' =>'POST','files' => true]) !!}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Agregar Institucion</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
				@include('institucion.create')
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
		{{Form::close()}}
	</div>
