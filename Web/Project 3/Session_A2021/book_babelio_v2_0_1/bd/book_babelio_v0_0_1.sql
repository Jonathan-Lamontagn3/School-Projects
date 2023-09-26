-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 16 nov. 2021 à 03:44
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
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL DEFAULT '1',
  `nationality_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `continent_id`, `nationality_id`, `name`) VALUES
(1, 5, 148, 'René Goscinny'),
(2, 2, 65, 'Stephen King'),
(3, 5, 148, 'Franck Thilliez'),
(4, 5, 148, 'Michel Bussi'),
(5, 2, 65, 'Richard Powers'),
(6, 5, 169, 'J. K. Rowling'),
(7, 5, 148, 'Guillaume Musso'),
(8, 5, 148, 'Clara Dupont-Monod'),
(9, 2, 65, 'Kendare Blake'),
(10, 5, 138, 'Amélie Nothomb'),
(11, 5, 148, 'Pierre Lemaitre'),
(12, 5, 169, 'Lucinda Riley'),
(13, 5, 148, 'Valérie Perrin'),
(14, 5, 148, 'Virginie Grimaldi'),
(15, 5, 148, 'Cécile Coulon'),
(16, 5, 148, 'Agnès Ledig'),
(17, 5, 148, 'Henri Lœvenbruck'),
(18, 5, 148, 'Anne Berest'),
(19, 5, 148, 'Sorj Chalandon'),
(20, 2, 65, 'Frank Herbert'),
(21, 5, 148, 'Mélissa Da Costa'),
(22, 5, 148, 'Olivier Norek'),
(23, 5, 153, 'Donato Carrisi'),
(24, 5, 148, 'Honoré de Balzac'),
(25, 5, 169, 'Agatha Christie'),
(26, 5, 169, 'Ken Follett'),
(27, 5, 148, 'Maud Ventura'),
(28, 5, 148, 'Jean-Christophe Grangé'),
(29, 5, 148, 'Jean-Christophe Rufin'),
(30, 5, 174, 'Camilla Läckberg'),
(31, 5, 148, 'Albert Camus'),
(32, 5, 148, 'Nicolas Beuglet'),
(33, 2, 65, 'Harlan Coben'),
(34, 2, 65, 'Michael Connelly'),
(35, 5, 148, 'Laetitia Colombani'),
(36, 5, 137, 'Stefan Zweig'),
(37, 2, 65, 'Jean Hegland'),
(38, 5, 148, 'Patrick Modiano'),
(39, 5, 148, 'Bernard Minier'),
(40, 5, 175, 'Joël Dicker'),
(41, 1, 46, 'Koffi Dzakou'),
(42, 1, 30, 'Mohammed Errabie');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT '1',
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

INSERT INTO `books` (`id`, `user_id`, `author_id`, `title`, `slug`, `nb_pages`, `rating`, `summary`, `image`, `created`, `modified`) VALUES
(1, 1, 12, 'La Vraie Vie', 'LaVraieVie', 262, 4.04, 'C’est un pavillon qui ressemble à tous ceux du lotissement. Ou presque. Chez eux, il y a quatre chambres. La sienne, celle de son petit frère Gilles, celle des parents, et celle des cadavres. Le père est chasseur de gros gibier. La mère est transparente, amibe craintive, soumise aux humeurs de son mari. Le samedi se passe à jouer dans les carcasses de voitures de la décharge. Jusqu’au jour où un violent accident vient faire bégayer le présent.\r\nDès lors, Gilles ne rit plus. Elle, avec ses dix ans, voudrait tout annuler, revenir en arrière. Effacer cette vie qui lui apparaît comme le brouillon de l’autre. La vraie. Alors, en guerrière des temps modernes, elle retrousse ses manches et plonge tête la première dans le cru de l’existence. Elle fait diversion, passe entre les coups et conserve l’espoir fou que tout s’arrange un jour.\r\n\r\nD’une plume drôle et fulgurante, Adeline Dieudonné campe des personnages sauvages, entiers. Un univers acide et sensuel. Elle signe un roman coup de poing.', '01_Banner_State_Of_Skins_Kindred_Splash.jpg', '2021-09-20 00:00:00', '2021-11-02 23:24:19'),
(2, 1, 1, 'L\'Art de perdre ', 'LArtdeperdre', 608, 4.33, 'L\'Algérie dont est originaire sa famille n\'a longtemps été pour Naïma qu\'une toile de fond sans grand intérêt. Pourtant, dans une société française traversée par les questions identitaires, tout semble vouloir la renvoyer à ses origines. Mais quel lien pourrait-elle avoir avec une histoire familiale qui jamais ne lui a été racontée ?\r\n\r\nSon grand-père Ali, un montagnard kabyle, est mort avant qu\'elle ait pu lui demander pourquoi l\'Histoire avait fait de lui un « harki ». Yema, sa grand-mère, pourrait peut-être répondre mais pas dans une langue que Naïma comprenne. Quant à Hamid, son père, arrivé en France à l\'été 1962 dans les camps de transit hâtivement mis en place, il ne parle plus de l\'Algérie de son enfance. Comment faire ressurgir un pays du silence ?\r\n\r\nDans une fresque romanesque puissante et audacieuse, Alice Zeniter raconte le destin, entre la France et l\'Algérie, des générations successives d\'une famille prisonnière d\'un passé tenace. Mais ce livre est aussi un grand roman sur la liberté d\'être soi, au-delà des héritages et des injonctions intimes ou sociales.', NULL, '2021-09-20 00:00:00', '2021-09-22 15:52:32'),
(4, 2, 1, 'test book', 'testbook', 240, 5, 'I test my thing here', NULL, '2021-09-20 23:07:09', '2021-09-21 03:07:47'),
(5, 2, 1, 'the queen', 'the-queen', 455, 2.5, 'blablabla', NULL, '2021-09-22 00:11:22', '2021-09-22 00:11:22'),
(7, 1, 1, 'Nimportequoi pour image', 'Nimportequoi-pour-image', 444, 5, 'nimportequoi', 'banner_01_14ba36d.jpg', '2021-10-09 16:27:21', '2021-10-09 16:27:21'),
(8, 1, 42, 'Add for test mod', 'Add-for-test', 666, 5, 'for test purpose', 'avatar_icon.png', '2021-10-11 14:11:49', '2021-11-14 01:21:17');

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
(10, 1, 4),
(12, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `continents`
--

CREATE TABLE `continents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `continents`
--

