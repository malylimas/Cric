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
  `Municipio_Id` INT NULL,
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


-- -----------------------------------------------------
-- Table `Cric1`.`Cuenta _Ingreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Cuenta _Ingreso` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Cuenta _Ingreso` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL,
  `Id_Sub_Cuenta` INT NULL,
  `Cuenta _Ingreso_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Cuenta _Ingreso_Cuenta _Ingreso1_idx` (`Cuenta _Ingreso_Id` ASC),
  CONSTRAINT `fk_Cuenta _Ingreso_Cuenta _Ingreso1`
    FOREIGN KEY (`Cuenta _Ingreso_Id`)
    REFERENCES `Cric1`.`Cuenta _Ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Ingreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Ingreso` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Ingreso` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Id_Citas_Ingreso` INT NULL,
  `Nombre` VARCHAR(30) NULL,
  `Fecha` VARCHAR(20) NULL,
  `Cuenta _Ingreso_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Ingreso_Cuenta _Ingreso1_idx` (`Cuenta _Ingreso_Id` ASC),
  CONSTRAINT `fk_Ingreso_Cuenta _Ingreso1`
    FOREIGN KEY (`Cuenta _Ingreso_Id`)
    REFERENCES `Cric1`.`Cuenta _Ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Cuenta_Egreso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Cuenta_Egreso` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Cuenta_Egreso` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL,
  `Id_sub_Cuentas` INT NULL,
  `Cuenta_Egreso_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Cuenta_Egreso_Cuenta_Egreso1_idx` (`Cuenta_Egreso_Id` ASC),
  CONSTRAINT `fk_Cuenta_Egreso_Cuenta_Egreso1`
    FOREIGN KEY (`Cuenta_Egreso_Id`)
    REFERENCES `Cric1`.`Cuenta_Egreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Egresos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Egresos` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Egresos` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Fecha` VARCHAR(20) NULL,
  `Cuenta_Egreso_Id` INT NOT NULL,
  `valor` DECIMAL(8,2) NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Egresos_Cuenta_Egreso1_idx` (`Cuenta_Egreso_Id` ASC),
  CONSTRAINT `fk_Egresos_Cuenta_Egreso1`
    FOREIGN KEY (`Cuenta_Egreso_Id`)
    REFERENCES `Cric1`.`Cuenta_Egreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Cuenta_Banco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Cuenta_Banco` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Cuenta_Banco` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Cuenta` VARCHAR(50) NULL,
  `Descripcion` VARCHAR(150) NULL,
  `Nombre_Banco` VARCHAR(45) NULL,
  `Fecha_Apertura` DATETIME NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Control_Cheque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Control_Cheque` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Control_Cheque` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Cheque` INT NULL,
  `Nombre_Beneficiario` VARCHAR(30) NULL,
  `Concepto` VARCHAR(30) NULL,
  `Valor` VARCHAR(20) NULL,
  `Fecha_Emision` VARCHAR(15) NULL,
  `Id_Cuenta_Banco` INT NULL,
  `Egresos_Id` INT NOT NULL,
  `Cuenta_Banco_Id` INT NOT NULL,
  PRIMARY KEY (`Id`, `Egresos_Id`),
  INDEX `fk_Control_Cheque_Egresos1_idx` (`Egresos_Id` ASC),
  INDEX `fk_Control_Cheque_Cuenta_Banco1_idx` (`Cuenta_Banco_Id` ASC),
  CONSTRAINT `fk_Control_Cheque_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `Cric1`.`Egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Control_Cheque_Cuenta_Banco1`
    FOREIGN KEY (`Cuenta_Banco_Id`)
    REFERENCES `Cric1`.`Cuenta_Banco` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Control_Depositos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Control_Depositos` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Control_Depositos` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Deposito` VARCHAR(20) NULL,
  `Concepto_Deposito` VARCHAR(45) NULL,
  `Fecha_Deposito` VARCHAR(30) NULL,
  `Valor_Deposito` DECIMAL(8,2) NULL,
  `Cuenta_Banco_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Control_Depositos_Cuenta_Banco1_idx` (`Cuenta_Banco_Id` ASC),
  CONSTRAINT `fk_Control_Depositos_Cuenta_Banco1`
    FOREIGN KEY (`Cuenta_Banco_Id`)
    REFERENCES `Cric1`.`Cuenta_Banco` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Control_CajaChica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Control_CajaChica` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Control_CajaChica` (
  `Id` INT NOT NULL,
  `Id_Cuenta_Ingreso` INT NULL,
  `Id_Cuenta_Egreso` INT NULL,
  `Detalle` VARCHAR(20) NULL,
  `Valor` VARCHAR(20) NULL,
  `Ingreso_Id` INT NOT NULL,
  `Egresos_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Control_CajaChica_Ingreso1_idx` (`Ingreso_Id` ASC),
  INDEX `fk_Control_CajaChica_Egresos1_idx` (`Egresos_Id` ASC),
  CONSTRAINT `fk_Control_CajaChica_Ingreso1`
    FOREIGN KEY (`Ingreso_Id`)
    REFERENCES `Cric1`.`Ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Control_CajaChica_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `Cric1`.`Egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Facturacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Facturacion` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Facturacion` (
  `Id_Facturacion` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL,
  `Fecha` VARCHAR(10) NULL,
  `Valor` VARCHAR(45) NULL,
  PRIMARY KEY (`Id_Facturacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Caja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Caja` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Caja` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Id_Facturacion` INT NULL,
  `Id_Ingreso` INT NULL,
  `Id_Egreso` INT NULL,
  `Facturacion_Id_Facturacion` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Caja_Facturacion1_idx` (`Facturacion_Id_Facturacion` ASC),
  CONSTRAINT `fk_Caja_Facturacion1`
    FOREIGN KEY (`Facturacion_Id_Facturacion`)
    REFERENCES `Cric1`.`Facturacion` (`Id_Facturacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Donante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Donante` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Donante` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Fecha` VARCHAR(30) NULL,
  `Cuota` VARCHAR(45) NULL,
  `Nombre` VARCHAR(30) NULL,
  `Id_Ingreso` VARCHAR(45) NULL,
  `Ingreso_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Donante_Ingreso1_idx` (`Ingreso_Id` ASC),
  CONSTRAINT `fk_Donante_Ingreso1`
    FOREIGN KEY (`Ingreso_Id`)
    REFERENCES `Cric1`.`Ingreso` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Pago_Provedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Pago_Provedores` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Pago_Provedores` (
  `Id` INT NOT NULL,
  `Fecha` DATETIME NULL,
  `Cantidad` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Marca` VARCHAR(45) NULL,
  `N_Parte` VARCHAR(45) NULL,
  `Observacion` VARCHAR(45) NULL,
  `Precio_Unitario` VARCHAR(45) NULL,
  `Egresos_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Pago_Provedores_Egresos1_idx` (`Egresos_Id` ASC),
  CONSTRAINT `fk_Pago_Provedores_Egresos1`
    FOREIGN KEY (`Egresos_Id`)
    REFERENCES `Cric1`.`Egresos` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Proveedores` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Proveedores` (
  `Id` INT NOT NULL,
  `Nombre` VARCHAR(30) NULL,
  `Telefono` VARCHAR(30) NULL,
  `Marca` VARCHAR(30) NULL,
  `Precio_Unitario` VARCHAR(30) NULL,
  `Observacion` VARCHAR(45) NULL,
  `Pago_Provedores_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Proveedores_Pago_Provedores1_idx` (`Pago_Provedores_Id` ASC),
  CONSTRAINT `fk_Proveedores_Pago_Provedores1`
    FOREIGN KEY (`Pago_Provedores_Id`)
    REFERENCES `Cric1`.`Pago_Provedores` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Asignaturas` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Asignaturas` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Horarios` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Horarios` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Secciones_Id` INT NOT NULL,
  `Asignaturas_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Horarios_Secciones1_idx` (`Secciones_Id` ASC),
  INDEX `fk_Horarios_Asignaturas1_idx` (`Asignaturas_Id` ASC),
  CONSTRAINT `fk_Horarios_Secciones1`
    FOREIGN KEY (`Secciones_Id`)
    REFERENCES `Cric1`.`Secciones` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Horarios_Asignaturas1`
    FOREIGN KEY (`Asignaturas_Id`)
    REFERENCES `Cric1`.`Asignaturas` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Profesores` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Profesores` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Horarios_Id` INT NOT NULL,
  `Nombre` VARCHAR(40) NULL,
  `Telefono` VARCHAR(30) NULL,
  `Direccion` VARCHAR(30) NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Profesores_Horarios1_idx` (`Horarios_Id` ASC),
  CONSTRAINT `fk_Profesores_Horarios1`
    FOREIGN KEY (`Horarios_Id`)
    REFERENCES `Cric1`.`Horarios` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Secciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Secciones` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Secciones` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Id_Grado` INT NULL,
  `Profesores_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Secciones_Profesores1_idx` (`Profesores_Id` ASC),
  CONSTRAINT `fk_Secciones_Profesores1`
    FOREIGN KEY (`Profesores_Id`)
    REFERENCES `Cric1`.`Profesores` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Encargado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Encargado` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Encargado` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NULL,
  `Sexo` VARCHAR(15) NULL,
  `Telefono` DATE NULL,
  `Direccion` VARCHAR(40) NULL,
  `Fecha_Nacimiento` DATE NULL,
  `Parentesco` VARCHAR(30) NULL,
  `Domicilio` VARCHAR(30) NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Alumno` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Alumno` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Telefono` VARCHAR(30) NULL,
  `Direccion` VARCHAR(30) NULL,
  `Sexo` VARCHAR(15) NULL,
  `Encargado_Id` INT NOT NULL,
  `Edad` INT NULL,
  `Condicion_Ingreso` VARCHAR(20) NULL,
  `Fecha_Nacimiento` DATETIME NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Alumno_Encargado1_idx` (`Encargado_Id` ASC),
  CONSTRAINT `fk_Alumno_Encargado1`
    FOREIGN KEY (`Encargado_Id`)
    REFERENCES `Cric1`.`Encargado` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Matricula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Matricula` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Matricula` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Alumno_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Matricula_Alumno1_idx` (`Alumno_Id` ASC),
  CONSTRAINT `fk_Matricula_Alumno1`
    FOREIGN KEY (`Alumno_Id`)
    REFERENCES `Cric1`.`Alumno` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cric1`.`Grados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cric1`.`Grados` ;

CREATE TABLE IF NOT EXISTS `Cric1`.`Grados` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Secciones_Id` INT NOT NULL,
  `Matricula_Id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Grados_Secciones1_idx` (`Secciones_Id` ASC),
  INDEX `fk_Grados_Matricula1_idx` (`Matricula_Id` ASC),
  CONSTRAINT `fk_Grados_Secciones1`
    FOREIGN KEY (`Secciones_Id`)
    REFERENCES `Cric1`.`Secciones` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grados_Matricula1`
    FOREIGN KEY (`Matricula_Id`)
    REFERENCES `Cric1`.`Matricula` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
