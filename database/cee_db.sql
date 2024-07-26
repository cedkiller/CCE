-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 04:02 AM
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
-- Database: `cee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_section` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_section`, `exmne_gender`, `exmne_birthdate`, `exmne_year_level`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
(4, 'Rogz Nunezsss', '26', 'male', '2019-11-15', 'third year', 'rogz.nunez2013@gmail.com', 'rogz', 'active'),
(5, 'Jane Rivera', '25', 'female', '2019-11-14', 'second year', 'jane@gmail.com', 'jane', 'active'),
(6, 'Glenn Duerme', '26', 'female', '2019-12-24', 'third year', 'glenn@gmail.com', 'glenn', 'active'),
(7, 'Maria Duerme', '26', 'female', '2018-11-25', 'second year', 'maria@gmail.com', 'maria', 'active'),
(8, 'Dave Limasac', '26', 'female', '2019-12-21', 'second year', 'dave@gmail.com', 'dave', 'active'),
(9, 'Cedrick Jasper R. Sarabia', '26', 'male', '2001-06-15', 'third year', 'cedrickjaspersarabia@gmail.com', 'raiden091717171', 'active'),
(10, 'Cid Kagenou', '67', 'male', '2001-07-16', 'fourth year', 'cidkagenou@gmail.com', 'raiden091717171', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(295, 4, 12, 25, 'Diode, inverted, pointer', 'old', '2019-12-07 02:52:14'),
(296, 4, 12, 16, 'Data Block', 'old', '2019-12-07 02:52:14'),
(297, 6, 12, 18, 'Programmable Logic Controller', 'old', '2019-12-05 12:59:47'),
(298, 6, 12, 9, '1850s', 'old', '2019-12-05 12:59:47'),
(299, 6, 12, 24, '1976', 'old', '2019-12-05 12:59:47'),
(300, 6, 12, 14, 'Operating System', 'old', '2019-12-05 12:59:47'),
(301, 6, 12, 19, 'WAN (Wide Area Network)', 'old', '2019-12-05 12:59:47'),
(302, 6, 11, 28, 'fds', 'new', '2019-12-05 12:04:28'),
(303, 6, 11, 29, 'sd', 'new', '2019-12-05 12:04:28'),
(304, 6, 12, 15, 'David Filo & Jerry Yang', 'new', '2019-12-05 12:59:47'),
(305, 6, 12, 17, 'System file', 'new', '2019-12-05 12:59:47'),
(306, 6, 12, 10, 'Field', 'new', '2019-12-05 12:59:47'),
(307, 6, 12, 9, '1880s', 'new', '2019-12-05 12:59:47'),
(308, 6, 12, 21, 'Temporary file', 'new', '2019-12-05 12:59:47'),
(309, 4, 11, 28, 'q1', 'new', '2019-12-05 13:30:21'),
(310, 4, 11, 29, 'dfg', 'new', '2019-12-05 13:30:21'),
(311, 4, 12, 16, 'Data Block', 'new', '2019-12-07 02:52:14'),
(312, 4, 12, 20, 'Plancks radiation', 'new', '2019-12-07 02:52:14'),
(313, 4, 12, 10, 'Report', 'new', '2019-12-07 02:52:14'),
(314, 4, 12, 24, '1976', 'new', '2019-12-07 02:52:14'),
(315, 4, 12, 9, '1930s', 'new', '2019-12-07 02:52:14'),
(316, 8, 12, 18, 'Programmable Lift Computer', 'new', '2020-01-05 03:18:35'),
(317, 8, 12, 14, 'Operating System', 'new', '2020-01-05 03:18:35'),
(318, 8, 12, 20, 'Einstein oscillation', 'new', '2020-01-05 03:18:35'),
(319, 8, 12, 21, 'Temporary file', 'new', '2020-01-05 03:18:35'),
(320, 8, 12, 25, 'Diode, inverted, pointer', 'new', '2020-01-05 03:18:35'),
(321, 9, 24, 33, 'if-else', 'new', '2024-03-24 02:51:52'),
(322, 9, 24, 35, 'string', 'new', '2024-03-24 02:51:52'),
(323, 9, 11, 29, 'q2', 'new', '2024-05-07 15:00:43'),
(324, 9, 11, 30, 'sd', 'new', '2024-05-07 15:00:43'),
(325, 9, 12, 14, 'Operating System', 'new', '2024-07-12 06:51:50'),
(326, 9, 12, 19, 'WAN (Wide Area Network)', 'new', '2024-07-12 06:51:50'),
(327, 9, 12, 9, '1850s', 'new', '2024-07-12 06:51:50'),
(328, 9, 12, 16, 'Database', 'new', '2024-07-12 06:51:50'),
(329, 9, 12, 20, 'Einstein oscillation', 'new', '2024-07-12 06:51:50'),
(330, 9, 26, 38, 'Paris', 'new', '2024-07-15 02:06:59'),
(331, 9, 26, 42, 'Pacific Ocean', 'new', '2024-07-15 02:06:59'),
(332, 9, 26, 40, 'Oxygen', 'new', '2024-07-15 02:06:59'),
(333, 9, 26, 39, 'William Shakespeare', 'new', '2024-07-15 02:06:59'),
(334, 9, 26, 41, 'Earth', 'new', '2024-07-15 02:07:00'),
(335, 9, 27, 43, 'Berlin', 'new', '2024-07-15 12:02:16'),
(336, 9, 27, 44, 'Oxygen', 'new', '2024-07-15 12:02:16'),
(337, 9, 28, 46, 'Oxygen', 'new', '2024-07-15 12:09:05'),
(338, 9, 28, 45, 'Berlin', 'new', '2024-07-15 12:09:05'),
(339, 9, 29, 48, 'Oxygen', 'new', '2024-07-16 00:51:47'),
(340, 9, 29, 47, 'Berlin', 'new', '2024-07-16 00:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(51, 6, 12, 'used'),
(52, 4, 11, 'used'),
(53, 4, 12, 'used'),
(54, 8, 12, 'used'),
(55, 9, 24, 'used'),
(56, 9, 11, 'used'),
(57, 9, 12, 'used'),
(58, 9, 26, 'used'),
(59, 9, 27, 'used'),
(60, 9, 28, 'used'),
(61, 9, 29, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1950s', '1880s', 'active'),
(10, 12, 'What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'Field', 'active'),
(14, 12, 'OS computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System', 'active'),
(15, 12, 'Who developed Yahoo?', 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang', 'active'),
(16, 12, 'DB computer abbreviation usually means ?', 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'Database', 'active'),
(17, 12, '.INI extension refers usually to what kind of file?', 'Image file', 'System file', 'Hypertext related file', 'Image Color Matching Profile file', 'System file', 'active'),
(18, 12, 'What does the term PLC stand for?', 'Programmable Lift Computer', 'Program List Control', 'Programmable Logic Controller', 'Piezo Lamp Connector', 'Programmable Logic Controller', 'active'),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)', 'active'),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', 'Blackbody radiation', 'Stimulated emission', 'Plancks radiation', 'Einstein oscillation', 'Stimulated emission', 'active'),
(21, 12, '.TMP extension refers usually to what kind of file?', 'Compressed Archive file', 'Image file', 'Temporary file', 'Audio file', 'Temporary file', 'active'),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', 'Inernet', 'Interanet', 'Local Area Network', 'Wide Area Network', 'Local Area Network', 'active'),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', '1976', '1972', '1980', '1984', '1972', 'active'),
(25, 12, 'What are three types of lasers?', 'Gas, metal vapor, rock', 'Pointer, diode, CD', 'Diode, inverted, pointer', 'Gas, solid state, diode', 'Gas, solid state, diode', 'active'),
(27, 15, 'asdasd', 'dsf', 'sd', 'yui', 'sdf', 'yui', 'active'),
(28, 11, 'Question 1', 'q1', 'asd', 'fds', 'ytu', 'q1', 'active'),
(29, 11, 'Question 2', 'asd', 'sd', 'q2', 'dfg', 'q2', 'active'),
(30, 11, 'Question 3', 'sd', 'q3', 'asd', 'fgh', 'q3', 'active'),
(31, 24, 'Who created the C# Programming Language', 'John Smith', 'Bill Gates', 'Anders Hejlsberg', 'None of the Above', 'Anders Hejlsberg', 'active'),
(32, 24, 'What variable that can handle only digit data with no decimal point', 'Double', 'Int', 'Float', 'String', 'Int', 'active'),
(33, 24, 'What syntax is the use of decision making', 'for', 'while', 'switch', 'if-else', 'if-else', 'active'),
(34, 24, 'What syntax is use for storing only one letter', 'char', 'string', 'boolean', 'none of the aboce', 'char', 'active'),
(35, 24, 'What syntax is use for storing your name', 'name', 'letter', 'string', 'none of the above', 'string', 'active'),
(38, 26, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'Paris', 'active'),
(39, 26, 'Who wrote the play \"Romeo and Juliet\"?', 'William Shakespeare', 'Charles Dickens', 'J.K. Rowling', 'Mark Twain', 'William Shakespeare', 'active'),
(40, 26, 'Which element has the chemical symbol O?', 'Oxygen', 'Gold', 'Osmium', 'Iron', 'Oxygen', 'active'),
(41, 26, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 'Mars', 'active'),
(42, 26, 'What is the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'Pacific Ocean', 'active'),
(43, 27, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'Paris', 'active'),
(44, 27, 'Which element has the chemical symbol \"O\"?', 'Oxygen', 'Gold', 'Osmium', 'Iron', 'Oxygen', 'active'),
(45, 28, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'Paris', 'active'),
(46, 28, 'Which element has the chemical symbol \"O\"?', 'Oxygen', 'Gold', 'Osmium', 'Iron', 'Oxygen', 'active'),
(47, 29, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'Paris', 'active'),
(48, 29, 'Which element has the chemical symbol O?', 'Oxygen', 'Gold', 'Osmium', 'Iron', 'Oxygen', 'active'),
(49, 30, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'Paris', 'active'),
(50, 30, 'Which element has the chemical symbol O?', 'Oxygen', 'Gold', 'Osmium', 'Iron', 'Oxygen', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `sec_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(11, 26, 'Duerms', '1', 2, 'qwe', '2019-12-05 12:03:21'),
(12, 26, 'Another Exam', '1', 5, 'Mabilisang Exam', '2019-12-04 15:19:18'),
(24, 26, 'ITPROG2 IT-102', '30', 5, 'Please answer this exam before the deadline', '2024-03-24 02:52:42'),
(31, 26, 'Bahalaka', '10', 1, 'sample', '2024-07-16 01:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
(7, 4, '', '', 'December 08, 2019'),
(8, 4, '', '', 'December 08, 2019'),
(9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sec_id` int(11) NOT NULL,
  `sec_name` varchar(1000) NOT NULL,
  `sec_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`sec_id`, `sec_name`, `sec_created`) VALUES
(25, 'BSHRM', '2019-11-27 09:26:08'),
(26, 'BSIT', '2019-11-25 13:22:42'),
(67, 'IT-402', '2024-07-15 01:18:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
