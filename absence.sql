-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2019 a las 18:46:39
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `absence`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `user` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `passw` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user`, `passw`, `nombre`) VALUES
('15935728P', '12345', 'Pablo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `passw` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellido1`, `apellido2`, `correo`, `passw`) VALUES
('15419090M', 'PABLO', 'MARTINEZ', 'PEREZ', 'pablo@gmail.com', '1234'),
('15482635J', 'JAIME', 'BELTRA', 'MESTRE', 'jaime@ejemplo.com', '1234'),
('44444444D', 'SANTIAGO', 'SERNA', 'ALMAIDA', 'sserna@ejemplo.com', '1234'),
('55555555E', 'LUIS', 'MIRALLES', 'MUNOZ', 'luismiralles@ejemplo.com', '1234'),
('66666666F', 'SERGIO', 'BERNA', 'MORCILLO', 'sergioberna@ejemplo.com', '1234'),
('7777777G', 'ANDRES', 'PINEDA', 'ANDREU', 'apineda@ejemplo.com', '1234'),
('88888888H', 'DAVID', 'MARTINEZ', 'MARTINEZ', 'davidmm@ejemplo.com', '1234'),
('99999999I', 'PABLO', 'FERRER', 'VICENTE', 'pablo_ferrer@ejemplo.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_asig`
--

CREATE TABLE `alumnos_asig` (
  `id_alu` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_asigna` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_curso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `repetidor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos_asig`
--

INSERT INTO `alumnos_asig` (`id_alu`, `id_asigna`, `id_curso`, `repetidor`) VALUES
('15419090M', 'dapw', '2daw', 0),
('15419090M', 'dwes', '2daw', 0),
('15419090M', 'it', '2daw', 0),
('15482635J', 'dapw', '2daw', 0),
('15482635J', 'dwes', '2daw', 0),
('15482635J', 'it', '2daw', 0),
('44444444D', 'dapw', '2daw', 0),
('44444444D', 'dwes', '2daw', 0),
('44444444D', 'it', '2daw', 0),
('55555555E', 'dapw', '2daw', 0),
('55555555E', 'dwes', '2daw', 0),
('55555555E', 'it', '2daw', 0),
('66666666F', 'dapw', '2daw', 0),
('66666666F', 'dwes', '2daw', 0),
('66666666F', 'it', '2daw', 0),
('7777777G', 'dapw', '2daw', 0),
('7777777G', 'dwes', '2daw', 0),
('7777777G', 'it', '2daw', 0),
('88888888H', 'dapw', '2daw', 0),
('88888888H', 'dwes', '2daw', 0),
('88888888H', 'it', '2daw', 0),
('99999999I', 'it', '1daw', 1),
('99999999I', 'pro', '1daw', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asigna` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `id_profe` varchar(9) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asigna`, `nombre`, `id_profe`) VALUES
('dapw', 'Despliegue de Aplicaciones Web', '11111111A'),
('dwec', 'Desarrollo Web Entorno Cliente', '22222222B'),
('dwes', 'Desarrollo Web Entorno Servidor', '33333333C'),
('it', 'Ingles Tecnico', '12345678P'),
('pro', 'Programacion', '11111111A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tutor` varchar(9) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`, `id_tutor`) VALUES
('1daw', '1 DAW', '11111111A'),
('2daw', '2 DAW', '33333333C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL,
  `id_alu` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_asigna` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `justificada` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id_falta`, `id_alu`, `id_asigna`, `dia`, `hora`, `id_tipo`, `justificada`) VALUES
(4, '15419090M', 'dapw', '06/04/2019', '14:27', '3', 'NO'),
(5, '15419090M', 'dwes', '10/04/2019', '22:14', '1', 'SI'),
(6, '15419090M', 'dwes', '10/04/2019', '22:14', '2', 'SI'),
(7, '99999999I', 'pro', '12/04/2019', '10:25', '3', 'NO'),
(8, '66666666F', 'dwes', '29/04/2019', '13:47', '1', 'NO'),
(9, '15482635J', 'dwes', '03/05/2019', '11:25', '1', 'SI'),
(10, '88888888H', 'dwes', '03/05/2019', '11:31', '1', 'NO'),
(11, '7777777G', 'dwes', '03/05/2019', '11:31', '1', 'NO'),
(14, '44444444D', 'dwes', '03/05/2019', '15:18', '3', 'NO'),
(15, '15482635J', 'dwes', '04/05/2019', '12:22', '3', 'NO'),
(16, '55555555E', 'dwes', '04/05/2019', '12:38', '3', 'NO'),
(17, '7777777G', 'dwes', '04/05/2019', '12:43', '3', 'NO'),
(18, '15419090M', 'dwes', '04/05/2019', '12:43', '2', 'NO'),
(19, '44444444D', 'dwes', '04/05/2019', '12:43', '2', 'NO'),
(20, '15482635J', 'dwes', '04/05/2019', '12:44', '1', 'NO'),
(21, '66666666F', 'dwes', '04/05/2019', '12:44', '2', 'SI'),
(22, '15419090M', 'dwes', '04/05/2019', '12:46', '3', 'NO'),
(23, '55555555E', 'dwes', '04/05/2019', '12:46', '3', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_asig`
--

CREATE TABLE `horario_asig` (
  `id_asigna` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` int(10) NOT NULL,
  `id_curso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario_asig`
--

INSERT INTO `horario_asig` (`id_asigna`, `dia`, `hora`, `id_curso`) VALUES
('it', 'L', 4, '1daw'),
('it', 'V', 3, '1daw'),
('it', 'X', 3, '1daw'),
('pro', 'J', 4, '1daw'),
('pro', 'J', 5, '1daw'),
('pro', 'L', 5, '1daw'),
('pro', 'L', 6, '1daw'),
('pro', 'L', 7, '1daw'),
('pro', 'X', 5, '1daw'),
('pro', 'X', 6, '1daw'),
('pro', 'X', 7, '1daw'),
('dapw', 'M', 6, '2daw'),
('dapw', 'V', 4, '2daw'),
('dapw', 'V', 5, '2daw'),
('dapw', 'X', 1, '2daw'),
('dwec', 'J', 4, '2daw'),
('dwec', 'J', 5, '2daw'),
('dwec', 'L', 1, '2daw'),
('dwec', 'M', 1, '2daw'),
('dwec', 'M', 2, '2daw'),
('dwec', 'M', 3, '2daw'),
('dwec', 'X', 3, '2daw'),
('dwes', 'L', 2, '2daw'),
('dwes', 'L', 3, '2daw'),
('dwes', 'L', 4, '2daw'),
('dwes', 'M', 4, '2daw'),
('dwes', 'M', 5, '2daw'),
('dwes', 'X', 5, '2daw'),
('dwes', 'X', 6, '2daw'),
('dwes', 'X', 7, '2daw'),
('it', 'L', 5, '2daw'),
('it', 'X', 4, '2daw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dni` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `passw` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni`, `nombre`, `apellido1`, `apellido2`, `correo`, `passw`) VALUES
('11111111A', 'ENRIQUE', 'GARCIA', 'HERNANDEZ', 'enrique@ejemplo.com', '1234'),
('12345678P', 'FUENCISLA', 'GRAU', 'LLOPIS', 'fuencis@ejemplo', '1234'),
('22222222B', 'MIGUEL ANGEL', 'SEGURA', 'FUENTES', 'miguelangel@ejemplo.com', '1234'),
('33333333C', 'ANTONIO', 'MAS', 'MAS', 'antonio@ejemplo.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_falta`
--

CREATE TABLE `tipo_falta` (
  `id_tipo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_falta`
--

INSERT INTO `tipo_falta` (`id_tipo`, `descripcion`) VALUES
('1', 'Falta de asistencia'),
('2', 'Retraso de asistencia'),
('3', 'Amonestacion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `alumnos_asig`
--
ALTER TABLE `alumnos_asig`
  ADD PRIMARY KEY (`id_alu`,`id_asigna`,`id_curso`),
  ADD KEY `id_asigna` (`id_asigna`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asigna`),
  ADD KEY `id_profe` (`id_profe`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id_falta`),
  ADD KEY `id_alu` (`id_alu`),
  ADD KEY `id_asigna` (`id_asigna`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `horario_asig`
--
ALTER TABLE `horario_asig`
  ADD PRIMARY KEY (`id_asigna`,`dia`,`hora`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `tipo_falta`
--
ALTER TABLE `tipo_falta`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id_falta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_asig`
--
ALTER TABLE `alumnos_asig`
  ADD CONSTRAINT `alumnos_asig_ibfk_1` FOREIGN KEY (`id_alu`) REFERENCES `alumnos` (`dni`),
  ADD CONSTRAINT `alumnos_asig_ibfk_2` FOREIGN KEY (`id_asigna`) REFERENCES `asignaturas` (`id_asigna`),
  ADD CONSTRAINT `alumnos_asig_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`id_profe`) REFERENCES `profesores` (`dni`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `profesores` (`dni`);

--
-- Filtros para la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`id_alu`) REFERENCES `alumnos` (`dni`),
  ADD CONSTRAINT `faltas_ibfk_2` FOREIGN KEY (`id_asigna`) REFERENCES `asignaturas` (`id_asigna`),
  ADD CONSTRAINT `faltas_ibfk_3` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_falta` (`id_tipo`);

--
-- Filtros para la tabla `horario_asig`
--
ALTER TABLE `horario_asig`
  ADD CONSTRAINT `horario_asig_ibfk_1` FOREIGN KEY (`id_asigna`) REFERENCES `asignaturas` (`id_asigna`),
  ADD CONSTRAINT `horario_asig_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
