-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 03:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footballstat`
--

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Season_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`ID`, `Name`, `Season_ID`) VALUES
(1, 'Bluedragon League South', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_ID`, `Event_Name`) VALUES
(1, 'Goal'),
(2, 'Assist'),
(3, 'Yellow Card'),
(4, 'Red Card'),
(5, 'Own Goal'),
(6, 'Missed Penalty'),
(7, 'Yellow Red Card'),
(8, 'Penalty Goal');

-- --------------------------------------------------------

--
-- Stand-in structure for view `fixtures`
-- (See below for the actual view)
--
CREATE TABLE `fixtures` (
`Matchday` int(11)
,`Date` date
,`Home` varchar(255)
,`Away` varchar(255)
,`Time` time
,`Competition` varchar(255)
,`Stadium` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `fixture_event`
--

CREATE TABLE `fixture_event` (
  `Fixture_Event_ID` int(11) NOT NULL,
  `Schedule_ID` int(11) NOT NULL,
  `Team_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `Minute` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixture_event`
--

INSERT INTO `fixture_event` (`Fixture_Event_ID`, `Schedule_ID`, `Team_ID`, `Player_ID`, `Event_ID`, `Minute`) VALUES
(12, 23, 2, 45, 1, 58),
(13, 23, 3, 77, 3, 74),
(14, 24, 4, 108, 3, 15),
(15, 24, 1, 10, 3, 28),
(16, 24, 4, 96, 1, 40),
(17, 24, 1, 12, 1, 52),
(18, 24, 1, 21, 1, 53),
(19, 24, 4, 101, 1, 84),
(20, 24, 4, 122, 3, 92),
(21, 25, 4, 96, 3, 34),
(22, 25, 4, 112, 1, 48),
(23, 25, 4, 99, 1, 53),
(24, 25, 2, 41, 3, 91),
(25, 25, 2, 41, 7, 94),
(26, 27, 3, 73, 3, 40),
(27, 27, 3, 80, 3, 45),
(28, 27, 3, 80, 1, 50),
(29, 27, 3, 86, 1, 60),
(30, 27, 3, 86, 3, 70),
(31, 27, 1, 30, 3, 93),
(32, 28, 2, 47, 3, 18),
(33, 28, 2, 54, 3, 22),
(34, 28, 1, 5, 3, 66),
(35, 28, 1, 8, 3, 86),
(36, 29, 3, 86, 1, 9),
(37, 29, 3, 86, 1, 20),
(38, 29, 3, 86, 3, 30),
(39, 29, 3, 78, 3, 49),
(40, 29, 3, 92, 1, 72),
(41, 29, 3, 71, 3, 88),
(42, 29, 4, 102, 3, 35),
(43, 29, 4, 110, 1, 50),
(44, 29, 4, 99, 1, 93),
(45, 30, 3, 69, 1, 4),
(46, 30, 3, 76, 1, 58),
(47, 30, 3, 80, 3, 90),
(48, 30, 2, 65, 3, 23),
(49, 30, 2, 48, 1, 53),
(50, 30, 2, 43, 3, 78),
(51, 30, 2, 39, 3, 91),
(52, 30, 2, 54, 3, 93),
(53, 31, 1, 12, 1, 37),
(54, 31, 1, 17, 1, 60),
(55, 31, 1, 17, 3, 85),
(56, 31, 1, 23, 1, 94),
(57, 32, 2, 41, 1, 18),
(58, 32, 2, 41, 3, 19),
(59, 32, 2, 49, 3, 58),
(60, 32, 4, 100, 3, 81),
(61, 32, 4, 96, 3, 93),
(62, 32, 4, 123, 3, 94),
(63, 33, 3, 80, 1, 6),
(64, 33, 3, 87, 3, 9),
(65, 33, 3, 87, 7, 13),
(66, 33, 3, 73, 3, 43),
(67, 33, 3, 80, 3, 49),
(68, 33, 1, 18, 3, 45),
(69, 33, 1, 10, 3, 55),
(70, 33, 1, 19, 3, 68),
(71, 33, 1, 7, 1, 85),
(72, 33, 1, 19, 1, 95),
(73, 33, 1, 22, 3, 94),
(74, 33, 1, 8, 4, 96),
(75, 34, 1, 29, 3, 45),
(76, 34, 2, 39, 3, 45),
(77, 34, 2, 39, 7, 52),
(78, 34, 1, 14, 1, 65),
(79, 34, 1, 30, 3, 69),
(80, 34, 1, 19, 3, 75),
(81, 34, 1, 9, 3, 81),
(82, 34, 1, 14, 1, 94),
(83, 34, 2, 48, 3, 70),
(84, 34, 2, 34, 3, 75),
(85, 34, 2, 43, 3, 92),
(86, 35, 3, 92, 1, 10),
(87, 35, 3, 83, 1, 44),
(88, 35, 4, 96, 3, 54),
(89, 35, 3, 82, 3, 57),
(90, 35, 3, 68, 3, 62),
(96, 23, 3, 71, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `fixture_player`
--

CREATE TABLE `fixture_player` (
  `Schedule_ID` int(11) NOT NULL,
  `Team_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Lineup_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixture_player`
--

INSERT INTO `fixture_player` (`Schedule_ID`, `Team_ID`, `Player_ID`, `Lineup_ID`, `ID`) VALUES
(23, 2, 34, 2, 142),
(23, 2, 36, 1, 131),
(23, 2, 38, 1, 132),
(23, 2, 39, 2, 143),
(23, 2, 41, 1, 133),
(23, 2, 42, 1, 134),
(23, 2, 43, 1, 135),
(23, 2, 45, 1, 136),
(23, 2, 46, 2, 144),
(23, 2, 47, 1, 137),
(23, 2, 48, 2, 145),
(23, 2, 49, 2, 146),
(23, 2, 51, 1, 138),
(23, 2, 52, 1, 139),
(23, 2, 53, 1, 140),
(23, 2, 54, 2, 147),
(23, 2, 55, 1, 141),
(23, 2, 56, 2, 148),
(23, 3, 68, 1, 114),
(23, 3, 69, 1, 115),
(23, 3, 70, 1, 116),
(23, 3, 71, 2, 124),
(23, 3, 72, 1, 117),
(23, 3, 73, 1, 118),
(23, 3, 77, 1, 119),
(23, 3, 78, 1, 120),
(23, 3, 79, 1, 121),
(23, 3, 80, 1, 122),
(23, 3, 81, 2, 125),
(23, 3, 82, 1, 123),
(23, 3, 83, 2, 126),
(23, 3, 88, 2, 127),
(23, 3, 90, 2, 128),
(23, 3, 91, 2, 129),
(23, 3, 92, 2, 130),
(24, 1, 1, 2, 160),
(24, 1, 3, 1, 149),
(24, 1, 4, 2, 161),
(24, 1, 5, 1, 150),
(24, 1, 7, 1, 151),
(24, 1, 8, 1, 152),
(24, 1, 10, 1, 153),
(24, 1, 11, 1, 154),
(24, 1, 12, 1, 155),
(24, 1, 13, 2, 162),
(24, 1, 14, 2, 163),
(24, 1, 17, 2, 164),
(24, 1, 18, 1, 156),
(24, 1, 19, 2, 165),
(24, 1, 20, 1, 157),
(24, 1, 21, 1, 158),
(24, 1, 23, 2, 166),
(24, 1, 25, 2, 167),
(24, 1, 29, 1, 159),
(24, 1, 30, 2, 168),
(24, 4, 95, 1, 169),
(24, 4, 96, 1, 170),
(24, 4, 97, 2, 179),
(24, 4, 99, 2, 180),
(24, 4, 101, 2, 181),
(24, 4, 102, 2, 182),
(24, 4, 103, 2, 183),
(24, 4, 104, 2, 184),
(24, 4, 105, 1, 171),
(24, 4, 106, 1, 172),
(24, 4, 107, 2, 185),
(24, 4, 108, 1, 173),
(24, 4, 109, 2, 186),
(24, 4, 110, 1, 174),
(24, 4, 114, 1, 175),
(24, 4, 119, 1, 176),
(24, 4, 121, 1, 177),
(24, 4, 122, 2, 187),
(24, 4, 125, 1, 178),
(25, 2, 31, 2, 216),
(25, 2, 33, 2, 217),
(25, 2, 34, 1, 206),
(25, 2, 38, 1, 207),
(25, 2, 40, 2, 218),
(25, 2, 41, 1, 208),
(25, 2, 42, 2, 219),
(25, 2, 43, 1, 209),
(25, 2, 45, 1, 210),
(25, 2, 47, 1, 211),
(25, 2, 48, 2, 220),
(25, 2, 49, 2, 221),
(25, 2, 52, 1, 212),
(25, 2, 53, 1, 213),
(25, 2, 54, 1, 214),
(25, 2, 55, 1, 215),
(25, 2, 56, 2, 222),
(25, 4, 94, 1, 188),
(25, 4, 95, 2, 198),
(25, 4, 96, 1, 189),
(25, 4, 97, 2, 199),
(25, 4, 98, 1, 190),
(25, 4, 99, 2, 200),
(25, 4, 101, 2, 201),
(25, 4, 102, 1, 191),
(25, 4, 105, 1, 192),
(25, 4, 106, 2, 202),
(25, 4, 108, 1, 193),
(25, 4, 109, 2, 203),
(25, 4, 112, 1, 194),
(25, 4, 114, 1, 195),
(25, 4, 119, 1, 196),
(25, 4, 121, 2, 204),
(25, 4, 122, 2, 205),
(25, 4, 125, 1, 197),
(27, 1, 1, 1, 223),
(27, 1, 3, 1, 224),
(27, 1, 4, 2, 234),
(27, 1, 5, 1, 225),
(27, 1, 7, 1, 226),
(27, 1, 8, 1, 227),
(27, 1, 10, 2, 235),
(27, 1, 11, 1, 228),
(27, 1, 12, 1, 229),
(27, 1, 14, 2, 236),
(27, 1, 17, 2, 237),
(27, 1, 18, 2, 238),
(27, 1, 19, 1, 230),
(27, 1, 20, 2, 239),
(27, 1, 21, 1, 231),
(27, 1, 23, 2, 240),
(27, 1, 25, 2, 241),
(27, 1, 28, 1, 232),
(27, 1, 29, 1, 233),
(27, 1, 30, 2, 242),
(27, 3, 68, 1, 243),
(27, 3, 69, 1, 244),
(27, 3, 70, 1, 245),
(27, 3, 71, 1, 246),
(27, 3, 73, 1, 247),
(27, 3, 74, 2, 253),
(27, 3, 76, 2, 254),
(27, 3, 79, 1, 248),
(27, 3, 80, 1, 249),
(27, 3, 82, 1, 250),
(27, 3, 83, 2, 255),
(27, 3, 84, 2, 256),
(27, 3, 86, 1, 251),
(27, 3, 87, 1, 252),
(27, 3, 88, 2, 257),
(27, 3, 90, 2, 258),
(27, 3, 91, 2, 259),
(27, 3, 92, 2, 260),
(28, 1, 3, 1, 278),
(28, 1, 4, 1, 279),
(28, 1, 5, 1, 280),
(28, 1, 7, 2, 289),
(28, 1, 8, 1, 281),
(28, 1, 10, 2, 290),
(28, 1, 11, 2, 291),
(28, 1, 12, 1, 282),
(28, 1, 14, 1, 283),
(28, 1, 18, 1, 284),
(28, 1, 19, 2, 292),
(28, 1, 20, 1, 285),
(28, 1, 21, 1, 286),
(28, 1, 23, 1, 287),
(28, 1, 25, 2, 293),
(28, 1, 28, 1, 288),
(28, 1, 29, 2, 294),
(28, 1, 30, 2, 295),
(28, 2, 34, 1, 261),
(28, 2, 35, 1, 262),
(28, 2, 36, 2, 271),
(28, 2, 38, 2, 272),
(28, 2, 39, 1, 263),
(28, 2, 41, 1, 264),
(28, 2, 42, 1, 265),
(28, 2, 43, 1, 266),
(28, 2, 45, 1, 267),
(28, 2, 47, 1, 268),
(28, 2, 48, 2, 273),
(28, 2, 49, 2, 274),
(28, 2, 53, 1, 269),
(28, 2, 54, 1, 270),
(28, 2, 55, 2, 275),
(28, 2, 56, 2, 276),
(28, 2, 59, 2, 277),
(29, 3, 68, 2, 324),
(29, 3, 69, 1, 314),
(29, 3, 70, 1, 315),
(29, 3, 71, 2, 325),
(29, 3, 72, 2, 326),
(29, 3, 73, 1, 316),
(29, 3, 74, 2, 327),
(29, 3, 76, 2, 328),
(29, 3, 78, 1, 317),
(29, 3, 79, 1, 318),
(29, 3, 81, 1, 319),
(29, 3, 83, 2, 329),
(29, 3, 84, 1, 320),
(29, 3, 86, 1, 321),
(29, 3, 87, 1, 322),
(29, 3, 90, 2, 330),
(29, 3, 91, 2, 331),
(29, 3, 92, 1, 323),
(29, 4, 40, 1, 296),
(29, 4, 94, 1, 297),
(29, 4, 95, 1, 298),
(29, 4, 96, 1, 299),
(29, 4, 98, 2, 306),
(29, 4, 99, 2, 307),
(29, 4, 101, 1, 300),
(29, 4, 102, 1, 301),
(29, 4, 103, 2, 308),
(29, 4, 104, 2, 309),
(29, 4, 107, 2, 310),
(29, 4, 108, 1, 302),
(29, 4, 109, 2, 311),
(29, 4, 110, 1, 303),
(29, 4, 114, 1, 304),
(29, 4, 121, 2, 312),
(29, 4, 124, 2, 313),
(29, 4, 125, 1, 305),
(30, 2, 32, 2, 343),
(30, 2, 35, 1, 332),
(30, 2, 36, 1, 333),
(30, 2, 38, 2, 344),
(30, 2, 39, 1, 334),
(30, 2, 41, 2, 345),
(30, 2, 42, 1, 335),
(30, 2, 43, 1, 336),
(30, 2, 44, 2, 346),
(30, 2, 45, 1, 337),
(30, 2, 46, 2, 347),
(30, 2, 47, 1, 338),
(30, 2, 48, 1, 339),
(30, 2, 49, 2, 348),
(30, 2, 53, 1, 340),
(30, 2, 54, 2, 349),
(30, 2, 55, 1, 341),
(30, 2, 56, 2, 350),
(30, 2, 57, 2, 351),
(30, 2, 65, 1, 342),
(30, 3, 68, 1, 352),
(30, 3, 69, 1, 353),
(30, 3, 70, 1, 354),
(30, 3, 71, 2, 362),
(30, 3, 72, 1, 355),
(30, 3, 73, 1, 356),
(30, 3, 76, 2, 363),
(30, 3, 77, 2, 364),
(30, 3, 78, 2, 365),
(30, 3, 79, 1, 357),
(30, 3, 80, 1, 358),
(30, 3, 81, 1, 359),
(30, 3, 82, 1, 360),
(30, 3, 83, 2, 366),
(30, 3, 87, 1, 361),
(30, 3, 90, 2, 367),
(30, 3, 91, 2, 368),
(31, 1, 1, 2, 400),
(31, 1, 4, 1, 389),
(31, 1, 5, 1, 390),
(31, 1, 7, 2, 401),
(31, 1, 8, 1, 391),
(31, 1, 9, 2, 402),
(31, 1, 10, 1, 392),
(31, 1, 11, 1, 393),
(31, 1, 12, 1, 394),
(31, 1, 14, 2, 403),
(31, 1, 15, 2, 404),
(31, 1, 17, 2, 405),
(31, 1, 18, 1, 395),
(31, 1, 19, 1, 396),
(31, 1, 20, 1, 397),
(31, 1, 22, 2, 406),
(31, 1, 23, 2, 407),
(31, 1, 25, 2, 408),
(31, 1, 28, 1, 398),
(31, 1, 29, 1, 399),
(31, 4, 94, 2, 380),
(31, 4, 95, 2, 381),
(31, 4, 96, 2, 382),
(31, 4, 97, 2, 383),
(31, 4, 100, 1, 369),
(31, 4, 102, 1, 370),
(31, 4, 104, 1, 371),
(31, 4, 105, 2, 384),
(31, 4, 106, 1, 372),
(31, 4, 108, 1, 373),
(31, 4, 109, 1, 374),
(31, 4, 111, 2, 385),
(31, 4, 112, 1, 375),
(31, 4, 113, 2, 386),
(31, 4, 117, 2, 387),
(31, 4, 118, 1, 376),
(31, 4, 119, 1, 377),
(31, 4, 120, 1, 378),
(31, 4, 121, 1, 379),
(31, 4, 122, 2, 388),
(32, 2, 32, 2, 419),
(32, 2, 33, 2, 420),
(32, 2, 34, 2, 421),
(32, 2, 38, 1, 409),
(32, 2, 39, 1, 410),
(32, 2, 40, 2, 422),
(32, 2, 41, 1, 411),
(32, 2, 42, 1, 412),
(32, 2, 45, 2, 423),
(32, 2, 46, 2, 424),
(32, 2, 47, 1, 413),
(32, 2, 48, 1, 414),
(32, 2, 49, 1, 415),
(32, 2, 52, 1, 416),
(32, 2, 53, 1, 448),
(32, 2, 54, 1, 417),
(32, 2, 55, 1, 418),
(32, 2, 56, 2, 425),
(32, 2, 58, 2, 426),
(32, 2, 65, 2, 427),
(32, 4, 95, 1, 428),
(32, 4, 96, 1, 429),
(32, 4, 99, 2, 439),
(32, 4, 100, 2, 440),
(32, 4, 101, 1, 430),
(32, 4, 102, 2, 441),
(32, 4, 105, 1, 431),
(32, 4, 106, 1, 432),
(32, 4, 107, 2, 442),
(32, 4, 108, 2, 443),
(32, 4, 111, 2, 444),
(32, 4, 113, 2, 445),
(32, 4, 114, 1, 433),
(32, 4, 116, 1, 434),
(32, 4, 118, 2, 446),
(32, 4, 119, 1, 435),
(32, 4, 120, 2, 447),
(32, 4, 121, 1, 436),
(32, 4, 123, 1, 437),
(32, 4, 125, 1, 438),
(33, 1, 1, 2, 477),
(33, 1, 2, 1, 466),
(33, 1, 4, 1, 467),
(33, 1, 5, 1, 468),
(33, 1, 7, 2, 478),
(33, 1, 8, 1, 469),
(33, 1, 9, 2, 479),
(33, 1, 10, 1, 470),
(33, 1, 11, 1, 471),
(33, 1, 12, 1, 472),
(33, 1, 14, 2, 480),
(33, 1, 15, 2, 481),
(33, 1, 17, 2, 482),
(33, 1, 18, 1, 473),
(33, 1, 19, 2, 483),
(33, 1, 20, 1, 474),
(33, 1, 22, 2, 484),
(33, 1, 26, 2, 485),
(33, 1, 29, 1, 475),
(33, 1, 30, 1, 476),
(33, 3, 66, 2, 460),
(33, 3, 68, 1, 449),
(33, 3, 69, 1, 450),
(33, 3, 70, 1, 451),
(33, 3, 71, 1, 452),
(33, 3, 73, 1, 453),
(33, 3, 74, 2, 461),
(33, 3, 76, 2, 462),
(33, 3, 77, 2, 463),
(33, 3, 79, 1, 454),
(33, 3, 80, 1, 455),
(33, 3, 81, 2, 464),
(33, 3, 82, 1, 456),
(33, 3, 83, 1, 457),
(33, 3, 86, 1, 458),
(33, 3, 87, 1, 459),
(33, 3, 92, 2, 465),
(34, 1, 1, 2, 497),
(34, 1, 2, 1, 486),
(34, 1, 4, 1, 487),
(34, 1, 5, 1, 488),
(34, 1, 6, 2, 498),
(34, 1, 7, 2, 499),
(34, 1, 9, 2, 500),
(34, 1, 10, 1, 489),
(34, 1, 11, 1, 490),
(34, 1, 12, 1, 491),
(34, 1, 14, 2, 501),
(34, 1, 15, 2, 502),
(34, 1, 17, 1, 492),
(34, 1, 18, 1, 493),
(34, 1, 19, 2, 503),
(34, 1, 20, 1, 494),
(34, 1, 22, 2, 504),
(34, 1, 25, 2, 505),
(34, 1, 29, 1, 495),
(34, 1, 30, 1, 496),
(34, 2, 34, 1, 506),
(34, 2, 35, 2, 517),
(34, 2, 36, 2, 518),
(34, 2, 38, 1, 507),
(34, 2, 39, 1, 508),
(34, 2, 40, 2, 519),
(34, 2, 41, 1, 509),
(34, 2, 42, 1, 510),
(34, 2, 43, 2, 520),
(34, 2, 45, 2, 521),
(34, 2, 46, 2, 522),
(34, 2, 48, 1, 511),
(34, 2, 49, 2, 523),
(34, 2, 52, 1, 512),
(34, 2, 53, 1, 513),
(34, 2, 54, 2, 524),
(34, 2, 55, 1, 514),
(34, 2, 56, 1, 515),
(34, 2, 58, 1, 516),
(34, 2, 64, 2, 525),
(35, 3, 66, 2, 537),
(35, 3, 68, 1, 526),
(35, 3, 69, 1, 527),
(35, 3, 70, 2, 538),
(35, 3, 71, 1, 528),
(35, 3, 72, 2, 539),
(35, 3, 73, 1, 529),
(35, 3, 76, 2, 540),
(35, 3, 77, 2, 541),
(35, 3, 79, 1, 530),
(35, 3, 80, 1, 531),
(35, 3, 81, 2, 542),
(35, 3, 82, 1, 532),
(35, 3, 83, 1, 533),
(35, 3, 84, 2, 543),
(35, 3, 86, 1, 534),
(35, 3, 87, 1, 535),
(35, 3, 92, 1, 536),
(35, 4, 94, 1, 544),
(35, 4, 95, 2, 555),
(35, 4, 96, 1, 545),
(35, 4, 97, 2, 556),
(35, 4, 98, 2, 557),
(35, 4, 101, 1, 546),
(35, 4, 102, 2, 558),
(35, 4, 107, 1, 547),
(35, 4, 108, 1, 548),
(35, 4, 109, 2, 559),
(35, 4, 110, 1, 549),
(35, 4, 112, 2, 560),
(35, 4, 113, 1, 550),
(35, 4, 114, 1, 551),
(35, 4, 118, 2, 561),
(35, 4, 120, 2, 562),
(35, 4, 121, 2, 563),
(35, 4, 122, 1, 552),
(35, 4, 123, 1, 553),
(35, 4, 125, 1, 554);

-- --------------------------------------------------------

--
-- Table structure for table `fixture_sub`
--

CREATE TABLE `fixture_sub` (
  `ID` int(11) NOT NULL,
  `Schedule_ID` int(11) NOT NULL,
  `Team_ID` int(11) NOT NULL,
  `Playerin_ID` int(11) NOT NULL,
  `Playerout_ID` int(11) NOT NULL,
  `Minute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixture_sub`
--

INSERT INTO `fixture_sub` (`ID`, `Schedule_ID`, `Team_ID`, `Playerin_ID`, `Playerout_ID`, `Minute`) VALUES
(7, 23, 3, 92, 82, 78),
(8, 23, 3, 88, 69, 79),
(9, 23, 2, 34, 38, 67),
(10, 23, 2, 39, 41, 95),
(11, 24, 1, 19, 14, 46),
(12, 24, 4, 101, 95, 55),
(13, 24, 4, 99, 110, 68),
(14, 24, 1, 14, 11, 78),
(15, 24, 4, 102, 108, 82),
(16, 24, 4, 122, 125, 83),
(17, 24, 1, 30, 29, 87),
(18, 25, 4, 106, 98, 46),
(19, 25, 4, 99, 96, 47),
(20, 25, 4, 122, 125, 69),
(21, 25, 4, 95, 112, 86),
(22, 25, 4, 101, 102, 93),
(23, 25, 2, 56, 38, 74),
(24, 25, 2, 40, 55, 81),
(25, 27, 1, 18, 11, 65),
(26, 27, 1, 10, 28, 66),
(27, 27, 1, 14, 8, 74),
(28, 27, 1, 30, 19, 82),
(29, 27, 3, 88, 71, 68),
(30, 27, 3, 92, 86, 72),
(31, 27, 3, 76, 80, 84),
(32, 28, 2, 56, 41, 67),
(33, 28, 2, 36, 45, 85),
(34, 28, 2, 38, 35, 94),
(35, 28, 1, 19, 23, 46),
(36, 28, 1, 7, 18, 55),
(37, 28, 1, 11, 14, 75),
(38, 28, 1, 30, 8, 87),
(39, 28, 1, 25, 28, 88),
(40, 29, 4, 99, 95, 46),
(41, 29, 4, 121, 102, 47),
(42, 29, 4, 124, 96, 77),
(43, 29, 3, 83, 86, 55),
(44, 29, 3, 72, 92, 73),
(45, 29, 3, 71, 78, 84),
(46, 30, 2, 44, 45, 46),
(47, 30, 2, 38, 65, 60),
(48, 30, 2, 54, 55, 69),
(49, 30, 2, 41, 36, 80),
(50, 30, 2, 49, 35, 81),
(51, 30, 3, 71, 70, 62),
(52, 30, 3, 77, 68, 62),
(53, 31, 4, 105, 121, 68),
(54, 31, 4, 117, 118, 69),
(55, 31, 4, 95, 112, 78),
(56, 31, 4, 103, 106, 79),
(57, 31, 4, 122, 119, 80),
(58, 31, 1, 9, 28, 53),
(59, 31, 1, 7, 19, 57),
(60, 31, 1, 17, 12, 58),
(61, 31, 1, 23, 5, 75),
(62, 31, 1, 14, 11, 76),
(63, 32, 2, 34, 38, 45),
(64, 32, 2, 45, 55, 60),
(65, 32, 2, 56, 54, 76),
(66, 32, 4, 99, 95, 46),
(67, 32, 4, 100, 106, 47),
(68, 32, 4, 118, 101, 77),
(69, 33, 3, 77, 83, 17),
(70, 33, 3, 81, 70, 56),
(71, 33, 3, 76, 71, 79),
(72, 33, 3, 74, 82, 79),
(73, 33, 1, 22, 18, 46),
(74, 33, 1, 7, 2, 59),
(75, 33, 1, 14, 11, 66),
(76, 33, 1, 19, 5, 67),
(77, 33, 1, 9, 29, 88),
(78, 34, 1, 14, 11, 46),
(79, 34, 1, 9, 2, 54),
(80, 34, 1, 7, 17, 60),
(81, 34, 1, 15, 10, 71),
(82, 34, 1, 19, 30, 72),
(83, 34, 2, 35, 55, 62),
(84, 34, 2, 54, 58, 63),
(85, 34, 2, 49, 38, 68),
(86, 34, 2, 43, 41, 75),
(87, 34, 2, 45, 56, 76),
(88, 35, 3, 81, 83, 46),
(89, 35, 3, 77, 82, 62),
(90, 35, 3, 70, 87, 74),
(91, 35, 3, 72, 86, 88),
(92, 35, 4, 120, 123, 46),
(93, 35, 4, 98, 107, 47),
(94, 35, 4, 112, 122, 70),
(95, 35, 4, 97, 110, 76),
(96, 35, 4, 102, 125, 92);

-- --------------------------------------------------------

--
-- Table structure for table `football_clubs`
--

CREATE TABLE `football_clubs` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Competition_ID` int(11) NOT NULL,
  `Stadium_ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `pnglogo` varchar(255) NOT NULL,
  `Manager_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `football_clubs`
--

INSERT INTO `football_clubs` (`ID`, `Name`, `Competition_ID`, `Stadium_ID`, `Location`, `Nickname`, `pnglogo`, `Manager_ID`) VALUES
(1, 'Nakhonsi United', 1, 1, 'Nakhon si thammarat', 'Southern Dragon', 'Nakhonsi.png', 3),
(2, 'Young Singh Hatyai United', 1, 2, 'Songkhla', 'Young lion Two seas', 'Youngsingh.png ', 1),
(3, 'Songkhla FC', 1, 3, 'Songkhla', 'Samila Mermaid', 'Songkhlaf.png', 2),
(4, 'Nara United ', 1, 4, 'Narathiwat', 'Golae Destroyer', 'Nara.png', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fulltable`
-- (See below for the actual view)
--
CREATE TABLE `fulltable` (
`TeamID` int(11)
,`Logo` varchar(255)
,`Team` varchar(255)
,`Win` bigint(22)
,`Draw` bigint(22)
,`Lose` bigint(22)
,`Played` bigint(21)
,`GF` decimal(44,0)
,`GA` decimal(44,0)
,`GD` decimal(45,0)
,`Points` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `lineup`
--

CREATE TABLE `lineup` (
  `ID` int(11) NOT NULL,
  `Lineup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lineup`
--

INSERT INTO `lineup` (`ID`, `Lineup`) VALUES
(1, 'Lineup'),
(2, 'Substitute');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `pngmanager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `Name`, `Date_of_Birth`, `Nationality`, `pngmanager`) VALUES
(1, 'NARONGRID KHUNTIP', '1987-01-06', 'Thailand', 'NARONGRID.png'),
(2, 'MAKA HOPRASARTSUK', '1973-02-17', 'Thailand', 'MAKA.png'),
(3, 'JORG PETER STEINEBRUNNER', '1971-10-10', 'Germany', 'STEINEBRUNNER.png'),
(4, 'ABDULHALEM ABU', '1966-04-13', 'Thailand', 'ABDULHALEM.png');

-- --------------------------------------------------------

--
-- Table structure for table `match_no`
--

CREATE TABLE `match_no` (
  `Match_NO_ID` int(11) NOT NULL,
  `Match_NO` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_no`
--

INSERT INTO `match_no` (`Match_NO_ID`, `Match_NO`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `match_number`
--

CREATE TABLE `match_number` (
  `ID` int(11) NOT NULL,
  `matchs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_number`
--

INSERT INTO `match_number` (`ID`, `matchs`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `Player_ID` int(11) NOT NULL,
  `Player_Name` varchar(255) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Playerpng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`Player_ID`, `Player_Name`, `Date_of_Birth`, `Nationality`, `Playerpng`) VALUES
(1, 'PONGSAGORN SAMATTANARED', '1992-04-03', 'Thailand', 'PONGSAGORN.png'),
(2, 'NARUEPHON PROOMIMAS', '1996-02-25', 'Thailand', 'NARUEPHON.png'),
(3, 'THANED BENYAPAD', '1993-01-04', 'Thailand', 'THANED.png'),
(4, 'SAKOLWACH SAKOLLA', '1991-02-22', 'Thailand', 'SAKOLWACH.png'),
(5, 'WASAN SAMANSIN', '1992-11-13', 'Thailand', 'WASAN.png'),
(6, 'SIWARUT PHONHIRUN', '1996-08-23', 'Thailand', 'SIWARUT.png'),
(7, 'DIEGO 0LIVEIRAS', '1990-12-26', 'Brazil', 'DIEGO.png'),
(8, 'PHILLERSON NATAN SILVA DE OLIVEIRA', '1998-12-15', 'Brazil', 'PHILLERSON.png'),
(9, 'SONGRAN PUNGNOY', '1991-04-16', 'Thailand', 'SONGRAN.png'),
(10, 'ANTONIO VERZURA', '1992-05-27', 'Thailand', 'ANTONIO.png'),
(11, 'ADITHEP CHAISRIANAN', '2001-10-10', 'Thailand', 'ADITHEP.png'),
(12, 'ADISAK SENSOM-IED', '1994-12-11', 'Thailand', 'ADISAK.png'),
(13, 'PHANUPHAN CHANKAEW', '1995-04-14', 'Thailand', 'PHANUPHAN.png'),
(14, 'PORNTHEP HEEMLA', '1995-01-04', 'Thailand', 'PORNTHEP.png'),
(15, 'ATHIT WISETSLIPA', '1993-09-26', 'Thailand', 'ATHIT.png'),
(16, 'SUPHAKRIT MATTHOCHEDI', '1998-05-09', 'Thailand', 'SUPHAKRIT.png'),
(17, 'SATTAWAS INCHAREON', '1994-02-26', 'Thailand', 'SATTAWAS.png'),
(18, 'VORAWUT THONGNUMKAEW', '1992-05-10', 'Thailand', 'VORAWUT.png'),
(19, 'ADAM LASSAMANO', '1997-10-10', 'Thailand', 'ADAM.png'),
(20, 'CHAKHON PHILAKHLANG', '1998-03-08', 'Thailand', 'CHAKHON.png'),
(21, 'ERIVELTO EMILIANO DA SILVA', '1988-10-01', 'Brazil', 'ERIVELTO.png'),
(22, 'KITTIKON KHETPARA', '2002-06-12', 'Thailand', 'KITTIKON.png'),
(23, 'PHANUWAT JINTA', '1987-01-06', 'Thailand', 'PHANUWAT.png'),
(24, 'NAPAT SUKIAM', '1996-12-30', 'Thailand', 'NAPAT.png'),
(25, 'NATTAPOOM MAYA', '1991-12-05', 'Thailand', 'NATTAPOOM.png'),
(26, 'KITTIPHONG KHETPARA', '2002-06-12', 'Thailand', 'KITTIPHONG.png'),
(27, 'PITCHAYA PHOKAN', '1998-05-27', 'Thailand', 'PITCHAYA.png'),
(28, 'DANUSORN SOMCHOB', '1999-08-03', 'Thailand', 'DANUSORN.png'),
(29, 'EAKKALUK LUNGNARM', '1985-10-17', 'Thailand', 'EAKKALUK.png'),
(30, 'WANIT JAISAEN', '1992-07-25', 'Thailand', 'WANIT.png'),
(31, 'EKKACHAI REMMOH', '1989-09-04', 'Thailand', 'EKKACHAI.png'),
(32, 'THANATHON CHARANA ', '2000-05-01', 'Thailand', 'THANATHON.png'),
(33, 'ANIROOT MANOR ', '2000-05-08', 'Thailand', 'ANIROOT.png'),
(34, 'PONGDET CHAIMA ', '1991-12-07', 'Thailand', 'PONGDET.png'),
(35, 'PARUS THUMMAGORN ', '1997-06-17', 'Thailand', 'PARUS.png'),
(36, 'THANPOL CHAIYASIT', '1991-03-30', 'Thailand', 'THANPOL.png'),
(37, 'ATTAPHOL PRUEAMSUBOT ', '1999-06-23', 'Thailand', 'ATTAPHOL.png'),
(38, 'NATTHAPONG MANEESUWANG ', '1997-01-09', 'Thailand', 'NATTHAPONG.png'),
(39, 'YUTTANA CHAIKAEW ', '1981-02-26', 'Thailand', 'YUTTANA.png'),
(40, 'JITPANU SOMNAK ', '1997-06-08', 'Thailand', 'JITPANU.png'),
(41, 'NUTTAKORN KHUNJARERN ', '1992-02-19', 'Thailand', 'NUTTAKORN.png'),
(42, 'AMIRMOHAMMAD KARAMDAR', '1996-12-26', 'Iran', 'AMIRMOHAMMAD.png'),
(43, 'KASEM MUSIKACHAI ', '1996-04-26', 'Thailand', 'KASEM.png'),
(44, 'CHETSADAKORN KHLAISRIBUN ', '2001-02-01', 'Thailand', 'JITPANU.png'),
(45, 'SUTIN TEHPUYU ', '2001-03-16', 'Thailand', 'SUTIN.png'),
(46, 'TANATCHA SIRISOMBAT ', '1999-07-04', 'Thailand', 'TANATCHA.png'),
(47, 'ABUBAR TOHRENG ', '2000-06-11', 'Thailand', 'ABUBAR.png'),
(48, 'TAVEECHAI KLIANGKLAO ', '2000-12-22', 'Thailand', 'TAVEECHAI.png'),
(49, 'ABDULKODAY KASO ', '2000-07-25', 'Thailand', 'ABDULKODAY.png'),
(50, 'PHAIDUN PATHAN ', '2000-02-25', 'Thailand', 'PHAIDUN.png'),
(51, 'PIYA SAMAN ', '1989-10-23', 'Thailand', 'PIYA.png'),
(52, 'PHANTEP CHOTIKAWIN ', '1991-05-24', 'Thailand', 'PHANTEP.png'),
(53, 'AMRAN BUNGOSAYU', '1996-02-10', 'Thailand', 'AMRAN BUNGOSAYU.png'),
(54, 'AMRAN AWAE ', '2000-07-28', 'Thailand', 'AMRAN AWAE.png'),
(55, 'NOPADOL POOLSAWAT', '1996-06-15', 'Thailand', 'NOPADOL.png'),
(56, 'SAMREE YUSOH ', '2001-06-13', 'Thailand', 'SAMREE.png'),
(57, 'HATIN USTUS ', '2000-06-03', 'Thailand', 'HATIN.png'),
(58, 'MUHAMMADFARUT MUELOHHAMAE ', '2002-09-17', 'Thailand', 'MUHAMMADFARUT.png'),
(59, 'APINAN PUHAT ', '2000-06-09', 'Thailand', 'APINAN.png'),
(60, 'TAWUT SABOK ', '2004-03-09', 'Thailand', 'TAWUT.png'),
(61, 'HABDON MASA ', '2005-10-11', 'Thailand', 'HABDON.png'),
(62, 'ARNUH WONGWAEN ', '2006-06-14', 'Thailand', 'ARNUH.png'),
(63, 'CHEFREE CHEAMA ', '2004-08-10', 'Thailand', 'CHEFREE.png'),
(64, 'NAPAT CHEMUDOR ', '2003-09-09', 'Thailand', 'NAPAT2.png'),
(65, 'AEKKALUX BUTRACH ', '2000-09-11', 'Thailand', 'AEKKALUX.png'),
(66, 'PANAWAT PRABDSMORNCHAI', '1997-07-21', 'Thailand', 'PANAWAT.png'),
(67, 'CHANATIP KRAINARA', '2003-03-30', 'Thailand', 'CHANATIP.png'),
(68, 'SIRIWAT SINTURAK', '1992-09-28', 'Thailand', 'SIRIWAT.png'),
(69, 'ABDULHAFIS NIBU', '1991-10-02', 'Thailand', 'ABDULHAFIS.png'),
(70, 'WARAWUT MOTIM', '1998-05-08', 'Thailand', 'WARAWUT.png'),
(71, 'NOTO BOONTAWAN', '1997-05-02', 'Thailand', 'NOTO.png'),
(72, 'TEERAYUT NGAMLAMAI', '1988-06-20', 'Thailand', 'TEERAYUT.png'),
(73, 'FILIPE MUNDIM NUNES', '1990-02-20', 'Brazil', 'FILIPE.png'),
(74, 'PHONGCHANA KONGKIRIT', '1998-08-10', 'Thailand', 'PHONGCHANA.png'),
(75, 'BASREE SANRON', '2002-11-19', 'Thailand', 'BASREE.png'),
(76, 'TEERAWAT DURNEE', '1990-04-28', 'Thailand', 'TEERAWAT.png'),
(77, 'NOPPARAT SAKUN-OOD', '1986-03-12', 'Thailand', 'NOPPARAT.png'),
(78, 'OSCAR KARL', '1997-10-17', 'Thailand', 'OSCAR.png'),
(79, 'SUNTIPARP BOONLILANG', '1994-08-02', 'Thailand', 'SUNTIPARP.png'),
(80, 'MAIRON NATAN PEREIRA MACIEL OLIVEIRA', '1991-03-19', 'Brazil', 'MAIRON.png'),
(81, 'WATTANASUPT JARERNSRI', '1991-03-09', 'Thailand', 'WATTANASUPT.png'),
(82, 'NASREE DUELOH', '1996-09-05', 'Thailand', 'NASREE.png'),
(83, 'NITITORN SRIPRAMARN', '2000-07-31', 'Thailand', 'NITITORN.png'),
(84, 'ABDULHAKIM CEHSANI', '1995-03-24', 'Thailand', 'ABDULHAKIM.png'),
(85, 'SORAWAT PHOSAMAN', '2003-01-30', 'Thailand', 'SORAWAT.png'),
(86, 'DAIKI KONOMURA', '1990-04-21', 'Japan', 'DAIKI.png'),
(87, 'YODSAWAT MONTHA', '1995-11-11', 'Thailand', 'YODSAWAT.png'),
(88, 'CHANUKORN SRIRAK', '1989-03-27', 'Thailand', 'CHANUKORN.png'),
(89, 'PATTARAPOL MOLITO', '1983-06-22', 'Thailand', 'PATTARAPOL.png'),
(90, 'AKARAWIT SAEMARAM', '1997-09-30', 'Thailand', 'AKARAWIT.png'),
(91, 'WATCHARA HONGTHONG', '1997-05-21', 'Thailand', 'WATCHARA.png'),
(92, 'PEERRAPAT KANTHA', '2000-06-21', 'Thailand', 'PEERRAPAT.png'),
(93, 'MAHAMASABRI AWAEBUESA', '1984-05-13', 'Thailand', 'MAHAMASABRI.png'),
(94, 'ANAS DULYASEREE', '1995-06-14', 'Thailand', 'ANAS.png'),
(95, 'KUWA-EL YAWARHASAN', '1996-08-06', 'Thailand', 'KUWA.png'),
(96, 'ANON SANMAD', '1991-07-03', 'Thailand', 'ANON.png'),
(97, 'MUHAMMADSORFI-EL WAJI', '1990-03-15', 'Thailand', 'MUHAMMADSORFI.png'),
(98, 'ILHAM IBROHING', '1998-06-13', 'Thailand', 'ILHAM.png'),
(99, 'MANSO AUSMAN', '1993-03-16', 'Thailand', 'MANSO.png'),
(100, 'MAHAMASUFIYA SANI', '2002-10-24', 'Thailand', 'MAHAMASUFIYA.png'),
(101, 'SUKREE ETAE', '1986-01-22', 'Thailand', 'SUKREE.png'),
(102, 'ADAM USENG', '1992-09-13', 'Thailand', 'ADAM2.png'),
(103, 'MUMADFIRDAO DOLOH', '2002-04-07', 'Thailand', 'MUMADFIRDAO.png'),
(104, 'MAYUNAN YAENA', '2000-03-29', 'Thailand', 'MAYUNAN.png'),
(105, 'SUCHAT TENGPARAME', '1996-08-15', 'Thailand', 'SUCHAT.png'),
(106, 'EMMANUEL IKECHUKWU NWACHI', '1988-10-10', 'Nideria', 'EMMANUEL.png'),
(107, 'BAHRAIN BINKADIR', '2000-04-16', 'Thailand', 'BAHRAIN.png'),
(108, 'FAIS SAMOH', '2000-01-28', 'Thailand', 'FAIS.png'),
(109, 'RIBUWAN AKEH', '1997-02-19', 'Thailand', 'RIBUWAN.png'),
(110, 'HAMIRUL CHAE-ASAE', '1994-06-04', 'Thailand', 'HAMIRUL.png'),
(111, 'MUHAMMADSABREE DOLOH', '1999-05-28', 'Thailand', 'MUHAMMADSABREE.png'),
(112, 'FAIROS CHEMAE', '1997-01-15', 'Thailand', 'FAIROS.png'),
(113, 'JARUDET RAMUDTH', '1994-07-12', 'Thailand', 'JARUDET.png'),
(114, 'PHANITAN PEUANHKEAW', '1998-10-18', 'Thailand', 'PHANITAN.png'),
(115, 'ZAKAREEYA SALAEMAE', '1999-04-19', 'Thailand', 'ZAKAREEYA.png'),
(116, 'A-RIF SAMA-AE', '1994-08-21', 'Thailand', 'ARIF.png'),
(117, 'FADDRU DIYAULISLAM', '2003-04-06', 'Thailand', 'FADDRU.png'),
(118, 'SAIBUDIN DA-OH', '1987-06-25', 'Thailand', 'SAIBUDIN.png'),
(119, 'RYOHEi MAEDA', '1985-05-05', 'Japan', 'RYOHEi.png'),
(120, 'SALMAN WAESUEMAE', '2002-05-24', 'Thailand', 'SALMAN.png'),
(121, 'AH-MAD TOHTABA', '1995-10-10', 'Thailand', 'AHMAD.png'),
(122, 'ALEEF POHJI', '1987-04-13', 'Thailand', 'ALEEF.png'),
(123, 'ANUWA KOOWING', '2001-04-03', 'Thailand', 'ANUWA.png'),
(124, 'SULAIMAN AWAeKACHI', '1988-07-09', 'Thailand', 'SULAIMAN.png'),
(125, 'SOMNUEK KAEWARPORN', '1985-07-20', 'Thailand', 'SOMNUEK.png');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Position_ID` int(11) NOT NULL,
  `Main_Position_Name` varchar(255) NOT NULL,
  `Other_Position_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Position_ID`, `Main_Position_Name`, `Other_Position_Name`) VALUES
(1, 'Goalkeeper', NULL),
(2, 'Defender', NULL),
(3, 'Midfielder', NULL),
(4, 'Forward', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `results`
-- (See below for the actual view)
--
CREATE TABLE `results` (
`ID` int(11)
,`Home_Team` varchar(255)
,`Away_Team` varchar(255)
,`Date` date
,`Time` time
,`Home_Goals_For` bigint(22)
,`Away_Goals_For` bigint(22)
,`Home_Club_ID` int(11)
,`Away_Club_ID` int(11)
,`Home_Logo` varchar(255)
,`Away_Logo` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `results_raw2`
-- (See below for the actual view)
--
CREATE TABLE `results_raw2` (
`ID` int(11)
,`Home_Club_ID` int(11)
,`Home_Goals_For` bigint(22)
,`Home_Points` int(1)
,`Away_Club_ID` int(11)
,`Away_Goals_For` bigint(22)
,`Away_points` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `results_raw_2`
-- (See below for the actual view)
--
CREATE TABLE `results_raw_2` (
`ID` int(11)
,`Home_Club_ID` int(11)
,`Home_Score1` bigint(21)
,`Away_Club_ID` int(11)
,`Away_Score1` bigint(21)
,`Home_Score2` bigint(21)
,`Away_Score2` bigint(21)
,`Home_Score` bigint(22)
,`Away_Score` bigint(22)
);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ID` int(11) NOT NULL,
  `Competition_ID` int(11) NOT NULL,
  `Match_Number_ID` int(11) NOT NULL,
  `Season_ID` int(11) NOT NULL,
  `Home_Club_ID` int(11) NOT NULL,
  `Away_Club_ID` int(11) NOT NULL,
  `Stadium_ID` int(11) NOT NULL,
  `Match_NO_ID` int(11) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Descrip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID`, `Competition_ID`, `Match_Number_ID`, `Season_ID`, `Home_Club_ID`, `Away_Club_ID`, `Stadium_ID`, `Match_NO_ID`, `Time`, `Date`, `Descrip`) VALUES
(23, 1, 1, 1, 3, 2, 3, 1, '16:00:00', '2021-09-04', 'Songkhla FC VS Young Singh Hatyai United'),
(24, 1, 2, 1, 1, 4, 1, 1, '16:00:00', '2021-09-05', 'Nakhonsi United VS Nara United '),
(25, 1, 3, 1, 4, 2, 4, 2, '16:00:00', '2021-09-11', 'Nara United  VS Young Singh Hatyai United'),
(27, 1, 4, 1, 1, 3, 1, 2, '16:00:00', '2021-09-12', 'Nakhonsi United VS Songkhla FC'),
(28, 1, 5, 1, 2, 1, 2, 3, '16:00:00', '2021-09-25', 'Young Singh Hatyai United VS Nakhonsi United'),
(29, 1, 6, 1, 4, 3, 4, 3, '16:00:00', '2021-09-26', 'Nara United  VS Songkhla FC  '),
(30, 1, 7, 1, 2, 3, 2, 4, '16:00:00', '2021-10-02', 'Young Singh Hatyai United VS Songkhla FC'),
(31, 1, 8, 1, 4, 1, 4, 4, '16:00:00', '2021-10-03', 'Nara United  VS Nakhonsi United'),
(32, 1, 9, 1, 2, 4, 2, 5, '16:00:00', '2021-10-09', 'Young Singh Hatyai United VS Nara United '),
(33, 1, 10, 1, 3, 1, 3, 5, '16:00:00', '2021-10-10', 'Songkhla FC VS Nakhonsi United'),
(34, 1, 11, 1, 1, 2, 1, 6, '16:00:00', '2021-10-16', 'Nakhonsi United VS Young Singh Hatyai United'),
(35, 1, 12, 1, 3, 4, 3, 6, '16:00:00', '2021-10-17', 'Songkhla FC VS Nara United ');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `Season_ID` int(11) NOT NULL,
  `Season` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`Season_ID`, `Season`) VALUES
(1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `Stadium_ID` int(11) NOT NULL,
  `Stadium_Name` varchar(255) NOT NULL,
  `stadiumpng` varchar(255) NOT NULL,
  `Capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`Stadium_ID`, `Stadium_Name`, `stadiumpng`, `Capacity`) VALUES
(1, 'Nakhon Si Thammarat Stadium', 'Nakhonsistadium1.JPG', '12,000'),
(2, 'Southern Lak Muang Stadium', 'Lakmuang.JPG', '3,000'),
(3, 'Tinnasulanon Stadium', 'Tinnasulanon.JPEG', '47,500'),
(4, 'Narathiwat Stadium', 'Narathiwat.JPG', '7,000');

-- --------------------------------------------------------

--
-- Table structure for table `team_player`
--

CREATE TABLE `team_player` (
  `Team_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Position_ID` int(11) NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_player`
--

INSERT INTO `team_player` (`Team_ID`, `Player_ID`, `Position_ID`, `Number`) VALUES
(1, 1, 1, 1),
(1, 2, 3, 4),
(1, 3, 2, 5),
(1, 4, 2, 6),
(1, 5, 3, 7),
(1, 6, 3, 9),
(1, 7, 4, 10),
(1, 8, 4, 11),
(1, 9, 2, 15),
(1, 10, 3, 16),
(1, 11, 4, 17),
(1, 12, 2, 18),
(1, 13, 2, 20),
(1, 14, 4, 21),
(1, 15, 3, 22),
(1, 16, 3, 24),
(1, 17, 2, 26),
(1, 18, 2, 27),
(1, 19, 3, 29),
(1, 20, 1, 30),
(1, 21, 4, 32),
(1, 22, 2, 34),
(1, 23, 3, 35),
(1, 24, 1, 39),
(1, 25, 4, 41),
(1, 26, 3, 44),
(1, 27, 2, 55),
(1, 28, 2, 66),
(1, 29, 2, 71),
(1, 30, 4, 89),
(2, 31, 1, 1),
(2, 32, 3, 4),
(2, 33, 3, 6),
(2, 34, 3, 7),
(2, 35, 3, 8),
(2, 36, 4, 9),
(2, 37, 4, 10),
(2, 38, 3, 11),
(2, 39, 3, 12),
(2, 40, 2, 13),
(2, 41, 4, 14),
(2, 42, 2, 15),
(2, 43, 2, 3),
(2, 44, 3, 16),
(2, 45, 4, 17),
(2, 46, 1, 18),
(2, 47, 2, 19),
(2, 48, 2, 20),
(2, 49, 3, 21),
(2, 50, 4, 22),
(2, 51, 3, 23),
(2, 52, 2, 24),
(2, 53, 1, 25),
(2, 54, 3, 27),
(2, 55, 3, 28),
(2, 56, 3, 30),
(2, 57, 2, 33),
(2, 58, 3, 34),
(2, 59, 1, 35),
(2, 60, 4, 43),
(2, 61, 2, 44),
(2, 62, 3, 45),
(2, 63, 4, 47),
(2, 64, 3, 48),
(2, 65, 4, 77),
(3, 66, 1, 1),
(3, 67, 2, 3),
(3, 68, 2, 4),
(3, 69, 2, 5),
(3, 70, 3, 6),
(3, 71, 3, 8),
(3, 72, 4, 9),
(3, 73, 4, 10),
(3, 74, 2, 12),
(3, 75, 4, 13),
(3, 76, 4, 14),
(3, 77, 2, 15),
(3, 78, 2, 17),
(3, 79, 1, 18),
(3, 80, 4, 19),
(3, 81, 3, 21),
(3, 82, 4, 23),
(3, 83, 4, 27),
(3, 84, 2, 29),
(3, 85, 1, 30),
(3, 86, 4, 31),
(3, 87, 2, 32),
(3, 88, 3, 37),
(3, 89, 2, 38),
(3, 90, 2, 39),
(3, 91, 1, 86),
(3, 92, 4, 91),
(4, 93, 2, 4),
(4, 94, 2, 5),
(4, 95, 3, 6),
(4, 96, 3, 7),
(4, 97, 3, 8),
(4, 98, 4, 9),
(4, 99, 4, 10),
(4, 100, 4, 11),
(4, 101, 4, 13),
(4, 102, 3, 14),
(4, 103, 4, 15),
(4, 104, 2, 18),
(4, 105, 2, 19),
(4, 106, 4, 20),
(4, 107, 4, 22),
(4, 108, 2, 24),
(4, 109, 1, 26),
(4, 110, 3, 27),
(4, 111, 1, 28),
(4, 112, 3, 29),
(4, 113, 1, 31),
(4, 114, 2, 36),
(4, 115, 1, 38),
(4, 116, 1, 39),
(4, 117, 4, 40),
(4, 118, 3, 41),
(4, 119, 3, 42),
(4, 120, 2, 49),
(4, 121, 2, 50),
(4, 122, 3, 55),
(4, 123, 2, 62),
(4, 124, 4, 77),
(4, 125, 3, 88);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`) VALUES
(5, 'Punnawit', 'Foithong', 'ppoom.pp77@gmail.com', '$2y$10$FDFj8i.netN91hsBbIIX9uH0qsZs5PiHgAdVona6q5/EfMQ3hMniW', 'admin'),
(6, 'Parinthon', 'Foithong', 'p@mail.com', '$2y$10$z4jVCfYb4MVHWOSXlk9xS.OZiVlcMSM9aBuvmgUV.vGV8zt0MRhAe', 'user'),
(7, 'Lionel', 'Messi', 'messi@mail.com', '$2y$10$GmdUAIJNm/bHbLG/OsbwiuS5i0E0Gi.44oMKhmByhavtcDYd./wFa', 'user'),
(8, 'Punnawit', 'Foithong', 'pp@mail.com', '$2y$10$zqs/t439mCwTJFUem/Igi.sibYDbnoyIU0GQ3Pm5aFjZPzMwF5Mxu', 'user');

-- --------------------------------------------------------

--
-- Structure for view `fixtures`
--
DROP TABLE IF EXISTS `fixtures`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fixtures`  AS SELECT `schedule`.`Match_NO_ID` AS `Matchday`, `schedule`.`Date` AS `Date`, `football_clubs`.`Name` AS `Home`, `team2`.`Name` AS `Away`, `schedule`.`Time` AS `Time`, `competition`.`Name` AS `Competition`, `stadium`.`Stadium_Name` AS `Stadium` FROM ((((`schedule` join `football_clubs` on(`schedule`.`Home_Club_ID` = `football_clubs`.`ID`)) join `football_clubs` `team2` on(`schedule`.`Away_Club_ID` = `team2`.`ID`)) join `competition` on(`schedule`.`Competition_ID` = `competition`.`ID`)) join `stadium` on(`schedule`.`Stadium_ID` = `stadium`.`Stadium_ID`)) ORDER BY `schedule`.`Match_NO_ID` ASC, `schedule`.`Date` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `fulltable`
--
DROP TABLE IF EXISTS `fulltable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fulltable`  AS SELECT DISTINCT `football_clubs`.`ID` AS `TeamID`, `football_clubs`.`pnglogo` AS `Logo`, `football_clubs`.`Name` AS `Team`, (select count(0) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Home_Points` = 3) + (select count(0) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Away_points` = 3) AS `Win`, (select count(0) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Home_Points` = 1) + (select count(0) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Away_points` = 1) AS `Draw`, (select count(0) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Home_Points` = 0) + (select count(0) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID` and `results_raw2`.`Away_points` = 0) AS `Lose`, (select count(0) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID` or `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) AS `Played`, (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) AS `GF`, (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) AS `GA`, (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) - ((select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`)) AS `GD`, (select sum(`results_raw2`.`Home_Points`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_points`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) AS `Points` FROM (`football_clubs` join `results_raw2` on(`football_clubs`.`ID` = `results_raw2`.`Home_Club_ID` or `football_clubs`.`ID` = `results_raw2`.`Away_Club_ID`)) ORDER BY (select sum(`results_raw2`.`Home_Points`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_points`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) DESC, (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) - ((select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`)) DESC, (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) DESC, (select sum(`results_raw2`.`Away_Goals_For`) from `results_raw2` where `results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`) + (select sum(`results_raw2`.`Home_Goals_For`) from `results_raw2` where `results_raw2`.`Away_Club_ID` = `football_clubs`.`ID`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `results`
--
DROP TABLE IF EXISTS `results`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `results`  AS SELECT `results_raw2`.`ID` AS `ID`, `football_clubs`.`Name` AS `Home_Team`, `team2`.`Name` AS `Away_Team`, `schedule`.`Date` AS `Date`, `schedule`.`Time` AS `Time`, `results_raw2`.`Home_Goals_For` AS `Home_Goals_For`, `results_raw2`.`Away_Goals_For` AS `Away_Goals_For`, `results_raw2`.`Home_Club_ID` AS `Home_Club_ID`, `results_raw2`.`Away_Club_ID` AS `Away_Club_ID`, `football_clubs`.`pnglogo` AS `Home_Logo`, `team2`.`pnglogo` AS `Away_Logo` FROM (((`results_raw2` join `football_clubs` on(`results_raw2`.`Home_Club_ID` = `football_clubs`.`ID`)) join `football_clubs` `team2` on(`results_raw2`.`Away_Club_ID` = `team2`.`ID`)) join `schedule` on(`results_raw2`.`ID` = `schedule`.`ID`)) ORDER BY `schedule`.`Match_NO_ID` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `results_raw2`
--
DROP TABLE IF EXISTS `results_raw2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `results_raw2`  AS SELECT `results_raw_2`.`ID` AS `ID`, `results_raw_2`.`Home_Club_ID` AS `Home_Club_ID`, `results_raw_2`.`Home_Score` AS `Home_Goals_For`, CASE WHEN `results_raw_2`.`Home_Score` > `results_raw_2`.`Away_Score` THEN 3 WHEN `results_raw_2`.`Away_Score` > `results_raw_2`.`Home_Score` THEN 0 ELSE 1 END AS `Home_Points`, `results_raw_2`.`Away_Club_ID` AS `Away_Club_ID`, `results_raw_2`.`Away_Score` AS `Away_Goals_For`, CASE WHEN `results_raw_2`.`Home_Score` < `results_raw_2`.`Away_Score` THEN 3 WHEN `results_raw_2`.`Away_Score` < `results_raw_2`.`Home_Score` THEN 0 ELSE 1 END AS `Away_points` FROM `results_raw_2` ;

-- --------------------------------------------------------

--
-- Structure for view `results_raw_2`
--
DROP TABLE IF EXISTS `results_raw_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `results_raw_2`  AS SELECT `schedule`.`ID` AS `ID`, `schedule`.`Home_Club_ID` AS `Home_Club_ID`, (select count(0) from `fixture_event` where `fixture_event`.`Schedule_ID` = `schedule`.`ID` and `fixture_event`.`Team_ID` = `schedule`.`Home_Club_ID` and (`fixture_event`.`Event_ID` = 1 or `fixture_event`.`Event_ID` = 8)) AS `Home_Score1`, `schedule`.`Away_Club_ID` AS `Away_Club_ID`, (select count(0) from `fixture_event` where `fixture_event`.`Schedule_ID` = `schedule`.`ID` and `fixture_event`.`Team_ID` = `schedule`.`Away_Club_ID` and (`fixture_event`.`Event_ID` = 1 or `fixture_event`.`Event_ID` = 8)) AS `Away_Score1`, (select count(0) from `fixture_event` where `fixture_event`.`Schedule_ID` = `schedule`.`ID` and `fixture_event`.`Team_ID` = `schedule`.`Away_Club_ID` and `fixture_event`.`Event_ID` = 5) AS `Home_Score2`, (select count(0) from `fixture_event` where `fixture_event`.`Schedule_ID` = `schedule`.`ID` and `fixture_event`.`Team_ID` = `schedule`.`Home_Club_ID` and `fixture_event`.`Event_ID` = 5) AS `Away_Score2`, (select `Home_Score1` + `Home_Score2`) AS `Home_Score`, (select `Away_Score1` + `Away_Score2`) AS `Away_Score` FROM `schedule` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Season_ID` (`Season_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `fixture_event`
--
ALTER TABLE `fixture_event`
  ADD PRIMARY KEY (`Fixture_Event_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`,`Team_ID`,`Player_ID`,`Event_ID`),
  ADD KEY `Player_ID` (`Player_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `fixture_player`
--
ALTER TABLE `fixture_player`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`,`Team_ID`,`Player_ID`,`Lineup_ID`),
  ADD KEY `Lineup_ID` (`Lineup_ID`),
  ADD KEY `Player_ID` (`Player_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `fixture_sub`
--
ALTER TABLE `fixture_sub`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Playerout_ID` (`Playerout_ID`,`Schedule_ID`,`Team_ID`,`Playerin_ID`),
  ADD KEY `Playerin_ID` (`Playerin_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `football_clubs`
--
ALTER TABLE `football_clubs`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `Stadium_ID` (`Stadium_ID`),
  ADD KEY `Competition_ID` (`Competition_ID`) USING BTREE,
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `lineup`
--
ALTER TABLE `lineup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `match_no`
--
ALTER TABLE `match_no`
  ADD PRIMARY KEY (`Match_NO_ID`);

--
-- Indexes for table `match_number`
--
ALTER TABLE `match_number`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`Player_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ID`,`Home_Club_ID`,`Away_Club_ID`) USING BTREE,
  ADD KEY `Away_Club_ID` (`Away_Club_ID`),
  ADD KEY `Home_Club_ID` (`Home_Club_ID`),
  ADD KEY `Season_ID` (`Season_ID`),
  ADD KEY `Match_NO_ID` (`Match_NO_ID`) USING BTREE,
  ADD KEY `Stadium_ID` (`Stadium_ID`) USING BTREE,
  ADD KEY `Match_Number_ID` (`Match_Number_ID`) USING BTREE,
  ADD KEY `Competition_ID` (`Competition_ID`) USING BTREE;

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`Season_ID`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`Stadium_ID`);

--
-- Indexes for table `team_player`
--
ALTER TABLE `team_player`
  ADD KEY `Team_ID` (`Team_ID`,`Player_ID`,`Position_ID`),
  ADD KEY `Player_ID` (`Player_ID`),
  ADD KEY `Position_ID` (`Position_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fixture_event`
--
ALTER TABLE `fixture_event`
  MODIFY `Fixture_Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `fixture_player`
--
ALTER TABLE `fixture_player`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;

--
-- AUTO_INCREMENT for table `fixture_sub`
--
ALTER TABLE `fixture_sub`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `football_clubs`
--
ALTER TABLE `football_clubs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lineup`
--
ALTER TABLE `lineup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `match_no`
--
ALTER TABLE `match_no`
  MODIFY `Match_NO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `match_number`
--
ALTER TABLE `match_number`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `Season_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stadium`
--
ALTER TABLE `stadium`
  MODIFY `Stadium_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`Season_ID`) REFERENCES `season` (`Season_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fixture_event`
--
ALTER TABLE `fixture_event`
  ADD CONSTRAINT `fixture_event_ibfk_1` FOREIGN KEY (`Schedule_ID`) REFERENCES `schedule` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_event_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_event_ibfk_3` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_event_ibfk_4` FOREIGN KEY (`Team_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fixture_player`
--
ALTER TABLE `fixture_player`
  ADD CONSTRAINT `fixture_player_ibfk_1` FOREIGN KEY (`Lineup_ID`) REFERENCES `lineup` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_player_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_player_ibfk_3` FOREIGN KEY (`Schedule_ID`) REFERENCES `schedule` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_player_ibfk_4` FOREIGN KEY (`Team_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fixture_sub`
--
ALTER TABLE `fixture_sub`
  ADD CONSTRAINT `fixture_sub_ibfk_1` FOREIGN KEY (`Playerin_ID`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_sub_ibfk_2` FOREIGN KEY (`Playerout_ID`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_sub_ibfk_3` FOREIGN KEY (`Schedule_ID`) REFERENCES `schedule` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixture_sub_ibfk_4` FOREIGN KEY (`Team_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `football_clubs`
--
ALTER TABLE `football_clubs`
  ADD CONSTRAINT `football_clubs_ibfk_1` FOREIGN KEY (`Competition_ID`) REFERENCES `competition` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `football_clubs_ibfk_2` FOREIGN KEY (`Stadium_ID`) REFERENCES `stadium` (`Stadium_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `football_clubs_ibfk_3` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Away_Club_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`Home_Club_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`Competition_ID`) REFERENCES `competition` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`Season_ID`) REFERENCES `season` (`Season_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`Stadium_ID`) REFERENCES `stadium` (`Stadium_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`Match_NO_ID`) REFERENCES `match_no` (`Match_NO_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_7` FOREIGN KEY (`Match_Number_ID`) REFERENCES `match_number` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_player`
--
ALTER TABLE `team_player`
  ADD CONSTRAINT `team_player_ibfk_1` FOREIGN KEY (`Team_ID`) REFERENCES `football_clubs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_player_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_player_ibfk_3` FOREIGN KEY (`Position_ID`) REFERENCES `position` (`Position_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
