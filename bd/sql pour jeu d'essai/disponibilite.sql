-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 28 Février 2014 à 21:41
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `coureur_nordique`
--

-- --------------------------------------------------------

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
  `lienReinit` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`courriel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`nom`, `prenom`, `motDePasse`, `courriel`, `numeroCivique`, `rue`, `ville`, `codePostal`, `possesseurCle`, `typeEmploye`, `indPriorite`, `hrsMin`, `hrsMax`, `formationVetement`, `formationChaussure`, `formationCaissier`, `respHoraireConflit`, `notifHoraire`, `notifRemplacement`, `lastIp`, `lastLogon`, `lienReinit`) VALUES
('Gagnon', 'Alexis', 'bb5f4ba82976f77330fae6c11f9d5db19a3bfacf', 'alexisgagnon@bell.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Demers', 'Antoine', '2c3e74ea735e53f42d5d827d2fa061fbfac6770f', 'Antoine.Demers@gmail.com', '', '', '', '', 0, 'Employe', 6, 0, 0, 0, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Demers', 'Ariane', '50923256fb7cf3952b8768fd5cc1119e29717f8a', 'ari.demers@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Caron', 'Vincent', '3f09afab65a2bafc4505dcac30c6ab4c1bc0856c', 'caronvincent@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Pageau', 'Chantal', '2f84daa98308c716f11d18ce15179843c95e18ac', 'chantalp@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Delmaire', 'Charles', '41aec588a23fb952f922a79c614b781b5668c212', 'Charles.Delmaire@gmail.com', '', '', '', '', 0, 'Gestionnaire', 1, 0, 0, 1, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Leclerc', 'Chloe', '76cbb75300f75cc7bb6b0489f24e3373fca81db1', 'chloeleclerc@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('St-Amour', 'Clara', 'e8b2bfb1110fa3135f31c18030de679611fac941', 'clara-st-amour@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Cyr', 'David', '26d44dca374054ee1972d507541fc94dbca6b641', 'dav.cyr@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Ouellet', 'Francis', '0c5225da1e3e96d5b4bd33767425d6909427df6d', 'francouelle93@gmail.com', '', '', '', '', 1, 'Gestionnaire', 2, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Proulx', 'Justine', '896ca8a173228080424adeb99ae8b1a0e29ec68d', 'justproulx@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Bouchard-Marceau', 'Marc-Antoine', '95ff3a032b84ae7ef0457187a6bf9658454bc9a8', 'marcantoine.bouchardm@gmail.com', '', '', '', '', 0, 'Gestionnaire', 1, 0, 0, 1, 0, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Aubin', 'Maxime', '16a7b70151172d54ccce8e3c11d92b41c84745eb', 'maxime.aubin@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Blais', 'Megan', 'ce56935a9c60346c7af564c91473b21731b1f456', 'megan.blais@bell.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Mercier', 'Francine', '3f15f51f7f61d9ff24c6167357be44d37106367c', 'mercier45@hotmail.fr', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Côté', 'Nathan', '74a21bab36c559fe0e226f8a329898cb4e5db031', 'nathan.cote@videotron.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Tremblay', 'Olivier', '7f4ee8a8a0f385b2c69cb40ae39d696fb71b948d', 'oli.tremblay@gmail.com', '', '', '', '', 1, 'Employe', 5, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Rochette', 'Olivia', '051dd59b5859f4ea6ea6a48dab554546e376557e', 'olivia.rochette@gmail.com', '', '', '', '', 0, 'Employe', 4, 0, 0, 0, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Buteau', 'Patrick', '4cf001430e5a14445a22cf2849478bfe149b53ea', 'pbuteau@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Beland', 'Samuel', '38b46982f1dc38f6cc13e3a3c054915d6c51290f', 'samuel.beland@live.ca', '', '', '', '', 0, 'Gestionnaire', 2, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Poirier', 'Sarah', 'd5d6182f03b7608d4d805af7f0c56398ed94231d', 'sarahpoirier@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Carrier', 'Sebastien', 'a5c89b031eec51cf0196f9d82eb9d7938c80d266', 'sebastien.carrier@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Soucy', 'Hélène', '0c544d2a13eaf1af87b514c10151b6695a14dc9d', 'soucy.h@hotmail.ca', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Olivier', 'Suzanne', 'ee711154f42ab3926dd66b6ff1eefb8723fa759a', 'suzanneolivier@hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('St-Pierre', 'Suzie', '9fea8e4fee1a0700448d0b21a9fffa6415ee81fa', 'suzie.stpierre@gmail.com', '', '', '', '', 1, 'Employe', 3, 0, 0, 1, 1, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Lemelin', 'Tristan', '0f49dce0f5a26007f3a5567f9100f291665cac8a', 'tristan.lemelin@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Laurier', 'Valerie', '3d9b91ce2d425444677a5b53b3383667c163fc4c', 'vallaurier@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Desjardins', 'Victor', 'da5e761b7bdbb5f182f1abb33045fe56205ca634', 'victor.desjardins@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 0, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL),
('Brazeau', 'William', '30cb772e94f1a161cf5fe25df55fcc5702de60f9', 'willbrazz.hotmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 0, 1, 0, 1, 0, '123', '0000-00-00', NULL),
('Lapointe', 'Xavier', '78fae5c8fffb28feb61f7c8250c390bc08c9b087', 'xavier.lapointe@gmail.com', '', '', '', '', 0, 'Employé', 0, 0, 0, 1, 1, 0, 0, 1, 0, '123', '0000-00-00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `disponibilitesemaine`
--

INSERT INTO `disponibilitesemaine` (`idDispoSemaine`, `noDispoSemaine`, `annee`, `nbHeureSouhaite`, `refIdSemaineACopier`, `courriel`) VALUES
(1, 8, 2014, 10, -1, 'marcantoine.bouchardm@gmail.com'),
(2, 8, 2014, 35, -1, 'Antoine.Demers@gmail.com'),
(3, 8, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
(4, 8, 2014, 20, -1, 'oli.tremblay@gmail.com'),
(5, 8, 2014, 32, -1, 'francouelle93@gmail.com'),
(6, 8, 2014, 15, -1, 'suzie.stpierre@gmail.com'),
(7, 8, 2014, 30, -1, 'samuel.beland@live.ca'),
(8, 8, 2014, 14, -1, 'olivia.rochette@gmail.com'),
(9, 9, 2014, 12, -1, 'alexisgagnon@bell.ca'),
(10, 9, 2014, 25, -1, 'Antoine.Demers@gmail.com'),
(11, 9, 2014, 40, -1, 'ari.demers@videotron.ca'),
(12, 9, 2014, 15, -1, 'chantalp@videotron.ca'),
(13, 9, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
(14, 9, 2014, 31, -1, 'chloeleclerc@gmail.com'),
(15, 9, 2014, 14, -1, 'clara-st-amour@gmail.com'),
(16, 9, 2014, 25, -1, 'dav.cyr@gmail.com'),
(17, 9, 2014, 39, -1, 'mercier45@hotmail.fr'),
(18, 9, 2014, 33, -1, 'francouelle93@gmail.com'),
(19, 9, 2014, 26, -1, 'soucy.h@hotmail.ca'),
(20, 9, 2014, 38, -1, 'justproulx@hotmail.com'),
(21, 9, 2014, 14, -1, 'marcantoine.bouchardm@gmail.com'),
(22, 9, 2014, 27, -1, 'maxime.aubin@gmail.com'),
(23, 9, 2014, 26, -1, 'megan.blais@bell.ca'),
(24, 9, 2014, 18, -1, 'nathan.cote@videotron.ca'),
(25, 9, 2014, 17, -1, 'olivia.rochette@gmail.com'),
(26, 9, 2014, 40, -1, 'oli.tremblay@gmail.com'),
(27, 9, 2014, 38, -1, 'pbuteau@gmail.com'),
(28, 9, 2014, 16, -1, 'samuel.beland@live.ca'),
(29, 9, 2014, 36, -1, 'sarahpoirier@hotmail.com'),
(30, 9, 2014, 18, -1, 'sebastien.carrier@gmail.com'),
(31, 9, 2014, 26, -1, 'suzanneolivier@hotmail.com'),
(32, 9, 2014, 26, -1, 'suzie.stpierre@gmail.com'),
(33, 9, 2014, 40, -1, 'tristan.lemelin@gmail.com'),
(34, 9, 2014, 40, -1, 'victor.desjardins@gmail.com'),
(35, 9, 2014, 21, -1, 'caronvincent@hotmail.com'),
(36, 9, 2014, 38, -1, 'willbrazz.hotmail.com'),
(37, 9, 2014, 25, -1, 'xavier.lapointe@gmail.com');



(38, 11, 2014, 12, -1, 'alexisgagnon@bell.ca'),
(39, 11, 2014, 25, -1, 'Antoine.Demers@gmail.com'),
(40, 11, 2014, 40, -1, 'ari.demers@videotron.ca'),
(41, 11, 2014, 15, -1, 'chantalp@videotron.ca'),
(42, 11, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
(43, 11, 2014, 31, -1, 'chloeleclerc@gmail.com'),
(44, 11, 2014, 14, -1, 'clara-st-amour@gmail.com'),
(45, 11, 2014, 25, -1, 'dav.cyr@gmail.com'),
(46, 11, 2014, 39, -1, 'mercier45@hotmail.fr'),
(47, 11, 2014, 33, -1, 'francouelle93@gmail.com'),
(48, 11, 2014, 26, -1, 'soucy.h@hotmail.ca'),
(49, 11, 2014, 38, -1, 'justproulx@hotmail.com'),
(50, 11, 2014, 14, -1, 'marcantoine.bouchardm@gmail.com'),
(51, 11, 2014, 27, -1, 'maxime.aubin@gmail.com'),
(52, 11, 2014, 26, -1, 'megan.blais@bell.ca'),
(53, 11, 2014, 18, -1, 'nathan.cote@videotron.ca'),
(54, 11, 2014, 17, -1, 'olivia.rochette@gmail.com'),
(55, 11, 2014, 40, -1, 'oli.tremblay@gmail.com'),
(56, 11, 2014, 38, -1, 'pbuteau@gmail.com'),
(57, 11, 2014, 16, -1, 'samuel.beland@live.ca'),
(58, 11, 2014, 36, -1, 'sarahpoirier@hotmail.com'),
(59, 11, 2014, 18, -1, 'sebastien.carrier@gmail.com'),
(60, 11, 2014, 26, -1, 'suzanneolivier@hotmail.com'),
(61, 11, 2014, 26, -1, 'suzie.stpierre@gmail.com'),
(62, 11, 2014, 40, -1, 'tristan.lemelin@gmail.com'),
(63, 11, 2014, 40, -1, 'victor.desjardins@gmail.com'),
(64, 11, 2014, 21, -1, 'caronvincent@hotmail.com'),
(65, 11, 2014, 38, -1, 'willbrazz.hotmail.com'),
(66, 11, 2014, 25, -1, 'xavier.lapointe@gmail.com');















--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disponibilitesemaine`
--
ALTER TABLE `disponibilitesemaine`
  ADD CONSTRAINT `fk_DisponibiliteSemaine_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE IF NOT EXISTS `disponibilitejours` (
  `idDispoJours` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(10) NOT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  `idDispoSemaine` int(11) NOT NULL,
  PRIMARY KEY (`idDispoJours`),
  KEY `fk_DisponibiliteJours_DisponibiliteSemaine_idx` (`idDispoSemaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=229 ;

