-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 28. 13:24
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fogadas_zaro`
--
CREATE DATABASE IF NOT EXISTS `fogadas_zaro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fogadas_zaro`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `be_ki_fizetes`
--

CREATE TABLE `be_ki_fizetes` (
  `id` int(10) UNSIGNED NOT NULL,
  `penztarca_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `kartyaszam` bigint(20) NOT NULL,
  `osszeg` double NOT NULL,
  `kartya_tulajdonos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `be_ki_fizetes`
--

INSERT INTO `be_ki_fizetes` (`id`, `penztarca_id`, `datum`, `kartyaszam`, `osszeg`, `kartya_tulajdonos`) VALUES
(1, 2, '2023-03-20', 123456789123, 5000, 'teszt'),
(2, 2, '2023-03-20', 123456789123, 100, 'teszt'),
(3, 2, '2023-03-20', 123456789123, 1000, 'teszt'),
(4, 2, '2023-03-20', 123456789123, 420, 'teszt'),
(5, 2, '2023-03-20', 123456789123, 2000, 'teszt'),
(6, 2, '2023-03-20', 123456789123, -2000, 'teszt'),
(7, 2, '2023-03-20', 123456789123, -2000, 'teszt'),
(8, 2, '2023-03-20', 123456789123, 2000, 'tesztelek'),
(9, 2, '2023-03-20', 22222222222, 2000, 'tesztelek'),
(10, 2, '2023-03-20', 22222222222, 2000, 'tesztelek'),
(11, 2, '2023-03-20', 2312312123, 2000, 'tesztelek'),
(12, 2, '2023-03-20', 123456789123, 1000, 'teszt'),
(13, 2, '2023-03-20', 123123123, -2000, 'teszt'),
(14, 2, '2023-03-20', 123456789123, 2000, 'tesztelek'),
(15, 2, '2023-03-20', 123456789123, -2000, 'teszt'),
(16, 2, '2023-03-23', 12312321123, 2000, 'az'),
(17, 2, '2023-03-23', 123123, -1000, 'az'),
(18, 2, '2023-03-20', 213123123, 2000, 'az'),
(19, 6, '2023-03-24', 21332, 1100, 'az'),
(20, 6, '2023-03-26', 21332, 3, 'az'),
(21, 6, '2023-03-26', 21332, 2081, 'az'),
(22, 6, '2023-03-26', 21332, 3000, 'az'),
(23, 6, '2023-03-26', 21332, 2, 'az'),
(24, 6, '2023-03-26', 21332, 10000, 'az'),
(25, 6, '2023-03-27', 21332, 1000, 'az'),
(26, 6, '2023-03-28', 12312313123, 20000, 'az'),
(27, 6, '2023-03-28', 21332, 5000, 'az');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznaloi_adatok`
--

