-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2017 a las 17:07:57
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `nombre_almacen` varchar(300) DEFAULT NULL,
  `tipo_almacen` varchar(50) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `estadoA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `id_sucursal`, `nombre_almacen`, `tipo_almacen`, `direccion`, `estadoA`) VALUES
(1, 1, 'Almacen A', 'Primario', 'Ceja El alto Calle dos Nro 7768', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `id_sucursal`, `monto`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(500) DEFAULT NULL,
  `nit` int(11) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `tipo_cliente` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `pass` varchar(150) NOT NULL,
  `publico` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre_cliente`, `nit`, `direccion`, `tipo_cliente`, `telefono`, `correo`, `pass`, `publico`) VALUES
(1, 'Juanito Perez', 84843281, NULL, 'minorista', 76576543, 'jperez@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(2, 'Yoseline Aliaga Mendoza', 2776122, NULL, 'minorista', 6756354, 'yoselinali@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(3, 'Alberto Quispe Tapia', 92929775, NULL, 'minorista', 60643210, 'albertoqtapia@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(4, 'RICHARD QUISPE MAMANI', 7770001, '------------------', 'GENERAL', 7799494, 'ric@gmail.com', '', b'0'),
(5, 'edwin', 2344, 'Z/ Rio seco C/ San lorenzo Nro 555', 'general', 0, '----------------', '', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_tipo_contrato` int(11) DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `fecha_fin_contrato` date DEFAULT NULL,
  `estadoContrato` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `id_personal`, `id_tipo_contrato`, `fecha_contrato`, `estado`, `fecha_fin_contrato`, `estadoContrato`) VALUES
(1, 7017691, 2, '2017-12-12', b'1', '0000-00-00', b'1'),
(2, 321, 1, '2017-12-12', b'1', '0000-00-00', b'1'),
(3, 123, 2, '2017-12-19', b'1', '0000-00-00', b'1'),
(4, 2222, 1, '2017-12-12', b'1', '0000-00-00', b'1'),
(5, 7017691, 1, '2017-12-19', b'1', '0000-00-00', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `idPrecioTipoU` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `cantidadTU` double NOT NULL,
  `precioTU` double NOT NULL,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `id_pedido`, `id_producto`, `idPrecioTipoU`, `cantidad`, `cantidadTU`, `precioTU`, `total`, `estado`) VALUES
(1, 1, 1, 1, 5000, 100, 8, 800, 0),
(2, 1, 3, 5, 10000, 100, 12, 1200, 0),
(3, 2, 2, 2, 1000, 10, 3.5, 35, 0),
(4, 3, 2, 2, 1000, 10, 3.5, 35, 0),
(5, 4, 5, 8, 100, 100, 4, 400, 0),
(6, 4, 4, 7, 200, 200, 1, 200, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido_cli`
--

CREATE TABLE `detalle_pedido_cli` (
  `id` int(11) NOT NULL,
  `nro_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `idPrecioTipoU` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `cantidadTU` double NOT NULL,
  `precioTU` double NOT NULL,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido_cli`
--

INSERT INTO `detalle_pedido_cli` (`id`, `nro_pedido`, `id_producto`, `idPrecioTipoU`, `cantidad`, `cantidadTU`, `precioTU`, `total`, `estado`) VALUES
(1, 1, 2, 0, NULL, 0, 0, NULL, 1),
(2, 1, 1, 0, NULL, 0, 0, NULL, 1),
(3, 1, 3, 0, NULL, 0, 0, NULL, 1),
(4, 2, 2, 3, 48, 4, 60, NULL, 1),
(5, 2, 1, 1, 4, 4, 9, NULL, 1),
(6, 2, 3, 5, 5, 5, 8, NULL, 1),
(7, 2, 2, 0, NULL, 0, 0, NULL, 1),
(8, 2, 1, 0, NULL, 0, 0, NULL, 1),
(9, 2, 3, 0, NULL, 0, 0, NULL, 1),
(10, 3, 3, 5, 3, 3, 8, 24, 1),
(11, 3, 5, 8, 2, 2, 5, 10, 1),
(12, 3, 4, 7, 3, 3, 1, 3, 1),
(13, 4, 3, 5, 3, 3, 8, NULL, 1),
(14, 4, 1, 1, 5, 5, 9, NULL, 1),
(15, 4, 4, 7, 12, 12, 1, NULL, 1),
(16, 4, 3, 0, NULL, 0, 0, NULL, 1),
(17, 4, 1, 0, NULL, 0, 0, NULL, 1),
(18, 4, 4, 0, NULL, 0, 0, NULL, 1),
(19, 5, 4, 6, 200, 2, 100, 200, 1),
(20, 5, 1, 1, 4, 4, 9, 36, 1),
(21, 5, 3, 5, 6, 6, 8, 48, 1),
(22, 5, 4, 0, NULL, 0, 0, 200, 1),
(23, 5, 1, 0, NULL, 0, 0, 36, 1),
(24, 5, 3, 0, NULL, 0, 0, 48, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_caja_egreso`
--

CREATE TABLE `historial_caja_egreso` (
  `id` int(11) NOT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_caja_ingreso`
--

CREATE TABLE `historial_caja_ingreso` (
  `id` int(11) NOT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_egreso_producto`
--

CREATE TABLE `historial_egreso_producto` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `hora_egreso` varchar(10) DEFAULT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_egreso_producto`
--

INSERT INTO `historial_egreso_producto` (`id`, `id_producto`, `cantidad`, `fecha_egreso`, `hora_egreso`, `id_personal`) VALUES
(1, 3, 3, '2017-12-12', '16:58:12', 321),
(2, 5, 2, '2017-12-12', '16:58:12', 321),
(3, 4, 3, '2017-12-12', '16:58:13', 321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ingreso_producto`
--

CREATE TABLE `historial_ingreso_producto` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` varchar(10) DEFAULT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_ingreso_producto`
--

INSERT INTO `historial_ingreso_producto` (`id`, `id_producto`, `cantidad`, `fecha_ingreso`, `hora_ingreso`, `id_personal`) VALUES
(1, 1, 5000, '2017-12-12', '16:07:56', 7017691),
(2, 3, 10000, '2017-12-12', '16:07:56', 7017691),
(3, 2, 1000, '2017-12-12', '16:13:35', 7017691),
(4, 2, 1000, '2017-12-12', '16:13:56', 7017691),
(5, 5, 100, '2017-12-12', '16:51:26', 7017691),
(6, 4, 200, '2017-12-12', '16:51:26', 7017691);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `fecha_ingeso` date DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_venta`
--

CREATE TABLE `nota_venta` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `nro_pedido` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `tipo_venta` varchar(10) DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `montoPendiente` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_venta`
--

INSERT INTO `nota_venta` (`id`, `id_personal`, `nro_pedido`, `fecha_venta`, `monto_total`, `tipo_venta`, `fecha_limite`, `montoPendiente`) VALUES
(1, 321, 3, '2017-12-12', 37, 'Al contado', '0000-00-00', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_contrato`
--

CREATE TABLE `pago_contrato` (
  `id` int(11) NOT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `pago` double DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_nota_venta`
--

CREATE TABLE `pago_nota_venta` (
  `id` int(11) NOT NULL,
  `id_nota_venta` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `monto_pendiente` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_pedido`
--

CREATE TABLE `pago_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `pendiente` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cli`
--

CREATE TABLE `pedido_cli` (
  `nro_pedido` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_cli`
--

INSERT INTO `pedido_cli` (`nro_pedido`, `id_sucursal`, `id_cliente`, `fecha_pedido`, `monto`, `estado`) VALUES
(1, 1, 3, '2017-12-12', 316, 0),
(2, 1, 3, '2017-12-12', 316, 0),
(3, 1, NULL, '2017-12-12', 37, 1),
(4, 1, 3, '2017-12-12', 81, 0),
(5, 1, 3, '2017-12-12', 284, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_prov`
--

CREATE TABLE `pedido_prov` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `nro_pedido` int(11) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_pendiente` double NOT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_prov`
--

INSERT INTO `pedido_prov` (`id`, `id_proveedor`, `fecha_pedido`, `nro_pedido`, `monto_total`, `monto_pendiente`, `estado`) VALUES
(1, 1, '2017-12-12', 1, 2000, 2000, b'0'),
(2, 2, '2017-12-12', 2, 35, 35, b'0'),
(3, 2, '2017-12-12', 3, 35, 35, b'0'),
(4, 2, '2017-12-12', 4, 600, 600, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `ci` int(11) NOT NULL,
  `nombres` varchar(300) DEFAULT NULL,
  `apellidos` varchar(300) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `estadoPer` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`ci`, `nombres`, `apellidos`, `fecha_nacimiento`, `celular`, `direccion`, `cargo`, `usuario`, `password`, `id_sucursal`, `estadoPer`) VALUES
(123, 'Herick', 'Mamani Mamani', '1990-12-31', 77788899, 'Villa dela Nro 898', 'Almacenero', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(321, 'Juan', 'Choque Ticona', '1991-12-28', 76662626, 'Senkata Nro 797', 'Vendedor', '321', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(2222, 'Alejandra', 'Condori ', '1992-12-16', 7885672, 'El Alto camino laja Nro 4567', 'Cajero', '2222', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(7017691, 'Edwin', 'Chambi Gutierrez', '1989-12-29', 74085867, 'rio se Extranca Nro 737', 'Super administrador', '7017691', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precioTipoU`
--

CREATE TABLE `precioTipoU` (
  `idPrecioTipoU` int(11) NOT NULL,
  `cantidadTU` double NOT NULL,
  `precioU` double DEFAULT NULL,
  `ptunitario` double NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_tipo_unitario` int(11) DEFAULT NULL,
  `estadoPTU` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precioTipoU`
--

INSERT INTO `precioTipoU` (`idPrecioTipoU`, `cantidadTU`, `precioU`, `ptunitario`, `id_producto`, `id_tipo_unitario`, `estadoPTU`) VALUES
(1, 1, 9, 9, 1, 1, b'1'),
(2, 1, 5, 5, 2, 1, b'1'),
(3, 12, 5, 60, 2, 2, b'1'),
(4, 10, 140, 1400, 3, 3, b'0'),
(5, 1, 8, 8, 3, 1, b'1'),
(6, 100, 1, 100, 4, 4, b'1'),
(7, 1, 1, 1, 4, 1, b'1'),
(8, 1, 5, 5, 5, 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_pro` varchar(300) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `marca` varchar(300) DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `id_tipo_producto` int(11) DEFAULT NULL,
  `id_almacen` int(11) DEFAULT NULL,
  `estadoPro` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_pro`, `descripcion`, `precio`, `marca`, `stock`, `id_tipo_producto`, `id_almacen`, `estadoPro`) VALUES
(1, 'CUAD A4 JUNIOR BOOK', NULL, NULL, 'STAN', 5000, 1, 1, b'1'),
(2, 'ESCUADRA X 20CM', NULL, NULL, 'FC', 2000, 1, 1, b'1'),
(3, 'PLUMO ESTUCHE JUMBO L47 X12', NULL, NULL, 'FC', 9997, 1, 1, b'1'),
(4, 'CARTUL PLASTIFICADA COLOR', NULL, NULL, 'MAPED', 197, 1, 1, b'1'),
(5, 'TIJERAS DE FORMAS SIMPLES', NULL, NULL, 'MAPED', 98, 2, 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre_prov` varchar(300) DEFAULT NULL,
  `direccion_prov` varchar(500) DEFAULT NULL,
  `telefono_prov` int(11) DEFAULT NULL,
  `nit` int(11) DEFAULT NULL,
  `nombre_encargado` varchar(300) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre_prov`, `direccion_prov`, `telefono_prov`, `nit`, `nombre_encargado`, `correo`, `estado`) VALUES
(1, 'TOP ', 'SANTA CRUZ TERCER ANILLO ', 2000289, 1288489, 'Ramiro Quenta', 'ram@gmail.com', b'1'),
(2, 'PROVEEDOR GENERAL', '-----------', 79993779, 0, 'RAMSEE QUISPE QUISPE', 'ram@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `nit` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `emai` varchar(500) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `nombre`, `nit`, `telefono`, `direccion`, `emai`, `estado`) VALUES
(1, 'Lider', 1000012, 76543219, 'Ceja El Alto calle dos', 'liderlibre@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id` int(11) NOT NULL,
  `nombre_tipo_contrato` varchar(300) DEFAULT NULL,
  `experiencia_trabajo` varchar(100) DEFAULT NULL,
  `turno_trabajo` varchar(50) DEFAULT NULL,
  `dias_trabajo` varchar(100) DEFAULT NULL,
  `horario_trabajo` varchar(50) DEFAULT NULL,
  `tipo_sueldo` varchar(50) DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `estadoTipoC` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `nombre_tipo_contrato`, `experiencia_trabajo`, `turno_trabajo`, `dias_trabajo`, `horario_trabajo`, `tipo_sueldo`, `sueldo`, `estadoTipoC`) VALUES
(1, 'Escolar', 'Medio', 'Todo el dia', 'Lunes,Martes,Miercoles,Jueves,Viernes,Sabado', '7:00 a 19:00', 'Por mes', 2000, b'1'),
(2, 'Todo el año', 'Medio', 'Todo el dia', 'Lunes,Martes,Miercoles,Jueves,Viernes,Sabado', '7:00 a 19:00', 'Por mes', 3000, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre_tipo_p` varchar(300) DEFAULT NULL,
  `estadoTP` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre_tipo_p`, `estadoTP`) VALUES
(1, 'ESCOLAR', b'1'),
(2, 'OFICINA ', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unitario`
--

CREATE TABLE `tipo_unitario` (
  `id` int(11) NOT NULL,
  `nombre_tipo_u` varchar(300) DEFAULT NULL,
  `estadoTU` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_unitario`
--

INSERT INTO `tipo_unitario` (`id`, `nombre_tipo_u`, `estadoTU`) VALUES
(1, 'UND', b'1'),
(2, 'DOCENA', b'1'),
(3, 'PAQ', b'1'),
(4, 'CAJA', b'1'),
(5, 'ROLLO', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_tipo_contrato` (`id_tipo_contrato`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `detalle_pedido_cli`
--
ALTER TABLE `detalle_pedido_cli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_pedido` (`nro_pedido`);

--
-- Indices de la tabla `historial_caja_egreso`
--
ALTER TABLE `historial_caja_egreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `historial_caja_ingreso`
--
ALTER TABLE `historial_caja_ingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `historial_egreso_producto`
--
ALTER TABLE `historial_egreso_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `historial_ingreso_producto`
--
ALTER TABLE `historial_ingreso_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nro_pedido` (`nro_pedido`);

--
-- Indices de la tabla `pago_contrato`
--
ALTER TABLE `pago_contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `pago_contrato_ibfk_1` (`id_contrato`);

--
-- Indices de la tabla `pago_nota_venta`
--
ALTER TABLE `pago_nota_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nota_venta` (`id_nota_venta`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `pago_pedido`
--
ALTER TABLE `pago_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `pedido_cli`
--
ALTER TABLE `pedido_cli`
  ADD PRIMARY KEY (`nro_pedido`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedido_prov`
--
ALTER TABLE `pedido_prov`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `precioTipoU`
--
ALTER TABLE `precioTipoU`
  ADD PRIMARY KEY (`idPrecioTipoU`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_tipo_unitario` (`id_tipo_unitario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_unitario`
--
ALTER TABLE `tipo_unitario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido_cli`
--
ALTER TABLE `detalle_pedido_cli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `historial_caja_egreso`
--
ALTER TABLE `historial_caja_egreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial_caja_ingreso`
--
ALTER TABLE `historial_caja_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial_egreso_producto`
--
ALTER TABLE `historial_egreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historial_ingreso_producto`
--
ALTER TABLE `historial_ingreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pago_contrato`
--
ALTER TABLE `pago_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago_nota_venta`
--
ALTER TABLE `pago_nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago_pedido`
--
ALTER TABLE `pago_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedido_cli`
--
ALTER TABLE `pedido_cli`
  MODIFY `nro_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pedido_prov`
--
ALTER TABLE `pedido_prov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `precioTipoU`
--
ALTER TABLE `precioTipoU`
  MODIFY `idPrecioTipoU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_unitario`
--
ALTER TABLE `tipo_unitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`);

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`ci`),
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido_prov` (`id`);

--
-- Filtros para la tabla `detalle_pedido_cli`
--
ALTER TABLE `detalle_pedido_cli`
  ADD CONSTRAINT `detalle_pedido_cli_ibfk_1` FOREIGN KEY (`nro_pedido`) REFERENCES `pedido_cli` (`nro_pedido`);

--
-- Filtros para la tabla `historial_caja_egreso`
--
ALTER TABLE `historial_caja_egreso`
  ADD CONSTRAINT `historial_caja_egreso_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`),
  ADD CONSTRAINT `historial_caja_egreso_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`ci`);

--
-- Filtros para la tabla `historial_caja_ingreso`
--
ALTER TABLE `historial_caja_ingreso`
  ADD CONSTRAINT `historial_caja_ingreso_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`),
  ADD CONSTRAINT `historial_caja_ingreso_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`ci`);

--
-- Filtros para la tabla `historial_egreso_producto`
--
ALTER TABLE `historial_egreso_producto`
  ADD CONSTRAINT `historial_egreso_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `historial_ingreso_producto`
--
ALTER TABLE `historial_ingreso_producto`
  ADD CONSTRAINT `historial_ingreso_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD CONSTRAINT `nota_ingreso_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido_prov` (`id`);

--
-- Filtros para la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  ADD CONSTRAINT `nota_venta_ibfk_1` FOREIGN KEY (`nro_pedido`) REFERENCES `pedido_cli` (`nro_pedido`);

--
-- Filtros para la tabla `pago_contrato`
--
ALTER TABLE `pago_contrato`
  ADD CONSTRAINT `pago_contrato_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id`),
  ADD CONSTRAINT `pago_contrato_ibfk_2` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`);

--
-- Filtros para la tabla `pago_nota_venta`
--
ALTER TABLE `pago_nota_venta`
  ADD CONSTRAINT `pago_nota_venta_ibfk_1` FOREIGN KEY (`id_nota_venta`) REFERENCES `nota_venta` (`id`),
  ADD CONSTRAINT `pago_nota_venta_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`ci`);

--
-- Filtros para la tabla `pago_pedido`
--
ALTER TABLE `pago_pedido`
  ADD CONSTRAINT `pago_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido_prov` (`id`),
  ADD CONSTRAINT `pago_pedido_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`ci`);

--
-- Filtros para la tabla `pedido_cli`
--
ALTER TABLE `pedido_cli`
  ADD CONSTRAINT `pedido_cli_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`),
  ADD CONSTRAINT `pedido_cli_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pedido_prov`
--
ALTER TABLE `pedido_prov`
  ADD CONSTRAINT `pedido_prov_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`);

--
-- Filtros para la tabla `precioTipoU`
--
ALTER TABLE `precioTipoU`
  ADD CONSTRAINT `precioTipoU_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `precioTipoU_ibfk_2` FOREIGN KEY (`id_tipo_unitario`) REFERENCES `tipo_unitario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id_almacen`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
