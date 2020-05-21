-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 07:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `prixa` varchar(100) DEFAULT NULL,
  `prixv` varchar(100) DEFAULT NULL,
  `quant` varchar(100) DEFAULT NULL,
  `datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `type`, `prixa`, `prixv`, `quant`, `datee`) VALUES
(35, 'telephone', 'lg', '888', '100', '1', '2020-05-19'),
(36, 'television', 'LG smart 43', '888', '300', '1', '2020-05-19'),
(37, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(38, 'telephone', 'lg', '888', '100', '1', '2020-05-19'),
(39, 'television', 'LG smart 43', '888', '300', '1', '2020-05-19'),
(40, 'television', 'LG smart 43', '80', '300', '1', '2020-05-19'),
(41, 'television', 'LG smart 43', '888', '300', '2', '2020-05-19'),
(42, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(43, 'telephone', 'lg', '888', '100', '1', '2020-05-19'),
(44, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(45, 'television', 'LG smart 43', '888', '300', '1', '2020-05-19'),
(46, 'television', 'LG smart 43', '80', '300', '1', '2020-05-19'),
(47, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(48, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(49, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(50, 'telephone', 'lg', '80', '100', '2', '2020-05-19'),
(51, 'telephone', 'lg', '80', '100', '1', '2020-05-19'),
(52, 'telephone', 'lg', '80', '100', '1', '2020-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `prixa` varchar(100) DEFAULT NULL,
  `prixv` varchar(100) DEFAULT NULL,
  `quant` varchar(100) DEFAULT NULL,
  `solde` varchar(100) DEFAULT NULL,
  `datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `type`, `prixa`, `prixv`, `quant`, `solde`, `datee`) VALUES
(26, 'television', 'LG smart 43', '300', '400', '10', '4000', '2020-05-21'),
(27, 'telephone', 'lg', '100', '120', '14', '1800', '2020-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
