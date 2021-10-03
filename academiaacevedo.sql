-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2021 a las 07:02:40
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academiaacevedo`
--
CREATE DATABASE IF NOT EXISTS `academiaacevedo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `academiaacevedo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `alum_id` int(10) UNSIGNED NOT NULL,
  `alum_nombres` varchar(50) NOT NULL,
  `alum_apellidos` varchar(60) NOT NULL,
  `alum_dni` char(8) NOT NULL,
  `alum_email` varchar(60) NOT NULL,
  `alum_fnac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alum_id`, `alum_nombres`, `alum_apellidos`, `alum_dni`, `alum_email`, `alum_fnac`) VALUES
(1, 'Robert', 'Acevedo Rodriguez', '12345678', 'racevedo@gmail.com', '1999-04-22'),
(2, 'Jorge Luis', 'Acevedo Rodriguez', '23456789', 'jacevedoo@gmail.com', '2001-01-11'),
(3, 'Suli', 'Castañeda Vasi', '34567890', 'suly@gmail.com', '1995-01-15'),
(4, 'Silvana', 'Herrera Matos', '45678901', 'silvana@gmail.com', '2000-03-30'),
(5, 'María del Pilar', 'Del Castillo Hernandez', '56789012', 'maria@gmail.com', '2002-07-20'),
(6, 'Miguel André', 'Casimiro Castillo', '67890123', 'andre@gmail.com', '2003-05-28'),
(7, 'Jorge Carlos', 'Obeso Cerna', '78901234', 'jorge@gmail.com', '2003-07-19'),
(8, 'Digmar', 'Flores Zavaleta', '89012345', 'digmar@gmail.com', '2003-04-09'),
(9, 'Jose Carlos', 'Miranda Guevara', '90123456', 'jorge@gmail.com', '2002-01-10'),
(10, 'David', 'Castro Terrones', '01234567', 'david@gmail.com', '2003-07-19'),
(11, 'Jhon Carlos', 'Sobrados Romaní', '11234568', 'jhonel@gmail.com', '2001-12-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `nota_id` int(10) UNSIGNED NOT NULL,
  `nota_dni` char(8) NOT NULL,
  `nota_nom_curso` varchar(100) NOT NULL,
  `nota_calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`nota_id`, `nota_dni`, `nota_nom_curso`, `nota_calificacion`) VALUES
(1, '12345678', 'MATEMATICAS', 15),
(2, '23456789', 'MATEMATICAS', 19),
(3, '34567890', 'MATEMATICAS', 12),
(4, '45678901', 'MATEMATICAS', 10),
(5, '56789012', 'MATEMATICAS', 20),
(6, '67890123', 'MATEMATICAS', 16),
(7, '78901234', 'MATEMATICAS', 14),
(8, '89012345', 'MATEMATICAS', 11),
(9, '90123456', 'MATEMATICAS', 17),
(10, '01234567', 'MATEMATICAS', 16),
(11, '12345678', 'FÍSICA', 16),
(12, '23456789', 'FÍSICA', 13),
(13, '34567890', 'FÍSICA', 13),
(14, '45678901', 'FÍSICA', 12),
(15, '56789012', 'FÍSICA', 17),
(16, '67890123', 'FÍSICA', 15),
(17, '78901234', 'FÍSICA', 13),
(18, '89012345', 'FÍSICA', 14),
(19, '90123456', 'FÍSICA', 14),
(20, '01234567', 'FÍSICA', 18),
(21, '12345678', 'QUÍMICA', 11),
(22, '23456789', 'QUÍMICA', 15),
(23, '34567890', 'QUÍMICA', 16),
(24, '45678901', 'QUÍMICA', 18),
(25, '56789012', 'QUÍMICA', 15),
(26, '67890123', 'QUÍMICA', 13),
(27, '78901234', 'QUÍMICA', 12),
(28, '89012345', 'QUÍMICA', 16),
(29, '90123456', 'QUÍMICA', 15),
(30, '01234567', 'QUÍMICA', 19),
(31, '12345678', 'ALGEBRA', 12),
(32, '23456789', 'ALGEBRA', 14),
(33, '34567890', 'ALGEBRA', 15),
(34, '45678901', 'ALGEBRA', 16),
(35, '56789012', 'ALGEBRA', 12),
(36, '67890123', 'ALGEBRA', 14),
(37, '78901234', 'ALGEBRA', 17),
(38, '89012345', 'ALGEBRA', 15),
(39, '90123456', 'ALGEBRA', 18),
(40, '01234567', 'ALGEBRA', 11),
(41, '11234568', 'RAZONAMIENTO MATEMATICO', 18),
(42, '11234568', 'MATEMATICAS', 13),
(43, '11234568', 'FISICA', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`alum_id`),
  ADD UNIQUE KEY `alum_dni` (`alum_dni`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nota_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `alum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `nota_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
