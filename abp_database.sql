-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 22:34:31
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

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

--
-- Volcado de datos para la tabla `categorygroup`
--

INSERT INTO `categorygroup` (`idCategoryGroup`, `idChampionship`, `idCategory`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 1),
(6, 4, 2),
(7, 4, 3),
(8, 4, 4),
(9, 4, 5),
(10, 4, 8);

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
(1, 'Campeonato de Navidad', '2018-02-02', '2018-01-24'),
(2, 'Campeonato Veroño', '2918-09-24', '2018-09-20'),
(3, 'CAMPEONATO DE INVIERANO', '2018-11-09', '2018-11-15'),
(4, 'Campeonato patata', '2019-01-21', '2019-01-18');

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
(2, 7),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 8);

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
  `idCourt` int(11) DEFAULT NULL,
  `idUser1` int(11) DEFAULT NULL,
  `idUser2` int(11) DEFAULT NULL,
  `idUser3` int(11) DEFAULT NULL,
  `idUser4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`idGame`, `date`, `hour`, `idCourt`, `idUser1`, `idUser2`, `idUser3`, `idUser4`) VALUES
(11, '2018/05/06', '8:00', NULL, NULL, NULL, NULL, NULL),
(13, '2019/05/30', '8:00', NULL, NULL, NULL, NULL, NULL),
(14, '2019/07/25', '12:30', NULL, NULL, NULL, NULL, NULL),
(15, '2020/08/06', '18:30', NULL, NULL, NULL, NULL, NULL);

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

--
-- Volcado de datos para la tabla `group`
--

INSERT INTO `group` (`idGroup`, `letter`, `idCategory`, `idChampionship`) VALUES
(1, 'a', 1, 3),
(2, 'b', 1, 3),
(3, 'a', 2, 3);

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
  `idPair2` int(11) NOT NULL,
  `round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `match`
--

