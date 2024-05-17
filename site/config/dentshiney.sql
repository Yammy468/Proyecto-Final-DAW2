-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2024 a las 14:44:10
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
-- Base de datos: `dentshiney`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `web` varchar(200) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `save` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `name`, `email`, `web`, `comment`, `save`) VALUES
(1, 'Laura', 'laura@gmail.com', 'https://www.w3schools.com/', 'Lo recomiendo de veras!!! :)', 0),
(2, 'Juan', 'juan@gmail.com', '', 'Dentista increíble, me hice una endodoncia y no sentí ningún dolor.', 1),
(5, 'Maria', 'maria@gmail.com', 'https://www.php.net/manual/es/intro-whatis.php', 'Excelente calidad y precio adecuado. Lo recomiendo.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta-compra`
--

CREATE TABLE `cesta-compra` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cesta-compra`
--

INSERT INTO `cesta-compra` (`id`, `name`, `image`, `price`) VALUES
(4, 'Oral-B 3D White Luxe Seda Dental, Longitud de 35m, Con Cera, Sabor menta', '1715169254_seda-dental.png', 4.60),
(5, 'Dentifrico Colgate Maximum Caries Protection Pasta de Dientes con Flúor, 75ml', '1715674524_dentifrico_fluor.jpg', 2.29),
(6, 'LISTERINE Enjuague bucal Blanqueador sabor suave frasco 500 ml', '1715674339_listerine_bucal.jpg', 5.69),
(7, 'DENTÍFRICO ANTICARIES CON FLÚOR LISTERINE® ESSENTIAL CARE®', '1715674576_listerine_dentifrico_fluor.jpg', 8.89),
(8, 'Cepillo Dental Eléctrico Oral B 3D White Pro 2500 - Rosa Con Mango Recargable', '1715676655_cepillo_electrico_rosa.jpg', 50.50),
(9, 'BALENE - Cepillo de Dientes Doble Cara, Limpieza Interna y Externa de los dientes', '1715677786_balene_cepillo_diente.jpg', 14.90),
(12, 'Cherish Baby Care Set Cepillo Dientes Bebe (3 a 24 Meses) - Set 3 cepillos: Sin BPA', '1715681046_cepillo_dientes_baby.jpg', 7.99),
(13, ' Vitis Kids gel dentífrico sabor cereza 50 ml. Para prevenir la caries en los dientes de leche', '1715681280_dentifrico_kids.jpg', 3.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta-bancaria`
--

CREATE TABLE `cuenta-bancaria` (
  `id` int(11) NOT NULL,
  `titular` varchar(100) NOT NULL,
  `numeroCuenta` varchar(16) NOT NULL,
  `fechaExp` date NOT NULL,
  `codigo` int(3) NOT NULL,
  `hora` time NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta-bancaria`
--

INSERT INTO `cuenta-bancaria` (`id`, `titular`, `numeroCuenta`, `fechaExp`, `codigo`, `hora`, `idUser`) VALUES
(2, 'Ana Maria', '4000001234340056', '2024-05-16', 454, '11:09:00', 2),
(15, 'Marco', '1234123412341236', '2022-01-01', 565, '13:42:00', 4),
(16, 'Juana ', '1212343456567878', '2026-06-01', 404, '13:56:00', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `surname`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(2, 'name1', 'surname1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com'),
(4, 'name2', 'surname2', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@gmail.com'),
(11, 'name3', 'surname3', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user3@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cesta-compra`
--
ALTER TABLE `cesta-compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta-bancaria`
--
ALTER TABLE `cuenta-bancaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_usuarios_fk` (`idUser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cesta-compra`
--
ALTER TABLE `cesta-compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cuenta-bancaria`
--
ALTER TABLE `cuenta-bancaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta-bancaria`
--
ALTER TABLE `cuenta-bancaria`
  ADD CONSTRAINT `cuenta_usuarios_fk` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
