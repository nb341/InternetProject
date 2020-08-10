-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 04:25 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `InfoDB` int(11) NOT NULL,
  `Areas_Affected` varchar(240) COLLATE utf8_bin NOT NULL,
  `Long` varchar(2400) COLLATE utf8_bin NOT NULL,
  `Lat` varchar(2400) COLLATE utf8_bin NOT NULL,
  `Population_Size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`InfoDB`, `Areas_Affected`, `Long`, `Lat`, `Population_Size`) VALUES
(1, 'Caroni', '-61.3817\r\n', '10.5167', 78745),
(2, 'Chaguanas Village', '\r\n-61.4167', '10.5167', 12500),
(3, 'Penal', '-61.4542', '10.1695', 17500);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `lat`, `lon`, `description`) VALUES
(1, 'Archaeological Museum', 'Nikola &Scaron;ubić Zrinski Square 19, 10000, Zagreb, Croatia', 10.605700, -61.381699, 'The Archaeological Museum in Zagreb, Croatia is an archaeological museum with over 450,000 varied artifacts and monuments, gathered from various sources.'),
(2, 'Modern Gallery', 'Andrije Hebranga 1, 10000, Zagreb, Croatia', 10.516700, -61.416698, 'Modern Gallery is a museum in Zagreb, Croatia that holds the most important and comprehensive collection of paintings, sculptures and drawings by 19th and 20th century Croatian artists.'),
(3, 'Technical Museum', 'Savska cesta 18, 10000, Zagreb, Croatia', 10.169500, -61.454201, 'The museum was founded in 1954 and it maintains the oldest preserved steam engine in the area, dating from the mid-19th century, which is still operational.'),
(4, 'St. Mark\'s Church', 'Saint Mark\'s Square 5, 10000, Zagreb, Croatia', 45.816677, 15.973806, 'The Romanesque window found in its south facade is the best evidence that the church must have been built as early as the 13th century as is also the semicircular groundplan of St. Mary\'s chapel'),
(5, 'Zagreb Cathedral', 'Kaptol 31, 10000, Zagreb, Croatia', 45.816723, 15.978199, 'Zagreb Cathedral on Kaptol is the most famous building in Zagreb, and the tallest building in Croatia.'),
(6, 'The Grounded Sun', 'Bogovićeva, 10000, Zagreb, Croatia', 45.812180, 15.975432, 'Nine Views is an ambiental installation in Zagreb, Croatia which, together with the sculpture The Grounded Sun, makes up a consistent model of solar system.'),
(7, 'Croatian National Theatre', 'Marshal Tito Square 15, 10000, Zagreb, Croatia', 45.810184, 15.970123, 'The Croatian National Theatre in Zagreb is a theatre located in Zagreb, owned and operated by the Ministry of Culture'),
(8, 'Museum of Contemporary Art', 'Dubrovnik Avenue 17, 10000, Zagreb, Croatia', 45.777695, 15.977888, 'The museum traces its origins from the City Gallery of Contemporary Art which was established in 1954.'),
(9, 'Maksimir Park', 'Maksimir Park, 10000, Zagreb, Croatia', 45.829090, 16.019424, 'Maksimir Park features artificial lakes, an Echo Pavilion and the 19th century Bellevue Pavilion.'),
(10, 'Mimara Museum', 'Trg Franklina Delanoa Roosevelta 5, 10000, Zagreb, Croatia', 0.000000, 0.000000, 'It is located in a late 19th century neo-Renaissance palace. The holdings comprise 3,750 works of art of various techniques and materials, and different cultures and civilizations.'),
(11, 'Strossmayer Gallery of Old Masters', 'Nikola &Scaron;ubić Zrinski Square 11, 10000, Zagreb, Croatia', 45.823704, 15.990757, 'The Strossmayer Gallery holding includes around 4,000 works, of which some 250 are on display, with the remainder in storage, or on display at other museums or gallery institutions in Croatia.'),
(12, 'Vatroslav Lisinski Concert Hall', 'Stjepan Radić Square 4, 10000, Zagreb, Croatia', 0.000000, 0.000000, 'Vatroslav Lisinski Concert Hall is a large concert hall and convention center in Zagreb, Croatia. It is named after Vatroslav Lisinski, a 19th-century Croatian composer.'),
(13, 'Lotr&scaron;čak Tower', 'Dverce, 10000, Zagreb, Croatia', 45.814510, 15.973316, 'The tower, which dates to the 13th century, was built to guard the southern gate of the Gradec town wall.'),
(14, 'Jarun Lake', 'Jarun Lake, 10000, Zagreb, Croatia', 45.783333, 15.916667, 'Jarun Lake is a popular getaway for residents any time of year but especially in the summer when the clear waters are ideal for swimming.'),
(15, 'Botanical Garden', 'Trg Marka Marulica 9a, Zagreb, Croatia (Botanical Gardens)', 0.000000, 0.000000, 'In addition to 10,000 species of plant, including 1800 tropical flora specimens, the landscaping has created restful corners and paths that seem a world away from bustling Zagreb.');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `Marker_ID` int(11) NOT NULL,
  `Long_tude` float NOT NULL,
  `Lat_tude` float NOT NULL,
  `Population` int(11) NOT NULL,
  `Disaster_Type` varchar(240) COLLATE utf8_bin NOT NULL,
  `Area_Affected` varchar(240) COLLATE utf8_bin NOT NULL,
  `Disaster_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Alert` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`Marker_ID`, `Long_tude`, `Lat_tude`, `Population`, `Disaster_Type`, `Area_Affected`, `Disaster_Time`, `Alert`) VALUES
(2, -61.4167, 10.5167, 12500, 'Earthquake', 'Chaguanas Village', '2019-11-13 17:30:19', ''),
(3, -61.4542, 10.1695, 17500, 'Flooding', 'Penal', '2019-11-14 20:48:19', ''),
(4, -61.46, 10.37, 39146, 'Flooding', 'Claxton Bay Village', '2019-11-16 10:01:08', 'Flash Flood Warning'),
(5, -61.44, 10.1, 3456, 'Flooding', 'Morne Diablo Road', '2019-11-25 14:14:49', 'Street flooding ongoing along the Morne Diablo Road, Morne Diablo, South Trinidad. '),
(6, -61.5107, 10.188, 1567, 'Flooding', 'San Francique', '2019-11-25 14:15:00', 'Flooding on San Francique Road near Antilles Trace, Southern Trinidad.');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `Notice_ID` int(12) NOT NULL,
  `Disaster_Type` varchar(560) COLLATE utf8_bin NOT NULL,
  `Disaster_Time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Area_Affected` varchar(560) COLLATE utf8_bin NOT NULL,
  `Text_File` longtext COLLATE utf8_bin DEFAULT NULL,
  `Picture_File` longtext COLLATE utf8_bin DEFAULT NULL,
  `Video_File` longtext COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`Notice_ID`, `Disaster_Type`, `Disaster_Time`, `Area_Affected`, `Text_File`, `Picture_File`, `Video_File`) VALUES
(1001, 'Flooding', '2019-11-24 23:00:29.380523', 'Caroni', 'Caroni Southbank Road, flooded, roads impassable.', 'https://loopnewslive.blob.core.windows.net/liveimage/sites/default/files/ngC7JKSI6h.jpg', 'https://www.youtube.com/embed/zZ_sj7SccrI'),
(1002, 'Earthquake', '2019-11-24 23:02:38.284164', 'Chaguanas Village', 'Earthquake in supermarket, Chaguanas area, Moo milk spilled.', 'https://cdn.images.express.co.uk/img/dynamic/78/590x/secondary/trinidad-earthquake-1473056.jpg?r=1534950640684', 'https://www.youtube.com/embed/0VSXJ6A-c8E'),
(1003, 'Flooding', '2019-11-24 23:03:43.679866', 'Penal', 'Flooding along Penal main road, area impassible', 'https://loopnewslive.blob.core.windows.net/liveimage/sites/default/files/2019-08/RrUx6fTF7A.jpg', NULL),
(1004, 'Flooding', '2019-11-16 23:22:34.882244', 'Claxton Bay', 'Flash flooding in Claxton Bay area avoid if possible', NULL, NULL),
(1005, 'Flooding', '2019-11-25 14:14:49.000000', 'Morne Diablo', 'Street flooding ongoing along the Morne Diablo Road, Morne Diablo, South Trinidad. ', 'https://pbs.twimg.com/media/EJ_g19DWkAAu9CW?format=jpg&name=medium', NULL),
(1006, 'Flooding', '2019-11-25 02:00:58.444832', 'San Francique', 'Flooding on San Francique Road near Antilles Trace, Southern Trinidad.', NULL, 'https://www.youtube.com/embed/nZw5Dt6EVKs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`InfoDB`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`Marker_ID`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`Notice_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `InfoDB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `Marker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
