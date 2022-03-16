-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 jan. 2022 à 19:30
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
-- Base de données : `cinquantaine`
--

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `id_type_service` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_service`),
  KEY `id_type_service_fk` (`id_type_service`),
  KEY `id_user_fk` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `date_start`, `date_end`, `id_type_service`, `price`, `id_user`, `title`) VALUES
(35, '2021-12-29 19:43:00', '2021-12-31 19:43:00', 1, '1.00', 1, 'b');

-- --------------------------------------------------------

--
-- Structure de la table `types_services`
--

DROP TABLE IF EXISTS `types_services`;
CREATE TABLE IF NOT EXISTS `types_services` (
  `id_type_service` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_type_service`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_services`
--

INSERT INTO `types_services` (`id_type_service`, `name`) VALUES
(1, 'a'),
(3, 'test'),
(4, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `balance` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `balance`, `email`, `phone_number`) VALUES
(1, 'pablo', 'tes', 10, 'a', '01981901'),
(2, 'pablito', 'escobart', 0, '', ''),
(3, 'test', 'a', 20, 'b', '2'),
(4, 'test', 'a', 20, 'b', '2'),
(9, 'b', 'a', 20, 'b', '2'),
(11, 'test', 'a', 20, 'b', '2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `id_type_service_fk` FOREIGN KEY (`id_type_service`) REFERENCES `types_services` (`id_type_service`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
