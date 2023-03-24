-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mars 2023 à 20:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbms`
--

-- --------------------------------------------------------

--
-- Structure de la table `access_classe`
--

DROP TABLE IF EXISTS `access_classe`;
CREATE TABLE IF NOT EXISTS `access_classe` (
  `access_classe_id` int NOT NULL AUTO_INCREMENT,
  `access_classe_code` varchar(10) NOT NULL,
  `access_classe_description` text NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`access_classe_id`,`classification_id`),
  KEY `fk_classification_to_access_classe_idx` (`classification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `classification`
--

DROP TABLE IF EXISTS `classification`;
CREATE TABLE IF NOT EXISTS `classification` (
  `classification_id` int NOT NULL AUTO_INCREMENT,
  `classification_code` varchar(10) NOT NULL,
  `classification_title` varchar(100) NOT NULL,
  `classification_parent` varchar(100) NOT NULL,
  PRIMARY KEY (`classification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `communicability`
--

DROP TABLE IF EXISTS `communicability`;
CREATE TABLE IF NOT EXISTS `communicability` (
  `communicability_id` int NOT NULL AUTO_INCREMENT,
  `communicability_time` int NOT NULL,
  `communicability_title` varchar(100) NOT NULL,
  `communicability_reference` text NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`communicability_id`),
  KEY `fk_classification_to_communicability_idx` (`classification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `container`
--

DROP TABLE IF EXISTS `container`;
CREATE TABLE IF NOT EXISTS `container` (
  `container_id` int NOT NULL AUTO_INCREMENT,
  `container_reference` varchar(20) NOT NULL,
  `container_size` varchar(20) NOT NULL,
  `shelves_id` int DEFAULT NULL,
  `container_state_id` int NOT NULL,
  `container_type_id` int NOT NULL,
  PRIMARY KEY (`container_id`),
  UNIQUE KEY `container_reference_UNIQUE` (`container_reference`),
  KEY `fk_container_state_to_container_idx` (`container_state_id`),
  KEY `fk_shelves_to_container_idx` (`shelves_id`),
  KEY `fk_container_type_to_container_dk` (`container_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `container_state`
--

DROP TABLE IF EXISTS `container_state`;
CREATE TABLE IF NOT EXISTS `container_state` (
  `container_state_id` int NOT NULL AUTO_INCREMENT,
  `container_state_type` varchar(30) NOT NULL,
  PRIMARY KEY (`container_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `container_type`
--

DROP TABLE IF EXISTS `container_type`;
CREATE TABLE IF NOT EXISTS `container_type` (
  `container_type_id` int NOT NULL,
  `container_type_title` varchar(30) NOT NULL,
  `container_type_observation` text,
  PRIMARY KEY (`container_type_id`),
  UNIQUE KEY `container_type_title_UNIQUE` (`container_type_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `container_type`
--

INSERT INTO `container_type` (`container_type_id`, `container_type_title`, `container_type_observation`) VALUES
(1, 'Boîtes d\'archives', 'RAS'),
(2, 'Carton 40x35x20', 'RAS'),
(3, 'Carton 40x35x25', 'RAS');

-- --------------------------------------------------------

--
-- Structure de la table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE IF NOT EXISTS `deposit` (
  `deposit_id` int NOT NULL AUTO_INCREMENT,
  `deposit_reference` varchar(10) NOT NULL,
  `deposit_title` varchar(100) NOT NULL,
  `deposit_observation` text,
  PRIMARY KEY (`deposit_id`),
  UNIQUE KEY `deposit_reference_UNIQUE` (`deposit_reference`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `docnum`
--

DROP TABLE IF EXISTS `docnum`;
CREATE TABLE IF NOT EXISTS `docnum` (
  `docnum_id` int NOT NULL,
  `docnum_path` varchar(100) NOT NULL,
  `docnum_sha` varchar(250) NOT NULL,
  `docnum_date` datetime NOT NULL,
  `docnum_extension` varchar(10) NOT NULL,
  `records_id` int NOT NULL,
  PRIMARY KEY (`docnum_id`),
  KEY `fk_records_to_docnum_idx` (`records_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `dolly`
--

DROP TABLE IF EXISTS `dolly`;
CREATE TABLE IF NOT EXISTS `dolly` (
  `dolly_id` int NOT NULL AUTO_INCREMENT,
  `dolly_title` varchar(100) NOT NULL,
  `dolly_observation` text,
  PRIMARY KEY (`dolly_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `dolly_records`
--

DROP TABLE IF EXISTS `dolly_records`;
CREATE TABLE IF NOT EXISTS `dolly_records` (
  `basket_id` int NOT NULL,
  `records_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`basket_id`,`records_id`),
  KEY `fk_records_to_dolly_records_idx` (`records_id`),
  KEY `fk_basket_to_dolly_records_idx` (`basket_id`),
  KEY `fk_user_to_dolly_records_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int NOT NULL AUTO_INCREMENT,
  `keyword` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `keywords_type_id` int NOT NULL,
  PRIMARY KEY (`keyword_id`),
  KEY `fk_keywords_type_to_keywords_idx` (`keywords_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `keywords_type`
--

DROP TABLE IF EXISTS `keywords_type`;
CREATE TABLE IF NOT EXISTS `keywords_type` (
  `keywords_type_id` int NOT NULL,
  `keywords_type_title` varchar(30) DEFAULT NULL,
  `keywords_type_observation` text,
  PRIMARY KEY (`keywords_type_id`),
  UNIQUE KEY `keywords_type_title_UNIQUE` (`keywords_type_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `loan_id` int NOT NULL,
  `loan_title` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  `records_id` int NOT NULL,
  PRIMARY KEY (`loan_id`),
  KEY `fk_loan_user2_idx` (`user_id`),
  KEY `fk_loan_records2_idx` (`records_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `loan_type`
--

DROP TABLE IF EXISTS `loan_type`;
CREATE TABLE IF NOT EXISTS `loan_type` (
  `loan_type_id` int NOT NULL,
  `loan_type_title` varchar(30) NOT NULL,
  `loan_type_observation` text,
  PRIMARY KEY (`loan_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `organization`
--

DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `organization_id` int NOT NULL AUTO_INCREMENT,
  `organization_code` int NOT NULL,
  `organization_title` varchar(100) NOT NULL,
  `organization_observation` text,
  `organization_parent` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`organization_id`),
  KEY `fk_user_to_organization_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `organization_classification`
--

DROP TABLE IF EXISTS `organization_classification`;
CREATE TABLE IF NOT EXISTS `organization_classification` (
  `organization_id` int NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`organization_id`,`classification_id`),
  KEY `fk_classification_to_organization_classification_idx` (`classification_id`),
  KEY `fk_organization_to_organization_classification_idx` (`organization_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `id_records` int NOT NULL AUTO_INCREMENT,
  `records_title` text NOT NULL,
  `records_date_start` date NOT NULL,
  `records_date_end` date DEFAULT NULL,
  `records_observation` text,
  `records_status_id` int NOT NULL,
  `records_support_id` int NOT NULL,
  `records_link_id` int DEFAULT NULL,
  `container_id` int NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`id_records`),
  KEY `fk_records_status_to_records_idx` (`records_status_id`),
  KEY `fk_records_support_to_records_idx` (`records_support_id`),
  KEY `fk_records_link_to_records_idx` (`records_link_id`),
  KEY `fk_container_to_records_idx` (`container_id`) INVISIBLE,
  KEY `fk_classification_to_records_idx` (`classification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `records_keywords`
--

DROP TABLE IF EXISTS `records_keywords`;
CREATE TABLE IF NOT EXISTS `records_keywords` (
  `records_id` int NOT NULL,
  `keyword_id` int NOT NULL,
  PRIMARY KEY (`records_id`,`keyword_id`),
  KEY `fk_keywords_to_records_idx` (`keyword_id`),
  KEY `fk_records_to_keywords_idx` (`records_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `records_link`
--

DROP TABLE IF EXISTS `records_link`;
CREATE TABLE IF NOT EXISTS `records_link` (
  `records_link_id` int NOT NULL AUTO_INCREMENT,
  `records_id` int NOT NULL,
  `records_link_parent_id` varchar(45) NOT NULL,
  PRIMARY KEY (`records_link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `records_status`
--

DROP TABLE IF EXISTS `records_status`;
CREATE TABLE IF NOT EXISTS `records_status` (
  `records_status_id` int NOT NULL,
  `records_status_title` varchar(100) NOT NULL,
  `records_status_observation` text,
  PRIMARY KEY (`records_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `records_support`
--

DROP TABLE IF EXISTS `records_support`;
CREATE TABLE IF NOT EXISTS `records_support` (
  `records_support_id` int NOT NULL,
  `records_support_title` varchar(100) NOT NULL,
  `records_support_observation` text,
  PRIMARY KEY (`records_support_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `retention`
--

DROP TABLE IF EXISTS `retention`;
CREATE TABLE IF NOT EXISTS `retention` (
  `retention_id` int NOT NULL AUTO_INCREMENT,
  `retention_duration` int NOT NULL,
  `retention_sort` int NOT NULL,
  `retention_reference` text NOT NULL,
  `retention_sort_id` int NOT NULL,
  PRIMARY KEY (`retention_id`),
  KEY `fk_retention_sort_to_retention_idx` (`retention_sort_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `retention_classification`
--

DROP TABLE IF EXISTS `retention_classification`;
CREATE TABLE IF NOT EXISTS `retention_classification` (
  `retention_id` int NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`retention_id`,`classification_id`),
  KEY `fk_classification_to_retention_classification_idx` (`classification_id`),
  KEY `fk_retention_to_retention_classification_idx` (`retention_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `retention_sort`
--

DROP TABLE IF EXISTS `retention_sort`;
CREATE TABLE IF NOT EXISTS `retention_sort` (
  `retention_sort_id` int NOT NULL,
  `retention_sort_code` varchar(10) NOT NULL,
  `retention_sort_title` varchar(30) NOT NULL,
  `retention_sort_comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`retention_sort_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `return`
--

DROP TABLE IF EXISTS `return`;
CREATE TABLE IF NOT EXISTS `return` (
  `return_id` int NOT NULL,
  `loan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `return_date` date NOT NULL,
  `return_observation` varchar(100) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `fk_loan_to_return_idx` (`loan_id`),
  KEY `fk_user_to_return_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `shelves`
--

DROP TABLE IF EXISTS `shelves`;
CREATE TABLE IF NOT EXISTS `shelves` (
  `shelves_id` int NOT NULL AUTO_INCREMENT,
  `shelves_title` varchar(30) NOT NULL,
  `shelves_ear` varchar(10) NOT NULL,
  `shelves_colonne` varchar(10) NOT NULL,
  `shelves_table` varchar(10) NOT NULL,
  `deposit_id` int NOT NULL,
  PRIMARY KEY (`shelves_id`),
  UNIQUE KEY `shelves_title_UNIQUE` (`shelves_title`),
  KEY `fk_deposit_to_shelves_idx` (`deposit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(10) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_surname` varchar(250) DEFAULT NULL,
  `user_password` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user_classification`
--

DROP TABLE IF EXISTS `user_classification`;
CREATE TABLE IF NOT EXISTS `user_classification` (
  `user_id` int NOT NULL,
  `classification_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`classification_id`),
  KEY `fk_classification_to_user_idx` (`classification_id`),
  KEY `fk_user_to_classification_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `container`
--
ALTER TABLE `container`
  ADD CONSTRAINT `fk_container_state_to_container_dk` FOREIGN KEY (`container_state_id`) REFERENCES `container_state` (`container_state_id`),
  ADD CONSTRAINT `fk_container_type_to_container_dk` FOREIGN KEY (`container_type_id`) REFERENCES `container_type` (`container_type_id`),
  ADD CONSTRAINT `fk_shelves_to_container_dk` FOREIGN KEY (`shelves_id`) REFERENCES `shelves` (`shelves_id`);

--
-- Contraintes pour la table `docnum`
--
ALTER TABLE `docnum`
  ADD CONSTRAINT `fk_docnum_records1` FOREIGN KEY (`records_id`) REFERENCES `records` (`id_records`);

--
-- Contraintes pour la table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `fk_loan_records2` FOREIGN KEY (`records_id`) REFERENCES `records` (`id_records`),
  ADD CONSTRAINT `fk_loan_user2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `return`
--
ALTER TABLE `return`
  ADD CONSTRAINT `fk_return_loan1` FOREIGN KEY (`loan_id`) REFERENCES `loan` (`loan_id`),
  ADD CONSTRAINT `fk_return_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
