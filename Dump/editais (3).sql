-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Maio-2022 às 19:01
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anexos`
--

INSERT INTO `anexos` (`id_anexo`, `link`, `texto`, `id_postagem`) VALUES
(1, 'https://mapacultural.secult.ce.gov.br/files/opportunity/3725/xiv_edital_cear%C3%81_de_cinema_e_v%C3%8Ddeo_-_difus%C3%83o,_forma%C3%87%C3%83o_e_pesquisa_-_ap%C3%93s_1%C2%B0_aditivo_(1).pdf', 'Edital retificado apÃ³s o aditivo', 1),
(2, 'https://mapacultural.secult.ce.gov.br/oportunidade/3725/', 'Ficha de inscriÃ§Ã£o no Mapa', 1),
(3, 'https://mapacultural.secult.ce.gov.br/files/opportunity/3725/xiv_edital_cear%C3%81_de_cinema_e_v%C3%8Ddeo_-_difus%C3%83o,_forma%C3%87%C3%83o_e_pesquisa.pdf', 'XIV EDITAL CEARÃ DE CINEMA E VÃDEO - DIFUSÃƒO, FORMAÃ‡ÃƒO E PESQUISA', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `etapas`, `valor`, `contatos`, `categoria`, `flag`, `arquivo`) VALUES
(1, 'XIV EDITAL CEARÃ DE CINEMA E VÃDEO - DIFUSÃƒO, FORMAÃ‡ÃƒO E PESQUISA', 'InscriÃ§Ãµes | 03/05/2022 a 09/06/2022', 330000000, 'mapas@secult.ce.gov.br', 'Aberto', 'Ativado', '7a6bb7ec5a0583bdfa305bf99bb4bfc3.jpeg');

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
  ADD CONSTRAINT `fk_anexos` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
