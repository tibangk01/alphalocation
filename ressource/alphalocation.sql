-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 21 avr. 2019 à 20:25
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alphalocation`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `numAdmin` int(11) NOT NULL,
  `loginAdmin` varchar(30) DEFAULT NULL,
  `mdpAdmin` varchar(30) DEFAULT NULL,
  `numPers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`numAdmin`, `loginAdmin`, `mdpAdmin`, `numPers`) VALUES
(5, 'roottoor', 'roottoor', 13);

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `numAnn` int(11) NOT NULL,
  `descAnn` varchar(80) DEFAULT NULL,
  `loyerAnn` int(11) DEFAULT NULL,
  `cautionAnn` int(11) DEFAULT NULL,
  `datePubAnn` datetime DEFAULT NULL,
  `numPers` int(11) NOT NULL,
  `numTypeBat` int(11) NOT NULL,
  `numVille` int(11) NOT NULL,
  `statutAnn` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`numAnn`, `descAnn`, `loyerAnn`, `cautionAnn`, `datePubAnn`, `numPers`, `numTypeBat`, `numVille`, `statutAnn`) VALUES
(136, 'chambre super cool Ã  louer tout prÃ¨s de  lâ€™hÃ´tel du 2 fÃ©vier', 50000, 15000000, '2019-04-17 19:17:16', 13, 39, 175, 1),
(137, 'boutique Ã  louer tout prÃ¨s de la nationale nÂ°1', 10000, 120000, '2019-04-17 20:10:26', 13, 41, 179, 1),
(138, 'villa super paisible Ã  louer avec les sanitaires bien oganisÃ©e avec service de', 50000, 1500000, '2019-04-17 20:13:45', 13, 38, 177, 1),
(139, 'chambre Ã©tudiant Ã  louer Ã  adÃ©wui tout prÃ¨s du centre de transfusion', 12000, 100000, '2019-04-17 20:15:47', 14, 39, 175, 1),
(140, 'chambre salon wc douche interne super cool Ã  louer avec pompe et climatisseur', 15000, 120000, '2019-04-17 20:17:24', 14, 40, 178, 1),
(141, 'chambre Ã©tudiant Ã  louer avec tout le confort pour apprendre les cours ( salle', 15000, 30000, '2019-04-17 20:20:52', 15, 39, 176, 1),
(142, 'si vous cherchez une villa calme Ã  louer, c\'est celle lÃ  qu\'il vous faut...', 50000, 1200000, '2019-04-17 20:24:12', 15, 38, 180, 1),
(143, 'boutique climatisÃ© Ã  louer. plainsantin s\'abstenir.', 7000, 15000, '2019-04-17 20:25:52', 16, 41, 176, 1);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `numImage` int(11) NOT NULL,
  `denoImage` varchar(80) DEFAULT NULL,
  `numAnn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`numImage`, `denoImage`, `numAnn`) VALUES
(100, '136_13_0.jpg', 136),
(101, '136_13_1.jpg', 136),
(102, '136_13_2.jpg', 136),
(103, '136_13_3.JPG', 136),
(104, '137_13_0.jpg', 137),
(105, '138_13_0.jpg', 138),
(106, '138_13_1.jpg', 138),
(107, '138_13_2.jpg', 138),
(108, '138_13_3.jpg', 138),
(109, '139_14_0.jpg', 139),
(110, '140_14_0.JPG', 140),
(111, '140_14_1.jpg', 140),
(112, '141_15_0.jpg', 141),
(113, '142_15_0.png', 142),
(114, '143_16_0.jpg', 143);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `numPers` int(11) NOT NULL,
  `nomPers` varchar(25) DEFAULT NULL,
  `prenomPers` varchar(30) DEFAULT NULL,
  `sexePers` char(1) DEFAULT NULL,
  `pseudoPers` varchar(30) DEFAULT NULL,
  `mdpPers` varchar(30) DEFAULT NULL,
  `telPers` varchar(20) DEFAULT NULL,
  `dateInscPers` datetime DEFAULT NULL,
  `statutPers` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`numPers`, `nomPers`, `prenomPers`, `sexePers`, `pseudoPers`, `mdpPers`, `telPers`, `dateInscPers`, `statutPers`) VALUES
(13, 'roottoor', 'roottoor', 'H', 'roottoor', 'roottoor', '+228 90 90 90 90', '2019-04-17 19:12:40', 1),
(14, 'komlani', 'fabien', 'H', 'fabien23', 'roottoor', '+00288 90471528', '2019-04-17 19:26:29', 1),
(15, 'komlani', 'estelle', 'F', 'estelle21', 'roottoor', '96008846', '2019-04-17 19:27:19', 1),
(16, 'komlani', 'patricia', 'F', 'pati23', 'roottoor', '90900601', '2019-04-17 19:28:07', 1),
(17, 'john', 'doe', 'F', 'johndoe', 'roottoor', '+1 505 500 500 500', '2019-04-17 19:28:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `supprimerpersonne`
--

CREATE TABLE `supprimerpersonne` (
  `dateSupPers` datetime DEFAULT NULL,
  `numPers` int(11) NOT NULL,
  `numAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_batiment`
--

CREATE TABLE `type_batiment` (
  `numTypeBat` int(11) NOT NULL,
  `libelleTypeBat` varchar(80) DEFAULT NULL,
  `statutTypeBat` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_batiment`
