-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 12 Décembre 2019 à 22:39
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  'test'
--

-- --------------------------------------------------------



--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `nameResto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `specialite` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nb_table_dispo` int(11) NOT NULL,
  `nb_table_prise` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`nameResto`, `adress`, `specialite`, `nb_table_dispo`, `nb_table_prise`, `description`, `longitude`, `latitude`) VALUES
('italienFood', '23,rue saint-michel 75000 paris', 'italien', 5, 6, 'je suis un restaurant mexicain', '2.3478589', '48.8603105'),
('petitGrec', '22, place de la republique 75000 paris', 'fastfood', 3, 8, 'je suis un fastfood', '2.34335', '48.8591670');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `tel` char(10) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmation_att` datetime DEFAULT NULL,
  `reset_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_att` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idusers`, `username`, `email`, `password`, `confirmation_token`, `confirmation_att`, `reset_token`, `reset_att`) VALUES
(43, 'adam', 'adam_sdiri@outlook.fr', '$2y$10$PTtvcICiVx5wdFTuFhnrT.CSyxuJxQy4eGBhUlRQMZ3PeTqe6FTDS', NULL, '2019-11-29 13:16:16', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`adress`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
