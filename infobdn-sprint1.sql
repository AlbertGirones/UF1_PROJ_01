-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2022 a las 01:44:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--
CREATE DATABASE IF NOT EXISTS `infobdn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `infobdn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `user` varchar(100) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user`, `passwd`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnes`
--

CREATE TABLE `alumnes` (
  `DNI` varchar(100) NOT NULL,
  `nom_alum` varchar(25) NOT NULL,
  `cog_alum` varchar(70) NOT NULL,
  `edat_alum` int(99) NOT NULL,
  `foto_alum` varchar(255) NOT NULL,
  `correo_alum` varchar(70) NOT NULL,
  `passwd_alum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `DNI_alum` varchar(100) NOT NULL,
  `curso` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `codi_curs` int(100) NOT NULL,
  `nom_curs` varchar(20) NOT NULL,
  `desc_curs` varchar(100) NOT NULL,
  `hores_curs` int(255) NOT NULL,
  `ini_curs` date NOT NULL,
  `fin_curs` date NOT NULL,
  `DNI_prof` varchar(100) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codi_curs`, `nom_curs`, `desc_curs`, `hores_curs`, `ini_curs`, `fin_curs`, `DNI_prof`, `visible`) VALUES
(3, 'ASIX', 'asiiiidid', 962, '2021-09-20', '2022-09-20', '47334363H', 1),
(4, 'DAW', 'asiiiididss', 742, '2021-01-25', '2022-02-26', '741852963K', 1),
(5, 'ASIX', 'asiiiidid', 852, '2002-02-23', '2003-02-24', '741852963K', 1),
(6, 'Proyecte', 'pro', 75, '2002-04-23', '2020-08-12', '852967412J', 1),
(7, 'JAVA', 'Javascript', 30, '2022-11-21', '2022-12-22', '852934132I', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professors`
--

CREATE TABLE `professors` (
  `DNI` varchar(100) NOT NULL,
  `nom_prof` varchar(25) NOT NULL,
  `cog_prof` varchar(70) NOT NULL,
  `titol_prof` varchar(40) NOT NULL,
  `foto_prof` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `professors`
--

INSERT INTO `professors` (`DNI`, `nom_prof`, `cog_prof`, `titol_prof`, `foto_prof`, `visible`) VALUES
('47334363H', 'Albert', 'Rodriguez', 'Va de que sabe', 'profesimg/47334363H.jpg', 0),
('741852963K', 'Albert', 'Girones', 'Se lo regalaron', 'profesimg/741852963K.jpg', 0),
('852934132I', 'Adrian', 'Ocaña Alvarez', 'Grand Master en el LOL', 'profesimg/852934132I.jpg', 1),
('852967412J', 'Maria', 'Ruiz', 'Educadora', 'profesimg/852967412J.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnes`
--
ALTER TABLE `alumnes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD KEY `curso` (`curso`),
  ADD KEY `DNI_alum` (`DNI_alum`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codi_curs`),
  ADD KEY `DNI_prof` (`DNI_prof`),
  ADD KEY `DNI_prof_2` (`DNI_prof`);

--
-- Indices de la tabla `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `codi_curs` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnes`
--
ALTER TABLE `alumnes`
  ADD CONSTRAINT `FK_alumnes_control` FOREIGN KEY (`DNI`) REFERENCES `control` (`DNI_alum`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `FK_cursos_professors` FOREIGN KEY (`DNI_prof`) REFERENCES `professors` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
