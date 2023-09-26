-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 11 oct. 2021 à 22:30
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `book_babelio_v0_0_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nb_pages` int(11) NOT NULL,
  `rating` double NOT NULL,
  `summary` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT '2021-09-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2021-09-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `slug`, `nb_pages`, `rating`, `summary`, `image`, `created`, `modified`) VALUES
(1, 1, 'La Vraie Vie', 'LaVraieVie', 262, 4.04, 'C’est un pavillon qui ressemble à tous ceux du lotissement. Ou presque. Chez eux, il y a quatre chambres. La sienne, celle de son petit frère Gilles, celle des parents, et celle des cadavres. Le père est chasseur de gros gibier. La mère est transparente, amibe craintive, soumise aux humeurs de son mari. Le samedi se passe à jouer dans les carcasses de voitures de la décharge. Jusqu’au jour où un violent accident vient faire bégayer le présent.\r\nDès lors, Gilles ne rit plus. Elle, avec ses dix ans, voudrait tout annuler, revenir en arrière. Effacer cette vie qui lui apparaît comme le brouillon de l’autre. La vraie. Alors, en guerrière des temps modernes, elle retrousse ses manches et plonge tête la première dans le cru de l’existence. Elle fait diversion, passe entre les coups et conserve l’espoir fou que tout s’arrange un jour.\r\n\r\nD’une plume drôle et fulgurante, Adeline Dieudonné campe des personnages sauvages, entiers. Un univers acide et sensuel. Elle signe un roman coup de poing.', '01_Banner_State_Of_Skins_Kindred_Splash.jpg', '2021-09-20 00:00:00', '2021-10-11 21:06:47'),
(2, 1, 'L\'Art de perdre ', 'LArtdeperdre', 608, 4.33, 'L\'Algérie dont est originaire sa famille n\'a longtemps été pour Naïma qu\'une toile de fond sans grand intérêt. Pourtant, dans une société française traversée par les questions identitaires, tout semble vouloir la renvoyer à ses origines. Mais quel lien pourrait-elle avoir avec une histoire familiale qui jamais ne lui a été racontée ?\r\n\r\nSon grand-père Ali, un montagnard kabyle, est mort avant qu\'elle ait pu lui demander pourquoi l\'Histoire avait fait de lui un « harki ». Yema, sa grand-mère, pourrait peut-être répondre mais pas dans une langue que Naïma comprenne. Quant à Hamid, son père, arrivé en France à l\'été 1962 dans les camps de transit hâtivement mis en place, il ne parle plus de l\'Algérie de son enfance. Comment faire ressurgir un pays du silence ?\r\n\r\nDans une fresque romanesque puissante et audacieuse, Alice Zeniter raconte le destin, entre la France et l\'Algérie, des générations successives d\'une famille prisonnière d\'un passé tenace. Mais ce livre est aussi un grand roman sur la liberté d\'être soi, au-delà des héritages et des injonctions intimes ou sociales.', NULL, '2021-09-20 00:00:00', '2021-09-22 15:52:32'),
(4, 2, 'test book', 'testbook', 240, 5, 'I test my thing here', NULL, '2021-09-20 23:07:09', '2021-09-21 03:07:47'),
(5, 2, 'the queen', 'the-queen', 455, 2.5, 'blablabla', NULL, '2021-09-22 00:11:22', '2021-09-22 00:11:22'),
(7, 1, 'Nimportequoi pour image', 'Nimportequoi-pour-image', 444, 5, 'nimportequoi', 'banner_01_14ba36d.jpg', '2021-10-09 16:27:21', '2021-10-09 16:27:21'),
(8, 1, 'Add for test', 'Add-for-test', 666, 5, 'for test purpose', 'avatar_icon.png', '2021-10-11 14:11:49', '2021-10-11 19:54:16');

-- --------------------------------------------------------

--
-- Structure de la table `books_reviews`
--

CREATE TABLE `books_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books_reviews`
--

