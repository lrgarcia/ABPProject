-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 19:33:41
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abp_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistance`
--

CREATE TABLE `assistance` (
  `idClass` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `modality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`idCategory`, `category`, `modality`) VALUES
(1, 'Masculino', 1),
(2, 'Masculino', 2),
(3, 'Masculino', 3),
(4, 'Femenino', 1),
(5, 'Femenino', 2),
(6, 'Femenino', 3),
(7, 'Mixto', 1),
(8, 'Mixto', 2),
(9, 'Mixto', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorygroup`
--

CREATE TABLE `categorygroup` (
  `idCategoryGroup` int(11) NOT NULL,
  `idChampionship` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship`
--

CREATE TABLE `championship` (
  `idChampionship` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dateStart` varchar(10) NOT NULL,
  `dateInscriptions` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`idChampionship`, `name`, `dateStart`, `dateInscriptions`) VALUES
(1, 'Campeonato de Navidad', '02/02/2018', '28/01/2018'),
(2, 'Campeonato Veroño', '24/09/2018', '20/09/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_category`
--

CREATE TABLE `championship_category` (
  `idChampionship` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `championship_category`
--

INSERT INTO `championship_category` (`idChampionship`, `idCategory`) VALUES
(1, 7),
(1, 8),
(1, 9),
(2, 1),
(2, 4),
(2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `idClass` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `idMonitor` int(11) NOT NULL,
  `idCourt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `idCourt` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `court`
--

INSERT INTO `court` (`idCourt`, `number`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `idGame` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `idCourt` int(11) NOT NULL,
  `idUser1` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  `idUser3` int(11) NOT NULL,
  `idUser4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group`
--

CREATE TABLE `group` (
  `idGroup` int(11) NOT NULL,
  `letter` varchar(20) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idChampionship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `match`
--

CREATE TABLE `match` (
  `idMatch` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `result` varchar(10) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `idPair1` int(11) NOT NULL,
  `idPair2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair`
--

CREATE TABLE `pair` (
  `idPair` int(11) NOT NULL,
  `idCaptain` int(11) NOT NULL,
  `idPartner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair_category`
--

CREATE TABLE `pair_category` (
  `idPair` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair_categorygroup`
--

CREATE TABLE `pair_categorygroup` (
  `idPair` int(11) NOT NULL,
  `idCategoryGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair_group`
--

CREATE TABLE `pair_group` (
  `idPair` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotion`
--

CREATE TABLE `promotion` (
  `idPromotion` int(11) NOT NULL,
  `idGame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `idCourt` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `hour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idCourt`, `idUser`, `date`, `hour`) VALUES
(5, 2, 7, '02/02/2018', '12:30'),
(6, 4, 2, '02/02/2018', '12:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `name`, `surname`, `email`, `type`) VALUES
(1, 'gatitoTravieso', '5555', 'Luisa Maria', 'Bernardez', 'loquilla@hotmail.com', 'user'),
(2, 'marilo', 'omvormeabv', 'Marilo', 'Montero', 'MMtero@club.com', 'user'),
(3, 'faleT', 'gfnfdjdfn', 'Josefa', 'Lete', 'josef@lete.com', 'user'),
(4, 'DaRA', 'sgbsdn', 'David', 'Ramos', 'davidR@gmail.com', 'admin'),
(5, 'OloV', 'jlbhkjvh', 'Olora', 'Vagina', 'OloVagi88@mail.fresh.com', 'user'),
(6, 'Mujote', 'wghejhe', 'Maria', 'Umpajote', 'mujote5@yahoo.com', 'instructor'),
(7, 'LaMari', 'thisisnofake', 'Marife', 'Lacion', 'sexyGatita69@ajax.es', 'instructor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD KEY `assistanceClass` (`idClass`),
  ADD KEY `assistanceUser` (`idUser`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indices de la tabla `categorygroup`
--
ALTER TABLE `categorygroup`
  ADD PRIMARY KEY (`idCategoryGroup`),
  ADD KEY `categoryGroupChampionship` (`idChampionship`),
  ADD KEY `categoryGroupCategory` (`idCategory`);

--
-- Indices de la tabla `championship`
--
ALTER TABLE `championship`
  ADD PRIMARY KEY (`idChampionship`);

--
-- Indices de la tabla `championship_category`
--
ALTER TABLE `championship_category`
  ADD PRIMARY KEY (`idChampionship`,`idCategory`),
  ADD KEY `category_championship` (`idCategory`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idClass`),
  ADD KEY `classMonitor` (`idMonitor`),
  ADD KEY `classCourt` (`idCourt`);

--
-- Indices de la tabla `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`idCourt`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idGame`),
  ADD KEY `gameCourt` (`idCourt`),
  ADD KEY `gameUser1` (`idUser1`),
  ADD KEY `gameUser2` (`idUser2`),
  ADD KEY `gameUser3` (`idUser3`),
  ADD KEY `gameUser4` (`idUser4`);

--
-- Indices de la tabla `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idGroup`),
  ADD KEY `groupCategory` (`idCategory`),
  ADD KEY `groupChampionship` (`idChampionship`);

--
-- Indices de la tabla `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`idMatch`),
  ADD KEY `matchGroup` (`idGroup`),
  ADD KEY `matchPair1` (`idPair1`),
  ADD KEY `matchPair2` (`idPair2`);

--
-- Indices de la tabla `pair`
--
ALTER TABLE `pair`
  ADD PRIMARY KEY (`idPair`),
  ADD KEY `pairCaptain` (`idCaptain`),
  ADD KEY `pairPartner` (`idPartner`);

--
-- Indices de la tabla `pair_category`
--
ALTER TABLE `pair_category`
  ADD PRIMARY KEY (`idPair`,`idCategory`),
  ADD KEY `categoryPair` (`idCategory`);

--
-- Indices de la tabla `pair_categorygroup`
--
ALTER TABLE `pair_categorygroup`
  ADD PRIMARY KEY (`idPair`,`idCategoryGroup`),
  ADD KEY `pairCategoryGroup` (`idCategoryGroup`);

--
-- Indices de la tabla `pair_group`
--
ALTER TABLE `pair_group`
  ADD PRIMARY KEY (`idPair`,`idGroup`),
  ADD KEY `groupPair` (`idGroup`);

--
-- Indices de la tabla `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idPromotion`),
  ADD KEY `promotionGame` (`idGame`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `reservationCourt` (`idCourt`) USING BTREE,
  ADD KEY `reservationUser` (`idUser`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorygroup`
--
ALTER TABLE `categorygroup`
  MODIFY `idCategoryGroup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
  MODIFY `idChampionship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `idClass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `court`
--
ALTER TABLE `court`
  MODIFY `idCourt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `group`
--
ALTER TABLE `group`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `match`
--
ALTER TABLE `match`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pair`
--
ALTER TABLE `pair`
  MODIFY `idPair` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD CONSTRAINT `assistanceClass` FOREIGN KEY (`idClass`) REFERENCES `class` (`idClass`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistanceUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorygroup`
--
ALTER TABLE `categorygroup`
  ADD CONSTRAINT `categoryGroupCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryGroupChampionship` FOREIGN KEY (`idChampionship`) REFERENCES `championship` (`idChampionship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `championship_category`
--
ALTER TABLE `championship_category`
  ADD CONSTRAINT `category_championship` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `championship_category` FOREIGN KEY (`idChampionship`) REFERENCES `championship` (`idChampionship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `classCourt` FOREIGN KEY (`idCourt`) REFERENCES `court` (`idCourt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classMonitor` FOREIGN KEY (`idMonitor`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `gameCourt` FOREIGN KEY (`idCourt`) REFERENCES `court` (`idCourt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gameUser1` FOREIGN KEY (`idUser1`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `gameUser2` FOREIGN KEY (`idUser2`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `gameUser3` FOREIGN KEY (`idUser3`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `gameUser4` FOREIGN KEY (`idUser4`) REFERENCES `user` (`idUser`);

--
-- Filtros para la tabla `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `groupCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupChampionship` FOREIGN KEY (`idChampionship`) REFERENCES `championship` (`idChampionship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `matchGroup` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matchPair1` FOREIGN KEY (`idPair1`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matchPair2` FOREIGN KEY (`idPair2`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pair`
--
ALTER TABLE `pair`
  ADD CONSTRAINT `pairCaptain` FOREIGN KEY (`idCaptain`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pairPartner` FOREIGN KEY (`idPartner`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pair_category`
--
ALTER TABLE `pair_category`
  ADD CONSTRAINT `categoryPair` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pairCategory` FOREIGN KEY (`idPair`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pair_categorygroup`
--
ALTER TABLE `pair_categorygroup`
  ADD CONSTRAINT `categoryGroupPair` FOREIGN KEY (`idPair`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pairCategoryGroup` FOREIGN KEY (`idCategoryGroup`) REFERENCES `categorygroup` (`idCategoryGroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pair_group`
--
ALTER TABLE `pair_group`
  ADD CONSTRAINT `groupPair` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pairGroup` FOREIGN KEY (`idPair`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotionGame` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `bookingCourt` FOREIGN KEY (`idCourt`) REFERENCES `court` (`idCourt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;