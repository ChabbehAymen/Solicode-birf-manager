-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2024 at 10:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BP15`
--

-- --------------------------------------------------------

--
-- Table structure for table `APPRENANT`
--

CREATE TABLE `APPRENANT` (
  `ID_APPRENANT` int(11) NOT NULL,
  `ID_GROUPE` int(11) NOT NULL,
  `NOM` varchar(256) NOT NULL,
  `PRENOM` varchar(256) NOT NULL,
  `EMAIL` varchar(256) NOT NULL,
  `MOT_DE_PASSE` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `APPRENANT`
--

INSERT INTO `APPRENANT` (`ID_APPRENANT`, `ID_GROUPE`, `NOM`, `PRENOM`, `EMAIL`, `MOT_DE_PASSE`) VALUES
(4, 5, 'Aymen', 'Chabbeh', 'chabbehaymensolicode@gmail.com', '1234567'),
(5, 5, 'Yahya', 'Bosakla', 'bosaklayahya@gmail.com', '1234567'),
(6, 5, 'Ayoub', 'Amazu', 'amazuayoub@gmail.com', '1234567'),
(7, 5, 'Osama', 'Moaad Ben Rchid', 'osamamoaad@gmail.com', '1234567'),
(8, 5, 'Ayoub', 'Bakkali', 'bakkaliayoub@gmail.com', '1234567'),
(9, 5, 'Abdlwahab', 'Temrawi', 'temrawiabdlwahab@gmail.com', '1234567'),
(10, 5, 'Ayoub', 'Bouzidi', 'bouzidiayoub@gmail.com', '1234567'),
(11, 5, 'Ayoub', 'Lazrag', 'lazragayoub@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `BRIEF`
--

CREATE TABLE `BRIEF` (
  `ID_BRIEF` int(11) NOT NULL,
  `ID_FORMATEUR` int(11) NOT NULL,
  `TITRE` varchar(256) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL,
  `PIECE_JOINTE` varchar(256) NOT NULL,
  `DATE_AJOUTE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BRIEF`
--

INSERT INTO `BRIEF` (`ID_BRIEF`, `ID_FORMATEUR`, `TITRE`, `DATE_DEBUT`, `DATE_FIN`, `PIECE_JOINTE`, `DATE_AJOUTE`) VALUES
(1, 1, 'Project Brief', '2024-04-01', '2024-04-30', 'project_brief.pdf', '2024-03-31'),
(2, 1, 'Project Brief', '2024-04-01', '2024-04-30', 'project_brief.pdf', '2024-03-31'),
(3, 1, 'Project Brief', '2024-04-01', '2024-04-30', 'project_brief.pdf', '2024-03-31'),
(4, 2, 'Project Brief', '2024-04-01', '2024-04-30', 'project_brief.pdf', '2024-03-31'),
(5, 2, 'BP15', '2024-04-08', '2024-04-23', '/iman/BP15/file.pdf', '2024-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `ID_COMPETENCE` int(11) NOT NULL,
  `NOM` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`ID_COMPETENCE`, `NOM`) VALUES
(1, 'Programming'),
(2, 'Programming'),
(3, 'Programming'),
(4, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `CONCERNE`
--

CREATE TABLE `CONCERNE` (
  `ID_BRIEF` int(11) NOT NULL,
  `ID_COMPETENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CONCERNE`
--

INSERT INTO `CONCERNE` (`ID_BRIEF`, `ID_COMPETENCE`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `FORMATEUR`
--

CREATE TABLE `FORMATEUR` (
  `ID_FORMATEUR` int(11) NOT NULL,
  `NOM` varchar(256) NOT NULL,
  `PRENOM` varchar(256) NOT NULL,
  `EMAIL` varchar(256) NOT NULL,
  `MOT_DE_PASSE` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `FORMATEUR`
--

INSERT INTO `FORMATEUR` (`ID_FORMATEUR`, `NOM`, `PRENOM`, `EMAIL`, `MOT_DE_PASSE`) VALUES
(1, 'Smith', 'Alice', 'alice.smith@example.com', 'password456'),
(2, 'Iman', 'Bozian', 'iman@gmail.com', 'iman123');

-- --------------------------------------------------------

--
-- Table structure for table `GROUPE`
--

CREATE TABLE `GROUPE` (
  `ID_GROUPE` int(11) NOT NULL,
  `ID_FORMATEUR` int(11) NOT NULL,
  `NOM_GROUPE` varchar(256) NOT NULL,
  `ANNEE` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `GROUPE`
--

INSERT INTO `GROUPE` (`ID_GROUPE`, `ID_FORMATEUR`, `NOM_GROUPE`, `ANNEE`) VALUES
(2, 1, 'Group A', '2024'),
(5, 2, 'DBW104', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `REALISER`
--

CREATE TABLE `REALISER` (
  `ID_APPRENANT` int(11) NOT NULL,
  `ID_BRIEF` int(11) NOT NULL,
  `ETAT` varchar(256) NOT NULL,
  `LIEN` varchar(256) DEFAULT NULL,
  `DATE_AJOUTE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `REALISER`
