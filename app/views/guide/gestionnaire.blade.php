@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Guide du gestionnaire</h3>
		<div class="panel">
			<h4 id="accueilMenu">Page d'accueil et menu</h4>
				<h5><FONT COLOR="red">Contenus et but</FONT></h5>
				<p align="justify">
					La page d'accueil contient les derniers messages envoyés par les gestionnaires, ainsi que les remplacements qui n'ont pas été comblés
					et qui sont demandés par les utilisateurs du site.  Il est possible à partir de la page d'accueil d'accepter la plage de travail pour 
					laquelle un employé veut se départir dans la section "Remplacements".  Le but de cette page et de pouvoir vérifier de la façon la plus
					simple possible les messages et remplacements qui sont demandés sur le site.
				</p>
			
			<hr width="790px">
			<br></br>
			
			<h4>Menu sur la gauche</h4>
				<h5><FONT COLOR="red">Présentation des onglets du menu sur la gauche</FONT></h5>
				<p></p>
			
				<ul text="center">
					<ol><strong>Accueil</strong> : Onglet du menu qui permet de revenir à la page d'accueil du site, si l'employé se trouve dans cette même page
						ou dans une autre.  Vous remarquerez que le type d'employé connecté est inscrit à la droite du lien accueil du menu sur le côté gauche.</ol>

					<ol><strong>Message</strong> : Onglet du menu qui permet d'avoir accès à la page de consultation de tous les nouveaux et anciens messages qui
						ont été envoyés par les gestionnaires.</ol>
						
					<ol><strong>Envoyer un message</strong> : Onglet du menu qui permet d'avoir accès à la page envoyer message.</ol>					

					<ol><strong>Documents</strong> : Onglet du menu qui permet d'avoir accès à la page des documents.</ol>
					
					<ol><strong>Affichage d'un horaire</strong> : Onglet du menu qui mène à la page qui permet de consulter l'horaire courant du gestionnaire connecté.</ol>

					<ol><strong>Saisie des disponibilités</strong> : Onglet du menu qui mène à la page de saisie des disponibilités.</ol>

					<ol><strong>Gestion des échanges</strong> : Onglet du menu qui mène à la page des échanges de quart de travail.</ol>
				
					<ol><strong>Gestion du compte</strong> : Onglet du menu qui mène à la page de modification des informations de l'utilisateur courant.</ol>
					
					<ol><strong>Gestion des comptes</strong> : Onglet du menu qui mène à la page permettant d'ajouter, de supprimer un employé ou de consulter les
						informations non confidentielles de l'employé.</ol>
					
					<ol><strong>Ressources</strong> : Onglet du menu qui mène à la page permettant de paramétrer les ressources qui seront nécessaires pour une journée
						ou une semaine donnée.</ol>
				
					<ol><strong>Déconnexion</strong> : Onglet du menu qui permet à l'utilisateur courant de se déconnecter.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>
			
			<h4>Page d'accueil</h4>
				<h5><FONT COLOR="red">But des onglets</FONT></h5>
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
					<p align="justify">Tous les messages non supprimés par les gestionnaires sont stockés dans la page message.  Cette page peut contenir jusqu'à
						un maximum de 10 messages, si ce nombre est dépassé un bouton suivant et un bouton précédent apparaissent pour permettre de
						changer de page et ainsi 10 autres messages apparaitront.
					</p>
					
					<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page des messages</FONT></ol>
						
						<ol><strong>1.</strong> Le titre du message apparait à la gauche du message créé.</ol>
						
						<ol><strong>2.</strong> Le nom d'utilisateur (adresse courriel) du gestionnaire qui a envoyé le message est présent à la droite complètement
							du titre (exemple@gmail.com).</ol>
							
						<ol><strong>3.</strong> Lorsqu'un message est cliqué, plusieurs informations, ainsi	que l'option supprimée apparaitront.</ol>
						
						<ol><strong>4.</strong> La date ainsi que l'heure de l'envoi du message sont présentes en haut à droite du message.</ol>
						
						<ol><strong>5.</strong> Le contenu du message est présent en dessous du titre.</ol>
						
						<ol><strong>6.</strong> Le bouton "Supprimer" permet de supprimer le message de la page et de l'enlever de l'accueil si ce dernier était présent.</ol>
					</ul>
					
			<hr width="790px">
			<br></br>
			
			<h4 id="envoyer">Page envoyer message</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Cette page permet d'envoyer un message qui sera visible par tous les gestionnaires et employés du site web.  Il est important de 
						savoir que seul un gestionnaire peut envoyer des messages sur le site web.
					</p>
					
					<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page envoyer message</FONT></ol>
						
						<ol><strong>1. Titre</strong>: Ce champ permet d'inscrire le titre du message que vous voulez envoyer.  Ce champ est obligatoire(*) si vous désirez
							envoyer votre message, dans le cas où vous omettez de mettre un titre, un avertissement s'inscrira en haut de la page pour vous informer que vous
							devez mettre un titre.  À noter qu'il est impératif d'inscrire du texte dans les deux champs ici présent, titre et message si vous voulez envoyer
							votre message.</ol>
						
						<ol><strong>2. Message</strong>: Ce champ vous permet d'inscrire le contenu du message que vous désirez envoyer.  Si vous omettez d'inscrire du texte
							dans ce champ, un avis d'avertissement apparaitra lors due clique sur le bouton envoyer, pour vous avertir que vous devez entrer du texte dans ce
							champ pour pouvoir envoyer le message.  À noter qu'il est impératif d'inscrire du texte dans les deux champs ici présent, titre et message si vous
							voulez envoyer votre message.</ol>
							
						<ol><strong>3. Le bouton "Envoyer":</strong> Permets d'envoyer le message que vous avez inscrit plus haut.  Si un élément a été omis (titre ou message
							et même titre et message), un message d'avertissement apparaitra pour vous avertir de mettre un titre ou un message.  Si vous avez mis du contenu
							dans le titre et dans le message, vous serez envoyé dans la page message et un avis vous disant que le message à bien été envoyer vous sera transmis.</ol>
					</ul>
					
			<hr width="790px">
			<br></br>
			
			<h4 id="document">Page documents</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Page qui permet de créer et de supprimer des documents ainsi que d'ajouter et de supprimer des fichiers de formation qui seront accessibles
					à tous les employés.  Seuls  les gestionnaires peuvent ajouter et supprimer des dossiers et des fichiers.  Cette page permet aux utilisateurs du site de
					consulter les fichiers (de formation par exemple) que les gestionnaires envoient sur le site.
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
						
						<ol><strong>4.</strong> Les fichiers qui ont été créés sont identifiés par un petit fichier entouré d'un carré cliquable.  Lors due clique sur un des fichiers,
							la personne verra une boite de dialogue apparaitre à l'écran et aura l'option d'ouvrir ou enregistrer le fichier qu'il désire consulté.</ol>
						
						<ol><strong>5. Le bouton "Supprimer"</strong> permet de détruire les dossiers et fichiers qui sont présents sur la page.</ol>
						
						<ol><strong>6.</strong> Le chiffre qui est présent sur le bouton de téléchargement correspond au nombre de fois que le fichier a été consulté.  Le bouton
							"téléchargement" vous permet de connaitre le nom d'utilisateur, ainsi que la date de la consultation de la personne qui a téléchargé le fichier. </ol>
						
						<ol><strong>7.</strong> Le champ en dessous de "créer un nouveau dossier" vous permet d'inscrire le nom que vous désirez mettre au dossier que vous voulez
							ajouter.</ol>
						
						<ol><strong>8. Le bouton "Créer un dossier"</strong> ajoute un nouveau dossier dans la page document avec le nom que vous avez entré dans le champ
							"Créer un nouveau dossier".</ol>
						
						<ol><strong>9. Le bouton "Parcourir"</strong> vous permet d'aller chercher le fichier sur votre ordinateur que vous désirez partager sur la page
							document.</ol>
						
						<ol><strong>10. Le bouton "Ajouté le fichier"</strong> permet d'importer le fichier dans la page document.</ol>
					</ul>
					
			<hr width="790px">
			<br></br>
					
			<h4 id="affichageHoraire">Page affichage d'un horaire</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Cette page permet de générer l'horaire.  L'employé ou le gestionnaire connecté peut voir selon la journée de la semaine les heures qu'il
						fera et dans quel secteur du magasin (chaussure, vêtement ou caisse) il fera son quart de travail. 
					</p>
				
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page affichage d'un horaire</FONT></ol>
						
						<ol><strong>1.</strong> Bouton "Générer l'horaire" permet de générer l'horaire selon les ressources qui ont été entrées ainsi que les disponibilités qui
							ont été saisies par les utilisateurs.</ol>
						
						<ol><strong>2.</strong> Code de couleur présenter sous le bouton "Générer l'horaire" identifiant les différents secteurs de l'entreprise soit: les
							chaussures (en rouge), les vêtements (en vert) et la caisse (en bleu).</ol>
							
						<ol><strong>3.</strong> Lors due clique sur l'un des sept jours de la semaine, vous pouvez voir, votre plage de travail selon la journée choisit.</ol>
						
						<ol><strong>4.</strong> La ligne qui est présente au niveau du premier graphique correspond au quart de travail de la personne.  Il est facile de trouver
							dans quel département travaille l'employé puisque le code de couleur correspond au département dans lequel l'employé travaillera et sur l'horaire de la
							personne son quart de travail est identifié par cette couleur.</ol>
						
						<ol><strong>5.</strong> L'horaire est affiché sur les sept jours de la semaine, grâce à un graphique qui montre les plages de travail de l'employé, de
							cette manière il est plus facile pour l'employé ou pour le gestionnaire de se situer sur les heures qu'il fera durant la semaine.</ol>
				</ul>
				
			<hr width="790px">
			<br></br>
				
			<h4 id="saisieDisponibilite">Page saisie des disponibilités</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Permets de saisir les disponibilités de l'employé selon les semaines données.  La personne doit saisir une disponibilité de plus de trois
						heures au minimum par quart de travail et un minimum de 12 heures doit être placé sur la grille des disponibilités s'il désire que ses heures choisies
						soient validées. 
					</p>
					
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page saisie des disponibilités</FONT></ol>
						
						<ol><strong>1.</strong> Le calendrier des jours permet à la personne connectée d'inscrire en cliquant ou en laissant son doigt appuyé sur la souris, les
							heures qu'ils désirent faire selon la journée choisit.</ol>
						
						<ol><strong>2.</strong> La liste déroulante permet de choisir la semaine aux quel on veut faire référence pour choisir les disponibilités voulues.  Il est
							possible de vérifier avec cette liste les cinq semaines précédentes, pour qu'ainsi la personne connectée puisse consulter les heures qu'il avait faites.
							À noter que la semaine qui est par défaut dans la liste est toujours celle en cours.</ol>
							
						<ol><strong>3.</strong> Le champ "nombre d'heures désiré" est mis pour que la personne entre le nombre d'heures qu'il veut faire (en chiffre) selon la
							semaine choisit.</ol>
						
						<ol><strong>4.</strong> Le champ "Répéter pour" permet à la personne qui veut répéter les disponibilités qu'il a inscrites pour une semaine de le faire
							pour le nombre de semaines qu'il désire.</ol>
						
						<ol><strong>5. Le bouton "Envoyer"</strong> permet de conserver les disponibilités entrées sur le calendrier dans la base de données.</ol>
						
						<ol><strong>6. Le bouton "Vider"</strong> Le bouton "Vider" permet d'effacer toutes les disponibilités d'un seul clic, qui sont inscrites sur le
							calendrier.</ol>
				</ul>
			
			<hr width="790px">
			<br></br>
				
			<h4 id="echange">Page gestion des échanges</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Pages qui contiennent toutes les plages horaires que l'utilisateur a pour la semaine en cours.  Si un employé veut être remplacé à un moment
						précis de la semaine, c'est dans cette page qu'il peut le faire en cochant la case à cocher qu'il y a à côté de la plage horaire qu'il veut échangé.  Ainsi,
						dans la page d'accueil, la plage horaire que la personne aura cochée sera présente et prête à être choisi par un autre employé qui désire faire plus
						d'heures.
					</p>
					
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion des échanges</FONT></ol>
						
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
					<p align="justify">Page qui permet aux employés de modifier leurs informations personnelles sur le site.  Tout ce qui est en rapport avec des informations
						que l'entrepreneur aurait besoin (le numéro de téléphone de la personne par exemple) et également des informations que la personne veuille changer
						(le mot de passe, adresse, etc.).
					</p>
					
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion du compte</FONT></ol>
						
						<ol><strong>1.</strong> Cette page contient les informations vous concernant que l'employeur a besoin, à remarquez que les deux champs qui doivent
							absolument contenir des informations sont nom et prénom qui sont marqué par une étoile à leur droite.</ol>
						
						<ol><strong>2.</strong> Une liste déroulante qui contient cinq choix qui permettent d'identifier la manière dont il est possible de rejoindre la personne
							et qui comporte les options suivantes: cellulaire, domicile, école, bureau et autre.</ol>
							
						<ol><strong>3. Le bouton "-"</strong> permet d'enlever le numéro de téléphone de la personne si pour une raison ou une autre elle ne veut plus qu'on la
							contacte à ce numéro.</ol>
						
						<ol><strong>4. Le bouton "+"</strong> permet d'ajouter un nouveau numéro de téléphone.</ol>
						
						<ol><strong>5.</strong> La case à cocher "Notifications courriel pour les nouveaux horaires" permet à l'employer connecter de recevoir une notification par
							courriel quand un nouvel horaire est générer.</ol>
						
						<ol><strong>6.</strong> La case à cocher "Notifications pour tous les remplacements" permet à l'employer connecter de recevoir une notification par courriel
							pour tous les remplacements demandés.</ol>
						
						<ol><strong>7.</strong> Le bouton "Envoyer" permet d'enregistrer les données que la personne aura remplies ou changer dans la base de données.</ol>
				</ul>
				
			<hr width="790px">
			<br></br>
				
			<h4 id="comptes">Page gestion des comptes</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Contiens la liste de tous les comptes des employés et gestionnaires du site.  Lors due clique sur une des lignes de la liste, les
						informations en ce qui concerne l'employé apparaissent juste en dessous de son nom et deux boutons sont présent à la droite complètement des informations
						de l'employé, le premier "Modifier" et le deuxième "Supprimer".
					</p>
					
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion des comptes</FONT></ol>
						
						<ol><strong>1.</strong> Le nom de l'employer est présent dans la liste.</ol>
						
						<ol><strong>2.</strong> Certains employés ont à la droite complètement de leur nom, une petite clé qui permet de différencier ceux qui ont en leur possession
							la clé du magasin.</ol>
						
						<br></br>
							
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion des comptes lors due clique sur un élément de la liste</FONT></ol>
							
						<ol><strong>3. Le bouton "Ajout d'un utilisateur"</strong> lors due clique, mène à la page qui permet d'ajouter un utilisateur sur le site.</ol>
						
						<ol><strong>4.</strong> Information sur l'employé, son nom, courriel, son type et sa formation.</ol>
						
						<ol><strong>5. Le bouton "Modifier"</strong> permet d'accéder à la page de modification du compte.</ol>
						
						<ol><strong>6. Le bouton supprimer</strong>, permet d'effacer le compte de la personne choisit.</ol>
						
						<br></br>
						
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion des comptes lors due clique sur le bouton "Modifier"</FONT></ol>
						
						<ol><strong>7.</strong> Le nom et le prénom de l'employé qui sont obligatoires sont présents sur la page.</ol>
						
						<ol><strong>8.</strong> Il y a une liste déroulante permettant de connaitre le type d'employé. Deux choix s'offrent à vous, soit il est un employé ou soit
							il est un gestionnaire.</ol>
						
						<ol><strong>9.</strong> Une case à cocher "Notifications courriel pour les nouveaux horaires" permet à la personne de recevoir des notifications par
							courriel quand un nouvel horaire est créé.</ol>
						
						<ol><strong>10.</strong> Une case à cocher "Notifications pour tous les remplacements" permet à la personne de recevoir des notifications pour tous les
							remplacements.</ol>
						
						<ol><strong>11.</strong> Les trois cases à cocher "Vêtement", "Chaussure" et "Caissier" permettent de savoir quelle formation l'employé a dans le magasin.
							Il est possible qu'il puisse avoir une, deux ou même toutes les formations.</ol>
						
						<ol><strong>12.</strong> Le champ "Indice de priorité (1-10)" permet de savoir l'indice de priorité de l'employé sur 10.</ol>
						
						<ol><strong>13.</strong> Le champ "Heure minimum" correspond aux heures minimums que peut faire l'employé.</ol>
						
						<ol><strong>14.</strong> Le champ "Heure maximum" correspond aux heures maximums que peut faire l'employé.</ol>
						
						<ol><strong>15.</strong> La case à cocher "Possesseur d'une clé" permet de savoir si l'employé possède la clé du magasin.</ol>
						
						<ol><strong>16.</strong> Permets de savoir si l'employé est le responsable des conflits d'horaire.</ol>
						
						<ol><strong>17. Le bouton "Envoyer"</strong> valide lors du clic si tous les éléments ont bien été remplis.</ol>
						
						<br></br>
						
						<ol><FONT size="4" COLOR="red">Descriptifs de la page gestion des comptes lors due clique sur le bouton "Ajout d'un utilisateur"</FONT></ol>
						
						<ol><strong>1.</strong> Divers Champs sont à remplir pour ajouter un nouvel utilisateur, il n'est pas nécessaire de remplir tous les champs.
							Seuls le courriel et le type d'employé doivent être remplis pour pouvoir créer un nouvel utilisateur.</ol>
						
						<ol><strong>2. Le bouton "Envoyer"</strong> permet d'enregistrer dans la base de données les informations que vous inscrivez dans les différents champs.</ol>
				</ul>
				
			<hr width="790px">
			<br></br>
			
			<h4 id="ressource">Page ressource</h4>
				<h5><FONT COLOR="red">Contenus</FONT></h5>
					<p align="justify">Cette page permet d'ajouter les ressources nécessaires pour une semaine, selon le jour de la semaine et les heures d'ouverture de la journée
						choisies.
					</p>
					
				<ul>
						<ol><FONT size="4" COLOR="red">Descriptifs de la page ressource</FONT></ol>
						
						<ol><strong>1.</strong> Une liste déroulante contenant les noms des groupes qui ont les ressources de la semaine est présente sur cette page.  Lors du clic
							dans la liste déroulante sur le nom d'un groupe, les données qui avaient été entrées pour ce groupe apparaitront ou pourront être modifiées.</ol>
						
						<ol><strong>2.</strong> Le champ "Nom du groupe" permet de mettre un nom de groupe qui sera associé aux ressources entrées.</ol>
						
						<ol><strong>3.</strong> Le champ "Description" permet d'ajouter une description pour une ressource créée.</ol>
						
						<ol><strong>4.</strong> La case à cocher "Actif" qui lorsque cocher, permet de valider que ce sera la ressource qui a été sélectionnée qui sera utilisé pour
							la semaine.</ol>
						
						<ol><strong>5. Le bouton "Ajouter"</strong> permet d'enregistrer une nouvelle ressource (nom du groupe et description) dans la base de données.</ol>
						
						<ol><strong>6. Le bouton "Modifier"</strong> permet de changer la description ou le nom qui avait été saisi et ce changement sera aussi fait dans la base de données.</ol>
						
						<ol><strong>7. Le bouton "Supprimer"</strong> permet d'effacer la ressource sur la page et dans la base données.</ol>
						
						<ol><strong>8.</strong> Un calendrier qui montre les heures d'ouverture selon les jours où des ressources seront nécessaires pour la semaine en cours.</ol>
						
						<ol><strong>9.</strong> Une liste déroulante contenant les sept jours de la semaine.</ol>
						
						<ol><strong>10.</strong> Le champ "Heure de début" permet d'entrer l'heure d'ouverture du magasin selon la journée choisie.</ol>
						
						<ol><strong>11.</strong> Le champ "Heure de fin" permet d'entrer l'heure de fermeture du magasin selon la journée choisie.</ol>
						
						<ol><strong>12.</strong> Le champ "Nombre d'employés chaussure" permet d'inscrire le nombre de personnes qui seront nécessaires pour travailler dans les
							chaussures pour la journée choisie.</ol>
						
						<ol><strong>13.</strong> Le champ "Nombre d'employés vêtements" permet d'inscrire le nombre de personnes qui seront nécessaires pour travailler dans les
							chaussures pour la journée choisie.</ol>
						
						<ol><strong>14.</strong> Le champ "Nombre d'employés caisse" permet d'inscrire le nombre de personnes qui seront nécessaires pour travailler dans les
							chaussures pour la journée choisie.</ol>
						
						<ol><strong>15. Le bouton "Ajouter"</strong> permet de faire l'ajout de ressources qui ont été inscrites dans les champs: "Heure de début", "Heure de fin",
							"Nombre d'employés chaussure", "Nombre d'employés vêtements" et "Nombre d'employés caisse" par rapport à la journée qui a été choisi dans la liste
							déroulante dans le calendrier et dans la base de données, mais il est important de cliquer sur le bouton enregistré si vous désirez que les changements
							soient effectifs.</ol>
						
						<ol><strong>16. Le bouton "Enregistrer"</strong> permet de sauvegarder les changements dans la base de données.</ol>
				</ul>			
		</div>
	</div>
@stop