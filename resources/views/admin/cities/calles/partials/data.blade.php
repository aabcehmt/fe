<dl class="dl-horizontal">
	<dt><small>Calle</small></dt>
		<dd>{{ $calle->nombre }}</dd>

	<dt><small>Tipo</small></dt>
		<dd>{{ $calle->tipo }}</dd>
	
	<dt><small>Localidad</small></dt>
		<dd>{{ $calle->localidad->nombre }}</dd>

	<dt><small>Partido</small></dt>
		<dd>{{ $calle->localidad->departamento->nombre }}</dd>

	<dt><small>Provincia</small></dt>
		<dd>{{ $calle->localidad->departamento->provincia->nombre }}</dd>

	<dt><small>País</small></dt>
		<dd>{{ $calle->localidad->departamento->provincia->pais->nombre }}</dd>
</dl>
<kbd>{{ $calle->full_name }}</kbd>