CREATE TABLE `livre_audit` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`livre_id` int(11) NOT NULL,
	`changetype` enum('Nouveau','Modifié','Effacé') NOT NULL,
	`changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	KEY `ix_livre_id` (`livre_id`),
	KEY `ix_changetype` (`changetype`),
	KEY `ix_changetime` (`changetime`),
	CONSTRAINT `FK_audit_livre_id` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
