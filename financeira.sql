-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Nov-2021 às 23:02
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alto`
--

CREATE TABLE `alto` (
  `id` int(11) NOT NULL,
  `co12` double NOT NULL,
  `co24` double NOT NULL,
  `co36` double NOT NULL,
  `co48` double NOT NULL,
  `co60` double NOT NULL,
  `co72` double NOT NULL,
  `co84` double NOT NULL,
  `cms12` double NOT NULL,
  `cms24` double NOT NULL,
  `cms36` double NOT NULL,
  `cms48` double NOT NULL,
  `cms60` double NOT NULL,
  `cms72` double NOT NULL,
  `cms84` double NOT NULL,
  `taxa84` double NOT NULL,
  `taxa72` double NOT NULL,
  `taxa60` double NOT NULL,
  `taxa48` double NOT NULL,
  `taxa36` double NOT NULL,
  `taxa24` double NOT NULL,
  `taxa12` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alto`
--

INSERT INTO `alto` (`id`, `co12`, `co24`, `co36`, `co48`, `co60`, `co72`, `co84`, `cms12`, `cms24`, `cms36`, `cms48`, `cms60`, `cms72`, `cms84`, `taxa84`, `taxa72`, `taxa60`, `taxa48`, `taxa36`, `taxa24`, `taxa12`) VALUES
(2, 0.0284, 0.0365, 0.0584, 0.02253, 0.0252, 0.0224, 0.0225, 0.02, 0.02, 0.03, 0.04, 0.045, 0.05, 0.07, 1.79, 1.79, 1.79, 1.79, 1.79, 1.79, 1.79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medio`
--

CREATE TABLE `medio` (
  `id` int(11) NOT NULL,
  `co12` double NOT NULL,
  `co24` double NOT NULL,
  `co36` double NOT NULL,
  `co48` double NOT NULL,
  `co60` double NOT NULL,
  `co72` double NOT NULL,
  `co84` double NOT NULL,
  `cms12` double NOT NULL,
  `cms24` double NOT NULL,
  `cms36` double NOT NULL,
  `cms48` double NOT NULL,
  `cms60` double NOT NULL,
  `cms72` double NOT NULL,
  `cms84` double NOT NULL,
  `taxa84` double NOT NULL,
  `taxa72` double NOT NULL,
  `taxa60` double NOT NULL,
  `taxa48` double NOT NULL,
  `taxa36` double NOT NULL,
  `taxa24` double NOT NULL,
  `taxa12` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medio`
--

INSERT INTO `medio` (`id`, `co12`, `co24`, `co36`, `co48`, `co60`, `co72`, `co84`, `cms12`, `cms24`, `cms36`, `cms48`, `cms60`, `cms72`, `cms84`, `taxa84`, `taxa72`, `taxa60`, `taxa48`, `taxa36`, `taxa24`, `taxa12`) VALUES
(1, 0.0284, 0.0365, 0.0584, 0.02253, 0.0252, 0.0224, 0.0225, 0.01, 0.01, 0.01, 0.01, 0.01, 0.025, 0.035, 1.79, 1.79, 1.79, 1.79, 1.79, 1.79, 1.79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `simulahome`
--

CREATE TABLE `simulahome` (
  `id` int(11) NOT NULL,
  `co84` double NOT NULL,
  `co72` double NOT NULL,
  `co60` double NOT NULL,
  `co48` double NOT NULL,
  `co36` double NOT NULL,
  `co24` double NOT NULL,
  `co12` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `simulahome`
--

INSERT INTO `simulahome` (`id`, `co84`, `co72`, `co60`, `co48`, `co36`, `co24`, `co12`) VALUES
(1, 0.02564, 0.02241, 0.22221, 0.0284, 0.036, 0.0365, 0.012);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `senha`, `nome`, `nivel`) VALUES
(4, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'administrador', 2),
(6, 'dt54321', 'e10adc3949ba59abbe56e057f20f883e', '0', 1),
(7, 'userteste5', '81dc9bdb52d04dc20036dbd8313ed055', 'TESTE', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `zerado`
--

CREATE TABLE `zerado` (
  `id` int(11) NOT NULL,
  `co12` double NOT NULL,
  `co24` double NOT NULL,
  `co36` double NOT NULL,
  `co48` double NOT NULL,
  `co60` double NOT NULL,
  `co72` double NOT NULL,
  `co84` double NOT NULL,
  `cms84` double NOT NULL,
  `cms72` double NOT NULL,
  `cms60` double NOT NULL,
  `cms48` double NOT NULL,
  `cms36` double NOT NULL,
  `cms24` double NOT NULL,
  `cms12` double NOT NULL,
  `taxa84` double NOT NULL,
  `taxa72` double NOT NULL,
  `taxa60` double NOT NULL,
  `taxa48` double NOT NULL,
  `taxa36` double NOT NULL,
  `taxa24` double NOT NULL,
  `taxa12` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `zerado`
--

INSERT INTO `zerado` (`id`, `co12`, `co24`, `co36`, `co48`, `co60`, `co72`, `co84`, `cms84`, `cms72`, `cms60`, `cms48`, `cms36`, `cms24`, `cms12`, `taxa84`, `taxa72`, `taxa60`, `taxa48`, `taxa36`, `taxa24`, `taxa12`) VALUES
(1, 0.0284, 0.0284, 0.0284, 0.0284, 0.0284, 0.0284, 0.0284, 0, 0, 0, 0, 0, 0, 0, 1.79, 1.79, 1.79, 1.79, 1.79, 1.79, 1.8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alto`
--
ALTER TABLE `alto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medio`
--
ALTER TABLE `medio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `simulahome`
--
ALTER TABLE `simulahome`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `zerado`
--
ALTER TABLE `zerado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alto`
--
ALTER TABLE `alto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medio`
--
ALTER TABLE `medio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `simulahome`
--
ALTER TABLE `simulahome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `zerado`
--
ALTER TABLE `zerado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
