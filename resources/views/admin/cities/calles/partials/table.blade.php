<p class="text-muted">
	Página {!! $calles->currentPage() !!} de {!! $calles->lastPage() !!}
	/ Mostrando desde el {!! $paginate_data['items_desde'] !!}° al {!! $paginate_data['items_hasta'] !!}° elemento de un total de {!! $calles->total() !!}
</p>

<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Calle</th>
			<th>Tipo</th>
			<th>Localidad</th>
			<th>Partido</th>
			<th>Provincia</th>
			<th>País</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($calles as $calle)
			<tr>
				<td>{{ $calle->id }}</td>
				<td>{{ $calle->nombre }}</td>
				<td>{{ $calle->tipo }}</td>
				<td>{{ $calle->localidad->nombre }}</td>
				<td>{{ $calle->localidad->departamento->nombre }}</td>
				<td>{{ $calle->localidad->departamento->provincia->nombre }}</td>
				<td>{{ $calle->localidad->departamento->provincia->pais->nombre }}</td>
				<td>
					{!! Form::open(['route' => ['cities.calles.destroy',$calle], 'method'=>'DELETE']) !!}
						<div class="btn-group" role="group">
							<a href="{{ route( 'cities.calles.show', $calle ) }}" class="btn btn-default btn-xs">Ver</a>
							<a href="{{ route( 'cities.calles.edit', $calle ) }}" class="btn btn-default btn-xs">Editar</a>
							<button type="submit" onclick="return confirm('Seguro que vas a eliminar?')" class="btn btn-danger btn-xs">Eliminar</button>
						</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $calles->render(); !!}