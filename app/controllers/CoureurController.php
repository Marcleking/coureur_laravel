<?php

class CoureurController extends BaseController {

	public function index() {
		return View::make('index');
	}

	public function document() {
		return View::make('document');
	}

	public function horaire() {
		return View::make('horaire');
	}

	public function dispo() {
		return View::make('dispo');
	}

	public function gestionCompte() 
	{
        $user = UtilisateursModel::afficherUtilisateur(Auth::User()->id);
        $tels = UtilisateursModel::afficherTelehpone(Auth::User()->id);

        $lestel = "";
        for ($i = 0; $i < count($tels); $i++) {
            $tel = "<div class='row' id='tel".$i."'>";
            $tel .= "<div class='large-4 columns'>";
            $tel .= "<select id='typeTel".$i."' name='typeTel".$i."'>";

            if ($tels[$i]->description == "Cellulaire") {
                $tel .= "<option value='Cellulaire' selected>Cellulaire</option>";
            } else {
                $tel .= "<option value='Cellulaire'>Cellulaire</option>";
            }

            if ($tels[$i]->description == "Maison") {
                $tel .= "<option value='Domicile' selected>Domicile</option>";
            } else {
                $tel .= "<option value='Domicile'>Domicile</option>";
            }

            if ($tels[$i]->description == "École") {
                $tel .= "<option value='École' selected>École</option>";
            } else {
                $tel .= "<option value='École'>École</option>";
            }

            if ($tels[$i]->description == "Bureau") {
                $tel .= "<option value='Bureau' selected>Bureau</option>";
            } else {
                $tel .= "<option value='Bureau'>Bureau</option>";
            }

            if ($tels[$i]->description == "Autre") {
                $tel .= "<option value='Autre' selected>Autre</option>";
            } else {
                $tel .= "<option value='Autre'>Autre</option>";
            }

            $tel .= "</select>";
            $tel .= "</div>";

            $tel .= "<div class='large-4 columns left'>";
                $tel .= "<input type='text' id='tel".$i."' name='tel".$i."'".
                        "value='".$tels[$i]->noTelephone."' placeholder='Votre téléphone' />";
            $tel .= "</div>";
            $tel .= "<div class='large-4 columns left'>";
                $tel .= "<a id='telMoins".$i."' class='button small' onClick='suppTel(".$i.")'>".
                        "<i class='fa fa-minus'></i></a>";
            $tel .= "</div>";
            $tel .= "</div>";

            $lestel .= $tel;
        }

        $user->tel = $lestel;
        return View::make('gestion.compte')->withInfo($user);
	}

	public function gestionCompteSave()
	{

		$info = Input::all();

		$notifHoraire = 1;
        $notifRemplacement = 1;

        if (!isset($info['notifHoraire'])) {
            $notifHoraire = 0;
        }

        if (!isset($info['notifRemplacement'])) {
            $notifRemplacement = 0;
        }

        $success = false;

        if (empty($info['motdePasse']) && 
        	empty($info['ancienMotdePasse'])
        ) {
            $result = UtilisateursModel::modifierUtilisateur(
                trim($info['nom']),
                trim($info['prenom']),
                null,
                null,
                Auth::User()->id,
                trim($info['numeroCiv']),
                trim($info['rue']),
                trim($info['ville']),
                trim($info['codePostal']),
                $notifHoraire,
                $notifRemplacement
            );

            if (isset($result)) {
                $success = true;
            }
        } elseif (!empty($info['motdePasse']) && !empty($info['ancienMotdePasse'])) {
            $result = UtilisateursModel::modifierUtilisateur(
                trim($info['nom']),
                trim($info['prenom']),
                $info['motdePasse'],
                $info['ancienMotdePasse'],
                $_SESSION['user']->getNom(),
                trim($info['numeroCiv']),
                trim($info['rue']),
                trim($info['ville']),
                trim($info['codePostal']),
                $notifHoraire,
                $notifRemplacement
            );

            if (isset($result['motDePasse'])) {
                $success = true;
            }
        }
        
        
        $valCritique = false;
        $i = 0;

        UtilisateursModel::supprimerTelephone();

        while (!$valCritique) {
            if (!isset($info['tel'.$i])) {
                $valCritique = true;
            } else {
                UtilisateursModel::ajoutTelephone($info['typeTel'.$i], $info['tel'.$i]);
            }
            $i++;
        }
        return Redirect::route('gestion.compte'); 
	}

	public function gestionComptes() 
	{
		if (Auth::User()->type == "Gestionnaire") {

	        $listEmploye = UtilisateursModel::afficherUtilisateurs();
	        $listHtml = '<dl class="accordion" data-accordion> ';
	        foreach ($listEmploye as $employe) {
	            $listHtml .= '<hr><dd><a href="#panel' .
	                        strtr($employe->courriel, array("." => "", "@" => "")) .'">';
	            $listHtml .=  $employe->prenom ." ". $employe->nom;

	            if ($employe->possesseurCle == 1) {
	                $listHtml = $listHtml . '<i class="fa fa-key right"> </i>';
	            }
	            if ($employe->respHoraireConflit == 1) {
	                $listHtml = $listHtml . '<i class="fa fa-clock-o right"/> </i>';
	            }

	            $listHtml .= '</a>';
	            $listHtml .= '<div id="panel'.strtr($employe->courriel, array("." => "", "@" => "")) .'" class="content">';
	            $listHtml .= '<div class="left"> Nom: '. $employe->prenom ." ". $employe->nom. '</div>';
	            $listHtml .= '<div class="right"> Adresse: '. $employe->numeroCivique .", ". $employe->rue;
	            $listHtml .= '<br />'.$employe->ville. ' '. $employe->codePostal .'</div>';
	            $listHtml .= '<br />Courriel: '.$employe->courriel;
	            $listHtml .= '<br />Type Employé: '. $employe->typeEmploye;

	            if ($employe->formationChaussure == 1) {
	                $listHtml .= '<br />Formation Chaussure: Oui';
	            } else {
	                $listHtml .= '<br />Formation Chaussure: Non';
	            }

	            if ($employe->formationVetement == 1) {
	                $listHtml = $listHtml . '<br />Formation Vêtement: Oui';
	            } else {
	                $listHtml = $listHtml . '<br />Formation Vêtement: Non';
	            }

	            if ($employe->formationCaissier == 1) {
	                $listHtml = $listHtml . '<br />Formation Caissier: Oui';
	            } else {
	                $listHtml = $listHtml . '<br />Formation Caissier: Non';
	            }
	            // '.url.'/modificationsAdmin?courriel='. $employe->courriel .'
	            // '.url.'/gestionComptes?suppId='. $employe->courriel .'
	            $listHtml .= '<br /><div class="right"><a href="'.Route('gestion.user.edit', $employe->courriel).'"  class="button tiny">Modifier</a> <a href="'.Route('gestion.user.delete', $employe->courriel).'" class="button alert tiny">Supprimer</a></div><br /></div></dd>';
	        }

	        return View::make('gestion.comptes')->withInfo($listHtml);

	    }
		
	}

	public function gestionUser($user)
	{
		$info = UtilisateursModel::afficherUtilisateur($user);
		return View::make('gestion.compteEdit')->withInfo($info);
	}

	public function deleteUser($user)
	{
		return $user;
	}

	public function ressource() {
		return View::make('ressource');
	}

}