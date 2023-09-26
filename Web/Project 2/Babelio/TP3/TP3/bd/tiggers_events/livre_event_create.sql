CREATE 
	EVENT `archive_livre` 
	ON SCHEDULE EVERY 1 minute STARTS '2021-06-03 19:52:00' 
	DO BEGIN
	
		-- copy deleted livre
		INSERT INTO livre_archive (id, titre, nb_pages, rating, resumer, editeur_id, date_edition, courriels_auteur, genre, image) 
		SELECT id, titre, nb_pages, rating, resumer, editeur_id, date_edition, courriels_auteur, genre, image
		FROM livre
		WHERE efface = 1;
	    
		-- copy associated livre_audit records
                INSERT INTO livre_audit_archive (id, livre_id, changetype, changetime)
                SELECT livre_audit.id, livre_audit.livre_id, livre_audit.changetype, livre_audit.changetime
                FROM livre_audit
                JOIN livre ON livre_audit.livre_id = livre.id
                WHERE livre.efface = 1;
		
		-- remove deleted livre and livre_audit entries
		DELETE FROM livre WHERE efface = 1;
	    
	END $$
