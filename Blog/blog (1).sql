-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 13, 2023 at 03:23 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nadawca` int(11) DEFAULT NULL,
  `odbiorca` int(11) DEFAULT NULL,
  `tekst` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments_opinions`
--

CREATE TABLE `comments_opinions` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_reaction` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `unique_id`, `user_id`, `content`, `title`, `img`) VALUES
(22, 573717, 46270, 'POST1', 'POST1', '1686068834test.jpg'),
(23, 543867, 46270, 'POST2', 'POST2', '1686068838test.jpg'),
(24, 944033, 46270, 'POST3', 'POST3', '1686068842test.jpg'),
(25, 596810, 46270, 'POST4', 'POST4', '1686068846test.jpg'),
(26, 732233, 46270, 'POST5', 'POST5', '1686068849test.jpg'),
(27, 932671, 46270, 'ERWER', 'POSY6', '1686147634test.jpg'),
(28, 796850, 46270, 'dsad', 'post7', '1686149076test.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post_opinions`
--

CREATE TABLE `post_opinions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_reaction` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_opinions`
--

INSERT INTO `post_opinions` (`id`, `post_id`, `user_id`, `type_reaction`) VALUES
(19, 543867, 788893, 'like'),
(20, 543867, 46270, 'like'),
(21, 573717, 46270, 'like'),
(22, 944033, 46270, 'like'),
(23, 596810, 46270, 'like'),
(24, 732233, 46270, 'like'),
(25, 932671, 46270, 'like'),
(26, 796850, 46270, 'like'),
(27, 573717, 788893, 'dislike'),
(28, 944033, 788893, 'dislike'),
(29, 596810, 788893, 'like'),
(30, 732233, 788893, 'dislike'),
(31, 932671, 788893, 'like'),
(32, 796850, 788893, 'dislike');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passwd` varchar(40) DEFAULT NULL,
  `confirm_passwd` varchar(40) DEFAULT NULL,
  `surrname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `admin_permissions` tinyint(1) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `img_usr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `email`, `passwd`, `confirm_passwd`, `surrname`, `firstname`, `nickname`, `admin_permissions`, `status`, `img_usr`) VALUES
(27, 46270, 'msliwinski247@gmail.com', 'Mati1980', 'Mati1980', 'sliwinski', 'mateusz', 'mateusz', 1, 'online', 'user.jpg'),
(28, 788893, 'jan@gmail.com', '12345678', '12345678', 'kowalski', 'jan', 'mateusz', 0, 'offline', NULL),
(29, 522340, 'maruni@gmail.com', '12345678', '12345678', 'MaRECZEK', 'Marunio', 'Marek', 0, 'offline', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments_opinions`
--
ALTER TABLE `comments_opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `post_opinions`
--
ALTER TABLE `post_opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_opinions`
--
ALTER TABLE `comments_opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post_opinions`
--
ALTER TABLE `post_opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
