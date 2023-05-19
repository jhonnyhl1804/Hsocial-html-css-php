-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 03:22:17
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lugarNac` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `nombre`, `apellido`, `correo`, `cedula`, `genero`, `lugarNac`, `fechaNac`, `telefono`, `direccion`, `cargo`) VALUES
(1, 'Sr Administrador', 'Programador', 'admin@correo.com', '12221', 'Masculino', 'coveÃ±as', '1990-01-01', '2122111', 'punta seca', 'ingeniero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleoferta`
--

CREATE TABLE `detalleoferta` (
  `idDetalle` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL,
  `realizado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalleoferta`
--

INSERT INTO `detalleoferta` (`idDetalle`, `idAlumno`, `idActividad`, `realizado`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lugarNac` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idAlumno`, `nombre`, `apellido`, `correo`, `genero`, `lugarNac`, `fechaNac`, `telefono`, `direccion`, `grado`) VALUES
(1, 'julanito', 'de tal', 'julanito@correo.com', 'Masculino', 'coveÃ±as', '2000-01-01', '212122', 'coveÃ±as', 11),
(2, 'Anita', 'Del Barrio', 'anita@correo.com', 'f', 'coveñas', '2000-01-01', '22773771', 'La bonga', 11),
(12122331, 'maria', 'pacheco', 'maria@correo.com', 'femenino', 'guayabal, coveÃ±as-sucre', '2000-01-01', '3212227788', 'la virgensita', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `idActividad` int(11) NOT NULL,
  `tipoActividad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombreActividad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `horasCant` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alumnosCant` int(11) NOT NULL,
  `contador` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idActividad`, `tipoActividad`, `nombreActividad`, `descripcion`, `horasCant`, `fecha`, `hora`, `lugar`, `alumnosCant`, `contador`, `idProfesor`) VALUES
(1, 'aseo', 'Limpiar el salÃ³n', 'limpiar el salon de primero', 3, '2019-10-14', '09:30:00', 'salon de primero', 2, -1, 1),
(2, 'disciplina', 'monitoria', 'estar pendiente de los compaÃ±eros', 5, '2019-10-22', '08:00:00', 'salon 10', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lugarNac` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `licenciatura` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellido`, `correo`, `genero`, `lugarNac`, `fechaNac`, `telefono`, `direccion`, `licenciatura`) VALUES
(1, 'maximo', 'cabrales', 'maximo@correo.com', 'Masculino', 'coveÃ±as', '1987-01-01', '321 123 45 67', 'guayabal', 'espaÃ±ol'),
(1283665, 'Ramiro', 'Martinez', 'ramiro@correo.com', 'masculino', 'guayabal, coveÃ±as-sucre', '1980-01-01', '3215666262', 'Calle 3, #2-16', 'Sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `rol` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `rol`, `correo`, `password`) VALUES
(5, 'admin', 'admin@correo.com', '12345'),
(4, 'alumno', 'julanito@correo.com', '12345'),
(1, 'profesor', 'maximo@correo.com', '12345'),
(2, 'profesor', 'ramiro@correo.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `detalleoferta`
--
ALTER TABLE `detalleoferta`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
