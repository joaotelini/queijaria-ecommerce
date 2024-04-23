CREATE TABLE IF NOT EXISTS `usuario` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nome_completo` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`senha` varchar(255) NOT NULL,
	`logradouro` varchar(255) NOT NULL,
	`numero` int NOT NULL,
	`bairro` varchar(255) NOT NULL,
	`celular` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `produto` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nome_produto` varchar(255) NOT NULL,
	`valorUnitario` double NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `pedido` (
	`num_pedido` int NOT NULL UNIQUE,
	`valor_pedido` double NOT NULL,
	PRIMARY KEY (`num_pedido`)
);

CREATE TABLE IF NOT EXISTS `pedidoproduto` (
	`num_pedido` int NOT NULL,
	`usuario_id` int NOT NULL,
	`nome_produto` varchar(255) NOT NULL,
	`quantidade` int NOT NULL,
	`valor_unitario` double NOT NULL
);




ALTER TABLE `pedidoproduto` ADD CONSTRAINT `pedidoproduto_fk0` FOREIGN KEY (`num_pedido`) REFERENCES `pedido`(`num_pedido`);

ALTER TABLE `pedidoproduto` ADD CONSTRAINT `pedidoproduto_fk1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`);

ALTER TABLE `pedidoproduto` ADD CONSTRAINT `pedidoproduto_fk2` FOREIGN KEY (`nome_produto`) REFERENCES `produto`(`nome_produto`);

ALTER TABLE `pedidoproduto` ADD CONSTRAINT `pedidoproduto_fk4` FOREIGN KEY (`valor_unitario`) REFERENCES `produto`(`valorUnitario`);

INSERT INTO `produto` (`id`, `nome_produto`, `valorUnitario`) VALUES (NULL, 'Queijo Fresco', '40');
INSERT INTO `produto` (`id`, `nome_produto`, `valorUnitario`) VALUES (NULL, 'Queijo Curado', '50');
INSERT INTO `produto` (`id`, `nome_produto`, `valorUnitario`) VALUES (NULL, 'Leite 2L', '10');