@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<a class="fa fa-question-circle fa-3x pull-right" href="guide#accueilMenu" alt="Aide en ligne"></a>
		<h3>Messages</h3>
		
		<div class="panel">
			@if (isset($messages) && !$messages->isEmpty())
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
				<p>Il n'y a pas de message!</p>
			@endif
		</div>
	</div>
	<div class="medium-12 columns">
		<h3>Remplacements</h3>
		<div id="princ" class="panel clearfix">
		
		<div>
	</div>
	
	<script type="text/javascript">
		window.addEventListener('load',init,false);

		function init(){
			importerHoraire();
				
				
		}
		
		
		function importerHoraire() {
			$.ajax({
					url:"{{ URL::asset('ajax/fetch_remplacement.php')}}",
					type:"POST",
					dataType:"json",
					error:function (){},
					success:function(remplacement){
						// N'affiche pas l'utilisateur connecté dans la liste des remplacements
						remplacement = excludeUser(remplacement);
						
						if(remplacement.length > 0)
						{
							for(var i = 0; i< remplacement.length; i++) {
								var divPrin = document.getElementById('princ');
								var div = document.createElement('div');
								var divHrs = document.createElement('div');
								var divDroite = document.createElement('div');
								var divBtn = document.createElement('div');
								var leDemandeur = document.createElement('div');
								var bouton = document.createElement('a');
								divHrs.innerHTML = convertJour(remplacement[i]["jour"]) + "<br />" + remplacement[i]["debut"] + " - " + remplacement[i]["fin"];
								divHrs.setAttribute("class","left");
								bouton.id = remplacement[i]["id"];
								bouton.className = "button small";
								bouton.innerHTML = "Accepter";
								bouton.addEventListener("click",validerDemande,false);
								divBtn.appendChild(bouton);
								divBtn.setAttribute("class","right");
								leDemandeur.innerHTML = remplacement[i]["courriel"];
								div.appendChild(divHrs);
								divDroite.appendChild(leDemandeur);
								divDroite.appendChild(divBtn);
								divDroite.setAttribute("class","right");
								div.appendChild(divDroite);
								div.setAttribute("class","plage panel clearfix"); 
								divPrin.appendChild(div);		
							}
						}
						else
						{
							var divPrin = document.getElementById('princ');
							var p = document.createElement("p");
							p.innerHTML = "Il n'y a pas de remplacements!";
							divPrin.appendChild(p);
						}
					}
				});
		}

		function excludeUser(remplacements){
			var remplacementsFiltres = new Array();
			for(var i = 0; i < remplacements.length; i++){
				if(remplacements[i]["courriel"] != "{{Auth::User()->id}}"){
					remplacementsFiltres.push(remplacements[i]);
				}	
			}
			return remplacementsFiltres;
		}
		
		function validerDemande(e){
			var conteneur = e.target.parentNode;
			var boutonConfirmer = document.createElement("a");
			boutonConfirmer.className = "button small";
			boutonConfirmer.innerHTML = "Confirmer";
			boutonConfirmer.id = e.target.id;
			boutonConfirmer.addEventListener("click",accepterDemande,false);
			var boutonAnnuler = document.createElement("a");
			boutonAnnuler.className = "button small";
			boutonAnnuler.innerHTML = "Annuler"
			boutonAnnuler.id = "cancel" + e.target.id;
			boutonAnnuler.addEventListener("click",annulerDemande,false);

			conteneur.removeChild(e.target);
			conteneur.appendChild(boutonConfirmer);
			conteneur.appendChild(boutonAnnuler);
		}

		function accepterDemande(e){
			var infos = {};
			infos.courriel = "{{Auth::User()->id}}";
			infos.id = e.target.id;
			$.ajax({
					url:"{{ URL::asset('ajax/push_remplacement.php')}}",
					type:"POST",
					data:infos,
					error:function (){
						console.log("Erreur");
					},
					success:function(){
						var conteneur = e.target.parentNode;
						var message = document.createElement("p");
						message.innerHTML = "Remplacement effectué!";
						
						while(conteneur.hasChildNodes()){
							conteneur.removeChild(conteneur.lastChild);
						}

						conteneur.appendChild(message);
						
					}
			});
		}

		function annulerDemande(e){
			var conteneur = e.target.parentNode;
			var boutonAccepter = document.createElement("a");
			boutonAccepter.id = e.target.id.replace("cancel","");
			boutonAccepter.className = "button small";
			boutonAccepter.innerHTML = "Accepter";
			boutonAccepter.addEventListener("click",validerDemande,false);

			while(conteneur.hasChildNodes()){
				conteneur.removeChild(conteneur.lastChild);
			}

			conteneur.appendChild(boutonAccepter);
		}

		function convertJour(no) {
			var jour;
			switch (parseInt(no))
			{
			case 0:
			  jour="Lundi";
			  break;
			case 1:
			  jour= "Mardi";
			  break;
			case 2:
			  jour= "Mercredi";
			  break;
			case 3:
			  jour= "Jeudi";
			  break;
			case 4:
			  jour= "Vendredi";
			  break;
			case 5:
			  jour= "Samedi";
			  break;
			case 6:
			  jour= "Dimanche";
			  break;
			}
			return jour;
		}
	</script>
@stop