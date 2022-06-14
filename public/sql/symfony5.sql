-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 04:28
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfony5`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu_article` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_depot_article` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom_article`, `contenu_article`, `image_article`, `auteur_article`, `date_depot_article`) VALUES
(1, 'eum', 'Hic similique blanditiis debitis architecto ducimus.', 'https://lorempixel.com/640/480/?64730', 'Moreno', '1977-06-11 09:02:47'),
(2, 'hic', 'Est laudantium consequuntur placeat reiciendis.', 'https://lorempixel.com/640/480/?44569', 'Noel', '1971-01-25 11:13:56'),
(3, 'eos', 'Doloribus voluptatem laboriosam numquam tempora debitis maiores soluta.', 'https://lorempixel.com/640/480/?95619', 'Poulain', '1978-03-02 15:08:19'),
(4, 'ullam', 'Nesciunt quam magnam expedita id quasi consectetur dolores ratione.', 'https://lorempixel.com/640/480/?63203', 'Colas', '2017-09-03 07:00:19'),
(5, 'voluptatem', 'Voluptatibus et ut reiciendis vel porro iure repudiandae soluta.', 'https://lorempixel.com/640/480/?33157', 'Blanc', '1978-01-19 22:12:04'),
(6, 'sit', 'Molestias nihil quis et qui.', 'https://lorempixel.com/640/480/?41807', 'Ferreira', '1988-09-14 01:38:28'),
(7, 'et', 'Enim ipsum non consequatur quisquam sunt suscipit.', 'https://lorempixel.com/640/480/?11486', 'Michel', '2002-11-24 12:26:30'),
(8, 'corporis', 'Impedit iure iure ut iste assumenda inventore dolor.', 'https://lorempixel.com/640/480/?21644', 'Etienne', '2016-09-28 11:09:45'),
(9, 'et', 'Repellat nulla dolor voluptas praesentium saepe.', 'https://lorempixel.com/640/480/?57853', 'Bouchet', '2015-05-21 19:07:01'),
(10, 'quia', 'Saepe atque iusto inventore non et adipisci magni.', 'https://lorempixel.com/640/480/?54231', 'Chauveau', '2002-10-26 00:21:21'),
(11, 'qui', 'Adipisci qui reprehenderit maxime consequatur eaque.', 'https://lorempixel.com/640/480/?81990', 'Olivier', '1976-12-08 19:45:27'),
(12, 'vitae', 'Corporis culpa doloribus fugit adipisci dolorem est qui.', 'https://lorempixel.com/640/480/?50618', 'Pinto', '1970-03-20 00:39:50'),
(13, 'velit', 'Hic delectus voluptatum dolor rerum totam aut labore.', 'https://lorempixel.com/640/480/?53448', 'Leclercq', '2012-07-27 01:11:40'),
(14, 'voluptates', 'Nostrum est id velit atque necessitatibus praesentium beatae.', 'https://lorempixel.com/640/480/?61233', 'Rousseau', '2011-07-04 16:37:00'),
(15, 'sapiente', 'Quis et nemo quisquam voluptate quis nesciunt fugit.', 'https://lorempixel.com/640/480/?24122', 'Renault', '1970-03-30 12:11:48'),
(16, 'magni', 'Aut veniam ex nostrum magni.', 'https://lorempixel.com/640/480/?35979', 'Roy', '2013-07-14 12:20:20'),
(17, 'aut', 'Ut rerum earum debitis perferendis.', 'https://lorempixel.com/640/480/?51563', 'Jourdan', '2008-06-06 21:55:55'),
(18, 'qui', 'Officia dignissimos molestiae repudiandae non.', 'https://lorempixel.com/640/480/?29054', 'Morin', '2013-09-05 19:26:18'),
(19, 'repudiandae', 'Fugit perspiciatis qui reiciendis enim doloribus aspernatur magnam.', 'https://lorempixel.com/640/480/?30164', 'Hamon', '2000-03-12 20:21:39'),
(20, 'alias', 'Aut odio velit ipsum earum et vel rem.', 'https://lorempixel.com/640/480/?24079', 'Guyot', '2000-10-28 10:38:39');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`) VALUES
(1, 'Vacances'),
(2, 'Emploi'),
(3, 'Véhicules'),
(4, 'Immobilier'),
(5, 'Mode'),
(6, 'Maison'),
(7, 'Multimedia'),
(8, 'Loisirs'),
(9, 'Animaux'),
(10, 'Materiel Pro'),
(11, 'Services'),
(12, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `distributeurs`
--

DROP TABLE IF EXISTS `distributeurs`;
CREATE TABLE IF NOT EXISTS `distributeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_distributeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `distributeurs`
--

