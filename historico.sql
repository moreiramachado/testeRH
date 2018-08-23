-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2018 às 06:34
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `historico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dominios`
--

CREATE TABLE `dominios` (
  `idDominio` int(11) NOT NULL,
  `dominio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dominios`
--

INSERT INTO `dominios` (`idDominio`, `dominio`) VALUES
(1, 'google.com'),
(2, 'alanamachado.com.br'),
(3, 'alanamachado.com.br'),
(4, 'jessicaprasdio.com.br'),
(5, 'filtrato.com.br'),
(6, 'filtrato.com.br'),
(7, 'filtrato.com.br'),
(8, 'oi.com.br'),
(9, 'google.com'),
(10, 'prasdiojessica.com'),
(11, 'twitter.com'),
(12, 'twitter.com'),
(13, 'gmail.com'),
(14, 'gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dominios`
--
ALTER TABLE `dominios`
  ADD PRIMARY KEY (`idDominio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dominios`
--
ALTER TABLE `dominios`
  MODIFY `idDominio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
