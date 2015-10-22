@extends('admin/layout')

@section('title')
	{{ $localidad->nombre }}
@stop

@section('place')
	{!! Html::ol( $donde_estoy, [ "class" => "breadcrumb" ]) !!}


	
@stop

@section('content')

	<div class="col-md-5 col-sd-12">
		@include('admin.cities.localidades.partials.data')
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

		{!! Form::model( $localidad, ['route' => ['cities.localidades.update',$localidad], 'method'=>'PUT']) !!}
			@include('admin.cities.localidades.partials.fields')
			
			<div class="form-g	roup">
				<a href="{{ route( 'cities.localidades.show', $localidad ) }}">
					<button class="btn btn-default" type="button">Cancelar</button>
				</a>
				<button type="submit" class="btn btn-info">Editar</button>
			</div>

		{!! Form::close() !!}
	</div>
@stop