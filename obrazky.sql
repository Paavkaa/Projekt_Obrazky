-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 06. dub 2023, 17:32
-- Verze serveru: 10.4.25-MariaDB
-- Verze PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `obrazky`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `album`
--

CREATE TABLE `album` (
  `ID_alb` int(5) NOT NULL,
  `nazev_alb` varchar(100) NOT NULL,
  `public` int(1) NOT NULL COMMENT '0 = soukromý 1 = veřejný',
  `ID_u` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `album`
--

INSERT INTO `album` (`ID_alb`, `nazev_alb`, `public`, `ID_u`) VALUES
(22, 'kokotzaaaa', 0, 18),
(23, 'Jitrnice', 0, 18);

-- --------------------------------------------------------

--
-- Struktura tabulky `picture`
--

CREATE TABLE `picture` (
  `ID_pic` int(5) NOT NULL,
  `nazev_pic` varchar(100) NOT NULL,
  `ID_alb` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `ID_user` int(5) NOT NULL,
  `nickname` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `mail` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `password` varchar(100) COLLATE utf16_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`ID_user`, `nickname`, `mail`, `password`) VALUES
(2, 'aassadasd', 'aaa@aaa.aa', '$2y$10$b90xXLth89VN0HitkVzLnu.zSOflUjNDMKbDgR1nnfRr51oj1Jk4O'),
(3, 'a', 'jhds@mail.com', '$2y$10$xQlKthJGZ3f/XclenDxFbOL4evCddf7LPzicM2zoFRjSemgH4d8IC'),
(4, 'asad', 'asdjahsd@mail.cz', '$2y$10$qLg8WB56KENGGy8e71igG.yk2kwNP0bcBUojD8i9pNQpWPqnM6eEG'),
(7, 'ahoj', 'asdjahsd@mail.cz', '$2y$10$FpWsw0468tQZD2tHbvbg6eY8IepjdY4UR0UrkVMTZNMAA.Hro/zhi'),
(8, 'd', 'asdjahsd@mail.cz', '$2y$10$46OrcI3tn6mvWZnTw09YpOIq73MX29zUumokqJ7lNA2sY7/GrivJa'),
(9, 'aaaa', 'asdjah@mail.cz', '$2y$10$0MetKaSkH0iUHzV3tWHXRu2NqHrSvmqQ3z7RgXkMzynOGveX/UQwW'),
(11, 'a', '', '$2y$10$r7zn8xgtTdBC2d8sm83o/e7f4nn3WNC74SIc7.pITAc5oAZLW2fUG'),
(12, 'karel', 'karel@gogolmail.com', '$2y$10$B/Snx6txZtbQALEHPY88rOorE3vAy4StewLUdwPMOa.C2fKKqdBWy'),
(13, 'juzewrujizeqi', 'zwqetghdsvgbjha@mail.com', '$2y$10$E3wSGwFxJMcKNzptRgV2GuJ9gJryydUhYbO4DsnoJk8Vrb7T/9GvK'),
(14, 'wqewqeqweq', 'aaaaaaasd@mail.com', '$2y$10$CRBqpgs2e0LXkJjhpDPTP.HuNGfxdm7Idk2BSmqP.Ec/00CRT7BIa'),
(15, 'wqewqeqweqaa', 'aaaaaaaasd@mail.com', '$2y$10$OBLZWWcNUS5RXB3KSXAR5uvuUgC4iqvPsP3PPHvUFa6XO.sAomUAS'),
(16, 'asadasdasda', 's', '$2y$10$HAUdkAvLZFXkIeD9YJnpHOiFurEk8pR1taxRGyVsPj.bFAo64TOZ2'),
(17, 'ksaldkasldasd', 'fffffffff@fffffff.fff', '$2y$10$REdkEMBpWNajkmhxHyiAPeB7EICfcMTyRLeI4xAN0X0biS2AC/oxW'),
(18, 'heslo123', 'heslo123@mail.com', '$2y$10$.dXuv4khCGtUZHFD3x5UHu.F6W468GcWVfWbLPZmpIyxwiR0NEQzm');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID_alb`),
  ADD KEY `ID_u` (`ID_u`);

--
-- Indexy pro tabulku `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`ID_pic`),
  ADD KEY `ID_alb` (`ID_alb`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `album`
--
ALTER TABLE `album`
  MODIFY `ID_alb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pro tabulku `picture`
--
ALTER TABLE `picture`
  MODIFY `ID_pic` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`ID_u`) REFERENCES `user` (`ID_user`);

--
-- Omezení pro tabulku `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`ID_alb`) REFERENCES `album` (`ID_alb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
