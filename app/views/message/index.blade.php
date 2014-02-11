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
			
			
			@if (isset($aucunMessage))
				Il n'y a pas de message!
			@endif
			Il n'y a pas de message!
			{{-- <?=$listMessage?> --}}
		</div>
		
		<script>
			$(document).ready(function(){
				$("#fade").fadeOut(1500,function(){
				});
			});
		</script>
		
	</div>
@stop