-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2024 at 01:44 AM
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
(11, 12, 2, '2024-02-01 22:33:35', 'komentarz'),
(18, 17, 8, '2024-02-01 22:44:25', 'dsfgsgfd'),
(19, 17, 8, '2024-02-01 22:44:28', 'dfhgfghdf');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `tresc` mediumtext NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `data`, `tresc`, `title`) VALUES
(12, 2, '2024-02-01 22:33:28', 'treść', 'Tytuł'),
(14, 1, '2024-02-01 22:35:37', 'test\r\n', 'test'),
(17, 8, '2024-02-01 22:44:22', 'gsdfdfgs', 'gdfgd'),
(18, 1, '2024-02-01 22:59:48', 'dfgdfg', 'fds'),
(19, 1, '2024-02-01 23:18:45', 'sadsad\'', 'asdds'),
(20, 1, '2024-02-01 23:19:04', 'Six hasn\'t been the same since he left Vietnam. He can seldom close his eyes without opening them again at fear of Charlies lurking in the jungle trees. Not that you could ever see the bastards, mind you. They were swift, and they knew their way around the jungle like nothing else. He remembers the looks on the boys\' faces as he walked into that village and... oh, Jesus. The memories seldom left him, either. Sometimes he\'d reminisce - even hear - Tex\'s southern drawl. He remembers the smell of Brooklyn\'s cigarettes like nothing else. He always kept a pack of Lucky\'s with him. The boys are gone, now. He knows that; it\'s just that he forgets, sometimes. And, every now and then, the way that seven looks at him with avid concern in his eyes... it makes him think. Sets him on edge. Makes him feel like he\'s back there... in the jungle.', 'Why is six afraid of seven?');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'Kto był twórcą pierwszego rewolweru kapiszonowego?', 'Richard Gatling', 'Samuel Colt', 'Johann Nikolaus von Dreyse', 'Hiram Maxim', 'b'),
(2, 'Która z tych broni jest pistoletem?', 'AK-47', 'M16', 'Colt 1911', 'Nagant M1895', 'c'),
(3, 'W którym wieku pojawiły się pierwsze prototypy broni odtylcowej?', 'XIV', 'XVII', 'XIX', 'XX', 'a'),
(4, 'Który rodzaj broni palnej był prekursorem karabinów maszynowych?', 'Karabin szturmowy', 'Karabin automatyczny', 'Karabin jednostrzałowy', 'Kartaczownica', 'd'),
(5, 'Kto był twórcą pierwszego udanego odtylcowego karabinu iglicowego?', 'Samuel Colt', 'Johann Nikolaus von Dreyse', 'Casimir Lefaucheux', 'Hiram Maxim', 'b'),
(6, 'Co oznacza skrót StG?', 'Sturmgewehr', 'Schützengewehr', 'Sicherheitsgewehr', 'Sturzgeschoss', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `pass_change` timestamp NULL DEFAULT current_timestamp() COMMENT 'last time password was changed',
  `email` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `newsletter` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `pass_change`, `email`, `birthdate`, `newsletter`) VALUES
(0, '[DELETED USER]', '', NULL, NULL, NULL, 0x30),
(1, 'admin', 'admin', '2024-02-01 23:28:44', 'a@a', '2024-02-06', 0x30),
(2, 'user', 'user', NULL, NULL, NULL, 0x30),
(8, 'user5', 'hasło', NULL, NULL, NULL, 0x30),
(9, 'a', 'd', NULL, 'a@d.pl', '2024-02-06', 0x31);

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
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
