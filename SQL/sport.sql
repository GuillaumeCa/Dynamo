-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Avril 2016 à 09:21
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dynamo`
--

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_type` int(11) UNSIGNED DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`id`, `id_type`, `nom`, `description`) VALUES
(1, 1, 'Sprint', NULL),
(2, 1, 'Courses demi-fonds', NULL),
(3, 1, 'Courses de fond', NULL),
(4, 1, 'Marathon', NULL),
(5, 1, 'Marche', NULL),
(6, 1, 'Saut en hauteur', NULL),
(7, 1, 'Saut en longueur', NULL),
(8, 1, 'Triple saut', NULL),
(9, 1, 'Perche', NULL),
(10, 1, 'Lancer du poids', NULL),
(11, 1, 'Lancer du disque', NULL),
(12, 1, 'Lancer du javelot', NULL),
(13, 1, 'Lancer du marteau', NULL),
(14, 1, 'Décathlon', NULL),
(15, 1, 'Heptathlon', NULL),
(16, 1, 'Triathlon', NULL),
(17, 1, 'Relais', NULL),
(18, 2, 'Basket-ball', NULL),
(19, 2, 'Baseball', NULL),
(20, 2, 'Football', NULL),
(21, 2, 'Handball', NULL),
(22, 2, 'Rugby', NULL),
(23, 2, 'Volley-ball', NULL),
(24, 2, 'Water-polo', NULL),
(25, 2, 'Futsal', NULL),
(26, 2, 'Football américain', NULL),
(27, 2, 'Cricket', NULL),
(28, 2, 'Pétanque', NULL),
(29, 3, 'Sol', NULL),
(30, 3, 'Cheval d''arçons', NULL),
(31, 3, 'Anneaux', NULL),
(32, 3, 'Saut de cheval ', NULL),
(33, 3, 'Barres parallèles', NULL),
(34, 3, 'Barre fixe', NULL),
(35, 3, 'Barres asymétriques', NULL),
(36, 3, 'Poutre', NULL),
(37, 3, 'Rythmique', NULL),
(38, 3, 'Trampoline', NULL),
(39, 3, 'Aérobique', NULL),
(40, 3, 'Acrobatique', NULL),
(41, 3, 'Teamgym', NULL),
(42, 3, 'Sol', NULL),
(43, 3, 'Cheval d''arçons', NULL),
(44, 3, 'Anneaux', NULL),
(45, 3, 'Table de saut', NULL),
(46, 3, 'Barres parallèles', NULL),
(47, 3, 'Barre fixe', NULL),
(48, 3, 'Barres asymétriques', NULL),
(49, 3, 'Poutre', NULL),
(50, 3, 'Rythmique', NULL),
(51, 3, 'Trampoline', NULL),
(52, 3, 'Aérobique', NULL),
(53, 3, 'Acrobatique', NULL),
(54, 3, 'Teamgym', NULL),
(55, 3, 'Tumbling', NULL),
(56, 4, 'Course à étapes', NULL),
(57, 4, 'Course classique', NULL),
(58, 4, 'Contre-la-montre', NULL),
(59, 4, 'La vitesse', NULL),
(60, 4, 'La poursuite', NULL),
(61, 4, 'Le kilomètre', NULL),
(62, 4, 'VTT', NULL),
(63, 4, 'BMX', NULL),
(64, 5, 'Badminton', NULL),
(68, 5, 'Tennis', NULL),
(69, 5, 'Tennis de table', NULL),
(70, 5, 'Squash', NULL),
(71, 7, 'Aïkido‎', NULL),
(72, 7, 'Escrime‎', NULL),
(73, 7, 'Lutte libre', NULL),
(74, 7, 'Lutte gréco-romaine', NULL),
(75, 7, 'Judo', NULL),
(76, 7, 'Ju-jitsu', NULL),
(77, 7, 'Karaté', NULL),
(78, 7, 'Krav-maga', NULL),
(79, 7, 'Muay thaï‎', NULL),
(80, 7, 'Taekwondo‎', NULL),
(81, 7, 'Boxe anglaise', NULL),
(82, 7, 'Boxe française', NULL),
(83, 7, 'Combat libre', NULL),
(84, 7, 'Kick-boxing', NULL),
(85, 8, 'Patinage artistique', NULL),
(86, 8, 'Ballet sur glace', NULL),
(87, 8, 'Patinage de vitesse', NULL),
(88, 8, 'Bobsleigh', NULL),
(89, 8, 'Luge', NULL),
(90, 8, 'Curling', NULL),
(91, 8, 'Hockey sur glace', NULL),
(92, 9, 'Accrobranche', NULL),
(93, 9, 'Aviation', NULL),
(94, 9, 'Cerf volant', NULL),
(95, 9, 'Deltaplane', NULL),
(96, 9, ' Parachutisme', NULL),
(97, 9, ' Parapente', NULL),
(98, 10, 'Biathlon', NULL),
(99, 10, 'Bowling', NULL),
(100, 10, 'Fléchettes', NULL),
(101, 10, 'Paintball', NULL),
(102, 10, 'Pétanque', NULL),
(103, 10, ' Tir à l''arc', NULL),
(104, 10, 'Tir sportif', NULL),
(135, 11, 'Aviron', NULL),
(136, 11, 'Canoe-kayak', NULL),
(137, 11, 'Kitesurf', NULL),
(138, 11, 'Planche à voile', NULL),
(139, 11, 'Ski nautique', NULL),
(140, 11, 'Surf', NULL),
(141, 11, 'Voile', NULL),
(142, 11, 'Plongée libre', NULL),
(143, 11, 'Plongée sous-marine', NULL),
(144, 11, 'Rafting', NULL),
(145, 11, 'Natation synchro', NULL),
(146, 11, 'Natation', NULL),
(147, 11, 'Plongeon', NULL),
(148, 11, 'Nage avec palmes', NULL),
(149, 11, 'Water polo', NULL),
(150, 12, 'Planche à voile', NULL),
(151, 12, 'Kitesurf', NULL),
(152, 12, 'Surf', NULL),
(153, 12, 'Patin à roulettes', NULL),
(154, 12, 'Skateboard', NULL),
(155, 12, 'Snowkite,', NULL),
(156, 12, 'Patin à glace', NULL),
(157, 12, 'Patinage artistique', NULL),
(158, 12, 'Ski nautique', NULL),
(159, 12, 'Wakeboard', NULL),
(160, 12, 'Ski', NULL),
(161, 12, 'Snowboard', NULL),
(162, 12, 'Hockey', NULL),
(163, 12, 'Bobsleigh', NULL),
(164, 12, 'Skeleton', NULL),
(165, 12, 'Luge', NULL),
(166, 13, 'Aviation', NULL),
(167, 13, 'Giraviation', NULL),
(168, 13, 'Jetski', NULL),
(169, 13, 'Karting', NULL),
(170, 13, 'Moto cross', NULL),
(171, 13, 'Moto vitesse', NULL),
(172, 13, 'Motoneige', NULL),
(173, 13, 'Paramoteur', NULL),
(174, 13, 'Quad', NULL),
(175, 13, 'Rallye', NULL),
(176, 13, 'ULM', NULL),
(177, 14, 'Pêche sportive‎', NULL),
(178, 14, 'Sport canin', NULL),
(179, 14, 'Sport hippique‎', NULL),
(180, 14, 'Sport équestre', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `sport_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
