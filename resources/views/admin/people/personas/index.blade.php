@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<p>
		<a href="{{ route('people.personas.create') }}">
			<button class="btn btn-info btn-xs" role="button">
				Nueva Paersona
			</button>
		</a>
	</p>
	
	<div class="col-md-12 col-sd-12">

		@include('admin.people.personas.partials.table')
		
	</div>

	<code>
		<small>
			Lo que ves arriba es el listado de personas existenes en la base de datos. 
			Para ver el detalle completo de cada uno, editarlo o eliminarlo 
			clickea la opción <kbd>detallar</kbd>, <kbd>editar</kbd> o <kbd>eliminar</kbd> respectivamente, 
			en la fila correspondiente al usuario en cuestión.
		</small>
	</code>
@stop