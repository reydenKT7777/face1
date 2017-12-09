-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2017 a las 20:25:42
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria3`
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
(1, 1, 'Primario', 'primordial', 'Calle San Camilo Las Americas', 1),
(2, 1, 'Margot H.', 'Secundario', 'Depositos Oscuros', 1),
(3, 1, 'Fidel C.', 'No Frecuente', 'Chifas Saga', 1);

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
(1, 1, 26854);

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
(1, 'rkt', 100123213, NULL, 'minorista', 76543210, 'unx7777@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(2, 'Ricardo Acarapi', 87342378, 'no se', 'Minorista', 76543210, 'ricardoacarapi@gmail.com', '', b'0'),
(3, 'herick', 23456, NULL, 'minorista', 45678, 'echgutierrez@gmail.com', '202cb962ac59075b964b07152d234b70', b'1'),
(4, 'jennifer llamoca', 14291253, NULL, 'minorista', 2631400, 'jenniferale.17@gmail.com', '202cb962ac59075b964b07152d234b70', b'1');

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
(1, 14, 1, '2017-12-01', b'1', '0000-00-00', b'1'),
(2, 123, 1, '2017-12-01', b'1', '0000-00-00', b'1'),
(3, 2222, 1, '2017-12-07', b'1', '0000-00-00', b'1');

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
(1, 1, 1, 100, 1200, 0),
(2, 2, 1, 150, 1800, 0),
(3, 3, 3, 500, 1000, 0),
(4, 3, 3, 100, 200, 0),
(5, 4, 5, 100, 1500, 0),
(6, 5, 5, 100, 1500, 0),
(7, 5, 4, 100, 280, 0),
(8, 6, 8, 100, 1800, 0);

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
(1, 1, 1, 2, 24, 1),
(2, 2, 1, 20, 240, 1),
(3, 3, 1, 12, 144, 1),
(4, 3, 1, 55, 660, 1),
(5, 4, 1, 54, 648, 1),
(6, 4, 1, 10, 120, 1),
(7, 5, 1, 30, 360, 1),
(8, 5, 1, 10, 120, 1),
(9, 6, 1, 12, 144, 1);

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
(1, 1, 14, 1200, '2017-12-01', '17:29:11', 'Pago contrato'),
(2, 1, 14, 500, '2017-12-01', '17:32:32', 'Pago contrato'),
(3, 1, 14, 100, '2017-12-01', '17:36:26', 'Pago contrato');

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
(1, 1, 14, 150, '2017-12-01', '17:44:16', 'Ingreso a caja'),
(2, 1, 14, 3000, '2017-12-01', '17:44:27', 'Ingreso a caja'),
(3, 1, 123, 240, '2017-12-01', '18:14:40', 'Ingreso a caja'),
(4, 1, 4444, 90, '2017-12-01', '18:21:02', 'Ingreso a caja por Venta'),
(5, 1, 4444, 24, '2017-12-01', '18:21:41', 'Ingreso a caja por Venta');

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
(1, 1, 2, '2017-12-01', '18:05:40', 123),
(2, 1, 20, '2017-12-01', '18:14:40', 123),
(3, 1, 54, '2017-12-07', '15:50:21', 123),
(4, 1, 10, '2017-12-07', '15:50:22', 123),
(5, 1, 30, '2017-12-07', '16:49:54', 123),
(6, 1, 10, '2017-12-07', '16:49:54', 123),
(7, 1, 12, '2017-12-07', '17:02:25', 123),
(8, 1, 12, '2017-12-07', '17:03:31', 123),
(9, 1, 55, '2017-12-07', '17:03:32', 123);

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
(1, 1, 100, '2017-12-01', '18:02:45', 321),
(2, 1, 150, '2017-12-07', '15:38:16', 321),
(3, 3, 500, '2017-12-07', '17:23:16', 321),
(4, 3, 100, '2017-12-07', '17:23:16', 321),
(5, 5, 100, '2017-12-07', '17:26:11', 321),
(6, 5, 100, '2017-12-07', '17:27:10', 321),
(7, 4, 100, '2017-12-07', '17:27:10', 321),
(8, 8, 100, '2017-12-07', '19:20:16', 321);

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
(1, 123, 1, '2017-12-01', 24, 'Al contado', '0000-00-00', 0),
(2, 123, 2, '2017-12-01', 240, 'Al contado', '0000-00-00', 0),
(3, 123, 4, '2017-12-07', 768, 'Al contado', '0000-00-00', 768),
(4, 123, 5, '2017-12-07', 480, 'Al contado', '0000-00-00', 480),
(5, 123, 6, '2017-12-07', 144, 'Al contado', '0000-00-00', 144),
(6, 123, 3, '2017-12-07', 804, 'Al contado', '0000-00-00', 804);

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
(1, 1, '2017-12-01', 1200, 1),
(2, 1, '2017-12-01', 500, 1),
(3, 1, '2017-12-01', 100, 1);

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

--
-- Volcado de datos para la tabla `pago_nota_venta`
--

INSERT INTO `pago_nota_venta` (`id`, `id_nota_venta`, `fecha_pago`, `id_personal`, `monto`, `monto_pendiente`) VALUES
(1, 2, '2017-12-01', 4444, 150, 90),
(2, 2, '2017-12-01', 4444, 90, 0),
(3, 1, '2017-12-01', 4444, 24, 0);

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
(1, 1, 2, '2017-12-01', 24, 1),
(2, 1, 1, '2017-12-01', 240, 1),
(3, 1, 3, '2017-12-01', 804, 1),
(4, 1, 3, '2017-12-07', 768, 1),
(5, 1, 3, '2017-12-07', 480, 1),
(6, 1, 3, '2017-12-07', 144, 1);

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
(1, 1, '2017-12-01', 1, 1200, b'0'),
(2, 2, '2017-12-07', 2, 1800, b'0'),
(3, 3, '2017-12-07', 3, 1200, b'0'),
(4, 3, '2017-12-07', 4, 1500, b'0'),
(5, 3, '2017-12-07', 5, 1780, b'0'),
(6, NULL, '2017-12-07', 6, 1800, b'0');

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
(14, 'Jhennyfer', 'Llamoca', '1990-08-27', 765438, 'no se', 'Super administrador', '14', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(123, 'no se ', 'no se', '2017-12-01', 76543210, 'no se', 'Vendedor', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(321, 'no se', 'no se', '2017-12-01', 76543210, 'no se', 'Almacenero', '321', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(2222, 'Luis ', 'chambi guterrez', '1990-12-07', 74009595, 'El alto Cosmos 72 Nro 889', 'Vendedor', '2222', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(4444, 'cajero', 'cajero', '2017-12-01', 764723, 'no se', 'Cajero', '4444', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1'),
(14291253, 'alejandra', 'condori', '1990-11-07', 74085867, 'zopocachi Nro 505', 'Vendedor', 'patita', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, b'1');

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
  `id_almacen` int(11) DEFAULT NULL,
  `estadoPro` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_pro`, `descripcion`, `precio`, `marca`, `stock`, `id_tipo_producto`, `id_tipo_unitario`, `id_almacen`, `estadoPro`) VALUES
