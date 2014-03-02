-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 01 Mars 2014 à 14:04
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=413 ;

--
-- Contenu de la table `disponibilitejours`
--

INSERT INTO `disponibilitejours` (`idDispoJours`, `jour`, `heureDebut`, `heureFin`, `idDispoSemaine`) VALUES
(234, 'dimanche', '09:30:00', '17:00:00', 39),
(235, 'lundi', '12:00:00', '17:00:00', 39),
(236, 'jeudi', '10:00:00', '15:30:00', 39),
(237, 'vendredi', '09:30:00', '18:00:00', 39),
(238, 'samedi', '09:30:00', '17:00:00', 39),
(239, 'dimanche', '09:30:00', '17:00:00', 40),
(240, 'lundi', '14:00:00', '17:00:00', 40),
(241, 'mardi', '09:30:00', '18:00:00', 40),
(242, 'mercredi', '09:30:00', '13:00:00', 40),
(243, 'jeudi', '10:00:00', '16:00:00', 40),
(244, 'vendredi', '11:00:00', '14:00:00', 40),
(245, 'samedi', '11:30:00', '16:30:00', 40),
(246, 'dimanche', '09:30:00', '17:00:00', 41),
(247, 'mercredi', '09:30:00', '15:00:00', 41),
(248, 'samedi', '09:30:00', '17:00:00', 41),
(249, 'dimanche', '13:00:00', '17:00:00', 42),
(250, 'lundi', '13:00:00', '18:00:00', 42),
(251, 'mardi', '09:30:00', '18:00:00', 42),
(252, 'jeudi', '09:30:00', '13:00:00', 42),
(253, 'jeudi', '16:00:00', '21:00:00', 42),
(254, 'vendredi', '09:30:00', '18:00:00', 42),
(255, 'dimanche', '09:30:00', '17:00:00', 43),
(256, 'lundi', '12:00:00', '15:00:00', 43),
(257, 'mardi', '09:30:00', '12:30:00', 43),
(258, 'mercredi', '11:00:00', '15:00:00', 43),
(259, 'vendredi', '09:30:00', '18:00:00', 43),
(260, 'samedi', '10:30:00', '13:30:00', 43),
(261, 'samedi', '14:00:00', '17:00:00', 43),
(262, 'dimanche', '12:00:00', '17:00:00', 44),
(263, 'lundi', '13:00:00', '18:00:00', 44),
(264, 'mercredi', '09:30:00', '15:00:00', 44),
(265, 'jeudi', '09:30:00', '12:30:00', 44),
(266, 'jeudi', '13:30:00', '16:30:00', 44),
(267, 'jeudi', '18:00:00', '21:00:00', 44),
(268, 'samedi', '13:00:00', '17:00:00', 44),
(269, 'dimanche', '09:30:00', '17:00:00', 45),
(270, 'lundi', '13:00:00', '18:00:00', 45),
(271, 'mercredi', '09:30:00', '14:00:00', 45),
(272, 'vendredi', '09:30:00', '18:00:00', 45),
(273, 'samedi', '09:30:00', '18:00:00', 45),
(274, 'dimanche', '09:30:00', '17:00:00', 46),
(275, 'lundi', '09:30:00', '17:00:00', 46),
(276, 'mardi', '14:00:00', '18:00:00', 46),
(277, 'mercredi', '09:30:00', '14:30:00', 46),
(278, 'jeudi', '15:00:00', '21:00:00', 46),
(279, 'vendredi', '09:30:00', '17:00:00', 46),
(280, 'samedi', '12:00:00', '17:00:00', 46),
(281, 'dimanche', '09:30:00', '17:00:00', 47),
(282, 'lundi', '09:30:00', '18:00:00', 47),
(283, 'mardi', '09:30:00', '18:00:00', 47),
(284, 'mercredi', '09:30:00', '15:00:00', 47),
(285, 'jeudi', '09:30:00', '21:00:00', 47),
(286, 'vendredi', '09:30:00', '18:00:00', 47),
(287, 'samedi', '09:30:00', '17:00:00', 47),
(288, 'lundi', '12:00:00', '18:00:00', 48),
(289, 'mercredi', '09:30:00', '15:00:00', 48),
(290, 'vendredi', '09:30:00', '18:00:00', 48),
(291, 'dimanche', '12:00:00', '17:00:00', 49),
(292, 'lundi', '12:00:00', '18:00:00', 49),
(293, 'mardi', '09:30:00', '13:30:00', 49),
(294, 'mercredi', '11:30:00', '15:00:00', 49),
(295, 'jeudi', '15:00:00', '21:00:00', 49),
(296, 'vendredi', '11:00:00', '15:30:00', 49),
(297, 'samedi', '09:30:00', '17:00:00', 49),
(298, 'dimanche', '09:30:00', '17:00:00', 50),
(299, 'mardi', '11:00:00', '18:00:00', 50),
(300, 'mercredi', '09:30:00', '15:00:00', 50),
(301, 'vendredi', '12:00:00', '21:00:00', 50),
(302, 'samedi', '12:00:00', '16:00:00', 50),
(303, 'dimanche', '11:00:00', '14:00:00', 51),
(304, 'lundi', '14:00:00', '18:00:00', 51),
(305, 'mardi', '10:00:00', '13:00:00', 51),
(306, 'jeudi', '12:30:00', '16:30:00', 51),
(307, 'vendredi', '10:00:00', '13:00:00', 51),
(308, 'dimanche', '09:30:00', '17:00:00', 52),
(309, 'lundi', '12:00:00', '16:00:00', 52),
(310, 'mardi', '09:30:00', '12:30:00', 52),
(311, 'mardi', '15:00:00', '18:00:00', 52),
(312, 'mercredi', '09:30:00', '12:30:00', 52),
(313, 'jeudi', '14:00:00', '21:00:00', 52),
(314, 'vendredi', '09:30:00', '18:00:00', 52),
(315, 'dimanche', '09:30:00', '17:00:00', 53),
(316, 'lundi', '15:00:00', '18:00:00', 53),
(317, 'mardi', '09:30:00', '18:00:00', 53),
(318, 'vendredi', '14:30:00', '18:00:00', 53),
(319, 'samedi', '09:30:00', '15:00:00', 53),
(320, 'dimanche', '09:30:00', '18:00:00', 54),
(321, 'lundi', '13:00:00', '18:00:00', 54),
(322, 'mardi', '13:00:00', '18:00:00', 54),
(323, 'mercredi', '10:00:00', '13:00:00', 54),
(324, 'vendredi', '09:30:00', '18:00:00', 54),
(325, 'samedi', '09:30:00', '18:00:00', 54),
(326, 'dimanche', '09:30:00', '17:00:00', 55),
(327, 'samedi', '09:30:00', '17:00:00', 55),
(328, 'dimanche', '14:00:00', '17:00:00', 56),
(329, 'lundi', '14:00:00', '17:00:00', 56),
(330, 'mardi', '14:00:00', '17:00:00', 56),
(331, 'mercredi', '09:30:00', '12:30:00', 56),
(332, 'jeudi', '09:30:00', '12:30:00', 56),
(333, 'jeudi', '14:00:00', '17:00:00', 56),
(334, 'jeudi', '18:00:00', '21:00:00', 56),
(335, 'samedi', '09:30:00', '12:30:00', 56),
(336, 'samedi', '14:00:00', '17:00:00', 56),
(337, 'lundi', '09:30:00', '18:00:00', 57),
(338, 'mardi', '09:30:00', '18:00:00', 57),
(339, 'mercredi', '09:30:00', '15:00:00', 57),
(340, 'jeudi', '09:30:00', '21:00:00', 57),
(341, 'dimanche', '10:00:00', '16:00:00', 58),
(342, 'lundi', '14:00:00', '18:00:00', 58),
(343, 'mardi', '09:30:00', '13:30:00', 58),
(344, 'mardi', '14:30:00', '18:00:00', 58),
(345, 'mercredi', '11:00:00', '15:00:00', 58),
(346, 'jeudi', '16:00:00', '21:00:00', 58),
(347, 'vendredi', '11:00:00', '17:00:00', 58),
(348, 'samedi', '09:30:00', '13:30:00', 58),
(349, 'dimanche', '09:30:00', '17:00:00', 59),
(350, 'lundi', '12:00:00', '18:00:00', 59),
(351, 'mardi', '13:00:00', '18:00:00', 59),
(352, 'mercredi', '09:30:00', '15:00:00', 59),
(353, 'jeudi', '09:30:00', '13:00:00', 59),
(354, 'jeudi', '15:00:00', '21:00:00', 59),
(355, 'vendredi', '11:00:00', '17:00:00', 59),
(356, 'samedi', '09:30:00', '13:00:00', 59),
(357, 'samedi', '13:30:00', '17:00:00', 59),
(358, 'dimanche', '11:00:00', '17:00:00', 60),
(359, 'mardi', '14:00:00', '18:00:00', 60),
(360, 'jeudi', '09:30:00', '18:00:00', 60),
(361, 'vendredi', '09:30:00', '18:00:00', 60),
(362, 'dimanche', '11:00:00', '14:30:00', 61),
(363, 'lundi', '11:00:00', '14:30:00', 61),
(364, 'mardi', '11:00:00', '14:30:00', 61),
(365, 'mercredi', '11:00:00', '14:30:00', 61),
(366, 'jeudi', '11:00:00', '14:30:00', 61),
(367, 'jeudi', '18:00:00', '21:00:00', 61),
(368, 'vendredi', '11:00:00', '14:30:00', 61),
(369, 'samedi', '11:00:00', '14:30:00', 61),
(370, 'dimanche', '12:00:00', '17:00:00', 62),
(371, 'lundi', '12:00:00', '15:30:00', 62),
(372, 'mardi', '09:30:00', '18:00:00', 62),
(373, 'mercredi', '09:30:00', '14:00:00', 62),
(374, 'jeudi', '11:30:00', '14:30:00', 62),
(375, 'vendredi', '09:30:00', '13:00:00', 62),
(376, 'samedi', '09:30:00', '12:30:00', 62),
(377, 'samedi', '13:30:00', '16:30:00', 62),
(378, 'dimanche', '09:30:00', '13:00:00', 63),
(379, 'dimanche', '14:00:00', '17:00:00', 63),
(380, 'lundi', '10:30:00', '13:30:00', 63),
(381, 'lundi', '14:00:00', '17:00:00', 63),
(382, 'mardi', '11:30:00', '18:00:00', 63),
(383, 'mercredi', '10:30:00', '14:00:00', 63),
(384, 'jeudi', '16:00:00', '21:00:00', 63),
(385, 'vendredi', '09:30:00', '16:00:00', 63),
(386, 'samedi', '09:30:00', '12:30:00', 63),
(387, 'samedi', '13:30:00', '17:00:00', 63),
(388, 'dimanche', '09:30:00', '17:00:00', 64),
(389, 'mardi', '09:30:00', '17:00:00', 64),
(390, 'jeudi', '09:30:00', '21:00:00', 64),
(394, 'lundi', '12:00:00', '18:00:00', 65),
(395, 'mardi', '12:00:00', '18:00:00', 65),
(396, 'mercredi', '10:00:00', '15:00:00', 65),
(397, 'dimanche', '09:30:00', '17:00:00', 66),
(398, 'lundi', '10:00:00', '13:00:00', 66),
(399, 'lundi', '14:00:00', '17:00:00', 66),
(400, 'mardi', '11:00:00', '14:00:00', 66),
(401, 'mercredi', '09:30:00', '13:30:00', 66),
(402, 'samedi', '09:30:00', '17:00:00', 66),
(403, 'lundi', '14:00:00', '18:00:00', 67),
(404, 'mardi', '11:30:00', '18:00:00', 67),
(405, 'mercredi', '10:00:00', '15:00:00', 67),
(406, 'jeudi', '12:30:00', '21:00:00', 67),
(407, 'samedi', '11:00:00', '17:00:00', 67),
(408, 'dimanche', '11:00:00', '16:00:00', 68),
(409, 'mardi', '11:00:00', '14:00:00', 68),
(410, 'mercredi', '09:30:00', '15:00:00', 68),
(411, 'jeudi', '09:30:00', '21:00:00', 68),
(412, 'samedi', '10:00:00', '15:30:00', 68);

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



