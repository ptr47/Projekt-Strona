-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2024 at 01:25 AM
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
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `data`, `tresc`) VALUES
(1, 1, 1, '2013-12-31 23:00:00', 'pierwszy komentarz'),
(3, 1, 1, '2024-01-20 00:05:59', 'drugi komentarz (dodany ze strony)'),
(4, 5, 1, '2024-01-20 00:06:10', 'random comment moment'),
(5, 8, 3, '2024-01-20 11:38:17', 'ok'),
(6, 9, 1, '2024-01-29 12:20:07', 'komentarz'),
(7, 1, 1, '2024-01-31 21:42:32', 'b'),
(8, 5, 1, '2024-01-31 21:42:59', 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `tresc` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `data`, `tresc`, `title`) VALUES
(1, 1, '2013-12-31 23:00:00', 'to jest tresc pierwszego postu', 'Post testowy'),
(4, 1, '2024-01-19 23:37:02', 'Ten post został dodany ze strony', 'Dodawanie postu'),
(5, 1, '2024-01-19 23:37:16', 'ablabla', 'nowy post'),
(6, 1, '2024-01-19 23:37:28', 'ablabla', 'nowy post'),
(7, 1, '2024-01-19 23:40:43', 'dfgsdhfhfghfg', 'adsadasd'),
(8, 3, '2024-01-20 11:37:58', 'próba', 'próba'),
(9, 1, '2024-01-29 12:19:57', 'tytul', 'tytul'),
(10, 8, '2024-01-29 12:21:22', 'tresc', 'tytuł');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `pfp` text DEFAULT NULL COMMENT 'path to profile picture',
  `birthdate` date DEFAULT NULL,
  `newsletter` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `pfp`, `birthdate`, `newsletter`) VALUES
(1, 'admin', 'admin', NULL, '1900-01-01', 0x30),
(2, 'user', 'user', NULL, NULL, 0x30),
(3, 'asia', 'asia', NULL, NULL, 0x30),
(8, 'user5', 'hasło', NULL, NULL, 0x30),
(9, 'a', 'd', NULL, NULL, 0x31),
(10, '243', '432', NULL, NULL, 0x31),
(11, '65', '65', NULL, NULL, 0x30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
