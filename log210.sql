-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Juin 2014 à 00:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `log210`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresseble_id` int(11) NOT NULL,
  `adresseble_type` varchar(12) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `main` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `address`
--

INSERT INTO `address` (`id`, `adresseble_id`, `adresseble_type`, `address`, `city`, `phone`, `postalcode`, `main`) VALUES
(12, 54, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(13, 55, 'client', 'test', 'test', '5145151525', 'test', 1),
(14, 4, 'restaurant', 'testasd', 'testsda', '12313', '', 1),
(15, 0, 'restaurant', 'testasd', 'testsda', '12313', 'testas', 1),
(16, 6, 'restaurant', 'testasd', 'testsda', '12313', 'testas', 1);

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`) VALUES
(6, 'aaaa'),
(2, 'Rest'),
(3, 'test2sad'),
(4, 'test2sada');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `mail_2` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `password`, `firstname`, `lastname`, `type`, `mail`, `birthdate`) VALUES
(1, 'bacon', 'Monsieur', 'Entrepreneur', 'entrepreneur', 'entrepreneur@gmail.com', '2000-01-01'),
(54, 'bacon', 'Philippe', 'Potvin', 'client', 'samuel.ryc@gmail.com', '1992-09-22'),
(55, 'bacon', 'test', 'test', 'client', 'test@gmail.com', '1992-09-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
