-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 29 Maj 2017, 19:43
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cinema_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Cinemas`
--

CREATE TABLE `Cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `adress` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Cinemas`
--

INSERT INTO `Cinemas` (`id`, `name`, `adress`) VALUES
(1, 'Luna', 'ul. Marszałkowska 28'),
(2, 'Silver Screen Puławska', 'Centrum Europlex - ul. Puławska 17'),
(3, 'Iluzjon Filmoteki Narodowej', 'ul. Narbutta 50a'),
(4, 'Etnokino', 'Ul. Kredytowa 1, Warszawa'),
(5, 'Multikino Złote Tarasy', 'ul. Złota 59'),
(6, 'Kinoteka', 'pl. Defilad 1'),
(7, 'Cinema City Promenada', 'ul. Ostrobramska 75C'),
(8, 'Praha', 'ul. Jagielloñska 26'),
(9, 'Alchemia', 'ul. Jezuicka 4'),
(10, 'Muranów', 'ul. Zamenhofa 1'),
(11, 'Femina', 'al. Solidarności 115'),
(12, 'Cinema City', '1 Maja 320, Ruda Śląska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Movies`
--

CREATE TABLE `Movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Movies`
--

INSERT INTO `Movies` (`id`, `name`, `description`, `rating`) VALUES
(1, 'Zbuntowana (2015)', 'Beatrice Prior konfrontuje się z wewnętrznymi demonami i kontynuuje walkę przeciwko ogromnemu sojuszowi, który może spowodować rozpad społeczeństwa.', 7),
(2, 'Seks, miłość i terapia (2014)', 'Lambert, seksoholik starający się zerwać z nałogiem, zatrudnia wiecznie niezaspokojoną nimfomankę.', 5),
(3, 'Ex Machina (2015)', 'Po wygraniu konkursu programista jednej z największych firm internetowych zostaje zaproszony do posiadłości swojego szefa. Na miejsce okazuje się, że jest częścią eksperymentu. ', 8),
(4, 'Sils Maria (2014)', 'Wybitna aktorka podczas kilku dni spędzonych w Alpach ze swoją asystentką na nowo odkrywa siebie. ', 7),
(5, 'Chappie (2015)', 'Dwóch gangsterów kradnie policyjnego androida, by wykorzystać go do swoich celów. ', 8),
(6, 'Kopciuszek (2015)', 'Po śmierci ojca zła macocha Elli zamienia dziewczynę w służącą. Los Kopciuszka odmieni dopiero Dobra Wróżka.', 8),
(7, 'Sąsiady (2014)', 'Ksiądz odwiedza po kolędzie kamienicę, odkrywając tajemnice jej lokatorów. ', 3),
(8, 'Złota klatka (2013)', 'Sara, nastolatka z Gwatemali, wyrusza w niebezpieczną podróż do Los Angeles w poszukiwaniu lepszego życia.', 9),
(9, 'Body/Ciało (2015)', 'Cyniczny prokurator i jego cierpiąca na anoreksję córka próbują odnaleźć się po tragicznej śmierci najbliższej osoby.', 6),
(10, 'Fru! (2014)', 'Ptaszek, który nigdy wcześniej nie wychylił dzioba poza rodzinne gniazdo, zostaje przez pomyłkę przewodnikiem stada.', 5),
(11, 'Disco Polo (2015)', 'Młodzi muzycy z prowincji w błyskawiczny sposób zdobywają szczyty list przebojów.', 2),
(12, 'Asteriks i Obeliks: Osiedle Bogów (2014)', 'Juliusz Cezar decyduje się na budowę dzielnicy mieszkaniowej dla właścicieli rzymskich i nazywa ją Osiedlem Bogów.', 9),
(13, 'Chłopaki nie płaczą', 'Polska komedia przygodowa', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Payment`
--

CREATE TABLE `Payment` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Payment`
--

INSERT INTO `Payment` (`id`, `type`, `date`, `pay`) VALUES
(21, 'Przelew', '2017-01-02 00:00:00', 'Opłacony'),
(22, '', '2016-12-23 00:00:00', 'Nieopłacony'),
(23, 'Gotówka', '2016-11-11 00:00:00', 'Opłacony'),
(24, 'Karta', '2017-01-20 00:00:00', 'Opłacony'),
(25, '', '2017-01-10 00:00:00', 'Nieopłacony'),
(26, 'Przelew', '2016-12-15 00:00:00', 'Opłacony'),
(27, 'Karta', '2016-12-23 00:00:00', 'Opłacony'),
(49, '', '2017-01-02 00:00:00', 'Nieopłacony'),
(51, 'Przelew', '2016-12-15 00:00:00', 'Opłacony'),
(52, 'Karta', '2017-01-20 00:00:00', 'Opłacony'),
(54, 'Gotówka', '2016-11-11 00:00:00', 'Opłacony'),
(57, '', '2017-01-02 00:00:00', 'Nieopłacony'),
(65, 'Przelew', '2017-01-02 00:00:00', 'Opłacony'),
(66, 'Karta', '2016-12-23 00:00:00', 'Opłacony'),
(67, 'Karta', '2016-12-23 00:00:00', 'Opłacony'),
(69, 'Przelew', '2017-01-20 00:00:00', 'Opłacony'),
(70, 'Gotówka', '2017-02-05 00:00:00', 'Opłacony'),
(71, 'Karta', '2017-02-05 00:00:00', 'Opłacony'),
(75, '', '2017-02-05 00:00:00', 'Nieopłacony'),
(82, '', '2016-12-15 00:00:00', 'Nieopłacony'),
(84, 'Przelew', '2016-11-11 00:00:00', 'Opłacony'),
(87, 'Gotówka', '2017-01-20 00:00:00', 'Opłacony'),
(88, 'Gotówka', '2017-02-17 00:00:00', 'Opłacony'),
(91, 'Przelew', '2017-02-10 00:00:00', 'Opłacony'),
(92, '', '2017-02-08 00:00:00', 'Nieopłacony'),
(93, 'Karta', '2016-12-23 00:00:00', 'Opłacony'),
(95, 'Brak', '2017-02-14 00:00:00', 'Nieopłacony'),
(96, 'Przelew', '2017-02-01 00:00:00', 'Opłacony'),
(97, '', '2017-02-01 00:00:00', 'Nieopłacony'),
(98, 'Przelew', '2017-01-11 00:00:00', 'Opłacony'),
(99, 'Brak', '2017-02-01 00:00:00', 'Nieopłacony'),
(102, '', '2017-02-01 00:00:00', 'Nieopłacony'),
(104, 'Brak', '2017-02-13 00:00:00', 'Nieopłacony'),
(106, 'Gotówka', '2017-02-28 00:00:00', 'Opłacony'),
(108, 'Karta', '2017-02-08 00:00:00', 'Opłacony'),
(109, 'Karta', '2017-02-15 00:00:00', 'Opłacony'),
(110, 'Brak', '2017-02-05 00:00:00', 'Nieopłacony'),
(111, 'Gotówka', '2016-12-23 00:00:00', 'Opłacony'),
(112, 'Gotówka', '2016-12-23 00:00:00', 'Opłacony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Shows`
--

CREATE TABLE `Shows` (
  `id` int(11) NOT NULL,
  `cinemas_id` int(11) DEFAULT NULL,
  `movies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Shows`
--

INSERT INTO `Shows` (`id`, `cinemas_id`, `movies_id`) VALUES
(1, 1, 1),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(9, 2, 10),
(10, 2, 4),
(12, 2, 6),
(13, 4, 10),
(17, 4, 1),
(18, 6, 11),
(27, 8, 5),
(29, 2, 1),
(30, 2, 2),
(33, 2, 5),
(41, 5, 3),
(48, 5, 10),
(49, 7, 1),
(60, 7, 12),
(61, 1, 12),
(65, 5, 12),
(66, 6, 12),
(68, 8, 12),
(70, 10, 12),
(71, 11, 12),
(74, 3, 6),
(75, 4, 6),
(76, 5, 6),
(77, 6, 6),
(78, 7, 6),
(79, 8, 6),
(80, 9, 6),
(81, 10, 6),
(82, 11, 6),
(83, 1, 2),
(85, 3, 2),
(86, 4, 2),
(87, 5, 2),
(88, 6, 2),
(89, 7, 2),
(90, 8, 2),
(91, 9, 2),
(92, 10, 2),
(93, 11, 2),
(96, 3, 4),
(97, 4, 4),
(98, 5, 4),
(99, 6, 4),
(100, 7, 4),
(101, 8, 4),
(102, 9, 4),
(103, 10, 4),
(104, 11, 4),
(105, 5, 9),
(106, 1, 1),
(107, 12, 13),
(108, 12, 12),
(111, 7, 9),
(112, 9, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Ticket`
--

CREATE TABLE `Ticket` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `shows_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Ticket`
--

INSERT INTO `Ticket` (`id`, `quantity`, `price`, `shows_id`) VALUES
(21, 2, 45.00, NULL),
(22, 4, 55.00, NULL),
(23, 1, 17.00, NULL),
(24, 6, 100.00, NULL),
(25, 2, 30.00, NULL),
(26, 3, 50.00, NULL),
(27, 10, 150.00, NULL),
(28, 1, 20.00, 100),
(29, 2, 20.00, 80),
(30, 1, 15.00, 13),
(31, 1, 25.00, 17),
(32, 10, 150.00, 60),
(33, 2, 55.00, 76),
(34, 2, 30.00, 27),
(35, 5, 85.00, 89),
(36, 3, 50.00, 87),
(37, 1, 17.00, 13),
(39, 2, 30.00, 13),
(40, 3, 46.00, 13),
(41, 3, 46.00, 74),
(42, 3, 46.00, 48),
(44, 5, 100.00, 90),
(45, 5, 100.00, 48),
(46, 1, 22.00, 97),
(47, 2, 35.00, 71),
(48, 1, 18.00, 93),
(49, 1, 13.00, 75),
(50, 2, 25.00, 78),
(51, 2, 25.00, 78),
(52, 4, 50.00, 13),
(53, 1, 15.00, 89),
(54, 1, 15.00, 89),
(55, 1, 22.00, 78),
(56, 1, 22.00, 78),
(57, 1, 22.00, 78),
(58, 1, 22.00, 78),
(59, 1, 22.00, 78),
(60, 1, 22.00, 78),
(61, 3, 50.00, 100),
(62, 1, 21.00, 71),
(63, 1, 21.00, 71),
(64, 1, 21.00, 71),
(65, 1, 21.00, 71),
(66, 10, 150.00, 76),
(67, 10, 150.00, 76),
(68, 2, 45.00, 105),
(69, 1, 19.00, 108),
(70, 1, 15.00, 80),
(71, 8, 110.00, 107),
(72, 1, 15.00, 86),
(73, 1, 15.00, 86),
(74, 1, 15.00, 86),
(75, 1, 15.00, 86),
(76, 2, 25.00, 107),
(77, 2, 25.00, 107),
(78, 2, 25.00, 107),
(79, 2, 25.00, 107),
(80, 2, 25.00, 107),
(81, 2, 25.00, 107),
(82, 2, 25.00, 107),
(83, 1, 13.00, 49),
(84, 1, 13.00, 49),
(85, 1, 23.00, 49),
(86, 1, 23.00, 49),
(87, 1, 23.00, 49),
(88, 1, 17.00, 100),
(89, 1, 25.00, 97),
(90, 1, 25.00, 97),
(91, 1, 25.00, 97),
(92, 2, 30.00, 60),
(93, 1, 25.00, 70),
(94, 1, 15.00, 93),
(95, 1, 15.00, NULL),
(96, 1, 15.00, NULL),
(97, 1, 15.00, NULL),
(98, 2, 30.00, NULL),
(99, 5, 70.00, NULL),
(100, 1, 22.00, 87),
(101, 1, 10.00, 107),
(102, 5, 80.00, 61),
(103, 1, 19.00, 41),
(104, 1, 19.00, 41),
(105, 1, 20.00, 107),
(106, 1, 20.00, 107),
(107, 1, 15.00, 80),
(108, 1, 15.00, 80),
(109, 1, 25.00, 111),
(110, 10, 170.00, 27),
(111, 2, 30.00, 85),
(112, 1, 0.25, 76);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Shows`
--
ALTER TABLE `Shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinemas_id` (`cinemas_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shows_id` (`shows_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Cinemas`
--
ALTER TABLE `Cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `Movies`
--
ALTER TABLE `Movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `Payment`
--
ALTER TABLE `Payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT dla tabeli `Shows`
--
ALTER TABLE `Shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT dla tabeli `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Ticket` (`id`);

--
-- Ograniczenia dla tabeli `Shows`
--
ALTER TABLE `Shows`
  ADD CONSTRAINT `Shows_ibfk_1` FOREIGN KEY (`cinemas_id`) REFERENCES `Cinemas` (`id`),
  ADD CONSTRAINT `Shows_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `Movies` (`id`);

--
-- Ograniczenia dla tabeli `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `Ticket_ibfk_1` FOREIGN KEY (`shows_id`) REFERENCES `Shows` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
