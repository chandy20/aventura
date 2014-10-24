-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2014 a las 22:53:01
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aventura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 202),
(2, 1, NULL, NULL, 'Bracelets', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Controlles', 14, 15),
(9, 1, NULL, NULL, 'EntradasSalidasAnos', 16, 27),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'add', 21, 22),
(13, 9, NULL, NULL, 'edit', 23, 24),
(14, 9, NULL, NULL, 'delete', 25, 26),
(15, 1, NULL, NULL, 'EntradasSalidasDias', 28, 39),
(16, 15, NULL, NULL, 'index', 29, 30),
(17, 15, NULL, NULL, 'view', 31, 32),
(18, 15, NULL, NULL, 'add', 33, 34),
(19, 15, NULL, NULL, 'edit', 35, 36),
(20, 15, NULL, NULL, 'delete', 37, 38),
(21, 1, NULL, NULL, 'EntradasSalidasDiasParques', 40, 61),
(22, 21, NULL, NULL, 'index', 41, 42),
(23, 21, NULL, NULL, 'view', 43, 44),
(24, 21, NULL, NULL, 'add', 45, 46),
(25, 21, NULL, NULL, 'edit', 47, 48),
(26, 21, NULL, NULL, 'delete', 49, 50),
(27, 21, NULL, NULL, 'admin_index', 51, 52),
(28, 21, NULL, NULL, 'admin_view', 53, 54),
(29, 21, NULL, NULL, 'admin_add', 55, 56),
(30, 21, NULL, NULL, 'admin_edit', 57, 58),
(31, 21, NULL, NULL, 'admin_delete', 59, 60),
(32, 1, NULL, NULL, 'EntradasSalidasHoras', 62, 73),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'view', 65, 66),
(35, 32, NULL, NULL, 'add', 67, 68),
(36, 32, NULL, NULL, 'edit', 69, 70),
(37, 32, NULL, NULL, 'delete', 71, 72),
(38, 1, NULL, NULL, 'EntradasSalidasMese', 74, 85),
(39, 38, NULL, NULL, 'index', 75, 76),
(40, 38, NULL, NULL, 'view', 77, 78),
(41, 38, NULL, NULL, 'add', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 1, NULL, NULL, 'EntradasSalidasMinutos', 86, 97),
(45, 44, NULL, NULL, 'index', 87, 88),
(46, 44, NULL, NULL, 'view', 89, 90),
(47, 44, NULL, NULL, 'add', 91, 92),
(48, 44, NULL, NULL, 'edit', 93, 94),
(49, 44, NULL, NULL, 'delete', 95, 96),
(50, 1, NULL, NULL, 'Groups', 98, 109),
(51, 50, NULL, NULL, 'index', 99, 100),
(52, 50, NULL, NULL, 'view', 101, 102),
(53, 50, NULL, NULL, 'add', 103, 104),
(54, 50, NULL, NULL, 'edit', 105, 106),
(55, 50, NULL, NULL, 'delete', 107, 108),
(56, 1, NULL, NULL, 'Grupos', 110, 123),
(57, 56, NULL, NULL, 'index', 111, 112),
(58, 56, NULL, NULL, 'view', 113, 114),
(59, 56, NULL, NULL, 'add', 115, 116),
(60, 56, NULL, NULL, 'edit', 117, 118),
(61, 56, NULL, NULL, 'delete', 119, 120),
(62, 56, NULL, NULL, 'parque', 121, 122),
(63, 1, NULL, NULL, 'Locaciones', 124, 135),
(64, 63, NULL, NULL, 'index', 125, 126),
(65, 63, NULL, NULL, 'view', 127, 128),
(66, 63, NULL, NULL, 'add', 129, 130),
(67, 63, NULL, NULL, 'edit', 131, 132),
(68, 63, NULL, NULL, 'delete', 133, 134),
(69, 1, NULL, NULL, 'Pages', 136, 139),
(70, 69, NULL, NULL, 'display', 137, 138),
(71, 1, NULL, NULL, 'Tipos', 140, 151),
(72, 71, NULL, NULL, 'index', 141, 142),
(73, 71, NULL, NULL, 'view', 143, 144),
(74, 71, NULL, NULL, 'add', 145, 146),
(75, 71, NULL, NULL, 'edit', 147, 148),
(76, 71, NULL, NULL, 'delete', 149, 150),
(77, 1, NULL, NULL, 'Torniquetes', 152, 181),
(78, 77, NULL, NULL, 'index', 153, 154),
(79, 77, NULL, NULL, 'view', 155, 156),
(80, 77, NULL, NULL, 'add', 157, 158),
(81, 77, NULL, NULL, 'edit', 159, 160),
(82, 77, NULL, NULL, 'delete', 161, 162),
(83, 77, NULL, NULL, 'reportes', 163, 164),
(84, 77, NULL, NULL, 'dia', 165, 166),
(85, 77, NULL, NULL, 'reporte', 167, 168),
(86, 77, NULL, NULL, 'minutos', 169, 170),
(87, 77, NULL, NULL, 'horas', 171, 172),
(88, 77, NULL, NULL, 'mes', 173, 174),
(89, 77, NULL, NULL, 'anio', 175, 176),
(90, 77, NULL, NULL, 'bloqueo', 177, 178),
(91, 1, NULL, NULL, 'Users', 182, 199),
(92, 91, NULL, NULL, 'index', 183, 184),
(93, 91, NULL, NULL, 'view', 185, 186),
(94, 91, NULL, NULL, 'add', 187, 188),
(95, 91, NULL, NULL, 'edit', 189, 190),
(96, 91, NULL, NULL, 'delete', 191, 192),
(97, 91, NULL, NULL, 'login', 193, 194),
(98, 91, NULL, NULL, 'logout', 195, 196),
(99, 1, NULL, NULL, 'AclExtras', 200, 201),
(100, 77, NULL, NULL, 'input', 179, 180),
(101, 91, NULL, NULL, 'initDB', 197, 198);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, 1, 'User', 3, NULL, 2, 3),
(3, NULL, 'Group', 2, NULL, 5, 6),
(4, NULL, 'Group', 3, NULL, 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 1, 98, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bracelets`
--

CREATE TABLE IF NOT EXISTS `bracelets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cod_barras` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bracelets`
--

INSERT INTO `bracelets` (`id`, `date`, `cod_barras`) VALUES
(1, '2014-10-17 16:00:20', '25110501'),
(2, '2014-10-17 16:00:45', '22011525'),
(3, '2014-10-17 16:00:52', '25104453');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_anos`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_anos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `torniquete_id` bigint(20) unsigned NOT NULL,
  `fecha` varchar(5) DEFAULT NULL,
  `entradas` bigint(20) DEFAULT NULL,
  `salidas` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idx_fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_dias`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_dias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `torniquete_id` bigint(20) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `entradas` bigint(20) DEFAULT NULL,
  `salidas` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idx_fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_dias_parques`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_dias_parques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `entradas` bigint(20) NOT NULL,
  `salidas` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fecha` (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_horas`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_horas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `torniquete_id` bigint(20) unsigned NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `entradas` bigint(20) DEFAULT NULL,
  `salidas` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idx_fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_meses`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_meses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `torniquete_id` bigint(20) unsigned NOT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `entradas` bigint(20) DEFAULT NULL,
  `salidas` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idx_fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_salidas_minutos`
--

CREATE TABLE IF NOT EXISTS `entradas_salidas_minutos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `entradas` int(11) DEFAULT NULL,
  `salidas` int(11) DEFAULT NULL,
  `torniquete_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idx_fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrador', '2014-10-15 05:35:37', '2014-10-15 05:35:37'),
(2, 'Reportes', '2014-10-21 07:43:38', '2014-10-21 07:43:38'),
(3, 'Gestion', '2014-10-21 07:43:55', '2014-10-21 07:43:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_grupo` varchar(50) NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `codigo_grupo`, `nombre_grupo`, `descripcion`) VALUES
(1, '1', 'DERECHA', ''),
(2, '2', 'IZQUIERDA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locaciones`
--

CREATE TABLE IF NOT EXISTS `locaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_locacion` varchar(20) DEFAULT NULL,
  `nombre_locacion` varchar(30) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `locaciones`
--

INSERT INTO `locaciones` (`id`, `cod_locacion`, `nombre_locacion`, `descripcion`) VALUES
(1, '123', 'GAMA', 'ENTRADA PRINCIPAL'),
(2, '456', 'AMBAR NORTE', 'PARQUEADERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_tipo` varchar(20) DEFAULT NULL,
  `nombre_tipo` varchar(20) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `codigo_tipo`, `nombre_tipo`, `descripcion`) VALUES
(1, '123', 'NORMAL', NULL),
(2, '456', 'DISCAPACITADOS', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torniquetes`
--

CREATE TABLE IF NOT EXISTS `torniquetes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` bigint(20) unsigned NOT NULL,
  `locacione_id` bigint(20) unsigned NOT NULL,
  `grupo_id` bigint(20) unsigned NOT NULL,
  `descripcion` text,
  `ip` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `reset` char(1) NOT NULL,
  `centradas` bigint(20) NOT NULL,
  `csalidas` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `torniquetes`
--

INSERT INTO `torniquetes` (`id`, `tipo_id`, `locacione_id`, `grupo_id`, `descripcion`, `ip`, `estado`, `serial`, `reset`, `centradas`, `csalidas`) VALUES
(1, 1, 1, 1, 'MAC ETHERNET B8:27:eb:11:7b:17\r\nMAC WIRELESS 00:13:ef:10:21:8e', '172.16.3.2', 1, '3414234', '1', 0, 0),
(2, 1, 1, 1, 'MAC ETHERNET B8:27:eb:bc:0f:97\r\nMAC WIRELESS 00:13:ef:10:22:4d', '172.16.3.3', 1, '3414wer', '1', 0, 0),
(3, 1, 1, 1, 'MAC ETHERNET B8:27:eb:20:05:ce\r\nMAC WIRELESS 00:13:ef:70:17:ba', '172.16.3.4', 1, 'q2341', '1', 0, 0),
(4, 1, 1, 1, 'MAC ETHERNET B8:27:eb:dc:1b:fd\r\nMAC WIRELESS 00:13:ef:20:24:79', '172.16.3.5', 1, 'q2341123', '1', 0, 0),
(5, 1, 1, 2, 'MAC ETHERNET B8:27:eb:df:d7:80\r\nMAC WIRELESS 00:13:ef:b0:34:a6', '172.16.3.6', 1, '1231243', '1', 0, 0),
(6, 1, 1, 2, 'MAC ETHERNET B8:27:eb:db:6e:f9\r\nMAC WIRELESS 00:13:ef:70:18:62', '172.16.1.7', 1, '23424', '1', 0, 0),
(7, 1, 1, 2, 'MAC ETHERNET B8:27:eb:6e:77:cc\r\nMAC WIRELESS 00:13:ef:20:23:47', '172.16.3.8', 1, '23424123321', '1', 0, 0),
(8, 2, 1, 2, 'MAC ETHERNET B8:27:eb:cf:e7:dd\r\nMAC WIRELESS 00:13:ef:70:18:68', '172.16.1.9', 1, '23423321', '1', 0, 0),
(9, 1, 2, 1, 'MAC ETHERNET B8:27:eb:eb:b9:44\r\nMAC WIRELESS 00:13:ef:10:18:54', '172.16.1.10', 1, '234234', '1', 0, 0),
(10, 1, 2, 1, 'MAC ETHERNET B8:27:eb:43:d9:68\r\nMAC WIRELESS 00:13:ef:70:16:8b', '172.16.1.11', 1, '234234345546', '1', 0, 0),
(11, 1, 2, 1, 'MAC ETHERNET B8:27:eb:4f:07:44\r\nMAC WIRELESS 00:13:ef:70:14:22', '172.16.1.12', 1, '234235546', '1', 0, 0),
(12, 1, 2, 1, 'MAC ETHERNET B8:27:eb:00:b8:7e\r\nMAC WIRELESS 00:13:ef:10:23:b8', '172.16.1.13', 1, '2335546', '1', 0, 0),
(13, 1, 2, 2, 'MAC ETHERNET B8:27:eb:12:21:d4\r\nMAC WIRELESS 00:13:ef:10:24:1a', '172.16.1.14', 1, '23355', '1', 0, 0),
(14, 1, 2, 2, 'MAC ETHERNET B8:27:eb:25:03:2e\r\nMAC WIRELESS 00:13:ef:b0:33:df', '172.16.1.15', 1, '23355123', '1', 0, 0),
(15, 1, 2, 2, 'MAC ETHERNET B8:27:eb:90:a8:f2\r\nMAC WIRELESS 00:13:ef:10:24:3f', '172.16.1.16', 1, '2332355123', '1', 0, 0),
(16, 2, 2, 2, 'MAC ETHERNET B8:27:eb:19:fc:bb\r\nMAC WIRELESS 00:13:ef:10:23:13', '172.16.1.17', 1, '2332355123', '1', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`username`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombres`, `apellidos`, `documento`, `telefono`, `direccion`, `cargo`, `group_id`) VALUES
(4, 'admin', '6655f549ea349a91246556c7183d67fdd42979d7', 'Alexander', 'Correa Sanguino', '1090372229', '3106948632', 'Bogota', 'CREADOR', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
