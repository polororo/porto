-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 19 Décembre 2024 à 08:52
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbd`
--

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
(8, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(9, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(10, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(11, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(12, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(13, 'fgdfg', 'gergmistral292@gmail.com', 'fgdgd', 'segtrdyui'),
(14, 'fdsfsdf', 'gergmistral292@gmail.com', 'dfsdfsdf', 'dfsqfqdsfqsdfqsdf'),
(15, 'ogfqhsdflkjsdgf', 'dyfgsdkf@dgdfgsdfg', 'coucou les amisÂ²', 'coucou les amisssssss'),
(16, 'fqsdf', 'dfqsdfqsdfqsdf@dfsqdf', 'fsdqfqsdfqsdf', 'qsfqsdfqhf qsf qsf qsdf '),
(17, 'sdfghjklRTYIOIUGF', 'fguiop@FGHOfgh', 'fghkjlk', 'ok test'),
(18, 'fqsdfqsdf', 'qsdfqsfqsdf@ddd', 'fqdfqsdf', 'fqsdfqsdf'),
(19, 'fqsdfqsdf', 'qsdfqsfqsdf@ddd', 'fqdfqsdf', 'fqsdfqsdf'),
(20, 'fqsdfqsdf', 'qsdfqsfqsdf@ddd', 'fqdfqsdf', 'fqsdfqsdf'),
(21, 'dfghjklmÃ¹', 'rtghjklm@fghjkl', 'dfghjklmÃ¹', 'testt'),
(22, 'dfghjklmÃ¹', 'rtghjklm@fghjkl', 'dfghjklmÃ¹', 'testt'),
(23, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(24, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(25, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(26, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(27, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(28, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(29, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(30, 'leo', 'polo@polo', 'testt', 'avis de plainte'),
(31, 'sdfghj', 'sdfghjk@fghjk', 'azertyu', 'hrdrgdfc');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
