@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<p>
		<a href="{{ route('admin.users.create') }}">
			<button class="btn btn-info btn-xs" role="button">
				Nuevo Usuario
			</button>
		</a>
	</p>
	
	<div class="col-md-12 col-sd-12">

		@include('admin.users.partials.table')

	</div>

	<code>
		<small>
			Lo que ves arriba es el listado de usuarios existenes en la base de datos. 
			Para ver el detalle completo de cada uno, editarlo o eliminarlo 
			clickea la opción <kbd>detallar</kbd>, <kbd>editar</kbd> o <kbd>eliminar</kbd> respectivamente, 
			en la fila correspondiente al usuario en cuestión.
		</small>
	</code>

	<!-- Trigger the modal with a button -->
	<p><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Open Modal</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop