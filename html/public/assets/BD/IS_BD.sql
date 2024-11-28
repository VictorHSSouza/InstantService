-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28/11/2024 às 03:17
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
(4, 3, 'ok', 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `chat`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
`id_pedido` int unsigned
,`nome_cliente` varchar(41)
,`nome_profissional` varchar(41)
,`remetente` char(1)
,`mensagem` varchar(255)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `sobrenome`, `login`, `senha`, `email`, `data_nascimento`, `cpf`, `sexo`, `tipo`, `img_perfil`) VALUES
(1, 'Administrador', 'Geral', 'admin', '4988676fdc34d84d026eca2751a2eb27', 'victorhenriquesantanasouza@gmail.com', '2000-02-20', '123.456.789-01', 'M', 5, 'perfil1.png'),
(2, 'gerente', 'IS', 'gerente', '2d86d3f096e9d2c6350f54f3b9528f91', 'thiagohermontsiqueira@gmail.com', '0000-00-00', '111.111.111-11', 'M', 4, 'perfil2.jpg'),
(3, 'funcionario', 'IS', 'funcionario', 'fa7cc236cfb2a732b5fe745755b0e1c3', '22201157@aluno.cotemig.com.br', '0000-00-00', '123.456.789-01', 'F', 3, 'perfil3.jpg'),
(4, 'Profissional', 'IS', 'profissional', 'c2def48cab698acfe53c0c3a9a7a9ded', '22201785@aluno.cotemig.com.br', '2000-02-22', '163.786.536-82', 'O', 2, 'perfil4.jpg'),
(5, 'Cliente', 'IS', 'cliente', '36d22972227f252d6fb05af149c6ad64', 'logindetudo123@gmail.com', '2000-02-22', '234.543.245-34', 'M', 1, 'perfil5.jpg');

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
,`id_cliente` int unsigned
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
  `id_profissional` int DEFAULT NULL,
  `remetente` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`id_mensagem`, `id_pedido`, `id_profissional`, `remetente`, `mensagem`) VALUES
(1, 2, 4, 'P', 'Oiiiii'),
(2, 3, 0, 'U', 'Preciso de ajuda');

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
  `id_status` int NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_profissional`, `id_problema`, `descricao`, `endereco`, `data_solicitacao`, `data_confirmacao`, `data_finalizacao`, `id_status`) VALUES
(1, 5, 4, 1, 'ajuda', 'Rua Professor Ricardo Pinto', '2024-11-27 23:52:40', '2024-11-28 03:01:04', '2024-11-28 00:06:24', 0),
(2, 5, 4, 1, 'deu BO', 'Rua das Palmeiras, 959 - Vila Nova, Curitiba', '2024-11-27 23:58:02', '2024-11-28 03:01:07', NULL, 4),
(3, 5, 4, 1, 'SOS', 'Rua dos Três Irmãos, 877 - Bairro do Sol, Curitiba', '2024-11-27 23:58:30', '2024-11-28 03:01:10', NULL, 3),
(4, 5, 4, 1, 'Lâmpada foi de f', 'Avenida Brasil, 166 - Centro, Belo Horizonte', '2024-11-27 23:59:12', '2024-11-28 03:06:11', NULL, 2),
(5, 5, NULL, 1, 'Queimou', 'Avenida Brasil, 628 - Centro, Belo Horizonte', '2024-11-28 00:01:28', NULL, NULL, 1),
(6, 5, 4, 1, 'Lâmpada queimada', 'Avenida Paulista, 221 - Bairro do Sol', '2024-11-28 00:03:36', '2024-11-28 03:06:14', NULL, 2);

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
(1, 5);

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
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_profissional`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `profissional`
--

INSERT INTO `profissional` (`id_profissional`, `id_estado`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `nome_curriculo`, `status_ativo`, `status_cadastro`, `data_cadastro`) VALUES
(4, 11, '31.710-550', 'Rua Professor Ricardo Pinto', '629', '.', 'Itapoã', 'Belo Horizonte', 'curriculo_user-4.pdf', 1, 1, '2024-11-27 23:41:36');

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
(4, 2, '2024-11-27'),
(4, 5, '2024-11-27'),
(4, 6, '2024-11-27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_pedido`
--

DROP TABLE IF EXISTS `status_pedido`;
CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id_status`, `descricao`) VALUES
(0, 'Finalizado'),
(1, 'Procurando Profissionais'),
(2, 'Profissional aceitou o Pedido'),
(3, 'Aguardando resposta do profissional'),
(4, 'Profissional entrou em contato');

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
-- Estrutura para view `chat`
--
DROP TABLE IF EXISTS `chat`;

DROP VIEW IF EXISTS `chat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chat`  AS SELECT `p`.`id_pedido` AS `id_pedido`, concat(`c`.`nome`,' ',`c`.`sobrenome`) AS `nome_cliente`, ifnull((select concat(`c2`.`nome`,' ',`c2`.`sobrenome`) from `cliente` `c2` where (`c2`.`id_cliente` = `m`.`id_profissional`)),0) AS `nome_profissional`, `m`.`remetente` AS `remetente`, `m`.`mensagem` AS `mensagem` FROM ((`mensagem` `m` join `pedidos` `p` on((`m`.`id_pedido` = `p`.`id_pedido`))) join `cliente` `c` on((`c`.`id_cliente` = `p`.`id_cliente`))) ;

-- --------------------------------------------------------

--
-- Estrutura para view `list_servicos`
--
DROP TABLE IF EXISTS `list_servicos`;

DROP VIEW IF EXISTS `list_servicos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_servicos`  AS SELECT `pr`.`id_profissional` AS `id_profissional`, `pe`.`id_profissional` AS `id_profissional_vinculado`, `pe`.`id_pedido` AS `id_pedido`, `pe`.`id_cliente` AS `id_cliente`, concat(`c`.`nome`,' ',`c`.`sobrenome`) AS `nome_completo`, `p`.`nome` AS `problema`, `pe`.`descricao` AS `descricao`, `pe`.`endereco` AS `endereco`, `pe`.`data_solicitacao` AS `data_solicitacao` FROM (((((`profissional` `pr` join `profissional_habilidades` `ph` on((`pr`.`id_profissional` = `ph`.`id_profissional`))) join `problema_habilidades` `prh` on((`ph`.`id_habilidade` = `prh`.`id_habilidade`))) join `pedidos` `pe` on((`prh`.`id_problema` = `pe`.`id_problema`))) join `cliente` `c` on((`c`.`id_cliente` = `pe`.`id_cliente`))) join `problemas` `p` on((`prh`.`id_problema` = `p`.`id_problema`))) WHERE (`pe`.`id_status` <> 0) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
