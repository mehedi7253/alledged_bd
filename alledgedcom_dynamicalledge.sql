-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 11:45 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alledgedcom_dynamicalledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `company_profile` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `mission`, `vision`, `image`, `company_profile`, `created_at`, `updated_at`) VALUES
(3, 'ABOUT US', 'We are pleased to acquaint with “AllEdged Limited” is one of the most influential Elevator & Escalator Importer, Supplier, Installer and service provider in Bangladesh. We Supply Elevator & Escalator of China, South Korea & EU Country Origin Brand in Bangladesh. Now, we have been awarded with the Authorized Distributorship in Bangladesh of the famous Elevator Brand namely “BLT- (Brilliant Elevator)” from ShenYang Yuanda Intellectual Industry Group CO., LTD which is top 5 manufacturer in china. We provide Italian MASPERO Brand Elevator & Escalator Which Country Origin is Italy, Switzerland & France. We supply 100% South Korea origin Silver Brand Elevator & Escalator. We have been awarded with the Authorized Sub-Distributorship (with STL) of Canny China Origin Brand elevator in Bangladesh. We also supply spare parts, high quality AVS, Steel Structure, Hoist Beam & AVR. We import Generator UK & China Origin Brand also supply Heavy Construction & Electromechanical Equipment and so on ...\r\n<br><br>\r\n\r\n\r\n\r\nAllEdged Limited has started its journey with almost 20 years of experienced management. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators. Those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company. They all are the nerve center of the Elevators & Escalators industry in Bangladesh. \r\n<br>\r\nOur Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality, Safety & Commitment. Our honesty, Commitment, Determination, Skilled & experienced man power, affordable price, quick After Sales & Services has established a longer relationship with honorable customers which is our main strength. So, we believe that we have a lot of capability to reach our glorious destination & will reach to our goal with our main strength. We AllEdged are ready to stay with our honorable customers twenty-four (24) hours day to day, year to year, decades to decades. For this reason, we are always dedicated to doing better day by day…', 'Our Mission is providing the right equipment with the best service to fulfill our customer needs. So that, our customer being satisfied and they can contribute to move the country going forward by improving the quality of life. We ensure that all of our products are high quality & Advanced technology based with competitive price. Our projects are successfully completed by our vest expert hands. We are determined to reach our goals by gaining the trust of our customers.', 'fasdf', 'public/uploads/company_overview/1050487658_1626416241.jpeg', 'public/uploads/company_overview/company_profile_1626281691_Canny-passenger-elevator.pdf', '2021-06-21 18:05:12', '2022-01-22 15:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `video_code` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_des` longtext DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `category_id`, `brand_id`, `video_code`, `short_description`, `description`, `image`, `page_title`, `page_des`, `pdf_file`, `created_at`, `updated_at`) VALUES
(19, 'A', 12, 15, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/291230211_1626544542.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1626544542_Canny-passenger-elevator.pdf', '2021-07-17 17:55:42', '2021-07-28 15:55:44'),
(20, 'B', 13, 16, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/80543955_1627488094.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627488094_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-07-28 16:01:34', '2021-07-28 16:04:27'),
(21, 'C', 13, 16, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/685060975_1627488367.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627488367_CNYD-BLT-home-lift-2020.pdf', '2021-07-28 16:06:07', '2021-07-28 16:06:07'),
(22, 'D', 12, 17, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/1882195744_1627488530.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627488530_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-07-28 16:08:50', '2021-07-28 16:08:50'),
(23, 'E', 14, 15, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/1150935775_1627489021.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627489021_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-07-28 16:17:01', '2021-07-28 16:17:01'),
(24, 'F', 16, 18, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/731910468_1627839649.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627839107_Canny-passenger-elevator.pdf', '2021-08-01 17:31:47', '2021-08-01 17:40:49'),
(25, 'G', 17, 19, '#', NULL, NULL, 'public/uploads/product_image/44300480_1627840041.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627840041_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-01 17:47:21', '2021-08-01 17:47:21'),
(26, 'H', 18, 20, '#', NULL, NULL, 'public/uploads/product_image/310545252_1627840728.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627840728_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-01 17:58:48', '2021-08-01 17:58:48'),
(27, 'I', 19, 21, '#', NULL, NULL, 'public/uploads/product_image/85286636_1627841135.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627841135_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-01 18:05:35', '2021-08-01 18:05:35'),
(28, 'J', 20, 22, '#', NULL, NULL, 'public/uploads/product_image/1510216388_1627928737.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1627928737_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-02 18:25:37', '2021-09-14 11:18:10'),
(29, 'K', 22, 23, '#', NULL, NULL, 'public/uploads/product_image/1783887351_1628263922.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1628263922_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-06 15:32:02', '2021-08-06 15:32:02'),
(30, 'L', 23, 24, '#', NULL, NULL, 'public/uploads/product_image/1356443370_1628264021.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1628264021_pdf_1624619555_Canny-passenger-elevator.pdf', '2021-08-06 15:33:41', '2021-08-06 15:33:41'),
(33, NULL, 12, 17, 'https://www.youtube.com/', NULL, NULL, 'public/uploads/product_image/870316307_1636303469.jpeg', NULL, NULL, 'public/uploads/product_pdf/pdf_1636303469_mar152021_bb_18.pdf', '2021-11-07 16:44:29', '2021-11-07 18:02:43'),
(34, 'Elevator', 12, 28, 'https://www.youtube.com/watch?v=3ohVPB1r7IU', NULL, NULL, 'public/uploads/product_image/238786898_1636308283.jpeg', 'df', 'sdf', 'public/uploads/product_pdf/pdf_1636308225_mar152021_bb_18.pdf', '2021-11-07 18:03:45', '2021-12-17 13:12:41'),
(35, 'DFSD', 12, 28, '#', NULL, NULL, 'public/uploads/product_image/1634800269_1639751073.jpeg', 'SDF', 'SD', 'public/uploads/product_pdf/pdf_1639751073_mar152021_bb_18.pdf', '2021-12-17 14:24:33', '2021-12-17 14:24:33'),
(36, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/990294868_1639755935.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:45:35', '2021-12-17 15:45:35'),
(37, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/575413227_1639756090.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:48:10', '2021-12-17 15:48:10'),
(38, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/373383227_1639756123.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:48:43', '2021-12-17 15:48:43'),
(39, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/1554802673_1639756144.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:49:04', '2021-12-17 15:49:04'),
(40, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/515607729_1639756175.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:49:35', '2021-12-17 15:49:35'),
(41, 'Passenger Elevetor', 12, 30, NULL, NULL, NULL, 'public/uploads/product_image/1803918688_1639756198.jpeg', 'Passenger Elevetor', 'Passenger Elevetor', NULL, '2021-12-17 15:49:58', '2021-12-17 15:49:58'),
(42, 'Bed/Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/1800870688_1640443486.jpeg', 'Bed/Hospital  Elevator', 'Bed/Hospital  Elevator', NULL, '2021-12-25 14:44:46', '2021-12-25 14:48:28'),
(43, 'Bed/Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/260571339_1640443845.jpeg', 'Bed/Hospital  Elevator', 'Bed/Hospital  Elevator', NULL, '2021-12-25 14:50:45', '2021-12-25 14:50:45'),
(44, 'Bed/Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/1727592829_1640443877.jpeg', 'Bed/Hospital  Elevator', 'Bed/Hospital  Elevator', NULL, '2021-12-25 14:51:17', '2021-12-25 14:51:17'),
(45, 'Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/303279025_1640444203.jpeg', 'Hospital  Elevator', 'Hospital  Elevator', NULL, '2021-12-25 14:56:43', '2021-12-25 14:56:43'),
(46, 'Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/1044275032_1640444244.jpeg', 'Hospital  Elevator', 'Hospital  Elevator', NULL, '2021-12-25 14:57:24', '2021-12-25 14:57:24'),
(47, 'Hospital  Elevator', 13, 31, NULL, NULL, NULL, 'public/uploads/product_image/954734423_1640444272.jpeg', 'Hospital  Elevator', 'Hospital  Elevator', NULL, '2021-12-25 14:57:52', '2021-12-25 14:57:52'),
(48, 'Freight/Cargo Elevator', 14, 32, NULL, NULL, NULL, 'public/uploads/product_image/1355780437_1640448092.jpeg', 'Freight/Cargo Elevator', 'Freight/Cargo Elevator', NULL, '2021-12-25 16:01:32', '2021-12-25 16:01:32'),
(49, 'Freight/Cargo Elevator', 14, 32, NULL, NULL, NULL, 'public/uploads/product_image/2144927001_1640448130.jpeg', 'Freight/Cargo Elevator', 'Freight/Cargo Elevator', NULL, '2021-12-25 16:02:10', '2021-12-25 16:02:10'),
(50, 'Freight/Cargo Elevator', 14, 32, NULL, NULL, NULL, 'public/uploads/product_image/1090163210_1640448171.jpeg', 'Freight/Cargo Elevator', 'Freight/Cargo Elevator', NULL, '2021-12-25 16:02:51', '2021-12-25 16:02:51'),
(51, 'Freight/Cargo Elevator', 14, 32, NULL, NULL, NULL, 'public/uploads/product_image/950490674_1640448359.jpeg', 'Freight/Cargo Elevator', 'Freight/Cargo Elevator', NULL, '2021-12-25 16:05:59', '2021-12-25 16:05:59'),
(52, 'Maspero', 12, 33, NULL, NULL, NULL, 'public/uploads/product_image/2106119707_1645809633.jpeg', 'Maspero', 'maspero', NULL, '2022-02-25 17:20:33', '2022-02-25 17:20:33'),
(53, 'Domestic Elevator', 12, 33, NULL, NULL, NULL, 'public/uploads/product_image/613800830_1645809830.jpeg', 'Maspero', 'Domestic Elevator', NULL, '2022-02-25 17:22:07', '2022-02-25 17:23:50'),
(54, 'Discovery Elevators', 12, 33, NULL, NULL, NULL, 'public/uploads/product_image/1387956689_1645809890.jpeg', 'Discovery Elevators', 'Discovery Elevators', NULL, '2022-02-25 17:24:50', '2022-02-25 17:24:50'),
(55, 'Hydraulic Home Elevator', 12, 33, NULL, NULL, NULL, 'public/uploads/product_image/2080741725_1645809946.jpeg', 'Hydraulic Home Elevator', 'Hydraulic Home Elevator', NULL, '2022-02-25 17:25:46', '2022-02-25 17:25:46'),
(56, 'Shopping Mall Escalator', 12, 33, NULL, NULL, NULL, 'public/uploads/product_image/622996778_1645810072.jpeg', 'Shopping Mall Escalator.jpg', 'Shopping Mall Escalator.jpg', NULL, '2022-02-25 17:27:52', '2022-02-25 17:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `parent`, `created_at`, `updated_at`, `title`, `level`, `short_description`, `description`) VALUES
(11, 'Elevetor', NULL, '2021-07-17 17:52:54', '2021-07-17 17:52:54', 'Elevetor', '1', 'kkkk', '<p>jjj<br></p>'),
(12, 'Passenger Elevator', 11, '2021-07-17 17:54:48', '2021-12-17 13:24:05', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market. Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market. Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '<p class=\"aos-init aos-animate\" data-aos=\"fade-up\" data-aos-duration=\"3000\"><br></p>\r\n        <p class=\"aos-init aos-animate\" data-aos=\"fade-up\" data-aos-duration=\"3000\">This\r\n is my great pleasure to acquaint ourselves as one of the influential \r\nElevator, Escalator &amp; Generator Importer, Supplier, Installer and \r\nservice provider from EU, Korean, and China world renown brands \r\naccording to the demand of clients in our domestic market. which is best\r\n quality, reliable, safe and smooth operation in Bangladesh market. \r\n          Importer, Supplier, Installer and service provider from EU, \r\nKorean, and China world renown brands according to the demand of clients\r\n in our domestic market. which is best quality, reliable, safe and \r\nsmooth operation in Bangladesh market.\r\n        </p>\r\n        <p class=\"aos-init aos-animate\" data-aos=\"fade-up\" data-aos-duration=\"3000\">This\r\n is my great pleasure to acquaint ourselves as one of the influential \r\nElevator, Escalator &amp; Generator Importer, Supplier, Installer and \r\nservice provider from EU, Korean, and China world renown brands \r\naccording to the demand of clients in our domestic market. which is best\r\n quality, reliable, safe and smooth operation in Bangladesh market. \r\n        </p>\r\n        <p class=\"aos-init aos-animate\" data-aos=\"fade-up\" data-aos-duration=\"3000\">This\r\n is my great pleasure to acquaint ourselves as one of the influential \r\nElevator, Escalator &amp; Generator Importer, Supplier, Installer and \r\nservice provider from EU, Korean, and China world renown brands \r\naccording to the demand of clients in our domestic market. which is best\r\n quality, reliable, safe and smooth operation in Bangladesh market. \r\n          Importer, Supplier, Installer and service provider from EU, \r\nKorean, and China world renown brands according to the demand of clients\r\n in our domestic market. which is best quality, reliable, safe and \r\nsmooth operation in Bangladesh market.\r\n        </p>\r\n        <p class=\"aos-init aos-animate\" data-aos=\"fade-up\" data-aos-duration=\"3000\">This\r\n is my great pleasure to acquaint ourselves as one of the influential \r\nElevator, Escalator &amp; Generator Importer, Supplier, Installer and \r\nservice provider from EU, Korean, and China world renown brands \r\naccording to the demand of clients in our domestic market. which is best\r\n quality, reliable, safe and smooth operation in Bangladesh market. \r\n        </p>'),
(13, 'Bed/Hospital Elevator', 11, '2021-07-28 16:00:03', '2021-07-28 16:02:17', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '<p>This is my great pleasure to acquaint ourselves as one of the \r\ninfluential Elevator, Escalator &amp; Generator Importer, Supplier, \r\nInstaller and service provider from EU, Korean, and China world renown \r\nbrands according to the demand of clients in our domestic market. which \r\nis best quality, reliable, safe and smooth operation in Bangladesh \r\nmarket. \r\n</p>'),
(14, 'Freight/Cargo Elevator', 11, '2021-07-28 16:15:59', '2021-07-28 16:18:01', NULL, '2', NULL, '<p><br></p>'),
(15, 'Generator', NULL, '2021-08-01 17:29:37', '2021-08-01 17:29:37', NULL, '1', NULL, NULL),
(16, 'Perkins', 15, '2021-08-01 17:30:14', '2021-08-01 17:37:22', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2', 'Perkins Perkins', '<p>This is my great pleasure to acquaint ourselves as one of the \r\ninfluential Elevator, Escalator &amp; Generator Importer, Supplier, \r\nInstaller and service provider from EU, Korean, and China world renown \r\nbrands according to the demand of clients in our domestic market. which \r\nis best quality, reliable, safe and smooth operation in Bangladesh \r\nmarket.</p>'),
(17, 'Cummins', 12, '2021-08-01 17:44:47', '2021-12-17 12:57:53', 'Cummins Power Generation C500D5 500 kVA Genset', '2', 'The C500D5 commercial generator set is ideal for standby, prime or continuous power generation and it benefits from Cummins’ high testing standards. If you invest in this impressive diesel generator, you can be sure you are getting a reliable power generation system capable of consistent optimal level performance.', '<p><br></p>\r\n\r\n<p>Six cylinder, turbo charged and charge air cooled, the C500D5 uses <a href=\"https://www.adeltd.co.uk/diesel-generators/cummins/\">Cummins</a>’\r\n QSZ13 series engine in combination with the PowerCommand® 2.2 \r\nmicroprocessor control unit and the Cummins Fleetguard series \r\nhigh-precision filter to produce a high end, high performance diesel \r\ngenerator that will run and run - and that operates both manually (in \r\nRUN mode) and remotely (in AUTO mode).</p>\r\n\r\n<p>Whether you need help deciding between our extensive catalogue of \r\nCummins, branded diesel generators, or you simply require more \r\ninformation to help you along in your decision making process, our team \r\nof experts are contactable by <a href=\"tel:+441977657982\">phone</a>, <a href=\"mailto:enquiries@adeltd.co.uk\">email</a> or online - so don’t hesitate to get in touch today.</p>'),
(18, 'Stamford', 15, '2021-08-01 17:56:50', '2021-08-01 17:56:50', '500 kVA Three Phase Silent Diesel Generator', '2', 'Stamford Generator Alternator Wire: Copper Bearing: SKF Transport Package: Plywood Cases Specification: Nema Trademark: Poweronly', '<table><tbody><tr><td style=\"width:147px;height:24px;text-align:left;\">Feature:</td></tr><tr><td colspan=\"3\" style=\"width:366px;height:23px;text-align:left;\">-&nbsp;Brushless,&nbsp;4&nbsp;poles,&nbsp;rotation&nbsp;magnet.</td></tr><tr><td style=\"width:147px;height:23px;text-align:left;\">&nbsp;&nbsp;IP21-23&nbsp;NEMA&nbsp;enclosure&nbsp;is&nbsp;standard&nbsp;for&nbsp;all&nbsp;industrial&nbsp;alternators.</td></tr><tr><td colspan=\"3\" style=\"width:366px;height:23px;text-align:left;\">-&nbsp;The&nbsp;insulation&nbsp;system&nbsp;is&nbsp;Class&nbsp;H</td></tr><tr><td colspan=\"3\" style=\"width:366px;height:23px;text-align:left;\">&nbsp;&nbsp;&nbsp;Range&nbsp;of&nbsp;voltage&nbsp;regulation&nbsp;at&nbsp;no&nbsp;load:&gt;=±5%</td></tr><tr><td colspan=\"3\" style=\"width:366px;height:23px;text-align:left;\">&nbsp;&nbsp;&nbsp;Exciting&nbsp;method:&nbsp;Brushless&nbsp;Self-exciting</td></tr><tr><td style=\"width:147px;height:23px;text-align:left;\">-&nbsp;Simple&nbsp;installation&nbsp;and&nbsp;maintenance,&nbsp;with&nbsp;easy&nbsp;access&nbsp;to&nbsp;terminals,&nbsp;rotating&nbsp;diodes.</td></tr><tr><td style=\"width:147px;height:23px;text-align:left;\">-&nbsp;Wide&nbsp;range&nbsp;of&nbsp;flange&nbsp;adaptors&nbsp;and&nbsp;single&nbsp;bearing&nbsp;disc&nbsp;coupling.</td></tr><tr><td style=\"width:147px;height:23px;text-align:left;\">-&nbsp;Optional&nbsp;accessories&nbsp;available&nbsp;for&nbsp;easy&nbsp;paralleling&nbsp;with&nbsp;mains&nbsp;or&nbsp;other&nbsp;generators.</td></tr><tr><td style=\"width:147px;height:23px;text-align:left;\">-&nbsp;AVR&nbsp;auto&nbsp;voltage&nbsp;regulator,&nbsp;auto&nbsp;exciter,&nbsp;auto&nbsp;adjustment.</td></tr></tbody></table><p><br></p>'),
(19, 'Ricardo', 15, '2021-08-01 18:04:24', '2021-08-01 18:04:24', 'Ricardo 40 KVA 3 Phase 1500 RPM Speed Diesel Generator', '2', 'Ricardo diesel generator has 40 KVA rated capacity, 400 / 230V voltage, 3 phase, 50 Hz frequency, 1500 RPM speed generator engine operating speed', NULL),
(20, 'Construction Equipment', NULL, '2021-08-02 18:19:34', '2021-09-19 16:08:31', 'Construction Equipment', '1', 'Construction Equipment', '<p>Construction Equipment<br></p>'),
(21, 'Substation Brand', 20, '2021-08-02 18:24:41', '2021-08-02 18:26:11', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '<p>This is my great pleasure to acquaint ourselves as one of the \r\ninfluential Elevator, Escalator &amp; Generator Importer, Supplier, \r\nInstaller and service provider from EU, Korean, and China world renown \r\nbrands according to the demand of clients in our domestic market. which \r\nis best quality, reliable, safe and smooth operation in Bangladesh \r\nmarket.</p>'),
(22, 'Home Elevator', 11, '2021-08-06 15:24:30', '2021-08-06 15:24:30', 'Home Elevator', '2', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '<p>This is my great pleasure to acquaint ourselves as one of the \r\ninfluential Elevator, Escalator &amp; Generator Importer, Supplier, \r\nInstaller and service provider from EU, Korean, and China world renown \r\nbrands according to the demand of clients in our domestic market. which \r\nis best quality, reliable, safe and smooth operation in Bangladesh \r\nmarket.</p>'),
(23, 'Car Elevator', 11, '2021-08-06 15:26:11', '2021-08-06 15:26:11', 'Car Elevator', '2', 'Car Elevator', '<p>Car Elevator<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `title`, `dis_title`, `dis`, `image`, `pdf`, `brand_id`, `created_at`, `updated_at`) VALUES
(4, 'Generator', 'catelog', '<p>catelog<br></p>', 'public/uploads/services_content_image/1497662200_1636308087.jpeg', 'public/uploads/services_content_image/public/uploads/services_content_image/mar152021_bb_18.pdf', 15, '2021-11-07 12:01:27', '2021-11-07 12:08:05'),
(17, 'Passenger elevator', 'Bed elevator adopts mature control technology from BLT', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine, and meets the usage requirement of special environment in hospital to the greatest', 'public/uploads/slider_image/327064845_1640018896.jpeg', 'public/uploads/services_content_image/BLT Brochure(1).pdf', 30, '2021-12-17 11:03:26', '2021-12-20 10:48:16'),
(18, 'Passenger Elevetor', 'The BLT-QS passenger elevator adopts gearless permanent', 'The BLT-QS passenger elevator adopts gearless permanent magnet synchronous traction machine with neat and compact decoration. The machine room area is largely reduced compared with conventional machine room.<br>', 'public/uploads/slider_image/1344613020_1640017740.jpeg', 'public/uploads/services_content_image/public/uploads/services_content_image/BLT Brochure3.pdf', 30, '2021-12-19 10:58:18', '2021-12-20 10:32:41'),
(19, 'Elevator Bed  Elevator', 'Elevator Bed  Elevator', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine, and meets the usage requirement of special environment in hospital to the greatest extent during designing.', 'public/uploads/slider_image/535212644_1640446048.jpeg', 'public/uploads/services_content_image/public/uploads/services_content_image/public/uploads/services_content_image/BLT Brochure3.pdf', 31, '2021-12-25 09:26:55', '2021-12-25 09:28:00'),
(20, 'Bed Elevator', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine, and meets the usage requirement of special environment in hospital to the greatest extent during designing. <br>', 'public/uploads/services_content_image/480065050_1640446170.jpeg', 'public/uploads/services_content_image/public/uploads/services_content_image/BLT Brochure3.pdf', 31, '2021-12-25 09:29:30', '2021-12-25 09:29:54'),
(21, 'Freight/Cargo Elevator', 'BLT-FS Series of Freight Elevator is neat and simple, and it\'s widely used in supermarket, shopping mall, factory and other places.', 'BLT-FS Series of Freight Elevator is neat and simple, and it\'s widely used in supermarket, shopping mall, factory and other places. A neoprene damping method is adopted between the steel beam and machine base', 'public/uploads/services_content_image/1991605362_1640449616.jpeg', 'public/uploads/services_content_image/public/uploads/services_content_image/BLT Brochure3.pdf', 32, '2021-12-25 10:26:56', '2021-12-25 10:27:18'),
(22, 'Maspero Elevator', 'Lift Designs, Escalators and Maintenance', 'Maspero Elevatori is an undisputed leader in designing, manufacturing and servicing elevators. Our products are made in Italy and custom-made for every use, from the private lift to the public elevator', 'public/uploads/services_content_image/1337174338_1645811241.jpeg', 'public/uploads/services_content_image/ABOUT US.pdf', 33, '2022-02-25 11:47:21', '2022-02-25 11:48:52'),
(23, 'Maspero Elevator', 'Lift Designs, Escalators and Maintenance', 'Maspero Elevatori is an undisputed leader in designing, manufacturing and servicing elevators. Our products are made in Italy and custom-made for every use, from the private lift to the public elevator', 'public/uploads/slider_image/634633236_1645811453.jpeg', 'public/uploads/services_content_image/ABOUT US.pdf', 33, '2022-02-25 11:50:04', '2022-02-25 11:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `client_comments`
--

CREATE TABLE `client_comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_comments`
--

INSERT INTO `client_comments` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Under Construction', 'public/uploads/client_comment_image/1333216030_1626276630.jpeg', 'Under Construction', '2021-06-17 19:06:51', '2021-07-14 15:30:30'),
(2, 'Under Construction', 'public/uploads/client_comment_image/1449013024_1626276587.jpeg', 'Under Construction', '2021-06-17 19:08:15', '2021-07-14 15:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_company` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `email`, `phone`, `address`, `logo`, `favicon`, `about_company`, `created_at`, `updated_at`) VALUES
(13, 'Allegiant Limited', 'info@alledged.com.bd, info@alledged.com.bd', '+88 02 58316636,+88 01830 889919', 'Eastern Trade Centre, 56 Purana Paltan Line, VIP Road (13th Floor), Suite#7 & 8 Dhaka-1000', 'public/uploads/logo/1851409012_1625318431.jpeg', 'public/uploads/logo/132387156_1625318100.jpeg', 'We are pleased to acquaint with “AllEdged Limited” is one of the most influential Elevator & Escalator Importer, Supplier, Installer and service provider in Bangladesh. We are always dedicated to doing better day by day.', NULL, '2021-07-26 11:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'fab fa-facebook-f', 'https://www.facebook.com', '2021-07-03 13:26:04', '2021-07-16 06:07:54'),
(2, 'twitter', 'fab fa-twitter', 'https://twitter.com/alledgedlimited', '2021-07-16 06:09:00', '2021-07-16 06:09:00'),
(3, 'linkedin', 'fab fa-linkedin', 'https://www.linkedin.com/company/alledgedlimited/', '2021-07-16 06:09:42', '2021-07-16 06:09:42'),
(4, 'youtube', 'fab fa-youtube', 'https://www.youtube.com/channel/UC2-aPkOgAxn1WIY7YOSNB9A?fbclid', '2021-07-16 06:10:16', '2021-07-16 06:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `menu_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(5, 11, 'Travel Agency', 'public/uploads/business_content/629867495_1626366245.jpeg', '2021-06-25 21:05:17', '2021-07-15 16:24:05'),
(6, 11, 'gvfgfg', 'public/uploads/business_content/895397906_1626451055.jpeg', '2021-06-30 17:40:51', '2021-07-16 15:57:35'),
(7, 9, 'gyh', 'public/uploads/business_content/2042427911_1626366275.jpeg', '2021-07-15 16:24:35', '2021-07-15 16:24:35'),
(8, 10, 'gfg', 'public/uploads/business_content/1055995123_1626372107.jpeg', '2021-07-15 18:01:47', '2021-07-16 16:08:54'),
(9, 10, 'terte', 'public/uploads/business_content/1283024122_1626543257.jpeg', '2021-07-17 17:34:17', '2021-07-17 17:34:17'),
(10, 10, 'ee', 'public/uploads/business_content/1696257694_1626543352.jpeg', '2021-07-17 17:35:52', '2021-07-17 17:35:52'),
(11, 23, 'Construction Services', 'public/uploads/business_content/1498210450_1626543628.jpeg', '2021-07-17 17:40:28', '2021-07-17 17:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `outer_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `name`, `url`, `outer_link`, `created_at`, `updated_at`) VALUES
(4, 'About Us', 'page/about-us/company-overview', NULL, '2021-06-16 18:16:32', '2021-07-16 20:09:20'),
(5, 'Contact Us', 'page/contact-us', NULL, '2021-06-16 18:16:43', '2021-07-16 20:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `background_image` text DEFAULT NULL,
  `image` text NOT NULL,
  `image_2` text DEFAULT NULL,
  `image_3` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `background_image`, `image`, `image_2`, `image_3`, `created_at`, `updated_at`) VALUES
(7, 'Elevator', 'Who formalized for worship to honorable customers by the excellence products and service. With lot of projects under our sphere', 'public/uploads/gallery_image/723329467_1643214599.jpeg', 'public/uploads/gallery_image/1348302442_1639755066.jpeg', 'public/uploads/gallery_image/970070865_1639755066.jpeg', 'public/uploads/gallery_image/525984079_1639755066.jpeg', '2021-07-15 17:55:15', '2022-01-26 16:29:59'),
(9, 'Project 3', 'Who formalized for worship to honorable customers by the excellence products and service. With lot of projects under our sphere', 'public/uploads/gallery_image/1725152001_1626450316.jpeg', 'public/uploads/gallery_image/1287870935_1626450282.jpeg', 'public/uploads/gallery_image/1292566673_1626450282.jpeg', 'public/uploads/gallery_image/374072538_1626450282.jpeg', '2021-07-16 15:44:42', '2021-07-16 15:45:16'),
(10, 'Metro Rail', 'Inspection', 'public/uploads/gallery_image/692671418_1639755006.jpeg', 'public/uploads/gallery_image/2141233065_1639754661.jpeg', 'public/uploads/gallery_image/356471241_1639754661.jpeg', 'public/uploads/gallery_image/15735357_1639754719.jpeg', '2021-09-14 11:43:50', '2021-12-17 15:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `google_maps`
--

CREATE TABLE `google_maps` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Company Google Map Location';

--
-- Dumping data for table `google_maps`
--

INSERT INTO `google_maps` (`id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.557241995796!2d90.4109006803559!3d23.73712585564803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f5622fb7a3%3A0xbab816376486ea44!2sEastern%20Trade%20Center!5e0!3m2!1sen!2sbd!4v1613066690171!5m2!1sen!2sbd', '2021-03-21 08:31:50', '2021-06-13 18:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `greetings`
--

CREATE TABLE `greetings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `first_point_title` varchar(255) DEFAULT NULL,
  `first_point_description` text DEFAULT NULL,
  `second_point_title` varchar(255) DEFAULT NULL,
  `second_point_description` text DEFAULT NULL,
  `third_point_title` varchar(255) DEFAULT NULL,
  `third_point_description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `greetings`
--

INSERT INTO `greetings` (`id`, `title`, `description`, `footer`, `first_point_title`, `first_point_description`, `second_point_title`, `second_point_description`, `third_point_title`, `third_point_description`, `image`, `updated_at`, `created_at`) VALUES
(2, 'Warm Greetings from AllEdged Limited', '<p><br>This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator &amp; Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nI have had the good fortune to work in Bangladesh with most of the world-famous elevator brands from the foundation level for the last one and a half decades, which is still going on. In this context, it has been a privilege to be close to the honorable buyers of various types from the highest level to the middle level in this sector of Bangladesh. I have tried to understand from this very little pathway almost the basic needs of this sector and I’m also aware of honorable customer pros and cons in Bangladesh .These include maximum protection at reasonable prices, highest quality products, smoothness in navigation, assurance of manufacturing and supplier commitment, assurance of after-sales commitment and problem solving on an urgent basis. Fulfilling these needs of our esteemed customers with utmost respect and firmness is the main goal of myself and our Company \"AllEdged Limited\".\r\n\r\n\r\n\r\nThis is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator &amp; Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nI have had the good fortune to work in Bangladesh with most of the world-famous elevator brands from the foundation level for the last one and a half decades, which is still going on. In this context, it has been a privilege to be close to the honorable buyers of various types from the highest level to the middle level in this sector of Bangladesh. I have tried to understand from this very little pathway almost the basic needs of this sector and I’m also aware of honorable customer pros and cons in Bangladesh .These include maximum protection at reasonable prices, highest quality products, smoothness in navigation, assurance of manufacturing and supplier commitment, assurance of after-sales commitment and problem solving on an urgent basis. Fulfilling these needs of our esteemed customers with utmost respect and firmness is the main goal of myself and our Company \"AllEdged Limited\".\r\n\r\nWe have a team of well-experienced staff to go for the better Service Delivery To you. We always consider the fact that the Safety should be utilize to the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product &amp; services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner &amp; maximum number of employees are Skilled &amp; experienced on world famous brand Elevators &amp; Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\r\n\r\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.</p><p><br></p><p>Above all, I seek your well-thought-out advice and overall cooperation. May Almighty Allah bless to all of us.<br><br>Thanking and assuring you alledged for better to ever…<br><br>Ln. Kamal Parvej<br>Managing Director<br>AllEdged Limited</p>', '<p><br></p>', 'we will undertake changes and innovations for a greater customer experience.', '<p style=\"margin-top:0in;text-align:justify\"><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:TargetScreenSize>800x600</o:TargetScreenSize>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><span style=\"font-size:11.5pt;\r\ncolor:#6D6E71\">This is my great pleasure to acquaint ourselves as one of<br>\r\nthe influential Elevator, Escalator &amp; Generator Importer, Supplier,\r\nInstaller and service provider from EU, Korean, and China world renown brands\r\naccording to the demand of clients in our domestic market. which is best\r\nquality, reliable, safe and smooth operation in Bangladesh market</span></p>', 'we will undertake changes and innovations for a greater customer experience.', '<!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:TargetScreenSize>800x600</o:TargetScreenSize>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:\"Times New Roman\",\"serif\";}\r\n</style>\r\n<![endif]-->\r\n\r\n<p style=\"margin-top:0in;text-align:justify\"><span style=\"font-size:11.5pt;\r\nfont-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:#6D6E71;background:#F7F7F7\">This is my\r\ngreat pleasure to acquaint ourselves as one of the influential Elevator,\r\nEscalator &amp; Generator Importer, Supplier, Installer and service provider\r\nfrom EU, Korean, and China world renown brands according to the demand of\r\nclients in our domestic market. which is best quality, reliable, safe and\r\nsmooth operation in Bangladesh market.</span><span style=\"font-size:11.5pt;\r\ncolor:#6D6E71\"></span></p>', 'we will undertake changes and innovations for a greater customer experience.', '<!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:TargetScreenSize>800x600</o:TargetScreenSize>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:\"Times New Roman\",\"serif\";}\r\n</style>\r\n<![endif]-->\r\n\r\n<p style=\"margin-top:0in;text-align:justify\"><span style=\"font-size:11.5pt;\r\ncolor:#6D6E71\">This is my great pleasure to acquaint ourselves as one of the\r\ninfluential Elevator, Escalator &amp; Generator Importer, Supplier, Installer\r\nand service provider from EU, Korean, and China world renown brands according\r\nto the demand of clients in our domestic market. which is best quality,\r\nreliable, safe and smooth operation in Bangladesh market</span></p>', 'public/uploads/greeting/921190520_1642437990.jpeg', '2022-01-26 16:14:09', '2021-06-22 17:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `i_t_services`
--

CREATE TABLE `i_t_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_t_services`
--

INSERT INTO `i_t_services` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Japan Garden City, Dhaka, Bangladesh', 'public/uploads/it_services_image/2063793725_1642439275.jpeg', 'Japan Garden City, Dhaka, Bangladesh', '2021-06-29 17:12:03', '2022-01-17 17:07:55'),
(7, 'Jamuna Future Park, Dhaka, Bangladesh', 'public/uploads/it_services_image/1485492914_1642439372.jpeg', 'Jamuna Future Park, Dhaka, Bangladesh', '2021-07-16 05:36:47', '2022-01-17 17:09:32'),
(8, 'Nadi Airport, Fiji', 'public/uploads/it_services_image/1528131177_1642440062.jpeg', 'Nadi Airport, Fiji', '2021-07-16 05:37:39', '2022-01-17 17:21:17'),
(9, 'Iran Furniture Market, Tehran, Iran', 'public/uploads/it_services_image/1096811159_1642439443.jpeg', 'Iran Furniture Market, Tehran, Iran', '2021-07-16 05:37:59', '2022-01-17 17:10:43'),
(10, 'Shenyang Metro, China', 'public/uploads/it_services_image/47324415_1642439947.jpeg', 'Shenyang Metro, China', '2021-07-16 05:38:24', '2022-01-17 17:19:07'),
(11, 'Heathrow Airport, London, UK', 'public/uploads/it_services_image/1363976490_1642439878.jpeg', 'Heathrow Airport, London, UK', '2021-07-16 05:40:55', '2022-01-17 17:17:58'),
(13, 'The State Hermitage Museum, St. Petersburg, Russia', 'public/uploads/it_services_image/1730246944_1645551183.jpeg', 'The State Hermitage Museum, St. Petersburg, Russia', '2022-02-22 17:33:03', '2022-02-22 17:33:42'),
(14, 'Ferrari Headquarter, Maranello, Italy', 'public/uploads/it_services_image/151160823_1645551284.jpeg', 'Ferrari headquarter,Maranello,italy', '2022-02-22 17:34:44', '2022-02-22 17:34:44'),
(15, 'The British Museum in London', 'public/uploads/it_services_image/248522894_1645551360.jpeg', 'the British Museum in London', '2022-02-22 17:36:00', '2022-02-22 17:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `outer_link` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `heading` longtext DEFAULT NULL,
  `h_title` varchar(255) DEFAULT NULL,
  `background_image` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `outer_link`, `parent`, `heading`, `h_title`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', NULL, NULL, 'Who formalized for worship to honorable customers by the excellence products and service. With lot of projects under our sphere, we can proudly say that we are one of the most trusted&significantcompany in Bangladesh.', NULL, 'public/uploads/menu_background_image/2032916297_1626373068.jpeg', '2021-06-15 18:26:48', '2021-07-16 06:14:43'),
(2, 'Business', 'business', NULL, NULL, NULL, NULL, NULL, '2021-06-15 18:27:12', '2021-06-30 17:28:30'),
(3, 'Products', 'products', NULL, NULL, 'test Hyundai Elevator has succeeded in developing the world\'s fastest speed 21m/s elevator in March 2020 with its independent high-speed technology. It will continue on leading the world best high-speed technology after the nation’s fastest elevator 18m/s elevator developed in 2009.', 'BLT', 'public/uploads/menu_background_image/1515058733_1636168877.jpeg', '2021-06-15 18:27:38', '2021-12-16 14:41:34'),
(4, 'Services', 'services', NULL, NULL, NULL, NULL, NULL, '2021-06-15 18:27:57', '2021-06-15 18:27:57'),
(5, 'Customer', 'customer', NULL, NULL, NULL, NULL, 'public/uploads/menu_background_image/730314251_1626627205.jpeg', '2021-06-15 18:28:18', '2021-07-18 16:53:25'),
(6, 'Achievement', 'achievement', NULL, NULL, NULL, NULL, 'public/uploads/menu_background_image/1234267783_1626545616.jpeg', '2021-06-15 18:29:41', '2021-07-18 16:34:21'),
(7, 'Career', 'career', NULL, NULL, 'Who formalized for worship to honorable customers by the excellence products and service.', NULL, 'public/uploads/menu_background_image/1367804635_1626373120.jpeg', '2021-06-15 18:30:10', '2021-07-15 18:18:40'),
(8, 'Contact Us', 'contact-us', NULL, NULL, NULL, NULL, 'public/uploads/menu_background_image/527810507_1627494962.jpeg', '2021-06-15 18:30:24', '2021-07-28 17:56:02'),
(9, 'Business Category', 'business-category', NULL, 2, NULL, NULL, 'public/uploads/menu_background_image/1380970303_1626450501.jpeg', '2021-06-15 18:45:31', '2021-07-16 15:52:18'),
(10, 'Technology', 'technology', NULL, 9, NULL, NULL, 'public/uploads/menu_background_image/682667781_1627491069.jpeg', '2021-06-15 18:50:04', '2021-07-28 16:51:09'),
(11, 'Associate Concern', 'associate-concern', NULL, 2, NULL, NULL, 'public/uploads/menu_background_image/1237847953_1626543715.jpeg', '2021-06-16 17:08:49', '2021-07-17 17:41:55'),
(12, 'Company Overview', 'company-overview', NULL, 1, 'Who formalized for worship to honorable customers by the excellence products and service. With lot of projects under our sphere, we can proudly say that we are one of the most trusted&significantcompany in Bangladesh.', NULL, 'public/uploads/menu_background_image/1397449876_1626416189.jpeg', '2021-06-18 10:47:01', '2021-07-16 06:16:29'),
(13, 'Greetings', 'greetings', NULL, 1, 'Safety for our everyday life', NULL, 'public/uploads/menu_background_image/1266078659_1626416368.jpeg', '2021-06-18 10:49:15', '2021-07-16 06:19:28'),
(14, 'Our Management', 'our-management', NULL, 1, NULL, NULL, 'public/uploads/menu_background_image/135254357_1626626827.jpeg', '2021-06-18 10:50:05', '2021-07-18 16:47:07'),
(15, 'Gallery', 'gallery', NULL, 1, NULL, NULL, 'public/uploads/menu_background_image/2071670099_1626627046.jpeg', '2021-06-18 10:51:46', '2021-07-18 16:50:46'),
(16, 'Installation', 'installation', NULL, 4, NULL, NULL, 'public/uploads/menu_background_image/98107627_1626545148.jpeg', '2021-06-23 16:46:35', '2021-07-28 16:56:27'),
(17, 'Maintenance', 'maintenance', NULL, 4, NULL, NULL, 'public/uploads/menu_background_image/1289250512_1626545212.jpeg', '2021-06-23 16:46:56', '2021-07-17 18:22:42'),
(20, 'Servicing', 'servicing', NULL, 4, 'Our Services', NULL, 'public/uploads/menu_background_image/144099076_1626627109.jpeg', '2021-06-30 18:27:47', '2021-07-18 16:51:49'),
(23, 'Construction', 'construction', NULL, 9, 'Construction Services', NULL, 'public/uploads/menu_background_image/2130282530_1627490755.jpeg', '2021-07-16 19:13:30', '2021-07-28 16:45:55'),
(24, 'Assembling', 'assembling', NULL, 4, 'Assembling Services', NULL, 'public/uploads/menu_background_image/1881892711_1627836521.jpeg', '2021-08-01 16:48:41', '2021-08-01 16:53:16'),
(25, 'Modernization', 'modernization', NULL, 4, 'Modernization', NULL, 'public/uploads/menu_background_image/409612708_1627836976.jpeg', '2021-08-01 16:56:16', '2021-08-01 16:56:16'),
(26, 'Spare Parts', 'spare-parts', NULL, 4, 'Spare Parts', NULL, 'public/uploads/menu_background_image/455661232_1627837015.jpeg', '2021-08-01 16:56:55', '2021-08-01 16:56:55'),
(29, 'Elevator', 'elevator', '/elevator', 3, NULL, NULL, NULL, '2021-10-24 13:58:10', '2021-10-24 14:12:26'),
(30, 'Passenger Elevator', 'passenger-elevator', '/passenger-elevator', 29, NULL, NULL, NULL, '2021-10-24 14:15:24', '2021-10-24 14:15:24'),
(31, 'BLT', 'blt', '/blt', 30, NULL, NULL, NULL, '2021-10-24 14:16:39', '2021-10-24 14:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_contents`
--

CREATE TABLE `menu_contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `footer` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_contents`
--

INSERT INTO `menu_contents` (`id`, `menu_id`, `title`, `description`, `footer`, `created_at`, `updated_at`) VALUES
(1, 9, 'Commodo alterum commune in nec, et facilisis deterruisset mel. Feugiat interesset nec cu, no vix liber officiis mediocrem, utinam molestiae his an.', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\n\nI have had the good fortune to work in Bangladesh with most of the world-famous elevator brands from the foundation level for the last one and a half decades, which is still going on. In this context, it has been a privilege to be close to the honorable buyers of various types from the highest level to the middle level in this sector of Bangladesh. I have tried to understand from this very little pathway almost the basic needs of this sector and I’m also aware of honorable customer pros and cons in Bangladesh .These include maximum protection at reasonable prices, highest quality products, smoothness in navigation, assurance of manufacturing and supplier commitment, assurance of after-sales commitment and problem solving on an urgent basis. Fulfilling these needs of our esteemed customers with utmost respect and firmness is the main goal of myself and our Company \"AllEdged Limited\".', 'We have a team of well-experienced staff to go for the better Service Delivery To you. We always consider the fact that the Safety should be utilize to the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product & services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\n\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.', '2021-06-22 18:22:41', '2021-07-16 16:03:26'),
(2, 11, 'Commodo alterum commune in nec, et facilisis deterruisset mel. Feugiat interesset nec cu, no vix liber officiis mediocrem, utinam molestiae his an.', 'the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product & services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\r\n\r\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.', 'the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product & services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\r\n\r\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.', '2021-06-30 17:24:43', '2021-07-17 17:42:34'),
(7, 10, 'Technology Services', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nI have had the good fortune to work in Bangladesh with most of the world-famous elevator brands from the foundation level for the last one and a half decades, which is still going on. In this context, it has been a privilege to be close to the honorable buyers of various types from the highest level to the middle level in this sector of Bangladesh. I have tried to understand from this very little pathway almost the basic needs of this sector and I’m also aware of honorable customer pros and cons in Bangladesh .These include maximum protection at reasonable prices, highest quality products, smoothness in navigation, assurance of manufacturing and supplier commitment, assurance of after-sales commitment and problem solving on an urgent basis. Fulfilling these needs of our esteemed customers with utmost respect and firmness is the main goal of myself and our Company \"AllEdged Limited\".', 'We have a team of well-experienced staff to go for the better Service Delivery To you. We always consider the fact that the Safety should be utilize to the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product & services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\r\n\r\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.', '2021-07-16 16:34:54', '2021-07-17 17:32:33'),
(8, 23, 'Construction Services', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', 'the maximum extent for the betterment of the world. Hence, our priority is always to bridge up the opportunities and the safety measure to our product & services. To be more precise, we undertake the responsibility to provide the right service. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company\r\n\r\nWe know that meeting your needs depends on fulfilling my and our dreams. We must be uncompromising in terms of product quality and commitment. We will not sever the eternal relationship with the honorable customers for the sake of small profits. So, verify our goal by giving us the opportunity to place our product on at least one project of your dreams in order to get the product you need and fulfill our dream.', '2021-07-17 17:39:27', '2021-07-17 17:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `email_address`, `subject`, `message`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MH Masud', 'admin@admin.com', 'fasdf', 'fasd', NULL, 'unread', '2021-06-25 15:49:20', '2021-06-25 15:49:20'),
(2, 'dasdad', 'dasda@gmail.com', 'adadad', 'dada', NULL, 'unread', '2021-11-02 10:36:04', '2021-11-02 10:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_01_070121_create_permission_tables', 2),
(5, '2021_02_02_074004_create_company_settings_table', 3),
(6, '2021_02_03_111230_create_social_links_table', 4),
(7, '2021_02_04_061012_create_s_m_t_p_s_table', 5),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `msws`
--

CREATE TABLE `msws` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msws`
--

INSERT INTO `msws` (`id`, `title`, `des`, `img`, `brand_id`, `created_at`, `updated_at`) VALUES
(3, 'BLT', 'Hyundai Elevator has succeeded in developing the world\'s fastestHyundai Elevator has succeeded in developing the world\'s 22<br>', 'public/uploads/services_content_image/1263600199_1635783797.jpeg', 16, '2021-11-01 10:18:43', '2021-11-07 11:09:58'),
(6, 'BLT-QS passenger elevator', 'The BLT-QS passenger elevator adopts gearless permanent magnet synchronous traction machine with neat and compact decoration. The machine room area is largely reduced compared with conventional machine room.', 'public/uploads/services_content_image/1530803802_1636304850.jpeg', 30, '2021-11-07 11:05:45', '2021-12-17 10:51:45'),
(7, 'Canny', 'kk Hyundai Elevator has succeeded in developing the world\'s fastestHyundai Elevator has succeeded in developing the world\'s', 'public/uploads/services_content_image/1764468169_1636305075.jpeg', 15, '2021-11-07 11:11:15', '2021-12-16 07:47:22'),
(9, 'BLT- Bed/Hospital  Elevator', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine, and meets the usage requirement of special environment in hospital to the greatest extent during designing.', 'public/uploads/services_content_image/1793269665_1640446718.jpeg', 31, '2021-12-25 09:00:55', '2021-12-25 09:38:38'),
(10, 'Freight Elevator', 'BLT-FS Series of Freight Elevator is neat and simple, and it\'s widely used in supermarket, shopping mall, factory and other places. A neoprene damping method is adopted between the steel beam and machine base,', 'public/uploads/services_content_image/457139674_1640449465.jpeg', 32, '2021-12-25 10:09:15', '2021-12-25 10:24:25'),
(11, 'Maspero Elevator', 'Maspero Elevatori is an undisputed leader in designing, \r\nmanufacturing and servicing elevators. Our products are made in Italy \r\nand custom-made for every use, from the private lift to the public \r\nelevator', 'public/uploads/services_content_image/208893216_1645810389.jpeg', 33, '2022-02-25 11:33:09', '2022-02-25 11:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `m_d_messages`
--

CREATE TABLE `m_d_messages` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_d_messages`
--

INSERT INTO `m_d_messages` (`id`, `menu_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(3, 16, 'Installation Services', 'public/uploads/services_content_image_list/893129253_1631618791.jpeg', '2021-06-23 17:22:58', '2021-09-14 11:26:31'),
(5, 16, 'Installation', 'public/uploads/services_content_image_list/1013563001_1626546256.jpeg', '2021-06-30 18:14:21', '2021-07-17 18:24:16'),
(6, 16, 'Installation', 'public/uploads/services_content_image_list/138131976_1631618820.jpeg', '2021-06-30 18:14:56', '2021-09-14 11:27:00'),
(9, 17, 'Maintenance', 'public/uploads/services_content_image_list/1289182179_1626545264.jpeg', '2021-06-30 18:22:49', '2021-07-17 18:07:44'),
(10, 20, 'Our Servicings', 'public/uploads/services_content_image_list/1932081248_1626372154.jpeg', '2021-06-30 18:29:29', '2021-07-15 18:02:34'),
(11, 17, 'df', 'public/uploads/services_content_image_list/560044046_1626545414.jpeg', '2021-07-17 18:10:14', '2021-07-17 18:10:14'),
(12, 25, 'Modernization', 'public/uploads/services_content_image_list/771697701_1627837172.jpeg', '2021-08-01 16:59:32', '2021-08-01 17:00:12'),
(13, 26, 'Spare Parts Services', 'public/uploads/services_content_image_list/992942334_1627837380.jpeg', '2021-08-01 17:03:00', '2021-08-01 17:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `office_hours`
--

CREATE TABLE `office_hours` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_hours`
--

INSERT INTO `office_hours` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h2 class=\"mb-4\" style=\"font-family: roboto; line-height: 1.2; color: rgb(51, 51, 51); font-size: 28px; letter-spacing: normal; text-transform: uppercase !important;\">WHAT IS A CAREER?</h2><p><span style=\"font-weight: bolder; color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\">Career-Related Questions and Answers</span><span style=\"color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\"></span></p><p style=\"font-size: 15px; line-height: 1.75; color: rgb(109, 110, 113); text-align: justify; font-family: Poppins, sans-serif; letter-spacing: normal;\">We are pleased to acquaint with “AllEdged Limited” is one of the most influential Elevator &amp; Escalator Importer, Supplier, Installer and service provider in Bangladesh. Now, we have been awarded with the Authorized S. Distributorship (with STL) of Canny China Origin and So on Brand Elevators &amp; Escalators in Bangladesh. We also supply high quality AVS, Steel Structure &amp; Hoist Beam for Elevator. We import Generator like Perkins, Cummins, Stamford &amp; Ricardo Brand UK &amp; China Origin. We also supply Heavy Construction Equipment. Our other businesses are on process…</p><p><span style=\"font-weight: bolder; color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\">What does the word \"career\" mean?</span><span style=\"color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\"></span></p><p style=\"font-size: 15px; line-height: 1.75; color: rgb(109, 110, 113); text-align: justify; font-family: Poppins, sans-serif; letter-spacing: normal;\">Our Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality &amp; Commitment. Our company’s Owner &amp; maximum number of employees are Skilled &amp; experienced on world famous brand Elevators &amp; Escalators those are working</p><p><span style=\"font-weight: bolder; color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\">What is career decision making?</span><span style=\"color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\"></span></p><p style=\"font-size: 15px; line-height: 1.75; color: rgb(109, 110, 113); text-align: justify; font-family: Poppins, sans-serif; letter-spacing: normal;\">Our Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality &amp; Commitment. Our company’s Owner &amp; maximum number of employees are Skilled &amp; experienced on world famous brand Elevators &amp; Escalators those are working</p><p><span style=\"font-weight: bolder; color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\">Is career development different for an older adult than for a younger person?</span><br style=\"color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\"></p><p style=\"font-size: 15px; line-height: 1.75; color: rgb(109, 110, 113); text-align: justify; font-family: Poppins, sans-serif; letter-spacing: normal;\">Our Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality &amp; Commitment. Our company’s Owner &amp; maximum number of employees are Skilled &amp; experienced on world famous brand Elevators &amp; Escalators those are working</p><p><span style=\"font-weight: bolder; color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\">What is career success?</span><span style=\"color: rgb(109, 110, 113); font-family: Poppins, sans-serif; font-size: 15px; letter-spacing: normal;\"></span></p><p style=\"font-size: 15px; line-height: 1.75; color: rgb(109, 110, 113); text-align: justify; font-family: Poppins, sans-serif; letter-spacing: normal;\">Our Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality &amp; Commitment. Our company’s Owner &amp; maximum number of employees are Skilled &amp; experienced on world famous brand Elevators &amp; Escalators those are working</p>', '2021-06-23 19:11:56', '2022-01-17 17:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2021-02-01 01:28:42', '2021-02-22 06:15:16'),
(2, 'user-edit', 'web', '2021-02-01 01:29:19', '2021-02-01 01:39:19'),
(4, 'user-show', 'web', '2021-02-01 05:53:12', '2021-02-01 05:53:12'),
(5, 'user-delete', 'web', '2021-02-01 05:53:27', '2021-02-01 05:53:27'),
(6, 'role-list', 'web', '2021-02-01 05:53:37', '2021-02-01 05:53:37'),
(7, 'role-show', 'web', '2021-02-01 05:53:48', '2021-02-01 05:53:48'),
(8, 'role-edit', 'web', '2021-02-01 05:54:01', '2021-02-01 05:54:01'),
(9, 'role-delete', 'web', '2021-02-01 05:54:10', '2021-02-01 05:54:10'),
(10, 'permission-list', 'web', '2021-02-01 05:54:31', '2021-02-01 05:54:31'),
(11, 'permission-show', 'web', '2021-02-01 05:54:40', '2021-02-01 05:54:40'),
(12, 'permission-edit', 'web', '2021-02-01 05:54:49', '2021-02-01 05:54:49'),
(13, 'permission-delete', 'web', '2021-02-01 05:54:57', '2021-02-01 05:54:57'),
(14, 'user-create', 'web', '2021-02-01 23:42:17', '2021-02-01 23:42:17'),
(15, 'role-create', 'web', '2021-02-01 23:42:32', '2021-02-01 23:42:32'),
(16, 'permission-create', 'web', '2021-02-01 23:42:45', '2021-02-01 23:42:45'),
(17, 'company-settings', 'web', '2021-03-24 03:28:35', '2021-03-24 03:35:06'),
(18, 'menu-settings', 'web', '2021-03-24 03:28:51', '2021-03-24 03:39:05'),
(19, 'sliders', 'web', '2021-03-24 03:29:02', '2021-03-24 03:41:42'),
(20, 'blog', 'web', '2021-03-24 03:29:13', '2021-03-24 03:32:00'),
(21, 'frontend-settings', 'web', '2021-03-24 03:29:36', '2021-03-24 03:34:25'),
(22, 'footer', 'web', '2021-03-24 03:29:49', '2021-03-24 03:36:56'),
(23, 'gallery-image', 'web', '2021-03-24 03:30:09', '2021-03-24 03:37:28'),
(24, 'seo-settings', 'web', '2021-03-24 03:30:34', '2021-03-24 03:40:56'),
(25, 'messages', 'web', '2021-03-24 03:30:48', '2021-03-24 03:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `pfs`
--

CREATE TABLE `pfs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pfs`
--

INSERT INTO `pfs` (`id`, `title`, `des`, `icon`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Motion Call Button', 'Hyundai Elevator has succeeded in developing the world\'s fastest', 'fas fa-arrow-circle-right 5x', NULL, '2021-11-01 11:51:17', '2021-11-01 11:51:17'),
(4, 'Motion Call Button', '<p>Hyundai Elevator has succeeded in developing the world\'s fastest</p>', 'fas fa-arrow-circle-right 5x', NULL, '2021-11-04 09:44:07', '2021-11-04 09:44:07'),
(5, 'Motion Call Button', '<p>Hyundai Elevator has succeeded in developing the world\'s fastest</p>', 'fas fa-arrow-circle-right 5x', NULL, '2021-11-04 09:44:25', '2021-11-04 09:44:25'),
(6, 'Motion Call Button', '<p>Hyundai Elevator has succeeded in developing the world\'s fastest</p>', 'fas fa-arrow-circle-right 5x', NULL, '2021-11-04 09:44:44', '2021-11-04 09:44:44'),
(7, 'Motion Call Button', '<p>Hyundai Elevator has succeeded in developing the world\'s fastest</p>', 'fas fa-arrow-circle-right 5x', NULL, '2021-11-04 09:45:13', '2021-11-04 09:45:13'),
(8, 'Motion Call Button test', '<p>Hyundai Elevator has succeeded in developing the world\'s fastest</p>', 'fas fa-arrow-circle-right 5x', 16, '2021-11-04 09:45:31', '2021-11-07 11:14:19'),
(12, 'Motion Call Button test', '<p>Motion Call Button test<br></p>', 'fas fa-arrow-circle-right 5x', 16, '2021-11-07 11:15:10', '2021-11-07 11:16:14'),
(13, 'Motion Call Button test', '<p>Motion Call Button test<br></p>', 'fas fa-arrow-circle-right 5x', 16, '2021-11-07 11:16:49', '2021-11-07 11:17:43'),
(14, 'Passenger Elevetor', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-11-07 11:18:30', '2021-12-17 10:45:59'),
(15, 'Passenger elevator', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-11-07 11:20:33', '2021-12-17 10:45:40'),
(16, 'Passenger Elevator', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-11-07 11:21:46', '2021-12-17 10:41:04'),
(18, 'Passenger elevator', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-12-17 10:42:57', '2021-12-17 10:44:08'),
(19, 'Passenger elevator', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-12-17 10:53:19', '2021-12-17 10:55:01'),
(20, 'Passenger elevator', 'Passenger elevator adopts gearless permanent magnet synchronous traction', 'fas fa-arrow-circle-right 5x', 30, '2021-12-17 10:53:43', '2021-12-17 10:55:21'),
(21, 'Bed Elevator', 'Bed elevator adopts mature control technology from BLT', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:09:40', '2021-12-25 09:10:49'),
(22, 'Bed/Hospital Elevator', 'Humanized car design with simple, bright and spacious decoration', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:12:08', '2021-12-25 09:12:45'),
(23, 'Friendly and pastel colors', 'friendly and pastel colors, clean and comfortable running space', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:13:39', '2021-12-25 09:14:14'),
(24, 'Modern Medical Environment Perfectly', 'All these combine with modern medical environment perfectly and harmoniously', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:15:35', '2021-12-25 09:16:13'),
(25, 'Build a space full of love and comfort for patients', 'build a space full of love and comfort for patients', 'fas fa-arrow-circle-right 5x', NULL, '2021-12-25 09:17:19', '2021-12-25 09:17:19'),
(26, 'Bed/Hospital  Elevator', 'Medical personnel to accomplish the sacred mission efficiently and quickly.', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:19:18', '2021-12-25 09:19:45'),
(27, 'Bed Elevator', 'Bed elevator adopts mature control technology from BLT', 'fas fa-arrow-circle-right 5x', 31, '2021-12-25 09:20:45', '2021-12-25 09:21:08'),
(28, 'Freight Elevator is neat and simple', 'BLT-FS Series of Freight Elevator is neat and simple, and it\'s widely used in supermarket', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:11:14', '2021-12-25 10:11:35'),
(29, 'A neoprene damping method is adopted', '. A neoprene damping method is adopted between the steel beam and machine base', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:12:33', '2021-12-25 10:13:48'),
(30, 'the vibration conducted to the car', 'which could reduce the vibration conducted to the car', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:13:27', '2021-12-25 10:13:59'),
(31, 'Good enough to delay its failure time', 'the antigen performance of neoprene is good enough to delay its failure time', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:15:02', '2021-12-25 10:15:14'),
(32, 'The traction machine', 'The traction machine adopts worm gear reduction drive, which could get a big drive ratio', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:16:20', '2021-12-25 10:16:36'),
(33, 'The worm is made of tin bronze material', 'The worm is made of tin bronze material, thus the drive owning the good characteristics of stability and low noise', 'fas fa-arrow-circle-right 5x', 32, '2021-12-25 10:17:24', '2021-12-25 10:17:39'),
(34, 'Maspero Elevator', 'Maspero Elevator is an undisputed leader in designing', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:36:14', '2022-02-25 11:37:27'),
(35, 'Stainless steel elevators', 'Panoramic glass &amp; stainless steel elevators - Maspero Elevatori', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:38:48', '2022-02-25 11:39:19'),
(36, 'Hydraulic Home Elevator', 'Mass Lift Stainless Steel Hydraulic Home Elevator', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:40:02', '2022-02-25 11:40:26'),
(37, 'Eataly in Milan', 'Escalators &amp; Lifts for Eataly in Milan', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:41:25', '2022-02-25 11:41:35'),
(38, 'Moving Escalators', 'Discovery Elevators Commercial Moving Escalators', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:42:05', '2022-02-25 11:42:23'),
(39, 'Electric Escalator', 'Electric Escalator Lift, Shopping Malls', 'fas fa-arrow-circle-right 5x', 33, '2022-02-25 11:43:13', '2022-02-25 11:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `image_text` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `image_text`, `image`, `created_at`, `updated_at`) VALUES
(5, 'paspero elevator', 'public/uploads/projects_image/1715148421_1643214004.jpeg', '2021-06-29 17:15:49', '2022-01-26 16:20:04'),
(7, 'BLT', 'public/uploads/projects_image/774175097_1642438489.jpeg', '2021-07-16 05:33:57', '2022-01-17 16:54:49'),
(9, 'perkins', 'public/uploads/projects_image/1118269675_1626413689.jpeg', '2021-07-16 05:34:49', '2021-07-16 05:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2021-02-01 02:42:54', '2021-03-24 03:44:49'),
(2, 'Editor', 'web', '2021-02-01 04:06:27', '2021-02-01 04:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to AllEdged Limited', 'We are pleased to acquaint with “AllEdged Limited” is one of the most influential Elevator & Escalator Importer, Supplier, Installer and service provider in Bangladesh. We Supply Elevator & Escalator of China, South Korea & EU Country Origin Brand in Bangladesh. Now, we have been awarded with the Authorized Distributorship in Bangladesh of the famous Italian Elevator Brand MASPERO Elevator & Escalator which have Manufacturing plant in Italy & Switzerland and Authorized Distributorship in Bangladesh of top 5 manufacturers Brand in china namely “BLT- (Brilliant Elevator)” from ShenYang Yuanda Intellectual Industry Group CO, Ltd. We supply 100% South Korean & others origin Brand Elevator & Escalator according to our competence & ethics. We also supply spare parts, high quality AVS, Steel Structure, Hoist Beam & AVR. We import Generator UK, China Origin Brand, serve combined contractor service, supply heavy construction & electromechanical equipment and so on... \r\n\r\n\r\nAllEdged Limited has started its journey with almost 20 years of experienced management. Our company’s Owner & maximum number of employees are Skilled & experienced on world famous brand Elevators & Escalators. Those are working together day and night to ensure the satisfaction of our honorable customers and to develop our company. They all are the nerve center of the Elevators & Escalators industry in Bangladesh.\r\nOur Company’s key subject that we will be established to our company with honesty and we won\'t compromise to a matter of Quality, Safety & Commitment. Our honesty, Commitment, Determination, Skilled & experienced man power, affordable price, quick After Sales & Services has established a longer relationship with honorable customers which is our main strength. So, we believe that we have a lot of capability to reach our glorious destination & will reach to our goal with our main strength. We AllEdged are ready to stay with our honorable customers twenty-four (24) hours day to day, year to year, decades to decades. For this reason, we are always dedicated to doing better day by day…', 'public/uploads/section_image/650574826_1626276203.jpeg', '2021-06-16 18:57:32', '2022-01-26 16:03:57'),
(2, 'OUR ONE AND ONLY PRIORITY IS THE CUSTOMER SATISFACTION', NULL, 'public/uploads/section_image/603578801_1626466022.jpeg', '2021-06-17 17:27:30', '2021-07-16 20:07:02'),
(3, 'OUR PRODUCTS', 'Our high quality products will give you maximum confidence, safety & Services.So check our porducts list, buy at affordable prices & get satisfaction...', NULL, '2021-06-17 17:30:40', '2021-06-17 17:30:40'),
(4, 'OUR ONE AND ONLY PRIORITY IS THE CUSTOMER SATISFACTION', NULL, 'public/uploads/section_image/1580644982_1626465983.jpeg', '2021-06-17 17:31:10', '2021-07-16 20:06:23'),
(5, 'OUR SERVICES', 'With clear solutions for increasingly complex infrastrusctures.\r\nWe define service by always putting our knowledge to our customers\' advantage', NULL, '2021-06-17 17:31:30', '2021-06-17 17:31:30'),
(6, 'Successfully Project', 'Our Brands Few International & Domestic Clientele.                     \r\n\r\nAchieving your highest satisfaction and trust is making our path to success easier.', NULL, '2021-06-17 17:32:46', '2022-01-26 16:35:41'),
(7, 'Speech of Our Honorable Customer', 'We believe you\'re our main driving force.\r\nYour well-planned advice, overall cooperation and sincere encouragement our glorious bright future.', NULL, '2021-06-17 17:33:07', '2021-06-17 17:33:07'),
(8, 'OUR BRAND', NULL, NULL, '2021-06-17 17:33:20', '2021-06-17 17:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `revisit_after` int(11) NOT NULL,
  `robots` varchar(255) NOT NULL,
  `google_bot` varchar(255) NOT NULL,
  `og_url` varchar(255) NOT NULL,
  `og_title` tinytext NOT NULL,
  `og_description` text NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `alternate` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SEO Settings';

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `author`, `title`, `description`, `keyword`, `revisit_after`, `robots`, `google_bot`, `og_url`, `og_title`, `og_description`, `canonical`, `alternate`, `created_at`, `updated_at`) VALUES
(1, 'HM Expo Private Limited', 'Well known and trusted company in Dhaka, Bangladesh - HM Expo Private Limited', 'Well known and trusted company in Dhaka, Bangladesh. HM Expo Private Ltd is a government approved Travel Agency. Our Travel license no is 0012396 & Import Export license no 260326111189620. We provide a good quality services to our clients with trust and honesty. We don\'t act fraudulent business. If you need visa processing, Import/Export, Web-Development, Software-Development, Tender, service therefore we can assist you. We provide service with a least cost. You can also get air tickets from us. Please verify us before taking our services.নিরাপদ অভিবাসনের শতভাগ নিশ্চয়তায় সরকার অনুমোদিত ট্রাভেলস এজেন্সি (লাইসেন্স নং: 0012396) এইচ এম এক্সপো প্রা: লি: দীর্ঘদিন ধরে বিশ্বস্ততার সাথে সৌদি ভিসার কাজ করে আসছে।আমরা অত্যন্ত দক্ষতার সাথে সৌদি আরব গমনেচ্ছুক বাংলাদেশী ভাইদের ও সৌদি আরবে অবস্থানরত প্রবাসী ভাইদের ভিসা প্রসেসিং করে থাকি। সৌদি আরবে হাউজ ড্রাইভিং ভিসা, আমেল মঞ্জিল ভিসা, জিয়ারা ভিসা, ক্লিনার ভিসা সহ সকল প্রকার কাজের ভিসা প্রসেসিং করি।আমরা সরাসরি সৌদি কর্তৃপক্ষের কাছ থেকে ভিসা সংগ্রহ করি, তাই ভিসা প্রসেসিংয়ের পর কোনো জটিলতা সৃষ্টি হয় না। তাছাড়া আমাদের কাছ থেকে সৌদি আরবের ভিসা প্রসেসিং করলে কোনো অগ্রিম টাকা নেওয়া হয় না।ভিসা প্রসেসিং সম্পূর্ণ শেষ হলে অনলাইনে চেক করে, ফিঙ্গার প্রিন্ট দিয়ে, ট্রেনিং শেষ করে, তারপর টাকা নেওয়া হয়। যা আপনার অর্থের শতভাগ নিরাপত্তা নিশ্চিত করে।বিদেশ গমনেচ্ছুক ভাইদের প্রতি দৃষ্টি আকর্ষণ: সৌদি আরবে আপনার কাঙ্ক্ষিত চাকরি ও সঠিক নিয়মে নিরাপদে ভিসা প্রসেসিং এর জন্য নির্ভরযোগ্য প্রতিষ্ঠান এইচ এম এক্সপো প্রা: লি: এর সহযোগিতা নিন।', 'Well known and trusted company in Dhaka, Bangladesh, travel agency, saudi visa, saudi visa processing, saudi visa bangladesh, visa processing system bd work visa, Import, Export, Tender, Software-Development, web design & development, import-export-license,software-development,air-tickets,taking,সৌদি ভিসা প্রসেসিং করে আমাদের মাধ্যমে সৌদি আরব গিয়ে যারা সফল হয়েছেন | Hasan Rubel | HM Expo Private,সৌদি ভিসা, সৌদি ভিসা চেক করার নিয়ম, সৌদি ভিসা কবে খুলবে, সৌদি ভিসার খবর, সৌদি ভিসা চেক, সৌদি ভিসা প্রসেসিং, সৌদি ভিসা স্ট্যাম্পিং, সৌদি ভিসার দাম কত, সৌদি ভিসা কত প্রকার, সৌদি ভিসা কবে চালু হবে, সৌদি ভিসা কি বন্ধ, সৌদি ভিসা ২০২১, সৌদি ভিসা কবে খুলবে ২০২১, সৌদি ভিসা প্রসেসিং, সৌদি ভিসা প্রসেসিং চেক, সৌদি ভিসা প্রসেসিং খরচ, সৌদি ভিসা প্রসেসিং খরচ ২০২১, সৌদি আরব ভিসা প্রসেসিং, সৌদি আরবের ভিসা প্রসেসিং, সৌদি ভিজিট ভিসা প্রসেসিং, সৌদি আরব ভিজিট ভিসা প্রসেসিং খরচ, সৌদি আরব হাউজ ড্রাইভার ভিসা প্রসেসিং, সৌদি আরব জিয়ারা ভিসা, সৌদি ভিসা প্রসেসিং, সৌদি আরবে ফ্যামিলি ভিসা, সৌদি আরব ভিসা প্রসেসিং খরচ, সৌদি আরব টুরিস্ট ভিসা, সৌদি আরব ভিসা ২০২০, সৌদি ভিজিট ভিসা প্রসেসিং, সৌদি আরব ভিসা কবে খুলবে, সৌদি কাজের ভিসা, সৌদি কাজের ভিসা ২০২১, সৌদি আরব কাজের ভিসা, সৌদি আরবে কাজের খবর, সৌদি আরব কাজের খবর, সৌদি আরবে কাজের ভিসা, সৌদি আরব কাজের ভিসা, সৌদি ভিসা প্রসেসিং কিভাবে করে, সৌদি ভিসা প্রসেসিং, saudi visa, saudi visa processing, জিয়ারা ভিসা সৌদি আরব, সৌদি ভিসা, আমেল মঞ্জিল ভিসা কি কাজ, আমেল আইডি ভিসা কি, সোদি নতুন ভিসা, সৌদি আরব, saudi arabia visa processing, সৌদি আরব ভিসা প্রসেসিং এজেন্সি, সৌদিতে কোন কাজের চাহিদা বেশি, সৌদি আরব যেতে কত বয়স লাগে, সৌদি আরবের আবাসিক হোটেলে কাজ, saudi arab visa, সৌদি আরবে কোন কাজের চাহিদা বেশি, saudi visa bangladesh, আমেল মঞ্জিল ভিসা কি, সৌদি আরব খবর, সৌদি আরব হাউজ ড্রাইভার ভিসা, সৌদি ড্রাইভিং ভিসা, visa processing system bd, ভিজিট ভিসা সৌদি আরব, সৌদি আরব ভিসা ওকালা, জিয়ারা ভিসা প্রসেসিং, আমেল মঞ্জিল ভিসা প্রসেসিং, সৌদি আরব কোম্পানি ভিসা, সোদি নতুন খবর আজকের, সৌদি আরবের ভিসার দাম এখন কত, সৌদি কাজের ভিসা, সৌদি নতুন ভিসা, সৌদি আরবে নতুন ভিসার খবর,', 2, 'index, follow', 'index, follow', 'https://www.hmexpoprivateltd.com', 'Well known and trusted company in Dhaka, Bangladesh | HM Expo Private Limited | Travel Agency & Working Visa & Tender & Import/Export  & Web Design & Development & Software Development at HM IT', 'Well known and trusted company in Dhaka, Bangladesh. HM Expo Private Limited is one of the most reliable organizations in Bangladesh. In this long nine years journey, we have been delivering services at your doorsteps, maintaining our good reputation and integrity. HM Expo Private Limited is a government-approved organization that has been awarded Certificates of Institutional Reputation. We provide every service in compliance with rules of procedure of the Government of the People\'s Republic of Bangladesh. Our organization offers various services which include significant import, export, working visa, software design, software development,  web design, web development HM Expo Private Limited is a versatile organization with a wide range of business services.নিরাপদ অভিবাসনের শতভাগ নিশ্চয়তায় সরকার অনুমোদিত ট্রাভেলস এজেন্সি (লাইসেন্স নং: 0012396) এইচ এম এক্সপো প্রা: লি: দীর্ঘদিন ধরে বিশ্বস্ততার সাথে সৌদি ভিসার কাজ করে আসছে।আমরা অত্যন্ত দক্ষতার সাথে সৌদি আরব গমনেচ্ছুক বাংলাদেশী ভাইদের ও সৌদি আরবে অবস্থানরত প্রবাসী ভাইদের ভিসা প্রসেসিং করে থাকি। সৌদি আরবে হাউজ ড্রাইভিং ভিসা, আমেল মঞ্জিল ভিসা, জিয়ারা ভিসা, ক্লিনার ভিসা সহ সকল প্রকার কাজের ভিসা প্রসেসিং করি।আমরা সরাসরি সৌদি কর্তৃপক্ষের কাছ থেকে ভিসা সংগ্রহ করি, তাই ভিসা প্রসেসিংয়ের পর কোনো জটিলতা সৃষ্টি হয় না। তাছাড়া আমাদের কাছ থেকে সৌদি আরবের ভিসা প্রসেসিং করলে কোনো অগ্রিম টাকা নেওয়া হয় না।ভিসা প্রসেসিং সম্পূর্ণ শেষ হলে অনলাইনে চেক করে, ফিঙ্গার প্রিন্ট দিয়ে, ট্রেনিং শেষ করে, তারপর টাকা নেওয়া হয়। যা আপনার অর্থের শতভাগ নিরাপত্তা নিশ্চিত করে।বিদেশ গমনেচ্ছুক ভাইদের প্রতি দৃষ্টি আকর্ষণ: সৌদি আরবে আপনার কাঙ্ক্ষিত চাকরি ও সঠিক নিয়মে নিরাপদে ভিসা প্রসেসিং এর জন্য নির্ভরযোগ্য প্রতিষ্ঠান এইচ এম এক্সপো প্রা: লি: এর সহযোগিতা নিন।', 'https://hmexpoprivateltd.com', 'https://hmexposoft.com', '2021-03-24 06:54:04', '2021-06-03 05:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `icon` text DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Installation', 'public/uploads/services_image/1927252768_1626412675.jpeg', 'public/uploads/services_icon/2121732826_1626412675.jpeg', 'We have experience in installing a wide range of equipment brands and understand the differences', '2021-06-17 18:32:14', '2021-07-16 05:17:55'),
(5, 'Maintenance:', 'public/uploads/services_image/1647047988_1626371486.jpeg', 'public/uploads/services_icon/289905216_1626412724.jpeg', 'When it comes to maintaining products, we have considerable experience and a national infrastructure', '2021-07-15 17:51:26', '2021-07-16 05:18:44'),
(6, 'Servicing', 'public/uploads/services_image/110909486_1626412767.jpeg', 'public/uploads/services_icon/712966499_1626412767.jpeg', 'Looking for a Servicing for your products? We are knocking your door to give you top class Servicing of your products', '2021-07-16 05:19:27', '2021-07-16 05:19:27'),
(7, 'Assembling:', 'public/uploads/services_image/1163497857_1626412845.jpeg', 'public/uploads/services_icon/1744953739_1626412845.jpeg', 'For product assembly our team works closely with clients to ensure a final product that meets their exact needs. Backed by skilled technicians and top-of-the-line equipment, we’ll assemble your product with the utmost attention to detail.', '2021-07-16 05:20:45', '2021-07-16 05:20:45'),
(8, 'Modernization', 'public/uploads/services_image/288728551_1626412905.jpeg', 'public/uploads/services_icon/1756732429_1626412905.jpeg', 'AEL have highly experienced professionals who provided the heavy electrical products Modernization that will Contribute our clients to end their projects successfully', '2021-07-16 05:21:45', '2021-07-16 05:21:45'),
(9, 'Spare Parts', 'public/uploads/services_image/64997145_1626412940.jpeg', 'public/uploads/services_icon/126118581_1626412940.jpeg', 'We are pride in delivering genuine and OEM manufactured spare parts.', '2021-07-16 05:22:20', '2021-07-16 05:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image_text` varchar(255) DEFAULT NULL,
  `image_text_2` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `icon_image` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_text`, `image_text_2`, `image`, `icon_image`, `created_at`, `updated_at`) VALUES
(10, 'We are determined', 'to working together to make cities the best places to ever.', 'public/uploads/slider_image/727656519_1626276085.jpeg', 'public/uploads/slider_icon_image/1034257983_1627320118.jpeg', '2021-07-14 15:21:25', '2021-07-26 17:21:58'),
(11, 'We ascertained high quality products', 'high quality products for honorable buyers.', 'public/uploads/slider_image/469704849_1626365872.jpeg', 'public/uploads/slider_icon_image/2065561839_1627319836.jpeg', '2021-07-15 16:17:52', '2021-07-26 17:17:16'),
(12, 'The elevator is a sensitive', 'communication system and therefore your elevator standard way of moving most priority to us.', 'public/uploads/slider_image/1275365100_1626365975.jpeg', 'public/uploads/slider_icon_image/2123842435_1627319959.jpeg', '2021-07-15 16:19:35', '2021-07-26 17:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `slider_contents`
--

CREATE TABLE `slider_contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_contents`
--

INSERT INTO `slider_contents` (`id`, `menu_id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(33, 16, 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', 'public/uploads/services_content_image/530521046_1631618715.jpeg', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nThis is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2021-06-23 17:01:02', '2021-09-14 11:25:15'),
(34, 17, 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', 'public/uploads/services_content_image/1120690152_1626545369.jpeg', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nThis is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2021-06-30 18:20:17', '2021-07-17 18:09:29'),
(35, 20, 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', 'public/uploads/services_content_image/1148360673_1626545089.jpeg', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.\r\n\r\nThis is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2021-06-30 18:30:32', '2021-07-17 18:05:00'),
(36, 24, 'Assembling serviceis', 'public/uploads/services_content_image/1051056291_1627836896.jpeg', 'This is my great pleasure to acquaint ourselves as one of the influential Elevator, market. which is best quality, reliable, safe and smooth operation in Bangladesh market. This is my great pleasure to acquaint ourselves as one of the influential Elevator, Escalator & Generator Importer, Supplier, Installer and service provider from EU, Korean, and China world renown brands according to the demand of clients in our domestic market. which is best quality, reliable, safe and smooth operation in Bangladesh market.', '2021-08-01 16:54:56', '2021-08-01 16:54:56'),
(37, 25, 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', 'public/uploads/services_content_image/641749081_1627837142.jpeg', 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', '2021-08-01 16:59:02', '2021-08-01 17:01:27'),
(38, 26, 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', 'public/uploads/services_content_image/95625290_1631619320.jpeg', 'Our Maintenance Contracts are meticulously designed towards minimizing operational costs and downtime for your equipment.', '2021-08-01 17:02:23', '2021-09-14 11:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `product_category` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_des` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `product_category`, `name`, `page_title`, `page_des`, `created_at`, `updated_at`) VALUES
(15, 11, 'Canny', 'Canny', 'o', '2021-07-17 17:53:46', '2021-12-17 12:50:48'),
(18, 16, 'Perkins Brand', NULL, NULL, '2021-08-01 17:35:32', '2021-08-01 17:41:57'),
(19, 16, 'Cummins Brand', NULL, NULL, '2021-08-01 17:46:26', '2021-08-01 17:49:19'),
(20, 16, 'Stamford Generator', NULL, NULL, '2021-08-01 17:57:59', '2021-08-01 17:57:59'),
(21, 16, 'Ricardo Diesel Generator', NULL, NULL, '2021-08-01 18:05:00', '2021-08-01 18:06:36'),
(30, 12, 'BLT', 'Passenger Elevator', 'The BLT-QS passenger elevator adopts gearless permanent magnet synchronous traction machine with neat and compact decoration. The machine room area is largely reduced compared with conventional machine room. It is the new type energy-saving and environmental friendly product designed mainly for high-rank apartment, office building and other places. Traction and energy conservation system is upgraded again—energy feedback system: It is energy conservation and environmental friendly; extending the service life of components; saving input on machine room heat-dissipation devices. Through high-performance EMI filter, the interference caused by renewable energy on other devices in the electric net is avoided', '2021-12-17 15:38:55', '2021-12-17 15:38:55'),
(31, 13, 'BLT', 'BLT- Bed/Hospital  Elevator', 'Bed elevator adopts mature control technology from BLT, applies the self-developed permanent magnet synchronous gearless traction machine, and meets the usage requirement of special environment in hospital to the greatest extent during designing.', '2021-12-25 14:36:40', '2021-12-25 14:49:30'),
(32, 14, 'BLT', 'Freight/Cargo Elevator', 'BLT-FS Series of Freight Elevator is neat and simple, and it\'s widely used in supermarket, shopping mall, factory and other places. A neoprene damping method is adopted between the steel beam and machine base, which could reduce the vibration conducted to the car.', '2021-12-25 15:54:51', '2021-12-25 16:07:11'),
(33, 12, 'Maspero', 'Maspero Elevator', 'Maspero Elevatori is an undisputed leader in designing, manufacturing and servicing elevators. Our products are made in Italy and custom-made for every use, from the private lift to the public elevator, up to special plants for the industrial sector, freight and electric elevators, moving escalators and walkways. Today the Company serves the whole world through subsidiaries and partnerships. The production, entirely made in Italy, is based in Appiano Gentile, near the lake of Como, in northern Italy.', '2022-02-25 17:18:44', '2022-02-25 17:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `strengths`
--

CREATE TABLE `strengths` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strengths`
--

INSERT INTO `strengths` (`id`, `name`, `designation`, `image`, `description`, `created_at`, `updated_at`) VALUES
(8, 'Ln.M .K Parvej', 'Managing Director  & CEO', 'public/uploads/strengths_image/571523006_1639753985.jpeg', 'CEO', '2021-06-29 18:00:30', '2021-12-17 15:13:05'),
(9, 'Mst. .  Nasrin Akter (Neela)', 'Director', 'public/uploads/strengths_image/419914934_1639753847.jpeg', 'Director', '2021-06-29 18:00:46', '2021-12-17 15:10:47'),
(11, 'Ln.M .K Parvej', 'Managing Director  & CEO', 'public/uploads/strengths_image/632703447_1639754098.jpeg', 'Managing Director', '2021-07-15 16:22:03', '2021-12-17 15:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor', 'public/uploads/achievement/1011312427_1626545704.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-23 18:49:52', '2021-07-17 18:15:15'),
(3, 'Lorem ipsum dolor.', 'public/uploads/achievement/347933824_1626545686.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-30 18:40:26', '2021-07-17 18:14:46'),
(4, 'Lorem ipsum dolor', 'public/uploads/achievement/942710381_1626545668.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-30 18:40:54', '2021-07-17 18:14:28'),
(5, 'Lorem ipsum dolor', 'public/uploads/achievement/1041755803_1626545652.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-30 18:41:28', '2021-07-17 18:14:12'),
(6, 'Lorem ipsum dolor', 'public/uploads/achievement/1569109564_1626372659.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-30 18:42:06', '2021-07-15 18:10:59'),
(7, 'Lorem ipsum dolor', 'public/uploads/achievement/575323552_1626545732.jpeg', 'I like calm places and you know it’s hard to find such in modern cities. However, this photo features one of the most inhabited cities, while being pretty quiet and calm.', '2021-06-30 18:42:42', '2021-07-17 18:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Super Admin', '+8801737342492', 'admin@gmail.com', NULL, '$2y$10$YX.ZM6VoLabmFBGIg93B..E9Kw2AKdcAj/5irjw2.Y2cOHaqt9v0K', 'MdqVgloOmN6dhdLbfK2RCmvB706UqdGEow4TTpMrqmUEK5CPhqGXQX7CNnHE', '2021-02-01 00:42:34', '2021-06-29 10:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `web_designs`
--

CREATE TABLE `web_designs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_designs`
--

INSERT INTO `web_designs` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(9, 'Customer', 'public/uploads/customer/287392227_1626372605.jpeg', 'Our Maintenance Contracts are meticulously', '2021-06-23 18:33:25', '2021-07-15 18:10:05'),
(10, 'Customer', 'public/uploads/customer/1376758066_1626372588.jpeg', 'Our Maintenance Contracts are meticulously designed towards', '2021-06-23 18:48:20', '2021-07-15 18:09:48'),
(11, 'Customer 3', 'public/uploads/customer/124542638_1626372565.jpeg', 'Our Maintenance Contracts are meticulously designed towards minimizing', '2021-06-30 18:36:29', '2021-07-15 18:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `we_bests`
--

CREATE TABLE `we_bests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `we_bests`
--

INSERT INTO `we_bests` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Elevator', 'Elevator', 'public/uploads/we_best_image/181734309_1626412518.jpeg', '2021-06-29 17:01:43', '2021-07-16 05:15:18'),
(5, 'Escalator', 'Escalator', 'public/uploads/we_best_image/1947326375_1626412552.jpeg', '2021-07-16 05:15:52', '2021-07-16 05:15:52'),
(6, 'Car Parking System', 'Car Parking System', 'public/uploads/we_best_image/1663800674_1626412583.jpeg', '2021-07-16 05:16:23', '2021-07-16 05:16:23'),
(7, 'Generator', 'Generator', 'public/uploads/we_best_image/1630111853_1626412611.jpeg', '2021-07-16 05:16:51', '2021-07-16 05:16:51'),
(8, 'construction equipment', 'construction equipment', 'public/uploads/we_best_image/1727533029_1632066838.jpeg', '2021-09-19 15:53:25', '2021-09-19 15:53:58'),
(9, 'Others', 'Others', 'public/uploads/we_best_image/532464105_1632066916.jpeg', '2021-09-19 15:54:44', '2021-09-19 15:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_video`
--

CREATE TABLE `youtube_video` (
  `id` bigint(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youtube_video`
--

INSERT INTO `youtube_video` (`id`, `title`, `video_link`, `brand_id`, `created_at`, `updated_at`) VALUES
(6, 'Passenger Elevator', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ltLhVhFCIq0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 30, '2021-11-07 10:54:36', '2022-01-26 10:11:33'),
(7, 'Passenger Elevator', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ltLhVhFCIq0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 32, '2021-11-07 11:01:23', '2022-01-26 10:09:29'),
(10, 'Bed elevator adopts mature control technology from BLT', 'https://www.youtube.com/watch?fbclid=IwAR2YWNwiCPTbnrYwr6-yDtemsXCd-kUbkrEpX662y-R4PZPl6rzFUB2Gbgk&v=ltLhVhFCIq0&feature=youtu.be', 31, '2021-12-25 09:33:07', '2022-01-26 10:07:08'),
(11, 'Bed/Hospital  Elevator', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Y9scXQ8LbQg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 31, '2021-12-25 09:45:44', '2021-12-25 09:46:32'),
(12, 'Freight/Cargo Elevator', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Y9scXQ8LbQg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 32, '2021-12-25 10:28:15', '2021-12-25 10:28:41'),
(13, 'Maspero', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZdPcyE2VyGU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 33, '2022-02-25 11:54:05', '2022-02-25 11:54:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_comments`
--
ALTER TABLE `client_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_maps`
--
ALTER TABLE `google_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `greetings`
--
ALTER TABLE `greetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i_t_services`
--
ALTER TABLE `i_t_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_contents`
--
ALTER TABLE `menu_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `msws`
--
ALTER TABLE `msws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_d_messages`
--
ALTER TABLE `m_d_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_hours`
--
ALTER TABLE `office_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `pfs`
--
ALTER TABLE `pfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_contents`
--
ALTER TABLE `slider_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strengths`
--
ALTER TABLE `strengths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_designs`
--
ALTER TABLE `web_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `we_bests`
--
ALTER TABLE `we_bests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_video`
--
ALTER TABLE `youtube_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_comments`
--
ALTER TABLE `client_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `greetings`
--
ALTER TABLE `greetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `i_t_services`
--
ALTER TABLE `i_t_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `menu_contents`
--
ALTER TABLE `menu_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msws`
--
ALTER TABLE `msws`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_d_messages`
--
ALTER TABLE `m_d_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `office_hours`
--
ALTER TABLE `office_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pfs`
--
ALTER TABLE `pfs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_contents`
--
ALTER TABLE `slider_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `strengths`
--
ALTER TABLE `strengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `web_designs`
--
ALTER TABLE `web_designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `we_bests`
--
ALTER TABLE `we_bests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `youtube_video`
--
ALTER TABLE `youtube_video`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
