DELIMITER //

CREATE PROCEDURE GetCompanyActivity()
BEGIN
	DECLARE done INT DEFAULT FALSE;
    DECLARE insertQuery TEXT;
    DECLARE cursor_company_activity CURSOR FOR SELECT CONCAT("INSERT INTO `company_activities`(`",c.activity,"`) VALUES ('",c.companyName,"');") FROM companies AS c;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    DROP TABLE IF EXISTS company_activities;

    SET @createTableQuery = (SELECT CONCAT("CREATE TABLE company_activities (", GROUP_CONCAT( DISTINCT CONCAT("`", activity, "`"), " VARCHAR(255)"), ")") FROM `companies`);
    
    PREPARE stmt FROM @createTableQuery;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    OPEN cursor_company_activity;
    reed_loop: LOOP
    	
        FETCH cursor_company_activity INTO insertQuery;
        IF done THEN
            LEAVE reed_loop;
        END IF;
        
        SET @iQ = (SELECT insertQuery);

        PREPARE stmt FROM @iQ;
        EXECUTE stmt;
        
        DEALLOCATE PREPARE stmt;
        END LOOP;
        CLOSE cursor_company_activity;
	SELECT * 
 	FROM company_activities;
END //

DELIMITER ;

CALL GetCompanyActivity();
