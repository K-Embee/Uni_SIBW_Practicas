-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2019 a las 20:34:25
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `eventoNombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `ip` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `texto` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `eventoNombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `genero` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `estudios` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `distribuidora` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fechaEstreno` date NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `enlace_twitter` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `enlace_fb` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_ultima_mod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`eventoNombre`, `genero`, `estudios`, `distribuidora`, `fechaEstreno`, `descripcion`, `enlace_twitter`, `enlace_fb`, `fecha_creacion`, `fecha_ultima_mod`) VALUES
('Detective Pikachu', 'Acción, Aventuras', 'Legendary Pictures', 'Warner Bros. Pictures', '2019-05-17', 'Tim Goodman llega a Ryme City para investigar la misteriosa desaparición de su padre en la ciudad. En el camino,\r\n				 se encuentra con un Pikachu que habla, aunque en realidad solo él es el único que puede entenderlo. Ambos trabajarán\r\n				  juntos para resolver este gran enigma junto a la reportera Kathryn Newton con su Psyduck.', 'https://twitter.com/DetPikachuMovie', 'https://www.facebook.com/detectivepikachumovie/', '2019-04-02', '2019-04-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `url` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `eventoNombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`url`, `eventoNombre`) VALUES
('./imgs/pikachu-inicio.jpg', 'Detective Pikachu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eventoNombre`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`url`(200));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
