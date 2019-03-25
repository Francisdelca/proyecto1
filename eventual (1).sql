-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2019 a las 18:53:28
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_bin NOT NULL,
  `color` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `color`) VALUES
(1, 'Conferencias', '#5070ef'),
(2, 'MÃºsica', '#f37d07'),
(3, 'Fiesta', '#32bdf1'),
(4, 'Festival', '#f3cd36'),
(5, 'AnimaciÃ³n', '#ec0006'),
(6, 'GastronomÃ­a', '#1da55a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha` varchar(10) COLLATE utf8_bin NOT NULL,
  `hora` varchar(5) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(50) COLLATE utf8_bin NOT NULL,
  `categoria` int(11) NOT NULL,
  `organizador` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_bin NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  `portada` varchar(100) COLLATE utf8_bin NOT NULL,
  `asistentes` int(4) NOT NULL,
  `precio` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha`, `hora`, `direccion`, `categoria`, `organizador`, `descripcion`, `imagen`, `portada`, `asistentes`, `precio`) VALUES
(1, 'Conferencia Senati 2019', '05-06-2019', '13:00', 'Av. Centenario', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'business-conference-flyer-template-aa4d8354244e76a30b27d38dd6e086a1_screen.jpg', 'BANNER-CONFERENCIA-01-1.jpg', 0, '15'),
(2, 'Otaku Fest', '18-11-2019', '15:00', 'av. universitaria ', 5, 2, 'Super festival de anime', '1512b31bf309cf5d9d3a97c3567c5d72.jpg', 'portada-fanatic-fest.jpg', 0, '16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `clave` varchar(50) COLLATE utf8_bin NOT NULL,
  `nacimiento` varchar(100) COLLATE utf8_bin NOT NULL,
  `sexo` int(1) NOT NULL,
  `foto` varchar(500) COLLATE utf8_bin NOT NULL,
  `t_usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `apellido`, `email`, `clave`, `nacimiento`, `sexo`, `foto`, `t_usuario`) VALUES
(1, 'kiritof', 'kirito', 'fernadez', 'kirito_gaymer@outlook.com', '123456', '20-12-2030', 1, '6a0ed9e8211a74807d4392b5981ae84d.jpg', 1),
(2, 'natsu', 'juan', 'martines', 'natsu@gaymer.com', '123456', '20-12-2030', 1, '1512b31bf309cf5d9d3a97c3567c5d72.jpg', 0),
(3, 'resama', 'joseph', 'zelada', 'jkzelada04.11.2000@gmail.com', '123456', '04-11-2000', 1, '6a0ed9e8211a74807d4392b5981ae84d.jpg', 0),
(4, 'holababy', 'Francis', 'Del Castillo', 'francisdelca@hotmail.com', '123456', '18-11-1998', 1, 'pexels-photo-1366957.jpeg', 0),
(5, 'maria', 'maria', 'peres', 'maria@gmail.com', '01234', '12-45-2019', 0, '', 1),
(6, 'juan', 'juan', 'chulca', 'juan@hotmail.com', '4321', '18-11-1998', 1, '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `organizador` (`organizador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`organizador`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
