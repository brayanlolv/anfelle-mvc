DELIMITER $$

CREATE PROCEDURE getAFL() BEGIN
    
    DECLARE id_completa VARCHAR ;
    DECLARE afl VARCHAR startDate;
    DECLARE i INT DEFAULT 1;

    WHILE i < 2 DO
        SET id_completa = SHORT_UUID();
        
        SET afl = RIGHT(id_completa,4);
        
        IF (SELECT codigo from pedidos WHERE codigo = afl IS NULL,
            SET i = 2;)
	END WHILE;
	SELECT afl;

END$$

DELIMITER ;


DROP PROCEDURE getAFL;


delimiter $$

CREATE PROCEDURE getAFL()
BEGIN

    DECLARE codigo V

	SELECT UUID_SHORT();
END


delimiter 