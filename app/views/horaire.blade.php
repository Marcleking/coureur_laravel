@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<a class="fa fa-question-circle fa-3x pull-right" href="guide#affichageHoraire" alt="Aide en ligne"></a>
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

	<style type="text/css">
		#chaussure{
			color: red;
			border:2px solid black;
			border-radius:10px;
			text-align: center;
			font-weight: bold;
		}
		#vetement{
			color: green;
			border:2px solid black;
			border-radius:10px;	
			text-align: center;
			font-weight: bold;
		}
		#Caissier{
			color: blue;
			border:2px solid black;
			border-radius:10px;
			text-align: center;
			font-weight: bold;
		}
		dd{
			text-align: center;
		}
		.first {
 			overflow: hidden;
 			width: 100px;
 		}
 		.red{
 			background-color: red;
 		}
 		.blue{
 			background-color: blue;
 		}
 		.green{
 			background-color: green; 
 		}
 		.rightBloc{
 			border-right: 2px black solid;
 			border-top: 2px black solid;
 			border-bottom: 2px black solid; 
 		}
 		.leftBloc{
 			border-left: 2px black solid;
 			border-bottom: 2px black solid;
 			border-top: 2px black solid;
 		}
 		.midBloc{
			border-bottom: 2px black solid;
 			border-top: 2px black solid;
 		}
	</style>

	<div id="contenu">
		
		<!-- Bouton de génération de l'horaire -->
		@if (Auth::User()->type == "Gestionnaire")
			<a href="{{ route('genere.horaire') }}" class="button">Générer l'horaire</a>
		@endif

		<div class="row">
			<ul id="legende" class="inline-list large-centered columns">
				<li class="small-3" id="chaussure">Chaussure</li>
				<li class="small-3" id="vetement">Vêtement</li>
				<li class="small-3" id="Caissier">Caisse</li>
			</ul>
		</div>
		
		@if (Auth::User()->type == "Gestionnaire")
			
			<dl class="tabs" data-tab>
				<dd class="large-6"><a id="monHoraire" href="#panel-moi">Mon horaire</a></dd>
				<dd class="large-6"><a id="tousHoraire" href="#panel-tous">Tous les horaires</a></dd>
			</dl>
			<div class="tabs-content">
				<div class="content" id="panel-moi"> 
				</div>
				<div class="content active "id="panel-tous">
					<dl class="tabs" data-tab>
						<dd><a id="pan0" class="active" href="#panel2-0">Dimanche</a></dd>
						<dd><a id="pan1" href="#panel2-1">Lundi</a></dd>
						<dd><a id="pan2" href="#panel2-2">Mardi</a></dd>
						<dd><a id="pan3" href="#panel2-3">Mercredi</a></dd>
						<dd><a id="pan4" href="#panel2-4">Jeudi</a></dd>
						<dd><a id="pan5" href="#panel2-5">Vendredi</a></dd>
						<dd><a id="pan6" href="#panel2-6">Samedi</a></dd>
		 			</dl>	
		 			<div class="tabs-content">
						<div class="content active" id="panel2-0">	
						</div>
						<div class="content" id="panel2-1">
						</div>
						<div class="content" id="panel2-2">
						</div>
						<div class="content" id="panel2-3">
						</div>
						<div class="content" id="panel2-4">
						</div>
						<div class="content" id="panel2-5">
						</div>
						<div class="content" id="panel2-6">
						</div>
					</div>
				</div>
			</div>		
		@endif


		<script type="text/javascript">
			window.addEventListener('load',init,false);

			function init(){
				importerHoraire();
				if("{{Auth::User()->type}}" == "Gestionnaire")
				{
					gestionClic();
				}
 			}
 			
 			function gestionClic() {
 				for(var i=0;i<7;i++) {
 					var pan = document.getElementById('pan'+i)
 					pan.addEventListener('click',cacher(i),false);
 				}
 			}
 			
 			function cacher(jour) {
 				for(var i=0;i<7;i++) {
 					if(i == jour)
 						$('panel2-'+i).show();
 					else
 						$('panel2-'+i).hide();
 				}
			}

			function importerHoraire(){
				// Vérifier le type de l'utilisateur
				if("{{Auth::User()->type}}" == "Gestionnaire")
				{
					$.ajax({
						url:"{{ URL::asset('ajax/fetch_horaires.php') }}",
						type:"POST",
						dataType:"json",
						error:function (){},
						success:function(horaire){
							for(var i=0; i< 7; i++) {
								var div = document.getElementById('panel2-'+i);
								div.appendChild(genererGrille(i));
							}
							for (var j = 0; j < horaire.length; j++){
								for(var k = 0; k < horaire[j].plages.length; k++){
									afficherGrilleHoraire(horaire[j].plages[k], j, horaire[j].nom, horaire[j].prenom );
								}
						
							}

							
						}
					});
				}
				$.ajax({
					url:"{{URL::asset('ajax/fetch_horaires.php')}}",
					type:"POST",
					data:{'courriel':"{{Auth::User()->id}}"},
					dataType:"json",
					error:function(){},
					success:function(horaire){
						document.getElementById('panel-moi').appendChild(genererGrilleUnePersonne());
						for (var i = 0; i < horaire.length; i++){
							afficherGrilleHoraireUnePersonne(horaire[i]);
						}
					}
				});
			}

			function genererGrilleUnePersonne(){
				var table = document.createElement('table');
				table.id = "tableHoraire";
				var thead = document.createElement('thead');
				var tbody = document.createElement('tbody');
				for (var i = 0; i < 8; i++){
					var tr = document.createElement('tr');

					if(i != 0)
					{
						for (var j = 0; j < 25; j++){
							if (j != 0){
								var td = document.createElement('td');
								tr.appendChild(td)
							}
							else{
								var th = document.createElement('th');
								th.innerHTML = parseJour(i - 1);
								tr.appendChild(th)
							}
						}

						tbody.appendChild(tr);
					}
					else{
						for (var j = 0; j < 13; j++){
							var th = document.createElement('th');
							if(j != 0){
								th.colSpan = 2;
								th.innerHTML = (j+8) + ":00";
							}
							tr.appendChild(th);
						}
						thead.appendChild(tr);
					}
				}
				table.appendChild(thead);
				table.appendChild(tbody);
				return table;
			}
			
			function afficherGrilleHoraireUnePersonne(plage){
				var table = document.getElementById('tableHoraire' );

				var tr = table.rows[parseInt(plage.jour) + 1];

				var debut = (parseInt(plage.debut.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.debut.split(':')[1]) == 30){debut++;}

				var fin = (parseInt(plage.fin.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.fin.split(':')[1]) == 30){fin++;}

				var couleur;
				switch(plage.type)
				{
					case "Chaussure":
						couleur = "red";
						break;
					case "Vetement":
						couleur = "green";
						break;
					case "Caissier":
						couleur = "blue";
						break;
				}

				for(var i = debut; i < fin; i++){
					tr.cells[i].className += " " + couleur;

					if(i == debut){
						tr.cells[i].className += " " + "leftBloc";
					}
					else if(i == (fin - 1)){
						tr.cells[i].className += " " + "rightBloc";
					}
					else
					{
						tr.cells[i].className += " " + "midBloc";
					}
				}
			}
			
			
			
			function genererGrille(no){
				var table = document.createElement('table');
				table.id = "table" + no;
				var thead = document.createElement('thead');
				var tbody = document.createElement('tbody');
				for (var i = 0; i < 8; i++){
					var tr = document.createElement('tr');

					if(i ==0){
						for (var j = 0; j < 13; j++){
							var th = document.createElement('th');
							th.setAttribute("style", "width:100px");
							if(j != 0){
								th.colSpan = 2;
								th.innerHTML = (j+8) + ":00";
							}
							tr.appendChild(th);
						}
						thead.appendChild(tr);
					}
				}
				table.appendChild(thead);
				table.appendChild(tbody);
				return table;
			}

			function afficherGrilleHoraire(plage, no, nom, prenom){
 				var table = document.getElementById('table' + plage.jour);
 				var tbody = table.getElementsByTagName('tbody')[0];
 				var tr1 = document.createElement('tr');
 				
 				for (var j = 0; j < 25; j++){
 							if (j != 0){
 								var td = document.createElement('td');
 								tr1.appendChild(td)
 							}
 							else{
 								var th = document.createElement('th');
 								th.innerHTML = prenom + ' ' + nom;
 								th.setAttribute("class", "first");
 								tr1.appendChild(th)
 							}
 						}
 
 					tbody.appendChild(tr1);


				var debut = (parseInt(plage.debut.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.debut.split(':')[1]) == 30){debut++;}

				var fin = (parseInt(plage.fin.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.fin.split(':')[1]) == 30){fin++;}

				var couleur;
				switch(plage.type)
				{
					case "Chaussure":
						couleur = "red";
						break;
					case "Vetement":
						couleur = "green";
						break;
					case "Caissier":
						couleur = "blue";
						break;
				}

				for(var i = debut; i < fin; i++){
					tr1.cells[i].className += " " + couleur;

					if(i == debut){
						tr1.cells[i].className += " " + "leftBloc";
					}
					else if(i == (fin - 1)){
						tr1.cells[i].className += " " + "rightBloc";
					}
					else
					{
						tr1.cells[i].className += " " + "midBloc";
					}
				}
			}

			function parseJour(no){
				var jour;

				switch(no){
					case 0:
						jour = "Dimanche";
					break;
					case 1:
						jour = "Lundi";
					break;
					case 2:
						jour = "Mardi";
					break;
					case 3:
						jour = "Mercredi";
					break;
					case 4:
						jour = "Jeudi";
					break;
					case 5:
						jour = "Vendredi";
					break;
					case 6:
						jour = "Samedi";
					break;
					default:
						jour = "";
				}
				return jour;
			}
		</script>


	</div>
@stop