-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 08, 2021 at 04:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17075251_gadgetlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `username`, `password`, `email`, `type`) VALUES
(2, 'tonny17', '$2y$10$B2kn9m/iD7US5mtOyPCxa.jMHjqC8aozTuuI1.iArktBYbv375esu', 'tonny.ardiyanto8@gmail.com', 'user'),
(3, 'tonny18', '$2y$10$q2hQGOTdxSzM19ytwK1Uz.R9pF8ISO0fv7hSkwXhGCQcoIBnaLUTy', 'tonny.ardiyanto8@gmail.com', 'user'),
(4, 'tonny19', '$2y$10$YXezNvAtc15AQiiwNefUJeFO3wzziPNsax4fWLAxO5knnLfXua0Oe', 'tonny.ardiyanto8@gmail.com', 'user'),
(5, 'tonny20', '$2y$10$XsxWrw0qjGXn7/Kcpzs0T.yo0qsBuySl/y5h7hE1R5.PunRyYhp1C', 'tonny.ardiyanto8@gmail.com', 'user'),
(6, 'tonny21', '$2y$10$mOOfEYGCIHtAv2XdQUfp2.gdmwqm6MyUGO4ubJnlfSxEwveR5fqcu', 'tonny.ardiyanto8@gmail.com', 'user'),
(7, 'ton123', '$2y$10$7Jvap0bGjpUEBT5OiudZyOuJob5x1JX3sMGioq3NBa3VAaHLlAthu', 'tonny.ardiyanto8@gmail.com', 'user'),
(8, 'ton1234', '$2y$10$cgpdEuBSrTJACU8oql2zweWB8ituVUKKd.J2Q6UErTxhBl1fakUFq', 'tonny.ardiyanto8@gmail.com', 'user'),
(9, 'bip', '$2y$10$nsR8rzgflamLStPnTXUSj.XvZOG.BXJmJ7ba1umtpASpTM2iEYOcS', 'bip@gmail.com', 'user'),
(10, 'tonny', '$2y$10$UE9eKelzS2Ji.oJnf.mp2uEwufVbbacCi8.22KF0TJyuJhY5BDVI.', 'tonny.ardiyanto8@gmail.com', 'admin'),
(11, 'bambang', '$2y$10$Wikjs1bfZ79krsduiWqwuu/V9bkTC6KH32W/Y6Z9Y6lPwMiowczC2', 'bambang@gmail.com', 'admin'),
(12, 'gab', '$2y$10$UwET4ZJIr4vIqizixQ8wmOTVekTshhTU5ShlQ4dlaBTgKA.y3BX0y', 'gabriellafranchesca22@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `discussionid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`discussionid`, `userid`, `comment`, `date`) VALUES
(1, 5, 'bbbbbbbb', '2021-05-18 06:40:27'),
(2, 4, 'yaudah ga usah pake lahhh', '2021-05-18 06:45:28'),
(3, 6, 'a52 :))', '2021-05-18 06:46:16'),
(1, 2, 'ccccccccccc', '2021-05-20 15:14:43'),
(2, 2, 'wkwkwkwk iphone bagus padahal', '2021-05-20 15:15:01'),
(1, 9, 'dddd', '2021-05-20 15:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactusid` int(11) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` varchar(500) NOT NULL,
  `isread` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactusid`, `salutation`, `name`, `subject`, `email`, `date`, `message`, `isread`) VALUES
(1, 'Mr.', 'Tonny', 'i lost my dog', 'tonny.ardiyanto8@gmail.com', '2020-05-22 01:22:02', 'i lost my dog when i check a phone spesification in this website, are you guys know where my dog is?', 1),
(2, 'Mr.', 'test', 'test', 'test@php.com', '2021-01-20 07:18:25', 'hahaha', 1),
(3, 'Mr.', 'aaaaaaa', 'aaaaaaaaaa', 'tonny.ardiyanto8@gmail.com', '2021-05-01 07:21:44', 'aaaaaaaaa', 1),
(4, 'Mr.', 'bbbbbbbbbb', 'bbbbbbbbbb', 'dodoraken@gmail.com', '2021-05-18 07:23:27', 'bbbbbbbbbbbbbbbbbb', 1),
(5, 'Mr.', 'fish', 'KRS', 'tonny.ardiyanto8@gmail.com', '2021-05-20 07:23:51', 'aaaa', 1),
(6, 'Mr.', 'sentosa', 'KRS', 'tonny.ardiyanto8@gmail.com', '2021-05-22 07:28:01', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 1),
(8, 'Mr.', 'gaby', 'i lost my dog', 'tonny.ardiyanto8@gmail.com', '2021-05-22 07:35:27', 'my dog was die', 1),
(9, 'Mrs.', 'ayaya', 'ayaya', 'aaa@gmail.com', '2021-05-31 06:04:50', 'test alert doang', 0),
(10, 'Ms.', 'gab', 'searchbar header', 'gab@gmail.com', '2021-05-31 12:23:49', 'searchbar header design agak aneh, mungkin bisa di benerin lagi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussionid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `nlike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussionid`, `userid`, `brand`, `topic`, `problem`, `date`, `nlike`) VALUES
(1, 3, 'apple', 'iphone', 'aaaa', '2021-05-17 13:08:13', 0),
(2, 3, 'apple', 'iphone saya busuk', 'saya ga mau pake iphone', '2021-05-17 13:11:36', 0),
(3, 3, 'samsung', 'samsung', 'a51', '2021-05-17 13:28:56', 0),
(6, 9, 'Huawei', 'Huawei P40 water resistant?', 'My huawei p40 screen glitches several times for no reason, is there a solution?', '2021-05-18 10:24:16', 0),
(8, 2, 'Apple', 'Saya pusing', 'iphone terlalu mahal', '2021-05-20 15:14:28', 0),
(9, 9, 'Apple', 'iphone yang saya beli error', 'karena saya celupin ke air, lalu saya bakar jadinya tidak berfungsi, mohon penjelasannya', '2021-05-20 15:16:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phoneid` int(11) NOT NULL,
  `phonename` varchar(100) NOT NULL,
  `phonebrandid` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `phoneimg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phoneid`, `phonename`, `phonebrandid`, `rating`, `phoneimg`) VALUES
(0, '', 0, '0.0', ''),
(1, 'Iphone 12 Pro Max', 1, '5.0', '60b4b88994e7b.png'),
(2, 'Iphone 12', 1, '4.5', '60b4bc8940bc2.jpg'),
(3, 'Iphone 11 Pro', 1, '5.0', '60b4bd7ad54c9.png'),
(4, 'Iphone 11', 1, '4.5', '60b4bfcc43e4e.png'),
(5, 'Iphone Xs Max', 1, '4.0', '60b4c0ef0ea70.png'),
(6, 'Huawei Mate X', 2, '4.0', '60b4c4c7452b0.png'),
(7, 'Huawei Mate 30 Pro', 2, '4.0', '60b4c57e92d27.png'),
(8, 'Huawei P40 Pro', 2, '4.5', '60b4c7786b07a.png'),
(9, 'Huawei P30', 2, '3.5', '60b4c81c6108d.png'),
(10, 'Samsung Galaxy Note 20', 3, '4.5', '60b5fcf6e4116.png'),
(12, ' Samsung S21 5G', 3, '5.0', '60b5ff1f49080.png'),
(13, 'Samsung Galaxy S21 Ultra', 3, '5.0', '60b600047e3bd.jpg'),
(14, 'Samsung Galaxy Z Flip', 3, '4.5', '60b600fe36c40.jpg'),
(15, 'Samsung Galaxy Z Fold 2', 3, '4.0', '60b601d98c2f8.png'),
(16, 'Xiaomi Mi 10T', 4, '4.5', '60b6029f9ad56.png'),
(18, 'Xiaomi Mi 10T Pro', 4, '4.5', '60b6041b1fd97.png'),
(19, 'Xiaomi Mi 11', 4, '5.0', '60b604f7ab020.png'),
(20, 'Xiaomi Mi 9T', 4, '4.0', '60b605d9269e6.png'),
(21, 'Xiaomi Redmi Mi 9 Pro', 4, '3.5', '60b606b0c4cbc.png');

-- --------------------------------------------------------

--
-- Table structure for table `phonebrand`
--

CREATE TABLE `phonebrand` (
  `phonebrandid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `officialstore` varchar(100) DEFAULT NULL,
  `shopee` varchar(100) DEFAULT NULL,
  `tokopedia` varchar(100) DEFAULT NULL,
  `blibli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebrand`
--

INSERT INTO `phonebrand` (`phonebrandid`, `name`, `officialstore`, `shopee`, `tokopedia`, `blibli`) VALUES
(0, '', NULL, NULL, NULL, NULL),
(1, 'Apple', 'https://www.apple.com/id/', 'https://shopee.co.id/iboxofficial', NULL, NULL),
(2, 'Huawei', 'https://consumer.huawei.com/id/', 'https://shopee.co.id/huawei.id', 'https://www.tokopedia.com/huawei', 'https://www.blibli.com/merchant/huawei-authorized-official-store/HUE-60028'),
(3, 'Samsung', 'https://www.samsung.com/id/', 'https://shopee.co.id/samsung.official', 'https://www.tokopedia.com/samsung', 'https://www.blibli.com/anchor/samsung'),
(4, 'Xiaomi', 'https://www.mi.co.id/id/index.html', 'https://shopee.co.id/xiaomi.official.id', 'https://www.tokopedia.com/xiaomi', 'https://www.blibli.com/brand/xiaomi-official-store');

-- --------------------------------------------------------

--
-- Table structure for table `phonespecification`
--

CREATE TABLE `phonespecification` (
  `phonespecificationid` int(11) NOT NULL,
  `phoneid` int(11) NOT NULL,
  `technology` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `dimension` varchar(300) NOT NULL,
  `weight` varchar(300) NOT NULL,
  `build` varchar(300) NOT NULL,
  `SIM` varchar(300) NOT NULL,
  `displaytype` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `resolution` varchar(300) NOT NULL,
  `protection` varchar(300) NOT NULL,
  `OS` varchar(300) NOT NULL,
  `chipset` varchar(300) NOT NULL,
  `CPU` varchar(300) NOT NULL,
  `GPU` varchar(300) NOT NULL,
  `cardslot` varchar(300) NOT NULL,
  `internal` varchar(300) NOT NULL,
  `mainmodules` varchar(300) NOT NULL,
  `mainfeatures` varchar(300) NOT NULL,
  `mainvideo` varchar(300) NOT NULL,
  `selfiemodules` varchar(300) NOT NULL,
  `selfiefeatures` varchar(300) NOT NULL,
  `selfievideo` varchar(300) NOT NULL,
  `loudspeaker` varchar(300) NOT NULL,
  `mmjack` varchar(300) NOT NULL,
  `WLAN` varchar(300) NOT NULL,
  `bluetooth` varchar(300) NOT NULL,
  `GPS` varchar(300) NOT NULL,
  `NFC` varchar(300) NOT NULL,
  `radio` varchar(300) NOT NULL,
  `USB` varchar(300) NOT NULL,
  `sensors` varchar(300) NOT NULL,
  `batterytype` varchar(300) NOT NULL,
  `charging` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonespecification`
--

INSERT INTO `phonespecification` (`phonespecificationid`, `phoneid`, `technology`, `status`, `dimension`, `weight`, `build`, `SIM`, `displaytype`, `size`, `resolution`, `protection`, `OS`, `chipset`, `CPU`, `GPU`, `cardslot`, `internal`, `mainmodules`, `mainfeatures`, `mainvideo`, `selfiemodules`, `selfiefeatures`, `selfievideo`, `loudspeaker`, `mmjack`, `WLAN`, `bluetooth`, `GPS`, `NFC`, `radio`, `USB`, `sensors`, `batterytype`, `charging`) VALUES
(0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 1, 'GSM/CDMA/HSPA/EVDO/LTE/5G', 'Announced on October 13, 2020\r\nReleased on November 13, 2020', '160.8 x 78.1 x 7.4 mm (6.33 x 3.07 x 0.29 in)', '228 g (8.04 oz)', 'Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n\r\nIP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)', 'Super Retina XDR OLED, HDR10, 800 nits (typ), 1200 nits (peak)', '6.7 inches, 109.8 cm2 (~87.4% screen-to-body ratio)', '1284 x 2778 pixels, 19.5:9 ratio (~458 ppi density)', 'Scratch-resistant ceramic glass, oleophobic coating\r\n\r\nDolby Vision\r\nWide color gamut\r\nTrue-tone', 'iOS 14.1, upgradable to iOS 14.4', 'Apple A14 Bionic (5 nm)', 'Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)', 'Apple GPU (4-core graphics)', 'No', '128GB 6GB RAM, 256GB 6GB RAM, 512GB 6GB RAM (NVMe)', '12 MP, f/1.6, 26mm (wide), 1.7Âµm, dual pixel PDAF, sensor-shift stabilization (IBIS)\r\n12 MP, f/2.2, 65mm (telephoto), 1/3.4\", 1.0Âµm, PDAF, OIS, 2.5x optical zoom\r\n12 MP, f/2.4, 120Ëš, 13mm (ultrawide), 1/3.6\"\r\nTOF 3D LiDAR scanner (depth)', ' Dual-LED dual-tone flash, HDR (photo/panorama)', '4K@24/30/60fps, 1080p@30/60/120/240fps, 10â€‘bit HDR, Dolby Vision HDR (up to 60fps), stereo sound rec.', '12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)', 'HDR', '4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Yes, with stereo speakers', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 'Yes', 'No', 'Lightning, USB 2.0', 'Face ID, accelerometer, gyro, proximity, compass, barometer. Siri natural language commands and dictation Ultra Wideband (UWB) support', 'Li-Ion 3687 mAh, non-removable (14.13 Wh)', 'Fast charging 20W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging 15W'),
(2, 2, 'GSM/CDMA/HSPA/EVDO/LTE/5G', 'Announced on October, 13 2020\r\nReleased on October, 23 2020', '146.7 x 71.5 x 7.4 mm (5.78 x 2.81 x 0.29 in)', '164 g (5.78 oz)', 'Glass front (Gorilla Glass), glass back (Gorilla Glass), aluminum frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n\r\nIP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)', 'Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)', '6.1 inches, 90.2 cm2 (~86.0% screen-to-body ratio)', '1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)', 'Scratch-resistant ceramic glass, oleophobic coating\r\n\r\nDolby Vision\r\nWide color gamut\r\nTrue-tone', 'iOS 14.1, upgradable to iOS 14.4', 'Apple A14 Bionic (5 nm)', 'Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)', 'Apple GPU (4-core graphics)', 'No', '64GB 4GB RAM, 128GB 4GB RAM, 256GB 4GB RAM (NVMe)', '12 MP, f/1.6, 26mm (wide), 1.4Âµm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 120Ëš, 13mm (ultrawide), 1/3.6\"', 'Dual-LED dual-tone flash, HDR (photo/panorama)', '4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 30fps), stereo sound rec.', '12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)', 'HDR', '4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Yes, with stereo speakers', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 'Yes', 'No', 'Lightning, USB 2.0', 'Face ID, accelerometer, gyro, proximity, compass, barometer\r\n\r\nSiri natural language commands and dictation\r\nUltra Wideband (UWB) support', ' Li-Ion 2815 mAh, non-removable (10.78 Wh)', 'Fast charging 20W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging 15W'),
(3, 3, 'GSM/CDMA/HSPA/EVDO/LTE', 'Announced on September 10, 2019\r\nReleased on September 20, 2019', ' 144 x 71.4 x 8.1 mm (5.67 x 2.81 x 0.32 in)', '188 g (6.63 oz)', ' Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n\r\nIP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)', 'Super Retina XDR OLED, HDR10, 800 nits (typ), 1200 nits (peak)', '5.8 inches, 84.4 cm2 (~82.1% screen-to-body ratio)', '1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)', 'Scratch-resistant ceramic glass, oleophobic coating\r\n\r\nDolby Vision\r\nWide color gamut\r\nTrue-tone', ' iOS 13, upgradable to iOS 14.4', 'Apple A13 Bionic (7 nm+)', 'Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)', ' Apple GPU (4-core graphics)', 'No', '64GB 4GB RAM, 256GB 4GB RAM, 512GB 4GB RAM (NVMe)', '12 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4Âµm, dual pixel PDAF, OIS\r\n12 MP, f/2.0, 52mm (telephoto), 1/3.4\", 1.0Âµm, PDAF, OIS, 2x optical zoom\r\n12 MP, f/2.4, 120Ëš, 13mm (ultrawide), 1/3.6\"', ' Dual-LED dual-tone flash, HDR (photo/panorama)', '4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.', '12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)', 'HDR', '4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Yes, with stereo speakers', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 'Yes', 'No', 'Lightning, USB 2.0', 'Face ID, accelerometer, gyro, proximity, compass, barometer\r\n\r\nSiri natural language commands and dictation\r\nUltra Wideband (UWB) support', ' Li-Ion 3046 mAh, non-removable (11.67 Wh)', 'Fast charging 18W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging'),
(4, 4, 'GSM/CDMA/HSPA/EVDO/LTE', 'Announced on September 10, 2019\r\nReleased on September 20, 2019', ' 150.9 x 75.7 x 8.3 mm (5.94 x 2.98 x 0.33 in)', '194 g (6.84 oz)', 'Glass front (Gorilla Glass), glass back (Gorilla Glass), aluminum frame (7000 series)', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n\r\nIP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)', ' Liquid Retina IPS LCD, 625 nits (typ)', '6.1 inches, 90.3 cm2 (~79.0% screen-to-body ratio)', '828 x 1792 pixels, 19.5:9 ratio (~326 ppi density)', 'Scratch-resistant ceramic glass, oleophobic coating\r\n\r\nDolby Vision\r\nWide color gamut\r\nTrue-tone', 'iOS 13, upgradable to iOS 14.4', 'Apple A13 Bionic (7 nm+)', 'Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)', 'Apple GPU (4-core graphics)', 'No', '64GB 4GB RAM, 128GB 4GB RAM, 256GB 4GB RAM', '2 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4Âµm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 120Ëš, 13mm (ultrawide), 1/3.6\"', 'Dual-LED dual-tone flash, HDR (photo/panorama)', '4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.', '12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)', 'HDR', '4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Yes, with stereo speakers', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot', ' 5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 'Yes', 'No', 'Lightning, USB 2.0', 'Face ID, accelerometer, gyro, proximity, compass, barometer\r\n\r\nSiri natural language commands and dictation\r\nUltra Wideband (UWB) support', 'Li-Ion 3110 mAh, non-removable (11.91 Wh)', 'Fast charging 18W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging'),
(5, 5, 'GSM/CDMA/HSPA/EVDO/LTE', 'Announced on September 12, 2018\r\nReleased on September 21, 2018', ' 157.5 x 77.4 x 7.7 mm (6.20 x 3.05 x 0.30 in)', ' 208 g (7.34 oz)', ' Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n\r\nIP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)', 'Super Retina OLED, HDR10, 625 nits (typ)', ' 6.5 inches, 102.9 cm2 (~84.4% screen-to-body ratio)', '1242 x 2688 pixels, 19.5:9 ratio (~458 ppi density)', 'Scratch-resistant ceramic glass, oleophobic coating\r\n\r\nDolby Vision\r\nWide color gamut\r\nTrue-tone', ' iOS 12, upgradable to iOS 14.4', ' Apple A12 Bionic (7 nm)', ' Hexa-core (2x2.5 GHz Vortex + 4x1.6 GHz Tempest)', ' Apple GPU (4-core graphics)', 'No', '64GB 4GB RAM, 256GB 4GB RAM, 512GB 4GB RAM (NVMe)', '12 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4Âµm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 52mm (telephoto), 1/3.4\", 1.0Âµm, PDAF, OIS, 2x optical zoom', 'Quad-LED dual-tone flash, HDR (photo/panorama)', '\r\n4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.', '7 MP, f/2.2, 32mm (standard)\r\nSL 3D, (depth/biometrics sensor)', 'HDR', '1080p@30/60fps, gyro-EIS', 'Yes, with stereo speakers', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot', ' 5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 'Yes', 'No', 'Lightning, USB 2.0', 'Face ID, accelerometer, gyro, proximity, compass, barometer\r\n\r\nSiri natural language commands and dictation\r\nUltra Wideband (UWB) support', ' Li-Ion 3174 mAh, non-removable (12.08 Wh)', 'Fast charging 15W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging'),
(6, 6, 'GSM/HSPA/LTE/5G', 'Announced on February, 2019\r\nReleased on November, 2019', ' Folded: 161.3 x 78.3 x 11 mm Unfolded: 161.3 x 146.2 x 5.4 mm', '295 g (10.41 oz)', 'Plastic front, aluminum back, aluminum frame', '\r\nHybrid Dual SIM (Nano-SIM, dual stand-by)', 'Foldable OLED', ' 8.0 inches, 205.0 cm2 (~86.9% screen-to-body ratio)', ' 2200 x 2480 pixels (~414 ppi density) Folded cover display: 6.6\", AMOLED, 1148 x 2480 pixels (19.5:9)', '', ' Android 9.0 (Pie), EMUI 9.1', ' Kirin 980 (7 nm)', 'Octa-core (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55)', 'Mali-G76 MP10', 'NM (Nano Memory), up to 256GB (uses shared SIM slot)', '512GB 8GB RAM', '40 MP, f/1.8, 27mm (wide), 1/1.7\", PDAF\r\n8 MP, f/2.4, 52mm (telephoto), 2x optical zoom\r\n16 MP, f/2.2, 17mm (ultrawide)\r\nTOF 3D, (depth)', ' Leica optics, dual-LED dual-tone flash, panorama, HDR', '4K@30fps, 1080p@30fps', 'No - uses main camera', '', '', 'Yes', 'No', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', ' 5.0, A2DP, LE, aptX HD', ' Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', ' USB Type-C 3.2', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer', 'Li-Po 4500 mAh, non-removable', 'Fast charging 55W, 85% in 30 min (advertised)\r\nHuawei SuperCharge'),
(7, 7, 'GSM/HSPA/LTE', 'Announced on September 19, 2019\r\nReleased on September 26, 2019', '158.1 x 73.1 x 8.8 mm (6.22 x 2.88 x 0.35 in)', '198 g (6.98 oz)', 'Glass front (Gorilla Glass 6), glass back (Gorilla Glass 6), aluminum frame', 'Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP68 dust/water resistant (up to 2m for 30 mins)', 'OLED, HDR10', ' 6.53 inches, 108.7 cm2 (~94.1% screen-to-body ratio)', ' 1176 x 2400 pixels, 18.5:9 ratio (~409 ppi density)', 'Corning Gorilla Glass 6', 'Android 10, EMUI 11, no Google Play Services', 'Kirin 990 (7 nm)', ' Octa-core (2x2.86 GHz Cortex-A76 & 2x2.09 GHz Cortex-A76 & 4x1.86 GHz Cortex-A55)', 'Mali-G76 MP16', 'NM (Nano Memory), up to 256GB (uses shared SIM slot)', '128GB 8GB RAM, 256GB 8GB RAM', '\r\n40 MP, f/1.6, 27mm (wide), 1/1.7\", PDAF, OIS\r\n8 MP, f/2.4, 80mm (telephoto), 1/4.0\", PDAF, OIS, 3x optical zoom\r\n40 MP, f/1.8, 18mm (ultrawide), 1/1.54\", PDAF\r\nTOF 3D, (depth)', 'Leica optics, dual-LED dual-tone flash, panorama, HDR', '4K@30/60fps, 1080p@30/60/120fps, 1080p@960fps, 720p@7680fps, gyro-EIS', '\r\n32 MP, f/2.0, 26mm (wide), 1/2.8\", 0.8Âµm\r\nTOF 3D, (depth/biometrics sensor)', 'HDR, panorama', '1080p@30fps', 'Yes, 32-bit/384kHz audio', 'No', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', ' 5.1, A2DP, aptX HD, LE', 'Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', 'USB Type-C 3.1, USB On-The-Go', 'Face ID, fingerprint (under display, optical), accelerometer, gyro, proximity, barometer, compass', ' Li-Po 4500 mAh, non-removable', 'Fast charging 40W\r\nFast wireless charging 27W\r\nReverse wireless charging'),
(8, 8, 'GSM/HSPA/LTE/5G', 'Announced on March 26, 2020\r\nReleased on April 07, 2020', '158.2 x 72.6 x 9 mm (6.23 x 2.86 x 0.35 in)', '209 g (7.37 oz)', 'Glass front, glass back, aluminum frame', 'Single SIM (Nano-SIM/eSIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP68 dust/water resistant (up to 1.5m for 30 mins)', ' OLED, 90Hz, HDR10', ' 6.58 inches, 105.2 cm2 (~91.6% screen-to-body ratio)', '1200 x 2640 pixels (~441 ppi density)', '', 'Android 10, EMUI 10.1, no Google Play Services/p>', 'Kirin 990 5G (7 nm+)', ' Octa-core (2x2.86 GHz Cortex-A76 & 2x2.36 GHz Cortex-A76 & 4x1.95 GHz Cortex-A55)', 'Mali-G76 MP16', 'NM (Nano Memory), up to 256GB (uses shared SIM slot)', '128GB 8GB RAM, 256GB 8GB RAM, 512GB 8GB RAM', '50 MP, f/1.9, 23mm (wide), 1/1.28\", 1.22Âµm, omnidirectional PDAF, OIS\r\n12 MP, f/3.4, 125mm (periscope telephoto), PDAF, OIS, 5x optical zoom\r\n40 MP, f/1.8, 18mm (ultrawide), 1/1.54\", PDAF', 'Leica optics, LED flash, panorama, HDR', '4K@30/60fps, 1080p@30/60fps, 720@7680fps, 1080p@960fps, HDR; gyro-EIS', '\r\n32 MP, f/2.2, 26mm (wide), 1/2.8\", 0.8Âµm, AF\r\nIR TOF 3D, (depth/biometrics sensor)', 'HDR', '4K@30/60fps, 1080p@30/60fps', 'Yes, 32-bit/384kHz audio', 'No', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', ' 5.1, A2DP, LE', ' Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', ' USB Type-C 3.1, USB On-The-Go', 'Infrared face recognition, fingerprint (under display, optical), accelerometer, gyro, proximity, compass, color spectrum', ' Li-Po 4200 mAh, non-removable', 'Fast charging 40W\r\nFast wireless charging 27W\r\nReverse wireless charging'),
(9, 9, 'GSM/HSPA/LTE', 'Announced on March 26, 2019\r\nReleased on March 26, 2019', '149.1 x 71.4 x 7.6 mm (5.87 x 2.81 x 0.30 in', '165 g (5.82 oz)', 'Glass front (Aluminosilicate glass), glass back (Aluminosilicate glass), aluminum frame', 'Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP53, dust and splash protection', 'OLED, HDR10', '6.1 inches, 91.3 cm2 (~85.8% screen-to-body ratio)', '', '1080 x 2340 pixels, 19.5:9 ratio (~422 ppi density)', 'Android 9.0 (Pie), upgradable to Android 10, EMUI 10', 'Kirin 980 (7 nm)', 'Octa-core (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55)', 'Mali-G76 MP10', 'NM (Nano Memory), up to 256GB (uses shared SIM slot)', '64GB 8GB RAM, 128GB 6GB RAM, 128GB 8GB RAM, 256GB 8GB RAM', '\r\n40 MP, f/1.8, 27mm (wide), 1/1.7\", PDAF, Laser AF\r\n8 MP, f/2.4, 80mm (telephoto), 1/4.0\", PDAF, OIS, 3x optical zoom\r\n16 MP, f/2.2, 17mm (ultrawide), PDAF, Laser AF', 'Leica optics, dual-LED dual-tone flash,, panorama, HDR', '4K@30fps, 1080p@60fps, 1080p@30fps (gyro-EIS), 720p@960fps', '32 MP, f/2.0, 26mm (wide), 1/2.8\", 0.8Âµm', 'HDR', '1080p@30fps', 'Yes, 32-bit/384kHz audio', 'No', ' Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, aptX HD, LE', 'Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', 'USB Type-C 3.1', 'Fingerprint (under display, optical), accelerometer, gyro, proximity, compass, color spectrum', 'Li-Po 3650 mAh, non-removable', 'Fast charging 22.5W'),
(10, 10, 'GSM/CDMA/HSPA/EDVO/LTE', 'Announced on August , 05 2020\r\nReleased on August, 21 2021', '161.6 x 75.2 x 8.3 mm (6.36 x 2.96 x 0.33 in)', '192 g (6.77 oz)', 'Glass front (Gorilla Glass 5), plastic back', 'Single SIM (Nano-SIM and/or eSIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP68 dust/water resistant (up to 1.5m for 30 mins)\r\nStylus, 26ms latency (Bluetooth integration, accelerometer, gyro)', 'Super AMOLED Plus, HDR10+', '6.7 inches, 108.4 cm2 (~89.2% screen-to-body ratio', '1080 x 2400 pixels, 20:9 ratio (~393 ppi density)', 'GSM/CDMA/HSPA/EDVO/LTE', 'Android 11, upgradable to Android 11, One UI 3.1', 'Exynos 990 (7 nm+) - Global Qualcomm SM8250 Snapdragon 865+ (7 nm+) - USA', 'Octa-core (2x2.73 GHz Mongoose M5 & 2x2.50 GHz Cortex-A76 & 4x2.0 GHz Cortex-A55) - Global Octa-core (1x3.0 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585) - USA', 'Mali-G77 MP11 - Global Adreno 650 - USA', 'No Card Slot', '256GB 8GB RAM UFS 3.0', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8µm, Dual Pixel PDAF, OIS\r\n64 MP, f/2.0, 27mm (telephoto), 1/1.72\", 0.8µm, PDAF, OIS, 3x hybrid zoom\r\n12 MP, f/2.2, 13mm (ultrawide), 120?, 1/2.55\" 1.4µm', 'LED flash, auto-HDR, panorama', '8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS & OIS', '10 MP, f/2.2, 26mm (wide), 1/3.2\", 1.22µm, Dual Pixel PDAF', 'Dual video call, Auto-HDR', '4K@30/60fps, 1080p@30fps', 'Yes, with stereo speakers\r\n32-bit/384kHz audio Tuned by AKG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE, aptX', 'Yes, with A-GPS, GLONASS, BDS, GALILEO', 'Yes', 'FM radio (Snapdragon model only; market/operator dependent)', 'USB Type-C 3.2, USB On-The-Go', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer\r\nSamsung Wireless DeX (desktop experience support)\r\nANT+\r\nBixby natural language commands and dictation\r\nSamsung Pay (Visa, MasterCard certified)', 'Li-Ion 4300 mAh, non-removable', 'Fast charging 25W\r\nUSB Power Delivery 3.0\r\nFast Qi/PMA wireless charging 15W\r\nReverse wireless charging 4.5W'),
(11, 12, 'GSM/CDMA/HSPA/EDVO/LTE/5G', 'Announced on January, 14 2021\r\nReleased on January, 29 2021', '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)', '169 g (Sub6), 171 g (mmWave) (5.96 oz)', 'Glass front (Gorilla Glass Victus), plastic back, aluminum frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM and/or eSIM, dual stand-by\r\n\r\nIP68 dust/water resistant (up to 1.5m for 30 mins)', 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)', '6.2 inches, 94.1 cm2 (~87.2% screen-to-body ratio)', '1080 x 2400 pixels, 20:9 ratio (~421 ppi density)', 'Corning Gorilla Glass Victus\r\nAlways-on display', 'Android 11, One UI 3.1', 'Exynos 2100 (5 nm) - International Qualcomm SM8350 Snapdragon 888 (5 nm) - USA/China', 'Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) - International Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680) - USA/China', 'Mali-G78 MP14 - International Adreno 660 - USA/China', 'No', '128GB 8GB RAM, 256GB 8GB RAM UFS 3.1', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8µm, Dual Pixel PDAF, OIS\r\n64 MP, f/2.0, 29mm (telephoto), 1/1.72\", 0.8µm, PDAF, OIS, 1.1x optical zoom, 3x hybrid zoom\r\n12 MP, f/2.2, 13mm, 120? (ultrawide), 1/2.55\" 1.4µm, Super Steady video', 'LED flash, auto-HDR, panorama', '8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS', '10 MP, f/2.2, 26mm (wide), 1/3.24\", 1.22µm, Dual Pixel PDAF', 'Dual video call, Auto-HDR', '4K@30/60fps, 1080p@30fps', 'Yes, with stereo speakers\r\n32-bit/384kHz audio\r\nTuned by AKG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, BDS, GALILEO', 'Yes', 'FM radio (Snapdragon model only; market/operator dependent)', 'USB Type-C 3.2, USB On-The-Go', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer\r\n\r\nSamsung DeX, Samsung Wireless DeX (desktop experience support)\r\nANT+\r\nBixby natural language commands and dictation\r\nSamsung Pay (Visa, MasterCard certified)', 'Li-Ion 4000 mAh, non-removable', 'Fast charging 25W\r\nUSB Power Delivery 3.0\r\nFast Qi/PMA wireless charging 15W\r\nReverse wireless charging 4.5W'),
(12, 13, 'GSM/CDMA/HSPA/EDVO/LTE/5G', 'Announced on January, 14 2021\r\nReleased on January, 29 2021', '165.1 x 75.6 x 8.9 mm (6.5 x 2.98 x 0.35 in)', '227 g (Sub6), 229 g (mmWave) (8.01 oz)', 'Glass front (Gorilla Glass Victus), plastic back, aluminum frame', 'Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM and/or eSIM, dual stand-by\r\nIP68 dust/water resistant (up to 1.5m for 30 mins)\r\nStylus support', 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1500 nits (peak', '6.8 inches, 112.1 cm2 (~89.8% screen-to-body ratio)', '1440 x 3200 pixels, 20:9 ratio (~515 ppi density)', 'Corning Gorilla Glass Victus\r\n\r\nAlways-on display', 'Android 11, One UI 3.1', 'Exynos 2100 (5 nm) - International Qualcomm SM8350 Snapdragon 888 (5 nm) - USA/China', 'Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) - International Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680) - USA/China', 'Mali-G78 MP14 - International Adreno 660 - USA/China', 'No', '128GB 12GB RAM, 256GB 12GB RAM, 512GB 16GB RAM UFS 3.1', '108 MP, f/1.8, 24mm (wide), 1/1.33\", 0.8µm, PDAF, Laser AF, OIS\r\n10 MP, f/4.9, 240mm (periscope telephoto), 1/3.24\", 1.22µm, dual pixel PDAF, OIS, 10x optical zoom\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.24\", 1.22µm, dual pixel PDAF, OIS, 3x optical zoom\r\n12 MP, f/2.2, 13mm (ultrawide), 1/2.55\", 1.4µm,', 'LED flash, auto-HDR, panorama', '8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS', '40 MP, f/2.2, 26mm (wide), 1/2.8\", 0.7µm, PDAF\r\n\r\n', 'Dual video call, Auto-HDR', '4K@30/60fps, 1080p@30fps\r\n\r\n', 'Yes, with stereo speakers\r\n32-bit/384kHz audio\r\nTuned by AKG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, BDS, GALILEO', 'Yes', 'FM radio (Snapdragon model only; market/operator dependent)', 'USB Type-C 3.2, USB On-The-Go', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer\r\nSamsung DeX, Samsung Wireless DeX (desktop experience support)\r\nANT+\r\nBixby natural language commands and dictation\r\nSamsung Pay (Visa, MasterCard certified)\r\nUltra Wideband (UWB) support', 'Li-Ion 5000 mAh, non-removable', 'Fast charging 25W\r\nUSB Power Delivery 3.0\r\nFast Qi/PMA wireless charging 15W\r\nReverse wireless charging 4.5W'),
(13, 14, 'GSM/CDMA/HSPA/EDVO/LTE/5G', 'Announced on July, 22 2020\r\nReleased on August , 07 2020', 'Unfolded: 167.3 x 73.6 x 7.2 mm Folded: 87.4 x 73.6 x 17.3 mm', '183 g (6.46 oz)', 'Plastic front, glass back (Gorilla Glass 6), aluminum frame', 'Nano-SIM, eSIM', 'Foldable Dynamic AMOLED, HDR10+', '6.7 inches, 101.6 cm2 (~82.5% screen-to-body ratio)', '1080 x 2636 pixels (~425 ppi density) Cover display: Super AMOLED, 1.1 inches, 112 x 300 pixels', '', 'Android 10, upgradable to Android 11, One UI 3.0', 'Qualcomm SM8250 Snapdragon 865+ (7 nm+)', 'Octa-core (1x3.09 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585)', 'Adreno 650', 'No', '256GB 8GB RAM UFS 3.0', '12 MP, f/1.8, 27mm (wide), 1/2.55\", 1.4µm, Dual Pixel PDAF, OIS\r\n12 MP, f/2.2, 123? (ultrawide), 1.12µm', 'LED flash, HDR, panorama', '4K@30fps, 1080p@30fps, 720p@960fps, HDR10+', '10 MP, f/2.2, 26mm (wide), 1.22µm', 'HDR', '4K@30fps', 'Yes\r\n32-bit/384kHz audio\r\nTuned by AKG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 'Yes', 'No', 'USB Type-C 3.1, USB On-The-Go', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer\r\nANT+\r\nSamsung Pay (Visa, MasterCard certified', 'Li-Po 3300 mAh, non-removable', 'Fast charging 15W\r\nFast wireless charging 9W\r\nReverse wireless charging 4.5W'),
(14, 15, 'GSM/CDMA/HSPA/EDVO/LTE/5G', 'Announced on August, 05 2020\r\nReleased on September, 18 2020', 'Unfolded: 159.2 x 128.2 x 6.9 mm Folded: 159.2 x 68 x 16.8 mm', '282 g (9.95 oz)', 'Glass front (folded), plastic front (unfolded), glass back, aluminum frame', 'Nano-SIM and/or eSIM', 'Foldable Dynamic AMOLED 2X, 120Hz, HDR10+', '7.6 inches, 180.8 cm2 (~88.6% screen-to-body ratio)', '1768 x 2208 pixels (~373 ppi density) Cover display: 6.23\", Super AMOLED, 816 x 2260 pixels (25:9)', 'Corning Gorilla Glass Victus', 'Android 10, upgradable to Android 11, One UI 3.1', 'Qualcomm SM8250 Snapdragon 865+ (7 nm+)', 'Octa-core (1x3.09 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585)', 'Adreno 650', 'No', '256GB 12GB RAM, 512GB 12GB RAM UFS 3.1', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8µm, Dual Pixel PDAF, OIS\r\n12 MP, f/2.4, 52mm (telephoto), 1/3.6\", 1.0µm, PDAF, OIS, 2x optical zoom\r\n12 MP, f/2.2, 123?, 12mm (ultrawide), 1.12µm', 'LED flash, HDR, panorama', '4K@30fps, 1080p@30fps, gyro-EIS', '10 MP, f/2.2, 26mm (wide), 1/3\", 1.22µm\r\nCover camera:\r\n10 MP, f/2.2, 26mm (wide), 1/3\", 1.22µm', 'HDR', '4K@30fps, 1080p@30fps, gyro-EIS', 'Yes, with stereo speakers\r\n32-bit/384kHz audio\r\nTuned by AKG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE, aptX HD', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 'Yes', 'No', 'USB Type-C 3.2', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer\r\nANT+\r\nBixby natural language commands and dictation\r\nSamsung DeX (desktop experience support)\r\nSamsung Pay (Visa, MasterCard certified)\r\nUltra Wideband (UWB) support', 'Li-Po 4500 mAh, non-removable', 'Fast charging 25W\r\nFast wireless charging 11W\r\nReverse wireless charging 4.5W'),
(15, 16, 'GSM / HSPA / LTE / 5G', 'Announced on September 30, 2020\r\nReleased on October 13, 2020', '165.1 x 76.4 x 9.3 mm (6.5 x 3.01 x 0.37 in)', '216 g (7.62 oz)', 'Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD, 144Hz, HDR10+, 500 nits (typ), 650 nits (peak)', '6.67 inches, 107.4 cm2 (~85.2% screen-to-body ratio)', '1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'GSM / HSPA / LTE / 5G', 'Android 10, upgradable to Android 11, MIUI 12', 'Qualcomm SM8250 Snapdragon 865 (7 nm+)', 'Octa-core (1x2.84 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.80 GHz Kryo 585)', 'Adreno 650', 'No', '128GB 6GB RAM, 128GB 8GB RAM  UFS 3.1', '64 MP, f/1.9, 26mm (wide), 1/1.73\", 0.8µm, PDAF\r\n\r\n13 MP, f/2.4, 123? (ultrawide), 1/3.06\", 1.12µm\r\n\r\n5 MP, f/2.4, (macro), 1/5.0\", 1.12µm, AF', 'LED flash, HDR, panorama', '8K@30fps, 4K@30/60fps, 1080p@30/60/120/240/960fps; gyro-EIS', '20 MP, f/2.2, 27mm (wide), 1/3.4\", 0.8µm', 'HDR', '1080p@30fps, 720p@120fps', 'Yes, with stereo speakers\r\n24-bit/192kHz audio\r\n', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.1, A2DP, LE, aptX HD, aptX Adaptive', 'Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', 'USB Type-C 2.0, USB On-The-Go', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer', 'Fast charging 33W\r\nPower Delivery 3.0'),
(16, 18, 'GSM / HSPA / LTE / 5G', 'Announced on September 30, 2020\r\nReleased on October 13, 2020', '165.1 x 76.4 x 9.3 mm (6.5 x 3.01 x 0.37 in)', '218 g (7.69 oz)', 'Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD, 144Hz, HDR10+, 500 nits (typ), 650 nits (peak)', '6.67 inches, 107.4 cm2 (~85.2% screen-to-body ratio)', '1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 5', 'Android 10, upgradable to Android 11, MIUI 12', 'Qualcomm SM8250 Snapdragon 865 (7 nm+)', 'Octa-core (1x2.84 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.80 GHz Kryo 585)', 'Adreno 650', 'No', '128GB 8GB RAM, 256GB 8GB RAM  UFS 3.1', '108 MP, f/1.7, 26mm (wide), 1/1.33\", 0.8µm, PDAF, OIS\r\n\r\n13 MP, f/2.4, 123? (ultrawide), 1.12µm\r\n5 MP, f/2.4, (macro), 1/5.0\", 1.12µm, AF', 'LED flash, HDR, panorama', '8K@30fps, 4K@30/60fps, 1080p@30/60/120fps; gyro-EIS', '20 MP, f/2.2, 27mm (wide), 1/3.4\", 0.8µm', 'HDR', '1080p@30fps, 720p@120fps', 'Yes, with stereo speakers\r\n24-bit/192kHz audio', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.1, A2DP, LE, aptX HD, aptX Adaptive', 'Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, QZSS', 'Yes', 'No', 'USB Type-C 2.0, USB On-The-Go', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer', 'Li-Po 5000 mAh, non-removable', 'Fast charging 33W\r\nPower Delivery 3.0'),
(17, 19, 'GSM / CDMA / HSPA / EVDO / LTE / 5G', 'Announced on December 28, 2020\r\nReleased on January 1, 2021', '164.3 x 74.6 x 8.1 mm (Glass) / 8.6 mm (Leather)', '196 g (Glass) / 194 g (Leather) (6.84 oz)', 'Glass front (Gorilla Glass Victus), glass back (Gorilla Glass 5) or eco leather back, aluminum frame', 'Dual SIM (Nano-SIM, dual stand-by)', 'AMOLED, 1B colors, 120Hz, HDR10+, 1500 nits (peak)', '6.81 inches, 112.0 cm2 (~91.4% screen-to-body ratio)', '1440 x 3200 pixels, 20:9 ratio (~515 ppi density)', 'Corning Gorilla Glass Victus', 'Android 11, MIUI 12', 'Qualcomm SM8350 Snapdragon 888 (5 nm)', 'Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680', 'Adreno 660', 'No', '128GB 8GB RAM, 256GB 8GB RAM, 256GB 12GB RAM  UFS 3.1', '108 MP, f/1.9, 26mm (wide), 1/1.33\", 0.8µm, PDAF, OIS\r\n13 MP, f/2.4, 123? (ultrawide), 1/3.06\", 1.12µm\r\n5 MP, f/2.4, (macro), 1/5.0\", 1.12µm', 'Dual-LED dual-tone flash, HDR, panorama', '8K@24/30fps, 4K@30/60fps, 1080p@30/60/120/240fps; gyro-EIS, HDR10+', '20 MP, f/2.2, 27mm (wide), 1/3.4\", 0.8µm', 'HDR', '1080p@30/60fps, 720p@120fps', 'Yes, with stereo speakers\r\n24-bit/192kHz audio', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot', '5.2, A2DP, LE, aptX HD, aptX Adaptive', 'Yes, with dual-band A-GPS, GLONASS, GALILEO, BDS, QZSS, NavIC', 'Yes', 'No', 'USB Type-C 2.0, USB On-The-Go', 'Fingerprint (under display, optical), accelerometer, gyro, proximity, compass', 'Li-Po 4600 mAh, non-removable', 'Fast charging 55W, 100% in 45 min (advertised)\r\n\r\nFast wireless charging 50W, 100% in 53 min (advertised)\r\n\r\nReverse wireless charging 10W\r\nPower Delivery 3.0\r\nQuick Charge 4+'),
(18, 20, 'GSM / HSPA / LTE', 'Announced on January 8, 2021\r\nReleased on January 18, 2021', '162.3 x 77.3 x 9.6 mm (6.39 x 3.04 x 0.38 in)', '198 g (6.98 oz)', 'Glass front (Gorilla Glass 3), plastic frame, plastic back', 'Dual SIM (Nano-SIM, dual stand-by)\r\nWater-repellent coating', 'IPS LCD, 400 nits (typ)', '6.53 inches, 104.7 cm2 (~83.4% screen-to-body ratio)', '1080 x 2340 pixels, 19.5:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 3', 'Android 10, MIUI 12', 'Qualcomm SM6115 Snapdragon 662 (11 nm)', 'Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)', 'Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)', 'microSDXC (dedicated slot)', '64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM  UFS 2.1 - 64GB  UFS 2.2 - 128GB', '48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF\r\n\r\n8 MP, f/2.2, 120? (ultrawide), 1/4.0\", 1.12µm\r\n\r\n2 MP, f/2.4, (macro)\r\n\r\n2 MP, f/2.4, (depth)', 'LED flash, HDR, panorama', '1080p@30fps', '8 MP, f/2.1, 27mm (wide), 1/4.0\", 1.12µm', '', '1080p@30fps', 'Yes, with stereo speakers\r\n24-bit/192kHz audio', 'Yes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 'Yes', 'FM radio', 'USB Type-C 2.0, USB On-The-Go', 'Fingerprint (side-mounted), accelerometer, proximity, compass', 'Li-Po 6000 mAh, non-removable', 'Fast charging 18W\r\nReverse charging 2.5W'),
(19, 21, 'GSM / HSPA / LTE', 'Announced on April 30, 2020\r\nReleased on May 05, 2020', '165.8 x 76.7 x 8.8 mm (6.53 x 3.02 x 0.35 in)', '209 g (7.37 oz)', 'Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), plastic frame', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD', '6.67 inches, 107.4 cm² (~84.5% screen-to-body ratio)', '1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 5', 'Android 10, MIUI 11', 'Qualcomm SM7125 Snapdragon 720G (8 nm)', 'Octa-core (2x2.3 GHz Kryo 465 Gold & 6x1.8 GHz Kryo 465 Silver)', 'Adreno 618', 'microSDXC (dedicated slot)', '64GB 6GB RAM, 128GB 6GB RAM, 128GB 8GB RAM  UFS 2.1', '64 MP, f/1.9, 26mm (wide), 1/1.72\", 0.8µm, PDAF\r\n8 MP, f/2.2, 119? (ultrawide), 1/4.0\", 1.12µm\r\n\r\n5 MP, f/2.4, (macro), AF\r\n2 MP, f/2.4, (depth)', 'LED flash, HDR, panorama', '4K@30fps, 1080p@30/60/120fps, 720p@960fps, gyro-EIS', '16 MP, f/2.5, (wide), 1/3.06\", 1.0µm', 'HDR, panorama', '1080p@30/120fps', 'Yes', 'Yes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 'Yes', 'FM radio, recording', 'USB Type-C 2.0, USB On-The-Go', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass', 'Li-Po 5020 mAh, non-removable', 'Fast charging 30W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `discussionid` (`discussionid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactusid`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussionid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneid`),
  ADD UNIQUE KEY `phonename` (`phonename`),
  ADD KEY `phonebrandid` (`phonebrandid`);

--
-- Indexes for table `phonebrand`
--
ALTER TABLE `phonebrand`
  ADD PRIMARY KEY (`phonebrandid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `phonespecification`
--
ALTER TABLE `phonespecification`
  ADD PRIMARY KEY (`phonespecificationid`),
  ADD KEY `phoneid` (`phoneid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phonebrand`
--
ALTER TABLE `phonebrand`
  MODIFY `phonebrandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phonespecification`
--
ALTER TABLE `phonespecification`
  MODIFY `phonespecificationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`discussionid`) REFERENCES `discussion` (`discussionid`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `account` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `account` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `account` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`phonebrandid`) REFERENCES `phonebrand` (`phonebrandid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phonespecification`
--
ALTER TABLE `phonespecification`
  ADD CONSTRAINT `phonespecification_ibfk_1` FOREIGN KEY (`phoneid`) REFERENCES `phone` (`phoneid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
