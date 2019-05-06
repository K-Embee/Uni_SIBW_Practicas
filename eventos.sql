-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2019 a las 21:13:35
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

--
-- Volcado de datos para la tabla `censura`
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `texto` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idEvento`, `ip`, `nombre`, `correo`, `fecha_hora`, `texto`) VALUES
(1, 'detective_pikachu', '', 'Admin', 'admin@correo.ugr', '2019-04-17 22:40:30', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(2, 'aladdin', '', 'Admin', 'admin@correo.com', '2019-04-17 22:39:32', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(3, 'espia', '', 'Admin', 'admin@correo.ugr', '2019-04-17 22:40:30', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(4, 'hys', '', 'Admin', 'admin@correo.com', '2019-04-17 22:42:04', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(5, 'men_in_black', '', 'Admin', 'admin@correo.ugr', '2019-04-17 22:42:04', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(6, 'rey_leon', '', 'Admin', 'admin@correo.com', '2019-04-17 22:43:21', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(7, 'spiderman', '', 'Admin', 'admin@correo.com', '2019-04-17 22:43:21', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(8, 'toy_story', '', 'Admin', 'admin@correo.com', '2019-04-17 22:44:22', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(9, 'vengadores', '', 'Admin', 'admin@correo.com', '2019-04-17 22:44:22', 'No se permiten comentarios ofensivos ni discusiones políticas'),
(10, 'vengadores', '::1', 'usuario', 'usuario@usuario.com', '2019-05-02 20:14:38', 'me ha gustado muchisimo, la recomiendo'),
(11, 'detective_pikachu', '::1', 'usuario', 'usuario@usuario.com', '2019-05-02 20:15:13', '¿Como es tan mono pikachu y a sonic lo han hecho tan horrible?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `idGenero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`idGenero`, `idEvento`) VALUES
('accion', 'detective_pikachu'),
('accion', 'hys'),
('accion', 'men_in_black'),
('accion', 'vengadores'),
('animacion', 'toy_story'),
('aventura', 'aladdin'),
('aventura', 'detective_pikachu'),
('aventura', 'hys'),
('aventura', 'rey_leon'),
('aventura', 'spiderman'),
('aventura', 'toy_story'),
('biografica', 'espia'),
('ciencia_ficcion', 'men_in_black'),
('ciencia_ficcion', 'vengadores'),
('comedia', 'men_in_black'),
('comedia', 'rey_leon'),
('comedia', 'toy_story'),
('drama', 'espia'),
('drama', 'rey_leon'),
('espionaje', 'espia'),
('fantasia', 'aladdin'),
('musical', 'aladdin'),
('romance', 'aladdin'),
('romance', 'toy_story'),
('superheroes', 'spiderman'),
('superheroes', 'vengadores'),
('suspense', 'espia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `eventoNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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

INSERT INTO `evento` (`idEvento`, `eventoNombre`, `estudios`, `distribuidora`, `fechaEstreno`, `descripcion`, `enlace_twitter`, `enlace_fb`, `fecha_creacion`, `fecha_ultima_mod`) VALUES
('aladdin', 'Aladdin', 'Walt Disney Pictures', 'Walt Disney Studios Motion Pictures', '2019-05-24', 'Una apasionante adaptación en imagen real del clásico animado de Disney. «Aladdín» es la fascinante historia de Aladdín, un encantador ladronzuelo callejero, Jasmine, una princesa valiente e independiente, y el Genio, que puede ser la clave para el futuro de ambos.', 'https://twitter.com/disneyaladdin?lang=es', 'https://es-la.facebook.com/DisneyAladdin/', '2019-04-04', '2019-04-04'),
('detective_pikachu', 'Detective Pikachu', 'Legendary Pictures', 'Warner Bros. Pictures', '2019-05-17', 'Tim Goodman llega a Ryme City para investigar la misteriosa desaparición de su padre en la ciudad. En el camino,\r\n				 se encuentra con un Pikachu que habla, aunque en realidad solo él es el único que puede entenderlo. Ambos trabajarán\r\n				  juntos para resolver este gran enigma junto a la reportera Kathryn Newton con su Psyduck.', 'https://twitter.com/DetPikachuMovie', 'https://www.facebook.com/detectivepikachumovie/', '2019-04-02', '2019-05-06'),
('espia', 'La espía roja', 'Trademark Films', 'Vértice', '2019-04-18', 'Es el año 2000 y Joan Stanley (Judi Dench) disfruta de su retiro en un barrio residencial durante el cambio de milenio. Su apacible vida se ve súbitamente trastornada cuando es arrestada por el MI5, el Servicio de Inteligencia británico, acusada de proporcionar información a la Rusia comunista, y por ser la espía más longeva del KGB en territorio británico.\r\n\r\nPasamos a 1938, cuando Joan (Sophie Cookson) es una estudiante de física en Cambridge que se enamora de Leo Galich (Tom Hughes), un joven comunista que le hace cambiar su percepción del mundo. Mientras trabaja en un laboratorio secreto nuclear durante la Segunda Guerra Mundial, Joan llega a la conclusión de que el mundo está al borde de una destrucción garantizada. Joan deberá entonces elegir entre traicionar a su país y a sus seres queridos o tratar de salvarlos.', 'https://twitter.com/vertice360_cine', 'https://www.facebook.com/vertice360.cine/', '2019-04-10', '2019-04-10'),
('hys', 'Fast & Furious Hobbs & Shaw', 'Universal Pictures', 'Universal Pictures', '2019-08-02', 'Luke Hobbs (Dwayne Johnson) y Deckard Shaw (Jason Statham) vuelven a la carga para vivir una nueva aventura en la que ellos dos serán los protagonistas absolutos. Su rivalidad y la gran química entre estos dos personajes del universo Fast & Furious serán la clave de esta nueva historia en la que deberán trabajar juntos si quieren pararle los pies al villano Brixton (Idris Elba). Además, a la pareja de protagonistas se les unirá un nuevo personaje, Hattie (Vanessa Kirby), la hermana de Shaw.\r\n', 'https://twitter.com/hobbsandshaw', 'https://www.facebook.com/HobbsAndShaw/', '2019-04-10', '2019-04-10'),
('men_in_black', 'Men In Black: International', 'Columbia Pictures', 'Sony Pictures Releasing', '2019-06-14', 'Relanzamiento de la franquicia en la que no estarán Will Smith y Tommy Lee Jones y que expandirá el universo de \'Men in Black\'. Siempre han estado protegiendo la tierra de la basura del universo, en esta nueva aventura, los Men in Black tendrán que enfrentarse a la mayor amenaza por el momento: un topo dentro de la organización. Al equipo se unirá la Agente M, trabajando junto con el Agente H.', 'https://twitter.com/meninblack', 'https://www.facebook.com/meninblack/', '2019-04-10', '2019-04-10'),
('rey_leon', 'El Rey León', 'Walt Disney Pictures', 'Walt Disney Studios Motion Pictures', '2019-07-26', 'Remake de \"El Rey León\", dirigido y producido por Jon Favreau, responsable de la puesta al día con el mismo formato de \"El libro de la selva\" (2016).\r\nLa sabana africana es el escenario en el que tienen lugar las aventuras de Simba, un pequeño león que es el heredero del trono. Sin embargo, al ser injustamente acusado por el malvado Scar de la muerte de su padre, se ve obligado a exiliarse. Durante su destierro, hará buenas amistades e intentará regresar para recuperar lo que legítimamente le corresponde', 'https://twitter.com/disneylionking', 'https://www.facebook.com/DisneyTheLionKing/', '2019-04-10', '2019-04-10'),
('spiderman', 'Spiderman: Far From Home', 'Marvel Studios', 'Sony Pictures Releasing', '2019-07-05', 'La película empieza después de los eventos de Avengers: Endgame,​ cuando Peter Parker va en un viaje escolar a Europa con sus amigos. Mientras que está en el extranjero, es obligado a unirse a Mysterio y así detener a los Elementales, unos extraños enemigos que nadie sabe de dónde vienen.', 'https://twitter.com/spidermanmovie', 'https://es-la.facebook.com/MarvelStudiosSpiderMan/', '2019-04-04', '2019-04-04'),
('toy_story', 'Toy Story 4', 'Walt Disney Pictures', 'Walt Disney Studios\r\nMotion Pictures', '2019-06-21', 'Woody siempre ha sabido cuál es su lugar en el mundo, y que su prioridad es cuidar de su dueño, ya sea Bonnie o Andy, pero cuando Bonnie agrega un juguete nuevo y reacio llamado Forky a su dormitorio, una aventura junto a viejos y nuevos amigos le mostrarán a Woody qué tan grande puede ser el mundo para un juguete. En el camino, Woody se reúne inesperadamente con Betty.', 'https://twitter.com/toystory', 'https://es-es.facebook.com/PixarToyStory/', '2019-04-04', '2019-04-04'),
('vengadores', 'Vengadores: Endgame', 'Marvel Estudios', 'Walt Disney Studios Motion Pictures', '2019-05-20', 'Tras los eventos de Avengers: Infinity War, la mitad de toda la vida en el universo ha sido asesinada en un evento denominado \"La decimación\". Con el universo sobreviviente en ruinas, los Vengadores y los Guardianes de la Galaxia restantes tratan de recuperarse de su fuerte derrota a manos del malvado Titan y deberán volver a unirse una vez más para reparar el daño causado por Thanos y restaurar la armonía en el universo.', 'https://twitter.com/avengers', 'https://www.facebook.com/avengersendg4me/', '2019-04-04', '2019-05-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
('accion', 'Acción'),
('animacion', 'Animación'),
('aventura', 'Aventura'),
('biografica', 'Biográfica'),
('ciencia_ficcion', 'Ciencia ficción'),
('comedia', 'Comedia'),
('drama', 'Drama'),
('espionaje', 'Espionaje'),
('fantasia', 'Fantasía'),
('musical', 'Musical'),
('romance', 'Romance'),
('superheroes', 'Superhéroes'),
('suspense', 'Suspense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `url` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`url`, `idEvento`, `descripcion`) VALUES
('./imgs/aladdin/2019vs1992.jpg', 'aladdin', 'principe ali'),
('./imgs/aladdin/charlando.jpg', 'aladdin', 'charlando'),
('./imgs/aladdin/Jafar.jpg', 'aladdin', 'Jafar'),
('./imgs/aladdin/Jasmin.png', 'aladdin', 'Jasmin'),
('./imgs/aladdin/mono.jpg', 'aladdin', 'Abú'),
('./imgs/aladdin/portada.jpg', 'aladdin', 'Portada'),
('./imgs/aladdin/poster.jpeg', 'aladdin', 'Poster'),
('./imgs/detective_pikachu/2Pikachushablan.jpg', 'detective_pikachu', 'pika pi habla con pika pi'),
('./imgs/detective_pikachu/DP.jpg', 'detective_pikachu', 'pika pi'),
('./imgs/detective_pikachu/Mewtwo.png', 'detective_pikachu', 'Mewtwo'),
('./imgs/detective_pikachu/pikachu.jpg', 'detective_pikachu', 'pika chuuuuuuuuuu'),
('./imgs/detective_pikachu/portada.jpg', 'detective_pikachu', 'pika pi'),
('./imgs/detective_pikachu/poster.jpg', 'detective_pikachu', 'Poster'),
('./imgs/detective_pikachu/Real3D.jpg', 'detective_pikachu', 'poster Real3D'),
('./imgs/espia/portada.jpg', 'espia', 'Portada'),
('./imgs/hys/portada.jpg', 'hys', 'Portada'),
('./imgs/men_in_black/portada.jpg', 'men_in_black', 'Portada'),
('./imgs/rey_leon/portada.jpg', 'rey_leon', 'Portada'),
('./imgs/spiderman/actor.jpg', 'spiderman', 'Actor principal'),
('./imgs/spiderman/arania.jpg', 'spiderman', 'Araña'),
('./imgs/spiderman/portada.jpg', 'spiderman', 'Portada'),
('./imgs/spiderman/poster.png', 'spiderman', 'Poster'),
('./imgs/spiderman/traje.jpg', 'spiderman', 'Traje de la película'),
('./imgs/spiderman/Zendaya.jpg', 'spiderman', 'Zendaya'),
('./imgs/toy_story/bopeep.jpg', 'toy_story', 'Bo Peep y Woody'),
('./imgs/toy_story/buddy.jpg', 'toy_story', 'Woddy'),
('./imgs/toy_story/buzz.jpg', 'toy_story', 'Buzz Lightyear'),
('./imgs/toy_story/cartel.jpg', 'toy_story', 'Cartel'),
('./imgs/toy_story/feria.jpg', 'toy_story', 'Feria'),
('./imgs/toy_story/muypronto.JPG', 'toy_story', 'Bo Peep'),
('./imgs/toy_story/peluches.jpg', 'toy_story', 'Peluches'),
('./imgs/toy_story/portada.jpg', 'toy_story', 'Portada'),
('./imgs/toy_story/poster.jpg', 'toy_story', 'Poster'),
('./imgs/vengadores/China.jpg', 'vengadores', 'Poster China'),
('./imgs/vengadores/DolbyCinema.jpg', 'vengadores', 'Poster DolbyCinema'),
('./imgs/vengadores/IMAX.jpg', 'vengadores', 'Poster IMAX'),
('./imgs/vengadores/INREAL3D.jpg', 'vengadores', 'Poster InReal3D'),
('./imgs/vengadores/portada.jpg', 'vengadores', 'Portada'),
('./imgs/vengadores/Posters.jpg', 'vengadores', 'Poster de los personajers'),
('./imgs/vengadores/Rusia.jpg', 'vengadores', 'Cartel Rusia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_info`
--

CREATE TABLE `pag_info` (
  `idPagina` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pag_info`
--

INSERT INTO `pag_info` (`idPagina`, `texto`, `titulo`) VALUES
('contacto', 'Kieran - bla bla bla\r\nMonica - bla bla bla\r\nLorem Ipsum', 'Datos de Contacto'),
('legal', 'Información legal y de copyright\r\nAlgo algo Disney©®™\r\nLorem Ipsum', 'Información Legal');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL,
  `idRol` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `idRol`) VALUES
(0, 'gestor'),
(0, 'moderador'),
(0, 'superusuario'),
(0, 'usuario');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombreRol` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
('gestor', 'Gestor del sitio'),
('moderador', 'Moderador'),
('superusuario', 'Superusuario'),
('usuario', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idUsuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idRol` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `email`, `contraseña`, `idUsuario`, `idRol`) VALUES
('Pikachu', 'pika@chu.com', '$2y$10$D0c8jkDctPNkMQXQlDjQ0eNWCKGB8Tz9Nbzs8wER9DroNMF.cFEQe', 'pikapi98', 'superusuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idEvento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`url`, `idEvento`) VALUES
('https://www.youtube.com/embed/lU_JXyQ338M', 'aladdin'),
('https://www.youtube.com/embed/1roy4o4tqQM', 'detective_pikachu'),
('https://www.youtube.com/embed/bILE5BEyhdo&t=2s', 'detective_pikachu'),
('https://www.youtube.com/embed/icxPeM19V8s', 'espia'),
('https://www.youtube.com/embed/fXX186Cxpyg', 'hys'),
('https://www.youtube.com/embed/7pehS-Wg6R8', 'men_in_black'),
('https://www.youtube.com/embed/mb79ctR-E-c', 'rey_leon'),
('https://www.youtube.com/embed/raQQmdoQMyc', 'spiderman'),
('https://www.youtube.com/embed/hnl5hQaMpks', 'toy_story'),
('https://www.youtube.com/embed/svLSGZkTzC0', 'vengadores'),
('https://www.youtube.com/embed/UQ3bqYKnyhM', 'vengadores');

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
  ADD PRIMARY KEY (`idGenero`,`idEvento`),
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
  ADD PRIMARY KEY (`idGenero`);

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
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`url`),
  ADD KEY `Clave Externa video` (`idEvento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `Clave Externa Genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `Clave Externa` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
  
--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Clave Externa rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `Clave Externa video` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
