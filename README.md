Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore
 
@jocelio23 
jocelio23
/
EditaisMVC
Public
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Settings
EditaisMVC/Necessário para rodar o sis
@jocelio23
jocelio23 Create Necessário para rodar o sis
Latest commit d1bb582 in 1 minute
 History
 1 contributor
55 lines (40 sloc)  1.55 KB


Um requisito é ter o composer instalado 

comando no power shell 
php .\composer.phar install

instalando bibliotecas do twig
compose required twig/twig


Montando estrutura de banco de dados para rodar no WampServer ou XAMP

###CRIANDO ESTRUTURA DO BANCO DE DADOS DE EDITAIS ###

NOME DO Banco "editais";

CREATE DATABASE EDITAIS;
USE EDITAIS:


### CRIANDO TABELA DE USUARIO ###
CREATE TABLE IF NOT EXISTS usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(60) NOT NULL,
  senha varchar(60) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


### INSERINDO VALORES NA TABELA DE USUARIOS ###
INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(1, 'secult', '12345');


### CRIANDO TABELA DE POSTAGEM###
CREATE TABLE IF NOT EXISTS postagem (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  etapas varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  valor int(11) DEFAULT NULL,
  contatos varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  telefone varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  categoria varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  flag varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  arquivo varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


### CRIANDO TABELA DE ANEXOS###
CREATE TABLE IF NOT EXISTS anexos (
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(520) NOT NULL,
  texto varchar(520) NOT NULL,
  id_postagem int(11) NOT NULL,
  PRIMARY KEY (`id`),
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete
