-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2021 a las 03:22:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Ofertas'),
(2, 'Refrigeración'),
(3, 'TV & Audio'),
(4, 'Cocinas'),
(5, 'Lavado'),
(6, 'Climaticación'),
(7, 'Hogar');

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
(123, 'aire-acondicionado2.png'),
(123, 'aire-acondicionado1.png'),
(12312, '12312_1.jpg'),
(12312, '12312_2.jpg'),
(12312, '12312_3.jpg'),
(1, 'cocina1.png'),
(2, '2_0.jpg'),
(2, '2_1.jpg'),
(3, '3_0.jpg'),
(3, '3_1.jpg'),
(4, '4_0.jpg'),
(4, '4_1.jpg'),
(4, '4_2.jpg'),
(5, '5_0.jpg'),
(5, '5_1.jpg'),
(6, '6_0.jpg'),
(6, '6_1.jpg'),
(7, '7_0.jpg'),
(7, '7_1.jpg'),
(8, '8_0.jpg'),
(8, '8_1.jpg'),
(9, '9_0.jpg'),
(9, '9_1.jpg'),
(10, '10_0.jpg'),
(10, '10_1.jpg'),
(11, '11_0.jpg'),
(11, '11_1.jpg'),
(12, '12_0.jpg'),
(12, '12_1.jpg'),
(13, '13_0.jpg'),
(13, '13_1.jpg'),
(14, '14_0.jpg'),
(14, '14_1.jpg'),
(17, '17_0.jpg'),
(17, '17_1.jpg'),
(15, '15_1.jpg'),
(15, '15_2.jpg'),
(1, '1_3.jpg');

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

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `total`, `fecha`, `confirmado`, `usuario`) VALUES
(1, 1000, '2021-11-11 20:41:00', '1', '1'),
(2, 0, '2021-11-13 15:48:23', '1', '1'),
(3, 0, '2021-11-13 15:49:15', '1', '1'),
(4, 0, '2021-11-13 15:49:55', '1', '1'),
(5, 0, '2021-11-13 15:54:41', '1', '1'),
(6, 0, '2021-11-13 15:56:56', '1', '1'),
(7, 0, '2021-11-13 16:14:51', '1', '1'),
(8, 0, '2021-11-13 16:16:55', '1', '1'),
(9, 0, '2021-11-13 16:18:19', '1', '1'),
(10, 10000, '2021-11-14 19:11:35', '1', 'admin'),
(11, 85000, '2021-11-14 19:12:13', '1', 'admin'),
(12, 10000, '2021-11-14 22:17:50', '1', '1'),
(13, 90000, '2021-11-14 22:40:09', '0', '1'),
(14, 0, '2021-11-14 23:20:27', '0', 'admin');

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

--
-- Volcado de datos para la tabla `pedidolineas`
--

INSERT INTO `pedidolineas` (`idpedido`, `nrolinea`, `cantidad`, `detalle`, `precio`, `idproducto`) VALUES
(1, 1, 2, 'asfsad', 21312, 12312),
(1, 2, 4, 'asfsad', 21312, 12312),
(1, 3, 5, 'asfsad', 21312, 12312),
(2, 1, 4, 'asfsad', 21312, 12312),
(3, 1, 6, 'asfsad', 21312, 12312),
(4, 1, 7, 'asfsad', 21312, 12312),
(5, 1, 6, 'asfsad', 21312, 12312),
(6, 1, 10, '1', 10, 123),
(7, 1, 15, '1', 10, 123),
(7, 2, 10, 'asfsad', 21312, 12312),
(8, 1, 10, '1', 10, 123),
(9, 1, 5, '1', 10, 123),
(10, 1, 1, 'Juguera Philips Hr1855 Juguera Philips Hr1855', 5000, 14),
(10, 2, 2, 'Barra de sonido TCL T310', 2500, 15),
(11, 1, 1, 'Smart TV Samsung 55\" UHD UN55AU7000', 85000, 10),
(12, 1, 2, 'Juguera Philips Hr1855 Juguera Philips Hr1855', 5000, 14),
(13, 1, 4, 'Juguera Philips Hr1855 Juguera Philips Hr1855', 5000, 14),
(13, 2, 2, 'Lavarropa Samsung Ww10k6410qx 10,5kg', 35000, 7);

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
  `activo` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `activo`, `categoria`) VALUES
