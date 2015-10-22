<div class="row">
	<small class="text-muted">
		Página {!! $personas->currentPage() !!} de {!! $personas->lastPage() !!}
		/ Mostrando desde el {!! $paginate_data['items_desde'] !!}° al {!! $paginate_data['items_hasta'] !!}° elemento de un total de {!! $personas->total() !!}
	</small>
</div>
<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre y Apellido</th>
			<th>Domicilio</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($personas as $persona)
			<tr>
				<td>{{ $persona->id }}</td>
				<td>{{ $persona->full_name }}</td>
				<td>{{ $persona->domicilio->full_name }}</td>
				<td>
					<div class="btn-group">
						<!-- <a href="#">
							<span class="glyphicon glyphicon-danger glyphicon-pencil"></span>
						</a> -->
						<a href="{{ route( 'people.personas.show', $persona ) }}" class="btn btn-default btn-xs">Ver</a>
						<a href="{{ route( 'people.personas.edit', $persona ) }}" class="btn btn-default btn-xs">Editar</a>
						<a href="#" class="btn btn-danger btn-xs">Eliminar</a>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $personas->appends($request->all())->render(); !!}
