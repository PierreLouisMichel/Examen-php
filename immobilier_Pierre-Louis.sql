-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 juin 2019 à 17:26
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier_Pierre-Louis`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Maison_sympa', '88 rue franchement sympa', 'Ville sympa', '51374', 25, 50000, 'product_1.jpg', 'maison', 'Maison franchement très sympa'),
(2, 'Maison Hanté', '5 rue qui est hanté', 'ville hanté', '10000', 50, 10000, 'product_2.jpg', 'maison', 'Maison qui fait franchement peur'),
(10, 'Maison_banal', '9 rue banal', 'Lyon', '69008', 35, 50000, 'product_10.jpg', 'maison', 'une maison relativement banale'),
(14, 'test', 'test', 'test', '10000', 60, 60000, 'product_14.jpg', 'maison', 'test'),
(15, 'maison avec piscine', '55 rue des piscines', 'Replonge', '01290', 55, 60000, 'product_15.jpg', 'maison', 'Maison avec une piscine remplit d\'eau.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
