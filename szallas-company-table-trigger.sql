DELIMITER $$

CREATE TRIGGER companyFoundationDate
    BEFORE UPDATE
    ON companies FOR EACH ROW
BEGIN
    IF OLD.companyFoundationDate <> new.companyFoundationDate THEN
    	set @message_text = concat('Company with id: ', NEW.companyId , ' had protected fundation date');
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = @message_text;
	END IF;
END$$    

DELIMITER ;
