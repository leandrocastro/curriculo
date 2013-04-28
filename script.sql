-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2013 at 03:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `so_curriculo`
--
CREATE DATABASE `so_curriculo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `so_curriculo`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cargo`
--

CREATE TABLE IF NOT EXISTS `tb_cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_TB_cargo_TB_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cursos_seminarios`
--

CREATE TABLE IF NOT EXISTS `tb_cursos_seminarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `curso_seminario` text,
  PRIMARY KEY (`id`),
  KEY `fk_TB_cursos_seminarios_TB_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa`
--

CREATE TABLE IF NOT EXISTS `tb_empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_experiencia_profissional`
--

CREATE TABLE IF NOT EXISTS `tb_experiencia_profissional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `atividades_desempenhadas` text,
  PRIMARY KEY (`id`),
  KEY `fk_TB_experiencia_profissional_TB_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_formacao`
--

CREATE TABLE IF NOT EXISTS `tb_formacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `tipo_formacao` varchar(100) DEFAULT NULL,
  `area_de_estudo` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_TB_formacao_TB_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lingua_estrangeira`
--

CREATE TABLE IF NOT EXISTS `tb_lingua_estrangeira` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `idioma` varchar(20) DEFAULT NULL,
  `nivel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_TB_lingua_estrangeira_TB_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mensagem`
--

CREATE TABLE IF NOT EXISTS `tb_mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` text,
  `data` datetime DEFAULT NULL,
  `remetente_id` int(11) DEFAULT NULL,
  `destinarario_id` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_telefone`
--

CREATE TABLE IF NOT EXISTS `tb_telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_TB_telefone_TB_usuario_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `apresentacao` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cep` varchar(13) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` tinyint(4) DEFAULT NULL,
  `slug` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cargo`
--
ALTER TABLE `tb_cargo`
  ADD CONSTRAINT `fk_TB_cargo_TB_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_cursos_seminarios`
--
ALTER TABLE `tb_cursos_seminarios`
  ADD CONSTRAINT `fk_TB_cursos_seminarios_TB_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_experiencia_profissional`
--
ALTER TABLE `tb_experiencia_profissional`
  ADD CONSTRAINT `fk_TB_experiencia_profissional_TB_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_formacao`
--
ALTER TABLE `tb_formacao`
  ADD CONSTRAINT `fk_TB_formacao_TB_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_lingua_estrangeira`
--
ALTER TABLE `tb_lingua_estrangeira`
  ADD CONSTRAINT `fk_TB_lingua_estrangeira_TB_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD CONSTRAINT `fk_TB_telefone_TB_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
