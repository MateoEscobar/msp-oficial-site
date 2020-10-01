-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2020 a las 22:08:17
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `nombre`, `apellidos`, `email`, `password`) VALUES
(1, 'Admin', 'Orlandis', 'Cuevas', 'cuevassoto27@gmail.com', 'Mariaolan1.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(2, 'Lisa'),
(3, 'Lacada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(50,0) NOT NULL,
  `categoria_id` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_produc` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `destacados`
--

INSERT INTO `destacados` (`id`, `titulo`, `descripcion`, `precio`, `categoria_id`, `fecha`, `foto`, `codigo_produc`, `estado`) VALUES
(13, 'Orlandis en la prueba pp', 'jajdjajdjasjd xd ', '123', '', '27/09/2020', '11.jpg', '5f6fcf3574dfe', 1),
(14, 'esta es otra prueba de ', 'destacados tt', '231', '', '27/09/2020', '14.jpg', '5f6fcfe78fc30', 1),
(15, 'Puerta lisa lavada 90x100', 'una descripción desde el movil', '150', '', '28/09/2020', 'Team_7-fce4926f-7d34-49a5-901d-577cee6ff754.jpg', '5f710b6d4ed6e', 1),
(16, 'dasdadadada', 'cssfdfsfsdfsdfds', '231', '', '28/09/2020', '14.jpg', '5f710cd4ce257', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `codigo_produc_id` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `medida` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `medida_1` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `medida_2` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(39, 'dadadad@dasdasdas.com'),
(40, 'admin@admin.com'),
(41, 'otra@prueba.es'),
(42, 'inscribirse@hpa.com'),
(43, 'orlans@dassdad.es'),
(44, 'saa@eeeee.es'),
(45, 'ddddda.eee@dee.es'),
(46, 'blabla@gmail.com'),
(47, 'ddasdasdas@gmail.com'),
(48, 'dasdasda@dadsad.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(50,0) NOT NULL,
  `categoria_id` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_produc` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `titulo`, `descripcion`, `precio`, `categoria_id`, `fecha`, `foto`, `codigo_produc`, `estado`) VALUES
(13, 'Probando codigo', 'Edsto a  de tener un codigo unico de un solo y que no se puede repetir ni a palo', '230', '', '23/09/2020', 'unnamed.jpg', '5f6b9f9b014ac', 1),
(14, 'La prueba de code unic', 'EL codigo es unico', '233', '', '23/09/2020', '14.jpg', '5f6b9fca70ff0', 1),
(15, 'Segunda prueba codigo', 'Codigo unico', '234', '', '23/09/2020', 'Tarima-flotante.png', '5f6bc54f07aae', 1),
(16, 'Kit vestidor blanco extensible doble DRESS 3 estantes', 'Kit vestidor fabricado en metal de colores blanco y gris perfecto para organizar tu ropa si tienes poco espacio. Dispone de 3 barras para colgar perchas y 3 baldas. Se monta fácilmente sin herramientas y puede soportar hasta 12 kg de peso. Medidas: 126 x 240 x 25 cm (ancho x alto x profundo)', '123', '', '24/09/2020', 'maxresdefault.jpg', '5f6bca3b8ed16', 1),
(23, 'Orlandis en la prueba pp', 'jajdjajdjasjd xd ', '123', '', '27/09/2020', '11.jpg', '5f6fcf3574dfe', 1),
(24, 'prueba no destacado', 'no es destacado tt', '123', '', '27/09/2020', '11.jpg', '5f6fcf55155dc', 1),
(25, 'esta es otra prueba de ', 'destacados tt', '231', '', '27/09/2020', '14.jpg', '5f6fcfe78fc30', 1),
(26, 'Puerta lisa lavada 90x100', 'una descripción desde el movil', '150', '', '28/09/2020', 'Team_7-fce4926f-7d34-49a5-901d-577cee6ff754.jpg', '5f710b6d4ed6e', 1),
(28, 'dasdadadada', 'cssfdfsfsdfsdfds', '231', '', '28/09/2020', '14.jpg', '5f710cd4ce257', 1),
(29, 'fdsdfsfsfsf', 'fsf,smfsmsf,fms', '123', '', '28/09/2020', '11.jpg', '5f7127bfcd4d2', 1),
(30, 'qqqqqqqqqqqqqqqqqqa', 'aaaaaaaaaaaaaaaaaaaaaaaaam', '12', '', '28/09/2020', '404_2.jpg', '5f7127d182331', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password2` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_perfil` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_reg` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `password2`, `telefono`, `img_perfil`, `fecha_reg`, `estado`) VALUES
(161, 'Orlandis', 'Cuevas', 'cuevassoto27@gmail.com', '$2y$14$h5IquTFrpirt53dImTWzaeCo59e5wZtJucDyySWdBGPRCaTsXDCYe', '$2y$14$h5IquTFrpirt53dImTWzaeCo59e5wZtJucDyySWdBGPRCaTsXDCYe', '432423432', 'userfile.png', '27/09/2020', 1),
(162, 'jorgito', 'Mattin', 'jmm@gmail.com', '$2y$14$HVdNcu9KTOaaFDWBK5rnWubx0.MtIyS1riM1.kHJfdmQU6bTBukMe', '$2y$14$HVdNcu9KTOaaFDWBK5rnWubx0.MtIyS1riM1.kHJfdmQU6bTBukMe', '31312313123', 'Oops_Emoji.png', '27/09/2020', 1),
(164, 'juan', 'baron', 'dadsadas@gmail.com', '$2y$14$vakjj0cjInGmXspq9wtDIOOqpG5f3mdOBa0kUiJi5GN4APK/Sb6O6', '$2y$14$vakjj0cjInGmXspq9wtDIOOqpG5f3mdOBa0kUiJi5GN4APK/Sb6O6', '42343243', 'encabezadomsp.png', '27/09/2020', 1),
(165, 'dasdasdasº', 'aaesss', 'addbbe@gmail.com', '$2y$14$IcyYWOEwPfPCTQJRKWDBRuErQR8/M3dwpzNS25ri9aRhiJ5EJaUcW', '$2y$14$IcyYWOEwPfPCTQJRKWDBRuErQR8/M3dwpzNS25ri9aRhiJ5EJaUcW', '21311123', 'userfile.png', '27/09/2020', 1),
(166, 'joseite', 'mateo', 'cuevassoto27@hotmail.com', '$2y$14$4/Ma8BMhtcilNtVD3rHVje/KQuRTYhEF42s0F67kpiCN4OaSnFNKe', '$2y$14$4/Ma8BMhtcilNtVD3rHVje/KQuRTYhEF42s0F67kpiCN4OaSnFNKe', '4242424242', '', '28/09/2020', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
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
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
