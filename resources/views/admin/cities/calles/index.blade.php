@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	
	@if ( Session::has('message') )
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
	@endif
	
	<p>
		<a href="{{ route('cities.calles.create') }}">
			<button class="btn btn-info btn-xs" role="button">
				Nueva Calle
			</button>
		</a>
	</p>
	<div class="col-md-12 col-sd-12">

		@include('admin.cities.calles.partials.table')

	</div>

	<code>
		<small>
			Lo que ves arriba es el listado de calles existenes en la base de datos. 
			Para ver el detalle completo de cada una, editarla o eliminarla 
			clickea la opción <kbd>ver</kbd>, <kbd>editar</kbd> o <kbd>eliminar</kbd> respectivamente, 
			en la fila correspondiente al usuario en cuestión.
		</small>
	</code>
@stop