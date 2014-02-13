@extends('layout.master')

@section('content')
	<div class="panel medium-12 columns">
		@if (isset($success))
			<div data-alert class="alert-box success radius">
			  Modifications appliqué
			  <a href="#" class="close">&times;</a>
			</div>
		@elseif (isset($fail))
			<div data-alert class="alert-box warning radius">
			  Vous devez avoir un courriel valide et disponible dans un des comptes des employés!
			  <a href="#" class="close">&times;</a>
			</div> 
		@endif

		<h3>Gestion du compte</h3>
		{{ Form::open(['route' => 'gestion.user.edit.admin.save']) }}
			<div class="row">
				<div class="large-6 columns">
					{{ Form::label('nom', 'Nom(*)') }}
					{{ Form::text('nom', $info->nom) }}
				</div>
				<div class="large-6 columns">
					{{ Form::label('prenom', 'Prenom(*)') }}
					{{ Form::text('prenom', $info->prenom) }}
				</div>
			</div>
			
			<div class="row">
				<div class="large-6 columns">
				  {{ Form::label('courriel', 'Courriel') }}
				  {{ Form::text('courriel', $info->courriel) }}
				</div>
			</div>
			<hr>
		<div class="row">
			<div class="large-6 columns">
				{{ Form::label('numeroCiv', 'Numéro civique') }}
				{{ Form::text('numeroCiv', $info->numeroCivique) }}
			</div>
			<div class="large-6 columns">
				{{ Form::label('rue', 'Rue') }}
				{{ Form::text('rue', $info->rue) }}
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				{{ Form::label('ville', 'Ville') }}
				{{ Form::text('ville', $info->ville) }}
			</div>
			<div class="large-6 columns">
				{{ Form::label('codePostal', 'Code postal') }}
				{{ Form::text('codePostal', $info->codePostal) }}
			</div>
		</div>
		<hr>
		<div class="row">
		<div class="large-7 columns">
					
			{{ Form::label('typeEmp', 'Type employé') }}
			{{ Form::select('typeEmp', ['Employé' => 'Employé', 'Gestionnaire' => 'Gestionnaire'], $info->typeEmploye)}}
	
			<input id="notifHoraire" type="checkbox" value="1" name="notifHoraire" {{ ($info->notifHoraire) ? "checked" : "" }}><label for="notifHoraire">Notifications courriel pour les nouveaux horaires</label><br />
			<input id="notifRemplacement" type="checkbox" value="1" name="notifRemplacement" {{ ($info->notifRemplacement) ? "checked" : "" }}><label for="notifRemplacement">Notifications pour tous les remplacements</label>
		</div>
			
			<div class="large-5 columns">
					<label>Formation</label>
					<input id="Vetement" type="checkbox" name="Vetement" {{ ($info->formationVetement) ? 'checked' : '' }}><label for="Vetement" >Vétement</label><br />
					<input id="Chaussure" type="checkbox" name="Chaussure" {{ ($info->formationChaussure) ? 'checked' : '' }}><label for="Chaussure" >Chaussure</label><br />
					<input id="Caissier" type="checkbox" name="Caissier"  {{ ($info->formationCaissier) ? 'checked' : '' }}><label for="Caissier">Caissier</label><br />
			</div>
		</div>
		
		<hr>
		<div class="row">
			<div class="large-4 columns">
				{{ Form::label('priorite', 'Indice de priorité (1-10)') }}
				{{ Form::text('priorite', $info->indPriorite) }}
			</div>	
			<div class="large-4 columns">
				<label>Heure minimum</label>
				<input type="text" name="hrsMin" value="{{ $info->hrsMin }}" placeholder="Ex: 10" />
			</div>	
			<div class="large-4 columns">
				<label>Heure maximum</label>
				<input type="text" name="hrsMax" value="{{ $info->hrsMax }}" placeholder="Ex: 20" />
			</div>
		</div>
		  
		<div class="row">
			<div class="large-7 columns">
				<input id="cle" type="checkbox" value="1" name="cle" {{ ($info->possesseurCle) ? 'checked' : '' }}><label for="cle">Possesseur d'une clé</label>
				<input id="Conflit" type="checkbox" value="Oui" name="conflit" {{ ($info->respHoraireConflit) ? 'checked' : '' }}><label for="Conflit">Responsable Conflit</label>
			</div>
		</div>
	 
			<input type="submit" class="button"/>
	  
		{{ Form::close() }}


	  
		
	</div>
@stop