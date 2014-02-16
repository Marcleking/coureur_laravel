@extends('layout.master')

@section('content')
	<div class="medium-12 columns">	
		<h3>Gestion des comptes</h3>
		<div class="panel">
			<div class="row">
			  	<a href="{{Route('user.add')}}" class="button [radius round]">Ajout d'un utilisateur</a>
				

				@if (Session::has('success'))
					<div data-alert id="fade" class="alert-box success radius">
					  {{ Session::get('success') }}
					  <a href="#" class="close">&times;</a>
					</div>
				@elseif (Session::has('fail'))
					<div data-alert id="fade" class="alert-box warning radius">
					  {{ Session::get('fail') }}
					  <a href="#" class="close">&times;</a>
					</div> 
				@endif
				
				{{ $info }}
			</div>	      
		</div>
  	</div>
@stop