-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cric1
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cric1` ;

-- -----------------------------------------------------
-- Schema cric1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cric1` DEFAULT CHARACTER SET utf8 ;
USE `cric1` ;

-- -----------------------------------------------------
-- Table `cric1`.`encargado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`encargado` ;

CREATE TABLE IF NOT EXISTS `cric1`.`encargado` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Sexo` VARCHAR(15) NULL DEFAULT NULL,
  `Telefono` DATE NULL DEFAULT NULL,
  `Direccion` VARCHAR(40) NULL DEFAULT NULL,
  `Fecha_Nacimiento` DATE NULL DEFAULT NULL,
  `Parentesco` VARCHAR(30) NULL DEFAULT NULL,
  `Domicilio` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`alumno` ;

CREATE TABLE IF NOT EXISTS `cric1`.`alumno` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Telefono` VARCHAR(30) NULL DEFAULT NULL,
  `Direccion` VARCHAR(30) NULL DEFAULT NULL,
  `Sexo` VARCHAR(15) NULL DEFAULT NULL,
  `Encargado_Id` INT(11) NOT NULL,
  `Edad` INT(11) NULL DEFAULT NULL,
  `Condicion_Ingreso` VARCHAR(20) NULL DEFAULT NULL,
  `Fecha_Nacimiento` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Alumno_Encargado1_idx` (`Encargado_Id` ASC),
  CONSTRAINT `fk_Alumno_Encargado1`
    FOREIGN KEY (`Encargado_Id`)
    REFERENCES `cric1`.`encargado` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`asignaturas` ;

CREATE TABLE IF NOT EXISTS `cric1`.`asignaturas` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`facturacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`facturacion` ;

CREATE TABLE IF NOT EXISTS `cric1`.`facturacion` (
  `Id_Facturacion` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Fecha` VARCHAR(10) NULL DEFAULT NULL,
  `Valor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Id_Facturacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`caja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`caja` ;