--

INSERT INTO `REALISER` (`ID_APPRENANT`, `ID_BRIEF`, `ETAT`, `LIEN`, `DATE_AJOUTE`) VALUES
(4, 4, 'DONE', 'http://site.com/lien', '2024-04-01'),
(4, 5, 'TODO', 'http://site.com/line', '2024-04-11'),
(5, 5, 'DONE', 'http://site.com/lien', '2024-04-01'),
(6, 5, 'DOING', 'http://site.com/lien', '2024-04-01'),
(9, 4, 'DONE', 'http://site.com/lien', '2024-04-01'),
(9, 5, 'TODO', 'http://site.com/line', '2024-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `APPRENANT`
--
ALTER TABLE `APPRENANT`
  ADD PRIMARY KEY (`ID_APPRENANT`),
  ADD KEY `FK_POSSEDER` (`ID_GROUPE`);

--
-- Indexes for table `BRIEF`
--
ALTER TABLE `BRIEF`
  ADD PRIMARY KEY (`ID_BRIEF`),
  ADD KEY `FK_CREE` (`ID_FORMATEUR`);

--
-- Indexes for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  ADD PRIMARY KEY (`ID_COMPETENCE`);

--
-- Indexes for table `CONCERNE`
--
ALTER TABLE `CONCERNE`
  ADD PRIMARY KEY (`ID_BRIEF`,`ID_COMPETENCE`),
  ADD KEY `FK_CONCERNE2` (`ID_COMPETENCE`);

--
-- Indexes for table `FORMATEUR`
--
ALTER TABLE `FORMATEUR`
  ADD PRIMARY KEY (`ID_FORMATEUR`);

--
-- Indexes for table `GROUPE`
--
ALTER TABLE `GROUPE`
  ADD PRIMARY KEY (`ID_GROUPE`),
  ADD UNIQUE KEY `NOM_GROUPE` (`NOM_GROUPE`,`ANNEE`),
  ADD UNIQUE KEY `ID_FORMATEUR` (`ID_FORMATEUR`,`ANNEE`);

--
-- Indexes for table `REALISER`
--
ALTER TABLE `REALISER`
  ADD PRIMARY KEY (`ID_APPRENANT`,`ID_BRIEF`),
  ADD KEY `FK_REALISER2` (`ID_BRIEF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `APPRENANT`
--
ALTER TABLE `APPRENANT`
  MODIFY `ID_APPRENANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `BRIEF`
--
ALTER TABLE `BRIEF`
  MODIFY `ID_BRIEF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  MODIFY `ID_COMPETENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `FORMATEUR`
--
ALTER TABLE `FORMATEUR`
  MODIFY `ID_FORMATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `GROUPE`
--
ALTER TABLE `GROUPE`
  MODIFY `ID_GROUPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `APPRENANT`
--
ALTER TABLE `APPRENANT`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`ID_GROUPE`) REFERENCES `GROUPE` (`ID_GROUPE`);

--
-- Constraints for table `BRIEF`
--
ALTER TABLE `BRIEF`
  ADD CONSTRAINT `FK_CREE` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `FORMATEUR` (`ID_FORMATEUR`);

--
-- Constraints for table `CONCERNE`
--
ALTER TABLE `CONCERNE`
  ADD CONSTRAINT `FK_CONCERNE` FOREIGN KEY (`ID_BRIEF`) REFERENCES `BRIEF` (`ID_BRIEF`),
  ADD CONSTRAINT `FK_CONCERNE2` FOREIGN KEY (`ID_COMPETENCE`) REFERENCES `COMPETENCE` (`ID_COMPETENCE`);

--
-- Constraints for table `GROUPE`
--
ALTER TABLE `GROUPE`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `FORMATEUR` (`ID_FORMATEUR`);

--
-- Constraints for table `REALISER`
--
ALTER TABLE `REALISER`
  ADD CONSTRAINT `FK_REALISER` FOREIGN KEY (`ID_APPRENANT`) REFERENCES `APPRENANT` (`ID_APPRENANT`),
  ADD CONSTRAINT `FK_REALISER2` FOREIGN KEY (`ID_BRIEF`) REFERENCES `BRIEF` (`ID_BRIEF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
