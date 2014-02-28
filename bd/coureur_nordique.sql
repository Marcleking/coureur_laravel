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

    INSERT INTO `disponibilitejours` (`idDispoJours`, `jour`, `heureDebut`, `heureFin`, `idDispoSemaine`) VALUES
    (8, 'dimanche', '10:00:00', '16:00:00', 1),
    (9, 'jeudi', '16:00:00', '21:00:00', 1),
    (10, 'vendredi', '16:00:00', '21:00:00', 1),
    (11, 'lundi', '09:00:00', '17:00:00', 2),
    (12, 'mardi', '09:00:00', '17:00:00', 2),
    (13, 'mercredi', '09:00:00', '17:00:00', 2),
    (14, 'jeudi', '09:00:00', '17:00:00', 2),
    (15, 'vendredi', '09:00:00', '17:00:00', 2),
    (16, 'lundi', '16:00:00', '21:00:00', 3),
    (17, 'mardi', '16:00:00', '21:00:00', 3),
    (18, 'mercredi', '16:00:00', '21:00:00', 3),
    (19, 'jeudi', '16:00:00', '21:00:00', 3),
    (20, 'vendredi', '16:00:00', '21:00:00', 3),
    (21, 'dimanche', '09:00:00', '14:00:00', 4),
    (22, 'mardi', '12:00:00', '17:00:00', 4),
    (23, 'mercredi', '16:00:00', '21:00:00', 4),
    (24, 'jeudi', '12:00:00', '17:00:00', 4),
    (25, 'samedi', '09:00:00', '14:00:00', 4),
    (26, 'lundi', '09:00:00', '15:00:00', 5),
    (27, 'mardi', '09:00:00', '15:00:00', 5),
    (28, 'mercredi', '09:00:00', '15:00:00', 5),
    (29, 'jeudi', '09:00:00', '15:00:00', 5),
    (30, 'vendredi', '09:00:00', '15:00:00', 5),
    (31, 'dimanche', '09:00:00', '12:00:00', 6),
    (32, 'lundi', '18:00:00', '21:00:00', 6),
    (33, 'mardi', '18:00:00', '21:00:00', 6),
    (34, 'mercredi', '18:00:00', '21:00:00', 6),
    (35, 'jeudi', '18:00:00', '21:00:00', 6),
    (36, 'vendredi', '18:00:00', '21:00:00', 6),
    (37, 'dimanche', '11:00:00', '17:00:00', 7),
    (38, 'lundi', '11:00:00', '17:00:00', 7),
    (39, 'mardi', '11:00:00', '17:00:00', 7),
    (40, 'mercredi', '11:00:00', '17:00:00', 7),
    (41, 'jeudi', '11:00:00', '17:00:00', 7),
    (42, 'vendredi', '11:00:00', '17:00:00', 7),
    (43, 'samedi', '11:00:00', '17:00:00', 7),
    (44, 'dimanche', '09:00:00', '21:00:00', 8),
    (45, 'samedi', '09:00:00', '21:00:00', 8);

	/*
	INSERT INTO `disponibilitejours` (`idDispoJours`, `jour`, `heureDebut`, `heureFin`, `idDispoSemaine`) VALUES
	(8, 'dimanche', '09:30:00', '12:30:00', 1),
	(9, 'dimanche', '14:00:00', '17:00:00', 1),
	(10, 'lundi', '12:00:00', '17:00:00', 1),
	(11, 'mercredi', '09:30:00', '18:00:00', 1),
	(12, 'jeudi', '11:00:00', '15:00:00', 1),
	(13, 'jeudi', '16:00:00', '21:00:00', 1),
	(14, 'vendredi', '10:00:00', '18:00:00', 1),
	(15, 'mardi', '09:30:00', '18:00:00', 2),
	(16, 'mercredi', '12:00:00', '18:00:00', 2),
	(17, 'jeudi', '09:30:00', '15:00:00', 2),
	(18, 'vendredi', '11:00:00', '21:00:00', 2),
	(19, 'samedi', '10:00:00', '15:00:00', 2),
	(20, 'dimanche', '09:30:00', '18:00:00', 3),
	(21, 'mardi', '10:00:00', '13:00:00', 3),
	(22, 'mardi', '14:00:00', '18:00:00', 3),
	(23, 'jeudi', '09:30:00', '18:00:00', 3),
	(24, 'lundi', '13:00:00', '18:00:00', 4),
	(25, 'mercredi', '09:30:00', '13:00:00', 4),
	(26, 'jeudi', '16:00:00', '21:00:00', 4),
	(27, 'vendredi', '10:00:00', '13:00:00', 4),
	(28, 'vendredi', '15:30:00', '21:00:00', 4),
	(29, 'samedi', '13:00:00', '17:00:00', 4),
	(30, 'lundi', '14:00:00', '18:00:00', 5),
	(31, 'mardi', '09:30:00', '18:00:00', 5),
	(32, 'mercredi', '11:00:00', '16:00:00', 5),
	(33, 'jeudi', '10:00:00', '14:00:00', 5),
	(34, 'vendredi', '12:00:00', '17:00:00', 5),
	(35, 'samedi', '12:00:00', '17:00:00', 5),
	(36, 'dimanche', '09:30:00', '17:00:00', 6),
	(37, 'mercredi', '10:00:00', '18:00:00', 6),
	(38, 'vendredi', '10:00:00', '14:30:00', 6),
	(39, 'dimanche', '12:00:00', '17:00:00', 7),
	(40, 'lundi', '10:00:00', '13:00:00', 7),
	(41, 'lundi', '15:00:00', '18:00:00', 7),
	(42, 'mercredi', '11:00:00', '15:00:00', 7),
	(43, 'jeudi', '09:30:00', '21:00:00', 7),
	(44, 'samedi', '14:00:00', '17:00:00', 7),
	(45, 'dimanche', '13:00:00', '17:00:00', 8),
	(46, 'mardi', '14:00:00', '18:00:00', 8),
	(47, 'mercredi', '09:30:00', '14:00:00', 8),
	(48, 'vendredi', '11:00:00', '14:00:00', 8),
	(49, 'samedi', '09:30:00', '12:30:00', 8),
	(50, 'dimanche', '09:30:00', '12:30:00', 9),
	(51, 'dimanche', '13:30:00', '16:30:00', 9),
	(52, 'lundi', '11:00:00', '18:00:00', 9),
	(53, 'mardi', '13:00:00', '18:00:00', 9),
	(54, 'jeudi', '13:00:00', '18:00:00', 9),
	(55, 'vendredi', '09:30:00', '15:30:00', 9),
	(56, 'dimanche', '09:30:00', '18:00:00', 10),
	(57, 'mardi', '13:00:00', '18:00:00', 10),
	(58, 'mercredi', '09:30:00', '14:00:00', 10),
	(59, 'jeudi', '09:30:00', '18:00:00', 10),
	(60, 'samedi', '12:00:00', '17:00:00', 10),
	(61, 'mardi', '11:00:00', '18:00:00', 11),
	(62, 'vendredi', '10:00:00', '17:00:00', 11),
	(63, 'mardi', '11:00:00', '15:00:00', 12),
	(64, 'mercredi', '09:30:00', '18:00:00', 12),
	(65, 'vendredi', '16:00:00', '21:00:00', 12),
	(66, 'samedi', '09:30:00', '15:00:00', 12),
	(67, 'dimanche', '14:00:00', '17:00:00', 13),
	(68, 'mercredi', '10:00:00', '14:00:00', 13),
	(69, 'jeudi', '09:30:00', '21:00:00', 13),
	(70, 'vendredi', '14:00:00', '19:00:00', 13),
	(71, 'samedi', '13:00:00', '17:00:00', 13),
	(72, 'dimanche', '13:00:00', '18:00:00', 14),
	(73, 'mercredi', '14:00:00', '18:00:00', 14),
	(74, 'vendredi', '12:00:00', '18:00:00', 14),
	(75, 'lundi', '09:30:00', '16:30:00', 15),
	(76, 'mercredi', '14:30:00', '17:30:00', 15),
	(77, 'jeudi', '11:00:00', '20:00:00', 15),
	(78, 'vendredi', '10:00:00', '16:00:00', 15),
	(79, 'dimanche', '09:30:00', '17:00:00', 16),
	(80, 'lundi', '09:30:00', '12:30:00', 16),
	(81, 'mardi', '12:30:00', '16:30:00', 16),
	(82, 'mercredi', '11:30:00', '15:30:00', 16),
	(83, 'jeudi', '09:30:00', '12:30:00', 16),
	(84, 'jeudi', '14:00:00', '17:30:00', 16),
	(85, 'jeudi', '18:00:00', '21:00:00', 16),
	(86, 'lundi', '13:00:00', '18:00:00', 17),
	(87, 'jeudi', '12:00:00', '20:00:00', 17),
	(88, 'dimanche', '14:00:00', '17:00:00', 18),
	(89, 'lundi', '09:30:00', '13:30:00', 18),
	(90, 'lundi', '14:30:00', '17:30:00', 18),
	(91, 'mardi', '09:30:00', '14:30:00', 18),
	(92, 'mercredi', '11:00:00', '14:00:00', 18),
	(93, 'mercredi', '15:00:00', '18:00:00', 18),
	(94, 'vendredi', '13:00:00', '19:00:00', 18),
	(95, 'samedi', '09:30:00', '17:00:00', 18),
	(96, 'dimanche', '12:00:00', '17:00:00', 19),
	(97, 'mercredi', '10:30:00', '14:30:00', 19),
	(98, 'mercredi', '15:00:00', '18:00:00', 19),
	(99, 'samedi', '11:00:00', '17:00:00', 19),
	(100, 'dimanche', '09:30:00', '15:30:00', 20),
	(101, 'lundi', '10:00:00', '13:00:00', 20),
	(102, 'lundi', '14:00:00', '18:00:00', 20),
	(103, 'mercredi', '09:30:00', '13:00:00', 20),
	(104, 'jeudi', '10:00:00', '13:00:00', 20),
	(105, 'jeudi', '15:00:00', '18:00:00', 20),
	(106, 'samedi', '12:00:00', '17:00:00', 20),
	(107, 'dimanche', '13:00:00', '17:00:00', 21),
	(108, 'jeudi', '12:00:00', '21:00:00', 21),
	(109, 'samedi', '11:00:00', '17:00:00', 21),
	(110, 'dimanche', '14:00:00', '17:00:00', 22),
	(111, 'lundi', '09:30:00', '18:00:00', 22),
	(112, 'mardi', '09:30:00', '14:30:00', 22),
	(113, 'mercredi', '13:00:00', '18:00:00', 22),
	(114, 'jeudi', '16:00:00', '21:00:00', 22),
	(115, 'vendredi', '11:00:00', '15:00:00', 22),
	(116, 'samedi', '12:00:00', '17:00:00', 22),
	(117, 'dimanche', '12:00:00', '17:00:00', 23),
	(118, 'lundi', '12:00:00', '18:00:00', 23),
	(119, 'mardi', '09:30:00', '12:30:00', 23),
	(120, 'mardi', '13:00:00', '16:00:00', 23),
	(121, 'jeudi', '09:30:00', '17:30:00', 23),
	(122, 'samedi', '09:30:00', '16:00:00', 23),
	(123, 'dimanche', '13:00:00', '17:00:00', 24),
	(124, 'lundi', '10:00:00', '18:00:00', 24),
	(125, 'mardi', '09:30:00', '13:30:00', 24),
	(126, 'mardi', '14:30:00', '17:30:00', 24),
	(127, 'jeudi', '10:00:00', '21:00:00', 24),
	(128, 'vendredi', '09:30:00', '17:30:00', 24);
	*/
	
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


    INSERT INTO `disponibilitesemaine` (`idDispoSemaine`, `noDispoSemaine`, `annee`, `nbHeureSouhaite`, `refIdSemaineACopier`, `courriel`) VALUES
    (1, 8, 2014, 10, -1, 'marcantoine.bouchardm@gmail.com'),
    (2, 8, 2014, 35, -1, 'Antoine.Demers@gmail.com'),
    (3, 8, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
    (4, 8, 2014, 20, -1, 'oli.tremblay@gmail.com'),
    (5, 8, 2014, 32, -1, 'francouelle93@gmail.com'),
    (6, 8, 2014, 15, -1, 'suzie.stpierre@gmail.com'),
    (7, 8, 2014, 30, -1, 'samuel.beland@live.ca'),
    (8, 8, 2014, 14, -1, 'olivia.rochette@gmail.com');

	/*INSERT INTO `disponibilitesemaine` (`idDispoSemaine`, `noDispoSemaine`, `annee`, `nbHeureSouhaite`, `refIdSemaineACopier`, `courriel`) VALUES
	(1, 7, 2014, 36, -1, 'samuel.beland@live.ca'),
	(2, 8, 2014, 35, -1, 'samuel.beland@live.ca'),
	(3, 9, 2014, 24, -1, 'samuel.beland@live.ca'),
	(4, 7, 2014, 26, -1, 'Antoine.Demers@gmail.com'),
	(5, 8, 2014, 31, -1, 'Antoine.Demers@gmail.com'),
	(6, 9, 2014, 20, -1, 'Antoine.Demers@gmail.com'),
	(7, 7, 2014, 26, -1, 'Charles.Delmaire@gmail.com'),
	(8, 8, 2014, 18, -1, 'Charles.Delmaire@gmail.com'),
	(9, 9, 2014, 29, -1, 'Charles.Delmaire@gmail.com'),
	(10, 7, 2014, 31, -1, 'francouelle93@gmail.com'),
	(11, 8, 2014, 14, -1, 'francouelle93@gmail.com'),
	(12, 9, 2014, 23, -1, 'francouelle93@gmail.com'),
	(13, 7, 2014, 27, -1, 'marcantoine.bouchardm@gmail.com'),
	(14, 8, 2014, 15, -1, 'marcantoine.bouchardm@gmail.com'),
	(15, 9, 2014, 25, -1, 'marcantoine.bouchardm@gmail.com'),
	(16, 7, 2014, 27, -1, 'oli.tremblay@gmail.com'),
	(17, 8, 2014, 13, -1, 'oli.tremblay@gmail.com'),
	(18, 9, 2014, 34, -1, 'oli.tremblay@gmail.com'),
	(19, 7, 2014, 18, -1, 'olivia.rochette@gmail.com'),
	(20, 8, 2014, 27, -1, 'olivia.rochette@gmail.com'),
	(21, 9, 2014, 19, -1, 'olivia.rochette@gmail.com'),
	(22, 7, 2014, 35, -1, 'suzie.stpierre@gmail.com'),
	(23, 8, 2014, 31, -1, 'suzie.stpierre@gmail.com'),
	(24, 9, 2014, 38, -1, 'suzie.stpierre@gmail.com');
	*/
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
	
	
	INSERT INTO `employe` (`nom`, `prenom`, `motDePasse`, `courriel`, `numeroCivique`, `rue`, `ville`, `codePostal`, `possesseurCle`, `typeEmploye`, `indPriorite`, `hrsMin`, `hrsMax`, `formationVetement`, `formationChaussure`, `formationCaissier`, `respHoraireConflit`, `notifHoraire`, `notifRemplacement`, `lastIp`, `lastLogon`, `lienReinit`) VALUES
('Gagnon', 'Alexis', 'bb5f4ba82976f77330fae6c11f9d5db19a3bfacf', 'alexisgagnon@bell.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Demers', 'Antoine', '2c3e74ea735e53f42d5d827d2fa061fbfac6770f', 'Antoine.Demers@gmail.com', '', '', '', '', 0, 'Employe', 6, 0, 0, 1, 0, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Demers', 'Ariane', '50923256fb7cf3952b8768fd5cc1119e29717f8a', 'ari.demers@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Caron', 'Vincent', '3f09afab65a2bafc4505dcac30c6ab4c1bc0856c', 'caronvincent@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Pageau', 'Chantal', '2f84daa98308c716f11d18ce15179843c95e18ac', 'chantalp@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Delmaire', 'Charles', '41aec588a23fb952f922a79c614b781b5668c212', 'Charles.Delmaire@gmail.com', '', '', '', '', 0, 'Gestionnaire', 1, 0, 0, 1, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Leclerc', 'Chloe', '76cbb75300f75cc7bb6b0489f24e3373fca81db1', 'chloeleclerc@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('St-Amour', 'Clara', 'e8b2bfb1110fa3135f31c18030de679611fac941', 'clara-st-amour@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Cyr', 'David', '26d44dca374054ee1972d507541fc94dbca6b641', 'dav.cyr@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Ouellet', 'Francis', '0c5225da1e3e96d5b4bd33767425d6909427df6d', 'francouelle93@gmail.com', '', '', '', '', 1, 'Gestionnaire', 2, 0, 0, 1, 1, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Proulx', 'Justine', '896ca8a173228080424adeb99ae8b1a0e29ec68d', 'justproulx@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Bouchard-Marceau', 'Marc-Antoine', '95ff3a032b84ae7ef0457187a6bf9658454bc9a8', 'marcantoine.bouchardm@gmail.com', '', '', '', '', 0, 'Gestionnaire', 1, 0, 0, 1, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Aubin', 'Maxime', '16a7b70151172d54ccce8e3c11d92b41c84745eb', 'maxime.aubin@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Blais', 'Megan', 'ce56935a9c60346c7af564c91473b21731b1f456', 'megan.blais@bell.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Mercier', 'Francine', '3f15f51f7f61d9ff24c6167357be44d37106367c', 'mercier45@hotmail.fr', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Côté', 'Nathan', '74a21bab36c559fe0e226f8a329898cb4e5db031', 'nathan.cote@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Tremblay', 'Olivier', '7f4ee8a8a0f385b2c69cb40ae39d696fb71b948d', 'oli.tremblay@gmail.com', '', '', '', '', 1, 'Employe', 5, 0, 0, 1, 1, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Rochette', 'Olivia', '051dd59b5859f4ea6ea6a48dab554546e376557e', 'olivia.rochette@gmail.com', '', '', '', '', 0, 'Employe', 4, 0, 0, 0, 1, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Buteau', 'Patrick', '4cf001430e5a14445a22cf2849478bfe149b53ea', 'pbuteau@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Beland', 'Samuel', '38b46982f1dc38f6cc13e3a3c054915d6c51290f', 'samuel.beland@live.ca', '', '', '', '', 0, 'Gestionnaire', 2, 0, 0, 1, 1, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Poirier', 'Sarah', 'd5d6182f03b7608d4d805af7f0c56398ed94231d', 'sarahpoirier@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Carrier', 'Sebastien', 'a5c89b031eec51cf0196f9d82eb9d7938c80d266', 'sebastien.carrier@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Soucy', 'Hélène', '0c544d2a13eaf1af87b514c10151b6695a14dc9d', 'soucy.h@hotmail.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Olivier', 'Suzanne', 'ee711154f42ab3926dd66b6ff1eefb8723fa759a', 'suzanneolivier@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('St-Pierre', 'Suzie', '9fea8e4fee1a0700448d0b21a9fffa6415ee81fa', 'suzie.stpierre@gmail.com', '', '', '', '', 1, 'Employe', 3, 0, 0, 1, 1, 1, 0, 1, 0, '', '0000-00-00', NULL),
('Lemelin', 'Tristan', '0f49dce0f5a26007f3a5567f9100f291665cac8a', 'tristan.lemelin@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Laurier', 'Valerie', '3d9b91ce2d425444677a5b53b3383667c163fc4c', 'vallaurier@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Desjardins', 'Victor', 'da5e761b7bdbb5f182f1abb33045fe56205ca634', 'victor.desjardins@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Brazeau', 'William', '30cb772e94f1a161cf5fe25df55fcc5702de60f9', 'willbrazz.hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL),
('Lapointe', 'Xavier', '78fae5c8fffb28feb61f7c8250c390bc08c9b087', 'xavier.lapointe@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '0000-00-00', NULL);
    -- --------------------------------------------------------

   



    -- --------------------------------------------------------

    --
    -- Structure de la table `fichierlu`
    --

    CREATE TABLE IF NOT EXISTS `fichierlu` (
        `idConnexion` int(11) NOT NULL AUTO_INCREMENT,
        `date` date NOT NULL,
        `courriel` varchar(60) NOT NULL,
        `fichier` varchar(1000) NOT NULL,
        PRIMARY KEY (`idConnexion`,`courriel`),
        KEY `fk_FichierLu_Employe1_idx` (`courriel`)
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
		`jour` int(2) NOT NULL,
        `typeTravail` enum('Chaussure','Vetement','Caissier','') NOT NULL,
        `heureDebut` time NOT NULL,
        `heureFin` time NOT NULL,
        `remplacement` tinyint(1) NOT NULL DEFAULT '0',
        `courriel` varchar(60) NOT NULL,
        PRIMARY KEY (`idQuartTravail`),
        KEY `fk_PlageDeTravail_Employe1_idx` (`courriel`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

    --
    -- Contenu de la table `plagedetravail`
    --

    -- ---------À faire

    INSERT INTO `plagedetravail` (`idQuartTravail`, `jour`, `typeTravail`, `heureDebut`, `heureFin`, `remplacement`, `courriel`) VALUES
    (68, 0, 'Chaussure', '13:00:00', '17:00:00', 0, 'oli.tremblay@gmail.com'),
    (70, 2, 'Chaussure', '13:00:00', '16:30:00', 0, 'oli.tremblay@gmail.com'),
    (71, 3, 'Chaussure', '13:00:00', '18:00:00', 0, 'suzie.stpierre@gmail.com'),
    (72, 4, 'Chaussure', '13:00:00', '18:00:00', 0, 'francouelle93@gmail.com'),
    (73, 4, 'Chaussure', '18:00:00', '21:00:00', 0, 'samuel.beland@live.ca'),
    (74, 5, 'Chaussure', '13:00:00', '18:00:00', 0, 'samuel.beland@live.ca');


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

    --
    -- Contenu de la table `ressourceMere`
    --

    INSERT INTO `ressourceMere` (`idBlocRessource`, `nomBloc`, `description`, `used`) VALUES
    (13, 'Disponibilités principales', '', 0);

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

    
    INSERT INTO `ressource` (`id`, `noBlocRessource`, `jour`, `heureDebut`, `heureFin`, `nbEmpChaussures`, `nbEmpVetements`, `nbEmpCaissier`) VALUES
    (27, 13, 0, '09:00:00', '18:00:00', 1, 1, 1),
    (28, 13, 1, '09:00:00', '18:00:00', 1, 1, 1),
    (29, 13, 2, '09:00:00', '18:00:00', 1, 1, 1),
    (30, 13, 3, '09:00:00', '18:00:00', 1, 1, 1),
    (31, 13, 4, '09:00:00', '21:00:00', 1, 1, 1),
    (32, 13, 5, '09:00:00', '21:00:00', 1, 1, 1),
    (33, 13, 6, '09:00:00', '21:00:00', 1, 1, 1);


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
    -- Contraintes pour la table `fichierlu`
    --
    ALTER TABLE `fichierlu`
        ADD CONSTRAINT `fk_FichierLu_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;
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
                Select * from telephone where courriel = p_courriel;
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
            FROM employe
			ORDER BY prenom;
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
        Select * from message where idMessage = LAST_INSERT_ID();
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
        Select * from ressource where noBlocRessource = p_noBlocRessource;
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
            Select * from ressource where noBlocRessource = p_idBlocRessource Order by jour, heureDebut;
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
            Select * from ressourceMere where idBlocRessource = p_idBlocRessource;
        end if;
    END
$$

DROP PROCEDURE IF EXISTS getUsedMere $$
CREATE PROCEDURE getUsedMere ()
    BEGIN
        Select * from ressourceMere where used = 0;
    END

$$

DROP PROCEDURE IF EXISTS getSchedules $$
CREATE PROCEDURE getSchedules ()
BEGIN
    Select * From plagedetravail ORDER By courriel;
END

$$

DROP PROCEDURE IF EXISTS getSchedulesByUser $$
CREATE PROCEDURE getSchedulesByUser (in p_courriel varchar(60))
BEGIN
    Select * From plagedetravail Where courriel = p_courriel;
END

$$

DROP PROCEDURE IF EXISTS accepterRemplacement $$
CREATE PROCEDURE accepterRemplacement(IN `p_newCourriel` VARCHAR(200), IN `p_idQuartTravail` INT(11))
BEGIN
	UPDATE plagedetravail
        SET courriel = p_newCourriel,
			remplacement = 0
        WHERE idQuartTravail = p_idQuartTravail;

END

$$

DROP PROCEDURE IF EXISTS afficherRemplacement $$
CREATE PROCEDURE afficherRemplacement()
BEGIN
    Select * From plagedetravail WHERE remplacement = 1;
END

$$

DROP PROCEDURE IF EXISTS ajouterRemplacement $$
CREATE PROCEDURE `ajouterRemplacement`(IN `p_idQuartTravail` INT, IN `p_remplacement` TINYINT)
    NO SQL
BEGIN
	UPDATE plagedetravail
        SET remplacement = p_remplacement
                WHERE idQuartTravail = p_idQuartTravail;

END$$
