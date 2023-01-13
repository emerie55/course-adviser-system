-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 11:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sub_zero`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_point`
--

CREATE TABLE IF NOT EXISTS `a_point` (
`id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `day` varchar(15) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `strtime` varchar(20) NOT NULL,
  `endtime` varchar(20) NOT NULL,
  `lecturer_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_point`
--

INSERT INTO `a_point` (`id`, `level`, `programme`, `semester`, `day`, `hall`, `strtime`, `endtime`, `lecturer_name`) VALUES
(5, 'HND1', 'EVENING', 'First Semester', 'Thursday', 'Hall 4', '10 A.M', '12 P.M', 'emerie@gmail.com'),
(8, 'HND2', 'MORNING', 'Second Semester', 'Monday', 'Hall 3', '10 A.M', '12 P.M', 'Mr Omokpo C');

-- --------------------------------------------------------

--
-- Table structure for table `chatuser`
--

CREATE TABLE IF NOT EXISTS `chatuser` (
  `user_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatuser`
--

INSERT INTO `chatuser` (`user_id`, `fullname`, `phone`, `email`, `status`) VALUES
('::1', 'Innocent Chiamaka Jane', '18EH/0040/CS', 'chi@gmail.com', '0'),
('::1', 'Innocent Chiemerie Feargod', '18EH/0200/CS', 'feargod@gmail.com', '0'),
('::1', 'Okonkwo Anthony', '18H/0065/CS', 'anthony@gmail.com', '0'),
('::1', 'Okereafor Anthony Chinonso', '18H/0083/CS', 'anthony@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `give_assign`
--

CREATE TABLE IF NOT EXISTS `give_assign` (
`id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `programme` varchar(15) NOT NULL,
  `assign_name` varchar(20) NOT NULL,
  `deadline` varchar(30) NOT NULL,
  `upload` varchar(200) NOT NULL,
  `date_given` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`id` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `inf` text NOT NULL,
  `date` varchar(70) NOT NULL,
  `lecturer_name` text NOT NULL,
  `course_code` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `level`, `programme`, `semester`, `inf`, `date`, `lecturer_name`, `course_code`) VALUES
(1, 'HND2', 'EVENING', '', 'The Assignment 2 will be submitted with your 20 leaves class assignment.', '23/Aug/2019', 'Steve Nduka', 'COM416'),
(2, 'HND1', 'EVENING', 'First Semester', 'Hi students, there will be a meeting by 10:00 AM on monday at PV4, don''t be late.', '20/Aug/2020', 'Mr Innocent', ''),
(4, 'HND1', 'EVENING', 'First Semester', 'i will be in school today, come with your dues.', '01/Jan/1980', 'Mr Innocent', ''),
(13, 'HND2', 'MORNING', 'Second Semester', 'there will be a meeting', '05/Mar/2021', 'Mr Omokpo C', '');

-- --------------------------------------------------------

--
-- Table structure for table `lect_rer`
--

CREATE TABLE IF NOT EXISTS `lect_rer` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_tit` text NOT NULL,
  `semester` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lect_rer`
--

INSERT INTO `lect_rer` (`id`, `name`, `course_code`, `course_tit`, `semester`, `username`, `password`) VALUES
(2, 'Mr Chiemerie', 'HND1', 'EVENING', 'First Semester', 'emerie', 'emerie55'),
(3, 'Mr Innocent', 'HND1', 'EVENING', 'First Semester', 'inno', '1234'),
(4, 'Mr Omokpo C', 'HND2', 'MORNING', 'Second Semester', 'omokpo', 'omo55');

-- --------------------------------------------------------

--
-- Table structure for table `livechat`
--

