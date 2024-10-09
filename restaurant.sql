-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 09:18:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'antojitos'),
(2, 'desayunos'),
(3, 'almuerzos'),
(4, 'postres'),
(5, 'comida rapida'),
(6, 'bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo_productos`
--

CREATE TABLE `combo_productos` (
  `combo_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `direccion`, `horario`) VALUES
(1, 'Restaurante Central', 'San Salvador', '08:00 AM - 9:00 PM'),
(2, 'El rinconcito', 'Plaza Mundo', '07:00 AM - 08:00 PM'),
(3, 'Express', 'Soyapango', '07:00 AM - 09:00 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente',
  `referencia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `hora` time NOT NULL,
  `lugar_entrega` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`, `local_id`) VALUES
(1, 'Nuegados', 'Deliciosos nuégados bañados en miel de panela', 3.50, 1, 1),
(2, 'Papas fritas', 'Crujientes papas fritas a la perfección', 2.00, 1, 1),
(3, 'Yuca frita', 'Trozos de yuca crujiente', 2.50, 1, 2),
(4, 'Elote', 'Elote sazonado con mantequilla y sal', 1.75, 1, 2),
(5, 'Tartaleta', 'Deliciosa tartaleta crujiente rellena de crema.', 2.50, 4, 1),
(6, 'Flan', 'Postre suave y cremoso, con un toque de caramelo.', 3.00, 4, 1),
(7, 'Cake', 'Pastel con diferentes sabores disponibles.', 4.00, 4, 2),
(8, 'Galletas', 'Deliciosas galletas.', 1.50, 4, 2),
(9, 'Tartaletas de frutas', 'Mini tartaletas rellenas de frutas frescas y cremosas.', 3.50, 4, 3),
(10, 'Cakes', 'Delicioso decorado con crema.', 1.50, 4, 3),
(11, 'Frappe', 'Delicioso frappe.', 2.50, 4, 3),
(12, 'Cookie', 'Galletas clásicas con chispas de chocolate.', 2.00, 4, 1),
(13, 'Costilla', 'Deliciosa costilla con salsa barbacoa', 10.00, 3, 3),
(14, 'Pollo', 'Jugoso pollo a la parrilla', 12.00, 3, 3),
(15, 'Ensaladas', 'Ensalada fresca', 8.00, 3, 2),
(16, 'Pescado', 'Filete de pescado fresco', 15.00, 3, 2),
(17, 'Camarones', 'Camarones a la plancha', 9.00, 3, 3),
(18, 'Hamburguesa', 'Hamburguesa clásica', 11.00, 3, 1),
(19, 'Pizza', 'Pizza italiana con variedad de ingredientes', 7.00, 3, 2),
(20, 'Burritos', 'Burritos mexicanos con carne, frijoles y queso', 13.00, 3, 1),
(21, 'Sandwich', 'Sándwich de jamón y queso en pan tostado', 5.00, 2, 2),
(22, 'Frutas con crema', 'Frutas frescas acompañadas de crema', 6.00, 2, 1),
(23, 'Pupusas', 'Pupusas de maíz rellenas de queso o chicharrón', 1.00, 2, 3),
(24, 'Panqueques', 'Deliciosos panqueques servidos con miel', 3.00, 2, 2),
(25, 'Huevo con jamón', 'Huevo revuelto con jamón', 2.00, 2, 1),
(26, 'Panqueques de frutas', 'Elaborado con frutas frescas', 3.50, 2, 3),
(27, 'Tocino', 'Tocino crujiente servido caliente', 2.50, 2, 2),
(28, 'Frutas', 'Selección de frutas frescas de temporada', 1.50, 2, 3),
(29, 'Hot Dog con champiñones', 'Deliciosos hot dog con champiñones', 3.50, 5, 1),
(30, 'Banderias', 'Ricas banderias hechas con salchicha envueltas en masa de pan', 3.50, 5, 1),
(31, 'salchitocino', 'Deliciosas salchitocino bañada con tu aderezo de tu eleccion', 3.50, 5, 1),
(32, 'sushi', 'Ricos rollos de sushi', 4.00, 5, 1),
(33, 'bandeja para compartir', 'Deliciosa bandeja para compatir con tus amigos', 20.50, 5, 1),
(34, 'tacos dorados', 'Deliciosos tacos dorados con carne de tu preferencia', 4.50, 5, 1),
(35, 'Licuado de Fresa', 'Delicioso licuado de fresa', 3.50, 6, 2),
(36, 'Limonada', 'Rica limonada con hierba buena', 3.00, 6, 2),
(37, 'Frape de Oreo', 'Disfruta de un rico frappe de oreo', 3.25, 6, 2),
(38, 'Cafe Frio', 'Un cafe frio para alegrar tu dia', 2.75, 6, 2),
(39, 'jugo de naranja', 'nada mas saludable que un rico jugo de naranja', 3.50, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `rol` varchar(50) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `activo`, `rol`) VALUES
(2, 'yasmin', '$2y$10$WFGFAmpMl8S114eERvINHOb158axY9n.MIRTbmBD8h.aXNJYzxPx.', 1, 'cliente'),
(6, 'alexander', '$2y$10$FCR3AMuqoEbFdpWXgb5qb.NKbj5s0hEsIbB7c7ARTCMeZfJBw8bwq', 1, 'administrativo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combo_productos`
--
ALTER TABLE `combo_productos`
  ADD PRIMARY KEY (`combo_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local_id` (`local_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`pedido_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `local_id` (`local_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `combo_productos`
--
ALTER TABLE `combo_productos`
  ADD CONSTRAINT `combo_productos_ibfk_1` FOREIGN KEY (`combo_id`) REFERENCES `combos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `combo_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`local_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD CONSTRAINT `pedido_productos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`local_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
