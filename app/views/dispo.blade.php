@extends('layout.master')

@section('content')
	<div id="contenu" class="medium-12 columns">
		<script>

			$(function() {
				
				var lignes = document.getElementsByClassName('selectable');
				
				for(var i = 0; i < lignes.length; i++){				
					lignes[i].id = "selectable" + i;
					$('#selectable' + i).bind("mousedown", function(e){
							e.metaKey = true;
						}).bind("mouseup",function(e){
							
						}).selectable({	filter: ":not(.en-tete)"});
				}
				
				recuperationDisponibilite();
			});
		</script>

		<script type="text/javascript">
		
			window.addEventListener('submit',sendFormByJSON,false);
			
			function sendFormByJSON(event){
				event.preventDefault();
				
				var sender = (event && event.target) || (window.event && window.event.srcElement);
				
				var form = document.getElementById('formDispo');
				var jsonForm = {};
				
				jsonForm = ConvertFormToJSON(form);
				
				if (jsonForm.repetition == null || jsonForm.repetition < 0)
				{
					jsonForm.repetition = 0;
				}
				
				jsonForm.horaire = serializeSchedule(sender.id);
				console.log(jsonForm);
				$.ajax({
					//TOCHANGE
					url:"../../tinymvc/myapp/models/push_dispos.php",
					type:"POST",
					data:jsonForm,
					dataType:"text",
					error:function (text){
						ShowMessage(text, "error");
					},
					success:function(text){
						ShowMessage(text, "success");
					}
				});
			}
			
			function ShowMessage(text, status){
				
				var previousMessage = document.getElementById('message');
				
				if(typeof(previousMessage) != 'undefined' && previousMessage != null){
					previousMessage.parentNode.removeChild(previousMessage);
				}
				
				if(text != "vide")
				{
					var message = document.createElement("div");
				
					//div.innerHTML = "<div data-alert id='message'></div>"
					message.setAttribute("data-alert","");
					message.id = "message";
					message.className = "alert-box radius"
					
					if (status == "error"){
						message.className = message.className + " warning";
					}
					else if (status == "success"){
						message.className = message.className + "success"
					}
					
					message.innerHTML = text;
					var link = document.createElement('a');
					link.href = "#";
					link.className = "close";
					link.innerHTML = "&times;";
					
					message.appendChild(link);
					
					document.getElementById('contenu').insertBefore(message,document.getElementById('formDispo'));
				}
				
			}
			
			function ConvertFormToJSON(form){
				var array = jQuery(form).serializeArray();
				var json = {};
				
				jQuery.each(array, function() {
					json[this.name] = this.value || '';
				});
				
				return json;
			}
			

			function serializeSchedule(senderId){
				var tableauHoraire = document.getElementById('horaire');
				var horaire = {};
				
				/*
					Données nécessaires pour enregistrer une semaine de disponibilités
					
					Année								-> Extrait de la semaine actuelle dans la liste
					No de la semaine dans l'année		-> Extrait de la semaine actuelle dans la liste
					Nombres d'heures souhaitées 		-> Passé par le form
					
					Nombre de semaines à répéter		-> Passé pas le form
					
					Pour chaque bloc d'horaire consécutif :
					Jour de la semaine
					Heure de début de la période
					Heure de fin de la période
					
					Structure JSON :
					
					horaire.noSemaine
					horaire.annee
					horaire.disponibilites[].jour
					horaire.disponibilites[].lowerTime[0].hour
					horaire.disponibilites[].lowerTime[0].minutes
					horaire.disponibilites[].upperTime[0].hour
					horaire.disponibilites[].upperTime[0].minutes
				*/
				
				// Trouver le no de la semaine en cours
				//horaire.noSemaine = date.getWeekNumber() ou similaire
				
				// Trouver l'année de la semaine en cours selon la semaine sélectionnée
				var weekInfo;
				if (senderId == "formDispo"){
					weekInfo = document.getElementById('listeDate').options[document.getElementById('listeDate').selectedIndex].value.split('/');
				}
				else if(senderId == "listeDate") {
					weekInfo = document.getElementById('listeDate').options[selectPreValue].value.split('/');
				}
				
				
				
				horaire.noSemaine = weekInfo[1];
				horaire.annee = weekInfo[0];
				
				horaire.disponibilites = [];
				var selectedElements = document.getElementsByClassName('ui-selected');
				var jours = ["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"];
				for (var i = 0; i < selectedElements.length;i++){
					
					var lowerTime = {}, upperTime = {};
					
					// Trouve la borne gauche de la période de temps
					lowerTime.hour = Math.floor(9 + ((selectedElements[i].cellIndex - 1) * 0.5));
					if ((selectedElements[i].cellIndex - 1) % 2 == 0){
						lowerTime.minutes = "00";
					}
					else{
						lowerTime.minutes = "30";
					}
					
					// Parcours du bloc de temps jusqu'à la fin
					while ( (i < selectedElements.length - 1) && (selectedElements[i+1].cellIndex == selectedElements[i].cellIndex + 1) && (selectedElements[i + 1].parentNode.rowIndex == selectedElements[i].parentNode.rowIndex)){
						i++;
					}
					
					// Trouve la borne droite de la période de temps
					upperTime.hour = Math.round(9 + ((selectedElements[i].cellIndex - 1) * 0.5));	
					if ((selectedElements[i].cellIndex - 1) % 2 == 0){
						upperTime.minutes = 30;
					}
					else{
						upperTime.minutes = 0;
					}
					
					var jour = jours[selectedElements[i].parentNode.rowIndex - 1];
					
					horaire.disponibilites.push({
						"jour":jour,
						"lowerTime":[{
							"hour":lowerTime.hour,
							"minutes":lowerTime.minutes}],
						"upperTime":[{
							"hour":upperTime.hour,
							"minutes":upperTime.minutes}]
					});
					
				}
				
				return horaire;
			}
			
		</script>

		<h2>Saisie des disponibilités</h2>
		
		<form id="formDispo">
		</form>	
		
		<script type="text/javascript">
		
			function recuperationDisponibilite()
			{
				var date = document.getElementById('listeDate');
				
				$.ajax({
					type: "POST",
					//TOCHANGE
					url: "../../tinymvc/myapp/models/fetch_dispos.php",
					data:{'date': date.options[date.selectedIndex].value},
					dataType:"json",
					error: function(){alert('Erreur');},
					success:function(test){
					
						deleteTableau();
						
						for(var i = 0; i< test.length; i++)
						{
							var ligneselect;
							switch(test[i]['jour'])
							{
							case 'dimanche':
							  ligneselect = document.getElementById('selectable0');
							  break;
							case 'lundi':
							  ligneselect = document.getElementById('selectable1');
							  break;
							case 'mardi':
							  ligneselect = document.getElementById('selectable2');
							  break;
							case 'mercredi':
							  ligneselect = document.getElementById('selectable3');
							  break;
							case 'jeudi':
							  ligneselect = document.getElementById('selectable4');
							  break;
							case 'vendredi':
							  ligneselect = document.getElementById('selectable5');
							  break;
							case 'samedi':
							  ligneselect = document.getElementById('selectable6');
							  break;
							default:
							  alert("erreur");
							 }
							
							var split = test[i]['debut'].split(":");
							var heure = (split[0] - 9) * 2 + 1;
							
							if(split[1] == '30')
							{
							 heure++;
							}
							
							var split = test[i]['fin'].split(":");
							var heure1 = (split[0] - 9) * 2 + 1;
							
							if(split[1] == '30')
							{
							 heure1++;
							}
							
							var lesheures = heure1 - heure ;
							
							for(var j = heure; j <= lesheures + heure - 1; j++)
							{
							var test1 = ligneselect.childNodes[j];
							test1.className = test1.className + " ui-selected";
							}
						
						}
					}
				});
			}

			function startAndEndOfWeek(date)
			{
				var mois = [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
							"Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ];
			
			  // If no date object supplied, use current date
			  // Copy date so don't modify supplied date
			  var now = date? new Date(date) : new Date();
			  // Get the previous Dimanche
			  var Dimanche = new Date(now);
			  Dimanche.setDate(Dimanche.getDate() - Dimanche.getDay());

			  // Get next Sunday
			  var Samedi = new Date(now);
			  Samedi.setDate(Samedi.getDate() - Samedi.getDay() + 6);
				
				var dateSemaineDebut = Dimanche.getDate().toString() + " " + mois[Dimanche.getMonth()] + " " + Dimanche.getFullYear(); 

			  //var dateSemaineDebut = Dimanche.getDate().toString() + " " + mois[Dimanche.getMonth()] + " " + Dimanche.getFullYear() + " au "; 
			  var dateSemaineFin = Samedi.getDate().toString() + " " + mois[Samedi.getMonth()] + " " + Samedi.getFullYear();
			  // Return array of date objects
			  return [dateSemaineDebut, dateSemaineFin];
			}
			
			function deleteTableau()
			{
			
				for(var i = 0; i <= 6; i++)
					{
					
					var ligneselect  = document.getElementById('selectable' + i.toString());
				
					
						for(var j = 1; j <= ligneselect.childNodes.length; j ++)
						{
							$(ligneselect.childNodes[j]).removeClass('ui-selected');
						}
					}
			}
			
			function remplirListeDate()
			{
				var vecteurDateSemaine = [];
				var vecteurDateSemaineSimple = [];
				var uneListeDate = document.getElementById("formDispo");
				var elementListe = document.createElement('select');
				
				for(i = 5; i > 0; i--)
				{
					var jours = new Date();
					jours.setDate(jours.getDate() - 7 * i);
					
					vecteurDateSemaineSimple.push(jours);
					vecteurDateSemaine.push(startAndEndOfWeek(jours));
				}
				
				for(i = 0; i <= 10; i++)
				{
					var jours = new Date();
					jours.setDate(jours.getDate() + 7 * i);
					vecteurDateSemaineSimple.push(jours);
					vecteurDateSemaine.push(startAndEndOfWeek(jours));
				}
				
				for(i = 0; i < vecteurDateSemaine.length; i++)
				{
					var option = document.createElement("option");
					
					option.value = getWeekNumber(vecteurDateSemaineSimple[i]);
					option.text = vecteurDateSemaine[i][0] + " au " + vecteurDateSemaine[i][1];
					elementListe.options.add(option);
				}
				elementListe.id = "listeDate";
				elementListe.options.selectedIndex = 5;
					
				
				uneListeDate.appendChild(elementListe);
				
				selectPreValue = document.getElementById('listeDate').selectedIndex;
				
				document.getElementById('listeDate').addEventListener('change',recuperationDisponibilite, false);
				
			}
			
			function getWeekNumber(d) {
				// Copy date so don't modify original
				d = new Date(+d);
				d.setHours(0,0,0);
				// Set to nearest Thursday: current date + 4 - current day number
				// Make Sunday's day number 7
				d.setDate(d.getDate() + 4 - (d.getDay()||7));
				// Get first day of year
				var yearStart = new Date(d.getFullYear(),0,1);
				// Calculate full weeks to nearest Thursday
				var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
				// Return array of year and week number
				return d.getFullYear()+ "/" + weekNo;
			}
			
			function genererTableau()
			{
				var heureOuverture = 9;
				var tableau;
				tableau = document.createElement("table");
				var entete;
				entete = document.createElement("thead");
				var ligne;
				ligne = document.createElement("tr");
				
				var celluleVide = document.createElement("th");
				ligne.appendChild(celluleVide);
				
				for (var i=0; i<12; i++)
				{
				  var nouvRangee = document.createElement("th");
				  nouvRangee.className = "en-tete";
				  nouvRangee.colSpan = 2;
				  nouvRangee.innerHTML = (heureOuverture + i) + ":00";
				  ligne.appendChild(nouvRangee);
				}
				entete.appendChild(ligne);
				tableau.appendChild(entete);
				
				var bodyTableau;
				bodyTableau = document.createElement("tbody");
				var vecteurJoursSemaine = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
				
				for(var i=0; i<7; i++)
				{
					var lesLignes = document.createElement("tr");
					var lesJours = document.createElement("th");
					lesLignes.className = "selectable";
					lesJours.className = "en-tete";
					lesJours.innerHTML = vecteurJoursSemaine[i];
					
					lesLignes.appendChild(lesJours);
					
					for (var j=0; j<24; j++)
					{
						var lesCellules = document.createElement("td");
						lesCellules.className = "ui-widget-content";
						lesLignes.appendChild(lesCellules);
					}
					bodyTableau.appendChild(lesLignes);
				}
				tableau.appendChild(bodyTableau);
				document.getElementById("formDispo").appendChild(tableau);
			}
			
			function genererForm(){
				
				genererTableau();
				remplirListeDate();
				
				var label = document.createElement("label");
				label.htmlFor = "nbDesire";
				label.innerHTML = "Nombre d'heures désirées : ";
				document.getElementById("formDispo").appendChild(label);
				
				var input = document.createElement("input");
				input.type = "number";
				input.id = "nbDesire";
				input.name = "nbDesire"
				document.getElementById("formDispo").appendChild(input);
				
				var label2 = document.createElement("label");
				label2.htmlFor = "repetition";
				label2.innerHTML = "Répéter pour";
				document.getElementById("formDispo").appendChild(label2);
				
				var input2 = document.createElement("input");
				input2.type = "number";
				input2.id = "repetition";
				input2.name = "repetition";
				input2.value = "0";
				document.getElementById("formDispo").appendChild(input2);
				
				var label3 = document.createElement("label");
				label3.htmlFor = "repetition"
				label3.innerHTML = "semaines"
				document.getElementById("formDispo").appendChild(label3);
				
				
				var input3 = document.createElement("input");
				input3.type = "button";
				input3.id = "btnReset";
				input3.value = "Vider";
				input3.className = "button right radius alert";
				input3.onclick = function() { deleteTableau();};
				document.getElementById("formDispo").appendChild(input3);
				
				var input3 = document.createElement("input");
				input3.type = "submit";
				input3.id = "btnSubmit";
				input3.value = "Envoyer";
				input3.className = "button right radius";
				document.getElementById("formDispo").appendChild(input3);
			}
			
			genererForm();	
		</script>
	</div>
@stop