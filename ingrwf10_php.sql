-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 juil. 2022 à 16:34
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ingrwf10_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'fruit'),
(2, 'légume'),
(3, 'boisson'),
(4, 'jardin');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'ggfg', 'fgfgg@ggg.ggg', 'aaezez'),
(2, 'Devillers', 'devi.quentin@gmail.com', 'Ceci est un message'),
(3, 'Pomme', 'pomme@aaaaa.com', 'aazzzeeee'),
(4, 'Dupond', 'aaa@mmm.com', 'sdfsdffffdfdf');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`) VALUES
(2, 'Ceci est la news numéro 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce euismod mi tortor, at facilisis sem mattis sed. Praesent consectetur elementum imperdiet. Maecenas urna sapien, suscipit mollis risus nec, varius tempus mi.'),
(3, 'Lorem ipsum', 'Vivamus pulvinar mauris et turpis faucibus molestie. Maecenas sodales auctor libero.'),
(4, 'Dernière new encodée', 'Maecenas urna sapien, suscipit mollis risus nec, varius tempus mi. Vivamus pulvinar mauris et turpis faucibus molestie. Maecenas sodales auctor libero.'),
(5, 'Ma news postée en JSON', 'Postée en JSON lorem ipsum'),
(6, 'Titre modifié', 'Contenu modifié'),
(7, '6 juillet', 'aaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id_personnes` int(10) UNSIGNED NOT NULL,
  `nom` varchar(120) DEFAULT NULL,
  `prenom` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personnes`, `nom`, `prenom`) VALUES
(6, 'charlier', 'benoit'),
(9, 'Bellery', 'Olivier'),
(19, 'devos', 'françoise'),
(21, 'brol', 'machin'),
(22, 'Proust', 'Marcel'),
(23, 'Proust2', 'Marcel2'),
(24, 'Proust2', 'Marcel2'),
(25, 'Proust2', 'Marcel2'),
(26, 'Proust2', 'Marcel2'),
(27, 'NULL', 'Bastien'),
(28, 'Poirot', 'Hercule'),
(29, 'Attend', 'Jaune'),
(31, 'dupont2', 'marcel2'),
(32, 'dupont', 'marcel'),
(33, 'dupont', 'marcel'),
(38, 'gggg', 'gggggg'),
(39, 'gggg', 'gggggg'),
(40, 'gggg', 'gggggg'),
(41, 'gggg', 'gggggg'),
(42, 'gggg', 'gggggg'),
(43, 'gggg', 'gggggg'),
(44, 'gggg', 'gggggg'),
(45, 'gggg', 'gggggg'),
(46, 'gggg', 'gggggg'),
(47, 'gggg', 'gggggg'),
(48, 'gggg', 'gggggg'),
(49, 'gggg', 'gggggg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `id_category`) VALUES
(1, 'fraise', '1.58', 1),
(2, 'cerise', '1.21', 1),
(3, 'prune', '2.67', 1),
(4, 'chou-fleur', '1.50', 2),
(5, 'eau', '0.61', 3),
(6, 'concombre', '0.90', 2),
(7, 'coca-cola', '2.41', 3),
(8, 'thé', '2.12', 3),
(9, 'parasol', '59.00', 4),
(10, 'chaise', '44.99', 4),
(11, 'piscine', '299.99', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `login`, `password`) VALUES
(1, 'pierre', 'pass');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_personnes`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `procuct_category` (`id_category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_personnes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `procuct_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
