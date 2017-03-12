-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2017 at 03:46 PM
-- Server version: 5.7.17-0ubuntu0.16.10.1
-- PHP Version: 7.0.13-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaitona`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2550) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `description`, `pic`, `created_at`, `user_id`) VALUES
(1, 0, 'dev', '', '', '2017-03-05 19:16:51', 1),
(2, 0, 'adminstration', '', '', '2017-03-05 19:16:51', 0),
(5, 1, 'Server Side', '', '', '2017-03-07 15:14:56', 1),
(6, 1, 'Client Side', '', '', '2017-03-07 16:04:21', 1),
(7, 2, 'RedHat Adminstration', '', '', '2017-03-07 16:04:21', 1),
(8, 0, 'Network', '', '', '2017-03-08 21:51:36', 1),
(9, 8, 'Network Introduction', '', '', '2017-03-08 21:52:06', 1),
(10, 2, 'Shell Script', '', '', '2017-03-12 04:52:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
