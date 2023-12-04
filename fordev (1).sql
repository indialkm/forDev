-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2023 às 21:47
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
-- Banco de dados: `fordev`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabadministrativo`
--

CREATE TABLE `tabadministrativo` (
  `adminID` int(11) NOT NULL,
  `adminUsuario` varchar(60) NOT NULL,
  `adminSenha` varchar(300) NOT NULL,
  `adminNome` varchar(60) NOT NULL,
  `adminTelefone` varchar(40) DEFAULT NULL,
  `adminEmail` varchar(60) DEFAULT NULL,
  `adminFoto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabadministrativo`
--

INSERT INTO `tabadministrativo` (`adminID`, `adminUsuario`, `adminSenha`, `adminNome`, `adminTelefone`, `adminEmail`, `adminFoto`) VALUES
(1, 'Maria123', '$2y$10$gdvzMUfrF3Jaw/QCYr6TnOCJdl.R9oVA3RN0FmKlRkexoY5FcU5k.', 'Maria Santos', NULL, '(11) 99999-99999', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabcliente`
--

CREATE TABLE `tabcliente` (
  `clienteId` int(11) NOT NULL,
  `clienteUsuario` varchar(60) NOT NULL,
  `clienteSenha` varchar(300) DEFAULT NULL,
  `clienteNome` varchar(60) NOT NULL,
  `clienteEmail` varchar(60) NOT NULL,
  `clienteFoto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabcliente`
--

INSERT INTO `tabcliente` (`clienteId`, `clienteUsuario`, `clienteSenha`, `clienteNome`, `clienteEmail`, `clienteFoto`) VALUES
(2, 'dindi123', '12345678', 'Ingrid S A Rocha', 'ingridalkm@outlook.com', NULL),
(3, 'ingrid', '$2y$10$AR2a63tKs1XRnpxJofFne..Q.zmHqCXsLprwTb1dpeWs2idynGFwG', 'Ingrid S A Rocha', 'ingridalkm@outlook.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabestoquista`
--

CREATE TABLE `tabestoquista` (
  `estID` int(11) NOT NULL,
  `estUsuario` varchar(60) NOT NULL,
  `estSenha` varchar(300) NOT NULL,
  `estNome` varchar(60) NOT NULL,
  `estTelefone` varchar(40) DEFAULT NULL,
  `estEmail` varchar(60) DEFAULT NULL,
  `estFoto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabestoquista`
--

INSERT INTO `tabestoquista` (`estID`, `estUsuario`, `estSenha`, `estNome`, `estTelefone`, `estEmail`, `estFoto`) VALUES
(1, 'Joana123', '$2y$10$LoS0BJ.dmpw3rZHLmShDxexzg.3RnXEp7o6uinxPTTiT3k5miPfNG', 'Joana Santos', '11 999999999', 'joana123@email.com.br', NULL),
(6, 'Nero123', '$2y$10$MXDdl5fmUZitXhsFgW/Gv.Nf1A2yaK3JOBfnzggO67lW3ppEUZf0C', 'Nero Noru Toto', '(11) 9 9999-9999', 'neronorutoto@email.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabfornecedor`
--

CREATE TABLE `tabfornecedor` (
  `nomeFornecedor` varchar(60) NOT NULL,
  `emailFornecedor` varchar(60) DEFAULT NULL,
  `telefoneFornecedor` varchar(30) DEFAULT NULL,
  `enderecoFornecedor` varchar(1000) DEFAULT NULL,
  `observacaoFornecedor` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabfornecedor`
--

INSERT INTO `tabfornecedor` (`nomeFornecedor`, `emailFornecedor`, `telefoneFornecedor`, `enderecoFornecedor`, `observacaoFornecedor`) VALUES
('Caixas.SA', 'caixas.sa@gmail.com', '(11) 9 8787-4545', 'Rua das caixas, 15 - Guarulhos-SP', 'Vende com 15% de desconto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabproduto`
--

CREATE TABLE `tabproduto` (
  `produtoID` int(11) NOT NULL,
  `produtoNome` varchar(40) NOT NULL,
  `produtoPreco` decimal(10,2) NOT NULL DEFAULT 0.00,
  `produtoDescricao` varchar(1000) DEFAULT NULL,
  `produtoTipo` varchar(60) DEFAULT NULL,
  `produtoquantidade` int(11) DEFAULT NULL,
  `FK_produtoEstoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabprodutoestoque`
--

CREATE TABLE `tabprodutoestoque` (
  `prodEstoqueID` int(11) NOT NULL,
  `prodEstoqueNome` varchar(60) NOT NULL,
  `prodEstoquePreco` decimal(10,2) DEFAULT 0.00,
  `prodEstoqueDescricao` varchar(1000) DEFAULT NULL,
  `prodEstoqueQuantidade` int(11) DEFAULT NULL,
  `prodEstoqueTipo` varchar(60) DEFAULT NULL,
  `dataproduto` date NOT NULL,
  `FK_fornecedorID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabprodutoestoque`
--

INSERT INTO `tabprodutoestoque` (`prodEstoqueID`, `prodEstoqueNome`, `prodEstoquePreco`, `prodEstoqueDescricao`, `prodEstoqueQuantidade`, `prodEstoqueTipo`, `dataproduto`, `FK_fornecedorID`) VALUES
(7, 'Caixa de Papelão', 15.50, '30x15x20 caixa para envio 01', NULL, '1', '0000-00-00', 'Caixas.SA');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tabadministrativo`
--
ALTER TABLE `tabadministrativo`
  ADD PRIMARY KEY (`adminID`);

--
-- Índices de tabela `tabcliente`
--
ALTER TABLE `tabcliente`
  ADD PRIMARY KEY (`clienteId`);

--
-- Índices de tabela `tabestoquista`
--
ALTER TABLE `tabestoquista`
  ADD PRIMARY KEY (`estID`);

--
-- Índices de tabela `tabfornecedor`
--
ALTER TABLE `tabfornecedor`
  ADD PRIMARY KEY (`nomeFornecedor`);

--
-- Índices de tabela `tabproduto`
--
ALTER TABLE `tabproduto`
  ADD PRIMARY KEY (`produtoID`),
  ADD KEY `FK_PP_PRODUTOESTOQUEID` (`FK_produtoEstoque`);

--
-- Índices de tabela `tabprodutoestoque`
--
ALTER TABLE `tabprodutoestoque`
  ADD PRIMARY KEY (`prodEstoqueID`),
  ADD UNIQUE KEY `prodEstoqueTipo` (`prodEstoqueTipo`),
  ADD KEY `PE_FK_fornecedorNome` (`FK_fornecedorID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabadministrativo`
--
ALTER TABLE `tabadministrativo`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tabcliente`
--
ALTER TABLE `tabcliente`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tabestoquista`
--
ALTER TABLE `tabestoquista`
  MODIFY `estID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tabproduto`
--
ALTER TABLE `tabproduto`
  MODIFY `produtoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tabprodutoestoque`
--
ALTER TABLE `tabprodutoestoque`
  MODIFY `prodEstoqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tabproduto`
--
ALTER TABLE `tabproduto`
  ADD CONSTRAINT `FK_PP_PRODUTOESTOQUEID` FOREIGN KEY (`FK_produtoEstoque`) REFERENCES `tabprodutoestoque` (`prodEstoqueID`);

--
-- Restrições para tabelas `tabprodutoestoque`
--
ALTER TABLE `tabprodutoestoque`
  ADD CONSTRAINT `PE_FK_fornecedorNome` FOREIGN KEY (`FK_fornecedorID`) REFERENCES `tabfornecedor` (`nomeFornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
