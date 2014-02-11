@extends('layout.master')

@section('content')
	<div id="contenu" class="medium-12 columns">
		<h2>Ressources</h2>
			<style>
				.bloc{
					background:#F39814;
				}
				.blocSelected{
					background:#FECA40;
				}
			</style>
			
			<form id="ajoutBloc">
				<select id="jour" required="required">
					<option value="dimanche">Dimanche</option>
					<option value="lundi">Lundi</option>
					<option value="mardi">Mardi</option>
					<option value="mercredi">Mercredi</option>
					<option value="jeudi">Jeudi</option>
					<option value="vendredi">Vendredi</option>
					<option value="samedi">Samedi</option>
				</select>
				
				<label for="debut">Heure de début</label>
				<input type="text" id="debut" class="time" name="debut" />
				
				<label for="fin">Heure de fin</label>
				<input type="text" id="fin" class="time" name="fin" />
				
				<br />
				
				<label for="nbChaussures">Nombre d'employés "chaussure"</label>
				<input type="number" id="nbChaussures" name="nbChaussures" min="0" />
				<br />
				
				<label for="nbVetements">Nombre d'employés "vêtements"</label>
				<input type="number" id="nbVetements" name="nbVetements" min="0" />
				<br />
				
				<label for="nbCaisses">Nombre d'employés "caisse"</label>
				<input type="number" id="nbCaisses" name="nbCaisses" min="0" />
				<br />
				
				<input type="submit" id="ajouterBloc" value="Ajouter" />
				<input type="submit" id="enregistrer" value="Enregistrer" />
			</form>
			
			<script type="text/javascript">
				
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
				
				// Génération du tableau
				var table = document.createElement('table');
				table.id = "ressources";
				var thead = document.createElement('thead');
				var tbody = document.createElement('tbody');
				for (var i = 0; i < 8; i++){
				
					var tr = document.createElement('tr');
					
					if (i != 0) {
						
						for (var j = 0; j < 27; j++){
							
							if (j != 0){
								var td = document.createElement('td');
								tr.appendChild(td);
							}
							else{
								var th = document.createElement('th');
								th.innerHTML = parseJour(i-1);
								tr.appendChild(th);
							}
						}
						
						tbody.appendChild(tr);
						table.appendChild(tbody);
					}
					else {
						for (var j = 0; j < 14; j++){
							var th = document.createElement('th');
							if (j!= 0){
								th.colSpan = 2;
								th.innerHTML = (j + 8) + ":00";
							}
							tr.appendChild(th);
						}
						
						thead.appendChild(tr);
						table.appendChild(thead);
					}
				}
				
				//document.getElementById('tableau').appendChild(table);
				document.getElementById('contenu').insertBefore(table,document.getElementById('ajoutBloc'));
				
			</script>
			
			<script type="text/javascript">
				window.addEventListener('load',init,false);
				
				var lesBlocs = [];
				var noAutoBloc = 0;
				/***************************************************
					Structure JSON
					
					lesBlocs
					lesBlocs[i].jour
					lesBlocs[i].heureDebut
					lesBlocs[i].heureFin
					lesBlocs[i].nbChaussures
					lesBlocs[i].nbVetements
					lesBlocs[i].nbCaisses
				
				****************************************************/
				
				
				function init(){
					document.getElementById('ajouterBloc').addEventListener('click',ajoutBloc);
					document.getElementById('enregistrer').addEventListener('click',enregistrer);
					
					$(".time").timePicker({
						startTime: "09:00",
						endTime:"21:00",
						step:30
					});
				}
				
				function ajoutBloc(e){
					e.preventDefault();
					
					var jour = document.getElementById('jour').selectedIndex;
					var debut = document.getElementById('debut').value;
					var fin = document.getElementById('fin').value;
					
					var toRemove = [];
					
					for (var i = 0; i < lesBlocs.length; i++){
						if (lesBlocs[i].jour == jour ){
							
							var debutOld = {'heure' : parseInt(lesBlocs[i].heureDebut.split(':')[0]) , 'minutes' : parseInt(lesBlocs[i].heureDebut.split(':')[1])};
							var finOld = {'heure' : parseInt(lesBlocs[i].heureFin.split(':')[0]) , 'minutes' : parseInt(lesBlocs[i].heureFin.split(':')[1])};
							
							var debutNew = {'heure' : parseInt(debut.split(':')[0]) , 'minutes' : parseInt(debut.split(':')[1])};
							var finNew = {'heure' : parseInt(fin.split(':')[0]) , 'minutes' : parseInt(fin.split(':')[1])};
							
							// Nouveau bloc à l'intérieur d'un bloc existant
							if (	
								(debutOld.heure < debutNew.heure && finOld.heure > finNew.heure) ||
								(debutOld.heure == debutNew.heure && finOld.heure > finNew.heure && debutOld.minutes <= debutNew.minutes) ||
								(debutOld.heure < debutNew.heure && finOld.heure == finNew.heure && finOld.minutes >= finNew.minutes) ||
								(debutOld.heure == debutNew.heure && finOld.heure == finNew.heure && finOld.minutes >= finNew.minutes && debutOld.minutes <= debutNew.minutes)){
								
								toRemove.push(i);
							}
							// Nouveau bloc autour d'un bloc existant
							else if (
								(debutOld.heure > debutNew.heure && finOld.heure < finNew.heure) ||
								(debutOld.heure == debutNew.heure && finOld.heure < finNew.heure && debutOld.minutes >= debutNew.minutes) ||
								(debutOld.heure > debutNew.heure && finOld.heure == finNew.heure && finOld.minutes <= finNew.minutes) ||
								(debutOld.heure == debutNew.heure && finOld.heure == finNew.heure && finOld.minutes <= finNew.minutes && debutOld.minutes >= debutNew.minutes)){
								
								toRemove.push(i);
							}
							else{
								// Left limit of new block
								if(
									(finOld.heure > debutNew.heure && finOld.heure < finNew.heure) ||
									(finOld.heure == debutNew.heure && finOld.minutes > debutNew.minutes) ||
									(finOld.heure == finNew.heure && finOld.minutes < finNew.minutes)){
								
									lesBlocs[i].heureFin = debut;
								}
								
								// Right limit of new block
								if(
									(debutOld.heure < finNew.heure && debutOld.heure > debutNew.heure) ||
									(debutOld.heure == finNew.heure && debutOld.minutes < finNew.minutes) ||
									(debutOld.heure == debutNew.heure && debutOld.minutes > debutNew.minutes)){
									
									lesBlocs[i].heureDebut = fin;
								}
							}
						}
					}
					
					for (var i = 0; i < toRemove.length; i++){
						var td = document.getElementsByClassName(lesBlocs[toRemove[i] - i].id);
						changeTdArrayClass(td,'bloc ',"");
						lesBlocs.splice(toRemove[i] - i, 1);
					}
					
					lesBlocs.push({
						'id':noAutoBloc,
						'jour':jour,
						'heureDebut':debut,
						'heureFin':fin,
						'nbChaussures':document.getElementById('nbChaussures').value,
						'nbVetements':document.getElementById('nbVetements').value,
						'nbCaisses':document.getElementById('nbCaisses').value
					});
					
					var table = document.getElementById('ressources');
					var row = table.rows[jour + 1];
					
					var iDebut = (parseInt(lesBlocs[getBlocPosition(noAutoBloc)].heureDebut.split(':')[0]) - 9) * 2 + 1;
					var iFin = (parseInt(lesBlocs[getBlocPosition(noAutoBloc)].heureFin.split(':')[0]) - 9) * 2 + 1;
					
					if (lesBlocs[lesBlocs.length - 1].heureDebut.split(':')[1] == '30'){
						iDebut++;
					}
					if (lesBlocs[lesBlocs.length - 1].heureFin.split(':')[1] == '30' ){
						iFin++;
					}
					
					for (var i = iDebut; i < iFin; i++){
						row.childNodes[i].className = "bloc " + noAutoBloc;
						row.childNodes[i].addEventListener('click', selectionBloc);
					}
					
					changeFormValues(jour,fin,fin,0,0,0);
					
					noAutoBloc++;
				}
				
				function enregistrer(){
					
					
					
				}
				
				function supprimerBloc(noBloc){
					lesBlocs.splice(getBlocPosition(noBloc),1);
					changeTdArrayClass(document.getElementsByClassName(noBloc),'blocSelected ', '');
					document.getElementById('ajoutBloc').removeChild(document.getElementById('supprimer'));
				}
				
				function selectionBloc(e){
					
					if (e.target.className.split(' ').length > 1){
						var noBloc = parseInt(e.target.className.split(' ')[1]);
						var alreadySelectedBloc = blocSelected();
						if (alreadySelectedBloc != -1 && alreadySelectedBloc != noBloc){
							changeTdArrayClass(document.getElementsByClassName(alreadySelectedBloc),'blocSelected','bloc');
						}
						
						var bloc = document.getElementsByClassName(noBloc);
						
						var jour = 0, heureDebut = '', heureFin = '', nbChaussures = 0; nbVetements = 0, nbCaisses = 0;
						
						// Sélectionne le bloc
						if (bloc[0].className.split(' ')[0] == "bloc")
						{
							changeTdArrayClass(bloc,'bloc','blocSelected');
							
							var position = getBlocPosition(noBloc);
							
							jour = lesBlocs[position].jour;
							heureDebut = lesBlocs[position].heureDebut;
							heureFin = lesBlocs[position].heureFin;
							nbChaussures = lesBlocs[position].nbChaussures;
							nbVetements = lesBlocs[position].nbVetements;
							nbCaisses = lesBlocs[position].nbCaisses;
							
							document.getElementById('ajouterBloc').value = "Modifier";
							
							var btnSupp = document.createElement('input');
							btnSupp.value = 'Supprimer';
							btnSupp.type = 'button';
							btnSupp.addEventListener('click', function(){supprimerBloc(noBloc);});
							btnSupp.id = 'supprimer';
							document.getElementById('ajoutBloc').appendChild(btnSupp);
						}
						// Désélectionne le bloc
						else{
							changeTdArrayClass(bloc, 'blocSelected', 'bloc');
							document.getElementById('ajouterBloc').value = "Ajouter";
							document.getElementById('ajoutBloc').removeChild(document.getElementById('supprimer'));
						}
							
						changeFormValues(jour, heureDebut, heureFin, nbChaussures, nbVetements, nbCaisses);

					}
				}	
				
				function changeTdArrayClass(td, previousClass, newClass ){
					
					for (var i = 0; i < td.length; i++){
						td[i].className = td[i].className.replace(previousClass,newClass);
					}
				}
				
				function blocSelected(){
					
					if(typeof document.getElementsByClassName('blocSelected')[0] != 'undefined'){
						return parseInt(document.getElementsByClassName('blocSelected')[0].className.split(' ')[1]);	
					}
					else
					{
						return -1;
					}
				}
				
				function getBlocPosition(noBloc){
					var i = 0;
					while (i < lesBlocs.length && lesBlocs[i].id != noBloc)
					{
						i++
					}
					return i;
				}
				
				function changeFormValues(jour, heureDebut, heureFin, nbChaussures, nbVetements, nbCaisses ){
					document.getElementById('jour').selectedIndex = jour;
					document.getElementById('debut').value = heureDebut;
					document.getElementById('fin').value = heureFin;
					document.getElementById('nbChaussures').value = nbChaussures;
					document.getElementById('nbVetements').value = nbVetements;
					document.getElementById('nbCaisses').value = nbCaisses;
				}
			
			</script>
			
		<!--</div>-->
	</div>
@stop