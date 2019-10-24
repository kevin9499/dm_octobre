-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 oct. 2019 à 13:15
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dm_octobre`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `allobjet`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `allobjet`;
CREATE TABLE IF NOT EXISTS `allobjet` (
`id_enfant` int(11)
,`id_objet` int(11)
,`type` enum('troc','vente')
,`nom` varchar(50)
,`libelle` varchar(50)
,`point` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '100',
  `id_maternelle` int(11) NOT NULL,
  PRIMARY KEY (`id_enfant`),
  KEY `enfant_maternelle_FK` (`id_maternelle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `nom`, `prenom`, `point`, `id_maternelle`) VALUES
(1, 'grimaldie', 'baltazar', 100, 1),
(2, 'aa', 'zz', 150, 1),
(3, 'aze', 'aze', 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `maternelle`
--

DROP TABLE IF EXISTS `maternelle`;
CREATE TABLE IF NOT EXISTS `maternelle` (
  `id_maternelle` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_maternelle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maternelle`
--

INSERT INTO `maternelle` (`id_maternelle`, `libelle`) VALUES
(1, 'CFA-INSTA');

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id_objet` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `point` int(11) NOT NULL,
  `type` enum('troc','vente') NOT NULL,
  `id_enfant` int(11) NOT NULL,
  PRIMARY KEY (`id_objet`),
  KEY `objet_enfant_FK` (`id_enfant`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id_objet`, `libelle`, `point`, `type`, `id_enfant`) VALUES
(1, 'voiture', 100, 'troc', 3),
(2, 'chapeau', 150, 'troc', 3),
(3, 'aaa', 50, 'troc', 3),
(4, 'moto', 150, 'vente', 3),
(5, 'bouteille', 50, 'vente', 2),
(6, 'libelllule', 10, 'vente', 2),
(7, 'poubelle', 150, 'vente', 3);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vente`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
`id_enfant` int(11)
,`id_objet` int(11)
,`type` enum('troc','vente')
,`nom` varchar(50)
,`libelle` varchar(50)
,`cout` int(11)
,`point` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `allobjet`
--
DROP TABLE IF EXISTS `allobjet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allobjet`  AS  (select `o`.`id_enfant` AS `id_enfant`,`o`.`id_objet` AS `id_objet`,`o`.`type` AS `type`,`e`.`nom` AS `nom`,`o`.`libelle` AS `libelle`,`o`.`point` AS `point` from (`enfant` `e` join `objet` `o`) where (`o`.`id_enfant` = `e`.`id_enfant`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vente`
--
DROP TABLE IF EXISTS `vente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vente`  AS  (select `o`.`id_enfant` AS `id_enfant`,`o`.`id_objet` AS `id_objet`,`o`.`type` AS `type`,`e`.`nom` AS `nom`,`o`.`libelle` AS `libelle`,`o`.`point` AS `cout`,`e`.`point` AS `point` from (`enfant` `e` join `objet` `o`) where (`e`.`id_enfant` = `o`.`id_enfant`)) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_maternelle_FK` FOREIGN KEY (`id_maternelle`) REFERENCES `maternelle` (`id_maternelle`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_enfant_FK` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
