@extends('layout.master')

@section('content')
	<div id="contenu">
		<form id="genererHoraire" action="{{ URL::asset('ajax/horaire/genererHoraire.php') }}">
			<input type="submit" value="Générer l'horaire" />
		</form>

		<dl id="horaires" class="accordion" data-accordion>
			
		</dl>

		<script type="text/javascript">
			window.addEventListener('load',init,false);

			function init(){
				importerHoraire();
			}

			function importerHoraire(){
				// Vérifier le type de l'utilisateur
				if("{{Auth::User()->type}}" == "gestionnaire")
				{
					$.ajax({
						url:"{{ URL::asset('ajax/fetch_horaires.php') }}",
						type:"POST",
						dataType:"json",
						error:function (){},
						success:function(horaire){

						for (var i = 0; i < horaire.length; i++){
							var dd = document.createElement('dd');
							var a = document.createElement('a');
							var div = document.createElement('div');

							a.href = i;
							a.innerHTML = horaire[i]['courriel'];
							dd.appendChild(a);

							div.id = i;
							div.className = "content active";
							div.appendChild(genererGrille(i));
							dd.appendChild(div);

							document.getElementById('horaires').appendChild(dd);
						}

						}
					});
				}
				else
				{

				}
			}

			function genererGrille(no){
				var table = document.createElement('table');
				table.id = "table" + no;
				var thead = document.createElement('thead');
				var tbody = document.createElement('tbody');
				for (var i = 0; i < 9; i++){
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

			function afficherGrilleHoraire(plages){
				for (var i = 0; i < plages.length; i++){


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