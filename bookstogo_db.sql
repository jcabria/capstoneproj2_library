-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2017 at 08:27 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstogo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_record`
--

CREATE TABLE IF NOT EXISTS `books_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_code` varchar(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_code` (`book_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=29 ;

--
-- Dumping data for table `books_record`
--

INSERT INTO `books_record` (`id`, `book_code`, `book_title`, `author`, `category`, `stocks`, `student_id`) VALUES
(1, 'math001', 'Algebra', 'Facundo Santos', 'math', 11, 0),
(2, 'eng001', 'English101', 'Enda Saymo', 'english', 15, 0),
(3, 'fil001', 'Filipino Batikan', 'Feli Simo', 'filipino', 1, 0),
(4, 'sci001', 'Science', 'Sayna Yan', 'science', 2, 0),
(5, 'music001', 'Music and Arts', 'Joles Cabs', 'other', 4, 0),
(6, 'abc124', 'Midnight for Charlie Bone', 'Jenny Nimmo', 'fiction', 27, 0),
(7, 'def456', 'The last fairy-apple tree', 'Emily Rodda', 'fiction', 13, 0),
(8, 'ghi789', 'Wrath of the storm', 'Jennifer Nielsen', 'fiction', 9, 0),
(9, 'jkl1011', 'Private Peaceful', 'Michael Morpurgo', 'novel', 10, 0),
(10, 'mno1213', 'Weir Do 2, even weirder!', 'Anh Do', 'novel', 10, 0),
(11, 'pqr1415', 'Pride and Prejudie', 'Jane Austen', 'novel', 2, 0),
(12, 'stu1516', 'That Stranger Next Door', 'Goldie Alexander', 'novel', 3, 0),
(13, 'vwx1718', 'Handle with Care', 'Jodi Picoult', 'novel', 1, 0),
(14, 'yza1920', 'The Chill House: The Coolest Place on Earth', 'A.J. Hard', 'novel', 12, 0),
(15, 'bcd2122', 'The Ghost of Future Me: Shiver and Fears', 'A.J. Hard', 'novel', 15, 0),
(16, 'efg2324', 'The Devil Wears Prada', 'Lauren Weisberger', 'novel', 7, 0),
(17, 'hij2526', 'Unstoppable', 'Tim Green', 'novel', 22, 0),
(18, 'klm2728', 'Geometry', 'Richard Bell', 'math', 24, 0),
(19, 'nop2930', 'Physics', 'Christopher Nepomuceno', 'science', 11, 0),
(20, 'qrs3132', 'Chemistry', 'Jim Pablo', 'science', 0, 0),
(21, 'tuv3334', 'Trigonometry', 'Jay Reyes', 'math', 9, 0),
(22, 'wxy3536', 'Literature', 'Enda Saymo', 'english', 0, 0),
(23, 'zab3738', 'Pagsulat at Pagbasa', 'Feli Simo', 'filipino', 12, 0),
(24, 'rel143', 'Guitar Chords and Tabs', 'Joles Cabs', 'other', 0, 0),
(25, 'jcp134', 'Oxford English Dictionary', 'Joles Cabs', 'other', 9, 0),
(28, 'pca512', 'World Almanac', 'Joles Cabs', 'other', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_trans`
--

CREATE TABLE IF NOT EXISTS `borrow_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number_id` int(11) NOT NULL,
  `student_name_id` varchar(255) NOT NULL,
  `book_code_id` varchar(255) NOT NULL,
  `book_title_id` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `book_record_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_number_id` (`student_number_id`,`book_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `borrow_trans`
--

INSERT INTO `borrow_trans` (`id`, `student_number_id`, `student_name_id`, `book_code_id`, `book_title_id`, `author_id`, `stock_id`, `date_borrowed`, `due_date`, `book_record_id`) VALUES
(4, 20101865, 'Joles Cabs', 'mno1213', 'Weir Do 2, even weirder!', 'Anh Do', 10, '2017-07-04', '2017-07-05', 0),
(5, 20170515, 'Cameron Ernst', 'pqr1415', 'Pride and Prejudie', 'Jane Austen', 2, '2017-06-29', '2017-06-30', 11),
(30, 20171434, 'Armi Millare', 'nop2930', 'Physics', 'Christopher Nepomuceno', 11, '2017-07-19', '2017-07-20', 19),
(32, 20101865, 'Joles Cabs', 'math001', 'Algebra', 'Facundo Santos', 11, '2017-07-08', '2017-07-10', 1),
(34, 20170515, 'Cameron Ernst', 'klm2728', 'Geometry', 'Richard Bell', 24, '2017-07-09', '2017-07-10', 18),
(35, 20101865, 'Joles Cabs', 'bcd2122', 'The Ghost of Future Me: Shiver and Fears', 'A.J. Hard', 15, '2017-07-09', '2017-07-06', 15),
(36, 20171434, 'Armi Millare', 'hij2526', 'Unstoppable', 'Tim Green', 22, '2017-07-09', '2017-07-05', 17),
(41, 20101865, 'Joleey Babes', 'zab3738', 'Pagsulat at Pagbasa', 'Feli Simo', 12, '2017-07-09', '2017-07-11', 23),
(42, 20171434, 'Armi Millare', 'klm2728', 'Geometry', 'Richard Bell', 24, '2017-07-10', '2017-07-11', 18);

-- --------------------------------------------------------

--
-- Table structure for table `returned_trans`
--

CREATE TABLE IF NOT EXISTS `returned_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number_id` int(11) NOT NULL,
  `book_record_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL DEFAULT '0000-00-00',
  `date_returned` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `returned_trans`
--

INSERT INTO `returned_trans` (`id`, `student_number_id`, `book_record_id`, `date_borrowed`, `date_returned`) VALUES
(1, 0, 0, '0000-00-00', '2017-07-09'),
(2, 20170515, 0, '0000-00-00', '2017-07-09'),
(3, 20101865, 12, '0000-00-00', '2017-07-09'),
(4, 20101865, 13, '0000-00-00', '2017-07-09'),
(5, 20171434, 16, '0000-00-00', '2017-07-09'),
(6, 20101865, 4, '0000-00-00', '2017-07-09'),
(7, 20171434, 4, '0000-00-00', '2017-07-09'),
(8, 20170515, 4, '0000-00-00', '2017-07-09'),
(9, 20101865, 24, '0000-00-00', '2017-07-09'),
(10, 20101865, 5, '0000-00-00', '2017-07-09'),
(11, 20170515, 3, '0000-00-00', '2017-07-09'),
(12, 20170515, 3, '0000-00-00', '2017-07-09'),
(13, 20171434, 23, '0000-00-00', '2017-07-09'),
(14, 20170515, 9, '0000-00-00', '2017-07-09'),
(15, 20170515, 12, '2017-07-03', '2017-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `students_record`
--

CREATE TABLE IF NOT EXISTS `students_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number` int(8) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `book_record_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_number` (`student_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `students_record`
--

INSERT INTO `students_record` (`id`, `student_number`, `student_name`, `grade_level`, `book_record_id`) VALUES
(1, 20101865, 'Joleey Babes', '12', 5),
(2, 20171434, 'Armi Millare', '4', 17),
(3, 20170515, 'Cameron Ernst', '1', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'jcabs', 'af3e49e29157373b1958e75e3728756cf1c3369b', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
