-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 17, 2014 at 07:42 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `LOG210`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresseble_id` int(11) NOT NULL,
  `adresseble_type` varchar(12) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `main` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `adresseble_id`, `adresseble_type`, `address`, `city`, `phone`, `postalcode`, `main`) VALUES
(12, 0, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(13, 0, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(14, 61, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(15, 62, 'client', '639 ave.Victoria', 'Montreal', '5145151525', 'H3J1N5', 1),
(16, 63, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(17, 64, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(18, 7, 'restaurant', '150, Place Charles-Le Moyne', 'Longueuil', 'adada', 'adad', 1),
(27, 16, 'restaurant', '400, Boul. SIR Wilfred-laurier', 'Saint-Lambert', '4504661020', ' J4J3C', 1),
(35, 18, 'restaurant', 'delete', 'eea', 'adad', 'adad', 1),
(36, 22, 'restaurant', '1234 avenue bob', 'montreal', '4508765432', 'jfhtrl', 1),
(37, 23, 'restaurant', 'bob', 'bacon', 'bacon', 'bacon', 1),
(38, 77, 'client', '500 ave.Victoria', 'Montreal', '4567896567', 'J4P2J7', 1),
(39, 24, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1),
(40, 25, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1),
(41, 80, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1),
(42, 26, 'restaurant', 'test', 'test', 'test', 'test', 1),
(43, 27, 'restaurant', 'test', 'test', 'rad', 'tst', 1),
(44, 0, 'restaurant', 'test', 'test', 'rad', 'tst', 1),
(45, 0, 'restaurant', 'test', 'test', 'rad', 'tst', 1),
(46, 30, 'restaurant', 'teste', 'tfa', 'adad', 'dadad', 1),
(47, 31, 'restaurant', 'dad', 'dad', 'add', 'dad', 1),
(48, 32, 'restaurant', 'ada', 'ada', 'adad', 'adad', 1),
(49, 0, 'restaurant', 'dad', 'add', 'adad', 'adad', 1),
(50, 34, 'restaurant', 'adad', 'adad', '3424', 'adad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `restaurant_id`, `name`) VALUES
(8, 7, 'McDejeuner');

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`id`, `menu_id`, `name`, `price`, `description`) VALUES
(3, 8, 'oeuf', 1, 'un oeuf'),
(4, 8, 'bacon', 2, 'un bacon'),
(5, 8, 'patate', 0.01, 'Des bonnes patate'),
(6, 8, 'Toast', 0.03, 'Des Toast'),
(7, 8, 'beurre', 0.04, 'Du bon beurre'),
(8, 8, 'Nutella', 0.05, 'Ajouter du nutella'),
(9, 8, 'Banane', 0.5, 'Pas cher la banane');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurateur_id` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurateur_id`, `name`) VALUES
(7, 81, 'Thai express'),
(16, -1, 'McDonalds');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `firstname`, `lastname`, `type`, `mail`, `birthdate`) VALUES
(55, 'bacon', 'jaime', 'le chili', 'client', 'ph.potvin@gmail.com', '1992-09-22'),
(61, 'bacon', 'Philippe', 'Potvin', 'client', 'ph.potvi2n@gmail.com', '1992-09-22'),
(62, 'bacon', 'Philippe', 'Potvin', 'client', 'ph.potavin@gmail.com', '1992-09-22'),
(63, 'bacon', 'Philippe', 'Potvin', 'client', 'ph.po2tvin@gmail.com', '1992-09-22'),
(64, 'bacon', 'Philippe', 'Potvin', 'client', 'bob@gmail.com', '1992-09-22'),
(65, 'bacon', 'web', 'admin', 'entrepreneur', 'admin@gmail.com', NULL),
(77, 'bacon1234', 'Ginette', 'Potvin', 'client', 'ginette@gmail.com', '1992-09-22'),
(80, 'bacon', 'Philippe', 'Potvin', 'client', 'jonathan@gmail.com', '1992-09-22'),
(81, 'bacon', 'resto', 'rateur', 'restaurateur', 'resto@gmail.com', '0000-00-00'),
(86, 'bacon', 'res', 'One', 'restaurateur', 'res1@gmail.com', '0000-00-00');
