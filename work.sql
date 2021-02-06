-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 02:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'admin', '11111111', '2020-12-07 16:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `affiliated_agencies`
--

CREATE TABLE `affiliated_agencies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiliated_agencies`
--

INSERT INTO `affiliated_agencies` (`id`, `name`) VALUES
(1, 'คณิตศาสตร์'),
(2, 'เทคโนโลยีวัสดุและการผลิต'),
(3, 'เทคโนโลยีเพาะเลี้ยงสัตว์น้ำ'),
(4, 'เทคโนโลยีไฟฟ้า'),
(5, 'เทคโนโลยีการจัดการอุตสาหกรรม'),
(6, 'เทคโนโลยีสารสนเทศ'),
(7, 'ฟิสิกส์'),
(8, 'สาธารณสุขชุมชน'),
(9, 'ชีววิทยา'),
(10, 'เคมี'),
(11, 'วิทยาศาสตร์เกษตร'),
(12, 'เทคโนโลยีการอาหาร'),
(13, 'วิทยาศาสตร์สิ่งแวดล้อม'),
(14, 'วิทยาการคอมพิวเตอร์'),
(15, 'ศูนย์วิทยาศาสตร์'),
(16, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `compentency_detail`
--

CREATE TABLE `compentency_detail` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `compentency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compentency_detail`
--

INSERT INTO `compentency_detail` (`id`, `level`, `detail`, `compentency_id`) VALUES
(1, 1, 'ระดับที่ 1 ปฏิบัติหน้าที่ราชการตามที่ได้รับมอบหมายอย่างถูกต้อง ครบถ้วน และมีความรับผิดชอบด้วยการศึกษาข้อมูล รายละเอียดแนวปฏิบัติที่เกี่ยวข้องในงานและนํามาวางแผนการปฏิบัติอย่างเป็นระบบ', 1),
(2, 2, 'ระดับที่ 2 มีสมรรถนะระดับที่ 1 และปฏิบัติหน้าที่ราชการโดยมีการกําหนดมาตรฐานหรือเป้าหมายเพื่อให้ได้ผลงานที่ดี สามารถปฏิบัติงานได้ตามเป้าที่สาขาวิชา/คณะกําหนดอย่างมีคุณภาพ', 1),
(3, 3, 'ระดับที่ 3 มีสมรรถนะระดับที่ 2 และสามารถปฏิบัติหน้าที่ราชการได้ดีขึ้น เร็วขึ้น ปฏิบัติงานได้หลากหลายหน้าที่อย่างมี มีประสิทธิภาพและมีวิธีการทํางานแบบใหม่ ๆ', 1),
(4, 4, 'ระดับที่ 4 มีสมรรถนะระดับที่ 3 และสามารถปฏิบัติหน้าที่ราชการโดยมีการกําหนดเป้าหมายที่ท้าทาย ซึ่งแตกต่างจากเดิม มีการพัฒนาระบบ ขั้นตอน วิธีการทํางานให้ได้ผลงานที่โดดเด่นอย่างเห็นได้ชัดเจนเป็นรูปธรรม', 1),
(5, 5, 'ระดับที่ 5 มีสมรรถนะระดับที่ 4 และมีความสามารถในการตัดสินใจที่ดีในการปฏิบัติงาน เพื่อให้หน่วยงาน/ผู้รับบริการได้ประโยชน์ สูงสุด ด้วยการทุ่มเทเวลาและบริหารจัดการทรัพยากรอย่างมีประสิทธิภาพ', 1),
(6, 1, 'ระดับที่ 1 มีความเต็มใจในการให้บริการ แสดงข้อมูลรายละเอียดที่ชัดเจนถูกต้องในการให้บริการ', 2),
(7, 2, 'ระดับที่ 2 มีสมรรถนะระดับที่ 1 และมีการประสานงานอํานวยความสะดวกในหน่วยงานและกับหน่วยงานอื่นๆ ที่เกี่ยวข้องแก่ผู้รับบริการอย่างต่อเนื่องและรวดเร็ว', 2),
(8, 3, 'ระดับที่ 3 มีสมรรถนะระดับที่ 2 และมีการเสียสละ ทุ่มเทเวลา เพื่อช่วยแก้ปัญหาให้แก่ผู้รับบริการ', 2),
(9, 4, 'ระดับที่ 4 มีสมรรถนะระดับที่ 3 และมีความพยายามในการแก้ปัญหาของผู้รับบริการด้วยการทำความเข้าใจให้ตรงตามความต้องการของผู้รับบริการอย่างแท้จริง', 2),
(10, 5, 'ระดับที่ 5 มีสมรรถนะระดับที่ 4 และให้บริการโดยคิดถึงผลประโยชน์ของผู้รับบริการในระยะยาว สามารถเปลี่ยนวิธีการหรือขั้นตอนการให้บริการเพื่อให้ผู้รับบริการได้รับประโยชน์สูงสุดและให้ความไว้วางใจ', 2),
(11, 1, 'ระดับที่ 1 มีความสนใจติดตาม ศึกษาหาความรู้ในสาขาวิชาชีพของตนเองอย่างสม่ําเสมอโดยแสดงออกทางการปฏิบัติงาน การประชุมแสดงความคิดเห็นและการเข้าร่วมในกิจกรรมทางวิชาชีพที่เกี่ยวข้อง', 3),
(12, 2, 'ระดับที่ 2 มีสมรรถนะระดับที่ 1 และมีความรอบรู้ในเทคโนโลยีหรือองค์ความรู้ใหม่ ๆ ในสาขาวิชาชีพของตนเอง และรับรู้ถึงแนวโน้มวิทยาการที่ทันสมัยและเกี่ยวข้องกับงานของตนเองอย่างต่อเนื่อง', 3),
(13, 3, 'ระดับที่ 3 มีสมรรถนะระดับที่ 2 และมีการนําองค์ความรู้และเทคโนโลยีใหม่มาประยุกต์ใช้ในการปฏิบัติหน้าที่ราชการให้เกิดประสิทธิภาพในวิชาชีพของตน', 3),
(14, 4, 'ระดับที่ 4 มีสมรรถนะระดับที่ 3 และมีการพัฒนาตนเองให้มีความรู้ ความเชี่ยวชาญในวิชาชีพอย่างต่อเนื่องจนสามารถถ่ายทอดและเผยแพร่จนเป็นที่ยอมรับ', 3),
(15, 5, 'ระดับที่ 5 มีสมรรถนะระดับที่ 4 และสามารถสนับสนุนการทํางานของบุคลากรในส่วนราชการที่มีความเชี่ยวชาญในสหวิทยาการเพื่อความเป็นเลิศทางวิชาการของหน่วยงาน', 3),
(16, 1, 'ระดับที่ 1 มีการปฏิบัติงานด้วยความซื่อสัตย์สุจริต ภายใต้กฎ ระเบียบ ข้อบังคับของหน่วยงานโดยเคร่งครัด', 4),
(17, 2, 'ระดับที่ 2 มีสมรรถนะระดับที่ 1 และเป็นผู้มีวินัย มีสัจจะ เชื่อถือได้ มีความรับผิดชอบต่อหน้าที่และงานที่ได้รับมอบหมาย', 4),
(18, 3, 'ระดับที่ 3 มีสมรรถนะระดับที่ 2 และมีเจตคติที่ดีต่อวิชาชีพของตนเองและหน่วยงาน ปฏิบัติงานด้วยการยึดมั่นในหลักการ คุรธรรม จริยธรรม จรรยาบรรณในวิชาชีพและหลักการปฏิบัติราชการ', 4),
(19, 4, 'ระดับที่ 4 มีสมรรถนะระดับที่ 3 และยืนหยัดในความถูกต้อง ชัดเจน โปร่งใส สามารถตรวจสอบได้ โดยมุ่งพิทักษ์ผลประโยชน์ของราชการ', 4),
(20, 5, 'ระดับที่ 5 มีสมรรถนะระดับที่ 4 และมีความเสียสละ อุทิศตนเพื่อความยุติธรรม มีความเสมอภาคโดยไม่เลือกปฏิบัติ', 4),
(21, 1, 'ระดับที่ 1 มีส่วนร่วมในกิจกรรมระดับสาขาวิชา/คณะอย่างสม่ําเสมอ เช่น ร่วมการประชุม เข้าร่วมโครงการ/กิจกรรมของสาขาวิชา/คณะอย่างต่อเนื่อง', 5),
(22, 2, 'ระดับที่ 2 มีสมรรถนะระดับที่ 1 และให้ความร่วมมือในกิจกรรมทุกกระบวนการ สามารถทํางานร่วมกับเพื่อนร่วมงาน ได้เป็นอย่างดีและมีความปรองดองในทีมงาน', 5),
(23, 3, 'ระดับที่ 3 มีสมรรถนะระดับที่ 2 และประสานความร่วมมือของสมาชิกในทีมงานได้เป็นอย่างดี สามารถสร้างบรรยากาศที่ดีในการทำงาน', 5),
(24, 4, 'ระดับที่ 4 มีสมรรถนะระดับที่ 3 และให้การสนับสนุนช่วยเหลือเพื่อนร่วมงาน ทุ่มเทเสียสละให้กับทีมงานเพื่อให้งานประสบความสำเร็จ', 5),
(25, 5, 'ระดับที่ 5 มีสมรรถนะระดับที่ 4 และมีความตั้งใจในการทํางานร่วมกับทีมงานโดยไม่เห็นแก่ประโยชน์ส่วนตน สามารถทํางานเป็นทีมจนได้รับการยอมรับ และปฏิบัติภารกิจจนประสบผลสําเร็จตามเป้าหมาย', 5);

-- --------------------------------------------------------

--
-- Table structure for table `compentency_score`
--

CREATE TABLE `compentency_score` (
  `score_id` int(11) NOT NULL,
  `total_score_c` float NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compentency_score`
--

INSERT INTO `compentency_score` (`score_id`, `total_score_c`, `rate_id`) VALUES
(83, 30, 83),
(84, 16, 84),
(85, 0, 85),
(86, 0, 86);

-- --------------------------------------------------------

--
-- Table structure for table `managementposition`
--

CREATE TABLE `managementposition` (
  `id` int(2) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managementposition`
--

INSERT INTO `managementposition` (`id`, `name`) VALUES
(1, 'ผู้บริหาร'),
(2, 'รองคณบดี'),
(3, 'ผู้ช่วยคณบดี'),
(4, 'ประธานหลักสูตร'),
(7, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `name` varchar(60) NOT NULL,
  `personneltype` varchar(60) NOT NULL,
  `officialposition` varchar(60) NOT NULL,
  `managementposition` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `affiliated_agencies` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `status`, `name`, `personneltype`, `officialposition`, `managementposition`, `email`, `username`, `password`, `affiliated_agencies`) VALUES
(50, 2, 'ทดสอบ', '1', '1', '1', 'admin@gmail.com', 'admin', '123123123', '15'),
(52, 0, 'มาวินน', '1', '1', '7', 'admin1@gmail.com', 'admin1', '123123123', '8'),
(54, 1, 'ประธานหลักสูตร', '1', '1', '4', 'admin2@gmail.com', 'admin2', '123123123', '8'),
(55, 0, 'ทดสอบ3', '1', '1', '7', 'admin3@gmail.com', 'admin3', '123123123', '8');

-- --------------------------------------------------------

--
-- Table structure for table `officialposition`
--

CREATE TABLE `officialposition` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officialposition`
--

INSERT INTO `officialposition` (`id`, `name`) VALUES
(1, 'อาจารย์'),
(2, 'ผู้ช่วยศาสตราจารย์'),
(3, 'รองศาสตราจารย์'),
(4, 'ศาสตราจารย์');

-- --------------------------------------------------------

--
-- Table structure for table `performance_detail`
--

CREATE TABLE `performance_detail` (
  `id` int(11) NOT NULL,
  `level` int(50) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `performance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_detail`
--

INSERT INTO `performance_detail` (`id`, `level`, `detail`, `performance_id`) VALUES
(1, 1, 'ระดับ 1 มีภาระงานไม่เกิน 20.00 หน่วยชั่วโมง/สัปดาห์', 1),
(2, 2, 'ระดับ 2 มีภาระงาน 20.01- 25.00 หน่วยชั่วโมง/สัปดาห์', 1),
(3, 3, 'ระดับ 3 มีภาระงาน 25.01- 30.00 หน่วยชั่วโมง/สัปดาห์', 1),
(4, 4, 'ระดับ 4 มีภาระงาน 30.01- 35.00 หน่วยชั่วโมง/สัปดาห์', 1),
(5, 5, 'ระดับ 5 มีภาระงานมากกว่า 35 หน่วยชั่วโมง/สัปดาห์', 1),
(6, 1, 'ระดับ 1 ระบุเอกสารประกอบการสอนหรือเอกสารตำราหรือสื่อฯ ใน มคอ.3', 2),
(7, 2, 'ระดับ 2 มีเอกสารประกอบการสอนหรือเอกสาร คำสอนหนือตำราหรือสื่อฯ ที่เรียบเรียงหรือจัดทำด้วยตนเอง', 2),
(8, 3, 'ระดับ 3 มีเอกสารประกอบการสอนหรือเอกสาร คำสอนหรือตำราที่เขียน/เรียบเรียงด้วยตนเองเสร็จไม่น้อยกว่า ร้อยละ 50', 2),
(9, 4, 'ระดับ 4 มีระดับ3 และมีการดำเนินการเสร็จ ไม่น้อยกว่าร้อยละ 80', 2),
(10, 5, 'ระดับ 5 มีเอกสารประกอบการเรียนการสอนหรือเอกสารคำสอนหรือตำราฉบับสมบูนณ์ ซึ่งเขียนหรือปรับปรุงไม่น้อยกว่า 50ของเนื้อหาในแต่ละรอบของการประเมิน', 2),
(11, 1, 'ระดับ 1 มีเอกสารรายละเอียดวิชา (มคอ.3,4)/ประมวลการสอนครบทุกวิชา', 3),
(12, 2, 'ระดับ 2 ผ่านระดับ 1 และสอนครบเนื้อหาเป็นไปตามที่ระบุใน มคอ.3,4/ประมวลการสอน', 3),
(13, 3, 'ระดับ 3 ผ่านระดับ 2 และใช้วิธีการสอนที่หลากหลาย โดยให้เน้นผู้เรียนเป็นสำคัญ', 3),
(14, 4, 'ระดับ 4 ผ่านระดัล 3 และมีการวัดผลที่เหมาะสมกับเนื้อหาและกิจกรรม', 3),
(15, 5, 'ระดับ 5 ผ่านระดับ4 และมีการประเมินความพึงพอใจของนักศึกษาเฉลี่ย 4.00 ขึ้นไป', 3),
(16, 1, 'ระดับ 1 มีผลการประกันคุณภาพภายในระดับหลักสูตร ต่ำกว่า 2.01', 4),
(17, 2, 'ระดับ 2 มีผลการประกันคุณภาพภายในระดับหลักสูตร ตั้งแต่ 2.01-2.50', 4),
(18, 3, 'ระดับ 3 มีผลการประกันคุณภาพภายในระดับหลักสูตร ตั้งแต่ 2.51-3.00', 4),
(19, 4, 'ระดับ 4 มีผลการประกันคุณภาพภายในระดับหลักสูตร ตั้งแต่ 3.01-3.50', 4),
(20, 5, 'ระดับ 5 มีผลการประกันคุณภาพภายในระดับหลักสูตร สูงกว่า 3.50', 4),
(21, 1, 'ระดับ 1 มีแผนพัฒนาตนเอง และเข้าร่วมกิจกรรมการพัฒนาตนเองที่จัดโดยมหาวิทยาลัยหรือหน่วยงานภายนอกจัดหรือมีการพัฒนาบัณฑิต 1 ข้อ', 5),
(22, 2, 'ระดับ 2 เข้าร่วมการประชุม อบรม สัมมนา หรือการพัฒนาบัณฑิต 2 ข้อ', 5),
(23, 3, 'ระดับ 3 มีการรายงานผลการประชุม อบรม สัมมนาหรือการมีการพัฒนาบัณฑิต 3 ข้อ', 5),
(24, 4, 'ระดับ 4 ผ่านระดับ 3 และมีการนำผลการประชุม อบรม สัมมนาไปใช้ในการเรียนการสอน/พัฒนานักศึกษา หรือมีการพัฒนาบัณฑิต 4 ข้อ', 5),
(25, 5, 'ระดับ 5 ผ่านระดับ 4 ในการประเมินผลเชิงพัฒนา หรือมีการพัฒนาบัณทิตครบทั้ง 5ข้อ', 5),
(26, 1, 'ระดับ 1 เสนอเค้าโครงวิจัยแต่ไม่ได้รับการพิจารณนาสนับสนุนทุนวิจัย', 6),
(27, 2, 'ระดับ 2 เป็นงานวิจัยที่ดำเนินการโดยไม่ได้ขอรับทุนสนับสนุนใด ๆ', 6),
(28, 3, 'ระดับ 3 วงเงินสนับสนุน วิจัย ต่ำกว่า 40,000 บาท', 6),
(29, 4, 'ระดับ 4 เป็นหัวหน้าโครงการหรือมีส่วนร่วมร้อยละ 80 ขึ้นไป', 6),
(30, 5, 'ระดับ 5 เป็นหัวหน้าโครงการวิจัยที่รับทุนภายนอกหรือหัวหน้าชุดโครงการวิจัย', 6),
(31, 1, 'ระดับ 1 มีส่วนร่วม ไม่เกินร้อยละ 20', 7),
(32, 2, 'ระดับ 2 มีส่วนร่วม ร้อยละ 21 - 49', 7),
(33, 3, 'ระดับ 3 มีส่วนร่วม ร้อยละ 50 - 79', 7),
(34, 4, 'ระดับ 4 เป็นหัวหน้าโครงการหรือมีส่วนร่วมร้อยละ 80 ขึ้นไป', 7),
(35, 5, 'ระดับ 5 เป็นหัวหน้าโครงการวิจัยที่รับทุนภายนอกหรือหัวหน้าชุดโครงการวิจัย', 7),
(36, 1, 'ระดับ 1 ได้จัดทำข้อเสนอโครงการวิจัยและเสนอผู้บริการให้ความเห็นชอบ', 8),
(37, 2, 'ระดับ 2 ผ่านระดับ 1 และได้รับอนุมัติให้ดำเนินการศึกษาวิจัย', 8),
(38, 3, 'ระดับ 3 ผ่านระดับ 2 ได้เก็บรวบรวมและประมวลข้อมูลเพื่อวิเคราะห์ผลการศึกษาตามกรอบการวิจัย', 8),
(39, 4, 'ระดับ 4 ผ่านระดับ 3 และจัดทำรายงานผลการวิจัยเพื่อเสนอผู้บริหารที่เกี่ยวข้อง', 8),
(40, 5, 'ระดับ 5 ผ่านระดับ 4 และมีการเผยแพร่งานวิจัยในระดับชาติหรือระดับนานาชาติหรือมีการถ่ายทอดเผยแพร่สู่ชุมชนโดยได้รับการรับรองในการใช้ผลงานวิจัยจากหน่วยงานหรือผู้เกี่ยวข้อง', 8),
(41, 1, 'ระดับ 1 มีการเข้าร่วมอย่างน้อย 1 กิจกรรม/โครงการ', 9),
(42, 2, 'ระดับ 2 เป็นคณะกรรมการ/คณะทำงานโครงการบริหารวิชาการ', 9),
(43, 3, 'ระดับ 3 มีการดำเนินงานโครงการบริการวิชาการตามแผนที่กำหนด หรือเป็นวิทยากร/ผู้ทรงคุณวุฒิภายใน/ภายนอก หรืออาจารย์พิเศษภายใน/ภายนอก', 9),
(44, 4, 'ระดับ 4 มีการรายงานผลการบริการวิชาการหรือเผยแพร่ผลงานผ่านสื่อต่างๆ', 9),
(45, 5, 'ระดับ 5 ผ่านระดับ 4 และมีการปรับปรุงพัฒนาแผนการดำเนินการในปีต่อไป', 9),
(46, 1, 'ระดับ 1 มีการเข้าร่วมอย่างน้อย 1 กิจจกรรม/โครงการ', 10),
(47, 2, 'ระดับ 2 เป็นคณะกรรมการ/คณะทำงานโครงการ', 10),
(48, 3, 'ระดับ 3 มีการดำเนินงานโครงการตามแผนที่กำหนด', 10),
(49, 4, 'ระดับ 4 มีการรายงานผลการดำเนินการหรือเผยแพร่ผลงานผ่านสื่อต่าง ๆ', 10),
(50, 5, 'ระดับ 5 ผ่านระดับ 4 และมีการปรับปรุงพัฒนาแผนการดำเนินการในปีต่อไป', 10),
(51, 1, 'ระดับ 1 มีการเข้าร่วมกิจกรรม/โครงการ/งานต่าง ๆ ในระดับมหาวิทยาลัยและคณะ', 11),
(52, 2, 'ระดับ 2 มีคำสั่งแต่งตั้งเป็นคณะกรรมการดำเนินงาน 1 กิจกรรม/โครงการ/งาน', 11),
(53, 3, 'ระดับ 3 มีคำสั่งแต่งตั้งเป็นคณะกรรมการดำเนินงาน 2 กิจกรรม/โครงการ/งาน', 11),
(54, 4, 'ระดับ 4 มีคำสั่งแต่งตั้งเป็นคณะกรรมการดำเนินงาน 3 กิจกรรม/โครงการ/งาน หรือได้รับการแต่งตั้งให้เป็นประธานคณะทำงาน', 11),
(55, 5, 'ระดับ 5 ได้รับการแต่งตั้งให้เป็นประธานคณะทำงานโครงการและเป็นคณะทำงานโครงการอื่น ๆ หรือเป็นโครงการต่อเนื่อง', 11);

-- --------------------------------------------------------

--
-- Table structure for table `performance_fileupload`
--

CREATE TABLE `performance_fileupload` (
  `id` int(11) NOT NULL,
  `performance_id` varchar(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_fileupload`
--

INSERT INTO `performance_fileupload` (`id`, `performance_id`, `file_name`, `rate_id`) VALUES
(337, '2', '2_ประวัติการซ่อมห้อง Copy Print.pdf', 85),
(341, '1', '1_การพัฒนาทักษะการพิมพ์โดยใช้โปรแกรม Word.pdf', 85),
(344, '1', '1_การพัฒนาการทำงานประดิษฐ์ของนักเรียนชั้นม.2.pdf', 85),
(346, '1', '1_การใช้วิธีการสอนแบบเรียนปนเล่นเพื่อพัฒนาทักษะการพิมพ์งานของนักเรียน.pdf', 85),
(349, '1', '1_05.doc', 85),
(350, '1', '1_04.doc', 85),
(351, '1', '1_03R63.DOC', 85);

-- --------------------------------------------------------

--
-- Table structure for table `performance_score`
--

CREATE TABLE `performance_score` (
  `score_id` int(11) NOT NULL,
  `total_score_p` float NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_score`
--

INSERT INTO `performance_score` (`score_id`, `total_score_p`, `rate_id`) VALUES
(83, 70, 83),
(84, 62, 84),
(85, 0, 85),
(86, 0, 86);

-- --------------------------------------------------------

--
-- Table structure for table `performance_weight`
--

CREATE TABLE `performance_weight` (
  `id` int(11) NOT NULL,
  `weight_value` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_weight`
--

INSERT INTO `performance_weight` (`id`, `weight_value`, `performance_id`, `name`) VALUES
(1, 25, 1, 'ภาระงานรวม ภาคปกติ'),
(2, 5, 1, 'เอกสารประกอบการสอนหรือเอกสารคำสอนหรือตำรา'),
(3, 5, 3, 'การจัดกิจกรรมการเรียนการสอน'),
(4, 5, 4, 'ผลการบริหารหลักสูตร'),
(5, 5, 5, 'ด้านการพัฒนาตนเอง เพื่อการผลิตบัณฑิตที่พึงประสงค์'),
(6, 3, 6, 'จำนวนทุนสนับสนุนงานวิจัย'),
(7, 3, 7, 'การมีส่วนร่วมในงานวิจัยที่มีการดำเนินการ'),
(8, 4, 8, 'กระบวนการดำเนินการวิจัย'),
(9, 5, 9, 'การเข้าร่วมกิจกรรม/โครงการ และกระบวนการดำเนินงานบริการวิชาการ'),
(10, 5, 10, 'การเข้าร่วมกิจกรรมและรับผิดชอบโครงการทำนุบำรุงศิลปวัฒนธรรมของสาขาวิชา/คณะ/มหาวิทยาลัย'),
(11, 5, 11, 'ภาระงานอื่น ๆ ในระดับมหาวิทยาลัยและระดับคณะ');

-- --------------------------------------------------------

--
-- Table structure for table `personneltype`
--

CREATE TABLE `personneltype` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personneltype`
--

INSERT INTO `personneltype` (`id`, `name`) VALUES
(1, 'ข้าราชการ'),
(2, 'พนักงานมหาวิทยาลัย'),
(3, 'อาจารย์ประจำตามสัญญา');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL,
  `year` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `update` int(10) NOT NULL,
  `code_date` varchar(50) NOT NULL,
  `message1` text NOT NULL,
  `message2` text NOT NULL,
  `message3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `username`, `date`, `status`, `year`, `Semester`, `update`, `code_date`, `message1`, `message2`, `message3`) VALUES
(83, 'admin1', '2020-11-30 13:35:40', 3, '2563', '2', 1, 'Iop9s', 'ดีมาก', 'ดีมาก', 'ดีมาก'),
(84, 'admin3', '2020-11-30 14:39:26', 3, '2563', '2', 1, 'Iop9s', '123123', '132132', '132123'),
(85, 'admin1', '2020-12-07 11:03:39', 0, '2564', '1', 0, 'bGe2T', '', '', ''),
(86, 'admin2', '2020-12-07 13:33:38', 0, '2564', '1', 0, 'bGe2T', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rate_topic`
--

CREATE TABLE `rate_topic` (
  `rate_topic_id` int(11) NOT NULL,
  `performance1_1` int(11) NOT NULL,
  `performance2_1` int(11) NOT NULL,
  `performance2_2` int(11) NOT NULL,
  `performance2_3` int(5) NOT NULL,
  `performance2_4` int(11) NOT NULL,
  `performance3_1` int(11) NOT NULL,
  `performance3_2` int(11) NOT NULL,
  `performance3_3` int(11) NOT NULL,
  `performance4_1` int(11) NOT NULL,
  `performance5_1` int(11) NOT NULL,
  `performance6_1` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_topic`
--

INSERT INTO `rate_topic` (`rate_topic_id`, `performance1_1`, `performance2_1`, `performance2_2`, `performance2_3`, `performance2_4`, `performance3_1`, `performance3_2`, `performance3_3`, `performance4_1`, `performance5_1`, `performance6_1`, `rate_id`) VALUES
(83, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 83),
(84, 5, 5, 5, 3, 4, 4, 4, 4, 4, 4, 4, 84),
(85, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 85),
(86, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86);

-- --------------------------------------------------------

--
-- Table structure for table `setting_date`
--

CREATE TABLE `setting_date` (
  `id` int(2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `code_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_date`
--

INSERT INTO `setting_date` (`id`, `start_date`, `end_date`, `year`, `semester`, `code_date`) VALUES
(21, '2020-11-30 11:37:00', '2020-12-01 11:37:00', '2563', '2', 'Iop9s'),
(22, '2020-12-07 11:03:00', '2020-12-23 11:03:00', '2564', '1', 'bGe2T');

-- --------------------------------------------------------

--
-- Table structure for table `workload_file`
--

CREATE TABLE `workload_file` (
  `id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workload_file`
--

INSERT INTO `workload_file` (`id`, `rate_id`, `file_name`) VALUES
(30, 83, ''),
(31, 84, ''),
(32, 85, '1607313833_ภาระงาน.xlsx'),
(33, 86, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliated_agencies`
--
ALTER TABLE `affiliated_agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compentency_detail`
--
ALTER TABLE `compentency_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compentency_score`
--
ALTER TABLE `compentency_score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `managementposition`
--
ALTER TABLE `managementposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officialposition`
--
ALTER TABLE `officialposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_detail`
--
ALTER TABLE `performance_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_fileupload`
--
ALTER TABLE `performance_fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_score`
--
ALTER TABLE `performance_score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `performance_weight`
--
ALTER TABLE `performance_weight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personneltype`
--
ALTER TABLE `personneltype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_topic`
--
ALTER TABLE `rate_topic`
  ADD PRIMARY KEY (`rate_topic_id`);

--
-- Indexes for table `setting_date`
--
ALTER TABLE `setting_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workload_file`
--
ALTER TABLE `workload_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affiliated_agencies`
--
ALTER TABLE `affiliated_agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `compentency_detail`
--
ALTER TABLE `compentency_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `compentency_score`
--
ALTER TABLE `compentency_score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `managementposition`
--
ALTER TABLE `managementposition`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `officialposition`
--
ALTER TABLE `officialposition`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `performance_detail`
--
ALTER TABLE `performance_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `performance_fileupload`
--
ALTER TABLE `performance_fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `performance_score`
--
ALTER TABLE `performance_score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `performance_weight`
--
ALTER TABLE `performance_weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personneltype`
--
ALTER TABLE `personneltype`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `rate_topic`
--
ALTER TABLE `rate_topic`
  MODIFY `rate_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `setting_date`
--
ALTER TABLE `setting_date`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `workload_file`
--
ALTER TABLE `workload_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
