-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Jun-2023 às 06:42
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

DROP TABLE IF EXISTS `campeonatos`;
CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int NOT NULL AUTO_INCREMENT,
  `nome_campeonato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pais_campeonato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome_campeonato`, `pais_campeonato`) VALUES
(1, 'Premier League', 'Inglaterra'),
(3, 'Campeonato Brasileiro', 'Brasil'),
(4, 'Bundesliga', 'Alemanha'),
(5, 'La liga', 'Espanha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

DROP TABLE IF EXISTS `jogadores`;
CREATE TABLE IF NOT EXISTS `jogadores` (
  `id_jogador` int NOT NULL AUTO_INCREMENT,
  `nome_jogador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idade_jogador` date NOT NULL,
  `posicao_jogador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class_jogador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_time` int NOT NULL,
  PRIMARY KEY (`id_jogador`),
  KEY `id_time` (`id_time`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogador`, `nome_jogador`, `idade_jogador`, `posicao_jogador`, `class_jogador`, `id_time`) VALUES
(3, 'Jonathan Calleri ', '1993-09-23', 'Centroavante', '79', 3),
(4, 'Rodrigo Huendra ', '2004-03-16', 'Meia', '66', 3),
(5, 'Wendell Douglas', '2003-07-31', 'Ala Direito', '66', 4),
(6, 'Vinícius Junior', '2000-07-12', 'Ponta Esquerda', '92', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnicos`
--

DROP TABLE IF EXISTS `tecnicos`;
CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id_tecnico` int NOT NULL AUTO_INCREMENT,
  `nome_tecnico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idade_tecnico` date NOT NULL,
  `id_time` int NOT NULL,
  PRIMARY KEY (`id_tecnico`),
  KEY `id_time` (`id_time`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tecnicos`
--

INSERT INTO `tecnicos` (`id_tecnico`, `nome_tecnico`, `idade_tecnico`, `id_time`) VALUES
(4, 'Erik ten Hag', '1970-02-02', 1),
(5, 'Carlo Ancelotti', '1959-06-10', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE IF NOT EXISTS `times` (
  `id_time` int NOT NULL AUTO_INCREMENT,
  `nome_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alcunha_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estadio_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mascote_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_campeonato` int DEFAULT NULL,
  PRIMARY KEY (`id_time`),
  KEY `FK_times_campeonatos` (`id_campeonato`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id_time`, `nome_time`, `alcunha_time`, `estadio_time`, `mascote_time`, `id_campeonato`) VALUES
(1, 'Manchester United', 'Red Devils', 'Old Trafford', 'Fred the Red', 1),
(3, 'São Paulo', 'Tricolor', 'Morumbi', 'Santo Paulo', 3),
(4, 'Borussia Dortmund', 'Die Borussen', 'Signal Iduna Park', 'Emma', 4),
(5, 'Real Madrid', 'Merengues', 'Santiago Bernabeu', 'Merengue', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
