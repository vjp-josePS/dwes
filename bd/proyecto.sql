-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2025 a las 10:49:48
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociados`
--

CREATE TABLE `asociados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asociados`
--

INSERT INTO `asociados` (`id`, `nombre`, `logo`, `descripcion`) VALUES
(1, 'jose', 'images/asociados/68263a939df5f_conjunto-de-vectores-iconos-la-corona-colección-símbolos-ilustración-campeones-signo-o-logotipo-liderazgo-para-sitios-web-161179335.jpg', 'hola'),
(2, 'juan', 'images/asociados/68263b69c08fb_jiraya-dedo.jpg', 'asdf asdf asdf asdf asdf asdf'),
(3, '1', 'images/asociados/68263cdbe51f6_naruto-fondo.png', 'asdf'),
(4, 'carlos', 'images/asociados/68263ced21c20_sasuke-fondo.png', 'ñlkhj'),
(5, 'fran', 'images/asociados/683f35fb52adf_Teléfono móvil ventana usuario descubrir (2).png', 'yte'),
(6, '11', 'images/asociados/683f66a463da5_WIN_20250217_18_14_57_Pro.jpg', 'trewaq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `numImagenes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `numImagenes`) VALUES
(1, 'Categoría 1', 3),
(2, 'Categoría 2', 3),
(3, 'Categoría 3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `numVisualizaciones` int(11) DEFAULT 0,
  `numLikes` int(11) DEFAULT 0,
  `numDescargas` int(11) DEFAULT 0,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `descripcion`, `numVisualizaciones`, `numLikes`, `numDescargas`, `categoria`) VALUES
(49, 'jiraya-dedo.jpg', '', 0, 0, 0, 1),
(50, 'kakashi-fondo.png', '', 0, 0, 0, 2),
(51, 'naruto-jiraya.jpg', '', 0, 0, 0, 3),
(52, 'Teléfono móvil ventana principal descubrir (2).png', '', 0, 0, 0, 1),
(53, 'Teléfono móvil ventana usuario ocio (2)-03062025230327.png', 'fda', 0, 0, 0, 3),
(54, 'Teléfono móvil ventana usuario ocio (2)-03062025230911.png', 'fda', 0, 0, 0, 3),
(55, 'WIN_20250217_18_14_57_Pro.jpg', 'oplñ,', 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `apellidos`, `asunto`, `email`, `texto`, `fecha`) VALUES
(1, 'jose', 'padilla', 'asdf', 'joselillopasa08@gmail.com', '', '2025-05-15 23:01:20'),
(2, 'juan', 'erwert', 'asdf', 'admin@admin.com', 'eres lo mejo', '2025-05-17 13:37:38'),
(3, 'asdf', 'erwert', 'asdf', 'admin@admin.com', '´ñlkjnhbgv', '2025-06-03 19:48:26'),
(4, 'daniel', 'padilla', 'danipi', 'iadmin@admin.com', 'mi hermano', '2025-06-03 21:53:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociados`
--
ALTER TABLE `asociados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imagenes_categorias` (`categoria`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociados`
--
ALTER TABLE `asociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_categorias` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