CREATE TABLE IF NOT EXISTS `cric1`.`caja` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Id_Facturacion` INT(11) NULL DEFAULT NULL,
  `Id_Ingreso` INT(11) NULL DEFAULT NULL,
  `Id_Egreso` INT(11) NULL DEFAULT NULL,
  `Facturacion_Id_Facturacion` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Caja_Facturacion1_idx` (`Facturacion_Id_Facturacion` ASC),
  CONSTRAINT `fk_Caja_Facturacion1`
    FOREIGN KEY (`Facturacion_Id_Facturacion`)
    REFERENCES `cric1`.`facturacion` (`Id_Facturacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`departamento` ;

CREATE TABLE IF NOT EXISTS `cric1`.`departamento` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`paciente` ;

CREATE TABLE IF NOT EXISTS `cric1`.`paciente` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(25) NOT NULL,
  `Lugar` VARCHAR(30) NOT NULL,
  `Fecha_Nacimiento` VARCHAR(20) NOT NULL,
  `Edad` VARCHAR(20) NOT NULL,
  `Nivel_Educativo` VARCHAR(20) NOT NULL,
  `Direccion_Actual` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(20) NOT NULL,
  `Ocupacion` VARCHAR(30) NOT NULL,
  `Municipio_Id` INT(11) NULL DEFAULT NULL,
  `Departamento_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Paciente_Departamento1_idx` (`Departamento_Id` ASC),
  CONSTRAINT `fk_Paciente_Departamento1`
    FOREIGN KEY (`Departamento_Id`)
    REFERENCES `cric1`.`departamento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`terapista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`terapista` ;

CREATE TABLE IF NOT EXISTS `cric1`.`terapista` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Terapista` VARCHAR(40) NULL DEFAULT NULL,
  `Telefono` VARCHAR(20) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Nombre_Terapia` VARCHAR(45) NULL DEFAULT NULL,
  `Precio_Terapia` VARCHAR(45) NULL DEFAULT NULL,
  `Id_Paciente` INT(11) NULL DEFAULT NULL,
  `Id_Tratamiento` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`tipo_terapia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`tipo_terapia` ;

CREATE TABLE IF NOT EXISTS `cric1`.`tipo_terapia` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(25) NULL DEFAULT NULL,
  `Id_cita` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`cita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`cita` ;

CREATE TABLE IF NOT EXISTS `cric1`.`cita` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Hora` VARCHAR(15) NOT NULL,
  `Fecha` VARCHAR(15) NOT NULL,
  `Dia` VARCHAR(15) NOT NULL,
  `Terapista` VARCHAR(45) NOT NULL,
  `Paciente_Id` INT(11) NOT NULL,
  `Terapista_Id` INT(11) NOT NULL,
  `Tipo_Terapista_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`, `Paciente_Id`),
  INDEX `fk_Cita_Paciente_idx` (`Paciente_Id` ASC),
  INDEX `fk_Cita_Terapia1_idx` (`Terapista_Id` ASC),
  INDEX `fk_Cita_Tipo_Terapista1_idx` (`Tipo_Terapista_Id` ASC),
  CONSTRAINT `fk_Cita_Paciente`
    FOREIGN KEY (`Paciente_Id`)
    REFERENCES `cric1`.`paciente` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Terapia1`
    FOREIGN KEY (`Terapista_Id`)
    REFERENCES `cric1`.`terapista` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Tipo_Terapista1`
    FOREIGN KEY (`Tipo_Terapista_Id`)
    REFERENCES `cric1`.`tipo_terapia` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`cuenta_egreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`cuenta_egreso` ;

CREATE TABLE IF NOT EXISTS `cric1`.`cuenta_egreso` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Id_sub_Cuentas` INT(11) NULL DEFAULT NULL,
  `Cuenta_Egreso_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Cuenta_Egreso_Cuenta_Egreso1_idx` (`Cuenta_Egreso_Id` ASC),
  CONSTRAINT `fk_Cuenta_Egreso_Cuenta_Egreso1`
    FOREIGN KEY (`Cuenta_Egreso_Id`)
    REFERENCES `cric1`.`cuenta_egreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`egresos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`egresos` ;

CREATE TABLE IF NOT EXISTS `cric1`.`egresos` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha` VARCHAR(20) NULL DEFAULT NULL,
  `Cuenta_Egreso_Id` INT(11) NOT NULL,
  `valor` DECIMAL(8,2) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Egresos_Cuenta_Egreso1_idx` (`Cuenta_Egreso_Id` ASC),
  CONSTRAINT `fk_Egresos_Cuenta_Egreso1`
    FOREIGN KEY (`Cuenta_Egreso_Id`)
    REFERENCES `cric1`.`cuenta_egreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`cuenta _ingreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`cuenta _ingreso` ;

