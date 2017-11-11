-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2017 a las 02:35:35
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.24

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
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `fk_id_celular` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `texto_comentario` text NOT NULL,
  `nota_comentario` decimal(10,0) NOT NULL DEFAULT '0',
  `fecha_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `fk_id_celular`, `fk_id_usuario`, `texto_comentario`, `nota_comentario`, `fecha_comentario`) VALUES
(2, 1, 1, '33333', '2', '2017-11-08 20:17:23'),
(82, 1, 1, 'BLEDABUSITO', '3', '2017-11-08 19:13:38'),
(83, 1, 1, 'agrego otra chabon', '2', '2017-11-08 20:10:28'),
(84, 1, 1, 'esta es la review', '4', '2017-11-09 16:10:07'),
(85, 1, 1, 'li', '3', '2017-11-09 16:12:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_celular`
--

CREATE TABLE `especificacion_celular` (
  `id_celular` int(11) NOT NULL,
  `pantalla` varchar(50) NOT NULL,
  `pantalla_dimension` varchar(50) NOT NULL,
  `peso` double NOT NULL,
  `procesador` varchar(100) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `memoria` varchar(50) NOT NULL,
  `sistema_operativo` varchar(50) NOT NULL,
  `conectividad` varchar(2550) NOT NULL,
  `capacidad_bateria` int(11) NOT NULL,
  `camara` varchar(150) NOT NULL,
  `lector_huella` tinyint(1) DEFAULT NULL,
  `supercarga` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especificacion_celular`
--

INSERT INTO `especificacion_celular` (`id_celular`, `pantalla`, `pantalla_dimension`, `peso`, `procesador`, `ram`, `memoria`, `sistema_operativo`, `conectividad`, `capacidad_bateria`, `camara`, `lector_huella`, `supercarga`) VALUES
(1, '', '', 0, '', '', '', '', '', 0, '', 0, 0),
(2, 'IPS FullHD ', '5 pulgadas 1.920 x 1.080 píxeles ', 145, 'Snapdragon 430 octa-core a 1,4 GHz, GPU Adreno 505 a 450 MHz', '2 GB', '16 GB + MicroSD hasta 128 GB', 'Android 7.0 Nougat', '4G LTE Cat 4, WiFi a/b/g/n, Bluetooth 4.2', 2800, '13 MP, lente f/2.0, flash LED, Camara frontal 5 MP', 1, 1),
(3, 'Pantalla Super AMOLED curva', '1.440 x 2.960 píxeles,  5.8 pulgadas', 155, 'Qualcomm Snapdragon 835 Octacore (2,3 Ghz + 1,7 Ghz) 64 Bit', '4 GB', '64 GB (UFS 2.1), microSD (hasta 256 GB)', 'Android 7.0 con TouchWiz', 'LTE Cat.16, Wi-Fi 802.11 a/b/g/n/ac (2.4/5GHz)', 3000, '12 megapíxeles con una lente con OIS y f/1,7  Fron', 1, 1),
(4, 'P-OLED curva, touchscreen capacitivo, 16M colores', '1080 x 1920 pixels, 5.5 pulgadas', 152, 'Qualcomm Snapdragon 810 con 64-bit Octa-Core', '2GB LPDDR4', '32 GB memoria interna, microSD, hasta 128GB', 'Android OS, v5.0.1 Lollipop', 'Wi-Fi 802.11 a/b/g/n/ac, 4G LTE Cat. 6', 3000, '13 MP, flash LED dual, cámara frontal 2.1 MP', 0, 0),
(5, 'IPS FullHD ', '1920x1080 (432 ppp), 5.15 pulgadas', 145, 'HiSilicon Kirin 960 (4 x Cortex A-73 2.36 GHz, 4 x Cortex A-53 a 1.84 GHz), Mali G-71', '4 GB LPDDR4', '64 GB (ampliables hasta 256 GB más vía MicroSD)', 'Android 7.0 con EMUI 5.1', 'LTE Cat. 12 (600/100 Mbps), Bluetooth 4.2, WiFi 802.11 a/b/g/n/ac', 3200, 'Trasera dual, un sensor de 12 MP (Sony IMX286 Exmor RS, f/2.2, color, con OIS)\r\ny otro de 20 MP (f/2.2, monocromo). Cámara frontal de 8 MP (f/1.9)', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_celular`
--

CREATE TABLE `estadisticas_celular` (
  `id_celular` int(11) NOT NULL,
  `rendimiento` double NOT NULL,
  `conectividad` double NOT NULL,
  `disenio` double NOT NULL,
  `pantalla` double NOT NULL,
  `camara` double NOT NULL,
  `antutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadisticas_celular`
--

INSERT INTO `estadisticas_celular` (`id_celular`, `rendimiento`, `conectividad`, `disenio`, `pantalla`, `camara`, `antutu`) VALUES
(1, 6.9, 8.6, 6.5, 6.5, 6.3, 31298),
(2, 7.3, 8.9, 8.7, 8, 7.6, 40000),
(3, 9.9, 9.5, 10, 10, 9.9, 174150),
(4, 8, 9.2, 8.3, 8, 8.7, 54337),
(5, 9.7, 9.9, 9.9, 9.5, 9.9, 147800);

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
  `password` varchar(250) NOT NULL,
  `email` varchar(80) NOT NULL,
  `permiso_admin` tinyint(1) DEFAULT '0',
  `imagen_perfil` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `email`, `permiso_admin`, `imagen_perfil`) VALUES
(1, 'root', '$2a$06$f.ma9glTC0dpoEjExJwDcus3rBtnIxlYOOzI3ixUhC5RdD4caKxX2', 'root@root.com', 1, 'images/5a04a957acd31.jpg'),
(7, 'luchosan', '$2y$10$Nw21F1dUEf0US5c5rOzaPeGKGnpDcYoSb5xH6NQHe8uZ59M6E2wbG', 'luchosan74@gmail.com', 0, '');

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
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_celular` (`fk_id_celular`);

--
-- Indices de la tabla `especificacion_celular`
--
ALTER TABLE `especificacion_celular`
  ADD PRIMARY KEY (`id_celular`),
  ADD KEY `id_celular` (`id_celular`) USING BTREE;

--
-- Indices de la tabla `estadisticas_celular`
--
ALTER TABLE `estadisticas_celular`
  ADD PRIMARY KEY (`id_celular`);

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
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `celular`
--
ALTER TABLE `celular`
  ADD CONSTRAINT `celular_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_id_celular`) REFERENCES `celular` (`id_celular`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `especificacion_celular`
--
ALTER TABLE `especificacion_celular`
  ADD CONSTRAINT `especificacion_celular_ibfk_1` FOREIGN KEY (`id_celular`) REFERENCES `celular` (`id_celular`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estadisticas_celular`
--
ALTER TABLE `estadisticas_celular`
  ADD CONSTRAINT `estadisticas_celular_ibfk_1` FOREIGN KEY (`id_celular`) REFERENCES `celular` (`id_celular`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
