# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.27)
# Base de données: Dynamo
# Temps de génération: 2016-05-03 08:27:17 +0000
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

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;

INSERT INTO `club` (`id`, `id_ville`, `nom`)
VALUES
	(1,520,'Forest Hill');

/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table club_sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `club_sport`;

CREATE TABLE `club_sport` (
  `id_club` int(11) unsigned DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  KEY `id_club` (`id_club`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `club_sport_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`),
  CONSTRAINT `club_sport_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `club_sport` WRITE;
/*!40000 ALTER TABLE `club_sport` DISABLE KEYS */;

INSERT INTO `club_sport` (`id_club`, `id_sport`)
VALUES
	(1,2),
	(1,1);

/*!40000 ALTER TABLE `club_sport` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `discussion` WRITE;
/*!40000 ALTER TABLE `discussion` DISABLE KEYS */;

INSERT INTO `discussion` (`id`, `id_utilisateur`, `id_topic`, `titre`, `creation`)
VALUES
	(1,1,NULL,'test discussion','2016-03-25 00:00:00');

/*!40000 ALTER TABLE `discussion` ENABLE KEYS */;
UNLOCK TABLES;


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
  `dept` varchar(4) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`),
  KEY `id_sport` (`id_sport`),
  KEY `id_club` (`id_club`),
  CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`),
  CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;

INSERT INTO `groupe` (`id`, `id_sport`, `id_club`, `titre`, `visibilité`, `description`, `nbmaxutil`, `creation`, `dept`)
VALUES
	(1,1,1,'groupe 3',0,'test',5,NULL,'03'),
	(2,23,1,'groupe 2',1,'desc',2,NULL,'04'),
	(3,30,1,'groupe 1',1,'desc',4,NULL,'05'),
	(4,44,1,'groupe 4',1,NULL,3,NULL,'04'),
	(5,52,1,'groupe 5',1,NULL,45,NULL,'02'),
	(6,73,1,'groupe 6',1,NULL,75,NULL,'06'),
	(7,84,1,'groupe 7',1,NULL,4,NULL,'07'),
	(8,24,1,'groupe 8',1,NULL,5,NULL,'03'),
	(9,140,1,'groupe 9',1,NULL,4,NULL,'02'),
	(10,180,1,'tennis groupe',1,NULL,5,NULL,'04');

/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table groupe_discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe_discussion`;

