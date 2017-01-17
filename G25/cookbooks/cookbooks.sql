-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2014 a las 21:20:41
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cookbooks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `autor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`autor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`autor_id`, `nombre`, `nacionalidad`) VALUES
(1, 'Pablo Massey', 'Argentino'),
(4, 'Jose', 'Argr'),
(5, 'John Wayne', 'Norteamericano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `compra_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `precio_final` decimal(10,2) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`compra_id`),
  KEY `nombre_usuario_idx` (`nombre_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_has_libro`
--

CREATE TABLE IF NOT EXISTS `compra_has_libro` (
  `compra_compra_id` int(11) NOT NULL,
  `libro_isbn` varchar(11) NOT NULL,
  PRIMARY KEY (`compra_compra_id`,`libro_isbn`),
  KEY `fk_compra_has_libro_libro1_idx` (`libro_isbn`),
  KEY `fk_compra_has_libro_compra1_idx` (`compra_compra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `nombre` varchar(45) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0' COMMENT '1=borrado; 0=NOBorrado',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`nombre`, `borrado`) VALUES
('01', 1),
('122', 0),
('coso', 0),
('Criollas', 0),
('Hindú', 0),
('Mexicana', 1),
('sarasa', 0),
('Test000', 0),
('Test0000', 0),
('TestBorradoL', 0),
('TestBorradoL2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `isbn` varchar(11) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `editorial` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `paginas` varchar(45) NOT NULL,
  `fecha_pub` varchar(45) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0' COMMENT '1=borrado; 0=NOBorrado',
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`isbn`, `idioma`, `nombre`, `editorial`, `precio`, `paginas`, `fecha_pub`, `borrado`) VALUES
('002231451', 'Español', 'dsa', 'NA', '120', '96', '1999/12/25', 0),
('111111111', 'Español', 'Recetas1', 'NA', '100', '70', '2014/02/10', 1),
('22222222211', 'Ingles', 'Test', 'Edit', '50', '60', '2014-20-10', 1),
('5', 'Español', 'Recetas Rapidas', 'NA', '100', '96', '2014/02/10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_has_autor`
--

CREATE TABLE IF NOT EXISTS `libro_has_autor` (
  `libro_isbn` varchar(11) NOT NULL,
  `autor_autor_id` int(11) NOT NULL,
  PRIMARY KEY (`libro_isbn`,`autor_autor_id`),
  KEY `fk_libro_has_autor_autor1_idx` (`autor_autor_id`),
  KEY `fk_libro_has_autor_libro1_idx` (`libro_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_has_autor`
--

INSERT INTO `libro_has_autor` (`libro_isbn`, `autor_autor_id`) VALUES
('5', 1),
('22222222211', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_has_etiqueta`
--

CREATE TABLE IF NOT EXISTS `libro_has_etiqueta` (
  `libro_isbn` varchar(11) NOT NULL,
  `etiqueta_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`libro_isbn`,`etiqueta_nombre`),
  KEY `fk_libro_has_etiqueta_etiqueta1_idx` (`etiqueta_nombre`),
  KEY `fk_libro_has_etiqueta_libro1_idx` (`libro_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_has_etiqueta`
--

INSERT INTO `libro_has_etiqueta` (`libro_isbn`, `etiqueta_nombre`) VALUES
('002231451', 'Criollas'),
('111111111', 'Mexicana'),
('22222222211', '01'),
('5', 'Criollas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre_usuario` varchar(45) NOT NULL COMMENT 'Corresponde al DNI del Usuario.',
  `esAdmin` tinyint(1) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `domicilio` varchar(45) NOT NULL,
  `fecha_alta` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nombre_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `nombre_usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_has_libro`
--
ALTER TABLE `compra_has_libro`
  ADD CONSTRAINT `fk_compra_has_libro_compra1` FOREIGN KEY (`compra_compra_id`) REFERENCES `compra` (`compra_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_has_libro_libro1` FOREIGN KEY (`libro_isbn`) REFERENCES `libro` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_has_autor`
--
ALTER TABLE `libro_has_autor`
  ADD CONSTRAINT `fk_libro_has_autor_autor1` FOREIGN KEY (`autor_autor_id`) REFERENCES `autor` (`autor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_has_autor_libro1` FOREIGN KEY (`libro_isbn`) REFERENCES `libro` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_has_etiqueta`
--
ALTER TABLE `libro_has_etiqueta`
  ADD CONSTRAINT `fk_libro_has_etiqueta_etiqueta1` FOREIGN KEY (`etiqueta_nombre`) REFERENCES `etiqueta` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_has_etiqueta_libro1` FOREIGN KEY (`libro_isbn`) REFERENCES `libro` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
