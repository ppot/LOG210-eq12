-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 01, 2014 at 08:40 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `adresseble_id`, `adresseble_type`, `address`, `city`, `phone`, `postalcode`, `main`, `delivery`) VALUES
(13, 55, 'client', '700, AVE.VICTORIA', 'SAINT-LAMBERT', '5145151525', 'J4R2P8', 1, 0),
(14, 61, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(15, 62, 'client', '639 ave.Victoria', 'Montreal', '5145151525', 'J4R2P8', 1, 0),
(16, 63, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(17, 64, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(18, 7, 'restaurant', '994, rue Rachel Est', 'Montreal', '514-515-1525', 'H2J2J3', 1, 0),
(27, 16, 'restaurant', '400, Boul. SIR Wilfred-laurier', 'Saint-Lambert', '4504661020', ' J4J3C', 1, 0),
(35, 18, 'restaurant', '1483 Ottawa', 'Montreal', '5147884500', 'H3C1S9', 1, 0),
(36, 22, 'restaurant', '299 Boul. Sir-Wilfrid-Laurier', 'Saint-Lambert', '4504667888', 'J4R2L1', 1, 0),
(37, 23, 'restaurant', 'bob', 'bacon', 'bacon', 'bacon', 1, 0),
(38, 77, 'client', '500 ave.Victoria', 'Montreal', '4567896567', 'J4R2P8', 1, 0),
(39, 24, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1, 0),
(40, 25, 'restaurant', '134, Peel', 'Montreal', '4567564567', 'J4R234', 1, 0),
(41, 80, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(47, 31, 'restaurant', '500 rue peel', 'Montreal', '(514) 396-8800', 'H3C 2H1', 1, 0),
(52, 55, 'client', '6700 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 0, 0),
(58, 17, 'restaurant', '105 St-Paul Est', 'Montreal', '5147886100', 'H2Y1G7', 1, 0),
(59, 18, 'restaurant', '1483 Ottawa', 'Montreal', ' 514788450', 'H3C 1S', 1, 0),
(63, 22, 'restaurant', '299 Boul. Sir-Wilfrid-Laurier', 'Saint-Lambert', '4504667888', 'J4R2L1', 1, 0),
(64, 87, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(65, 88, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(66, 89, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(67, 90, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(68, 91, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(69, 92, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(70, 93, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(71, 94, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(72, 95, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(73, 96, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(74, 97, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(75, 98, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(76, 99, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 0),
(93, 33, 'restaurant', '8840 Boulevard Leduc #50', 'Brossard', 'none', 'J4Y 0G4', 1, 0),
(94, 0, '', '', '', '', '', 0, 0),
(95, 55, 'client', '2424', 'adad', 'adad', 'J4R2P8', 0, 0),
(96, 39, 'restaurant', '500 allo', 'Montreal', '34567890', 'J45T36', 1, 0),
(97, 55, 'client', '345 WATSON', 'SHERBY', '345678912', 'J4R2P8', 0, 0),
(98, 107, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 1),
(99, 0, '', '', '', '', '', 0, 0),
(100, 109, 'client', '639 ave.Victoria', 'Saint-Lambert', '5145151525', 'J4R2P8', 1, 1),
(101, 0, '', '', '', '', '', 0, 0),
(102, 40, 'restaurant', '994, rue Rachel Est', 'Monteal', '5145151525', 'J4R2P8', 1, 0),
(103, 55, 'client', '345, WATSON', 'SHERBY', '5145151525', 'J4R2P8', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `address_id`, `restaurant_id`, `livreur_id`, `no_confirmation`, `date`, `time`, `state`, `total`) VALUES
(1, 55, 13, 7, 0, '2a3896', '2014-07-11', '00:00:00', 3, 9),
(2, 55, 13, 7, 0, '7de8ea', '2014-07-11', '00:00:00', 3, 5),
(3, 55, 13, 7, 0, '061d92', '2014-07-11', '00:00:00', 3, 5),
(4, 55, 13, 7, 0, 'c91e79', '2014-07-11', '00:00:00', 3, 5),
(5, 55, 13, 7, 0, 'e4ac77', '2014-07-11', '00:00:00', 3, 9),
(6, 55, 13, 7, 0, 'c79550', '2014-07-11', '00:00:00', 3, 8),
(7, 55, 13, 7, 0, 'eff2d8', '2014-07-11', '00:00:00', 3, 3),
(8, 55, 13, 7, 0, '8ff8e6', '2014-07-11', '00:00:00', 3, 4),
(9, 55, 13, 7, 0, '44260e', '2014-07-11', '00:00:00', 2, 4),
(10, 55, 13, 7, 0, '3e891b', '2014-07-11', '00:00:00', 2, 4),
(11, 55, 13, 7, 0, '1e61d8', '2014-07-11', '00:00:00', 2, 5),
(12, 55, 13, 7, 0, '3bc75c', '2014-07-11', '00:00:00', 2, 5),
(13, 55, 13, 7, 0, 'd462f4', '2014-07-11', '00:00:00', 2, 3),
(14, 55, 13, 7, 0, 'a5e7c4', '2014-07-11', '00:00:00', 2, 20.06),
(15, 55, 97, 7, 0, 'ac706d', '2014-07-11', '00:00:00', 2, 4),
(16, 55, 97, 7, 0, '28399634PH0812436', '2014-07-23', '00:00:00', 1, 1),
(17, 55, 97, 7, 0, '5JT06927EE822643S', '2014-07-23', '00:00:00', 1, 2),
(18, 55, 97, 7, 0, '10G463953W949061A', '2014-07-23', '00:00:00', 1, 1),
(19, 55, 97, 7, 0, '7PX01996AE6054940', '2014-07-23', '00:00:00', 1, 1),
(20, 55, 97, 7, 0, '7PX01996AE6054940', '2014-07-23', '00:00:00', 1, 1),
(21, 55, 97, 7, 0, '91E400967U1117224', '2014-07-23', '00:00:00', 1, 1),
(22, 55, 97, 7, 0, '6R040706CB592642S', '2014-07-23', '00:00:00', 1, 1),
(23, 55, 97, 7, 0, '6YS61675AG915123K', '2014-07-23', '00:00:00', 1, 1),
(24, 55, 97, 7, 0, '3HJ41926YN8238641', '2014-07-23', '00:00:00', 1, 1),
(25, 55, 97, 7, 0, '5PD548129K706544J', '2014-07-23', '00:00:00', 1, 1),
(26, 55, 97, 7, 0, '2S392962PS847300E', '2014-07-23', '00:00:00', 1, 1),
(27, 55, 97, 7, 0, '2RP14118TM084510D', '2014-07-23', '00:00:00', 1, 1),
(28, 55, 97, 7, 0, '0A838196JT4843212', '2014-07-23', '17:24:15', 1, 1),
(29, 55, 97, 7, 0, '8UV20607E7780563N', '2014-07-23', '17:31:09', 1, 1),
(30, 55, 97, 7, 0, '9P233266V0180181B', '2014-07-23', '17:34:44', 1, 1),
(31, 55, 97, 7, 0, '5EC699624D1513518', '2014-07-23', '17:38:24', 1, 1),
(32, 55, 97, 7, 0, '6AM623579X982510C', '2014-07-23', '17:42:49', 1, 1),
(33, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(34, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(35, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(36, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(37, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(38, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(39, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(40, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(41, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(42, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(43, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(44, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(45, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(46, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(47, 55, 97, 7, 0, '8D565957HH801662D', '2014-07-23', '17:45:21', 1, 1),
(48, 107, 98, 7, 0, '3J9536109X217754N', '2014-07-25', '11:01:20', 1, 1),
(49, 55, 97, 7, 0, '3V377389NR241002S', '2014-07-25', '11:28:46', 2, 1),
(50, 55, 97, 7, 0, '8F861201925763944', '2014-07-29', '21:43:13', 1, 1),
(51, 109, 100, 7, 0, '10T8147344816612Y', '2014-07-31', '00:36:48', 1, 0.12),
(52, 55, 97, 7, 0, '5ST98865XN601413G', '2014-07-31', '22:08:27', 1, 1),
(53, 55, 97, 7, 0, '4J053481J5258964U', '2014-07-31', '22:16:20', 1, 1),
(54, 55, 97, 7, 0, '3203316636892145P', '2014-07-31', '22:19:57', 1, 1),
(55, 55, 97, 7, 0, '2VW59795H7871460G', '2014-07-31', '22:24:06', 1, 1),
(56, 55, 97, 7, 0, '3JE5310534547163T', '2014-07-31', '22:28:15', 1, 1),
(57, 55, 97, 7, 0, '0LM19780E13854348', '2014-07-31', '22:30:52', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

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
(12, 15, 3, 4),
(13, 16, 3, 1),
(14, 17, 3, 2),
(15, 18, 3, 1),
(16, 19, 3, 1),
(17, 20, 3, 1),
(18, 21, 3, 1),
(19, 22, 3, 1),
(20, 23, 3, 1),
(21, 24, 3, 1),
(22, 25, 3, 1),
(23, 26, 3, 1),
(24, 27, 3, 1),
(25, 28, 3, 1),
(26, 29, 3, 1),
(27, 30, 3, 1),
(28, 31, 3, 1),
(29, 32, 3, 1),
(30, 33, 3, 1),
(31, 34, 3, 1),
(32, 35, 3, 1),
(33, 36, 3, 1),
(34, 37, 3, 1),
(35, 38, 3, 1),
(36, 39, 3, 1),
(37, 40, 3, 1),
(38, 41, 3, 1),
(39, 42, 3, 1),
(40, 43, 3, 1),
(41, 44, 3, 1),
(42, 45, 3, 1),
(43, 46, 3, 1),
(44, 47, 3, 1),
(45, 48, 3, 1),
(46, 49, 3, 1),
(47, 50, 3, 1),
(48, 51, 7, 3),
(49, 52, 3, 1),
(50, 53, 3, 1),
(51, 54, 3, 1),
(52, 55, 3, 1),
(53, 56, 3, 1),
(54, 57, 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurateur_id`, `name`) VALUES
(7, 81, 'La Banquise'),
(16, -1, 'McDonalds'),
(17, 86, '3B St-Paul'),
(18, -1, 'Brasseur de MontrÃ©al'),
(22, -1, 'Thai express'),
(31, -1, 'PUB 100 genies'),
(33, -1, 'Five Guys');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

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
(106, 'bacon', 'patate', 'piller', 'restaurateur', 'patate@gmail.com', '0000-00-00'),
(107, 'bacon', 'Samuel', 'Ryc', 'client', 'samuel.ryc.1@etsmtl.net', '1992-09-22'),
(108, 'bacon', 'livreur', 'livreur', 'livreur', 'livreur@gmail.com', NULL),
(109, 'bacon', 'Philippe', 'Potvin', 'client', 'lpotvin@cvm.qc.ca', '1992-09-22'),
(110, 'bacon', 'resto6', 'OMG', 'restaurateur', '131313@gmail.com', '0000-00-00'),
(114, 'bacon', 'Liv', 'bacon', 'livreur', 'liv@gmail.com', '0000-00-00');
