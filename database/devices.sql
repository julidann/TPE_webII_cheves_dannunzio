-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2025 a las 20:52:30
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
-- Base de datos: `devices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Celulares', 'Los celulares liberados permiten usar chips de cualquier compañía, sin contratos ni límites, lo que brinda flexibilidad y ahorro. Son ideales para viajar al exterior y evitar roaming caros. Además, tienen mejor valor de reventa. '),
(2, 'SmartWatches', 'Los relojes inteligentes de la mejor calidad, encontralos en nuestra tienda '),
(3, 'Auriculares', 'El mejor sonido en auriculares, de última generación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `model`, `price`, `description`, `id_category`) VALUES
(8, 'Iphone', '17 PRO MAX', 1500, 'El iPhone 17 Pro Max combina diseño premium, chip A19 Pro ultrarrápido, pantalla OLED 6,9″ de 120 Hz, cámaras de 48 MP con zoom 8× y batería de larga duración con carga rápida. Potencia, innovación y resistencia en tu mano.', 1),
(10, 'Apple Watch', 'Series 11', 500, 'Reloj inteligente con pantalla Retina LTPO OLED de hasta 2.000 nits, resistencia al agua y al polvo, conectividad 5G, detección de hipertensión, ECG, oxígeno en sangre y nuevo modo de sueño. Autonomía hasta 24-38 h', 2),
(11, 'AirPods', 'ProMax', 150, 'Auriculares que ofrecen sonido de alta fidelidad con cancelación activa de ruido, modo transparencia y audio espacial. Diseño premium, gran comodidad y hasta 20 h de autonomía para una experiencia inmersiva en música, películas y llamadas', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
