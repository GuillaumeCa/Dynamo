# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.27)
# Base de données: Dynamo
# Temps de génération: 2016-03-12 12:59:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table club
# ------------------------------------------------------------

DROP TABLE IF EXISTS `club`;

CREATE TABLE `club` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ville` int(11) unsigned DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ville` (`id_ville`),
  CONSTRAINT `club_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table club_sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `club_sport`;

CREATE TABLE `club_sport` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(11) unsigned DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_club` (`id_club`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `club_sport_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`),
  CONSTRAINT `club_sport_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table commentaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaire`;

CREATE TABLE `commentaire` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_club` int(11) unsigned DEFAULT NULL,
  `message` text,
  `date` datetime DEFAULT NULL,
  `note` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_club` (`id_club`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discussion`;

CREATE TABLE `discussion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_topic` int(11) unsigned DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_topic` (`id_topic`),
  CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe`;

CREATE TABLE `groupe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `id_club` int(11) unsigned DEFAULT NULL,
  `titre` varchar(30) NOT NULL DEFAULT '',
  `visibilité` tinyint(1) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `nbmaxutil` int(2) DEFAULT NULL,
  `creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`),
  KEY `id_sport` (`id_sport`),
  KEY `id_club` (`id_club`),
  CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`),
  CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table groupe_discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe_discussion`;

CREATE TABLE `groupe_discussion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_groupe` (`id_groupe`),
  CONSTRAINT `groupe_discussion_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `groupe_discussion_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table groupe_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe_message`;

CREATE TABLE `groupe_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_discussion` int(11) unsigned DEFAULT NULL,
  `texte` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_discussion` (`id_discussion`),
  CONSTRAINT `groupe_message_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `groupe_message_ibfk_2` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_discussion` int(11) unsigned DEFAULT NULL,
  `texte` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_discussion` (`id_discussion`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_ibfk_3` FOREIGN KEY (`id_sport`) REFERENCES `sport_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table planning
# ------------------------------------------------------------

DROP TABLE IF EXISTS `planning`;

CREATE TABLE `planning` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `activité` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dstart` datetime DEFAULT NULL,
  `dend` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sport`;

CREATE TABLE `sport` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_type` int(11) unsigned DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `sport_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table sport_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sport_type`;

CREATE TABLE `sport_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ville` int(11) unsigned DEFAULT NULL,
  `nom` varchar(30) NOT NULL DEFAULT '',
  `prénom` varchar(30) NOT NULL DEFAULT '',
  `pseudo` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `code_postal` int(7) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` char(30) DEFAULT NULL,
  `reset` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  KEY `id_ville` (`id_ville`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur_groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur_groupe`;

CREATE TABLE `utilisateur_groupe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) unsigned NOT NULL,
  `id_utilisateur` int(11) unsigned NOT NULL,
  `leader` tinyint(1) NOT NULL,
  `invite` tinyint(1) DEFAULT NULL,
  `invite_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  KEY `idusergroup` (`id_utilisateur`),
  CONSTRAINT `idusergroup` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `utilisateur_groupe_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur_sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur_sport`;

CREATE TABLE `utilisateur_sport` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `niveau_util` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `utilisateur_sport_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `utilisateur_sport_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table villes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `villes`;

CREATE TABLE `villes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ville_departement` varchar(3) DEFAULT NULL,
  `ville_slug` varchar(255) DEFAULT NULL,
  `ville_nom` varchar(45) DEFAULT NULL,
  `ville_nom_simple` varchar(45) DEFAULT NULL,
  `ville_nom_reel` varchar(45) DEFAULT NULL,
  `ville_nom_soundex` varchar(20) DEFAULT NULL,
  `ville_nom_metaphone` varchar(22) DEFAULT NULL,
  `ville_code_postal` varchar(255) DEFAULT NULL,
  `ville_commune` varchar(3) DEFAULT NULL,
  `ville_code_commune` varchar(5) NOT NULL,
  `ville_arrondissement` smallint(3) unsigned DEFAULT NULL,
  `ville_canton` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ville_code_commune_2` (`ville_code_commune`),
  UNIQUE KEY `ville_slug` (`ville_slug`),
  KEY `ville_departement` (`ville_departement`),
  KEY `ville_nom` (`ville_nom`),
  KEY `ville_nom_reel` (`ville_nom_reel`),
  KEY `ville_code_commune` (`ville_code_commune`),
  KEY `ville_code_postal` (`ville_code_postal`),
  KEY `ville_nom_soundex` (`ville_nom_soundex`),
  KEY `ville_nom_metaphone` (`ville_nom_metaphone`),
  KEY `ville_nom_simple` (`ville_nom_simple`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
