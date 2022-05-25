-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25-Maio-2022 às 11:30
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
-- Estrutura da tabela `anexos`
--

DROP TABLE IF EXISTS `anexos`;
CREATE TABLE IF NOT EXISTS `anexos` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(220) NOT NULL,
  `texto` varchar(120) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  PRIMARY KEY (`id_anexo`),
  KEY `fk_anexo_postagem` (`id_postagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `etapas`, `valor`, `contatos`, `categoria`, `flag`, `arquivo`) VALUES
(1, 'Teste', 'teste', 90, 'teste@gmail.com', 'SeleÃ§Ã£o', 'Ativado', '9e84c71d12eded12b904242f06b50e9a.png'),
(2, 'Teste', 'teste', 90, 'teste@gmail.com', 'SeleÃ§Ã£o', 'Ativado', 'f87be80dc7dbe6212f6add9c0969df4a.png'),
(3, 'Teste', 'teste', 90, 'teste@gmail.com', 'SeleÃ§Ã£o', 'Ativado', 'ccc5fec9ed30d5c2e7302228f62762dc.png'),
(4, 'jota', 'jota', 90, 'jotaNovisk@gmail.com', 'SeleÃ§Ã£o', 'Ativado', '52da9d06b09f6d340925a0f5aea27234.jpeg'),
(5, 'jota 2', 'jota 2', 90, 'jotaNovisk@gmail.com', 'SeleÃ§Ã£o', 'Ativado', 'db149b4a8d4e8ef7d4b5a7c791a1d91c.jpeg'),
(6, 'blabla', 'blala', 199, 'digital@monetiza.com.br', 'Aberto', 'Ativado', '9541566c86d2a4eea43cc0652323c431.jpeg');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(1, 'secult', '12345');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `fk_anexo_postagem` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
