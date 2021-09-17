-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 10:33 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucha-se`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `info` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `info`, `date`, `type`) VALUES
(1, 'Лъки', 'Гони топка всяка вечер', '2021-09-16', 'Куче'),
(2, 'Жоро', 'Не харесва чужди хора', '2021-09-14', 'Куче'),
(3, 'Чочо', 'Събужда се рано сутрин', '2021-09-13', 'Папагал'),
(4, 'Шаро', 'Лае щом чуе силен шум', '2021-09-15', 'Куче'),
(5, 'Макси', 'Драска с нокти по стената', '2021-09-17', 'Котка');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
