-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 02 Mars 2014 à 12:53
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=612 ;

--
-- Contenu de la table `disponibilitejours`
--

INSERT INTO `disponibilitejours` (`idDispoJours`, `jour`, `heureDebut`, `heureFin`, `idDispoSemaine`) VALUES
(413, 'dimanche', '10:00:00', '13:00:00', 69),
(414, 'dimanche', '14:00:00', '17:00:00', 69),
(415, 'lundi', '12:00:00', '18:00:00', 69),
(416, 'mercredi', '09:30:00', '18:00:00', 69),
(417, 'jeudi', '10:30:00', '13:30:00', 69),
(418, 'jeudi', '14:00:00', '17:00:00', 69),
(419, 'jeudi', '18:00:00', '21:00:00', 69),
(420, 'dimanche', '09:30:00', '17:00:00', 70),
(421, 'lundi', '15:00:00', '18:00:00', 70),
(422, 'mardi', '09:30:00', '14:30:00', 70),
(423, 'mercredi', '10:30:00', '17:00:00', 70),
(424, 'jeudi', '15:30:00', '21:00:00', 70),
(425, 'vendredi', '10:30:00', '15:30:00', 70),
(426, 'vendredi', '18:00:00', '21:00:00', 70),
(427, 'samedi', '09:30:00', '17:00:00', 70),
(428, 'dimanche', '14:00:00', '17:00:00', 71),
(429, 'lundi', '09:30:00', '14:00:00', 71),
(430, 'mardi', '09:30:00', '14:00:00', 71),
(431, 'mercredi', '09:30:00', '14:00:00', 71),
(432, 'jeudi', '09:30:00', '14:00:00', 71),
(433, 'samedi', '09:30:00', '14:00:00', 71),
(434, 'dimanche', '13:30:00', '17:00:00', 72),
(435, 'lundi', '13:30:00', '17:30:00', 72),
(436, 'mardi', '13:30:00', '17:30:00', 72),
(437, 'mercredi', '13:30:00', '17:30:00', 72),
(438, 'jeudi', '13:30:00', '17:30:00', 72),
(439, 'jeudi', '18:00:00', '21:00:00', 72),
(440, 'vendredi', '13:30:00', '17:30:00', 72),
(441, 'vendredi', '18:00:00', '21:00:00', 72),
(442, 'samedi', '13:30:00', '17:00:00', 72),
(443, 'dimanche', '09:30:00', '15:00:00', 73),
(444, 'lundi', '13:00:00', '18:00:00', 73),
(445, 'mardi', '09:30:00', '13:30:00', 73),
(446, 'mercredi', '11:30:00', '18:00:00', 73),
(447, 'jeudi', '09:30:00', '21:00:00', 73),
(448, 'vendredi', '09:30:00', '21:00:00', 73),
(449, 'samedi', '09:30:00', '15:00:00', 73),
(450, 'dimanche', '09:30:00', '17:00:00', 74),
(451, 'lundi', '09:30:00', '13:30:00', 74),
(452, 'lundi', '14:30:00', '18:00:00', 74),
(453, 'mardi', '12:00:00', '16:30:00', 74),
(454, 'mercredi', '09:30:00', '13:00:00', 74),
(455, 'mercredi', '14:00:00', '18:00:00', 74),
(456, 'jeudi', '09:30:00', '15:30:00', 74),
(457, 'vendredi', '09:30:00', '13:00:00', 74),
(458, 'vendredi', '17:00:00', '21:00:00', 74),
(459, 'samedi', '12:00:00', '17:00:00', 74),
(460, 'dimanche', '09:30:00', '17:00:00', 75),
(461, 'samedi', '09:30:00', '17:00:00', 75),
(462, 'dimanche', '11:00:00', '17:00:00', 76),
(463, 'lundi', '13:00:00', '18:00:00', 76),
(464, 'mardi', '09:30:00', '13:30:00', 76),
(465, 'mercredi', '12:00:00', '16:00:00', 76),
(466, 'jeudi', '12:00:00', '21:00:00', 76),
(467, 'vendredi', '12:00:00', '21:00:00', 76),
(468, 'mardi', '10:30:00', '17:00:00', 77),
(469, 'jeudi', '10:30:00', '17:00:00', 77),
(470, 'samedi', '10:30:00', '17:00:00', 77),
(471, 'dimanche', '09:30:00', '17:00:00', 78),
(472, 'lundi', '09:30:00', '18:00:00', 78),
(473, 'mardi', '09:30:00', '18:00:00', 78),
(474, 'mercredi', '09:30:00', '18:00:00', 78),
(475, 'jeudi', '09:30:00', '21:00:00', 78),
(476, 'vendredi', '09:30:00', '21:00:00', 78),
(477, 'samedi', '09:30:00', '17:00:00', 78),
(478, 'lundi', '09:30:00', '13:00:00', 79),
(479, 'lundi', '14:00:00', '18:00:00', 79),
(480, 'mardi', '09:30:00', '13:00:00', 79),
(481, 'mardi', '14:00:00', '18:00:00', 79),
(482, 'mercredi', '11:30:00', '18:00:00', 79),
(483, 'vendredi', '09:30:00', '13:30:00', 79),
(484, 'vendredi', '15:00:00', '19:30:00', 79),
(485, 'samedi', '11:00:00', '17:00:00', 79),
(486, 'dimanche', '12:00:00', '17:00:00', 80),
(487, 'lundi', '09:30:00', '14:00:00', 80),
(488, 'mardi', '14:00:00', '18:00:00', 80),
(489, 'mercredi', '09:30:00', '18:00:00', 80),
(490, 'jeudi', '11:00:00', '15:30:00', 80),
(491, 'jeudi', '17:30:00', '21:00:00', 80),
(492, 'vendredi', '10:00:00', '19:00:00', 80),
(493, 'samedi', '09:30:00', '17:00:00', 80),
(494, 'dimanche', '14:00:00', '17:00:00', 81),
(495, 'lundi', '14:00:00', '17:30:00', 81),
(496, 'mardi', '13:00:00', '17:00:00', 81),
(497, 'mercredi', '12:30:00', '16:30:00', 81),
(498, 'jeudi', '12:00:00', '16:00:00', 81),
(499, 'vendredi', '11:30:00', '15:30:00', 81),
(500, 'samedi', '11:00:00', '15:00:00', 81),
(501, 'dimanche', '09:30:00', '15:00:00', 82),
(502, 'lundi', '09:30:00', '16:00:00', 82),
(503, 'mardi', '13:00:00', '18:00:00', 82),
(504, 'mercredi', '11:30:00', '16:00:00', 82),
(505, 'jeudi', '09:30:00', '13:00:00', 82),
(506, 'jeudi', '16:00:00', '21:00:00', 82),
(507, 'samedi', '09:30:00', '12:30:00', 82),
(508, 'samedi', '13:30:00', '16:30:00', 82),
(509, 'mardi', '11:00:00', '18:00:00', 83),
(510, 'mercredi', '13:00:00', '16:00:00', 83),
(511, 'samedi', '10:00:00', '14:30:00', 83),
(512, 'dimanche', '13:00:00', '17:00:00', 84),
(513, 'lundi', '13:00:00', '18:00:00', 84),
(514, 'mardi', '09:30:00', '18:00:00', 84),
(515, 'mercredi', '09:30:00', '13:30:00', 84),
(516, 'mercredi', '14:30:00', '18:00:00', 84),
(517, 'jeudi', '13:00:00', '21:00:00', 84),
(518, 'vendredi', '09:30:00', '15:00:00', 84),
(519, 'samedi', '10:00:00', '13:00:00', 84),
(520, 'samedi', '13:30:00', '17:00:00', 84),
(521, 'dimanche', '09:30:00', '17:00:00', 85),
(522, 'lundi', '09:30:00', '17:00:00', 85),
(523, 'mardi', '10:30:00', '17:00:00', 85),
(524, 'jeudi', '10:00:00', '13:30:00', 85),
(525, 'jeudi', '14:00:00', '21:00:00', 85),
(526, 'vendredi', '09:30:00', '21:00:00', 85),
(527, 'dimanche', '12:00:00', '17:00:00', 86),
(528, 'lundi', '09:30:00', '18:00:00', 86),
(529, 'mardi', '09:30:00', '14:00:00', 86),
(530, 'mercredi', '13:00:00', '18:00:00', 86),
(531, 'jeudi', '10:00:00', '13:00:00', 86),
(532, 'jeudi', '14:00:00', '17:00:00', 86),
(533, 'jeudi', '18:00:00', '21:00:00', 86),
(534, 'vendredi', '10:00:00', '13:00:00', 86),
(535, 'vendredi', '14:00:00', '17:00:00', 86),
(536, 'vendredi', '18:00:00', '21:00:00', 86),
(537, 'dimanche', '09:30:00', '17:00:00', 87),
(538, 'lundi', '13:00:00', '18:00:00', 87),
(539, 'mardi', '11:00:00', '14:00:00', 87),
(540, 'mercredi', '09:30:00', '18:00:00', 87),
(541, 'jeudi', '09:30:00', '14:00:00', 87),
(542, 'vendredi', '15:30:00', '21:00:00', 87),
(543, 'samedi', '09:30:00', '17:00:00', 87),
(544, 'dimanche', '11:00:00', '17:00:00', 88),
(545, 'mercredi', '09:30:00', '18:00:00', 88),
(546, 'jeudi', '09:30:00', '21:00:00', 88),
(547, 'vendredi', '09:30:00', '21:00:00', 88),
(548, 'samedi', '11:30:00', '15:30:00', 88),
(549, 'dimanche', '11:00:00', '15:00:00', 89),
(550, 'lundi', '14:30:00', '18:00:00', 89),
(551, 'mardi', '10:30:00', '14:30:00', 89),
(552, 'mercredi', '10:30:00', '15:00:00', 89),
(553, 'vendredi', '10:00:00', '14:30:00', 89),
(554, 'samedi', '13:00:00', '17:00:00', 89),
(555, 'lundi', '12:00:00', '17:00:00', 90),
(556, 'mardi', '11:00:00', '17:00:00', 90),
(557, 'mercredi', '10:30:00', '17:00:00', 90),
(558, 'jeudi', '10:00:00', '17:00:00', 90),
(559, 'vendredi', '09:30:00', '17:00:00', 90),
(560, 'dimanche', '13:00:00', '17:00:00', 91),
(561, 'mardi', '09:30:00', '16:00:00', 91),
(562, 'mercredi', '11:30:00', '18:00:00', 91),
(563, 'jeudi', '09:30:00', '21:00:00', 91),
(564, 'samedi', '09:30:00', '14:00:00', 91),
(565, 'dimanche', '09:30:00', '12:30:00', 92),
(566, 'dimanche', '14:00:00', '17:00:00', 92),
(567, 'lundi', '12:00:00', '18:00:00', 92),
(568, 'mardi', '09:30:00', '14:30:00', 92),
(569, 'mercredi', '13:30:00', '18:00:00', 92),
(570, 'jeudi', '10:00:00', '13:30:00', 92),
(571, 'jeudi', '15:00:00', '21:00:00', 92),
(572, 'vendredi', '10:00:00', '13:30:00', 92),
(573, 'vendredi', '15:00:00', '21:00:00', 92),
(574, 'samedi', '09:30:00', '15:30:00', 92),
(575, 'dimanche', '13:00:00', '17:00:00', 93),
(576, 'lundi', '10:30:00', '18:00:00', 93),
(577, 'mardi', '09:30:00', '18:00:00', 93),
(578, 'mercredi', '12:30:00', '16:00:00', 93),
(579, 'jeudi', '10:00:00', '15:00:00', 93),
(580, 'jeudi', '17:30:00', '20:30:00', 93),
(581, 'vendredi', '11:00:00', '14:30:00', 93),
(582, 'vendredi', '15:30:00', '18:30:00', 93),
(583, 'samedi', '09:30:00', '17:00:00', 93),
(584, 'dimanche', '11:30:00', '15:30:00', 94),
(585, 'mardi', '11:30:00', '18:00:00', 94),
(586, 'mercredi', '10:30:00', '15:30:00', 94),
(587, 'vendredi', '09:30:00', '18:00:00', 94),
(588, 'dimanche', '14:00:00', '17:00:00', 95),
(589, 'lundi', '09:30:00', '18:00:00', 95),
(590, 'mercredi', '09:30:00', '18:00:00', 95),
(591, 'vendredi', '09:30:00', '21:00:00', 95),
(592, 'samedi', '13:00:00', '17:00:00', 95),
(593, 'lundi', '10:00:00', '17:00:00', 96),
(594, 'mardi', '12:00:00', '18:00:00', 96),
(595, 'mercredi', '10:00:00', '16:00:00', 96),
(596, 'jeudi', '15:30:00', '21:00:00', 96),
(597, 'vendredi', '15:30:00', '21:00:00', 96),
(598, 'samedi', '09:30:00', '15:00:00', 96),
(599, 'dimanche', '13:00:00', '17:00:00', 97),
(600, 'lundi', '11:00:00', '15:00:00', 97),
(601, 'mardi', '10:30:00', '15:30:00', 97),
(602, 'mercredi', '12:30:00', '18:00:00', 97),
(603, 'jeudi', '10:30:00', '16:30:00', 97),
(604, 'vendredi', '14:00:00', '21:00:00', 97),
(605, 'samedi', '10:30:00', '16:00:00', 97),
(606, 'dimanche', '11:00:00', '16:00:00', 98),
(607, 'lundi', '09:30:00', '18:00:00', 98),
(608, 'mardi', '12:00:00', '18:00:00', 98),
(609, 'jeudi', '09:30:00', '18:00:00', 98),
(610, 'vendredi', '13:30:00', '21:00:00', 98),
(611, 'samedi', '09:30:00', '17:00:00', 98);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Contenu de la table `disponibilitesemaine`
--

