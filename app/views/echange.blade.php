@extends('layout.master')

@section('content')
<div id="contenu" class="medium-12 columns">
	<a class="fa fa-question-circle fa-3x pull-right" href="guide#echange" alt="Aide en ligne"></a>
	<h3>Gestion des échanges</h3>
	<div id="divPrinc" class="panel">
	</div>
	
	<style type="text/css">
		.plage {
			margin-bottom:10px;
			border:1px solid black;
			padding:4px;
		}
		.inline {
			display:inline;
		}
	</style>

	<script type="text/javascript">
		window.addEventListener('load',init,false);

		function init(){
			importerHoraire();
		}
		
		
		function importerHoraire() {
			$.ajax({
					url:"{{ URL::asset('ajax/fetch_horaires.php')}}",
					type:"POST",
					data:"courriel={{Auth::User()->id}}",
					dataType:"json",
					error:function (){},
					success:function(horaire){
						for(var i = 0; i< horaire.length; i++) {
							var divPrin = document.getElementById('divPrinc');
							var div = document.createElement('div');
							var divHrs = document.createElement('div');
							var divType = document.createElement('div');
							var divCheck = document.createElement('div');
							var check = document.createElement('input');
							check.setAttribute("type","button");
							check.id = horaire[i]["remplacement"] + horaire[i]["id"];
							check.className = "button small";
							check.addEventListener("click", askForConfirmation, false);
							check.style.margin = "10px";

							if(horaire[i]["remplacement"] != "0"){

								check.value = "Annuler la demande";
							}
							else
							{
								check.value = "Demander un remplacement";
							}
							
							divHrs.innerHTML = convertJour(horaire[i]["jour"]) + "    " + horaire[i]["debut"] + " - " + horaire[i]["fin"];
							divType.innerHTML = horaire[i]["type"];
							divType.setAttribute("class", "medium-4 inline");
							divType.style.margin = "10px";
							divCheck.setAttribute("class","right");
							divCheck.appendChild(check);
							divHrs.setAttribute("class","medium-4");
							divHrs.style.margin = "10px";
							div.appendChild(divHrs);
							div.appendChild(divType);
							div.appendChild(divCheck);
							div.setAttribute("class","plage row");
							divPrin.appendChild(div);
						}
					}
				});
		}

		function askForConfirmation(e){
			var conteneur = e.target.parentNode;
			var boutonConfirmer = document.createElement("input");
			boutonConfirmer.setAttribute("type","button");
			boutonConfirmer.className = "button small";
			boutonConfirmer.value = "Confirmer";
			boutonConfirmer.id = "confirmer" + e.target.id;
			boutonConfirmer.style.margin = "10px";
			boutonConfirmer.addEventListener("click",changeReplacementStatus,false);
			var boutonAnnuler = document.createElement("input");
			boutonAnnuler.setAttribute("type","button");
			boutonAnnuler.className = "button small";
			boutonAnnuler.value = "Annuler"
			boutonAnnuler.id = "cancel" + e.target.id;
			boutonAnnuler.style.margin = "10px";
			boutonAnnuler.addEventListener("click",annulerDemande,false);

			e.target.style.display = "none";
			conteneur.appendChild(boutonConfirmer);
			conteneur.appendChild(boutonAnnuler);
		}

		function annulerDemande(e){
			var conteneur = e.target.parentNode;
			console.log(e.target.id.replace("cancel",""));
			var boutonAccepter = document.getElementById(e.target.id.replace("cancel",""));

			while(conteneur.hasChildNodes()){
				conteneur.removeChild(conteneur.lastChild);
			}
			boutonAccepter.style.display = "inline";
			conteneur.appendChild(boutonAccepter);
		}

		function changeReplacementStatus(e){
			var id = e.target.id.replace("confirmer","").substr(1); 
			var valeur = e.target.id.replace("confirmer","").substr(0,1);
			
			if(valeur == "0"){
				valeur = "1";
			}
			else{
				valeur = "0";
			}

			$.ajax({
				url:"{{URL::asset('ajax/push_remplacement.php')}}",
				type:"POST",
				data:{'id':id,'valeur':valeur},
				dataType:"json",
				error:function(){},
				success:function(resultat){}
			});

			var conteneur = e.target.parentNode;
			var bouton = document.getElementById(e.target.id.replace("confirmer",""));
			while(conteneur.hasChildNodes()){
				conteneur.removeChild(conteneur.lastChild);
			}

			if(valeur != "0")
				bouton.value = "Annuler la demande";
			else
				bouton.value = "Demander un remplacement";

			bouton.id = valeur + id;

			bouton.style.display = "inline";
			conteneur.appendChild(bouton);
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
</div>
@stop