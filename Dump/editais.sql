-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Maio-2022 às 12:19
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `editais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexos`
--

DROP TABLE IF EXISTS `anexos`;
CREATE TABLE IF NOT EXISTS `anexos` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(520) NOT NULL,
  `texto` varchar(520) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  PRIMARY KEY (`id_anexo`),
  KEY `fk_anexo_postagem` (`id_postagem`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anexos`
--

INSERT INTO `anexos` (`id_anexo`, `link`, `texto`, `id_postagem`) VALUES
(1, 'https://editais.cultura.ce.gov.br/', 'Editais Culturais', 1),
(2, 'https://drive.google.com/drive/folders/1NZijjGAfACAzBeICm26jNxMM_8cNKndc', 'Editais passados', 1),
(3, 'https://g1.globo.com/', 'link 1 ', 2),
(4, 'https://g1.globo.com/', 'link 2', 2),
(5, 'https://g1.globo.com/', 'link 3', 2),
(6, 'https://g1.globo.com/', 'link 4', 2),
(7, 'https://g1.globo.com/', 'link 5', 2),
(8, 'https://g1.globo.com/', 'link 6', 2),
(9, 'https://g1.globo.com/', 'link 7', 2),
(10, 'https://g1.globo.com/', 'link 8', 2),
(11, 'https://g1.globo.com/', 'link 9', 2),
(12, 'https://g1.globo.com/', 'link 10', 2),
(13, 'https://g1.globo.com/', 'link 1', 3),
(14, 'https://g1.globo.com/', 'link 2', 3),
(15, 'https://g1.globo.com/', 'link 3', 3),
(16, 'https://g1.globo.com/', 'link 4', 3),
(17, 'https://g1.globo.com/', 'link 5', 3),
(18, 'https://g1.globo.com/', 'link 6', 3),
(19, 'https://g1.globo.com/', 'link 7', 3),
(20, 'https://g1.globo.com/', 'link 8', 3),
(21, 'https://g1.globo.com/', 'link 9', 3),
(22, 'https://g1.globo.com/', 'link 10', 3),
(23, 'https://g1.globo.com/', 'link 1', 4),
(24, 'https://g1.globo.com/', 'link 2', 4),
(25, 'https://g1.globo.com/', 'link 3', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE IF NOT EXISTS `postagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `etapas` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `contatos` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `etapas`, `valor`, `contatos`, `telefone`, `categoria`, `flag`, `arquivo`) VALUES
(1, 'Edital de teste', 'Etapa de publicaÃ§Ã£o para teste', 0, '', '', 'Aberto', 'Ativado', 'testes.jpg'),
(2, 'Edital de testes numero 2', 'Em fase de testes para publicaÃ§Ã£o', 230000000, 'editaisTeste@gmail.com', '(88) 99426-4388', 'Aberto', 'Ativado', 'd5b88f15c5c4f3557afeea4b6ece12ed.png'),
(3, 'Edital de testes numero 2', 'Em fase de testes', 320000000, 'testes@gmail.com', '(88) 994264-3988', 'Aberto', 'Ativado', 'c98ba4917e8e3cd0cc8766e15241906e.jpg'),
(4, 'Edital de testes', 'em teste', 900000000, 'testes@gmail.com', '(88) 99345-9988', 'Aberto', 'Ativado', '90fc155e8a09ab97c29ff23a993e16ba.jpg');

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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `fk_postagem` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
