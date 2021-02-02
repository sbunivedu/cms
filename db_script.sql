-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2021 at 09:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(1, 'javascript');
INSERT INTO `categories` VALUES(5, 'PHP');
INSERT INTO `categories` VALUES(6, 'Java');
INSERT INTO `categories` VALUES(7, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` VALUES(8, 1, 'blu', 'lubaochuan@gmail.com', 'test comment', 'unapproved', '2020-12-29');
INSERT INTO `comments` VALUES(9, 2, 'dsaf', 'blu@sbuniv.edu', 'hello', 'unapproved', '2020-12-29');
INSERT INTO `comments` VALUES(10, 1, '', '', '', 'unapproved', '2021-01-07');
INSERT INTO `comments` VALUES(11, 1, 'dsaf', 'blu@sbuniv.edu', 'Hello', 'unapproved', '2021-01-07');
INSERT INTO `comments` VALUES(12, 1, 'dsaf', 'blu@sbuniv.edu', 'Hello', 'unapproved', '2021-01-07');
INSERT INTO `comments` VALUES(13, 1, 'b. Lu', 'lubaochuan@gmail.com', 'Hello world', 'unapproved', '2021-01-07');
INSERT INTO `comments` VALUES(14, 2, 'b. Lu', 'lubaochuan@gmail.com', 'Good job.', 'approved', '2021-01-11');
INSERT INTO `comments` VALUES(15, 2, 'blu', 'lubaochuan@gmail.com', 'Good job.', 'approved', '2021-01-11');
INSERT INTO `comments` VALUES(16, 7, 'blu', 'jianpuwang07@gmail.com', 'asdfa', 'approved', '2021-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(2, 1, 'PHP', 'blu', '2020-12-29', '350x150.png', 'hello world', 'java, js', 2, 'published');
INSERT INTO `posts` VALUES(7, 5, 'RE: Hello', 'Blu', '2021-01-12', '350x65.png', '<ul><li>eat</li><li>drink</li><li>be merry</li></ul>', 'java, js', 1, 'published');
INSERT INTO `posts` VALUES(10, 1, 'Syllabus', 'Blu', '2021-01-14', '', '<p>Teset</p>', 'java, js', 0, 'published');
INSERT INTO `posts` VALUES(11, 1, 'PHP', 'blu', '2021-01-14', '350x150.png', 'hello world', 'java, js', 2, 'published');
INSERT INTO `posts` VALUES(12, 5, 'RE: Hello', 'Blu', '2021-01-14', '350x65.png', '<ul><li>eat</li><li>drink</li><li>be merry</li></ul>', 'java, js', 1, 'published');
INSERT INTO `posts` VALUES(13, 1, 'Syllabus', 'Blu', '2021-01-14', '', '<p>Teset</p>', 'java, js', 0, 'published');
INSERT INTO `posts` VALUES(14, 1, 'Syllabus', 'Blu', '2021-01-15', '', '<p>Teset</p>', 'java, js', 0, 'published');
INSERT INTO `posts` VALUES(15, 5, 'RE: Hello', 'Blu', '2021-01-15', '350x65.png', '<ul><li>eat</li><li>drink</li><li>be merry</li></ul>', 'java, js', 1, 'published');
INSERT INTO `posts` VALUES(16, 1, 'PHP', 'blu', '2021-01-15', '350x150.png', 'hello world', 'java, js', 2, 'published');
INSERT INTO `posts` VALUES(17, 1, 'Syllabus', 'Blu', '2021-01-15', '', '<p>Teset</p>', 'java, js', 0, 'published');
INSERT INTO `posts` VALUES(18, 5, 'RE: Hello', 'Blu', '2021-01-15', '350x65.png', '<ul><li>eat</li><li>drink</li><li>be merry</li></ul>', 'java, js', 1, 'published');
INSERT INTO `posts` VALUES(19, 1, 'PHP', 'blu', '2021-01-15', '350x150.png', 'hello world', 'java, js', 2, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings12$'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(5, 'admin', '$2y$10$iusesomecrazystrings1uvXMOXlmEX.A1CFtrOOG/r92dZgLL/rS', 'B. ', 'Lu', 'lubaochuan@gmail.com', NULL, 'admin', '$2y$10$iusesomecrazystrings12$');
INSERT INTO `users` VALUES(24, 'bbb', '$2y$10$iusesomecrazystrings1uvXMOXlmEX.A1CFtrOOG/r92dZgLL/rS', NULL, NULL, 'blu@sbuniv.edu', NULL, 'admin', '$2y$10$iusesomecrazystrings12$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
