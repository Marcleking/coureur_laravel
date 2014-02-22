@extends('layout.master')

@section('content')
<div id="contenu" class="medium-12 columns">
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
						console.log(horaire);
						
						for(var i = 0; i< horaire.length; i++) {
							var divPrin = document.getElementById('divPrinc');
							var div = document.createElement('div');
							var divHrs = document.createElement('div');
							var divCheck = document.createElement('div');
							var check = document.createElement('input');
							check.setAttribute("type","checkbox");
							
							divHrs.innerHTML = convertJour(horaire[i]["jour"]) + "<br />" + horaire[i]["debut"] + " - " + horaire[i]["fin"] ;
							divCheck.setAttribute("class","right inline");
							divCheck.appendChild(check);
							divHrs.setAttribute("class","inline");
							div.appendChild(divHrs);
							div.appendChild(divCheck);
							div.setAttribute("class","plage");
							divPrin.appendChild(div);
						}
					}
				});
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
			console.log(no);
			return jour;
		}
	</script>
	
	<a href="#" class="button small right">Faire la demande</a>
	
</div>
@stop