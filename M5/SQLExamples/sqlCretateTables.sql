-- MySQL Script generated by MySQL Workbench
-- Sat Nov 23 14:23:14 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `USERS` (
  `idUSERS` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `USERSfirstname` VARCHAR(45) NULL,
  `USERSlastname` VARCHAR(100) NULL,
  `USERSemail` VARCHAR(100) NOT NULL,
  `USERSpassword` VARCHAR(45) NULL,
  `USERSremember_token` VARCHAR(45) NULL,
  `USERScreatedAt` TIMESTAMP NULL,
  `USERStype` INT NULL,
  `USERSupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUSERS`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `POSTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `POSTS` (
  `idPOSTS` INT NOT NULL AUTO_INCREMENT,
  `POSTScreatedAt` TIMESTAMP NULL,
  `POSTSupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `USERS_idUSERS` INT UNSIGNED NOT NULL,
  `POSTSviews` INT NULL,
  `POSTSstatus` INT NULL,
  PRIMARY KEY (`idPOSTS`),
  INDEX `fk_POSTS_USERS_idx` (`USERS_idUSERS` ASC),
  CONSTRAINT `fk_POSTS_USERS`
    FOREIGN KEY (`USERS_idUSERS`)
    REFERENCES `USERS` (`idUSERS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `POSTMESSAGES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `POSTMESSAGES` (
  `idPOSTMESSAGES` INT NOT NULL AUTO_INCREMENT,
  `POSTMESSAGESdesc` VARCHAR(250) NULL,
  `POSTMESSAGESmsg` VARCHAR(50000) NOT NULL,
  `POSTMESSAGEScreatedAt` TIMESTAMP NULL,
  `POSTMESSAGESupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `POSTS_idPOSTS` INT NOT NULL,
  PRIMARY KEY (`idPOSTMESSAGES`),
  INDEX `fk_POSTMESSAGES_POSTS1_idx` (`POSTS_idPOSTS` ASC),
  CONSTRAINT `fk_POSTMESSAGES_POSTS1`
    FOREIGN KEY (`POSTS_idPOSTS`)
    REFERENCES `POSTS` (`idPOSTS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `POSTSIMGPATH`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `POSTSIMGPATH` (
  `idPOSTSIMGPATH` INT NOT NULL AUTO_INCREMENT,
  `POSTSIMGPATHpath` VARCHAR(255) NULL,
  `POSTSIMGPATHcreatedAt` TIMESTAMP NULL,
  `POSTSIMGPATHupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `POSTS_idPOSTS` INT NOT NULL,
  PRIMARY KEY (`idPOSTSIMGPATH`),
  INDEX `fk_POSTSIMGPATH_POSTS1_idx` (`POSTS_idPOSTS` ASC),
  CONSTRAINT `fk_POSTSIMGPATH_POSTS1`
    FOREIGN KEY (`POSTS_idPOSTS`)
    REFERENCES `POSTS` (`idPOSTS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
