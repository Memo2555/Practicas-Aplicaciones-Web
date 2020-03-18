-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2020 a las 20:32:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptados`
--

CREATE TABLE `aceptados` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Facultad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Edad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chismes`
--

CREATE TABLE `chismes` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Facultad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Edad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Chisme` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chismes_aceptados`
--

CREATE TABLE `chismes_aceptados` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Facultad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Edad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Chisme_aceptado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `chismes_aceptados`
--

INSERT INTO `chismes_aceptados` (`id`, `Nombre`, `Apellidos`, `Facultad`, `Edad`, `Correo`, `Chisme_aceptado`) VALUES
(1, 'Guillermo', 'Colorado', 'Electronica', '22', 'guilcol@gmail.com', 'Falta de economia en la f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_aceptar`
--

CREATE TABLE `tabla_aceptar` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Facultad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Edad` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Color` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Tamano` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Fuente` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Fondo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tabla_aceptar`
--

INSERT INTO `tabla_aceptar` (`id`, `Nombre`, `Apellidos`, `Facultad`, `Edad`, `Correo`, `Contraseña`, `Color`, `Tamano`, `Fuente`, `Fondo`) VALUES
(1, 'Guillermo', 'Jimenez', 'Medicina', '22', 'memo@gmail.com', '1234', 'verdeall', 'peque', 'larial', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceptados`
--
ALTER TABLE `aceptados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chismes`
--
ALTER TABLE `chismes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chismes_aceptados`
--
ALTER TABLE `chismes_aceptados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_aceptar`
--
ALTER TABLE `tabla_aceptar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceptados`
--
ALTER TABLE `aceptados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chismes`
--
ALTER TABLE `chismes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chismes_aceptados`
--
ALTER TABLE `chismes_aceptados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla_aceptar`
--
ALTER TABLE `tabla_aceptar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
