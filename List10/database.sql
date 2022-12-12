CREATE TABLE `game_app_database`.`users` (
    `Id` INT(10) NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(50) NOT NULL,
    `FirstName` VARCHAR(50) NOT NULL,
    `LastName` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Id`),
    UNIQUE (`Username`)
) ENGINE = InnoDB;