INSERT INTO `continents` (`id`, `name`) VALUES
(1, 'Afrique'),
(2, 'Amérique'),
(3, 'Antarctique'),
(4, 'Asie'),
(5, 'Europe'),
(6, 'Océanie');

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
-- Structure de la table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nationalities`
--

INSERT INTO `nationalities` (`id`, `continent_id`, `name`) VALUES
(1, 1, 'Sud-Africaine'),
(2, 1, 'Algérien'),
(3, 1, 'Angolais'),
(4, 1, 'Béninois'),
(5, 1, 'Botswanais'),
(6, 1, 'Burkinabé'),
(7, 1, 'Burundais'),
(8, 1, 'Camerounais'),
(9, 1, 'Cap-Verdien'),
(10, 1, 'Centrafricain'),
(11, 1, 'Comorien'),
(12, 1, 'Congolais'),
(13, 1, 'Ivoirien'),
(14, 1, 'Djiboutien'),
(15, 1, 'Égyptien'),
(16, 1, 'Érythréen'),
(17, 1, 'Éthiopien'),
(18, 1, 'Eswatinien'),
(19, 1, 'Gabonais'),
(20, 1, 'Gambien'),
(21, 1, 'Ghanéen'),
(22, 1, 'Guinéen'),
(23, 1, 'Kényan'),
(24, 1, 'Lésothien'),
(25, 1, 'Libérien'),
(26, 1, 'Libyen'),
(27, 1, 'Malgache'),
(28, 1, 'Malawite'),
(29, 1, 'Malien'),
(30, 1, 'Marocain'),
(31, 1, 'Mauricien'),
(32, 1, 'Mauritanien'),
(33, 1, 'Mozambicain'),
(34, 1, 'Namibien'),
(35, 1, 'Nigérien'),
(36, 1, 'Ougandais'),
(37, 1, 'Rwandais'),
(38, 1, 'Santoméen'),
(39, 1, 'Sénégalais'),
(40, 1, 'Seychellois'),
(41, 1, 'Sierraléonais'),
(42, 1, 'Somalien'),
(43, 1, 'Soudanais'),
(44, 1, 'Tanzanien'),
(45, 1, 'Tchadien'),
(46, 1, 'Togolais'),
(47, 1, 'Tunisien'),
(48, 1, 'Zambien'),
(49, 1, 'Zimbabwéen'),
(50, 2, 'Antiguayen'),
(51, 2, 'Argentin'),
(52, 2, 'Bahaméen'),
(53, 2, 'Barbadien'),
(54, 2, 'Bélizien'),
(55, 2, 'Bolivien'),
(56, 2, 'Brésilien'),
(57, 2, 'Canadien'),
(58, 2, 'Chilien'),
(59, 2, 'Colombien'),
(60, 2, 'Costaricien'),
(61, 2, 'Cubain'),
(62, 2, 'Dominicain'),
(63, 2, 'Dominiquais'),
(64, 2, 'Équatorien'),
(65, 2, 'Américain'),
(66, 2, 'Grenadien'),
(67, 2, 'Guatémaltèque'),
(68, 2, 'Guyanien'),
(69, 2, 'Haïtien'),
(70, 2, 'Hondurien'),
(71, 2, 'Jamaïcain'),
(72, 2, 'Mexicain'),
(73, 2, 'Nicaraguayen'),
(74, 2, 'Panaméen'),
(75, 2, 'Paraguayen'),
(76, 2, 'Péruvien'),
(77, 2, 'Christophien'),
(78, 2, 'Lucien'),
(79, 2, 'Vincentais'),
(80, 2, 'Salvadorien'),
(81, 2, 'Surinamien'),
(82, 2, 'Trinidadien'),
(83, 2, 'Uruguayen'),
(84, 2, 'Vénézuélien'),
(85, 4, 'Afghan'),
(86, 4, 'Saoudiens'),
(87, 4, 'Arménien'),
(88, 4, 'Azerbaïdjanais'),
(89, 4, 'Bahreïnien'),
(90, 4, 'Bangladais'),
(91, 4, 'Bhoutanais'),
(92, 4, 'Birman'),
(93, 4, 'Brunéien'),
(94, 4, 'Cambodgien'),
(95, 4, 'Chinois'),
(96, 4, 'Nord-Coréen'),
(97, 4, 'Sud-Coréen'),
(98, 4, 'Émirien'),
(99, 4, 'Géorgien'),
(100, 4, 'Indien'),
(101, 4, 'Indonésien'),
(102, 4, 'Irakien'),
(103, 4, 'Iranien'),
(104, 4, 'Israélien'),
(105, 4, 'Japonais'),
(106, 4, 'Jordanien'),
(107, 4, 'Kazakhstanais'),
(108, 4, 'Kirghiz'),
(109, 4, 'Koweïtien'),
(110, 4, 'Laotien'),
(111, 4, 'Libanais'),
(112, 4, 'Malaisien'),
(113, 4, 'Maldivien'),
(114, 4, 'Mongol'),
(115, 4, 'Népalais'),
(116, 4, 'Omanais'),
(117, 4, 'Ouzbek'),
(118, 4, 'Pakistanais'),
(119, 4, 'Palestinien'),
(120, 4, 'Philippin'),
(121, 4, 'Qatariens'),
(122, 4, 'Singapourien'),
(123, 4, 'Srilankais'),
(124, 4, 'Syriens'),
(125, 4, 'Taïwanais'),
(126, 4, 'Tadjik'),
(127, 4, 'Thaïlandais'),
(128, 4, 'Timorais'),
(129, 4, 'Turkmène'),
(130, 4, 'Turc'),
(131, 4, 'Vietnamien'),
(132, 4, 'Yéménite'),
(133, 5, 'Russe'),
(134, 5, 'Albanais'),
(135, 5, 'Allemand'),
(136, 5, 'Andorien'),
(137, 5, 'Autrichien'),
(138, 5, 'Belge'),
(139, 5, 'Bélarusse'),
(140, 5, 'Bosnien'),
(141, 5, 'Bulgare'),
(142, 5, 'Chypriote'),
(143, 5, 'Croate'),
(144, 5, 'Danois'),
(145, 5, 'Espagnol'),
(146, 5, 'Estonien'),
(147, 5, 'Finlandais'),
(148, 5, 'Français'),
(149, 5, 'Grec'),
(150, 5, 'Hongrois'),
(151, 5, 'Irlandais'),
(152, 5, 'Islandais'),
(153, 5, 'Italien'),
(154, 5, 'Letton'),
(155, 5, 'Liechtensteinois'),
(156, 5, 'Lituanien'),
(157, 5, 'Luxembourgeois'),
(158, 5, 'Macédonien'),
(159, 5, 'Maltais'),
(160, 5, 'Moldave'),
(161, 5, 'Monégasque'),
(162, 5, 'Monténégrin'),
(163, 5, 'Norvégien'),
(164, 5, 'Néerlandais'),
(165, 5, 'Polonais'),
(166, 5, 'Portugais'),
(167, 5, 'Tchèque'),
(168, 5, 'Roumain'),
(169, 5, 'Britannique'),
(170, 5, 'Saint-Marinais'),
(171, 5, 'Serbe'),
(172, 5, 'Slovaque'),
(173, 5, 'Slovène'),
(174, 5, 'Suédois'),
(175, 5, 'Suisse'),
(176, 5, 'Ukrainien'),
(177, 6, 'Australien'),
(178, 6, 'Fidjien'),
(179, 6, 'Kiribatien'),
(180, 6, 'Marshallais'),
(181, 6, 'Micronésien'),
(182, 6, 'Nauruan'),
(183, 6, 'Néo-Zélandais'),
(184, 6, 'Palaois'),
(185, 6, 'Papouasien'),
(186, 6, 'Salomonien'),
(187, 6, 'Samoan'),
(188, 6, 'Tongien'),
(189, 6, 'Tuvaluan'),
(190, 6, 'Vanuatais');

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
  `definition` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `definition`) VALUES
(1, 'drame', 'Le drame est à la fois le genre littéraire incluant tous les ouvrages joués pour le théâtre, le genre théâtral dont l\'action généralement tendue et faite de risques, de catastrophes, comporte des éléments réalistes, familiers, selon un mélange qui s\'oppose aux principes du classicisme, aux XVIIIe et XIXe siècles et un événement ou situation grave et tragique, présentant souvent un caractère violent, mortel.'),
(2, 'science', 'La science (latin scientia, « connaissance ») est, d\'après le dictionnaire Le Robert, « Ce que l\'on sait pour l\'avoir appris, ce que l\'on tient pour vrai au sens large. L\'ensemble de connaissances, d\'études d\'une valeur universelle, caractérisées par un objet (domaine) et une méthode déterminés, et fondées sur des relations objectives vérifiables [sens restreint] »'),
(3, 'violence', 'C\'est « la force déréglée qui porte atteinte à l’intégrité physique ou psychique pour mettre en cause dans un but de domination ou de destruction l’humanité de l’individu »\r\nLa violence est ainsi souvent opposée à un usage contrôlé, légitime et mesuré de la force, la première connaissant moins ses limites et tendant éventuellement à la destruction totale.'),
(4, 'famille', 'Une famille est une communauté de personnes réunies par des liens de parenté. Elle est dotée d\'une personnalité juridique, d\'un nom, d\'un domicile et d\'un patrimoine commun, et crée entre ses membres une obligation juridique de solidarité morale et matérielle, censée les protéger et favoriser leur développement social, physique et affectif'),
(6, 'amour', 'Retrouvez ici tous les livres qui traitent du thème amoureux, que ce soit en littérature de fiction ou en document, essai.');

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
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `nationality_id` (`nationality_id`),
  ADD KEY `continent_id` (`continent_id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_book` (`user_id`),
  ADD KEY `author_id` (`author_id`);

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
-- Index pour la table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continent_id` (`continent_id`),
  ADD KEY `name` (`name`);

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
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `books_reviews`
--
ALTER TABLE `books_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `books_tags`
--
ALTER TABLE `books_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `fk_author_continent` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_author_nationality` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Contraintes pour la table `nationalities`
--
ALTER TABLE `nationalities`
  ADD CONSTRAINT `fk_continent_nationality` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
