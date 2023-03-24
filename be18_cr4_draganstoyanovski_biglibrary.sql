-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 10:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be18_cr4_draganstoyanovski_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be18_cr4_draganstoyanovski_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be18_cr4_draganstoyanovski_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `biglibrary`
--

CREATE TABLE `biglibrary` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `ISBN` text NOT NULL,
  `short_description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `publisher_name` varchar(150) NOT NULL,
  `publisher_address` text NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biglibrary`
--

INSERT INTO `biglibrary` (`id`, `image`, `title`, `ISBN`, `short_description`, `type`, `author_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES
(1, 'js.jpg', 'JavaScript', '45272Y430W', 'For Beginners', 'Book', 'David Flanagan', 'Nikita Duggal', 'London UK', '2019-03-19'),
(2, 'html.jpg', 'HTML', '15372Y431W', 'For Advanced', 'DVD', 'Jane Duckett', 'Jon Duckett', 'USA', '2001-01-29'),
(3, 'css.jpg', 'CSS', '55472Y432W', 'For Beginners', 'CD', 'Joe Attardi', 'John Duggal', 'New York', '2002-11-29'),
(4, 'angular.jpg', 'Angular', '85572Y433W', 'For Advanced', 'DVD', 'Ferdinand Malcher', 'Johannes Hoppe', 'USA', '2006-05-01'),
(5, 'php.jpg', 'PHP', '15672Y434W', 'For Beginners', 'Book', 'Kevin Tatroe', 'Peter Macintyre', 'London UK', '2004-01-10'),
(6, 'ts.jpg', 'TypeScript', '95272Y435W', 'For Beginners', 'Book', 'Boris Cherny', 'Boris Cherny', 'New Jersey', '2013-01-01'),
(7, 'ajax.jpg', 'Ajax', '65772Y436W', 'For Advanced', 'CD', 'Peter Apoth', 'Peter Apoth', 'Austria', '2020-02-13'),
(8, 'symfony.jpg', 'Symfony', '35872Y437W', 'For Beginners', 'DVD', 'Cris Peth', 'Load Molder', 'San Francisco', '2016-10-02'),
(9, 'ccc.jpg', 'C++', '25972Y438W', 'For Beginners', 'Book', 'Michael Loter', 'Michael Topel', 'Mexico', '2017-05-29'),
(10, 'python.jpg', 'Python', '76072Y439W', 'For Advanced', 'CD', 'Peter Davis', 'Mike Jake', 'USA', '2022-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biglibrary`
--
ALTER TABLE `biglibrary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biglibrary`
--
ALTER TABLE `biglibrary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
