-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 20 Décembre 2024 à 13:02
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cyberfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `baobab`
--

CREATE TABLE `baobab` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `des` text NOT NULL,
  `titre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `baobab`
--

INSERT INTO `baobab` (`id`, `img`, `des`, `titre`) VALUES
(1, 'img1.webp', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris.', 'Exploration de Mars'),
(2, 'S2.jpg', 'Présentation de l\'avancement de notre projet à la semaine 2.', 'Présentation Semaine 2'),
(3, 'img2.jpeg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.', 'Voyage dans le temps'),
(4, 'img3.webp', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.', 'Intelligence artificielle'),
(5, 'img5.webp', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem.', 'Cités sous-marines');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `mail` text,
  `sujet` text NOT NULL,
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `mail`, `sujet`, `msg`) VALUES
(1, 'SKGFQDLFMKJGA', NULL, 'GJHFG', NULL),
(2, 'fqsdf', NULL, 'fqsdfqsdf', NULL),
(3, 'fqsdf', NULL, 'GJHFG', NULL),
(4, 'fgdfg', NULL, 'fgdgd', NULL),
(5, 'fgdfg', NULL, 'fgdgd', NULL),
(6, 'fgdfg', '', 'fgdgd', ''),
(7, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(26, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(27, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(28, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(29, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(30, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(31, 'sdfghj', 'sdfghjk@fghjk', 'azertyu', 'hrdrgdfc'),
(32, 'clement', 'clement@clem.com', 'leo', 'leo'),
(33, 'clement', 'clement.clement@gzregz', 'hgerhg', 'ehrh'),
(34, 'clement', 'clement.clement@gzregz', 'hgerhg', 'ehrh'),
(35, 'clement', 'clement.clement@gzregz', 'hgerhg', 'ehrh'),
(36, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(37, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(38, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(39, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(40, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(41, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(42, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(43, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(44, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(45, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(46, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(47, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(48, 'zizi', 'ziziz@er.com', 'zizi', 'zizi'),
(49, 'zizi', 'ziziz@er.com', 'zizi', 'zizi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `baobab`
--
ALTER TABLE `baobab`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `baobab`
--
ALTER TABLE `baobab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
