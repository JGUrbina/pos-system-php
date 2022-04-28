-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2022 a las 00:21:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Base de datos: `pos`
  --
  -- --------------------------------------------------------
  --
  -- Estructura de tabla para la tabla `categories`
  --
  CREATE TABLE `categories` (
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_create_category` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
  --
  -- Estructura de tabla para la tabla `products`
  --
  CREATE TABLE `products` (
    `id` int(11) NOT NULL,
    `id_category` int(11) NOT NULL,
    `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `stock` int(11) NOT NULL,
    `purchase_price` float NOT NULL,
    `sale_price` float NOT NULL,
    `sales` int(11) NOT NULL,
    `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `code` int(11) NOT NULL,
    `porcentaje` float NOT NULL,
    `have_porsentaje` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
  --
  -- Estructura de tabla para la tabla `users`
  --
  CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `rol` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `perfil_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `state` int(11) NOT NULL,
    `last_login` datetime NOT NULL,
    `date_create_user` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
  -- Volcado de datos para la tabla `users`
  --
INSERT INTO
  `users` (
    `id`,
    `name`,
    `username`,
    `password`,
    `rol`,
    `perfil_img`,
    `state`,
    `last_login`,
    `date_create_user`
  )
VALUES
  (
    1,
    'admin',
    'admin',
    '$6$rounds=5000$usesomesillystri$6gpUmCELV1HnverxNhq2YWuYi.igqrhUfkdwmwe3l9eqWvxtT/YKO3/CmmBo1PB2ZvbFqMN.WPUEcQIHPP1bb.',
    'admin',
    '',
    1,
    '0000-00-00 00:00:00',
    '2022-04-27 22:20:30'
  );
--
  -- Índices para tablas volcadas
  --
  --
  -- Indices de la tabla `categories`
  --
ALTER TABLE
  `categories`
ADD
  PRIMARY KEY (`id`);
--
  -- Indices de la tabla `products`
  --
ALTER TABLE
  `products`
ADD
  PRIMARY KEY (`id`);
--
  -- Indices de la tabla `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT de las tablas volcadas
  --
  --
  -- AUTO_INCREMENT de la tabla `categories`
  --
ALTER TABLE
  `categories`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 17;
--
  -- AUTO_INCREMENT de la tabla `products`
  --
ALTER TABLE
  `products`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 61;
--
  -- AUTO_INCREMENT de la tabla `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 46;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;