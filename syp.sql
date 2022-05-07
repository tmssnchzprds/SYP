-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 07-05-2022 a las 11:15:58
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCat` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCat`, `name`) VALUES
(1, 'Ciencia Ficción'),
(2, 'Acción'),
(3, 'Comedia'),
(4, 'Histórica'),
(5, 'Intriga'),
(6, 'Investigación'),
(7, 'Paranormal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idCom` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idSeropel` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `commentary` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodio`
--

CREATE TABLE `episodio` (
  `idEpi` int(11) NOT NULL,
  `idSeropel` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `episodio`
--

INSERT INTO `episodio` (`idEpi`, `idSeropel`, `season`, `episode`) VALUES
(1, 2, 1, 22),
(2, 2, 2, 22),
(3, 2, 3, 22),
(4, 2, 4, 22),
(5, 2, 5, 22),
(6, 2, 6, 13),
(7, 2, 7, 13),
(8, 3, 1, 22),
(9, 3, 2, 22),
(10, 3, 3, 22),
(11, 3, 4, 23),
(12, 3, 5, 22),
(13, 3, 6, 22),
(14, 3, 7, 22),
(15, 3, 8, 16),
(16, 13, 1, 24),
(17, 13, 2, 24),
(18, 13, 3, 24),
(19, 13, 4, 24),
(20, 13, 5, 24),
(21, 13, 6, 21),
(22, 13, 7, 13),
(23, 16, 1, 23),
(24, 16, 2, 23),
(25, 16, 3, 24),
(26, 16, 4, 24),
(27, 16, 5, 22),
(28, 16, 6, 22),
(29, 16, 7, 13),
(30, 9, 1, 22),
(31, 9, 2, 22),
(32, 9, 3, 18),
(33, 9, 4, 23),
(34, 9, 5, 22),
(35, 11, 1, 23),
(36, 11, 2, 23),
(37, 11, 3, 23),
(38, 11, 4, 23),
(39, 11, 5, 22),
(40, 11, 6, 19),
(41, 11, 7, 18),
(42, 11, 8, 18),
(43, 6, 1, 12),
(44, 6, 2, 12),
(45, 6, 3, 12),
(46, 6, 4, 12),
(47, 6, 5, 12),
(48, 6, 6, 12),
(49, 6, 7, 12),
(50, 6, 8, 12),
(51, 14, 1, 13),
(52, 14, 2, 13),
(53, 14, 3, 13),
(54, 7, 1, 10),
(55, 7, 2, 10),
(56, 7, 3, 10),
(57, 7, 4, 10),
(58, 7, 5, 10),
(59, 7, 6, 10),
(60, 7, 7, 7),
(61, 7, 8, 6),
(62, 18, 1, 14),
(63, 18, 2, 16),
(64, 18, 3, 16),
(65, 18, 4, 16),
(66, 18, 5, 13),
(67, 18, 6, 6),
(68, 15, 1, 13),
(69, 15, 2, 15),
(70, 15, 3, 16),
(71, 15, 4, 18),
(72, 15, 5, 15),
(73, 5, 1, 13),
(74, 5, 2, 16),
(75, 5, 3, 16),
(76, 5, 4, 13),
(77, 5, 5, 13),
(78, 5, 6, 13),
(79, 5, 7, 16),
(80, 17, 1, 14),
(81, 17, 2, 14),
(82, 17, 3, 14),
(83, 4, 1, 24),
(84, 4, 2, 25),
(85, 4, 3, 23),
(86, 4, 4, 22),
(87, 4, 5, 22),
(88, 4, 6, 22),
(89, 4, 7, 8),
(90, 12, 1, 25),
(91, 12, 2, 23),
(92, 12, 3, 22),
(93, 12, 4, 14),
(94, 12, 5, 17),
(95, 12, 6, 17),
(96, 8, 1, 15),
(97, 8, 2, 16),
(98, 8, 3, 16),
(99, 8, 4, 16),
(100, 8, 5, 16),
(101, 8, 6, 16),
(102, 8, 7, 16),
(103, 8, 8, 10),
(104, 10, 1, 13),
(105, 10, 2, 13),
(106, 10, 3, 13),
(107, 10, 4, 12),
(108, 10, 5, 18),
(109, 10, 6, 13),
(110, 10, 7, 8),
(111, 10, 8, 13),
(112, 10, 9, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEst` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEst`, `name`) VALUES
(1, 'Pendiente'),
(2, 'Siguiendo'),
(3, 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seropel`
--

CREATE TABLE `seropel` (
  `idSeropel` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `cover` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seropel`
--

INSERT INTO `seropel` (`idSeropel`, `idCat`, `tipo`, `title`, `description`, `cover`, `date`) VALUES
(2, 1, 1, 'Agentes de S.H.I.E.L.D.', 'Después de los eventos acontecidos en la película LOS VENGADORES, el Agente Phil Coulson (Clark Gregg) regresa a la organización que aplica la ley en todo el mundo llamada S.H.I.E.L.D. Allí se reúne un pequeño pero altamente capacitado equipo de agentes para hacer frente a los casos que no han sido clasificados, lo nuevo, lo extraño y lo desconocido. Ese equipo consta del Agente Grant Ward (Brett Dalton), un experto en combate y espionaje; la piloto y artista marcial Agente Melinda May (Ming-Na Wen), el brillante pero torpe científico Agente Leo Fitz (Iain De Caestecker) y la Agente Jemma Simmons (Elizabeth Henstridge). A ellos se les unirá el nuevo recluta y hacker Skye (Chloe Bennet).', 'https://img.tviso.com/ES/poster/w430/4f/2c/4f2cacaf9eaf01cb4dce1a88661f488c.jpg', '2022-04-20'),
(3, 7, 1, 'Crónicas Vampíricas', 'La trama gira en torno a la vida de Elena, sus amigos y otros habitantes de una pequeña ciudad de Virginia, llamada Mystic Falls. Elena Gilbert, es una adolescente de la cual se enamoran los hermanos Salvatore, que son vampiros; Stefan, educado, tímido y atormentado; y Damon, que es egoista, atrevido y sin escrúpulos. Elena es idéntica a Katherine, la mujer que los convirtió en vampiros y que jugó con el amor que ambos sentían por ella.', 'https://img.tviso.com/ES/poster/w430/1c/73/1c73d25680bae95802284ec9abb428e2.jpg', '2022-04-20'),
(4, 3, 1, 'New Girl', 'Jess (Zooey Deschanel) es una chica adorable que acaba de romper con su novio, así que en un cambio de rumbo decide irse a compartir piso con tres atractivos chicos en busca de una nueva y diferente vida. Pero, ¿será la convivencia correcta vivir con tres solteros?', 'https://img.tviso.com/ES/poster/w430/1b/dd/1bdd3b7f967ea12128065d5267190fc2.jpg', NULL),
(5, 1, 1, 'Los 100\r\n', 'Situada 97 años después de una guerra nuclear que ha destruido la civilización, los supervivientes de una nave espacial, que han sobrevivido durante 3 generaciones en el espacio, envían 100 delincuentes juveniles \"para testear\" las condiciones de la Tierra, con la esperanza de eventualmente volver a poblar el planeta. El grupo de jóvenes tratará de sobrevivir en un entorno desconocido y hostil a pesar de las brechas que se abren entre ellos, unos partidarios de seguir en conexión con la nave, otros a favor de empezar de cero sin depender de nadie. Mientras, en la nave, las luchas por el poder político se recrudecen, llevando a los dirigentes a situaciones extremas y difíciles decisiones.', 'https://img.tviso.com/ES/poster/w430/b8/71/b8717b4bbaae884e1be8746840f9176c.jpg', NULL),
(6, 5, 1, 'Homeland', 'El sargento de la Marina Nicholas Brody (Damian Lewis) regresa a casa ocho años después de su desaparición en Irak, donde vivió encarcelado y sometido a tortura. Finalmente, un comando de las fuerzas especiales lo localiza durante una misión. La joven Carrie Mathison (Claire Danes), una impulsiva e intuitiva agente de la CIA, sospecha que Brody se ha pasado al enemigo durante su cautiverio, pues unos meses antes un terrorista condenado a muerte le habló de un soldado norteamericano que había cambiado de bando. Basada en la serie israelí \"Prisoners of War\", creada por Gideon Raff.', 'https://img.tviso.com/ES/poster/w430/d1/7a/d17a90532448551f3501eb6cab8a4a65.jpg', NULL),
(7, 1, 1, 'Juego de tronos', 'La historia se desarrolla en un mundo ficticio de carácter medieval donde hay Siete Reinos. Hay tres líneas argumentales principales: la crónica de la guerra civil dinástica por el control de Poniente entre varias familias nobles que aspiran al Trono de Hierro, la creciente amenaza de los Otros, seres desconocidos que viven al otro lado de un inmenso muro de hielo que protege el Norte de Poniente, y el viaje de Daenerys Targaryen, la hija exiliada del rey que fue asesinado en una guerra civil anterior, y que pretende regresar a Poniente para reclamar sus derechos. Tras un largo verano de varios años, el temible invierno se acerca a los Siete Reinos. Lord Eddard \'Ned\' Stark, señor de Invernalia, deja sus dominios para ir a la corte de su amigo, el rey Robert Baratheon en Desembarco del Rey, la capital de los Siete Reinos. Stark se convierte en la Mano del Rey e intenta desentrañar una maraña de intrigas que pondrá en peligro su vida y la de todos los suyos. Mientras tanto diversas facciones conspiran con un solo objetivo: apoderarse del trono.', 'https://img.tviso.com/ES/poster/w430/7d/8f/7d8fa07406697a17e65b401795e385f6.jpg', NULL),
(8, 3, 1, 'Psych\r\n', 'Shawn Spencer (James Roday) es un joven muy distinto a los demás. Desde pequeño, su padre, Henry (Corbin Bernsen), detective de profesión, le enseñaba a fijarse en todos los detalles de su alrededor, incluso hasta en los más nimios. Tanto que sus extraordinarios poderes de observación le hacen ser sospechoso de un crimen que no ha cometido. Sin embargo, gracias a su talento, termina convenciendo a la policía de que se trata de poderes psíquicos. De este modo, el joven se hace pasar desde entonces por un falso médium. El joven Shawn sabe aprovechar su inusual habilidad de observar. Y es que, además de trabajar como asesor de la policía, monta un negocio para enriquecerse a partir de su propia farsa. Con la ayuda de su mejor amigo, Gus (Dule Hill, \\\"El ala del oeste de la Casa Blanca\\\"), el joven protagonista pone en marcha una agencia de investigación llamada Psych donde, de manera picaresca, intentan solucionar los casos más insospechados, dejando a las fuerzas del orden totalmente impresionadas, aunque siempre quedan los escépticos.', 'https://img.tviso.com/ES/poster/w430/20/64/2064c16e2d862540fa7a2fa284501934.jpg', NULL),
(9, 7, 1, 'Entre fantasmas', 'Melinda Gordon (Jennifer Love Hewitt) es una joven recién casada que posee el don de comunicarse con los espíritus de las personas que han muerto, un talento heredado de su abuela. Los muertos buscan la habilidad de Melinda para poder tranmitir mensajes e información relevantes a los vivos. A pesar de su miedo, la compasión la lleva a ayudar a esas almas errantes a completar sus negocios inacabados con los vivos...', 'https://img.tviso.com/ES/poster/w430/81/16/81164f29ec40799ab4404b3ba5c7bec1.jpg', NULL),
(10, 4, 1, 'Águila Roja', 'La acción se sitúa el Siglo de Oro, durante el reinado de Felipe IV (1621-1665). Buscando al culpable de la muerte de su mujer, Gonzalo de Montalvo (David Janer), maestro de profesión, se verá envuelto en diversas aventuras e intrigas palaciegas, que lo obligarán a llevar una doble vida y se convertirá en un misterioso héroe justiciero, conocido como \"Águila roja\". Fiel a su código moral regido por el valor, la nobleza, la amistad y el amor, se dedica a ayudar a los débiles al tiempo que trata de descubrir la conspiración que se esconde tras el asesinato de su esposa y cuyo objetivo es derrocar al Rey. Hombre de modernos ideales a pesar del oscurantismo de la época que le ha tocado vivir, Gonzalo de Montalvo es un personaje atrapado en su triple condición de hombre, padre y héroe. Así, sufrirá por la muerte de su esposa mientras dos mujeres luchan por su amor, intentará ganarse la confianza y el aprecio de su único hijo y sufrirá la implacable persecución del comisario en su condición de Aguila Roja. Nadie, excepto su fiel criado Sátur y un misterioso fraile, conoce la verdadera identidad de Águila Roja, ni siquiera su único hijo, que siente una profunda admiración por el misterioso personaje, ajeno por completo al hecho de que viven bajo el mismo techo. El contrapunto humorístico, pragmático y pícaro a la noble y desinteresada actuación de águila Roja lo pondrá su criado Sátur, un buscavidas hecho a sí mismo que aprecia en demasía su propio pellejo para ponerlo en peligro.', 'https://img.tviso.com/ES/poster/w430/2f/39/2f39daa091a3eca7a06e9ec3a237043b.jpg', NULL),
(11, 1, 1, 'Flash', 'Después de que un acelerador de partículas cause una extraña tormenta, al investigador científico de la policía, Barry Allen, le cae un rayo y entra en coma. Meses después despierta con el poder de moverse a súper velocidad permitiéndole ser el ángel de la guardia de Central City. Aunque al principio se siente entusiasmado con sus nuevos poderes, Barry descubre que no es el único “meta-humano” que se originó tras la explosión del acelerador – y no todo el mundo está usando sus nuevos poderes para el bien. Los compañeros del laboratorio STAR dedican su vida a ayudar a Barry a proteger a los inocentes. Por ahora, solo algunos amigos cercanos saben que Barry es, literalmente, el hombre más rápido del mundo, pero no pasará mucho hasta que el mundo conozca que ahora Barry Allen es … Flash.', 'https://img.tviso.com/ES/poster/w430/a1/f3/a1f37a875f2358002af254a9f3d9fd49.jpg', NULL),
(12, 5, 1, 'Perdidos', 'Historia de un variopinto grupo de supervivientes de un accidente de aviación en una isla del Pacífico aparentemente desierta, una isla en la que suceden cosas muy extrañas. Luchando por la supervivencia, casi medio centenar de personas mostrarán lo mejor y lo peor de sí mismas.', 'https://img.tviso.com/ES/poster/w430/29/03/2903bb1935f328fb81d91e4a136f95a4.jpg', NULL),
(13, 6, 1, 'Elementary', 'Adaptación contemporánea del clásico personaje de Conan Doyle pero que esta vez estará resolviendo casos en la ciudad de Nueva York. Por primera vez en la historia el personaje de Watson estará interpretado por una mujer: Lucy Liu.', 'https://img.tviso.com/ES/poster/w430/e2/7e/e27e8b21cac0161d7a99db3f02c2cfea.jpg', NULL),
(14, 4, 1, 'Isabel', 'La apasionante lucha de una mujer por llegar a ser reina. Ésta es la historia que cuenta Isabel en su primera temporada. Concretamente lo hace desde su formación, siendo apenas una niña hasta su coronación con apenas 23 años, un periodo clave para entender la personalidad de la que luego fue llamada Isabel la Católica.', 'https://img.tviso.com/ES/poster/w430/c1/d2/c1d2b1c753c5e43085fe93613e590faf.jpg', NULL),
(15, 5, 1, 'Las reglas del juego\r\n', 'Cuando Nate Ford, un investigador de seguros, descubre un día las injusticias que comete la empresa para la que trabaja, es despedido. Entonces, como un Robin Hood moderno, decide unirse a un grupo de hackers, ladrones y timadores que se enfrentan a quienes usan dinero y poder para esclavizar a los demás.', 'https://img.tviso.com/ES/poster/w430/70/83/70836f258786b88e8aa29db593ff5bc3.jpg', NULL),
(16, 6, 1, 'El mentalista', 'Patrick Jane es un hombre que trabaja como médium televisivo hasta que sufre un duro golpe cuando su mujer e hija son asesinadas. A partir de entonces, decide usar sus habilidades para ayudar a resolver casos de asesinato, trabajando como detective en el Departamento de Investigación de Crímenes de California. El agente Jane será capaz de ver aquello que los demás no pueden y sus poderes de observación y deducción le darán excelentes resultados.', 'https://img.tviso.com/ES/poster/w430/ae/14/ae142d02147980d1677cccbd824323b2.jpg', NULL),
(17, 7, 1, 'Los protegidos', 'Un grupo de personas se hacen pasar por una familia, los Castillo Rey, con el objetivo de huir de una extraña organización que les busca llamada el Clan del Elefante. El motivo no es otro que los poderes sobrenaturales de muchos de sus miembros. Bajo el cuidado de Mario (Antonio Garrido), padre viudo con ciertas inseguridades, y Jimena (Angie Cepeda), una madre que ha sufrido el secuestro de su hija Blanca a manos del Clan del Elefante, se encuentran: el rebelde Culebra (Luis Fernández), dotado del don de la invisibilidad; Sandra (Ana Fernández), poseedora de un poder eléctrico; Carlos (Daniel Avilés), hijo de Mario y que domina la telequinesia; Lucía (Priscilla Delgado), una huérfana capaz de leer los pensamientos ajenos y transmitir los suyos propios; y Lucas (Mario Marzo), un adolescente que puede transformarse en otras personas. Ahora deben convivir cómo si fueran una verdadera familia, ocultando además su secreto, mientras buscan un modo de rescatar a Blanca.', 'https://img.tviso.com/ES/poster/w430/25/0c/250c26d47ceab5f5bb191ae5cea5fbfa.jpg', NULL),
(18, 6, 1, 'Ladrón de guante blanco', 'La probable alianza entre encantador estafador Neal Caffrey y straightman FBI agente Peter Burke. Caffrey ofrece su experiencia para ayudar a Burke a capturar a otros delincuentes esquivos a cambio de su libertad, y juntos demuestran que para resolver los crímenes más difíciles, se debe contratar al penal más inteligente.\r\n', 'https://img.tviso.com/ES/poster/w430/40/c3/40c36b45ae3a055c1b28f9c13c2904f6.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `name`, `password`, `email`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 0),
(2, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 'usuario@usuario.com', 1),
(3, 'editor', '5aee9dbd2a188839105073571bee1b1f', 'editor@editor.com', 2),
(4, 'usuario2', '2fb6c8d2f3842a5ceaa9bf320e649ff0', 'usuario2@usuario2.com', 1),
(5, 'usuario3', '5a54c609c08a0ab3f7f8eef1365bfda6', 'usuario3@usuario3.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ususeropel`
--

CREATE TABLE `ususeropel` (
  `idUsuSeropel` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idSeropel` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `idEst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `fk_com_seropel` (`idSeropel`),
  ADD KEY `fk_com_usuario` (`idUsu`),
  ADD KEY `season` (`season`),
  ADD KEY `episode` (`episode`);

--
-- Indices de la tabla `episodio`
--
ALTER TABLE `episodio`
  ADD PRIMARY KEY (`idEpi`),
  ADD KEY `fk_episodio_seropel` (`idSeropel`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEst`);

--
-- Indices de la tabla `seropel`
--
ALTER TABLE `seropel`
  ADD PRIMARY KEY (`idSeropel`),
  ADD KEY `fk_seropel_categoria` (`idCat`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- Indices de la tabla `ususeropel`
--
ALTER TABLE `ususeropel`
  ADD PRIMARY KEY (`idUsuSeropel`),
  ADD UNIQUE KEY `unq_idUsu_idSer` (`idUsu`,`idSeropel`),
  ADD KEY `fk_usu_seropel` (`idSeropel`),
  ADD KEY `fk_usu_estado` (`idEst`),
  ADD KEY `fk_usu_usuario` (`idUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `episodio`
--
ALTER TABLE `episodio`
  MODIFY `idEpi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seropel`
--
ALTER TABLE `seropel`
  MODIFY `idSeropel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ususeropel`
--
ALTER TABLE `ususeropel`
  MODIFY `idUsuSeropel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_com_ser_serie` FOREIGN KEY (`idSeropel`) REFERENCES `seropel` (`idSeropel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_com_ser_usuario` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `episodio`
--
ALTER TABLE `episodio`
  ADD CONSTRAINT `fk_episodio_serie` FOREIGN KEY (`idSeropel`) REFERENCES `seropel` (`idSeropel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seropel`
--
ALTER TABLE `seropel`
  ADD CONSTRAINT `fk_seropel_idCat` FOREIGN KEY (`idCat`) REFERENCES `categoria` (`idCat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ususeropel`
--
ALTER TABLE `ususeropel`
  ADD CONSTRAINT `fk_usu_ser_estado` FOREIGN KEY (`idEst`) REFERENCES `estado` (`idEst`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usu_ser_serie` FOREIGN KEY (`idSeropel`) REFERENCES `seropel` (`idSeropel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usu_ser_usuario` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
