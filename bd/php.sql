-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Out-2021 às 16:44
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `IdCarro` int(11) NOT NULL,
  `nomeCarro` varchar(100) NOT NULL,
  `marcaCarro` varchar(100) NOT NULL,
  `anoCarro` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`IdCarro`, `nomeCarro`, `marcaCarro`, `anoCarro`) VALUES
(1, 'Corsa', 'Chevrolet', 2008),
(2, 'March', 'Nissan', 2014),
(3, 'Civic', 'Honda', 2009),
(4, 'Fiesta Sedan', 'Ford', 2013),
(6, 'Bandeirantes', 'Toyota', 2001),
(7, '350z', 'Nissan', 2005),
(8, 'Fit', 'Honda', 2020),
(9, 'Versa', 'Nissan', 2016),
(10, 'Hilux', 'Toyota', 2010),
(14, 'Corsa Sedan', 'Chevrolet', 2010),
(21, 'Fiesta', 'Ford', 2014),
(23, 'Volkswagen', 'Polo', 2017),
(24, 'Fit', 'Honda', 2006),
(25, 'Civic', 'Honda', 2007);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`) VALUES
(2, 'Lucas', 'lucaslotti@gmail.com', '123'),
(4, 'Marcus', 'marcusvinicius@gmail.com', '123'),
(9, 'Emmanuel', 'emmanuelzague@gmail.com', '123'),
(10, 'Carlos', 'carloseduardo@gmail.com', '123'),
(11, 'Pajé', 'matheuspaje@gmail.com', '123'),
(12, 'Kevin', 'kevinortega@gmail.com', '123'),
(13, 'Gabriel', 'gabrielezequiel@gmail.com', '123'),
(14, 'Jorck', 'liljorck@gmail.com', '123'),
(27, 'Hanne', 'hannestephany@gmail.com', '123'),
(28, 'Michele', 'mikayonekawa@gmail.com', '123'),
(29, 'Thomas', 'thomasmikio@gmail.com', '123'),
(30, 'Fabio Koga', 'fabiokoga@gmail.com', '123'),
(31, 'Matheus GD', 'matheusgd@gmail.com', '123'),
(33, 'Renan', 'renancesar@gmail.com', '123'),
(34, 'Igor', 'igorazevex@gmail.com', '123'),
(35, 'Wesley', 'wesleydomingues@gmail.com', '123'),
(36, 'Gilmar Alonso', 'gilmaralonso@gmail.com', '123'),
(37, 'Luigi', 'luigimendes@gmail.com', '123'),
(38, 'Bruno', 'brunolotze@gmail.com', '123'),
(39, 'Erik', 'anthony@gmail.com', '123'),
(40, 'Gregory', 'gregory@gmail.com', '123'),
(41, 'Alciomar', 'alciomarhollanda@gmail.com', '123'),
(42, 'Nicolas', 'nicolasyonekawa@gmail.com', '123'),
(79, 'Solange', 'solangeyonekawa@gmail.com', '123'),
(80, 'Marcelo', 'marceloyonekawa@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voto`
--

CREATE TABLE `voto` (
  `IdVoto` int(11) NOT NULL,
  `candidato` varchar(100) NOT NULL,
  `nVotos` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `voto`
--

INSERT INTO `voto` (`IdVoto`, `candidato`, `nVotos`) VALUES
(1, 'Coxinha', 2),
(2, 'Pizza', 2),
(3, 'Pastel', 1),
(4, 'Branco', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`IdCarro`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`IdVoto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `IdCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `voto`
--
ALTER TABLE `voto`
  MODIFY `IdVoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
