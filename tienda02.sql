-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2024 a las 16:43:36
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
-- Base de datos: `tienda02`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `ruc`, `adress`) VALUES
(1, 'Willian', '123232412', 'JR LIMA'),
(3, 'Fernanda ', '3677323223', 'Av. Pierola  609');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `saleId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `saleId`, `productId`, `amount`) VALUES
(1, 1, 2, 1),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `code`, `stock`, `expire`, `active`) VALUES
(2, 'Galaxy Flip', 2465.00, 'uploads/1722318020_ad6a36179fafe42ca7c5.jpeg', '2322', 12, '2024-07-17', b'1'),
(3, 'El Código Da Vinci', 59.00, 'uploads/1722377809_38f40addb8586e2ab560.jpg', '3456423', 56, '0000-00-00', b'1'),
(4, 'Nike Zoom Bella 6', 399.00, 'uploads/1722426759_892576ef6353334cccf2.png', '235621', 15, '2024-09-26', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `clientId` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `created`, `clientId`, `total`, `userId`) VALUES
(1, '2024-07-19', 1, 232.00, 3),
(2, '2024-07-30', NULL, 2359.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `type`) VALUES
(1, 'max', '$2y$10$caZ/lg0n/q8akJeq..8CNuyya2in0aVV0BuBDnV9.Qf8RNnSmXTvW', 'admin@example.com', '2024-07-30 01:19:46', 'user'),
(3, 'Fer', '1234', 'Fer@gmail.com', '2024-07-30 01:24:36', 'admin'),
(4, 'Luis', '$2y$10$xC39gYqdEHos0.tLj5rcT.bwQQl9Mu61lYhuInjDayglWtymQXwVq', 'Luis345@gmail.com', '2024-07-30 01:38:29', 'user'),
(6, 'Carlos', '$2y$10$bUKFSmwhHb54BEK8E/UqROaocP3vRdwqOrSW9vmjV9FbhjcpcJg2C', 'carlos@gmail.com', '2024-07-30 01:46:28', 'user'),
(9, 'alejandra ', '$2y$10$cGhr.0Dg3JhoMTBVMl6bU.3M84FMRXoqrw87qf60r0BSaZVTX4jGK', 'Alejandra@gmail.com', '2024-07-30 23:06:20', 'user'),
(10, 'veronica', '3434', 'veronica@gmail.com', '2024-07-30 23:09:16', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saleId` (`saleId`),
  ADD KEY `details_ibfk_2` (`productId`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `sales_ibfk_2` (`userId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`saleId`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
