-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mars 2021 à 09:48
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc de diane`
--

-- --------------------------------------------------------

--
-- Structure de la table `announces`
--

DROP TABLE IF EXISTS `announces`;
CREATE TABLE IF NOT EXISTS `announces` (
  `announce_id` int NOT NULL AUTO_INCREMENT,
  `announce_title` varchar(100) NOT NULL,
  `announce_picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `announce_description` varchar(2000) NOT NULL,
  `announce_update_date` datetime NOT NULL,
  `user_id` int NOT NULL,
  `announce_category_id` int NOT NULL,
  PRIMARY KEY (`announce_id`),
  KEY `Announces_Users_FK` (`user_id`),
  KEY `Announces_Announce_categories0_FK` (`announce_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `announces`
--

INSERT INTO `announces` (`announce_id`, `announce_title`, `announce_picture`, `announce_description`, `announce_update_date`, `user_id`, `announce_category_id`) VALUES
(185, 'Table Mobilier Moss indus fer et bois', '6062df7c4c950.jpg', 'Table de salle à manger Mobilier MOSS en manguier massif et fer, style industriel.\r\nEn très bon état, pour 8 personnes, dimensions 180x90 cm.\r\nN\'hésitez pas à me contacter pour plus d\'informations.', '2021-03-30 08:21:16', 59, 3),
(186, 'Cours particuliers d\'espagnol', 'NULL', 'Cours particuliers d\'espagnol tous niveaux jusqu\'à la licence. Titulaire d\'une maîtrise en langues étrangères appliquées dont l\'Espagnol, j\'ai vécu et travaillé 7 ans à Madrid, et j\'ai 25 ans d\'expérience de l\'enseignement auprès des jeunes. Tarif en fonction de la demande.', '2021-03-30 08:21:54', 60, 1),
(187, 'Imprimante HP', '6062e9b4cd8f8.jpg', 'Imprimante scanner, vendue sans cartouche d’encre. 50 €', '2021-03-30 09:04:52', 55, 4),
(188, 'Garde d\'enfants', '6062e06708e91.jpg', 'Bonjour,\r\nJ’ai 25 ans et je suis actuellement étudiante en deuxième année d\'école d\'infirmière, je profite de mon temps libre pour vous proposer mes services pour garder vos enfants .\r\nMesures COVID adoptées.\r\nTarif en fonction de la demande.\r\n', '2021-03-30 08:25:11', 58, 2);

-- --------------------------------------------------------

--
-- Structure de la table `announce_categories`
--

DROP TABLE IF EXISTS `announce_categories`;
CREATE TABLE IF NOT EXISTS `announce_categories` (
  `announce_category_id` int NOT NULL AUTO_INCREMENT,
  `announce_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`announce_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `announce_categories`
--

INSERT INTO `announce_categories` (`announce_category_id`, `announce_category_name`) VALUES
(1, 'Cours particuliers'),
(2, 'Garde d\'enfants'),
(3, 'Mobilier'),
(4, 'Multimédia'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `usernames`
--

DROP TABLE IF EXISTS `usernames`;
CREATE TABLE IF NOT EXISTS `usernames` (
  `username_id` int NOT NULL AUTO_INCREMENT,
  `username_username` varchar(15) NOT NULL,
  PRIMARY KEY (`username_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usernames`
--

INSERT INTO `usernames` (`username_id`, `username_username`) VALUES
(1, '123456'),
(2, '123457'),
(4, '123458'),
(5, '999999'),
(6, '123459'),
(57, '123451'),
(58, '123452'),
(59, '123453'),
(60, '123454'),
(61, '123455'),
(69, '132456'),
(70, '132457'),
(71, '132458');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_lastname` varchar(100) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_tel` varchar(50) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_status_id` int NOT NULL DEFAULT '2',
  `username_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `Users_Users_status_FK` (`user_status_id`),
  KEY `Users_Usernames0_FK` (`username_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_lastname`, `user_firstname`, `user_tel`, `user_mail`, `user_password`, `user_status_id`, `username_id`) VALUES
(1, 'Prou', 'Tony', '0762326906', 'tonyprou@gmail.com', '$2y$10$Lh0LQV.WnLf7zE63rXKeuushy6u8wtzxFPG1BulZM5.D9.RHDn0CS', 1, 5),
(55, 'Faure', 'Paul', '0647859625', 'faurepaul@hotmail.fr', '$2y$10$HstQC/r9KIVT2UVefDOVy.DMPVMf1mCa4N6FAqykM8yXNuVqUIVAO', 2, 57),
(58, 'Chevalier', 'Lucie', '0685451296', 'chevalier@gmail.com', '$2y$10$0UyS0t.G9pJ10IEapEYstunAm/xUBk5peGax8uSsOSAaarokyHp7m', 2, 59),
(59, 'Renaud', 'Gabriel', '0685741269', 'renaudg@gmail.com', '$2y$10$cfKcpE0cu1De6/nwFQ0jqeT9Oil7qtTezUt8fbykZm56AFcQqrgei', 2, 60),
(60, 'Sanchez', 'Manon', '0674152565', 'sanchezm@hotmail.fr', '$2y$10$1K/6iQAT9/a5hjy5Ml2TaOY7JFixwfdFb80pBHHJvfqldiUaBHm5G', 2, 61),
(64, 'Marquez', 'Fernando', '0698543325', 'fernandomarquez@gmail.com', '$2y$10$t1IvEbtwuMWEwPhKUW/spO/1PbwAl7ewSK2Wup9XTRDvCyDsYB2ui', 2, 1),
(68, 'Leclerc', 'Sebatien', '0785452536', 'lerclercs@gmail.com', '$2y$10$7SJ/TaFqlyW6GB5hSF.Y7eKKE1gEoTz/V9cDGBvj14MWebyAs0NT2', 2, 58);

-- --------------------------------------------------------

--
-- Structure de la table `users_status`
--

DROP TABLE IF EXISTS `users_status`;
CREATE TABLE IF NOT EXISTS `users_status` (
  `user_status_id` int NOT NULL AUTO_INCREMENT,
  `user_status_role` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_status`
--

INSERT INTO `users_status` (`user_status_id`, `user_status_role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `announces`
--
ALTER TABLE `announces`
  ADD CONSTRAINT `Announces_Announce_categories0_FK` FOREIGN KEY (`announce_category_id`) REFERENCES `announce_categories` (`announce_category_id`),
  ADD CONSTRAINT `Announces_Users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_Usernames0_FK` FOREIGN KEY (`username_id`) REFERENCES `usernames` (`username_id`),
  ADD CONSTRAINT `Users_Users_status_FK` FOREIGN KEY (`user_status_id`) REFERENCES `users_status` (`user_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
