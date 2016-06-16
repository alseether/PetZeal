-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2016 a las 20:14:24
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `petzeal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `IDcomentario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Descripcion` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `IDmascota` int(11) unsigned DEFAULT NULL,
  `IDespecialista` int(11) unsigned DEFAULT NULL,
  `IDpost` int(11) unsigned NOT NULL,
  PRIMARY KEY (`IDcomentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`IDcomentario`, `Fecha`, `Descripcion`, `IDmascota`, `IDespecialista`, `IDpost`) VALUES
(1, '2016-05-12', 'Pero la caca no huele mucho?', 3, 0, 1),
(2, '2016-05-12', 'No me gusta tu post, no habla de peces.', 0, 4, 1),
(3, '2016-05-12', 'Puedo alimentar a mi rata con peces?', 1, 0, 3),
(4, '2016-05-12', 'Si sigues posteando asi te baneo.', 0, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `IDetiqueta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Etiqueta` varchar(35) NOT NULL,
  `Usos` int(11) NOT NULL,
  PRIMARY KEY (`IDetiqueta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`IDetiqueta`, `Etiqueta`, `Usos`) VALUES
(1, 'alimentacion', 0),
(2, 'cuidados', 2),
(3, 'productos', 0),
(4, 'salud', 1),
(5, 'huron', 1),
(6, 'vacunas', 1),
(7, 'peces', 1),
(8, 'muerte', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE IF NOT EXISTS `mascotas` (
  `IDmascota` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) NOT NULL,
  `Especie` varchar(15) NOT NULL,
  `Raza` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Imagen` varchar(150) NOT NULL,
  `IDusuario` int(11) unsigned NOT NULL,
  PRIMARY KEY (`IDmascota`),
  KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`IDmascota`, `Nombre`, `Especie`, `Raza`, `Nacimiento`, `Descripcion`, `Imagen`, `IDusuario`) VALUES
(1, 'Mordiscos', 'Rata', 'Laboratorio', '0000-00-00', '', 'assets\\pets-images\\alseether-Mordiscos.jpg', 1),
(2, 'Pelito', 'Caballo', 'Mustang', '0000-00-00', '', 'assets\\pets-images\\Cr-Pelito.jpg', 5),
(3, 'Sora', 'Gato', 'Comun', '0000-00-00', '', 'assets/pets-images/3', 2),
(4, 'Chipichapi', 'Huron', '', '0000-00-00', '', 'assets\\pets-images\\default.jpg', 3),
(5, 'Nemo', 'Pez', 'Pez payaso', '0000-00-00', '', 'assets\\pets-images\\Julito-Nemo.jpg', 4),
(9, 'hola', 'anfibio', 'ajkkakak', '0001-11-01', 'dfsdgvdsgvef', 'assets/profile-images/9', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `IDmensaje` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `IDemisor` int(11) unsigned NOT NULL,
  `IDreceptor` int(11) unsigned NOT NULL,
  `Asunto` varchar(35) NOT NULL,
  `Fecha` date NOT NULL,
  `Contenido` mediumtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Leido` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`IDmensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`IDmensaje`, `IDemisor`, `IDreceptor`, `Asunto`, `Fecha`, `Contenido`, `Leido`) VALUES
(1, 1, 3, 'Lo que te de la gana', '2016-05-12', 'Perfecto.', 0),
(2, 2, 1, 'Como se parece mi huron a tu rata', '2016-05-12', 'Flipas', 1),
(3, 1, 2, 'Ya ves', '2016-05-12', 'No veas', 1),
(4, 4, 5, 'Hola', '2016-05-12', 'Caracola', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `IDpost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(35) CHARACTER SET utf8 NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Etiqueta1` int(11) DEFAULT NULL,
  `Etiqueta2` int(11) DEFAULT NULL,
  `Etiqueta3` int(11) DEFAULT NULL,
  `Etiqueta4` int(11) DEFAULT NULL,
  `Etiqueta5` int(11) DEFAULT NULL,
  `Likes` int(11) NOT NULL,
  `IDusuario` int(11) unsigned NOT NULL,
  PRIMARY KEY (`IDpost`),
  KEY `Titulo` (`Titulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`IDpost`, `Titulo`, `Fecha`, `Descripcion`, `Etiqueta1`, `Etiqueta2`, `Etiqueta3`, `Etiqueta4`, `Etiqueta5`, `Likes`, `IDusuario`) VALUES
(1, 'Cuidado de hurones', '2016-05-12', 'Blablabla, chipipchop', 5, 2, 0, 0, 0, 2, 3),
(2, 'Vacunacion hurones', '2016-05-10', 'pompompom pom', 5, 4, 6, 0, 0, 12, 3),
(3, 'Peces asesinos', '2016-05-11', 'Pis peces pe pomen pentre pellos.', 2, 7, 8, 0, 0, 80, 4),
(4, 'Otro post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 3),
(5, 'super post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(6, ' mega post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(7, 'ultra post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(8, 'master post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(9, 'poke post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(10, 'grande post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(11, 'Cuidado de los animales', '2016-05-02', 'Los niños pequeños se sienten atraídos por las cosas que son suaves y tiernas. Esto suele atenderse proporcionándoles juguetes de peluche, libros ilustrados e incluso programas de televisión que presenten animales lindos y deseables. Sin embargo, existe una gran diferencia entre una foto o un peluche y una mascota. Los animales son seres vivos y necesitan cuidados para asegurarse de que están obteniendo una alimentación adecuada y el ejercicio necesario. Ellos también se cansan e irritan al igual que los niños y necesitan aseo y limpieza después de que hacen sus necesidades\n\nExisten, sin embargo, buenas razones para involucrar a los animales en la vida de un niño. El cuidado de un animal puede ayudarlo a comprender que los animales tienen necesidades similares a las suyas, desarrollando la empatía, la tolerancia y el respeto que puede transferir a otros seres vivos. Además, existe evidencia de que tener una mascota puede reducir el estrés en las personas de todas las edades; los perros tienen el beneficio adicional de necesitar el ejercicio regular, lo que trae beneficios de salud para el niño y los padres.', 5, 4, 6, 0, 0, 12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `IDpublicacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` mediumtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Fecha` date NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `Likes` int(11) NOT NULL,
  `IDmascota` int(11) unsigned NOT NULL,
  PRIMARY KEY (`IDpublicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`IDpublicacion`, `Descripcion`, `Fecha`, `Imagen`, `Likes`, `IDmascota`) VALUES
(1, 'Hola caracola', '2016-06-01', 'assets/publicaciones-images/1', 0, 3),
(2, 'Adios', '2016-06-17', 'assets/publicaciones-images/2', 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salt`
--

CREATE TABLE IF NOT EXISTS `salt` (
  `IDusuario` int(11) NOT NULL,
  `Salt` varchar(12) NOT NULL,
  PRIMARY KEY (`IDusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salt`
--

INSERT INTO `salt` (`IDusuario`, `Salt`) VALUES
(1, 'MmLpG5Bm(c1L'),
(2, '0qICDq8FS(4d'),
(3, 'g-tcLpb2T41O'),
(4, 'F6WIXAgsbm3g'),
(5, 'qGy::ljaXcac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDusuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nick` varchar(15) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Rol` varchar(10) NOT NULL,
  `CP` int(11) NOT NULL,
  `Nombre` varchar(35) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Ocupacion` varchar(20) DEFAULT NULL,
  `Web` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Imagen` varchar(150) NOT NULL,
  PRIMARY KEY (`IDusuario`),
  UNIQUE KEY `Nick` (`Nick`,`Email`),
  KEY `Nick_2` (`Nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `Nick`, `Password`, `Email`, `Rol`, `CP`, `Nombre`, `Direccion`, `Telefono`, `Ocupacion`, `Web`, `Descripcion`, `Imagen`) VALUES
(1, 'julio', '337e10e4b03d5d099735a3fa603ec11765c4c53f702f2495092358e0b5b320d1', 'julioa02@ucm.es', 'User', 12345, '', '', 0, '', '', '', ''),
(2, 'zapi', '9a2ead972275f33be4e9570f75c45f499b2cd828b4d7461fe2460df4f9350b4e', 'dzapi01@ucm.es', 'User', 1234, '', '', 0, '', '', '', ''),
(3, 'paula', '', 'pauill@ucm.es', 'Premium', 1234, 'paula', 'Calle del gato montes', 654987321, 'Cuidadora de gatos', '', 'Puedo ocuparme de su gato cuando usted desee y no tenga con quien dejarlo. Me encargo de la comida, ', 'assets/profile-images/3'),
(4, 'alvaro', '5dc36d66fce95a58297de819936f38276e3f3e1c511872dfc5801bb76e846a54', 'alvlazar@ucm.es', 'User', 1234, '', '', 0, '', '', '', ''),
(5, 'cr', 'abd23350da0c81a475412ea2dfbd5ce65eb8721b21ba0f8b78c70e850734fc5c', 'crvazque@ucm.es', 'User', 12345, 'Cristian', '', 0, '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
