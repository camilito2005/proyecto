-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 20:34:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria_producto` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` varchar(500) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `stock`, `imagen`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(19, 'jordan', 'los que uso anuel en el 1903', '400000', '', '400', '../../pagina-mvc/fotos/descarga (2).jpg', '2021-11-23 22:39:45', '0000-00-00 00:00:00'),
(20, 'adidas', 'adidas adidas adidas', '240000', '', '40', '../../pagina-mvc/fotos/Tenis_Breaknet_Negro_FX8708_01_standard.avif', '2021-11-23 23:20:19', '0000-00-00 00:00:00'),
(21, 'adidas nike airforce one', 'colaboracion pagada ', '180000', '', '400', '../../pagina-mvc/fotos/descarga (3).jpg', '2022-11-23 00:42:34', '0000-00-00 00:00:00'),
(22, 'valenciaga', 'vala¿enciaga gucci ultimo modelo ', '4000000', '', '50', '../../pagina-mvc/fotos/627c337f52774.jpeg', '2022-11-23 00:50:26', '0000-00-00 00:00:00'),
(26, 'los maquina de guerra maquina del mal', 'edicion limitada', '180', '', '10', '../../pagina-mvc/fotos/81VhjCbdziL._AC_UL1500_.jpg', '2023-11-23 12:56:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellido`, `telefono`, `direccion`, `correo`, `contraseña`) VALUES
(3, '1043296214', 'camilito', 'marrugo barrios', '3146594388', 'carre9', 'c@gmail.com', 'camilo'),
(4, '1043296214', 'camilo', 'marrugo barrios', '3146594388', 'carrera9', 'c@gmail.com', 'camilo'),
(7, '1043296214', 'usuario', 'usuario', '3146594388', 'la boquilla', 'usuario@gmail.com', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
