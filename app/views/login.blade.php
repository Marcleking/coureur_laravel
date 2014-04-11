<!DOCTYPE html>
<html>
    <head>
        <title>Le coureur nordique</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/foundation.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/timePicker.css') }}" />

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
        <script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/jquery.cookie.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.timePicker.js') }}"></script>

    </head>
    <body>
        <div class="row off-canvas-wrap">
                @section('header')
                    <h1><img src="{{ URL::asset('image/logo.png') }}" alt="le coureur nordique"/></h1>
                @show
                  
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
        </div>
        
        <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.abide.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.joyride.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.alert.js') }}"></script>
        
        
        <script>
            $(document).foundation();         
            $(document).ready(function(){
                $("#fade").delay(3000).fadeOut(1500);
            });
        </script>

        
        
    </body>
</html>


