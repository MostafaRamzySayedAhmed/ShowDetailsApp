-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 08:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemCountry` varchar(255) NOT NULL,
  `ItemPrice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Items Table';

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `ItemName`, `ItemDescription`, `ItemCountry`, `ItemPrice`) VALUES
(1, 'Item 1', 'Very Good', 'USA', '25'),
(2, 'Item 2', 'Awesome', 'Japan', '30'),
(3, 'Item 3', 'So Helpful', 'China', '15'),
(4, 'Item 4', 'So Nice Item', 'Egypt', '25'),
(5, 'Item 5', 'Very Good Item', 'USA', '35'),
(6, 'Item 6', 'So Helpful, Thanks Pro', 'China', '50'),
(7, 'Item 7', 'Amazing', 'Amazing', '25'),
(8, 'Item 8', 'It\'s So Helpful Item', 'USA', '45'),
(9, 'Item 9', 'It\'s So Nice', 'Egypt', '50'),
(10, 'Item 10', 'Very Good Item', 'USA', '35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`) VALUES
(4, 'Mostafa', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
