-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 11:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siamfan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `lastes_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gender`
--

CREATE TABLE `tb_gender` (
  `Gender_id` int(11) NOT NULL,
  `Gender_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_gender`
--

INSERT INTO `tb_gender` (`Gender_id`, `Gender_name`) VALUES
(1, 'หญิง'),
(2, 'ชาย'),
(3, 'สาวสอง'),
(4, 'เกย์'),
(5, 'ดี้'),
(6, 'ทอม'),
(7, 'เลสเบี้ยน');

-- --------------------------------------------------------

--
-- Table structure for table `tb_privacy`
--

CREATE TABLE `tb_privacy` (
  `privacy_id` int(11) NOT NULL,
  `pvc_img` varchar(1) NOT NULL DEFAULT '1',
  `pvc_phone` varchar(1) NOT NULL DEFAULT '1',
  `pvc_email` varchar(1) NOT NULL DEFAULT '1',
  `pvc_line` varchar(1) NOT NULL DEFAULT '1',
  `pvc_facebook` varchar(1) NOT NULL DEFAULT '1',
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_privacy`
--

INSERT INTO `tb_privacy` (`privacy_id`, `pvc_img`, `pvc_phone`, `pvc_email`, `pvc_line`, `pvc_facebook`, `User_id`) VALUES
(1, '1', '1', '1', '1', '1', 113),
(2, '1', '1', '1', '1', '1', 114),
(3, '2', '1', '1', '1', '1', 115);

-- --------------------------------------------------------

--
-- Table structure for table `tb_province`
--

CREATE TABLE `tb_province` (
  `Province_id` int(11) NOT NULL,
  `Province_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_province`
--

INSERT INTO `tb_province` (`Province_id`, `Province_name`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ'),
(3, 'นนทบุรี'),
(4, 'ปทุมธานี'),
(5, 'พระนครศรีอยุธยา'),
(6, 'อ่างทอง'),
(7, 'ลพบุรี'),
(8, 'สิงห์บุรี'),
(9, 'ชัยนาท'),
(10, 'สระบุรี'),
(11, 'ชลบุรี'),
(12, 'ระยอง'),
(13, 'จันทบุรี'),
(14, 'ตราด'),
(15, 'ฉะเชิงเทรา'),
(16, 'ปราจีนบุรี'),
(17, 'นครนายก'),
(18, 'สระแก้ว'),
(19, 'นครราชสีมา'),
(20, 'บุรีรัมย์'),
(21, 'สุรินทร์'),
(22, 'ศรีสะเกษ'),
(23, 'อุบลราชธานี'),
(24, 'ยโสธร'),
(25, 'ชัยภูมิ'),
(26, 'อำนาจเจริญ'),
(27, 'หนองบัวลำภู'),
(28, 'ขอนแก่น'),
(29, 'อุดรธานี'),
(30, 'เลย'),
(31, 'หนองคาย'),
(32, 'มหาสารคาม'),
(33, 'ร้อยเอ็ด'),
(34, 'กาฬสินธุ์'),
(35, 'สกลนคร'),
(36, 'นครพนม'),
(37, 'มุกดาหาร'),
(38, 'เชียงใหม่'),
(39, 'ลำพูน'),
(40, 'ลำปาง'),
(41, 'อุตรดิตถ์'),
(42, 'แพร่'),
(43, 'น่าน'),
(44, 'พะเยา'),
(45, 'เชียงราย'),
(46, 'แม่ฮ่องสอน'),
(47, 'นครสวรรค์'),
(48, 'อุทัยธานี'),
(49, 'กำแพงเพชร'),
(50, 'ตาก'),
(51, 'สุโขทัย'),
(52, 'พิษณุโลก'),
(53, 'พิจิตร'),
(54, 'เพชรบูรณ์'),
(55, 'ราชบุรี'),
(56, 'กาญจนบุรี'),
(57, 'สุพรรณบุรี'),
(58, 'นครปฐม'),
(59, 'สมุทรสาคร'),
(60, 'สมุทรสงคราม'),
(61, 'เพชรบุรี'),
(62, 'ประจวบคีรีขันธ์'),
(63, 'นครศรีธรรมราช'),
(64, 'กระบี่'),
(65, 'พังงา'),
(66, 'ภูเก็ต'),
(67, 'สุราษฎร์ธานี'),
(68, 'ระนอง'),
(69, 'ชุมพร'),
(70, 'สงขลา'),
(71, 'สตูล'),
(72, 'ตรัง'),
(73, 'พัทลุง'),
(74, 'ปัตตานี'),
(75, 'ยะลา'),
(76, 'นราธิวาส'),
(77, 'บึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `report_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `reported_id` int(11) NOT NULL,
  `report_description` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_target`
--

CREATE TABLE `tb_target` (
  `Target_id` int(11) NOT NULL,
  `Target_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_target`
--

INSERT INTO `tb_target` (`Target_id`, `Target_name`) VALUES
(1, 'หาคู่'),
(2, 'หาแฟน'),
(3, 'หากิ๊ก'),
(4, 'หาที่ปรึกษา'),
(5, 'หาพี่ชาย'),
(6, 'หาพี่สาว'),
(7, 'หาน้องชาย'),
(8, 'หาน้องสาว');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `User_id` int(6) NOT NULL,
  `User_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `line_id` varchar(50) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `u_Gender_id` int(2) NOT NULL,
  `u_Province_id` int(3) NOT NULL,
  `u_Target_id` int(2) NOT NULL,
  `age` int(3) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `view_count` int(6) NOT NULL,
  `img` text DEFAULT NULL,
  `acc_status` varchar(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastonline_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`User_id`, `User_name`, `password`, `Name`, `line_id`, `facebook`, `e_mail`, `phone`, `u_Gender_id`, `u_Province_id`, `u_Target_id`, `age`, `Description`, `view_count`, `img`, `acc_status`, `created_date`, `last_update`, `lastonline_time`) VALUES
(1, '', '', 'Sawyer Griffin', 'abdialpXvY', '7XU9PW0QLJ', 'libero.Proin@Sedauctor.net', '013-548-1042', 1, 13, 6, 77, 'erat volutpat. Nulla facilisis. Suspendisse', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(2, '', '', 'Jason Sloan', 'iDRfHeTSc6', '8CY5U68UPM', 'porttitor@feugiat.edu', '032-049-2640', 2, 34, 6, 60, 'eu enim. Etiam imperdiet dictum', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(3, '', '', 'Hector Allen', 'aWRAUzsYeH', '', 'non@turpisvitaepurus.ca', '078-626-1141', 1, 3, 6, 47, 'Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(4, '', '', 'Jamal Bonner', 'iDRfHeTSc6', 'JPV73XFBY2', 'arcu.Morbi.sit@sociis.com', '050-779-7211', 4, 22, 5, 33, 'a,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(5, '', '', 'Gareth Sharp', '4K3a47E8Us', 'K5ZMIQR0NX', 'dis.parturient@risusatfringilla.org', '052-613-1741', 2, 35, 4, 55, 'sapien molestie orci', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(6, '', '', 'Galvin Chang', 'iDRfHeTSc6', '', 'quis@bibendumullamcorper.net', '010-609-7826', 6, 6, 6, 68, 'ut aliquam iaculis, lacus pede sagittis', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(7, '', '', 'Bevis Green', 'HevQMiF0bK', 'H7IJ78UCJV', 'mus@sit.org', '081-504-5464', 6, 54, 7, 56, 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(8, '', '', 'Duncan Forbes', 'iDRfHeTSc6', '9RIRQLD3XR', 'ornare@anteiaculis.com', '000-060-7305', 3, 8, 6, 51, 'suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(9, '', '', 'Lucas Gould', 'dz2d0LW6K2', '', 'Cum@ligula.net', '049-998-5395', 5, 67, 4, 62, 'facilisis,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(10, '', '', 'Kennedy England', 'iDRfHeTSc6', '3G9HEL9ART', 'Curabitur.consequat@lacusvestibulum.org', '065-765-9650', 7, 10, 2, 27, 'sit amet ornare lectus justo eu', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(11, '', '', 'Hakeem Cole', 'UkiTpqHY5Z', 'R85JZV0Q15', 'rutrum.non@atiaculis.org', '001-293-4600', 2, 60, 2, 74, 'natoque penatibus et', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(12, '', '', 'Nathaniel Dillon', 'iDRfHeTSc6', '', 'blandit@faucibusorciluctus.org', '072-122-2431', 5, 12, 2, 76, 'Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, conse', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(13, '', '', 'Galvin Hopkins', 'gsSAnli7Zh', 'XKDB8IXZSS', 'ante@lectus.ca', '049-828-5772', 3, 41, 0, 48, 'erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(14, '', '', 'Reese Ellis', 'iDRfHeTSc6', 'QOAJN44WNQ', 'velit.Cras.lorem@Cras.org', '008-473-9268', 4, 64, 4, 19, 'montes, nascetur ridiculus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(15, '', '', 'Alan Perez', 'hTYqlNiBdH', '', 'et.netus@sedorcilobortis.ca', '061-277-8718', 3, 42, 2, 74, 'lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(16, '', '', 'Garrett Orr', 'iDRfHeTSc6', 'C706J4IY5X', 'neque@DuisgravidaPraesent.com', '050-034-8536', 6, 29, 1, 28, 'Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer v', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(17, '', '', 'Warren Cleveland', 'mJBAmTI2PY', 'GM2JZZ80OY', 'lacinia.mattis@nisl.ca', '000-616-0809', 5, 17, 7, 31, 'purus ac tellus.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(18, '', '', 'Fletcher Cervantes', 'iDRfHeTSc6', '', 'interdum@Duisrisus.org', '078-488-7793', 2, 62, 0, 77, 'magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo a', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(19, '', '', 'Dalton Bradford', '0UVIl6p3Gk', 'WPWDON9HGX', 'cursus.et.eros@necmetus.edu', '072-345-3074', 7, 70, 2, 27, 'tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(20, '', '', 'Moses Calhoun', 'iDRfHeTSc6', 'VSYNCJSJSN', 'felis@egestasrhoncus.ca', '034-325-4077', 0, 59, 5, 46, 'molestie orci tincidunt adipiscing. Mauris molestie pharetra', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(21, '', '', 'Drew Mckinney', 'vOzG1QPrX0', '', 'nisi.Mauris.nulla@cursuset.ca', '045-316-7902', 7, 18, 1, 75, 'cursus vestibulum. Mauris magna.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(22, '', '', 'William Oliver', 'iDRfHeTSc6', 'UKEJY1V26N', 'sed@velit.edu', '047-066-4920', 2, 62, 1, 45, 'sem egestas', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(23, '', '', 'Fritz Walker', '5S9tvBwV3C', 'RNF0UUGH03', 'ornare@mollisPhaselluslibero.com', '021-957-1308', 2, 68, 4, 76, 'Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamu', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(24, '', '', 'Aquila Obrien', 'iDRfHeTSc6', '', 'Aenean@duinec.ca', '050-208-1788', 7, 7, 7, 45, 'ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum fe', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(25, '', '', 'Peter Rodriguez', 'uHQ0g9KlN1', 'THQMDSZPD3', 'malesuada.fames@fringillaornareplacerat.org', '061-169-7669', 6, 25, 4, 35, 'non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(26, '', '', 'Gareth Alvarez', 'iDRfHeTSc6', 'UU8VY542HN', 'at@fermentumconvallis.edu', '011-534-6388', 6, 38, 0, 77, 'vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(27, '', '', 'Hilel Tate', 'YXjowo3Eex', '', 'ultrices@sitamet.net', '088-723-1330', 6, 57, 3, 76, 'nunc id', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(28, '', '', 'Hunter Roy', 'iDRfHeTSc6', '92BUD525BV', 'magna@non.co.uk', '019-705-2313', 1, 57, 4, 51, 'amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Ve', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(29, '', '', 'Quentin Ramos', '55DZJuZzO6', '65VSQ1EANH', 'a.malesuada@magnaCrasconvallis.org', '037-997-6255', 1, 38, 4, 44, 'Phasellus ornare. Fusce mollis. Duis sit amet diam', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(30, '', '', 'Byron Nunez', 'iDRfHeTSc6', '', 'faucibus@faucibusorci.edu', '083-956-6483', 2, 30, 3, 58, 'elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(31, '', '', 'Allistair Barry', 'DhtdS7R0eT', '10SAEUJ37S', 'tincidunt.congue@risusa.org', '023-184-6413', 2, 4, 1, 42, 'erat. Sed nunc', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(32, '', '', 'Buckminster Nunez', 'iDRfHeTSc6', 'I4OXIWVRDF', 'sit.amet.consectetuer@parturient.com', '049-005-0834', 5, 32, 8, 25, 'tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(33, '', '', 'Wade Harvey', 'nodxsaxlPM', '', 'adipiscing@semperegestasurna.edu', '096-952-4262', 2, 41, 2, 24, 'Nulla tempor augue ac ipsum.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(34, '', '', 'Fitzgerald Roman', 'iDRfHeTSc6', 'VE49AJBDJ7', 'arcu@leo.ca', '038-937-3366', 6, 34, 8, 65, 'et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(35, '', '', 'Clarke Callahan', 'NP4n1VKIiU', '4Y8QY2IWZZ', 'Pellentesque.habitant@nibh.com', '020-328-4571', 6, 33, 1, 44, 'posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(36, '', '', 'Allen Schultz', 'iDRfHeTSc6', '', 'egestas.blandit@amet.co.uk', '004-412-7432', 4, 36, 2, 51, 'nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(37, '', '', 'Timothy Miles', 'advTXnK5Ky', '5XNKV9B5NQ', 'sapien.imperdiet@aliquameros.org', '089-031-2913', 2, 37, 7, 34, 'libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(38, '', '', 'Uriah Franco', 'iDRfHeTSc6', '4HZWVO3KXA', 'leo.in.lobortis@malesuada.net', '059-352-1421', 6, 38, 4, 71, 'Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(39, '', '', 'Reese Morrison', '9loCzFrv9Y', '', 'penatibus.et@pellentesquetellus.co.uk', '006-315-4921', 7, 47, 1, 24, 'sed dictum eleifend,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(40, '', '', 'Gary Mcclain', 'iDRfHeTSc6', '20YMKDDNQ4', 'In.mi.pede@lacus.org', '066-786-9817', 5, 40, 8, 48, 'odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(41, '', '', 'Cody Maynard', 's9dGUobxxU', 'DA0VG7XRB4', 'pede.Cum.sociis@arcuVestibulum.com', '007-921-0895', 4, 9, 1, 68, 'Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus maur', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(42, '', '', 'Aquila Cole', 'iDRfHeTSc6', '', 'est@pretiumneque.ca', '089-185-7955', 4, 9, 2, 79, 'purus, accumsan interdum libero dui', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(43, '', '', 'Adam Mcdowell', 'Sp59yMngE3', 'CTX7KRNEZR', 'ridiculus@pellentesquea.ca', '041-452-0917', 5, 8, 1, 58, 'Nullam ut nisi a odio semper cursus. Integer mollis. Integer', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(44, '', '', 'Richard Hays', 'iDRfHeTSc6', 'KYMFLVV21T', 'dui@Praesenteu.ca', '000-221-8351', 1, 44, 2, 46, 'pede blandit', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(45, '', '', 'Oliver Savage', 'rkJ0OXvHgf', '', 'vulputate.ullamcorper.magna@sitamet.com', '071-533-6298', 7, 45, 5, 61, 'ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(46, '', '', 'Oleg Allen', 'iDRfHeTSc6', 'WD737D8PGR', 'amet.consectetuer@egetmetus.net', '015-771-3743', 1, 23, 6, 61, 'dolor elit,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(47, '', '', 'Channing Goodwin', 'BOxWKUPdnF', 'EN9RPHDCFT', 'ultricies.dignissim@leo.org', '059-123-8255', 3, 47, 7, 56, 'quam', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(48, '', '', 'Stephen Gentry', 'iDRfHeTSc6', '', 'Phasellus.dolor@mollisvitae.com', '049-762-5341', 5, 77, 1, 19, 'ornare, lectus ante', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(49, '', '', 'Eagan Workman', 'pLGagmL4kT', 'K3KE6LV83L', 'purus.accumsan@seddictum.net', '030-206-9752', 1, 49, 8, 30, 'sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(50, '', '', 'Denton Huffman', 'iDRfHeTSc6', '7BVMSWI3L1', 'orci.quis@loremsitamet.ca', '054-110-1426', 4, 48, 5, 39, 'orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(51, '', '', 'Hedley Tyson', 'QZ3EAAc8U9', '', 'ipsum.primis.in@dui.ca', '084-316-4431', 5, 53, 0, 78, 'nulla magna, malesuada vel, convallis in, cursus et, eros.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(52, '', '', 'Oleg Dean', 'iDRfHeTSc6', '47HDL431US', 'feugiat.placerat.velit@vulputate.co.uk', '026-241-6462', 2, 64, 3, 31, 'sagittis. Nullam vitae diam. Proin dolor. Nulla semper', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(53, '', '', 'Griffin Oconnor', 'aEU5t2ZZEx', 'X9TIFTEAJD', 'per.conubia.nostra@incursus.net', '054-935-4696', 1, 53, 1, 28, 'sociis natoque penatibus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(54, '', '', 'Dennis Morse', 'iDRfHeTSc6', '', 'Aenean.egestas.hendrerit@Aeneaneuismod.co.uk', '008-484-0145', 3, 52, 6, 56, 'dignissim pharetra. Nam ac nulla. In tincidunt', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(55, '', '', 'Abdul Tyler', NULL, '', 'velit.in@loremloremluctus.edu', '086-354-3077', 7, 55, 4, 30, 'eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant mor', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(56, '', '', 'Joel Richardson', 'iDRfHeTSc6', '', 'facilisis.facilisis@Maurisut.com', '031-893-7770', 3, 60, 2, 26, 'lorem eu metus. In lorem. Donec elementum,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(57, '', '', 'Elijah Ross', NULL, '', 'cursus@felis.co.uk', '027-678-8823', 4, 61, 8, 68, 'Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(58, '', '', 'Harper Duran', 'iDRfHeTSc6', '', 'sem@elit.com', '056-833-0258', 2, 58, 8, 66, 'ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(59, '', '', 'Hayden Lynn', NULL, '', 'consectetuer.cursus@Vestibulum.net', '028-947-1933', 6, 51, 5, 56, 'dictum placerat, augue. Sed molestie. Sed id risus quis', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(60, '', '', 'Ian Marquez', 'iDRfHeTSc6', '', 'non.sollicitudin@liberoest.edu', '012-536-8954', 7, 60, 1, 46, 'Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, p', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(61, '', '', 'Martin Tran', NULL, '', 'mauris.sagittis.placerat@id.co.uk', '083-452-3819', 2, 61, 7, 71, 'velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(62, '', '', 'Garrett Pugh', 'iDRfHeTSc6', '', 'semper@eratvel.edu', '092-959-0542', 7, 16, 7, 55, 'auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vi', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(63, '', '', 'Roth Carpenter', NULL, '', 'Mauris.ut@Praesent.net', '037-096-9746', 7, 2, 2, 76, 'pharetra. Quisque ac libero', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(64, '', '', 'Sean Foley', 'iDRfHeTSc6', '', 'Cras@tempusnonlacinia.edu', '006-308-0527', 4, 64, 8, 36, 'eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(65, '', '', 'Christian Blanchard', NULL, '', 'lorem.ac.risus@Sednullaante.edu', '074-633-5736', 1, 53, 7, 79, 'leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(66, '', '', 'Aaron Best', 'iDRfHeTSc6', '', 'eu.accumsan@tristiquealiquetPhasellus.ca', '067-218-1574', 6, 66, 6, 65, 'placerat, augue. Sed molestie.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:05:41', NULL),
(67, '', '', 'Jonah Benton', NULL, '', 'et.ipsum.cursus@utsemNulla.org', '024-902-5064', 6, 75, 3, 78, 'dolor. Quisque tincidunt pede ac urna.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(68, '', '', 'Evan Walker', 'iDRfHeTSc6', '', 'penatibus.et@magnatellus.net', '099-123-9771', 1, 68, 0, 69, 'Aenean eget magna. Suspendisse tristique neque venenatis lacus.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(69, '', '', 'Jameson Kelly', NULL, '', 'ut.nulla.Cras@orci.ca', '065-260-0339', 0, 29, 1, 66, 'leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(70, '', '', 'Adrian Salinas', 'iDRfHeTSc6', '', 'urna.suscipit@placerat.org', '045-212-3384', 4, 56, 6, 62, 'aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sa', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(71, '', '', 'Palmer Kemp', NULL, '', 'nec.tempus.scelerisque@arcuSed.co.uk', '057-811-0927', 3, 71, 6, 42, 'vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:18:34', NULL),
(72, '', '', 'Stewart Jimenez', 'iDRfHeTSc6', '', 'feugiat@Incondimentum.org', '058-558-3113', 4, 72, 8, 24, 'ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui ', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(73, '', '', 'Cairo Tanner', NULL, '', 'ornare.libero@vulputate.org', '088-578-0615', 7, 73, 1, 75, 'malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(74, '', '', 'Mannix Butler', 'iDRfHeTSc6', '', 'Donec.tempus@placeratorci.co.uk', '016-709-1669', 4, 74, 5, 43, 'non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, molli', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(75, '', '', 'Bert Holloway', NULL, '', 'tellus.Nunc.lectus@massaQuisqueporttitor.ca', '042-034-9483', 4, 75, 0, 78, 'ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(76, '', '', 'Vladimir Craig', 'iDRfHeTSc6', '', 'Cras.eget@ultriciesadipiscingenim.net', '009-509-9728', 1, 12, 6, 56, 'scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasel', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(77, '', '', 'Neville Sparks', NULL, '', 'eget@orci.com', '022-299-0675', 1, 64, 5, 39, 'nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dign', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(78, '', '', 'Chadwick Kirk', 'iDRfHeTSc6', '', 'felis.orci.adipiscing@Pellentesqueut.co.uk', '089-345-7007', 1, 68, 1, 52, 'mauris sapien, cursus in, hendrerit consectetuer, cursus', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(79, '', '', 'Scott Lynch', NULL, '', 'Donec.consectetuer@musProin.com', '013-673-3117', 0, 0, 1, 32, 'dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatib', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(80, '', '', 'Micah Brennan', 'iDRfHeTSc6', '', 'at.lacus.Quisque@Vestibulumaccumsan.org', '007-472-9815', 6, 3, 1, 37, 'Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(81, '', '', 'Armando Strong', NULL, '', 'a@Cras.com', '078-986-9792', 3, 14, 8, 21, 'mauris ipsum porta', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(82, '', '', 'Kenneth Velasquez', 'iDRfHeTSc6', '', 'quam.Curabitur@eunullaat.edu', '096-748-4353', 1, 74, 6, 41, 'nisi nibh lacinia orci, consectetuer euismod est arcu ac', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(83, '', '', 'Daniel Griffith', NULL, '', 'gravida@scelerisquemollis.net', '047-376-4211', 5, 51, 1, 29, 'enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac se', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(84, '', '', 'Clark Hill', 'iDRfHeTSc6', '', 'Vivamus.sit@utpharetrased.edu', '002-116-6957', 4, 19, 6, 56, 'et libero.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(85, '', '', 'Yasir Kidd', NULL, '', 'orci.adipiscing@maurisMorbi.org', '039-005-1915', 6, 45, 8, 70, 'Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(86, '', '', 'Tyler Leach', 'iDRfHeTSc6', '', 'libero@Fusce.org', '098-865-5723', 6, 12, 8, 71, 'commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulput', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(87, '', '', 'Driscoll Collier', NULL, '', 'Mauris@variusNamporttitor.edu', '099-827-5676', 5, 12, 3, 22, 'egestas blandit. Nam nulla magna, malesuada vel,', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(88, '', '', 'Jelani West', 'iDRfHeTSc6', '', 'elementum.sem@accumsannequeet.org', '074-093-6638', 0, 0, 2, 26, 'conubia nostra, per', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(89, '', '', 'Logan Barnett', NULL, '', 'aliquam.eu.accumsan@Nunc.edu', '034-799-5006', 2, 56, 3, 34, 'ullamcorper.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(90, '', '', 'Duncan Bruce', 'iDRfHeTSc6', '', 'eu.ligula@purus.org', '092-240-1087', 6, 20, 4, 73, 'condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aene', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(91, '', '', 'Chaim Whitley', NULL, '', 'arcu@Nulla.net', '074-752-1611', 5, 9, 6, 78, 'Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, s', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(92, '', '', 'Orlando Valdez', 'iDRfHeTSc6', '', 'vehicula@semperNamtempor.ca', '048-778-7576', 3, 66, 1, 25, 'Morbi sit amet massa. Quisque porttitor eros nec', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(93, '', '', 'Merrill Velez', NULL, '', 'neque.et.nunc@sociisnatoque.edu', '042-481-4425', 4, 0, 5, 49, 'Nulla dignissim.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(94, '', '', 'Maxwell Hendricks', 'iDRfHeTSc6', '', 'interdum.Nunc.sollicitudin@leo.co.uk', '021-807-2687', 7, 42, 2, 37, 'libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nun', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(95, '', '', 'Arthur Horne', NULL, '', 'a@utpharetrased.edu', '004-169-1860', 4, 0, 2, 74, 'Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh ', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(96, '', '', 'Andrew Hill', 'iDRfHeTSc6', '', 'interdum.feugiat.Sed@nislNullaeu.ca', '035-358-2800', 5, 0, 1, 24, 'mus. Proin vel nisl. Quisque fringilla euismod enim.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(97, '', '', 'Christopher Wilder', NULL, '', 'ac.fermentum.vel@necmalesuada.org', '031-126-4632', 6, 40, 1, 80, 'fermentum arcu.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(98, '', '', 'Lee Tran', 'iDRfHeTSc6', '', 'porta.elit@Maecenasiaculisaliquet.com', '006-056-0363', 0, 61, 6, 35, 'felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus.', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(99, '', '', 'Ivan Sears', NULL, '', 'Nam@atlacusQuisque.co.uk', '045-006-2530', 6, 44, 5, 44, 'ultrices sit amet, risus. Donec nibh', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(100, '', '', 'Brady Griffin', 'iDRfHeTSc6', '', 'et@loremvitae.org', '091-029-4575', 1, 19, 6, 33, 'id enim. Curabitur massa. Vestibulum accumsan neque et', 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(104, 'user2', '12345', 'micro soft', 'iDRfHeTSc6', '', NULL, NULL, 1, 0, 1, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(105, 'user3', '12345', 'com puter', NULL, '', NULL, NULL, 5, 60, 6, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(106, 'user4', '12345', '56 78', 'iDRfHeTSc6', '', NULL, NULL, 7, 44, 1, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(107, 'user6', '12345', '5689 9874', NULL, '', NULL, NULL, 3, 37, 1, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 09:46:07', NULL),
(108, 'user3', '12345', '654 235', 'iDRfHeTSc6', '', NULL, NULL, 0, 0, 5, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:07:38', NULL),
(113, 'user678', '12345', 'firstname lastname', NULL, NULL, NULL, NULL, 3, 0, 8, 0, NULL, 0, NULL, '1', '0000-00-00 00:00:00', '2020-11-21 08:19:05', NULL),
(115, 'user2233', '12345', 'fname lname', '5985532', 'facebookname2', 'siam@gmail.com2', '099-856-5622', 7, 17, 1, 18, 'Description4', 0, NULL, '1', '2020-11-21 13:30:58', '2020-11-21 09:46:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `vote_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `voted_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_gender`
--
ALTER TABLE `tb_gender`
  ADD PRIMARY KEY (`Gender_id`);

--
-- Indexes for table `tb_privacy`
--
ALTER TABLE `tb_privacy`
  ADD PRIMARY KEY (`privacy_id`);

--
-- Indexes for table `tb_province`
--
ALTER TABLE `tb_province`
  ADD PRIMARY KEY (`Province_id`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`Target_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gender`
--
ALTER TABLE `tb_gender`
  MODIFY `Gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_privacy`
--
ALTER TABLE `tb_privacy`
  MODIFY `privacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_province`
--
ALTER TABLE `tb_province`
  MODIFY `Province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_target`
--
ALTER TABLE `tb_target`
  MODIFY `Target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `User_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
