-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 09:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theSchool`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image`) VALUES
(20, 'PHP', 'kjasdljlakkjasdljlakkjasdljlak.\r\nkjasdljlak\r\nkjasdljlakkjasdljlakkjasdljlakkjasdljlak.\r\nkjasdljlakkjasdljlak.', 'assets/images/courseImg/PHP-Logo2.png'),
(21, 'DevOps', 'lskejeklsjlrklskejeklsjlrklskejeklsjlrk.\r\nlskejeklsjlrklskejeklsjlrk.\r\nlskejeklsjlrk.\r\nlskejeklsjlrklskejeklsjlrk.', 'assets/images/courseImg/DevOps_logo.jpg'),
(23, 'Java', 'alskdjlaksdjalskdjlaksdjalskdjlaksdj.\r\nalskdjlaksdjalskdjlaksdj.\r\nalskdjlaksdjalskdjlaksdjalskdjlaksdj.\r\nalskdjlaksdjalskdjlaksdj.', 'assets/images/courseImg/java_logo.png'),
(25, 'webDev', '×œ×•×¨× ××™×¤×¡×•× ×“×•×œ×•×¨ ×¡×™×˜ ××ž×˜, ×§×•× ×¡×§×˜×•×¨×¨ ××“×™×¤×™×¡×™× ×’ ××œ×™×ª ×œ×¤×¨×•×ž×™ ×‘×œ×•×£ ×§×™× ×¥ ×ª×ª×™×— ×œ×¨×¢×—. ×œ×ª ×¦×©×—×ž×™ ×¦×© ×‘×œ×™×, ×ž× ×¡×•×˜×• ×¦×ž×œ×— ×œ×‘×™×§×• × × ×‘×™, ×¦×ž×•×§×• ×‘×œ×•×§×¨×™×” ×©×™×¦×ž×” ×‘×¨×•×¨×§. ×¡×—×˜×™×¨ ×‘×œ×•×‘×§. ×ª×¦×˜× ×¤×œ ×‘×œ×™× ×“×• ×œ×ž×¨×§×œ ××¡ ×œ×›×™×ž×¤×•, ×“×•×œ, ×¦×•×˜ ×•×ž×¢×™×•×˜ - ×œ×¤×ª×™×¢× ×‘×¨×©×’ - ×•×œ×ª×™×¢× ×’×“×“×™×©. ×§×•×•×™×– ×“×•×ž×•×¨ ×œ×™××ž×•× ×‘×œ×™× ×š ×¨×•×’×¦×”. ×œ×¤×ž×¢×˜ ×ž×•×¡×Ÿ ×ž× ×ª. × ×•×œ×•× ××¨×•×•×¡ ×¡××¤×™××Ÿ - ×¤×•×¡×™×œ×™×¡ ×§×•×•×™×¡, ××§×•×•×–×ž×Ÿ ×§×•×•××–×™ ×‘×ž×¨ ×ž×•×“×•×£. ××•×“×™×¤×• ×‘×œ××¡×˜×™×§ ×ž×•× ×•×¤×¥ ×§×œ×™×¨, ×‘× ×¤×ª × ×¤×§×˜ ×œ×ž×¡×•×Ÿ ×‘×œ×¨×§ - ×•×¢× ×•×£ ×œ×¤×¨×•×ž×™ ×‘×œ×•×£ ×§×™× ×¥ ×ª×ª×™×— ×œ×¨×¢×—. ×œ×ª ×¦×©×—×ž×™ ×”×•×¢× ×™×‘ ×”×™×•×©×‘×‘ ×©×¢×¨×© ×©×ž×—×•×™×˜ - ×©×œ×•×©×¢ ×•×ª×œ×‘×¨×• ×—×©×œ×• ×©×¢×•×ª×œ×©×š ×•×—××™×ª × ×•×‘×© ×¢×¨×©×©×£.', 'assets/images/courseImg/Full-Stack-Developer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courseStudents`
--

CREATE TABLE `courseStudents` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courseStudents`
--

INSERT INTO `courseStudents` (`id`, `course_id`, `student_id`) VALUES
(80, 20, 43),
(81, 21, 43),
(83, 23, 43),
(89, 21, 53),
(104, 21, 57),
(105, 23, 57),
(106, 20, 58),
(107, 21, 58),
(108, 23, 58),
(110, 25, 43),
(112, 21, 59);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `mail`, `phone`, `image`) VALUES
(43, '×’×œ ×¤×œ×“', 'test@test.com', '0501131324', 'assets/images/courseImg/profile.jpeg'),
(53, '×©× ×ª×œ×ž×™×“', 'gasdj@asdjkdjac.com', '0501131314', 'assets/images/studentImg/no-avatar.jpg'),
(57, '××œ×™×× ×” ×©×•×•×™×œ×™', 'test@test.com', '0509929292', 'assets/images/studentImg/till_death___by_deadkd916-d614wrd.jpg'),
(58, '×™×•×‘×œ ×œ×‘×•×™', 'asd@asdg.co', '0501131314', 'assets/images/studentImg/no-avatar.jpg'),
(59, '×ª×œ×ž×™ ×”×ª×œ×ž×™×“', 'huhu@jjj.com', '0507727272', 'assets/images/studentImg/no-avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `phone`, `password`, `role`, `image`) VALUES
(1, 'gal peled', 'gal@peled.com', '0503313131', 'e10adc3949ba59abbe56e057f20f883e', 0, 'assets/images/avatars/admin-avatar.png'),
(2, '×©×™×ž×™ ×”×©×•×¢×œ', 'po@la.com', '0505050555', 'e10adc3949ba59abbe56e057f20f883e', 2, 'assets/images/avatars/grey-ink-gun-and-smoking-skull-tattoo-design.jpg'),
(4, 'mani', 'mn@menael.io', '0506665577', 'e10adc3949ba59abbe56e057f20f883e', 1, 'assets/images/avatars/admin-avatar.png'),
(9, '×©× ×ž×œ×', 'man@men.io', '0501212121', 'd553d148479a268914cecb77b2b88e6a', 1, 'assets/images/avatars/admin-avatar.png'),
(10, '×ž×•×›×¨×™ ×”×ž×•×›×¨×Ÿ', 'holy@moly.io', '0508877666', 'e10adc3949ba59abbe56e057f20f883e', 2, 'assets/images/avatars/admin-avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseStudents`
--
ALTER TABLE `courseStudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `courseStudents`
--
ALTER TABLE `courseStudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
