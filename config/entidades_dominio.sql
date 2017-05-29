-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Maio-2017 às 15:38
-- Versão do servidor: 5.5.54-0ubuntu0.14.04.1
-- versão do PHP: 7.1.4-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sistema_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidades_dominio`
--

CREATE TABLE IF NOT EXISTS `entidades_dominio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `entidades_dominio`
--

INSERT INTO `entidades_dominio` (`id`, `dt_cadastro`) VALUES
(1, '2017-05-29 06:32:55'),
(2, '2017-05-29 06:32:55'),
(3, '2017-05-29 06:36:16'),
(4, '2017-05-29 06:36:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
