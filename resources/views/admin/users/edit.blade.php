@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<div class="row">
		<div class="col-md-4 col-sd-12">
			<address>
				<strong>Datos actuales del usuario</strong><br>
				
				<br><strong>Username</strong><br>
				{{ $user->name }}<br>
				
				<br><strong>Email</strong><br>
				<a href="mailto:#">{{ $user->email }}</a>
			</address>
		</div>

		<div class="col-md-8 col-sd-12">
			
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

			{!! Form::model( $user, ['route' => ['admin.users.update',$user], 'method'=>'PUT']) !!}
				@include('admin.users.partials.fields')
				
				<div class="form-group">
					<a href="{{ route('admin.users.index') }}">
						<button class="btn btn-default" type="button">Cancelar</button>
					</a>
					<button type="submit" class="btn btn-info">Editar</button>
				</div>

			{!! Form::close() !!}
		</div>
	</div>
@stop