-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Maio-2022 às 19:24
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `editais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE IF NOT EXISTS `postagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `etapas` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `contatos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `etapas`, `valor`, `contatos`, `categoria`, `flag`, `arquivo`) VALUES
(7, 'Edital MercenÃ¡rios do vale', 'etapa de transiÃ§Ã£o ', 12000000, 'mani@festa', 'Aberto', 'Ativado', '225498d18e085f30c33488c4cee7a88b.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `etapas` varchar(220) NOT NULL,
  `valor` double NOT NULL,
  `contatos` varchar(120) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `flag` varchar(10) NOT NULL,
  `arquivo` varchar(320) NOT NULL,
  `link` varchar(220) NOT NULL,
  `texto` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `nome`, `etapas`, `valor`, `contatos`, `categoria`, `flag`, `arquivo`, `link`, `texto`) VALUES
(9, 'Jota Novisk', 'teste43', 800000, 'digital@monetiza.com.br', 'SeleÃ§Ã£o', 'Ativado', 'd4cb08d5d9dee8febae93b42870ea675.jpg', '', ''),
(8, 'Edital transformaÃ§Ã£o digital', 'teste 23', 780000, 'feiralivre@gmail.com', 'SeleÃ§Ã£o', 'Ativado', '1f533493731ac71939e8893a23f52853.jpg', '', ''),
(7, 'Vale das capivaras', 'teste', 12000000, 'mani@festa', 'Aberto', 'Ativado', '047e909e765444fc1d49e73e6c39f53c.jpeg', '', ''),
(10, 'Edital feira da madrugada', 'teste 56', 90000, 'mani@festa', 'Aberto', 'Ativado', '62817803c326c28885ed712bbb43e775.jpeg', '', ''),
(11, 'Edital ForrÃ³ Brasil', 'tstre565', 780000, 'mani@festa', 'SeleÃ§Ã£o', 'Ativado', '6ee88b0055f803b712bed8239910711f.jpeg', '', ''),
(12, 'Edital MercenÃ¡rios do vale', 'tsdt4565', 36999, 'feiralivre@gmail.com', 'Aberto', 'Ativado', 'bc8a08a8b92d609eaa208967099d377d.jpeg', '', ''),
(13, 'Jota Novisk', 'testtegduywef', 90000, 'jotaNovisk@gmail.com', 'Aberto', 'Ativado', 'c4ccec7fcb4cc688edc8c3bed5fc4fad.jpeg', '', ''),
(14, 'Edital transformaÃ§Ã£o digital', 'te6gwyugqYUD', 199, 'mani@festa', 'Aberto', 'Ativado', 'edffe70f5914662ecc3c239e98b2d702.jpeg', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(1, 'secult', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