INSERT INTO `disponibilitesemaine` (`idDispoSemaine`, `noDispoSemaine`, `annee`, `nbHeureSouhaite`, `refIdSemaineACopier`, `courriel`) VALUES
(69, 11, 2014, 20, -1, 'alexisgagnon@bell.ca'),
(70, 11, 2014, 27, -1, 'Antoine.Demers@gmail.com'),
(71, 11, 2014, 23, -1, 'ari.demers@videotron.ca'),
(72, 11, 2014, 21, -1, 'caronvincent@hotmail.com'),
(73, 11, 2014, 32, -1, 'chantalp@videotron.ca'),
(74, 11, 2014, 30, -1, 'Charles.Delmaire@gmail.com'),
(75, 11, 2014, 14, -1, 'chloeleclerc@gmail.com'),
(76, 11, 2014, 25, -1, 'clara-st-amour@gmail.com'),
(77, 11, 2014, 18, -1, 'dav.cyr@gmail.com'),
(78, 11, 2014, 40, -1, 'francouelle93@gmail.com'),
(79, 11, 2014, 22, -1, 'justproulx@hotmail.com'),
(80, 11, 2014, 35, -1, 'marcantoine.bouchardm@gmail.com'),
(81, 11, 2014, 20, -1, 'maxime.aubin@gmail.com'),
(82, 11, 2014, 28, -1, 'megan.blais@bell.ca'),
(83, 11, 2014, 12, -1, 'mercier45@hotmail.fr'),
(84, 11, 2014, 35, -1, 'nathan.cote@videotron.ca'),
(85, 11, 2014, 28, -1, 'oli.tremblay@gmail.com'),
(86, 11, 2014, 30, -1, 'olivia.rochette@gmail.com'),
(87, 11, 2014, 27, -1, 'pbuteau@gmail.com'),
(88, 11, 2014, 33, -1, 'samuel.beland@live.ca'),
(89, 11, 2014, 18, -1, 'sarahpoirier@hotmail.com'),
(90, 11, 2014, 28, -1, 'sebastien.carrier@gmail.com'),
(91, 11, 2014, 29, -1, 'soucy.h@hotmail.ca'),
(92, 11, 2014, 32, -1, 'suzanneolivier@hotmail.com'),
(93, 11, 2014, 34, -1, 'suzie.stpierre@gmail.com'),
(94, 11, 2014, 24, -1, 'tristan.lemelin@gmail.com'),
(95, 11, 2014, 26, -1, 'vallaurier@gmail.com'),
(96, 11, 2014, 26, -1, 'victor.desjardins@gmail.com'),
(97, 11, 2014, 28, -1, 'willbrazz.hotmail.com'),
(98, 11, 2014, 32, -1, 'xavier.lapointe@gmail.com');

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