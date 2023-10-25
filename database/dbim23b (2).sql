-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 04:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbim23b`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllAssignments` ()   BEGIN
      SELECT 
        *
      FROM assignment;
  End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudent` ()  SQL SECURITY INVOKER BEGIN
      SELECT 
        studid,
        fname,
        lname,
        gender
      FROM student ORDER BY studid;
  End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudentAssignments` ()   SELECT student.fname, 
        student_assignment.id,
       assignment1.assignment_name AS assignment_1, 
       assignment2.assignment_name AS assignment_2, 
       student.lname
FROM student_assignment
JOIN student ON student_assignment.student_id = student.studid
JOIN assignment AS assignment1 ON student_assignment.assignment1_id = assignment1.id
JOIN assignment AS assignment2 ON student_assignment.assignment2_id = assignment2.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentById` (IN `_id` INT)  SQL SECURITY INVOKER BEGIN
     SELECT 
        studid,
        fname,
        lname,
        gender,
        assignment_Subject,
        assignment_Number
      FROM student
      WHERE studid = _id;
  End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteAssignment` (IN `_id` INT)   BEGIN
  DELETE FROM assignment WHERE id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteStudent` (IN `_id` INT)   BEGIN
  DELETE FROM student WHERE studid = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteStudentAssignment` (IN `_id` INT)   BEGIN
  DELETE FROM student_assignment WHERE id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAssignmentById` (IN `_id` INT)   BEGIN
  SELECT * FROM assignment WHERE id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getStudentAssignmentById` (IN `_id` INT)   BEGIN
  SELECT student.fname, 
        student_assignment.id,
       assignment1.assignment_name AS assignment_1, 
       assignment2.assignment_name AS assignment_2, 
       student.lname
FROM student_assignment
JOIN student ON student_assignment.student_id = student.studid
JOIN assignment AS assignment1 ON student_assignment.assignment1_id = assignment1.id
JOIN assignment AS assignment2 ON student_assignment.assignment2_id = assignment2.id
    WHERE student_assignment.id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getStudentById` (IN `_id` INT)   BEGIN
  SELECT * FROM student WHERE studid = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertAssignment` (IN `_name` VARCHAR(255))  SQL SECURITY INVOKER BEGIN
  INSERT INTO assignment(assignment_name)
    VALUES(_name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertStudent` (IN `_fname` VARCHAR(50), IN `_lname` VARCHAR(50), IN `_gender` VARCHAR(6))  SQL SECURITY INVOKER BEGIN
    Declare isStudExists int;
    set isStudExists = 0;

    SELECT count(*) into isStudExists from student where fname = _fname and lname = _lname;
  
  --  set valueBalik = isStudExists;

   if isStudExists = 0 then  
    INSERT INTO student(fname,lname,gender)
    VALUES(_fname,_lname,_gender);
   end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertStudentAssignment` (IN `_student_id` INT, IN `_assignment1_id` INT, IN `_assignment2_id` INT)   BEGIN

  INSERT INTO student_assignment(student_id, assignment1_id, assignment2_id)
    VALUES(_student_id, _assignment1_id, _assignment2_id);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_searchStudent` (IN `_searchKey` VARCHAR(25))  SQL SECURITY INVOKER BEGIN
      DECLARE skey varchar(25);
        set skey= CONCAT(_searchKey,'%');
     SELECT 
        studid,
        fname,
        lname,
        gender,
        assignment_Subject,
        assignment_Number
      FROM student 
      WHERE lname LIKE skey
      ORDER BY lname;
  End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_studentUpdate` (IN `_id` INT, IN `_fname` VARCHAR(25), IN `_lname` VARCHAR(25), IN `_gender` VARCHAR(6), IN `_assignment_Subject` VARCHAR(255), IN `_assignment_Number` VARCHAR(255))  SQL SECURITY INVOKER BEGIN
    UPDATE student
      set
        fname = _fname,
        lname = _lname,
        gender = _gender,
        assignment_Subject = _assignment_Subject,
        assignment_Number = _assignment_Number
    WHERE studid = _id;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateAssignment` (IN `_id` INT, IN `_name` VARCHAR(255))   BEGIN
  UPDATE assignment set assignment_name = _name
    WHERE id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateStudent` (IN `_id` INT, IN `_fname` VARCHAR(255), IN `_lname` VARCHAR(255), IN `_gender` VARCHAR(255))   BEGIN
  UPDATE student set fname = _fname, lname = _lname, gender = _gender
    WHERE studid = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateStudentAssignment` (IN `_id` INT, IN `_assignment1_id` INT, IN `_assignment2_id` INT)   BEGIN
 UPDATE student_assignment set assignment1_id= _assignment1_id, assignment2_id = _assignment2_id
    WHERE id = _id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `assignment_name`) VALUES
(4, 'Machine Learning'),
(5, 'Nasaktan'),
(6, 'Software Engineering'),
(7, 'Reaction Paper'),
(8, 'Poetry analysis'),
(9, 'Assignment');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studid` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT 'NULL',
  `lname` varchar(50) DEFAULT 'NULL',
  `gender` varchar(6) DEFAULT 'NULL'
) ENGINE=InnoDB AVG_ROW_LENGTH=1820 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studid`, `fname`, `lname`, `gender`) VALUES
(12, 'Joren', 'Sumagang', 'Ryan G'),
(13, 'joren', 'boang', 'Male'),
(19, 'Ryan', 'Gosling', 'Male'),
(21, 'wave to', 'earth', 'Male'),
(22, 'Hanni', 'Hanni', 'Female'),
(23, 'Doja', 'Cat', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment1_id` int(11) NOT NULL,
  `assignment2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`id`, `student_id`, `assignment1_id`, `assignment2_id`) VALUES
(1, 1, 1, 0),
(2, 1, 1, 1),
(3, 12, 2, 5),
(5, 19, 6, 6),
(6, 22, 5, 5),
(9, 21, 5, 6),
(10, 13, 6, 5),
(11, 12, 6, 7),
(12, 23, 5, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
