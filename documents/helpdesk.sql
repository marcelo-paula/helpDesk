-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Dez-2022 às 19:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_conclusao` datetime DEFAULT NULL,
  `concluida` tinyint(1) DEFAULT 0,
  `status` varchar(255) DEFAULT 'em aberto',
  `id_usuario` int(11) NOT NULL,
  `deletado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `titulo`, `descricao`, `data_criacao`, `data_conclusao`, `concluida`, `status`, `id_usuario`, `deletado`) VALUES
(1, 'teste', 'teste', '2022-12-21 15:15:26', '2022-12-26 12:16:05', 0, 'em andamento', 0, 0),
(2, 'teste', 'edwefdwerf', '2022-12-21 15:41:14', NULL, 0, 'em andamento', 26, 1),
(3, 'aaaaaaaaa', 'aaaaaaaaa', '2022-12-21 17:28:03', NULL, 0, 'em aberto', 26, 0),
(4, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', '2022-12-21 17:28:08', NULL, 0, 'em aberto', 26, 1),
(5, 'iiiiiiii', 'rrrrrrrrrrr', '2022-12-21 17:28:21', '2022-12-23 15:36:10', 1, 'finalizado', 26, 0),
(6, 'wqewdwd', 'dferfref', '2022-12-22 14:03:57', NULL, 0, 'em aberto', 26, 1),
(7, 'eieieieie', 'oioioioi', '2022-12-22 14:04:01', '2022-12-23 15:36:22', 1, 'finalizado', 26, 0),
(8, 'teste', 'teste', '2022-12-22 14:53:00', '2022-12-23 15:36:55', 1, 'finalizado', 26, 1),
(9, 'teste', 'aaaa', '2022-12-22 14:53:04', '2022-12-23 15:39:13', 0, 'finalizado', 26, 0),
(10, 'teste', 'aaaa', '2022-12-22 14:53:07', '2022-12-26 12:17:37', 0, 'finalizado', 26, 1),
(11, 'teste', 'aaaa', '2022-12-22 14:53:14', '2022-12-26 12:20:53', 1, 'finalizado', 26, 0),
(12, 'teste', 'aaa', '2022-12-22 14:53:19', NULL, 0, 'finalizado', 26, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `deletado` int(11) NOT NULL DEFAULT 0,
  `data_cadastro` datetime NOT NULL,
  `nivel` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `login`, `email`, `senha`, `deletado`, `data_cadastro`, `nivel`) VALUES
(1, 'marcelo henrique xavier de paula', 'marcelo.hxavier', 'marcelo_xavierpaula@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-12-21 08:17:45', 0),
(2, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 08:19:08', 0),
(3, 'igor cacerez', 'igor ca', 'igor@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-12-21 09:27:06', 0),
(4, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:42', 0),
(5, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:42', 0),
(6, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:43', 0),
(7, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:43', 0),
(8, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:43', 0),
(9, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:43', 0),
(10, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(11, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(12, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(13, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(14, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(15, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:44', 0),
(16, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(17, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(18, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(19, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(20, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(21, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:45', 0),
(22, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:46', 0),
(23, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:46', 0),
(24, 'igor', 'igor', 'igor@hotmail.com', '123', 1, '2022-12-21 10:11:46', 0),
(25, 'Marcelo', 'marceloh', 'marcelo_xavierpaula@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-12-21 11:12:16', 0),
(26, 'Marcelo', '12', 'marcelo_xavierpaula@hotmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, '2022-12-21 11:15:30', 1),
(27, 'igor', 'igor123', 'igor@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2022-12-21 13:48:06', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
