@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
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
			background: red;
		}
		#vetement{
			background: green;	
		}
		#caisse{
			background: blue;
		}
	</style>

	<div id="contenu">
		@if (Auth::User()->type == "Gestionnaire")
			<a href="{{ route('genere.horaire') }}" class="button">Générer l'horaire</a>
		@endif

		
		<ul id="legende">
			<li id="chaussure" >Chaussure</li>
			<li id="vetement">Vêtement</li>
			<li id="caisse">Caisse</li>
		</ul>
		
		@if (Auth::User()->type == "Gestionnaire")
			<dl id="horaires" class="accordion" data-accordion></dl>
		@endif


		<script type="text/javascript">
			window.addEventListener('load',init,false);

			function init(){
				importerHoraire();
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
							console.log(horaire);
							for (var i = 0; i < horaire.length; i++){
								var dd = document.createElement('dd');
								var a = document.createElement('a');
								var div = document.createElement('div');

								var cle = "";
								if(horaire[i]['cle'] == "1"){cle = " Clé"};

								a.href = "#" + i;
								a.innerHTML = horaire[i]['prenom'] + " " + horaire[i]['nom'] + " ("+ horaire[i]['courriel'] +")" + cle ;
								dd.appendChild(a);

								div.id = i;
								div.className = "content";
								div.appendChild(genererGrille(i));
								dd.appendChild(div);

								document.getElementById('horaires').appendChild(dd);
								document.getElementById('horaires').appendChild(document.createElement('hr'));
								for(var j = 0; j < horaire[i].plages.length; j++){

									afficherGrilleHoraire(horaire[i].plages[j], i);
								}
							}

						}
					});
				}
				else
				{	
					$.ajax({
						url:"{{URL::asset('ajax/fetch_horaires.php')}}",
						type:"POST",
						data:{'courriel':"oli.tremblay@gmail.com"},
						dataType:"json",
						error:function(){},
						success:function(horaire){
							console.log(horaire);

							document.getElementById('contenu').appendChild(genererGrille(0));
							for (var i = 0; i < horaire.length; i++){
								afficherGrilleHoraire(horaire[i], 0);
							}
						}
					});
				}
			}

			function genererGrille(no){
				var table = document.createElement('table');
				table.id = "table" + no;
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

			function afficherGrilleHoraire(plage, no){
				var table = document.getElementById('table' + no);

				var tr = table.rows[parseInt(plage.jour) + 1];

				var debut = (parseInt(plage.debut.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.debut.split(':')[1]) == 30){debut++;}

				var fin = (parseInt(plage.fin.split(':')[0]) - 9) * 2 + 1;
				if (parseInt(plage.fin.split(':')[1]) == 30){fin++;}

				var couleur;
				console.log(plage.type);
				switch(plage.type)
				{
					case "Chaussure":
						couleur = "red";
						break;
					case "Vetement":
						couleur = "green";
						break;
					case "Caisse":
						couleur = "blue";
						break;
				}

				for(var i = debut; i < fin; i++){
					tr.cells[i].style.background = couleur;
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