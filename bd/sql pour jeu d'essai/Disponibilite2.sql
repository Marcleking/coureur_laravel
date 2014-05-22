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