--
-- Contenu de la table `disponibilitejours`
--

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
(45, 'samedi', '09:00:00', '21:00:00', 8),
(46, 'dimanche', '10:00:00', '13:00:00', 9),
(47, 'dimanche', '14:00:00', '17:00:00', 9),
(48, 'samedi', '10:00:00', '13:00:00', 9),
(49, 'samedi', '14:00:00', '17:00:00', 9),
(50, 'dimanche', '11:00:00', '14:00:00', 10),
(51, 'mardi', '09:30:00', '14:30:00', 10),
(52, 'mercredi', '13:00:00', '18:00:00', 10),
(53, 'vendredi', '09:30:00', '17:30:00', 10),
(54, 'samedi', '13:00:00', '17:00:00', 10),
(55, 'dimanche', '09:30:00', '16:30:00', 11),
(56, 'lundi', '10:30:00', '13:30:00', 11),
(57, 'lundi', '14:00:00', '17:00:00', 11),
(58, 'mardi', '09:30:00', '13:30:00', 11),
(59, 'mardi', '14:30:00', '17:30:00', 11),
(60, 'mercredi', '12:00:00', '18:00:00', 11),
(61, 'jeudi', '11:00:00', '14:00:00', 11),
(62, 'jeudi', '15:30:00', '19:30:00', 11),
(63, 'samedi', '09:30:00', '16:00:00', 11),
(64, 'lundi', '14:00:00', '17:00:00', 12),
(65, 'mardi', '12:00:00', '15:00:00', 12),
(66, 'mercredi', '10:00:00', '13:00:00', 12),
(67, 'jeudi', '13:00:00', '16:00:00', 12),
(68, 'vendredi', '11:00:00', '14:00:00', 12),
(69, 'dimanche', '09:30:00', '17:00:00', 13),
(70, 'mardi', '09:30:00', '13:00:00', 13),
(71, 'mardi', '14:30:00', '18:00:00', 13),
(72, 'jeudi', '13:00:00', '16:00:00', 13),
(73, 'samedi', '09:30:00', '17:00:00', 13),
(74, 'lundi', '13:00:00', '18:00:00', 14),
(75, 'mardi', '13:00:00', '18:00:00', 14),
(76, 'mercredi', '13:00:00', '18:00:00', 14),
(77, 'jeudi', '13:00:00', '21:00:00', 14),
(78, 'vendredi', '13:00:00', '21:00:00', 14),
(79, 'mardi', '09:30:00', '17:00:00', 15),
(80, 'vendredi', '14:00:00', '21:00:00', 15),
(81, 'dimanche', '09:30:00', '13:30:00', 16),
(82, 'lundi', '09:30:00', '13:30:00', 16),
(83, 'mardi', '09:30:00', '13:30:00', 16),
(84, 'mercredi', '09:30:00', '13:30:00', 16),
(85, 'jeudi', '09:30:00', '12:30:00', 16),
(86, 'vendredi', '09:30:00', '12:30:00', 16),
(87, 'samedi', '09:30:00', '12:30:00', 16),
(88, 'dimanche', '13:00:00', '17:00:00', 17),
(89, 'lundi', '11:00:00', '14:30:00', 17),
(90, 'lundi', '15:00:00', '18:00:00', 17),
(91, 'mardi', '12:00:00', '18:00:00', 17),
(92, 'mercredi', '09:30:00', '13:30:00', 17),
(93, 'mercredi', '15:00:00', '18:00:00', 17),
(94, 'jeudi', '09:30:00', '15:30:00', 17),
(95, 'vendredi', '10:30:00', '16:00:00', 17),
(96, 'samedi', '09:30:00', '13:30:00', 17),
(97, 'dimanche', '13:00:00', '17:00:00', 18),
(98, 'lundi', '09:30:00', '14:30:00', 18),
(99, 'mercredi', '12:00:00', '18:00:00', 18),
(100, 'jeudi', '15:00:00', '21:00:00', 18),
(101, 'vendredi', '15:00:00', '21:00:00', 18),
(102, 'samedi', '09:30:00', '12:30:00', 18),
(103, 'samedi', '13:30:00', '17:00:00', 18),
(104, 'lundi', '14:30:00', '18:00:00', 19),
(105, 'mardi', '14:30:00', '18:00:00', 19),
(106, 'mercredi', '14:30:00', '18:00:00', 19),
(107, 'jeudi', '14:30:00', '21:00:00', 19),
(108, 'vendredi', '14:30:00', '21:00:00', 19),
(109, 'samedi', '13:30:00', '17:00:00', 19),
(110, 'lundi', '09:30:00', '17:00:00', 20),
(111, 'mardi', '09:30:00', '17:00:00', 20),
(112, 'jeudi', '09:30:00', '21:00:00', 20),
(113, 'vendredi', '09:30:00', '21:00:00', 20),
(114, 'dimanche', '11:00:00', '14:00:00', 21),
(115, 'mardi', '11:00:00', '14:00:00', 21),
(116, 'jeudi', '12:00:00', '17:00:00', 21),
(117, 'samedi', '10:00:00', '13:00:00', 21),
(118, 'dimanche', '09:30:00', '13:30:00', 22),
(119, 'lundi', '15:00:00', '18:00:00', 22),
(120, 'mardi', '11:30:00', '15:30:00', 22),
(121, 'mercredi', '10:00:00', '17:00:00', 22),
(122, 'jeudi', '15:00:00', '21:00:00', 22),
(123, 'samedi', '13:00:00', '16:00:00', 22),
(124, 'dimanche', '11:00:00', '16:30:00', 23),
(125, 'lundi', '12:00:00', '15:30:00', 23),
(126, 'mardi', '09:30:00', '12:30:00', 23),
(127, 'mercredi', '11:30:00', '14:30:00', 23),
(128, 'jeudi', '09:30:00', '12:30:00', 23),
(129, 'vendredi', '13:30:00', '16:30:00', 23),
(130, 'samedi', '09:30:00', '14:30:00', 23),
(131, 'lundi', '10:00:00', '13:00:00', 24),
(132, 'mardi', '15:00:00', '18:00:00', 24),
(133, 'jeudi', '10:00:00', '13:00:00', 24),
(134, 'jeudi', '18:00:00', '21:00:00', 24),
(135, 'vendredi', '18:00:00', '21:00:00', 24),
(136, 'samedi', '10:00:00', '13:00:00', 24),
(137, 'lundi', '12:00:00', '17:00:00', 25),
(138, 'mardi', '10:00:00', '15:00:00', 25),
(139, 'vendredi', '13:00:00', '17:00:00', 25),
(140, 'samedi', '13:00:00', '16:00:00', 25),
(141, 'dimanche', '09:30:00', '17:00:00', 26),
(142, 'lundi', '09:30:00', '18:00:00', 26),
(143, 'mardi', '09:30:00', '18:00:00', 26),
(144, 'mercredi', '09:30:00', '18:00:00', 26),
(145, 'jeudi', '09:30:00', '21:00:00', 26),
(146, 'vendredi', '09:30:00', '21:00:00', 26),
(147, 'samedi', '09:30:00', '17:00:00', 26),
(148, 'lundi', '09:30:00', '18:00:00', 27),
(149, 'mardi', '09:30:00', '18:00:00', 27),
(150, 'mercredi', '09:30:00', '18:00:00', 27),
(151, 'jeudi', '14:00:00', '21:00:00', 27),
(152, 'vendredi', '14:00:00', '21:00:00', 27),
(153, 'dimanche', '12:00:00', '16:00:00', 28),
(154, 'mercredi', '10:00:00', '18:00:00', 28),
(155, 'samedi', '12:00:00', '16:00:00', 28),
(156, 'lundi', '12:00:00', '18:00:00', 29),
(157, 'mardi', '09:30:00', '13:30:00', 29),
(158, 'mercredi', '14:00:00', '18:00:00', 29),
(159, 'jeudi', '11:30:00', '14:30:00', 29),
(160, 'jeudi', '15:30:00', '18:30:00', 29),
(161, 'vendredi', '09:30:00', '12:30:00', 29),
(162, 'vendredi', '13:00:00', '16:00:00', 29),
(163, 'vendredi', '18:00:00', '21:00:00', 29),
(164, 'samedi', '09:30:00', '12:30:00', 29),
(165, 'samedi', '13:00:00', '17:00:00', 29),
(166, 'mardi', '13:30:00', '18:00:00', 30),
(167, 'jeudi', '10:00:00', '17:00:00', 30),
(168, 'vendredi', '17:30:00', '21:00:00', 30),
(169, 'samedi', '13:00:00', '16:30:00', 30),
(170, 'dimanche', '13:30:00', '16:30:00', 31),
(171, 'lundi', '10:00:00', '15:00:00', 31),
(172, 'mardi', '12:00:00', '16:00:00', 31),
(173, 'mercredi', '09:30:00', '15:00:00', 31),
(174, 'jeudi', '09:30:00', '12:30:00', 31),
(175, 'jeudi', '15:00:00', '18:00:00', 31),
(176, 'vendredi', '09:30:00', '12:30:00', 31),
(177, 'dimanche', '09:30:00', '13:00:00', 32),
(178, 'dimanche', '14:00:00', '17:00:00', 32),
(179, 'mardi', '09:30:00', '13:00:00', 32),
(180, 'mardi', '14:00:00', '17:00:00', 32),
(181, 'mercredi', '09:30:00', '13:00:00', 32),
(182, 'mercredi', '14:00:00', '17:00:00', 32),
(183, 'vendredi', '09:30:00', '13:00:00', 32),
(184, 'vendredi', '14:00:00', '17:00:00', 32),
(185, 'dimanche', '14:00:00', '17:00:00', 33),
(186, 'lundi', '09:30:00', '13:00:00', 33),
(187, 'lundi', '14:00:00', '17:00:00', 33),
(188, 'mardi', '10:30:00', '17:00:00', 33),
(189, 'mercredi', '13:00:00', '16:00:00', 33),
(190, 'jeudi', '13:00:00', '21:00:00', 33),
(191, 'vendredi', '09:30:00', '12:30:00', 33),
(192, 'vendredi', '13:00:00', '16:00:00', 33),
(193, 'vendredi', '17:00:00', '21:00:00', 33),
(194, 'samedi', '10:00:00', '14:00:00', 33),
(195, 'dimanche', '10:00:00', '13:00:00', 34),
(196, 'dimanche', '13:30:00', '16:30:00', 34),
(197, 'lundi', '11:00:00', '16:30:00', 34),
(198, 'mardi', '10:00:00', '14:00:00', 34),
(199, 'mardi', '15:00:00', '18:00:00', 34),
(200, 'mercredi', '13:30:00', '16:30:00', 34),
(201, 'jeudi', '10:00:00', '14:30:00', 34),
(202, 'jeudi', '15:30:00', '20:00:00', 34),
(203, 'vendredi', '14:00:00', '20:00:00', 34),
(204, 'samedi', '10:00:00', '13:00:00', 34),
(205, 'samedi', '13:30:00', '16:30:00', 34),
(206, 'dimanche', '12:30:00', '15:30:00', 35),
(207, 'lundi', '10:00:00', '13:00:00', 35),
(208, 'lundi', '13:30:00', '16:30:00', 35),
(209, 'mardi', '12:30:00', '15:30:00', 35),
(210, 'mercredi', '12:30:00', '15:30:00', 35),
(211, 'jeudi', '12:30:00', '15:30:00', 35),
(212, 'vendredi', '12:30:00', '15:30:00', 35),
(213, 'dimanche', '09:30:00', '12:30:00', 36),
(214, 'dimanche', '14:00:00', '17:00:00', 36),
(215, 'lundi', '09:30:00', '12:30:00', 36),
(216, 'lundi', '15:00:00', '18:00:00', 36),
(217, 'mardi', '11:30:00', '15:30:00', 36),
(218, 'mercredi', '11:00:00', '14:00:00', 36),
(219, 'jeudi', '13:00:00', '16:00:00', 36),
(220, 'jeudi', '16:30:00', '21:00:00', 36),
(221, 'vendredi', '13:00:00', '16:00:00', 36),
(222, 'vendredi', '16:30:00', '21:00:00', 36),
(223, 'samedi', '09:30:00', '13:30:00', 36),
(224, 'dimanche', '09:30:00', '17:00:00', 37),
(225, 'lundi', '11:30:00', '15:30:00', 37),
(226, 'mercredi', '09:30:00', '12:30:00', 37),
(227, 'mercredi', '13:00:00', '16:00:00', 37),
(228, 'vendredi', '12:00:00', '20:00:00', 37);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disponibilitejours`
--
ALTER TABLE `disponibilitejours`
  ADD CONSTRAINT `fk_DisponibiliteJours_DisponibiliteSemaine` FOREIGN KEY (`idDispoSemaine`) REFERENCES `disponibilitesemaine` (`idDispoSemaine`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS `ressourcemere` (
  `idBlocRessource` int(11) NOT NULL AUTO_INCREMENT,
  `nomBloc` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `used` tinyint(1) NOT NULL,
  PRIMARY KEY (`idBlocRessource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `ressourcemere`
