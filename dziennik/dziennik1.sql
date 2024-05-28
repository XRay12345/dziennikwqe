-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 12:30 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dziennik1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komunikat`
--

CREATE TABLE `komunikat` (
  `ID_komunikat` int(11) NOT NULL,
  `ID_nadawcy` int(11) NOT NULL,
  `ID_odbiorcy` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Tresc_komunikatu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursy`
--

CREATE TABLE `kursy` (
  `ID_kursu` int(11) NOT NULL,
  `Nazwa_kursu` varchar(50) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursy`
--

INSERT INTO `kursy` (`ID_kursu`, `Nazwa_kursu`, `opis`) VALUES
(1, 'Matematyka', 'Kurs matematyki dla uczniów szkół średnich.'),
(2, 'Fizyka', 'Kurs fizyki obejmujący podstawowe prawa i zasady.'),
(3, 'Chemia', 'Kurs chemii dla uczniów szkół średnich.'),
(4, 'Język angielski', 'Kurs języka angielskiego dla różnych poziomów zaawansowania.'),
(5, 'Informatyka', 'Kurs informatyki obejmujący podstawy programowania i obsługę komputera.'),
(6, 'Historia', 'Kurs historii obejmujący wybrane okresy i wydarzenia.'),
(7, 'Biologia', 'Kurs biologii dla uczniów szkół średnich.'),
(8, 'Geografia', 'Kurs geografii obejmujący podstawowe zagadnienia z zakresu geografii fizycznej i społeczno-gospodarczej.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `ID_nauczyciela` int(11) NOT NULL,
  `Imię` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Specjalizacja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nauczyciele`
--

INSERT INTO `nauczyciele` (`ID_nauczyciela`, `Imię`, `Nazwisko`, `Specjalizacja`) VALUES
(1, 'Anna', 'Kowalska', 'Matematyka'),
(2, 'Jan', 'Nowak', 'Historia'),
(3, 'Katarzyna', 'Wiśniewska', 'Język polski'),
(4, 'Marek', 'Szymański', 'Fizyka'),
(5, 'Agnieszka', 'Kaczmarek', 'Chemia'),
(6, 'Tomasz', 'Wojciechowski', 'Biologia'),
(7, 'Małgorzata', 'Lewandowska', 'Geografia'),
(8, 'Piotr', 'Zieliński', 'Informatyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obecnosci`
--

CREATE TABLE `obecnosci` (
  `ID_obecnosci` int(11) NOT NULL,
  `ID_ucznia` int(11) NOT NULL,
  `ID_kursu` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Status_obecnosci` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `ID_oceny` int(11) NOT NULL,
  `ID_ucznia` int(11) NOT NULL,
  `ID_nauczyciela` int(11) NOT NULL,
  `ID_kursu` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Typ_oceny` varchar(20) NOT NULL,
  `Wartosc` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plan_lekcji`
--

CREATE TABLE `plan_lekcji` (
  `ID_lekcji` int(11) NOT NULL,
  `ID_klasy` int(11) DEFAULT NULL,
  `ID_nauczyciela` int(11) DEFAULT NULL,
  `ID_kursu` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Godzina` time DEFAULT NULL,
  `Typ_lekcji` varchar(128) DEFAULT NULL,
  `nazwa_lekcji` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_lekcji`
--

INSERT INTO `plan_lekcji` (`ID_lekcji`, `ID_klasy`, `ID_nauczyciela`, `ID_kursu`, `Data`, `Godzina`, `Typ_lekcji`, `nazwa_lekcji`) VALUES
(9, 1, 1, 1, '2024-04-01', '09:00:00', 'Lecture', 'Mathematics'),
(10, 2, 2, 2, '2024-04-01', '10:00:00', 'Lecture', 'Science'),
(11, 3, 3, 3, '2024-04-01', '11:00:00', 'Lecture', 'History'),
(12, 4, 4, 4, '2024-04-01', '12:00:00', 'Lecture', 'English'),
(13, 5, 5, 5, '2024-04-02', '09:00:00', 'Lecture', 'Physics'),
(14, 6, 6, 6, '2024-04-02', '10:00:00', 'Lecture', 'Chemistry'),
(15, 7, 7, 7, '2024-04-02', '11:00:00', 'Lecture', 'Biology'),
(16, 8, 8, 8, '2024-04-02', '12:00:00', 'Lecture', 'Geography');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `ID_ucznia` int(11) NOT NULL,
  `Imię` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Data_urodzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uczniowie`
--

INSERT INTO `uczniowie` (`ID_ucznia`, `Imię`, `Nazwisko`, `Data_urodzenia`) VALUES
(1, 'Karol', 'Malinowski', '2005-04-12'),
(2, 'Julia', 'Kamińska', '2006-07-20'),
(3, 'Mateusz', 'Kowalczyk', '2005-12-02'),
(4, 'Aleksandra', 'Nowak', '2006-03-30'),
(5, 'Michał', 'Wiśniewski', '2005-06-15'),
(6, 'Zuzanna', 'Kowalska', '2006-08-25'),
(7, 'Łukasz', 'Zieliński', '2005-01-11'),
(8, 'Anna', 'Wójcik', '2006-05-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdarzenia`
--

CREATE TABLE `zdarzenia` (
  `ID_zdarzenia` int(11) NOT NULL,
  `Data` date NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `plan_lekcji`
--
ALTER TABLE `plan_lekcji`
  ADD PRIMARY KEY (`ID_lekcji`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plan_lekcji`
--
ALTER TABLE `plan_lekcji`
  MODIFY `ID_lekcji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
