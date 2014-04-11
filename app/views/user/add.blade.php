@extends('layout.master')

@section('content')
	<div class="panel medium-12 columns">
		<h3>Ajout d'un utilisateur</h3>

		@if (isset($success))
			<div data-alert id="fade" class="alert-box success radius">
			  L'employé à bien été ajouté.
			  <a href="#" class="close">&times;</a>
			</div>
		@elseif (isset($fail))
			<div data-alert id="fade" class="alert-box warning radius">
			  Une erreur s'est produit lors de l'ajout.
			  <a href="#" class="close">&times;</a>
			</div> 
		@endif
		
		{{ Form::open(['route' => 'user.add']) }}
			<div class="row">
				<div class="large-6 columns">
					{{ Form::label('courriel', 'Courriel') }}
					{{ Form::text('courriel') }}
			    </div>
				<div class="large-6 columns">
					{{ Form::label('typeEmp', 'Type employé') }}
					{{ Form::select('typeEmp',
						[
							'Employé' => 'Employé',
							'Gestionnaire' => 'Gestionnaire'
						]
					)}}
				</div>
			</div>
			
			<div class="row">
				<div class="large-7 columns">
					{{ Form::checkbox('cle', '1') }}
					{{ Form::label('cle', 'Possesseur d\'une clé')}}
					<br />
					{{ Form::checkbox('conflit', 'oui') }}
					{{ Form::label('conflit', 'Responsable conflit') }}
				</div>
				
				<div class="large-5 columns">
					Formation <br />

					{{ Form::checkbox('Vetement') }}
					{{ Form::label('Vetement', 'Vêtement') }}
					<br />
					{{ Form::checkbox('Chaussure') }}
					{{ Form::label('Chaussure', 'Chaussure') }}
					<br />
					{{ Form::checkbox('Caissier') }}
					{{ Form::label('Caissier', 'Caissier') }}
				</div>
			</div>

		  	<input type="submit" class="button right"/>
		  
		{{ Form::close() }}
	</div>
@stop