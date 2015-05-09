-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2015 a las 19:21:12
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
  `Pass` varchar(8) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tablones`
--

INSERT INTO `tablones` (`ID`, `Nombre`, `Descripcion`, `Pass`) VALUES
(1, 'Tablon', 'Descripcion', 'g9AM3esA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablones_elementos`
--

CREATE TABLE IF NOT EXISTS `tablones_elementos` (
  `ID_tablones` int(10) unsigned NOT NULL,
  `ID_elementos` int(10) unsigned NOT NULL,
  `Posicionx` int(6) unsigned NOT NULL,
  `Posiciony` int(6) unsigned NOT NULL,
  `Tipo` enum('Video','Imagen','Texto','Enlace') COLLATE latin1_spanish_ci NOT NULL,
  `Contenido` text COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Papelera` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
('lis@gmail.com', 'lis', '1993-02-14', 'Barcelona', '25d55ad283aa400af464c76d713c07ad');

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
('lis@gmail.com', 1, 4);

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
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
