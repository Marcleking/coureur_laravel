<li><a href="{{ Route('index') }}"><i class="fa fa-home fa-2x"></i> Accueil ({{ Auth::User()->type }})</a></li>
<hr />
<li><a href="{{ Route('message') }}"><i class="fa fa-envelope fa-2x"></i> Message</a></li>
<hr />
@if (Auth::User()->type == "Gestionnaire")
	<li><a href="{{ Route('message.send') }}"><i class="fa fa-envelope fa-2x"></i> Envoyer un message</a></li>
	<hr />
@endif
<li><a href="{{ Route('document') }}"><i class="fa fa-folder fa-2x"></i> Documents</a></li>
<hr />
<li><a href="{{ Route('horaire') }}"><i class="fa fa-calendar fa-2x"></i> Affichage d’un horaire</a></li>
<hr />
<li><a href="{{ Route('dispo') }}"><i class="fa fa-clock-o fa-2x"></i> Saisie des disponibilités</a></li>
<hr />
<li><a href="{{ Route('gestion.compte') }}"><i class="fa fa-cogs fa-2x"></i> Gestion du compte</a></li>
<hr />
@if (Auth::User()->type == "Gestionnaire")
	<li><a href="{{ Route('gestion.comptes') }}"><i class="fa fa-users fa-2x"></i> Gestion des comptes</a></li>
	<hr />
	<li><a href="{{ Route('ressource') }}"><i class="fa fa-users fa-2x"></i> Ressources</a></li>
	<hr />
@endif
<li><a href="{{ Route('logout') }}"><i class="fa fa-cogs fa-2x"></i> Deconnexion</a></li>