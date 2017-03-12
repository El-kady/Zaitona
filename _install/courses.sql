-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2017 at 03:45 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text,
  `description` text,
  `requirement` text,
  `audience` text,
  `featured_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `introduction`, `description`, `requirement`, `audience`, `featured_image`, `user_id`, `category_id`, `created_at`) VALUES
(8, 'Java', 'this is the java course introduction', 'this is description for java course\r\nthis is description for java course\r\nthis is description for java course\r\nthis is description for java course\r\nthis is description for java course', 'java course requirements\r\njava course requirements\r\njava course requirements', 'targeted audience', '2017/03/20a03423d3.jpeg', 1, 5, '2017-03-10 10:21:15'),
(15, 'Javascript', 'javascript Introduction', 'Javascript course description. Javascript course description.\r\nJavascript course description. Javascript course description.\r\nJavascript course description.\r\nJavascript course description.\r\nJavascript course description. Javascript course description.\r\nJavascript course description. Javascript course description.', '*basic knowledge of programming terminologies.', '*Any one who is ready to go', '2017/03/e32d766746.png', 1, 6, '2017-03-12 04:51:11'),
(16, 'Bash script', 'Intro to course .', 'Shell script course description. Shell script course description.\r\nShell script course description. Shell script course description.\r\nShell script course description.\r\nShell script course description. Shell script course description.\r\nShell script course description. Shell script course description.\r\nShell script course description.\r\nShell script course description.\r\nShell script course description.', '* RHSA1 course.', '*anyone anywhere', '2017/03/14eb48467d.png', 1, 10, '2017-03-12 04:55:27'),
(17, 'RHSA1', 'Intro RHSA1 course.', 'RHSA1 course description. RHSA1 course description.\r\nRHSA1 course description. RHSA1 course description.\r\nRHSA1 course description.\r\nRHSA1 course description. RHSA1 course description.\r\nRHSA1 course description. RHSA1 course description.\r\nRHSA1 course description. \r\nRHSA1 course description.\r\nRHSA1 course description. RHSA1 course description.\r\nRHSA1 course description.', '*..', '*anyone', '2017/03/d09b89b062.jpg', 1, 7, '2017-03-12 04:56:58'),
(14, 'Php', 'This is php course.', 'Php course description. Php course description.\r\nPhp course description.\r\nPhp course description.\r\nPhp course description. Php course description.\r\nPhp course description. Php course description.\r\nPhp course description.\r\nPhp course description. Php course description.', '*programming background\r\n*awareness of client and server side terminologies', '*any body can do this', '2017/03/24c26f26d5.png', 1, 5, '2017-03-12 04:45:29'),
(18, 'RHSA2', 'Intro to RHSA1 course.', 'RHSA2 course description.\r\nRHSA2 course description.\r\nRHSA2 course description. RHSA2 course description.\r\nRHSA2 course description. RHSA2 course description.\r\nRHSA2 course description. RHSA2 course description.\r\nRHSA2 course description.\r\nRHSA2 course description.', 'RHSA1 course .', '*Adminstration', '2017/03/18569699ac.jpg', 1, 7, '2017-03-12 04:58:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
