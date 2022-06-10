-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 nov. 2021 à 18:23
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
-- Base de données : `cinquaine`
--

CREATE DATABASE IF NOT EXISTS cinquaine;

USE cinquaine;

-- --------------------------------------------------------
--
-- Structure de la table `types_services`
--

DROP TABLE IF EXISTS `types_services`;
CREATE TABLE IF NOT EXISTS `types_services` (
  `id_type_service` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id_type_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `title` varchar(55) NOT NULL,
  `description` varchar(333) NOT NULL,
  -- In comment because does not correspond to actual project
  -- `image` varchar(255) NOT NULL,
  -- `description` varchar(333) NOT NULL
  PRIMARY KEY (`id_service`),
  KEY `id_type_service_fk` (`id_type_service`),
  KEY `id_user_fk` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
