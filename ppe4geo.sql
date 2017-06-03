-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mars 2017 à 17:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppe4geo`
--
CREATE DATABASE IF NOT EXISTS `ppe4geo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ppe4geo`;

-- --------------------------------------------------------

--
-- Structure de la table `administre`
--

CREATE TABLE IF NOT EXISTS `administre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_naissance` datetime NOT NULL,
  `rue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `code_postal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE IF NOT EXISTS `signalement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `heure_date` datetime NOT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_signalement`
--

CREATE TABLE IF NOT EXISTS `type_de_signalement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
