-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2016 a las 16:50:35
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
  `Descripcion` varchar(200) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`IDmascota`, `Nombre`, `Especie`, `Raza`, `Nacimiento`, `Descripcion`, `Imagen`, `IDusuario`) VALUES
(1, 'Mordiscos', 'Rata', 'Laboratorio', '0000-00-00', '', '', 1),
(2, 'Pelito', 'Caballo', 'Mustang', '0000-00-00', '', '', 5),
(3, 'Sora', 'Gato', 'Comun', '0000-00-00', '', '', 2),
(4, 'Chipichapi', 'Huron', '', '0000-00-00', '', '', 3),
(5, 'Nemo', 'Pez', 'Pez payaso', '0000-00-00', '', '', 4);

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
  `Contenido` varchar(500) DEFAULT NULL,
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
  `Titulo` varchar(35) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Etiqueta1` int(11) DEFAULT NULL,
  `Etiqueta2` int(11) DEFAULT NULL,
  `Etiqueta3` int(11) DEFAULT NULL,
  `Etiqueta4` int(11) DEFAULT NULL,
  `Etiqueta5` int(11) DEFAULT NULL,
  `Likes` int(11) NOT NULL,
  `IDusuario` int(11) unsigned NOT NULL,
  PRIMARY KEY (`IDpost`),
  KEY `Titulo` (`Titulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`IDpost`, `Titulo`, `Fecha`, `Descripcion`, `Etiqueta1`, `Etiqueta2`, `Etiqueta3`, `Etiqueta4`, `Etiqueta5`, `Likes`, `IDusuario`) VALUES
(1, 'Cuidado de hurones', '2016-05-12', 'Blablabla, chipipchop', 5, 2, 0, 0, 0, 2, 3),
(2, 'Vacunacion hurones', '2016-05-10', 'pompompom pom', 5, 4, 6, 0, 0, 12, 3),
(3, 'Peces asesinos', '2016-05-11', 'Pis peces pe pomen pentre pellos.', 2, 7, 8, 0, 0, 80, 4),
(4, 'Otro post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(5, 'super post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(6, ' mega post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(7, 'ultra post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(8, 'master post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(9, 'poke post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4),
(10, 'grande post', '2016-05-11', 'Descripcion del post', 2, 7, 8, 0, 0, 60, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `IDpublicacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) DEFAULT NULL,
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
(1, 'Mira mi gata que guapaaa.', '2016-05-12', 'assets\\publicaciones-images\\publi1.jpg', 800, 3),
(2, 'Mi rata se ha comido la casa.', '2016-05-12', 'assets\\publicaciones-images\\publi2.jpg', 900, 1),
(3, 'Chipi despues de un baño', '2016-05-12', 'assets\\publicaciones-images\\publi3.jpg', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salt`
--

CREATE TABLE IF NOT EXISTS `salt` (
  `IDusuario` int(11) NOT NULL,
  `Salt` int(11) NOT NULL,
  PRIMARY KEY (`IDusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDusuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nick` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Rol` varchar(10) NOT NULL,
  `CP` int(11) NOT NULL,
  `Nombre` varchar(35) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Ocupacion` varchar(20) DEFAULT NULL,
  `Web` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Imagen` varchar(150) NOT NULL,
  PRIMARY KEY (`IDusuario`),
  UNIQUE KEY `Nick` (`Nick`,`Email`),
  KEY `Nick_2` (`Nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `Nick`, `Password`, `Email`, `Rol`, `CP`, `Nombre`, `Direccion`, `Telefono`, `Ocupacion`, `Web`, `Descripcion`, `Imagen`) VALUES
(1, 'alseether', '1234567', 'alvlazar@ucm.es', 'User', 40003, '', '', 555479412, '', '', '', 'assets\\profile-images\\alvaro.jpg'),
(2, 'Pau', '87654321', 'paulaill@ucm.es', 'User', 28012, '', '', 614789457, '', '', '', 'assets\\profile-images\\paula.jpg'),
(3, 'Zapi', 'sapito', 'dzapi01@ucm.es', 'Premium', 13003, '', '', 54791274, '', '', '', 'assets\\profile-images\\zapi.jpg'),
(4, 'Julito', 'julito', 'julioa02@ucm.es', 'Premium', 145872, '', '', 2654621, '', '', '', 'assets\\profile-images\\julio.jpg'),
(5, 'Cr', 'pelaso', 'crvazque@ucm.es', 'Admin', 457896, '', '', 45549885, '', '', '', 'assets\\profile-images\\cristian.jpg'),
(6, 'root', 'toor', 'holamundo@mail.com', 'Admin', 0, '', '', 0, '', '', '', 'assets\\profile-images\\default.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
