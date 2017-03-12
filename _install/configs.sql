-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2017 at 09:42 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  ('site_name', 'Zaitona', 'string'),
  ('site_slogan', 'Learning Today ... Leading Tomorrow', 'string'),
  ('site_lang', 'en', 'string'),
  ('smtp_server', 'smtp.gmail.com', ''),
  ('smtp_port', '465', 'int'),
  ('smtp_email', 'webfairynetwork@gmail.com', ''),
  ('smtp_password', 'fairynet66', ''),
  ('site_email', 'zaitona@gmail.com', ''),
  ('welcome_email_template', 'Welcome [name],\r\nThank you for creating an [site_name] account.\r\nHere you details\r\nName: [name]\r\nEmail: [email]\r\n—[site_name] Team', 'html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
ADD PRIMARY KEY (`name`);
