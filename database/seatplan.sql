-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 08:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seatplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE IF NOT EXISTS `attendences` (
`id` int(11) NOT NULL,
  `exam_routine_id` int(11) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `present` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
`batch_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `section` varchar(45) DEFAULT NULL,
  `semester` varchar(45) NOT NULL,
  `total_student` varchar(45) NOT NULL,
  `start_reg` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_no`, `section`, `semester`, `total_student`, `start_reg`) VALUES
(1, 40, NULL, '1C', '35', '2011331001'),
(2, 39, NULL, '2C', '35', '2011331001'),
(3, 38, 'A', '3C', '240', '2011331001');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_title` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `credit` decimal(2,1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_title`, `semester`, `credit`) VALUES
(10, 'CSE-1111', 'STRUCTURED PROGRAMMING LANGUAGE', '1C', '3.0'),
(11, 'EEE-1111', 'ELECTRONICS', '1C', '3.0'),
(12, 'ENG-1111', 'ENGLISH LANGUAGE', '1C', '3.0'),
(13, 'MAT-1111', 'MATHEMATICS', '1C', '3.0'),
(14, 'ART-2213', 'ARCHITECTURE', '1C', '3.0'),
(15, 'CSE-1213', 'DISCRETE MATHEMATICS', '2C', '3.0'),
(16, 'CSE-1215', 'JAVA ', '2C', '3.0'),
(17, 'MAT-1213', 'CALCULUS', '2C', '3.0'),
(18, 'EEE-1215', 'ELECTRONICS DEVICES & CIRCUITS', '2C', '3.0'),
(19, 'CSE-1315', 'COMPUTER', '3C', '3.0'),
(20, 'MAT-1315', 'MATHEMATICS', '3C', '3.0'),
(21, 'ENG-1311', 'ENGLISH', '3C', '3.0'),
(22, 'ART-1311', 'ARCHITECTURE', '3C', '3.0');

-- --------------------------------------------------------

--
-- Table structure for table `course_reg`
--

