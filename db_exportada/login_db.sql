-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2023 a las 06:42:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `photo` longblob DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `bio` varchar(250) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `url_imagen` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasena`, `photo`, `nombre`, `bio`, `phone`, `url_imagen`) VALUES
(1, 'jr.reyes2014@gmail.com', '123456', '', 'Carlos Bock', 'IMPULSADOR EDT', 33276154, '/public/img/WhatsApp Image 2023-09-17 at 15.49.46.jpeg'),
(2, 'vr6006095@gmail.com', '$2y$10$sepjxDNiQhBtpYzImVhneeGFk/yOTbk00TcVG6PFvIQOnE.J6ylKW', '', '', '', 0, ''),
(3, 'admin@admin', '$2y$10$8IMq3ZMQgnUq.GNlpL.Xj.1kDYX0WHgiOVVBpVnsFJuJRk8EZ9HnK', '', 'Admin', 'Administrador', 99999999, '/public/img/WhatsApp Image 2023-09-17 at 15.49.46.jpeg'),
(4, 'test@test', '$2y$10$1FQZrCNQmIzAzIadvqDSIejlcJQ1hJKsLquWqRRP8eQMmDBWTi65G', '', 'Test', 'User Test', 33333333, '/public/img/WhatsApp Image 2023-08-29 at 13.02.14 (3).jpeg');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