CREATE TABLE IF NOT EXISTS `livechat` (
`id` int(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `reciever` varchar(100) NOT NULL DEFAULT 'admin',
  `message` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unread',
  `reply` varchar(50) NOT NULL DEFAULT 'not replied'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livechat`
--

INSERT INTO `livechat` (`id`, `sender`, `reciever`, `message`, `status`, `reply`) VALUES
(17, '::1', 'admin', 'hi', 'read', 'not replied'),
(18, 'admin', '::1', 'hello', 'read', 'not replied'),
(19, '::1', 'admin', 'sir', 'read', 'not replied'),
(20, '::1', 'admin', 'say something', 'read', 'not replied');

-- --------------------------------------------------------

--
-- Table structure for table `st`
--

CREATE TABLE IF NOT EXISTS `st` (
`id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `level` text NOT NULL,
  `programme` text NOT NULL,
  `semester` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `assign_num` varchar(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass_w` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st`
--

INSERT INTO `st` (`id`, `student_id`, `reg_num`, `Name`, `level`, `programme`, `semester`, `picture`, `status`, `assign_num`, `email`, `pass_w`, `phone`) VALUES
(1, 'HND2/2019/7169217', '17EH/0127/CS', 'Ononogbo Kolade', 'HND2', 'EVENING', '', 'students/k@gmail.com/download.jpg', '', '0', 'k@gmail.com', 'kk', ''),
(3, 'HND2/2020/8603224', '', 'Innocent Chiemerie', 'HND2', 'EVENING', 'Second Semester', 'students/jcworld@gmail.com/20140525-0010.jpeg', '', '0', 'jcworld@gmail.com', '1234', ''),
(4, 'HND1/1980/1177455', '18EH/0200/CS', 'Innocent Chiemerie Feargod', 'HND1', 'EVENING', 'First Semester', 'students/feargod@gmail.com/20140525-0010.jpeg', '', '0', 'feargod@gmail.com', 'ffff', '0906229245'),
(5, 'HND2/2021/4590812', '18H/0083/CS', 'Okereafor Anthony Chinonso', 'HND2', 'MORNING', 'Second Semester', 'students/anthony@gmail.com/20140416-0001.jpeg', '', '0', 'anthony@gmail.com', 'anht55', '08134786457');

-- --------------------------------------------------------

--
-- Table structure for table `submit_ted`
--

CREATE TABLE IF NOT EXISTS `submit_ted` (
`id` int(11) NOT NULL,
  `sname` text NOT NULL,
  `assign_name` varchar(100) NOT NULL,
  `upload` varchar(10000) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `score` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_ted`
--

INSERT INTO `submit_ted` (`id`, `sname`, `assign_name`, `upload`, `programme`, `level`, `semester`, `date`, `student_id`, `status`, `score`) VALUES
(6, 'Ononogbo Kolade', 'Assignment 1', 'k@gmail.com/COMPILER CONSTRUCTION PRACTICAL ASSIGNMENT OUTPUTS.pdf', 'EVENING', 'HND2', '', '16/Aug/2019 09:23:57pm', 'HND2/2019/7169217', 'Marked', '2/10'),
(12, 'Mr Innocent', 'No reg Number', 'please sir, i can''t get my reg number', 'EVENING', 'HND1', 'First Semester', '03/Jan/1980 11:55:16am', 'HND1/1980/1177455', 'Replied', 'Please go to your registration officer and lay the complain.'),
(13, 'Innocent Chiemerie Feargod', 'Am going home', 'how things, no things no things', 'EVENING', 'HND1', 'First Semester', '04/Jan/1980 08:05:08am', 'HND1/1980/1177455', 'Replied', 'ok'),
(15, 'Mr Chiemerie', 'sick', 'am sick sir and can''t make it today', 'EVENING', 'HND1', 'First Semester', '24/Feb/2021 09:47:19pm', 'HND1/2020/9364325', 'No Reply', ''),
(16, 'Innocent Chiemerie Feargod', 'ommition of Reslut', 'sir please i don''t have a score in computer graphics (com412).', 'EVENING', 'HND1', 'First Semester', '03/Mar/2021 09:09:25pm', 'HND1/1980/1177455', 'Replied', 'ok, i will work on it and get back to you.'),
(17, 'Okereafor Anthony Chinonso', 'test score', 'my test score is not avaliable', 'MORNING', 'HND2', 'Second Semester', '05/Mar/2021 09:24:25pm', 'HND2/2021/4590812', 'Replied', 'ok i will look into it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_point`
--
ALTER TABLE `a_point`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `give_assign`
--
ALTER TABLE `give_assign`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lect_rer`
--
ALTER TABLE `lect_rer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livechat`
--
ALTER TABLE `livechat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st`
--
ALTER TABLE `st`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_ted`
--
ALTER TABLE `submit_ted`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_point`
--
ALTER TABLE `a_point`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `give_assign`
--
ALTER TABLE `give_assign`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lect_rer`
--
ALTER TABLE `lect_rer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `livechat`
--
ALTER TABLE `livechat`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `st`
--
ALTER TABLE `st`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submit_ted`
--
ALTER TABLE `submit_ted`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
