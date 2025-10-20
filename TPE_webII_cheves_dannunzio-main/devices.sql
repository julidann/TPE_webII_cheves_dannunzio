-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2025 a las 22:52:10
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
(1, 'iPhone / iPad / Mac', 'Dispositivos móviles y computadoras Apple'),
(2, 'Apple Watch', 'Relojes inteligentes Apple Watch'),
(3, 'AirPods', 'Auriculares inalámbricos y accesorios de audio'),
(4, 'HomePod / Apple TV', 'Dispositivos de entretenimiento y hogar'),
(5, 'Accesorios', 'Teclados, mouse, lápices y otros accesorios Apple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `model`, `price`, `description`, `id_category`) VALUES
(1, 'Iphone 17 Pro Max', 'https://http2.mlstatic.com/D_NQ_NP_914407-MLA92911355796_092025-O.webp', '17 PRO MAX', 1500, 'El iPhone 17 Pro Max combina diseño premium, chip potente y cámara avanzada.', 1),
(2, 'Apple Watch Series 11', 'https://http2.mlstatic.com/D_NQ_NP_743107-CBT92553161980_092025-OO.jpg', 'Series 11', 500, 'Reloj inteligente con pantalla Retina LTPO OLED y múltiples sensores.', 2),
(3, 'AirPods ProMax', 'https://http2.mlstatic.com/D_NQ_NP_851599-MLA82173621052_022025-OO.jpg', 'ProMax', 150, 'Auriculares con sonido de alta fidelidad y cancelación activa de ruido.', 3),
(4, 'MacBook Pro 2025 M2', 'https://http2.mlstatic.com/D_NQ_NP_790799-CBT90714895802_082025-OO.jpg', '2025 M2', 2500, 'Portátil potente con chip M2, ideal para diseño y programación.', 1),
(5, 'iPad Pro 12.9\"', 'https://http2.mlstatic.com/D_NQ_NP_730159-CBT89093866079_082025-OO.jpg', '12.9\"', 1200, 'Tablet de alto rendimiento con pantalla Liquid Retina XDR.', 1),
(6, 'HomePod Mini', 'https://http2.mlstatic.com/D_NQ_NP_840202-MLA45740046421_042021-OO.jpg', 'Mini', 100, 'Altavoz inteligente compacto con Siri integrado.', 4),
(7, 'iMac 24\"', 'https://http2.mlstatic.com/D_NQ_NP_922548-MLA81218106978_122024-OO.jpg', '24\"', 1800, 'Todo-en-uno con pantalla Retina 4.5K y chip M1.', 1),
(8, 'Apple TV 4K', 'https://http2.mlstatic.com/D_NQ_NP_662921-MLA53529199006_012023-OO.jpg', '4K', 200, 'Dispositivo de streaming con resolución 4K HDR.', 4),
(9, 'Magic Keyboard Wireless', 'https://http2.mlstatic.com/D_NQ_NP_890506-MLU76759497777_052024-OO.jpg', 'Wireless', 120, 'Teclado inalámbrico con diseño minimalista y batería recargable.', 5),
(10, 'Magic Mouse 2nd Gen', 'https://http2.mlstatic.com/D_NQ_NP_624987-MLA48881660084_012022-OO.jpg', '2nd Gen', 80, 'Ratón inalámbrico con superficie multitáctil y diseño ergonómico.', 5),
(11, 'iPhone 17 Air', 'https://http2.mlstatic.com/D_NQ_NP_851834-MLA93822329337_092025-OO.jpg', '17 Air', 1200, 'iPhone compacto con todas las funcionalidades del 17 Pro.', 1),
(12, 'iPad Air', 'https://http2.mlstatic.com/D_NQ_NP_890391-MLA83780089508_042025-OO.jpg', 'Air 2025', 900, 'Tablet ligera y potente con chip A15 Bionic.', 1),
(13, 'Apple Watch SE', 'https://http2.mlstatic.com/D_NQ_NP_904908-MLA92851412157_092025-OO.jpg', 'SE', 350, 'Reloj inteligente económico con funciones de salud y actividad.', 2),
(14, 'AirPods 3rd Gen', 'https://http2.mlstatic.com/D_NQ_NP_701256-MLU70634033372_072023-O.webp', '3rd Gen', 180, 'Auriculares inalámbricos con buen sonido y resistencia al agua.', 3),
(15, 'HomePod', 'https://http2.mlstatic.com/D_NQ_NP_734624-MLA87783131196_072025-OO.jpg', 'Original', 300, 'Altavoz inteligente con sonido de alta calidad y Siri integrado.', 4),
(16, 'Apple TV HD', 'https://http2.mlstatic.com/D_NQ_NP_633039-MLA32691404911_102019-OO.jpg', 'HD', 150, 'Dispositivo de streaming en HD con acceso a Apple TV+', 4),
(17, 'Magic Keyboard para iPad', 'https://http2.mlstatic.com/D_NQ_NP_694020-MLA86041225556_062025-OO.jpg', 'Para iPad', 250, 'Teclado con trackpad compatible con iPad Pro y Air.', 5),
(18, 'Magic Trackpad', 'https://http2.mlstatic.com/D_NQ_NP_787420-MLA84187497362_052025-OO.jpg', '2nd Gen', 120, 'Trackpad inalámbrico con gestos multitáctiles.', 5),
(19, 'Mac Mini', 'https://http2.mlstatic.com/D_NQ_NP_697274-MLA83598153563_042025-OO.jpg', '2025 M2', 1000, 'Mini computadora potente para escritorio con chip M2.', 1),
(20, 'AirPods Pro 2', 'https://http2.mlstatic.com/D_NQ_NP_707825-MLA72508419694_102023-OO.jpg', 'Pro 2', 250, 'Auriculares con cancelación activa de ruido y modo transparencia.', 3),
(21, 'iPhone SE 2025', 'https://http2.mlstatic.com/D_NQ_NP_615774-MLA46552695388_062021-OO.jpg', 'SE 2025', 450, 'iPhone compacto y potente con cámara avanzada.', 1),
(22, 'Apple Watch Series 12', 'https://http2.mlstatic.com/D_NQ_NP_611645-MLA91903698062_092025-O.webp', 'Series 12', 550, 'Reloj inteligente con medición de oxígeno y ECG.', 2),
(23, 'AirPods Max', 'https://http2.mlstatic.com/D_NQ_NP_920403-MLU79116952765_092024-OO.jpg', 'Max', 600, 'Auriculares circumaurales con sonido envolvente y cancelación de ruido.', 3),
(24, 'Apple Pencil 2nd Gen', 'https://http2.mlstatic.com/D_NQ_NP_612377-MLA81240009786_122024-O.webp', '2nd Gen', 150, 'Lápiz inteligente para iPad con precisión y respuesta rápida.', 5),
(25, 'MacBook Air', 'https://http2.mlstatic.com/D_NQ_NP_801112-MLA46516512347_062021-OO.jpg', '2025 M2', 1800, 'Portátil ligero y eficiente con chip M2.', 1),
(26, 'iPad Mini', 'https://http2.mlstatic.com/D_NQ_NP_820198-CBT88923911520_082025-OO.jpg', 'Mini 2025', 700, 'Tablet pequeña y potente, ideal para movilidad.', 1),
(27, 'HomePod 2', 'https://http2.mlstatic.com/D_NQ_NP_850763-MLA87783387438_072025-OO.jpg', 'Segunda Gen', 350, 'Altavoz inteligente con sonido mejorado y Siri.', 4),
(28, 'Magic Keyboard Mac', 'https://http2.mlstatic.com/D_NQ_NP_890506-MLU76759497777_052024-OO.jpg', 'Mac Edition', 130, 'Teclado inalámbrico especialmente para Mac.', 5),
(29, 'Magic Mouse Pro', 'https://http2.mlstatic.com/D_NQ_NP_684898-CBT84589318828_052025-O.webp', 'Pro', 90, 'Ratón avanzado con superficie táctil y Bluetooth.', 5),
(30, 'Apple Watch Ultra', 'https://http2.mlstatic.com/D_NQ_NP_871389-MLU77501910275_072024-OO.jpg', 'Ultra', 800, 'Reloj inteligente con batería extendida y resistencia al agua.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` int(30) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
