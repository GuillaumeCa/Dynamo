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
-- Structure de la table `sport_type`
--

DROP TABLE IF EXISTS `sport_type`;
CREATE TABLE IF NOT EXISTS `sport_type` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sport_type`
--

INSERT INTO `sport_type` (`id`, `nom`) VALUES
(1, 'Athlétisme'),
(2, 'Sports collectifs'),
(3, 'Gymnastique'),
(4, ' Cyclisme'),
(5, 'Sports de raquette '),
(6, 'Arts martiaux'),
(7, 'Sports de combat'),
(8, 'Sports de glace'),
(9, 'Sports aériens'),
(10, 'Sports de cible'),
(11, 'Sports nautiques'),
(12, 'Sports de glisse '),
(13, 'Sports mécaniques'),
(14, 'Sports avec animaux');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
