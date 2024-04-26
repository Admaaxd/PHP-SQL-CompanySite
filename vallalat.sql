-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 06:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vallalat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dolgozo`
--

CREATE TABLE `dolgozo` (
  `céges azonosító` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `név` varchar(255) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `fizetés` decimal(10,2) UNSIGNED NOT NULL,
  `jelszó` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `dolgozo`
--

INSERT INTO `dolgozo` (`céges azonosító`, `email`, `név`, `telefon`, `fizetés`, `jelszó`, `isAdmin`) VALUES
(1, 'yqhhh@gmail.com', 'Kovács István', '2512781452', '85672.57', '134b0361359a8b24534d36eef8e57101', 0),
(2, 'evxez@gmail.com', 'Wesley Bowman', '2981789007', '9536224.91', '134b0361359a8b24534d36eef8e57101', 0),
(3, 'foarq@example.com', 'Playboi Carti', '9098636122', '55591.77', '134b0361359a8b24534d36eef8e57101', 0),
(4, 'abdwc51@gmail.com', 'Osian Mack', '1234512345', '50051.00', '134b0361359a8b24534d36eef8e57101', 0),
(5, 'abc5h2@example.com', 'Albert Weiss', '1234512346', '50052.00', '134b0361359a8b24534d36eef8e57101', 0),
(6, 'abc353@freemail.com', 'Paul Arias', '1234512347', '50053.00', '134b0361359a8b24534d36eef8e57101', 0),
(8, 'roniescoxd@freemail.com', 'Roncsák Martin', '06704452364', '10055.99', '134b0361359a8b24534d36eef8e57101', 0),
(9, 'abc56@example.com', 'Alexander Bishop', '1234562350', '50056.00', '134b0361359a8b24534d36eef8e57101', 0),
(10, 'kutyaa233@example.com', 'Nicolas Andrade', '1234512351', '50057.00', '134b0361359a8b24534d36eef8e57101', 0),
(11, 'email3344@testmail.com', 'Rick Grimes', '1234512352', '50058.00', '134b0361359a8b24534d36eef8e57101', 0),
(12, 'car444@example.com', 'Lee Wilkins', '1234512353', '50059.00', '134b0361359a8b24534d36eef8e57101', 0),
(13, 'mailmail4@example.com', 'Cory Matthews', '1234512354', '50060.00', '134b0361359a8b24534d36eef8e57101', 0),
(14, 'e3333334@example.com', 'Marcel Barton', '1234512355', '50061.00', '134b0361359a8b24534d36eef8e57101', 0),
(15, 'oeiir444@citromail.com', 'Chad Christian', '1234512356', '50062.00', '134b0361359a8b24534d36eef8e57101', 0),
(16, 'erebbert@example.com', 'Zack Martinez', '1234412357', '50063.00', '134b0361359a8b24534d36eef8e57101', 0),
(17, 'abcefver64@example.com', 'Chloe Pluh', '1234512358', '50064.00', '134b0361359a8b24534d36eef8e57101', 0),
(18, 'rgerhzj5533@citromail.com', 'Nora Pugh', '1234512359', '50065.00', '134b0361359a8b24534d36eef8e57101', 0),
(19, 'brete10202@applemail.com', 'Sean Kerr', '1234512360', '50066.00', '134b0361359a8b24534d36eef8e57101', 0),
(20, 'berat3333@example.com', 'Tyler Roy', '1234512361', '50067.00', '134b0361359a8b24534d36eef8e57101', 0),
(21, 'ergberbrett4tt4@example.com', 'Byron Browning', '1234512362', '50068.00', '134b0361359a8b24534d36eef8e57101', 0),
(22, 'cinenec205@elixirsd.com', 'Melvin Savage', '1234512363', '50069.00', '134b0361359a8b24534d36eef8e57101', 0),
(23, 'xdman23@example.com', 'Ted Clark', '1234412364', '50070.00', '134b0361359a8b24534d36eef8e57101', 0),
(24, 'howtoxdman4@gmail.com', 'Antonio Walls', '2512786452', '87672.57', '134b0361359a8b24534d36eef8e57101', 0),
(25, 'egorarotim@partmed.net', 'Anthony Reid', '2231789007', '953654.91', '134b0361359a8b24534d36eef8e57101', 0),
(26, '14f0fd6524058a@lamasticots.com', 'Kenneth Lozano', '0698636122', '55491.22', '134b0361359a8b24534d36eef8e57101', 0),
(27, 'abd3wc51@gmail.com', 'Kenny Lozane', '4347854675', '50451.00', '134b0361359a8b24534d36eef8e57101', 0),
(28, 'ab44c5h2@example.com', 'Philip Riddle', '1234412359', '54052.20', '134b0361359a8b24534d36eef8e57101', 0),
(29, 'abc354353@example.com', 'Cole Crane', '2343113554', '50059.01', '134b0361359a8b24534d36eef8e57101', 0),
(30, 'a3bcer54@example.com', 'Damian Atkins', '1234512348', '40054.00', '134b0361359a8b24534d36eef8e57101', 0),
(31, 'gggbgrgr44@example.com', 'Fergus Bullock', '4422334459', '24055.99', '134b0361359a8b24534d36eef8e57101', 0),
(32, 'abcer56@example.com', 'Eric Cartman', '1212234522', '990056.00', '134b0361359a8b24534d36eef8e57101', 0),
(33, 'kutya24233@example.com', 'Ice Cube', '73728495738', '500057.05', '134b0361359a8b24534d36eef8e57101', 0),
(34, 'emaril3344@example.com', 'Lil Uzi Vert', '94746284738', '500328.55', '134b0361359a8b24534d36eef8e57101', 0),
(35, 'carcar42444@example.com', 'Snoop Dogg', '9934477289', '32123.40', '134b0361359a8b24534d36eef8e57101', 0),
(36, 'mailxddmail4@example.com', 'Lil Wayne', '1111878463', '53300.10', '134b0361359a8b24534d36eef8e57101', 0),
(37, 'e3catre333334@example.com', 'Kendrick Lamar', '1622284628', '11161.00', '134b0361359a8b24534d36eef8e57101', 0),
(38, 'oeipunkeir444@example.com', 'Fat Joe', '4927433382', '11111.10', '134b0361359a8b24534d36eef8e57101', 0),
(39, 'pinkdestroyer@citromail.com', 'Lando Norris', '4928453444', '22222.20', '134b0361359a8b24534d36eef8e57101', 0),
(40, 'najaxdman@freemail.com', 'Max Verstappen', '94836374555', '22223.04', '134b0361359a8b24534d36eef8e57101', 0),
(41, 'katmenx3@gmail.com', 'Post Malone', '3938666376', '455545.03', '134b0361359a8b24534d36eef8e57101', 0),
(42, 'pluh102302@example.com', 'Peter Parker', '3948777387', '43223.34', '134b0361359a8b24534d36eef8e57101', 0),
(43, 'bnem34ff@example.com', 'Vanilla Ice', '393998888', '543247.80', '134b0361359a8b24534d36eef8e57101', 0),
(44, 'egetxdmenmenxd3@freemail.com', 'Stan Marsh', '9383999933', '45343.30', '134b0361359a8b24534d36eef8e57101', 0),
(45, 'nono333@elixirsd.com', 'Tony Stark', '1010223301', '1031010.90', '134b0361359a8b24534d36eef8e57101', 0),
(46, 'pluhshouter333@gmail.com', 'Negan Smith', '1234314324', '22223.91', '134b0361359a8b24534d36eef8e57101', 0),
(47, 'playboienjoyer3@example.com', 'Frank Castle', '9876543212', '51111.93', '134b0361359a8b24534d36eef8e57101', 0),
(48, 'carguy34@citromail.com', 'Dominik Lewis', '9878767675', '100000.00', '134b0361359a8b24534d36eef8e57101', 0),
(49, 'latetanguisinherba3@amail.com', 'Sergio Perez', '9849694939', '5700.40', '134b0361359a8b24534d36eef8e57101', 0),
(50, 'sasha3332@example.ru', 'Oscar Piastri', '91929394959', '80008.00', '134b0361359a8b24534d36eef8e57101', 0),
(51, 'xdweffwef@gmail.com', 'Kovács László', '06707777766', '31606.00', '134b0361359a8b24534d36eef8e57101', 0),
(52, 'admin@gmail.com', 'admin', '00999999999', '999999.00', '21232f297a57a5a743894a0e4a801fc3', 1),
(53, 'adammbali04@gmail.com', 'Ádám', '06700000000', '52207.00', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dolgozo_projekt`
--

