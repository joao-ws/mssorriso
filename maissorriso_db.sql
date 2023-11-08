-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/10/2023 às 20:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maissorriso_db`
--
CREATE DATABASE IF NOT EXISTS `maissorriso_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `maissorriso_db`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE IF NOT EXISTS `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `hora` time NOT NULL,
  `data` date NOT NULL,
  `procedimento` varchar(45) NOT NULL,
  `observacao` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `id_paciente`, `hora`, `data`, `procedimento`, `observacao`) VALUES
(33, 2, '16:00:00', '2023-10-24', 'Facetas', '123456789097'),
(34, 2, '11:00:00', '2023-10-17', 'Facetas', '12dadwdq3r323d2f3adadadadadad'),
(38, 2, '15:00:00', '2023-10-11', 'Facetas', '135');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `codigo_login` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `senha_login` varchar(32) NOT NULL,
  `tipo_login` int(11) NOT NULL,
  PRIMARY KEY (`codigo_login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`codigo_login`, `email`, `senha_login`, `tipo_login`) VALUES
(1, 'admin@admin.com', '123', 0),
(2, 'paciente@paciente.com', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_login` int(11) NOT NULL,
  `nome_paciente` char(45) NOT NULL,
  `cpf` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `telefone` bigint(11) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `UQ_paciente_telefone` (`telefone`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_paciente_login` (`codigo_login`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `codigo_login`, `nome_paciente`, `cpf`, `telefone`) VALUES
(2, 2, 'Paciente', 08798066578, 92993678905);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissional`
--

CREATE TABLE IF NOT EXISTS `profissional` (
  `id_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `nome_profissional` varchar(45) NOT NULL,
  `especialidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id_profissional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_login` FOREIGN KEY (`codigo_login`) REFERENCES `login` (`codigo_login`),
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`codigo_login`) REFERENCES `login` (`codigo_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
