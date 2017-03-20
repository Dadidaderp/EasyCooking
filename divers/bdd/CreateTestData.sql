-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Mars 2017 à 01:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `easycooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`) VALUES
(1, 'avocat'),
(2, 'banane'),
(3, 'bergamote'),
(4, 'beurre'),
(5, 'canneberge'),
(6, 'carotte'),
(7, 'cassis'),
(8, 'caviar'),
(9, 'celeri'),
(10, 'cerise'),
(11, 'champignon'),
(12, 'cheval'),
(13, 'chocolat'),
(14, 'chou'),
(15, 'ciboulette'),
(16, 'citron'),
(17, 'clementine'),
(18, 'coing'),
(19, 'concombre'),
(20, 'coquille st jacque'),
(21, 'coriandre'),
(22, 'creme fraiche'),
(23, 'curry'),
(24, 'datte'),
(25, 'dinde'),
(26, 'farine'),
(27, 'fenouil'),
(28, 'figue'),
(29, 'foie gras'),
(30, 'fraise'),
(31, 'framboise'),
(32, 'gingembre'),
(33, 'grenade'),
(34, 'griotte'),
(35, 'groseille'),
(36, 'haricot vert'),
(37, 'huitre'),
(38, 'kiwi'),
(39, 'lapin'),
(40, 'lentille'),
(41, 'mais'),
(42, 'mandarine'),
(43, 'marron'),
(44, 'mayonaise'),
(45, 'melon'),
(46, 'menthe'),
(47, 'mirabelle'),
(48, 'moule'),
(49, 'moutarde'),
(50, 'mure'),
(51, 'myrtille'),
(52, 'navet'),
(53, 'noisette'),
(54, 'noix'),
(55, 'oeuf'),
(56, 'oignon'),
(57, 'olive'),
(58, 'orange'),
(59, 'pain'),
(60, 'pamplemousse'),
(61, 'pasteque'),
(62, 'pates'),
(63, 'peche'),
(64, 'piment'),
(65, 'pistache'),
(66, 'poire'),
(67, 'poireau'),
(68, 'poivre'),
(69, 'poivron'),
(70, 'pomelos'),
(71, 'pomme'),
(72, 'porc'),
(73, 'poulet'),
(74, 'pruneau'),
(75, 'radis'),
(76, 'raisin'),
(77, 'riz'),
(78, 'salade'),
(79, 'sanglier'),
(80, 'saucisse'),
(81, 'saumon'),
(82, 'sucre'),
(83, 'tabasco'),
(84, 'thon'),
(85, 'tomate'),
(86, 'veau'),
(87, 'wasabi');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `nbPersonne` int(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `fk_utilisateur_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recette_utilisateur1_idx` (`fk_utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `description`, `image`, `nbPersonne`, `status`, `fk_utilisateur_id`) VALUES
(1, 'Remoulade d''ecargot', 'comme le faisait mon grand père', NULL, 4, 1, 1),
(2, 'Paupiette de veau', 'savoureuse à l''ancienne', NULL, 2, 1, 2),
(3, 'Moules a la toulousaine', 'une bonne valise de moules quoi', NULL, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredient`
--

CREATE TABLE IF NOT EXISTS `recette_ingredient` (
  `fk_recette_id` int(50) NOT NULL,
  `fk_ingredient_id` int(50) NOT NULL,
  `quantite` int(50) DEFAULT NULL,
  `unite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fk_recette_id`,`fk_ingredient_id`),
  KEY `fk_recette_has_ingredient_ingredient1_idx` (`fk_ingredient_id`),
  KEY `fk_recette_has_ingredient_recette1_idx` (`fk_recette_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recette_ingredient`
--

INSERT INTO `recette_ingredient` (`fk_recette_id`, `fk_ingredient_id`, `quantite`, `unite`) VALUES
(1, 1, 10, 'gramme'),
(1, 5, 5, 'kilo'),
(2, 14, 25, 'gramme'),
(2, 25, 5, 'gramme'),
(3, 11, 20, 'kilo');

-- --------------------------------------------------------

--
-- Structure de la table `recette_type`
--

CREATE TABLE IF NOT EXISTS `recette_type` (
  `fk_type_id` int(50) NOT NULL,
  `fk_recette_id` int(50) NOT NULL,
  PRIMARY KEY (`fk_type_id`,`fk_recette_id`),
  KEY `fk_type_has_recette_recette1_idx` (`fk_recette_id`),
  KEY `fk_type_has_recette_type1_idx` (`fk_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(50) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(0, 'salé'),
(1, 'sucré');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `fk_groupe_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilisateur_groupe1_idx` (`fk_groupe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `password`, `nom`, `prenom`, `mail`, `fk_groupe_id`) VALUES
(1, 'Jean', 'pou56', 'Dupond', 'Jean', 'jeandupond@aol.fr', 1),
(2, 'Adrien', 'adr56', 'Caselles', 'Adrien', 'adrien.caselle@free.fr', 2),
(3, 'Arthur', 'art89', 'Azam', 'Arthur', 'arthur84@live.fr', 2),
(4, 'fred', 'fr8989', 'Genaille', 'Frederique', 'fred89@free.fr', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_utilisateur_has_recette_utilisateur` FOREIGN KEY (`fk_utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_recette_recette1` FOREIGN KEY (`fk_recette_id`) REFERENCES `recette` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_recette_utilisateur1` FOREIGN KEY (`fk_utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD CONSTRAINT `fk_recette_has_ingredient_recette1` FOREIGN KEY (`fk_recette_id`) REFERENCES `recette` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recette_has_ingredient_ingredient1` FOREIGN KEY (`fk_ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette_type`
--
ALTER TABLE `recette_type`
  ADD CONSTRAINT `fk_type_has_recette_type1` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_has_recette_recette1` FOREIGN KEY (`fk_recette_id`) REFERENCES `recette` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_groupe1` FOREIGN KEY (`fk_groupe_id`) REFERENCES `groupe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
