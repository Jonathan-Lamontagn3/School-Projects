CREATE
	TRIGGER `livre_after_insert` AFTER INSERT 
	ON `livre` 
	FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Nouveau';
		END IF;
    
		INSERT INTO livre_audit (livre_id, changetype) VALUES (NEW.id, @changetype);
		
    END$$

