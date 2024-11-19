-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 14:52:50
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
-- Base de datos: `premiosgraduados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatorias`
--

CREATE TABLE `convocatorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `encargado` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `documento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convocatorias`
--

INSERT INTO `convocatorias` (`id`, `nombre`, `categoria`, `descripcion`, `encargado`, `fecha_inicio`, `fecha_fin`, `documento`) VALUES
(2, 'Proyecto mas innovador ', 'proyectos', 'Se lo lleva el que haya causado el mayor impacto con su proyecto en la región Norte Santandereana. ', ' Judith del Pilar Rodríguez Tenjo', '2024-11-18', '2024-11-30', NULL),
(3, 'Investigación ', 'investigacion', 'La investigación con mayor impacto ', ' Judith del Pilar Rodríguez Tenjo', '2024-12-01', '2024-12-15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@example.com', 'contraseña_cifrada'),
(7, 'Diego ', 'Marquez', 'diegoarmandomarquezrigaud@gmail.com', '$2y$10$U7Qcn7Ir9ECdN6cy5I2N6uxANsloRI8sver4XT79rdmhiT5vzLSV2'),
(8, 'Duba', 'Sanchez', 'Dubansanchez@ufps.edu.co', '$2y$10$Gci2eI9.dN2HYvkPiA5WjecTcXoVaksDXmChRbA7OU1y76LZhiu8K'),
(9, 'David', 'Laid', 'dvidlaid@ufps.edu.co', '$2y$10$vtozMDbgg3S8L3QtPX//GOZmnvpsF5I3iWt8W5VMC1qiAh3bIf1OO'),
(10, 'Juanito', 'Alimaña', 'quetienemana@gmail.com', '$2y$10$0bKQERu0VgEv9HFFnWevxuhw/91vGhzFAO.850swJfWae.l2kn9QG'),
(12, 'admin', 'admin', 'admin@gmail.com', '$2y$10$aRFpZAud2mdIJ4UBC7x.Iul4ZWJWlL14R261Dwse1D0Kc6IYXWnD6'),
(13, 'carlos', 'smith', 'carsm@gmail.com', '$2y$10$MN0cq2iCNWU.QoCUvm87ou6qT6a/XN5vbxxeFFO.yOVJtp4oqcSfW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `convocatorias`
--
ALTER TABLE `convocatorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `convocatorias`
--
ALTER TABLE `convocatorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
