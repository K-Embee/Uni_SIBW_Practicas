-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 11:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventos`
--

-- --------------------------------------------------------

--
-- Table structure for table `censura`
--

CREATE TABLE `censura` (
  `palabra` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `censura`
--

INSERT INTO `censura` (`palabra`) VALUES
('azul'),
('ciudadanos'),
('cs'),
('digimon'),
('dreamworks'),
('iu'),
('izquierda unida'),
('podemos'),
('pp'),
('psoe'),
('rapidos y furiosos'),
('unidas podemos'),
('vox');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
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
-- Table structure for table `etiquetas`
--

CREATE TABLE `etiquetas` (
  `idGenero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `etiquetas`
--

INSERT INTO `etiquetas` (`idGenero`, `idEvento`) VALUES
('accion', 'detective_pikachu'),
('accion', 'vengadores'),
('animacion', 'toy_story'),
('aventura', 'aladdin'),
('aventura', 'detective_pikachu'),
('aventura', 'spiderman'),
('aventura', 'toy_story'),
('ciencia_ficcion', 'vengadores'),
('comedia', 'toy_story'),
('fantasia', 'aladdin'),
('musical', 'aladdin'),
('romance', 'aladdin'),
('romance', 'toy_story'),
('superheroes', 'spiderman'),
('superheroes', 'vengadores');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
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
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`idEvento`, `eventoNombre`, `genero`, `estudios`, `distribuidora`, `fechaEstreno`, `descripcion`, `enlace_twitter`, `enlace_fb`, `fecha_creacion`, `fecha_ultima_mod`) VALUES
('aladdin', 'Aladdin', 'Romance, aventuras, musical y fantasía', 'Walt Disney Pictures', 'Walt Disney Studios Motion Pictures', '2019-05-24', 'Una apasionante adaptación en imagen real del clásico animado de Disney. «Aladdín» es la fascinante historia de Aladdín, un encantador ladronzuelo callejero, Jasmine, una princesa valiente e independiente, y el Genio, que puede ser la clave para el futuro de ambos.', 'https://twitter.com/disneyaladdin?lang=es', 'https://es-la.facebook.com/DisneyAladdin/', '2019-04-04', '2019-04-04'),
('detective_pikachu', 'Detective Pikachu', 'Acción, Aventuras', 'Legendary Pictures', 'Warner Bros. Pictures', '2019-05-17', 'Tim Goodman llega a Ryme City para investigar la misteriosa desaparición de su padre en la ciudad. En el camino,\r\n				 se encuentra con un Pikachu que habla, aunque en realidad solo él es el único que puede entenderlo. Ambos trabajarán\r\n				  juntos para resolver este gran enigma junto a la reportera Kathryn Newton con su Psyduck.', 'https://twitter.com/DetPikachuMovie', 'https://www.facebook.com/detectivepikachumovie/', '2019-04-02', '2019-04-02'),
('spiderman', 'Spiderman: Far From Home', 'Superhéroes, Aventura', 'Marvel Studios', 'Sony Pictures Releasing', '2019-07-05', 'La película empieza después de los eventos de Avengers: Endgame,​ cuando Peter Parker va en un viaje escolar a Europa con sus amigos. Mientras que está en el extranjero, es obligado a unirse a Mysterio y así detener a los Elementales, unos extraños enemigos que nadie sabe de dónde vienen.', 'https://twitter.com/spidermanmovie', 'https://es-la.facebook.com/MarvelStudiosSpiderMan/', '2019-04-04', '2019-04-04'),
('toy_story', 'Toy Story 4', 'Animación, Comedia Romántica, Aventura', 'Walt Disney Pictures', 'Walt Disney Studios\r\nMotion Pictures', '2019-06-21', 'Woody siempre ha sabido cuál es su lugar en el mundo, y que su prioridad es cuidar de su dueño, ya sea Bonnie o Andy, pero cuando Bonnie agrega un juguete nuevo y reacio llamado Forky a su dormitorio, una aventura junto a viejos y nuevos amigos le mostrarán a Woody qué tan grande puede ser el mundo para un juguete. En el camino, Woody se reúne inesperadamente con Betty.', 'https://twitter.com/toystory', 'https://es-es.facebook.com/PixarToyStory/', '2019-04-04', '2019-04-04'),
('vengadores', 'Avengers: Endgame', 'Superhéroes, Acción, Ciencia ficción', 'Marvel Studios', 'Walt Disney Studios Motion Pictures', '2019-04-26', 'Tras los eventos de Avengers: Infinity War, la mitad de toda la vida en el universo ha sido asesinada en un evento denominado \"La Decimación\". Con el universo sobreviviente en ruinas, los Vengadores y los Guardianes de la Galaxia restantes tratan de recuperarse de su fuerte derrota a manos del malvado Titan y deberán volver a unirse una vez más para reparar el daño causado por Thanos y restaurar la armonía en el universo.', 'https://twitter.com/avengers', 'https://www.facebook.com/avengersendg4me/', '2019-04-04', '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `idGenero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
('accion', 'Acción'),
('animacion', 'Animación'),
('aventura', 'Aventura'),
('ciencia_ficcion', 'Ciencia ficción'),
('comedia', 'Comedia'),
('fantasia', 'Fantasía'),
('musical', 'Musical'),
('romance', 'Romance'),
('superheroes', 'Superhéroes');

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `url` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`url`, `idEvento`) VALUES
('./imgs/detective_pikachu/portada.jpg', 'detective_pikachu'),
('.imgs/detective_pikachu/pikachu.jpg', 'detective_pikachu');

-- --------------------------------------------------------

--
-- Table structure for table `pag_info`
--

CREATE TABLE `pag_info` (
  `idPagina` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `censura`
--
ALTER TABLE `censura`
  ADD PRIMARY KEY (`palabra`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `ClaveExternaEvento` (`idEvento`);

--
-- Indexes for table `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`idGenero`,`idEvento`),
  ADD KEY `Clave Externa Evento` (`idEvento`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`url`(200)),
  ADD KEY `Clave Externa` (`idEvento`);

--
-- Indexes for table `pag_info`
--
ALTER TABLE `pag_info`
  ADD PRIMARY KEY (`idPagina`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `ClaveExternaEvento` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Constraints for table `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD CONSTRAINT `Clave Externa Evento` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `Clave Externa Genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Constraints for table `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `Clave Externa` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
