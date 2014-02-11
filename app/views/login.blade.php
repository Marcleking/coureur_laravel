@extends('layout.master')

@section('content')
	{{ Form::open(array('route' => 'login')) }}
		<div class="panel">
			<h1>Connexion</h1>

			<div>
			  	{{ Form::label('email', 'Courriel') }}
		      	{{ Form::text('email') }}
	      	</div>

	      	<div>
		      	{{ Form::label('password', 'Mot de passe') }}
		      	{{ Form::password('password') }}
	      	</div>
	      	<div>
	      		{{ Form::submit('Connexion', ['class' => 'button']) }}
	      	</div>
	      	<div>
				<a href="#">Réinitialiser votre mot de passe</a>
			</div>

	      	@if (false)
	      		<div data-alert class='alert-box warning'>
					sdf
					<a href="#" class="close">&times;</a>
				</div>
			@endif

      	</div>
  	</form>

@stop