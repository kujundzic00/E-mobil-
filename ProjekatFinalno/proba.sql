-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 02:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `lastname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `number` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pwd` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_activation_code` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email_status` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `name`, `lastname`, `email`, `number`, `pwd`, `user_activation_code`, `email_status`) VALUES
(85, 'test', 'test', 'test@gmail.com', '43142', '$2y$10$FrBpDACuzkPm4/KxI1w9.e6JbN3yGaDZNkUh7xW3oxGpRtBo5IigK', 'AvgVaBfnx6', 'verified'),
(95, 'Aleksa', 'Kujundzic', 'aleksakujundzic@protonmail.com', '555333', '$2y$10$cnc2wIR/rnqukO5yM/HHwuczj50/iZGp6SklQOJ6Ut740Q2ZI9g4e', '', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetSelector` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetToken` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetExperis` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Surname` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`id`, `username`, `password`, `Name`, `Surname`) VALUES
(0, 'djuka', '$2y$10$xuBo9kNuCflXbnZxwJzXSeeT9QmdeZ0.CW18I55ME6Dh9Gtmcq8Ci', 'djuka', 'djuka'),
(2, 'test', 'Peric', '', ''),
(4, 'aleksa', '$2y$10$PehkuQI8eAgZ3QkorjQVpOwH9Uq7sPjOM0mDS6f96966oe7dCVt/O', 'Aleksa', 'Kujundzic'),
(5, 'proba', '$2y$10$7VB9Eml76s6tZU3lvoIUZ.iSP68z54fuwlsJE5/N7W1P7BdREQb8O', 'Proba', 'Proba');

-- --------------------------------------------------------

--
-- Table structure for table `radnikprovera`
--

CREATE TABLE `radnikprovera` (
  `id` int(11) NOT NULL,
  `idRadnik` int(11) NOT NULL,
  `idRezervacija` int(11) NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `kodd` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `radnikprovera`
--

INSERT INTO `radnikprovera` (`id`, `idRadnik`, `idRezervacija`, `komentar`, `status`, `kodd`) VALUES
(9, 0, 151, 'nestoooooo', '1', 'en@BLKhBC8F35XqQr7CN#Atb84C8lX'),
(10, 0, 152, 'promena', '1', 'BaDgkDglUvOsfu7pCF@u7lG6eABr2W');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `datum` date NOT NULL,
  `sat` int(11) NOT NULL,
  `vremenskiPeriod` int(11) NOT NULL,
  `kod` text COLLATE utf8_unicode_ci NOT NULL,
  `idS` int(11) NOT NULL,
  `uk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `idU`, `datum`, `sat`, `vremenskiPeriod`, `kod`, `idS`, `uk`) VALUES
(151, 85, '2022-08-27', 10, 2, 'en@BLKhBC8F35XqQr7CN#Atb84C8lX', 2, 12),
(152, 85, '2022-08-31', 12, 4, 'BaDgkDglUvOsfu7pCF@u7lG6eABr2W', 3, 16),
(154, 85, '2022-08-31', 12, 4, 'G1IGPjiKtnocWphF$gjOcQl9G&L8g5', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `id` int(11) NOT NULL,
  `brojMesta` int(11) NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `pusenje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id`, `brojMesta`, `opis`, `pusenje`) VALUES
(1, 10, 'Ovo je sto 10', 1),
(2, 13, 'Ovaj sto ima 13 mesta', 1),
(3, 4, 'da', 1),
(4, 5, 'dada', 1),
(6, 2, 'Ovaj sto ipak ima 2 mesta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suma`
--

CREATE TABLE `suma` (
  `id` int(11) NOT NULL,
  `startH` int(11) NOT NULL,
  `endH` int(11) NOT NULL,
  `idTable` int(11) NOT NULL,
  `endH1` int(11) NOT NULL,
  `endH2` int(11) NOT NULL,
  `endH3` int(11) NOT NULL,
  `endH4` int(11) NOT NULL,
  `endH5` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suma`
--

INSERT INTO `suma` (`id`, `startH`, `endH`, `idTable`, `endH1`, `endH2`, `endH3`, `endH4`, `endH5`, `datum`) VALUES
(44, 12, 16, 3, 15, 14, 13, 0, 0, '2022-08-31'),
(46, 12, 16, 2, 15, 14, 13, 0, 0, '2022-08-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnikprovera`
--
ALTER TABLE `radnikprovera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radnikProvera` (`idRadnik`),
  ADD KEY `rezervacijaProvera` (`idRezervacija`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacijaKorisnik` (`idU`),
  ADD KEY `rezervacijaS` (`idS`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suma`
--
ALTER TABLE `suma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radnikprovera`
--
ALTER TABLE `radnikprovera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suma`
--
ALTER TABLE `suma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `radnikprovera`
--
ALTER TABLE `radnikprovera`
  ADD CONSTRAINT `radnikProvera` FOREIGN KEY (`idRadnik`) REFERENCES `radnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacijaProvera` FOREIGN KEY (`idRezervacija`) REFERENCES `rezervacija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacijaKorisnik` FOREIGN KEY (`idU`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacijaS` FOREIGN KEY (`idS`) REFERENCES `sto` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
