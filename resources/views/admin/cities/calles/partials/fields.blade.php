<div class="row">
	<div class="col-md-12 form-group @if ($errors->has('localidad_id')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('localidad_id','Localidad', array('class' => 'awsome') ) !!} 
		{!! Form::select(	'localidad_id', $localidades, 
							null, 
							[
								'class' => 'form-control', 
								'placeholder' => 'Selecciona la Localidad'
							]
						) !!}
		@if ($errors->has('localidad_id'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="localidad_id" class="text-danger"><small><em>{{ $errors->first('localidad_id') }}</em></small></span>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-8 form-group @if ($errors->has('nombre')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('nombre','Calle', array('class' => 'awsome') ) !!} 
		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Calle']) !!}
		
		@if ($errors->has('nombre'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="nombre" class="text-danger"><small><em>{{ $errors->first('nombre') }}</em></small></span>
		@endif
	</div>

	<div class="col-md-4 form-group @if ($errors->has('tipo')) {{ 'has-error has-feedback' }} @endif">

		{!! Form::label('tipo','Tipo de Calle', array('class' => 'awsome') ) !!} 
		{!! Form::select(	'tipo', 
							[
								'Normal' 	=> 'Normal', 
								'Avenida' 	=> 'Avenida',
								'Cortada' 	=> 'Cortada',
								'Ruta'		=> 'Ruta',
								'Camino Vecinal' => 'Camino Vecinal'
							], 
							null, 
							[
								'class' => 'form-control', 
								'placeholder' => 'Selecciona la Localidad'
							]
						) !!}
		@if ($errors->has('tipo'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="tipo" class="text-danger"><small><em>{{ $errors->first('tipo') }}</em></small></span>
		@endif
	</div>
</div>

