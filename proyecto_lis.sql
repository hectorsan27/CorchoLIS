-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2015 a las 11:55:51
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
  `Descripcion` varchar(1024) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tablones`
--

INSERT INTO `tablones` (`ID`, `Nombre`, `Descripcion`) VALUES
(1, 'Tablon', 'Soy un tablón '),
(2, 'Tablon2', 'sdkosdg'),
(3, 'Tablon3', 'fgsdhas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablones_elementos`
--

CREATE TABLE IF NOT EXISTS `tablones_elementos` (
  `ID_tablones` int(10) unsigned NOT NULL,
  `ID_elementos` int(10) unsigned NOT NULL,
  `Posicionx` int(6) unsigned NOT NULL,
  `Posiciony` int(6) unsigned NOT NULL,
  `Tamano` enum('Grande','Mediano','Pequeno','') COLLATE latin1_spanish_ci NOT NULL,
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
('asdfgh@s.com', 'carlos', '2015-01-01', 'Las Palmas', 'e807f1fcf82d132f9bb018ca6738a19f'),
('carlos@gmail.com', 'carlos', '1991-04-17', 'Barcelona', '1234'),
('danielgarcia@gmail.com', 'Daniel', '2015-04-09', 'Sevilla', '5985166d1051f1d51dbe9024231271ae'),
('gd@gmail.com', 'asf', '2015-04-04', 'Barcelona', '25d55ad283aa400af464c76d713c07ad'),
('javi@gmail.com', 'javi', '2015-04-01', 'Barcelona', '1234'),
('juan@gmail.com', 'juan', '2015-04-15', 'Barcelona', '1234'),
('manolo@gmail.com', 'manolo', '2015-04-02', 'Burgos', '25d55ad283aa400af464c76d713c07ad'),
('pepe@gmail.com', 'pepe', '2015-04-01', 'Albacete', '25d55ad283aa400af464c76d713c07ad'),
('pere@gmail.com', 'pere', '2015-04-02', 'Barcelona', '1234');

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
('carlos@gmail.com', 1, 0),
('danielgarcia@gmail.com', 1, 1),
('gd@gmail.com', 2, 4),
('gd@gmail.com', 3, 4),
('javi@gmail.com', 1, 3),
('pere@gmail.com', 1, 4);

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
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
