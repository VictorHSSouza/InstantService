-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16/06/2024 às 20:46
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `instant_service`
--
create database instant_service;
use instant_service;
-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id_usuario` int UNSIGNED NOT NULL,
  `id_funcionario` int UNSIGNED NOT NULL,
  `mensagem` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_avaliacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_usuario`, `id_funcionario`, `mensagem`, `status_avaliacao`) VALUES
(7, 7, 'gergh', 1),
(4, 7, 'uyoluiyjk,ui', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_profissional`
--

DROP TABLE IF EXISTS `cadastro_profissional`;
CREATE TABLE IF NOT EXISTS `cadastro_profissional` (
  `id_usuario` int UNSIGNED NOT NULL,
  `id_estado` int UNSIGNED NOT NULL,
  `cep` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logradouro` varchar(40) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `nome_curriculo` varchar(30) DEFAULT NULL,
  `status_ativo` tinyint(1) NOT NULL,
  `status_cadastro` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cadastro_profissional`
--

INSERT INTO `cadastro_profissional` (`id_usuario`, `id_estado`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `nome_curriculo`, `status_ativo`, `status_cadastro`) VALUES
(2, 13, '11111-111', 'rua a', '56', 'ghm', 'ghghj', 'ghm', 'Uberização.pdf', 0, 1),
(4, 9, '11111-111', 'rua a', '696', 'ghm', 'ghghj', 'ghm', NULL, 0, 1),
(5, 14, '11111-111', 'rua a', '6', 'ghm', 'ghghj', 'ghm', NULL, 0, 0),
(6, 11, '31560-260', 'RUA LEVINDFO IGNACIO RIBEIRO', '35', ' PORTÃO BRANCO ', 'Santa Amelia', 'Belo Horizonte ', NULL, 0, 1),
(7, 13, '11111-111', 'rua a', '5', 'fghrt', 'jtjhggcfb', 'ghm', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_usuario`
--

DROP TABLE IF EXISTS `cadastro_usuario`;
CREATE TABLE IF NOT EXISTS `cadastro_usuario` (
  `id_cliente` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sobrenome` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` char(14) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`id_cliente`, `nome`, `sobrenome`, `email`, `sexo`, `data_nascimento`, `cpf`) VALUES
(1, 'dsad', 'dsadasda', 'victorhenriquesantanasouza@gmail.com', 'F', '2024-05-07', '151.960.406-84'),
(2, 'dsad', 'dsadasda', 'asda@adsa.con', 'F', '2003-10-14', '151.960.406-84'),
(3, 'dsadasd', 'dsadasda', 'victorhenriquesantanasouza@gmail.com', 'F', '1988-03-04', '151.960.406-84'),
(4, 'nome', 'ffe', 'f@gr.g', 'M', '2007-07-11', '111.111.111-11'),
(5, 'nome', 'ffe', 'f@gr.d', 'F', '2007-05-08', '111.111.111-11'),
(6, 'ARTHUR', 'XAVIER', 'MEUEMAILESCOLAR@GMAIL.COM', 'M', '2006-10-31', '971.024.406-00'),
(7, 'nome', 'ffe', 'f@gr.com', 'M', '2000-03-31', '111.111.111-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_estado` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `nome_estado`) VALUES
(1, 'AC'),
(2, 'AL'),
(3, 'AM'),
(4, 'AP'),
(5, 'BA'),
(6, 'CE'),
(7, 'DF'),
(8, 'ES'),
(9, 'GO'),
(10, 'MA'),
(11, 'MG'),
(12, 'MS'),
(13, 'MT'),
(14, 'PA'),
(15, 'PB'),
(16, 'PE'),
(17, 'PI'),
(18, 'PR'),
(19, 'RJ'),
(20, 'RN'),
(21, 'RO'),
(22, 'RR'),
(23, 'RS'),
(24, 'SC'),
(25, 'SE'),
(26, 'SP'),
(27, 'TO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

DROP TABLE IF EXISTS `habilidades`;
CREATE TABLE IF NOT EXISTS `habilidades` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `habilidades`
--

INSERT INTO `habilidades` (`id`, `habilidade`) VALUES
(1, 'Manutenção de Computadores'),
(2, 'Montagem de Computadores'),
(3, 'Recuperação de Dados e Backup'),
(4, 'Manutenção em impressoras'),
(5, 'Manutenção elétrica'),
(6, 'Manutenção de rede');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id_login`, `id_usuario`, `login`, `senha`, `tipo`) VALUES
(1, 1, 'VictorHss', '202cb962ac59075b964b07152d234b70', 'U'),
(2, 2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'U'),
(3, 3, 'Victorhss363', '202cb962ac59075b964b07152d234b70', 'U'),
(4, 4, 'abcd', '202cb962ac59075b964b07152d234b70', 'U'),
(5, 5, 'abcde', '81dc9bdb52d04dc20036dbd8313ed055', 'U'),
(6, 6, 'ARTHURTESTE', '8eb7d99dd491a0651ca99a18319080e9', 'U'),
(7, 7, 'aaa', '202cb962ac59075b964b07152d234b70', 'U');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int UNSIGNED NOT NULL,
  `id_problema` int UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  `data_alteracao` datetime NOT NULL,
  `id_profissional` int DEFAULT NULL,
  `data_confirmacao` datetime DEFAULT NULL,
  `data_finalizacao` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `problemas`
--

DROP TABLE IF EXISTS `problemas`;
CREATE TABLE IF NOT EXISTS `problemas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `id_tipo` int UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `problemas`
--

INSERT INTO `problemas` (`id`, `nome`, `id_tipo`, `descricao`) VALUES
(1, 'lâmpada queimada', 1, 'lâmpada queimada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `problema_habilidades`
--

DROP TABLE IF EXISTS `problema_habilidades`;
CREATE TABLE IF NOT EXISTS `problema_habilidades` (
  `id_problema` int UNSIGNED NOT NULL,
  `id_habilidade` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_problema`,`id_habilidade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissional_habilidades`
--

DROP TABLE IF EXISTS `profissional_habilidades`;
CREATE TABLE IF NOT EXISTS `profissional_habilidades` (
  `id_profissional` int UNSIGNED NOT NULL,
  `id_habilidade` int UNSIGNED NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_profissional`,`id_habilidade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `profissional_habilidades`
--

INSERT INTO `profissional_habilidades` (`id_profissional`, `id_habilidade`, `data`) VALUES
(4, 5, '2024-05-04'),
(4, 4, '2024-05-04'),
(5, 5, '2024-05-06'),
(4, 1, '2024-05-04'),
(6, 2, '2024-05-25'),
(6, 1, '2024-05-25'),
(5, 4, '2024-05-06'),
(5, 6, '2024-05-06'),
(6, 4, '2024-05-25'),
(6, 5, '2024-05-25'),
(7, 3, '2024-05-26'),
(7, 4, '2024-05-26'),
(2, 5, '2024-06-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_problema`
--

DROP TABLE IF EXISTS `tipo_problema`;
CREATE TABLE IF NOT EXISTS `tipo_problema` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tipo_problema`
--

INSERT INTO `tipo_problema` (`id`, `nome`, `descricao`) VALUES
(1, 'eletrodomestico', 'Problemas com seus eletrodomésticos (Aparelhos/objetos presentes em sua casa)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
