-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2020 a las 06:59:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptarmode`
--

CREATE TABLE `aceptarmode` (
  `id` int(30) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Tema` varchar(25) NOT NULL,
  `Titulo` varchar(60) NOT NULL,
  `Contenido` varchar(200) NOT NULL,
  `Resumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosusuario`
--

CREATE TABLE `datosusuario` (
  `id` int(30) NOT NULL,
  `idusuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datosusuario`
--

INSERT INTO `datosusuario` (`id`, `idusuario`, `nombre`, `apellido`, `correo`) VALUES
(6, 'Juan', 'Patricio', 'Estrella', 'patoestrella@gmail.com'),
(7, 'Vane', 'Vanesa', 'Morata', 'morevan@gmail.com'),
(8, 'karla', 'karla', 'vera', 'karla@mnn.com'),
(12, 'Dan', 'Daniel', 'S', 'qw@e.com'),
(13, 'Gil', 'Gilberto', 'Santa Rosa', 'Gilsan@hotmail.com'),
(14, 'Rafa', 'Rafael', 'Martinez', 'rafamartinez@gmail.com'),
(15, 'Memorex', 'Guillermo', 'Colorado', 'guilcoljim@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Mensaje` varchar(200) NOT NULL,
  `Leido` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `Usuario`, `Mensaje`, `Leido`, `Fecha`) VALUES
(26, 'rafa', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-05-31'),
(27, 'rafa', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-05-31'),
(28, 'karla', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-05-31'),
(29, 'karla', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-05-31'),
(30, 'juan', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-05-31'),
(31, 'rafa', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-06-10'),
(32, 'memorex', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-06-10'),
(33, 'memorex', 'su publicación no fue aceptada por el moderador de la paguina', 1, '2020-06-10'),
(34, 'memorex', 'su publicación fue aceptada por el moderador de la paguina', 1, '2020-06-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Titulo` varchar(60) NOT NULL,
  `Resumen` text NOT NULL,
  `Contenido` varchar(200) NOT NULL,
  `Tema` varchar(25) NOT NULL,
  `Valoraciones` int(25) NOT NULL,
  `buena` int(25) NOT NULL,
  `regular` int(25) NOT NULL,
  `mala` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id`, `Usuario`, `Titulo`, `Resumen`, `Contenido`, `Tema`, `Valoraciones`, `buena`, `regular`, `mala`) VALUES
(15, 'rafa', '8 curiosidades que quizás no sabías sobre los tigres', 'Puede llegar a pesar 370 kilos. Es el tercer carnívoro más grande del mundo, por detrás del oso polar y el oso pardo. Como si fuera una huella dactilar, las rayas de un tigre nunca serán iguales que la de otro', 'archivos/5cf7c025505a8.jpeg', 'Animales', 2, 1, 0, 1),
(16, 'rafa', '¿Qué tipos de delfines puedes encontrar en México?', 'México, con sus costas en el Atlántico y el Pacífico, es un país con una gran biodiversidad; sus aguas están repletas de todo tipo de animales como tortugas marinas, rayas, peces y cetáceos. Hay 37 cetáceos en México, incluyendo la ballena azul, la ballena gris y la Orca, y 9 tipos de delfines, cuya forma, longitud, tamaño corporal, hocico y aletas dorsales y laterales los distinguen entre sí.', 'archivos/bottlenose-dolphin.jpg', 'Animales', 1, 0, 0, 1),
(17, 'karla', 'Historias de la obra cumbre de The Cure', 'Hacia 1988, Robert Smith estaba preocupado. Pese a que su banda The Cure estaba posicionada como un conjunto referente a nivel mundial tras su LP, Kiss me, Kiss me, Kiss me (1987), el líder del grupo aún sentía que a su trayectoria le hacía falta una obra maestra. Esa sensación no lo abandonaba.  Más aún, el 21 de abril de ese año, Smith celebró su cumpleaños número 29, y la situación solo lo entristeció. “Quería terminarlo todo antes de cumplir los 30 años. [Luego], el día después de cumplir los 29 años, me di cuenta de que el próximo cumpleaños cumpliría 30 años. Es como una paradoja. Creo que cuanto más joven eres, más te preocupas por envejecer”, dice el guitarrista en el libro Never enough, del escritor Jeff Apter.', 'archivos/9780857123312.jpg', 'Musica', 2, 1, 1, 0),
(18, 'karla', '40 años sin Ian Curtis, 40 años con Joy Division', 'Aunque es su figura más conocida, Joy Division no comenzó como un proyecto de Ian Curtis, sino de los amigos Bernard Summer y Peter Hook. La idea de la banda, cuyo primer nombre fue Warsaw, surgió luego de que estos dos guitarristas vieran una presentación de los Sex Pistols en 1976, banda que, como recuerda Summer, “destruyó el mito de ser una estrella de pop, de los músicos siendo un tipo de dios que tienes que adorar”. Irónicamente, eso fue lo que pasó con Joy Division tras el suicidio de Curtis, un día como hoy hace 40 años. Sí, Curtis se ahorcó un 18 de mayo en la cocina de su casa en Manchester, en la víspera de la primera gira internacional de Joy División por Estados Unidos. Sí, estaba escuchando ‘The idiot’ de Iggy Pop. Estos hechos, por todos conocidos, son muchas veces recordados con un halo de morbo e idolatría por el hado trágico del cantante. Incluso, objetos relacionados con su suicidio han sido subastados por fanáticos, quienes han pagado hasta 13 mil dólares por la mesa de la cocina de su casa. ', 'archivos/joy_division_unknown_pleasures_1992_retail_cd-front.jpg', 'Musica', 1, 0, 1, 0),
(19, 'juan', 'El legado de Steven Gerard', 'Hace cuatro años que se retiró. Colgó las botas en 2016 en Los Angeles Galaxy, aunque su ciclo futbolístico prácticamente había terminado un año antes al marcharse del Liverpool, su club de toda la vida.', 'archivos/steven_gerrard-hd-wallpapers.jpg', 'Futbol', 1, 0, 1, 0),
(22, 'memorex', 'Datos curiosos de una ballena', 'Las ballenas son animales muy interesantes y también muy misteriosos. Su vida en las profundidades es difícil de conocer completamente, y por esto los científicos encuentran nueva información sobre ellas constantemente. Si bien son animales pacíficos, su tamaño logra impresionarnos al verlas. Estos datos curiosos sobre las ballenas no son de las más conocidos, pero sí son muy sorprendentes.', 'archivos/ballenas2.jpg', 'Animales', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `Tema` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `Tema`) VALUES
(1, 'Animales'),
(2, 'Musica'),
(47, 'Futbol'),
(49, 'Procesadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `password`, `tipo`) VALUES
('Daniel', '1212', 'moderador'),
('Gaby', '9090', 'moderador'),
('Josue', '123', 'admin'),
('Juan', '1010', 'usuario'),
('karla', '123', 'usuario'),
('Mem', '123', 'admin'),
('Memorex', '123', 'moderador'),
('Rafa', 'rafa', 'usuario'),
('Ruben', '4545', 'moderador'),
('Selena', '2121', 'moderador'),
('Vane', '9090', 'moderador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `usuario_id` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `valoracion` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `publicacion_id`, `usuario_id`, `valoracion`) VALUES
(69, 15, 'rafa', 'buena'),
(70, 16, 'rafa', 'mala'),
(74, 15, 'memorex', 'mala'),
(75, 17, 'memorex', 'regular'),
(76, 18, 'rafa', 'mala'),
(77, 17, 'rafa', 'buena'),
(78, 17, 'Juan', 'mala');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceptarmode`
--
ALTER TABLE `aceptarmode`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosusuario`
--
ALTER TABLE `datosusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceptarmode`
--
ALTER TABLE `aceptarmode`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `datosusuario`
--
ALTER TABLE `datosusuario`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
