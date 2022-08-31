-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2022 at 06:32 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aleksa`
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
(96, 'Aleksa', 'Kujundzic', 'aleksakujundzic@protonmail.com', '555333', '$2y$10$sZaf5JC39srfHPo5RYdgT.Ht5aVRws7EHy.vnSqcs8zZUDcCflh3e', '', 'verified');

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
(0, 'djuka', '$2y$10$xuBo9kNuCflXbnZxwJzXSeeT9QmdeZ0.CW18I55ME6Dh9Gtmcq8Ci', 'djuka', 'djuka');

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
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserv_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `num_guests` int(11) NOT NULL,
  `num_tables` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `time_zone` text NOT NULL,
  `telephone` text NOT NULL,
  `comment` mediumtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserv_id`, `f_name`, `l_name`, `num_guests`, `num_tables`, `rdate`, `time_zone`, `telephone`, `comment`, `reg_date`, `user_fk`) VALUES
(81, 'admin', 'aaa', 3, 1, '2022-08-16', '12:00 - 16:00', '555333', 'sada', '2022-08-05 12:16:18', 36),
(82, 'kkkkk', 'kkkk', 9, 4, '2022-08-16', '12:00 - 16:00', '1234567898', 'ok', '2022-08-05 12:17:10', 36),
(84, 'Mihajlo', 'Bozic', 5, 2, '2022-09-07', '16:00 - 20:00', '555333', 'sad', '2022-08-28 12:34:26', 38);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`) VALUES
(1),
(2);

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

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tables_id` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_tables` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tables_id`, `t_date`, `t_tables`) VALUES
(9, '2022-08-17', 5),
(10, '2022-08-25', 6),
(11, '2022-09-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uidUsers`, `emailUsers`, `pwdUsers`, `reg_date`, `role_id`) VALUES
(35, 'blabla', 'blabla@gmail.com', '$2y$10$YBfRfJg4N0O2/50uM6inpu3kJWJM.P6iUKJTnXE3S74xdCyHA5H2O', '2022-08-05 12:07:34', 1),
(36, 'admin', 'admin@gmail.com', '$2y$10$LlWLCLVYi502YH1CKgehiO.iI3aSBjJEEoIkEY1jnE5RKaBxQY97y', '2022-08-05 12:12:53', 2),
(37, 'dalibor', 'dbirki3@gmail.com', '$2y$10$8XmLSdcB/FGXGXjETzv3yu/OFA6yQuH6bqzNDhM8x8gzvbFKLtVjC', '2022-08-09 19:12:00', 1),
(38, 'Bozo', 'bozo@gmail.com', '$2y$10$KMsaD0.MB02edTbKEDOJeOYcUIOnhm8MQ1om2jAxZfkgbu97qIgWq', '2022-08-28 12:33:42', 1);

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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `users_fk` (`user_fk`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacijaKorisnik` (`idU`),
  ADD KEY `rezervacijaS` (`idS`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

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
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tables_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

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
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suma`
--
ALTER TABLE `suma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tables_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `idusers` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacijaKorisnik` FOREIGN KEY (`idU`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacijaS` FOREIGN KEY (`idS`) REFERENCES `sto` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
