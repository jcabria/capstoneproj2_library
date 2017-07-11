-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 10:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstogo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_record`
--

CREATE TABLE `books_record` (
  `id` int(11) NOT NULL,
  `book_code` varchar(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `books_record`
--

INSERT INTO `books_record` (`id`, `book_code`, `book_title`, `author`, `category`, `stocks`) VALUES
(1, 'math001', 'Algebra', 'Facundo Santos', 'math', 9),
(2, 'eng001', 'English101', 'Enda Saymo', 'english', 15),
(3, 'fil001', 'Filipino Batikan', 'Feli Simo', 'filipino', 0),
(4, 'sci001', 'Science: Ecosystem', 'Sayna Yan', 'science', 3),
(5, 'music001', 'Music and Arts', 'Joles Cabs', 'other', 5),
(6, 'abc124', 'Midnight for Charlie Bone', 'Jenny Nimmo', 'fiction', 21),
(7, 'def456', 'The last fairy-apple tree', 'Emily Rodda', 'fiction', 12),
(8, 'ghi789', 'Wrath of the storm', 'Jennifer Nielsen', 'fiction', 7),
(9, 'jkl1011', 'Private Peaceful', 'Michael Morpurgo', 'novel', 11),
(10, 'mno1213', 'Weir Do 2, even weirder!', 'Anh Do', 'novel', 9),
(11, 'pqr1415', 'Pride and Prejudice', 'Jane Austen', 'novel', 2),
(12, 'stu1516', 'That Stranger Next Door', 'Goldie Alexander', 'novel', 4),
(13, 'vwx1718', 'Handle with Care', 'Jodi Picoult', 'novel', 1),
(14, 'yza1920', 'The Chill House: The Coolest Place on Earth', 'A.J. Hard', 'novel', 15),
(15, 'bcd2122', 'The Ghost of Future Me: Shiver and Fears', 'A.J. Hard', 'novel', 12),
(16, 'efg2324', 'The Devil Wears Prada', 'Lauren Weisberger', 'novel', 7),
(17, 'hij2526', 'Unstoppable meeeeee', 'Tim Green', 'novel', 17),
(18, 'klm2728', 'Geometry', 'Richard Bell', 'math', 19),
(19, 'nop2930', 'Physics II', 'Christopher Nepomuceno', 'science', 8),
(20, 'qrs3132', 'Chemistry I', 'Jim Pablo', 'science', 0),
(21, 'tuv3334', 'Trigonometry', 'Jay Reyes', 'math', 8),
(22, 'wxy3536', 'Literature', 'Enda Saymo', 'english', 0),
(23, 'zab3738', 'Pagsulat at Pagbasa', 'Feli Simo', 'filipino', 8),
(24, 'rel143', 'Guitar Chords and Tabs', 'Joles Cabs', 'other', 0),
(25, 'jcp134', 'Oxford English Dictionary', 'Joles Cabs', 'other', 9),
(28, 'pca512', 'World Almanac', 'Joles Cabs', 'other', 0),
(31, 'aa', 'aaa', 'aaaa', 'aaaaa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_trans`
--

