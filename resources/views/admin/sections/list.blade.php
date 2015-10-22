@extends('admin/layout')


@section('sidebar')
    @parent

    <p>LIST This is appended to the master sidebar.</p>
@stop

@section('place','>> users >> listado')

@section('content')
	<p>
		<a href="{{ url('admin/sections/list') }}"> Add a new one. </a>
	</p>

	<address>
		<strong>Twitter, Inc.</strong><br>
		795 Folsom Ave, Suite 600<br>
		San Francisco, CA 94107<br>
		<abbr title="Phone">P:</abbr> (123) 456-7890
	</address>

	<address>
		<strong>Full Name</strong><br>
		<a href="mailto:#">first.last@example.com</a>
	</address>

	<dl class="dl-horizontal">
		<dt>Nombre</dt>
		<dd>Gonzalo</dd>

		<dt>Apellido</dt>
		<dd>Martínez Vogt</dd>

		<dt>Profesión</dt>
		<dd>Croto</dd>
	</dl>

	<div class="col-md-6">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Larry</td>
					<td>the Bird</td>
					<td>@twitter</td>
				</tr>
			</tbody>
		</table>
	</div>

	<code>
		To switch directories, type <kbd>cd</kbd> followed by the name of the directory.
		To edit settings, press <kbd> <kbd>ctrl</kbd> + <kbd>,</kbd></kbd> 
	</code>
@stop

@unless (1===1)
	@section('content')
    	You are not signed in.
    @overwrite
@endunless