CREATE TABLE IF NOT EXISTS `cric1`.`cuenta _ingreso` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Id_Sub_Cuenta` INT(11) NULL DEFAULT NULL,
  `Cuenta _Ingreso_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Cuenta _Ingreso_Cuenta _Ingreso1_idx` (`Cuenta _Ingreso_Id` ASC),
  CONSTRAINT `fk_Cuenta _Ingreso_Cuenta _Ingreso1`
    FOREIGN KEY (`Cuenta _Ingreso_Id`)
    REFERENCES `cric1`.`cuenta _ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`ingreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`ingreso` ;

CREATE TABLE IF NOT EXISTS `cric1`.`ingreso` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Id_Citas_Ingreso` INT(11) NULL DEFAULT NULL,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Fecha` VARCHAR(20) NULL DEFAULT NULL,
  `Cuenta _Ingreso_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Ingreso_Cuenta _Ingreso1_idx` (`Cuenta _Ingreso_Id` ASC),
  CONSTRAINT `fk_Ingreso_Cuenta _Ingreso1`
    FOREIGN KEY (`Cuenta _Ingreso_Id`)
    REFERENCES `cric1`.`cuenta _ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`control_cajachica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`control_cajachica` ;

CREATE TABLE IF NOT EXISTS `cric1`.`control_cajachica` (
  `Id` INT(11) NOT NULL,
  `Id_Cuenta_Ingreso` INT(11) NULL DEFAULT NULL,
  `Id_Cuenta_Egreso` INT(11) NULL DEFAULT NULL,
  `Detalle` VARCHAR(20) NULL DEFAULT NULL,
  `Valor` VARCHAR(20) NULL DEFAULT NULL,
  `Ingreso_Id` INT(11) NOT NULL,
  `Egresos_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Control_CajaChica_Ingreso1_idx` (`Ingreso_Id` ASC),
  INDEX `fk_Control_CajaChica_Egresos1_idx` (`Egresos_Id` ASC),
  CONSTRAINT `fk_Control_CajaChica_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `cric1`.`egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Control_CajaChica_Ingreso1`
    FOREIGN KEY (`Ingreso_Id`)
    REFERENCES `cric1`.`ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`cuenta_banco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`cuenta_banco` ;

CREATE TABLE IF NOT EXISTS `cric1`.`cuenta_banco` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cuenta` VARCHAR(50) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(150) NULL DEFAULT NULL,
  `Nombre_Banco` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha_Apertura` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`control_cheque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`control_cheque` ;

CREATE TABLE IF NOT EXISTS `cric1`.`control_cheque` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cheque` INT(11) NULL DEFAULT NULL,
  `Nombre_Beneficiario` VARCHAR(30) NULL DEFAULT NULL,
  `Concepto` VARCHAR(30) NULL DEFAULT NULL,
  `Valor` VARCHAR(20) NULL DEFAULT NULL,
  `Fecha_Emision` VARCHAR(15) NULL DEFAULT NULL,
  `Id_Cuenta_Banco` INT(11) NULL DEFAULT NULL,
  `Egresos_Id` INT(11) NOT NULL,
  `Cuenta_Banco_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`, `Egresos_Id`),
  INDEX `fk_Control_Cheque_Egresos1_idx` (`Egresos_Id` ASC),
  INDEX `fk_Control_Cheque_Cuenta_Banco1_idx` (`Cuenta_Banco_Id` ASC),
  CONSTRAINT `fk_Control_Cheque_Cuenta_Banco1`
    FOREIGN KEY (`Cuenta_Banco_Id`)
    REFERENCES `cric1`.`cuenta_banco` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Control_Cheque_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `cric1`.`egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`control_depositos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`control_depositos` ;

CREATE TABLE IF NOT EXISTS `cric1`.`control_depositos` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Deposito` VARCHAR(20) NULL DEFAULT NULL,
  `Concepto_Deposito` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha_Deposito` VARCHAR(30) NULL DEFAULT NULL,
  `Valor_Deposito` DECIMAL(8,2) NULL DEFAULT NULL,
  `Cuenta_Banco_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Control_Depositos_Cuenta_Banco1_idx` (`Cuenta_Banco_Id` ASC),
  CONSTRAINT `fk_Control_Depositos_Cuenta_Banco1`
    FOREIGN KEY (`Cuenta_Banco_Id`)
    REFERENCES `cric1`.`cuenta_banco` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`donante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`donante` ;

CREATE TABLE IF NOT EXISTS `cric1`.`donante` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha` VARCHAR(30) NULL DEFAULT NULL,
  `Cuota` VARCHAR(45) NULL DEFAULT NULL,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Id_Ingreso` VARCHAR(45) NULL DEFAULT NULL,
  `Ingreso_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Donante_Ingreso1_idx` (`Ingreso_Id` ASC),
  CONSTRAINT `fk_Donante_Ingreso1`
    FOREIGN KEY (`Ingreso_Id`)
    REFERENCES `cric1`.`ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`matricula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`matricula` ;

CREATE TABLE IF NOT EXISTS `cric1`.`matricula` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Alumno_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Matricula_Alumno1_idx` (`Alumno_Id` ASC),
  CONSTRAINT `fk_Matricula_Alumno1`
    FOREIGN KEY (`Alumno_Id`)
    REFERENCES `cric1`.`alumno` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`horarios` ;

