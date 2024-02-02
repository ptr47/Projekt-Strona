-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2024 at 01:54 PM
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
-- Table structure for table `ammo`
--

CREATE TABLE `ammo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ammo`
--

INSERT INTO `ammo` (`id`, `name`, `type`, `image`) VALUES
(1, '9x19mm Parabellum', 'pistoletowa', 'img/ammo/9x19.jpg'),
(2, '5.56x45mm NATO', 'pośrednia', 'img/ammo/556x45.jpg'),
(3, '9x18mm Makarov', 'pistoletowa', 'img/ammo/9x18mm.png'),
(4, '.357 Magnum', 'rewolwerowa', 'img/ammo/default.png'),
(5, '.223 Remington', 'pośrednia', 'img/ammo/default.png'),
(6, '7.62x39mm', 'pośrednia', 'img/ammo/default.png'),
(7, '12 Gauge', 'śrutowa', 'img/ammo/default.png'),
(8, '5.56x45mm NATO', 'pośrednia', 'img/ammo/default.png'),
(9, '7.62x51mm NATO', 'karabinowa', 'img/ammo/default.png'),
(10, '7.62x54mmR', 'karabinowa', 'img/ammo/default.png'),
(11, '5.45x39mm', 'pośrednia', 'img/ammo/default.png'),
(12, '7.62x25mm Tokarev', 'pistoletowa', 'img/ammo/default.png'),
(13, '.30-06 Springfield', 'karabinowa', 'img/ammo/default.png'),
(14, '.45 ACP', 'pistoletowa', 'img/ammo/default.png'),
(15, '.44 Magnum', 'rewolwerowa', 'img/ammo/default.png'),
(16, '.308 Winchester', 'karabinowa', 'img/ammo/default.png'),
(17, '.50 BMG', 'karabinowa', 'img/ammo/default.png'),
(18, '.300 Winchester Magnum', 'karabinowa', 'img/ammo/default.png'),
(19, '.338 Lapua Magnum', 'karabinowa', 'img/ammo/default.png'),
(20, '.380 ACP', 'pistoletowa', 'img/ammo/default.png'),
(21, '.50 Action Express', 'pistoletowa', 'img/ammo/default.png'),
(22, '.300 AAC Blackout', 'karabinowa', 'img/ammo/default.png'),
(23, '.22 Long Rifle', 'karabinowa', 'img/ammo/default.png'),
(24, '.44 Special', 'rewolwerowa', 'img/ammo/default.png'),
(25, '.45 Colt', 'rewolwerowa', 'img/ammo/default.png');

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
(19, 17, 8, '2024-02-01 22:44:28', 'dfhgfghdf'),
(22, 22, 2, '2024-02-02 12:17:00', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `guns`
--

CREATE TABLE `guns` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guns`
--

INSERT INTO `guns` (`id`, `name`, `type`, `image`) VALUES
(1, 'AK-74', 'karabinek', 'img/guns/Ak74.png'),
(2, 'RPK', 'karabinek', 'img/guns/RPK.jpg'),
(3, 'M16A2', 'karabinek', 'img/guns/M16A2.jpg'),
(4, 'M1918A2', 'karabin', 'img/guns/M1918A2BAR.webp'),
(5, 'M1 Garand', 'karabin', 'img/guns/M1Garand.webp'),
(6, 'M16', 'karabinek', 'img/guns/default.png'),
(7, 'Glock 17', 'pistolet', 'img/guns/default.png'),
(8, 'Uzi', 'pistolet maszynowy', 'img/guns/default.png'),
(9, 'Colt Python', 'rewolwer', 'img/guns/default.png'),
(10, 'Mossberg 500', 'strzelba', 'img/guns/default.png'),
(11, 'FN FAL', 'karabin', 'img/guns/default.png'),
(12, 'Desert Eagle', 'pistolet', 'img/guns/default.png'),
(13, 'MP5', 'pistolet maszynowy', 'img/guns/default.png'),
(14, 'Smith & Wesson Model 29', 'rewolwer', 'img/guns/default.png'),
(15, 'Winchester Model 1897', 'strzelba', 'img/guns/default.png'),
(16, 'AR-15', 'karabinek', 'img/guns/default.png'),
(17, 'M14', 'karabin', 'img/guns/default.png'),
(18, 'Beretta 92', 'pistolet', 'img/guns/default.png'),
(19, 'Colt M1928A1', 'pistolet maszynowy', 'img/guns/default.png'),
(20, 'Smith & Wesson Model 686', 'rewolwer', 'img/guns/default.png'),
(21, 'Remington 870', 'strzelba', 'img/guns/default.png'),
(22, 'Steyr AUG', 'karabinek', 'img/guns/default.png'),
(23, 'Walther PPK', 'pistolet', 'img/guns/default.png'),
(24, 'PPSh-41', 'pistolet maszynowy', 'img/guns/default.png'),
(25, 'Ruger Blackhawk', 'rewolwer', 'img/guns/default.png'),
(26, 'Ithaca 37', 'strzelba', 'img/guns/default.png'),
(27, 'FN SCAR-H', 'karabin', 'img/guns/default.png'),
(28, 'M1903 Springfield', 'karabin', 'img/guns/default.png'),
(29, 'Sig Sauer P226', 'pistolet', 'img/guns/default.png'),
(30, 'Heckler & Koch MP7', 'pistolet maszynowy', 'img/guns/default.png'),
(31, 'Benelli M4', 'strzelba', 'img/guns/default.png'),
(32, 'Bazooka', 'pistolet', 'img/guns/default.png');

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
(20, 1, '2024-02-01 23:19:04', 'Six hasn\'t been the same since he left Vietnam. He can seldom close his eyes without opening them again at fear of Charlies lurking in the jungle trees. Not that you could ever see the bastards, mind you. They were swift, and they knew their way around the jungle like nothing else. He remembers the looks on the boys\' faces as he walked into that village and... oh, Jesus. The memories seldom left him, either. Sometimes he\'d reminisce - even hear - Tex\'s southern drawl. He remembers the smell of Brooklyn\'s cigarettes like nothing else. He always kept a pack of Lucky\'s with him. The boys are gone, now. He knows that; it\'s just that he forgets, sometimes. And, every now and then, the way that seven looks at him with avid concern in his eyes... it makes him think. Sets him on edge. Makes him feel like he\'s back there... in the jungle.', 'Why is six afraid of seven?'),
(22, 0, '2024-02-02 12:16:35', 'nhufjsd', 'siema, jestem marcin');

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
(6, 'Co oznacza skrót StG?', 'Sturmgewehr', 'Schützengewehr', 'Sicherheitsgewehr', 'Sturzgeschoss', 'a'),
(7, 'Która z tych broni to karabin snajperski?', 'MG 42', 'SIG SG 550', 'Desert Eagle', 'SVD', 'd');

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
(1, 'admin', 'admin', '2024-02-01 23:28:44', 'admin@admin.com', '1666-02-01', 0x30),
(2, 'user', 'masło', '2024-02-02 12:17:55', 'gtg@mail', '2024-02-21', 0x30),
(8, 'user5', 'hasło', NULL, NULL, NULL, 0x30),
(9, 'a', 'd', NULL, 'a@d.pl', '2024-02-06', 0x31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ammo`
--
ALTER TABLE `ammo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guns`
--
ALTER TABLE `guns`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ammo`
--
ALTER TABLE `ammo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guns`
--
ALTER TABLE `guns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