CREATE TABLE `groupe_discussion` (
  `id_groupe` int(11) unsigned NOT NULL,
  `id_discussion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_groupe`,`id_discussion`),
  KEY `id_discussion` (`id_discussion`),
  CONSTRAINT `groupe_discussion_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`),
  CONSTRAINT `groupe_discussion_ibfk_2` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groupe_discussion` WRITE;
/*!40000 ALTER TABLE `groupe_discussion` DISABLE KEYS */;

INSERT INTO `groupe_discussion` (`id_groupe`, `id_discussion`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `groupe_discussion` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `planning` WRITE;
/*!40000 ALTER TABLE `planning` DISABLE KEYS */;

INSERT INTO `planning` (`id`, `id_groupe`, `activité`, `description`, `date`, `dstart`, `dend`)
VALUES
	(1,2,'Entrainement','rien','2016-01-03','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(2,1,'Course à pied','rien','2016-01-04','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(3,2,'Concours','rien','2016-01-03','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(5,3,'Entrainement 1','Test de description. blablabla...','2016-03-03','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(6,3,'Echauffement','rien','2016-03-03','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(7,3,'Test','rien','2016-03-03','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(8,1,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(9,2,'Test','rien','2016-03-06','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(10,3,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(11,4,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(12,5,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(13,6,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(14,7,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(15,8,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(16,9,'Test','rien','2016-03-05','2016-03-03 09:00:00','2016-03-03 11:00:00'),
	(17,2,'Entrainement #1','a','2016-05-02','2016-05-02 09:00:00','2016-05-02 11:00:00'),
	(18,2,'Entrainement #2','b','2016-05-03','2016-05-02 09:00:00','2016-05-02 10:00:00'),
	(19,2,'Course','e','2016-05-02','2016-05-02 12:00:00','2016-05-02 13:00:00');

/*!40000 ALTER TABLE `planning` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;

INSERT INTO `sport` (`id`, `id_type`, `nom`, `description`)
VALUES
	(1,1,'Sprint',NULL),
	(2,1,'Courses demi-fonds',NULL),
	(3,1,'Courses de fond',NULL),
	(4,1,'Marathon',NULL),
	(5,1,'Marche',NULL),
	(6,1,'Saut en hauteur',NULL),
	(7,1,'Saut en longueur',NULL),
	(8,1,'Triple saut',NULL),
	(9,1,'Perche',NULL),
	(10,1,'Lancer du poids',NULL),
	(11,1,'Lancer du disque',NULL),
	(12,1,'Lancer du javelot',NULL),
	(13,1,'Lancer du marteau',NULL),
	(14,1,'Décathlon',NULL),
	(15,1,'Heptathlon',NULL),
	(16,1,'Triathlon',NULL),
	(17,1,'Relais',NULL),
	(18,2,'Basket-ball',NULL),
	(19,2,'Baseball',NULL),
	(20,2,'Football',NULL),
	(21,2,'Handball',NULL),
	(22,2,'Rugby',NULL),
	(23,2,'Volley-ball',NULL),
	(24,2,'Water-polo',NULL),
	(25,2,'Futsal',NULL),
	(26,2,'Football américain',NULL),
	(27,2,'Cricket',NULL),
	(28,2,'Pétanque',NULL),
	(29,3,'Sol',NULL),
	(30,3,'Cheval d\'arçons',NULL),
	(31,3,'Anneaux',NULL),
	(32,3,'Saut de cheval ',NULL),
	(33,3,'Barres parallèles',NULL),
	(34,3,'Barre fixe',NULL),
	(35,3,'Barres asymétriques',NULL),
	(36,3,'Poutre',NULL),
	(37,3,'Rythmique',NULL),
	(38,3,'Trampoline',NULL),
	(39,3,'Aérobique',NULL),
	(40,3,'Acrobatique',NULL),
	(41,3,'Teamgym',NULL),
	(42,3,'Sol',NULL),
	(43,3,'Cheval d\'arçons',NULL),
	(44,3,'Anneaux',NULL),
	(45,3,'Table de saut',NULL),
	(46,3,'Barres parallèles',NULL),
	(47,3,'Barre fixe',NULL),
	(48,3,'Barres asymétriques',NULL),
	(49,3,'Poutre',NULL),
	(50,3,'Rythmique',NULL),
	(51,3,'Trampoline',NULL),
	(52,3,'Aérobique',NULL),
	(53,3,'Acrobatique',NULL),
	(54,3,'Teamgym',NULL),
	(55,3,'Tumbling',NULL),
	(56,4,'Course à étapes','Description de sport'),
	(57,4,'Course classique',NULL),
	(58,4,'Contre-la-montre',NULL),
	(59,4,'La vitesse',NULL),
	(60,4,'La poursuite',NULL),
	(61,4,'Le kilomètre',NULL),
	(62,4,'VTT',NULL),
	(63,4,'BMX',NULL),
	(64,5,'Badminton',NULL),
	(68,5,'Tennis',NULL),
	(69,5,'Tennis de table',NULL),
	(70,5,'Squash',NULL),
	(71,7,'Aïkido‎',NULL),
	(72,7,'Escrime‎',NULL),
	(73,7,'Lutte libre',NULL),
	(74,7,'Lutte gréco-romaine',NULL),
	(75,7,'Judo',NULL),
	(76,7,'Ju-jitsu',NULL),
	(77,7,'Karaté',NULL),
	(78,7,'Krav-maga',NULL),
	(79,7,'Muay thaï‎',NULL),
	(80,7,'Taekwondo‎',NULL),
	(81,7,'Boxe anglaise',NULL),
	(82,7,'Boxe française',NULL),
	(83,7,'Combat libre',NULL),
	(84,7,'Kick-boxing',NULL),
	(85,8,'Patinage artistique',NULL),
	(86,8,'Ballet sur glace',NULL),
	(87,8,'Patinage de vitesse',NULL),
	(88,8,'Bobsleigh',NULL),
	(89,8,'Luge',NULL),
	(90,8,'Curling',NULL),
	(91,8,'Hockey sur glace',NULL),
	(92,9,'Accrobranche',NULL),
	(93,9,'Aviation',NULL),
	(94,9,'Cerf volant',NULL),
	(95,9,'Deltaplane',NULL),
	(96,9,' Parachutisme',NULL),
	(97,9,' Parapente',NULL),
	(98,10,'Biathlon',NULL),
	(99,10,'Bowling',NULL),
	(100,10,'Fléchettes',NULL),
	(101,10,'Paintball',NULL),
	(102,10,'Pétanque',NULL),
	(103,10,' Tir à l\'arc',NULL),
	(104,10,'Tir sportif',NULL),
	(135,11,'Aviron',NULL),
	(136,11,'Canoe-kayak',NULL),
	(137,11,'Kitesurf',NULL),
	(138,11,'Planche à voile',NULL),
	(139,11,'Ski nautique',NULL),
	(140,11,'Surf',NULL),
	(141,11,'Voile',NULL),
	(142,11,'Plongée libre',NULL),
	(143,11,'Plongée sous-marine',NULL),
	(144,11,'Rafting',NULL),
	(145,11,'Natation synchro',NULL),
	(146,11,'Natation',NULL),
	(147,11,'Plongeon',NULL),
	(148,11,'Nage avec palmes',NULL),
	(149,11,'Water polo',NULL),
	(150,12,'Planche à voile',NULL),
	(151,12,'Kitesurf',NULL),
	(152,12,'Surf',NULL),
	(153,12,'Patin à roulettes',NULL),
	(154,12,'Skateboard',NULL),
	(155,12,'Snowkite,',NULL),
	(156,12,'Patin à glace',NULL),
	(157,12,'Patinage artistique',NULL),
	(158,12,'Ski nautique',NULL),
	(159,12,'Wakeboard',NULL),
	(160,12,'Ski',NULL),
	(161,12,'Snowboard',NULL),
	(162,12,'Hockey',NULL),
	(163,12,'Bobsleigh',NULL),
	(164,12,'Skeleton',NULL),
	(165,12,'Luge',NULL),
	(166,13,'Aviation',NULL),
	(167,13,'Giraviation',NULL),
	(168,13,'Jetski',NULL),
	(169,13,'Karting',NULL),
	(170,13,'Moto cross',NULL),
	(171,13,'Moto vitesse',NULL),
	(172,13,'Motoneige',NULL),
	(173,13,'Paramoteur',NULL),
	(174,13,'Quad',NULL),
	(175,13,'Rallye',NULL),
	(176,13,'ULM',NULL),
	(177,14,'Pêche sportive‎',NULL),
	(178,14,'Sport canin',NULL),
	(179,14,'Sport hippique‎',NULL),
	(180,14,'Sport équestre',NULL);

/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table sport_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sport_type`;

CREATE TABLE `sport_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sport_type` WRITE;
/*!40000 ALTER TABLE `sport_type` DISABLE KEYS */;

INSERT INTO `sport_type` (`id`, `nom`)
VALUES
	(1,'Athlétisme'),
	(2,'Sports collectifs'),
	(3,'Gymnastique'),
	(4,'Cyclisme'),
	(5,'Sports de raquette '),
	(7,'Sports de combat'),
	(8,'Sports de glace'),
	(9,'Sports aériens'),
	(10,'Sports de cible'),
	(11,'Sports nautiques'),
	(12,'Sports de glisse '),
	(13,'Sports mécaniques'),
	(14,'Sports avec animaux');

/*!40000 ALTER TABLE `sport_type` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;

INSERT INTO `topic` (`id`, `nom`)
VALUES
	(1,'general');

/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;


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
  `admin` tinyint(1) DEFAULT '0',
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
  `leader` tinyint(1) NOT NULL DEFAULT '0',
  `invite` tinyint(1) NOT NULL DEFAULT '0',
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
  `id` int(11) unsigned NOT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `niveau_util` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `utilisateur_sport_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `utilisateur_sport_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
