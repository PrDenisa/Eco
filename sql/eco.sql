-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 11:31 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_88BDF3E9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_88BDF3E9E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `username`, `password`, `email`, `is_active`, `is_admin`) VALUES
(1, 'admin', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'admin@example.com', 1, 1),
(5, 'Denisa', '$2y$13$9ik0UvDPH93JMDGXgxdeb.N4tLMNFFcR/Z6iEvMDaYybmduvNGyAK', 'pr.denisa@gmail.com', 1, 0),
(9, 'Lavinia', '$2y$13$0NbOWe43FcTUz7rqjkhTMOAU5./iA8z2dlNXXLkSuNWmGLplKTkyu', 'denisa.profir@qubiz.com', 1, 0),
(10, 'Loredana', '$2y$13$y//cqpmQCX34ci/fBwzqN.XLQMgrBDzdIOaXXtbG9S1GLIdRRoKZe', 'lore.123@gmail.com', 1, 1),
(12, 'Damian', '$2y$13$Hb0KLUjgPhLS3sMk4aJN/.my4ENchU6RX0Aa2QwisR7vRNq/0vcQi', 'damina.d@ceva.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `explanation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `number`, `explanation`, `amount`, `datetime`) VALUES
(1, 123, 'Raport zilnic', 500, '2016-01-30 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `explanation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `number`, `explanation`, `amount`, `datetime`) VALUES
(1, 231, 'Chirie SCT-Felix', 2500, '2016-01-10 00:00:00'),
(2, 1274, 'Salarii -depunere banca', 1250, '2016-01-30 04:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `stock_available` int(11) DEFAULT NULL,
  `total_stock` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `vat` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B3BA5A5A5E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `stock_available`, `total_stock`, `price`, `vat`, `is_active`) VALUES
(1, 'camasa', 10, 10, 50, 24, 1),
(2, 'pantalon', 24, 25, 45, 24, 1),
(4, 'trening', 4, 4, 75, 24, 1),
(5, 'pijama', 11, 11, 35, 24, 1),
(6, 'trening fete', 12, 15, 80, 24, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
