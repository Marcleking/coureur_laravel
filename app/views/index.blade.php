@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
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
				<p class="text-center">Il n'y a pas de message!</p>
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
						
						console.log(remplacement.length);
						for(var i = 0; i< remplacement.length; i++) {
						
							var typeFormation;
							switch (remplacement[i]['typeTravail'])
							{
								case "Chaussure":
								  typeFormation = {{$info->formationChaussure}};
								  break;
								case "Vetement":
								   typeFormation = {{$info->formationVetement}};
								  break;
								case "Caissier":
									typeFormation = {{$info->formationCaissier}};
								  break;
							}
							if(typeFormation == 1) {
							
							
								var divPrin = document.getElementById('princ');
								var div = document.createElement('div');
								var divHrs = document.createElement('div');
								var divDroite = document.createElement('div');
								var divBtn = document.createElement('div');
								var leDemandeur = document.createElement('div');
								divHrs.innerHTML = convertJour(remplacement[i]["jour"]) + "<br />" + remplacement[i]["debut"] + " - " + remplacement[i]["fin"] ;
								divHrs.setAttribute("class","left");
								divBtn.innerHTML = "<a href='' class='button small'>Accepter</a>";
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
@stop