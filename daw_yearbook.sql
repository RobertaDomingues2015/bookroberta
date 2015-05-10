-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2014 às 04:26
-- Versão do servidor: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daw_yearbook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `idCidade` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` int(11) NOT NULL,
  `nomeCidade` varchar(70) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `Estado`, `nomeCidade`) VALUES
(1, 1, 'Uberaba'),
(2, 1, 'Uberlândia'),
(3, 2, 'Ribeirão Preto'),
(4, 2, 'Campinas'),
(5, 1, 'Araxá');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `sigaEstado` char(2) NOT NULL,
  `nomeEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstado`),
  UNIQUE KEY `sigaEstado` (`sigaEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`idEstado`, `sigaEstado`, `nomeEstado`) VALUES
(1, 'MG', 'Minas Gerais'),
(2, 'SP', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `arquivoFoto` varchar(50) NOT NULL,
  `cidade` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`login`, `senha`, `nomeCompleto`, `arquivoFoto`, `cidade`, `email`, `descricao`) VALUES
('Alessandro', '123456', 'Alessandro Magno', 'alessandro_paula.jpg', 1, 'alessandro@amsistemas.com.br', 'Graduado em GerÃªncia de Tecnologia da InformaÃ§Ã£o\r\n\r\nPÃ³s-Graduando em Desenvolvimento de AplicaÃ§Ãµes WEB - PUC Minas\r\nAnalista de Sistemas - Bio Extratus Cosmetic Natural LTDA'),
('Dany', '123456', 'Daniela ', 'daniela_gondim.jpg', 1, 'daniela.gondim2012@gmail.com', 'Sou formada em Sistemas de Informaï¿½ï¿½o pela Universidade de Uberaba e trabalho a 2 anos como Analista de Sistemas no setor de desenvolvimento"'),
('Nilson', '123456', 'Nilson Teodoro', 'nilson.png', 5, 'nilson@hotmail.com', 'Sou formado em Sistemas de informaÃ§Ã£o pela Universidade de AraxÃ¡, onde concluÃ­ o mesmo em Dezembro de 2010. Atuo como Analista de Sistemas desde 2010, onde iniciei como DBA, e atualmente sou desenvolvedor ASP.Net. Optar por essa pÃ³s-graduaÃ§Ã£o foi imediata, pois irei adquirir e quem sabe repassar conhecimentos, construir novas alianÃ§as, e claro sempre buscando novos desafios.\r\n\r\nContem comigo, grande abraÃ§o.'),
('Roberta', '123456', 'Roberta Domingues', 'perfil.jpg', 1, 'robertadrosa@hotmail.com', 'Formada em Sistemas de InformaÃ§Ã£o"""');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
