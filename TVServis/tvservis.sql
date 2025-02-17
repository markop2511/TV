-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 01:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvservis`
--
CREATE DATABASE IF NOT EXISTS `tvservis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tvservis`;

-- --------------------------------------------------------

--
-- Table structure for table `daljinski`
--

DROP TABLE IF EXISTS `daljinski`;
CREATE TABLE `daljinski` (
  `id` int(10) UNSIGNED NOT NULL,
  `daljnaziv` varchar(50) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `slika` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daljinski`
--

INSERT INTO `daljinski` (`id`, `daljnaziv`, `cena`, `opis`, `slika`) VALUES
(5, 'SONY RM-1275', 1000.00, '', 'Naziv_Daljinskog_9744.jpg'),
(6, 'SONY AD-SN05', 1200.00, '', 'Naziv_Daljinskog_2632.jpg'),
(7, 'LG', 500.00, '12345', 'Naziv_Daljinskog_6141.jpg'),
(8, 'PANASONIC', 600.00, '', 'Naziv_Daljinskog_5764.jpg'),
(9, 'LG', 2000.00, '', 'Naziv_Daljinskog_6422.jpg'),
(11, 'TOSHIBA', 1111.00, 'TOSHIBA', 'Naziv_Daljinskog_5866.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

DROP TABLE IF EXISTS `kontakt`;
CREATE TABLE `kontakt` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ime`, `email`, `phone`, `message`) VALUES
(4, 'Marko Pavlovic', 'marko.pavlovic2511@gmail.com', '0615251155', 'Dobar sajt'),
(5, 'Primer', 'primer@gmail.com', '060123456', 'Poruka'),
(6, 'Primer', 'primer@gmail.com', '060123456', 'Poruka');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `id` int(10) UNSIGNED NOT NULL,
  `imeprezime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('ADMINISTRATOR','MODERATOR','USER') NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `imeprezime`, `username`, `password`, `role`, `email`, `telefon`, `adresa`) VALUES
(1, 'Marko Pavlovic', 'marko12320', '4259031dc85f451a2b7731e8f5ea93193dad63ad', 'ADMINISTRATOR', 'marko.pavlovic2511@gmail.com', '0615251155', 'Zdravka Jovanovica 31'),
(19, 'Mirko Mirkovic', 'mirkovic222', '5976a5e1fada1ed3dd92911ffc1bfdc0f9cdcef4', 'USER', '', '', ''),
(31, 'Miodrag Nikolic', 'mnikolic1', 'e3bce3369657d538921783b9a51b44772ee5ed6a', 'USER', '', '', ''),
(33, 'primer', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'USER', '', '', ''),
(34, 'Muhamed Ali', 'mali123', '42145ee7d33863541d79e7d8efe56abd7a9c33a6', 'MODERATOR', '', '', ''),
(35, 'Trajko Trajkovic', 'trajko1', '754a67a6e6cd895cb64d6abc11e59db2c2ba7641', 'MODERATOR', 'trajko@gmail.com', '061/525-1155', 'bgd 11'),
(36, 'Stanko Stankovic', 'stankovic123', 'f43ca7280f5b677f16e229cefdf6e4f9429f3549', 'USER', 'stanko@gmail.com', '06123456789', 'bgd 13'),
(39, 'asdasd', 'draganlukic', '529f8ed819e4961d415d4d28adabaddc5944ad82', 'USER', 'asd@gmail.com', '0615251155', 'bgd 13'),
(41, 'Marko Markovic', 'markovic321', 'a216375aba5215d3c0203f4d8ed88fbf1799a604', 'USER', 'markovic@gmail.com', '060123456', 'Savski Nasip 7');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

