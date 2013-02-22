-- Adminer 3.6.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blackouts`;
CREATE TABLE `blackouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(10) unsigned DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `blackouts` (`id`, `hotel_id`, `inicio`, `fin`, `created`) VALUES
(2,	4,	'2013-02-18',	'2013-02-25',	'2013-02-01 11:48:31');

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE `destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(11) unsigned DEFAULT NULL,
  `nombre` varchar(250) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `destinations` (`id`, `region_id`, `nombre`, `activo`, `created`) VALUES
(2,	NULL,	'Aenean semper ligula sit &eacute;met lectus hendrerit',	1,	NULL),
(3,	NULL,	'Nam tempor, ipsum posuer&eacute; pretium ullamcorper',	1,	NULL);

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

INSERT INTO `hotelimgs` (`id`, `hotel_id`, `src`, `portada`, `descripcion`, `orden`, `created`) VALUES
(1,	4,	'upload/01697_badacsony_1280x800.jpg',	1,	NULL,	1,	'2013-01-28 01:13:32'),
(3,	4,	'upload/02205_fortjefferson_1600x900.jpg',	0,	NULL,	3,	'2013-01-28 01:13:32');

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `destination_id` int(11) NOT NULL DEFAULT '0',
  `categoria` enum('1 Estrella','2 Estrellas','3 Estrellas','4 Estrellas','5 Estrellas','Gran turismo') NOT NULL,
  `desayuno` tinyint(1) NOT NULL DEFAULT '0',
  `all_inclusive` tinyint(1) NOT NULL DEFAULT '0',
  `src` varchar(255) DEFAULT NULL,
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL,
  `descripcion` text NOT NULL,
  `amenidades` text NOT NULL,
  `permite_menores` tinyint(1) NOT NULL,
  `edad_max_menor` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`destination_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `hotels` (`id`, `nombre`, `destination_id`, `categoria`, `desayuno`, `all_inclusive`, `src`, `checkin`, `checkout`, `descripcion`, `amenidades`, `permite_menores`, `edad_max_menor`, `activo`, `created`) VALUES
