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
(9, 11, 2014, 12, -1, 'alexisgagnon@bell.ca'),
(10, 11, 2014, 25, -1, 'Antoine.Demers@gmail.com'),
(11, 11, 2014, 40, -1, 'ari.demers@videotron.ca'),
(12, 11, 2014, 15, -1, 'chantalp@videotron.ca'),
(13, 11, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
(14, 11, 2014, 31, -1, 'chloeleclerc@gmail.com'),
(15, 11, 2014, 14, -1, 'clara-st-amour@gmail.com'),
(16, 11, 2014, 25, -1, 'dav.cyr@gmail.com'),
(17, 11, 2014, 39, -1, 'mercier45@hotmail.fr'),
(18, 11, 2014, 33, -1, 'francouelle93@gmail.com'),
(19, 11, 2014, 26, -1, 'soucy.h@hotmail.ca'),
(20, 11, 2014, 38, -1, 'justproulx@hotmail.com'),
(21, 11, 2014, 14, -1, 'marcantoine.bouchardm@gmail.com'),
(22, 11, 2014, 27, -1, 'maxime.aubin@gmail.com'),
(23, 11, 2014, 26, -1, 'megan.blais@bell.ca'),
(24, 11, 2014, 18, -1, 'nathan.cote@videotron.ca'),
(25, 11, 2014, 17, -1, 'olivia.rochette@gmail.com'),
(26, 11, 2014, 40, -1, 'oli.tremblay@gmail.com'),
(27, 11, 2014, 38, -1, 'pbuteau@gmail.com'),
(28, 11, 2014, 16, -1, 'samuel.beland@live.ca'),
(29, 11, 2014, 36, -1, 'sarahpoirier@hotmail.com'),
(30, 11, 2014, 18, -1, 'sebastien.carrier@gmail.com'),
(31, 11, 2014, 26, -1, 'suzanneolivier@hotmail.com'),
(32, 11, 2014, 26, -1, 'suzie.stpierre@gmail.com'),
(33, 11, 2014, 40, -1, 'tristan.lemelin@gmail.com'),
(34, 11, 2014, 40, -1, 'victor.desjardins@gmail.com'),
(35, 11, 2014, 21, -1, 'caronvincent@hotmail.com'),
(36, 11, 2014, 38, -1, 'willbrazz.hotmail.com'),
(37, 11, 2014, 25, -1, 'xavier.lapointe@gmail.com'),


(38, 12, 2014, 12, -1, 'alexisgagnon@bell.ca'),
(39, 12, 2014, 25, -1, 'Antoine.Demers@gmail.com'),
(40, 12, 2014, 40, -1, 'ari.demers@videotron.ca'),
(41, 12, 2014, 15, -1, 'chantalp@videotron.ca'),
(42, 12, 2014, 25, -1, 'Charles.Delmaire@gmail.com'),
(43, 12, 2014, 31, -1, 'chloeleclerc@gmail.com'),
(44, 12, 2014, 14, -1, 'clara-st-amour@gmail.com'),
(45, 12, 2014, 25, -1, 'dav.cyr@gmail.com'),
(46, 12, 2014, 39, -1, 'mercier45@hotmail.fr'),
(47, 12, 2014, 33, -1, 'francouelle93@gmail.com'),
(48, 12, 2014, 26, -1, 'soucy.h@hotmail.ca'),
(49, 12, 2014, 38, -1, 'justproulx@hotmail.com'),
(50, 12, 2014, 14, -1, 'marcantoine.bouchardm@gmail.com'),
(51, 12, 2014, 27, -1, 'maxime.aubin@gmail.com'),
(52, 12, 2014, 26, -1, 'megan.blais@bell.ca'),
(53, 12, 2014, 18, -1, 'nathan.cote@videotron.ca'),
(54, 12, 2014, 17, -1, 'olivia.rochette@gmail.com'),
(55, 12, 2014, 40, -1, 'oli.tremblay@gmail.com'),
(56, 12, 2014, 38, -1, 'pbuteau@gmail.com'),
(57, 12, 2014, 16, -1, 'samuel.beland@live.ca'),
(58, 12, 2014, 36, -1, 'sarahpoirier@hotmail.com'),
(59, 12, 2014, 18, -1, 'sebastien.carrier@gmail.com'),
(60, 12, 2014, 26, -1, 'suzanneolivier@hotmail.com'),
(61, 12, 2014, 26, -1, 'suzie.stpierre@gmail.com'),
(62, 12, 2014, 40, -1, 'tristan.lemelin@gmail.com'),
(63, 12, 2014, 40, -1, 'victor.desjardins@gmail.com'),
(64, 12, 2014, 21, -1, 'caronvincent@hotmail.com'),
(65, 12, 2014, 38, -1, 'willbrazz.hotmail.com'),
(66, 12, 2014, 25, -1, 'xavier.lapointe@gmail.com');






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
    -- Contraintes pour la table `ancienhoraire`
    --
    ALTER TABLE `ancienhoraire`
        ADD CONSTRAINT `fk_AncienHoraire_Employe1` FOREIGN KEY (`courriel`) REFERENCES `employe` (`courriel`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
	-- Contraintes pour la table `ressource`
	--
	ALTER TABLE `ressource`
	  ADD CONSTRAINT `fk_noRessourceMere` FOREIGN KEY (`noBlocRessource`) REFERENCES `ressourcemere` (`idBlocRessource`) ON DELETE CASCADE ON UPDATE NO ACTION;

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