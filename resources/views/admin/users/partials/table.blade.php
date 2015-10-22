<div class="row">
	<small class="text-muted">
		Página {!! $users->currentPage() !!} de {!! $users->lastPage() !!}
		/ Mostrando desde el {!! $paginate_data['items_desde'] !!}° al {!! $paginate_data['items_hasta'] !!}° elemento de un total de {!! $users->total() !!}
	</small>
	{!! Form::model($request,['route' => ['admin.users.index'],
			'method' => 'GET', 
			'class'	=> 'navbar-form navbar-left pull-right', 
			'role' 	=> 'search']) !!}

		<div class="form-group">
		{!! Form::text( 'name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
		</div>
		<button type="submit" class="btn btn-default">Buscar</button>

	{!! Form::close() !!}
</div>
<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>E-mail</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<div class="btn-group">
						<!-- <a href="#">
							<span class="glyphicon glyphicon-danger glyphicon-pencil"></span>
						</a> -->
						<a href="{{ route( 'admin.users.edit', $user ) }}" class="btn btn-primary btn-xs">Editar</a>
						<a href="#" class="btn btn-danger btn-xs">Eliminar</a>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $users->appends($request->all())->render(); !!}
