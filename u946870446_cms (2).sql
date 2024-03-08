-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2023 at 04:32 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u946870446_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `name`, `addedby`) VALUES
(13, 'April-12-2023 20:53:06', 'adminn', '12345', 'AdminCJ', 'Criston Jade'),
(15, 'May-10-2023 22:42:53', 'admin', '12345', 'anthony', 'he');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `first_name` text NOT NULL,
  `mi` varchar(5) NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `zip` text NOT NULL,
  `region` text NOT NULL,
  `time_start` text NOT NULL,
  `time_end` text NOT NULL,
  `trainer` text NOT NULL,
  `date` text DEFAULT NULL,
  `status` varchar(25565) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user`, `first_name`, `mi`, `last_name`, `email`, `contact`, `address`, `zip`, `region`, `time_start`, `time_end`, `trainer`, `date`, `status`) VALUES
(63, 'guest', 'Anthony', '', 'Elizalde', 'ab.elizalde434@lms.wmsu.edu.ph', '09067546208', 'canelar moret', '7000', 'Zamboanga del Sur', '07:00 AM', '07:00 AM', 'ueue', '2023-05-18', 'approved'),
(64, 'guest', 'Anthony', '', 'Elizalde', 'anthonyelizalde6@gmail.com', '09067546208', 'canelar moret', '7000', 'Zamboanga del Sur', '07:00 AM', '07:00 AM', 'ueue', '2023-05-17', 'approved'),
(65, 'guest', 'faix', '', 'zuura', 'habibonfaizer6@gmail.com', '09554613152', 'zc', '7000', 'Zamboanga del Norte', '07:00 AM', '10:00 AM', 'Ashy boy', '2023-05-10', 'approved'),
(70, 'guest', 'Criston', '', 'Enolpe', 'cristonjade@gmail.com', '91241248412', 'Cabs', '7000', 'Zamboanga del Sur', '07:00 AM', '09:00 AM', 'Ashy boy', '2023-09-20', 'pending'),
(71, 'guest', 'peter', '', 'parker', 'cristonjade@gmail.com', '91241248412', 'canelar', '7000', 'Zamboanga del Sur', '08:00 AM', '12:00 PM', 'Ashy boy', '2023-05-25', 'approved'),
(72, 'guest', 'Art', '', 'Contero', 'art.contero01@gmail.com', '0999995149', 'Tokyo, Japan', '150-0002', 'Zamboanga del Sur', '07:00 AM', '04:00 PM', 'Mr. Gucela', '2023-05-25', 'approved'),
(73, 'guest', 'Elijah', 'A.', 'Alfonso', 'elijahalfonso5149@gmail.com', '09999995149', 'Tokyo, Japan', '150-0002', 'Zamboanga del Sur', '07:00 AM', '04:00 PM', 'Mr. Gucela', '2023-05-24', 'approved'),
(74, 'guest', 'Criston', 'B.', 'Enolpe', 'cristonjade@gmail.com', '09374747191', 'Cabaluay', '7000', 'Zamboanga del Sur', '', '', '', '2023-05-27', 'approved'),
(75, 'guest', 'Anthony', 'B.', 'Elizalde', 'anthonyelizalde6@gmail.com', '0928282911', 'Canelar', '7000', 'Zamboanga del Sur', '', '', '', '2023-05-31', 'approved'),
(76, 'guest', 'Mina', 'alid', 'habibon', 'habibonshermina@gmail.com', '09567190788', 'Talon-Talon ', '7000', 'Zamboanga del Norte', '', '', '', '2023-05-27', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `title` varchar(60) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(12, 'Trainings', 'Criston Jade', 'April-14-2023 08:20:18'),
(13, 'Feature', 'Criston Jade', 'April-14-2023 08:20:25'),
(14, 'Editorial', 'Criston Jade', 'April-14-2023 08:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `DateT` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `phone`, `DateT`) VALUES
(103, 'Aranas', 'fafa@gmail.com', 'fafaf', 'fafaaa', '09367040023', '0000-00-00 00:00:00.000000'),
(105, 'hehe', 'hehe@yahoo.com', 'hehe', 'hehe', 'hehe', '0000-00-00 00:00:00.000000'),
(106, 'test', 'testuser@yahoo.com', 'test', 'test', '123', '0000-00-00 00:00:00.000000'),
(107, 'hehe', 'farabser@gmail.com', 'testtest', 'test', '1231231232', '0000-00-00 00:00:00.000000'),
(109, 'ahweawhe', 'awehaweh@yahoo.com', 'hawehwa', 'aweha', 'aweha23a323', '0000-00-00 00:00:00.000000'),
(110, 'ahweawhe', 'awehaweh@yahoo.com', 'hawehwa', 'aweha', 'aweha23a323', '0000-00-00 00:00:00.000000'),
(112, 'test', 'farabser@gmail.com', 'test', 'test', '123', '0000-00-00 00:00:00.000000'),
(113, 'test', 'testuser@yahoo.com', 'test', 'test', '123123', '0000-00-00 00:00:00.000000'),
(114, 'test', 'testuser@yahoo.com', 'test', 'test', '123123', '0000-00-00 00:00:00.000000'),
(115, 'test', 'testuser@yahoo.com', 'test', 'test', '123123', '0000-00-00 00:00:00.000000'),
(116, 'hehe', 'farabser@gmail.com', 'test', 'asd', 'test', '0000-00-00 00:00:00.000000'),
(117, 'hehe', 'farabser@gmail.com', 'test', 'asd', 'test', '0000-00-00 00:00:00.000000'),
(118, 'hehe', 'farabser@gmail.com', 'zxc', 'zxc', '12345', '0000-00-00 00:00:00.000000'),
(119, 'hehe', 'farabser@gmail.com', 'zxc', 'zxc', '12345', '0000-00-00 00:00:00.000000'),
(120, 'hehe', 'ahmad@gmail.com', 'test', 'test', '12345', '0000-00-00 00:00:00.000000'),
(122, 'test', 'farabser@gmail.com', 'test', 'test', 'test', '0000-00-00 00:00:00.000000'),
(123, 'Anthony', 'anthonyelizalde6@gmail.com', 'ahsdahwd', 'asldhashd', '09067546208', '0000-00-00 00:00:00.000000'),
(124, 'Anthony', 'anthonyelizalde6@gmail.com', 'ahsdahwd', 'asldhashd', '09067546208', '0000-00-00 00:00:00.000000'),
(126, 'Anthony', 'anthonyelizalde6@gmail.com', 'fafa', 'fafafa', '09067546208', '0000-00-00 00:00:00.000000'),
(128, 'Mochi', 'art.contero01@gmail.com', 'Subject', 'Message', '482883847573', '0000-00-00 00:00:00.000000'),
(129, 'Mochi', 'art.contero01@gmail.com', 'Subject', 'Message', '482883847573', '0000-00-00 00:00:00.000000'),
(130, 'Elijah Alfonso', 'elijahalfonso5149@gmail.com', 'Subject', 'Message ', '09999995140', '0000-00-00 00:00:00.000000'),
(131, 'Elijah Alfonso', 'elijahalfonso5149@gmail.com', 'Subject', 'Message ', '09999995140', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id` int(255) NOT NULL,
  `dataset_title` text NOT NULL,
  `datetime` text NOT NULL,
  `added_by` text NOT NULL,
  `abstract` text NOT NULL,
  `author` text NOT NULL,
  `view_count` int(255) NOT NULL,
  `file_name` text NOT NULL,
  `file_loc` varchar(25565) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `dataset_title`, `datetime`, `added_by`, `abstract`, `author`, `view_count`, `file_name`, `file_loc`) VALUES
