DELIMITER //

CREATE PROCEDURE GetCompanyFoundation(
	IN companyFoundationDateStepper DATE
)
BEGIN
    DROP TABLE IF EXISTS company_foundations;

    CREATE TABLE company_foundations (
        date DATE NOT NULL UNIQUE,
        companyName VARCHAR(255)
    );

    WHILE DATE(companyFoundationDateStepper) <= DATE(NOW()) DO
        INSERT INTO company_foundations VALUES (companyFoundationDateStepper, (SELECT companyName FROM companies WHERE companyFoundationDate = companyFoundationDateStepper));

        SET companyFoundationDateStepper = DATE_ADD(companyFoundationDateStepper, INTERVAL 1 DAY);

    END WHILE;

	SELECT * 
 	FROM company_foundations;
END //

DELIMITER ;

CALL GetCompanyFoundation("2001-01-01");
