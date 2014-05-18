@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Guide de l'employé</h3>
		<div class="panel">
			<h4 id="accueilMenu">Page d'accueil et menu</h4>
				<h5><FONT COLOR="red">Contenus et but</FONT></h5>
			<p align="justify">La page d'accueil contient les derniers messages envoyés par les gestionnaires, ainsi que les remplacements qui n'ont pas été comblés et qui sont
				demandés par les utilisateurs du site.  Il est possible à partir de la page d'accueil d'accepter la plage de travail pour laquelle un employé veut se départir dans
				la section "Remplacements".
			</p>
				
			<hr width="790px">
			<br></br>

			<h4>Menu sur la gauche</h4>
				<h5><FONT COLOR="red">Présentation des onglets du menu sur la gauche</FONT></h5>
					<p></p>
				<ul>
					<ol><strong>1. Accueil</strong>: Onglet du menu qui permet de revenir à la page d'accueil du site, si l'employé se trouve dans cette même page ou dans une autre.
						Vous remarquerez que le type d'employé connecté est inscrit à la droite du lien accueil du menu sur le côté gauche.</ol>

					<ol><strong>2. Message</strong>: Onglet du menu qui permet d'avoir accès à la page de consultation de tous les nouveaux et anciens messages qui ont été envoyés
						par les gestionnaires.</ol>

					<ol><strong>3. Documents</strong>: Onglet du menu qui permet d'avoir accès à la page des documents.</ol>
				
					<ol><strong>4. Affichage</strong> d'un horaire: Onglet du menu qui mène à la page qui permet de consulter l'horaire courant de l'employé connecté.</ol>

					<ol><strong>5. Saisie des disponibilités</strong> : Onglet du menu qui mène à la page de saisie des disponibilités.</ol>

					<ol><strong>6. Gestion des échanges</strong> : Onglet du menu qui mène à la page des échanges de quart de travail.</ol>
				
					<ol><strong>7. Gestion du compte</strong> : Onglet du menu qui mène à la page de modification des informations de l'utilisateur courant.</ol>
				
					<ol><strong>Déconnexion</strong>: Onglet du menu qui permet à l'utilisateur courant de se déconnecter.</ol>
				</ul>
				
			<hr width="790px">
			<br></br>

			<h4>Page d'accueil</h4>
				<h5><FONT COLOR="red">Contenus et but</FONT></h5>
				<p></p>
				
				<ul>
					<ol><strong>Messages</strong>
						<p align="justify">
							Les derniers messages envoyés par le gestionnaire sont présents sur la page d'accueil.  S'il n'y a aucun
							message, une inscription vous en informera.
						</p>
					</ol>
					<ol><strong>Remplacements</strong>
						<p align="justify">
							Les remplacements de la semaine en cours qui sont demandés par les utilisateurs du site sont présents sur la page d'accueil.
							Un message vous informant qu'il n'y a pas de remplacement demandé est visible sur cette page, si aucune demande n’a été émise.
							la journée demandée par la personne et les heures pour lesquelles la personne veut être remplacée, ainsi que le nom d'utilisateur
							de la personne qui demande à être remplacée est présent sur la demande.  Deux boutons sont présents pour accepter ou annuler la
							demande.
						</p>
					</ol>
				</ul>
					
			<hr width="790px">
			<br></br>

			<h4 id="message">Page messages</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
				<p align="justify">Tous les messages non supprimés par les gestionnaires sont stockés dans la page message.  Cette page peut contenir jusqu'à un maximum de 10
					messages, si ce nombre est dépassé un bouton suivant et un bouton précédent apparaissent pour permettre de changer de page et ainsi 10 autres messages
					apparaitront.
					</p>

				<ul>
					<ol><FONT size="4" COLOR="red">Descriptifs de la page des messages</FONT></ol>
					
					<ol><strong>1.</strong> Le titre du message apparait à la gauche du message créé.</ol>
					
					<ol><strong>2.</strong> Le nom d'utilisateur (adresse courriel) du gestionnaire qui a envoyé le message est présent à la droite complètement du titre
						(exemple@gmail.com).</ol>

					<ol><strong>3.</strong> Lors due clique sur une des lignes de la liste des messages que vous désirez consulté, plusieurs informations intéressantes apparaissent
						(exemple le contenu du message)..</ol>
						
					<ol><strong>4.</strong> La date ainsi que l'heure de l'envoi du message sont présentes en haut à droite du message.</ol>
					
					<ol><strong>5.</strong> Le contenu du message est présent en dessous du titre.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>
			
			<h4 id="document">Page documents</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
				<p align="justify">Cette page permet aux utilisateurs du site du consulter les fichiers (des fichiers de formation par exemple) que les gestionnaires envoient sur le
					site.
				</p>

				<ul>
					<ol><FONT size="4" COLOR="red">Descriptifs de la page documents</FONT></ol>
				
					<ol><strong>1.</strong> En haut de la page, vous pouvez constater un endroit où il est inscrit "Emplacement", cela correspond à l'endroit (chemin) où vous
							êtes situé dans les dossiers.</ol>
						
					<ol><strong>2.</strong> La grosse flèche qui pointe vers le haut permet de revenir au dossier parent.  Dans le cas, où vous revenez dans le dossier
							précèdent, "Emplacement" changera.</ol>
						
					<ol><strong>3.</strong> Les dossiers qui ont été créés sont identifiés par un petit dossier entouré d'un carré cliquable.  Lors due clique sur un des dossiers,
							l'employé ou le gestionnaire sera automatiquement dirigé à l'intérieur du dossier pour pouvoir consulté les fichiers ou autres dossiers qui y sont
							contenus.</ol>
						
					<ol><strong>4.</strong> Les fichiers qui ont été crées sont identifiés par un petit fichier entouré d'un carré cliquable.  Lors du clique sur un des fichiers,
							la personne verra une boite de dialogue apparaitre à l'écran et aura l'option d'ouvrir ou enregistrer le fichier qu'il désire consulté.</ol>
				</ul>

			<hr width="790px">
			<br></br>

			<h4 id="affichageHoraire">Page affichage d'un horaire</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
				<p align="justify">Cette page permet de consulter l'horaire de la semaine.  L'employé connecté peut voir selon la journée de la semaine les heures qu'ils feront et
					dans quel secteur, du magasin (chaussure, vêtement ou caisse) il fera son quart de travail.
				</p>

				<ul>
					<ol><FONT size="4" COLOR="red">Descriptifs de la page affichage d'un horaire</FONT></ol>
				
					<ol><strong>1.</strong>Code de couleur identifiant les différents secteurs de l'entreprise soit: les chaussures (en rouge), les vêtements (en vert) et
						la caisse (en bleu).</ol>
						
					<ol><strong>2. </strong>Horaire de la personne, montrer sur les sept jours de la semaine (du dimanche au samedi).  La personne connectée peut ainsi voir sur
						toute la semaine dans quel département il va travailler selon le code de couleur qui est montré au point 1 et le quart de travail qu'il fera.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>

			<h4 id="saisieDisponibilite">Page saisie des disponibilités</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
				<p align="justify">Permets de saisir les disponibilités de l'employé selon les semaines données.  La personne doit saisir une disponibilité de plus de trois heures
					au minimum par quart de travail et un minimum de 12 heures doit être placé sur la grille des disponibilités s'il désire que ses heures choisies soient
					validées.
				</p>

				<ul>
					<ol><FONT size="4" COLOR="red">Descriptifs de la page saisie des disponibilités</FONT></ol>
				
					<ol><strong>1.</strong>Le calendrier des jours permet à la personne connectée d'inscrire en cliquant ou en laissant son doigt appuyé sur la souris, les heures
						qu'ils désirent faire selon la journée choisit.</ol>
						
					<ol><strong>2.</strong>La liste déroulante permet de choisir la semaine aux quel on veut faire référence pour choisir les disponibilités voulues.  Il est
						possible de vérifier avec cette liste les cinq semaines précédentes, pour qu'ainsi la personne connectée puisse consulter les heures qu'il avait faites.
						À noter que la semaine qui est par défaut dans la liste est toujours celle en cours.</ol>
						
					<ol><strong>3.</strong>Le champ "nombre d'heures désiré" est mis pour que la personne entre le nombre d'heures qu'il veut faire (en chiffre) selon la
							semaine choisit.</ol>
					
					<ol><strong>4.</strong> Le champ "Répéter pour" permet à la personne qui veut répéter les disponibilités qu'il a inscrites pour une semaine de le faire
							pour le nombre de semaines qu'il désire.</ol>
						
					<ol><strong>5. Le bouton "Envoyer"</strong> permet de conserver les disponibilités entrées sur le calendrier dans la base de données.</ol>
					
					<ol><strong>6. Le bouton "Vider"</strong> Le bouton "Vider" permet d'effacer toutes les disponibilités d'un seul clic, qui sont inscrites sur le calendrier.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>

			<h4 id="echange">Page gestion des échanges</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
				<p align="justify">Page qui contient toutes les plages horaires que l'utilisateur a pour la semaine en cours.  Si un employé veut être remplacé à un moment
					précis de la semaine, c'est dans cette page qu'il peut le faire en cochant la case à cocher qu'il y a à côté de la plage horaire qu'il veut échangé.  Ainsi,
					dans la page d'accueil, la plage horaire que la personne aura cochée sera présente et prête à être choisi par un autre employé qui désire faire plus d'heures.
				</p>


				<ul>
					<ol><strong>1.</strong> Le nom de la journée de la semaine encours où la personne à un quart de travail qu'il désire échanger est présente.</ol>
					
					<ol><strong>2.</strong> Le quart de travail que la personne a, pour la journée de la semaine encours est présent dans la demande.</ol>
					
					<ol><strong>3.</strong> La case à cocher qui est présente à la droite complètement de la demande, qui lorsque l'employé clique à l'intérieur et qu'il se
							déconnecte et se reconnecte par la suite, n'aura plus accès dans la page gestion des échanges à la plage de travail qu'il avait coché, car elle est
							dorénavant visible que par les autres employés dans l'accueil du site.   Ainsi les autres employés verront le quart de travail que l'employé voulant
							être remplacé avait coché être présent et prêt à être choisi par celui qu'il le désire dans l'accueil du site.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>
			
			<h4 id="gestionCompte">Page gestion du compte</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
			<p align="justify">Page qui permet aux employés de modifier leurs informations personnelles sur le site.  Tout ce qui est en rapport avec des informations que
				l'entrepreneur aurait besoin (le numéro de téléphone de la personne par exemple) et également des informations que la personne veuille changer
				(le mot de passe, adresse, etc.).
			</p>

			<ul>
				<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion du compte</FONT></ol>
				
				<ol><strong>1.</strong> Cette page contient les informations vous concernant que l'employeur a besoin, à remarquez que les deux champs qui doivent
							absolument contenir des informations sont nom et prénom qui sont marqué par une étoile à leur droite.</ol>
				
				<ol><strong>2.</strong> Une liste déroulante qui contient cinq choix qui permet d'identifier la manière dont il est possible de rejoindre la personne
							et qui comporte les options suivantes: cellulaire, domicile, école, bureau et autre.</ol>
				
				<ol><strong>3. Le bouton "-"</strong> permet d'enlever le numéro de téléphone de la personne si pour une raison ou une autre elle ne veut plus qu'on la contacte à ce
					numéro.</ol>
					
				<ol><strong>4. Le bouton "+"</strong> permet d'ajouter un nouveau numéro de téléphone.</ol>
				
				<ol><strong>5.</strong> La case à cocher "Notifications courriel pour les nouveaux horaires" permet à l'employer connecter de recevoir une notification par
							courriel quand un nouvel horaire est générer.</ol>
				
				<ol><strong>6.</strong> La case à cocher "Notifications pour tous les remplacements" permet à l'employer connecter de recevoir une notification par courriel
							pour tous les remplacements demandés.</ol>
				
				<ol><strong>7. Le bouton "Envoyer"</strong> permet d'enregistrer les données que la personne aura remplies ou changer dans la base de données.</ol>
			</ul>

		</div>
	</div>
@stop