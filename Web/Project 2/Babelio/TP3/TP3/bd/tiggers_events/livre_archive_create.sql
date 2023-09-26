CREATE TABLE `livre_archive` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `nb_pages` int(11) NOT NULL,
        `rating` double NOT NULL,
        `resumer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `editeur_id` int(11) NOT NULL,
        `date_edition` date NOT NULL,
        `courriels_auteur` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY (`id`),
	KEY `ix_editeur_id` (`editeur_id`),
        CONSTRAINT `FK_editeur_livre_archive` FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
