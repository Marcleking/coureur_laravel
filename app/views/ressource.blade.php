@extends('layout.master')

@section('content')
	<div id="contenu" class="medium-12 columns">
	<h2>Ressources</h2>
	<!--<div class="row panel">-->
		
		<style>
			.bloc{
				background:#F39814;
			}
			.blocSelected{
				background:#FECA40;
			}
		</style>
		
		<div class="row panel">
			<form id="ressourcesMere">
				<select id="groupes"></select>
				<label for="nom">Nom du groupe : </label>
				<input type="text" id="nom" name="nom" /> 
				<label for="description">Description</label>
				<input type="text" id="description" name="description" />
				<label for="actif">Actif : </label>
				<input type="checkbox" id="actif" name="actif" />
				<input type="button" id="ajouterGroupe" value="Ajouter" />
			</form>
		</div>
		<br />
		<form id="ajoutBloc" class="row panel">
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
					
					for (var j = 0; j < 25; j++){
						
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
					for (var j = 0; j < 13; j++){
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
			document.getElementById('ajoutBloc').insertBefore(table,document.getElementById('jour'));
			
		</script>
		
		<script type="text/javascript">
			window.addEventListener('load',init,false);
			
			var lesBlocs = [];
			var lesGroupes = [];
			var noAutoBloc = 0;
			/***************************************************
				Structure JSON
				
				lesBlocs
				lesBlocs[i].id
				lesBlocs[i].jour
				lesBlocs[i].heureDebut
				lesBlocs[i].heureFin
				lesBlocs[i].nbChaussures
				lesBlocs[i].nbVetements
				lesBlocs[i].nbCaisses
				
				lesGroupes
				lesGroupes[i].id
				lesGroupes[i].nom
				lesGroupes[i].description
				lesGroupes[i].actif
			
			****************************************************/
			
			
			function init(){
				document.getElementById('ajouterBloc').addEventListener('click',ajoutBloc);
				document.getElementById('enregistrer').addEventListener('click',enregistrer);
				document.getElementById('ajouterGroupe').addEventListener('click',ajoutGroupe);
				document.getElementById('actif').addEventListener('change',changeActif);
				
				loadGroups();
				
				$(".time").timePicker({
					startTime: "09:00",
					endTime:"21:00",
					step:30
				});
			}
			
			function loadGroups(){
				
				$.ajax({
					type:"POST",
					url: "{{ URL::asset('ajax/fetch_ressources.php') }}",
					data:{'type':'groupes'},
					dataType:"json",
					error:function(){
						document.getElementById('groupes').style.display = 'none';
					},
					success:function(groupes){
						if (typeof groupes != 'undefined'){
							lesGroupes = groupes;
							var select = document.getElementById('groupes');

							var nbOptions = select.options.length;
							for(var i = 0; i < nbOptions; i++){
								select.remove(0);
							}

							select.style.display = 'none';
							select.addEventListener('change',selectGroupe, false);
							
							if (groupes.length > 0){
								for (var i = 0; i < groupes.length; i++){
									var option = document.createElement('option');
									option.value = groupes[i].id;
									option.innerHTML = groupes[i].nom;
									select.appendChild(option);
								}
								select.style.display = 'inline-block';

								var i = 0;
								while(lesGroupes.length < i && lesGroupes[i].actif != 0){i++;}

								select.selectedIndex = i;
								selectGroupe();
							}else{
								document.getElementById('actif').checked = true;
								document.getElementById('actif').disabled = true;
							}
						}
					}
				});
			}
			
			function ajoutGroupe(e){
				e.preventDefault();
				
				$.ajax({
					type:"POST",
					url: "{{ URL::asset('ajax/push_ressources.php') }}",
					data:{
						'nom':document.getElementById('nom').value,
						'description':document.getElementById('description').value,
						'type':'addGroup'},
					error:function(){},
					success:function(groupe){
						groupe = jQuery.parseJSON(groupe);
						if(groupe.message == null){
							lesGroupes.push(groupe);
							var option = document.createElement('option');
							option.value = groupe['id'];
							option.innerHTML = groupe['nom'];
							document.getElementById('groupes').appendChild(option);
							document.getElementById('groupes').style.display = "inline-block";
							document.getElementById('groupes').selectedIndex = document.getElementById('groupes').length - 1;
							selectGroupe();
							showMessage("Le groupe a été ajouté avec succès!","success");
						}
						else{
							showMessage(groupe.message,"error");
						}
					}
				});
			}
			
			function modifGroupe(e){
				e.preventDefault();
				
				$.ajax({
					type:"POST",
					url: "{{ URL::asset('ajax/push_ressources.php') }}",
					data:{
						'id': document.getElementById('groupes').options[document.getElementById('groupes').selectedIndex].value,
						'nom':document.getElementById('nom').value,
						'description':document.getElementById('description').value,
						'type':'modifGroup'},
					error:function(){},
					success:function(groupe){
						groupe = jQuery.parseJSON(groupe);
						if(groupe.message == null){
							var i = 0;
							while ( i < lesGroupes.length && lesGroupes[i].id != groupe.id){
								i++;
							}
							
							lesGroupes[i].nom = groupe.nom;
							lesGroupes[i].descriptions = groupe.nom;
							lesGroupes[i].actif = groupe.actif;
							showMessage("Le groupe a été modifié avec succès!","success");
						}
						else{
							showMessage(groupe.message,"error");
						}
					}
				});
			}

			function suppGroupe(e){
				e.preventDefault();

				$.ajax({
					type:"POST",
					url:"{{URL::asset('ajax/push_ressources.php')}}",
					data:{
						'id':document.getElementById('groupes').options[document.getElementById('groupes').selectedIndex].value,
						'type':'suppGroup'},
					dataType:"json",
					error:function(){},
					success:function(message){
						
						loadGroups();
						showMessage(message.message, message.type);
					
					}
				});
			}
			
			function selectGroupe(){
				var leGroupe = lesGroupes[document.getElementById('groupes').selectedIndex];
				
				document.getElementById('nom').value = leGroupe.nom;
				document.getElementById('description').value = leGroupe.description;
				if (leGroupe.actif == 0){
					document.getElementById('actif').checked = true;
					document.getElementById('actif').disabled = true;
					document.getElementById('actif').title = "Au moins un groupe de ressources doit être sélectionné.";
				}
				else{
					document.getElementById('actif').checked = false;
					document.getElementById('actif').disabled = false;
					document.getElementById('actif').title = "";
				}
				
				try{
					document.getElementById('ressourcesMere').removeChild(document.getElementById('modifierGroupe'));
					document.getElementById('ressourcesMere').removeChild(document.getElementById('supprimerGroupe'));
				}
				catch(err){}
				if (lesGroupes.length > 0){
					var btnModif = document.createElement('input');
					btnModif.id = 'modifierGroupe';
					btnModif.type = 'button';
					btnModif.value = 'Modifier';
					btnModif.addEventListener('click',modifGroupe);
					document.getElementById('ressourcesMere').appendChild(btnModif);

					if (lesGroupes.length > 1 && leGroupe.actif != 0){
						var btnSupp = document.createElement('input');
						btnSupp.id = 'supprimerGroupe';
						btnSupp.type = 'button';
						btnSupp.value = 'Supprimer';
						btnSupp.addEventListener('click', suppGroupe);
						document.getElementById('ressourcesMere').appendChild(btnSupp);
					}
				}
				
				$.ajax({
					type:"POST",
					url: "{{ URL::asset('ajax/fetch_ressources.php') }}",
					data:{'type':'blocs','idGroup':leGroupe.id},
					dataType:'json',
					error:function(){},
					success:function(blocs){
						lesBlocs = blocs;
						if (lesBlocs.length > 0){
							var table = document.getElementById('ressources');
							
							for(var i = 0; i < blocs.length; i++){
								var row = table.rows[parseInt(lesBlocs[i].jour) + 1];
								var iDebut = (parseInt(lesBlocs[i].heureDebut.split(':')[0]) - 9) * 2 + 1;
								var iFin = (parseInt(lesBlocs[i].heureFin.split(':')[0]) - 9) * 2 + 1;
								
								if (lesBlocs[i].heureDebut.split(':')[1] == '30'){
									iDebut++;
								}
								if (lesBlocs[i].heureFin.split(':')[1] == '30' ){
									iFin++;
								}
								
								for (var j = iDebut; j < iFin; j++){
									row.childNodes[j].className = "bloc " + lesBlocs[i].id;
									row.childNodes[j].addEventListener('click', selectionBloc);
								}
							}
							noAutoBloc = parseInt(lesBlocs[lesBlocs.length - 1].id) + 1;
						}
						else
						{	
							
							var table = document.getElementById('ressources');

							for(var i = 1; i < table.rows.length; i++){

								for(var j = 1; j < table.rows[i].cells.length; j++){
									table.rows[i].cells[j].className = "";
								}
							}

							noAutoBloc = 0;
						}
						
					}
				});
			}
			
			function changeActif(){
				$.ajax({
					type:"POST",
					url: "{{ URL::asset('ajax/push_ressources.php') }}",
					data:{'noGroupe':document.getElementById('groupes').options[document.getElementById('groupes').selectedIndex].value,
						  'type':'changeActif'},
					error:function(){},
					success:function(message){
						message = jQuery.parseJSON(message);
						if(message.message == null){
							for(var i = 0; i < lesGroupes.length; i++){
								if(i == document.getElementById('groupes').selectedIndex){
									lesGroupes[i].actif = "0";
									document.getElementById('actif').disabled = true;
									document.getElementById('actif').checked = true;
									document.getElementById('actif').title = "Au moins un groupe de ressources doit être sélectionné.";
								}
								else{
									lesGroupes[i].actif = "1";
								}
							}
							showMessage("Groupe actif modifié avec succès!","success");
						}
						else{
							showMessage(message.message,"error");
						}
					}
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
				
				if (lesBlocs[getBlocPosition(noAutoBloc)].heureDebut.split(':')[1] == '30'){
					iDebut++;
				}
				if (lesBlocs[getBlocPosition(noAutoBloc)].heureFin.split(':')[1] == '30' ){
					iFin++;
				}
				
				for (var i = iDebut; i < iFin; i++){
					row.childNodes[i].className = "bloc " + noAutoBloc;
					row.childNodes[i].addEventListener('click', selectionBloc);
				}
				
				noAutoBloc++;
			}
			
			function enregistrer(e){
				e.preventDefault();
				$.ajax({
					url:"{{ URL::asset('ajax/push_ressources.php') }}",
					type:"POST",
					data:{	'lesBlocs':lesBlocs,
							'groupId':document.getElementById('groupes').options[document.getElementById('groupes').selectedIndex].value,
							'type':'ajoutBlocs'},
					dataType:"text",
					error:function (text){
						
					},
					success:function(text){
						text = jQuery.parseJSON(text);
						if(text.message == null){
							showMessage("Les ressources ont été ajoutées avec succès!","success");
						}
						else{
							showMessage(text.message,"error");
						}
					}
				});
				
			}
			
			function supprimerBloc(noBloc){
				lesBlocs.splice(getBlocPosition(noBloc),1);
				changeTdArrayClass(document.getElementsByClassName(noBloc),'blocSelected ', '');
				changeFormValues(0,'','','','','');
				document.getElementById('ajoutBloc').removeChild(document.getElementById('supprimer'));
			}
			
			function selectionBloc(e){
				
				if (e.target.className.split(' ').length > 1){
					var noBloc = parseInt(e.target.className.split(' ')[1]);
					var alreadySelectedBloc = blocSelected();
					if (alreadySelectedBloc != -1 && alreadySelectedBloc != noBloc){
						changeTdArrayClass(document.getElementsByClassName(alreadySelectedBloc),'blocSelected','bloc');
						document.getElementById('ajoutBloc').removeChild(document.getElementById('supprimer'));
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
					i++;
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

			function showMessage(text, status){
				if (document.getElementById('fade') != null){
					document.getElementById('fade').parentNode.removeChild(document.getElementById('fade'));
				}

				var message = document.createElement("div");
				message.setAttribute("data-alert","");
				message.id = "fade";
				message.className = "alert-box radius";

				if (status == "error"){
					message.className = message.className + " warning";
				}
				else if (status == "success"){
					message.className = message.className + "success"
				}
				
				message.innerHTML = text;

				document.getElementById('contenu').insertBefore(message,document.getElementById('ressourcesMere').parentNode);
			}
		
		</script>
</div>
@stop