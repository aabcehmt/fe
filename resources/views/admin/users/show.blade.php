@extends('admin/layout')

@section('place')
	{!! $whereAmI !!}
@stop

@section('content')
	<div class="col-md-4 col-sd-12">
		@include('admin.users.partials.data')
	</div>
@stop