(2,	'Sed convallis ante nec lacus imperdiet gravida',	2,	'1 Estrella',	1,	1,	NULL,	NULL,	NULL,	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Expetenda tincidunt in sed, ex partem placerat sea, porro commodo ex eam. His putant aeterno interesset at. Usu ea mundi tincidunt, omnium virtute aliquando ius ex.</p>',	'',	1,	12,	1,	'2013-01-28 01:09:31'),
(3,	'Cras ut eros nulla. Suspendisse id ante ipsum',	3,	'5 Estrellas',	1,	1,	NULL,	'16:13:00',	'16:13:00',	'<p>His audiam deserunt in, eum ubique voluptatibus te. In reque dicta usu. Ne rebum dissentiet eam, vim omnis deseruisse id. Ullum deleniti vituperata at quo, insolens complectitur te eos, ea pri dico munere propriae. Vel ferri facilis ut, qui paulo ridens praesent ad. Possim alterum qui cu. Accusamus consulatu ius te, cu decore soleat appareat usu. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et.</p>',	'',	0,	12,	1,	'2013-01-28 01:12:45'),
(4,	'Sed sem turpis, sollicitudin consectetur ',	3,	'1 Estrella',	1,	1,	NULL,	'11:46:00',	'11:46:00',	'<p>His audiam deserunt in, eum ubique voluptatibus te. In reque dicta usu. Ne rebum dissentiet eam, vim omnis deseruisse id. Ullum deleniti vituperata at quo, insolens complectitur te eos, ea pri dico munere propriae. Vel ferri facilis ut, qui paulo ridens praesent ad. Possim alterum qui cu. Accusamus consulatu ius te, cu decore soleat appareat usu. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et.</p>',	'',	1,	12,	1,	'2013-01-28 01:13:32');

DROP TABLE IF EXISTS `hotels_users`;
CREATE TABLE `hotels_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hotels_users` (`id`, `hotel_id`, `user_id`, `created`) VALUES
(3,	2,	2,	'2013-01-29'),
(4,	3,	2,	'2013-01-29');

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
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
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

INSERT INTO `rates` (`id`, `room_id`, `inicio`, `fin`, `plan_alimentos`, `sencilla`, `doble`, `triple`, `cuadruple`, `extra`, `menor1`, `menor2`, `menor3`, `promocion`, `comentarios`, `activo`, `created`) VALUES
(1,	4,	'2013-02-01',	'2013-02-03',	'Desayuno',	988,	8876,	565,	8897,	5412,	7787,	87872,	1223,	1,	'&lt;p&gt;His audiam deserunt in, eum ubique voluptatibus te. In reque dicta usu. Ne rebum dissentiet eam, vim omnis deseruisse id. Ullum deleniti vituperata at quo, insolens complectitur te eos, ea pri dico munere propriae. Vel ferri facilis ut, qui paulo ridens praesent ad. Possim alterum qui cu. Accusamus consulatu ius te, cu decore soleat appareat usu. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et.&lt;/p&gt;',	1,	'2013-01-28 02:44:52'),
(2,	5,	'2013-02-10',	'2013-02-28',	'Desayuno',	900,	99,	897,	657,	6754,	654,	4535,	786,	1,	'',	1,	'2013-01-28 02:46:08'),
(3,	4,	'2013-02-05',	'2013-02-08',	'Desayuno',	200,	300,	400,	500,	100,	100,	200,	300,	1,	'',	1,	'2013-02-05 11:28:15'),
(4,	4,	'2013-02-11',	'2013-02-14',	'Desayuno',	200,	250,	300,	350,	400,	120,	200,	240,	1,	'',	1,	'2013-02-05 11:28:51'),
(5,	4,	'2013-02-03',	'2013-02-10',	'Desayuno Americano',	500,	550,	600,	650,	700,	10,	20,	30,	1,	'',	1,	'2013-02-05 11:43:21'),
(6,	4,	'2013-02-15',	'2013-02-20',	'Desayuno Americano',	120,	180,	240,	280,	320,	90,	110,	135,	1,	'',	1,	'2013-02-05 11:45:56'),
(7,	3,	'2013-02-02',	'2013-02-06',	'Desayuno',	200,	200,	300,	300,	400,	100,	80,	50,	1,	'',	1,	'2013-02-05 13:35:17'),
(8,	3,	'2013-02-07',	'2013-02-09',	'Desayuno',	80,	100,	120,	180,	600,	50,	50,	100,	0,	'',	1,	'2013-02-05 13:35:49'),
(9,	3,	'2013-02-13',	'2013-02-16',	'Desayuno',	80,	80,	90,	90,	100,	10,	20,	30,	1,	'',	1,	'2013-02-05 13:36:16'),
(10,	3,	'2013-02-06',	'2013-02-08',	'Desayuno Americano',	70,	80,	120,	150,	100,	80,	90,	100,	1,	'',	1,	'2013-02-05 13:58:08'),
(11,	3,	'2013-02-12',	'2013-02-16',	'Desayuno Americano',	110,	130,	150,	170,	80,	60,	80,	100,	1,	'',	1,	'2013-02-05 13:58:40'),
(12,	5,	'2013-02-01',	'2013-02-06',	'Desayuno',	35,	50,	85,	105,	30,	40,	50,	60,	1,	'',	1,	'2013-02-05 14:02:30'),
(13,	5,	'2013-02-05',	'2013-02-13',	'Desayuno Americano',	200,	80,	120,	105,	100,	40,	110,	135,	1,	'',	1,	'2013-02-05 14:03:46'),
(14,	5,	'2013-02-04',	'2013-02-12',	'Desayuno Buffete',	200,	250,	150,	300,	400,	50,	20,	240,	0,	'',	1,	'2013-02-05 14:04:20'),
(15,	6,	'2013-02-01',	'2013-02-05',	'Desayuno Americano',	70,	130,	150,	105,	100,	40,	80,	100,	1,	'',	1,	'2013-02-05 14:06:37'),
(16,	6,	'2013-02-03',	'2013-02-06',	'Desayuno',	70,	80,	120,	180,	100,	40,	20,	100,	1,	'',	1,	'2013-02-05 14:13:04');

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `regions` (`id`, `parent_id`, `nombre`, `slug`, `lft`, `rght`, `orden`, `created`) VALUES
(1,	NULL,	'Regi&oacute;n 1',	'1_regin-1',	1,	2,	2,	'2013-01-31 17:49:22'),
(2,	NULL,	'Regi&oacute;n 2',	'2_regin-2',	3,	4,	1,	'2013-01-31 17:49:22'),
(3,	NULL,	'Regi&oacute;n 3',	'3_regin-3',	5,	6,	3,	'2013-01-31 17:49:22'),
(4,	NULL,	'Regi&oacute;n4',	'4_regin4',	7,	8,	0,	'2013-01-31 17:49:22');

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
  `tipo_disponibilidad` enum('Libre','Allotment','On Request') NOT NULL,
  `disponibilidad` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`hotel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `rooms` (`id`, `hotel_id`, `nombre`, `tipo_disponibilidad`, `disponibilidad`, `activo`, `created`) VALUES
(1,	4,	'Lorem ipsum dolor sit',	'Libre',	2,	1,	'2013-01-28 02:09:24'),
(2,	4,	'Fusce sit amet massa sit amet',	'On Request',	8,	1,	'2013-01-28 02:21:25'),
(3,	4,	'Cras quis metus mollis lacus',	'Allotment',	0,	1,	'2013-01-28 02:22:12'),
(4,	4,	'Vestibulum sed tempor lacus',	'Allotment',	6,	1,	'2013-01-28 02:23:20'),
(5,	3,	'Etiam non justo at urna eleifend',	'Libre',	0,	1,	'2013-01-28 02:45:43'),
(6,	3,	'Vestibulum non vehicula enim',	'Libre',	NULL,	1,	'2013-02-05 14:05:21');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agencia` varchar(100) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `extension` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `master` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `username`, `password`, `agencia`, `telefono`, `extension`, `celular`, `activo`, `master`, `created`) VALUES
(1,	'Master',	NULL,	'pulsem',	'327d3429df2c4512edc07ed9e948aa75f5d14f50',	'',	'',	'',	'',	1,	1,	'2010-01-01 00:00:00'),
(2,	'Master',	NULL,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'',	'',	'',	'',	1,	1,	'2010-01-01 00:00:00');

-- 2013-02-22 10:18:24
