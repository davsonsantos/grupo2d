/*
SQLyog Ultimate v9.31 GA
MySQL - 5.5.8 : Database - bd_admin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bd_admin` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `bd_admin`;

/*Table structure for table `tb_album` */

DROP TABLE IF EXISTS `tb_album`;

CREATE TABLE `tb_album` (
  `alb_id` int(11) NOT NULL AUTO_INCREMENT,
  `alb_nome` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `alb_data` date NOT NULL,
  `usu_id` int(11) NOT NULL,
  `alb_publicado` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`alb_id`),
  KEY `fk_tb_album_tb_usuarios1_idx` (`usu_id`),
  CONSTRAINT `fk_tb_album_tb_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `tb_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_album` */

LOCK TABLES `tb_album` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_foto` */

DROP TABLE IF EXISTS `tb_foto`;

CREATE TABLE `tb_foto` (
  `fot_id` int(11) NOT NULL AUTO_INCREMENT,
  `fot_nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `alb_id` int(11) NOT NULL,
  PRIMARY KEY (`fot_id`),
  KEY `fk_tb_foto_tb_album1_idx` (`alb_id`),
  CONSTRAINT `fk_tb_foto_tb_album1` FOREIGN KEY (`alb_id`) REFERENCES `tb_album` (`alb_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_foto` */

LOCK TABLES `tb_foto` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_modulo` */

DROP TABLE IF EXISTS `tb_modulo`;

CREATE TABLE `tb_modulo` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_descricao` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `mod_ativo` char(1) COLLATE latin1_general_ci NOT NULL,
  `mod_formulario` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `sis_id` int(11) NOT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `fk_tb_modulo_tb_sistema1_idx` (`sis_id`),
  CONSTRAINT `fk_tb_modulo_tb_sistema1` FOREIGN KEY (`sis_id`) REFERENCES `tb_sistema` (`sis_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_modulo` */

LOCK TABLES `tb_modulo` WRITE;

insert  into `tb_modulo`(`mod_id`,`mod_descricao`,`mod_ativo`,`mod_formulario`,`sis_id`) values (1,'Usuários - Lista Galeria Editado','N','galeria/lista',1),(2,'Usuários - Lista de Usuários','S','usuarios/lista',1),(3,'Usuários - Perfil','S','usuarios/perfil',1),(5,'Usuários - Permissão de Acesso','S','permissao/acesso',1),(8,'Permissões - Cadastro de Sistema','S','admin/permissao/sistema',12);

UNLOCK TABLES;

/*Table structure for table `tb_perfil` */

DROP TABLE IF EXISTS `tb_perfil`;

CREATE TABLE `tb_perfil` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_foto` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `per_capa` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_id` int(11) NOT NULL,
  PRIMARY KEY (`per_id`),
  KEY `fk_tb_perfil_tb_usuarios1_idx` (`usu_id`),
  CONSTRAINT `fk_tb_perfil_tb_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `tb_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_perfil` */

LOCK TABLES `tb_perfil` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_permissao` */

DROP TABLE IF EXISTS `tb_permissao`;

CREATE TABLE `tb_permissao` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `excluir` char(1) COLLATE latin1_general_ci DEFAULT '0',
  `editar` char(1) COLLATE latin1_general_ci DEFAULT '0',
  `inserir` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  `visualizar` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`per_id`),
  KEY `fk_tb_permissao_tb_usuarios_idx` (`usu_id`),
  KEY `fk_tb_permissao_tb_modulo1_idx` (`mod_id`),
  CONSTRAINT `fk_tb_permissao_tb_modulo1` FOREIGN KEY (`mod_id`) REFERENCES `tb_modulo` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_permissao_tb_usuarios` FOREIGN KEY (`usu_id`) REFERENCES `tb_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_permissao` */

LOCK TABLES `tb_permissao` WRITE;

insert  into `tb_permissao`(`per_id`,`usu_id`,`mod_id`,`excluir`,`editar`,`inserir`,`visualizar`) values (1,2,1,'1','1','1','1'),(2,2,2,'1','1','1','1'),(3,2,3,'1','1','1','1');

UNLOCK TABLES;

/*Table structure for table `tb_sistema` */

DROP TABLE IF EXISTS `tb_sistema`;

CREATE TABLE `tb_sistema` (
  `sis_id` int(11) NOT NULL AUTO_INCREMENT,
  `sis_nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `sis_descricao` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `sis_ativo` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`sis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tb_sistema` */

LOCK TABLES `tb_sistema` WRITE;

insert  into `tb_sistema`(`sis_id`,`sis_nome`,`sis_descricao`,`sis_ativo`) values (1,'Usuários','Lista de Cadastro de Usuários','S'),(2,'Galeria','Lista de Galeria de Imagem','S'),(12,'Permissões','Cadastros de Controle de Sistemas, Módulos e Acesso do Sistema','S');

UNLOCK TABLES;

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(100) NOT NULL,
  `usu_login` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_email` varchar(45) DEFAULT NULL,
  `usu_ativo` tinyint(4) DEFAULT '1' COMMENT '0 - não / 1 - sim',
  `usu_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - USUARIO DE ADMINISTRADOR DO SISTEMA',
  `usu_master` tinyint(4) DEFAULT '0' COMMENT '1 - CONTROLADAOR DE UNIDADE, TEM ACESSO AO DADOS DE USUARIOS, PROFESSOR E FUNCIONARIO',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_usuarios` */

LOCK TABLES `tb_usuarios` WRITE;

insert  into `tb_usuarios`(`usu_id`,`usu_nome`,`usu_login`,`usu_senha`,`usu_email`,`usu_ativo`,`usu_admin`,`usu_master`) values (2,'Davson Santos','admin','21232f297a57a5a743894a0e4a801fc3','davsonsantos@gmail.com',1,1,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
