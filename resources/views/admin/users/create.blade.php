@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<div class="col-md-6 col-md-offset-1 col-sd-12">

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

		{!! Form::open(['route' => 'admin.users.store', 'method'=>'POST']) !!}

			@include('admin.users.partials.fields')

			<div class="form-group">
				<a href="{{ route('admin.users.index') }}">
					<button class="btn btn-default" type="button">Cancelar</button>
				</a>
				<button type="submit" class="btn btn-info">Crear</button>
			</div>

		{!! Form::close() !!}
	</div>
@stop