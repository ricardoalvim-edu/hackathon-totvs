-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Out-2015 às 03:39
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `DBHackathon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `talhao`
--

CREATE TABLE IF NOT EXISTS `talhao` (
  `id_talhao` int(11) NOT NULL AUTO_INCREMENT,
  `coorX` varchar(20) NOT NULL,
  `coorY` varchar(20) NOT NULL,
  `nomeTalhao` varchar(50) NOT NULL,
  `area` float NOT NULL,
  `tipoCultura` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  PRIMARY KEY (`id_talhao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `talhao`
--

INSERT INTO `talhao` (`id_talhao`, `coorX`, `coorY`, `nomeTalhao`, `area`, `tipoCultura`, `img`) VALUES
(1, '-22.6535936', '-50.4245077', 'Talha 1', 52.5, 'Cana', 'img/hackathon');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
