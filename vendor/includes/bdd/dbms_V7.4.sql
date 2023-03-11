-- MySQL Workbench Synchronization
-- Generated: 2023-03-11 19:06
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Prostation

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `dbms`.`access_classe` (
  `access_classe_id` INT(11) NOT NULL AUTO_INCREMENT,
  `access_classe_code` VARCHAR(10) NOT NULL,
  `access_classe_description` TEXT NOT NULL,
  `classification_id` INT(11) NOT NULL,
  PRIMARY KEY (`access_classe_id`, `classification_id`),
  INDEX `fk_classification_to_access_classe_idx` (`classification_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`dolly` (
  `dolly_id` INT(11) NOT NULL AUTO_INCREMENT,
  `dolly_title` VARCHAR(100) NOT NULL,
  `dolly_observation` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`dolly_id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`classification` (
  `classification_id` INT(11) NOT NULL AUTO_INCREMENT,
  `classification_code` VARCHAR(10) NOT NULL,
  `classification_title` VARCHAR(100) NOT NULL,
  `classification_parent` VARCHAR(100) NOT NULL,
  `records_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`classification_id`),
  INDEX `fk_records_to__classification_idx` (`records_id` ASC) VISIBLE,
  INDEX `fk_user_to_classification_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`communicability` (
  `communicability_id` INT(11) NOT NULL AUTO_INCREMENT,
  `communicability_time` INT(11) NOT NULL,
  `communicability_title` VARCHAR(100) NOT NULL,
  `communicability_reference` TEXT NOT NULL,
  `classification_id` INT(11) NOT NULL,
  PRIMARY KEY (`communicability_id`),
  INDEX `fk_classification_to_communicability_idx` (`classification_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`loan` (
  `loan_id` INT(11) NOT NULL AUTO_INCREMENT,
  `loan_reference` VARCHAR(100) CHARACTER SET 'utf8mb3' NOT NULL,
  `loan_type_id` INT(11) NOT NULL,
  `loan_date` DATE NOT NULL,
  `loan_observation` TEXT NULL DEFAULT NULL,
  `loan_return_prev` DATE NOT NULL,
  `user_id` INT(11) NOT NULL,
  `records_id` INT(11) NOT NULL,
  PRIMARY KEY (`loan_id`),
  INDEX `fk_user_to_loan_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_records_to_loan_idx` (`records_id` ASC) VISIBLE,
  INDEX `fk_loan_type_to_loan_idx` (`loan_type_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`container` (
  `container_id` INT(11) NOT NULL AUTO_INCREMENT,
  `container_title` VARCHAR(30) NOT NULL,
  `container_size` VARCHAR(30) NOT NULL,
  `container_observation` TEXT NOT NULL,
  `container_state` VARCHAR(30) NOT NULL,
  `schelves_id` INT(11) NOT NULL,
  `container_state_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`container_id`, `user_id`),
  INDEX `fk_shelves_to_container_idx` (`schelves_id` ASC) VISIBLE,
  INDEX `fk_container_state_to_container_idx` (`container_state_id` ASC) VISIBLE,
  INDEX `fk_user_to_container_idx` (`user_id` ASC) INVISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`deposit` (
  `deposit_id` INT(11) NOT NULL AUTO_INCREMENT,
  `deposit_reference` VARCHAR(10) NOT NULL,
  `deposit_title` VARCHAR(100) NOT NULL,
  `deposit_observation` TEXT NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`deposit_id`),
  INDEX `fk_user_to_deposit_user_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`keywords` (
  `keyword_id` INT(11) NOT NULL AUTO_INCREMENT,
  `keyword` VARCHAR(250) CHARACTER SET 'utf8mb3' NOT NULL,
  PRIMARY KEY (`keyword_id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`organization` (
  `organization_id` INT(11) NOT NULL AUTO_INCREMENT,
  `organization_code` INT(11) NOT NULL,
  `organization_title` VARCHAR(100) NOT NULL,
  `organization_observation` TEXT NULL DEFAULT NULL,
  `organization_parent` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`organization_id`),
  INDEX `fk_user_to_organization_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`records` (
  `id_records` INT(11) NOT NULL AUTO_INCREMENT,
  `records_title` TEXT NOT NULL,
  `records_date_start` DATE NOT NULL,
  `records_date_end` DATE NULL DEFAULT NULL,
  `records_observation` TEXT NULL DEFAULT NULL,
  `records_links_id` INT(11) NULL DEFAULT NULL,
  `container_id` INT(11) NULL DEFAULT NULL,
  `records_status_id` INT(11) NULL DEFAULT NULL,
  `records_support_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_records`),
  INDEX `fk_records_links_to_records_idx` (`records_links_id` ASC) VISIBLE,
  INDEX `fk_records_container_to_records_idx` (`container_id` ASC) VISIBLE,
  INDEX `fk_records_status_to_records_idx` (`records_status_id` ASC) VISIBLE,
  INDEX `fk_records_support_to_records_idx` (`records_support_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`retention` (
  `retention_id` INT(11) NOT NULL AUTO_INCREMENT,
  `retention_duration` INT(11) NOT NULL,
  `retention_sort` INT(11) NOT NULL,
  `retention_reference` TEXT NOT NULL,
  `retention_sort_id` INT(11) NOT NULL,
  PRIMARY KEY (`retention_id`),
  INDEX `fk_retention_sort_to_retention_idx` (`retention_sort_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`shelves` (
  `schelves_id` INT(11) NOT NULL AUTO_INCREMENT,
  `schelves_title` VARCHAR(250) NOT NULL,
  `schelves_ear` VARCHAR(100) NOT NULL,
  `schelves_colonne` VARCHAR(100) NOT NULL,
  `schelves_table` VARCHAR(100) NOT NULL,
  `deposit_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`schelves_id`),
  INDEX `fk_deposit_to_schelves_idx` (`deposit_id` ASC) VISIBLE,
  INDEX `fk_user_to_shelves_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_pseudo` VARCHAR(10) NOT NULL,
  `user_name` VARCHAR(250) NOT NULL,
  `user_surname` VARCHAR(250) NULL DEFAULT NULL,
  `user_password` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`organization_classification` (
  `organization_id` INT(11) NOT NULL,
  `classification_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`organization_id`, `classification_id`),
  INDEX `fk_classification_to_organization_classification_idx` (`classification_id` ASC) VISIBLE,
  INDEX `fk_organization_to_organization_classification_idx` (`organization_id` ASC) VISIBLE,
  INDEX `fk_user_to_organization_classification_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`user_classification` (
  `user_id` INT(11) NOT NULL,
  `classification_id` INT(11) NOT NULL,
  PRIMARY KEY (`user_id`, `classification_id`),
  INDEX `fk_classification_to_user_idx` (`classification_id` ASC) VISIBLE,
  INDEX `fk_user_to_classification_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`retention_classification` (
  `retention_id` INT(11) NOT NULL,
  `classification_id` INT(11) NOT NULL,
  PRIMARY KEY (`retention_id`, `classification_id`),
  INDEX `fk_classification_to_retention_classification_idx` (`classification_id` ASC) VISIBLE,
  INDEX `fk_retention_to_retention_classification_idx` (`retention_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`dolly_records` (
  `basket_id` INT(11) NOT NULL,
  `records_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`basket_id`, `records_id`),
  INDEX `fk_records_to_dolly_records_idx` (`records_id` ASC) VISIBLE,
  INDEX `fk_basket_to_dolly_records_idx` (`basket_id` ASC) VISIBLE,
  INDEX `fk_user_to_dolly_records_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`records_link` (
  `records_link_id` INT(11) NOT NULL AUTO_INCREMENT,
  `records_id` INT(11) NOT NULL,
  `records_link_parent_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`records_link_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`container_state` (
  `container_state_id` INT(11) NOT NULL AUTO_INCREMENT,
  `container_state_type` VARCHAR(30) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`container_state_id`),
  INDEX `fk_user_to_container_state_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_container_state_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dbms`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`records_keywords` (
  `records_id` INT(11) NOT NULL,
  `keyword_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`records_id`, `keyword_id`, `user_id`),
  INDEX `fk_keywords_to_records_idx` (`keyword_id` ASC) VISIBLE,
  INDEX `fk_records_to_keywords_idx` (`records_id` ASC) VISIBLE,
  INDEX `fk_user_to_keywords_idx` (`user_id` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`records_status` (
  `records_status_id` INT(11) NOT NULL,
  `records_status_title` VARCHAR(100) NOT NULL,
  `records_status_observation` TEXT(250) NULL DEFAULT NULL,
  PRIMARY KEY (`records_status_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`loan_return` (
  `loan_return_id` INT(11) NOT NULL,
  `loan_return_date` DATE NOT NULL,
  `records_id` INT(11) NOT NULL,
  PRIMARY KEY (`loan_return_id`),
  INDEX `fk_records_loan_return_idx` (`records_id` ASC) VISIBLE,
  CONSTRAINT `fk_loan_return_records1`
    FOREIGN KEY (`records_id`)
    REFERENCES `dbms`.`records` (`id_records`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`records_support` (
  `records_support_id` INT(11) NOT NULL,
  `records_support_title` VARCHAR(100) NOT NULL,
  `records_support_observation` TEXT(250) NULL DEFAULT NULL,
  PRIMARY KEY (`records_support_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`loan_type` (
  `loan_type_id` INT(11) NOT NULL,
  `loan_type_title` VARCHAR(30) NOT NULL,
  `loan_type_observation` TEXT(250) NULL DEFAULT NULL,
  PRIMARY KEY (`loan_type_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `dbms`.`retention_sort` (
  `retention_sort_id` INT(11) NOT NULL,
  `retention_sort_code` VARCHAR(10) NOT NULL,
  `retention_sort_title` VARCHAR(30) NOT NULL,
  `retention_sort_comment` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`retention_sort_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
