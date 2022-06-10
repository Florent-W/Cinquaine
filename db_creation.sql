-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 10 juin 2022 à 11:55
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ajust`
--

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `id_type_service` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(333) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `date_start`, `date_end`, `id_type_service`, `price`, `id_user`, `title`, `image`, `description`) VALUES
(44, '2021-12-29 19:43:00', '2021-12-29 19:43:01', 1, '1.00', 1, 'Title', '0', 'description vide');

-- --------------------------------------------------------

--
-- Structure de la table `service_acheteurs`
--

CREATE TABLE `service_acheteurs` (
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_services`
--

CREATE TABLE `types_services` (
  `id_type_service` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `balance`, `email`, `phone_number`) VALUES
(1, 'pablo', 'tes', 10, 'a', '01981901'),
(2, 'pablito', 'escobart', 0, '', ''),
(3, 'test', 'a', 20, 'b', '2'),
(4, 'test', 'a', 20, 'b', '2'),
(9, 'b', 'a', 20, 'b', '2'),
(11, 'test', 'a', 20, 'b', '2'),
(12, 'user', '$2y$10$KVhl.NjNLVN2.rUls8IbH.AncJXeQb5zF6NgcOJZfjgJRxJk.0X1K', 0, 'user@test.com', '0123456789'),
(14, 'Flo', '$2y$10$JfyuzkTPesxI.kqE/Iok8ez7W/gN4hWshnLDc4/DjwHO8Jv5.is7.', 0, 'user@test.flo', '1679843058');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_type_service_fk` (`id_type_service`),
  ADD KEY `id_user_fk` (`id_user`);

--
-- Index pour la table `service_acheteurs`
--
ALTER TABLE `service_acheteurs`
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `types_services`
--
ALTER TABLE `types_services`
  ADD PRIMARY KEY (`id_type_service`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `types_services`
--
ALTER TABLE `types_services`
  MODIFY `id_type_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `service_acheteurs`
--
ALTER TABLE `service_acheteurs`
  ADD CONSTRAINT `service_acheteurs_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`),
  ADD CONSTRAINT `service_acheteurs_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
