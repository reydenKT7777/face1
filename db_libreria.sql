-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2017 a las 12:35:09
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria`
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
  `direccion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `id_sucursal`, `nombre_almacen`, `tipo_almacen`, `direccion`) VALUES
(1, 1, 'Almacen carpetas', 'A', 'ns'),
(2, 2, 'Cuadernos', 'no se', 'no se'),
(3, 3, 'Cuadernos', 'no se', 'no se'),
(4, 1, 'Lapises', 'no se', 'no se');

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
(1, 2, 63),
(2, 3, 500);

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
(1, 'Matias Aliaga Mendes', 87532757, '', 'Mayorisa', 76765432, 'mtias7777@gmail.com', '', b'0'),
(2, 'alejandra', 14291253, '', 'mayorista', 263140, 'jenniferaleq@hotmail.com', '', b'0'),
(3, 'jk', 763472, '', 'minorista', 76543210, 'hdggs@gmai.com', '123', b'0'),
(4, 'milagros', 2837490, '', 'minorista', 297345, 'milagros34@hotmail.com', 'accd72d3729fdf5afd0d866d68a2de6b', b'1'),
(5, 'bkjhsdkfhskj', 23125646, '', 'minorista', 76543210, 'htc@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(6, 'Reynaldo Kantuta Tarifa', 843921218, '', 'minorista', 76209764, 'unx7777@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(7, 'Edwin', 7017691, '', 'minorista', 70154435, 'echgutierrez@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(8, 'jennifer alejandra', 14291253, NULL, 'minorista', 74085867, 'jenniferale.17@gmail.com', '202cb962ac59075b964b07152d234b70', b'1');

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
  `fecha_fin_contrato` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `id_personal`, `id_tipo_contrato`, `fecha_contrato`, `estado`, `fecha_fin_contrato`) VALUES
(1, 888828, 1, '2017-09-28', b'1', '0000-00-00'),
(2, 1111, 8, '2017-10-03', b'1', '0000-00-00'),
(3, 100001, 8, '2017-10-03', b'1', '0000-00-00'),
(4, 1111, 9, '2017-10-13', b'1', '0000-00-00'),
(5, 7017691, 8, '2017-10-13', b'1', '0000-00-00'),
(6, 14291253, 10, '2017-10-08', b'1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `id_pedido`, `id_producto`, `cantidad`, `total`, `estado`) VALUES
(1, 8, 1, 20, 250, 0),
(2, 8, 1, 40, 500, 0),
(3, 9, 1, 20, 250, 0),
(4, 9, 1, 40, 500, 0),
(5, 9, 1, 40, 500, 0),
(6, 9, 1, 30, 375, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido_cli`
--

CREATE TABLE `detalle_pedido_cli` (
  `id` int(11) NOT NULL,
  `nro_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido_cli`
--

INSERT INTO `detalle_pedido_cli` (`id`, `nro_pedido`, `id_producto`, `cantidad`, `total`, `estado`) VALUES
(1, 5, 1, 50, 625, 1),
(2, 5, 1, 50, 625, 1),
(3, 6, 1, 12, 150, 1),
(4, 10, 2, NULL, 24, 1),
(5, 10, 1, NULL, 50, 1),
(6, 11, 1, 12, 150, 1);

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

--
-- Volcado de datos para la tabla `historial_caja_egreso`
--

INSERT INTO `historial_caja_egreso` (`id`, `id_caja`, `id_personal`, `monto`, `fecha`, `hora`, `detalle`) VALUES
(1, 1, 888828, 50, '2017-10-10', '14:44:36', 'Pago contrato'),
(2, 1, 888828, 50, '2017-10-10', '15:29:33', 'Pago contrato'),
(3, 1, 888828, 50, '2017-10-10', '15:34:31', 'Pago contrato'),
(4, 1, 888828, 50, '2017-10-10', '15:36:24', 'Pago contrato'),
(5, 1, 888828, 50, '2017-10-10', '15:38:23', 'Pago contrato'),
(6, 1, 888828, 50, '2017-10-10', '15:39:26', 'Pago contrato'),
(7, 1, 888828, 10, '2017-10-10', '15:45:14', 'Pago contrato'),
(8, 1, 888828, 5, '2017-10-10', '15:47:59', 'Pago contrato'),
(9, 1, 888828, 10, '2017-10-10', '15:54:00', 'Pago contrato'),
(10, 1, 888828, 2, '2017-10-10', '15:54:15', 'Pago contrato'),
(11, 1, 888828, 10, '2017-10-10', '15:54:27', 'Pago contrato'),
(12, 2, 7017691, 500, '2017-10-13', '10:48:12', 'Pago contrato');

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

--
-- Volcado de datos para la tabla `historial_caja_ingreso`
--

INSERT INTO `historial_caja_ingreso` (`id`, `id_caja`, `id_personal`, `monto`, `fecha`, `hora`, `detalle`) VALUES
(1, 1, 888828, 500, '2017-09-29', '12:50', 'Reynaldo kantuta tarifa'),
(2, 2, 888828, 345, '2017-09-29', '12:25', 'RKT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_egreso_producto`
--

CREATE TABLE `historial_egreso_producto` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `hora_egreso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ingreso_producto`
--

CREATE TABLE `historial_ingreso_producto` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fecha_limite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_venta`
--

INSERT INTO `nota_venta` (`id`, `id_personal`, `nro_pedido`, `fecha_venta`, `monto_total`, `tipo_venta`, `fecha_limite`) VALUES
(1, 0, 1, '2017-10-26', 150, 'Al contado', '0000-00-00'),
(2, 0, 2, '2017-10-26', 150, 'Al contado', '0000-00-00'),
(3, 0, 3, '2017-10-26', 150, 'Al contado', '0000-00-00'),
(4, 0, 4, '2017-10-26', 150, 'Al contado', '0000-00-00'),
(5, 0, 5, '2017-10-31', 1250, 'Al contado', '0000-00-00'),
(6, 0, 6, '2017-11-06', 150, 'Al contado', '0000-00-00'),
(7, 1111, 11, '2017-11-09', 150, 'A credito', '2017-12-09');

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

--
-- Volcado de datos para la tabla `pago_contrato`
--

INSERT INTO `pago_contrato` (`id`, `id_contrato`, `fecha_pago`, `pago`, `id_caja`) VALUES
(1, 1, '2017-10-03', 1200, 1),
(2, 2, '2017-10-10', 50, 1),
(3, 1, '2017-10-10', 50, 1),
(4, 3, '2017-10-10', 50, 1),
(5, 3, '2017-10-10', 10, 1),
(6, 3, '2017-10-10', 5, 1),
(7, 1, '2017-10-10', 10, 1),
(8, 1, '2017-10-10', 2, 1),
(9, 1, '2017-10-10', 10, 1),
(10, 5, '2017-10-13', 500, 2);

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
(1, 1, 1, '2017-10-26', 150, 1),
(2, 1, 1, '2017-10-26', 150, 1),
(3, 1, 1, '2017-10-26', 150, 1),
(4, 1, 1, '2017-10-26', 150, 1),
(5, 1, 1, '2017-10-31', 1250, 1),
(6, 1, 1, '2017-11-06', 150, 1),
(10, 1, 6, '2017-11-09', 74, 1),
(11, 1, 7, '2017-11-09', 150, 1);

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
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_prov`
--

INSERT INTO `pedido_prov` (`id`, `id_proveedor`, `fecha_pedido`, `nro_pedido`, `monto_total`, `estado`) VALUES
(1, 1, '2017-10-20', 23, NULL, b'0'),
(2, 1, '2017-10-20', 23, NULL, b'0'),
(3, 1, '2017-10-20', 23, NULL, b'0'),
(4, 1, '2017-10-20', 23, NULL, b'0'),
(5, 1, '2017-10-20', 23, 495, b'0'),
(6, 1, '2017-10-20', 23, 495, b'0'),
(7, 1, '2017-10-20', 23, 495, b'0'),
(8, 1, '2017-10-20', 24, 750, b'0'),
(9, 1, '2017-10-20', 24, 1625, b'0');

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
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`ci`, `nombres`, `apellidos`, `fecha_nacimiento`, `celular`, `direccion`, `cargo`, `usuario`, `password`, `id_sucursal`) VALUES
(1111, 'Omar', 'Gonzales Mendes', '1987-10-03', 76743210, 'Z/ ntc', 'Vendedor', '1111', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2222, 'asdfsadf', 'lsakfjasf', '1992-10-02', 73231220, 'nslsfkaas', 'Cajero', '2222', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(100001, 'Jose', 'Mendoza Perez', '1999-12-16', 77543210, 'Sprinfil Av/ siempre viva', 'Almacenero', '100001', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(888828, 'Reynaldo', 'Kantuta Tarifa', '2017-09-21', 76543210, 'no se', 'Super administrador', '888828', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(7017691, 'Edwin ', 'Chambi Gutierrez', '1989-12-29', 72579524, 'z.tawantinsuyo', 'Super administrador', '7017691', '7c222fb2927d828af22f592134e8932480637c0d', 3),
(14291253, 'jennifer alejandra', 'llamoca condori', '1991-03-28', 74085867, 'calle final los andes Nro 345', 'Vendedor', '14291253', '12345678', 1);

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
  `id_tipo_unitario` int(11) DEFAULT NULL,
  `id_almacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_pro`, `descripcion`, `precio`, `marca`, `stock`, `id_tipo_producto`, `id_tipo_unitario`, `id_almacen`) VALUES
(1, 'Colores', 'Lapices de 12 colores ', 12.5, 'Faber Castel', 100, 2, 1, 1),
(2, 'Cuadernos ', 'cuadernos 2X2 kinder', 8, 'stanford', 0, 1, 1, 1),
(3, 'Boligrafos Azules', 'Boligrafos azules de micro punta', 2.5, 'Lider', 0, 1, 1, 2);

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
(1, 'Faber castel', 'Av/ primavera Z/ Sopocachi Nro 313', 76543210, 10231123, 'Juanito Arcoiris', 'fabercastel@gmail.com', b'1');

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
(1, 'San Camilo', 100000001, 76543210, 'Av. Los Andes Nro 432', 'sancamilo23@gmail..com', b'1'),
(2, 'San cristobal', 10002123, 765433321, 'Av Siempre viva', 'sccbal@gmail.com', b'1'),
(3, 'lider ceja', 7896666, 2008787, 'calle 2 ceja el alto', 'akdja@gmail.com', b'1');

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
  `sueldo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `nombre_tipo_contrato`, `experiencia_trabajo`, `turno_trabajo`, `dias_trabajo`, `horario_trabajo`, `tipo_sueldo`, `sueldo`) VALUES
(1, 'Promedio diario', 'Medio', 'Mañana', 'Lunes,Martes', '7:00 a 14:00', 'Por mes', 12000),
(5, 'AAhjdq', 'Medio', 'Todo el dia', 'Lunes,Martes,Miercoles,Jueves,Viernes', '14:00 a 19:00', 'Por días', 1500),
(8, 'navideño', 'Experto', 'Todo el dia', ',Sabado,Domingo', '7:00 a 19:00', 'Por mes', 1200),
(9, 'campaña', 'Medio', 'Todo el dia', 'Lunes,Martes,Miercoles,Jueves,Viernes,Sabado', '7:00 a 14:00', 'Por mes', 0),
(10, 'escolar', 'Experto', 'Mañana', 'Lunes,Martes,Miercoles,Jueves,Viernes', '7:00 a 14:00', 'Por mes', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre_tipo_p` varchar(300) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre_tipo_p`, `estado`) VALUES
(1, 'Lapiz', b'1'),
(2, 'Juguetes', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unitario`
--

CREATE TABLE `tipo_unitario` (
  `id` int(11) NOT NULL,
  `nombre_tipo_u` varchar(300) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_unitario`
--

INSERT INTO `tipo_unitario` (`id`, `nombre_tipo_u`, `estado`) VALUES
(1, 'Paquete', b'1');

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
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`),
  ADD KEY `id_tipo_unitario` (`id_tipo_unitario`),
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
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido_cli`
--
ALTER TABLE `detalle_pedido_cli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `historial_caja_egreso`
--
ALTER TABLE `historial_caja_egreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `historial_caja_ingreso`
--
ALTER TABLE `historial_caja_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `historial_egreso_producto`
--
ALTER TABLE `historial_egreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial_ingreso_producto`
--
ALTER TABLE `historial_ingreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pago_contrato`
--
ALTER TABLE `pago_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `nro_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `pedido_prov`
--
ALTER TABLE `pedido_prov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_unitario`
--
ALTER TABLE `tipo_unitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_tipo_unitario`) REFERENCES `tipo_unitario` (`id`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id_sucursal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
