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
