-- Adminer 3.6.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE `destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hotelimgs`;
CREATE TABLE `hotelimgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(10) unsigned DEFAULT NULL,
  `src` varchar(255) NOT NULL,
  `portada` tinyint(1) DEFAULT '0',
  `descripcion` text,
  `orden` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `destination_id` int(11) NOT NULL DEFAULT '0',
  `categoria` enum('1 Estrella','2 Estrellas','3 Estrellas','4 Estrellas','5 Estrellas','Gran turismo') NOT NULL,
  `tipo_disponibilidad` enum('Libre','Allotment','On Request') NOT NULL,
  `desayuno` tinyint(1) NOT NULL DEFAULT '0',
  `all_inclusive` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `permite_menores` tinyint(1) NOT NULL,
  `edad_max_menor` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`destination_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ips`;
CREATE TABLE `ips` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `intentos` tinyint(1) NOT NULL,
  `bloqueo` datetime NOT NULL,
  PRIMARY KEY (`ip`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rates`;
CREATE TABLE `rates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT '0',
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `plan_alimentos` enum('Desayuno','Desayuno Completo','Desayuno Express','Desayuno Americano','Desayuno Continental','Desayuno Buffete','Todo Incluído') NOT NULL,
  `sencilla` float NOT NULL,
  `doble` float NOT NULL,
  `triple` float NOT NULL,
  `cuadruple` float NOT NULL,
  `extra` float NOT NULL,
  `menor1` float DEFAULT NULL,
  `menor2` float DEFAULT NULL,
  `menor3` float DEFAULT NULL,
  `promocion` tinyint(1) NOT NULL,
  `comentarios` text NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rate_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `entrada` date NOT NULL,
  `salida` date NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `adultos` tinyint(4) NOT NULL DEFAULT '1',
  `menores` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `importe` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nota` text,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(45) NOT NULL,
  `disponibilidad` int(11) DEFAULT '0',
  `tipo_disponibilidad` enum('Libre','Allotment','On Request') NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`hotel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `agencia` varchar(100) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `extension` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `master` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `username`, `password`, `tipo`, `agencia`, `telefono`, `extension`, `celular`, `activo`, `master`, `created`) VALUES
(1,	'Master',	NULL,	'pulsem',	'327d3429df2c4512edc07ed9e948aa75f5d14f50',	0,	'',	'',	'',	'',	1,	1,	'2010-01-01 00:00:00'),
(2,	'Master',	NULL,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	0,	'',	'',	'',	'',	1,	1,	'2010-01-01 00:00:00');

-- 2013-01-28 12:52:02
