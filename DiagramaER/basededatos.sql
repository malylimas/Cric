-- MySQL Script generated by MySQL Workbench
-- 02/10/17 15:16:52
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Cric1
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Cric1` ;

-- -----------------------------------------------------
-- Schema Cric1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Cric1` DEFAULT CHARACTER SET utf8 ;
USE `Cric1` ;

-- -----------------------------------------------------
-- Table `Cric1`.`Departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Departamento` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Departamento` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Paciente` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Paciente` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(25) NOT NULL,
  `Lugar` VARCHAR(30) NOT NULL,
  `Fecha_Nacimiento` VARCHAR(20) NOT NULL,
  `Edad` VARCHAR(20) NOT NULL,
  `Nivel_Educativo` VARCHAR(20) NOT NULL,
  `Direccion_Actual` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(20) NOT NULL,
  `Ocupacion` VARCHAR(30) NOT NULL,
  `Municipio` VARCHAR(45) NULL,
  `Departamento` VARCHAR(45) NULL,
  `Departamento_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Paciente_Departamento1_idx` (`Departamento_Id` ASC),
  CONSTRAINT `fk_Paciente_Departamento1`
    FOREIGN KEY (`Departamento_Id`)
    REFERENCES `Cric1`.`Departamento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Terapista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Terapista` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Terapista` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Terapista` VARCHAR(40) NULL,
  `Telefono` VARCHAR(20) NULL,
  `Direccion` VARCHAR(45) NULL,
  `Nombre_Terapia` VARCHAR(45) NULL,
  `Precio_Terapia` VARCHAR(45) NULL,
  `Id_Paciente` INT NULL,
  `Id_Tratamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Tipo_Terapia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Tipo_Terapia` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Tipo_Terapia` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(25) NULL,
  `Id_cita` INT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Cita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Cita` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Cita` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Hora` VARCHAR(15) NOT NULL,
  `Fecha` VARCHAR(15) NOT NULL,
  `Dia` VARCHAR(15) NOT NULL,
  `Terapista` VARCHAR(45) NOT NULL,
  `Paciente_Id` INT NOT NULL,
  `Terapista_Id` INT NOT NULL,
  `Tipo_Terapista_Id` INT NOT NULL,
  PRIMARY KEY (`Id`, `Paciente_Id`),
  INDEX `fk_Cita_Paciente_idx` (`Paciente_Id` ASC),
  INDEX `fk_Cita_Terapia1_idx` (`Terapista_Id` ASC),
  INDEX `fk_Cita_Tipo_Terapista1_idx` (`Tipo_Terapista_Id` ASC),
  CONSTRAINT `fk_Cita_Paciente`
    FOREIGN KEY (`Paciente_Id`)
    REFERENCES `Cric1`.`Paciente` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Terapia1`
    FOREIGN KEY (`Terapista_Id`)
    REFERENCES `Cric1`.`Terapista` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Tipo_Terapista1`
    FOREIGN KEY (`Tipo_Terapista_Id`)
    REFERENCES `Cric1`.`Tipo_Terapia` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Historia_Clinica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Historia_Clinica` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Historia_Clinica` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Area_Atencion` VARCHAR(30) NULL,
  `Fecha_Ingreso` VARCHAR(45) NULL,
  `N_Expediente` VARCHAR(20) NULL,
  `Persona_Responsable` VARCHAR(30) NULL,
  `Referido` VARCHAR(25) NULL,
  `Fecha_EvaluacionInicial` VARCHAR(20) NULL,
  `Causa_Problema` VARCHAR(30) NULL,
  `Evaluacion` VARCHAR(45) NULL,
  `Fecha` VARCHAR(15) NULL,
  `Id_Tratamiento` INT NULL,
  `Id_Paceinte` INT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Tratamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Tratamiento` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Tratamiento` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Id_HistoriaClinica` INT NULL,
  `Fecha_Inicio` VARCHAR(45) NULL,
  `Fecha_Alta` VARCHAR(45) NULL,
  `Id_Cita` VARCHAR(45) NULL,
  `Id_Terapista` VARCHAR(45) NULL,
  `Historia_Clinica_Id` INT NOT NULL,
  `Cita_Id` INT NOT NULL,
  `Cita_Paciente_Id` INT NOT NULL,
  `Terapista_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Tratamiento_Historia_Clinica1_idx` (`Historia_Clinica_Id` ASC),
  INDEX `fk_Tratamiento_Cita1_idx` (`Cita_Id` ASC, `Cita_Paciente_Id` ASC),
  INDEX `fk_Tratamiento_Terapista1_idx` (`Terapista_Id` ASC),
  CONSTRAINT `fk_Tratamiento_Historia_Clinica1`
    FOREIGN KEY (`Historia_Clinica_Id`)
    REFERENCES `Cric1`.`Historia_Clinica` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tratamiento_Cita1`
    FOREIGN KEY (`Cita_Id` , `Cita_Paciente_Id`)
    REFERENCES `Cric1`.`Cita` (`Id` , `Paciente_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tratamiento_Terapista1`
    FOREIGN KEY (`Terapista_Id`)
    REFERENCES `Cric1`.`Terapista` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Patologia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Patologia` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Patologia` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Patologia` VARCHAR(45) NULL,
  `Id_Tratamiento` VARCHAR(45) NULL,
  `Tratamiento_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Patologia_Tratamiento1_idx` (`Tratamiento_Id` ASC),
  CONSTRAINT `fk_Patologia_Tratamiento1`
    FOREIGN KEY (`Tratamiento_Id`)
    REFERENCES `Cric1`.`Tratamiento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Municipio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Municipio` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Municipio` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Departamento_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Municipio_Departamento1_idx` (`Departamento_Id` ASC),
  CONSTRAINT `fk_Municipio_Departamento1`
    FOREIGN KEY (`Departamento_Id`)
    REFERENCES `Cric1`.`Departamento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
