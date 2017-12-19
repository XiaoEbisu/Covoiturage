-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 déc. 2017 à 20:14
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covoiturage`
--
CREATE DATABASE IF NOT EXISTS `covoiturage` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `covoiturage`;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `IdU` int(20) NOT NULL,
  `Id_Trajet` int(30) NOT NULL,
  `placeReserve` int(20) NOT NULL,
  PRIMARY KEY (`IdU`,`Id_Trajet`),
  KEY `FK_Trajet` (`Id_Trajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `Id_Trajet` int(30) NOT NULL AUTO_INCREMENT,
  `IdU` int(20) NOT NULL,
  `vd` varchar(30) NOT NULL,
  `va` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `adr_DP` varchar(30) NOT NULL,
  `adr_RV` varchar(30) NOT NULL,
  `type_voiture` varchar(30) NOT NULL,
  `place` int(5) NOT NULL,
  `prix` int(30) NOT NULL,
  PRIMARY KEY (`Id_Trajet`),
  KEY `FK_Conducteur` (`IdU`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdU` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `isAdmin` tinyint(4) DEFAULT '0',
  `mdp` varchar(32) NOT NULL,
  `avis` int(10) NOT NULL DEFAULT '0',
  `cle` varchar(32) NOT NULL,
  `image` varchar(32) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdU`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `IdV` varchar(32) NOT NULL,
  `IdU` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `place` int(32) NOT NULL,
  PRIMARY KEY (`IdV`),
  KEY `FK_owner` (`IdU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Participant` FOREIGN KEY (`IdU`) REFERENCES `utilisateur` (`IdU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Trajet` FOREIGN KEY (`Id_Trajet`) REFERENCES `trajet` (`Id_Trajet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `FK_Conducteur` FOREIGN KEY (`IdU`) REFERENCES `utilisateur` (`IdU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK_owner` FOREIGN KEY (`IdU`) REFERENCES `utilisateur` (`IdU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