DROP TABLE IF EXISTS `porudzbina`;
CREATE TABLE `porudzbina` (
  `id` int(10) UNSIGNED NOT NULL,
  `imeprezime` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `nazivuredj` varchar(50) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `vreme` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Poruceno','Dostavlja se','Dostavljeno','Otkazano') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`id`, `imeprezime`, `telefon`, `email`, `adresa`, `nazivuredj`, `cena`, `vreme`, `status`) VALUES
(1, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'Zdravka Jovanovica 31', 'SAMSUNG', 500.00, '2023-09-20', 'Dostavljeno'),
(2, 'sdfsdf', '24323', 'milanm@gmail.com', 'Miljkoviceva 23', 'primer', 200.00, '2023-09-20', 'Dostavljeno'),
(3, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'bgd 13', 'SAMSUNG', 3000.00, '2023-09-25', 'Dostavljeno'),
(4, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'bgd 13', 'SAMSUNG', 3000.00, '2023-09-25', 'Dostavljeno'),
(5, 'Mirko Mirkovic', '061/525-1155', 'asd@gmail.com', 'Banovo Brdo', 'SAMSUNG', 3000.00, '2023-09-25', 'Dostavljeno'),
(6, 'Mirko Mirkovic', '061/525-1155', 'asd@gmail.com', 'Banovo Brdo', 'SAMSUNG', 3000.00, '2023-09-25', 'Dostavljeno'),
(7, 'Mirko Mirkovic', '061/525-1155', 'asd@gmail.com', 'Banovo Brdo', 'SAMSUNG', 3000.00, '2023-09-25', 'Poruceno'),
(8, 'Primer123', '06123333553', 'primer@gmail.com', 'Ustanicka 31', 'LG', 500.00, '2023-09-25', 'Dostavljeno'),
(9, 'Marko Markovic', '06123456789', 'markom@gmail.com', 'Vojislava Ilica 3', 'Philips TV 37 Inca', 133.00, '2023-09-27', 'Otkazano'),
(10, 'asdasd', '0615251155', 'marko.pavlovic2511@gmail.com', 'bgd 13', 'To Kill a Mockingbird', 768678.00, '2023-09-27', 'Dostavlja se'),
(11, 'asdasd', '0615251155555555', 'marko.pavlovic2511@gmail.com', 'Banovo Brdo', 'To Kill a Mockingbird', 768678.00, '2023-09-27', 'Dostavlja se'),
(12, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'Banovo Brdo1', 'SAMSUNG', 234.00, '2023-09-28', 'Poruceno'),
(13, 'Mirko Mirkovic', '061/525-11555', 'marko.pavlovic2511@gmail.com', 'Zdravka Jovanovica 32', 'SAMSUNG', 234.00, '2023-09-28', 'Dostavljeno'),
(14, 'Mirko Mirkovic', '061/525-11555', 'marko.pavlovic2511@gmail.com', 'Zdravka Jovanovica 32', 'SAMSUNG', 234.00, '2023-09-28', 'Poruceno'),
(15, 'asdasd', '0615251155', 'marko.pavlovic2511@gmail.com', 'bgd 11', 'SAMSUNG', 234.00, '2023-09-28', 'Poruceno'),
(16, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'bgd 12', 'TESLA 32E635BHS', 17999.00, '2024-01-14', 'Poruceno'),
(17, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'Banovo Brdo', 'SONY RM-1275', 1000.00, '2024-06-30', 'Poruceno'),
(18, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'Zdravka Jovanovica 31', 'LG', 500.00, '2024-06-30', 'Poruceno'),
(19, 'Marko Pavlovic', '0615251155', 'marko.pavlovic2511@gmail.com', 'Zdravka Jovanovica 31', 'Hitachi 43\'\' HAE4351', 46800.00, '2024-06-30', 'Poruceno'),
(20, 'asdasd', '0615251155', 'asd@gmail.com', 'bgd 13', 'TESLA 32E635BHS', 17999.00, '2024-07-02', 'Dostavlja se'),
(21, 'Marko Markovic', '060123456', 'markovic@gmail.com', 'Savski Nasip 7', 'SAMSUNG 32\'\'', 3000.00, '2024-07-02', 'Poruceno');

-- --------------------------------------------------------

--
-- Table structure for table `televizor`
--

DROP TABLE IF EXISTS `televizor`;
CREATE TABLE `televizor` (
  `id` int(10) UNSIGNED NOT NULL,
  `tvnaziv` varchar(50) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `slika` varchar(50) NOT NULL,
  `polovan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `televizor`
--

INSERT INTO `televizor` (`id`, `tvnaziv`, `cena`, `opis`, `slika`, `polovan`) VALUES
(30, 'TESLA 32E635BHS', 17999.00, 'Dijagonala ekrana: 32\" (81 cm)\r\n \r\nRezolucija ekrana: HD Ready 1366 x 768 pix \r\n\r\nMemorija: 1 GB RAM', 'Naziv_Televizora_8951.png', 0),
(31, 'Hitachi 43 HAE4351', 46800.00, 'Smart televizor 43″ HD ready', 'Naziv_Televizora_9779.jpg', 0),
(32, 'Philips TV 37 Inca', 234.00, 'Ne radi pola ekrana...', 'Naziv_Televizora_2534.jpg', 1),
(33, 'Fox-32ATV130e', 10990.00, 'Dijagonala:32″ 81cm\nRezolucija:HD Ready 1366×768\nVreme odziva:12ms', 'Naziv_Televizora_3083.jpg', 0),
(34, 'LCD TV-PHILIPS 17PF9945/58I', 5000.00, '', 'Naziv_Televizora_2526.jpg', 1),
(35, 'LED TV-LG 42LE5500', 7000.00, '', 'Naziv_Televizora_9399.jpg', 1),
(36, 'SAMSUNG 32\'\'', 3000.00, '', 'Naziv_Televizora_6151.jpg', 1),
(38, 'FOX', 15000.00, '', 'Naziv_Televizora_3802.png', 0),
(39, 'asd', 123.00, '', 'Naziv_Televizora_6472.jpg', 1),
(40, 'To Kill a Mockingbird', 2344.00, 'ASD', 'Naziv_Televizora_8953.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daljinski`
--
ALTER TABLE `daljinski`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `televizor`
--
ALTER TABLE `televizor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daljinski`
--
ALTER TABLE `daljinski`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `televizor`
--
ALTER TABLE `televizor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
