-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2015 a las 12:36:12
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_lis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablones`
--

CREATE TABLE IF NOT EXISTS `tablones` (
`ID` int(10) unsigned NOT NULL,
  `Nombre` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `Descripcion` varchar(1024) COLLATE latin1_spanish_ci NOT NULL,
  `Pass` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `Url` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tablones`
--

INSERT INTO `tablones` (`ID`, `Nombre`, `Descripcion`, `Pass`, `Url`) VALUES
(1, 'Tablon', 'Descripcion', 'g9AM3esA', ''),
(2, 'Tablon', 'Descripcion', '2sVugmOK', ''),
(3, 'Tablon', 'Descripcion', 'vvOjArUj', ''),
(4, 'Tablon', 'Descripcion', 'lMKUUBKo', ''),
(5, 'Tablon', 'Descripcion', 'Aj2HC6sr', ''),
(6, 'Tablon', 'Descripcion', 'NHeV54k8', ''),
(7, 'Tablon', 'Descripcion', 'p8kTUaEB', ''),
(8, 'Tablon', 'Descripcion', 'Pb6uxd2L', ''),
(9, 'Tablon', 'Descripcion', 'uJt8obDM', ''),
(10, 'Tablon', 'Descripcion', 'CrNAUPL4', ''),
(11, 'Tablon', 'Descripcion', 'PKWQpBh', ''),
(12, 'Tablon', 'Descripcion', 'mQ3hbBes', ''),
(13, 'Tablon', 'Descripcion', 'hczXYy6p', ''),
(14, 'Tablon', 'Descripcion', 'KBXJfUfr', ''),
(15, 'Hola', 'Que tal', 'h5W6Y6EK', ''),
(16, 'Hot', 'Dog', 'KzEbJ1xL', 'http://g.cdn.ecn.cl/fotografia/files/2013/07/locas-imagenes-10.jpg'),
(17, 'fsaasf', 'sdga', 'UpqjLReC', ''),
(18, 'ffg', 'lh', '6HTPMs5I', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablones_elementos`
--

CREATE TABLE IF NOT EXISTS `tablones_elementos` (
  `ID_tablones` int(10) unsigned NOT NULL,
  `ID_elementos` int(10) unsigned NOT NULL,
  `Posicionx` int(6) unsigned NOT NULL,
  `Posiciony` int(6) unsigned NOT NULL,
  `Tamano` text COLLATE latin1_spanish_ci NOT NULL,
  `Tipo` enum('Video','Imagen','Texto','Enlace') COLLATE latin1_spanish_ci NOT NULL,
  `Contenido` text COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Url` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `Papelera` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tablones_elementos`
--

INSERT INTO `tablones_elementos` (`ID_tablones`, `ID_elementos`, `Posicionx`, `Posiciony`, `Tamano`, `Tipo`, `Contenido`, `Nombre`, `Url`, `Papelera`) VALUES
(2, 0, 811, 269, 'Pequeno', 'Texto', '32131', '', '', 0),
(2, 1, 532, 367, 'Pequeno', 'Texto', '1251161', '', '', 0),
(2, 2, 590, 91, 'Pequeno', 'Texto', '15251521', '', '', 0),
(2, 3, 790, 39, 'Pequeno', 'Texto', '5125151', '', '', 0),
(2, 4, 182, 269, 'Pequeno', 'Texto', '', '', '', 0),
(13, 0, 242, 125, 'Pequeno', 'Texto', 'fsd', 'hola', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Correo` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `Nacimiento` date NOT NULL,
  `Provincia` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `Password` varchar(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Correo`, `Nombre`, `Nacimiento`, `Provincia`, `Password`) VALUES
('gd@gmail.com', 'gd', '2015-05-05', 'Córdoba', '25d55ad283aa400af464c76d713c07ad'),
('hola@hola.com', 'gdgmail', '1222-03-02', 'Cantabria', '25d55ad283aa400af464c76d713c07ad'),
('lis@gmail.com', 'lis', '1993-02-14', 'Barcelona', '25d55ad283aa400af464c76d713c07ad'),
('perevictorvives@gmail.com', 'gdgmail', '1993-04-05', 'Cáceres', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tablones`
--

CREATE TABLE IF NOT EXISTS `usuarios_tablones` (
  `Correo_usuario` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `ID_tablon` int(10) unsigned NOT NULL,
  `Privilegio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_tablones`
--

INSERT INTO `usuarios_tablones` (`Correo_usuario`, `ID_tablon`, `Privilegio`) VALUES
('gd@gmail.com', 12, 4),
('gd@gmail.com', 13, 4),
('gd@gmail.com', 14, 4),
('gd@gmail.com', 15, 4),
('gd@gmail.com', 16, 4),
('gd@gmail.com', 17, 4),
('hola@hola.com', 10, 4),
('hola@hola.com', 11, 4),
('hola@hola.com', 12, 0),
('hola@hola.com', 13, 1),
('hola@hola.com', 16, 2),
('lis@gmail.com', 1, 4),
('perevictorvives@gmail.com', 2, 4),
('perevictorvives@gmail.com', 3, 4),
('perevictorvives@gmail.com', 4, 4),
('perevictorvives@gmail.com', 5, 4),
('perevictorvives@gmail.com', 6, 4),
('perevictorvives@gmail.com', 7, 4),
('perevictorvives@gmail.com', 8, 4),
('perevictorvives@gmail.com', 9, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tablones`
--
ALTER TABLE `tablones`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tablones_elementos`
--
ALTER TABLE `tablones_elementos`
 ADD PRIMARY KEY (`ID_tablones`,`ID_elementos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`Correo`);

--
-- Indices de la tabla `usuarios_tablones`
--
ALTER TABLE `usuarios_tablones`
 ADD PRIMARY KEY (`Correo_usuario`,`ID_tablon`), ADD KEY `ID_tablon` (`ID_tablon`), ADD KEY `Correo_usuario` (`Correo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tablones`
--
ALTER TABLE `tablones`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tablones_elementos`
--
ALTER TABLE `tablones_elementos`
ADD CONSTRAINT `tablones_elementos - tablones` FOREIGN KEY (`ID_tablones`) REFERENCES `tablones` (`ID`);

--
-- Filtros para la tabla `usuarios_tablones`
--
ALTER TABLE `usuarios_tablones`
ADD CONSTRAINT `usuarios_tablones - tablones` FOREIGN KEY (`ID_tablon`) REFERENCES `tablones` (`ID`),
ADD CONSTRAINT `usuarios_tablones - usuarios` FOREIGN KEY (`Correo_usuario`) REFERENCES `usuarios` (`Correo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
