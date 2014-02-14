    -- phpMyAdmin SQL Dump
    -- version 3.5.1
    -- http://www.phpmyadmin.net
    --
    -- Client: localhost
    -- Généré le: Jeu 12 Décembre 2013 à 09:22
    -- Version du serveur: 5.5.24-log
    -- Version de PHP: 5.3.13

    SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
    SET time_zone = "+00:00";


    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
    /*!40101 SET NAMES utf8 */;

    DROP DATABASE IF EXISTS coureur_nordique;
    CREATE DATABASE coureur_nordique;
    USE coureur_nordique;
    grant usage on *.* to user_coureur@localhost identified by 'qweqwe';
    grant all privileges on coureur_nordique.* to user_coureur@localhost ;
    -- --------------------------------------------------------

    --
    -- Structure de la table `ancienhoraire`
    --

    CREATE TABLE IF NOT EXISTS `ancienhoraire` (
        `idAncienHoraire` int(11) NOT NULL,
        `courriel` varchar(60) NOT NULL,
        `nbHeuresTravaille` int(11) DEFAULT NULL,
        `nbHeuresAssigne` int(11) DEFAULT NULL,
        PRIMARY KEY (`idAncienHoraire`, `courriel`),
        KEY `fk_AncienHoraire_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    --
    -- Contenu de la table `ancienhoraire`
    --


    -- ---------À faire

    -- --------------------------------------------------------

    --
    -- Structure de la table `destinataire`
    --

    CREATE TABLE IF NOT EXISTS `destinataire` (
        `idArticleLue` int(11) NOT NULL AUTO_INCREMENT,
        `dateLecture` date NOT NULL,
        `idMessage` int(11) NOT NULL,
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`idArticleLue`),
        KEY `fk_ArticleLu_Article1_idx` (`idMessage`),
        KEY `fk_Destinataire_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

    --
    -- Contenu de la table `destinataire`
    --

    -- ----------------- À faire

    -- --------------------------------------------------------

    --
    -- Structure de la table `disponibilitejours`
    --

    CREATE TABLE IF NOT EXISTS `disponibilitejours` (
        `idDispoJours` int(11) NOT NULL AUTO_INCREMENT,
        `jour` varchar(10) NOT NULL,
        `heureDebut` time DEFAULT NULL,
        `heureFin` time DEFAULT NULL,
        `idDispoSemaine` int(11) NOT NULL,
        PRIMARY KEY (`idDispoJours`),
        KEY `fk_DisponibiliteJours_DisponibiliteSemaine_idx` (`idDispoSemaine`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
    -- --------------------------------------------------------

    --
    -- Structure de la table `disponibilitesemaine`
    --

    CREATE TABLE IF NOT EXISTS `disponibilitesemaine` (
        `idDispoSemaine` int(11) NOT NULL AUTO_INCREMENT,
        `noDispoSemaine` int(11) NOT NULL,
        `annee` int(11) NOT NULL,
        `nbHeureSouhaite` int(11) NOT NULL,
        `refIdSemaineACopier` int(11) DEFAULT '-1',
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`idDispoSemaine`),
        KEY `fk_DisponibiliteSemaine_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    -- --------------------------------------------------------

    --
    -- Structure de la table `document`
    --

    CREATE TABLE IF NOT EXISTS `document` (
        `idDossier` int(11) NOT NULL AUTO_INCREMENT,
        `nom` varchar(45) NOT NULL,
        `DossierParent` int(11) DEFAULT NULL,
        PRIMARY KEY (`idDossier`),
        KEY `fk_Document_Document1_idx` (`DossierParent`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

    --
    -- Contenu de la table `document`
    --

    INSERT INTO `document` (`idDossier`, `nom`, `DossierParent`) VALUES
    (1, '/', NULL),
    (2, 'documents', 1),
    (3, 'documentsImportant', 2),
    (4, 'documentsRepresentant', 2),
    (5, 'documentsEquipementHivers', 3),
    (6, 'documentsEquipementete', 3);

    -- --------------------------------------------------------

    --
    -- Structure de la table `employe`
    --

    CREATE TABLE IF NOT EXISTS `employe` (
        `nom` varchar(30) NOT NULL,
        `prenom` varchar(30) NOT NULL,
        `motDePasse` varchar(40) NOT NULL,
        `courriel` varchar(60) NOT NULL,
        `numeroCivique` varchar(10) NOT NULL,
        `rue` varchar(50) NOT NULL,
        `ville` varchar(45) NOT NULL,
        `codePostal` varchar(7) NOT NULL,
        `possesseurCle` tinyint(1) NOT NULL DEFAULT '0',
        `typeEmploye` varchar(45) NOT NULL,
        `indPriorite` int(11) NOT NULL,
    `hrsMin` int(11) NOT NULL,
    `hrsMax` int(11) NOT NULL,
        `formationVetement` tinyint(1) NOT NULL DEFAULT '0',
        `formationChaussure` tinyint(1) NOT NULL DEFAULT '0',
        `formationCaissier` tinyint(1) NOT NULL DEFAULT '0',
        `respHoraireConflit` tinyint(1) NOT NULL DEFAULT '0',
        `notifHoraire` tinyint(1) NOT NULL DEFAULT '1',
        `notifRemplacement` tinyint(1) NOT NULL DEFAULT '0',
        `lastIp` varchar(20) NOT NULL,
        `lastLogon` date NOT NULL,
        `lienReinit` varchar(40) null,
        PRIMARY KEY (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

    --
    -- Contenu de la table `employe`
    --

    INSERT INTO `employe` (`nom`, `prenom`, `motDePasse`, `courriel`, `numeroCivique`, `rue`, `ville`, `codePostal`, `possesseurCle`, `typeEmploye`, `indPriorite`, `formationVetement`, `formationChaussure`, `formationCaissier`, `respHoraireConflit`, `notifHoraire`, `notifRemplacement`, `lastIp`, `lastLogon`) VALUES
    ('Bouchars-Marceau', 'Marc-Antoine', '95ff3a032b84ae7ef0457187a6bf9658454bc9a8', 'marcantoine.bouchardm@gmail.com', NULL, NULL, NULL, NULL, 0, "Gestionnaire", 1, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Demers', 'Antoine', '2c3e74ea735e53f42d5d827d2fa061fbfac6770f', 'Antoine.Demers@gmail.com', NULL, NULL, NULL, NULL, 0, "Employe", 6, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Delmaire', 'Charles', '41aec588a23fb952f922a79c614b781b5668c212', 'Charles.Delmaire@gmail.com', NULL, NULL, NULL, NULL, 0, "Gestionnaire", 1, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Tremblay', 'Olivier', '7f4ee8a8a0f385b2c69cb40ae39d696fb71b948d', 'oli.tremblay@gmail.com', NULL, NULL, NULL, NULL, 0, "Employe", 5, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Ouellet', 'Francis', '0c5225da1e3e96d5b4bd33767425d6909427df6d', 'francouelle93@gmail.com', NULL, NULL, NULL, NULL, 0, "Gestionnaire", 2, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('St-Pierre', 'Suzie', '9fea8e4fee1a0700448d0b21a9fffa6415ee81fa', 'suzie.stpierre@gmail.com', NULL, NULL, NULL, NULL, 0, "Employe", 3, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Beland', 'Samuel', '38b46982f1dc38f6cc13e3a3c054915d6c51290f', 'samuel.beland@live.ca', NULL, NULL, NULL, NULL, 0, "Gestionnaire", 2, 0, 0, 0, 0, 1, 0, NULL, NULL),
    ('Rochette', 'Olivia', '051dd59b5859f4ea6ea6a48dab554546e376557e', 'olivia.rochette@gmail.com', NULL, NULL, NULL, NULL, 0, "Employe", 4, 0, 0, 0, 0, 1, 0, NULL, NULL);
    -- --------------------------------------------------------

    --
    -- Structure de la table `fichier`
    --

    CREATE TABLE IF NOT EXISTS `fichier` (
        `noFichier` int(11) NOT NULL AUTO_INCREMENT,
        `nomFichier` varchar(100) NOT NULL,
        `description` varchar(1000) NOT NULL,
        `idDossier` int(11) NOT NULL,
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`noFichier`),
        KEY `fk_Fichier_Document1_idx` (`idDossier`),
        KEY `fk_Fichier_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

    --
    -- Contenu de la table `fichier`
    --

    -- ----------------A FAIRE

    -- --------------------------------------------------------

    --
    -- Structure de la table `fichierlu`
    --

    CREATE TABLE IF NOT EXISTS `fichierlu` (
        `idConnexion` int(11) NOT NULL AUTO_INCREMENT,
        `date` date NOT NULL,
        `courriel` varchar(60) NOT NULL,
        `noFichier` int(11) NOT NULL,
        PRIMARY KEY (`idConnexion`,`courriel`,`noFichier`),
        KEY `fk_FichierLu_Employe1_idx` (`courriel`),
        KEY `fk_FichierLu_Fichier1_idx` (`noFichier`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

    --
    -- Contenu de la table `fichierlu`
    --

    -- --------------À faire

    -- --------------------------------------------------------

    --
    -- Structure de la table `message`
    --

    CREATE TABLE IF NOT EXISTS `message` (
        `idMessage` int(11) NOT NULL AUTO_INCREMENT,
        `titre` varchar(70) NOT NULL,
        `message` varchar(1000) NOT NULL,
        `courriel` varchar(60) NOT NULL,
        `date` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (`idMessage`),
        KEY `fk_Article_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

    --
    -- Contenu de la table `message`
    --

    -- ---------À faire

    -- --------------------------------------------------------

    --
    -- Structure de la table `plagedetravail`
    --

    CREATE TABLE IF NOT EXISTS `plagedetravail` (
        `idQuartTravail` int(11) NOT NULL AUTO_INCREMENT,
        `typeTravail` enum('Chaussure','Vetement','Caissier','') NOT NULL,
        `heureDebut` datetime NOT NULL,
        `heureFin` datetime NOT NULL,
        `remplacement` tinyint(1) NOT NULL DEFAULT '0',
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`idQuartTravail`),
        KEY `fk_PlageDeTravail_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

    --
    -- Contenu de la table `plagedetravail`
    --

    -- ---------À faire

    -- --------------------------------------------------------

    --
    -- Structure de la table `ressource`
    --

    CREATE TABLE IF NOT EXISTS `ressourceMere` (
        `idBlocRessource` int(11) NOT NULL AUTO_INCREMENT,
        `nomBloc` varchar(30) NOT NULL,
        `description` varchar(1000) NOT NULL,
        `used` boolean NOT NULL,
        PRIMARY KEY (`idBlocRessource`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


    CREATE TABLE IF NOT EXISTS `ressource` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `noBlocRessource` int(11) NOT NULL,
        `jour` int(11) NOT NULL,
        `heureDebut` time NOT NULL,
        `heureFin` time NOT NULL,
        `nbEmpChaussures` int(11) NOT NULL,
        `nbEmpVetements` int(11) NOT NULL,
        `nbEmpCaissier` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

    --
    -- Contenu de la table `ressource`
    --



    -- --------------------------------------------------------

    --
    -- Structure de la table `telephone`
    --

    CREATE TABLE IF NOT EXISTS `telephone` (
        `noTelephone` varchar(12) NOT NULL,
        `description` varchar(100) DEFAULT NULL,
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`noTelephone`),
        KEY `fk_Telephone_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    --
    -- Contenu de la table `telephone`
    --

    INSERT INTO `telephone` (`noTelephone`, `description`, `courriel`) VALUES
    ('004-844-4278', 'Cellulaire','marcantoine.bouchardm@gmail.com'),
    ('006-181-6338', 'Cellulaire', 'Charles.Delmaire@gmail.com'),
    ('051-555-4823', 'Maison','marcantoine.bouchardm@gmail.com'),
    ('077-769-4311', 'Cellulaire', 'Charles.Delmaire@gmail.com'),
    ('082-831-2444', 'Maison','marcantoine.bouchardm@gmail.com'),
    ('093-411-8435', 'Cellulaire', 'Charles.Delmaire@gmail.com'),
    ('105-166-3326', 'Maison', 'marcantoine.bouchardm@gmail.com'),
    ('114-872-5680', 'Cellulaire', 'Charles.Delmaire@gmail.com'),
    ('122-360-5870', 'Maison','francouelle93@gmail.com'),
    ('122-525-1562', 'Cellulaire', 'samuel.beland@live.ca'),
    ('124-702-9445', 'Cellulaire', 'francouelle93@gmail.com'),
    ('126-146-7522', 'Cellulaire', 'samuel.beland@live.ca'),
    ('154-802-9877', 'Cellulaire','francouelle93@gmail.com'),
    ('165-833-5997', 'Cellulaire', 'samuel.beland@live.ca'),
    ('169-439-6730', 'Cellulaire', 'francouelle93@gmail.com'),
    ('175-026-2139', 'Cellulaire', 'samuel.beland@live.ca'),
    ('175-987-3099', 'Cellulaire', 'francouelle93@gmail.com');

    --
    -- Contraintes pour les tables exportées
    --

    --
    -- Contraintes pour la table `ancienhoraire`
    --
    ALTER TABLE `ancienhoraire`
        ADD CONSTRAINT `fk_AncienHoraire_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    ALTER TABLE `ressource`
        ADD CONSTRAINT `fk_noRessourceMere` FOREIGN KEY (`noBlocRessource`) REFERENCES `ressourceMere` (`idBlocRessource`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `destinataire`
    --
    ALTER TABLE `destinataire`
        ADD CONSTRAINT `fk_ArticleLu_Article1` FOREIGN KEY (`idMessage`) REFERENCES `message` (`idMessage`) ON DELETE CASCADE ON UPDATE NO ACTION,
        ADD CONSTRAINT `fk_Destinataire_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `disponibilitejours`
    --
    ALTER TABLE `disponibilitejours`
        ADD CONSTRAINT `fk_DisponibiliteJours_DisponibiliteSemaine` FOREIGN KEY (`idDispoSemaine`) REFERENCES `disponibilitesemaine` (`idDispoSemaine`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `disponibilitesemaine`
    --
    ALTER TABLE `disponibilitesemaine`
        ADD CONSTRAINT `fk_DisponibiliteSemaine_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `document`
    --
    ALTER TABLE `document`
        ADD CONSTRAINT `fk_Document_Document1` FOREIGN KEY (`DossierParent`) REFERENCES `document` (`idDossier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `fichier`
    --
    ALTER TABLE `fichier`
        ADD CONSTRAINT `fk_Fichier_Document1` FOREIGN KEY (`idDossier`) REFERENCES `document` (`idDossier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        ADD CONSTRAINT `fk_Fichier_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `fichierlu`
    --
    ALTER TABLE `fichierlu`
        ADD CONSTRAINT `fk_FichierLu_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION,
        ADD CONSTRAINT `fk_FichierLu_Fichier1` FOREIGN KEY (`noFichier`) REFERENCES `fichier` (`noFichier`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `message`
    --
    ALTER TABLE `message`
        ADD CONSTRAINT `fk_Article_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `plagedetravail`
    --
    ALTER TABLE `plagedetravail`
        ADD CONSTRAINT `fk_PlageDeTravail_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
    -- Contraintes pour la table `telephone`
    --
    ALTER TABLE `telephone`
        ADD CONSTRAINT `fk_Telephone_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



    --PROCÉDURE
    DELIMITER $$
    USE coureur_nordique $$

    DROP PROCEDURE IF EXISTS Connexion $$
    CREATE PROCEDURE Connexion (in p_courriel varchar(60),
                                                            in p_mdp varchar(60),
                                                            in p_lastIp varchar(20),
                                                            in p_lastLogon date)
    BEGIN
            if exists (SELECT courriel, typeEmploye FROM employe WHERE courriel = p_courriel AND motDePasse = SHA1(concat(SHA1(p_mdp), p_courriel))) then
                UPDATE employe
                    set lastIp = p_lastIp,
                    lastLogon = p_lastLogon
                    where courriel = p_courriel;

                SELECT courriel, typeEmploye
                    FROM employe
                    WHERE courriel = p_courriel
                    AND motDePasse = SHA1(concat(SHA1(p_mdp), p_courriel));
            end if;
    END
    $$

    DROP PROCEDURE IF EXISTS AjouterUtilisateur $$
    CREATE PROCEDURE AjouterUtilisateur(in p_courriel varchar(60),
                                                                            in p_typeEmploye varchar(45),
                                                                            in p_formationVetement tinyint(1),
                                                                            in p_formationChaussure tinyint(1),
                                                                            in p_formationCaissier  tinyint(1),
                                                                            in p_possesseurCle  tinyint(1),
                                                                            in p_respHoraireConflit tinyint(1))
    BEGIN
        if not exists (SELECT * from employe where courriel = p_courriel) then
            INSERT INTO employe (courriel, motDePasse, typeEmploye, formationVetement, formationCaissier, possesseurCle, respHoraireConflit)
                VALUES (p_courriel, sha1(concat(sha1(p_courriel), p_courriel)), p_typeEmploye, p_formationVetement, p_formationChaussure, p_possesseurCle, p_respHoraireConflit);
            SELECT * FROM employe where courriel = p_courriel;
        end if;
    END

    $$

        DROP PROCEDURE IF EXISTS AjoutTelephone $$
        CREATE PROCEDURE AjoutTelephone (in p_noTelephone varchar(12),
                                                                            in p_description varchar(100),
                                                                            in p_courriel varchar(60))
        BEGIN
            if (exists(Select * from employe where courriel = p_courriel)
                and not exists (Select * from telephone where noTelephone = p_noTelephone)) then
                    INSERT INTO telephone (noTelephone, description, courriel)
                        VALUES (p_noTelephone, p_description, p_courriel);
                    SELECT * FROM telephone WHERE courriel = p_courriel;
            end if;
        END

    $$

    DROP PROCEDURE IF EXISTS AfficheTelephone $$
    CREATE PROCEDURE AfficheTelephone (in p_courriel varchar(60))
    BEGIN
        if exists(Select * from employe where courriel = p_courriel) then
            SELECT * FROM telephone WHERE courriel = p_courriel;
        end if;
    END

    $$

        DROP PROCEDURE IF EXISTS SupprimerTelephone $$
        CREATE PROCEDURE SupprimerTelephone (in p_courriel varchar(60))
        BEGIN
            if exists(Select * from employe where courriel = p_courriel) then
                DELETE FROM telephone WHERE courriel = p_courriel;
            end if;
        END

    $$

    DROP PROCEDURE IF EXISTS Utilisateur $$
    CREATE PROCEDURE Utilisateur (in p_courriel varchar(60))
            SELECT nom, prenom, courriel, numeroCivique, rue, ville, codePostal, possesseurCle, typeEmploye, indPriorite, hrsMin, hrsMax, formationVetement, formationChaussure, formationCaissier, respHoraireConflit, notifHoraire, notifRemplacement
            FROM employe
            where courriel = p_courriel;
    $$

    DROP PROCEDURE IF EXISTS Utilisateurs $$
    CREATE PROCEDURE Utilisateurs ()
            SELECT *
            FROM employe;
    $$

    DROP PROCEDURE IF EXISTS SupprimerUtilisateur $$
    CREATE PROCEDURE SupprimerUtilisateur (in p_courriel varchar(60))
    BEGIN
        if exists(Select * from employe where courriel = p_courriel) then
            Select * from employe where courriel = p_courriel;

            DELETE FROM employe
            WHERE courriel = p_courriel;
        end if;
    END

    $$

    DROP PROCEDURE IF EXISTS ModifierUtilisateurAdmin $$
    CREATE PROCEDURE ModifierUtilisateurAdmin (p_courriel varchar(60), p_nom varchar(30),
                                                                                p_prenom varchar(30),
                                                                                p_numeroCivique varchar(10),
                                                                                p_rue varchar(50), p_ville varchar(45),
                                                                                p_codePostal varchar(7), p_possesseurCle tinyint(1),
                                                                                p_typeEmploye varchar(45), p_indPriorite int(11),
                                        p_hrsMin int(11), p_hrsMax int(11),
                                                                                p_formationVetement tinyint(1), p_formationChaussure tinyint(1),
                                                                                p_formationCaissier tinyint(1), p_respHoraireConflit tinyint(1))
    BEGIN
        if exists(Select * from employe where courriel = p_courriel) then
                         UPDATE employe
                SET nom = p_nom,
                        prenom = p_prenom,
                        courriel = p_courriel,
                        numeroCivique = p_numeroCivique,
                        rue = p_rue,
                        ville = p_ville,
                        codePostal = p_codePostal,
                        possesseurCle = p_possesseurCle,
                        typeEmploye = p_typeEmploye,
            indPriorite =  p_indPriorite,
            hrsMin = p_hrsMin,
            hrsMax = p_hrsMax,
                        formationVetement = p_formationVetement,
                        formationChaussure = p_formationChaussure,
                        formationCaissier = p_formationCaissier,
                        respHoraireConflit = p_respHoraireConflit
                WHERE courriel = p_courriel;

            Select * from employe where courriel = p_courriel;
        end if;
    END

    $$

    DROP PROCEDURE IF EXISTS ModifierUtilisateur $$
    CREATE PROCEDURE ModifierUtilisateur (p_courriel varchar(60), p_nom varchar(30),
                                                                                p_prenom varchar(30), p_motDePasseNew varchar(40),  p_motDePassePast varchar(40),
                                                                                p_numeroCivique varchar(10),
                                                                                p_rue varchar(50), p_ville varchar(45),
                                                                                p_codePostal varchar(7),
                                                                                p_notifHoraire tinyint(1), p_notifRemplacement tinyint(1))
    BEGIN
        if exists(Select * from employe where courriel = p_courriel) then
            if (sha1(concat(sha1(p_motDePassePast), p_courriel)) = (Select motDePasse from employe where courriel = p_courriel) AND p_motDePasseNew != "") then
                UPDATE employe
                SET nom = p_nom,
                        prenom = p_prenom,
                        motDePasse = sha1(concat(sha1(p_motDePasseNew), p_courriel)),
                        courriel = p_courriel,
                        numeroCivique = p_numeroCivique,
                        rue = p_rue,
                        ville = p_ville,
                        codePostal = p_codePostal,
                        notifHoraire = p_notifHoraire,
                        notifRemplacement = p_notifRemplacement
                WHERE courriel = p_courriel;

                Select * from employe where courriel = p_courriel;
            else
                UPDATE employe
                SET nom = p_nom,
                        prenom = p_prenom,
                        courriel = p_courriel,
                        numeroCivique = p_numeroCivique,
                        rue = p_rue,
                        ville = p_ville,
                        codePostal = p_codePostal,
                        notifHoraire = p_notifHoraire,
                        notifRemplacement = p_notifRemplacement
                WHERE courriel = p_courriel;

                Select nom, prenom, courriel, numeroCivique, rue, ville, codePostal, notifHoraire, notifRemplacement
                 from employe where courriel = p_courriel;
            end if;
        end if;
    END

    $$

    DROP PROCEDURE IF EXISTS dispoChoisie $$
    CREATE PROCEDURE dispoChoisie(  in p_courriel varchar(60),
                                    in p_noSemaine int(11),
                                    in p_annee int(11))
    BEGIN

    DECLARE idSemaine int(11);

    if(-1 = (SELECT refIdSemaineACopier FROM disponibilitesemaine WHERE noDispoSemaine = p_noSemaine AND annee = p_annee AND courriel = p_courriel )) then
        SET idSemaine = (   SELECT idDispoSemaine FROM disponibilitesemaine
                            WHERE disponibilitesemaine.courriel = p_courriel
                            AND disponibilitesemaine.noDispoSemaine = p_noSemaine
                                AND disponibilitesemaine.annee = p_annee);
    else
        SET idSemaine = (   SELECT refIdSemaineACopier FROM disponibilitesemaine
                            WHERE noDispoSemaine = p_noSemaine
                            AND annee = p_annee
                            AND courriel = p_courriel );
    end if;
    SELECT heureDebut, heureFin, jour
    FROM disponibilitejours
    WHERE disponibilitejours.idDispoSemaine = idSemaine;
    END
    $$

    DROP PROCEDURE IF EXISTS ajoutModifDisposSemaine $$
    CREATE PROCEDURE ajoutModifDisposSemaine(
                                        p_noDispoSemaine int(11),
                                        p_annee int(11),
                                        p_nbHeureSouhaite int(11),
                                        p_courriel varchar(60))
    BEGIN
        if exists (SELECT * FROM disponibilitesemaine WHERE noDispoSemaine = p_noDispoSemaine AND courriel = p_courriel AND annee = p_annee) then

            -- Mise à jour d'une disponibilité existante
            UPDATE disponibilitesemaine
            SET annee = p_annee,
                nbHeureSouhaite = p_nbHeureSouhaite,
                refIdSemaineACopier = -1
                WHERE courriel = p_courriel
                AND annee = p_annee
                AND noDispoSemaine = p_noDispoSemaine;
            -- Supprime les blocs d'horaire déjà réservés
            DELETE FROM disponibilitejours WHERE idDispoSemaine =
                (SELECT idDispoSemaine FROM disponibilitesemaine WHERE noDispoSemaine = p_noDispoSemaine AND annee = p_annee AND courriel = p_courriel);
            SELECT * FROM disponibilitesemaine WHERE noDispoSemaine = p_noDispoSemaine AND annee = p_annee AND courriel = p_courriel;
        else
            INSERT INTO disponibilitesemaine (noDispoSemaine, annee, nbHeureSouhaite, courriel)
            VALUES (p_noDispoSemaine, p_annee, p_nbHeureSouhaite, p_courriel);
            SELECT * FROM disponibilitesemaine WHERE idDispoSemaine = LAST_INSERT_ID();
        end if;

    END

    $$

    DROP PROCEDURE IF EXISTS ajoutDisposSemainesCopie $$
    CREATE PROCEDURE ajoutDisposSemainesCopie(
                                        p_refIdSemaineACopier int(11),
                                        p_noDispoSemaine int(11),
                                        p_annee int(11))
    BEGIN
        DECLARE v_nbHeureSouhaite int(11);
        DECLARE v_courriel varchar(60);

        SET v_nbHeureSouhaite = (SELECT nbHeureSouhaite FROM disponibilitesemaine WHERE idDispoSemaine = p_refIdSemaineACopier);
        SET v_courriel = (SELECT courriel FROM disponibilitesemaine WHERE idDispoSemaine = p_refIdSemaineACopier);

        if exists(  SELECT * FROM disponibilitesemaine
                    WHERE noDispoSemaine = p_noDispoSemaine
                    AND courriel = (SELECT courriel FROM disponibilitesemaine
                                    WHERE idDispoSemaine = p_refIdSemaineACopier)) then
            -- Met à jour une semaine existante pour qu'elle référence une autre semaine

            UPDATE disponibilitesemaine
            SET nbHeureSouhaite = v_nbHeureSouhaite,
                refIdSemaineACopier = p_refIdSemaineACopier
            WHERE noDispoSemaine = p_noDispoSemaine
            AND courriel = v_courriel
            AND annee = p_annee;

            -- Supprime les blocs horaire de la semaine existante
            DELETE FROM disponibilitejours
            WHERE idDispoSemaine = (SELECT idDispoSemaine FROM disponibilitesemaine
                                    WHERE noDispoSemaine = p_noDispoSemaine
                                    AND courriel = (SELECT courriel FROM disponibilitesemaine
                                                    WHERE idDispoSemaine = p_refIdSemaineACopier)
                                    AND annee = p_annee);
            -- Retourne la semaine modifiée
            SELECT * FROM disponibilitesemaine
            WHERE noDispoSemaine = p_noDispoSemaine
            AND courriel = (SELECT courriel FROM disponibilitesemaine
                            WHERE idDispoSemaine = p_refIdSemaineACopier)
            AND annee = p_annee;
        else
            INSERT INTO disponibilitesemaine(noDispoSemaine, annee, nbHeureSouhaite, refIdSemaineACopier, courriel)
            VALUES (p_noDispoSemaine,
                    p_annee,
                    v_nbHeureSouhaite,
                    p_refIdSemaineACopier,
                    v_courriel);
            SELECT * FROM disponibilitesemaine WHERE idDispoSemaine = LAST_INSERT_ID();
        end if;
    END
    $$

    DROP PROCEDURE IF EXISTS ajoutDispoBloc $$
    CREATE PROCEDURE ajoutDispoBloc(
                                    p_jour varchar(10),
                                    p_heureDebut time,
                                    p_heureFin time,
                                    p_idDispoSemaine int(11))
    BEGIN
        INSERT INTO disponibilitejours (jour, heureDebut, heureFin, idDispoSemaine)
        VALUES (p_jour, p_heureDebut, p_heureFin, p_idDispoSemaine);
        SELECT * FROM disponibilitejours WHERE idDispoJours = LAST_INSERT_ID();
    END

$$

    DROP PROCEDURE IF EXISTS reinitMdp $$
    CREATE PROCEDURE reinitMdp(in p_courriel varchar(60),
                                                        in p_str varchar(40),
                                                        in p_mdp varchar(40))
    BEGIN
        Select * from employe where courriel = p_courriel and lienReinit = p_str;

        UPDATE employe set
            motDePasse = sha1(concat(sha1(p_mdp), courriel)),
            lienReinit = null
            where courriel = p_courriel
            and lienReinit = p_str;
    END

$$

    DROP PROCEDURE IF EXISTS demandeReinitMdp $$
    CREATE PROCEDURE demandeReinitMdp(in p_courriel varchar(60),
                                                                    in p_random varchar(40))
    BEGIN
        Select * from employe where courriel = p_courriel;
        UPDATE employe set
        lienReinit = p_random
        where courriel = p_courriel;
    END

$$

DROP PROCEDURE IF EXISTS bonneDemandeReinit $$
CREATE PROCEDURE bonneDemandeReinit(
    in p_courriel varchar(60),
    in p_str varchar(60)
)
BEGIN
    SELECT * FROM employe
        where courriel = p_courriel
        and lienReinit = p_str;
END


$$

DROP PROCEDURE IF EXISTS AjouterMessage $$
CREATE PROCEDURE AjouterMessage(in p_titre varchar(70),
                                in p_message varchar(1000),
                                    in p_courriel varchar(60))
    BEGIN
        INSERT INTO message (titre, message, courriel, date)
        VALUES (p_titre, p_message, p_courriel, now());
    END



$$
DROP PROCEDURE IF EXISTS listeDispoJours $$
    CREATE PROCEDURE listeDispoJours(in p_idDispoSemaine INT(11))
    BEGIN
        SELECT * FROM disponibilitejours WHERE idDispoSemaine = p_idDispoSemaine;
    END


$$

DROP PROCEDURE IF EXISTS listeDispoSemaine $$
    CREATE PROCEDURE listeDispoSemaine(in p_noDispoSemaine INT(11) , in p_annee INT(11))
    BEGIN
        SELECT * FROM disponibilitesemaine WHERE noDispoSemaine = p_noDispoSemaine AND annee = p_annee;
    END

$$

DROP PROCEDURE IF EXISTS afficheMessage $$
    CREATE PROCEDURE afficheMessage(in p_debut INT(11))
    BEGIN
        IF p_debut = 0 THEN
            SELECT * FROM message ORDER BY idMessage DESC LIMIT 0, 10;
        ELSE
            SELECT * FROM message WHERE idMessage > p_debut ORDER BY idMessage DESC LIMIT 0, 10;
        END IF;
    END
$$


DROP PROCEDURE IF EXISTS SupprimerMessage $$
    CREATE PROCEDURE SupprimerMessage (in p_idMessage int(11))
    BEGIN
        if exists(Select * from message where idMessage = p_idMessage) then
            Select * from message where idMessage = p_idMessage;
            DELETE FROM message WHERE idMessage = p_idMessage;
        end if;
    END
	
	$$

DROP PROCEDURE IF EXISTS SupprimeBlocRessource $$
CREATE PROCEDURE SupprimeBlocRessource (in p_idBlocRessource int(11))
    BEGIN
        if exists(Select * from ressourceMere where idBlocRessource = p_idBlocRessource) then
            DELETE FROM ressource where noBlocRessource = p_idBlocRessource;
			DELETE FROM ressourceMere where idBlocRessource = p_idBlocRessource;
			Select * from ressourceMere where idBlocRessource = p_idBlocRessource;
        end if;
    END
$$

DROP PROCEDURE IF EXISTS saveBlocRessource $$

CREATE PROCEDURE saveBlocRessource (
    in p_nomBloc varchar(30),
    in p_description varchar(1000)
)
    BEGIN
		
		DECLARE v_actif tinyint(1);
		
		if exists(SELECT * From ressourceMere) then
			Set v_actif = 1;
		else
			Set v_actif = 0;
		end if;
		
        INSERT INTO ressourceMere (nomBloc, description, used)
            VALUES (p_nomBloc, p_description, v_actif);
        SELECT * FROM ressourceMere WHERE idBlocRessource = LAST_INSERT_ID();
    END
$$

DROP PROCEDURE IF EXISTS editBlocRessource $$

CREATE PROCEDURE editBlocRessource (
    in p_idBlocRessource int(11),
    in p_nomBloc varchar(30),
    in p_description varchar(1000)
)
    BEGIN
        if exists(Select * from ressourceMere where idBlocRessource = p_idBlocRessource) then
            UPDATE ressourceMere set
                nomBloc = p_nomBloc,
                description = p_description
                where idBlocRessource = p_idBlocRessource;
            Select * from ressourceMere where idBlocRessource = p_idBlocRessource;
        end if;
    END
$$

DROP PROCEDURE IF EXISTS deleteResourcesByGroup $$

CREATE PROCEDURE deleteResourcesByGroup(
	in p_noBlocRessource int(11)
)
	BEGIN
		DELETE FROM ressource WHERE noBlocRessource = p_noBlocRessource;
	END
$$

DROP PROCEDURE IF EXISTS addRessource $$

CREATE PROCEDURE addRessource (
    in p_noBlocRessource int(11),
    in p_jour int(11),
    in p_heureDebut time,
    in p_heureFin time,
    in p_nbChaussures int(11),
    in p_nbVetements int(11),
    in p_nbCaissier int(11)
)
    BEGIN
        if exists(Select * from ressourceMere where idBlocRessource = p_noBlocRessource) then
			INSERT INTO ressource (noBlocRessource, jour, heureDebut, heureFin, nbEmpChaussures, nbEmpVetements, nbEmpCaissier)
                VALUES (p_noBlocRessource, p_jour, p_heureDebut, p_heureFin, p_nbChaussures, p_nbVetements, p_nbCaissier);
            SELECT * FROM ressource WHERE id = LAST_INSERT_ID();
        end if;
    END
$$

DROP PROCEDURE IF EXISTS getRessourcesFromBloc $$

CREATE PROCEDURE getRessourcesFromBloc (in p_idBlocRessource int(11))
    BEGIN
        if exists(Select * from ressourceMere where idBlocRessource = p_idBlocRessource) then
            Select * from ressource where noBlocRessource = p_idBlocRessource;
        end if;
    END
$$

DROP PROCEDURE IF EXISTS getRessourcesMere $$

CREATE PROCEDURE getRessourcesMere ()
    BEGIN
        Select * from ressourceMere;
    END
$$

DROP PROCEDURE IF EXISTS setUsedMere $$

CREATE PROCEDURE setUsedMere (in p_idBlocRessource int(11))
    BEGIN
        if exists(Select * from ressourceMere where idBlocRessource = p_idBlocRessource) then
            UPDATE ressourceMere set
                used = 1;
            UPDATE ressourceMere set
                used = 0
                where idBlocRessource = p_idBlocRessource;
        end if;
    END
$$

DROP PROCEDURE IF EXISTS getUsedMere $$
CREATE PROCEDURE getUsedMere ()
    BEGIN
        Select * from ressourceMere where used = true;
    END
