-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.epizy.com
-- Tempo de geração: 28/03/2021 às 16:15
-- Versão do servidor: 5.6.48-88.0
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_27045101_system`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avais`
--

CREATE TABLE `avais` (
  `id` int(255) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(3) NOT NULL DEFAULT '0',
  `motivo` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `avais`
--

INSERT INTO `avais` (`id`, `user`, `data_inicio`, `data_fim`, `status`, `motivo`) VALUES
(1, 'theGuiihBR', '2020-11-13 23:13:00', '2020-11-13 23:24:00', 2, ''),
(2, 'theGuiihBR', '2020-11-13 23:45:00', '2020-12-10 23:42:00', 2, 'testk\r\n'),
(3, 'patrickcor21', '2020-11-14 00:14:00', '2020-11-18 00:14:00', 2, 'Calaboca'),
(4, 'Xx-Monofocker', '2020-12-03 17:00:00', '2020-12-08 17:00:00', 2, 'Problemas pessoais.'),
(5, 'Sigm4', '2020-12-04 03:58:00', '2020-12-04 03:58:00', 2, 'To triste demais munlaia ;-;'),
(6, 'Crazzy-DPH', '2020-12-12 04:04:00', '2020-12-17 04:05:00', 2, '-x-'),
(7, 'Crazzy-DPH', '2020-12-17 18:27:00', '2020-12-26 18:00:00', 1, '-x-');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avisos`
--

CREATE TABLE `avisos` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mensagem` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `avisos`
--

INSERT INTO `avisos` (`id`, `usr_habbo`, `mensagem`) VALUES
(1, 'theGuiihBR', '<p><u>Seja bem-vindo ao System da Pol&iacute;cia DPM <span style=\"background-color: #ffffff; color: #4d5156; font-family: arial, sans-serif; font-size: 14px;\">&reg;</span></u></p><p><br></p><p><br></p><p><strong>N&Atilde;O CONFIEM EM IMITA&Ccedil;&Otilde;ES DE NOSSO DEPARTAMENTO.</strong></p><p><br></p><p><strong>&bull; Contratos est&atilde;o sendo realizados at&eacute; TENENTE-CORONEL.</strong></p><p><br></p><p><strong>&bull; Inspetores+ est&atilde;o permitidos de contratarem at&eacute; CAPIT&Atilde;O, com o aviso pr&eacute;vio de um Diretor+ pra atualizar o controle.&nbsp;</strong></p><p><strong>Contratos acima disso, somente com a PRESID&Ecirc;NCIA em casos raros.</strong></p><p><br></p><p><strong>A fase de contratos &eacute; tempor&aacute;ria.</strong></p><p><br></p><p>Atenciosamente, Presid&ecirc;ncia da POL&Iacute;CIA DPM &reg;</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>'),
(2, 'theGuiihBR', '   ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `guias`
--

CREATE TABLE `guias` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `guias`
--

INSERT INTO `guias` (`id`, `nickname`, `cargo`) VALUES
(1, 'theGuiihBR', 2),

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(255) NOT NULL,
  `enviado_por` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tipo` int(10) NOT NULL,
  `msg` varchar(10000) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id`, `enviado_por`, `usr_habbo`, `tipo`, `msg`, `data`) VALUES
(1, 'RenatoPires', 'Dan_Stabile', 1, 'DeterminaÃ§Ã£o Presidencial.', '2020-11-18 18:42:53');


-- --------------------------------------------------------

--
-- Estrutura para tabela `instrutores`
--

CREATE TABLE `instrutores` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `instrutores`
--

INSERT INTO `instrutores` (`id`, `nickname`, `cargo`) VALUES
(1, 'theGuiihBR', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id` bigint(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` varchar(10000) DEFAULT NULL,
  `usr_ip` varchar(255) NOT NULL,
  `log_tipo` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id`, `usr_habbo`, `data`, `msg`, `usr_ip`, `log_tipo`) VALUES
(1, 'theGuiihBR', '2020-11-11 20:47:12', 'Fez login no sistema com o IP', '::1', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_patente` int(11) NOT NULL,
  `usr_promo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_responsavel` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_status` int(11) NOT NULL DEFAULT '1',
  `usr_executivo` int(2) NOT NULL DEFAULT '0',
  `usr_destaque` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `membros`
--

INSERT INTO `membros` (`id`, `usr_habbo`, `usr_patente`, `usr_promo`, `usr_responsavel`, `usr_status`, `usr_executivo`, `usr_destaque`) VALUES
(1, 'theGuiihBR', 0, '2020-11-11 20:46:57', 'theGuiihBR', 1, 0, 0),
(2, 'RenatoPires', 1, '2020-11-12 02:51:41', 'patrickcor21', 1, 0, 0),
(3, 'patrickcor21', 2, '2020-12-08 23:05:57', 'RenatoPires', 1, 0, 0),
(4, 'Gi_Olivero1234', 5, '2020-11-13 05:00:48', 'patrickcor21', 1, 0, 0),
(5, '!kx', 3, '2020-11-13 05:05:20', 'patrickcor21', 1, 0, 0),
(6, 'lormaxy', 5, '2020-11-13 17:53:36', 'patrickcor21', 1, 0, 0),
(7, 'Dan_Stabile', 8, '2020-11-18 23:59:30', 'RenatoPires', 3, 0, 0),
(8, 'SrOlivero', 7, '2020-11-18 20:53:10', 'RenatoPires', 1, 0, 0),
(9, 'iTzNoTo', 8, '2020-12-05 19:57:31', 'patrickcor21', 3, 0, 0),
(10, 'Startao', 16, '2020-12-16 19:56:24', 'patrickcor21', 3, 0, 0),
(11, 'Xx-Monofocker', 7, '2020-12-16 18:16:23', 'patrickcor21', 3, 0, 0),
(12, 'Cauan7371', 12, '2020-12-05 20:36:22', 'patrickcor21', 3, 0, 0),
(13, 'Nayir', 17, '2020-12-16 19:57:33', 'patrickcor21', 3, 0, 0),
(14, 'dhiogodesouza', 12, '2020-11-23 22:14:52', 'RenatoPires', 3, 0, 0),
(15, 'Uchira-Richard', 10, '2020-12-01 02:13:22', 'lormaxy', 3, 0, 0),
(16, 'GreenDayyyy', 14, '2020-12-16 19:42:46', 'patrickcor21', 3, 0, 0),
(17, 'ser2-r73', 17, '2020-12-05 20:44:05', 'patrickcor21', 3, 0, 0),
(18, 'Crazzy-DPH', 5, '2020-11-22 01:51:24', 'patrickcor21', 1, 0, 0),
(19, '-Julia20-', 11, '2020-12-08 02:11:07', 'lormaxy', 3, 0, 0),
(20, 'Pele-mito', 17, '2020-12-05 20:44:33', 'patrickcor21', 3, 0, 0),
(21, 'Gregor1001', 17, '2020-11-22 02:53:31', 'RenatoPires', 1, 1, 0),
(22, '-Siggy', 13, '2020-12-05 20:38:06', 'patrickcor21', 3, 0, 0),
(23, 'danielsilva455', 16, '2020-12-05 20:41:11', 'patrickcor21', 3, 0, 0),
(24, 'Clouuds', 12, '2020-12-16 19:55:01', 'patrickcor21', 3, 0, 0),
(25, 'hitalo942', 11, '2020-11-22 20:44:58', 'RenatoPires', 3, 0, 0),
(26, 'guildiasgen', 12, '2020-12-05 20:02:35', 'patrickcor21', 3, 0, 0),
(27, '_JhonKing_', 8, '2020-12-15 00:55:22', 'Crazzy-DPH', 3, 0, 0),
(28, 'nicolas2032', 13, '2020-12-05 20:38:56', 'patrickcor21', 3, 0, 0),
(29, 'teerym', 11, '2020-12-05 19:56:08', 'patrickcor21', 3, 0, 0),
(30, 'EndoYoupaytoba', 17, '2020-12-05 20:45:18', 'patrickcor21', 3, 0, 0),
(31, 'fernandinho0an', 16, '2020-11-25 22:28:39', 'lormaxy', 3, 0, 0),
(32, 'Edblon', 11, '2020-12-05 19:56:30', 'patrickcor21', 3, 0, 0),
(33, '!@_dcg_@! ', 7, '2020-12-16 22:40:20', 'patrickcor21', 3, 0, 0),
(34, 'Pozen', 13, '2020-12-05 20:39:17', 'patrickcor21', 3, 0, 0),
(35, 'DeMax71.', 11, '2020-11-25 00:22:52', 'RenatoPires', 3, 0, 0),
(36, 'marcos65456', 14, '2020-12-05 20:40:07', 'patrickcor21', 3, 0, 0),
(37, 'mackeense', 11, '2020-12-10 19:49:41', 'Crazzy-DPH', 3, 0, 0),
(38, 'xC.R.A.Z.Z.Yx', 11, '2020-11-24 19:59:07', 'RenatoPires', 3, 0, 0),
(39, 'Divisor.', 7, '2020-11-29 15:29:35', 'patrickcor21', 3, 0, 0),
(40, 'xXPittyXxe.', 10, '2020-12-16 18:16:46', 'patrickcor21', 3, 0, 0),
(41, 'DreaLord', 13, '2020-12-19 23:36:56', 'patrickcor21', 1, 0, 0),
(42, 'nicolaspro12', 16, '2020-11-25 18:43:48', 'Platiniem', 3, 0, 0),
(43, '.JaIss.', 17, '2020-12-05 20:45:33', 'patrickcor21', 3, 0, 0),
(44, 'SamandaSeifert', 16, '2020-12-05 20:41:59', 'patrickcor21', 3, 0, 0),
(54, 'guilhermeAstro', 12, '2020-12-03 20:20:43', 'Gi_Olivero1234', 3, 0, 0),
(46, 'Meg4Trick', 17, '2020-12-16 20:01:04', 'patrickcor21', 3, 0, 0),
(47, 'Sercl42755', 11, '2020-11-25 02:22:30', 'Gi_Olivero1234', 3, 0, 0),
(48, 'igor08824', 12, '2020-12-05 19:57:02', 'patrickcor21', 3, 0, 0),
(49, 'oliveirinha0111', 16, '2020-12-05 20:41:48', 'patrickcor21', 3, 0, 0),
(50, '@Yanzin_', 17, '2020-12-05 20:46:14', 'patrickcor21', 3, 0, 0),
(51, 'jhonyy1bc', 12, '2020-12-03 20:15:56', 'Gi_Olivero1234', 3, 0, 0),
(52, 'coronel.soares', 13, '2020-12-05 20:39:27', 'patrickcor21', 3, 0, 0),
(53, 'JohnFennix', 12, '2020-12-16 19:55:27', 'patrickcor21', 3, 0, 0),
(55, 'le.010113 ', 17, '2020-11-24 18:07:23', 'JohnFennix', 1, 0, 0),
(56, 'Bebel39512 ', 17, '2020-12-16 19:57:52', 'patrickcor21', 3, 0, 0),
(58, 'X@-thiagoo-@X', 16, '2020-12-05 20:42:28', 'patrickcor21', 3, 0, 0),
(59, 'XxLosTridentex.', 10, '2020-12-05 19:55:08', 'patrickcor21', 3, 0, 0),
(60, 'Ricardo..:', 7, '2020-12-10 17:47:51', 'patrickcor21', 3, 0, 0),
(61, 'Platiniem', 8, '2020-11-30 23:56:08', 'Crazzy-DPH', 3, 0, 0),
(62, 'mcyuri244hf', 16, '2020-12-05 20:42:47', 'patrickcor21', 3, 0, 0),
(63, 'gustavoBR20203-', 12, '2020-12-10 08:13:43', 'patrickcor21', 3, 0, 0),
(66, 'ser-5q1-4', 17, '2020-12-05 20:50:21', 'patrickcor21', 3, 0, 0),
(64, 'maia-a', 17, '2020-12-16 19:58:06', 'patrickcor21', 3, 0, 0),
(65, 'PMRJ-01', 12, '2020-11-29 20:24:57', 'Crazzy-DPH', 3, 0, 0),
(67, 'Clondy', 12, '2020-12-05 20:37:05', 'patrickcor21', 3, 0, 0),
(68, 'RafaMalik.', 17, '2020-12-05 20:51:21', 'patrickcor21', 3, 0, 0),
(69, 'bruno26120', 17, '2020-12-05 20:51:37', 'patrickcor21', 3, 0, 0),
(70, 'ProxyHB', 7, '2020-11-27 15:23:58', 'RenatoPires', 3, 0, 0),
(71, 'diogo8274', 17, '2020-12-16 20:00:49', 'patrickcor21', 3, 0, 0),
(72, '-Necessaria', 12, '2020-12-05 19:59:49', 'patrickcor21', 3, 0, 0),
(73, 'Hudson7002', 12, '2020-12-03 20:25:46', 'Gi_Olivero1234', 3, 0, 0),
(74, 'Shaka-.', 12, '2020-12-10 08:24:09', 'patrickcor21', 3, 0, 0),
(75, 'yasnmim', 11, '2020-12-03 20:29:05', 'Gi_Olivero1234', 3, 0, 0),
(76, 'ser-8n-318', 17, '2020-12-05 20:52:04', 'patrickcor21', 3, 0, 0),
(77, 'Miguel_Morais77', 11, '2020-12-03 20:27:57', 'Gi_Olivero1234', 3, 0, 0),
(78, 'dragaolendario3', 17, '2020-12-16 19:58:23', 'patrickcor21', 3, 0, 0),
(79, 'jhonyps11222', 17, '2020-12-05 20:52:35', 'patrickcor21', 3, 0, 0),
(85, 'b=:lucas@:=d', 13, '2020-12-01 14:09:24', 'caio28234', 3, 0, 0),
(81, 'caio28234', 6, '2020-12-20 20:23:53', 'patrickcor21', 3, 0, 0),
(82, 'jirayazin', 17, '2020-12-05 20:52:57', 'patrickcor21', 3, 0, 0),
(83, 'YankunSWA', 12, '2020-12-23 21:56:36', 'patrickcor21', 3, 0, 0),
(84, 'guilher12070', 12, '2020-12-05 20:37:35', 'patrickcor21', 3, 0, 0),
(86, 'GFreitas-.', 17, '2020-11-28 18:16:29', 'lormaxy', 1, 0, 0),
(87, 'endrewssantos84', 17, '2020-11-29 19:24:37', 'Hudson7002', 1, 0, 0),
(88, 'MacLeod._', 17, '2020-12-01 22:54:00', 'Crazzy-DPH', 3, 0, 0),
(89, 'seu_madruga_077', 12, '2020-12-10 08:23:45', 'patrickcor21', 3, 0, 0),
(90, 'yLoading...', 17, '2020-12-05 20:53:46', 'patrickcor21', 3, 0, 0),
(91, 'VictorCaceres', 15, '2020-12-07 23:50:18', 'xXPittyXxe.', 1, 0, 0),
(92, 'igor55469', 14, '2020-12-05 20:40:34', 'patrickcor21', 3, 0, 0),
(93, 'pinheirolpa', 7, '2020-12-10 17:43:04', 'patrickcor21', 3, 0, 0),
(94, 'popcorn8701', 17, '2020-12-05 20:54:01', 'patrickcor21', 3, 0, 0),
(95, ',Victor:-', 9, '2020-12-03 20:30:34', 'Gi_Olivero1234', 3, 0, 0),
(96, ',Buckethead', 11, '2020-12-05 20:25:15', 'patrickcor21', 3, 0, 0),
(97, 'Becca2808', 16, '2020-12-16 19:56:44', 'patrickcor21', 3, 0, 0),
(98, 'flavio3962', 17, '2020-12-05 20:54:22', 'patrickcor21', 3, 0, 0),
(99, 'Azzy!', 13, '2020-12-16 19:56:03', 'patrickcor21', 3, 0, 0),
(100, 'nico926', 14, '2020-12-04 20:00:39', 'patrickcor21', 3, 0, 0),
(101, 'alex83617', 12, '2020-12-09 20:10:01', 'caio28234', 3, 0, 0),
(102, '', 17, '2020-12-02 23:46:30', 'YankunSWA', 1, 0, 2),
(103, 'startharim40', 11, '2020-12-16 19:51:40', 'patrickcor21', 3, 0, 0),
(104, 'merio525', 11, '2020-12-07 22:31:29', 'Crazzy-DPH', 3, 0, 0),
(105, 'Brunozx12', 12, '2020-12-10 08:22:33', 'patrickcor21', 3, 0, 0),
(106, 'MeninoDoFIXA', 11, '2020-12-10 08:29:34', 'patrickcor21', 3, 0, 0),
(107, 'TuTyFFC', 16, '2020-12-08 00:37:10', 'RenatoPires', 3, 0, 0),
(108, 'andrei86915', 11, '2020-12-04 18:56:10', 'Crazzy-DPH', 3, 0, 0),
(109, 'ramonis567', 17, '2020-12-03 20:26:24', 'patrickcor21', 3, 0, 0),
(111, 'Bueno_murilo', 12, '2020-12-10 08:22:18', 'patrickcor21', 3, 0, 0),
(112, 'anderso931699', 17, '2020-12-16 19:58:44', 'patrickcor21', 3, 0, 0),
(113, 'joserosa', 17, '2020-12-04 19:35:04', 'mackeense', 1, 0, 0),
(114, '-Mel1-', 11, '2020-12-06 05:49:41', 'patrickcor21', 3, 0, 0),
(115, 'abduzido29', 11, '2020-12-16 19:52:34', 'patrickcor21', 3, 0, 0),
(116, '-DougsBr-', 16, '2020-12-07 02:21:40', 'patrickcor21', 3, 0, 0),
(117, 'gsdomantinho', 17, '2020-12-06 18:10:49', 'patrickcor21', 3, 0, 0),
(118, 'matheus_15-323', 11, '2020-12-16 19:53:46', 'patrickcor21', 3, 0, 0),
(119, 'enzo.a.s', 17, '2020-12-07 20:31:39', 'Crazzy-DPH', 1, 0, 0),
(120, 'OmegaVideos123', 16, '2020-12-16 19:57:09', 'patrickcor21', 3, 0, 0),
(121, 'POCOYOx', 17, '2020-12-16 19:58:57', 'patrickcor21', 3, 0, 0),
(122, '-Camilly.-', 11, '2020-12-16 19:54:35', 'patrickcor21', 3, 0, 0),
(123, 'Luck-1-', 11, '2020-12-19 23:32:34', 'patrickcor21', 3, 0, 0),
(124, 'Adonizedeque!', 13, '2020-12-16 19:15:23', 'patrickcor21', 3, 0, 0),
(125, 'gabrielpar52', 17, '2020-12-10 17:22:08', 'Crazzy-DPH', 1, 0, 0),
(126, 'iurijair72', 17, '2020-12-16 19:59:09', 'patrickcor21', 3, 0, 0),
(127, 'Davizin139', 13, '2020-12-18 16:13:53', 'patrickcor21', 3, 0, 0),
(128, 'ScottelaroHB', 16, '2020-12-16 21:22:09', 'patrickcor21', 1, 0, 0),
(129, '-Yan.?', 17, '2020-12-16 21:07:18', 'patrickcor21', 1, 0, 0),
(130, '-Alec.?', 17, '2020-12-16 21:07:18', 'patrickcor21', 1, 0, 0),
(131, '?-Caiio-?', 17, '2020-12-16 21:07:18', 'patrickcor21', 1, 0, 0),
(132, 'Administrador', 17, '2021-01-06 19:20:38', 'theGuiihBR', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(255) NOT NULL,
  `enviado_por` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_read` int(10) NOT NULL DEFAULT '0',
  `noti_type` int(10) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `enviado_por`, `user`, `msg`, `is_read`, `noti_type`, `data`) VALUES
(1, 'patrickcor21', 'RenatoPires', 'VocÃª foi advertido. Motivos/descriÃ§Ãµes: isso nao deveria acontecer', 1, 2, '2020-11-12 02:50:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `painel`
--

CREATE TABLE `painel` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_perm` int(2) NOT NULL DEFAULT '0',
  `usr_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `painel`
--

INSERT INTO `painel` (`id`, `usr_habbo`, `usr_senha`, `usr_perm`, `usr_cadastro`) VALUES
(1, 'theGuiihBR', '202cb962ac59075b964b07152d234b70', 2, '2020-11-11 20:47:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `patentes`
--

CREATE TABLE `patentes` (
  `id` int(255) NOT NULL,
  `patente` varchar(255) NOT NULL,
  `patente_executivo` varchar(255) NOT NULL,
  `perm_promover` int(10) NOT NULL,
  `perm_rebaixar` int(10) NOT NULL,
  `perm_demitir` int(10) NOT NULL,
  `perm_contratar` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `patentes`
--

INSERT INTO `patentes` (`id`, `patente`, `patente_executivo`, `perm_promover`, `perm_rebaixar`, `perm_demitir`, `perm_contratar`) VALUES
(1, 'Presidente', 'Presidente', 1, 1, 1, 0),
(2, 'Vice-Presidente', 'Vice-Presidente', 2, 2, 3, 0),
(3, 'Supremo', 'Supremo', 4, 4, 4, 0),
(4, 'Diretor-Fundador', 'Líder-Geral', 5, 5, 5, 0),
(5, 'Diretor', 'Líder', 6, 6, 6, 0),
(6, 'Inspetor-Chefe', 'Staff-Geral', 11, 8, 8, 0),
(7, 'Inspetor', 'Staff', 12, 8, 8, 0),
(8, 'Coronel', 'Delegado', 13, 11, 11, 0),
(9, 'Tenente-Coronel', 'Comissário', 13, 12, 12, 0),
(10, 'Major', 'Escrivão', 14, 13, 13, 0),
(11, 'Capitão', 'Embaixador', 15, 0, 14, 0),
(12, 'Tenente', 'Promotor', 16, 0, 15, 0),
(13, 'Aspirante a Oficial', 'Perito', 0, 0, 0, 0),
(14, 'Subtenente', 'Investigador', 0, 0, 0, 0),
(15, 'Sargento', 'Agente', 0, 0, 0, 0),
(16, 'Cabo', 'Sócio', 0, 0, 0, 0),
(17, 'Soldado', 'Soldado', 0, 0, 0, 0),
(0, 'Desenvolvedor', 'Desenvolvedor', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nickname`, `cargo`) VALUES
(1, 'theGuiihBR', 2),
(2, 'patrickcor21', 2),
(3, 'lormaxy', 2),
(4, 'RenatoPires', 2),
(5, 'Gi_Olivero1234', 1),
(8, 'Hudson7002', 1),
(7, 'Uchira-Richard', 1),
(9, '_JhonKing_', 1),
(10, '!@_dcg_@!', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) NOT NULL,
  `recrutas` varchar(255) NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `tipo` int(5) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `usr_habbo`, `recrutas`, `observacoes`, `tipo`, `status`) VALUES
(1, 'patrickcor21', 'RenatoPires', 'asbcsc', 6, 1);
--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `avais`
--
ALTER TABLE `avais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `instrutores`
--
ALTER TABLE `instrutores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr_habbo` (`usr_habbo`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `painel`
--
ALTER TABLE `painel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `avais`
--
ALTER TABLE `avais`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT de tabela `instrutores`
--
ALTER TABLE `instrutores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1125;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de tabela `painel`
--
ALTER TABLE `painel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