CREATE TABLE `borrowed_trans` (
  `id` int(11) NOT NULL,
  `student_number_id` int(11) NOT NULL,
  `book_record_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_trans`
--

INSERT INTO `borrowed_trans` (`id`, `student_number_id`, `book_record_id`, `date_borrowed`, `due_date`) VALUES
(7, 20170515, 7, '2017-07-11', '2017-07-12'),
(13, 20140612, 14, '2017-07-11', '2017-07-13'),
(14, 20140612, 21, '2017-07-11', '2017-07-13'),
(15, 20101865, 23, '2017-07-11', '2017-07-13'),
(16, 20170515, 17, '2017-07-11', '2017-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_trans`
--

CREATE TABLE `borrow_trans` (
  `id` int(11) NOT NULL,
  `student_number_id` int(11) NOT NULL,
  `student_name_id` varchar(255) NOT NULL,
  `book_code_id` varchar(255) NOT NULL,
  `book_title_id` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `book_record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_trans`
--

INSERT INTO `borrow_trans` (`id`, `student_number_id`, `student_name_id`, `book_code_id`, `book_title_id`, `author_id`, `stock_id`, `date_borrowed`, `due_date`, `book_record_id`) VALUES
(4, 20101865, 'Joles Cabs', 'mno1213', 'Weir Do 2, even weirder!', 'Anh Do', 10, '2017-07-04', '2017-07-05', 0),
(30, 20171434, 'Armi Millare', 'nop2930', 'Physics', 'Christopher Nepomuceno', 8, '2017-07-19', '2017-07-20', 19),
(34, 20170515, 'Cameron Ernst', 'klm2728', 'Geometry', 'Richard Bell', 21, '2017-07-09', '2017-07-10', 18),
(35, 20101865, 'Joles Cabs', 'bcd2122', 'The Ghost of Future Me: Shiver and Fears', 'A.J. Hard', 12, '2017-07-09', '2017-07-06', 15),
(36, 20171434, 'Armi Millare', 'hij2526', 'Unstoppable', 'Tim Green', 19, '2017-07-09', '2017-07-05', 17),
(41, 20101865, 'Joleey Babes', 'zab3738', 'Pagsulat at Pagbasa', 'Feli Simo', 9, '2017-07-09', '2017-07-11', 23),
(42, 20171434, 'Armi Millare', 'klm2728', 'Geometry', 'Richard Bell', 21, '2017-07-10', '2017-07-11', 18),
(45, 20101865, 'Joleey Babes', 'yza1920', 'The Chill House: The Coolest Place on Earth', 'A.J. Hard', 11, '2017-07-10', '2017-07-11', 14),
(46, 20171434, 'Armi Millare', 'mno1213', 'Weir Do 2, even weirder!', 'Anh Do', 9, '2017-07-10', '2017-07-12', 10),
(47, 20171434, 'Armi Millare', 'eng001', 'English101', 'Enda Saymo', 14, '2017-07-10', '2017-07-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `returned_trans`
--

CREATE TABLE `returned_trans` (
  `id` int(11) NOT NULL,
  `student_number_id` int(11) NOT NULL,
  `book_record_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL DEFAULT '0000-00-00',
  `date_returned` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned_trans`
--

INSERT INTO `returned_trans` (`id`, `student_number_id`, `book_record_id`, `date_borrowed`, `date_returned`) VALUES
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
(15, 20170515, 12, '2017-07-03', '2017-07-09'),
(16, 20170515, 11, '2017-06-29', '2017-07-10'),
(17, 20101865, 1, '2017-07-08', '2017-07-10'),
(20, 20170515, 9, '2017-07-11', '2017-07-11'),
(21, 20170515, 9, '2017-07-11', '2017-07-11'),
(22, 20170515, 5, '2017-07-11', '2017-07-11'),
(23, 20101865, 4, '2017-07-10', '2017-07-11'),
(24, 20150711, 12, '2017-07-11', '2017-07-11'),
(25, 20140612, 2, '2017-07-11', '2017-07-11'),
(26, 20140612, 2, '2017-07-11', '2017-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `students_record`
--

CREATE TABLE `students_record` (
  `id` int(11) NOT NULL,
  `student_number` int(8) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_record`
--

INSERT INTO `students_record` (`id`, `student_number`, `student_name`, `grade_level`) VALUES
(1, 20101865, 'Joleey Babes', '12'),
(2, 20171434, 'Armi Millare', '4'),
(3, 20170515, 'Cameron Ernst', '1'),
(4, 20150711, 'Rea Buenaventura', '11'),
(5, 20140612, 'Myka Telpo', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'jcabs', 'af3e49e29157373b1958e75e3728756cf1c3369b', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_record`
--
ALTER TABLE `books_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_code` (`book_code`);

--
-- Indexes for table `borrowed_trans`
--
ALTER TABLE `borrowed_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_trans`
--
ALTER TABLE `borrow_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_number_id` (`student_number_id`,`book_code_id`);

--
-- Indexes for table `returned_trans`
--
ALTER TABLE `returned_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_record`
--
ALTER TABLE `students_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_number` (`student_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_record`
--
ALTER TABLE `books_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `borrowed_trans`
--
ALTER TABLE `borrowed_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `borrow_trans`
--
ALTER TABLE `borrow_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `returned_trans`
--
ALTER TABLE `returned_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `students_record`
--
ALTER TABLE `students_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