--

INSERT INTO `ressourcemere` (`idBlocRessource`, `nomBloc`, `description`, `used`) VALUES
(14, 'Ressources du mois de Mars', 'Toutes les ressources nécessaires pour le mois de mars', 1);


CREATE TABLE IF NOT EXISTS `ressource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noBlocRessource` int(11) NOT NULL,
  `jour` int(11) NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `nbEmpChaussures` int(11) NOT NULL,
  `nbEmpVetements` int(11) NOT NULL,
  `nbEmpCaissier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noRessourceMere` (`noBlocRessource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `ressource`
--

INSERT INTO `ressource` (`id`, `noBlocRessource`, `jour`, `heureDebut`, `heureFin`, `nbEmpChaussures`, `nbEmpVetements`, `nbEmpCaissier`) VALUES
(47, 14, 0, '09:30:00', '17:00:00', 6, 8, 6),
(48, 14, 1, '09:30:00', '18:00:00', 3, 6, 4),
(49, 14, 2, '09:30:00', '18:00:00', 5, 5, 3),
(50, 14, 3, '09:30:00', '18:00:00', 5, 5, 5),
(51, 14, 4, '09:30:00', '21:00:00', 8, 6, 7),
(52, 14, 5, '09:30:00', '21:00:00', 8, 6, 7),
(53, 14, 6, '09:30:00', '17:00:00', 8, 7, 8);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD CONSTRAINT `fk_noRessourceMere` FOREIGN KEY (`noBlocRessource`) REFERENCES `ressourcemere` (`idBlocRessource`) ON DELETE CASCADE ON UPDATE NO ACTION;
