-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 14 oct. 2021 à 02:54
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Coupe`
--

-- --------------------------------------------------------

--
-- Structure de la table `classGA`
--

CREATE TABLE `classGA` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `MJ` int(11) NOT NULL,
  `MG` int(11) NOT NULL,
  `MN` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `BP` int(11) NOT NULL,
  `BC` int(11) NOT NULL,
  `DF` int(11) NOT NULL,
  `PT` int(11) NOT NULL,
  `typeGroup` varchar(40) NOT NULL DEFAULT 'GroupA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classGA`
--

INSERT INTO `classGA` (`id`, `nom`, `MJ`, `MG`, `MN`, `MP`, `BP`, `BC`, `DF`, `PT`, `typeGroup`) VALUES
(135, 'Allemagne', 3, 2, 1, 0, 6, 3, 3, 7, 'GroupA'),
(136, 'Haiti', 3, 2, 0, 1, 6, 4, 2, 6, 'GroupA'),
(133, 'Argentine', 3, 1, 0, 2, 3, 4, -1, 3, 'GroupA'),
(134, 'France', 3, 0, 1, 2, 3, 7, -4, 1, 'GroupA');

-- --------------------------------------------------------

--
-- Structure de la table `classGB`
--

CREATE TABLE `classGB` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `MJ` int(11) NOT NULL,
  `MG` int(11) NOT NULL,
  `MN` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `BP` int(11) NOT NULL,
  `BC` int(11) NOT NULL,
  `DF` int(11) NOT NULL,
  `PT` int(11) NOT NULL,
  `typeGroup` varchar(40) NOT NULL DEFAULT 'GroupB'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classGB`
--

INSERT INTO `classGB` (`id`, `nom`, `MJ`, `MG`, `MN`, `MP`, `BP`, `BC`, `DF`, `PT`, `typeGroup`) VALUES
(989, 'Bresil', 3, 3, 0, 0, 8, 2, 6, 9, 'GroupB'),
(992, 'Portugal', 3, 0, 2, 1, 5, 8, -3, 2, 'GroupB'),
(990, 'Italie', 2, 0, 1, 1, 3, 5, -2, 1, 'GroupB'),
(991, 'Espagne', 2, 0, 1, 1, 2, 3, -1, 1, 'GroupB');

-- --------------------------------------------------------

--
-- Structure de la table `Confrontation`
--

CREATE TABLE `Confrontation` (
  `idmatch` int(11) NOT NULL,
  `equipe1` int(11) NOT NULL,
  `equipe2` int(11) NOT NULL,
  `victoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Confrontation`
--

INSERT INTO `Confrontation` (`idmatch`, `equipe1`, `equipe2`, `victoire`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0),
(6, 0, 0, 0),
(7, 0, 0, 0),
(8, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `GroupA`
--

CREATE TABLE `GroupA` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `MJ` int(11) NOT NULL DEFAULT '0',
  `MG` int(11) NOT NULL DEFAULT '0',
  `MN` int(11) NOT NULL DEFAULT '0',
  `MP` int(11) NOT NULL DEFAULT '0',
  `BP` int(11) NOT NULL DEFAULT '0',
  `BC` int(11) NOT NULL DEFAULT '0',
  `DF` int(11) NOT NULL DEFAULT '0',
  `PT` int(11) NOT NULL DEFAULT '0',
  `typeGroup` varchar(40) NOT NULL DEFAULT 'GroupA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `GroupA`
--

INSERT INTO `GroupA` (`id`, `nom`, `MJ`, `MG`, `MN`, `MP`, `BP`, `BC`, `DF`, `PT`, `typeGroup`) VALUES
(137, 'Bresil', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupA'),
(138, 'Italie', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupA'),
(139, 'Allemagne', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupA'),
(140, 'Haiti', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupA');

-- --------------------------------------------------------

--
-- Structure de la table `GroupB`
--

CREATE TABLE `GroupB` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `MJ` int(11) NOT NULL DEFAULT '0',
  `MG` int(11) NOT NULL DEFAULT '0',
  `MN` int(11) NOT NULL DEFAULT '0',
  `MP` int(11) NOT NULL DEFAULT '0',
  `BP` int(11) NOT NULL DEFAULT '0',
  `BC` int(11) NOT NULL DEFAULT '0',
  `DF` int(11) NOT NULL DEFAULT '0',
  `PT` int(11) NOT NULL DEFAULT '0',
  `typeGroup` varchar(40) NOT NULL DEFAULT 'GroupB'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `GroupB`
--

INSERT INTO `GroupB` (`id`, `nom`, `MJ`, `MG`, `MN`, `MP`, `BP`, `BC`, `DF`, `PT`, `typeGroup`) VALUES
(993, 'Argentine', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupB'),
(994, 'France', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupB'),
(995, 'Espagne', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupB'),
(996, 'Portugal', 0, 0, 0, 0, 0, 0, 0, 0, 'GroupB');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `to_date`) VALUES
(1, 'J', '$2y$10$ctIpnhT50JXBBTwmP6.mrOBKXj5sypJIG460FAfP22WkW8y1mlrpO', 'j@gmail.com', '2021-09-30 19:57:31'),
(2, '', '$2y$10$PYnAUZPl34tBhX6Oix25Qurwz/6b.0mu4RbnpAYCIUt5qD7XNPQc6', '', '2021-09-30 20:11:27'),
(3, 'J', '$2y$10$aRXvSWBaFrjot1s17N/CZuseC6pK5CQ2TXjTiRwOza.tjPvoFliVC', '', '2021-10-01 15:52:44'),
(4, 'comptable', '$2y$10$3y2sLxz1oHvnQclhezTmsevqBE04B0Sf2g9wUzaCqBywLCl3fdxPW', '', '2021-10-06 15:22:49'),
(5, 'Sergeline', '$2y$10$B6hHpP1ZH3fqF0RxNGwpL.kzLP4dkUaeYwA5w96zKXI628VfWM8ua', 'j@gmail.com', '2021-10-07 15:49:31'),
(6, 'Jerry', '$2y$10$kQuXazQKzCt9cssRd8ucveR9EXVK4GJJcG4dxpXdVAj3uaEMi/f9u', 'k@gmail.com', '2021-10-08 00:51:39'),
(7, 'Jerry', '$2y$10$lH6.RLsqZxKVj08sgAdapOhZNXn.yPn8kEjQZHy3L8CBNl/A9OCGO', 'k@gmail.com', '2021-10-08 00:52:01'),
(8, 'Marv', '$2y$10$Ty3vfUPv2k1ov6i/3ilEcukUYwWNLwJOIIZo.5Qcq4pR8zhADQMEW', 'mv@gmail.com', '2021-10-08 00:53:35'),
(9, 'Jerry', '$2y$10$DyRAugo3ecpN6AjA1Oa7l.elWW2MkowxAh2XYtN/Jha8tgDQxM45e', 'k@gmail.com', '2021-10-08 00:54:50'),
(10, 'Jerry', '$2y$10$9Xg13dHLZXnf.aHWWNLaP.TCBHVkSUDHve5.bFjM7xkkVJslREsa.', 'k@gmail.com', '2021-10-08 00:55:20'),
(11, 'JerryJey34', '$2y$10$.p9NtCax78OwD7lZ6yb49uHiMaOseuqWnWj8Vg/llNqeW79bvaU1K', 'g@gmail.com', '2021-10-09 08:28:39'),
(12, 'Babby', '$2y$10$orYZR1aFPP27LaIpKyW8X./dLy4QfsAOj..yftoxG0T5OMC10w4JC', 'j@gmail.com', '2021-10-09 12:40:13'),
(13, 'Sergeline', '$2y$10$1Iw5voYUVmqV6OKE3qcoTO4LGiI1P.vW53NHrRwAloRO78JKvpYTy', 'j@gmail.com', '2021-10-09 12:45:16'),
(14, 'Jerry', '$2y$10$LH/z4rfvvysKZ5wf.n7XLuTpsasdv8lIT.vQ9Ey8zBjH9X/dabtL6', 'k@gmail.com', '2021-10-09 14:25:02'),
(15, 'Moise', '$2y$10$xOCJELV5ATelrUhaC.KdA.CFjp7SYW8.ir21G8r5vf2hH11cl1Pia', 'mv@gmail.com', '2021-10-09 16:21:48'),
(16, 'JerryJey34', '$2y$10$t7KXersSOQ03a7Kl1tww9.vItA0ghDUIeS0QPO5uJl4W/KPq4HWZ2', 'k@gmail.com', '2021-10-09 21:56:05'),
(17, 'NomUtilisateur', '$2y$10$uiDflrGvYEEvNapHVKl40OzzH2EeW4ig87h88hpfNoElWGRj623Oa', 'k@gmail.com', '2021-10-13 20:56:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classGA`
--
ALTER TABLE `classGA`
  ADD KEY `id` (`id`);

--
-- Index pour la table `Confrontation`
--
ALTER TABLE `Confrontation`
  ADD PRIMARY KEY (`idmatch`);

--
-- Index pour la table `GroupA`
--
ALTER TABLE `GroupA`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GroupB`
--
ALTER TABLE `GroupB`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Confrontation`
--
ALTER TABLE `Confrontation`
  MODIFY `idmatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `GroupA`
--
ALTER TABLE `GroupA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT pour la table `GroupB`
--
ALTER TABLE `GroupB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