CREATE TABLE IF NOT EXISTS `cric1`.`horarios` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Secciones_Id` INT(11) NOT NULL,
  `Asignaturas_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Horarios_Secciones1_idx` (`Secciones_Id` ASC),
  INDEX `fk_Horarios_Asignaturas1_idx` (`Asignaturas_Id` ASC),
  CONSTRAINT `fk_Horarios_Asignaturas1`
    FOREIGN KEY (`Asignaturas_Id`)
    REFERENCES `cric1`.`asignaturas` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Horarios_Secciones1`
    FOREIGN KEY (`Secciones_Id`)
    REFERENCES `cric1`.`secciones` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`profesores` ;

CREATE TABLE IF NOT EXISTS `cric1`.`profesores` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Horarios_Id` INT(11) NOT NULL,
  `Nombre` VARCHAR(40) NULL DEFAULT NULL,
  `Telefono` VARCHAR(30) NULL DEFAULT NULL,
  `Direccion` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Profesores_Horarios1_idx` (`Horarios_Id` ASC),
  CONSTRAINT `fk_Profesores_Horarios1`
    FOREIGN KEY (`Horarios_Id`)
    REFERENCES `cric1`.`horarios` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`secciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`secciones` ;

CREATE TABLE IF NOT EXISTS `cric1`.`secciones` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Id_Grado` INT(11) NULL DEFAULT NULL,
  `Profesores_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Secciones_Profesores1_idx` (`Profesores_Id` ASC),
  CONSTRAINT `fk_Secciones_Profesores1`
    FOREIGN KEY (`Profesores_Id`)
    REFERENCES `cric1`.`profesores` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`grados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`grados` ;

CREATE TABLE IF NOT EXISTS `cric1`.`grados` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Secciones_Id` INT(11) NOT NULL,
  `Matricula_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Grados_Secciones1_idx` (`Secciones_Id` ASC),
  INDEX `fk_Grados_Matricula1_idx` (`Matricula_Id` ASC),
  CONSTRAINT `fk_Grados_Matricula1`
    FOREIGN KEY (`Matricula_Id`)
    REFERENCES `cric1`.`matricula` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grados_Secciones1`
    FOREIGN KEY (`Secciones_Id`)
    REFERENCES `cric1`.`secciones` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`historia_clinica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`historia_clinica` ;

CREATE TABLE IF NOT EXISTS `cric1`.`historia_clinica` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Area_Atencion` VARCHAR(30) NULL DEFAULT NULL,
  `Fecha_Ingreso` VARCHAR(45) NULL DEFAULT NULL,
  `N_Expediente` VARCHAR(20) NULL DEFAULT NULL,
  `Persona_Responsable` VARCHAR(30) NULL DEFAULT NULL,
  `Referido` VARCHAR(25) NULL DEFAULT NULL,
  `Fecha_EvaluacionInicial` VARCHAR(20) NULL DEFAULT NULL,
  `Causa_Problema` VARCHAR(30) NULL DEFAULT NULL,
  `Evaluacion` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` VARCHAR(15) NULL DEFAULT NULL,
  `Id_Tratamiento` INT(11) NULL DEFAULT NULL,
  `Id_Paceinte` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`municipio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`municipio` ;

CREATE TABLE IF NOT EXISTS `cric1`.`municipio` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Departamento_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Municipio_Departamento1_idx` (`Departamento_Id` ASC),
  CONSTRAINT `fk_Municipio_Departamento1`
    FOREIGN KEY (`Departamento_Id`)
    REFERENCES `cric1`.`departamento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`pago_provedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`pago_provedores` ;

