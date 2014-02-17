<?php

class UserController extends BaseController {

	public function ajoutUtilisateur()
	{
		return View::make('user.add');
	}

	public function ajoutUtilisateurSave()
	{
		$info = Input::all();

		$cle = 1;
        $formationVetement = 1;
        $formationChaussure = 1;
        $formationCaissier = 1;
        $respHoraireConflit = 1;

        if (!isset($info['cle'])) {
            $cle = 0;
        }

        if (!isset($info['Vetement'])) {
            $formationVetement = 0;
        }

        if (!isset($info['Chaussure'])) {
            $formationChaussure = 0;
        }

        if (!isset($info['Caissier'])) {
            $formationCaissier = 0;
        }

        if (!isset($info['conflit'])) {
            $respHoraireConflit = 0;
        }

        $result = UtilisateursModel::ajoutUilisateur(
            trim($info['courriel']),
            $info['typeEmp'],
            $formationVetement,
            $formationChaussure,
            $formationCaissier,
            $cle,
            $respHoraireConflit
        );

        if ($result != null) {
            return Redirect::route('gestion.comptes')->withSuccess("L'utilisateur à bien été ajouter.");
        } else {
            return Redirect::route('gestion.comptes')->withSuccess("L'utilisateur n'à pas été ajouter.");
        }
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

        $validator = Validator::make($info, UtilisateursModel::$rules, UtilisateursModel::$messages);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }


		$notifHoraire = 1;
        $notifRemplacement = 1;

        if (!isset($info['notifHoraire'])) {
            $notifHoraire = 0;
        }

        if (!isset($info['notifRemplacement'])) {
            $notifRemplacement = 0;
        }

        $success = false;

        if (empty($info['motDePasse']) && 
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
        } elseif (!empty($info['motDePasse']) && !empty($info['ancienMotdePasse'])) {
            $result = UtilisateursModel::modifierUtilisateur(
                trim($info['nom']),
                trim($info['prenom']),
                $info['motDePasse'],
                $info['ancienMotdePasse'],
                Auth::User()->id,
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

        UtilisateursModel::supprimerTelephone(Auth::User()->id);

        while (!$valCritique) {
            if (!isset($info['tel'.$i])) {
                $valCritique = true;
            } else {
                UtilisateursModel::ajoutTelephone($info['typeTel'.$i], $info['tel'.$i], Auth::User()->id);
            }
            $i++;
        }
        return Redirect::route('gestion.compte'); 
	}

	public function gestionCompteSaveAdmin()
	{
		$info = Input::all();

		$cle = 1;
        $formationVetement = 1;
        $formationChaussure = 1;
        $formationCaissier = 1;
        $respHoraireConflit = 1;

        if (!isset($info['cle'])) {
            $cle = 0;
        }

        if (!isset($info['Vetement'])) {
            $formationVetement = 0;
        }

        if (!isset($info['Chaussure'])) {
            $formationChaussure = 0;
        }

        if (!isset($info['Caissier'])) {
            $formationCaissier = 0;
        }

        if (!isset($info['conflit'])) {
            $respHoraireConflit = 0;
        }

        $result =UtilisateursModel::modifierUtilisateurAdmin(
            trim($info['courriel']),
            trim($info['nom']),
            trim($info['prenom']),
            trim($info['numeroCiv']),
            trim($info['rue']),
            trim($info['ville']),
            trim($info['codePostal']),
            $cle,
            $info['typeEmp'],
            $info['priorite'],
            $info['hrsMin'],
            $info['hrsMax'],
            $formationVetement,
            $formationChaussure,
            $formationCaissier,
            $respHoraireConflit
        );

        return Redirect::route('gestion.comptes')->withSuccess("L'utilisateur à bien été modifier.");
	}

	public function gestionComptes() 
	{
		if (Auth::User()->type == "Gestionnaire") {
	        $listEmploye = UtilisateursModel::afficherUtilisateurs();
            return View::make('gestion.comptes')->withList($listEmploye);
	    }
	}

	public function gestionUser($user)
	{
		$info = UtilisateursModel::afficherUtilisateur($user);
		return View::make('gestion.compteEdit')->withInfo($info);
	}

	public function gestionUserAdmin($user)
	{
		$info = UtilisateursModel::afficherUtilisateur($user);
		return View::make('gestion.compteEditAdmin')->withInfo($info);
	}

	public function deleteUser($user)
	{
		if(UtilisateursModel::supprimerUtilisateur($user))
			return Redirect::route('gestion.comptes')->withSuccess("L'utilisateur a bien été supprimer.");
	
		return Redirect::route('gestion.comptes')->withFail("L'utilisateur n'a pas été supprimer.");
	}

}