-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 29 Maj 2017, 18:32
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cinemas_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Cinema`
--

CREATE TABLE `Cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Cinema`
--

INSERT INTO `Cinema` (`id`, `name`, `address`) VALUES
(3, 'Cinema City', '1 Maja 320, Ruda Śląska'),
(7, 'Kino Partia', 'Chorzowska 3, Ruda Śląska'),
(8, 'Kino Marzenie', 'Plac Wolności 6, Zabrze'),
(9, 'Multikino', 'Gdańska 18, Zabrze'),
(10, 'Rialto', 'św. Jana 24, Katowice'),
(11, 'Cinema City Punkt 44', 'Gliwicka 44, Katowice'),
(14, 'Kino Kosmos', 'Sokolska 66, Katowice');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `rating` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Movie`
--

INSERT INTO `Movie` (`id`, `name`, `description`, `rating`) VALUES
(1, 'Chłopaki nie płaczą', 'Polska komedia przygodowa', 9.00),
(2, 'Skazani na Shawshank', 'Amerykański film fabularny', 10.00),
(3, 'Piękny umysł', 'Amerykański film biograficzny', 9.00),
(4, 'Poranek Kojota', 'Polska komedia przygodowa', 8.00),
(5, 'Forest Gump', 'Amerykański film fabularny', 9.00),
(6, 'Obecność', 'Amerykański horror', 8.00),
(7, 'Zielona mila', 'Amerykański film fabularny', 9.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Payment`
--

CREATE TABLE `Payment` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Payment`
--

INSERT INTO `Payment` (`id`, `type`, `date`) VALUES
(1, 'Gotówka', '2017-01-11'),
(2, 'Przelew', '2016-12-23'),
(3, 'Karta', '2016-12-06'),
(4, 'Gotówka', '2017-01-02'),
(5, 'Przelew', '2016-12-14'),
(6, 'Karta', '2016-11-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Ticket`
--

CREATE TABLE `Ticket` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Ticket`
--

INSERT INTO `Ticket` (`id`, `quantity`, `price`) VALUES
(1, 1, 17.00),
(2, 2, 42.00),
(3, 2, 38.00),
(5, 4, 80.00),
(6, 6, 110.00),
(7, 3, 55.50),
(8, 1, 22.00);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Cinema`
--
ALTER TABLE `Cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Cinema`
--
ALTER TABLE `Cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `Payment`
--
ALTER TABLE `Payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
