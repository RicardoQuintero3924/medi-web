-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para medi_web
CREATE DATABASE IF NOT EXISTS `medi_web` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `medi_web`;

-- Volcando estructura para tabla medi_web.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.clientes: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
REPLACE INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `correo_electronico`, `fecha_nacimiento`, `direccion`, `contrasena`, `estado`) VALUES
	(1, 'Prueba', 'Prueba', 'prueba@gmail.com', '2020-10-22', 'prueba', '123456789', b'1'),
	(2, 'Andres felipe', 'fuertes', '', '2020-10-05', 'cr 24 a # 59 b 49', 'sdfgsdf', b'1'),
	(3, 'adfadsf', 'asdfasdf', 'acostafuertesaf@gmail.com', '2020-10-14', 'cr 24 a # 59 b 49', 'asdfasdf', b'1'),
	(4, 'felipe', 'felipe', 'felipe@gmail.com', '2020-10-06', 'felipe', 'felipe', b'1'),
	(5, 'alejo', 'alejo', 'alejo@gmail.com', '2020-10-12', 'alejo', 'alejo', b'1'),
	(6, 'jose', 'jose', 'jose@gmail.com', '2020-10-05', 'jose', '', b'1'),
	(7, 'jjojo', 'jjojo', 'jjojo@gmail.com', '2020-10-08', 'jjojo', 'jjojo', b'1'),
	(8, 'fdfd', 'fdfd', 'fdfd@gmail.com', '2020-10-21', 'fdfd', 'fdfd', b'1'),
	(9, 'tyty', 'tyty', 'tyty@gmail.com', '2020-10-13', 'tyty', 'tyty', b'1'),
	(10, 'felongas', 'felongas', 'felongas@gmail.com', '2020-10-14', 'felongas', '123456987', b'1'),
	(11, 'hyhy', 'hyhy', 'hyhy', '2020-10-08', 'hyhy', '', b'1'),
	(12, 'ttrtrt', 'trtrt', 'trtrtgmail.com', '2020-10-07', 'trt', 'trtrt', b'1'),
	(13, 'rere', 'rere', 'rere@gmail.com', '2020-10-06', 'rere', 'rere', b'1'),
	(14, 'alejito', 'alejito', 'alejito@gmail.com', '2020-10-05', 'alejito', 'alejito', b'1'),
	(15, 'rttr', 'trtr', 'trtr@es.com', '2020-10-13', 'trtr', 'ttrt', b'1'),
	(16, 'aas', 'aas', 'aas@gmail.com', '2020-10-13', 'aaass', 'fghjfghj', b'1');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_departamento`),
  KEY `FK_departamentos_paises` (`id_pais`),
  CONSTRAINT `FK_departamentos_paises` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.departamentos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
REPLACE INTO `departamentos` (`id_departamento`, `nombre`, `id_pais`, `estado`) VALUES
	(1, 'Antioquia', 1, b'1'),
	(6, 'Cordoba', 1, b'1');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `tipo_empleado` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_empleado`),
  KEY `FK_empleados_tipo_empleados` (`tipo_empleado`),
  CONSTRAINT `FK_empleados_tipo_empleados` FOREIGN KEY (`tipo_empleado`) REFERENCES `tipo_empleados` (`id_tipo_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.empleados: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
REPLACE INTO `empleados` (`id_empleado`, `documento`, `nombre`, `apellido`, `fecha_nacimiento`, `correo_electronico`, `tipo_empleado`, `estado`) VALUES
	(2, '', 'Jose antonio', 'arcila yepes', '2020-10-21', 'jose2@gmail.es', 2, b'1'),
	(7, '', 'Ana', 'Mejia', '2020-10-24', 'ana@gmail.com', 2, b'1');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.farmacias
CREATE TABLE IF NOT EXISTS `farmacias` (
  `id_farmacia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_farmacia`),
  KEY `FK__municipios` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.farmacias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `farmacias` DISABLE KEYS */;
/*!40000 ALTER TABLE `farmacias` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.laboratorios
CREATE TABLE IF NOT EXISTS `laboratorios` (
  `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_laboratorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.laboratorios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `laboratorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `laboratorios` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `id_medicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercial` varchar(50) NOT NULL,
  `nombre_generico` varchar(50) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `precio` double NOT NULL,
  `id_farmacia` int(11) NOT NULL,
  `id_laboratorio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_medicamento`) USING BTREE,
  KEY `Índice 2` (`id_farmacia`),
  KEY `Índice 3` (`id_laboratorio`),
  KEY `Índice 4` (`id_categoria`),
  CONSTRAINT `FK_medicamentos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `FK_medicamentos_farmacias` FOREIGN KEY (`id_farmacia`) REFERENCES `farmacias` (`id_farmacia`),
  CONSTRAINT `FK_medicamentos_laboratorios` FOREIGN KEY (`id_laboratorio`) REFERENCES `laboratorios` (`id_laboratorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.medicamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_municipio`),
  KEY `FK_municipios_departamentos` (`id_departamento`),
  CONSTRAINT `FK_municipios_departamentos` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.municipios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
REPLACE INTO `municipios` (`id_municipio`, `nombre`, `id_departamento`, `estado`) VALUES
	(1, 'Medellin', 1, b'1'),
	(2, 'Bello', 1, b'1'),
	(4, 'Monteria', 6, b'1');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.orden_medicamentos
CREATE TABLE IF NOT EXISTS `orden_medicamentos` (
  `id_orden_medicamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_orden_medicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.orden_medicamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `orden_medicamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_medicamentos` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.orden_pedidos
CREATE TABLE IF NOT EXISTS `orden_pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_pedido` double NOT NULL DEFAULT 0,
  `valor_domicilio` double NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_pedido`),
  KEY `FK_orden_pedidos_clientes` (`id_cliente`),
  KEY `Índice 3` (`id_empleado`),
  CONSTRAINT `FK_orden_pedidos_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `FK_orden_pedidos_empleados` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.orden_pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `orden_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.paises: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
REPLACE INTO `paises` (`id_pais`, `nombre`, `estado`) VALUES
	(1, 'Colombia', b'1'),
	(2, 'Venezuela', b'1'),
	(3, 'Ecuador', b'1'),
	(4, 'Canada', b'1'),
	(5, 'Canada', b'1');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.tipo_empleados
CREATE TABLE IF NOT EXISTS `tipo_empleados` (
  `id_tipo_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id_tipo_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.tipo_empleados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_empleados` DISABLE KEYS */;
REPLACE INTO `tipo_empleados` (`id_tipo_empleado`, `descripcion`, `estado`) VALUES
	(1, 'domiciliario', b'1'),
	(2, 'farmaceutico', b'1');
/*!40000 ALTER TABLE `tipo_empleados` ENABLE KEYS */;

-- Volcando estructura para tabla medi_web.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `subtipo_usuario` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  KEY `Índice 1` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla medi_web.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`, `tipo_usuario`, `subtipo_usuario`, `documento`) VALUES
	(1, 'Felipe', '123456789', 2, 2, '100'),
	(2, 'fghjfgh', 'fghjfghj', 2, 1, '8012147');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
