-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 23:05:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_producto` int(11) DEFAULT NULL,
  `url_imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_producto`, `url_imagen`) VALUES
(12312, '12312_0.jpg'),
(12312, '12312_1.jpg'),
(12312, '12312_2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` datetime NOT NULL,
  `confirmado` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `usuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidolineas`
--

CREATE TABLE `pedidolineas` (
  `idpedido` int(11) NOT NULL,
  `nrolinea` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL,
  `stock` int(250) DEFAULT NULL,
  `activo` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `activo`) VALUES
(12312, 'asfsad', 'asdfas', 21312.00, 213123, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `esadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `password`, `nombre`, `apellido`, `email`, `direccion`, `esadmin`) VALUES
('1', '1', 'Nohelia', '1', 'as', '1', 0),
('12345', 'asd', 'juan', 'sadf', 'asd', 'asd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `total` double NOT NULL,
  `pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventalineas`
--

CREATE TABLE `ventalineas` (
  `idventa` int(11) NOT NULL,
  `nrolinea` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD KEY `orders_ibfk_5` (`id_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedidolineas`
--
ALTER TABLE `pedidolineas`
  ADD PRIMARY KEY (`idpedido`,`nrolinea`),
  ADD KEY `lineapedidoproducto` (`idproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventausuario` (`usuario`),
  ADD KEY `ventapedido` (`pedido`);

--
-- Indices de la tabla `ventalineas`
--
ALTER TABLE `ventalineas`
  ADD PRIMARY KEY (`idventa`,`nrolinea`),
  ADD KEY `lineaproducto` (`idproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidolineas`
--
ALTER TABLE `pedidolineas`
  ADD CONSTRAINT `lineapedido` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `lineapedidoproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `ventapedido` FOREIGN KEY (`pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `ventausuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`documento`);

--
-- Filtros para la tabla `ventalineas`
--
ALTER TABLE `ventalineas`
  ADD CONSTRAINT `lineaproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `lineaventa` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
