SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mycms` DEFAULT CHARACTER SET utf8 ;
USE `mycms` ;

-- -----------------------------------------------------
-- Table `mycms`.`rols`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`rols` (
  `idrols` INT(11) NOT NULL AUTO_INCREMENT ,
  `userid` INT(11) NOT NULL ,
  `roleid` TINYINT(4) NOT NULL COMMENT 'роль - 1,2,3,4' ,
  `textrole` VARCHAR(45) NOT NULL ,
  `users_idusers` INT(11) NOT NULL ,
  PRIMARY KEY (`idrols`) ,
  UNIQUE INDEX `users_idusers` (`users_idusers` ASC) ,
  CONSTRAINT `rols_ibfk_1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES `mycms`.`users` (`iduser` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`users` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT ,
  `login` TEXT NOT NULL ,
  `password` TEXT NOT NULL ,
  `email` TEXT NOT NULL ,
  `role` INT(11) NOT NULL DEFAULT '0' ,
  `rols_idrols` INT(11) NOT NULL ,
  PRIMARY KEY (`iduser`) ,
  UNIQUE INDEX `rols_idrols` (`rols_idrols` ASC) ,
  CONSTRAINT `users_ibfk_1`
    FOREIGN KEY (`iduser` )
    REFERENCES `mycms`.`articles` (`users_idusers` ),
  CONSTRAINT `users_ibfk_2`
    FOREIGN KEY (`rols_idrols` )
    REFERENCES `mycms`.`rols` (`idrols` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(225) NOT NULL ,
  `description` TEXT NOT NULL ,
  `keywords` TEXT NOT NULL ,
  `text` TEXT NOT NULL ,
  `state` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0 -черновик, 1 - опубликовано' ,
  `date_create` VARCHAR(45) NOT NULL COMMENT 'дата создания' ,
  `date_edit` VARCHAR(45) NOT NULL COMMENT 'дата изменения' ,
  `users_idusers` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `users_idusers` (`users_idusers` ASC) ,
  CONSTRAINT `articles_ibfk_1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES `mycms`.`users` (`iduser` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`errors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`errors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `module` VARCHAR(45) NOT NULL COMMENT 'модуль, в котором произошла ошибка' ,
  `message` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`files`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`files` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `path` TEXT NOT NULL ,
  `extension` VARCHAR(45) NOT NULL ,
  `type` VARCHAR(45) NOT NULL COMMENT 'тип изображения миме' ,
  `users_idusers` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `users_idusers` (`users_idusers` ASC) ,
  CONSTRAINT `files_ibfk_1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES `mycms`.`users` (`iduser` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`settings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`settings` (
  `idsettings` INT(11) NOT NULL ,
  `access` TINYINT(4) NOT NULL DEFAULT '1' ,
  `offline` TINYINT(4) NOT NULL DEFAULT '1' ,
  `editor` TINYINT(4) NOT NULL DEFAULT '1' ,
  `modules` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '0 - выкл' ,
  `tmp` VARCHAR(45) NOT NULL )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mycms`.`widgets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mycms`.`widgets` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `head` TEXT NOT NULL COMMENT 'заголовок модуля' ,
  `template` TEXT NOT NULL COMMENT 'имя шаблона или путь к нему' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
