-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Out-2019 às 02:29
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar_horario`
--

DROP TABLE IF EXISTS `agendar_horario`;
CREATE TABLE IF NOT EXISTS `agendar_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `horario` time NOT NULL,
  `data` date DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendar_horario`
--

INSERT INTO `agendar_horario` (`id`, `nome`, `telefone`, `email`, `horario`, `data`, `tipo`, `code`) VALUES
(1, 'd', 'd', '', '09:00:00', '2019-10-18', 'hidratação', 1),
(2, 'f', 'f', '', '10:00:00', '2019-10-18', 'maquiagem', 1),
(3, 'a', 'a', '', '10:45:00', '2019-10-18', 'coloração', 1),
(4, 'a', 'a', '', '12:45:00', '2019-10-18', 'corte', 1),
(5, 'a', 'a', '', '13:45:00', '2019-10-18', 'escova', 1),
(6, 'a', 'a', '', '14:45:00', '2019-10-18', 'hidratação', 1),
(7, 'a', 'a', '', '15:45:00', '2019-10-18', 'madrinhas', 1),
(8, 'a', 'a', '', '17:15:00', '2019-10-18', 'maquiagem', 1),
(9, 'a', 'a', '', '18:00:00', '2019-10-18', 'penteado', 1),
(10, 'a', 'a', '', '09:00:00', '2019-10-19', 'selagem', 1),
(11, 'a', 'a', '', '11:00:00', '2019-10-19', 'sobrancelha', 1),
(12, 'cvcv', 'cvvcv', '', '12:45:00', '2019-10-19', 'coloração', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `telefone`, `email`, `mensagem`) VALUES
(1, 'sfdagsgfd', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `hora` time NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `nome`, `hora`, `data`, `tipo`, `code`) VALUES
(1, 'd', '09:00:00', '2019-10-18', 'hidratação', 1),
(2, 'd', '09:15:00', '2019-10-18', 'hidratação', 1),
(3, 'd', '09:30:00', '2019-10-18', 'hidratação', 1),
(4, 'd', '09:45:00', '2019-10-18', 'hidratação', 1),
(5, 'f', '10:00:00', '2019-10-18', 'maquiagem', 1),
(6, 'f', '10:15:00', '2019-10-18', 'maquiagem', 1),
(7, 'f', '10:30:00', '2019-10-18', 'maquiagem', 1),
(8, 'a', '10:45:00', '2019-10-18', 'coloração', 1),
(9, 'a', '11:00:00', '2019-10-18', 'coloração', 1),
(10, 'a', '11:15:00', '2019-10-18', 'coloração', 1),
(11, 'a', '11:30:00', '2019-10-18', 'coloração', 1),
(12, 'a', '11:45:00', '2019-10-18', 'coloração', 1),
(13, 'a', '12:00:00', '2019-10-18', 'coloração', 1),
(14, 'a', '12:15:00', '2019-10-18', 'coloração', 1),
(15, 'a', '12:30:00', '2019-10-18', 'coloração', 1),
(16, 'a', '12:45:00', '2019-10-18', 'corte', 1),
(17, 'a', '13:00:00', '2019-10-18', 'corte', 1),
(18, 'a', '13:15:00', '2019-10-18', 'corte', 1),
(19, 'a', '13:30:00', '2019-10-18', 'corte', 1),
(20, 'a', '13:45:00', '2019-10-18', 'escova', 1),
(21, 'a', '14:00:00', '2019-10-18', 'escova', 1),
(22, 'a', '14:15:00', '2019-10-18', 'escova', 1),
(23, 'a', '14:30:00', '2019-10-18', 'escova', 1),
(24, 'a', '14:45:00', '2019-10-18', 'hidratação', 1),
(25, 'a', '15:00:00', '2019-10-18', 'hidratação', 1),
(26, 'a', '15:15:00', '2019-10-18', 'hidratação', 1),
(27, 'a', '15:30:00', '2019-10-18', 'hidratação', 1),
(28, 'a', '15:45:00', '2019-10-18', 'madrinhas', 1),
(29, 'a', '16:00:00', '2019-10-18', 'madrinhas', 1),
(30, 'a', '16:15:00', '2019-10-18', 'madrinhas', 1),
(31, 'a', '16:30:00', '2019-10-18', 'madrinhas', 1),
(32, 'a', '16:45:00', '2019-10-18', 'madrinhas', 1),
(33, 'a', '17:00:00', '2019-10-18', 'madrinhas', 1),
(34, 'a', '17:15:00', '2019-10-18', 'maquiagem', 1),
(35, 'a', '17:30:00', '2019-10-18', 'maquiagem', 1),
(36, 'a', '17:45:00', '2019-10-18', 'maquiagem', 1),
(37, 'a', '18:00:00', '2019-10-18', 'penteado', 1),
(38, 'a', '18:15:00', '2019-10-18', 'penteado', 1),
(39, 'a', '18:30:00', '2019-10-18', 'penteado', 1),
(40, 'a', '09:00:00', '2019-10-19', 'selagem', 1),
(41, 'a', '09:15:00', '2019-10-19', 'selagem', 1),
(42, 'a', '09:30:00', '2019-10-19', 'selagem', 1),
(43, 'a', '09:45:00', '2019-10-19', 'selagem', 1),
(44, 'a', '10:00:00', '2019-10-19', 'selagem', 1),
(45, 'a', '10:15:00', '2019-10-19', 'selagem', 1),
(46, 'a', '10:30:00', '2019-10-19', 'selagem', 1),
(47, 'a', '10:45:00', '2019-10-19', 'selagem', 1),
(48, 'a', '11:00:00', '2019-10-19', 'sobrancelha', 1),
(49, 'a', '11:15:00', '2019-10-19', 'sobrancelha', 1),
(50, 'a', '11:30:00', '2019-10-19', 'sobrancelha', 1),
(51, 'a', '11:45:00', '2019-10-19', 'sobrancelha', 1),
(52, 'cvcv', '12:45:00', '2019-10-19', 'coloração', 1),
(53, 'cvcv', '13:00:00', '2019-10-19', 'coloração', 1),
(54, 'cvcv', '13:15:00', '2019-10-19', 'coloração', 1),
(55, 'cvcv', '13:30:00', '2019-10-19', 'coloração', 1),
(56, 'cvcv', '13:45:00', '2019-10-19', 'coloração', 1),
(57, 'cvcv', '14:00:00', '2019-10-19', 'coloração', 1),
(58, 'cvcv', '14:15:00', '2019-10-19', 'coloração', 1),
(59, 'cvcv', '14:30:00', '2019-10-19', 'coloração', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mechas`
--

DROP TABLE IF EXISTS `mechas`;
CREATE TABLE IF NOT EXISTS `mechas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noivas`
--

DROP TABLE IF EXISTS `noivas`;
CREATE TABLE IF NOT EXISTS `noivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noivas`
--

INSERT INTO `noivas` (`id`, `nome`, `telefone`, `email`, `mensagem`) VALUES
(8, 'maycow', '999999', 'kaka', 'ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `set_hours`
--

DROP TABLE IF EXISTS `set_hours`;
CREATE TABLE IF NOT EXISTS `set_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vestidos`
--

DROP TABLE IF EXISTS `vestidos`;
CREATE TABLE IF NOT EXISTS `vestidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