--
-- Base de données: `coureur_nordique`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `disponibilitesemaine`
--

INSERT INTO `disponibilitesemaine` (`idDispoSemaine`, `noDispoSemaine`, `annee`, `nbHeureSouhaite`, `refIdSemaineACopier`, `courriel`) VALUES
(39, 10, 2014, 20, -1, 'alexisgagnon@bell.ca'),
(40, 10, 2014, 22, -1, 'Antoine.Demers@gmail.com'),
(41, 10, 2014, 12, -1, 'ari.demers@videotron.ca'),
(42, 10, 2014, 26, -1, 'caronvincent@hotmail.com'),
(43, 10, 2014, 14, -1, 'chantalp@videotron.ca'),
(44, 10, 2014, 16, -1, 'Charles.Delmaire@gmail.com'),
(45, 10, 2014, 25, -1, 'chloeleclerc@gmail.com'),
(46, 10, 2014, 30, -1, 'clara-st-amour@gmail.com'),
(47, 10, 2014, 40, -1, 'dav.cyr@gmail.com'),
(48, 10, 2014, 14, -1, 'francouelle93@gmail.com'),
(49, 10, 2014, 24, -1, 'justproulx@hotmail.com'),
(50, 10, 2014, 23, -1, 'marcantoine.bouchardm@gmail.com'),
(51, 10, 2014, 13, -1, 'maxime.aubin@gmail.com'),
(52, 10, 2014, 32, -1, 'megan.blais@bell.ca'),
(53, 10, 2014, 22, -1, 'mercier45@hotmail.fr'),
(54, 10, 2014, 28, -1, 'nathan.cote@videotron.ca'),
(55, 10, 2014, 12, -1, 'oli.tremblay@gmail.com'),
(56, 10, 2014, 26, -1, 'olivia.rochette@gmail.com'),
(57, 10, 2014, 30, -1, 'pbuteau@gmail.com'),
(58, 10, 2014, 27, -1, 'samuel.beland@live.ca'),
(59, 10, 2014, 33, -1, 'sarahpoirier@hotmail.com'),
(60, 10, 2014, 25, -1, 'sebastien.carrier@gmail.com'),
(61, 10, 2014, 23, -1, 'soucy.h@hotmail.ca'),
(62, 10, 2014, 28, -1, 'suzanneolivier@hotmail.com'),
(63, 10, 2014, 26, -1, 'suzie.stpierre@gmail.com'),
(64, 10, 2014, 16, -1, 'tristan.lemelin@gmail.com'),
(65, 10, 2014, 14, -1, 'vallaurier@gmail.com'),
(66, 10, 2014, 20, -1, 'victor.desjardins@gmail.com'),
(67, 10, 2014, 26, -1, 'willbrazz.hotmail.com'),
(68, 10, 2014, 25, -1, 'xavier.lapointe@gmail.com');

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