-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2014 at 06:16 PM
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
  `phone` varchar(14) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  `main` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `adresseble_id`, `adresseble_type`, `address`, `city`, `phone`, `postalcode`, `main`, `delivery`) VALUES
(13, 55, 'client', '700 AVE.VICTORIA', 'SAINT-LAMBERT', '5145151525', 'J4P2J7', 1, 0),
(14, 61, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(15, 62, 'client', '639 ave.Victoria', 'Montreal', '5145151525', 'H3J1N5', 1, 0),
(16, 63, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(17, 64, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(18, 7, 'restaurant', '150, Place Charles-Le Moyne', 'Longueuil', 'adada', 'adad', 1, 0),
(27, 16, 'restaurant', '400, Boul. SIR Wilfred-laurier', 'Saint-Lambert', '4504661020', ' J4J3C', 1, 0),
(35, 18, 'restaurant', '1483 Ottawa', 'Montreal', '5147884500', 'H3C1S9', 1, 0),
(36, 22, 'restaurant', '299 Boul. Sir-Wilfrid-Laurier', 'Saint-Lambert', '4504667888', 'J4R2L1', 1, 0),
(37, 23, 'restaurant', 'bob', 'bacon', 'bacon', 'bacon', 1, 0),
(38, 77, 'client', '500 ave.Victoria', 'Montreal', '4567896567', 'J4P2J7', 1, 0),
(39, 24, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1, 0),
(40, 25, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1, 0),
(41, 80, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(47, 31, 'restaurant', '500 rue peel', 'Montreal', '(514) 396-8800', 'H3C 2H1', 1, 0),
(52, 55, 'client', '6700 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 0, 0),
(58, 17, 'restaurant', '105 St-Paul Est', 'Montreal', '5147886100', 'H2Y1G7', 1, 0),
(59, 18, 'restaurant', '1483 Ottawa', 'Montreal', ' 514788450', 'H3C 1S', 1, 0),
(63, 22, 'restaurant', '299 Boul. Sir-Wilfrid-Laurier', 'Saint-Lambert', '4504667888', 'J4R2L1', 1, 0),
(64, 87, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(65, 88, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(66, 89, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(67, 90, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(68, 91, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(69, 92, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(70, 93, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(71, 94, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(72, 95, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(73, 96, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(74, 97, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(75, 98, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(76, 99, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4P2J7', 1, 0),
(93, 33, 'restaurant', '8840 Boulevard Leduc #50', 'Brossard', 'none', 'J4Y 0G4', 1, 0),
(94, 0, '', '', '', '', '', 0, 0),
(95, 55, 'client', '2424', 'adad', 'adad', 'adad', 0, 0),
(96, 39, 'restaurant', '500 allo', 'Montreal', '34567890', 'J45T36', 1, 0),
(97, 55, 'client', '345 WATSON', 'SHERBY', '345678912', 'h4r3456', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `restaurant_id`, `name`) VALUES
(8, 7, 'McDejeuner'),
(9, 7, 'McDinner'),
(10, 7, 'Fine'),
(11, 7, 'OUPS'),
(12, 7, 'double ouos'),
(13, 7, 'triple oups'),
(14, 7, '4 OUPS'),
(15, 7, 'ada'),
(16, 7, 'allo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `livreur_id` int(11) NOT NULL,
  `no_confirmation` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `state` int(1) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `address_id`, `restaurant_id`, `livreur_id`, `no_confirmation`, `date`, `time`, `state`, `total`) VALUES
(1, 55, 13, 0, 0, '2a3896', '2014-07-11', '00:00:00', 1, 9),
(2, 55, 13, 0, 0, '7de8ea', '2014-07-11', '00:00:00', 1, 5),
(3, 55, 13, 0, 0, '061d92', '2014-07-11', '00:00:00', 1, 5),
(4, 55, 13, 0, 0, 'c91e79', '2014-07-11', '00:00:00', 1, 5),
(5, 55, 13, 0, 0, 'e4ac77', '2014-07-11', '00:00:00', 1, 9),
(6, 55, 13, 0, 0, 'c79550', '2014-07-11', '00:00:00', 1, 8),
(7, 55, 13, 0, 0, 'eff2d8', '2014-07-11', '00:00:00', 1, 3),
(8, 55, 13, 0, 0, '8ff8e6', '2014-07-11', '00:00:00', 1, 4),
(9, 55, 13, 0, 0, '44260e', '2014-07-11', '00:00:00', 1, 4),
(10, 55, 13, 0, 0, '3e891b', '2014-07-11', '00:00:00', 1, 4),
(11, 55, 13, 0, 0, '1e61d8', '2014-07-11', '00:00:00', 1, 5),
(12, 55, 13, 0, 0, '3bc75c', '2014-07-11', '00:00:00', 1, 5),
(13, 55, 13, 0, 0, 'd462f4', '2014-07-11', '00:00:00', 1, 3),
(14, 55, 13, 0, 0, 'a5e7c4', '2014-07-11', '00:00:00', 1, 20.06),
(15, 55, 97, 0, 0, 'ac706d', '2014-07-11', '00:00:00', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `plat_id`, `quantity`) VALUES
(1, 1, 3, 9),
(2, 2, 3, 5),
(3, 3, 3, 5),
(4, 4, 3, 5),
(5, 9, 3, 4),
(6, 10, 3, 4),
(7, 11, 3, 5),
(8, 12, 3, 5),
(9, 13, 3, 3),
(10, 14, 4, 10),
(11, 14, 6, 2),
(12, 15, 3, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(9, 8, 'Banane', 0.5, 'Pas cher la banane'),
(14, 9, 'Fine', 5, 'nopadad'),
(15, 9, 'Bacon', 4, 'right taste'),
(17, 16, 'allo', 0.01, 'allo'),
(18, 16, 'adad', 0.03, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurateur_id`, `name`) VALUES
(7, 81, 'Test'),
(16, -1, 'McDonalds'),
(17, 86, '3B St-Paul'),
(18, -1, 'Brasseur de MontrÃ©al'),
(22, -1, 'Thai express'),
(31, -1, 'PUB 100 genies'),
(33, -1, 'Five Guys'),
(39, -1, 'ALLO');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

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
(86, 'bacon', 'res', 'One', 'restaurateur', 'res1@gmail.com', '0000-00-00'),
(87, 'bacon', 'Philippe', 'Potvin', 'client', '1223ph.potvin@gmail.com', '1992-09-22'),
(88, 'bacon', 'Philippe', 'Potvin', 'client', '2ph.potvin@gmail.com', '1992-09-22'),
(89, 'bacon', 'Philippe', 'Potvin', 'client', 'ph.potvin3@gmail.com', '1992-09-22'),
(90, 'bacon', 'Philippe', 'Potvin', 'client', 'ph.potv3in@gmail.com', '1992-09-22'),
(91, 'bacon', 'Philippe', 'Potvin', 'client', 'ph3.potvin@gmail.com', '1992-09-22'),
(92, 'bacon', 'Philippe', 'Potvin', 'client', 'qph.potvin@gmail.com', '1992-09-22'),
(93, 'bacon', 'Philippe', 'Potvin', 'client', 'p2h.potvin@gmail.com', '1992-09-22'),
(94, 'bacon', 'Philippe', 'Potvin', 'client', '3ph.potvin@gmail.com', '1992-09-22'),
(95, 'bacon', 'Philippe', 'Potvin', 'client', '4ph.potvin@gmail.com', '1992-09-22'),
(96, 'bacon', 'Philippe', 'Potvin', 'client', '9ph.potvin@gmail.com', '1992-09-22'),
(97, 'bacon', 'Philippe', 'Potvin', 'client', '45ph.potvin@gmail.com', '1992-09-22'),
(98, 'bacon', 'Philippe', 'Potvin', 'client', '22ph.potvin@gmail.com', '1992-09-22'),
(99, 'bacon', 'Philippe', 'Potvin', 'client', '123ph.potvin@gmail.com', '1992-09-22'),
(101, 'bacon', 'test', 'test', 'restaurateur', 'tesrt@gmail.com', '0000-00-00'),
(106, 'bacon', 'patate', 'piller', 'restaurateur', 'patate@gmail.com', '0000-00-00');
