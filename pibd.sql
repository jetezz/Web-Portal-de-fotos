-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-07-2019 a las 15:54:51
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALBUMES`
--

CREATE TABLE `ALBUMES` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ALBUMES`
--

INSERT INTO `ALBUMES` (`IdAlbum`, `Titulo`, `Descripcion`, `Usuario`) VALUES
(1, 'cine', 'no', 2),
(2, 'navidad', 'no', 1),
(3, 'navidades', 'no', 1),
(4, 'charco', 'no', 1),
(5, 'albumborrar', 'no', 7),
(8, 'albumborrar2', 'no', 10),
(9, 'albumborrar3', 'no', 11),
(10, 'sdfsdf', 'sdfsdf', 3),
(11, 'sdfsdf', 'sdfsdf', 3),
(12, 'sfdd', 'ddddddddddd', 3),
(13, 'Album bonito', 'mu mu bonito', 3),
(14, 'sdas', 'assss', 3),
(15, 'sdas', 'assss', 3),
(16, 'as', 's', 3),
(17, 'a', '', 3),
(18, 'w', 'w', 3),
(26, 'Mi piedra', 'Tus fotos desnuoda en mi piedra', 13),
(30, 'EspaÃ±a', 'que bonito', 1),
(31, 'la noche', 'la noche', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTILOS`
--

CREATE TABLE `ESTILOS` (
  `IdEstilo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Fichero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ESTILOS`
--

INSERT INTO `ESTILOS` (`IdEstilo`, `Nombre`, `Descripcion`, `Fichero`) VALUES
(1, 'clasico', 'Modo clasico de la pagina web', 'clasico.css'),
(2, 'negro', 'Estilo de alto contraste y para daltonicos', 'negro.css');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FOTOS`
--

CREATE TABLE `FOTOS` (
  `IdFoto` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Pais` int(11) NOT NULL,
  `Album` int(11) NOT NULL,
  `Fichero` varchar(100) NOT NULL,
  `Alternativo` varchar(100) NOT NULL,
  `FRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `FOTOS`
--

INSERT INTO `FOTOS` (`IdFoto`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `Alternativo`, `FRegistro`) VALUES
(1, 'la noche', 'no', '2018-11-05', 2, 1, 'foto1.jpg', 'imagen 1', '2018-11-21 00:00:00'),
(2, 'el dia', 'no', '2018-11-05', 1, 2, 'foto3.jpg', 'foto3', '2018-11-13 00:00:00'),
(3, 'El mercadona', 'no', '2018-11-10', 2, 1, 'foto2.jpg', 'imagen 2', '2018-11-21 00:00:00'),
(4, 'Narnia', 'no', '2018-11-25', 1, 2, 'foto4.jpg', 'foto4', '2018-11-10 00:00:00'),
(5, 'El carrefur', 'no', '2018-10-16', 2, 1, 'foto5.jpg', 'imagen 5', '2018-11-10 00:00:00'),
(6, 'El extra', 'no', '2018-10-04', 2, 1, 'foto5.jpg', 'imagen 5', '2018-11-13 00:00:00'),
(7, 'aaaaaaaaaa', 'no', '2018-10-16', 2, 3, 'foto5.jpg', 'imagen 5', '2018-11-10 00:00:00'),
(8, 'eeeeeeeeeeeeee', 'no', '2018-10-04', 2, 4, 'foto5.jpg', 'imagen 5', '2018-11-13 00:00:00'),
(9, 'FotoParaborrar', 'no', '2018-10-04', 2, 5, 'foto5.jpg', 'imagen 5', '2018-11-13 00:00:00'),
(12, 'FotoParaborrar2', 'no', '2018-10-04', 2, 8, 'foto5.jpg', 'imagen 5', '2018-11-13 00:00:00'),
(13, 'FotoParaborrar3', 'no', '2018-10-04', 2, 9, 'foto5.jpg', 'imagen 5', '2018-11-13 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAISES`
--

CREATE TABLE `PAISES` (
  `IdPais` int(11) NOT NULL,
  `NomPais` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PAISES`
--

INSERT INTO `PAISES` (`IdPais`, `NomPais`) VALUES
(2, 'donutpais'),
(3, 'LolaPais'),
(1, 'pepepais');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SEXO`
--

CREATE TABLE `SEXO` (
  `IdSexo` int(11) NOT NULL,
  `NomSex` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `SEXO`
--

INSERT INTO `SEXO` (`IdSexo`, `NomSex`) VALUES
(1, 'Chico'),
(2, 'Chica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SOLICITUDES`
--

CREATE TABLE `SOLICITUDES` (
  `IdSolicitud` int(11) NOT NULL,
  `Album` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Descripcion` varchar(4000) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Copias` int(11) NOT NULL,
  `Resolucion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `IColor` tinyint(1) NOT NULL,
  `FRegistro` datetime NOT NULL,
  `Coste` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `SOLICITUDES`
--

INSERT INTO `SOLICITUDES` (`IdSolicitud`, `Album`, `Nombre`, `Titulo`, `Descripcion`, `Email`, `Direccion`, `Color`, `Copias`, `Resolucion`, `Fecha`, `IColor`, `FRegistro`, `Coste`) VALUES
(1, 1, 'paaco', 'pa pacoo', 'no', 'no', 'no', 'verde', 23, 75, '2018-11-12', 1, '2018-11-20 00:00:00', 555),
(2, 2, 'pa juan', 'pa juan', 'no', 'no', 'no', 'rojo', 2, 500, '2018-11-21', 0, '2018-11-06 00:00:00', 231),
(3, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 22:58:00', 0),
(4, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 22:58:51', 5),
(5, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 22:59:35', 5),
(6, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:00:04', 5),
(7, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:04:57', 5),
(8, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:05:45', 5),
(9, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:06:28', 5),
(10, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:08:34', 5),
(11, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:09:46', 5),
(12, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:10:19', 5),
(13, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:10:34', 5),
(14, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:10:52', 5),
(15, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:11:30', 5),
(16, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:13:35', 5),
(17, 1, 'Asdf123', 'aaaaaa', 'aaaaaaa', 'sdfsdfsdf@sfkgerg.esfse', 'aaaaa NÂº11 Piso12 Puerta12 11111 asda asdasd aaaaaaaaaaa', '#000000', 5, 450, '2018-11-28', 1, '2018-12-04 23:16:22', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `IdUsuario` int(11) NOT NULL,
  `NomUsuario` varchar(15) NOT NULL,
  `Clave` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Sexo` tinyint(4) DEFAULT NULL,
  `FNacimiento` date DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `FRegistro` datetime DEFAULT NULL,
  `Estilo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`, `Estilo`) VALUES
(1, 'pepe2', '1234', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-11-19 00:00:00', 1),
(2, 'donut', '1234', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-11-26 00:00:00', 2),
(3, 'Asdf1234', 'Asdf123', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-12-04 00:17:38', 1),
(4, 'Asdf124', 'Asdf124', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-12-04 00:42:35', 1),
(7, 'EjemBorrar', 'Asdf123', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-12-04 00:42:35', 1),
(10, 'EjemBorrar2', 'Asdf123', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-12-04 00:42:35', 1),
(11, 'EjemBorrar3', 'Asdf123', 'aaaa@asd.gilipollas', 1, '2018-11-30', 'Asdf124', 2, 'perfil1.png', '2018-12-04 00:42:35', 1),
(12, 'Asdf123Asdf123', 'Asdf123', 'aaaa@asd.gilipollas', 1, '2018-11-29', 'Asdf123', 2, 'perfil1.png', '2018-12-04 21:42:20', 1),
(13, 'UsuarioMuyGuapo', 'Asdf1234', 'aaaa@asd.gilipollas', 1, '2018-11-27', 'asasassa', 2, 'perfil1.png', '2018-12-04 21:45:11', 1),
(14, 'relojero', 'Asdf1234', 'relo@a.com', 1, '2018-12-08', 'ALicante', 2, '200px-Reloj_flat.svg.png', '2018-12-14 12:48:49', 1),
(15, 'relojero2', 'Asdf1234', 'relo@a.com', 1, '2018-12-01', 'ALicante', 2, '1200px-Reloj_flat.svg.png', '2018-12-14 12:50:36', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ALBUMES`
--
ALTER TABLE `ALBUMES`
  ADD PRIMARY KEY (`IdAlbum`),
  ADD KEY `ALBUMES_ibfk_1` (`Usuario`);

--
-- Indices de la tabla `ESTILOS`
--
ALTER TABLE `ESTILOS`
  ADD PRIMARY KEY (`IdEstilo`);

--
-- Indices de la tabla `FOTOS`
--
ALTER TABLE `FOTOS`
  ADD PRIMARY KEY (`IdFoto`),
  ADD KEY `FOTOS_ibfk_1` (`Pais`),
  ADD KEY `FOTOS_ibfk_2` (`Album`);

--
-- Indices de la tabla `PAISES`
--
ALTER TABLE `PAISES`
  ADD PRIMARY KEY (`IdPais`),
  ADD KEY `NomPais` (`NomPais`);

--
-- Indices de la tabla `SEXO`
--
ALTER TABLE `SEXO`
  ADD PRIMARY KEY (`IdSexo`);

--
-- Indices de la tabla `SOLICITUDES`
--
ALTER TABLE `SOLICITUDES`
  ADD PRIMARY KEY (`IdSolicitud`),
  ADD KEY `Album` (`Album`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NomUsuario` (`NomUsuario`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `USUARIOS_ibfk_2` (`Estilo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ALBUMES`
--
ALTER TABLE `ALBUMES`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ESTILOS`
--
ALTER TABLE `ESTILOS`
  MODIFY `IdEstilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `FOTOS`
--
ALTER TABLE `FOTOS`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `PAISES`
--
ALTER TABLE `PAISES`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `SEXO`
--
ALTER TABLE `SEXO`
  MODIFY `IdSexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `SOLICITUDES`
--
ALTER TABLE `SOLICITUDES`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ALBUMES`
--
ALTER TABLE `ALBUMES`
  ADD CONSTRAINT `ALBUMES_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`IdUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `FOTOS`
--
ALTER TABLE `FOTOS`
  ADD CONSTRAINT `FOTOS_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `PAISES` (`IdPais`) ON DELETE CASCADE,
  ADD CONSTRAINT `FOTOS_ibfk_2` FOREIGN KEY (`Album`) REFERENCES `ALBUMES` (`IdAlbum`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SOLICITUDES`
--
ALTER TABLE `SOLICITUDES`
  ADD CONSTRAINT `SOLICITUDES_ibfk_1` FOREIGN KEY (`Album`) REFERENCES `ALBUMES` (`IdAlbum`);

--
-- Filtros para la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD CONSTRAINT `USUARIOS_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `PAISES` (`IdPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USUARIOS_ibfk_2` FOREIGN KEY (`Estilo`) REFERENCES `ESTILOS` (`IdEstilo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
