@extends('layout.master')

@section('content')
	<div class="panel medium-12 columns">

		@if (isset($success))
			<div data-alert id="fade" class="alert-box success radius">
			  Message envoyé avec succès
			  <a href="#" class="close">&times;</a>
			</div>		
		@elseif (isset($fail))
			<div data-alert id="fade" class="alert-box warning radius">
			  Remplir les champs obligatoires
			  <a href="#" class="close">&times;</a>
			</div>
		@endif

		<h3>Envoyer un message</h3>
			{{ Form::open(['route' => 'message.send']) }}
				<div class="row">
					<div class="large-6 columns">
						{{ Form::label('titre', 'Titre(*)') }}
						{{ Form::text('titre') }}
					</div>
				</div>			
				
				<div class="row">
					<div class="large-12 columns">
						{{ Form::label('message', 'Message(*)') }}
						{{ Form::textarea('message') }}
					</div>
				</div>
				
				{{ Form::submit('Envoyer', ['class' => 'button']) }}
			{{ Form::close() }}
			
			<script>
				$(document).ready(function(){
					$("#fade").fadeOut(1500,function(){
					});
				});
			</script>
	</div>
@stop