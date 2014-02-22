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
		.first {
			min-width:150px;
		}
		.nav dd {
			max-width:100px;

		}
		.nav dd a {
			padding-left:25px;
			padding-right:25px;
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
		
			<dl class="tabs nav" data-tab>
			  <dd id="panel0"><a id="pan0" class="active" href="#panel2-0">Dimanche</a></dd>
			  <dd id="panel1"><a id="pan1" href="#panel2-1">Lundi</a></dd>
			  <dd id="panel2"><a id="pan2" href="#panel2-2">Mardi</a></dd>
			  <dd id="panel3"><a id="pan3" href="#panel2-3">Mercredi</a></dd>
			  <dd id="panel4"><a id="pan4" href="#panel2-4">Jeudi</a></dd>
			  <dd id="panel5"><a id="pan5" href="#panel2-5">Vendredi</a></dd>
			  <dd id="panel6"><a id="pan6" href="#panel2-6">Samedi</a></dd>
			</dl>	
			<div class="tabs-content">
			 <div class="content" id="panel2-0">
				
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
		@if (Auth::User()->type == "Gestionnaire")
			<dl id="horaires" class="accordion" data-accordion></dl>
		@endif


		<script type="text/javascript">
			window.addEventListener('load',init,false);

			function init(){
				importerHoraire();
				navActif();
				
			}
			
			function retirerTableVide() {
				for(var i=0; i< 7; i++) {
					var div = document.getElementById('table'+i);
					var tbody = div.getElementsByTagName('tbody');
					var tr = tbody[0].getElementsByTagName('tr');
					
					if(tr.length == 0)
						div.remove();
				}
			
			}

			function navActif() {
				var date = new Date();
				document.getElementById('panel2-'+ date.getDay()).setAttribute("class", "active content");
				document.getElementById('panel'+ date.getDay()).setAttribute("class", "active");
			}
			function importerHoraire(){
					$.ajax({
						url:"{{ URL::asset('ajax/fetch_horaires.php') }}",
						type:"POST",
						dataType:"json",
						error:function (){},
						success:function(horaire){
							console.log(horaire);
							
							
							for(var i=0; i< 7; i++) {
								var div = document.getElementById('panel2-'+i);
								div.appendChild(genererGrille(i));
							}
							for (var j = 0; j < horaire.length; j++){
								for(var k = 0; k < horaire[j].plages.length; k++){
									afficherGrilleHoraire(horaire[j].plages[k], j, horaire[j].nom, horaire[j].prenom );
								}
							}						
							
							retirerTableVide();
							

						}
					});
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
							if(j != 0){
								th.colSpan = 2;
								th.innerHTML = (j+8) + ":00";
							}
							else 
							{
								th.setAttribute("class", "first");
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
					tr1.cells[i].style.background = couleur;
				}
			}

		</script>


	</div>
	</style>

@stop