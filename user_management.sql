-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 04:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'user',
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Age`, `Birthdate`, `Email`, `Role`, `Username`, `Password`) VALUES
(4, 'Laurence', 'Advincula', 'Palacio', 'male', 20, '2021-08-13', 'laurencepalacio099gmail.com', 'admin', 'laurencepalacio', 'admin'),
(5, 'Paul Kenrick', 'navarro', 'Pineda', 'Male', 21, '2003-08-15', 'paul@gmail.com', 'user', 'paulkenrick', '1234'),
(7, 'Hugh', 'Eugene', 'Navarro', 'Male', 17, '2007-07-04', 'hugh@gmail.com', 'user', 'hugh', 'user'),
(8, 'Neil', 'Thomas', 'Mortega', 'Male', 13, '2011-03-10', 'sample@gmail.com', 'user', 'sample', 'sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
