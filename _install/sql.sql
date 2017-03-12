-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 04:54 PM
-- Server version: 5.6.35
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zaitona`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;-- phpMyAdmin SQL Dump
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `material_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `material_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 6, 1, 'first comment on java', '2017-03-11 19:31:34'),
(2, 6, 1, 'second comment', '2017-03-11 22:10:26'),
(3, 7, 1, 'comment pdf', '2017-03-11 22:14:03'),
(13, 7, 2, 'new comment', '2017-03-12 09:38:32'),
(14, 7, 2, 'new comment 2', '2017-03-12 09:38:40'),
(22, 6, 2, 'java comment 2 modified', '2017-03-12 13:13:43'),
(21, 6, 2, 'java comment 1', '2017-03-12 13:13:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2017 at 10:05 PM
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
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`name`, `value`, `type`) VALUES
('site_name', 'Zaitona LMS', 'string'),
('site_lang', 'en', 'string');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
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
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `type`, `provider`, `link`, `title`, `section_id`, `course_id`, `user_id`, `file_name`, `file_type`, `file_size`, `hits`, `status`, `created_at`) VALUES
(6, 2, 'youtube', 'https://www.youtube.com/watch?v=3MZIkY55fS0', 'Learning Java: Part 1: Basic Introduction', 6, 8, 1, NULL, NULL, 0, 0, 1, '2017-03-11 15:59:23'),
(7, 1, '', '', 'java.pdf', 7, 8, 1, '2017/03/bf27c0db45.pdf', 'application/pdf', 705424, 0, 1, '2017-03-11 19:54:17'),
(8, 1, '', '', 'JavaScript-level1', 9, 15, 1, '2017/03/75eb968846.pdf', 'application/pdf', 1243563, 0, 1, '2017-03-12 07:44:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 07:02 PM
-- Server version: 5.6.35
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zaitona`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `request` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;-- phpMyAdmin SQL Dump
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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `course_id`, `title`, `created_at`) VALUES
(6, 8, 'Introduction', '2017-03-10 14:30:59'),
(7, 8, 'Basic', '2017-03-10 14:30:59'),
(8, 9, 'Introduction', '2017-03-10 14:36:13'),
(9, 15, 'Introduction', '2017-03-12 07:43:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2017 at 10:03 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zaitona`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account_type` tinyint(1) NOT NULL DEFAULT '1',
  `session_id` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;