-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 22:16:37
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `service`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `apellido`, `telefono`, `alta`) VALUES
(37123456, 'Martin', 'Laporte', '545454', '2018-10-10'),
(40123465, 'Renzo', 'Olguin', '221133', '2018-11-30'),
(41105469, 'Geronimo', 'Finochietti', '112233', '2019-01-25'),
(41123456, 'Juanse', 'Bello', '332211', '2017-09-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `modelo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `cod_serie` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `modelo`, `cod_serie`) VALUES
(2, 'monitor', 'xml123'),
(3, 'placa', 'xxcf231'),
(4, 'mother', 'qwd-3131'),
(5, 'camara', 'cam-13131-qw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_interno` int(50) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `observaciones` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `falla` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_part` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_interno`, `id_equipo`, `dni`, `observaciones`, `falla`, `id_part`, `fecha`, `estado`) VALUES
(7, 2, 41105469, 'el dueÃ±o lo tiro al piso', 'no funciona', 4, '2017-09-15', 'en reparacion'),
(8, 2, 40123465, 'utilizaciÃ³n diaria/ 1 aÃ±o de uso', 'pixeles quemados', 5, '2018-03-06', 'listo para despachar'),
(10, 4, 41123456, '2 meses de uso', 'no inicia', 6, '2018-11-15', 'en reparacion'),
(11, 5, 37123456, 'camara para exteriores', 'se ve mal', 0, '2019-01-16', 'listo para despachar'),
(12, 3, 40123465, 'fuente generica', 'no tira post', 5, '2018-12-14', 'en reparacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id_part` int(11) NOT NULL,
  `nombre_part` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ape_part` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono_part` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `correo_part` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id_part`, `nombre_part`, `ape_part`, `telefono_part`, `correo_part`) VALUES
(0, 'Ninguno', '.', '.', '.'),
(4, 'pepe', 'argento', '1234', 'pepe@outlook.com'),
(5, 'roberto', 'Gimenez', '112233', 'rober@gmail.com'),
(6, 'Juan', 'Perez', '332211', 'juanp0@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_interno`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_part`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_interno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
