--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(150) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `idcliente_UNIQUE` (`idCliente`)
) ENGINE = InnoDB AUTO_INCREMENT = 107 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;

CREATE TABLE `contato` (
  `idContato` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `idCliente` int NOT NULL,
  PRIMARY KEY (`idContato`),
  UNIQUE KEY `idContato_UNIQUE` (`idContato`),
  KEY `fk_Contato_cliente_idx` (`idCliente`),
  CONSTRAINT `fk_Contato_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `itens_pedido`
--

DROP TABLE IF EXISTS `itens_pedido`;

CREATE TABLE `itens_pedido` (
  `iditens_pedido` int NOT NULL AUTO_INCREMENT,
  `idPedido` int NOT NULL,
  `idProduto` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`iditens_pedido`),
  UNIQUE KEY `iditens_pedido_UNIQUE` (`iditens_pedido`),
  KEY `fk_itens_pedido_Pedido1_idx` (`idPedido`),
  KEY `fk_itens_pedido_Produto1_idx` (`idProduto`),
  CONSTRAINT `fk_itens_pedido_Pedido1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  CONSTRAINT `fk_itens_pedido_Produto1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`)
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `idPedido` int NOT NULL AUTO_INCREMENT,
  `data_Cadastro` date NOT NULL,
  `idCliente` int NOT NULL,
  `dataEntrega` date NOT NULL,
  PRIMARY KEY (`idPedido`),
  UNIQUE KEY `idPedido_UNIQUE` (`idPedido`),
  KEY `fk_Pedido_Cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(200) NOT NULL,
  `tipoTecido` varchar(300) NOT NULL,
  `tipoForro` varchar(300) NOT NULL,
  `obesrvacao` text,
  `descricaoBotao` text,
  `descricaoRibite` text,
  `placa` text,
  `tamanho` int NOT NULL,
  `tamanhoCintura` double DEFAULT NULL,
  `tamanhoQuadril` double DEFAULT NULL,
  `tamanhoGanchoTraseiro` double DEFAULT NULL,
  `tamanhoComprimentoPernaLateral` double DEFAULT NULL,
  `tamanhoComprimentoFrentePerna` double DEFAULT NULL,
  `tamanhoLaguraPerna` double DEFAULT NULL,
  `quantidadeRibite` int DEFAULT NULL,
  `quantidadeBotao` int DEFAULT NULL,
  `quantidadePlaca` int DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  UNIQUE KEY `idProduto_UNIQUE` (`idProduto`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_unico` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE = InnoDB AUTO_INCREMENT = 24 DEFAULT CHARSET = utf8mb3;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `mensagens`;

CREATE TABLE `mensagens` (
  `id_msg` int NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE = InnoDB AUTO_INCREMENT = 24 DEFAULT CHARSET = utf8mb3;

INSERT INTO `usuarios` VALUES (26,768021978,'admin','admin@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','1657193785admin.png','Administrador','Ativo');