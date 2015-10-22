<dl class="dl-horizontal">
	<dt><small>Localidad</small></dt>
		<dd>{{ $localidad->nombre }}</dd>

	<dt><small>Partido</small></dt>
		<dd>{{ $localidad->departamento->nombre }}</dd>

	<dt><small>Provincia</small></dt>
		<dd>{{ $localidad->departamento->provincia->nombre }}</dd>

	<dt><small>País</small></dt>
		<dd>{{ $localidad->departamento->provincia->pais->nombre }}</dd>

	<br>
  	
  	<dt><small>Código Postal</small><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></dt>
		<dd><kbd>{{ $localidad->codigo_postal }}</kbd></dd>
		
	<dt><small>Código de Área</small><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></dt>
		<dd>
			<abbr title="Código Telefónico Internacional">
				<kbd>{{ $localidad->departamento->provincia->pais->codigo_telefonico }}</kbd>
			</abbr>
			<kbd>{{ $localidad->codigo_telefonico }}</kbd>
		</dd>
</dl>

<kbd>{{ $localidad->full_name }}</kbd>