CREATE TABLE IF NOT EXISTS `course_reg` (
`course_reg_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `marks` double DEFAULT NULL,
  `GPA` double DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_reg`
--

INSERT INTO `course_reg` (`course_reg_id`, `student_id`, `course_id`, `is_approved`, `marks`, `GPA`, `semester_id`) VALUES
(2, 2, 10, 1, NULL, NULL, 8),
(3, 2, 11, 1, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
`desig_id` int(11) NOT NULL,
  `desig_name` varchar(45) NOT NULL,
  `desig_desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desig_id`, `desig_name`, `desig_desc`) VALUES
(1, 'Lecturer', NULL),
(2, 'Assistant Professor', NULL),
(3, 'Professor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
`id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `semester_id`, `exam_type_id`) VALUES
(7, 8, 3),
(8, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine`
--

CREATE TABLE IF NOT EXISTS `exam_routine` (
`exam_routine_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `exam_id` int(11) NOT NULL,
  `batch` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_routine`
--

INSERT INTO `exam_routine` (`exam_routine_id`, `course_id`, `start_time`, `end_time`, `date`, `exam_id`, `batch`) VALUES
(29, 11, '03:00:00', '04:30:00', '2016-03-20', 7, '2'),
(30, 13, '00:15:00', '00:30:00', '2016-03-01', 8, '2'),
(31, 13, '00:30:00', '00:15:00', '2016-03-22', 7, '1'),
(33, 18, '00:15:00', '00:30:00', '2016-03-07', 7, '2');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `name`) VALUES
(3, 'Mid-Term'),
(4, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(11) NOT NULL,
  `room_number` varchar(45) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`, `capacity`) VALUES
(1, '709', 40),
(2, '809', 40),
(3, '710', 40),
(4, '810', 40);

-- --------------------------------------------------------

--
-- Table structure for table `room_assign`
--

CREATE TABLE IF NOT EXISTS `room_assign` (
`room_assign_id` int(11) NOT NULL,
  `exam_routine_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_registration` varchar(45) NOT NULL,
  `end_registration` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_assign`
--

INSERT INTO `room_assign` (`room_assign_id`, `exam_routine_id`, `room_id`, `start_registration`, `end_registration`) VALUES
(134, 29, 4, '2011331106', '2011331141'),
(135, 30, 1, '2011331001', '2011331036'),
(136, 30, 2, '2011331037', '2011331072'),
(137, 30, 3, '2011331073', '2011331108'),
(138, 30, 4, '2011331109', '2011331144'),
(139, 31, 1, '2011331001', '2011331036'),
(140, 31, 2, '2011331037', '2011331072'),
(141, 31, 4, '2011331073', '2011331108'),
(145, 33, 1, '2011331001', '2011331036'),
(146, 33, 2, '2011331037', '2011331072'),
(147, 33, 3, '2011331073', '2011331108');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
`id` int(11) NOT NULL,
  `session` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `session`, `year`, `start_date`, `end_date`) VALUES
(8, 'summer', 2016, '2016-03-19', '2016-03-26'),
(9, 'Fall', 2016, '2016-03-03', '2016-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` bigint(20) NOT NULL,
  `reg_no` varchar(45) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email_no` varchar(30) NOT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `blood_group` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `date_of_birth` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `reg_no`, `batch_id`, `user_id`, `email_no`, `contact_no`, `address`, `first_name`, `last_name`, `marital_status`, `blood_group`, `religion`, `date_of_birth`, `gender`, `url`) VALUES
(2, '2011331037', 2, 1, 'jhsadjsadjh', 'asda', 'asd', 'asd', 'sad', 'asd', 'asd', 'asda', 'sdasd', 'asd', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(45) NOT NULL,
  `teacher_code` varchar(45) NOT NULL,
  `email_no` varchar(45) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `desig_id` int(11) NOT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_code`, `email_no`, `is_available`, `user_id`, `desig_id`, `contact_no`, `url`) VALUES
(1, 'Md.Asaduzzaman Khan', 'mak', 'mak@gmail.com', 1, 2, 1, '332323223', 'images/teacher11.jpg'),
(4, 'Iffat Jahan choudhury', 'ijc', 'ijc@gmail.com', 1, NULL, 2, '545444545', 'images/teacher1.jpg'),
(5, 'Ms.Dola Barua', 'db', 'db@gmail.com', 1, 3, 1, '5665656565', 'images/teacher2.jpg'),
(6, 'Selina Sharmin', 'ss', 'ss@gmail.com', 0, NULL, 1, '323232323', 'images/teacher3.jpg'),
(7, 'Rumel M.S. Rahman Pir', 'rms', 'rms@gmail.com', 1, NULL, 1, '017100000', 'images/teacher4.jpg'),
(8, 'Arif Ahmed', 'AA', 'AA@gmail.com', 1, NULL, 1, '01722222', 'images/teacher5.jpg'),
(9, 'Minhazul Haque Bhuiyan', 'MHB', 'mhb@gmail.com', 1, NULL, 1, '01722656566', 'images/teacher6.jpg'),
(10, 'Arafat Habib Quraishi', 'AHQ', 'ahq@gmail.com', 1, NULL, 1, '01722656566', 'images/teacher10.jpg'),
(11, 'Alak Kanti Sarma', 'AKS', 'aks@gmail.com', 1, NULL, 1, '01722656566', 'images/teacher9.jpg'),
(12, 'Md. Ebrahim Hossain', 'MEH', 'meh@gmail.com', 1, NULL, 1, '01722656566', 'images/teacher12.jpg'),
(13, 'Md. Saiful Ambia Chowdhury', 'MSAC', 'msac@gmail.com', 1, NULL, 1, '017226565661', 'images/teacher7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assign`
--

CREATE TABLE IF NOT EXISTS `teacher_assign` (
`teacher_assign_id` int(11) NOT NULL,
  `room_assign_id` int(11) NOT NULL,
  `teacher_one` int(11) NOT NULL,
  `teacher_two` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_assign`
--

INSERT INTO `teacher_assign` (`teacher_assign_id`, `room_assign_id`, `teacher_one`, `teacher_two`) VALUES
(111, 134, 5, 6),
(112, 135, 4, 9),
(113, 136, 7, 6),
(114, 137, 7, 1),
(115, 138, 1, 1),
(116, 139, 1, 1),
(117, 140, 1, 1),
(118, 141, 1, 1),
(122, 145, 1, 1),
(123, 146, 1, 1),
(124, 147, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `remember_token`) VALUES
(1, '2011331037', '$2y$10$qUO0JE/9MMAuntSHEV5cZeRq3MMNRruBESmbSzJgXXpCM7XDvX5iq', 'emqORn3TLv0IM3QmBUVz5acGpGJrDufumibH0YeoNnlcUEsio2LIddpye9qd'),
(2, 'mak', '$2y$10$qfRmrGLLoc/9TdtvB/MLu.jsYzniknBBvqHE7/aMXcCHQv88sJ24q', '016u1h1HA8Z1OHFq4t0rgI5i0OYHIdD1aUobA6HBSNNi2pN0fvOMrBQLOj6y'),
(3, 'db', '$2y$10$Le6U0K6NuoVgbfn8gfr8q.DBhnrhx1sK9leWoUHtpgOqh2OlxbgDe', 'kduQyhJ6ZelYYsJK8BXpDlkemLs3kx3Aq2mzIS85M6RVwsXMy98Hs7HnbAEs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_attendences_exam_routine_exam_routine_id_idx` (`exam_routine_id`), ADD KEY `fk_attendences_student_student_id_idx` (`student_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
 ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`), ADD UNIQUE KEY `course_code_UNIQUE` (`course_code`);

--
-- Indexes for table `course_reg`
--
ALTER TABLE `course_reg`
 ADD PRIMARY KEY (`course_reg_id`), ADD KEY `student_id_idx` (`student_id`), ADD KEY `course_id_idx` (`course_id`), ADD KEY `exam_id_idx` (`semester_id`), ADD KEY `exam_id_reg_exam_idx` (`semester_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
 ADD PRIMARY KEY (`desig_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_exams_semesters_semester_id_idx` (`semester_id`), ADD KEY `fk_exams_exam_type_exam_type_id_idx` (`exam_type_id`);

--
-- Indexes for table `exam_routine`
--
ALTER TABLE `exam_routine`
 ADD PRIMARY KEY (`exam_routine_id`), ADD KEY `course_id_idx` (`course_id`), ADD KEY `exam_id_idx` (`exam_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD UNIQUE KEY `room_number_UNIQUE` (`room_number`);

--
-- Indexes for table `room_assign`
--
ALTER TABLE `room_assign`
 ADD PRIMARY KEY (`room_assign_id`), ADD KEY `room_id_idx` (`room_id`), ADD KEY `exam_routine_id_idx` (`exam_routine_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD UNIQUE KEY `reg_no_UNIQUE` (`reg_no`), ADD KEY `batch_id_idx` (`batch_id`), ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`), ADD KEY `user_id_idx` (`user_id`), ADD KEY `desig_id_idx` (`desig_id`);

--
-- Indexes for table `teacher_assign`
--
ALTER TABLE `teacher_assign`
 ADD PRIMARY KEY (`teacher_assign_id`), ADD KEY `teacher_one_idx` (`teacher_one`), ADD KEY `teacher_two_idx` (`teacher_two`), ADD KEY `room_assign_id_idx` (`room_assign_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `course_reg`
--
ALTER TABLE `course_reg`
MODIFY `course_reg_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `desig_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `exam_routine`
--
ALTER TABLE `exam_routine`
MODIFY `exam_routine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room_assign`
--
ALTER TABLE `room_assign`
MODIFY `room_assign_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teacher_assign`
--
ALTER TABLE `teacher_assign`
MODIFY `teacher_assign_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendences`
--
ALTER TABLE `attendences`
ADD CONSTRAINT `fk_attendences_exam_routine_exam_routine_id` FOREIGN KEY (`exam_routine_id`) REFERENCES `exam_routine` (`exam_routine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_attendences_student_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_reg`
--
ALTER TABLE `course_reg`
ADD CONSTRAINT `course_id_reg_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `exam_id_reg_exam` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_id_reg_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
ADD CONSTRAINT `fk_exams_exam_type_exam_type_id` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_exams_semesters_semester_id` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_routine`
--
ALTER TABLE `exam_routine`
ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_exam_routine_exams_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_assign`
--
ALTER TABLE `room_assign`
ADD CONSTRAINT `exam_routine_id` FOREIGN KEY (`exam_routine_id`) REFERENCES `exam_routine` (`exam_routine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
ADD CONSTRAINT `desig_id_desig_teacher` FOREIGN KEY (`desig_id`) REFERENCES `designation` (`desig_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_id_user_teacher` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `teacher_assign`
--
ALTER TABLE `teacher_assign`
ADD CONSTRAINT `room_assign_id` FOREIGN KEY (`room_assign_id`) REFERENCES `room_assign` (`room_assign_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_one` FOREIGN KEY (`teacher_one`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_two` FOREIGN KEY (`teacher_two`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
