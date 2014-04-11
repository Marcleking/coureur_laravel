@extends('layout.master')

@section('content')
	<div class="panel medium-12 columns">
		@if (Session::has('errors'))
			<ul data-alert class="alert-box warning radius">
				@foreach (Session::get('errors')->all() as $message)
					<li>{{ $message }}</li>
				@endforeach
			</ul>
		@endif

		<h3>Gestion du compte</h3>
		{{ Form::open(['route' => 'gestion.compte']) }}
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
				<div class="large-6 columns ">
					{{ Form::label('ancienMotdePasse', 'Ancien mot de passe') }}
					{{ Form::password('ancienMotdePasse') }}
				</div>
				<div class="large-6 columns ">
					{{ Form::label('motDePasse', 'Nouveau mot de passe')}}
					{{ Form::password('motDePasse') }}
				</div>
			</div>
			
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

		<div id="lesTels">
				@if (isset($info->tel))
					{{ $info->tel }}
				@endif
				

			<div class"row" id="finTel">
				<a class="button small" id="telPlus"><i class="fa fa-plus"></i></a>
			</div>
		</div>
		<div class="row">
			<div class="large-7 columns">
				<input id="notifHoraire" type="checkbox" value="1" name="notifHoraire" {{ ($info->notifHoraire == 1) ? "checked" : "" }}><label for="notifHoraire">Notifications courriel pour les nouveaux horaires</label><br />
				<input id="notifRemplacement" type="checkbox" value="1" name="notifRemplacement" {{ ($info->notifRemplacement == 1) ? "checked" : "" }}><label for="notifRemplacement">Notifications pour tous les remplacements</label>
			</div>
		</div>
			<input type="submit" class="button right"/>
		</form>


	  <script type="text/javascript">
	  	var i;
		(function(){
			document.getElementById('telPlus').addEventListener('click', ajoutTel, false);

		})();

		function ajoutTel() {
			var valCritique = false;
			i=-1;
			while (!valCritique) {
				i++;
				if($("#tel"+i).html() == null) {
					valCritique = true;
				}
			}

			$("#finTel").before("<div class='row' id='tel"+i+"'>"+
				"<div class='large-4 columns'>"+
					"<select id='typeTel"+i+"' name='typeTel"+i+"'>"+
					  "<option value='Cellulaire'>Cellulaire</option>"+
					  "<option value='Domicile'>Domicile</option>"+
					  "<option value='École'>École</option>"+
					  "<option value='Bureau'>Bureau</option>"+
					  "<option value='Autre'>Autre</option>"+
					"</select>"+
				"</div>"+
				"<div class='large-4 columns left'>"+
					"<input type='text' id='tel"+i+"' name='tel"+i+"' placeholder='Votre téléphone' />"+
				"</div>" +
				"<div class='large-4 columns left'>" +
					"<a id='telMoins"+i+"' class='button tiny' onclick='suppTel("+i+")'><i class='fa fa-minus'></i></a>" +
				"</div>");
			i++;
		}




		function suppTel(e) {
			var i = parseInt(e);
			$("#tel"+i).remove();

			while ($("#tel"+(i+1)).html() != null) {
				$("#tel"+(i+1)).attr('id', "tel"+i);
				$("#typeTel"+(i+1)).attr('name', 'typeTel'+i);
				$("#typeTel"+(i+1)).attr('id', 'typeTel'+i);
				$("#tel"+(i+1)).attr('name', 'tel'+i);
				$("#tel"+(i+1)).attr('id', 'tel'+i);
				$("#telMoins"+(i+1)).attr('onclick', "suppTel("+i+")");
				$("#telMoins"+(i+1)).attr('id', "telMoins"+i);
				i++;
			}
		}
	</script>
		
		
	<script>
		$(document).ready(function(){
			$("#fade").delay(3000).fadeOut(1500);
		});
	</script>
	</div>


@stop