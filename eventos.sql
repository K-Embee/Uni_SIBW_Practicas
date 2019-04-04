-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2019 a las 00:54:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censura`
--

CREATE TABLE `censura` (
  `palabra` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `texto` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `eventoNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estudios` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `distribuidora` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEstreno` date NOT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `enlace_twitter` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_fb` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_ultima_mod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `eventoNombre`, `genero`, `estudios`, `distribuidora`, `fechaEstreno`, `descripcion`, `enlace_twitter`, `enlace_fb`, `fecha_creacion`, `fecha_ultima_mod`) VALUES
('detective_pikachu', 'Detective Pikachu', 'Acción, Aventuras', 'Legendary Pictures', 'Warner Bros. Pictures', '2019-05-17', 'Tim Goodman llega a Ryme City para investigar la misteriosa desaparición de su padre en la ciudad. En el camino,\r\n				 se encuentra con un Pikachu que habla, aunque en realidad solo él es el único que puede entenderlo. Ambos trabajarán\r\n				  juntos para resolver este gran enigma junto a la reportera Kathryn Newton con su Psyduck.', 'https://twitter.com/DetPikachuMovie', 'https://www.facebook.com/detectivepikachumovie/', '2019-04-02', '2019-04-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `url` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`url`, `idEvento`) VALUES
('./imgs/detective_pikachu/portada.jpg', 'detective_pikachu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_info`
--

CREATE TABLE `pag_info` (
  `idPagina` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `censura`
--
ALTER TABLE `censura`
  ADD PRIMARY KEY (`palabra`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `ClaveExternaEvento` (`idEvento`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`genero`,`idEvento`),
  ADD KEY `Clave Externa Evento` (`idEvento`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`url`(200)),
  ADD KEY `Clave Externa` (`idEvento`);

--
-- Indices de la tabla `pag_info`
--
ALTER TABLE `pag_info`
  ADD PRIMARY KEY (`idPagina`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `ClaveExternaEvento` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD CONSTRAINT `Clave Externa Evento` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `Clave Externa Genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`genero`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `Clave Externa` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
