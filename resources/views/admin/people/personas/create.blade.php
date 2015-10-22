@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<div class="row">
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
	</div>

	<div class="center-block">
		<div class="col-lg-5 col-md-6 col-sd-12 col-xs-12">

			{!! Form::open(['route' => 'people.personas.store', 'method'=>'POST']) !!}
			
				@include('admin.people.personas.partials.fields')
				
				<div class="form-group">
					<a href="{{ route('people.personas.index') }}">
						<button class="btn btn-default" type="button">Cancelar</button>
					</a>
					<button type="submit" class="btn btn-info">Crear</button>
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@stop