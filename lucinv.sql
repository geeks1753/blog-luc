-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 juil. 2022 à 09:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `journal`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(15) NOT NULL,
  `Texte` text NOT NULL,
  `Titre` text NOT NULL,
  `Date` date NOT NULL,
  `Resume` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ID`, `Image`, `Texte`, `Titre`, `Date`, `Resume`) VALUES
(9, 'incendie', 'bvjkogurgpajj ffioef fo fmginim\'éééénjkmnjmd j\"méruçà^klmdvnnklmsd jmknferoifgjrùghiuygoçuàç-utingvknvw:xwndmvimnbmfoibkl!nbknvkn njdfmwli(tuimjvnd!kl<nd;', 'Le plus grand incendie des états Unis', '2002-07-10', 'bvjkogurgpajj ffioef fo fmginim\'éééénjkmnjmd ............');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Commentaire` text NOT NULL,
  `Date` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Art` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`ID`, `Pseudo`, `Commentaire`, `Date`, `article_id`) VALUES
(13, 'claude', 'coucou', '2022-07-03 11:08:41', 9),
(14, 'pierre', 'salut', '2022-07-03 11:21:14', 9);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
