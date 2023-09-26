CREATE
	TRIGGER `livre_after_update` AFTER UPDATE 
	ON `livre` 
	FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Modifié';
		END IF;
    
		INSERT INTO livre_audit (livre_id, changetype) VALUES (NEW.id, @changetype);
		
    END$$