CREATE TABLE IF NOT EXISTS `cric1`.`pago_provedores` (
  `Id` INT(11) NOT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `Cantidad` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `Marca` VARCHAR(45) NULL DEFAULT NULL,
  `N_Parte` VARCHAR(45) NULL DEFAULT NULL,
  `Observacion` VARCHAR(45) NULL DEFAULT NULL,
  `Precio_Unitario` VARCHAR(45) NULL DEFAULT NULL,
  `Egresos_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Pago_Provedores_Egresos1_idx` (`Egresos_Id` ASC),
  CONSTRAINT `fk_Pago_Provedores_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `cric1`.`egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`tratamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`tratamiento` ;

CREATE TABLE IF NOT EXISTS `cric1`.`tratamiento` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Id_HistoriaClinica` INT(11) NULL DEFAULT NULL,
  `Fecha_Inicio` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha_Alta` VARCHAR(45) NULL DEFAULT NULL,
  `Id_Cita` VARCHAR(45) NULL DEFAULT NULL,
  `Id_Terapista` VARCHAR(45) NULL DEFAULT NULL,
  `Historia_Clinica_Id` INT(11) NOT NULL,
  `Cita_Id` INT(11) NOT NULL,
  `Cita_Paciente_Id` INT(11) NOT NULL,
  `Terapista_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Tratamiento_Historia_Clinica1_idx` (`Historia_Clinica_Id` ASC),
  INDEX `fk_Tratamiento_Cita1_idx` (`Cita_Id` ASC, `Cita_Paciente_Id` ASC),
  INDEX `fk_Tratamiento_Terapista1_idx` (`Terapista_Id` ASC),
  CONSTRAINT `fk_Tratamiento_Cita1`
    FOREIGN KEY (`Cita_Id` , `Cita_Paciente_Id`)
    REFERENCES `cric1`.`cita` (`Id` , `Paciente_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tratamiento_Historia_Clinica1`
    FOREIGN KEY (`Historia_Clinica_Id`)
    REFERENCES `cric1`.`historia_clinica` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tratamiento_Terapista1`
    FOREIGN KEY (`Terapista_Id`)
    REFERENCES `cric1`.`terapista` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`patologia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`patologia` ;

CREATE TABLE IF NOT EXISTS `cric1`.`patologia` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Patologia` VARCHAR(45) NULL DEFAULT NULL,
  `Id_Tratamiento` VARCHAR(45) NULL DEFAULT NULL,
  `Tratamiento_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Patologia_Tratamiento1_idx` (`Tratamiento_Id` ASC),
  CONSTRAINT `fk_Patologia_Tratamiento1`
    FOREIGN KEY (`Tratamiento_Id`)
    REFERENCES `cric1`.`tratamiento` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`proveedores` ;

CREATE TABLE IF NOT EXISTS `cric1`.`proveedores` (
  `Id` INT(11) NOT NULL,
  `Nombre` VARCHAR(30) NULL DEFAULT NULL,
  `Telefono` VARCHAR(30) NULL DEFAULT NULL,
  `Marca` VARCHAR(30) NULL DEFAULT NULL,
  `Precio_Unitario` VARCHAR(30) NULL DEFAULT NULL,
  `Observacion` VARCHAR(45) NULL DEFAULT NULL,
  `Pago_Provedores_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Proveedores_Pago_Provedores1_idx` (`Pago_Provedores_Id` ASC),
  CONSTRAINT `fk_Proveedores_Pago_Provedores1`
    FOREIGN KEY (`Pago_Provedores_Id`)
    REFERENCES `cric1`.`pago_provedores` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cric1`.`tipo_ingreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cric1`.`tipo_ingreso` ;

CREATE TABLE IF NOT EXISTS `cric1`.`tipo_ingreso` (
  `id_tipo_ingreso` SMALLINT(6) NOT NULL,
  `tipo_ingreso` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_ingreso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