(1, 'Cocina industrial', '      Línea Quarzo     Quemadores: 4 (24 pulgadas)     Acabados en acero inoxidable     Horno y cocina a Gas     Tapa de vidrio templado     Tablero de acero inoxidable     Parrillas fundidas unificadas     Quemador Ultra Rápido triple corona     Zona de control (frente)     Encendido electrónico en horno y quemadores     Timer mecánico Horno y zona inferior     Doble vidrio templado en el horno     Vidrio reflectivo en el horno     Termostato     Luz en el horno     Grill     Asador giratorio     Parrilla autodeslizable en el horno     Accesorios: Bandeja      Dimensiones: Alto: 94cm Ancho: 60cm Prof: 58cm      Plancha asadora', 15000.00, 10, '1', 4),
(2, 'Cocina', '    4 Quemadores a gas      Horno eléctrico • Grill      Termostato ajustable      Mesada en acero inoxidable con tapa de vidrio      Parrillas de quemadores esmaltada      Quemadores esmaltados      Puerta con visor y vidrio total      Rejillas de horno cromadas      Patas      Frente en acero inoxidable      Laterales esmaltados color negro      Conexión de gas del lado derecho      Medidas: (An. x Prof. x Al.) 50 x 60 x 85 cm', 5500.00, 20, '1', 4),
(3, 'Cocina Moderna', '    Horno y grill eléctrico     Encendido electrónico     Mesada Acero Inoxidable     Soportes en Hierro Fundido     Tapa de vidrio     Luz en el horno     Doble vidrio en horno (desmontable)     Kit para cambio de gas     Timer digital     Color: Acero Inoxidable (frente)     An x Al x Prof: 60 x 86 x 60 cm.', 12000.00, 5, '1', 4),
(4, 'Aspiradora Irobot Braava M6', '  ARTÍCULO DE LIQUIDACIÓN - El producto esta nuevo y en perfecto estado, el empaque está deteriorado  El robot trapeador Braava jet™ m6 ayuda a combatir los desórdenes  pegajosos, la suciedad* y la grasa de la cocina a lo largo de todo su hogar, sin  que tenga que mover un dedo. Simplemente coloque una almohadilla de  trapeado o barrido y el robot hará el resto. Cuando salga, controle y  personalice la forma de limpiar de su robot con la App iRobot HOME. *Probado  en modo de limpieza localizada SPOT.  Limpieza en metros cuadrados: barrido en seco 92 m2, trapeado 37 m2.   • El robot trapeador más reciente con pulverizador de chorro a presión ayuda a  combatir los líos pegajosos, la mugre* y la grasa de la cocina. *(Probado en  modo de limpieza localizada SPOT)  • La navegación patentada iAdapt™ 3.0 con tecnología vSLAM™ permite al  robot desplazarse sin problemas y trapear o barrer de forma eficiente sus pisos.  • La tecnología de trazado de mapas inteligente Imprint™ posibilita al robot  aprender, crear mapas y adaptarse a su hogar, lo que le permite controlar la  habitación que desea limpiar y el momento de hacerlo.  • Ideal para varias habitaciones y espacios más grandes. Navega alrededor de  objetos y bajo los muebles. Limpia suelos duros pulidos, como madera dura,  cerámica y piedra  • El diseño maximizado de limpieza de bordes llega a las esquinas y a  cualquier rincón. Limpia debajo de los muebles y en otros espacios difíciles de  alcanzar.  • Solo coloque una almohadilla de barrido en seco o trapeado húmedo y el  robot selecciona automáticamente el método de limpieza. Para un aroma fresco  y duradero, añada la solución de limpieza de suelos duros de Braava jet™.  • “Braava, limpia mi cocina”. Ubica su cocina desde su sala de estar. Con la  app iRobot HOME puede elegir las habitaciones que desea trapear o barrer y el  momento de hacerlo. Disfrute del control con manos libres con Alexa y el  Asistente de Google.  • Se recarga y reinicia la limpieza de forma automática hasta que el ciclo de  limpieza se complete.   Contenido de la caja:  • 1 robot trapeador Roomba® m6  • 1 estación de carga  • 1 bandeja de acople  • 1 cable  • 2 almohadillas de trapeado húmedo de un solo uso  • 2 almohadilla de barrido en seco de un solo uso  • Botella de muestra de solución de limpieza de 4 oz   • Garantía equipo: 1 año • Garantía batería: 6 meses', 6000.00, 15, '1', 7),
(5, 'Plancha a vapor Smartlife 2361', 'Potencia: 1200W Depósito de agua (150ml) Suela de teflón antiadherente Selector de temperatura Funciones: seco, rociador, vapor continuo, ráfaga de vapor, vapor vertical, auto-limpieza', 2500.00, 35, '1', 7),
(6, 'Secarropas Tem Sol Z4201 8 kg', '      Capacidad: 8 kg     Bolsa de secado en PVC de 90 cm de alto     Mayor espacio de secado     Apertura con doble cierre     De fácil colocación     Sistema guarda fácil, la bolsa se pliega y ocupa poco espacio     6 perchas extraíbles     Temporizador 180 minutos     Últimos 15 minutos ciclo frio     Protege la ropa de friz     Dimensiones (ancho x alto x prof): 62 x 105 x 57 cm', 7500.00, 9, '1', 7),
(7, 'Lavarropa Samsung Ww10k6410qx 10,5kg', ' Color Acero Capacidad 8kg - 10kg Características Motor Inverter Desagote Con bomba Velociad del centrifugado 1000rpm - 1500rpm Tipo de carga Frontal Material del tambor Acero', 35000.00, 4, '1', 5),
(8, 'Lavasecarropa LG Wd10wvc4s6 10,5kg / 6 Kg', ' Capacidad Más de 2 lts Características Encendido eléctrico Velociad del centrifugado 1500rpm + Tipo de carga Frontal Material del tambor Acero', 32000.00, 10, '1', 5),
(9, 'LED Smart TV LG 50\" UHD 4K 50UP7750PSB con Magic Remote', ' Tipo Smart tv Tamaño de pantalla 50\" a 59\" Formato de pantalla Plana (flat) Sistema operativo WebOS Resolución de pantalla 4K / UHD TV', 80000.00, 5, '1', 3),
(10, 'Smart TV Samsung 55\" UHD UN55AU7000', ' Color Gris Tipo Smart tv Tamaño de pantalla 50\" a 59\" Características Netflix Formato de pantalla Plana (flat) Resolución de pantalla 4K / UHD TV', 85000.00, 14, '1', 3),
(11, 'Parlante Samsung Giga Audio Party MX-T50', ' Potencia 300w a 699w Características Bluetooth, Con control remoto, Con puerto usb', 9800.00, 24, '1', 3),
(12, 'Heladera LG GS65MPP1 626 lts', '  Modelo GS65MPP1  Origen México  Tipo de enfriamiento frío seco  Inverter  Capacidad bruta 687L  Eficiencia energética A  Medidas: alto 179cm, ancho 91.2cm, profundidad 73.8cm  Color Platinum Silver  Mega Capacidad  Moist Balance Crisper  Inverter Linear Compressor  Smart Diagnosis™  Iluminación LED  Garantía 10 años en el motor / 1 año defecto de fábrica', 90000.00, 5, '1', 2),
(13, 'Heladera Continental 2 puertas 370 lts', '      Tipo de enfriamiento frío seco     Capacidad refrigerador: 279L     Capacidad freezer: 91L     Capacidad bruta: 370L     Eficiencia energética A     Medidas: alto 1791cm, ancho 600cm, profundidad 700cm     Peso 57kg     Color blanco     Incluye porta latas y huevera     Garantía: 1 año, 2 años de garantía en el compresor', 70000.00, 9, '1', 2),
(14, 'Juguera Philips Hr1855 Juguera Philips Hr1855', ' Color Negro Potencia 700w a 1000w Capacidad 1,6 a 2 lts', 5000.00, 9, '1', 1),
(15, 'Barra de sonido TCL T310', ' Color Negro Potencia 101w a 299w Características Bluetooth', 2500.00, 8, '1', 1),
(17, 'Freezer Horizontal Consul Cha31kbdwx 311 lts', '      País de Origen Brasil     Fábrica Joinville     Capacidad Bruta 311 lts     Capacidad Neta 309 lts     Dimensiones del producto (An x A x Pr) 945 x 940 x 780     Dimensiones con empaque (A x An x Pr) 980 x 973 x 810     Peso Producto 48,5 kg     Tipo de Embalaje EPS + Shrink     Peso Embalado 49,6 kg     Cantidad Masa Refrigerante 85 gr     ISO Clase Climática T     Compresor EMYe70HEP     Cantidad de puertas 1     Color Puerta y Gabinete Blanco     Tipo de Deshielo Deshielo semiautomático     Diseño puerta Cuadrada     Manijas Externa con llave de seguridad     Cantidad de cajones Canasto en acero (1)     Bandeja para hielo No     Drenaje Frontal Si     Función Dual Si     Funciones interfaz del usuario Modo Congelador - Modo Refrigerador     Iluminación No     Control de Temperatura Control electrónico externo     Rueda Si     Tipo Gas Refrigerante R134a     Voltaje - Frecuencia 220V-50Hz     Garantía 1 año     Eficiencia energetica: D', 120000.00, 5, '1', 1),
(123, 'Aire Acondicionado', '    Capacidad del aire acondicionado: 12.000 BTU     Gas: R-410     Eficiencia energética: A     Alto unidad interior: 40 cm     Ancho unidad interior: 113 cm     Profundidad unidad interior: 30 cm     Peso unidad interior: 12 kg     Alto unidad exterior: 77 cm     Ancho unidad exterior: 102 cm     Profundidad unidad exterior: 43 cm     Peso unidad exterior: 45 kg     Color: Blanco     Incluye control remoto', 24000.00, 20, '1', 6),
(12312, 'Aire Acondicionado', 'Tipo de Climatización: Frío/Calor Gas: R-410 Alto unidad interior: 25,5 cm Ancho unidad interior: 69,8 cm Profundidad unidad interior: 19 cm Peso unidad interior: 7 kg Alto unidad exterior: 27,6 cm Ancho unidad exterior: 65,4 cm Profundidad unidad exterior: 50,7 cm Peso unidad exterior: 20 kg COP: 2.94.  Caudal: 900 m3/h  Cañerías: 5/8 - 1/4 Nivel de ruido db(A): 49/59  Voltaje: 220-240V/50Hz', 40000.00, 10, '1', 6);

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
('', 'RogersEste', 'Rogers', 'Estee', 'RogersEstee@yahoo.com', '1', 0),
('1', '1', 'Nohelia', 'Yah', 'Nohelia@gmail.com', '1', 0),
('12345', 'asd', 'juan', 'sadf', 'asd', 'asd', 0),
('2', '2', 'Nohe2', '3', 'das', 'a', 0),
('2354236-1', 'LynsieBryc', 'Lynsie', 'Bryce', 'LynsieBryce@hotmail.', '12', 0),
('4231456-6', 'admin', 'admin', 'admin', 'admin', 'admin@admin', 0),
('4548742-4', 'AlainCourt', 'Alain', 'Courtenay', 'AlainCourtenay@hotmail.fr', '21', 0),
('4685412-6', 'GerardKeyo', 'Gerard', 'Keyona', 'GerardKeyona@hotmail.fr', '1', 0),
('6541548-5', 'MauraKinse', 'Maura', 'Kinsey', 'MauraKinsey@hotmail.com', '1', 0),
('admin', 'admin', 'admin', 'admin', 'admin', 'admin', 1),
('user', 'user', 'user', 'user', 'user', 'user', 0);

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

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `fechahora`, `usuario`, `total`, `pedido`) VALUES
(1, '2021-11-11 20:41:27', '1', 1000, 1),
(2, '2021-11-13 15:47:20', '1', 1000, 1),
(3, '2021-11-13 15:48:28', '1', 0, 2),
(4, '2021-11-13 15:49:17', '1', 0, 3),
(5, '2021-11-13 15:54:32', '1', 149184, 4),
(6, '2021-11-13 15:54:45', '1', 127872, 5),
(7, '2021-11-13 15:57:30', '1', 100, 6),
(8, '2021-11-13 16:15:09', '1', 213270, 7),
(9, '2021-11-13 16:16:56', '1', 100, 8),
(10, '2021-11-13 16:18:21', '1', 50, 9),
(11, '2021-11-14 19:11:50', 'admin', 10000, 10),
(12, '2021-11-14 19:12:15', 'admin', 85000, 11),
(13, '2021-11-14 22:20:33', '1', 10000, 12);

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
-- Volcado de datos para la tabla `ventalineas`
--

INSERT INTO `ventalineas` (`idventa`, `nrolinea`, `cantidad`, `precio`, `detalle`, `idproducto`) VALUES
(1, 1, 10, 100, 'heladera', 12312),
(7, 1, 10, 10, '1', 123),
(8, 1, 15, 10, '1', 123),
(9, 1, 10, 10, '1', 123),
(10, 1, 5, 10, '1', 123),
(11, 1, 1, 5000, 'Juguera Philips Hr1855 Juguera Philips Hr1855', 14),
(11, 2, 2, 2500, 'Barra de sonido TCL T310', 15),
(12, 1, 1, 85000, 'Smart TV Samsung 55\" UHD UN55AU7000', 10),
(13, 1, 2, 5000, 'Juguera Philips Hr1855 Juguera Philips Hr1855', 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
