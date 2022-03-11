-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 18:50:48
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `contrasena` varchar(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `etiqueta` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cedula`, `nombre`, `email`, `telefono`, `celular`, `direccion`, `contrasena`, `birthday`, `etiqueta`, `tipo`) VALUES
(1, 71334778, 'freddy nelson', 'tendero@gmail.com', '111111', '111111', 'diagonal 55 av 46-51 int 212', '12345', '2021-07-24', NULL, 'Tendero'),
(2, 1111111, 'freddy nelson', 'supermercado@gmail.com', '111111', '3145315771', 'diagonal 55 av 46-51 int 212', '12345', '2021-07-24', NULL, 'Supermercado'),
(3, 111111111, 'freddy nelson', 'frenemuye@gmail.com', '111111', '3145315771', 'diagonal 55 av 46-51 int 212', '12345', '2021-06-27', NULL, 'Supermercado'),
(4, 345345, 'freddy nelson', 'frenemuye@yahoo.com', '111111', '3145315771', 'diagonal 55 av 46-51 int 212', '33333333', '2021-07-27', NULL, 'Tendero'),
(5, 111111, 'freddy nelson', 'frenemuye@yahoo.com', '111111', '3008036167', 'diagonal 55 av 46-51 int 212', '11111', '2021-07-27', NULL, 'Tendero'),
(6, 111111, 'freddy nelson', 'frenemuye@yahoo.com', '111111', '3008036167', 'diagonal 55 av 46-51 int 212', 'sssss', '2021-07-27', NULL, 'Tendero'),
(7, 2222, 'freddy nelson', 'frenemuye@yahoo.com', '111111', '111111', 'diagonal 55 av 46-51 int 212', 'ddddd', '2021-07-27', NULL, 'Tendero'),
(8, 2222, 'alberto nelson', 'frenemuye@yahoo.com', '111111', '111111', 'diagonal 55 av 46-51 int 212', 'sssssss', '2021-07-27', NULL, 'Tendero'),
(9, 222222, 'federico', 'frenemuye@yahoo.com', '111111', '3008036167', 'carrera 40 #20DB-24 apt 128', '1234', '2021-07-27', NULL, 'Tendero'),
(10, 3333, 'sofia lorem', '19pao95@gmail.com', '333333', '333333333', 'calle 75 #49-23 apt 401', '33333', '2021-07-27', NULL, 'Tendero'),
(11, 12345, 'wilson nelson', 'frenemuye@yahoo.com', '12345', '123456789', 'carrera 40 #20DB-24 apt 128', '12345', '2021-07-27', NULL, 'Tendero'),
(12, 11111, 'gustavo casas', 'infolanguagecenterweb@gmail.com', '12345', '3008036167', 'carrera 109 #42A-45 apartamento 1401', '12345', '2021-07-27', NULL, 'Tendero'),
(13, 11111, 'gustabo casas', 'infolanguagecenterweb@gmail.com', '12345', '3008036167', 'carrera 109 #42A-45 apartamento 1401', 'dddddddd', '2021-07-27', NULL, 'Tendero'),
(14, 11111, 'pedro casas', 'infolanguagecenterweb@gmail.com', '12345', '3008036167', 'carrera 109 #42A-45 apartamento 1401', '5444444', '2021-07-27', NULL, 'Tendero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `detalle` varchar(1000) NOT NULL,
  `cliente_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `contrasena1` varchar(20) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cedula`, `nombre`, `contrasena`, `contrasena1`, `tipo`) VALUES
(1, '11111', 'root@gmail.com', '12345', '12345', 'Root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cliente_cod` (`cliente_cod`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_cod`) REFERENCES `cliente` (`cod_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
