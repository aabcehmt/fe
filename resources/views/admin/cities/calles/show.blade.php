@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')

		<div class="col-md-12 col-sd-12">
			{!! Form::open(['route' => ['cities.calles.destroy',$calle], 'method'=>'DELETE']) !!}
				<div class="btn-group" role="group">
					<a href="{{ route( 'cities.calles.edit', $calle ) }}" class="btn btn-default btn-xs">Editar</a>
					<button type="submit" onclick="return confirm('Seguro que vas a eliminar?')" class="btn btn-danger btn-xs">Eliminar</button>
				</div>
			{!! Form::close() !!}
		</div>

		@include('admin.cities.calles.partials.data')

@stop