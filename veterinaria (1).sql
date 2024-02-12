-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2024 a las 07:57:07
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
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `nombre_dueno` varchar(30) NOT NULL,
  `nombre_mascota` varchar(25) NOT NULL,
  `tipo_mascota` varchar(15) NOT NULL,
  `raza` varchar(15) DEFAULT NULL,
  `contacto` varchar(12) NOT NULL,
  `tipo_cita` varchar(20) NOT NULL,
  `motivo` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `nombre_dueno`, `nombre_mascota`, `tipo_mascota`, `raza`, `contacto`, `tipo_cita`, `motivo`, `fecha`, `hora`) VALUES
(4, 'Julio Enrique', 'Pikachu', 'Perro', 'Cerdo', '312485373', 'Primera Vez', 'Tiene frio', '2024-02-13', '09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre_dueno` varchar(25) NOT NULL,
  `nombre_mascota` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `tipo_mascota` varchar(20) NOT NULL,
  `raza` varchar(25) DEFAULT NULL,
  `contacto` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre_dueno`, `nombre_mascota`, `edad`, `tipo_mascota`, `raza`, `contacto`) VALUES
(1, 'Jeison Jaramillo', 'Lupita', 4, 'Gato', 'Criolla', 2147483647),
(2, 'Carlos', 'Katy', 3, 'Gato', 'Calico', 476276322);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(35) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(18) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `deber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `email`, `password`, `telefono`, `direccion`, `rol`, `especialidad`, `deber`) VALUES
(1, 'Jeison', 'Jaramillo', 'stevenhenao81@gmail.com', '12345', '3137125088', 'Pedos', 'Administrador', 'SuperAdmin', NULL),
(2, 'Santiago ', 'Pradilla', 'perreo@caimalito.com', '12345', '243242422', 'Caimalito la virginia', 'Medico', 'Perreo Intenso, Programador promiscuo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `tipo_documento` tinytext NOT NULL,
  `documento` int(12) NOT NULL,
  `telefono` int(12) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `contrasena` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `tipo_documento`, `documento`, `telefono`, `direccion`, `correo_electronico`, `usuario`, `contrasena`) VALUES
(7, 'Jeison', 'Jaramillo', 'C.C', 1004668546, 2147483647, 'Calle 8 manzana 5 casa 10 villa alquin - El japon ', 'Jei@hotmail', 'JeiDevs', '12345'),
(8, 'Julio', 'Enrique', 'CC', 2147483647, 312485373, 'Calle 59 15B46 Santa Teresita', 'Juliuxbang45@gmail.com', 'Chamitox', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
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
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
