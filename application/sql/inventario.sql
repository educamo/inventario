/*
 Navicat Premium Data Transfer

 Source Server         : local - PC
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : inventario

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 04/07/2022 21:42:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detallefactura
-- ----------------------------
DROP TABLE IF EXISTS `detallefactura`;
CREATE TABLE `detallefactura`  (
  `idDetalle` int(255) NOT NULL AUTO_INCREMENT,
  `idFactura` int(255) NULL DEFAULT NULL,
  `id_producto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cantidad` int(255) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`idDetalle`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detallefactura
-- ----------------------------
INSERT INTO `detallefactura` VALUES (2, 2, '124', 1, 20);
INSERT INTO `detallefactura` VALUES (4, 4, '124', 1, 1);
INSERT INTO `detallefactura` VALUES (5, 5, '34', 1, 1);
INSERT INTO `detallefactura` VALUES (6, 6, '124', 2, 7);

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas`  (
  `idFactura` int(255) NOT NULL,
  `cedulaCliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombreCliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`idFactura`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of facturas
-- ----------------------------
INSERT INTO `facturas` VALUES (1, '3432434', 'dds', '2021-11-18');
INSERT INTO `facturas` VALUES (2, '3432434', 'cesar', '2021-11-18');
INSERT INTO `facturas` VALUES (3, '16153887', 'cesar carrasco', '2021-11-18');
INSERT INTO `facturas` VALUES (4, '12323434', 'kkkkk', '2021-11-18');
INSERT INTO `facturas` VALUES (5, '16153887', 'cesar', '2022-07-05');
INSERT INTO `facturas` VALUES (6, '24324564', 'gfdfdd', '2022-07-05');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_producto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cantidad` int(255) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('124', 'pan', 'alimento', 7, 7);
INSERT INTO `productos` VALUES ('34', 'gfgff', 'gfgfg', 14, 1);
INSERT INTO `productos` VALUES ('45', 'regrg', 'grg', 2, 2);
INSERT INTO `productos` VALUES ('76', 'cesar', 'dsfdsf', 2, 2);
INSERT INTO `productos` VALUES ('azul13', 'azul', 'pintura', 173, 20);
INSERT INTO `productos` VALUES ('bbe', 'bbe', 'bebida', 1, 1);
INSERT INTO `productos` VALUES ('blac12', 'blanco', 'pintura', 0, 12);
INSERT INTO `productos` VALUES ('cc', 'cc', 'cccc', 1, 35);
INSERT INTO `productos` VALUES ('cer', 'cerveza', 'bebida', 10, 15);
INSERT INTO `productos` VALUES ('dd', 'dd', 'alimento', 0, 1);

-- ----------------------------
-- Table structure for tempfactura
-- ----------------------------
DROP TABLE IF EXISTS `tempfactura`;
CREATE TABLE `tempfactura`  (
  `idTemp` int(255) NOT NULL AUTO_INCREMENT,
  `cedulaCliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_producto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cantidadTmp` int(255) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`idTemp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `idUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombreUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidoUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `administrador` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('12345678', 'carlos', 'cepeda', 'prueba@xample.com', '1234', '0');
INSERT INTO `usuarios` VALUES ('161653887', 'cesar', 'carrasco', 'educamo@gmail.com', '1234', '1');

SET FOREIGN_KEY_CHECKS = 1;
