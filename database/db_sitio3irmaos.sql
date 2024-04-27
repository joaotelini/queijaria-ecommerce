-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/04/2024 às 05:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sitio3irmaos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `num_pedido` int(11) NOT NULL,
  `valor_pedido` double NOT NULL,
  `pago` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidoproduto`
--

CREATE TABLE `pedidoproduto` (
  `num_pedido` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_completo`, `email`, `senha`, `logradouro`, `numero`, `bairro`, `celular`) VALUES
(1, 'João Pedro Domingues Telini', 'joaotelini03@gmail.com', '$2y$10$mKDwlWhR548eO7TaozoAke/Z.lU29KMrBjLGzCjZe.j6Wdq24ZCM2', 'Rua do Cubatao', 1743, 'Cubatão', '(19) 99707-7917');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`num_pedido`),
  ADD UNIQUE KEY `num_pedido` (`num_pedido`);

--
-- Índices de tabela `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD KEY `pedidoproduto_fk0` (`num_pedido`),
  ADD KEY `pedidoproduto_fk1` (`usuario_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD CONSTRAINT `pedidoproduto_fk0` FOREIGN KEY (`num_pedido`) REFERENCES `pedido` (`num_pedido`),
  ADD CONSTRAINT `pedidoproduto_fk1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