(1, 'Empastados', 'Cuadernos empastados tamaño carta', 12, 'TOP', 45, 1, 1, 1, b'1'),
(2, 'cuadernos X100 NORMA', 'cuadernos X100 NORMA', 9, 'NORMA', 0, 1, 2, 1, b'1'),
(3, 'COLORES JUMBO-FC', 'COLORES JUMBO-FC', 2, 'FABERCASTELL', 600, 3, 2, 1, b'1'),
(4, 'TAJADOR MEDIAÑO', 'TAJADOR MEDIANO-ARTESCO', 2.8, 'ARTESCO', 100, 5, 2, 1, b'1'),
(5, 'ENGRANPADORA-ARTESCO', 'ENGRAMPADORA-GRAND-ARTESCO', 15, 'ARTESCO', 200, 6, 5, 1, b'1'),
(6, 'pintura para dedo', 'pintura para dedo X6', 15, 'Apu', 0, 1, 1, 1, b'1'),
(7, 'PERFORADOR ', 'PERFORADORA-PEQU-FC', 5, 'FABERCASTELL', 0, 6, 6, 1, b'1'),
(8, 'colores ', 'colores acuarelables X12 ', 18, 'Stanfords', 100, 3, 1, 1, b'1'),
(9, 'colores X6', 'COLORES X6 semi grasoso', 12, 'faber castell', 0, 3, 6, 1, b'1'),
(10, 'colores X24', 'colores X24 acuarelables ', 24, 'faber castell', 0, 3, 6, 1, b'1'),
(11, 'colores X24', 'colores X24 acuarelables ', 24, 'faber castell', 0, 3, 6, 1, b'1');

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
(1, 'Top', 'no me acuerdo', 73242831, 9300012, 'Juanito Perez ', 'top_lider@gmail.com', b'1'),
(2, 'otro', 'no se ', 76543210, 100012, 'Juanito Perez', 'ntc@gmail.com', b'1'),
(3, 'LAYCONSA S.A.', 'BOLIVIA - COCHABAMBA- AV. EDWIN-ESQUINA.RICON', 2222929, 2293948, 'ALAJANDRA', 'ALEJANDRA@GMAIL.COM', b'1'),
(4, 'TAYLOY', 'LA PAZ ', 22232, 234343, 'jorge macheco', 'jorge-@gmail.com', b'1');

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
(1, 'San camilo', 14, 7676567, 'no se', 'ns@gmail.com', b'1');

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
(1, 'Navideño', 'Medio', 'Tarde', 'Lunes,Martes,Miercoles,Jueves,Viernes', '14:00 a 19:00', 'Por mes', 1300, b'1');

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
(1, 'Cuadernos', b'1'),
(2, 'acrilex', b'1'),
(3, 'colores', b'1'),
(4, 'PAPEL', b'1'),
(5, 'TAJADOR', b'1'),
(6, 'OFICINA', b'1');

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
(1, 'Caja', b'1'),
(2, 'Millar', b'1'),
(3, 'DOCENA', b'1'),
(4, 'Metro', b'1'),
(5, 'Ciento', b'1'),
(6, 'UND', b'1'),
(7, 'UND', b'1');

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
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido_cli`
--
ALTER TABLE `detalle_pedido_cli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `historial_caja_egreso`
--
ALTER TABLE `historial_caja_egreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historial_caja_ingreso`
--
ALTER TABLE `historial_caja_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `historial_egreso_producto`
--
ALTER TABLE `historial_egreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `historial_ingreso_producto`
--
ALTER TABLE `historial_ingreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pago_contrato`
--
ALTER TABLE `pago_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pago_nota_venta`
--
ALTER TABLE `pago_nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pago_pedido`
--
ALTER TABLE `pago_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedido_cli`
--
ALTER TABLE `pedido_cli`
  MODIFY `nro_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pedido_prov`
--
ALTER TABLE `pedido_prov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_unitario`
--
ALTER TABLE `tipo_unitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id_almacen`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
