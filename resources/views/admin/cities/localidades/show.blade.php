@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')

	<div class="col-md-12 col-sd-12">
		
		@include('admin.cities.localidades.partials.data')
		
		<div class="btn-group" role="group">
			<a href="{{ route( 'cities.localidades.edit', $localidad ) }}" class="btn btn-default btn-xs">Editar</a>
			<a href="#" class="btn btn-default btn-xs">Eliminar</a>
		</div>
	</div>
@stop