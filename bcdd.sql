bcdd.sql
  
CREATE DATABASE ava2;
USE ava2;

CREATE TABLE `USUARIO`(
    `ID` INT AUTO_INCREMENT,
	`NOME` VARCHAR(100),
    `NOMEUSUARIO` VARCHAR(100),
    `EMAIL` VARCHAR(100),
    `SENHA` VARCHAR(50), 
    CONSTRAINT PRIMARY KEY(ID)
);