-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 04:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfmu`
--

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `word` varchar(50) DEFAULT NULL,
  `bengali` varchar(255) DEFAULT NULL,
  `noun` varchar(255) DEFAULT NULL,
  `pronoun` varchar(255) DEFAULT NULL,
  `adjective` varchar(255) DEFAULT NULL,
  `verb` varchar(255) DEFAULT NULL,
  `adverb` varchar(255) DEFAULT NULL,
  `preposition` varchar(255) DEFAULT NULL,
  `conjunction` varchar(255) DEFAULT NULL,
  `synonym` varchar(255) DEFAULT NULL,
  `antonym` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`, `bengali`, `noun`, `pronoun`, `adjective`, `verb`, `adverb`, `preposition`, `conjunction`, `synonym`, `antonym`) VALUES
(1, 'A', 'à¦à¦•à¦Ÿà¦¿;', '', '', '', '', '', '', '', '', ''),
(2, 'An', 'à¦à¦•à¦Ÿà¦¿;', '', '', '', '', '', '', '', '', ''),
(3, 'Aback', 'à¦¬à¦¿à¦¸à§à¦®à¦¿à¦¤; ', '', '', 'à¦†à¦¶à§à¦šà¦°à§à¦¯à¦¾à¦¨à§à¦¬à¦¿à¦¤;', '', '', '', '', 'Surprised;', ''),
(4, 'Abandon', 'à¦¤à§à¦¯à¦¾à¦— à¦•à¦°à¦¾; à¦¬à¦°à§à¦œà¦¨ à¦•à¦°à¦¾;', 'à¦¤à§à¦¯à¦¾à¦—; Abandonment;', '', '', '', '', '', '', 'Give up; Desert; Yield;', ''),
(5, 'Abash', 'à¦²à¦œà§à¦œà¦¾ à¦¦à§‡à¦“à§Ÿà¦¾;', 'Abashment;', '', 'Abashed;', '', '', '', '', '', ''),
(6, 'Abate', 'à¦•à¦®à¦¾à¦¨à§‹; à¦¬à¦°à§à¦œà¦¨ à¦•à¦°à¦¾;', 'à¦¹à§à¦°à¦¾à¦¸; à¦¹à§à¦°à¦¾à¦¸-à¦ªà§à¦°à¦¾à¦ªà§à¦¤à¦¿; Abatement', '', 'à¦¹à§à¦°à¦¾à¦¸-à¦¯à§‹à¦—à§à¦¯; Abatable;', 'à¦•à¦®à¦¾à¦¨à§‹; à¦•à¦®à§‡ à¦¯à¦¾à¦“à§Ÿà¦¾;', '', '', '', 'Reduce; Lessen; Decrease;', 'Increase; Intensify;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
