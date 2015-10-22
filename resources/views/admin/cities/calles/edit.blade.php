@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<div class="col-md-5 col-sd-12">
		@include('admin.cities.calles.partials.data')
	</div>


	<div class="col-md-7 col-sd-12">
		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<p class="text-danger">Please, check your inputs.</p>
				
				<ul class="text-danger">
				@foreach( $errors->all() as $error )
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!! Form::model( $calle, ['route' => ['cities.calles.update',$calle], 'method'=>'PUT']) !!}
			
			@include('admin.cities.calles.partials.fields')
			
			<div class="form-group">
				<a href="{{ route( 'cities.calles.show', $calle ) }}">
					<button class="btn btn-default" type="button">Cancelar</button>
				</a>
				<button type="submit" class="btn btn-info">Editar</button>
			</div>

		{!! Form::close() !!}
	</div>
@stop