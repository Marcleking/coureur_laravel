@extends('layout.master')

@section('content')
	<div class="medium-12 columns">	
		<h3>Gestion des comptes</h3>
		<div class="panel">
			<div class="row">
			  	<a href="{{Route('user.add')}}" class="button [radius round]">Ajout d'un utilisateur</a>
				

				@if (isset($success))
					<div data-alert class="alert-box success radius">
					  L'employé à bien été supprimé.
					  <a href="#" class="close">&times;</a>
					</div>
				@elseif (isset($fail))
					<div data-alert class="alert-box warning radius">
					  Une erreur s'est produit lors de la suppression.
					  <a href="#" class="close">&times;</a>
					</div> 
				@endif
				

				{{-- <?=$lstEmploye?> --}}
			</div>	      
		</div>
  	</div>
@stop