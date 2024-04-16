-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 avr. 2024 à 20:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_brief_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `ID_APPRENANT` int(11) NOT NULL,
  `ID_GROUPE` int(11) NOT NULL,
  `NOM` varchar(256) NOT NULL,
  `PRENOM` varchar(256) NOT NULL,
  `EMAIL` varchar(256) NOT NULL,
  `MOT_DE_PASS` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant`
--

INSERT INTO `apprenant` (`ID_APPRENANT`, `ID_GROUPE`, `NOM`, `PRENOM`, `EMAIL`, `MOT_DE_PASS`) VALUES
(1, 2, 'Dupont', 'Jean', 'jean.dupont@email.com', 'motdepasse1'),
(2, 2, 'Dupont', 'Jean', 'jean.dupont@email.com', 'motdepasse1'),
(3, 3, 'Martin', 'Marie', 'marie.martin@email.com', 'motdepasse2'),
(4, 3, 'Dubois', 'Pierre', 'pierre.dubois@email.com', 'motdepasse3'),
(5, 1, 'Leroy', 'Sophie', 'sophie.leroy@email.com', 'motdepasse4');

-- --------------------------------------------------------

--
-- Structure de la table `brief`
--

CREATE TABLE `brief` (
  `ID_BRIEF` int(11) NOT NULL,
  `ID_FORMATEUR` int(11) NOT NULL,
  `TITRE` varchar(256) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL,
  `PIECE_JOINTE` varchar(256) NOT NULL,
  `DATE_AJOUR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brief`
--

INSERT INTO `brief` (`ID_BRIEF`, `ID_FORMATEUR`, `TITRE`, `DATE_DEBUT`, `DATE_FIN`, `PIECE_JOINTE`, `DATE_AJOUR`) VALUES
(1, 3, 'php ', '2024-04-01', '2024-04-05', 'brief.pdf', '2024-03-29'),
(2, 2, 'site web statique', '2024-03-01', '2024-03-05', 'mySite.pdf', '2024-03-01'),
(3, 1, 'wordpress', '2024-03-01', '2024-03-05', 'mySite.pdf', '2024-03-01'),
(5, 2, 'Titre du brief', '2024-04-08', '2024-04-15', 'chemin/vers/piece_jointe.pdf', '2024-04-08'),
(6, 2, 'eze', '2024-04-08', '2024-04-17', '', '2024-04-07'),
(7, 2, 'test', '2024-04-08', '2024-04-16', 'CV 2023.pdf', '2024-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `ID_COMPETENCE` int(11) NOT NULL,
  `TITRE` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`ID_COMPETENCE`, `TITRE`) VALUES
(1, 'Le maquettage'),
(2, 'HTML');

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE `concerner` (
  `ID_BRIEF` int(11) NOT NULL,
  `ID_COMPETENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `ID_FORMATEUR` int(11) NOT NULL,
  `NOM` varchar(256) DEFAULT NULL,
  `PRENOM` varchar(256) DEFAULT NULL,
  `EMAIL` varchar(256) DEFAULT NULL,
  `MOT_DE_PASS` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`ID_FORMATEUR`, `NOM`, `PRENOM`, `EMAIL`, `MOT_DE_PASS`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', 'motdepasse1'),
(2, 'Smith', 'Jane', 'jane.smith@example.com', 'motdepasse2'),
(3, 'Brown', 'David', 'david.brown@example.com', 'motdepasse3');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `ID_GROUPE` int(11) NOT NULL,
  `NOM_GROUPE` varchar(256) NOT NULL,
  `ID_FORMATEUR` int(11) NOT NULL,
  `ANNEE_GROUPE` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`ID_GROUPE`, `NOM_GROUPE`, `ID_FORMATEUR`, `ANNEE_GROUPE`) VALUES
(4, 'dw104', 1, NULL),
(1, 'developpement web', 1, '2024'),
(2, 'developpement mobile', 2, '2024'),
(3, 'soft skills', 3, '2024');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE `realiser` (
  `ID_BRIEF` int(11) NOT NULL,
  `ID_APPRENANT` int(11) NOT NULL,
  `ETAT` varchar(256) DEFAULT NULL,
  `LIEN` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `realiser`
--

INSERT INTO `realiser` (`ID_BRIEF`, `ID_APPRENANT`, `ETAT`, `LIEN`) VALUES
(1, 2, 'En cours ', 'hhtp/hdh/');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`ID_APPRENANT`),
  ADD KEY `FK_GROUP` (`ID_GROUPE`);

--
-- Index pour la table `brief`
--
ALTER TABLE `brief`
  ADD PRIMARY KEY (`ID_BRIEF`),
  ADD KEY `FK_CREE` (`ID_FORMATEUR`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`ID_COMPETENCE`);

--
-- Index pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`ID_BRIEF`,`ID_COMPETENCE`),
  ADD KEY `FK_CONCERNER` (`ID_COMPETENCE`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`ID_FORMATEUR`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`ID_GROUPE`,`NOM_GROUPE`),
  ADD UNIQUE KEY `unique_id` (`ANNEE_GROUPE`,`ID_FORMATEUR`),
  ADD KEY `FK_ENSEIGNE` (`ID_FORMATEUR`);

--
-- Index pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD PRIMARY KEY (`ID_BRIEF`,`ID_APPRENANT`),
  ADD KEY `FK_REALISER` (`ID_APPRENANT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `ID_APPRENANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `brief`
--
ALTER TABLE `brief`
  MODIFY `ID_BRIEF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `ID_COMPETENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `ID_FORMATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `ID_GROUPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD CONSTRAINT `FK_GROUP` FOREIGN KEY (`ID_GROUPE`) REFERENCES `groupe` (`ID_GROUPE`);

--
-- Contraintes pour la table `brief`
--
ALTER TABLE `brief`
  ADD CONSTRAINT `FK_CREE` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateur` (`ID_FORMATEUR`);

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`ID_COMPETENCE`) REFERENCES `competence` (`ID_COMPETENCE`),
  ADD CONSTRAINT `FK_CONCERNER2` FOREIGN KEY (`ID_BRIEF`) REFERENCES `brief` (`ID_BRIEF`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_ENSEIGNE` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateur` (`ID_FORMATEUR`);

--
-- Contraintes pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD CONSTRAINT `FK_REALISER` FOREIGN KEY (`ID_APPRENANT`) REFERENCES `apprenant` (`ID_APPRENANT`),
  ADD CONSTRAINT `FK_REALISER2` FOREIGN KEY (`ID_BRIEF`) REFERENCES `brief` (`ID_BRIEF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
