-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura do banco de dados para bd_stocks
CREATE DATABASE IF NOT EXISTS `bd_stocks` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bd_stocks`;

-- Copiando estrutura para tabela bd_stocks.tb_categoria
CREATE TABLE IF NOT EXISTS `tb_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(40) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_stocks.tb_categoria: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` (`id_categoria`, `nome_categoria`) VALUES
	(1, 'Bebida'),
	(2, 'Peixe'),
	(3, 'Perecível');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_stocks.tb_estoque
CREATE TABLE IF NOT EXISTS `tb_estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `cod_produto` int(11) NOT NULL,
  `cod_loja` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `quantidade` decimal(5,2) NOT NULL,
  `data_hora` datetime NOT NULL,
  PRIMARY KEY (`id_estoque`),
  KEY `cod_produto` (`cod_produto`),
  KEY `cod_loja` (`cod_loja`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `tb_estoque_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `tb_produto` (`id_produto`),
  CONSTRAINT `tb_estoque_ibfk_2` FOREIGN KEY (`cod_loja`) REFERENCES `tb_loja` (`id_loja`),
  CONSTRAINT `tb_estoque_ibfk_3` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando estrutura para tabela bd_stocks.tb_loja
CREATE TABLE IF NOT EXISTS `tb_loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `nome_loja` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_stocks.tb_loja: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_loja` DISABLE KEYS */;
INSERT INTO `tb_loja` (`id_loja`, `nome_loja`) VALUES
	(1, 'Hanataba Sushi'),
	(2, 'Ahka Sushi');
/*!40000 ALTER TABLE `tb_loja` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_stocks.tb_produto
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_categoria` int(11) NOT NULL,
  `cod_loja` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL,
  `fornecedor` varchar(20) DEFAULT NULL,
  `unidade_medida` varchar(5) DEFAULT NULL,
  `qtd_minimo` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `cod_categoria` (`cod_categoria`),
  KEY `cod_loja` (`cod_loja`),
  CONSTRAINT `tb_produto_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  CONSTRAINT `tb_produto_ibfk_2` FOREIGN KEY (`cod_loja`) REFERENCES `tb_loja` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Copiando estrutura para tabela bd_stocks.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(40) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(15) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_stocks.tb_usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `telefone`, `email`, `senha`, `tipo_usuario`, `status`) VALUES
	(1, 'Daniel Corral', '99617-0092', 'daniel@gmail.com', '1234', 1, 0),
	(2, 'Gabriel Joaquim', '99631-8054', 'gabriel@gmail.com', '5678', 0, 0),
	(3, 'João Victor', '98205-3415', 'joaovictor@gmail.com', '4321', 0, 0);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_stocks.tb_usuario_loja
CREATE TABLE IF NOT EXISTS `tb_usuario_loja` (
  `id_usuario_loja` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_loja` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_loja`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_loja` (`cod_loja`),
  CONSTRAINT `tb_usuario_loja_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `tb_usuario_loja_ibfk_2` FOREIGN KEY (`cod_loja`) REFERENCES `tb_loja` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_stocks.tb_usuario_loja: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario_loja` DISABLE KEYS */;
INSERT INTO `tb_usuario_loja` (`id_usuario_loja`, `cod_usuario`, `cod_loja`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 1),
	(5, 3, 2);
/*!40000 ALTER TABLE `tb_usuario_loja` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