INSERT INTO `distributeurs` (`id`, `nom_distributeur`) VALUES
(1, 'Amazon'),
(2, 'Cdiscount'),
(3, 'LeBonCoin'),
(4, 'eBay'),
(5, 'LeBonCoin'),
(6, 'eBay'),
(7, 'Fnac'),
(8, 'AliExpress'),
(9, 'Thomann'),
(10, 'Leroy Merlin');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220604064031', '2022-06-04 06:40:37', 44),
('DoctrineMigrations\\Version20220604070454', '2022-06-04 07:05:03', 47),
('DoctrineMigrations\\Version20220604070818', '2022-06-04 07:08:26', 41),
('DoctrineMigrations\\Version20220604073143', '2022-06-04 07:31:52', 56),
('DoctrineMigrations\\Version20220609180736', '2022-06-09 18:07:48', 164),
('DoctrineMigrations\\Version20220611110612', '2022-06-11 11:06:21', 158),
('DoctrineMigrations\\Version20220611120835', '2022-06-11 12:08:55', 45),
('DoctrineMigrations\\Version20220611123432', '2022-06-11 12:35:41', 44),
('DoctrineMigrations\\Version20220612053720', '2022-06-12 05:37:33', 164),
('DoctrineMigrations\\Version20220612054557', '2022-06-12 05:46:11', 108),
('DoctrineMigrations\\Version20220612063639', '2022-06-12 06:36:51', 112),
('DoctrineMigrations\\Version20220612064011', '2022-06-12 06:40:20', 143),
('DoctrineMigrations\\Version20220612075942', '2022-06-12 08:00:00', 48);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_produit` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_produit` tinyint(1) NOT NULL,
  `date_depot_produit` datetime NOT NULL,
  `prix_produit` double NOT NULL,
  `numero_id` int(11) DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BE2DDF8C5D172A78` (`numero_id`),
  KEY `IDX_BE2DDF8CA21214B7` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `description_produit`, `image_produit`, `stock_produit`, `date_depot_produit`, `prix_produit`, `numero_id`, `categories_id`) VALUES
(23, 'Chariot a roulette', 'Chariot en fer a roulette', 'chariot.jpg', 1, '1973-12-08 00:00:00', 573.302, 1, 10),
(26, 'Iphone', 'Telephone apple occasion', 'iphone.jpg', 1, '2022-06-17 00:00:00', 458.25, 2, 2),
(27, 'Lego', 'Vrac de Lego pour les enfants', 'lego.jpg', 1, '2022-06-11 00:00:00', 50.25, 3, 8);

-- --------------------------------------------------------

--
-- Structure de la table `produits_distributeurs`
--

DROP TABLE IF EXISTS `produits_distributeurs`;
CREATE TABLE IF NOT EXISTS `produits_distributeurs` (
  `produits_id` int(11) NOT NULL,
  `distributeurs_id` int(11) NOT NULL,
  PRIMARY KEY (`produits_id`,`distributeurs_id`),
  KEY `IDX_3F2086E8CD11A2CF` (`produits_id`),
  KEY `IDX_3F2086E89CE97DF1` (`distributeurs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits_distributeurs`
--

INSERT INTO `produits_distributeurs` (`produits_id`, `distributeurs_id`) VALUES
(23, 4),
(26, 1),
(26, 3),
(27, 3),
(27, 6);

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

DROP TABLE IF EXISTS `references`;
CREATE TABLE IF NOT EXISTS `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reference` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `references`
--

INSERT INTO `references` (`id`, `numero_reference`) VALUES
(1, 74586),
(2, 12586),
(3, 784589);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'michael@gmail.com', '[]', '$2y$13$IkNBaY6lRzZ7FhkHMAQXL.SvM/QZJTV/9FkcAmTHh8Frt9SOnRexy'),
(2, 'admin@admin.com', '[\"ROLE_ADMIN\"]', '$2y$13$HWLdt9k0ea2DkXVwd8DjN.5A3HXXFILe0eJiQ5Drqn8n47jSLDR8.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_BE2DDF8C5D172A78` FOREIGN KEY (`numero_id`) REFERENCES `references` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `produits_distributeurs`
--
ALTER TABLE `produits_distributeurs`
  ADD CONSTRAINT `FK_3F2086E89CE97DF1` FOREIGN KEY (`distributeurs_id`) REFERENCES `distributeurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3F2086E8CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
