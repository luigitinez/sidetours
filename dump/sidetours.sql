-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2022 a las 11:06:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sidetours`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `personas` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha_creacion`, `fecha_entrada`, `fecha_salida`, `personas`, `id_hotel`) VALUES
(1, '2022-07-05', '2022-08-25', '2022-08-27', 2, 73),
(2, '2022-05-19', '2022-08-25', '2022-08-28', 4, 73),
(5, '2022-06-14', '2022-08-26', '2022-08-29', 5, 22),
(6, '2022-06-14', '2022-08-26', '2022-08-29', 5, 22),
(7, '2022-06-10', '2022-09-26', '2022-09-29', 3, 20),
(8, '2022-02-04', '2022-09-01', '2022-09-29', 3, 20),
(9, '2022-04-01', '2022-09-01', '2022-09-05', 4, 12),
(10, '2022-05-04', '2022-08-26', '2022-09-10', 10, 73),
(11, '2022-01-14', '2022-09-14', '2022-09-29', 7, 12),
(12, '2022-02-05', '2022-09-05', '2022-09-12', 4, 10),
(13, '2022-04-01', '2022-09-14', '2022-09-26', 6, 10),
(14, '2022-01-18', '2022-06-16', '2022-06-28', 5, 34),
(15, '2022-01-18', '2022-06-16', '2022-06-28', 5, 34),
(16, '2022-01-16', '2022-06-02', '2022-06-12', 2, 12),
(17, '2022-02-16', '2022-07-06', '2022-07-10', 15, 12),
(18, '2022-02-12', '2022-07-04', '2022-07-17', 11, 12),
(19, '2022-06-08', '2022-10-04', '2022-10-17', 3, 33),
(20, '2022-06-08', '2022-10-04', '2022-10-17', 3, 33),
(21, '2022-07-07', '2022-10-02', '2022-10-11', 4, 33);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
