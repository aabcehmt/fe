@extends('admin/layout')

@section('place')
	
@stop

@section('content')
	<div class="col-md-6 col-md-offset-1 col-sd-12">

		<div class="list-group">
			<a href="/home" class="list-group-item active">home</a>
			<a href="{{ route('cities.localidades.index') }}" class="list-group-item">localidades</a>
			<a href="{{ route('cities.calles.index') }}" class="list-group-item">calles</a>
			<a href="{{ route('people.personas.index') }}" class="list-group-item">personas</a>
			<a href="{{ route('admin.users.index') }}" class="list-group-item">usuarios</a>
		</div>
		
	</div>
@stop