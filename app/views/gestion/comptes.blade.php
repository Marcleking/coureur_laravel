@extends('layout.master')

@section('content')
	<div class="medium-12 columns">	
		<a class="fa fa-question-circle fa-3x pull-right" href="../guide#comptes" alt="Aide en ligne"></a>
		<h3>Gestion des comptes</h3>
		<div class="panel">
			<div class="row">
			  	<a href="{{Route('user.add')}}" class="button right">Ajout d'un utilisateur</a>
				

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
				
				<dl class="accordion" data-accordion>
		        @foreach ($list as $employe)
		            <hr>
		            <dd>
		            	<a href="#panel{{ strtr($employe->courriel, array("." => "", "@" => "")) }}">
			            	{{ $employe->prenom ." ". $employe->nom }}
				            @if ($employe->possesseurCle == 1)
				                <i class="fa fa-key right"> </i>
				            @endif

				            @if ($employe->respHoraireConflit == 1)
				                <i class="fa fa-clock-o right"/> </i>
				            @endif
		            	</a>
		           		<div id="panel{{ strtr($employe->courriel, array("." => "", "@" => "")) }}" class="content">
		           			<div class="left"> 
		           				Nom: {{ $employe->prenom ." ". $employe->nom }}
		           			</div>
		           			<div class="right"> 
								@if(($employe->numeroCivique != "" && $employe->rue != "") || $employe->ville != "" || $employe->codePostal != "")
									Adresse: 
								@endif
								
								@if($employe->numeroCivique != "" && $employe->rue != "")
									{{ $employe->numeroCivique .", ". $employe->rue }}
									@if($employe->ville != "" || $employe->codePostal != "")
										<br />
									@endif
								@endif
								
								@if($employe->ville != "" || $employe->codePostal != "")
									{{ $employe->ville. ' '. $employe->codePostal }}
								@endif
								
		            		</div>
		            		<br />Courriel: {{ $employe->courriel }}
		            		<br />Type Employé: {{ $employe->typeEmploye }}

				            @if ($employe->formationChaussure == 1)
				                <br />Formation Chaussure: Oui
				            @else
				                <br />Formation Chaussure: Non
				            @endif

				            @if ($employe->formationVetement == 1)
				                <br />Formation Vêtement: Oui
				            @else
				                <br />Formation Vêtement: Non
				            @endif

				            @if ($employe->formationCaissier == 1)
				                <br />Formation Caissier: Oui
				           	@else
				                <br />Formation Caissier: Non
				            @endif

		             		<br />
		             		<div class="right">
			             		<a href="{{ Route('gestion.user.edit.admin', $employe->courriel) }}"  class="button tiny">Modifier</a> 
			             		<a href="{{ Route('gestion.user.delete', $employe->courriel) }}" class="button alert tiny">Supprimer</a>
		             		</div>
		             		<br />
		             	</div>
		            </dd>
		        @endforeach
		        </dl>
			</div>	      
		</div>
  	</div>
@stop