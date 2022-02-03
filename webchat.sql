-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 10:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userid` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `email`, `username`, `password`, `date`) VALUES
(1, '6544364505751607716497394672897349', 'ndiranguhezron97@gmail.com', 'web', '$2y$10$6LyQh.3.mp2fQEUuJMVQOOZZL3K3FbNyf.aWDzm5QAVjxP4Oo3Rii', '2022-01-24 22:11:03'),
(2, '6869818713457279490074933596866689402', 'ndiranguhezron99@gmail.com', 'web', '$2y$10$pmsPp0QmDRJjYO9A6ZcNP.K5Zq.pEtuFEdCrDIC0dZcb6U/b2A/O.', '2022-01-24 22:14:13'),
(3, '169081', 'ndiranguhezron93@gmail.com', 'web', '$2y$10$dujsUYui8aijLvnwBmYeNO7BW3F3hdyJ6OvDZf30FAVWjgsBO.AhG', '2022-01-24 22:15:12'),
(4, '62513812740987925473345400382505382137644954', 'ndiranguhezron91@gmail.com', 'web', '$2y$10$jm5zp4eHmiTMzxPYp4fAnu3wStn9S642cxXF3f0/BQoLW48tE0je.', '2022-01-24 22:16:12'),
(5, '1888757323', 'ndiranguhezron9k@gmail.com', 'web', '$2y$10$Ceiof3LO6YZKACcP0Qp.3eLIIzCg3Op7wfpWeyOPMQAR3ni8h2Y66', '2022-01-24 22:17:00'),
(6, '56592941007228903778992398', 'ndiranguhezron9c@gmail.com', 'web', '$2y$10$M0qFIqgu9NyYGOgdsWGWfOBZNUkZouCPQ82DW5CzyXhUpJg3srkLK', '2022-01-24 22:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender` varchar(60) NOT NULL,
  `reciever` varchar(60) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `reciever`, `username`, `message`, `date`) VALUES
(1, '819571027465623399705702487870572598', 'adin', 'web', 'cdd', '2022-01-19'),
(2, '819571027465623399705702487870572598', 'adin', 'web', 'kilo', '2022-01-19'),
(3, '819571027465623399705702487870572598', 'adin', 'web', 'nm', '2022-01-19'),
(4, '819571027465623399705702487870572598', 'adin', 'web', 'nm', '2022-01-19'),
(5, '819571027465623399705702487870572598', 'adin', 'web', 'boy', '2022-01-19'),
(6, '819571027465623399705702487870572598', 'adin', 'web', 'sasa', '2022-01-20'),
(7, 'adin', '', NULL, 'cdd', '2022-01-25'),
(8, 'adin', '', NULL, 'cdd', '2022-01-25'),
(9, 'adin', '', NULL, 'cdd', '2022-01-25'),
(10, 'adin', '', NULL, 'cdd', '2022-01-25'),
(11, 'adin', 'adin', NULL, 'cdd', '2022-01-25'),
(12, 'adin', '819571027465623399705702487870572598', 'web', 'cdd', '2022-01-25'),
(13, 'adin', '819571027465623399705702487870572598', 'web', 'cdd', '2022-01-25'),
(14, 'adin', '', NULL, 'cdd', '2022-01-25'),
(15, 'adin', '', NULL, 'hi hezro ffou', '2022-01-25'),
(16, 'adin', '', NULL, 'hi hezro ffou', '2022-01-25'),
(17, 'adin', '819571027465623399705702487870572598', 'web', 'hi hezro ffou', '2022-01-25'),
(18, 'adin', '819571027465623399705702487870572598', 'web', 'hi hezro ffou', '2022-01-25'),
(19, '819571027465623399705702487870572598', 'adin', 'web', 'cdd', '2022-01-25'),
(20, 'adin', '819571027465623399705702487870572598', 'web', 'hi he', '2022-01-25'),
(21, '819571027465623399705702487870572598', 'adin', 'web', 'nmk', '2022-01-25'),
(22, '819571027465623399705702487870572598', 'adin', 'web', 'kio', '2022-01-26'),
(23, '819571027465623399705702487870572598', 'adin', 'web', 'cdd', '2022-01-26'),
(24, '819571027465623399705702487870572598', 'adin', 'web', 'cdd', '2022-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(60) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `password`) VALUES
(1, '819571027465623399705702487870572598', 'web', 'ndiranguhezron97@gmail.com', '$2y$10$yGeWCyGtDJIjl2dgSfzr2epB0eLrDH1RhH9U8hwirtFh/qeZv17le');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `reciever` (`reciever`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
