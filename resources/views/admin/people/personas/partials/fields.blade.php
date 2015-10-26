
<div class="row">
	<div class="col-lg-6 col-md-6 col-sd-12 col-xs-12">
		<div class="form-group @if ($errors->has('personeria')) {{ 'has-error has-feedback' }} @endif">
			{!! Form::label('personeria', trans('validation.attributes.legal_status.label'), array('class' => 'awsome') ) !!} 
			{!! Form::select( 'personeria', 
								[ 
									0 => trans('validation.attributes.legal_status.values.legal_entity'), 
									1 => trans('validation.attributes.legal_status.values.physical_entity')
								], 
								null, 
								[ 
									'class' => 'form-control', 
									'placeholder' => trans('validation.attributes.legal_status.placeholder') 
								]
							) !!}
			@if ($errors->has('personeria'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="personeria_error" class="text-danger"><small><em>{{ $errors->first('personeria') }}</em></small></span>
			@endif
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sd-12 col-xs-12">
		<div class="form-group @if ($errors->has('genero')) {{ 'has-error has-feedback' }} @endif">
			{!! Form::label('genero', trans('validation.attributes.gender.label'), array('class' => 'awsome') ) !!} 
			{!! Form::select( 'genero', 
								[ 
									0 => trans('validation.attributes.gender.values.female'), 
									1 => trans('validation.attributes.gender.values.male')
								],
								null, 
								[ 
									'class' => 'form-control', 
									'placeholder' => trans('validation.attributes.gender.placeholder') 
								]
							) !!}
			@if ($errors->has('genero'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="genero_error" class="text-danger"><small><em>{{ $errors->first('genero') }}</em></small></span>
			@endif
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sd-12 col-xs-12">
		<div class="form-group @if ($errors->has('nombre_persona')) {!! 'has-error has-feedback' !!} @endif">

			{!! Form::label('nombre_persona','Nombre', array('class' => 'awsome') ) !!} 
			{!! Form::text('nombre_persona', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
			
			@if ($errors->has('nombre_persona'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="nombre_persona_error" class="text-danger"><small><em>{{ $errors->first('nombre_persona') }}</em></small></span>
			@endif
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sd-12 col-xs-12">
		<div class="form-group @if ($errors->has('apellido')) {{ 'has-error has-feedback' }} @endif">
			{!! Form::label('apellido','Apellido', array('class' => 'awsome') ) !!}
			{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido']) !!}

			@if ($errors->has('apellido'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="apellido_error" class="text-danger"><small><em>{{ $errors->first('apellido') }}</em></small></span>
			@endif
		</div>
	</div>
	
	<div class="col-lg-6 col-md-6 col-sd-12 col-xs-12">
		<div class="form-group @if ($errors->has('apellido')) {{ 'has-error has-feedback' }} @endif">
			<div class="form-group @if ($errors->has('documento')) {{ 'has-error has-feedback' }} @endif">
				{!! Form::label('documento','Documento', array('class' => 'awsome') ) !!}
				{!! Form::text('documento', null, ['class' => 'form-control', 'placeholder' => 'Documento']) !!}

				@if ($errors->has('documento'))
					<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
			  		<span id="documento_error" class="text-danger"><small><em>{{ $errors->first('documento') }}</em></small></span>
				@endif
			</div>
		</div>
	</div>
</div>

@include('admin.cities.calles.partials.fields')

<div class="row">
	<div class="col-md-4 form-group @if ($errors->has('altura')) {{ 'has-error has-feedback' }} @endif">
		{!! Form::label('altura','Altura', array('class' => 'awsome') ) !!}
		{!! Form::text('altura', null, ['class' => 'form-control', 'placeholder' => 'Altura']) !!}

		@if ($errors->has('altura'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="altura_error" class="text-danger"><small><em>{{ $errors->first('altura') }}</em></small></span>
		@endif
	</div>

	<div class="col-md-4 form-group @if ($errors->has('piso')) {{ 'has-error has-feedback' }} @endif">
		{!! Form::label('piso','Piso', array('class' => 'awsome') ) !!}
		{!! Form::text('piso', null, ['class' => 'form-control', 'placeholder' => 'Piso']) !!}

		@if ($errors->has('piso'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="piso_error" class="text-danger"><small><em>{{ $errors->first('piso') }}</em></small></span>
		@endif
	</div>

	<div class="col-md-4 form-group @if ($errors->has('dpto')) {{ 'has-error has-feedback' }} @endif">
		{!! Form::label('dpto','Dpto.', array('class' => 'awsome') ) !!}
		{!! Form::text('dpto', null, ['class' => 'form-control', 'placeholder' => 'Dpto.']) !!}

		@if ($errors->has('dpto'))
			<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	  		<span id="dpto_error" class="text-danger"><small><em>{{ $errors->first('dpto') }}</em></small></span>
		@endif
	</div>
</div>
