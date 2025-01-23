-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 jan. 2025 à 10:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `dos` tinyint(1) NOT NULL,
  `role_de_carte` text NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `type`, `nom`, `couleur`, `dos`, `role_de_carte`, `path`) VALUES
(1, 'Attaque', 'Éclair Foudroyant', 'Bleu', 0, 'Inflige des dégâts', '/images/cartes/eclair.png'),
(2, 'Défense', 'Bouclier Magique', 'Rouge', 0, 'Protège contre les attaques', '/images/cartes/bouclier.png'),
(3, 'Support', 'Potion de Soins', 'Vert', 0, 'Restaure des points de vie', '/images/cartes/potion.png'),
(4, 'Attaque', 'Lame Spectrale', 'Noir', 0, 'Inflige des dégâts critiques', '/images/cartes/lame.png'),
(5, 'Défense', 'Mur de Feu', 'Orange', 0, 'Empêche l’ennemi d’avancer', '/images/cartes/mur.png');

-- --------------------------------------------------------

--
-- Structure de la table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `quantity`, `amount`, `id_order`, `id_product`) VALUES
(1, 1, 15, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `wording` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `firstname`, `wording`, `rate`) VALUES
(2, 'Bob', 'Expérience correcte, peut être améliorée.', 3),
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

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `wording` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `wording`, `date`) VALUES
(1, 'ICO : Découvrez l\'aventure maritime ultime', 'Plongez dans l\'univers captivant d\'ICO, un jeu de société où stratégie, amitié et convivialité se rencontrent. Embarquez pour une aventure maritime riche en émotions !', '2024-01-01'),
(2, 'Les valeurs d\'ICO : un jeu pour tous', 'ICO repose sur des valeurs fortes telles que la convivialité, l\'intergénérationnalité et la stratégie, rassemblant famille et amis pour une expérience unique.', '2024-01-05'),
(3, 'ICO : Un jeu intergénérationnel pour toute la famille', 'Que vous soyez jeune ou moins jeune, ICO vous offre une aventure passionnante où chacun peut vivre une expérience unique.', '2024-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`) VALUES
(1, 11, '2025-01-22 13:18:23');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'ICO', 15, 'Nouveau jeu de société inspiré du Loup Garou, mais sur le thème des pirates.', 'ico-game.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `password`, `mail`, `phone`, `location`, `role`) VALUES
(1, 'Dupont', 'Jean', '482c811da5d5b4bc6d497ffa98491e38', 'jean.dupont@example.com', 1234567890, 'Paris', 1),
(3, 'Bernard', 'Luc', '34819d7beeabb9260a5c854bc85b3e44', 'luc.bernard@example.com', 2147483647, 'Marseille', 0),
(4, 'Robert', 'Claire', 'b4af804009cb036a4ccdc33431ef9ac9', 'claire.robert@example.com', 2147483647, 'Toulouse', 0),
(5, 'Petit', 'Paul', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'paul.petit@example.com', 2147483647, 'Bordeaux', 1),
(6, 'Lemoine', 'Julie', '882baf28143fb700b388a87ef561a6e5', 'julie.lemoine@example.com', 2147483647, 'Nice', 0),
(7, 'Durand', 'Marc', 'f30aa7a662c728b7407c54ae6bfd27d1', 'marc.durand@example.com', 2147483647, 'Nantes', 0),
(8, 'Moreau', 'Emma', '6d5757aa8ed91656eaba5bbb155fcd4f', 'emma.moreau@example.com', 2147483647, 'Strasbourg', 1),
(9, 'Simon', 'Hugo', '179ad45c6ce2cb97cf1029e212046e81', 'hugo.simon@example.com', 2147483647, 'Lille', 0),
(11, 'Test2', 'Nathan', '$2y$10$wjhSeqnGTzORFk5ro71/I.C9kujB.aRQR2bSmi2b12viMQRG0Lupq', 'nathan.rako@gmail.com', 101010101, 'Paris', 2),
(14, 'richard', 'alvyn', '$2y$10$grslIxGlnHFHGTR8O7zITuDQOEG5kOlNxQcl75PpLiFncDAgYEOPO', 'alvyn@hotmail.fr', 779555588, '2 rue de saint firmin', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