INSERT INTO `books_reviews` (`id`, `book_id`, `review_id`) VALUES
(1, 2, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `books_tags`
--

CREATE TABLE `books_tags` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books_tags`
--

INSERT INTO `books_tags` (`id`, `book_id`, `tag_id`) VALUES
(1, 1, 1),
(4, 5, 2),
(6, 7, 1),
(7, 8, 1),
(9, 1, 3),
(10, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'en_US', 'Books', 1, 'title', 'The True Life'),
(2, 'en_US', 'Books', 1, 'summary', 'It is a pavilion that looks like all those in the subdivision. Or almost. In their home there are four bedrooms. His, that of his little brother Gilles, that of the parents, and that of the corpses. The father is a big game hunter. The mother is transparent, a fearful amoeba, submissive to her husband\'s moods. Saturday is spent playing in the wreckage of cars at the landfill. Until the day when a violent accident stutters the present.\r\nFrom then on, Gilles no longer laughs. She, with her ten years, would like to cancel everything, to go back. Erase this life that seems to him like the other\'s draft. The truth. So, a modern warrior, she rolls up her sleeves and dives head first into the raw of existence. She creates a diversion, passes between shots and maintains the mad hope that someday everything will work out.\r\n\r\nWith a funny and dazzling pen, Adeline Dieudonné plays wild, whole characters. An acidic and sensual universe. She signs a punch novel.'),
(3, 'es_Es', 'Books', 1, 'title', 'La verdadera vida'),
(4, 'es_Es', 'Books', 1, 'summary', 'Es un pabellón que se parece a todos los del fraccionamiento. O casi. En su casa hay cuatro dormitorios. El suyo, el de su hermano pequeño Gilles, el de los padres, y el de los cadáveres. El padre es un gran cazador. La madre es transparente, una ameba temerosa, sumisa a los estados de ánimo de su marido. El sábado se pasa jugando entre los escombros de los autos en el vertedero. Hasta el día en que un violento accidente tartamudee el presente.\r\nA partir de entonces, Gilles ya no ríe. A ella, con sus diez años, le gustaría cancelar todo, volver. Borra esta vida que le parece la corriente del otro. La verdad. Entonces, una guerrera moderna, se arremanga y se sumerge de cabeza en lo crudo de la existencia. Crea una distracción, pasa entre tiros y mantiene la loca esperanza de que algún día todo saldrá bien.\r\n\r\nCon una pluma divertida y deslumbrante, Adeline Dieudonné interpreta personajes salvajes y completos. Un universo ácido y sensual. Ella firma una novela de ponche.');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `body`, `created`, `modified`) VALUES
(1, 1, 'the book was not good', '2021-09-22 11:45:39', '2021-09-22 11:45:39'),
(2, 2, 'the book was good', '2021-09-22 11:45:57', '2021-09-22 11:45:57');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'add/edit/delete books'),
(2, 'reviewer', 'make a review');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `definition` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '2021-09-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2021-09-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `definition`, `created`, `modified`) VALUES
(1, 'drame', 'Le drame est à la fois le genre littéraire incluant tous les ouvrages joués pour le théâtre, le genre théâtral dont l\'action généralement tendue et faite de risques, de catastrophes, comporte des éléments réalistes, familiers, selon un mélange qui s\'oppose aux principes du classicisme, aux XVIIIe et XIXe siècles et un événement ou situation grave et tragique, présentant souvent un caractère violent, mortel.', '2021-09-20 00:00:00', '2021-09-20 00:00:00'),
(2, 'science', 'La science (latin scientia, « connaissance ») est, d\'après le dictionnaire Le Robert, « Ce que l\'on sait pour l\'avoir appris, ce que l\'on tient pour vrai au sens large. L\'ensemble de connaissances, d\'études d\'une valeur universelle, caractérisées par un objet (domaine) et une méthode déterminés, et fondées sur des relations objectives vérifiables [sens restreint] »', '2021-09-20 00:00:00', '2021-09-20 00:00:00'),
(3, 'violence', 'C\'est « la force déréglée qui porte atteinte à l’intégrité physique ou psychique pour mettre en cause dans un but de domination ou de destruction l’humanité de l’individu »\r\nLa violence est ainsi souvent opposée à un usage contrôlé, légitime et mesuré de la force, la première connaissant moins ses limites et tendant éventuellement à la destruction totale.', '2021-09-20 00:00:00', '2021-09-20 00:00:00'),
(4, 'famille', 'Une famille est une communauté de personnes réunies par des liens de parenté. Elle est dotée d\'une personnalité juridique, d\'un nom, d\'un domicile et d\'un patrimoine commun, et crée entre ses membres une obligation juridique de solidarité morale et matérielle, censée les protéger et favoriser leur développement social, physique et affectif', '2021-09-20 00:00:00', '2021-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '2021-09-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2021-09-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `uuid`, `role_id`, `username`, `email`, `confirmed`, `password`, `created`, `modified`) VALUES
(1, 'adf2908f-dfa3-4763-a7da-9b3b7d104a18', 1, 'Jonathan', 'Joe@gmail.com', 1, '$2y$10$u98s9ziwM6oUktRrRu45t.vs4IcdG17BcGHYmolins89DM0P0c/ES', '2021-09-20 19:28:31', '2021-10-10 03:22:21'),
(2, 'd3b9fdca-fd13-47bb-9d17-bbe2bd140db2', 1, 'André', 'aPillon@gmail.com', 0, '$2y$10$Ek.FgIl2fnSZX0WWytgCCuF83AFk3ejYUZ20iAuIpH43WK/gsdZZm', '2021-09-20 19:28:50', '2021-10-10 03:22:49'),
(5, '03ec233e-429b-4bb0-8f2c-977c8470626a', 2, 'reviewer', 'reviewer@review.com', 1, '$2y$10$zBeoVkgbtN1T4amdISloTO7o3VRMZzx1S0XWoUagwBvsfZWIFVV96', '2021-09-22 16:19:15', '2021-10-10 03:23:50'),
(9, '0c938781-47f6-4977-8aa1-60140c06a0a3', 1, 'Testeur', '1957817@cmontmorency.qc.ca', 1, '$2y$10$Oq94Uh2fCK3CRH4.H1yJQ.pX2FpOo5utfz1JgouUwUuO8zFtuLizC', '2021-10-11 14:26:13', '2021-10-11 18:29:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_book` (`user_id`);

--
-- Index pour la table `books_reviews`
--
ALTER TABLE `books_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Index pour la table `books_tags`
--
ALTER TABLE `books_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `books_reviews`
--
ALTER TABLE `books_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `books_tags`
--
ALTER TABLE `books_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_user_book` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `books_reviews`
--
ALTER TABLE `books_reviews`
  ADD CONSTRAINT `fk_book_book_id2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review_review_id` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `books_tags`
--
ALTER TABLE `books_tags`
  ADD CONSTRAINT `fk_book_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_user_review` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