CREATE TABLE `felhasznaloi_adatok` (
  `felhasz_id` int(11) NOT NULL,
  `felhasz_nev` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `reg_datum` date NOT NULL,
  `okmany` varchar(255) NOT NULL,
  `neme` varchar(255) NOT NULL,
  `orszag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasznaloi_adatok`
--

INSERT INTO `felhasznaloi_adatok` (`felhasz_id`, `felhasz_nev`, `email`, `jelszo`, `hash`, `reg_datum`, `okmany`, `neme`, `orszag`) VALUES
(3, 'Teszt Elek', 'tesztelek@localhost.org', '$2y$10$5w3G8QT3uAF5I6ZFAIYxLeaibWSouAcv0AMj09xrwvknnF7w0Dogi', '3545578dd1b80e7bbb1e36eb6ae0cc22596f825c9d488c0d0e20702636537465684c8cb6eca180667d50fb1a0983a363231bc7e8c006dccde000b7b64dbfe0b9', '2023-03-13', '123456', 'Férfi', 'cigany'),
(4, 'teszt', 'teszt@localhost.org', '$2y$10$i05XnrwkxrNQ43TZHBnID.IBvfOeH4Mn8pE4jXfcY/2B6DRHCbj5C', '1f2fdc211715d8749a3deb711fd77649a799bb129f1c9ee6b3ea765bf5f63bf6ff8d4304ff5293dd70834f284d2214e983f432f01b9c5e0acaac5fb5ceae7a30', '2023-03-20', '123456', 'Férfi', 'Magyarország'),
(5, 'az', 'az@localhost.org', '$2y$10$LV8DK.yqRVrqQjZ6lsoyuug/BJOuM8svsc2/BNuG1oqCbkWBBeZYm', 'f7a3e3b8e10e0dba21dd7d18fcf8088d1802a91d8938714a2e7367dfd871ba1c4de481b0c000440ee09c77d79cdfa73f858fa4f2fa684afd6d7c2df8200ca2b7', '2023-03-23', '123456', 'Nő', 'magyar');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fogadas`
--

CREATE TABLE `fogadas` (
  `felhasz_id` int(11) NOT NULL,
  `fog_id` int(11) NOT NULL,
  `fogadasi_osszeg` int(11) NOT NULL,
  `profit_buko` double NOT NULL,
  `meccs_id` int(11) NOT NULL,
  `fogadasi_szam` int(11) NOT NULL,
  `eredmeny` varchar(255) NOT NULL,
  `odds` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `fogadas`
--

INSERT INTO `fogadas` (`felhasz_id`, `fog_id`, `fogadasi_osszeg`, `profit_buko`, `meccs_id`, `fogadasi_szam`, `eredmeny`, `odds`) VALUES
(4, 5, 200, 0, 58, 1, 'Vesztes', 0),
(5, 9, 100, 0, 59, 1, 'Vesztes', 0),
(5, 10, 3, 0, 59, 1, 'Vesztes', 0),
(5, 11, 200, 0, 60, 1, 'Vesztes', 0),
(5, 13, 1881, 0, 64, 1, 'Vesztes', 0),
(5, 14, 3000, 0, 64, 1, 'Vesztes', 0),
(5, 15, 300, 0, 64, 2, 'Vesztes', 0),
(5, 16, 1, 0, 64, 1, 'Vesztes', 0),
(5, 17, 50, 0, 64, 1, 'Vesztes', 0),
(5, 18, 51, 0, 64, 1, 'Vesztes', 0),
(5, 20, 100, 0, 64, 1, '', 0),
(5, 21, 100, 0, 64, 1, '', 0),
(5, 22, 200, 0, 65, 1, '', 0),
(5, 23, 200, 0, 66, 1, '', 0),
(5, 24, 200, 400, 67, 2, 'Nyertes', 0),
(5, 25, 200, -200, 69, 2, 'Vesztes', 0),
(5, 26, 1000, -1000, 70, 2, 'Vesztes', 0),
(5, 27, 200, 400, 71, 2, 'Nyertes', 0),
(5, 28, 200, -200, 72, 3, 'Vesztes', 0),
(5, 29, 5000, -5000, 73, 3, 'Vesztes', 0),
(5, 30, 5000, -5000, 74, 3, 'Vesztes', 0),
(5, 31, 2, 0, 75, 2, '', 0),
(5, 32, 200, 0, 75, 2, '', 0),
(5, 33, 200, 0, 75, 1, '', 0),
(5, 34, 200, 0, 75, 1, '', 0),
(5, 35, 398, -398, 76, 2, 'Vesztes', 0),
(5, 36, 2000, -2000, 78, 2, 'Vesztes', 0),
(5, 37, 8000, -8000, 79, 3, 'Vesztes', 0),
(5, 38, 1000, 2000, 80, 1, 'Nyertes', 0),
(5, 39, 1000, -1000, 81, 1, 'Vesztes', 0),
(5, 40, 5000, 10000, 82, 2, 'Nyertes', 0),
(5, 41, 5000, -5000, 83, 3, 'Vesztes', 0),
(5, 42, 5000, -5000, 96, 3, 'Vesztes', 0),
(5, 43, 5000, -5000, 97, 2, 'Vesztes', 0),
(5, 44, 1000, 2000, 100, 1, 'Nyertes', 0),
(5, 45, 1000, -1000, 100, 3, 'Vesztes', 0),
(5, 46, 1000, -1000, 107, 1, 'Vesztes', 0),
(5, 47, 1000, 2000, 115, 1, 'Nyertes', 0),
(5, 48, 1000, 2000, 116, 2, 'Nyertes', 0),
(5, 49, 1000, 2000, 117, 2, 'Nyertes', 0),
(5, 50, 1000, -1000, 119, 2, 'Vesztes', 0),
(5, 51, 100, -100, 121, 1, 'Vesztes', 0),
(5, 52, 100, -100, 125, 2, 'Vesztes', 0),
(5, 53, 1000, -1000, 133, 2, 'Vesztes', 0),
(5, 54, 1000, 2000, 134, 2, 'Nyertes', 2.5),
(5, 55, 1000, -1000, 137, 1, 'Vesztes', 2),
(5, 56, 2000, -2000, 140, 1, 'Vesztes', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fogadasi_lehetoseg`
--

CREATE TABLE `fogadasi_lehetoseg` (
  `fogadasi_szam` int(11) NOT NULL,
  `fogadas_neve` varchar(255) NOT NULL,
  `szorzo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `fogadasi_lehetoseg`
--

INSERT INTO `fogadasi_lehetoseg` (`fogadasi_szam`, `fogadas_neve`, `szorzo`) VALUES
(1, 'Hazai', 5),
(2, 'Vendég', 1.5),
(3, 'Döntetlen', 4.33);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatekosok`
--

CREATE TABLE `jatekosok` (
  `nemzet_id` int(11) NOT NULL,
  `jatekos_nev` varchar(255) NOT NULL,
  `pozicio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `jatekosok`
--

INSERT INTO `jatekosok` (`nemzet_id`, `jatekos_nev`, `pozicio`) VALUES
(1, 'Manuel Neuer', 'Kapus'),
(1, 'Joshua Kimmich', 'Védő'),
(1, 'Matthias Ginter', 'Védő'),
(1, 'Antonio Rudiger', 'Védő'),
(1, 'Robin Gosens', 'Védő'),
(1, 'Toni Kroos', 'Középpályás'),
(1, 'Ilkay Gundogan', 'Középpályás'),
(1, 'Kai Havertz', 'Középpályás'),
(1, 'Serge Gnabry', 'Támadó'),
(1, 'Thomas Muller', 'Támadó'),
(1, 'Timo Werner', 'Támadó'),
(2, 'Hugo Lloris', 'Kapus'),
(2, 'Benjamin Pavard', 'Védő'),
(2, 'Raphael Varane', 'Védő'),
(2, 'Presnel Kimpembe', 'Védő'),
(2, 'Lucas Hernandez', 'Védő'),
(2, 'N\'Golo Kante', 'Középpályás'),
(2, 'Paul Pogba', 'Középpályás'),
(2, 'Adrien Rabiot', 'Középpályás'),
(2, 'Kylian Mbappe', 'Támadó'),
(2, 'Antoine Griezmann', 'Támadó'),
(2, 'Karim Benzema', 'Támadó'),
(3, 'Péter Gulácsi', 'Kapus'),
(3, 'Ádám Lang', 'Védő'),
(3, 'Attila Fiola', 'Védő'),
(3, 'Willi Orbán', 'Védő'),
(3, 'Endre Botka', 'Védő'),
(3, 'Dávid Sigér', 'Középpályás'),
(3, 'László Kleinheisler', 'Középpályás'),
(3, 'Ákos Kecskés', 'Középpályás'),
(3, 'Dominik Szoboszlai', 'Csatár'),
(3, 'Ádám Szalai', 'Csatár'),
(3, 'Roland Sallai', 'Csatár'),
(4, 'Gianluigi Donnarumma', 'Kapus'),
(4, 'Giovanni Di Lorenzo', 'Védő'),
(4, 'Leonardo Bonucci', 'Védő'),
(4, 'Giorgio Chiellini', 'Védő'),
(4, 'Emerson Palmieri', 'Védő'),
(4, 'Jorginho', 'Középpályás'),
(4, 'Marco Verratti', 'Középpályás'),
(4, 'Nicolo Barella', 'Középpályás'),
(4, 'Federico Chiesa', 'Támadó'),
(4, 'Lorenzo Insigne', 'Támadó'),
(4, 'Ciro Immobile', 'Támadó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `meccs_eredmeny`
--

CREATE TABLE `meccs_eredmeny` (
  `meccs_id` int(11) NOT NULL,
  `eredmeny` varchar(255) NOT NULL,
  `gol_szerzo` varchar(255) NOT NULL,
  `golszam` int(11) NOT NULL,
  `hazai_id` int(11) NOT NULL,
  `vendeg_id` int(11) NOT NULL,
  `lefutott_e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `meccs_eredmeny`
--

INSERT INTO `meccs_eredmeny` (`meccs_id`, `eredmeny`, `gol_szerzo`, `golszam`, `hazai_id`, `vendeg_id`, `lefutott_e`) VALUES
(1, '4-0', '', 4, 2, 1, 1),
(2, '3-2', '', 5, 1, 2, 1),
(3, '1-0', '', 1, 2, 1, 1),
(4, '2-2', '', 4, 1, 2, 1),
(5, '1-3', '', 4, 2, 1, 1),
(6, '3-0', '', 3, 2, 1, 1),
(7, '1-1', '', 2, 1, 2, 1),
(8, '2-0', '', 2, 3, 4, 1),
(9, '1-2', '', 3, 1, 3, 1),
(10, '1-0', '', 1, 3, 2, 1),
(11, '2-0', '', 2, 3, 4, 1),
(12, '2-3', '', 5, 1, 3, 1),
(13, '2-0', '', 2, 2, 4, 1),
(14, '0-3', '', 3, 4, 2, 1),
(15, '2-2', 'Ádám Lang,László Kleinheisler,Benjamin Pavard,Benjamin Pavard,', 4, 3, 2, 1),
(16, '0-6', 'Dominik Szoboszlai,Dominik Szoboszlai,Roland Sallai,Roland Sallai,Dominik Szoboszlai,Willi Orbán,', 6, 4, 3, 1),
(17, '0-2', 'Adrien Rabiot,Paul Pogba,', 2, 3, 2, 1),
(18, '2-2', 'Jorginho,Leonardo Bonucci,N\'Golo Kante,N\'Golo Kante,', 4, 4, 2, 1),
(28, '4-4', 'Joshua Kimmich,Kai Havertz,Matthias Ginter,Joshua Kimmich,Marco Verratti,Leonardo Bonucci,Marco Verratti,Nicolo Barella,', 8, 1, 4, 1),
(29, '2-2', 'Marco Verratti,Leonardo Bonucci,Roland Sallai,Ádám Szalai,', 4, 4, 3, 1),
(30, '0-0', '', 0, 4, 3, 1),
(31, '0-0', '', 0, 2, 4, 1),
(32, '1-0', 'Ákos Kecskés,', 1, 3, 2, 1),
(33, '8-0', 'Leonardo Bonucci,Nicolo Barella,Leonardo Bonucci,Giorgio Chiellini,Marco Verratti,Giorgio Chiellini,Nicolo Barella,Giorgio Chiellini,', 8, 4, 3, 1),
(34, '0-3', 'Kai Havertz,Antonio Rudiger,Antonio Rudiger,', 3, 4, 1, 1),
(35, '3-5', 'Ilkay Gundogan,Ilkay Gundogan,Toni Kroos,Giorgio Chiellini,Jorginho,Emerson Palmieri,Jorginho,Marco Verratti,', 8, 1, 4, 1),
(36, '1-0', 'Jorginho,', 1, 4, 2, 1),
(37, '5-2', 'Joshua Kimmich,Antonio Rudiger,Matthias Ginter,Ilkay Gundogan,Robin Gosens,Marco Verratti,Giovanni Di Lorenzo,', 7, 1, 4, 1),
(38, '0-1', 'Dominik Szoboszlai,', 1, 1, 3, 1),
(39, '0-0', '', 0, 2, 3, 1),
(40, '0-0', '', 0, 2, 1, 1),
(41, '0-0', '', 0, 1, 4, 1),
(42, '3-4', 'Joshua Kimmich,Joshua Kimmich,Matthias Ginter,Giovanni Di Lorenzo,Leonardo Bonucci,Nicolo Barella,Leonardo Bonucci,', 7, 1, 4, 1),
(43, '6-1', 'Marco Verratti,Marco Verratti,Marco Verratti,Marco Verratti,Marco Verratti,Jorginho,Dominik Szoboszlai,', 7, 4, 3, 1),
(44, '3-1', 'Ilkay Gundogan,Ilkay Gundogan,Joshua Kimmich,Ádám Szalai,', 4, 1, 3, 1),
(45, '1-3', 'Kai Havertz,Giovanni Di Lorenzo,Jorginho,Leonardo Bonucci,', 4, 1, 4, 1),
(46, '1-3', 'N\'Golo Kante,Matthias Ginter,Kai Havertz,Ilkay Gundogan,', 4, 2, 1, 1),
(47, '0-1', 'Dominik Szoboszlai,', 1, 1, 3, 1),
(48, '0-0', '', 0, 2, 4, 1),
(49, '3-3', 'N\'Golo Kante,Raphael Varane,Benjamin Pavard,Toni Kroos,Ilkay Gundogan,Kai Havertz,', 6, 2, 1, 1),
(50, '1-3', 'Dominik Szoboszlai,Marco Verratti,Nicolo Barella,Emerson Palmieri,', 4, 3, 4, 1),
(51, '3-2', 'Kai Havertz,Joshua Kimmich,Kai Havertz,Nicolo Barella,Nicolo Barella,', 5, 1, 4, 1),
(52, '4-4', 'Ádám Szalai,Endre Botka,Ádám Szalai,Ádám Szalai,Toni Kroos,Kai Havertz,Kai Havertz,Toni Kroos,', 8, 3, 1, 1),
(53, '0-0', '', 0, 4, 2, 1),
(54, '0-0', '', 0, 3, 4, 1),
(55, '3-3', 'Giovanni Di Lorenzo,Marco Verratti,Giorgio Chiellini,Lucas Hernandez,Raphael Varane,Raphael Varane,', 6, 4, 2, 1),
(56, '0-4', 'Attila Fiola,Roland Sallai,Dominik Szoboszlai,Ádám Lang,', 4, 2, 3, 1),
(57, '2-0', 'Ilkay Gundogan,Toni Kroos,', 2, 1, 3, 1),
(58, '0-2', 'Matthias Ginter,Matthias Ginter,', 2, 2, 1, 1),
(59, '0-0', '', 0, 4, 3, 1),
(60, '2-5', 'N\'Golo Kante,Adrien Rabiot,Robin Gosens,Joshua Kimmich,Robin Gosens,Ilkay Gundogan,Joshua Kimmich,', 7, 2, 1, 1),
(61, '0-8', 'Toni Kroos,Toni Kroos,Matthias Ginter,Ilkay Gundogan,Joshua Kimmich,Joshua Kimmich,Kai Havertz,Antonio Rudiger,', 8, 2, 1, 1),
(62, '3-1', 'Marco Verratti,Nicolo Barella,Leonardo Bonucci,Benjamin Pavard,', 4, 4, 2, 1),
(63, '0-6', 'Emerson Palmieri,Nicolo Barella,Emerson Palmieri,Jorginho,Jorginho,Giovanni Di Lorenzo,', 6, 2, 4, 1),
(64, '1-0', '', 1, 2, 3, 1),
(65, '1-3', 'Toni Kroos,Attila Fiola,László Kleinheisler,Dominik Szoboszlai,', 4, 1, 3, 1),
(66, '1-4', 'Giorgio Chiellini,László Kleinheisler,Roland Sallai,Dávid Sigér,Dominik Szoboszlai,', 5, 4, 3, 1),
(67, '0-2', 'Roland Sallai,László Kleinheisler,', 2, 2, 3, 1),
(68, '1-1', 'Benjamin Pavard,Kai Havertz,', 2, 2, 1, 1),
(69, '5-3', 'Emerson Palmieri,Emerson Palmieri,Giorgio Chiellini,Leonardo Bonucci,Giovanni Di Lorenzo,Kai Havertz,Ilkay Gundogan,Toni Kroos,', 8, 4, 1, 1),
(70, '4-4', 'Lucas Hernandez,Lucas Hernandez,Adrien Rabiot,Raphael Varane,Roland Sallai,Ádám Szalai,Dominik Szoboszlai,Attila Fiola,', 8, 2, 3, 1),
(71, '1-3', 'Toni Kroos,Ádám Szalai,Dominik Szoboszlai,Ádám Szalai,', 4, 1, 3, 1),
(72, '3-0', 'Adrien Rabiot,Benjamin Pavard,N\'Golo Kante,', 3, 2, 1, 1),
(73, '0-4', 'Leonardo Bonucci,Emerson Palmieri,Jorginho,Nicolo Barella,', 4, 2, 4, 1),
(74, '1-0', 'Ilkay Gundogan,', 1, 1, 4, 1),
(75, '0-1', '', 1, 4, 3, 1),
(76, '1-0', 'Giorgio Chiellini,', 1, 4, 3, 1),
(77, '6-1', 'N\'Golo Kante,N\'Golo Kante,N\'Golo Kante,N\'Golo Kante,Paul Pogba,Lucas Hernandez,Ádám Szalai,', 7, 2, 3, 1),
(78, '5-0', 'Joshua Kimmich,Kai Havertz,Ilkay Gundogan,Matthias Ginter,Toni Kroos,', 5, 1, 2, 1),
(79, '0-7', 'Marco Verratti,Emerson Palmieri,Marco Verratti,Marco Verratti,Nicolo Barella,Jorginho,Marco Verratti,', 7, 3, 4, 1),
(80, '5-2', 'Jorginho,Marco Verratti,Marco Verratti,Jorginho,Leonardo Bonucci,Benjamin Pavard,Paul Pogba,', 7, 4, 2, 1),
(81, '4-4', 'Jorginho,Jorginho,Nicolo Barella,Giorgio Chiellini,Dominik Szoboszlai,László Kleinheisler,Ádám Szalai,Dominik Szoboszlai,', 8, 4, 3, 1),
(82, '0-7', 'Ádám Szalai,Dávid Sigér,Ákos Kecskés,Dominik Szoboszlai,Roland Sallai,Dominik Szoboszlai,Attila Fiola,', 7, 2, 3, 1),
(83, '2-4', 'Dominik Szoboszlai,Willi Orbán,Nicolo Barella,Nicolo Barella,Giovanni Di Lorenzo,Leonardo Bonucci,', 6, 3, 4, 1),
(84, '1-1', 'Kai Havertz,Benjamin Pavard,', 2, 1, 2, 1),
(85, '7-1', 'Antonio Rudiger,Toni Kroos,Kai Havertz,Kai Havertz,Kai Havertz,Kai Havertz,Toni Kroos,Dominik Szoboszlai,', 8, 1, 3, 1),
(86, '0-2', 'Leonardo Bonucci,Marco Verratti,', 2, 3, 4, 1),
(87, '2-0', 'Kai Havertz,Kai Havertz,', 2, 1, 3, 1),
(88, '0-1', 'Dávid Sigér,', 1, 2, 3, 1),
(89, '4-1', 'Dominik Szoboszlai,Dominik Szoboszlai,Endre Botka,Ádám Lang,Lucas Hernandez,', 5, 3, 2, 1),
(90, '0-0', '', 0, 2, 1, 1),
(91, '3-5', 'Lucas Hernandez,Paul Pogba,Raphael Varane,Ilkay Gundogan,Ilkay Gundogan,Robin Gosens,Ilkay Gundogan,Ilkay Gundogan,', 8, 2, 1, 1),
(92, '2-1', 'Giorgio Chiellini,Giorgio Chiellini,Toni Kroos,', 3, 4, 1, 1),
(93, '3-1', 'Ilkay Gundogan,Ilkay Gundogan,Toni Kroos,Paul Pogba,', 4, 1, 2, 1),
(94, '3-3', 'Paul Pogba,N\'Golo Kante,N\'Golo Kante,Nicolo Barella,Emerson Palmieri,Marco Verratti,', 6, 2, 4, 1),
(95, '4-3', 'Jorginho,Leonardo Bonucci,Leonardo Bonucci,Jorginho,Dominik Szoboszlai,Dominik Szoboszlai,Dávid Sigér,', 7, 4, 3, 1),
(96, '1-4', 'Kai Havertz,Nicolo Barella,Giovanni Di Lorenzo,Leonardo Bonucci,Nicolo Barella,', 5, 1, 4, 1),
(97, '6-0', 'Leonardo Bonucci,Jorginho,Giorgio Chiellini,Giorgio Chiellini,Nicolo Barella,Marco Verratti,', 6, 4, 1, 1),
(98, '2-1', 'Kai Havertz,Joshua Kimmich,Presnel Kimpembe,', 3, 1, 2, 1),
(99, '4-1', 'Marco Verratti,Leonardo Bonucci,Marco Verratti,Marco Verratti,Dominik Szoboszlai,', 5, 4, 3, 1),
(100, '1-0', 'Jorginho,', 1, 4, 3, 1),
(101, '5-0', 'Toni Kroos,Kai Havertz,Robin Gosens,Toni Kroos,Toni Kroos,', 5, 1, 3, 1),
(102, '1-7', 'N\'Golo Kante,Kai Havertz,Ilkay Gundogan,Joshua Kimmich,Ilkay Gundogan,Kai Havertz,Antonio Rudiger,Joshua Kimmich,', 8, 2, 1, 1),
(103, '1-1', 'Ádám Szalai,Paul Pogba,', 2, 3, 2, 1),
(104, '3-2', 'Ádám Szalai,Roland Sallai,Dávid Sigér,Presnel Kimpembe,Adrien Rabiot,', 5, 3, 2, 1),
(105, '1-1', 'Matthias Ginter,Adrien Rabiot,', 2, 1, 2, 1),
(106, '2-2', 'N\'Golo Kante,N\'Golo Kante,Giovanni Di Lorenzo,Leonardo Bonucci,', 4, 2, 4, 1),
(107, '3-3', 'Leonardo Bonucci,Emerson Palmieri,Marco Verratti,Ádám Szalai,Ádám Szalai,Ádám Szalai,', 6, 4, 3, 1),
(108, '1-1', 'Benjamin Pavard,Kai Havertz,', 2, 2, 1, 1),
(109, '4-4', 'Matthias Ginter,Antonio Rudiger,Toni Kroos,Joshua Kimmich,Marco Verratti,Nicolo Barella,Giovanni Di Lorenzo,Marco Verratti,', 8, 1, 4, 1),
(110, '0-0', '', 0, 2, 3, 1),
(111, '2-0', 'Dávid Sigér,Dominik Szoboszlai,', 2, 3, 4, 1),
(112, '1-1', 'Dominik Szoboszlai,Toni Kroos,', 2, 3, 1, 1),
(113, '2-2', 'Jorginho,Giovanni Di Lorenzo,Adrien Rabiot,N\'Golo Kante,', 4, 4, 2, 1),
(114, '0-3', 'N\'Golo Kante,Presnel Kimpembe,Raphael Varane,', 3, 1, 2, 1),
(115, '2-0', 'Leonardo Bonucci,Jorginho,', 2, 4, 1, 1),
(116, '0-2', 'Jorginho,Nicolo Barella,', 2, 1, 4, 1),
(117, '3-4', 'Kai Havertz,Ilkay Gundogan,Joshua Kimmich,Paul Pogba,Paul Pogba,N\'Golo Kante,Benjamin Pavard,', 7, 1, 2, 1),
(118, '0-7', 'Dávid Sigér,Ákos Kecskés,Ákos Kecskés,Dávid Sigér,Ákos Kecskés,Roland Sallai,László Kleinheisler,', 7, 1, 3, 1),
(119, '3-3', 'Roland Sallai,Dominik Szoboszlai,Dávid Sigér,Jorginho,Nicolo Barella,Marco Verratti,', 6, 3, 4, 1),
(120, '3-3', 'Ilkay Gundogan,Ilkay Gundogan,Kai Havertz,Adrien Rabiot,N\'Golo Kante,N\'Golo Kante,', 6, 1, 2, 1),
(121, '4-4', 'Antonio Rudiger,Matthias Ginter,Robin Gosens,Matthias Ginter,Dominik Szoboszlai,Dávid Sigér,Attila Fiola,Ákos Kecskés,', 8, 1, 3, 1),
(122, '3-0', 'Antonio Rudiger,Joshua Kimmich,Kai Havertz,', 3, 1, 3, 1),
(123, '2-6', 'Toni Kroos,Matthias Ginter,Raphael Varane,Lucas Hernandez,Adrien Rabiot,Adrien Rabiot,Paul Pogba,Adrien Rabiot,', 8, 1, 2, 1),
(124, '4-2', 'Ádám Szalai,Roland Sallai,Dominik Szoboszlai,Ádám Szalai,Toni Kroos,Antonio Rudiger,', 6, 3, 1, 1),
(125, '2-2', 'Kai Havertz,Kai Havertz,Marco Verratti,Leonardo Bonucci,', 4, 1, 4, 1),
(126, '1-1', 'László Kleinheisler,Toni Kroos,', 2, 3, 1, 1),
(127, '0-4', 'Robin Gosens,Toni Kroos,Robin Gosens,Joshua Kimmich,', 4, 4, 1, 1),
(128, '2-3', 'Ádám Szalai,Dávid Sigér,Jorginho,Nicolo Barella,Giovanni Di Lorenzo,', 5, 3, 4, 1),
(129, '0-0', '', 0, 3, 2, 0),
(130, '3-1', 'Toni Kroos,Kai Havertz,Kai Havertz,Jorginho,', 4, 1, 4, 1),
(131, '1-1', 'Raphael Varane,Giorgio Chiellini,', 2, 2, 4, 1),
(132, '3-2', 'Paul Pogba,Adrien Rabiot,Paul Pogba,Nicolo Barella,Nicolo Barella,', 5, 2, 4, 1),
(133, '6-0', 'Ádám Szalai,Dominik Szoboszlai,Ádám Szalai,Endre Botka,Attila Fiola,Ádám Szalai,', 6, 3, 1, 1),
(134, '0-1', 'Nicolo Barella,', 1, 2, 4, 1),
(135, '4-0', 'N\'Golo Kante,N\'Golo Kante,Paul Pogba,N\'Golo Kante,', 4, 2, 4, 1),
(136, '0-0', '', 0, 2, 4, 1),
(137, '1-1', 'Nicolo Barella,Dominik Szoboszlai,', 2, 4, 3, 1),
(138, '4-4', 'Benjamin Pavard,Benjamin Pavard,Benjamin Pavard,Presnel Kimpembe,Toni Kroos,Kai Havertz,Ilkay Gundogan,Toni Kroos,', 8, 2, 1, 1),
(139, '0-7', 'Paul Pogba,Adrien Rabiot,Lucas Hernandez,Paul Pogba,Benjamin Pavard,Presnel Kimpembe,N\'Golo Kante,', 7, 4, 2, 1),
(140, '0-1', 'Paul Pogba,', 1, 1, 2, 1),
(141, '0-2', 'Jorginho,Leonardo Bonucci,', 2, 2, 4, 1),
(142, '3-1', 'Roland Sallai,Dávid Sigér,Dominik Szoboszlai,Ilkay Gundogan,', 4, 3, 1, 1),
(143, '5-0', 'Paul Pogba,N\'Golo Kante,Adrien Rabiot,Benjamin Pavard,N\'Golo Kante,', 5, 2, 3, 1),
(144, '1-1', 'Roland Sallai,Paul Pogba,', 2, 3, 2, 1),
(145, '2-1', 'N\'Golo Kante,Raphael Varane,Robin Gosens,', 3, 2, 1, 1),
(146, '6-2', 'Paul Pogba,Paul Pogba,Raphael Varane,Lucas Hernandez,N\'Golo Kante,N\'Golo Kante,Roland Sallai,Dávid Sigér,', 8, 2, 3, 1),
(147, '7-0', 'Emerson Palmieri,Marco Verratti,Marco Verratti,Jorginho,Emerson Palmieri,Giorgio Chiellini,Nicolo Barella,', 7, 4, 1, 1),
(148, '4-4', 'Antonio Rudiger,Antonio Rudiger,Robin Gosens,Toni Kroos,Paul Pogba,Adrien Rabiot,Lucas Hernandez,N\'Golo Kante,', 8, 1, 2, 1),
(149, '2-2', 'Adrien Rabiot,Lucas Hernandez,Jorginho,Nicolo Barella,', 4, 2, 4, 1),
(150, '1-4', 'Ilkay Gundogan,Giovanni Di Lorenzo,Jorginho,Nicolo Barella,Jorginho,', 5, 1, 4, 1),
(151, '2-4', 'Matthias Ginter,Toni Kroos,Raphael Varane,N\'Golo Kante,Adrien Rabiot,Raphael Varane,', 6, 1, 2, 1),
(152, '4-4', 'Dávid Sigér,Dávid Sigér,Roland Sallai,Roland Sallai,Lucas Hernandez,Paul Pogba,N\'Golo Kante,Adrien Rabiot,', 8, 3, 2, 1),
(153, '0-2', 'Adrien Rabiot,Paul Pogba,', 2, 4, 2, 1),
(154, '1-0', 'Willi Orbán,', 1, 3, 2, 1),
(155, '3-2', 'Toni Kroos,Kai Havertz,Matthias Ginter,Giovanni Di Lorenzo,Emerson Palmieri,', 5, 1, 4, 1),
(156, '0-8', 'Dominik Szoboszlai,Ádám Szalai,Ádám Szalai,Dominik Szoboszlai,Dávid Sigér,Ádám Szalai,Ádám Szalai,Roland Sallai,', 8, 2, 3, 1),
(157, '3-0', 'Marco Verratti,Giorgio Chiellini,Marco Verratti,', 3, 4, 1, 1),
(158, '2-3', 'Jorginho,Nicolo Barella,László Kleinheisler,Endre Botka,Ádám Szalai,', 5, 4, 3, 1),
(159, '2-0', 'Giorgio Chiellini,Nicolo Barella,', 2, 4, 2, 1),
(160, '3-3', 'Toni Kroos,Kai Havertz,Matthias Ginter,Giorgio Chiellini,Marco Verratti,Giovanni Di Lorenzo,', 6, 1, 4, 1),
(161, '0-1', 'Nicolo Barella,', 1, 1, 4, 1),
(162, '0-2', 'Giorgio Chiellini,Jorginho,', 2, 2, 4, 1),
(163, '0-8', 'Jorginho,Jorginho,Nicolo Barella,Nicolo Barella,Emerson Palmieri,Leonardo Bonucci,Jorginho,Marco Verratti,', 8, 2, 4, 1),
(164, '0-1', 'Marco Verratti,', 1, 1, 4, 1),
(165, '3-2', 'Marco Verratti,Jorginho,Giovanni Di Lorenzo,N\'Golo Kante,Paul Pogba,', 5, 4, 2, 1),
(166, '0-5', 'Toni Kroos,Joshua Kimmich,Kai Havertz,Ilkay Gundogan,Robin Gosens,', 5, 2, 1, 1),
(167, '2-5', 'N\'Golo Kante,Paul Pogba,Dominik Szoboszlai,Roland Sallai,Ádám Szalai,Ádám Szalai,Ákos Kecskés,', 7, 2, 3, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nemzetek`
--

CREATE TABLE `nemzetek` (
  `nemzet_id` int(11) NOT NULL,
  `nemzet_nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `nemzetek`
--

INSERT INTO `nemzetek` (`nemzet_id`, `nemzet_nev`) VALUES
(1, 'Németország'),
(2, 'Franciaország'),
(3, 'Magyarország'),
(4, 'Olaszország');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `penztarca`
--

CREATE TABLE `penztarca` (
  `felhasz_id` int(11) NOT NULL,
  `penztarca_id` int(11) NOT NULL,
  `egyenleg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `penztarca`
--

INSERT INTO `penztarca` (`felhasz_id`, `penztarca_id`, `egyenleg`) VALUES
(3, 1, 2000),
(4, 2, 2420),
(5, 6, 2800);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `be_ki_fizetes`
--
ALTER TABLE `be_ki_fizetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penztarca_id` (`penztarca_id`);

--
-- A tábla indexei `felhasznaloi_adatok`
--
ALTER TABLE `felhasznaloi_adatok`
  ADD PRIMARY KEY (`felhasz_id`);

--
-- A tábla indexei `fogadas`
--
ALTER TABLE `fogadas`
  ADD PRIMARY KEY (`fog_id`),
  ADD KEY `felhasz_id` (`felhasz_id`),
  ADD KEY `meccs_id` (`meccs_id`),
  ADD KEY `fogadasi_szam` (`fogadasi_szam`);

--
-- A tábla indexei `fogadasi_lehetoseg`
--
ALTER TABLE `fogadasi_lehetoseg`
  ADD PRIMARY KEY (`fogadasi_szam`);

--
-- A tábla indexei `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD KEY `nemzet_id` (`nemzet_id`);

--
-- A tábla indexei `meccs_eredmeny`
--
ALTER TABLE `meccs_eredmeny`
  ADD PRIMARY KEY (`meccs_id`),
  ADD KEY `hazai_id` (`hazai_id`),
  ADD KEY `vendeg_id` (`vendeg_id`);

--
-- A tábla indexei `nemzetek`
--
ALTER TABLE `nemzetek`
  ADD PRIMARY KEY (`nemzet_id`);

--
-- A tábla indexei `penztarca`
--
ALTER TABLE `penztarca`
  ADD PRIMARY KEY (`penztarca_id`),
  ADD KEY `felhasz_id` (`felhasz_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `be_ki_fizetes`
--
ALTER TABLE `be_ki_fizetes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `felhasznaloi_adatok`
--
ALTER TABLE `felhasznaloi_adatok`
  MODIFY `felhasz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `fogadas`
--
ALTER TABLE `fogadas`
  MODIFY `fog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT a táblához `fogadasi_lehetoseg`
--
ALTER TABLE `fogadasi_lehetoseg`
  MODIFY `fogadasi_szam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `meccs_eredmeny`
--
ALTER TABLE `meccs_eredmeny`
  MODIFY `meccs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT a táblához `nemzetek`
--
ALTER TABLE `nemzetek`
  MODIFY `nemzet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `penztarca`
--
ALTER TABLE `penztarca`
  MODIFY `penztarca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `be_ki_fizetes`
--
ALTER TABLE `be_ki_fizetes`
  ADD CONSTRAINT `be_ki_fizetes_ibfk_1` FOREIGN KEY (`penztarca_id`) REFERENCES `penztarca` (`penztarca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `fogadas`
--
ALTER TABLE `fogadas`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`fogadasi_szam`) REFERENCES `fogadasi_lehetoseg` (`fogadasi_szam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK3` FOREIGN KEY (`felhasz_id`) REFERENCES `felhasznaloi_adatok` (`felhasz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`meccs_id`) REFERENCES `meccs_eredmeny` (`meccs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`nemzet_id`) REFERENCES `nemzetek` (`nemzet_id`);

--
-- Megkötések a táblához `meccs_eredmeny`
--
ALTER TABLE `meccs_eredmeny`
  ADD CONSTRAINT `FK6` FOREIGN KEY (`hazai_id`) REFERENCES `nemzetek` (`nemzet_id`),
  ADD CONSTRAINT `FK7` FOREIGN KEY (`vendeg_id`) REFERENCES `nemzetek` (`nemzet_id`);

--
-- Megkötések a táblához `penztarca`
--
ALTER TABLE `penztarca`
  ADD CONSTRAINT `penztarca_ibfk_1` FOREIGN KEY (`felhasz_id`) REFERENCES `felhasznaloi_adatok` (`felhasz_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
