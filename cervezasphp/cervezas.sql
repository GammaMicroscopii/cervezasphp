
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 12:53:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes_cervezas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `idCerveza` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` enum('Tostada','Rubia','De trigo','Negra') NOT NULL DEFAULT 'Tostada',
  `alcohol` int(3) UNSIGNED NOT NULL DEFAULT 0,
  `pais` varchar(60) NOT NULL DEFAULT 'España',
  `precio` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `rutaImagen` varchar(100) DEFAULT NULL,
  `documentoDescripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`idCerveza`, `nombre`, `tipo`, `alcohol`, `pais`, `precio`, `rutaImagen`, `documentoDescripcion`) VALUES
(1, '1906', 'Tostada', 45, 'España', 20, 'cerveza_1906.png', NULL),
(2, 'Argus', 'Rubia', 60, 'Reino Unido', 25, 'cerveza_argus.png', NULL),
(3, 'Aurum', 'Rubia', 70, 'Bélgica', 80, 'cerveza_aurum.png', NULL),
(4, 'El Alcázar', 'De trigo', 40, 'España', 35, 'cerveza_el_alcazar.png', NULL),
(5, 'La Salve Bilbao', 'De trigo', 70, 'España', 45, 'cerveza_la_salve_bilbao.png', NULL),
(6, 'Patanel', 'Tostada', 55, 'Francia', 65, 'cerveza_patanel.png', NULL),
(7, 'Santa Bárbara', 'Negra', 70, 'Argentina', 50, 'cerveza_santa_barbara.png', NULL),
(8, 'Steinburg Clásica', 'De trigo', 75, 'Alemania', 85, 'cerveza_steinburg_clasica.png', NULL),
(9, 'Yakka', 'Rubia', 50, 'Estados Unidos', 50, 'cerveza_yakka.png', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`idCerveza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `idCerveza` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
