-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Jun-2022 às 17:29
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(520) NOT NULL,
  `texto` varchar(520) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anexo_postagem` (`id_postagem`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anexos`
--

INSERT INTO `anexos` (`id`, `link`, `texto`, `id_postagem`) VALUES
(1, 'www.texto.com.br', 'Texto', 1),
(2, 'https://mapacultural.secult.ce.gov.br/', 'Mapa Cultural', 1),
(3, 'https://web.whatsapp.com/', 'WHATSAPP DO JOCELIO esteve aqui', 2),
(4, 'https://www.gigasystems.com.br/artigo/65/update-a-partir-de-um-select-join#:~:text=Introdu%C3%A7%C3%A3o%20ao%20MySQL%20instru%C3%A7%C3%A3o%20UPDATE,todas%20as%20linhas%20da%20tabela.', 'atualizado', 2),
(5, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 1', 3),
(6, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 2', 3),
(7, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 3', 3),
(8, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 4', 3),
(9, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 4', 3),
(10, 'https://www.youtube.com/watch?v=hIRvaL5aR5I', 'Link 5', 3),
(11, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'jota', 1),
(12, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 1', 4),
(13, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 2', 4),
(14, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 3', 4),
(15, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 4', 4),
(16, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'link 5', 4),
(17, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Lik 6', 4),
(18, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 7', 4),
(19, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 8', 4),
(20, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 9', 4),
(21, 'https://forum.scriptbrasil.com.br/topic/137010-resolvido%C2%A0criar-botao-que-retorne-a-pagina-anterior/', 'Link 10', 4),
(22, 'http://localhost/EditaisMVC/editais', 'Jota aqui', 1),
(23, 'https://pt.stackoverflow.com/questions/83569/converter-n%C3%BAmero-em-string-para-inteiro-php', 'hhrthrt', 3),
(24, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'Github', 1),
(25, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'Link 3', 2),
(26, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'jota add novo link', 2),
(27, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'jota novo ', 2),
(28, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'eu de novo', 2),
(29, 'https://www.php.net/manual/pt_BR/function.mysql-affected-rows.php', 'olha ele o link', 2),
(30, 'http://localhost/EditaisMVC/unico/listarUnico/2', 'editis', 4),
(31, 'http://localhost/EditaisMVC/unico/listarUnico/2', 'blablabla', 2),
(32, 'https://github.com/jocelio23/EditaisMVC', 'JOTA NOVISK ORLEANS DE BRAGANÃ‡A', 2),
(33, 'http://localhost/EditaisMVC/unico/listarUnico/2', 'huuhu', 2),
(34, 'http://localhost/EditaisMVC/unico/listarUnico/2', 'huuhu', 2),
(35, 'https://editais.cultura.ce.gov.br/', 'Link de um teste', 3),
(36, 'https://editais.cultura.ce.gov.br/index.html', 'Site de editais', 5),
(37, 'https://editais.cultura.ce.gov.br/index.html', 'jmghjm', 2),
(41, 'https://editais.cultura.ce.gov.br/index.html', 'toquetoque', 2),
(42, 'https://editais.cultura.ce.gov.br/index.html', 'yjyujyu', 5),
(44, 'https://editais.cultura.ce.gov.br/', 'novo ', 3),
(45, 'https://moodle.ag-sg.net/mod/book/view.php?id=16587&chapterid=1107', 'Jota mais uma vez ', 3),
(46, 'https://editais.cultura.ce.gov.br/edital-cultura-viva-ce.html', 'tere', 2),
(47, 'https://editais.cultura.ce.gov.br/edital-cultura-viva-ce.html', 'text', 2),
(48, 'https://web.whatsapp.com/', 'novo link ', 2),
(49, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'MYSQL', 5),
(50, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'teste numero', 5),
(51, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'teste numero 2', 5),
(52, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'teste numero 3', 5),
(53, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'Anexo nÃºmero 4', 5),
(54, 'https://pt.stackoverflow.com/questions/110331/realizando-update-em-v%C3%A1rios-registros-para-o-mesmo-id', 'LUNK', 4),
(55, 'http://localhost/phpmyadmin/sql.php?server=1&db=editais&table=anexos&pos=0', 'Novo link aqui', 4),
(56, 'http://localhost/phpmyadmin/sql.php?server=1&db=editais&table=anexos&pos=0', 'Jota aqui', 2),
(57, 'https://www.google.com/search?gs_ssp=eJzj4tLP1TfIyDMsS05XYDRgdGDwYi8pzywpSS0CAFnOB00&q=twitter&rlz=1C1KNTJ_pt-BRBR994BR994&oq=t&aqs=chrome.4.69i57j0i131i433i512l3j46i131i199i433i465i512j69i60l3.2128j0j7&sourceid=chrome&ie=UTF-8', 'link viva', 2),
(58, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjB8ojawY_4AhUMFdQBHY2OCp0YABAAGgJvYQ&ae=2&ohost=www.google.com&cid=CAESbOD26JCZvUf4Cz7uB1jzqFQaEB__3HI2AMyglytuF-Vs1UntwyoRa4EipN5JVqdfndM3EPLEp774qiZ__qyOVSIQ62Mv7kQgGiF4z52fpxNfCMcy0gMLdPEIvFbcoJXhIvX041cmJd-ND52MUA&sig=AOD64_2SAN8J1QncSxoZ2vAMjAEyX2F_gA&q&adurl&ved=2ahUKEwij0_nZwY_4AhXNhJUCHZ-GD7IQ0Qx6BAgDEAE', 'JOTA JOTA JOTA JOTA JOTA JOTA JOTA', 2),
(59, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjM44jUlZH4AhVF5VwKHX1XBTUYABABGgJjZQ&ae=2&ohost=www.google.com&cid=CAESbOD2D6jeavYmUzh-90YV9GHib4tM7x6lbNIoPjG1LDylTeBr6rXhQdiqY9NRbfsKaUvhj4muH3624M5u-PZiOpLLQv4B7t3d31ULznFhl7wnopdUczgyh7fT07aTzLLpJ_tvNCqFR4E-IXPk2g&sig=AOD64_0ZHzex_uBSWYtgBScHgiOt1t2XUg&adurl&ved=2ahUKEwjOr4LUlZH4AhU2upUCHRfkDqIQqyQoAHoECAMQBQ', 'Link para novo PHP', 2),
(60, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjM44jUlZH4AhVF5VwKHX1XBTUYABAAGgJjZQ&ae=2&ohost=www.google.com&cid=CAESbOD2D6jeavYmUzh-90YV9GHib4tM7x6lbNIoPjG1LDylTeBr6rXhQdiqY9NRbfsKaUvhj4muH3624M5u-PZiOpLLQv4B7t3d31ULznFhl7wnopdUczgyh7fT07aTzLLpJ_tvNCqFR4E-IXPk2g&sig=AOD64_2VitlA4oGX4igB0K60PS_c1EYAZw&q&adurl&ved=2ahUKEwjOr4LUlZH4AhU2upUCHRfkDqIQ0Qx6BAgDEAE', 'Link 2', 2),
(61, 'https://www.jetbrains.com/phpstorm/promo/?source=google&medium=cpc&campaign=14335686171&term=php%20software&gclid=Cj0KCQjw4uaUBhC8ARIsANUuDjUM13mB2taVH9sj0-Dd1QA-CtlWB7zg0DhqPMGRBgkCFrXlKbTku7AaAj3XEALw_wcB', 'JETBRAINS', 2),
(62, 'https://github.com/RafaelCapo/sistema_login_php', 'Jota mais uma vez ', 2),
(63, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjM44jUlZH4AhVF5VwKHX1XBTUYABAAGgJjZQ&ae=2&ohost=www.google.com&cid=CAESbOD2D6jeavYmUzh-90YV9GHib4tM7x6lbNIoPjG1LDylTeBr6rXhQdiqY9NRbfsKaUvhj4muH3624M5u-PZiOpLLQv4B7t3d31ULznFhl7wnopdUczgyh7fT07aTzLLpJ_tvNCqFR4E-IXPk2g&sig=AOD64_2VitlA4oGX4igB0K60PS_c1EYAZw&q&adurl&ved=2ahUKEwjOr4LUlZH4AhU2upUCHRfkDqIQ0Qx6BAgDEAE', 'link viva de novo', 2),
(64, 'https://www.youtube.com/watch?v=CR_SJkeUN9o', 'Patativa do AssarÃ© novo', 6),
(65, 'https://www.youtube.com/watch?v=CR_SJkeUN9o', 'Patativa poemas', 6),
(66, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjM44jUlZH4AhVF5VwKHX1XBTUYABAAGgJjZQ&ae=2&ohost=www.google.com&cid=CAESbOD2D6jeavYmUzh-90YV9GHib4tM7x6lbNIoPjG1LDylTeBr6rXhQdiqY9NRbfsKaUvhj4muH3624M5u-PZiOpLLQv4B7t3d31ULznFhl7wnopdUczgyh7fT07aTzLLpJ_tvNCqFR4E-IXPk2g&sig=AOD64_2VitlA4oGX4igB0K60PS_c1EYAZw&q&adurl&ved=2ahUKEwjOr4LUlZH4AhU2upUCHRfkDqIQ0Qx6BAgDEAE', 'Link 2', 7),
(67, 'https://web.whatsapp.com/', 'LINK 1', 6),
(68, 'https://web.whatsapp.com/', 'LINK 2', 6),
(69, 'https://web.whatsapp.com/', 'LINK 3 novo', 6),
(70, 'https://web.whatsapp.com/', 'Ficha de inscriÃ§Ã£o', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `nome`, `etapas`, `valor`, `contatos`, `telefone`, `categoria`, `flag`, `arquivo`) VALUES
(1, 'Primeira publicaÃ§Ã£o de edital', 'Em fase de testes do dia 30/05 atÃ© 10/05', 0, '', '', 'Aberto', 'Desativado', '28a8af47f687b0858e07208b7b36fd01.jpg'),
(2, 'Edital de testes 3', 'fase de testes', 100, '', '(88) 99426-4388', 'Aberto', 'Ativado', 'edital-cultura-viva'),
(3, 'Edital de teste nÃºmero 3 de novo', 'Edital em fase de teste', 20, '', '', 'Aberto', 'Ativado', 'e3236141810ecccfbf9a56771f843f00.png'),
(4, 'Edital de testes nÃºmero 4', 'Em fase de testes na 4 etapa', 200000, '', '', 'SeleÃ§Ã£o', 'Ativado', 'ce7f3cb76929bcc03d355ce2cae1f5a0.jpeg'),
(5, 'Edital de novidades', '5Âª etapa de testes', 0, '', '', 'Aberto', 'Ativado', '2e6c468566022dc3a4398575387eb319.jpeg'),
(6, 'Edital Pocinos de Lima CorrÃ©ia', 'Em fase de publicaÃ§Ã£o desde o dia 04/05 de 2022', 300000, 'Pocinos@gmail.com', '(21) 8833-4455', 'Aberto', 'Ativado', '571b602e1ccd1da58a0dfb3030cbaee3.png'),
(7, 'Edital Lima De silva', 'em teste', 0, '', '', 'Aberto', 'Ativado', '55dbcf9901f9b7364d0732996b7b5b0b.jpeg');

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