(1, 'Data analytics', 'May-27-2023 17:14:01', 'AdminCJ', ' The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations. Firstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment. Next, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.', 'lander', 0, 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', ''),
(2, 'Bio-Oil Production', 'May-27-2023 17:14:51', 'AdminCJ', ' The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations. Firstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment. Next, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.', 'aranas', 0, 'Case7 (2) (2).docx', ''),
(3, 'lander', 'May-27-2023 17:15:13', 'AdminCJ', ' The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations. Firstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment. Next, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.', 'lander', 0, 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', ''),
(4, 'data analytics ', 'May-27-2023 17:16:56', 'AdminCJ', ' The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations. Firstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment. Next, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.', 'Maam lucy', 0, 'Lesson5-E-COMMERCE-PAYMENT-SYSTEMS (1).pdf', ''),
(5, 'The Impact of Artificial Intelligence on Healthcare: A Comprehensive Analysis', 'May-27-2023 07:57:53', 'AdminCJ', 'The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations.\r\n\r\nFirstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment.\r\n\r\nNext, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.', 'ZURA', 0, 'SERDAC WITH CMS(LETTER SIZE).pdf', 'upload/SERDAC WITH CMS(LETTER SIZE).pdf'),
(8, 'cute si faizer sobra', 'May-27-2023 08:39:02', 'AdminCJ', 'The integration of artificial intelligence (AI) technologies into the healthcare sector has brought forth significant advancements and transformative possibilities. This abstract provides a comprehensive analysis of the impact of AI on healthcare, examining its applications, benefits, challenges, and ethical considerations.\r\n\r\nFirstly, the abstract explores the various domains within healthcare where AI has been implemented. These include medical diagnosis, predictive analytics, personalized medicine, drug discovery, robotic surgery, and health monitoring systems. It highlights the potential of AI to enhance accuracy, efficiency, and outcomes in patient care, disease detection, and treatment.\r\n\r\nNext, the abstract delves into the benefits of AI in healthcare. It discusses how AI algorithms can analyze large volumes of medical data, such as electronic health records and medical imaging, to extract meaningful insights and assist healthcare professionals in making informed decisions. Additionally, it explores AI\'s ability to identify patterns, predict disease progression, and optimize treatment plans, leading to improved patient outcomes and personalized healthcare.\r\n\r\nHowever, the abstract also acknowledges the challenges associated with AI implementation in healthcare. It addresses concerns related to data privacy, security, and the need for robust regulatory frameworks to ensure patient safety and ethical use of AI technologies. Furthermore, it explores the potential impact on healthcare professionals\' roles and the importance of maintaining human oversight and accountability in AI-driven healthcare systems.', 'fafaafaf', 0, 'Habibon_Faizer_LabActivity01.pdf', 'upload/Habibon_Faizer_LabActivity01.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `code` text NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `code`, `title`, `message`, `datetime`) VALUES
(11, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-11 04:06:27'),
(12, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-11 04:07:10'),
(13, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-11 04:08:03'),
(14, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-11 05:01:39'),
(15, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-11 05:02:07'),
(16, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-17 22:02:03'),
(17, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-17 22:02:03'),
(18, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-18 09:18:47'),
(19, 'user_registration', '<div class=\"preview-icon bg-success\"> \r\n    <i class=\"ti-quote-left mx-0\"> \r\n    </i> \r\n    </div>', 'User inquiry!', 'A user has sent an inquiry!', '2023-05-18 09:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(50) NOT NULL,
  `bool` int(1) NOT NULL DEFAULT 1,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `post` varchar(3000) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `bool`, `datetime`, `title`, `category`, `author`, `image`, `date`, `post`, `view`) VALUES
(26, 0, 'May-05-2023 20:30:02', 'The COMELEC #GAD & Education and Information Department successfully conducted a seminar at Western Mindanao State University.', 'Feature', 'Criston Jade', 'DnioWC2U8AAcOFM.jpg', 'May-05-2023 20:30:02', ' The COMELEC #GAD & Education and Information Department, in coordination with ORED Region IX & Office of City Election Officer, Zamboanga City successfully conducted a #VoterEd #KEBs or Know Elections Better seminar at Western Mindanao State University (WMSU) today, 20 Sept 2018.', 56),
(28, 0, 'May-05-2023 20:49:31', 'DOST PCAARRD-funded project \"SERDAC-WMSU Satellite\"', 'Editorial', 'Criston Jade', 'SERDAC.jpg', 'May-05-2023 20:49:31', ' DOST PCAARRD-funded project \"SERDAC-WMSU Satellite\"', 65),
(29, 0, 'May-08-2023 01:14:44', 'Statistics Clinic Consultation', 'gallery', 'he', 'sic1.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(30, 0, 'May-08-2023 01:18:17', 'Statistics Clinic Consultation', 'gallery', 'he', 'sic2.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(31, 0, 'May-08-2023 01:20:26', 'Statistics Clinic Consultation 3', 'gallery', 'he', 'sic3.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(32, 0, 'May-08-2023 01:24:15', 'Statistics Clinic Consultation 4', 'gallery', 'he', 'sic4.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(33, 0, 'May-08-2023 01:26:14', 'Statistics Clinic Consultation 5', 'gallery', 'he', 'sic5.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(34, 0, 'May-08-2023 01:26:26', 'Statistics Clinic Consultation 6', 'gallery', 'he', 'sic6.jpg', 'March 14,2023', 'WMSU graduating students, WMSU-SERDAC, Mathematical and Statistical Society', 0),
(36, 1, 'May-11-2023 11:44:00', 'Data analytic trainings', 'Trainings', 'he', 'our mission.jpg', 'May-11-2023 11:44:00', ' The WMSU Satellite SERDACconducted a training to raise awareness regarding managing, analyzing .....', 20),
(41, 1, 'May-11-2023 13:33:27', 'Data Analytics Training', 'Trainings', 'AdminCJ', 'sic6.jpg', 'May-11-2023 13:33:27', ' Test Training', 28),
(42, 1, 'May-11-2023 13:46:18', 'Machine learning', 'Trainings', 'AdminCJ', 'sic4.jpg', 'May-11-2023 13:46:18', ' machine learning training ', 42),
(43, 1, 'May-23-2023 02:30:26', 'JOURNEY TO INC', 'Editorial', 'AdminCJ', 'Gphoto1.jpg', 'May-23-2023 02:30:26', 'A firm that strives hard to achieve and provides ultimate and beneficial websites, that meets client\'s satisfactory.', 33);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `Affiliation` text NOT NULL,
  `Occupation` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `purpose` text NOT NULL,
  `dataset` text NOT NULL,
  `dataset_id` text NOT NULL,
  `file_name` text NOT NULL,
  `file_loc` text NOT NULL,
  `author` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `first_name`, `last_name`, `Affiliation`, `Occupation`, `email`, `purpose`, `dataset`, `dataset_id`, `file_name`, `file_loc`, `author`, `created_at`, `status`) VALUES
(1, 'faizer', 'habibon', 'wmsu', 'student', 'habibonfaizer6@gmail.com', 'fafa', 'lander', '3', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-18 20:16:01', 'approved'),
(2, 'faizer', 'fafa', 'wmsu', 'student', 'fafa@gmail.com', 'fafa', 'Bio-Oil', '2', 'Case7 (2) (2).docx', '', 'aranas', '2023-05-18 17:36:04', 'pending'),
(3, 'faizer', 'habibon', 'wmsu', 'student', 'habibonfaizer6@gmail.com', 'i just need the file', 'Bio-Oil', '2', 'Case7 (2) (2).docx', '', 'aranas', '2023-05-27 03:35:46', 'approved'),
(15, 'faizer', 'habibon', 'wmsu', 'cute', 'habibonfaizer6@gmail.com', 'fafa', 'lander', '3', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-18 19:43:36', 'approved'),
(16, 'faizer', 'habibon', 'wmsu', 'cute', 'habibonfaizer6@gmail.com', 'having the file would give us  the opprtunity to widen and prolong our research ...', 'data', '4', 'Lesson5-E-COMMERCE-PAYMENT-SYSTEMS (1).pdf', '', 'Maam', '2023-05-19 08:38:02', 'approved'),
(17, 'Lander', 'Gucela', 'WMSU', 'Student', 'mtth3w9@gmail.com', 'nusabe iyo', 'Data', '1', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-19 07:55:52', 'approved'),
(18, 'faiz', 'habibon', 'WMSU', 'student', 'habibonfaizer6@gmail.com', 'i need the file', 'data', '4', 'Lesson5-E-COMMERCE-PAYMENT-SYSTEMS (1).pdf', '', 'Maam', '2023-05-19 08:37:09', 'approved'),
(20, 'Rage', 'Hayashi', 'Nidaw', 'Nudaw', 'ragehayashi@gmail.com', 'Nayswaaaaaan', 'Data', '1', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-27 03:55:04', 'rejected'),
(21, 'raykell', 'Olivar', 'WMSU', 'student', 'elijahalfonso5149@gmail.com', 'i need the fi;e', 'Bio-Oil', '2', 'Case7 (2) (2).docx', '', 'aranas', '2023-05-25 06:51:41', 'approved'),
(22, 'Mina', 'habibon', 'wmsu', 'student', 'habibonshermina@gmail.com', 'ewan', 'Data', '1', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-27 04:38:58', 'approved'),
(23, 'Mina', 'habibon', 'wmsu', 'student', 'habibonshermina@gmail.com', 'ssob', 'Bio-Oil', '2', 'Case7 (2) (2).docx', '', 'aranas', '2023-05-27 04:43:07', 'approved'),
(24, 'Mina', 'habibon', 'wmsu', 'student', 'habibonshermina@gmail.com', 'retsam', 'lander', '3', 'IT-134-PERFORMANCED-BASED-ASSESSMENT (2) (11) (2).pdf', '', 'lander', '2023-05-27 04:44:49', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `trainer_name` text NOT NULL,
  `added_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainer_name`, `added_by`) VALUES
(2, 'Mr. Habibon', 'Criston Jade'),
(4, 'Mr. Gucela', 'AdminCJ'),
(7, 'Ms. Oliver', 'he');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `training_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `training_date` varchar(50) NOT NULL,
  `training_dateEnd` varchar(50) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `trainingImg` varchar(80) NOT NULL,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`training_id`, `trainer_id`, `title`, `description`, `start_time`, `end_time`, `training_date`, `training_dateEnd`, `venue`, `trainingImg`, `is_shown`) VALUES
(1, 4, 'Machine Learning Training', ' Machine Learning for Arduino Teaching ', '07:00 AM', '09:00 AM', '2023-05-19', '', 'WMSU-CCS Building', 'GPT4.jpg', 1),
(3, 4, 'TEST TRAINING #1', 'Test Training #1 UNCHECKED', '11:00 AM', '08:00 AM', '', '', 'WMSU SCHOOL', '', 0),
(4, 2, 'Statistical Analysis Training', ' Making Sense of Data (DS101) ... This Statistical Analysis and Data Training Course is aimed at  ', '08:00 AM', '10:00 AM', '2023-05-27', '2023-05-31', 'WMSU-SERDAC Building', 'Statistical Analysis.jpg', 0),
(9, 7, 'New Training', '   ANY  ', '09:00 AM', '01:00 PM', '2023-05-27', '2023-05-29', ' RESEARCH CENTER', 'serdac project team.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_details`
--

CREATE TABLE `training_details` (
  `training_id` int(20) NOT NULL,
  `num_participants` int(120) NOT NULL,
  `max_participants` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_details`
--

INSERT INTO `training_details` (`training_id`, `num_participants`, `max_participants`) VALUES
(1, 0, 3),
(3, 0, 20),
(4, 2, 3),
(9, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `training_list`
--

CREATE TABLE `training_list` (
  `participant_id` int(20) NOT NULL,
  `training_id` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `occupation` varchar(80) NOT NULL,
  `affiliation` varchar(80) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `join_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_list`
--

INSERT INTO `training_list` (`participant_id`, `training_id`, `fname`, `mname`, `lname`, `email`, `contact`, `occupation`, `affiliation`, `trainer_id`, `status`, `join_date`) VALUES
(12, 4, 'Lander Matthew', '', 'Gucela', 'landerpro@gmail.com', '936147147', 'Student', 'WMSU', 4, 'approved', ''),
(13, 4, 'Marie Veron ', 'C. ', 'Orsabia', 'marieverycute@gmail.com', '2147483647', 'Student', 'WMSU', 4, 'approved', ''),
(14, 4, 'Elijah ', 'M', 'Alfonso', 'elijahalfonso5149@gmail.com', '2147483647', 'Coordinator ', 'PMA', 4, 'pending', ''),
(16, 1, 'Elijah ', 'M.', 'Alfonso', 'elijahalfonso5149@gmail.com', '2147483647', 'Coordinator ', 'PMA', 4, 'pending', ''),
(23, 1, 'faizer', 'a', 'habibon', 'habibonfaizer6@gmail.com', '093694189421', 'student', 'wmsu', 4, 'pending', ''),
(24, 1, 'faizer', 'a', 'habibon', 'habibonfaizer6@gmail.com', '1111', 'student', 'wmsu', 4, 'pending', ''),
(25, 1, 'faizer', 'A', 'habibon', 'habibonfaizer6@gmail.com', '093694189421', 'student', 'wmsu', 4, 'pending', ''),
(26, 1, 'faizer', 'A', 'habibon', 'habibonfaizer6@gmail.com', '093694189421', 'student', 'wmsu', 4, 'pending', ''),
(27, 1, 'faizer', 'A', 'habibon', 'habibonfaizer6@gmail.com', '093694189421', 'student', 'wmsu', 4, 'pending', ''),
(28, 4, 'zura', 'A', 'komosan', 'habibonfaizer6@gmail.com', '093694189421', 'student', 'wmsu', 4, 'pending', ''),
(29, 9, 'Johan', '', 'Felix', 'johannpeck20@gmail.com', '09917263910', 'Professional', 'WMSU, WESMAARRDEC', 7, 'approved', ''),
(30, 9, 'JOHAN', 'B', 'FELIX', 'johannpeck20@gmail.com', '0957289357892', 'Student', 'WMSU', 7, 'approved', ''),
(31, 1, 'Criston Jade', 'B', 'Enolpe', 'cristonjade@gmail.com', '0907472721', 'Student', 'WMSU', 4, 'pending', ''),
(32, 1, 'Elijah ', '', 'Alfonso', 'elijahalfonso5149@gmail.com', '1234567890', 'Occupation', 'Affiliation', 4, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `MI` varchar(20) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `MI`, `lastname`, `email`, `password`, `code`, `date`, `status`) VALUES
(28, 0, '', '', 'anthony', 'anthonyelizalde6@gmail.com', 'Nariangle123', '', '2023-05-18 17:02:07', 'active'),
(30, 0, 'shy', 'A.', 'Shyshy', 'shyniemarh@gmail.com', 'zuraqt', '', '2023-05-27 09:32:28', 'active'),
(43, 0, '', '', '2005751349<table></table>', 'jaydee.ballaho@wmsu.edu.ph', '            ', '9df78d4d12d9d87a4850c55638d209a9', '2023-05-19 08:15:33', 'active'),
(44, 0, '', '', 'Johan', 'johannpeck20@gmail.com', 'johan123', '', '2023-05-19 08:15:10', 'active'),
(47, 0, 'Criston Jade', 'B', 'Enolpe', 'cristonjade@gmail.com', 'admincj', '', '2023-05-22 11:56:10', 'active'),
(48, 0, 'Rage', 'F', 'Hayashi', 'ragehayashi@gmail.com', 'hayashi123', '', '2023-05-23 03:08:28', 'active'),
(50, 0, 'Nur', 'B', 'Balla', 'qb202101252@wmsu.edu.ph', 'balla123', '021bb10dce0205d4e345bfa5970d2c1c', '2023-05-23 12:30:23', 'active'),
(51, 0, 'raykell', 'L', 'Olivar', 'elijahalfonso5149@gmail.com', 'olivar', '', '2023-05-25 06:43:49', 'active'),
(52, 0, 'Mina', 'alid', 'habibon', 'habibonshermina@gmail.com', 'zys050605', '', '2023-05-27 04:33:59', 'active'),
(53, 0, 'faizer', 'Alid', 'habibon', 'habibonfaizer6@gmail.com', 'zura', '', '2023-05-27 10:11:29', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`training_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `training_details`
--
ALTER TABLE `training_details`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `training_list`
--
ALTER TABLE `training_list`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `training_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training_details`
--
ALTER TABLE `training_details`
  MODIFY `training_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training_list`
--
ALTER TABLE `training_list`
  MODIFY `participant_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_details`
--
ALTER TABLE `training_details`
  ADD CONSTRAINT `training_details_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_list`
--
ALTER TABLE `training_list`
  ADD CONSTRAINT `training_list_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `training_list_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
