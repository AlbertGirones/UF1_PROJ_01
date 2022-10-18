-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 10:06:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `passwd_alum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnes`
--

INSERT INTO `alumnes` (`DNI`, `nom_alum`, `cog_alum`, `edat_alum`, `foto_alum`, `correo_alum`, `passwd_alum`) VALUES
('451283644Ñ', 'Julian', 'Alvarez Moñon', 19, 'alumimg/451283644Ñ.jpg', 'julian888n@infobdn.cat', 'fc8bb50f37f8198b37ec747fdcf88cbf'),
('47334363H', 'Albert', 'Girones', 20, 'alumimg/47334363H.jpg', 'agirones600@gmail.com', '202cb962ac59075b964b07152d234b70'),
('48133467X', 'Gerard', 'Bejarano Alonso', 22, 'alumimg/48133467X.jpg', 'geriteri@infobdn.cat', 'fc8bb50f37f8198b37ec747fdcf88cbf');

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
(3, 'ASIX', 'asiiiidid', 962, '2023-01-01', '2024-09-20', '741852963K', 1),
(4, 'DAW', 'asiiiididsstrtrr', 743, '2023-01-20', '2024-02-26', '47334363H', 1),
(5, 'MANTENIMENT', 'Hardware', 546, '2022-12-03', '2023-01-01', '672996313Y', 1),
(6, 'PHP', 'Projectes en PHP', 400, '2022-10-19', '2022-10-29', '852162124O', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `DNI_alum` varchar(100) NOT NULL,
  `curso` int(100) NOT NULL,
  `nota` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`DNI_alum`, `curso`, `nota`) VALUES
('48133467X', 3, 1),
('47334363H', 4, 0),
('47334363H', 3, 0),
('47334363H', 5, 6),
('451283644Ñ', 4, 0),
('451283644Ñ', 5, 0);

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
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `passwd_prof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `professors`
--

INSERT INTO `professors` (`DNI`, `nom_prof`, `cog_prof`, `titol_prof`, `foto_prof`, `visible`, `passwd_prof`) VALUES
('47334363H', 'Lluis', 'Lopez Ruiz', 'Matematic', 'profesimg/47334363H.jpg', 0, 'ac8c0826d26ace7d67486fa3ef3c0290'),
('672996313Y', 'Oriol', 'Taradellas', 'Técnic en hardware', 'profesimg/672996313Y.jpg', 1, '202cb962ac59075b964b07152d234b70'),
('741852963K', 'Marcos', 'Alonso', 'Licenciado en educación infantil', 'profesimg/741852963K.jpg', 1, 'ac8c0826d26ace7d67486fa3ef3c0290'),
('852162124O', 'Maria', 'Angelita', 'Master de dades', 'profesimg/852162124O.jpg', 1, '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnes`
--
ALTER TABLE `alumnes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codi_curs`),
  ADD KEY `DNI_prof` (`DNI_prof`),
  ADD KEY `DNI_prof_2` (`DNI_prof`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD KEY `curso` (`curso`),
  ADD KEY `DNI_alum` (`DNI_alum`);

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
  MODIFY `codi_curs` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `FK_cursos_professors` FOREIGN KEY (`DNI_prof`) REFERENCES `professors` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_control_alumnes` FOREIGN KEY (`DNI_alum`) REFERENCES `alumnes` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
