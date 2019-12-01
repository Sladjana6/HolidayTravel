-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 02:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holiday_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `adresa` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brojtelefona` varchar(30) NOT NULL,
  `tip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikId`, `username`, `password`, `ime`, `prezime`, `adresa`, `brojtelefona`, `tip`) VALUES
(1, 'aleksandra', '3e20ff8b3a1381c59861218f58cd934e', 'Aleksandra', 'Tomic', 'Karadjordjeva 99', '061/7889568', 'user'),
(2, 'marija', 'cb74c183402afe708a490f0048af6e41', 'Marija', 'Matic', 'Balkanska 51', '065/8789852', 'user'),
(3, 'milica', '932e512d0da2821efe2b81539f0b82c5', 'Milica', 'Savic', 'Vojvode Stepe 56', '065/8985784', 'admin'),
(4, 'mina', '91b827e257eeae8e5989d961fe3011df', 'Mina', 'Hasanovic', 'Balkanska 8', '065/8978569', 'admin'),
(5, 'isi', 'a7a1b335247554be6612f583e32b64cb', 'Isidora', 'Filipovic', 'Karadjordjeva 25', '064/25487025', 'user'),
(6, 'sladja', 'f6f68add00d73330bf2df200607280e6', 'Sladjana', 'Filipovic', 'Kosjeric ', '064/4857035', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `polasci`
--

CREATE TABLE `polasci` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `prevoznik` varchar(100) NOT NULL,
  `vrsta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polasci`
--

INSERT INTO `polasci` (`id`, `datum`, `prevoznik`, `vrsta`) VALUES
(1, '2019-03-20', 'Gaga Tours', 'autobus'),
(2, '2019-06-26', 'Nis ekspres', 'autobus'),
(3, '2019-05-21', 'Air Serbia', 'avion'),
(4, '2019-06-06', 'Turksih Airline', 'avion');

-- --------------------------------------------------------

--
-- Table structure for table `ponuda`
--

CREATE TABLE `ponuda` (
  `id` int(5) NOT NULL,
  `drzava` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cena` double(8,2) NOT NULL,
  `slika` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ponuda`
--

INSERT INTO `ponuda` (`id`, `drzava`, `opis`, `cena`, `slika`) VALUES
(1, 'Španija', 'Pun pansion.\r\n\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete.', 415.00, 'slike/barselona.jpg'),
(2, 'Indija', 'Pun pansion.\r\n\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete\r\n\r\n', 500.00, 'slike/mahal3.jpg'),
(3, 'Brazil', 'Pun pansion.\r\n\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete', 280.00, 'slike/rio.jpg'),
(4, 'Kina', '\r\nPun pansion.\r\n\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete.', 320.00, 'slike/kina.jpg'),
(5, 'Australija', '\r\nPun pansion.\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete.', 916.00, 'slike/australija.jpg'),
(6, 'Nemačka', '\r\nPun pansion. Dvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu. Cena aranžmana ne uključuje putno osiguranje i individualne izlete.', 256.00, 'slike/zamak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` int(20) NOT NULL,
  `drzava` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cena` double(8,2) NOT NULL,
  `slika` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnikId` int(11) NOT NULL,
  `adresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `drzava`, `opis`, `cena`, `slika`, `ime`, `prezime`, `korisnikId`, `adresa`) VALUES
(1, 'Nemačka', 'Pun pansion.\r\n\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete.', 256.00, 'slike/zamak.jpg', 'Aleksandra', 'Tomic', 55, 'Karadjordjeva 99'),
(2, 'Australija', 'Pun pansion.\r\nDvokrevetne i trokrevetne sobe, doplata u iznosu od 20 EUR za jednokrevetnu.\r\n\r\nCena aranžmana ne uključuje putno osiguranje i individualne izlete.', 916.00, 'slike/australija.jpg', 'Isidora', 'Filipovic', 5, 'Karadjordjeva 25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikId`);

--
-- Indexes for table `polasci`
--
ALTER TABLE `polasci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ponuda`
--
ALTER TABLE `ponuda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `polasci`
--
ALTER TABLE `polasci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ponuda`
--
ALTER TABLE `ponuda`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
