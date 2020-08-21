-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2020 a las 02:22:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcrm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `Cod_ate` int(11) NOT NULL,
  `Cod_fk_can` int(11) DEFAULT NULL,
  `Cod_fk_repo1` int(11) NOT NULL,
  `Tiempo_ate` datetime DEFAULT current_timestamp(),
  `Estado_ate` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`Cod_ate`, `Cod_fk_can`, `Cod_fk_repo1`, `Tiempo_ate`, `Estado_ate`) VALUES
(1, 1, 1, '2020-08-04 16:17:27', 1),
(2, NULL, 2, '2020-08-04 19:02:22', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `Cod_cam` int(11) NOT NULL,
  `Usuario_cam` int(11) NOT NULL,
  `Campo_cam` varchar(50) NOT NULL,
  `Vieja_cam` text DEFAULT NULL,
  `Nueva_cam` text NOT NULL,
  `registro_cam` datetime NOT NULL,
  `Accion_cam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

CREATE TABLE `canalizacion` (
  `Cod_can` int(11) NOT NULL,
  `Cod_fk_usr1` int(11) NOT NULL,
  `Cod_fk_dep2` int(11) NOT NULL,
  `captura` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`Cod_can`, `Cod_fk_usr1`, `Cod_fk_dep2`, `captura`) VALUES
(1, 2, 1, '2020-08-04 21:18:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cod_clnt` int(11) NOT NULL,
  `Email_clnt` varchar(100) NOT NULL,
  `Celular_clnt` int(11) NOT NULL,
  `Nombre_clnt` varchar(100) NOT NULL,
  `Apellidop_clnt` varchar(100) NOT NULL,
  `Apellidom_clnt` varchar(100) NOT NULL,
  `Direccion_clnt` varchar(100) NOT NULL,
  `Ciudad_clnt` varchar(100) NOT NULL,
  `CP_clnt` int(5) NOT NULL,
  `Cod_fk_resp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `Cod_cont` int(11) NOT NULL,
  `Cod_fk_clnt` int(11) NOT NULL,
  `nota_cont` text DEFAULT NULL,
  `Total_cont` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `Cod_cuest` int(11) NOT NULL,
  `Nombre_cuest` varchar(100) NOT NULL,
  `Detalle_cuest` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`Cod_cuest`, `Nombre_cuest`, `Detalle_cuest`) VALUES
(1, 'gustos', 'saver los gustos de las personas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Cod_dep` int(11) NOT NULL,
  `Nombre_dep` varchar(50) NOT NULL,
  `Descripcion_dep` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Cod_dep`, `Nombre_dep`, `Descripcion_dep`) VALUES
(1, 'Desarollo', 'programar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cont`
--

CREATE TABLE `detalle_cont` (
  `Cod_dc` int(11) NOT NULL,
  `Cod_fk_ser` int(11) NOT NULL,
  `observasion_dc` text DEFAULT NULL,
  `Cod_fk_cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hiloreporte`
--

CREATE TABLE `hiloreporte` (
  `Cod_hr` int(11) NOT NULL,
  `Cod_fk_repo2` int(11) NOT NULL,
  `Cod_fk_mnsj` int(11) NOT NULL,
  `Tiempo_hr` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hiloreporte`
--

INSERT INTO `hiloreporte` (`Cod_hr`, `Cod_fk_repo2`, `Cod_fk_mnsj`, `Tiempo_hr`) VALUES
(1, 1, 1, '2020-08-04 16:18:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `Cod_mnsj` int(11) NOT NULL,
  `Cod_fk_usr3` int(11) NOT NULL,
  `Comentario_mnsj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`Cod_mnsj`, `Cod_fk_usr3`, `Comentario_mnsj`) VALUES
(1, 2, 'es necesario cachearla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Cod_perm` int(11) NOT NULL,
  `Nombre_perm` varchar(50) NOT NULL,
  `Descrpcion_perm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`Cod_perm`, `Nombre_perm`, `Descrpcion_perm`) VALUES
(1, 'Alto', 'Usario que mantiene el control del sistema'),
(2, 'Medio', 'Usuario que puede ver el estado de la informacion'),
(3, 'Bajo', 'Usuario que puede verificar reportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Cod_prsn` int(11) NOT NULL,
  `Nombre_prsn` varchar(100) NOT NULL,
  `Nacimiento_prsn` date NOT NULL,
  `Celular_prsn` int(11) NOT NULL,
  `Correo_prsn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Cod_prsn`, `Nombre_prsn`, `Nacimiento_prsn`, `Celular_prsn`, `Correo_prsn`) VALUES
(1, 'josue', '1998-08-29', 2147483647, 'a20170094@utem.edu.mx'),
(2, 'medrano', '2020-08-04', 314666999, 'magico@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `Cod_prsnl` int(11) NOT NULL,
  `Cod_fk_pues` int(11) NOT NULL,
  `Cod_fk_prsn` int(11) NOT NULL,
  `Cod_fk_usr2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Cod_prsnl`, `Cod_fk_pues`, `Cod_fk_prsn`, `Cod_fk_usr2`) VALUES
(2, 1, 1, 1),
(3, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `Cod_preg` int(11) NOT NULL,
  `Cod_fk_cuest1` int(11) NOT NULL,
  `Pregunta_preg` text NOT NULL,
  `Tipo_preg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`Cod_preg`, `Cod_fk_cuest1`, `Pregunta_preg`, `Tipo_preg`) VALUES
(1, 1, 'color favorito', 1),
(2, 1, 'cual es tu banda favorita', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `Cod_pues` int(11) NOT NULL,
  `Cod_fk_dep1` int(11) NOT NULL,
  `Nombre_pues` varchar(50) NOT NULL,
  `Descripcion_pues` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`Cod_pues`, `Cod_fk_dep1`, `Nombre_pues`, `Descripcion_pues`) VALUES
(1, 1, 'programador junior', 'programador inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Cod_repo` int(11) NOT NULL,
  `Detalle_repo` text NOT NULL,
  `Contrato_repo` int(11) NOT NULL,
  `captura_repo` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Cod_repo`, `Detalle_repo`, `Contrato_repo`, `captura_repo`) VALUES
(1, 'fallo en mi pc ', 33, '2020-08-04 21:17:27'),
(2, 'fallo en el servidor 42', 42, '2020-08-05 00:02:22');

--
-- Disparadores `reportes`
--
DELIMITER $$
CREATE TRIGGER `MiTabla_BU` AFTER INSERT ON `reportes` FOR EACH ROW begin
                    insert into atencion (Cod_fk_repo1,Tiempo_ate) values(NEW.Cod_repo, NEW.captura_repo);
    end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respsel_preguntas`
--

CREATE TABLE `respsel_preguntas` (
  `Cod_rsp` int(11) NOT NULL,
  `Cod_fk_preg1` int(11) NOT NULL,
  `Respuesta_rsp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respsel_preguntas`
--

INSERT INTO `respsel_preguntas` (`Cod_rsp`, `Cod_fk_preg1`, `Respuesta_rsp`) VALUES
(1, 1, 'rojo'),
(2, 1, 'azul'),
(3, 1, 'rosa'),
(4, 1, 'morado'),
(5, 1, 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_preg`
--

CREATE TABLE `resultado_preg` (
  `Cod_resp` int(11) NOT NULL,
  `Cod_fk_cuest2` int(11) DEFAULT NULL,
  `Cod_fk_preg2` int(11) NOT NULL,
  `Cod_fk_rsp` int(11) DEFAULT NULL,
  `Abierta_resp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado_preg`
--

INSERT INTO `resultado_preg` (`Cod_resp`, `Cod_fk_cuest2`, `Cod_fk_preg2`, `Cod_fk_rsp`, `Abierta_resp`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 1, 1, NULL),
(3, 1, 1, 3, NULL),
(4, 1, 1, 2, NULL),
(5, 1, 1, 4, NULL),
(6, 1, 1, 5, NULL),
(7, 1, 2, NULL, 'soda esterio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Cod_ser` int(11) NOT NULL,
  `Nombre_ser` varchar(100) NOT NULL,
  `Detalle_ser` text NOT NULL,
  `Precio_ser` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `Cod_sesion` int(11) NOT NULL,
  `Cod_fk_usr` int(11) NOT NULL,
  `Tipo_ses` tinyint(1) NOT NULL,
  `Tiempo_ses` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cod_usr` int(11) NOT NULL,
  `Cod_fk_perm` int(11) NOT NULL,
  `Nickname_usr` varchar(100) NOT NULL,
  `Clave_usr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cod_usr`, `Cod_fk_perm`, `Nickname_usr`, `Clave_usr`) VALUES
(1, 1, 'a20170094@utem.edu.mx', '123456789'),
(2, 1, 'medrano', '$2y$10$aQjWVVue6jLaqbwO/vTjP.Ta2.tIKxQM01ulpqyZEyfcNL4m9Ekya');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`Cod_ate`),
  ADD KEY `Cod_fk_can` (`Cod_fk_can`),
  ADD KEY `Cod_fk_repo1` (`Cod_fk_repo1`);

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`Cod_cam`);

--
-- Indices de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD PRIMARY KEY (`Cod_can`),
  ADD KEY `Cod_fk_usr1` (`Cod_fk_usr1`),
  ADD KEY `Cod_fk_dep2` (`Cod_fk_dep2`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cod_clnt`),
  ADD UNIQUE KEY `Email_clnt` (`Email_clnt`),
  ADD UNIQUE KEY `Celular_clnt` (`Celular_clnt`),
  ADD KEY `Cod_fk_resp` (`Cod_fk_resp`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`Cod_cont`),
  ADD KEY `Cod_fk_clnt` (`Cod_fk_clnt`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`Cod_cuest`),
  ADD UNIQUE KEY `Nombre_cuest` (`Nombre_cuest`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Cod_dep`),
  ADD UNIQUE KEY `Nombre_dep` (`Nombre_dep`);

--
-- Indices de la tabla `detalle_cont`
--
ALTER TABLE `detalle_cont`
  ADD PRIMARY KEY (`Cod_dc`),
  ADD KEY `Cod_fk_ser` (`Cod_fk_ser`),
  ADD KEY `Cod_fk_cont` (`Cod_fk_cont`);

--
-- Indices de la tabla `hiloreporte`
--
ALTER TABLE `hiloreporte`
  ADD PRIMARY KEY (`Cod_hr`),
  ADD KEY `Cod_fk_repo2` (`Cod_fk_repo2`),
  ADD KEY `Cod_fk_mnsj` (`Cod_fk_mnsj`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`Cod_mnsj`),
  ADD KEY `Cod_fk_usr3` (`Cod_fk_usr3`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Cod_perm`),
  ADD UNIQUE KEY `Nombre_perm` (`Nombre_perm`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Cod_prsn`),
  ADD UNIQUE KEY `Nombre_prsn` (`Nombre_prsn`),
  ADD UNIQUE KEY `Celular_prsn` (`Celular_prsn`),
  ADD UNIQUE KEY `Correo_prsn` (`Correo_prsn`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Cod_prsnl`),
  ADD UNIQUE KEY `Cod_fk_prsn` (`Cod_fk_prsn`),
  ADD UNIQUE KEY `Cod_fk_usr2` (`Cod_fk_usr2`),
  ADD KEY `Cod_fk_pues` (`Cod_fk_pues`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`Cod_preg`),
  ADD KEY `Cod_fk_cuest1` (`Cod_fk_cuest1`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`Cod_pues`),
  ADD UNIQUE KEY `Nombre_pues` (`Nombre_pues`),
  ADD KEY `Cod_fk_dep1` (`Cod_fk_dep1`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Cod_repo`);

--
-- Indices de la tabla `respsel_preguntas`
--
ALTER TABLE `respsel_preguntas`
  ADD PRIMARY KEY (`Cod_rsp`),
  ADD KEY `Cod_fk_preg1` (`Cod_fk_preg1`);

--
-- Indices de la tabla `resultado_preg`
--
ALTER TABLE `resultado_preg`
  ADD PRIMARY KEY (`Cod_resp`),
  ADD KEY `Cod_fk_cuest2` (`Cod_fk_cuest2`),
  ADD KEY `Cod_fk_preg2` (`Cod_fk_preg2`),
  ADD KEY `Cod_fk_rsp` (`Cod_fk_rsp`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Cod_ser`),
  ADD UNIQUE KEY `Nombre_ser` (`Nombre_ser`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`Cod_sesion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cod_usr`),
  ADD UNIQUE KEY `Nickname_usr` (`Nickname_usr`),
  ADD UNIQUE KEY `Clave_usr` (`Clave_usr`),
  ADD KEY `Cod_fk_perm` (`Cod_fk_perm`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `Cod_ate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `Cod_cam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `Cod_can` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Cod_clnt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `Cod_cont` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `Cod_cuest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Cod_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_cont`
--
ALTER TABLE `detalle_cont`
  MODIFY `Cod_dc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hiloreporte`
--
ALTER TABLE `hiloreporte`
  MODIFY `Cod_hr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `Cod_mnsj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Cod_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Cod_prsn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `Cod_prsnl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `Cod_preg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `Cod_pues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Cod_repo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respsel_preguntas`
--
ALTER TABLE `respsel_preguntas`
  MODIFY `Cod_rsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resultado_preg`
--
ALTER TABLE `resultado_preg`
  MODIFY `Cod_resp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `Cod_ser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `Cod_sesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Cod_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `atencion_ibfk_1` FOREIGN KEY (`Cod_fk_can`) REFERENCES `canalizacion` (`Cod_can`),
  ADD CONSTRAINT `atencion_ibfk_2` FOREIGN KEY (`Cod_fk_repo1`) REFERENCES `reportes` (`Cod_repo`);

--
-- Filtros para la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD CONSTRAINT `canalizacion_ibfk_1` FOREIGN KEY (`Cod_fk_usr1`) REFERENCES `usuarios` (`Cod_usr`),
  ADD CONSTRAINT `canalizacion_ibfk_2` FOREIGN KEY (`Cod_fk_dep2`) REFERENCES `departamento` (`Cod_dep`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Cod_fk_resp`) REFERENCES `resultado_preg` (`Cod_resp`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`Cod_fk_clnt`) REFERENCES `clientes` (`Cod_clnt`);

--
-- Filtros para la tabla `detalle_cont`
--
ALTER TABLE `detalle_cont`
  ADD CONSTRAINT `detalle_cont_ibfk_1` FOREIGN KEY (`Cod_fk_ser`) REFERENCES `servicios` (`Cod_ser`),
  ADD CONSTRAINT `detalle_cont_ibfk_2` FOREIGN KEY (`Cod_fk_cont`) REFERENCES `contrato` (`Cod_cont`);

--
-- Filtros para la tabla `hiloreporte`
--
ALTER TABLE `hiloreporte`
  ADD CONSTRAINT `hiloreporte_ibfk_1` FOREIGN KEY (`Cod_fk_repo2`) REFERENCES `reportes` (`Cod_repo`),
  ADD CONSTRAINT `hiloreporte_ibfk_2` FOREIGN KEY (`Cod_fk_mnsj`) REFERENCES `mensaje` (`Cod_mnsj`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`Cod_fk_usr3`) REFERENCES `usuarios` (`Cod_usr`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`Cod_fk_pues`) REFERENCES `puesto` (`Cod_pues`),
  ADD CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`Cod_fk_prsn`) REFERENCES `persona` (`Cod_prsn`),
  ADD CONSTRAINT `personal_ibfk_3` FOREIGN KEY (`Cod_fk_usr2`) REFERENCES `usuarios` (`Cod_usr`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`Cod_fk_cuest1`) REFERENCES `cuestionario` (`Cod_cuest`);

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `puesto_ibfk_1` FOREIGN KEY (`Cod_fk_dep1`) REFERENCES `departamento` (`Cod_dep`);

--
-- Filtros para la tabla `respsel_preguntas`
--
ALTER TABLE `respsel_preguntas`
  ADD CONSTRAINT `respsel_preguntas_ibfk_1` FOREIGN KEY (`Cod_fk_preg1`) REFERENCES `preguntas` (`Cod_preg`);

--
-- Filtros para la tabla `resultado_preg`
--
ALTER TABLE `resultado_preg`
  ADD CONSTRAINT `resultado_preg_ibfk_1` FOREIGN KEY (`Cod_fk_cuest2`) REFERENCES `cuestionario` (`Cod_cuest`),
  ADD CONSTRAINT `resultado_preg_ibfk_2` FOREIGN KEY (`Cod_fk_preg2`) REFERENCES `preguntas` (`Cod_preg`),
  ADD CONSTRAINT `resultado_preg_ibfk_3` FOREIGN KEY (`Cod_fk_rsp`) REFERENCES `respsel_preguntas` (`Cod_rsp`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Cod_fk_perm`) REFERENCES `permisos` (`Cod_perm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
