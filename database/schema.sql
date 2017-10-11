-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2017 a las 22:47:53
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_celulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celular`
--

CREATE TABLE `celular` (
  `id_celular` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `caracteristicas` text NOT NULL,
  `precio` double NOT NULL,
  `url_img` varchar(250) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `celular`
--

INSERT INTO `celular` (`id_celular`, `nombre`, `caracteristicas`, `precio`, `url_img`, `id_marca`) VALUES
(1, 'Vibe K5', 'El Lenovo Vibe K5 cuenta en sus características con una pantalla HD de 5 pulgadas, procesador octa-core Snapdragon 415 a 1.4GHz, 2GB de RAM, 16GB de almacenamiento interno expandible, cámara principal de 13 megapixels, cámara frontal de 5 megapixels, conectividad LTE, sonido Dolby Atmos, y batería de 2750 mAh.', 4800, 'https://image.ibb.co/bLskmG/K5.png', 3),
(2, 'Moto G5', 'El Moto G5 es el quinto sucesor de la serie Moto G, esta vez con un chasis metálico e incorporando lector de huellas dactilares en la gama media de Moto. El Moto G5 cuenta entre sus características destacadas con una pantalla Full HD de 5 pulgadas, procesador octa-core Snapdragon 430 a 1.4GHz, 2GB o 3GB de RAM, 16GB o 32GB de almacenamiento interno expandible, cámara principal de 13 megapixels, cámara frontal de 5 megapixels, batería de 2800 mAh y corre Android 7.0 Nougat.', 6500, 'https://image.ibb.co/hagd6G/G5.png', 3),
(3, 'Galaxy S8', 'El Samsung Galaxy S8 es el nuevo flagship de Samsung que apuesta fuerte en un frente sin bordes de pantalla. Entre sus características se destaca la pantalla Infinity Super AMOLED dual-edge de 5.8 pulgadas y resolución QHD+, procesador Snapdragon 835 o Exynos 8895, 4GB de RAM, 64GB de almacenamiento interno, resistencia al agua IP68, carga inalámbrica, cámara Dual Pixel de 12 megapixels, cámara frontal de 8 megapixels, lector de huellas dactilares, lector de iris y Android 7.0 Nougat.', 20000, 'https://image.ibb.co/htCkmG/S8.png', 4),
(4, 'G Flex2', 'El LG G Flex2 es el sucesor del G Flex del año pasado, esta vez acentuando su diseño curvo en cuatro puntos estratégicos a lo largo del smartphone. Por dentro, se trata de una verdadera bestia, con un procesador Snapdragon 810 quad-core de 64 bits, pantalla 1080p de 5.5 pulgadas, panel trasero autorreparable, y batería de 3000 mAh de carga rápida.', 10699, 'https://image.ibb.co/jeuLLb/FLEX.png', 1),
(5, 'P10', 'El Huawei P10 es el sucesor del Huawei P9, manteniendo muchas de las características. El P10 cuenta con una pantalla Full HD de 5.1 pulgadas, procesador octa-core Kirin 960, 4GB de RAM, 64GB de almacenamiento interno expandible, cámara dual Leica de dos sensores: 13 MP y 20 MP monocromático, mientras que al frente cuenta con una cámara de 8 megapixels. El Huawei P10 también tiene una batería de 3200 mAh con carga rápida Super Charge, y corre Android 7.0 Nougat con la interfaz EMUI 5.1.', 13999, 'https://image.ibb.co/n14y6G/P10.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `url_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`, `url_img`) VALUES
(1, 'LG', 'http://img.fenixzone.net/i/hbs16iI.png'),
(2, 'HUAWEI', 'http://img.fenixzone.net/i/y8DOLN4.png'),
(3, 'LENOVO', 'http://img.fenixzone.net/i/IkRtW5g.png'),
(4, 'SAMSUNG', 'http://img.fenixzone.net/i/xd8qPD2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`) VALUES
(1, 'root', '$2a$06$f.ma9glTC0dpoEjExJwDcus3rBtnIxlYOOzI3ixUhC5RdD4caKxX2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `celular`
--
ALTER TABLE `celular`
  ADD PRIMARY KEY (`id_celular`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `celular`
--
ALTER TABLE `celular`
  MODIFY `id_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `celular`
--
ALTER TABLE `celular`
  ADD CONSTRAINT `celular_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
