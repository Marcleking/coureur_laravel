@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Messages</h3>

		<div class="panel">
			@if (isset($success))
				<div data-alert id="fade" class="alert-box success radius">
					 Le message a été supprimé
					 <a href="#" class="close">&times;</a>
				</div>
			@elseif (isset($fail))
				<div data-alert id="fade" class="alert-box warning radius">
					Une erreur s'est produit lors de la suppression.
					<a href="#" class="close">&times;</a>
				</div> 
			@endif
			
			
			@if (isset($messages))
				<dl class="accordion" data-accordion>
		            @foreach ($messages as $message)
		            	<dd>
		            		<a href="#panel{{ $message->idMessage }}"><b>{{ $message->titre }}</b>
			            		<span style="float:right">
			            			{{ $message->courriel }}
			            		</span>
		            		</a>
		            		<div id="panel{{ $message->idMessage }}" class="content">
			            		@if (Auth::User()->type == "Gestionnaire")
			            			<a href="{{route('message.delete', $message->idMessage) }}" class="button tiny radius left"> Supprimer </a>
			            		@endif
			            		<span style="float:right">
			            			{{ $message->date }}
			            		</span>
			            		<hr />

			            		{{ $message->message }}
			            	</div>
			            </dd>
		            @endforeach

		        </dl>
		        {{ $messages->links() }}
			@else
				Il n'y a pas de message!
			@endif

		</div>
		
		<script>
			$(document).ready(function(){
				$("#fade").fadeOut(1500,function(){
				});
			});
		</script>
		
	</div>
@stop