INSERT INTO `match` (`idMatch`, `date`, `hour`, `result`, `idGroup`, `idPair1`, `idPair2`, `round`) VALUES
(1, '', '', '1-2/set2Pa', 1, 1, 2, 1),
(2, '', '', '', 1, 1, 3, 1),
(3, '', '', '', 1, 1, 4, 1),
(4, '', '', '', 1, 1, 5, 1),
(5, '', '', '', 1, 1, 6, 1),
(6, '', '', '', 1, 1, 7, 1),
(7, '', '', '', 1, 1, 8, 1),
(8, '', '', '', 1, 2, 3, 1),
(9, '', '', '', 1, 2, 4, 1),
(10, '', '', '', 1, 2, 5, 1),
(11, '', '', '', 1, 2, 6, 1),
(12, '', '', '', 1, 2, 7, 1),
(13, '', '', '', 1, 2, 8, 1),
(14, '', '', '', 1, 3, 4, 1),
(15, '', '', '', 1, 3, 5, 1),
(16, '', '', '', 1, 3, 6, 1),
(17, '', '', '', 1, 3, 7, 1),
(18, '', '', '', 1, 3, 8, 1),
(19, '', '', '', 1, 4, 5, 1),
(20, '', '', '', 1, 4, 6, 1),
(21, '', '', '', 1, 4, 7, 1),
(22, '', '', '', 1, 4, 8, 1),
(23, '', '', '', 1, 5, 6, 1),
(24, '', '', '', 1, 5, 7, 1),
(25, '', '', '', 1, 5, 8, 1),
(26, '', '', '', 1, 6, 7, 1),
(27, '', '', '', 1, 6, 8, 1),
(28, '', '', '', 1, 7, 8, 1),
(29, '', '', '', 2, 9, 10, 1),
(30, '', '', '', 2, 9, 11, 1),
(31, '', '', '', 2, 9, 12, 1),
(32, '', '', '', 2, 9, 13, 1),
(33, '', '', '', 2, 9, 14, 1),
(34, '', '', '', 2, 9, 15, 1),
(35, '', '', '', 2, 9, 16, 1),
(36, '', '', '', 2, 10, 11, 1),
(37, '', '', '', 2, 10, 12, 1),
(38, '', '', '', 2, 10, 13, 1),
(39, '', '', '', 2, 10, 14, 1),
(40, '', '', '', 2, 10, 15, 1),
(41, '', '', '', 2, 10, 16, 1),
(42, '', '', '', 2, 11, 12, 1),
(43, '', '', '', 2, 11, 13, 1),
(44, '', '', '', 2, 11, 14, 1),
(45, '', '', '', 2, 11, 15, 1),
(46, '', '', '', 2, 11, 16, 1),
(47, '', '', '', 2, 12, 13, 1),
(48, '', '', '', 2, 12, 14, 1),
(49, '', '', '', 2, 12, 15, 1),
(50, '', '', '', 2, 12, 16, 1),
(51, '', '', '', 2, 13, 14, 1),
(52, '', '', '', 2, 13, 15, 1),
(53, '', '', '', 2, 13, 16, 1),
(54, '', '', '', 2, 14, 15, 1),
(55, '', '', '', 2, 14, 16, 1),
(56, '', '', '', 2, 15, 16, 1),
(57, '', '', '', 3, 1, 2, 1),
(58, '', '', '', 3, 1, 3, 1),
(59, '', '', '', 3, 1, 4, 1),
(60, '', '', '', 3, 1, 5, 1),
(61, '', '', '', 3, 1, 6, 1),
(62, '', '', '', 3, 1, 9, 1),
(63, '', '', '', 3, 1, 10, 1),
(64, '', '', '', 3, 2, 3, 1),
(65, '', '', '', 3, 2, 4, 1),
(66, '', '', '', 3, 2, 5, 1),
(67, '', '', '', 3, 2, 6, 1),
(68, '', '', '', 3, 2, 9, 1),
(69, '', '', '', 3, 2, 10, 1),
(70, '', '', '', 3, 3, 4, 1),
(71, '', '', '', 3, 3, 5, 1),
(72, '', '', '', 3, 3, 6, 1),
(73, '', '', '', 3, 3, 9, 1),
(74, '', '', '', 3, 3, 10, 1),
(75, '', '', '', 3, 4, 5, 1),
(76, '', '', '', 3, 4, 6, 1),
(77, '', '', '', 3, 4, 9, 1),
(78, '', '', '', 3, 4, 10, 1),
(79, '', '', '', 3, 5, 6, 1),
(80, '', '', '', 3, 5, 9, 1),
(81, '', '', '', 3, 5, 10, 1),
(82, '', '', '', 3, 6, 9, 1),
(83, '', '', '', 3, 6, 10, 1),
(84, '', '', '', 3, 9, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair`
--

CREATE TABLE `pair` (
  `idPair` int(11) NOT NULL,
  `idCaptain` int(11) NOT NULL,
  `idPartner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pair`
--

INSERT INTO `pair` (`idPair`, `idCaptain`, `idPartner`) VALUES
(1, 1, 2),
(2, 3, 4),
(3, 4, 5),
(4, 5, 6),
(5, 4, 1),
(6, 7, 2),
(7, 2, 3),
(8, 7, 3),
(9, 10, 6),
(10, 4, 9),
(11, 8, 3),
(12, 3, 9),
(13, 3, 8),
(14, 10, 9),
(15, 2, 6),
(16, 9, 8),
(17, 7, 4),
(18, 1, 5);

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

--
-- Volcado de datos para la tabla `pair_categorygroup`
--

INSERT INTO `pair_categorygroup` (`idPair`, `idCategoryGroup`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pair_group`
--

CREATE TABLE `pair_group` (
  `idPair` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pair_group`
--

INSERT INTO `pair_group` (`idPair`, `idGroup`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotion`
--

CREATE TABLE `promotion` (
  `idPromotion` int(11) NOT NULL,
  `idGame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promotion`
--

INSERT INTO `promotion` (`idPromotion`, `idGame`) VALUES
(1, 13),
(3, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proposedmatch`
--

CREATE TABLE `proposedmatch` (
  `idProposedMatch` int(11) NOT NULL,
  `idMatch` int(11) NOT NULL,
  `idPair` int(11) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `hour` varchar(10) DEFAULT NULL,
  `available` enum('DISPONIBLE','NO DISPONIBLE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proposedmatch`
--

INSERT INTO `proposedmatch` (`idProposedMatch`, `idMatch`, `idPair`, `date`, `hour`, `available`) VALUES
(1, 1, 1, '2018-11-10', '11:00', 'NO DISPONIBLE'),
(2, 1, 2, '2018-11-10', '11:00', 'NO DISPONIBLE'),
(3, 1, 1, '2018-11-11', '11:00', 'NO DISPONIBLE'),
(4, 1, 2, '2018-11-11', '11:00', 'NO DISPONIBLE'),
(5, 1, 1, '2018-11-12', '11:00', 'NO DISPONIBLE'),
(6, 1, 2, '2018-11-12', '11:00', 'NO DISPONIBLE'),
(7, 1, 1, '2018-11-13', '11:00', 'NO DISPONIBLE'),
(8, 1, 2, '2018-11-13', '11:00', 'NO DISPONIBLE'),
(9, 1, 1, '2018-11-14', '11:00', 'NO DISPONIBLE'),
(10, 1, 2, '2018-11-14', '11:00', 'NO DISPONIBLE'),
(11, 1, 1, '2018-11-15', '11:00', 'NO DISPONIBLE'),
(12, 1, 2, '2018-11-15', '11:00', 'NO DISPONIBLE'),
(13, 1, 1, '2018-11-16', '11:00', 'NO DISPONIBLE'),
(14, 1, 2, '2018-11-16', '11:00', 'NO DISPONIBLE'),
(15, 1, 1, '2018-11-17', '11:00', 'NO DISPONIBLE'),
(16, 1, 2, '2018-11-17', '11:00', 'NO DISPONIBLE'),
(17, 2, 1, '2018-11-18', '11:00', 'NO DISPONIBLE'),
(18, 2, 3, '2018-11-18', '11:00', 'NO DISPONIBLE'),
(19, 2, 1, '2018-11-19', '11:00', 'NO DISPONIBLE'),
(20, 2, 3, '2018-11-19', '11:00', 'NO DISPONIBLE'),
(21, 2, 1, '2018-11-20', '11:00', 'NO DISPONIBLE'),
(22, 2, 3, '2018-11-20', '11:00', 'NO DISPONIBLE'),
(23, 2, 1, '2018-11-21', '11:00', 'NO DISPONIBLE'),
(24, 2, 3, '2018-11-21', '11:00', 'NO DISPONIBLE'),
(25, 2, 1, '2018-11-22', '11:00', 'NO DISPONIBLE'),
(26, 2, 3, '2018-11-22', '11:00', 'NO DISPONIBLE'),
(27, 2, 1, '2018-11-23', '11:00', 'NO DISPONIBLE'),
(28, 2, 3, '2018-11-23', '11:00', 'NO DISPONIBLE'),
(29, 2, 1, '2018-11-24', '11:00', 'NO DISPONIBLE'),
(30, 2, 3, '2018-11-24', '11:00', 'NO DISPONIBLE'),
(31, 2, 1, '2018-11-25', '11:00', 'NO DISPONIBLE'),
(32, 2, 3, '2018-11-25', '11:00', 'NO DISPONIBLE'),
(33, 3, 1, '2018-11-26', '11:00', 'NO DISPONIBLE'),
(34, 3, 4, '2018-11-26', '11:00', 'NO DISPONIBLE'),
(35, 3, 1, '2018-11-27', '11:00', 'NO DISPONIBLE'),
(36, 3, 4, '2018-11-27', '11:00', 'NO DISPONIBLE'),
(37, 3, 1, '2018-11-28', '11:00', 'NO DISPONIBLE'),
(38, 3, 4, '2018-11-28', '11:00', 'NO DISPONIBLE'),
(39, 3, 1, '2018-11-29', '11:00', 'NO DISPONIBLE'),
(40, 3, 4, '2018-11-29', '11:00', 'NO DISPONIBLE'),
(41, 3, 1, '2018-11-30', '11:00', 'NO DISPONIBLE'),
(42, 3, 4, '2018-11-30', '11:00', 'NO DISPONIBLE'),
(43, 3, 1, '2018-12-01', '11:00', 'NO DISPONIBLE'),
(44, 3, 4, '2018-12-01', '11:00', 'NO DISPONIBLE'),
(45, 3, 1, '2018-12-02', '11:00', 'NO DISPONIBLE'),
(46, 3, 4, '2018-12-02', '11:00', 'NO DISPONIBLE'),
(47, 3, 1, '2018-12-03', '11:00', 'NO DISPONIBLE'),
(48, 3, 4, '2018-12-03', '11:00', 'NO DISPONIBLE'),
(49, 4, 1, '2018-12-04', '11:00', 'NO DISPONIBLE'),
(50, 4, 5, '2018-12-04', '11:00', 'NO DISPONIBLE'),
(51, 4, 1, '2018-12-05', '11:00', 'NO DISPONIBLE'),
(52, 4, 5, '2018-12-05', '11:00', 'NO DISPONIBLE'),
(53, 4, 1, '2018-12-06', '11:00', 'NO DISPONIBLE'),
(54, 4, 5, '2018-12-06', '11:00', 'NO DISPONIBLE'),
(55, 4, 1, '2018-12-07', '11:00', 'NO DISPONIBLE'),
(56, 4, 5, '2018-12-07', '11:00', 'NO DISPONIBLE'),
(57, 4, 1, '2018-12-08', '11:00', 'NO DISPONIBLE'),
(58, 4, 5, '2018-12-08', '11:00', 'NO DISPONIBLE'),
(59, 4, 1, '2018-12-09', '11:00', 'NO DISPONIBLE'),
(60, 4, 5, '2018-12-09', '11:00', 'NO DISPONIBLE'),
(61, 4, 1, '2018-12-10', '11:00', 'NO DISPONIBLE'),
(62, 4, 5, '2018-12-10', '11:00', 'NO DISPONIBLE'),
(63, 4, 1, '2018-12-11', '11:00', 'NO DISPONIBLE'),
(64, 4, 5, '2018-12-11', '11:00', 'NO DISPONIBLE'),
(65, 5, 1, '2018-12-12', '11:00', 'NO DISPONIBLE'),
(66, 5, 6, '2018-12-12', '11:00', 'NO DISPONIBLE'),
(67, 5, 1, '2018-12-13', '11:00', 'NO DISPONIBLE'),
(68, 5, 6, '2018-12-13', '11:00', 'NO DISPONIBLE'),
(69, 5, 1, '2018-12-14', '11:00', 'NO DISPONIBLE'),
(70, 5, 6, '2018-12-14', '11:00', 'NO DISPONIBLE'),
(71, 5, 1, '2018-12-15', '11:00', 'NO DISPONIBLE'),
(72, 5, 6, '2018-12-15', '11:00', 'NO DISPONIBLE'),
(73, 5, 1, '2018-12-16', '11:00', 'NO DISPONIBLE'),
(74, 5, 6, '2018-12-16', '11:00', 'NO DISPONIBLE'),
(75, 5, 1, '2018-12-17', '11:00', 'NO DISPONIBLE'),
(76, 5, 6, '2018-12-17', '11:00', 'NO DISPONIBLE'),
(77, 5, 1, '2018-12-18', '11:00', 'NO DISPONIBLE'),
(78, 5, 6, '2018-12-18', '11:00', 'NO DISPONIBLE'),
(79, 5, 1, '2018-12-19', '11:00', 'NO DISPONIBLE'),
(80, 5, 6, '2018-12-19', '11:00', 'NO DISPONIBLE'),
(81, 6, 1, '2018-12-20', '11:00', 'NO DISPONIBLE'),
(82, 6, 7, '2018-12-20', '11:00', 'NO DISPONIBLE'),
(83, 6, 1, '2018-12-21', '11:00', 'NO DISPONIBLE'),
(84, 6, 7, '2018-12-21', '11:00', 'NO DISPONIBLE'),
(85, 6, 1, '2018-12-22', '11:00', 'NO DISPONIBLE'),
(86, 6, 7, '2018-12-22', '11:00', 'NO DISPONIBLE'),
(87, 6, 1, '2018-12-23', '11:00', 'NO DISPONIBLE'),
(88, 6, 7, '2018-12-23', '11:00', 'NO DISPONIBLE'),
(89, 6, 1, '2018-12-24', '11:00', 'NO DISPONIBLE'),
(90, 6, 7, '2018-12-24', '11:00', 'NO DISPONIBLE'),
(91, 6, 1, '2018-12-25', '11:00', 'NO DISPONIBLE'),
(92, 6, 7, '2018-12-25', '11:00', 'NO DISPONIBLE'),
(93, 6, 1, '2018-12-26', '11:00', 'NO DISPONIBLE'),
(94, 6, 7, '2018-12-26', '11:00', 'NO DISPONIBLE'),
(95, 6, 1, '2018-12-27', '11:00', 'NO DISPONIBLE'),
(96, 6, 7, '2018-12-27', '11:00', 'NO DISPONIBLE'),
(97, 7, 1, '2018-12-28', '11:00', 'NO DISPONIBLE'),
(98, 7, 8, '2018-12-28', '11:00', 'NO DISPONIBLE'),
(99, 7, 1, '2018-12-29', '11:00', 'NO DISPONIBLE'),
(100, 7, 8, '2018-12-29', '11:00', 'NO DISPONIBLE'),
(101, 7, 1, '2018-12-30', '11:00', 'NO DISPONIBLE'),
(102, 7, 8, '2018-12-30', '11:00', 'NO DISPONIBLE'),
(103, 7, 1, '2018-12-31', '11:00', 'NO DISPONIBLE'),
(104, 7, 8, '2018-12-31', '11:00', 'NO DISPONIBLE'),
(105, 7, 1, '2019-01-01', '11:00', 'NO DISPONIBLE'),
(106, 7, 8, '2019-01-01', '11:00', 'NO DISPONIBLE'),
(107, 7, 1, '2019-01-02', '11:00', 'NO DISPONIBLE'),
(108, 7, 8, '2019-01-02', '11:00', 'NO DISPONIBLE'),
(109, 7, 1, '2019-01-03', '11:00', 'NO DISPONIBLE'),
(110, 7, 8, '2019-01-03', '11:00', 'NO DISPONIBLE'),
(111, 7, 1, '2019-01-04', '11:00', 'NO DISPONIBLE'),
(112, 7, 8, '2019-01-04', '11:00', 'NO DISPONIBLE'),
(113, 8, 2, '2019-01-05', '11:00', 'NO DISPONIBLE'),
(114, 8, 3, '2019-01-05', '11:00', 'NO DISPONIBLE'),
(115, 8, 2, '2019-01-06', '11:00', 'NO DISPONIBLE'),
(116, 8, 3, '2019-01-06', '11:00', 'NO DISPONIBLE'),
(117, 8, 2, '2019-01-07', '11:00', 'NO DISPONIBLE'),
(118, 8, 3, '2019-01-07', '11:00', 'NO DISPONIBLE'),
(119, 8, 2, '2019-01-08', '11:00', 'NO DISPONIBLE'),
(120, 8, 3, '2019-01-08', '11:00', 'NO DISPONIBLE'),
(121, 8, 2, '2019-01-09', '11:00', 'NO DISPONIBLE'),
(122, 8, 3, '2019-01-09', '11:00', 'NO DISPONIBLE'),
(123, 8, 2, '2019-01-10', '11:00', 'NO DISPONIBLE'),
(124, 8, 3, '2019-01-10', '11:00', 'NO DISPONIBLE'),
(125, 8, 2, '2019-01-11', '11:00', 'NO DISPONIBLE'),
(126, 8, 3, '2019-01-11', '11:00', 'NO DISPONIBLE'),
(127, 8, 2, '2019-01-12', '11:00', 'NO DISPONIBLE'),
(128, 8, 3, '2019-01-12', '11:00', 'NO DISPONIBLE'),
(129, 9, 2, '2019-01-13', '11:00', 'NO DISPONIBLE'),
(130, 9, 4, '2019-01-13', '11:00', 'NO DISPONIBLE'),
(131, 9, 2, '2019-01-14', '11:00', 'NO DISPONIBLE'),
(132, 9, 4, '2019-01-14', '11:00', 'NO DISPONIBLE'),
(133, 9, 2, '2019-01-15', '11:00', 'NO DISPONIBLE'),
(134, 9, 4, '2019-01-15', '11:00', 'NO DISPONIBLE'),
(135, 9, 2, '2019-01-16', '11:00', 'NO DISPONIBLE'),
(136, 9, 4, '2019-01-16', '11:00', 'NO DISPONIBLE'),
(137, 9, 2, '2019-01-17', '11:00', 'NO DISPONIBLE'),
(138, 9, 4, '2019-01-17', '11:00', 'NO DISPONIBLE'),
(139, 9, 2, '2019-01-18', '11:00', 'NO DISPONIBLE'),
(140, 9, 4, '2019-01-18', '11:00', 'NO DISPONIBLE'),
(141, 9, 2, '2019-01-19', '11:00', 'NO DISPONIBLE'),
(142, 9, 4, '2019-01-19', '11:00', 'NO DISPONIBLE'),
(143, 9, 2, '2019-01-20', '11:00', 'NO DISPONIBLE'),
(144, 9, 4, '2019-01-20', '11:00', 'NO DISPONIBLE'),
(145, 10, 2, '2019-01-21', '11:00', 'NO DISPONIBLE'),
(146, 10, 5, '2019-01-21', '11:00', 'NO DISPONIBLE'),
(147, 10, 2, '2019-01-22', '11:00', 'NO DISPONIBLE'),
(148, 10, 5, '2019-01-22', '11:00', 'NO DISPONIBLE'),
(149, 10, 2, '2019-01-23', '11:00', 'NO DISPONIBLE'),
(150, 10, 5, '2019-01-23', '11:00', 'NO DISPONIBLE'),
(151, 10, 2, '2019-01-24', '11:00', 'NO DISPONIBLE'),
(152, 10, 5, '2019-01-24', '11:00', 'NO DISPONIBLE'),
(153, 10, 2, '2019-01-25', '11:00', 'NO DISPONIBLE'),
(154, 10, 5, '2019-01-25', '11:00', 'NO DISPONIBLE'),
(155, 10, 2, '2019-01-26', '11:00', 'NO DISPONIBLE'),
(156, 10, 5, '2019-01-26', '11:00', 'NO DISPONIBLE'),
(157, 10, 2, '2019-01-27', '11:00', 'NO DISPONIBLE'),
(158, 10, 5, '2019-01-27', '11:00', 'NO DISPONIBLE'),
(159, 10, 2, '2019-01-28', '11:00', 'NO DISPONIBLE'),
(160, 10, 5, '2019-01-28', '11:00', 'NO DISPONIBLE'),
(161, 11, 2, '2019-01-29', '11:00', 'NO DISPONIBLE'),
(162, 11, 6, '2019-01-29', '11:00', 'NO DISPONIBLE'),
(163, 11, 2, '2019-01-30', '11:00', 'NO DISPONIBLE'),
(164, 11, 6, '2019-01-30', '11:00', 'NO DISPONIBLE'),
(165, 11, 2, '2019-01-31', '11:00', 'NO DISPONIBLE'),
(166, 11, 6, '2019-01-31', '11:00', 'NO DISPONIBLE'),
(167, 11, 2, '2019-02-01', '11:00', 'NO DISPONIBLE'),
(168, 11, 6, '2019-02-01', '11:00', 'NO DISPONIBLE'),
(169, 11, 2, '2019-02-02', '11:00', 'NO DISPONIBLE'),
(170, 11, 6, '2019-02-02', '11:00', 'NO DISPONIBLE'),
(171, 11, 2, '2019-02-03', '11:00', 'NO DISPONIBLE'),
(172, 11, 6, '2019-02-03', '11:00', 'NO DISPONIBLE'),
(173, 11, 2, '2019-02-04', '11:00', 'NO DISPONIBLE'),
(174, 11, 6, '2019-02-04', '11:00', 'NO DISPONIBLE'),
(175, 11, 2, '2019-02-05', '11:00', 'NO DISPONIBLE'),
(176, 11, 6, '2019-02-05', '11:00', 'NO DISPONIBLE'),
(177, 12, 2, '2019-02-06', '11:00', 'NO DISPONIBLE'),
(178, 12, 7, '2019-02-06', '11:00', 'NO DISPONIBLE'),
(179, 12, 2, '2019-02-07', '11:00', 'NO DISPONIBLE'),
(180, 12, 7, '2019-02-07', '11:00', 'NO DISPONIBLE'),
(181, 12, 2, '2019-02-08', '11:00', 'NO DISPONIBLE'),
(182, 12, 7, '2019-02-08', '11:00', 'NO DISPONIBLE'),
(183, 12, 2, '2019-02-09', '11:00', 'NO DISPONIBLE'),
(184, 12, 7, '2019-02-09', '11:00', 'NO DISPONIBLE'),
(185, 12, 2, '2019-02-10', '11:00', 'NO DISPONIBLE'),
(186, 12, 7, '2019-02-10', '11:00', 'NO DISPONIBLE'),
(187, 12, 2, '2019-02-11', '11:00', 'NO DISPONIBLE'),
(188, 12, 7, '2019-02-11', '11:00', 'NO DISPONIBLE'),
(189, 12, 2, '2019-02-12', '11:00', 'NO DISPONIBLE'),
(190, 12, 7, '2019-02-12', '11:00', 'NO DISPONIBLE'),
(191, 12, 2, '2019-02-13', '11:00', 'NO DISPONIBLE'),
(192, 12, 7, '2019-02-13', '11:00', 'NO DISPONIBLE'),
(193, 13, 2, '2019-02-14', '11:00', 'NO DISPONIBLE'),
(194, 13, 8, '2019-02-14', '11:00', 'NO DISPONIBLE'),
(195, 13, 2, '2019-02-15', '11:00', 'NO DISPONIBLE'),
(196, 13, 8, '2019-02-15', '11:00', 'NO DISPONIBLE'),
(197, 13, 2, '2019-02-16', '11:00', 'NO DISPONIBLE'),
(198, 13, 8, '2019-02-16', '11:00', 'NO DISPONIBLE'),
(199, 13, 2, '2019-02-17', '11:00', 'NO DISPONIBLE'),
(200, 13, 8, '2019-02-17', '11:00', 'NO DISPONIBLE'),
(201, 13, 2, '2019-02-18', '11:00', 'NO DISPONIBLE'),
(202, 13, 8, '2019-02-18', '11:00', 'NO DISPONIBLE'),
(203, 13, 2, '2019-02-19', '11:00', 'NO DISPONIBLE'),
(204, 13, 8, '2019-02-19', '11:00', 'NO DISPONIBLE'),
(205, 13, 2, '2019-02-20', '11:00', 'NO DISPONIBLE'),
(206, 13, 8, '2019-02-20', '11:00', 'NO DISPONIBLE'),
(207, 13, 2, '2019-02-21', '11:00', 'NO DISPONIBLE'),
(208, 13, 8, '2019-02-21', '11:00', 'NO DISPONIBLE'),
(209, 14, 3, '2019-02-22', '11:00', 'NO DISPONIBLE'),
(210, 14, 4, '2019-02-22', '11:00', 'NO DISPONIBLE'),
(211, 14, 3, '2019-02-23', '11:00', 'NO DISPONIBLE'),
(212, 14, 4, '2019-02-23', '11:00', 'NO DISPONIBLE'),
(213, 14, 3, '2019-02-24', '11:00', 'NO DISPONIBLE'),
(214, 14, 4, '2019-02-24', '11:00', 'NO DISPONIBLE'),
(215, 14, 3, '2019-02-25', '11:00', 'NO DISPONIBLE'),
(216, 14, 4, '2019-02-25', '11:00', 'NO DISPONIBLE'),
(217, 14, 3, '2019-02-26', '11:00', 'NO DISPONIBLE'),
(218, 14, 4, '2019-02-26', '11:00', 'NO DISPONIBLE'),
(219, 14, 3, '2019-02-27', '11:00', 'NO DISPONIBLE'),
(220, 14, 4, '2019-02-27', '11:00', 'NO DISPONIBLE'),
(221, 14, 3, '2019-02-28', '11:00', 'NO DISPONIBLE'),
(222, 14, 4, '2019-02-28', '11:00', 'NO DISPONIBLE'),
(223, 14, 3, '2019-03-01', '11:00', 'NO DISPONIBLE'),
(224, 14, 4, '2019-03-01', '11:00', 'NO DISPONIBLE'),
(225, 15, 3, '2019-03-02', '11:00', 'NO DISPONIBLE'),
(226, 15, 5, '2019-03-02', '11:00', 'NO DISPONIBLE'),
(227, 15, 3, '2019-03-03', '11:00', 'NO DISPONIBLE'),
(228, 15, 5, '2019-03-03', '11:00', 'NO DISPONIBLE'),
(229, 15, 3, '2019-03-04', '11:00', 'NO DISPONIBLE'),
(230, 15, 5, '2019-03-04', '11:00', 'NO DISPONIBLE'),
(231, 15, 3, '2019-03-05', '11:00', 'NO DISPONIBLE'),
(232, 15, 5, '2019-03-05', '11:00', 'NO DISPONIBLE'),
(233, 15, 3, '2019-03-06', '11:00', 'NO DISPONIBLE'),
(234, 15, 5, '2019-03-06', '11:00', 'NO DISPONIBLE'),
(235, 15, 3, '2019-03-07', '11:00', 'NO DISPONIBLE'),
(236, 15, 5, '2019-03-07', '11:00', 'NO DISPONIBLE'),
(237, 15, 3, '2019-03-08', '11:00', 'NO DISPONIBLE'),
(238, 15, 5, '2019-03-08', '11:00', 'NO DISPONIBLE'),
(239, 15, 3, '2019-03-09', '11:00', 'NO DISPONIBLE'),
(240, 15, 5, '2019-03-09', '11:00', 'NO DISPONIBLE'),
(241, 16, 3, '2019-03-10', '11:00', 'NO DISPONIBLE'),
(242, 16, 6, '2019-03-10', '11:00', 'NO DISPONIBLE'),
(243, 16, 3, '2019-03-11', '11:00', 'NO DISPONIBLE'),
(244, 16, 6, '2019-03-11', '11:00', 'NO DISPONIBLE'),
(245, 16, 3, '2019-03-12', '11:00', 'NO DISPONIBLE'),
(246, 16, 6, '2019-03-12', '11:00', 'NO DISPONIBLE'),
(247, 16, 3, '2019-03-13', '11:00', 'NO DISPONIBLE'),
(248, 16, 6, '2019-03-13', '11:00', 'NO DISPONIBLE'),
(249, 16, 3, '2019-03-14', '11:00', 'NO DISPONIBLE'),
(250, 16, 6, '2019-03-14', '11:00', 'NO DISPONIBLE'),
(251, 16, 3, '2019-03-15', '11:00', 'NO DISPONIBLE'),
(252, 16, 6, '2019-03-15', '11:00', 'NO DISPONIBLE'),
(253, 16, 3, '2019-03-16', '11:00', 'NO DISPONIBLE'),
(254, 16, 6, '2019-03-16', '11:00', 'NO DISPONIBLE'),
(255, 16, 3, '2019-03-17', '11:00', 'NO DISPONIBLE'),
(256, 16, 6, '2019-03-17', '11:00', 'NO DISPONIBLE'),
(257, 17, 3, '2019-03-18', '11:00', 'NO DISPONIBLE'),
(258, 17, 7, '2019-03-18', '11:00', 'NO DISPONIBLE'),
(259, 17, 3, '2019-03-19', '11:00', 'NO DISPONIBLE'),
(260, 17, 7, '2019-03-19', '11:00', 'NO DISPONIBLE'),
(261, 17, 3, '2019-03-20', '11:00', 'NO DISPONIBLE'),
(262, 17, 7, '2019-03-20', '11:00', 'NO DISPONIBLE'),
(263, 17, 3, '2019-03-21', '11:00', 'NO DISPONIBLE'),
(264, 17, 7, '2019-03-21', '11:00', 'NO DISPONIBLE'),
(265, 17, 3, '2019-03-22', '11:00', 'NO DISPONIBLE'),
(266, 17, 7, '2019-03-22', '11:00', 'NO DISPONIBLE'),
(267, 17, 3, '2019-03-23', '11:00', 'NO DISPONIBLE'),
(268, 17, 7, '2019-03-23', '11:00', 'NO DISPONIBLE'),
(269, 17, 3, '2019-03-24', '11:00', 'NO DISPONIBLE'),
(270, 17, 7, '2019-03-24', '11:00', 'NO DISPONIBLE'),
(271, 17, 3, '2019-03-25', '11:00', 'NO DISPONIBLE'),
(272, 17, 7, '2019-03-25', '11:00', 'NO DISPONIBLE'),
(273, 18, 3, '2019-03-26', '11:00', 'NO DISPONIBLE'),
(274, 18, 8, '2019-03-26', '11:00', 'NO DISPONIBLE'),
(275, 18, 3, '2019-03-27', '11:00', 'NO DISPONIBLE'),
(276, 18, 8, '2019-03-27', '11:00', 'NO DISPONIBLE'),
(277, 18, 3, '2019-03-28', '11:00', 'NO DISPONIBLE'),
(278, 18, 8, '2019-03-28', '11:00', 'NO DISPONIBLE'),
(279, 18, 3, '2019-03-29', '11:00', 'NO DISPONIBLE'),
(280, 18, 8, '2019-03-29', '11:00', 'NO DISPONIBLE'),
(281, 18, 3, '2019-03-30', '11:00', 'NO DISPONIBLE'),
(282, 18, 8, '2019-03-30', '11:00', 'NO DISPONIBLE'),
(283, 18, 3, '2019-03-31', '11:00', 'NO DISPONIBLE'),
(284, 18, 8, '2019-03-31', '11:00', 'NO DISPONIBLE'),
(285, 18, 3, '2019-04-01', '11:00', 'NO DISPONIBLE'),
(286, 18, 8, '2019-04-01', '11:00', 'NO DISPONIBLE'),
(287, 18, 3, '2019-04-02', '11:00', 'NO DISPONIBLE'),
(288, 18, 8, '2019-04-02', '11:00', 'NO DISPONIBLE'),
(289, 19, 4, '2019-04-03', '11:00', 'NO DISPONIBLE'),
(290, 19, 5, '2019-04-03', '11:00', 'NO DISPONIBLE'),
(291, 19, 4, '2019-04-04', '11:00', 'NO DISPONIBLE'),
(292, 19, 5, '2019-04-04', '11:00', 'NO DISPONIBLE'),
(293, 19, 4, '2019-04-05', '11:00', 'NO DISPONIBLE'),
(294, 19, 5, '2019-04-05', '11:00', 'NO DISPONIBLE'),
(295, 19, 4, '2019-04-06', '11:00', 'NO DISPONIBLE'),
(296, 19, 5, '2019-04-06', '11:00', 'NO DISPONIBLE'),
(297, 19, 4, '2019-04-07', '11:00', 'NO DISPONIBLE'),
(298, 19, 5, '2019-04-07', '11:00', 'NO DISPONIBLE'),
(299, 19, 4, '2019-04-08', '11:00', 'NO DISPONIBLE'),
(300, 19, 5, '2019-04-08', '11:00', 'NO DISPONIBLE'),
(301, 19, 4, '2019-04-09', '11:00', 'NO DISPONIBLE'),
(302, 19, 5, '2019-04-09', '11:00', 'NO DISPONIBLE'),
(303, 19, 4, '2019-04-10', '11:00', 'NO DISPONIBLE'),
(304, 19, 5, '2019-04-10', '11:00', 'NO DISPONIBLE'),
(305, 20, 4, '2019-04-11', '11:00', 'NO DISPONIBLE'),
(306, 20, 6, '2019-04-11', '11:00', 'NO DISPONIBLE'),
(307, 20, 4, '2019-04-12', '11:00', 'NO DISPONIBLE'),
(308, 20, 6, '2019-04-12', '11:00', 'NO DISPONIBLE'),
(309, 20, 4, '2019-04-13', '11:00', 'NO DISPONIBLE'),
(310, 20, 6, '2019-04-13', '11:00', 'NO DISPONIBLE'),
(311, 20, 4, '2019-04-14', '11:00', 'NO DISPONIBLE'),
(312, 20, 6, '2019-04-14', '11:00', 'NO DISPONIBLE'),
(313, 20, 4, '2019-04-15', '11:00', 'NO DISPONIBLE'),
(314, 20, 6, '2019-04-15', '11:00', 'NO DISPONIBLE'),
(315, 20, 4, '2019-04-16', '11:00', 'NO DISPONIBLE'),
(316, 20, 6, '2019-04-16', '11:00', 'NO DISPONIBLE'),
(317, 20, 4, '2019-04-17', '11:00', 'NO DISPONIBLE'),
(318, 20, 6, '2019-04-17', '11:00', 'NO DISPONIBLE'),
(319, 20, 4, '2019-04-18', '11:00', 'NO DISPONIBLE'),
(320, 20, 6, '2019-04-18', '11:00', 'NO DISPONIBLE'),
(321, 21, 4, '2019-04-19', '11:00', 'NO DISPONIBLE'),
(322, 21, 7, '2019-04-19', '11:00', 'NO DISPONIBLE'),
(323, 21, 4, '2019-04-20', '11:00', 'NO DISPONIBLE'),
(324, 21, 7, '2019-04-20', '11:00', 'NO DISPONIBLE'),
(325, 21, 4, '2019-04-21', '11:00', 'NO DISPONIBLE'),
(326, 21, 7, '2019-04-21', '11:00', 'NO DISPONIBLE'),
(327, 21, 4, '2019-04-22', '11:00', 'NO DISPONIBLE'),
(328, 21, 7, '2019-04-22', '11:00', 'NO DISPONIBLE'),
(329, 21, 4, '2019-04-23', '11:00', 'NO DISPONIBLE'),
(330, 21, 7, '2019-04-23', '11:00', 'NO DISPONIBLE'),
(331, 21, 4, '2019-04-24', '11:00', 'NO DISPONIBLE'),
(332, 21, 7, '2019-04-24', '11:00', 'NO DISPONIBLE'),
(333, 21, 4, '2019-04-25', '11:00', 'NO DISPONIBLE'),
(334, 21, 7, '2019-04-25', '11:00', 'NO DISPONIBLE'),
(335, 21, 4, '2019-04-26', '11:00', 'NO DISPONIBLE'),
(336, 21, 7, '2019-04-26', '11:00', 'NO DISPONIBLE'),
(337, 22, 4, '2019-04-27', '11:00', 'NO DISPONIBLE'),
(338, 22, 8, '2019-04-27', '11:00', 'NO DISPONIBLE'),
(339, 22, 4, '2019-04-28', '11:00', 'NO DISPONIBLE'),
(340, 22, 8, '2019-04-28', '11:00', 'NO DISPONIBLE'),
(341, 22, 4, '2019-04-29', '11:00', 'NO DISPONIBLE'),
(342, 22, 8, '2019-04-29', '11:00', 'NO DISPONIBLE'),
(343, 22, 4, '2019-04-30', '11:00', 'NO DISPONIBLE'),
(344, 22, 8, '2019-04-30', '11:00', 'NO DISPONIBLE'),
(345, 22, 4, '2019-05-01', '11:00', 'NO DISPONIBLE'),
(346, 22, 8, '2019-05-01', '11:00', 'NO DISPONIBLE'),
(347, 22, 4, '2019-05-02', '11:00', 'NO DISPONIBLE'),
(348, 22, 8, '2019-05-02', '11:00', 'NO DISPONIBLE'),
(349, 22, 4, '2019-05-03', '11:00', 'NO DISPONIBLE'),
(350, 22, 8, '2019-05-03', '11:00', 'NO DISPONIBLE'),
(351, 22, 4, '2019-05-04', '11:00', 'NO DISPONIBLE'),
(352, 22, 8, '2019-05-04', '11:00', 'NO DISPONIBLE'),
(353, 23, 5, '2019-05-05', '11:00', 'NO DISPONIBLE'),
(354, 23, 6, '2019-05-05', '11:00', 'NO DISPONIBLE'),
(355, 23, 5, '2019-05-06', '11:00', 'NO DISPONIBLE'),
(356, 23, 6, '2019-05-06', '11:00', 'NO DISPONIBLE'),
(357, 23, 5, '2019-05-07', '11:00', 'NO DISPONIBLE'),
(358, 23, 6, '2019-05-07', '11:00', 'NO DISPONIBLE'),
(359, 23, 5, '2019-05-08', '11:00', 'NO DISPONIBLE'),
(360, 23, 6, '2019-05-08', '11:00', 'NO DISPONIBLE'),
(361, 23, 5, '2019-05-09', '11:00', 'NO DISPONIBLE'),
(362, 23, 6, '2019-05-09', '11:00', 'NO DISPONIBLE'),
(363, 23, 5, '2019-05-10', '11:00', 'NO DISPONIBLE'),
(364, 23, 6, '2019-05-10', '11:00', 'NO DISPONIBLE'),
(365, 23, 5, '2019-05-11', '11:00', 'NO DISPONIBLE'),
(366, 23, 6, '2019-05-11', '11:00', 'NO DISPONIBLE'),
(367, 23, 5, '2019-05-12', '11:00', 'NO DISPONIBLE'),
(368, 23, 6, '2019-05-12', '11:00', 'NO DISPONIBLE'),
(369, 24, 5, '2019-05-13', '11:00', 'NO DISPONIBLE'),
(370, 24, 7, '2019-05-13', '11:00', 'NO DISPONIBLE'),
(371, 24, 5, '2019-05-14', '11:00', 'NO DISPONIBLE'),
(372, 24, 7, '2019-05-14', '11:00', 'NO DISPONIBLE'),
(373, 24, 5, '2019-05-15', '11:00', 'NO DISPONIBLE'),
(374, 24, 7, '2019-05-15', '11:00', 'NO DISPONIBLE'),
(375, 24, 5, '2019-05-16', '11:00', 'NO DISPONIBLE'),
(376, 24, 7, '2019-05-16', '11:00', 'NO DISPONIBLE'),
(377, 24, 5, '2019-05-17', '11:00', 'NO DISPONIBLE'),
(378, 24, 7, '2019-05-17', '11:00', 'NO DISPONIBLE'),
(379, 24, 5, '2019-05-18', '11:00', 'NO DISPONIBLE'),
(380, 24, 7, '2019-05-18', '11:00', 'NO DISPONIBLE'),
(381, 24, 5, '2019-05-19', '11:00', 'NO DISPONIBLE'),
(382, 24, 7, '2019-05-19', '11:00', 'NO DISPONIBLE'),
(383, 24, 5, '2019-05-20', '11:00', 'NO DISPONIBLE'),
(384, 24, 7, '2019-05-20', '11:00', 'NO DISPONIBLE'),
(385, 25, 5, '2019-05-21', '11:00', 'NO DISPONIBLE'),
(386, 25, 8, '2019-05-21', '11:00', 'NO DISPONIBLE'),
(387, 25, 5, '2019-05-22', '11:00', 'NO DISPONIBLE'),
(388, 25, 8, '2019-05-22', '11:00', 'NO DISPONIBLE'),
(389, 25, 5, '2019-05-23', '11:00', 'NO DISPONIBLE'),
(390, 25, 8, '2019-05-23', '11:00', 'NO DISPONIBLE'),
(391, 25, 5, '2019-05-24', '11:00', 'NO DISPONIBLE'),
(392, 25, 8, '2019-05-24', '11:00', 'NO DISPONIBLE'),
(393, 25, 5, '2019-05-25', '11:00', 'NO DISPONIBLE'),
(394, 25, 8, '2019-05-25', '11:00', 'NO DISPONIBLE'),
(395, 25, 5, '2019-05-26', '11:00', 'NO DISPONIBLE'),
(396, 25, 8, '2019-05-26', '11:00', 'NO DISPONIBLE'),
(397, 25, 5, '2019-05-27', '11:00', 'NO DISPONIBLE'),
(398, 25, 8, '2019-05-27', '11:00', 'NO DISPONIBLE'),
(399, 25, 5, '2019-05-28', '11:00', 'NO DISPONIBLE'),
(400, 25, 8, '2019-05-28', '11:00', 'NO DISPONIBLE'),
(401, 26, 6, '2019-05-29', '11:00', 'NO DISPONIBLE'),
(402, 26, 7, '2019-05-29', '11:00', 'NO DISPONIBLE'),
(403, 26, 6, '2019-05-30', '11:00', 'NO DISPONIBLE'),
(404, 26, 7, '2019-05-30', '11:00', 'NO DISPONIBLE'),
(405, 26, 6, '2019-05-31', '11:00', 'NO DISPONIBLE'),
(406, 26, 7, '2019-05-31', '11:00', 'NO DISPONIBLE'),
(407, 26, 6, '2019-06-01', '11:00', 'NO DISPONIBLE'),
(408, 26, 7, '2019-06-01', '11:00', 'NO DISPONIBLE'),
(409, 26, 6, '2019-06-02', '11:00', 'NO DISPONIBLE'),
(410, 26, 7, '2019-06-02', '11:00', 'NO DISPONIBLE'),
(411, 26, 6, '2019-06-03', '11:00', 'NO DISPONIBLE'),
(412, 26, 7, '2019-06-03', '11:00', 'NO DISPONIBLE'),
(413, 26, 6, '2019-06-04', '11:00', 'NO DISPONIBLE'),
(414, 26, 7, '2019-06-04', '11:00', 'NO DISPONIBLE'),
(415, 26, 6, '2019-06-05', '11:00', 'NO DISPONIBLE'),
(416, 26, 7, '2019-06-05', '11:00', 'NO DISPONIBLE'),
(417, 27, 6, '2019-06-06', '11:00', 'NO DISPONIBLE'),
(418, 27, 8, '2019-06-06', '11:00', 'NO DISPONIBLE'),
(419, 27, 6, '2019-06-07', '11:00', 'NO DISPONIBLE'),
(420, 27, 8, '2019-06-07', '11:00', 'NO DISPONIBLE'),
(421, 27, 6, '2019-06-08', '11:00', 'NO DISPONIBLE'),
(422, 27, 8, '2019-06-08', '11:00', 'NO DISPONIBLE'),
(423, 27, 6, '2019-06-09', '11:00', 'NO DISPONIBLE'),
(424, 27, 8, '2019-06-09', '11:00', 'NO DISPONIBLE'),
(425, 27, 6, '2019-06-10', '11:00', 'NO DISPONIBLE'),
(426, 27, 8, '2019-06-10', '11:00', 'NO DISPONIBLE'),
(427, 27, 6, '2019-06-11', '11:00', 'NO DISPONIBLE'),
(428, 27, 8, '2019-06-11', '11:00', 'NO DISPONIBLE'),
(429, 27, 6, '2019-06-12', '11:00', 'NO DISPONIBLE'),
(430, 27, 8, '2019-06-12', '11:00', 'NO DISPONIBLE'),
(431, 27, 6, '2019-06-13', '11:00', 'NO DISPONIBLE'),
(432, 27, 8, '2019-06-13', '11:00', 'NO DISPONIBLE'),
(433, 28, 7, '2019-06-14', '11:00', 'NO DISPONIBLE'),
(434, 28, 8, '2019-06-14', '11:00', 'NO DISPONIBLE'),
(435, 28, 7, '2019-06-15', '11:00', 'NO DISPONIBLE'),
(436, 28, 8, '2019-06-15', '11:00', 'NO DISPONIBLE'),
(437, 28, 7, '2019-06-16', '11:00', 'NO DISPONIBLE'),
(438, 28, 8, '2019-06-16', '11:00', 'NO DISPONIBLE'),
(439, 28, 7, '2019-06-17', '11:00', 'NO DISPONIBLE'),
(440, 28, 8, '2019-06-17', '11:00', 'NO DISPONIBLE'),
(441, 28, 7, '2019-06-18', '11:00', 'NO DISPONIBLE'),
(442, 28, 8, '2019-06-18', '11:00', 'NO DISPONIBLE'),
(443, 28, 7, '2019-06-19', '11:00', 'NO DISPONIBLE'),
(444, 28, 8, '2019-06-19', '11:00', 'NO DISPONIBLE'),
(445, 28, 7, '2019-06-20', '11:00', 'NO DISPONIBLE'),
(446, 28, 8, '2019-06-20', '11:00', 'NO DISPONIBLE'),
(447, 28, 7, '2019-06-21', '11:00', 'NO DISPONIBLE'),
(448, 28, 8, '2019-06-21', '11:00', 'NO DISPONIBLE'),
(449, 29, 9, '2019-06-22', '11:00', 'NO DISPONIBLE'),
(450, 29, 10, '2019-06-22', '11:00', 'NO DISPONIBLE'),
(451, 29, 9, '2019-06-23', '11:00', 'NO DISPONIBLE'),
(452, 29, 10, '2019-06-23', '11:00', 'NO DISPONIBLE'),
(453, 29, 9, '2019-06-24', '11:00', 'NO DISPONIBLE'),
(454, 29, 10, '2019-06-24', '11:00', 'NO DISPONIBLE'),
(455, 29, 9, '2019-06-25', '11:00', 'NO DISPONIBLE'),
(456, 29, 10, '2019-06-25', '11:00', 'NO DISPONIBLE'),
(457, 29, 9, '2019-06-26', '11:00', 'NO DISPONIBLE'),
(458, 29, 10, '2019-06-26', '11:00', 'NO DISPONIBLE'),
(459, 29, 9, '2019-06-27', '11:00', 'NO DISPONIBLE'),
(460, 29, 10, '2019-06-27', '11:00', 'NO DISPONIBLE'),
(461, 29, 9, '2019-06-28', '11:00', 'NO DISPONIBLE'),
(462, 29, 10, '2019-06-28', '11:00', 'NO DISPONIBLE'),
(463, 29, 9, '2019-06-29', '11:00', 'NO DISPONIBLE'),
(464, 29, 10, '2019-06-29', '11:00', 'NO DISPONIBLE'),
(465, 30, 9, '2019-06-30', '11:00', 'NO DISPONIBLE'),
(466, 30, 11, '2019-06-30', '11:00', 'NO DISPONIBLE'),
(467, 30, 9, '2019-07-01', '11:00', 'NO DISPONIBLE'),
(468, 30, 11, '2019-07-01', '11:00', 'NO DISPONIBLE'),
(469, 30, 9, '2019-07-02', '11:00', 'NO DISPONIBLE'),
(470, 30, 11, '2019-07-02', '11:00', 'NO DISPONIBLE'),
(471, 30, 9, '2019-07-03', '11:00', 'NO DISPONIBLE'),
(472, 30, 11, '2019-07-03', '11:00', 'NO DISPONIBLE'),
(473, 30, 9, '2019-07-04', '11:00', 'NO DISPONIBLE'),
(474, 30, 11, '2019-07-04', '11:00', 'NO DISPONIBLE'),
(475, 30, 9, '2019-07-05', '11:00', 'NO DISPONIBLE'),
(476, 30, 11, '2019-07-05', '11:00', 'NO DISPONIBLE'),
(477, 30, 9, '2019-07-06', '11:00', 'NO DISPONIBLE'),
(478, 30, 11, '2019-07-06', '11:00', 'NO DISPONIBLE'),
(479, 30, 9, '2019-07-07', '11:00', 'NO DISPONIBLE'),
(480, 30, 11, '2019-07-07', '11:00', 'NO DISPONIBLE'),
(481, 31, 9, '2019-07-08', '11:00', 'NO DISPONIBLE'),
(482, 31, 12, '2019-07-08', '11:00', 'NO DISPONIBLE'),
(483, 31, 9, '2019-07-09', '11:00', 'NO DISPONIBLE'),
(484, 31, 12, '2019-07-09', '11:00', 'NO DISPONIBLE'),
(485, 31, 9, '2019-07-10', '11:00', 'NO DISPONIBLE'),
(486, 31, 12, '2019-07-10', '11:00', 'NO DISPONIBLE'),
(487, 31, 9, '2019-07-11', '11:00', 'NO DISPONIBLE'),
(488, 31, 12, '2019-07-11', '11:00', 'NO DISPONIBLE'),
(489, 31, 9, '2019-07-12', '11:00', 'NO DISPONIBLE'),
(490, 31, 12, '2019-07-12', '11:00', 'NO DISPONIBLE'),
(491, 31, 9, '2019-07-13', '11:00', 'NO DISPONIBLE'),
(492, 31, 12, '2019-07-13', '11:00', 'NO DISPONIBLE'),
(493, 31, 9, '2019-07-14', '11:00', 'NO DISPONIBLE'),
(494, 31, 12, '2019-07-14', '11:00', 'NO DISPONIBLE'),
(495, 31, 9, '2019-07-15', '11:00', 'NO DISPONIBLE'),
(496, 31, 12, '2019-07-15', '11:00', 'NO DISPONIBLE'),
(497, 32, 9, '2019-07-16', '11:00', 'NO DISPONIBLE'),
(498, 32, 13, '2019-07-16', '11:00', 'NO DISPONIBLE'),
(499, 32, 9, '2019-07-17', '11:00', 'NO DISPONIBLE'),
(500, 32, 13, '2019-07-17', '11:00', 'NO DISPONIBLE'),
(501, 32, 9, '2019-07-18', '11:00', 'NO DISPONIBLE'),
(502, 32, 13, '2019-07-18', '11:00', 'NO DISPONIBLE'),
(503, 32, 9, '2019-07-19', '11:00', 'NO DISPONIBLE'),
(504, 32, 13, '2019-07-19', '11:00', 'NO DISPONIBLE'),
(505, 32, 9, '2019-07-20', '11:00', 'NO DISPONIBLE'),
(506, 32, 13, '2019-07-20', '11:00', 'NO DISPONIBLE'),
(507, 32, 9, '2019-07-21', '11:00', 'NO DISPONIBLE'),
(508, 32, 13, '2019-07-21', '11:00', 'NO DISPONIBLE'),
(509, 32, 9, '2019-07-22', '11:00', 'NO DISPONIBLE'),
(510, 32, 13, '2019-07-22', '11:00', 'NO DISPONIBLE'),
(511, 32, 9, '2019-07-23', '11:00', 'NO DISPONIBLE'),
(512, 32, 13, '2019-07-23', '11:00', 'NO DISPONIBLE'),
(513, 33, 9, '2019-07-24', '11:00', 'NO DISPONIBLE'),
(514, 33, 14, '2019-07-24', '11:00', 'NO DISPONIBLE'),
(515, 33, 9, '2019-07-25', '11:00', 'NO DISPONIBLE'),
(516, 33, 14, '2019-07-25', '11:00', 'NO DISPONIBLE'),
(517, 33, 9, '2019-07-26', '11:00', 'NO DISPONIBLE'),
(518, 33, 14, '2019-07-26', '11:00', 'NO DISPONIBLE'),
(519, 33, 9, '2019-07-27', '11:00', 'NO DISPONIBLE'),
(520, 33, 14, '2019-07-27', '11:00', 'NO DISPONIBLE'),
(521, 33, 9, '2019-07-28', '11:00', 'NO DISPONIBLE'),
(522, 33, 14, '2019-07-28', '11:00', 'NO DISPONIBLE'),
(523, 33, 9, '2019-07-29', '11:00', 'NO DISPONIBLE'),
(524, 33, 14, '2019-07-29', '11:00', 'NO DISPONIBLE'),
(525, 33, 9, '2019-07-30', '11:00', 'NO DISPONIBLE'),
(526, 33, 14, '2019-07-30', '11:00', 'NO DISPONIBLE'),
(527, 33, 9, '2019-07-31', '11:00', 'NO DISPONIBLE'),
(528, 33, 14, '2019-07-31', '11:00', 'NO DISPONIBLE'),
(529, 34, 9, '2019-08-01', '11:00', 'NO DISPONIBLE'),
(530, 34, 15, '2019-08-01', '11:00', 'NO DISPONIBLE'),
(531, 34, 9, '2019-08-02', '11:00', 'NO DISPONIBLE'),
(532, 34, 15, '2019-08-02', '11:00', 'NO DISPONIBLE'),
(533, 34, 9, '2019-08-03', '11:00', 'NO DISPONIBLE'),
(534, 34, 15, '2019-08-03', '11:00', 'NO DISPONIBLE'),
(535, 34, 9, '2019-08-04', '11:00', 'NO DISPONIBLE'),
(536, 34, 15, '2019-08-04', '11:00', 'NO DISPONIBLE'),
(537, 34, 9, '2019-08-05', '11:00', 'NO DISPONIBLE'),
(538, 34, 15, '2019-08-05', '11:00', 'NO DISPONIBLE'),
(539, 34, 9, '2019-08-06', '11:00', 'NO DISPONIBLE'),
(540, 34, 15, '2019-08-06', '11:00', 'NO DISPONIBLE'),
(541, 34, 9, '2019-08-07', '11:00', 'NO DISPONIBLE'),
(542, 34, 15, '2019-08-07', '11:00', 'NO DISPONIBLE'),
(543, 34, 9, '2019-08-08', '11:00', 'NO DISPONIBLE'),
(544, 34, 15, '2019-08-08', '11:00', 'NO DISPONIBLE'),
(545, 35, 9, '2019-08-09', '11:00', 'NO DISPONIBLE'),
(546, 35, 16, '2019-08-09', '11:00', 'NO DISPONIBLE'),
(547, 35, 9, '2019-08-10', '11:00', 'NO DISPONIBLE'),
(548, 35, 16, '2019-08-10', '11:00', 'NO DISPONIBLE'),
(549, 35, 9, '2019-08-11', '11:00', 'NO DISPONIBLE'),
(550, 35, 16, '2019-08-11', '11:00', 'NO DISPONIBLE'),
(551, 35, 9, '2019-08-12', '11:00', 'NO DISPONIBLE'),
(552, 35, 16, '2019-08-12', '11:00', 'NO DISPONIBLE'),
(553, 35, 9, '2019-08-13', '11:00', 'NO DISPONIBLE'),
(554, 35, 16, '2019-08-13', '11:00', 'NO DISPONIBLE'),
(555, 35, 9, '2019-08-14', '11:00', 'NO DISPONIBLE'),
(556, 35, 16, '2019-08-14', '11:00', 'NO DISPONIBLE'),
(557, 35, 9, '2019-08-15', '11:00', 'NO DISPONIBLE'),
(558, 35, 16, '2019-08-15', '11:00', 'NO DISPONIBLE'),
(559, 35, 9, '2019-08-16', '11:00', 'NO DISPONIBLE'),
(560, 35, 16, '2019-08-16', '11:00', 'NO DISPONIBLE'),
(561, 36, 10, '2019-08-17', '11:00', 'NO DISPONIBLE'),
(562, 36, 11, '2019-08-17', '11:00', 'NO DISPONIBLE'),
(563, 36, 10, '2019-08-18', '11:00', 'NO DISPONIBLE'),
(564, 36, 11, '2019-08-18', '11:00', 'NO DISPONIBLE'),
(565, 36, 10, '2019-08-19', '11:00', 'NO DISPONIBLE'),
(566, 36, 11, '2019-08-19', '11:00', 'NO DISPONIBLE'),
(567, 36, 10, '2019-08-20', '11:00', 'NO DISPONIBLE'),
(568, 36, 11, '2019-08-20', '11:00', 'NO DISPONIBLE'),
(569, 36, 10, '2019-08-21', '11:00', 'NO DISPONIBLE'),
(570, 36, 11, '2019-08-21', '11:00', 'NO DISPONIBLE'),
(571, 36, 10, '2019-08-22', '11:00', 'NO DISPONIBLE'),
(572, 36, 11, '2019-08-22', '11:00', 'NO DISPONIBLE'),
(573, 36, 10, '2019-08-23', '11:00', 'NO DISPONIBLE'),
(574, 36, 11, '2019-08-23', '11:00', 'NO DISPONIBLE'),
(575, 36, 10, '2019-08-24', '11:00', 'NO DISPONIBLE'),
(576, 36, 11, '2019-08-24', '11:00', 'NO DISPONIBLE'),
(577, 37, 10, '2019-08-25', '11:00', 'NO DISPONIBLE'),
(578, 37, 12, '2019-08-25', '11:00', 'NO DISPONIBLE'),
(579, 37, 10, '2019-08-26', '11:00', 'NO DISPONIBLE'),
(580, 37, 12, '2019-08-26', '11:00', 'NO DISPONIBLE'),
(581, 37, 10, '2019-08-27', '11:00', 'NO DISPONIBLE'),
(582, 37, 12, '2019-08-27', '11:00', 'NO DISPONIBLE'),
(583, 37, 10, '2019-08-28', '11:00', 'NO DISPONIBLE'),
(584, 37, 12, '2019-08-28', '11:00', 'NO DISPONIBLE'),
(585, 37, 10, '2019-08-29', '11:00', 'NO DISPONIBLE'),
(586, 37, 12, '2019-08-29', '11:00', 'NO DISPONIBLE'),
(587, 37, 10, '2019-08-30', '11:00', 'NO DISPONIBLE'),
(588, 37, 12, '2019-08-30', '11:00', 'NO DISPONIBLE'),
(589, 37, 10, '2019-08-31', '11:00', 'NO DISPONIBLE'),
(590, 37, 12, '2019-08-31', '11:00', 'NO DISPONIBLE'),
(591, 37, 10, '2019-09-01', '11:00', 'NO DISPONIBLE'),
(592, 37, 12, '2019-09-01', '11:00', 'NO DISPONIBLE'),
(593, 38, 10, '2019-09-02', '11:00', 'NO DISPONIBLE'),
(594, 38, 13, '2019-09-02', '11:00', 'NO DISPONIBLE'),
(595, 38, 10, '2019-09-03', '11:00', 'NO DISPONIBLE'),
(596, 38, 13, '2019-09-03', '11:00', 'NO DISPONIBLE'),
(597, 38, 10, '2019-09-04', '11:00', 'NO DISPONIBLE'),
(598, 38, 13, '2019-09-04', '11:00', 'NO DISPONIBLE'),
(599, 38, 10, '2019-09-05', '11:00', 'NO DISPONIBLE'),
(600, 38, 13, '2019-09-05', '11:00', 'NO DISPONIBLE'),
(601, 38, 10, '2019-09-06', '11:00', 'NO DISPONIBLE'),
(602, 38, 13, '2019-09-06', '11:00', 'NO DISPONIBLE'),
(603, 38, 10, '2019-09-07', '11:00', 'NO DISPONIBLE'),
(604, 38, 13, '2019-09-07', '11:00', 'NO DISPONIBLE'),
(605, 38, 10, '2019-09-08', '11:00', 'NO DISPONIBLE'),
(606, 38, 13, '2019-09-08', '11:00', 'NO DISPONIBLE'),
(607, 38, 10, '2019-09-09', '11:00', 'NO DISPONIBLE'),
(608, 38, 13, '2019-09-09', '11:00', 'NO DISPONIBLE'),
(609, 39, 10, '2019-09-10', '11:00', 'NO DISPONIBLE'),
(610, 39, 14, '2019-09-10', '11:00', 'NO DISPONIBLE'),
(611, 39, 10, '2019-09-11', '11:00', 'NO DISPONIBLE'),
(612, 39, 14, '2019-09-11', '11:00', 'NO DISPONIBLE'),
(613, 39, 10, '2019-09-12', '11:00', 'NO DISPONIBLE'),
(614, 39, 14, '2019-09-12', '11:00', 'NO DISPONIBLE'),
(615, 39, 10, '2019-09-13', '11:00', 'NO DISPONIBLE'),
(616, 39, 14, '2019-09-13', '11:00', 'NO DISPONIBLE'),
(617, 39, 10, '2019-09-14', '11:00', 'NO DISPONIBLE'),
(618, 39, 14, '2019-09-14', '11:00', 'NO DISPONIBLE'),
(619, 39, 10, '2019-09-15', '11:00', 'NO DISPONIBLE'),
(620, 39, 14, '2019-09-15', '11:00', 'NO DISPONIBLE'),
(621, 39, 10, '2019-09-16', '11:00', 'NO DISPONIBLE'),
(622, 39, 14, '2019-09-16', '11:00', 'NO DISPONIBLE'),
(623, 39, 10, '2019-09-17', '11:00', 'NO DISPONIBLE'),
(624, 39, 14, '2019-09-17', '11:00', 'NO DISPONIBLE'),
(625, 40, 10, '2019-09-18', '11:00', 'NO DISPONIBLE'),
(626, 40, 15, '2019-09-18', '11:00', 'NO DISPONIBLE'),
(627, 40, 10, '2019-09-19', '11:00', 'NO DISPONIBLE'),
(628, 40, 15, '2019-09-19', '11:00', 'NO DISPONIBLE'),
(629, 40, 10, '2019-09-20', '11:00', 'NO DISPONIBLE'),
(630, 40, 15, '2019-09-20', '11:00', 'NO DISPONIBLE'),
(631, 40, 10, '2019-09-21', '11:00', 'NO DISPONIBLE'),
(632, 40, 15, '2019-09-21', '11:00', 'NO DISPONIBLE'),
(633, 40, 10, '2019-09-22', '11:00', 'NO DISPONIBLE'),
(634, 40, 15, '2019-09-22', '11:00', 'NO DISPONIBLE'),
(635, 40, 10, '2019-09-23', '11:00', 'NO DISPONIBLE'),
(636, 40, 15, '2019-09-23', '11:00', 'NO DISPONIBLE'),
(637, 40, 10, '2019-09-24', '11:00', 'NO DISPONIBLE'),
(638, 40, 15, '2019-09-24', '11:00', 'NO DISPONIBLE'),
(639, 40, 10, '2019-09-25', '11:00', 'NO DISPONIBLE'),
(640, 40, 15, '2019-09-25', '11:00', 'NO DISPONIBLE'),
(641, 41, 10, '2019-09-26', '11:00', 'NO DISPONIBLE'),
(642, 41, 16, '2019-09-26', '11:00', 'NO DISPONIBLE'),
(643, 41, 10, '2019-09-27', '11:00', 'NO DISPONIBLE'),
(644, 41, 16, '2019-09-27', '11:00', 'NO DISPONIBLE'),
(645, 41, 10, '2019-09-28', '11:00', 'NO DISPONIBLE'),
(646, 41, 16, '2019-09-28', '11:00', 'NO DISPONIBLE'),
(647, 41, 10, '2019-09-29', '11:00', 'NO DISPONIBLE'),
(648, 41, 16, '2019-09-29', '11:00', 'NO DISPONIBLE'),
(649, 41, 10, '2019-09-30', '11:00', 'NO DISPONIBLE'),
(650, 41, 16, '2019-09-30', '11:00', 'NO DISPONIBLE'),
(651, 41, 10, '2019-10-01', '11:00', 'NO DISPONIBLE'),
(652, 41, 16, '2019-10-01', '11:00', 'NO DISPONIBLE'),
(653, 41, 10, '2019-10-02', '11:00', 'NO DISPONIBLE'),
(654, 41, 16, '2019-10-02', '11:00', 'NO DISPONIBLE'),
(655, 41, 10, '2019-10-03', '11:00', 'NO DISPONIBLE'),
(656, 41, 16, '2019-10-03', '11:00', 'NO DISPONIBLE'),
(657, 42, 11, '2019-10-04', '11:00', 'NO DISPONIBLE'),
(658, 42, 12, '2019-10-04', '11:00', 'NO DISPONIBLE'),
(659, 42, 11, '2019-10-05', '11:00', 'NO DISPONIBLE'),
(660, 42, 12, '2019-10-05', '11:00', 'NO DISPONIBLE'),
(661, 42, 11, '2019-10-06', '11:00', 'NO DISPONIBLE'),
(662, 42, 12, '2019-10-06', '11:00', 'NO DISPONIBLE'),
(663, 42, 11, '2019-10-07', '11:00', 'NO DISPONIBLE'),
(664, 42, 12, '2019-10-07', '11:00', 'NO DISPONIBLE'),
(665, 42, 11, '2019-10-08', '11:00', 'NO DISPONIBLE'),
(666, 42, 12, '2019-10-08', '11:00', 'NO DISPONIBLE'),
(667, 42, 11, '2019-10-09', '11:00', 'NO DISPONIBLE'),
(668, 42, 12, '2019-10-09', '11:00', 'NO DISPONIBLE'),
(669, 42, 11, '2019-10-10', '11:00', 'NO DISPONIBLE'),
(670, 42, 12, '2019-10-10', '11:00', 'NO DISPONIBLE'),
(671, 42, 11, '2019-10-11', '11:00', 'NO DISPONIBLE'),
(672, 42, 12, '2019-10-11', '11:00', 'NO DISPONIBLE'),
(673, 43, 11, '2019-10-12', '11:00', 'NO DISPONIBLE'),
(674, 43, 13, '2019-10-12', '11:00', 'NO DISPONIBLE'),
(675, 43, 11, '2019-10-13', '11:00', 'NO DISPONIBLE'),
(676, 43, 13, '2019-10-13', '11:00', 'NO DISPONIBLE'),
(677, 43, 11, '2019-10-14', '11:00', 'NO DISPONIBLE'),
(678, 43, 13, '2019-10-14', '11:00', 'NO DISPONIBLE'),
(679, 43, 11, '2019-10-15', '11:00', 'NO DISPONIBLE'),
(680, 43, 13, '2019-10-15', '11:00', 'NO DISPONIBLE'),
(681, 43, 11, '2019-10-16', '11:00', 'NO DISPONIBLE'),
(682, 43, 13, '2019-10-16', '11:00', 'NO DISPONIBLE'),
(683, 43, 11, '2019-10-17', '11:00', 'NO DISPONIBLE'),
(684, 43, 13, '2019-10-17', '11:00', 'NO DISPONIBLE'),
(685, 43, 11, '2019-10-18', '11:00', 'NO DISPONIBLE'),
(686, 43, 13, '2019-10-18', '11:00', 'NO DISPONIBLE'),
(687, 43, 11, '2019-10-19', '11:00', 'NO DISPONIBLE'),
(688, 43, 13, '2019-10-19', '11:00', 'NO DISPONIBLE'),
(689, 44, 11, '2019-10-20', '11:00', 'NO DISPONIBLE'),
(690, 44, 14, '2019-10-20', '11:00', 'NO DISPONIBLE'),
(691, 44, 11, '2019-10-21', '11:00', 'NO DISPONIBLE'),
(692, 44, 14, '2019-10-21', '11:00', 'NO DISPONIBLE'),
(693, 44, 11, '2019-10-22', '11:00', 'NO DISPONIBLE'),
(694, 44, 14, '2019-10-22', '11:00', 'NO DISPONIBLE'),
(695, 44, 11, '2019-10-23', '11:00', 'NO DISPONIBLE'),
(696, 44, 14, '2019-10-23', '11:00', 'NO DISPONIBLE'),
(697, 44, 11, '2019-10-24', '11:00', 'NO DISPONIBLE'),
(698, 44, 14, '2019-10-24', '11:00', 'NO DISPONIBLE'),
(699, 44, 11, '2019-10-25', '11:00', 'NO DISPONIBLE'),
(700, 44, 14, '2019-10-25', '11:00', 'NO DISPONIBLE'),
(701, 44, 11, '2019-10-26', '11:00', 'NO DISPONIBLE'),
(702, 44, 14, '2019-10-26', '11:00', 'NO DISPONIBLE'),
(703, 44, 11, '2019-10-27', '11:00', 'NO DISPONIBLE'),
(704, 44, 14, '2019-10-27', '11:00', 'NO DISPONIBLE'),
(705, 45, 11, '2019-10-28', '11:00', 'NO DISPONIBLE'),
(706, 45, 15, '2019-10-28', '11:00', 'NO DISPONIBLE'),
(707, 45, 11, '2019-10-29', '11:00', 'NO DISPONIBLE'),
(708, 45, 15, '2019-10-29', '11:00', 'NO DISPONIBLE'),
(709, 45, 11, '2019-10-30', '11:00', 'NO DISPONIBLE'),
(710, 45, 15, '2019-10-30', '11:00', 'NO DISPONIBLE'),
(711, 45, 11, '2019-10-31', '11:00', 'NO DISPONIBLE'),
(712, 45, 15, '2019-10-31', '11:00', 'NO DISPONIBLE'),
(713, 45, 11, '2019-11-01', '11:00', 'NO DISPONIBLE'),
(714, 45, 15, '2019-11-01', '11:00', 'NO DISPONIBLE'),
(715, 45, 11, '2019-11-02', '11:00', 'NO DISPONIBLE'),
(716, 45, 15, '2019-11-02', '11:00', 'NO DISPONIBLE'),
(717, 45, 11, '2019-11-03', '11:00', 'NO DISPONIBLE'),
(718, 45, 15, '2019-11-03', '11:00', 'NO DISPONIBLE'),
(719, 45, 11, '2019-11-04', '11:00', 'NO DISPONIBLE'),
(720, 45, 15, '2019-11-04', '11:00', 'NO DISPONIBLE'),
(721, 46, 11, '2019-11-05', '11:00', 'NO DISPONIBLE'),
(722, 46, 16, '2019-11-05', '11:00', 'NO DISPONIBLE'),
(723, 46, 11, '2019-11-06', '11:00', 'NO DISPONIBLE'),
(724, 46, 16, '2019-11-06', '11:00', 'NO DISPONIBLE'),
(725, 46, 11, '2019-11-07', '11:00', 'NO DISPONIBLE'),
(726, 46, 16, '2019-11-07', '11:00', 'NO DISPONIBLE'),
(727, 46, 11, '2019-11-08', '11:00', 'NO DISPONIBLE'),
(728, 46, 16, '2019-11-08', '11:00', 'NO DISPONIBLE'),
(729, 46, 11, '2019-11-09', '11:00', 'NO DISPONIBLE'),
(730, 46, 16, '2019-11-09', '11:00', 'NO DISPONIBLE'),
(731, 46, 11, '2019-11-10', '11:00', 'NO DISPONIBLE'),
(732, 46, 16, '2019-11-10', '11:00', 'NO DISPONIBLE'),
(733, 46, 11, '2019-11-11', '11:00', 'NO DISPONIBLE'),
(734, 46, 16, '2019-11-11', '11:00', 'NO DISPONIBLE'),
(735, 46, 11, '2019-11-12', '11:00', 'NO DISPONIBLE'),
(736, 46, 16, '2019-11-12', '11:00', 'NO DISPONIBLE'),
(737, 47, 12, '2019-11-13', '11:00', 'NO DISPONIBLE'),
(738, 47, 13, '2019-11-13', '11:00', 'NO DISPONIBLE'),
(739, 47, 12, '2019-11-14', '11:00', 'NO DISPONIBLE'),
(740, 47, 13, '2019-11-14', '11:00', 'NO DISPONIBLE'),
(741, 47, 12, '2019-11-15', '11:00', 'NO DISPONIBLE'),
(742, 47, 13, '2019-11-15', '11:00', 'NO DISPONIBLE'),
(743, 47, 12, '2019-11-16', '11:00', 'NO DISPONIBLE'),
(744, 47, 13, '2019-11-16', '11:00', 'NO DISPONIBLE'),
(745, 47, 12, '2019-11-17', '11:00', 'NO DISPONIBLE'),
(746, 47, 13, '2019-11-17', '11:00', 'NO DISPONIBLE'),
(747, 47, 12, '2019-11-18', '11:00', 'NO DISPONIBLE'),
(748, 47, 13, '2019-11-18', '11:00', 'NO DISPONIBLE'),
(749, 47, 12, '2019-11-19', '11:00', 'NO DISPONIBLE'),
(750, 47, 13, '2019-11-19', '11:00', 'NO DISPONIBLE'),
(751, 47, 12, '2019-11-20', '11:00', 'NO DISPONIBLE'),
(752, 47, 13, '2019-11-20', '11:00', 'NO DISPONIBLE'),
(753, 48, 12, '2019-11-21', '11:00', 'NO DISPONIBLE'),
(754, 48, 14, '2019-11-21', '11:00', 'NO DISPONIBLE'),
(755, 48, 12, '2019-11-22', '11:00', 'NO DISPONIBLE'),
(756, 48, 14, '2019-11-22', '11:00', 'NO DISPONIBLE'),
(757, 48, 12, '2019-11-23', '11:00', 'NO DISPONIBLE'),
(758, 48, 14, '2019-11-23', '11:00', 'NO DISPONIBLE'),
(759, 48, 12, '2019-11-24', '11:00', 'NO DISPONIBLE'),
(760, 48, 14, '2019-11-24', '11:00', 'NO DISPONIBLE'),
(761, 48, 12, '2019-11-25', '11:00', 'NO DISPONIBLE'),
(762, 48, 14, '2019-11-25', '11:00', 'NO DISPONIBLE'),
(763, 48, 12, '2019-11-26', '11:00', 'NO DISPONIBLE'),
(764, 48, 14, '2019-11-26', '11:00', 'NO DISPONIBLE'),
(765, 48, 12, '2019-11-27', '11:00', 'NO DISPONIBLE'),
(766, 48, 14, '2019-11-27', '11:00', 'NO DISPONIBLE'),
(767, 48, 12, '2019-11-28', '11:00', 'NO DISPONIBLE'),
(768, 48, 14, '2019-11-28', '11:00', 'NO DISPONIBLE'),
(769, 49, 12, '2019-11-29', '11:00', 'NO DISPONIBLE'),
(770, 49, 15, '2019-11-29', '11:00', 'NO DISPONIBLE'),
(771, 49, 12, '2019-11-30', '11:00', 'NO DISPONIBLE'),
(772, 49, 15, '2019-11-30', '11:00', 'NO DISPONIBLE'),
(773, 49, 12, '2019-12-01', '11:00', 'NO DISPONIBLE'),
(774, 49, 15, '2019-12-01', '11:00', 'NO DISPONIBLE'),
(775, 49, 12, '2019-12-02', '11:00', 'NO DISPONIBLE'),
(776, 49, 15, '2019-12-02', '11:00', 'NO DISPONIBLE'),
(777, 49, 12, '2019-12-03', '11:00', 'NO DISPONIBLE'),
(778, 49, 15, '2019-12-03', '11:00', 'NO DISPONIBLE'),
(779, 49, 12, '2019-12-04', '11:00', 'NO DISPONIBLE'),
(780, 49, 15, '2019-12-04', '11:00', 'NO DISPONIBLE'),
(781, 49, 12, '2019-12-05', '11:00', 'NO DISPONIBLE'),
(782, 49, 15, '2019-12-05', '11:00', 'NO DISPONIBLE'),
(783, 49, 12, '2019-12-06', '11:00', 'NO DISPONIBLE'),
(784, 49, 15, '2019-12-06', '11:00', 'NO DISPONIBLE'),
(785, 50, 12, '2019-12-07', '11:00', 'NO DISPONIBLE'),
(786, 50, 16, '2019-12-07', '11:00', 'NO DISPONIBLE'),
(787, 50, 12, '2019-12-08', '11:00', 'NO DISPONIBLE'),
(788, 50, 16, '2019-12-08', '11:00', 'NO DISPONIBLE'),
(789, 50, 12, '2019-12-09', '11:00', 'NO DISPONIBLE'),
(790, 50, 16, '2019-12-09', '11:00', 'NO DISPONIBLE'),
(791, 50, 12, '2019-12-10', '11:00', 'NO DISPONIBLE'),
(792, 50, 16, '2019-12-10', '11:00', 'NO DISPONIBLE'),
(793, 50, 12, '2019-12-11', '11:00', 'NO DISPONIBLE'),
(794, 50, 16, '2019-12-11', '11:00', 'NO DISPONIBLE'),
(795, 50, 12, '2019-12-12', '11:00', 'NO DISPONIBLE'),
(796, 50, 16, '2019-12-12', '11:00', 'NO DISPONIBLE'),
(797, 50, 12, '2019-12-13', '11:00', 'NO DISPONIBLE'),
(798, 50, 16, '2019-12-13', '11:00', 'NO DISPONIBLE'),
(799, 50, 12, '2019-12-14', '11:00', 'NO DISPONIBLE'),
(800, 50, 16, '2019-12-14', '11:00', 'NO DISPONIBLE'),
(801, 51, 13, '2019-12-15', '11:00', 'NO DISPONIBLE'),
(802, 51, 14, '2019-12-15', '11:00', 'NO DISPONIBLE'),
(803, 51, 13, '2019-12-16', '11:00', 'NO DISPONIBLE'),
(804, 51, 14, '2019-12-16', '11:00', 'NO DISPONIBLE'),
(805, 51, 13, '2019-12-17', '11:00', 'NO DISPONIBLE'),
(806, 51, 14, '2019-12-17', '11:00', 'NO DISPONIBLE'),
(807, 51, 13, '2019-12-18', '11:00', 'NO DISPONIBLE'),
(808, 51, 14, '2019-12-18', '11:00', 'NO DISPONIBLE'),
(809, 51, 13, '2019-12-19', '11:00', 'NO DISPONIBLE'),
(810, 51, 14, '2019-12-19', '11:00', 'NO DISPONIBLE'),
(811, 51, 13, '2019-12-20', '11:00', 'NO DISPONIBLE'),
(812, 51, 14, '2019-12-20', '11:00', 'NO DISPONIBLE'),
(813, 51, 13, '2019-12-21', '11:00', 'NO DISPONIBLE'),
(814, 51, 14, '2019-12-21', '11:00', 'NO DISPONIBLE'),
(815, 51, 13, '2019-12-22', '11:00', 'NO DISPONIBLE'),
(816, 51, 14, '2019-12-22', '11:00', 'NO DISPONIBLE'),
(817, 52, 13, '2019-12-23', '11:00', 'NO DISPONIBLE'),
(818, 52, 15, '2019-12-23', '11:00', 'NO DISPONIBLE'),
(819, 52, 13, '2019-12-24', '11:00', 'NO DISPONIBLE'),
(820, 52, 15, '2019-12-24', '11:00', 'NO DISPONIBLE'),
(821, 52, 13, '2019-12-25', '11:00', 'NO DISPONIBLE'),
(822, 52, 15, '2019-12-25', '11:00', 'NO DISPONIBLE'),
(823, 52, 13, '2019-12-26', '11:00', 'NO DISPONIBLE'),
(824, 52, 15, '2019-12-26', '11:00', 'NO DISPONIBLE'),
(825, 52, 13, '2019-12-27', '11:00', 'NO DISPONIBLE'),
(826, 52, 15, '2019-12-27', '11:00', 'NO DISPONIBLE'),
(827, 52, 13, '2019-12-28', '11:00', 'NO DISPONIBLE'),
(828, 52, 15, '2019-12-28', '11:00', 'NO DISPONIBLE'),
(829, 52, 13, '2019-12-29', '11:00', 'NO DISPONIBLE'),
(830, 52, 15, '2019-12-29', '11:00', 'NO DISPONIBLE'),
(831, 52, 13, '2019-12-30', '11:00', 'NO DISPONIBLE'),
(832, 52, 15, '2019-12-30', '11:00', 'NO DISPONIBLE'),
(833, 53, 13, '2019-12-31', '11:00', 'NO DISPONIBLE'),
(834, 53, 16, '2019-12-31', '11:00', 'NO DISPONIBLE'),
(835, 53, 13, '2020-01-01', '11:00', 'NO DISPONIBLE'),
(836, 53, 16, '2020-01-01', '11:00', 'NO DISPONIBLE'),
(837, 53, 13, '2020-01-02', '11:00', 'NO DISPONIBLE'),
(838, 53, 16, '2020-01-02', '11:00', 'NO DISPONIBLE'),
(839, 53, 13, '2020-01-03', '11:00', 'NO DISPONIBLE'),
(840, 53, 16, '2020-01-03', '11:00', 'NO DISPONIBLE'),
(841, 53, 13, '2020-01-04', '11:00', 'NO DISPONIBLE'),
(842, 53, 16, '2020-01-04', '11:00', 'NO DISPONIBLE'),
(843, 53, 13, '2020-01-05', '11:00', 'NO DISPONIBLE'),
(844, 53, 16, '2020-01-05', '11:00', 'NO DISPONIBLE'),
(845, 53, 13, '2020-01-06', '11:00', 'NO DISPONIBLE'),
(846, 53, 16, '2020-01-06', '11:00', 'NO DISPONIBLE'),
(847, 53, 13, '2020-01-07', '11:00', 'NO DISPONIBLE'),
(848, 53, 16, '2020-01-07', '11:00', 'NO DISPONIBLE'),
(849, 54, 14, '2020-01-08', '11:00', 'NO DISPONIBLE'),
(850, 54, 15, '2020-01-08', '11:00', 'NO DISPONIBLE'),
(851, 54, 14, '2020-01-09', '11:00', 'NO DISPONIBLE'),
(852, 54, 15, '2020-01-09', '11:00', 'NO DISPONIBLE'),
(853, 54, 14, '2020-01-10', '11:00', 'NO DISPONIBLE'),
(854, 54, 15, '2020-01-10', '11:00', 'NO DISPONIBLE'),
(855, 54, 14, '2020-01-11', '11:00', 'NO DISPONIBLE'),
(856, 54, 15, '2020-01-11', '11:00', 'NO DISPONIBLE'),
(857, 54, 14, '2020-01-12', '11:00', 'NO DISPONIBLE'),
(858, 54, 15, '2020-01-12', '11:00', 'NO DISPONIBLE'),
(859, 54, 14, '2020-01-13', '11:00', 'NO DISPONIBLE'),
(860, 54, 15, '2020-01-13', '11:00', 'NO DISPONIBLE'),
(861, 54, 14, '2020-01-14', '11:00', 'NO DISPONIBLE'),
(862, 54, 15, '2020-01-14', '11:00', 'NO DISPONIBLE'),
(863, 54, 14, '2020-01-15', '11:00', 'NO DISPONIBLE'),
(864, 54, 15, '2020-01-15', '11:00', 'NO DISPONIBLE'),
(865, 55, 14, '2020-01-16', '11:00', 'NO DISPONIBLE'),
(866, 55, 16, '2020-01-16', '11:00', 'NO DISPONIBLE'),
(867, 55, 14, '2020-01-17', '11:00', 'NO DISPONIBLE'),
(868, 55, 16, '2020-01-17', '11:00', 'NO DISPONIBLE'),
(869, 55, 14, '2020-01-18', '11:00', 'NO DISPONIBLE'),
(870, 55, 16, '2020-01-18', '11:00', 'NO DISPONIBLE'),
(871, 55, 14, '2020-01-19', '11:00', 'NO DISPONIBLE'),
(872, 55, 16, '2020-01-19', '11:00', 'NO DISPONIBLE'),
(873, 55, 14, '2020-01-20', '11:00', 'NO DISPONIBLE'),
(874, 55, 16, '2020-01-20', '11:00', 'NO DISPONIBLE'),
(875, 55, 14, '2020-01-21', '11:00', 'NO DISPONIBLE'),
(876, 55, 16, '2020-01-21', '11:00', 'NO DISPONIBLE'),
(877, 55, 14, '2020-01-22', '11:00', 'NO DISPONIBLE'),
(878, 55, 16, '2020-01-22', '11:00', 'NO DISPONIBLE'),
(879, 55, 14, '2020-01-23', '11:00', 'NO DISPONIBLE'),
(880, 55, 16, '2020-01-23', '11:00', 'NO DISPONIBLE'),
(881, 56, 15, '2020-01-24', '11:00', 'NO DISPONIBLE'),
(882, 56, 16, '2020-01-24', '11:00', 'NO DISPONIBLE'),
(883, 56, 15, '2020-01-25', '11:00', 'NO DISPONIBLE'),
(884, 56, 16, '2020-01-25', '11:00', 'NO DISPONIBLE'),
(885, 56, 15, '2020-01-26', '11:00', 'NO DISPONIBLE'),
(886, 56, 16, '2020-01-26', '11:00', 'NO DISPONIBLE'),
(887, 56, 15, '2020-01-27', '11:00', 'NO DISPONIBLE'),
(888, 56, 16, '2020-01-27', '11:00', 'NO DISPONIBLE'),
(889, 56, 15, '2020-01-28', '11:00', 'NO DISPONIBLE'),
(890, 56, 16, '2020-01-28', '11:00', 'NO DISPONIBLE'),
(891, 56, 15, '2020-01-29', '11:00', 'NO DISPONIBLE'),
(892, 56, 16, '2020-01-29', '11:00', 'NO DISPONIBLE'),
(893, 56, 15, '2020-01-30', '11:00', 'NO DISPONIBLE'),
(894, 56, 16, '2020-01-30', '11:00', 'NO DISPONIBLE'),
(895, 56, 15, '2020-01-31', '11:00', 'NO DISPONIBLE'),
(896, 56, 16, '2020-01-31', '11:00', 'NO DISPONIBLE'),
(897, 57, 1, '2020-02-01', '11:00', 'NO DISPONIBLE'),
(898, 57, 2, '2020-02-01', '11:00', 'NO DISPONIBLE'),
(899, 57, 1, '2020-02-02', '11:00', 'NO DISPONIBLE'),
(900, 57, 2, '2020-02-02', '11:00', 'NO DISPONIBLE'),
(901, 57, 1, '2020-02-03', '11:00', 'NO DISPONIBLE'),
(902, 57, 2, '2020-02-03', '11:00', 'NO DISPONIBLE'),
(903, 57, 1, '2020-02-04', '11:00', 'NO DISPONIBLE'),
(904, 57, 2, '2020-02-04', '11:00', 'NO DISPONIBLE'),
(905, 57, 1, '2020-02-05', '11:00', 'NO DISPONIBLE'),
(906, 57, 2, '2020-02-05', '11:00', 'NO DISPONIBLE'),
(907, 57, 1, '2020-02-06', '11:00', 'NO DISPONIBLE'),
(908, 57, 2, '2020-02-06', '11:00', 'NO DISPONIBLE'),
(909, 57, 1, '2020-02-07', '11:00', 'NO DISPONIBLE'),
(910, 57, 2, '2020-02-07', '11:00', 'NO DISPONIBLE'),
(911, 57, 1, '2020-02-08', '11:00', 'NO DISPONIBLE'),
(912, 57, 2, '2020-02-08', '11:00', 'NO DISPONIBLE'),
(913, 58, 1, '2020-02-09', '11:00', 'NO DISPONIBLE'),
(914, 58, 3, '2020-02-09', '11:00', 'NO DISPONIBLE'),
(915, 58, 1, '2020-02-10', '11:00', 'NO DISPONIBLE'),
(916, 58, 3, '2020-02-10', '11:00', 'NO DISPONIBLE'),
(917, 58, 1, '2020-02-11', '11:00', 'NO DISPONIBLE'),
(918, 58, 3, '2020-02-11', '11:00', 'NO DISPONIBLE'),
(919, 58, 1, '2020-02-12', '11:00', 'NO DISPONIBLE'),
(920, 58, 3, '2020-02-12', '11:00', 'NO DISPONIBLE'),
(921, 58, 1, '2020-02-13', '11:00', 'NO DISPONIBLE'),
(922, 58, 3, '2020-02-13', '11:00', 'NO DISPONIBLE'),
(923, 58, 1, '2020-02-14', '11:00', 'NO DISPONIBLE'),
(924, 58, 3, '2020-02-14', '11:00', 'NO DISPONIBLE'),
(925, 58, 1, '2020-02-15', '11:00', 'NO DISPONIBLE'),
(926, 58, 3, '2020-02-15', '11:00', 'NO DISPONIBLE'),
(927, 58, 1, '2020-02-16', '11:00', 'NO DISPONIBLE'),
(928, 58, 3, '2020-02-16', '11:00', 'NO DISPONIBLE'),
(929, 59, 1, '2020-02-17', '11:00', 'NO DISPONIBLE'),
(930, 59, 4, '2020-02-17', '11:00', 'NO DISPONIBLE'),
(931, 59, 1, '2020-02-18', '11:00', 'NO DISPONIBLE'),
(932, 59, 4, '2020-02-18', '11:00', 'NO DISPONIBLE'),
(933, 59, 1, '2020-02-19', '11:00', 'NO DISPONIBLE'),
(934, 59, 4, '2020-02-19', '11:00', 'NO DISPONIBLE'),
(935, 59, 1, '2020-02-20', '11:00', 'NO DISPONIBLE'),
(936, 59, 4, '2020-02-20', '11:00', 'NO DISPONIBLE'),
(937, 59, 1, '2020-02-21', '11:00', 'NO DISPONIBLE'),
(938, 59, 4, '2020-02-21', '11:00', 'NO DISPONIBLE'),
(939, 59, 1, '2020-02-22', '11:00', 'NO DISPONIBLE'),
(940, 59, 4, '2020-02-22', '11:00', 'NO DISPONIBLE'),
(941, 59, 1, '2020-02-23', '11:00', 'NO DISPONIBLE'),
(942, 59, 4, '2020-02-23', '11:00', 'NO DISPONIBLE'),
(943, 59, 1, '2020-02-24', '11:00', 'NO DISPONIBLE'),
(944, 59, 4, '2020-02-24', '11:00', 'NO DISPONIBLE'),
(945, 60, 1, '2020-02-25', '11:00', 'NO DISPONIBLE'),
(946, 60, 5, '2020-02-25', '11:00', 'NO DISPONIBLE'),
(947, 60, 1, '2020-02-26', '11:00', 'NO DISPONIBLE'),
(948, 60, 5, '2020-02-26', '11:00', 'NO DISPONIBLE'),
(949, 60, 1, '2020-02-27', '11:00', 'NO DISPONIBLE'),
(950, 60, 5, '2020-02-27', '11:00', 'NO DISPONIBLE'),
(951, 60, 1, '2020-02-28', '11:00', 'NO DISPONIBLE'),
(952, 60, 5, '2020-02-28', '11:00', 'NO DISPONIBLE'),
(953, 60, 1, '2020-02-29', '11:00', 'NO DISPONIBLE'),
(954, 60, 5, '2020-02-29', '11:00', 'NO DISPONIBLE'),
(955, 60, 1, '2020-03-01', '11:00', 'NO DISPONIBLE'),
(956, 60, 5, '2020-03-01', '11:00', 'NO DISPONIBLE');
INSERT INTO `proposedmatch` (`idProposedMatch`, `idMatch`, `idPair`, `date`, `hour`, `available`) VALUES
(957, 60, 1, '2020-03-02', '11:00', 'NO DISPONIBLE'),
(958, 60, 5, '2020-03-02', '11:00', 'NO DISPONIBLE'),
(959, 60, 1, '2020-03-03', '11:00', 'NO DISPONIBLE'),
(960, 60, 5, '2020-03-03', '11:00', 'NO DISPONIBLE'),
(961, 61, 1, '2020-03-04', '11:00', 'NO DISPONIBLE'),
(962, 61, 6, '2020-03-04', '11:00', 'NO DISPONIBLE'),
(963, 61, 1, '2020-03-05', '11:00', 'NO DISPONIBLE'),
(964, 61, 6, '2020-03-05', '11:00', 'NO DISPONIBLE'),
(965, 61, 1, '2020-03-06', '11:00', 'NO DISPONIBLE'),
(966, 61, 6, '2020-03-06', '11:00', 'NO DISPONIBLE'),
(967, 61, 1, '2020-03-07', '11:00', 'NO DISPONIBLE'),
(968, 61, 6, '2020-03-07', '11:00', 'NO DISPONIBLE'),
(969, 61, 1, '2020-03-08', '11:00', 'NO DISPONIBLE'),
(970, 61, 6, '2020-03-08', '11:00', 'NO DISPONIBLE'),
(971, 61, 1, '2020-03-09', '11:00', 'NO DISPONIBLE'),
(972, 61, 6, '2020-03-09', '11:00', 'NO DISPONIBLE'),
(973, 61, 1, '2020-03-10', '11:00', 'NO DISPONIBLE'),
(974, 61, 6, '2020-03-10', '11:00', 'NO DISPONIBLE'),
(975, 61, 1, '2020-03-11', '11:00', 'NO DISPONIBLE'),
(976, 61, 6, '2020-03-11', '11:00', 'NO DISPONIBLE'),
(977, 62, 1, '2020-03-12', '11:00', 'NO DISPONIBLE'),
(978, 62, 9, '2020-03-12', '11:00', 'NO DISPONIBLE'),
(979, 62, 1, '2020-03-13', '11:00', 'NO DISPONIBLE'),
(980, 62, 9, '2020-03-13', '11:00', 'NO DISPONIBLE'),
(981, 62, 1, '2020-03-14', '11:00', 'NO DISPONIBLE'),
(982, 62, 9, '2020-03-14', '11:00', 'NO DISPONIBLE'),
(983, 62, 1, '2020-03-15', '11:00', 'NO DISPONIBLE'),
(984, 62, 9, '2020-03-15', '11:00', 'NO DISPONIBLE'),
(985, 62, 1, '2020-03-16', '11:00', 'NO DISPONIBLE'),
(986, 62, 9, '2020-03-16', '11:00', 'NO DISPONIBLE'),
(987, 62, 1, '2020-03-17', '11:00', 'NO DISPONIBLE'),
(988, 62, 9, '2020-03-17', '11:00', 'NO DISPONIBLE'),
(989, 62, 1, '2020-03-18', '11:00', 'NO DISPONIBLE'),
(990, 62, 9, '2020-03-18', '11:00', 'NO DISPONIBLE'),
(991, 62, 1, '2020-03-19', '11:00', 'NO DISPONIBLE'),
(992, 62, 9, '2020-03-19', '11:00', 'NO DISPONIBLE'),
(993, 63, 1, '2020-03-20', '11:00', 'NO DISPONIBLE'),
(994, 63, 10, '2020-03-20', '11:00', 'NO DISPONIBLE'),
(995, 63, 1, '2020-03-21', '11:00', 'NO DISPONIBLE'),
(996, 63, 10, '2020-03-21', '11:00', 'NO DISPONIBLE'),
(997, 63, 1, '2020-03-22', '11:00', 'NO DISPONIBLE'),
(998, 63, 10, '2020-03-22', '11:00', 'NO DISPONIBLE'),
(999, 63, 1, '2020-03-23', '11:00', 'NO DISPONIBLE'),
(1000, 63, 10, '2020-03-23', '11:00', 'NO DISPONIBLE'),
(1001, 63, 1, '2020-03-24', '11:00', 'NO DISPONIBLE'),
(1002, 63, 10, '2020-03-24', '11:00', 'NO DISPONIBLE'),
(1003, 63, 1, '2020-03-25', '11:00', 'NO DISPONIBLE'),
(1004, 63, 10, '2020-03-25', '11:00', 'NO DISPONIBLE'),
(1005, 63, 1, '2020-03-26', '11:00', 'NO DISPONIBLE'),
(1006, 63, 10, '2020-03-26', '11:00', 'NO DISPONIBLE'),
(1007, 63, 1, '2020-03-27', '11:00', 'NO DISPONIBLE'),
(1008, 63, 10, '2020-03-27', '11:00', 'NO DISPONIBLE'),
(1009, 64, 2, '2020-03-28', '11:00', 'NO DISPONIBLE'),
(1010, 64, 3, '2020-03-28', '11:00', 'NO DISPONIBLE'),
(1011, 64, 2, '2020-03-29', '11:00', 'NO DISPONIBLE'),
(1012, 64, 3, '2020-03-29', '11:00', 'NO DISPONIBLE'),
(1013, 64, 2, '2020-03-30', '11:00', 'NO DISPONIBLE'),
(1014, 64, 3, '2020-03-30', '11:00', 'NO DISPONIBLE'),
(1015, 64, 2, '2020-03-31', '11:00', 'NO DISPONIBLE'),
(1016, 64, 3, '2020-03-31', '11:00', 'NO DISPONIBLE'),
(1017, 64, 2, '2020-04-01', '11:00', 'NO DISPONIBLE'),
(1018, 64, 3, '2020-04-01', '11:00', 'NO DISPONIBLE'),
(1019, 64, 2, '2020-04-02', '11:00', 'NO DISPONIBLE'),
(1020, 64, 3, '2020-04-02', '11:00', 'NO DISPONIBLE'),
(1021, 64, 2, '2020-04-03', '11:00', 'NO DISPONIBLE'),
(1022, 64, 3, '2020-04-03', '11:00', 'NO DISPONIBLE'),
(1023, 64, 2, '2020-04-04', '11:00', 'NO DISPONIBLE'),
(1024, 64, 3, '2020-04-04', '11:00', 'NO DISPONIBLE'),
(1025, 65, 2, '2020-04-05', '11:00', 'NO DISPONIBLE'),
(1026, 65, 4, '2020-04-05', '11:00', 'NO DISPONIBLE'),
(1027, 65, 2, '2020-04-06', '11:00', 'NO DISPONIBLE'),
(1028, 65, 4, '2020-04-06', '11:00', 'NO DISPONIBLE'),
(1029, 65, 2, '2020-04-07', '11:00', 'NO DISPONIBLE'),
(1030, 65, 4, '2020-04-07', '11:00', 'NO DISPONIBLE'),
(1031, 65, 2, '2020-04-08', '11:00', 'NO DISPONIBLE'),
(1032, 65, 4, '2020-04-08', '11:00', 'NO DISPONIBLE'),
(1033, 65, 2, '2020-04-09', '11:00', 'NO DISPONIBLE'),
(1034, 65, 4, '2020-04-09', '11:00', 'NO DISPONIBLE'),
(1035, 65, 2, '2020-04-10', '11:00', 'NO DISPONIBLE'),
(1036, 65, 4, '2020-04-10', '11:00', 'NO DISPONIBLE'),
(1037, 65, 2, '2020-04-11', '11:00', 'NO DISPONIBLE'),
(1038, 65, 4, '2020-04-11', '11:00', 'NO DISPONIBLE'),
(1039, 65, 2, '2020-04-12', '11:00', 'NO DISPONIBLE'),
(1040, 65, 4, '2020-04-12', '11:00', 'NO DISPONIBLE'),
(1041, 66, 2, '2020-04-13', '11:00', 'NO DISPONIBLE'),
(1042, 66, 5, '2020-04-13', '11:00', 'NO DISPONIBLE'),
(1043, 66, 2, '2020-04-14', '11:00', 'NO DISPONIBLE'),
(1044, 66, 5, '2020-04-14', '11:00', 'NO DISPONIBLE'),
(1045, 66, 2, '2020-04-15', '11:00', 'NO DISPONIBLE'),
(1046, 66, 5, '2020-04-15', '11:00', 'NO DISPONIBLE'),
(1047, 66, 2, '2020-04-16', '11:00', 'NO DISPONIBLE'),
(1048, 66, 5, '2020-04-16', '11:00', 'NO DISPONIBLE'),
(1049, 66, 2, '2020-04-17', '11:00', 'NO DISPONIBLE'),
(1050, 66, 5, '2020-04-17', '11:00', 'NO DISPONIBLE'),
(1051, 66, 2, '2020-04-18', '11:00', 'NO DISPONIBLE'),
(1052, 66, 5, '2020-04-18', '11:00', 'NO DISPONIBLE'),
(1053, 66, 2, '2020-04-19', '11:00', 'NO DISPONIBLE'),
(1054, 66, 5, '2020-04-19', '11:00', 'NO DISPONIBLE'),
(1055, 66, 2, '2020-04-20', '11:00', 'NO DISPONIBLE'),
(1056, 66, 5, '2020-04-20', '11:00', 'NO DISPONIBLE'),
(1057, 67, 2, '2020-04-21', '11:00', 'NO DISPONIBLE'),
(1058, 67, 6, '2020-04-21', '11:00', 'NO DISPONIBLE'),
(1059, 67, 2, '2020-04-22', '11:00', 'NO DISPONIBLE'),
(1060, 67, 6, '2020-04-22', '11:00', 'NO DISPONIBLE'),
(1061, 67, 2, '2020-04-23', '11:00', 'NO DISPONIBLE'),
(1062, 67, 6, '2020-04-23', '11:00', 'NO DISPONIBLE'),
(1063, 67, 2, '2020-04-24', '11:00', 'NO DISPONIBLE'),
(1064, 67, 6, '2020-04-24', '11:00', 'NO DISPONIBLE'),
(1065, 67, 2, '2020-04-25', '11:00', 'NO DISPONIBLE'),
(1066, 67, 6, '2020-04-25', '11:00', 'NO DISPONIBLE'),
(1067, 67, 2, '2020-04-26', '11:00', 'NO DISPONIBLE'),
(1068, 67, 6, '2020-04-26', '11:00', 'NO DISPONIBLE'),
(1069, 67, 2, '2020-04-27', '11:00', 'NO DISPONIBLE'),
(1070, 67, 6, '2020-04-27', '11:00', 'NO DISPONIBLE'),
(1071, 67, 2, '2020-04-28', '11:00', 'NO DISPONIBLE'),
(1072, 67, 6, '2020-04-28', '11:00', 'NO DISPONIBLE'),
(1073, 68, 2, '2020-04-29', '11:00', 'NO DISPONIBLE'),
(1074, 68, 9, '2020-04-29', '11:00', 'NO DISPONIBLE'),
(1075, 68, 2, '2020-04-30', '11:00', 'NO DISPONIBLE'),
(1076, 68, 9, '2020-04-30', '11:00', 'NO DISPONIBLE'),
(1077, 68, 2, '2020-05-01', '11:00', 'NO DISPONIBLE'),
(1078, 68, 9, '2020-05-01', '11:00', 'NO DISPONIBLE'),
(1079, 68, 2, '2020-05-02', '11:00', 'NO DISPONIBLE'),
(1080, 68, 9, '2020-05-02', '11:00', 'NO DISPONIBLE'),
(1081, 68, 2, '2020-05-03', '11:00', 'NO DISPONIBLE'),
(1082, 68, 9, '2020-05-03', '11:00', 'NO DISPONIBLE'),
(1083, 68, 2, '2020-05-04', '11:00', 'NO DISPONIBLE'),
(1084, 68, 9, '2020-05-04', '11:00', 'NO DISPONIBLE'),
(1085, 68, 2, '2020-05-05', '11:00', 'NO DISPONIBLE'),
(1086, 68, 9, '2020-05-05', '11:00', 'NO DISPONIBLE'),
(1087, 68, 2, '2020-05-06', '11:00', 'NO DISPONIBLE'),
(1088, 68, 9, '2020-05-06', '11:00', 'NO DISPONIBLE'),
(1089, 69, 2, '2020-05-07', '11:00', 'NO DISPONIBLE'),
(1090, 69, 10, '2020-05-07', '11:00', 'NO DISPONIBLE'),
(1091, 69, 2, '2020-05-08', '11:00', 'NO DISPONIBLE'),
(1092, 69, 10, '2020-05-08', '11:00', 'NO DISPONIBLE'),
(1093, 69, 2, '2020-05-09', '11:00', 'NO DISPONIBLE'),
(1094, 69, 10, '2020-05-09', '11:00', 'NO DISPONIBLE'),
(1095, 69, 2, '2020-05-10', '11:00', 'NO DISPONIBLE'),
(1096, 69, 10, '2020-05-10', '11:00', 'NO DISPONIBLE'),
(1097, 69, 2, '2020-05-11', '11:00', 'NO DISPONIBLE'),
(1098, 69, 10, '2020-05-11', '11:00', 'NO DISPONIBLE'),
(1099, 69, 2, '2020-05-12', '11:00', 'NO DISPONIBLE'),
(1100, 69, 10, '2020-05-12', '11:00', 'NO DISPONIBLE'),
(1101, 69, 2, '2020-05-13', '11:00', 'NO DISPONIBLE'),
(1102, 69, 10, '2020-05-13', '11:00', 'NO DISPONIBLE'),
(1103, 69, 2, '2020-05-14', '11:00', 'NO DISPONIBLE'),
(1104, 69, 10, '2020-05-14', '11:00', 'NO DISPONIBLE'),
(1105, 70, 3, '2020-05-15', '11:00', 'NO DISPONIBLE'),
(1106, 70, 4, '2020-05-15', '11:00', 'NO DISPONIBLE'),
(1107, 70, 3, '2020-05-16', '11:00', 'NO DISPONIBLE'),
(1108, 70, 4, '2020-05-16', '11:00', 'NO DISPONIBLE'),
(1109, 70, 3, '2020-05-17', '11:00', 'NO DISPONIBLE'),
(1110, 70, 4, '2020-05-17', '11:00', 'NO DISPONIBLE'),
(1111, 70, 3, '2020-05-18', '11:00', 'NO DISPONIBLE'),
(1112, 70, 4, '2020-05-18', '11:00', 'NO DISPONIBLE'),
(1113, 70, 3, '2020-05-19', '11:00', 'NO DISPONIBLE'),
(1114, 70, 4, '2020-05-19', '11:00', 'NO DISPONIBLE'),
(1115, 70, 3, '2020-05-20', '11:00', 'NO DISPONIBLE'),
(1116, 70, 4, '2020-05-20', '11:00', 'NO DISPONIBLE'),
(1117, 70, 3, '2020-05-21', '11:00', 'NO DISPONIBLE'),
(1118, 70, 4, '2020-05-21', '11:00', 'NO DISPONIBLE'),
(1119, 70, 3, '2020-05-22', '11:00', 'NO DISPONIBLE'),
(1120, 70, 4, '2020-05-22', '11:00', 'NO DISPONIBLE'),
(1121, 71, 3, '2020-05-23', '11:00', 'NO DISPONIBLE'),
(1122, 71, 5, '2020-05-23', '11:00', 'NO DISPONIBLE'),
(1123, 71, 3, '2020-05-24', '11:00', 'NO DISPONIBLE'),
(1124, 71, 5, '2020-05-24', '11:00', 'NO DISPONIBLE'),
(1125, 71, 3, '2020-05-25', '11:00', 'NO DISPONIBLE'),
(1126, 71, 5, '2020-05-25', '11:00', 'NO DISPONIBLE'),
(1127, 71, 3, '2020-05-26', '11:00', 'NO DISPONIBLE'),
(1128, 71, 5, '2020-05-26', '11:00', 'NO DISPONIBLE'),
(1129, 71, 3, '2020-05-27', '11:00', 'NO DISPONIBLE'),
(1130, 71, 5, '2020-05-27', '11:00', 'NO DISPONIBLE'),
(1131, 71, 3, '2020-05-28', '11:00', 'NO DISPONIBLE'),
(1132, 71, 5, '2020-05-28', '11:00', 'NO DISPONIBLE'),
(1133, 71, 3, '2020-05-29', '11:00', 'NO DISPONIBLE'),
(1134, 71, 5, '2020-05-29', '11:00', 'NO DISPONIBLE'),
(1135, 71, 3, '2020-05-30', '11:00', 'NO DISPONIBLE'),
(1136, 71, 5, '2020-05-30', '11:00', 'NO DISPONIBLE'),
(1137, 72, 3, '2020-05-31', '11:00', 'NO DISPONIBLE'),
(1138, 72, 6, '2020-05-31', '11:00', 'NO DISPONIBLE'),
(1139, 72, 3, '2020-06-01', '11:00', 'NO DISPONIBLE'),
(1140, 72, 6, '2020-06-01', '11:00', 'NO DISPONIBLE'),
(1141, 72, 3, '2020-06-02', '11:00', 'NO DISPONIBLE'),
(1142, 72, 6, '2020-06-02', '11:00', 'NO DISPONIBLE'),
(1143, 72, 3, '2020-06-03', '11:00', 'NO DISPONIBLE'),
(1144, 72, 6, '2020-06-03', '11:00', 'NO DISPONIBLE'),
(1145, 72, 3, '2020-06-04', '11:00', 'NO DISPONIBLE'),
(1146, 72, 6, '2020-06-04', '11:00', 'NO DISPONIBLE'),
(1147, 72, 3, '2020-06-05', '11:00', 'NO DISPONIBLE'),
(1148, 72, 6, '2020-06-05', '11:00', 'NO DISPONIBLE'),
(1149, 72, 3, '2020-06-06', '11:00', 'NO DISPONIBLE'),
(1150, 72, 6, '2020-06-06', '11:00', 'NO DISPONIBLE'),
(1151, 72, 3, '2020-06-07', '11:00', 'NO DISPONIBLE'),
(1152, 72, 6, '2020-06-07', '11:00', 'NO DISPONIBLE'),
(1153, 73, 3, '2020-06-08', '11:00', 'NO DISPONIBLE'),
(1154, 73, 9, '2020-06-08', '11:00', 'NO DISPONIBLE'),
(1155, 73, 3, '2020-06-09', '11:00', 'NO DISPONIBLE'),
(1156, 73, 9, '2020-06-09', '11:00', 'NO DISPONIBLE'),
(1157, 73, 3, '2020-06-10', '11:00', 'NO DISPONIBLE'),
(1158, 73, 9, '2020-06-10', '11:00', 'NO DISPONIBLE'),
(1159, 73, 3, '2020-06-11', '11:00', 'NO DISPONIBLE'),
(1160, 73, 9, '2020-06-11', '11:00', 'NO DISPONIBLE'),
(1161, 73, 3, '2020-06-12', '11:00', 'NO DISPONIBLE'),
(1162, 73, 9, '2020-06-12', '11:00', 'NO DISPONIBLE'),
(1163, 73, 3, '2020-06-13', '11:00', 'NO DISPONIBLE'),
(1164, 73, 9, '2020-06-13', '11:00', 'NO DISPONIBLE'),
(1165, 73, 3, '2020-06-14', '11:00', 'NO DISPONIBLE'),
(1166, 73, 9, '2020-06-14', '11:00', 'NO DISPONIBLE'),
(1167, 73, 3, '2020-06-15', '11:00', 'NO DISPONIBLE'),
(1168, 73, 9, '2020-06-15', '11:00', 'NO DISPONIBLE'),
(1169, 74, 3, '2020-06-16', '11:00', 'NO DISPONIBLE'),
(1170, 74, 10, '2020-06-16', '11:00', 'NO DISPONIBLE'),
(1171, 74, 3, '2020-06-17', '11:00', 'NO DISPONIBLE'),
(1172, 74, 10, '2020-06-17', '11:00', 'NO DISPONIBLE'),
(1173, 74, 3, '2020-06-18', '11:00', 'NO DISPONIBLE'),
(1174, 74, 10, '2020-06-18', '11:00', 'NO DISPONIBLE'),
(1175, 74, 3, '2020-06-19', '11:00', 'NO DISPONIBLE'),
(1176, 74, 10, '2020-06-19', '11:00', 'NO DISPONIBLE'),
(1177, 74, 3, '2020-06-20', '11:00', 'NO DISPONIBLE'),
(1178, 74, 10, '2020-06-20', '11:00', 'NO DISPONIBLE'),
(1179, 74, 3, '2020-06-21', '11:00', 'NO DISPONIBLE'),
(1180, 74, 10, '2020-06-21', '11:00', 'NO DISPONIBLE'),
(1181, 74, 3, '2020-06-22', '11:00', 'NO DISPONIBLE'),
(1182, 74, 10, '2020-06-22', '11:00', 'NO DISPONIBLE'),
(1183, 74, 3, '2020-06-23', '11:00', 'NO DISPONIBLE'),
(1184, 74, 10, '2020-06-23', '11:00', 'NO DISPONIBLE'),
(1185, 75, 4, '2020-06-24', '11:00', 'NO DISPONIBLE'),
(1186, 75, 5, '2020-06-24', '11:00', 'NO DISPONIBLE'),
(1187, 75, 4, '2020-06-25', '11:00', 'NO DISPONIBLE'),
(1188, 75, 5, '2020-06-25', '11:00', 'NO DISPONIBLE'),
(1189, 75, 4, '2020-06-26', '11:00', 'NO DISPONIBLE'),
(1190, 75, 5, '2020-06-26', '11:00', 'NO DISPONIBLE'),
(1191, 75, 4, '2020-06-27', '11:00', 'NO DISPONIBLE'),
(1192, 75, 5, '2020-06-27', '11:00', 'NO DISPONIBLE'),
(1193, 75, 4, '2020-06-28', '11:00', 'NO DISPONIBLE'),
(1194, 75, 5, '2020-06-28', '11:00', 'NO DISPONIBLE'),
(1195, 75, 4, '2020-06-29', '11:00', 'NO DISPONIBLE'),
(1196, 75, 5, '2020-06-29', '11:00', 'NO DISPONIBLE'),
(1197, 75, 4, '2020-06-30', '11:00', 'NO DISPONIBLE'),
(1198, 75, 5, '2020-06-30', '11:00', 'NO DISPONIBLE'),
(1199, 75, 4, '2020-07-01', '11:00', 'NO DISPONIBLE'),
(1200, 75, 5, '2020-07-01', '11:00', 'NO DISPONIBLE'),
(1201, 76, 4, '2020-07-02', '11:00', 'NO DISPONIBLE'),
(1202, 76, 6, '2020-07-02', '11:00', 'NO DISPONIBLE'),
(1203, 76, 4, '2020-07-03', '11:00', 'NO DISPONIBLE'),
(1204, 76, 6, '2020-07-03', '11:00', 'NO DISPONIBLE'),
(1205, 76, 4, '2020-07-04', '11:00', 'NO DISPONIBLE'),
(1206, 76, 6, '2020-07-04', '11:00', 'NO DISPONIBLE'),
(1207, 76, 4, '2020-07-05', '11:00', 'NO DISPONIBLE'),
(1208, 76, 6, '2020-07-05', '11:00', 'NO DISPONIBLE'),
(1209, 76, 4, '2020-07-06', '11:00', 'NO DISPONIBLE'),
(1210, 76, 6, '2020-07-06', '11:00', 'NO DISPONIBLE'),
(1211, 76, 4, '2020-07-07', '11:00', 'NO DISPONIBLE'),
(1212, 76, 6, '2020-07-07', '11:00', 'NO DISPONIBLE'),
(1213, 76, 4, '2020-07-08', '11:00', 'NO DISPONIBLE'),
(1214, 76, 6, '2020-07-08', '11:00', 'NO DISPONIBLE'),
(1215, 76, 4, '2020-07-09', '11:00', 'NO DISPONIBLE'),
(1216, 76, 6, '2020-07-09', '11:00', 'NO DISPONIBLE'),
(1217, 77, 4, '2020-07-10', '11:00', 'NO DISPONIBLE'),
(1218, 77, 9, '2020-07-10', '11:00', 'NO DISPONIBLE'),
(1219, 77, 4, '2020-07-11', '11:00', 'NO DISPONIBLE'),
(1220, 77, 9, '2020-07-11', '11:00', 'NO DISPONIBLE'),
(1221, 77, 4, '2020-07-12', '11:00', 'NO DISPONIBLE'),
(1222, 77, 9, '2020-07-12', '11:00', 'NO DISPONIBLE'),
(1223, 77, 4, '2020-07-13', '11:00', 'NO DISPONIBLE'),
(1224, 77, 9, '2020-07-13', '11:00', 'NO DISPONIBLE'),
(1225, 77, 4, '2020-07-14', '11:00', 'NO DISPONIBLE'),
(1226, 77, 9, '2020-07-14', '11:00', 'NO DISPONIBLE'),
(1227, 77, 4, '2020-07-15', '11:00', 'NO DISPONIBLE'),
(1228, 77, 9, '2020-07-15', '11:00', 'NO DISPONIBLE'),
(1229, 77, 4, '2020-07-16', '11:00', 'NO DISPONIBLE'),
(1230, 77, 9, '2020-07-16', '11:00', 'NO DISPONIBLE'),
(1231, 77, 4, '2020-07-17', '11:00', 'NO DISPONIBLE'),
(1232, 77, 9, '2020-07-17', '11:00', 'NO DISPONIBLE'),
(1233, 78, 4, '2020-07-18', '11:00', 'NO DISPONIBLE'),
(1234, 78, 10, '2020-07-18', '11:00', 'NO DISPONIBLE'),
(1235, 78, 4, '2020-07-19', '11:00', 'NO DISPONIBLE'),
(1236, 78, 10, '2020-07-19', '11:00', 'NO DISPONIBLE'),
(1237, 78, 4, '2020-07-20', '11:00', 'NO DISPONIBLE'),
(1238, 78, 10, '2020-07-20', '11:00', 'NO DISPONIBLE'),
(1239, 78, 4, '2020-07-21', '11:00', 'NO DISPONIBLE'),
(1240, 78, 10, '2020-07-21', '11:00', 'NO DISPONIBLE'),
(1241, 78, 4, '2020-07-22', '11:00', 'NO DISPONIBLE'),
(1242, 78, 10, '2020-07-22', '11:00', 'NO DISPONIBLE'),
(1243, 78, 4, '2020-07-23', '11:00', 'NO DISPONIBLE'),
(1244, 78, 10, '2020-07-23', '11:00', 'NO DISPONIBLE'),
(1245, 78, 4, '2020-07-24', '11:00', 'NO DISPONIBLE'),
(1246, 78, 10, '2020-07-24', '11:00', 'NO DISPONIBLE'),
(1247, 78, 4, '2020-07-25', '11:00', 'NO DISPONIBLE'),
(1248, 78, 10, '2020-07-25', '11:00', 'NO DISPONIBLE'),
(1249, 79, 5, '2020-07-26', '11:00', 'NO DISPONIBLE'),
(1250, 79, 6, '2020-07-26', '11:00', 'NO DISPONIBLE'),
(1251, 79, 5, '2020-07-27', '11:00', 'NO DISPONIBLE'),
(1252, 79, 6, '2020-07-27', '11:00', 'NO DISPONIBLE'),
(1253, 79, 5, '2020-07-28', '11:00', 'NO DISPONIBLE'),
(1254, 79, 6, '2020-07-28', '11:00', 'NO DISPONIBLE'),
(1255, 79, 5, '2020-07-29', '11:00', 'NO DISPONIBLE'),
(1256, 79, 6, '2020-07-29', '11:00', 'NO DISPONIBLE'),
(1257, 79, 5, '2020-07-30', '11:00', 'NO DISPONIBLE'),
(1258, 79, 6, '2020-07-30', '11:00', 'NO DISPONIBLE'),
(1259, 79, 5, '2020-07-31', '11:00', 'NO DISPONIBLE'),
(1260, 79, 6, '2020-07-31', '11:00', 'NO DISPONIBLE'),
(1261, 79, 5, '2020-08-01', '11:00', 'NO DISPONIBLE'),
(1262, 79, 6, '2020-08-01', '11:00', 'NO DISPONIBLE'),
(1263, 79, 5, '2020-08-02', '11:00', 'NO DISPONIBLE'),
(1264, 79, 6, '2020-08-02', '11:00', 'NO DISPONIBLE'),
(1265, 80, 5, '2020-08-03', '11:00', 'NO DISPONIBLE'),
(1266, 80, 9, '2020-08-03', '11:00', 'NO DISPONIBLE'),
(1267, 80, 5, '2020-08-04', '11:00', 'NO DISPONIBLE'),
(1268, 80, 9, '2020-08-04', '11:00', 'NO DISPONIBLE'),
(1269, 80, 5, '2020-08-05', '11:00', 'NO DISPONIBLE'),
(1270, 80, 9, '2020-08-05', '11:00', 'NO DISPONIBLE'),
(1271, 80, 5, '2020-08-06', '11:00', 'NO DISPONIBLE'),
(1272, 80, 9, '2020-08-06', '11:00', 'NO DISPONIBLE'),
(1273, 80, 5, '2020-08-07', '11:00', 'NO DISPONIBLE'),
(1274, 80, 9, '2020-08-07', '11:00', 'NO DISPONIBLE'),
(1275, 80, 5, '2020-08-08', '11:00', 'NO DISPONIBLE'),
(1276, 80, 9, '2020-08-08', '11:00', 'NO DISPONIBLE'),
(1277, 80, 5, '2020-08-09', '11:00', 'NO DISPONIBLE'),
(1278, 80, 9, '2020-08-09', '11:00', 'NO DISPONIBLE'),
(1279, 80, 5, '2020-08-10', '11:00', 'NO DISPONIBLE'),
(1280, 80, 9, '2020-08-10', '11:00', 'NO DISPONIBLE'),
(1281, 81, 5, '2020-08-11', '11:00', 'NO DISPONIBLE'),
(1282, 81, 10, '2020-08-11', '11:00', 'NO DISPONIBLE'),
(1283, 81, 5, '2020-08-12', '11:00', 'NO DISPONIBLE'),
(1284, 81, 10, '2020-08-12', '11:00', 'NO DISPONIBLE'),
(1285, 81, 5, '2020-08-13', '11:00', 'NO DISPONIBLE'),
(1286, 81, 10, '2020-08-13', '11:00', 'NO DISPONIBLE'),
(1287, 81, 5, '2020-08-14', '11:00', 'NO DISPONIBLE'),
(1288, 81, 10, '2020-08-14', '11:00', 'NO DISPONIBLE'),
(1289, 81, 5, '2020-08-15', '11:00', 'NO DISPONIBLE'),
(1290, 81, 10, '2020-08-15', '11:00', 'NO DISPONIBLE'),
(1291, 81, 5, '2020-08-16', '11:00', 'NO DISPONIBLE'),
(1292, 81, 10, '2020-08-16', '11:00', 'NO DISPONIBLE'),
(1293, 81, 5, '2020-08-17', '11:00', 'NO DISPONIBLE'),
(1294, 81, 10, '2020-08-17', '11:00', 'NO DISPONIBLE'),
(1295, 81, 5, '2020-08-18', '11:00', 'NO DISPONIBLE'),
(1296, 81, 10, '2020-08-18', '11:00', 'NO DISPONIBLE'),
(1297, 82, 6, '2020-08-19', '11:00', 'NO DISPONIBLE'),
(1298, 82, 9, '2020-08-19', '11:00', 'NO DISPONIBLE'),
(1299, 82, 6, '2020-08-20', '11:00', 'NO DISPONIBLE'),
(1300, 82, 9, '2020-08-20', '11:00', 'NO DISPONIBLE'),
(1301, 82, 6, '2020-08-21', '11:00', 'NO DISPONIBLE'),
(1302, 82, 9, '2020-08-21', '11:00', 'NO DISPONIBLE'),
(1303, 82, 6, '2020-08-22', '11:00', 'NO DISPONIBLE'),
(1304, 82, 9, '2020-08-22', '11:00', 'NO DISPONIBLE'),
(1305, 82, 6, '2020-08-23', '11:00', 'NO DISPONIBLE'),
(1306, 82, 9, '2020-08-23', '11:00', 'NO DISPONIBLE'),
(1307, 82, 6, '2020-08-24', '11:00', 'NO DISPONIBLE'),
(1308, 82, 9, '2020-08-24', '11:00', 'NO DISPONIBLE'),
(1309, 82, 6, '2020-08-25', '11:00', 'NO DISPONIBLE'),
(1310, 82, 9, '2020-08-25', '11:00', 'NO DISPONIBLE'),
(1311, 82, 6, '2020-08-26', '11:00', 'NO DISPONIBLE'),
(1312, 82, 9, '2020-08-26', '11:00', 'NO DISPONIBLE'),
(1313, 83, 6, '2020-08-27', '11:00', 'NO DISPONIBLE'),
(1314, 83, 10, '2020-08-27', '11:00', 'NO DISPONIBLE'),
(1315, 83, 6, '2020-08-28', '11:00', 'NO DISPONIBLE'),
(1316, 83, 10, '2020-08-28', '11:00', 'NO DISPONIBLE'),
(1317, 83, 6, '2020-08-29', '11:00', 'NO DISPONIBLE'),
(1318, 83, 10, '2020-08-29', '11:00', 'NO DISPONIBLE'),
(1319, 83, 6, '2020-08-30', '11:00', 'NO DISPONIBLE'),
(1320, 83, 10, '2020-08-30', '11:00', 'NO DISPONIBLE'),
(1321, 83, 6, '2020-08-31', '11:00', 'NO DISPONIBLE'),
(1322, 83, 10, '2020-08-31', '11:00', 'NO DISPONIBLE'),
(1323, 83, 6, '2020-09-01', '11:00', 'NO DISPONIBLE'),
(1324, 83, 10, '2020-09-01', '11:00', 'NO DISPONIBLE'),
(1325, 83, 6, '2020-09-02', '11:00', 'NO DISPONIBLE'),
(1326, 83, 10, '2020-09-02', '11:00', 'NO DISPONIBLE'),
(1327, 83, 6, '2020-09-03', '11:00', 'NO DISPONIBLE'),
(1328, 83, 10, '2020-09-03', '11:00', 'NO DISPONIBLE'),
(1329, 84, 9, '2020-09-04', '11:00', 'NO DISPONIBLE'),
(1330, 84, 10, '2020-09-04', '11:00', 'NO DISPONIBLE'),
(1331, 84, 9, '2020-09-05', '11:00', 'NO DISPONIBLE'),
(1332, 84, 10, '2020-09-05', '11:00', 'NO DISPONIBLE'),
(1333, 84, 9, '2020-09-06', '11:00', 'NO DISPONIBLE'),
(1334, 84, 10, '2020-09-06', '11:00', 'NO DISPONIBLE'),
(1335, 84, 9, '2020-09-07', '11:00', 'NO DISPONIBLE'),
(1336, 84, 10, '2020-09-07', '11:00', 'NO DISPONIBLE'),
(1337, 84, 9, '2020-09-08', '11:00', 'NO DISPONIBLE'),
(1338, 84, 10, '2020-09-08', '11:00', 'NO DISPONIBLE'),
(1339, 84, 9, '2020-09-09', '11:00', 'NO DISPONIBLE'),
(1340, 84, 10, '2020-09-09', '11:00', 'NO DISPONIBLE'),
(1341, 84, 9, '2020-09-10', '11:00', 'NO DISPONIBLE'),
(1342, 84, 10, '2020-09-10', '11:00', 'NO DISPONIBLE'),
(1343, 84, 9, '2020-09-11', '11:00', 'NO DISPONIBLE'),
(1344, 84, 10, '2020-09-11', '11:00', 'NO DISPONIBLE');

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
(6, 4, 2, '02/02/2018', '12:30'),
(7, 1, 1, '26/11/2018', '8:00'),
(10, 2, 5, '26/11/2018', '8:00'),
(11, 3, 1, '26/11/2018', '8:00'),
(12, 4, 7, '26/11/2018', '8:00'),
(13, 5, 1, '26/11/2018', '8:00'),
(14, 6, 7, '26/11/2018', '8:00'),
(15, 7, 1, '26/11/2018', '8:00'),
(16, 7, 1, '26/11/2018', '8:00'),
(17, 8, 7, '26/11/2018', '8:00'),
(18, 9, 4, '26/11/2018', '8:00'),
(19, 10, 4, '26/11/2018', '8:00'),
(33, 2, 1, '26/11/2018', '9:30'),
(34, 1, 1, '26/11/2018', '9:30'),
(35, 3, 1, '26/11/2018', '9:30'),
(36, 7, 1, '24/11/2018', '21:30'),
(38, 10, 1, '24/1/2019', '8:00'),
(39, 10, 1, '12/11/2018', '11:00');

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
(1, 'gatitoTravieso', '5555', 'Luisa Maria', 'Bernardez', 'luisamaria@hotmail.com', 'user'),
(2, 'marilo', 'omvormeabv', 'Marilo', 'Montero', 'MMtero@club.com', 'user'),
(3, 'faleT', 'faleT', 'Josefa', 'Lete', 'josef@lete.com', 'user'),
(4, 'admin', 'admin', 'David', 'Ramos', 'davidR@gmail.com', 'admin'),
(5, 'OloV', 'jlbhkjvh', 'Lora', 'Partner', 'Olo88@mail.fresh.com', 'user'),
(6, 'Mute', 'wghejhe', 'Maria', 'Mote', 'mote5@yahoo.com', 'instructor'),
(7, 'LaMari', 'thisisnofake', 'Marife', 'Garcia', 'html@ajax.es', 'instructor'),
(8, 'conejomalo', 'jhbshbsga', 'Bad ', 'Bunnie', 'badBu@heha.com', 'admin'),
(9, 'yuya', 'hsrjmsjn', 'Yurena', 'Lorenzo', 'yuyu@nml.com', 'user'),
(10, 'lita3', 'hgsrj', 'Lita', 'Romirez', 'lito@nsv.com', 'user');

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
-- Indices de la tabla `proposedmatch`
--
ALTER TABLE `proposedmatch`
  ADD PRIMARY KEY (`idProposedMatch`),
  ADD KEY `pairPropose` (`idPair`),
  ADD KEY `matchPropose` (`idMatch`);

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
  MODIFY `idCategoryGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
  MODIFY `idChampionship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `idClass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `court`
--
ALTER TABLE `court`
  MODIFY `idCourt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `group`
--
ALTER TABLE `group`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `match`
--
ALTER TABLE `match`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `pair`
--
ALTER TABLE `pair`
  MODIFY `idPair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idPromotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proposedmatch`
--
ALTER TABLE `proposedmatch`
  MODIFY `idProposedMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1345;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Filtros para la tabla `proposedmatch`
--
ALTER TABLE `proposedmatch`
  ADD CONSTRAINT `matchPropose` FOREIGN KEY (`idMatch`) REFERENCES `match` (`idMatch`),
  ADD CONSTRAINT `pairPropose` FOREIGN KEY (`idPair`) REFERENCES `pair` (`idPair`) ON DELETE CASCADE ON UPDATE CASCADE;

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