--

INSERT INTO `type_batiment` (`numTypeBat`, `libelleTypeBat`, `statutTypeBat`) VALUES
(38, 'VILLA', 1),
(39, 'CHAMBRE SALON', 1),
(40, 'CHAMBRE SALON WC DOUCHE INTERNE', 0),
(41, 'BOUTIQUE', 1),
(42, 'CHAMBRE SIMPLE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `numVille` int(11) NOT NULL,
  `libelleVille` varchar(80) DEFAULT NULL,
  `statutVille` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`numVille`, `libelleVille`, `statutVille`) VALUES
(175, 'ADEWUI', 1),
(176, 'AGOE', 1),
(177, 'RAMCO', 1),
(178, 'AUTRES', 1),
(179, 'DOUMASSESSE', 1),
(180, 'BE KPOTA', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`numAdmin`),
  ADD KEY `fk_personne_admin` (`numPers`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`numAnn`),
  ADD KEY `fk_personne_annonces` (`numPers`),
  ADD KEY `fk_type_batiment_annonces` (`numTypeBat`),
  ADD KEY `fk_ville_annonces` (`numVille`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`numImage`),
  ADD KEY `fk_annonces_image` (`numAnn`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`numPers`);

--
-- Index pour la table `supprimerpersonne`
--
ALTER TABLE `supprimerpersonne`
  ADD KEY `fk_admin_supPers` (`numAdmin`),
  ADD KEY `fk_personne_supPers` (`numPers`);

--
-- Index pour la table `type_batiment`
--
ALTER TABLE `type_batiment`
  ADD PRIMARY KEY (`numTypeBat`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`numVille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `numAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `numAnn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `numImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `numPers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `type_batiment`
--
ALTER TABLE `type_batiment`
  MODIFY `numTypeBat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `numVille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `fk_personne_admin` FOREIGN KEY (`numPers`) REFERENCES `personne` (`numPers`);

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `fk_personne_annonces` FOREIGN KEY (`numPers`) REFERENCES `personne` (`numPers`),
  ADD CONSTRAINT `fk_type_batiment_annonces` FOREIGN KEY (`numTypeBat`) REFERENCES `type_batiment` (`numTypeBat`),
  ADD CONSTRAINT `fk_ville_annonces` FOREIGN KEY (`numVille`) REFERENCES `ville` (`numVille`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_annonces_image` FOREIGN KEY (`numAnn`) REFERENCES `annonces` (`numAnn`);

--
-- Contraintes pour la table `supprimerpersonne`
--
ALTER TABLE `supprimerpersonne`
  ADD CONSTRAINT `fk_admin_supPers` FOREIGN KEY (`numAdmin`) REFERENCES `administrateur` (`numAdmin`),
  ADD CONSTRAINT `fk_personne_supPers` FOREIGN KEY (`numPers`) REFERENCES `personne` (`numPers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
