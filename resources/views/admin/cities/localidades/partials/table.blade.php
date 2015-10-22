<p class="text-muted">
	Página {!! $localidades->currentPage() !!} de {!! $localidades->lastPage() !!}
	/ Mostrando desde el {!! $paginate_data['items_desde'] !!}° al {!! $paginate_data['items_hasta'] !!}° elemento de un total de {!! $localidades->total() !!}
</p>

<form class="navbar-form navbar-left" role="search">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Search">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Localidad</th>
			<th>Partido</th>
			<th>Provincia</th>
			<th>País</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($localidades as $localidad)
			<tr>
				<td>{{ $localidad->id }}</td>
				<td>{{ $localidad->nombre }}</td>
				<td>{{ $localidad->departamento->nombre }}</td>
				<td>{{ $localidad->departamento->provincia->nombre }}</td>
				<td>{{ $localidad->departamento->provincia->pais->nombre }}</td>
				<td>
					{!! Form::open(['route' => ['cities.localidades.destroy',$localidad], 'method'=>'DELETE']) !!}
						<div class="btn-group" role="group">
							<a href="{{ route( 'cities.localidades.show',$localidad ) }}" class="btn btn-default btn-xs">Ver</a>
							<a href="{{ route( 'cities.localidades.edit',$localidad ) }}" class="btn btn-default btn-xs">Editar</a>
							<button type="submit" onclick="return confirm('Seguro que vas a eliminar?')" class="btn btn-danger btn-xs">Eliminar</button>
						</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $localidades->render(); !!}
