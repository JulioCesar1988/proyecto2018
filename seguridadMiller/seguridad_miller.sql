-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2018 a las 16:36:52
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguridad_miller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `id_usuario`, `id_recurso`, `id_rol`) VALUES
(62, 23, 23, 4),
(68, 11, 25, 3),
(70, 19, 23, 4),
(72, 12, 23, 10),
(73, 11, 23, 4),
(74, 12, 23, 13),
(75, 21, 17, 3),
(76, 22, 23, 4),
(77, 20, 24, 3),
(78, 19, 24, 3),
(79, 18, 17, 3),
(80, 18, 23, 9),
(81, 23, 17, 3),
(82, 24, 17, 3),
(84, 24, 17, 3),
(85, 25, 23, 4),
(86, 26, 24, 10),
(87, 25, 26, 3),
(88, 25, 24, 4),
(89, 25, 27, 3),
(90, 26, 24, 3),
(91, 25, 25, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id_recurso` int(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre`, `ip`) VALUES
(17, 'Odoo Oficina de Ventas', '   http://159.96.45.42:8069/web/login?db=Ventas'),
(24, 'OutLook', 'https://outlook.office365.com/'),
(25, 'Bacula ', 'http://159.96.45.47/webacula/auth/login'),
(26, 'Vp Tools', 'http://159.96.45.43/PHP_PCL/'),
(27, 'Odo Sistemas', 'http://159.96.45.42:8069/web/login?db=sistemas'),
(29, 'gestorbox', 'http://localhost/gestorbox2018/index.php'),
(30, 'fff', 'http://localhost/gestorbox2018/index.php'),
(31, 'joe contreras', '159.96.45.43'),
(32, 'joe contreras', 'http://localhost/gestorbox2018/index.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(3, 'Administador'),
(4, 'Usuario estandar'),
(9, 'Bloqueado'),
(10, 'Full'),
(12, 'Sin permisos'),
(13, 'Control de Produccion'),
(15, 'Sistemas'),
(16, 'Planta'),
(17, 'Oficina Tecnica'),
(18, 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `clave`, `rol`, `id_rol`) VALUES
(9, 'julio', 'Contreras', 'julio.unlp2010@gmail.com', '1234', '', 5),
(14, 'Martin ', 'Aguilar', 'maguilar@millerbi.net', '1234', '', 5),
(15, 'raul', 'gomez', 'g@gmail.com', '1234', '', 6),
(16, 'kkkkkkkk', 'kkkkkkkkkk', 'k@gmail.com', '1234', '', 8),
(18, '          Julio', '          Contreras', 'jcontreras@millerbi.net', '1234', '', 3),
(25, 'Leonardo', 'Miaton', 'lmiaton@millerbi.net', '1234', '', 4),
(26, 'Ezequiel ', 'Guadarrama', 'eguadarrama@millerbi.net', '1234', '', 4),
(27, 'Julio', 'Contreras', 'j@gmail.com', '1234', '', 4),
(28, 'asdasd', 'asdasd', 'julio.unlp2010@gmail.com', 'asdasdasd', '', 4),
(29, 'asasdasdasd', 'adaasdasdasd', 'julio.unlp2010@gmail.com', '1234', '', 9),
(30, 'asdasd', 'asdasd', 'aa@gmail.com', '1234', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tiene_rol`
--

CREATE TABLE `usuario_tiene_rol` (
  `id` int(11) NOT NULL,
  `id_usario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_asignacion`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario_tiene_rol`
--
ALTER TABLE `usuario_tiene_rol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
