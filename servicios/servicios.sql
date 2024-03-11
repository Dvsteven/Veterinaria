-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2024 a las 21:34:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio1`
--

CREATE TABLE `servicio1` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mascota` varchar(255) DEFAULT NULL,
  `tipoMascota` varchar(50) DEFAULT NULL,
  `edadMascota` int(11) DEFAULT NULL,
  `motivoConsulta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio2`
--

CREATE TABLE `servicio2` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mascota` varchar(255) DEFAULT NULL,
  `tipoMascota` varchar(50) DEFAULT NULL,
  `edadMascota` int(11) DEFAULT NULL,
  `tipoExamen` varchar(255) DEFAULT NULL,
  `fechaExamen` date DEFAULT NULL,
  `historialMedico` text DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio3`
--

CREATE TABLE `servicio3` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mascota` varchar(255) DEFAULT NULL,
  `tipoMascota` varchar(50) DEFAULT NULL,
  `edadMascota` int(11) DEFAULT NULL,
  `tipoCirugia` varchar(255) DEFAULT NULL,
  `fechaCirugia` date DEFAULT NULL,
  `historialMedico` text DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio4`
--

CREATE TABLE `servicio4` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nombreMascota` varchar(255) DEFAULT NULL,
  `tipoMascota` varchar(50) DEFAULT NULL,
  `edadMascota` int(11) DEFAULT NULL,
  `vacuna` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `historial` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio5`
--

CREATE TABLE `servicio5` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mascota` varchar(255) DEFAULT NULL,
  `tipoMascota` varchar(50) DEFAULT NULL,
  `edadMascota` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `diasReserva` int(11) DEFAULT NULL,
  `serviciosAdicionales` text DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicio1`
--
ALTER TABLE `servicio1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio2`
--
ALTER TABLE `servicio2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio3`
--
ALTER TABLE `servicio3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio4`
--
ALTER TABLE `servicio4`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio5`
--
ALTER TABLE `servicio5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicio1`
--
ALTER TABLE `servicio1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio2`
--
ALTER TABLE `servicio2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio3`
--
ALTER TABLE `servicio3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio4`
--
ALTER TABLE `servicio4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio5`
--
ALTER TABLE `servicio5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
