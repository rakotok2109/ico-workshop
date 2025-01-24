-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 jan. 2025 à 00:37
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `workshop_ico`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` int NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `name`, `type`, `description`, `image`) VALUES
(3, 'ICO 3', 0, 'etst', '');

-- --------------------------------------------------------

--
-- Structure de la table `detail_orders`
--

DROP TABLE IF EXISTS `detail_orders`;
CREATE TABLE IF NOT EXISTS `detail_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `quantity`, `amount`, `id_order`, `id_product`) VALUES
(1, 1, 15, 1, 1),
(2, 1, 15, 2, 1),
(3, 1, 15, 9, 6),
(4, 1, 15, 10, 6);

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `wording` varchar(255) NOT NULL,
  `rate` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `firstname`, `wording`, `rate`) VALUES
(3, 'Charlie', 'Déçu par la qualité du service.', 2),
(4, 'David', 'Très bon accueil et service rapide.', 4),
(5, 'Emma', 'Je suis extrêmement satisfait !', 5),
(6, 'François', 'Le produit ne correspond pas à mes attentes.', 2),
(7, 'Giselle', 'Correct mais sans plus.', 3),
(8, 'Hugo', 'Service client exceptionnel !', 5),
(9, 'Isabelle', 'Livraison tardive, un peu déçu.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `wording` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `wording`, `date`) VALUES
(2, 'Les valeurs d\'ICO : un jeu pour tous', 'ICO repose sur des valeurs fortes telles que la convivialité, l\'intergénérationnalité et la stratégie, rassemblant famille et amis pour une expérience unique.', '2024-01-05'),
(3, 'ICO : Un jeu intergénérationnel pour toute la famille', 'Que vous soyez jeune ou moins jeune, ICO vous offre une aventure passionnante où chacun peut vivre une expérience unique.', '2024-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`) VALUES
(1, 11, '2025-01-22 14:18:23'),
(2, 11, '2025-01-23 13:36:33'),
(3, 2025, '0000-00-00 00:00:00'),
(4, 2025, '0000-00-00 00:00:00'),
(5, 11, '2025-01-23 22:45:37'),
(6, 11, '2025-01-23 22:48:18'),
(7, 11, '2025-01-23 22:50:37'),
(8, 11, '2025-01-23 22:54:48'),
(9, 11, '2025-01-23 23:03:57'),
(10, 11, '2025-01-23 23:11:12');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(6, 'Jeu de société ICO', 15, 'Jeu de société super', 'jeu_de_carte.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `location` varchar(255) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `password`, `mail`, `phone`, `location`, `role`) VALUES
(11, 'Test', 'Nathan', '$2y$10$wjhSeqnGTzORFk5ro71/I.C9kujB.aRQR2bSmi2b12viMQRG0Lupq', 'nathan.rako@gmail.com', 123456789, 'Paris', 2),
(4, 'Robert', 'Claire', 'b4af804009cb036a4ccdc33431ef9ac9', 'claire.robert@example.com', 2147483647, 'Toulouse', 0),
(5, 'Petit', 'Paul', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'paul.petit@example.com', 2147483647, 'Bordeaux', 1),
(6, 'Lemoine', 'Julie', '882baf28143fb700b388a87ef561a6e5', 'julie.lemoine@example.com', 2147483647, 'Nice', 0),
(7, 'Durand', 'Marc', 'f30aa7a662c728b7407c54ae6bfd27d1', 'marc.durand@example.com', 2147483647, 'Nantes', 0),
(8, 'Moreau', 'Emma', '6d5757aa8ed91656eaba5bbb155fcd4f', 'emma.moreau@example.com', 2147483647, 'Strasbourg', 1),
(9, 'Simon', 'Hugo', '179ad45c6ce2cb97cf1029e212046e81', 'hugo.simon@example.com', 2147483647, 'Lille', 0),
(10, 'Test', 'Test', 'fee43a4c9d88769e14ec6a1d8b80f2e7', 'test@gmail.com', 1023456789, 'Rennes', 0),
(14, 'Test3', 'Test3', '$2y$10$8/q87jPPQMfRXautbQD9kufCArska/iFVsGkKUgL8yykmV2b3AEP2', 'test3@gmail.com', 321654987, 'Orleans', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
