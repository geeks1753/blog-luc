-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 25 juin 2022 à 09:13
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
-- Base de données : `lucinv`
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ID`, `Image`, `Texte`, `Titre`, `Date`) VALUES
(1, 'inondation', 'Le 22 septembre 1992, à Vaison-la-Romaine (Vaucluse), l\'Ouvèze se transforme en un furieux torrent d\'eau et de boue <br>\r\n                        qui emporte tout sur son passage. La crue provoque 32 décès et quatre disparus. Près de 30 ans après, le traumatisme est resté. <br>\r\n                        Germain et Élise Ribot ont réussi à se sauver d\'extrême justesse. Leur maison a été engloutie par les flots. <br>\r\n                        \"L\'eau qui me poussait d\'un côté, l\'eau qui descendait d\'en haut, je ne savais plus où j\'étais. Quand je suis arrivé en haut, <br>\r\n                        je voyais ma maison qui partait [...] c\'était affreux\", se souvient Germain Ribot, très ému. Pour tenter de tourner la page, <br>\r\n                        ils ont rebâti une maison dans un autre quartier, loin de la rivière.', 'Inodation Vaison-la-Romaine', '1992-09-22'),
(2, 'incendie', ' L\'origine du Mendocino Comlex Fire, qui a ravagé la Californie entre juillet et septembre 2018,<br>\r\n                     vient d\'être révélée. Un homme aurait utilisé un poteau en métal pour boucher un nid de guêpes de son jardin,<br>\r\n                     provoquant une étincelle qui a mis le feu aux herbes.', ' Californie : les causes de l\'incendie meurtrier de 2018 enfin connues', '2018-09-19'),
(3, 'tsunami', 'Le dimanche 26 décembre 2004, à 7 h 58, heure locale, <br>\r\n                    un tremblement de terre de magnitude 9,3 se produit au large de l\'Indonésie,<br>\r\n                     déclenchant un tsunami dévastateur qui fait plus de 220 000 morts.', 'Tsunami Thaïlande', '2004-12-27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
