-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 13 Avril 2017 à 15:10
-- Version du serveur: 5.5.54-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `Booking`
--

CREATE TABLE IF NOT EXISTS `Booking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookingDate` date NOT NULL,
  `BookingTime` time NOT NULL,
  `NumberOfSeats` tinyint(4) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `Booking`
--

INSERT INTO `Booking` (`Id`, `BookingDate`, `BookingTime`, `NumberOfSeats`, `User_Id`, `CreationTimestamp`) VALUES
(1, '2017-04-26', '02:56:00', 4, 13, '2017-04-07 15:19:21'),
(2, '2017-04-06', '03:56:00', 2, 13, '2017-04-07 15:34:27'),
(3, '2017-04-06', '01:57:00', 3, 13, '2017-04-07 15:35:49'),
(4, '2017-04-14', '00:54:00', 2, 13, '2017-04-07 15:48:01'),
(5, '2017-04-12', '05:54:00', 45, 13, '2017-04-07 15:48:10'),
(6, '2017-04-12', '05:45:00', 127, 13, '2017-04-07 15:49:07'),
(7, '2017-04-07', '11:02:00', 2, 13, '2017-04-07 15:49:56'),
(8, '2017-04-04', '05:46:00', 5, 13, '2017-04-07 15:53:17'),
(18, '2017-04-07', '20:00:00', 2, 13, '2017-04-07 16:51:43'),
(19, '2017-04-07', '20:00:00', 2, 13, '2017-04-07 16:57:13');

-- --------------------------------------------------------

--
-- Structure de la table `Meal`
--

CREATE TABLE IF NOT EXISTS `Meal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `QuantityInStock` tinyint(4) NOT NULL,
  `BuyPrice` double NOT NULL,
  `SalePrice` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `Meal`
--

INSERT INTO `Meal` (`Id`, `Name`, `Photo`, `Description`, `QuantityInStock`, `BuyPrice`, `SalePrice`) VALUES
(1, 'Coca-Cola', 'coca.jpg', 'Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine !', 72, 0.6, 3),
(2, 'Bagel Thon', 'bagel_thon.jpg', 'Notre bagel est constitué d''un pain moelleux avec des grains de sésame et du thon albacore, accompagné de feuilles de salade fraîche du jour  et d''une sauce renversante :-)', 18, 2.75, 5.5),
(3, 'Bacon Cheeseburger', 'bacon_cheeseburger.jpg', 'Ce délicieux cheeseburger contient un steak haché viande française de 150g ainsi que d''un buns grillé juste comme il faut, le tout accompagné de frites fraîches maison !', 14, 6, 12.5),
(4, 'Carrot Cake', 'carrot_cake.jpg', 'Le carrot cake maison ravira les plus gourmands et les puristes : tous les ingrédients sont naturels !\r\nÀ consommer sans modération', 9, 3, 6.75),
(5, 'Donut Chocolat', 'chocolate_donut.jpg', 'Les donuts sont fabriqués le matin même et sont recouvert d''une délicieuse sauce au chocolat !', 16, 3, 6.2),
(6, 'Dr. Pepper', 'drpepper.jpg', 'Son goût sucré avec de l''amande vous ravira !', 53, 0.5, 2.9),
(7, 'Milkshake', 'milkshake.jpg', 'Notre milkshake bien crémeux contient des morceaux d''Oréos et est accompagné de crème chantilly et de smarties en guise de topping. Il éblouira vos papilles !', 12, 2, 5.35);

-- --------------------------------------------------------

--
-- Structure de la table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `TotalAmount` double DEFAULT NULL,
  `TaxRate` float DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `CompleteTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Order`
--

INSERT INTO `Order` (`Id`, `User_Id`, `TotalAmount`, `TaxRate`, `TaxAmount`, `CreationTimestamp`, `CompleteTimestamp`) VALUES
(1, 13, 15.5, 5.5, 0.8525, '2017-04-13 09:50:02', '2017-04-13 09:50:02'),
(2, 13, 15.5, 5.5, 0.8525, '2017-04-13 10:10:33', '2017-04-13 10:10:33'),
(3, 13, 167.5, 5.5, 9.2125, '2017-04-13 10:10:51', '2017-04-13 10:10:51');

-- --------------------------------------------------------

--
-- Structure de la table `OrderLine`
--

CREATE TABLE IF NOT EXISTS `OrderLine` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `QuantityOrdered` int(4) NOT NULL,
  `Meal_Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `PriceEach` double NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UniciteMealOrder` (`Meal_Id`,`Order_Id`),
  KEY `Meal_Id` (`Meal_Id`),
  KEY `Order_Id` (`Order_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `OrderLine`
--

INSERT INTO `OrderLine` (`Id`, `QuantityOrdered`, `Meal_Id`, `Order_Id`, `PriceEach`) VALUES
(1, 1, 1, 1, 3),
(2, 1, 3, 1, 12.5),
(3, 1, 1, 2, 3),
(4, 1, 3, 2, 12.5),
(5, 10, 4, 3, 6.75),
(6, 8, 3, 3, 12.5);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `BirthDate` date NOT NULL,
  `Address` varchar(250) NOT NULL,
  `City` varchar(40) NOT NULL,
  `ZipCode` char(5) NOT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Phone` char(10) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `LastLoginTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `BirthDate`, `Address`, `City`, `ZipCode`, `Country`, `Phone`, `CreationTimestamp`, `LastLoginTimestamp`) VALUES
(11, 'test', 'erzerzer', 'test@test.fr', '$2y$10$sNUtHyQmu9TG5HzjFicMPOh4YFW63IlPFiQh6wf5CSKoRgj0Vs7t2', '2017-04-26', 'etete', 'tetetet', '12345', 'tetete', '0125362514', '2017-04-06 11:13:42', NULL),
(13, 'tertret', 'trret', 'test2@test.fr', '$2y$10$zglt5XnqXuRmQJUVqKUG6OLh6GwOjBf4BTqDiSeY3bYHgbLe.arVS', '2017-04-27', 'erzr', 'rezrzr', '54789', 'zerzerez', '0125362514', '2017-04-07 10:34:19', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `OrderLine`
--
ALTER TABLE `OrderLine`
  ADD CONSTRAINT `OrderLine_ibfk_1` FOREIGN KEY (`Meal_Id`) REFERENCES `Meal` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderLine_ibfk_2` FOREIGN KEY (`Order_Id`) REFERENCES `Order` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
