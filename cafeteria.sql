-- phpMyAdmin SQL Dump
-- version 2.11.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Dez 06, 2018 as 07:07 PM
-- Versão do Servidor: 5.7.21
-- Versão do PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `idCliente`, `idProduto`, `qtde`) VALUES
(0000000001, 1, 1, 4),
(0000000003, 1, 2, 2),
(0000000004, 1, 10, 4),
(0000000005, 1, 16, 1);
