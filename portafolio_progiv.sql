-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3096
-- Tiempo de generación: 15-03-2026 a las 00:05:03
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
-- Base de datos: `portafolio_progiv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nota` varchar(1000) NOT NULL,
  `fechanota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `nombre_apellido`, `email`, `nota`, `fechanota`) VALUES
(6, 'Andrés Jiménez', 'ajimenez.8132@unimar.edu.ve', 'Halo', '14/03/2026 18:27:14'),
(7, 'Andrés Jiménez', 'ajimenez.8132@unimar.edu.ve', 'Que buena esta la pagina verdad?', '14/03/2026 18:27:52'),
(8, 'Andrés Jiménez', 'ajimenez.8132@unimar.edu.ve', 'Resident Evil Requiem >> GTA VI', '14/03/2026 18:28:38'),
(9, 'Andrés Jiménez', 'ajimenez.8132@unimar.edu.ve', 'probando editar comentario', '14/03/2026 18:29:01'),
(12, 'Andrés Jiménez', 'ajimenez.8132@unimar.edu.ve', '111111111111111111111111111111111111111111111111122222222222222222222222222222222222333333333333333333333333333333333333333333334444444444444444444444444', '14/03/2026 18:44:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
