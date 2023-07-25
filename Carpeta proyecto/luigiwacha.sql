/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - tenisp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tenisp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tenisp`;

/*Table structure for table `almacen` */

DROP TABLE IF EXISTS `almacen`;

CREATE TABLE `almacen` (
  `ID` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `almacen` */

/*Table structure for table `carritos` */

DROP TABLE IF EXISTS `carritos`;

CREATE TABLE `carritos` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `carritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carritos` */

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categorias` */

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuario_id` (`usuario_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `comentarios` */

/*Table structure for table `detalles_de_carrito` */

DROP TABLE IF EXISTS `detalles_de_carrito`;

CREATE TABLE `detalles_de_carrito` (
  `ID` int(11) NOT NULL,
  `carrito_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `carrito_id` (`carrito_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalles_de_carrito_ibfk_1` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`ID`),
  CONSTRAINT `detalles_de_carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalles_de_carrito` */

/*Table structure for table `detalles_de_pago` */

DROP TABLE IF EXISTS `detalles_de_pago`;

CREATE TABLE `detalles_de_pago` (
  `ID` int(11) NOT NULL,
  `pago_id` int(11) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `promociones` decimal(10,2) DEFAULT NULL,
  `descuentos` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pago_id` (`pago_id`),
  CONSTRAINT `detalles_de_pago_ibfk_1` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalles_de_pago` */

/*Table structure for table `detalles_de_pedido` */

DROP TABLE IF EXISTS `detalles_de_pedido`;

CREATE TABLE `detalles_de_pedido` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pedido_id` (`pedido_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalles_de_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`ID`),
  CONSTRAINT `detalles_de_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalles_de_pedido` */

/*Table structure for table `direccion_envio` */

DROP TABLE IF EXISTS `direccion_envio`;

CREATE TABLE `direccion_envio` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `numero_casa` varchar(50) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `direccion_envio_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `direccion_envio` */

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `metodo_pago` varchar(255) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pagos` */

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `estado_pedido` varchar(255) DEFAULT NULL,
  `direccion_envio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuario_id` (`usuario_id`),
  KEY `direccion_envio_id` (`direccion_envio_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`direccion_envio_id`) REFERENCES `direccion_envio` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedidos` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `productos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contraseña` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
