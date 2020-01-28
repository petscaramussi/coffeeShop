-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30-Nov-2018 às 20:20
-- Versão do servidor: 5.7.22
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `categoria` enum('Bebida','Salgado','Doce','Combo') NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `qtde` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nome`, `categoria`, `preco`, `qtde`, `descricao`, `foto`) VALUES
(1, 'Cafe', 'Bebida', '2.00', 200, 'Melhor Cafezinho', 'fotos/cafe.png'),
(2, 'churros', 'Doce', '4.00', 20, 'Cochurros', 'fotos/churros.jpg'),
(13, 'Biscoito', 'Doce', '10.00', 50, 'Biscoito quente', 'fotos/4b9a6ae8-biscoito_de_polvilho_com_parmesao_l_thumb.jpg'),
(14, 'Goiabada', 'Doce', '5.00', 12, 'Goiabadinha', 'fotos/goiabada-de-corte-caseira.jpg'),
(15, 'Chocolate', 'Doce', '3.00', 40, 'Chocolate', 'fotos/chocolate.jpg'),
(16, 'Pirulito', 'Doce', '2.00', 20, 'Pirulito que bate bate', 'fotos/download.jpg'),
(17, 'Chiclete', 'Doce', '0.50', 400, 'Chiclete com banana', 'fotos/92d51b213cc4cf1c580e7ef12d4d82f7.png'),
(18, 'Tridente', 'Doce', '2.00', 500, 'Trindente de Hortelã', 'fotos/333.jpg'),
(19, 'Brigadeiro', 'Doce', '2.50', 20, 'Brigadeiro de Smurf', 'fotos/chiclete.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