CREATE TABLE `dolgozo_projekt` (
  `céges azonosító` int(11) NOT NULL,
  `projektnév` varchar(255) NOT NULL,
  `beszámoló` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `dolgozo_projekt`
--

INSERT INTO `dolgozo_projekt` (`céges azonosító`, `projektnév`, `beszámoló`) VALUES
(1, 'Projekt1', 'Beszámoló frissítése'),
(2, 'Projekt2', 'Második projekt beszámolója.'),
(3, 'Projekt3', 'Harmadik projekt beszámolója.'),
(4, 'Projekt4', 'Negyedik projekt beszámolója.'),
(5, 'Projekt5', 'Ötödik projekt beszámolója.'),
(6, 'Projekt6', 'Hatodik projekt beszámolója.'),
(8, 'Projekt8', 'Nyolcadik projekt beszámolója.'),
(9, 'Projekt9', 'Kilencedik projekt beszámolója.'),
(10, 'Projekt10', ''),
(11, 'Projekt11', 'Tizenegyedik projekt beszámolója.'),
(12, 'Projekt12', 'Tizenkettedik projekt beszámolója.'),
(13, 'Projekt13', 'Tizenharmadik projekt beszámolója.'),
(14, 'Projekt14', 'Tizennegyedik projekt beszámolója.'),
(15, 'Projekt15', 'Tizenötödik projekt beszámolója.'),
(16, 'Projekt16', 'Tizenhatodik projekt beszámolója.'),
(17, 'Projekt17', 'Tizenhetedik projekt beszámolója.'),
(18, 'Projekt18', 'Tizennyolcadik projekt beszámolója.'),
(19, 'Projekt19', 'Tizenkilencedik projekt beszámolója.'),
(20, 'Projekt20', 'Huszadik projekt beszámolója.'),
(21, 'Projekt21', ''),
(22, 'Projekt22', 'Huszonkettedik projekt beszámolója.'),
(23, 'Projekt23', 'Huszonharmadik projekt beszámolója.'),
(24, 'Projekt24', 'Huszonnegyedik projekt beszámolója.'),
(25, 'Projekt25', 'Huszonötödik projekt beszámolója.'),
(26, 'Projekt26', 'Huszonhatodik projekt beszámolója.'),
(27, 'Projekt27', 'Huszonhetedik projekt beszámolója.'),
(28, 'Projekt28', 'Huszonnyolcadik projekt beszámolója.'),
(29, 'Projekt29', 'Huszonkilencedik projekt beszámolója.'),
(30, 'Projekt30', 'Harmincadik projekt beszámolója.'),
(31, 'Projekt31', 'Harmincegyedik projekt beszámolója.'),
(32, 'Projekt32', 'Harminckettedik projekt beszámolója.'),
(33, 'Projekt33', 'Harmincharmadik projekt beszámolója.'),
(34, 'Projekt34', 'Harmincnegyedik projekt beszámolója.'),
(35, 'Projekt35', 'Harmincötödik projekt beszámolója.'),
(36, 'Projekt36', 'Harminchatodik projekt beszámolója.'),
(37, 'Projekt37', 'Harminchetedik projekt beszámolója.'),
(38, 'Projekt38', 'Harmincnyolcadik projekt beszámolója.'),
(39, 'Projekt39', ''),
(40, 'Projekt40', 'Negyvenedik projekt beszámolója.'),
(41, 'Projekt41', 'Negyvenegyedik projekt beszámolója.'),
(42, 'Projekt42', 'Negyvenkettedik projekt beszámolója.'),
(43, 'Projekt43', 'Negyvenharmadik projekt beszámolója.'),
(44, 'Projekt44', 'Negyvennegyedik projekt beszámolója.'),
(45, 'Projekt45', 'Negyvenötödik projekt beszámolója.'),
(46, 'Projekt46', 'Negyvenhatodik projekt beszámolója.'),
(47, 'Projekt47', ''),
(48, 'Projekt48', 'Negyvennyolcadik projekt beszámolója.'),
(49, 'Projekt49', 'Negyvenkilencedik projekt beszámolója.'),
(50, 'Projekt50', 'Ötvenedik projekt beszámolója.');

-- --------------------------------------------------------

--
-- Table structure for table `osztaly`
--

CREATE TABLE `osztaly` (
  `osztálynév` varchar(255) NOT NULL,
  `feladata` text NOT NULL,
  `osztályvezető` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `osztaly`
--

INSERT INTO `osztaly` (`osztálynév`, `feladata`, `osztályvezető`) VALUES
('Adminisztráció', 'Adminisztratív feladatok kezelése', 20),
('Beszerzés', 'Alapanyagok és szolgáltatások beszerzése', 16),
('Biztonság', 'Vállalati biztonság és megfelelőség', 11),
('Egészség és Biztonság', 'Munkahelyi egészség és biztonság biztosítása', 18),
('Értékesítés', 'Termékek és szolgáltatások értékesítése', 2),
('Fejlesztés', 'Szoftverfejlesztés és karbantartás', 3),
('Gyártás', 'Termelési folyamatok és gyártás kezelése', 10),
('HR', 'Munkaerő toborzás és kezelés', 4),
('IT', 'Informatikai infrastruktúra kezelése', 8),
('Jogi', 'Jogi tanácsadás és szerződések kezelése', 12),
('Kommunikáció', 'Belső és külső kommunikációs stratégiák', 13),
('Környezetvédelem', 'Környezetvédelmi szabályok betartása', 17),
('Kutatás és Fejlesztés', 'Új termékek és technológiák kutatása', 9),
('Marketing', 'Piaci stratégiák kialakítása', 1),
('Minőségbiztosítás', 'Termékek és szolgáltatások minőségének ellenőrzése', 15),
('Oktatás és Képzés', 'Dolgozói képzés és fejlesztés', 19),
('Pénzügy', 'Pénzügyi jelentések és költségvetés kezelése', 5),
('Projektmenedzsment', 'Projektek tervezése és végrehajtása', 14),
('Szállítás', 'Elkészült termékek kiszállítása', 42),
('Ügyfélszolgálat', 'Ügyféltámogatás és kommunikáció', 6);

-- --------------------------------------------------------

--
-- Table structure for table `projekt`
--

CREATE TABLE `projekt` (
  `projektnév` varchar(255) NOT NULL,
  `határidő` date NOT NULL,
  `leírás` text NOT NULL,
  `projektvezető` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `projekt`
--

INSERT INTO `projekt` (`projektnév`, `határidő`, `leírás`, `projektvezető`) VALUES
('Projekt1', '2023-11-10', 'Ez az első projekt leírása.', 1),
('Projekt10', '2020-09-24', 'Ez a tizedik projekt leírása.', 10),
('Projekt11', '2024-10-29', 'Ez a tizenegyedik projekt leírása.', 11),
('Projekt12', '2024-12-03', 'Ez a tizenkettedik projekt leírása.', 12),
('Projekt13', '2025-01-08', 'Ez a tizenharmadik projekt leírása.', 13),
('Projekt14', '2025-02-13', 'Ez a tizennegyedik projekt leírása.', 14),
('Projekt15', '2025-03-20', 'Ez a tizenötödik projekt leírása.', 15),
('Projekt16', '2025-04-25', 'Ez a tizenhatodik projekt leírása.', 16),
('Projekt17', '2025-05-30', 'Ez a tizenhetedik projekt leírása.', 17),
('Projekt18', '2025-07-04', 'Ez a tizennyolcadik projekt leírása.', 18),
('Projekt19', '2025-08-09', 'Ez a tizenkilencedik projekt leírása.', 19),
('Projekt2', '2023-12-15', 'Ez a második projekt leírása.', 2),
('Projekt20', '2025-09-14', 'Ez a huszadik projekt leírása.', 20),
('Projekt21', '2018-10-19', 'Ez a huszonegyedik projekt leírása.', 21),
('Projekt22', '2025-11-24', 'Ez a huszonkettedik projekt leírása.', 22),
('Projekt23', '2025-12-29', 'Ez a huszonharmadik projekt leírása.', 23),
('Projekt24', '2026-02-02', 'Ez a huszonnegyedik projekt leírása.', 24),
('Projekt25', '2026-03-09', 'Ez a huszonötödik projekt leírása.', 25),
('Projekt26', '2026-04-14', 'Ez a huszonhatodik projekt leírása.', 26),
('Projekt27', '2026-05-19', 'Ez a huszonhetedik projekt leírása.', 27),
('Projekt28', '2026-06-24', 'Ez a huszonnyolcadik projekt leírása.', 28),
('Projekt29', '2026-07-29', 'Ez a huszonkilencedik projekt leírása.', 29),
('Projekt3', '2024-01-20', 'Ez a harmadik projekt leírása.', 3),
('Projekt30', '2026-09-02', 'Ez a harmincadik projekt leírása.', 30),
('Projekt31', '2026-10-07', 'Ez a harmincegyedik projekt leírása.', 31),
('Projekt32', '2026-11-12', 'Ez a harminckettedik projekt leírása.', 32),
('Projekt33', '2026-12-17', 'Ez a harmincharmadik projekt leírása.', 33),
('Projekt34', '2027-01-22', 'Ez a harmincnegyedik projekt leírása.', 34),
('Projekt35', '2027-02-26', 'Ez a harmincötödik projekt leírása.', 35),
('Projekt36', '2027-04-03', 'Ez a harminchatodik projekt leírása.', 36),
('Projekt37', '2027-05-08', 'Ez a harminchetedik projekt leírása.', 37),
('Projekt38', '2027-06-13', 'Ez a harmincnyolcadik projekt leírása.', 38),
('Projekt39', '2027-07-18', 'Ez a harminckilencedik projekt leírása.', 39),
('Projekt4', '2024-02-25', 'Ez a negyedik projekt leírása.', 4),
('Projekt40', '2027-08-23', 'Ez a negyvenedik projekt leírása.', 40),
('Projekt41', '2027-09-27', 'Ez a negyvenegyedik projekt leírása.', 41),
('Projekt42', '2027-11-01', 'Ez a negyvenkettedik projekt leírása.', 42),
('Projekt43', '2027-12-06', 'Ez a negyvenharmadik projekt leírása.', 43),
('Projekt44', '2028-01-11', 'Ez a negyvennegyedik projekt leírása.', 44),
('Projekt45', '2028-02-15', 'Ez a negyvenötödik projekt leírása.', 45),
('Projekt46', '2028-03-22', 'Ez a negyvenhatodik projekt leírása.', 46),
('Projekt47', '2028-04-26', 'Ez a negyvenhetedik projekt leírása.', 47),
('Projekt48', '2028-06-01', 'Ez a negyvennyolcadik projekt leírása.', 48),
('Projekt49', '2028-07-06', 'Ez a negyvenkilencedik projekt leírása.', 49),
('Projekt5', '2024-03-30', 'Ez az ötödik projekt leírása.', 5),
('Projekt50', '2028-08-10', 'Ez az ötvenedik projekt leírása.', 50),
('Projekt6', '2024-05-04', 'Ez a hatodik projekt leírása.', 6),
('Projekt8', '2024-07-14', 'Ez a nyolcadik projekt leírása.', 8),
('Projekt9', '2024-08-19', 'Ez a kilencedik projekt leírása.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reszleg`
--

CREATE TABLE `reszleg` (
  `részlegnév` varchar(255) NOT NULL,
  `feladata` text NOT NULL,
  `részlegvezető` int(11) NOT NULL,
  `osztálynév` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `reszleg`
--

INSERT INTO `reszleg` (`részlegnév`, `feladata`, `részlegvezető`, `osztálynév`) VALUES
('Értékesítési Részleg', 'Az értékesítési csapat irányítása', 10, 'Értékesítés'),
('Fejlesztési Részleg', 'A fejlesztőcsapat koordinálása', 3, 'Fejlesztés'),
('HR Részleg', 'Az HR csapat menedzselése', 4, 'HR'),
('IT Részleg', 'Az informatikai infrastruktúra menedzselése', 8, 'IT'),
('Pénzügyi Részleg', 'A pénzügyi csapat felügyelete', 5, 'Pénzügy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dolgozo`
--
ALTER TABLE `dolgozo`
  ADD PRIMARY KEY (`céges azonosító`),
  ADD UNIQUE KEY `dolgozo_email_unique` (`email`);

--
-- Indexes for table `dolgozo_projekt`
--
ALTER TABLE `dolgozo_projekt`
  ADD PRIMARY KEY (`céges azonosító`,`projektnév`),
  ADD KEY `fk_projektnev_projektnev` (`projektnév`);

--
-- Indexes for table `osztaly`
--
ALTER TABLE `osztaly`
  ADD PRIMARY KEY (`osztálynév`),
  ADD KEY `fk_osztalyvezeto_cegesazonosito` (`osztályvezető`);

--
-- Indexes for table `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`projektnév`),
  ADD KEY `fk_projektvezeto_cegesazonosito` (`projektvezető`);

--
-- Indexes for table `reszleg`
--
ALTER TABLE `reszleg`
  ADD PRIMARY KEY (`részlegnév`),
  ADD KEY `fk_reszlegvezeto_cegesazonosito` (`részlegvezető`),
  ADD KEY `fk_reszlegosztalynev_osztalynev` (`osztálynév`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dolgozo_projekt`
--
ALTER TABLE `dolgozo_projekt`
  ADD CONSTRAINT `fk_cegesazonosito_cegesazonosito` FOREIGN KEY (`céges azonosító`) REFERENCES `dolgozo` (`céges azonosító`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projektnev_projektnev` FOREIGN KEY (`projektnév`) REFERENCES `projekt` (`projektnév`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `osztaly`
--
ALTER TABLE `osztaly`
  ADD CONSTRAINT `fk_osztalyvezeto_cegesazonosito` FOREIGN KEY (`osztályvezető`) REFERENCES `dolgozo` (`céges azonosító`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projekt`
--
ALTER TABLE `projekt`
  ADD CONSTRAINT `fk_projektvezeto_cegesazonosito` FOREIGN KEY (`projektvezető`) REFERENCES `dolgozo` (`céges azonosító`) ON DELETE CASCADE;

--
-- Constraints for table `reszleg`
--
ALTER TABLE `reszleg`
  ADD CONSTRAINT `fk_reszlegosztalynev_osztalynev` FOREIGN KEY (`osztálynév`) REFERENCES `osztaly` (`osztálynév`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reszlegvezeto_cegesazonosito` FOREIGN KEY (`részlegvezető`) REFERENCES `dolgozo` (`céges azonosító`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
