-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/09/2024 às 00:10
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_profissional`
--

DROP TABLE IF EXISTS `avaliacao_profissional`;
CREATE TABLE IF NOT EXISTS `avaliacao_profissional` (
  `id_profissional` int UNSIGNED NOT NULL,
  `id_funcionario` int UNSIGNED NOT NULL,
  `mensagem` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_avaliacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_profissional`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `avaliacao_profissional`
--

INSERT INTO `avaliacao_profissional` (`id_profissional`, `id_funcionario`, `mensagem`, `status_avaliacao`) VALUES
(31, 31, '', 1),
(32, 32, '', 1),
(33, 33, '', 1),
(35, 35, '', 1),
(43, 42, '', 1),
(44, 42, '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sobrenome` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` char(14) NOT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `img_perfil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `sobrenome`, `login`, `senha`, `email`, `data_nascimento`, `cpf`, `sexo`, `tipo`, `img_perfil`) VALUES
(31, 'Administrador', 'Geral', 'admin', '470805af85e62beab989de045f38822d', 'ADM@GMAIL.COM', '1111-11-11', '111.111.111-11', 'M', 5, 'perfil31.png'),
(42, 'func', 'func', 'func', '7df4935f4a5a2865191ef74f64df8754', 'ADM@GMAIL.COM', '1111-01-01', '111.111.111-11', 'O', 4, NULL),
(44, 'B', 'B', 'B', '9d5ed678fe57bcca610140957afab571', 'asda@adsa.conasdasdas', '0001-11-11', '111.111.111-11', 'F', 2, NULL),
(45, 'A', 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'victorhenriquesantanasouza@gmail.com', '0001-11-11', '666.666.666-66', 'M', 1, NULL);

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
  `id_habilidade` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `habilidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_habilidade`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `habilidades`
--

INSERT INTO `habilidades` (`id_habilidade`, `habilidade`) VALUES
(1, 'Manutenção de Computadores'),
(2, 'Montagem de Computadores'),
(3, 'Recuperação de Dados e Backup'),
(4, 'Manutenção em impressoras'),
(5, 'Manutenção elétrica'),
(6, 'Manutenção de rede');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `list_servicos`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `list_servicos`;
CREATE TABLE IF NOT EXISTS `list_servicos` (
`id_profissional` int unsigned
,`id_profissional_vinculado` int
,`id_pedido` int unsigned
,`nome_completo` varchar(41)
,`problema` varchar(45)
,`descricao` varchar(100)
,`endereco` varchar(50)
,`data_solicitacao` datetime
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id_mensagem` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `id_profissional` int NOT NULL,
  `remetente` int NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` int UNSIGNED NOT NULL,
  `id_profissional` int DEFAULT NULL,
  `id_problema` int UNSIGNED NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  `data_confirmacao` datetime DEFAULT NULL,
  `data_finalizacao` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_profissional`, `id_problema`, `descricao`, `endereco`, `data_solicitacao`, `data_confirmacao`, `data_finalizacao`, `status`) VALUES
(53, 33, 33, 1, 'Lâmpada Queimou! AHHHHHHHHHHHH', 'Rua Conde Santa Marinha', '2024-09-03 21:14:15', '2024-09-04 00:16:09', NULL, 0),
(55, 31, NULL, 1, 'gggggg', 'gggggg', '2024-09-10 20:50:16', NULL, NULL, 0),
(56, 31, NULL, 1, 'SSSSSSSS', 's', '2024-09-16 21:19:16', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE IF NOT EXISTS `permissao` (
  `id_permissao` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(20) NOT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_permissao`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `permissao`
--

INSERT INTO `permissao` (`id_permissao`, `Nome`, `descricao`) VALUES
(1, 'cliente', NULL),
(2, 'profissional', NULL),
(3, 'funcionario', NULL),
(4, 'gerente', NULL),
(5, 'administrador', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `problemas`
--

DROP TABLE IF EXISTS `problemas`;
CREATE TABLE IF NOT EXISTS `problemas` (
  `id_problema` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `id_tipo` int UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_problema`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `problemas`
--

INSERT INTO `problemas` (`id_problema`, `nome`, `id_tipo`, `descricao`) VALUES
(1, 'Lâmpada queimada', 1, 'Lâmpada queimada');

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

--
-- Despejando dados para a tabela `problema_habilidades`
--

INSERT INTO `problema_habilidades` (`id_problema`, `id_habilidade`) VALUES
(1, 5),
(2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissional`
--

DROP TABLE IF EXISTS `profissional`;
CREATE TABLE IF NOT EXISTS `profissional` (
  `id_profissional` int UNSIGNED NOT NULL,
  `id_estado` int UNSIGNED NOT NULL,
  `cep` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logradouro` varchar(40) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `nome_curriculo` varchar(30) DEFAULT NULL,
  `status_ativo` tinyint(1) NOT NULL,
  `status_cadastro` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_profissional`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `profissional`
--

INSERT INTO `profissional` (`id_profissional`, `id_estado`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `nome_curriculo`, `status_ativo`, `status_cadastro`) VALUES
(31, 7, '31.130-080', 'Rua Conde Santa Marinha', '355', 'Casa', 'Cachoeirinha', 'dasda', 'page_7662_638585451271254716.p', 1, 1),
(32, 0, '31.130-080', '', '11', '11', '', '', 'Projeto elétrico + Listas de m', 1, 1),
(33, 0, '31.130-080', '', '10', 'Casa', '', '', 'Projeto elétrico + Listas de m', 1, 1),
(35, 0, '31.130-080', '', '355', 'Casa', '', '', 'Projeto elétrico + Listas de m', 1, 1),
(43, 0, '31.130-080', '', '355', 'Casa', '', '', 'Projeto elétrico + Listas de m', 1, 1),
(44, 11, '31.130-080', 'Rua Conde Santa Marinha', '12', 'Casa', 'Cachoeirinha', 'Belo Horizonte', 'Projeto elétrico + Listas de m', 1, 1),
(45, 11, '31.130-080', 'Rua Conde Santa Marinha', '355', 'Casa', 'Cachoeirinha', 'Belo Horizonte', 'page_7662_638585452099378960_2', 0, 1);

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
(32, 6, '2024-09-02'),
(35, 4, '2024-09-17'),
(33, 5, '2024-09-03'),
(31, 5, '2024-09-02'),
(31, 2, '2024-09-02'),
(32, 3, '2024-09-02'),
(35, 5, '2024-09-17'),
(43, 1, '2024-09-21'),
(43, 3, '2024-09-21'),
(44, 1, '2024-09-21'),
(44, 3, '2024-09-21'),
(44, 4, '2024-09-21'),
(45, 1, '2024-09-21'),
(45, 3, '2024-09-21'),
(45, 5, '2024-09-21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_problema`
--

DROP TABLE IF EXISTS `tipo_problema`;
CREATE TABLE IF NOT EXISTS `tipo_problema` (
  `id_tipo` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tipo_problema`
--

INSERT INTO `tipo_problema` (`id_tipo`, `nome`, `descricao`) VALUES
(1, 'Eletrodomestico', 'Problemas com seus eletrodomésticos (Aparelhos/objetos presentes em sua casa)');

-- --------------------------------------------------------

--
-- Estrutura para view `list_servicos`
--
DROP TABLE IF EXISTS `list_servicos`;

DROP VIEW IF EXISTS `list_servicos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_servicos`  AS SELECT `pr`.`id_profissional` AS `id_profissional`, `pe`.`id_profissional` AS `id_profissional_vinculado`, `pe`.`id_pedido` AS `id_pedido`, concat(`c`.`nome`,' ',`c`.`sobrenome`) AS `nome_completo`, `p`.`nome` AS `problema`, `pe`.`descricao` AS `descricao`, `pe`.`endereco` AS `endereco`, `pe`.`data_solicitacao` AS `data_solicitacao` FROM (((((`profissional` `pr` join `profissional_habilidades` `ph` on((`pr`.`id_profissional` = `ph`.`id_profissional`))) join `problema_habilidades` `prh` on((`ph`.`id_habilidade` = `prh`.`id_habilidade`))) join `pedidos` `pe` on((`prh`.`id_problema` = `pe`.`id_problema`))) join `cliente` `c` on((`c`.`id_cliente` = `pe`.`id_cliente`))) join `problemas` `p` on((`prh`.`id_problema` = `p`.`id_problema`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
