<div class="form-group @if ($errors->has('name')) {{ 'has-error has-feedback' }} @endif">

	{!! Form::label('name', trans('validation.attributes.name'), array('class' => 'awsome') ) !!} 
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.name')]) !!}
	
	@if ($errors->has('name'))
		<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
  		<span id="name" class="text-danger"><small><em>{{ $errors->first('name') }}</em></small></span>
	@endif
</div>

<div class="form-group @if ($errors->has('email')) {{ 'has-error has-feedback' }} @endif">
	{!! Form::label('email', trans('validation.attributes.email'), array('class' => 'awsome') ) !!}
	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}

	@if ($errors->has('email'))
		<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
  		<span id="name" class="text-danger"><small><em>{{ $errors->first('email') }}</em></small></span>
	@endif
</div>

<div class="form-group @if ($errors->has('password')) {{ 'has-error has-feedback' }} @endif">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sd-6 col-xs-6">
			{!! Form::label('password', trans('validation.attributes.password'), array('class' => 'awsome') ) !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.password')] ) !!}

			@if ($errors->has('password'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="name" class="text-danger"><small><em>{{ $errors->first('password') }}</em></small></span>
			@endif
		</div>
		<div class="col-lg-6 col-md-6 col-sd-6 col-xs-6">
			{!! Form::label('password_confirm', trans('validation.attributes.password_confirm'), array('class' => 'awsome') ) !!}
			{!! Form::password('password_confirm', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.password_confirm')] ) !!}

			@if ($errors->has('password_confirm'))
				<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		  		<span id="name" class="text-danger"><small><em>{{ $errors->first('password_confirm') }}</em></small></span>
			@endif
		</div>
	</div>
</div>

<div class="form-group">
	{!! Form::label('type', trans('validation.attributes.user_type'), array('class' => 'awsome') ) !!}
	{!! Form::select('type', [ 
						'' => 'Seleccione un tipo', 
						'1' => 'Admin', 
						'2' => 'User' 
					], null, ['class' => 'form-control']) !!}
</div>


<div class="checkbox">
	<label><input type="checkbox">Acepto términos y condiciones</label>
</div>

