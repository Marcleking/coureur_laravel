@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Guide de l'employé</h3>
		<div class="panel">
			<h4>Page d'accueil et menu</h4>
			<p>La page d'accueil contient les derniers messages envoyés par les gestionnaires, ainsi que les remplacements qui n'ont pas été comblés et qui sont demandés par les utilisateurs du site.  Il est possible à partir de la page d'accueil d'accepter la plage de travail pour laquelle un employé veut se départir dans la section "Remplacements".</p>

			<h4>Menu sur la gauche</h4>
			<ul>
				<ol><strong>1. Accueil</strong>: Onglet du menu qui permet de revenir à la page d'accueil du site, si l'employé se trouve dans cette même page ou dans une autre.  Vous remarquerez que le type d'employé connecté est inscrit à la droite du lien accueil du menu sur le côté gauche.</ol>

				<ol><strong>2. Message</strong>: Onglet du menu qui permet d'avoir accès à la page de consultation de tous les nouveaux et anciens messages qui ont été envoyés par les gestionnaires.</ol>

				<ol><strong>3. Documents</strong>: Onglet du menu qui permet d'avoir accès à la page des documents.</ol>
			
				<ol><strong>4. Affichage</strong> d'un horaire: Onglet du menu qui mène à la page qui permet de consulter l'horaire courant de l'employé connecté.</ol>

				<ol><strong>5. Saisie des disponibilités</strong> : Onglet du menu qui mène à la page de saisie des disponibilités.</ol>

				<ol><strong>6. Gestion des échanges</strong> : Onglet du menu qui mène à la page des échanges de quart de travail.</ol>
			
				<ol><strong>7. Gestion du compte</strong> : Onglet du menu qui mène à la page de modification des informations de l'utilisateur courant.</ol>
			
				<ol><strong>Déconnexion</strong>: Onglet du menu qui permet à l'utilisateur courant de se déconnecter.</ol>
			</ul>

			<h5>Page d'accueil</h5>
			<ul>
				<ol><strong>9. Messages</strong>: Les derniers messages envoyés par le gestionnaire sont présents sur la page d'accueil.  S'il n'y a aucun message, une inscription vous en informera.</ol>
				<ol><strong>10. Remplacements</strong>: Les remplacements de la semaine en cours qui sont demandés par les utilisateurs du site sont présents sur la page d'accueil.  Un message vous informant qu'il n'y a pas de remplacement demandé est visible sur la page d'accueil, si aucune demande n’a été émise.</ol>
			</ul>


			<hr>
			<br>




			<ul>
				<ol><strong>1.</strong> Corresponds à la journée demandée par la personne et les heures pour lesquelles la personne veut être remplacée.</ol>
				<ol><strong>2.</strong> Le nom d'utilisateur de la personne qui demande à être remplacée.</ol>
				<ol><strong>3.</strong> S'il y a des remplacements qui ont été demandés et que vous désirez remplacer la personne qui fait la demande, vous pourrez le faire en cliquant si le bouton "Confirmer".</ol>
				<ol><strong>4.</strong> Si vous changez d'avis, vous n'aurez qu'à cliquer sur le bouton "Annuler".</ol>
			</ul>





			<ul>
				<ol><strong>1.</strong> Voici l'avis qui sera inscrit lorsqu'il n'y aura aucun message à consulter dans la page d'accueil.</ol>
			</ul>
			




			<ul>
				<ol><strong>1. </strong>Voici l'avis qui sera inscrit lorsqu'il n'y aura aucun remplacement d'émis dans la page d'accueil.</ol>
			</ul>








			<h4>Page messages</h4>
			<p>Tous les messages non supprimés par les gestionnaires sont stockés dans la page message.  Cette page peut contenir jusqu'à un maximum de 10 messages, si ce nombre est dépassé un bouton suivant et un bouton précédent apparaissent pour permettre de changer de page et ainsi 10 autres messages apparaitront.</p>

			<ul>
				<ol><strong>1.</strong> Les titres des deux messages ici sont "Bienvenue" et "Message".</ol>
				<ol><strong>2.</strong> Le nom d'utilisateur (adresse courriel) du gestionnaire qui a envoyé le message est présent à la droite complètement du titre (exemple@gmail.com).</ol>
			</ul>




			<ul>
				<ol><strong>1. </strong>Lors due clique sur une des lignes de la liste des messages que vous désirez consulté, plusieurs informations, ainsi que l'option supprimée apparaitront.</ol>
				<ol><strong>2. </strong>La date ainsi que l'heure de l'envoi du message sont présentes en haut à droite du message.</ol>
				<ol><strong>3. </strong>Le contenu du message est présent en dessous du titre, comme montrer sur l'image ci-dessus.  Le contenu dans le cas présent est "Voici le contenu du message".</ol>
			</ul>



			<ul>
				<ol><strong>1. </strong>Si aucun message n'est présent dans la page message, une inscription vous avertissant qu'il n'y a pas de message apparait, comme figurer sur l'image plus haut.</ol>
			</ul>






			
			<h4>Page documents</h4>
			<p>Cette page permet aux utilisateurs du site du consulter les fichiers (des fichiers de formation par exemple) que les gestionnaires envoient sur le site.</p>

			<ul>
				<ol><strong>1. </strong>Emplacement: Corresponds à l'endroit (chemin) où vous êtes situé dans les dossiers.  Donc, si vous pressez sur le premier dossier le chemin qui sera inscrit est "Emplacement: formation/Deux".</ol>
				<ol><strong>2. </strong>Permets de revenir au dossier parent.  Dans le cas, où vous revenez dans le dossier précèdent, "Emplacement" changera.  Si nous reprenons, l'exemple précèdent, lors due clique sur le bouton, le chemin du dossier serait maintenant "Emplacement: formation/".</ol>
				<ol><strong>3. </strong>Corresponds aux dossiers qui ont été créés par l'utilisateur.  Lors due clique sur un des dossiers, l'employé ou le gestionnaire sera automatiquement dirigé à l'intérieur du dossier pour pouvoir consulté les fichiers ou autres dossiers qui y sont contenus.</ol>
				<ol><strong>4. </strong>Corresponds au fichier que les gestionnaires aient créés, la personne qui clique sur le fichier verra une boite de dialogue apparaitre à l'écran et aura l'option d'ouvrir ou d'enregistrer le fichier qu'il désire consulté.</ol>
			</ul>









			<h4>Page affichage d'un horaire</h4>
			<p>Cette page permet de consulter l'horaire de la semaine.  L'employé connecté peut voir selon la journée de la semaine les heures qu'ils feront et dans quel secteur, du magasin (chaussure, vêtement ou caisse) il fera son quart de travail.</p>

			<ul>
				<ol><strong>1. </strong>Code de couleur identifiant les différents secteurs de l'entreprise soit: les chaussures (en rouge), les vêtements (en vert) ou la caisse (en bleu).</ol>
				<ol><strong>2. </strong>Horaire de la personne, montrer sur les sept jours de la semaine (du dimanche au samedi).  La personne connectée peut ainsi voir sur toute la semaine dans quel département il va travailler selon le code de couleur qui est montré au point 1 et le quart de travail qu'il fera.</ol>
			</ul>
			


			<h4>Page saisie des disponibilités</h4>
			<p>Permets de saisir les disponibilités de l'employé selon les semaines données.  La personne doit saisir une disponibilité de plus de trois heures au minimum par quart de travail et un minimum de 12 heures doit être placé sur la grille des disponibilités s'il désire que ses heures choisies soient validées.</p>

			<ul>
				<ol><strong>1. </strong>Le calendrier des jours permet à la personne connectée d'inscrire en cliquant ou en laissant son doigt appuyé sur la souris, les heures qu'ils désirent faire selon la journée choisit.</ol>
				<ol><strong>2. </strong>La liste déroulante permet de choisir la semaine aux quel on veut faire référence pour choisir les disponibilités voulues.  Il est possible de vérifier avec cette liste les cinq semaines précédentes, pour qu'ainsi la personne connectée puisse consulter les heures qu'il avait faites.  À noter que la semaine qui est par défaut dans la liste est toujours celle en cours.</ol>
				<ol><strong>3. </strong>Ce champ est mis pour que la personne entre le nombre d'heures qu'il veut faire (en chiffre) selon la semaine choisit.</ol>
				<ol><strong>4. </strong>Permets à la personne qui veut répéter les disponibilités qu'il a inscrites pour une semaine donnée de les répéter pour les semaines à venir.</ol>
				<ol><strong>5. </strong>Le bouton "Envoyer" permet de conserver les disponibilités entrées sur le calendrier dans la base de données.  Si les entrées sont correctement inscrites vous verrez un avertissement, dans le haut de la page, qui vous confirmera que les informations ont été entrer avec succès:


				Si par contre un détail devait manqué, un message dans le haut de la page vous dira ce qu'il manque pour que les disponibilités soient acceptées:
				</ol>
				<ol><strong>6. </strong>Le bouton "Vider" permet d'effacer toutes les disponibilités d'un seul clic, qui sont inscrites sur le calendrier.</ol>
			</ul>
			
			


			<h4>Page gestion des échanges</h4>
			<p>Pages qui contiennent toutes les plages horaires que l'utilisateur a pour la semaine en cours.  Si un employé veut être remplacé à un moment précis de la semaine, c'est dans cette page qu'il peut le faire en cochant la case à cocher qu'il y a à côté de la plage horaire qu'il veut échangé.  Ainsi, dans la page d'accueil, la plage horaire que la personne aura cochée sera présente et prête à être choisi par un autre employé qui désire faire plus d'heures.</p>


			<ul>
				<ol><strong>1. </strong>Correspond à la journée de la semaine encours où la personne à un quart de travail.</ol>
				<ol><strong>2. </strong>Quart de travail que la personne a pour la journée de la semaine encours.</ol>
				<ol><strong>3. </strong>Case à cocher qui lorsque l'employé clique à l'intérieur et qu'il se déconnecte et se reconnecte par la suite, n'aura plus accès dans la page gestion des échanges à la plage de travail qu'il avait coché, car elle est dorénavant visible que par les autres employés dans l'accueil du site.   Ainsi les autres employés verront le quart de travail que l'employé voulant être remplacé avait coché être présent et prêt à être choisi par celui qu'il le désire dans l'accueil du site.</ol>
			</ul>
			
			
			<h4>Page gestion du compte</h4>
			<p>Page qui permet aux employés de modifier leurs informations personnelles sur le site.  Tout ce qui est en rapport avec des informations que l'entrepreneur aurait besoin (le numéro de téléphone de la personne par exemple) et également des informations que la personne veuille changer (le mot de passe, adresse, etc.).</p>




			<ul>
				<ol><strong>1. </strong>Les informations que l'employeur à besoin sont identifier à cet endroit, à remarquez que les deux champs qui doivent absolument contenir des informations sont nom et prénom qui sont marqué par une étoile à leur droite.  Bien entendu si vous inscrivez quelque chose dans le champ "Ancien mot de passe" et que vous vous trompez un avertissement dans le haut de la page apparaitra:</ol>
				<ol><strong>2. </strong>Liste déroulante à cinq choix qui permet d'identifier la manière dont il est possible de rejoindre la personne et qui comporte les options suivantes: cellulaire, domicile, école, bureau et autre. </ol>
				<ol><strong>3. </strong>Le bouton "-" permet d'enlever le numéro de téléphone de la personne si pour une raison ou une autre elle ne veut plus qu'on la contacte à ce numéro.</ol>
				<ol><strong>4. </strong>Le bouton "+" permet d'ajouter un nouveau numéro de téléphone.</ol>
				<ol><strong>5. </strong>Case à cocher qui permet à l'employer connecter de recevoir une notification par courriel quand un nouvel horaire est générer.</ol>
				<ol><strong>6. </strong>Case à cocher qui permet à l'employer connecter de recevoir une notification par courriel pour tous les remplacements demandés.</ol>
				<ol><strong>7. </strong>Le bouton "Envoyer" permet d'enregistrer les données que la personne aura remplies ou changer dans la base de données.  À noter, que si la personne à effacer les informations que contenait le champ nom et prénom et qu'il laisse vide les données que contenait ces deux champs une erreur ce produira:

				Le même type de message ce produit si la personne ne mes aucune information dans le champ prénom ou nom tout dépendant quel champ est vide.

				ou</ol>
			</ul>

		</div>
	</div>
@stop