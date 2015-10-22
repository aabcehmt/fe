<div class="form-group @if ($errors->has('nombre')) {{ 'has-error has-feedback' }} @endif">

	{!! Form::label('nombre','Localidad', array('class' => 'awsome') ) !!} 
	{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Localidad']) !!}
	
	@if ($errors->has('nombre'))
		<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
  		<span id="nombre" class="text-danger"><small><em>{{ $errors->first('nombre') }}</em></small></span>
	@endif
</div>

<div class="row">
	<div class="col-md-6 form-group @if ($errors->has('codigo_postal')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('codigo_postal','Código Postal', array('class' => 'awsome') ) !!} 
		{!! Form::text('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'Código Postal']) !!}
		
		@if ($errors->has('codigo_postal'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="codigo_postal" class="text-danger"><small><em>{{ $errors->first('codigo_postal') }}</em></small></span>
		@endif
	</div>
	
	<div class="col-md-6 form-group @if ($errors->has('codigo_area')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('codigo_area','Código de Área', array('class' => 'awsome') ) !!} 
		{!! Form::text('codigo_area', null, ['class' => 'form-control', 'placeholder' => 'Código de Área']) !!}
		
		@if ($errors->has('codigo_area'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="codigo_area" class="text-danger"><small><em>{{ $errors->first('codigo_area') }}</em></small></span>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-12 form-group @if ($errors->has('departamento_id')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('departamento_id','Partido', array('class' => 'awsome') ) !!} 
		{!! Form::select(	'departamento_id', $departamentos, 
							null, 
							[ 'class' => 'form-control', 'placeholder' => 'Selecciona el Partido' ]
						) !!}
		@if ($errors->has('departamento_id'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="departamento_id" class="text-danger"><small><em>{{ $errors->first('departamento_id') }}</em></small></span>
		@endif
	</div>
</div>