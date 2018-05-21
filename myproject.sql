-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 05:52 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `date` varchar(10) DEFAULT NULL,
  `usn` varchar(15) DEFAULT NULL,
  `faculty` varchar(15) DEFAULT NULL,
  `subcode` varchar(7) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`date`, `usn`, `faculty`, `subcode`, `status`) VALUES
('2016-10-06', 'josh', 'manideep', 'SWE407', 'present'),
('2016-10-06', 'kiran', 'manideep', 'SWE407', 'absent'),
('2016-10-20', 'josh', 'manideep', 'SWE407', 'absent'),
('2016-10-20', 'kiran', 'manideep', 'SWE407', 'absent'),
('2016-10-29', 'josh', 'manideep', 'SWE407', 'present'),
('2016-10-29', 'kiran', 'manideep', 'SWE407', 'present'),
('2016-11-30', 'josh', 'manideep', 'SWE407', 'present'),
('2016-11-30', 'kiran', 'manideep', 'SWE407', 'present'),
('2016-11-02', 'hari', 'manideep', 'SWE408', 'present'),
('2016-11-05', 'priya', 'sandeep', 'SWE408', 'present'),
('2016-11-02', 'hari', 'manideep', 'SWE408', 'absent'),
('2016-11-01', 'priya', 'sandeep', 'SWE408', 'present'),
('2016-11-01', 'priya', 'sandeep', 'SWE408', 'present'),
('2016-11-01', 'priya', 'sandeep', 'SWE408', 'present'),
('2016-10-21', 'priya', 'sandeep', 'SWE408', 'absent'),
('2016-10-15', 'priya', 'sandeep', 'SWE408', 'present'),
('2016-10-06', 'peter', 'sandeep', 'SWE403', 'present'),
('2016-10-09', 'peter', 'sandeep', 'SWE403', 'absent'),
('2016-11-07', 'peter', 'sandeep', 'SWE403', 'present'),
('2016-10-27', 'gale', 'sandeep', 'SWE401', 'present'),
('2016-10-27', 'krish', 'sandeep', 'SWE401', 'present'),
('2016-10-21', 'gale', 'sandeep', 'SWE401', 'present'),
('2016-10-21', 'krish', 'sandeep', 'SWE401', 'absent'),
('2016-10-09', 'gale', 'sandeep', 'SWE401', 'absent'),
('2016-10-09', 'krish', 'sandeep', 'SWE401', 'absent'),
('2016-11-06', 'josh', 'manideep', 'SWE407', 'present'),
('2016-11-06', 'kiran', 'manideep', 'SWE407', 'present'),
('2016-11-01', 'peter', 'kiran', 'SWE301', 'absent'),
('2016-11-01', 'pila', 'supriya', 'SWE202', 'absent'),
('2016-11-06', 'josh', 'manideep', 'SWE407', 'present'),
('2016-11-06', 'kiran', 'manideep', 'SWE407', 'present'),
('2016-11-06', 'hari', 'manideep', 'SWE408', 'present'),
('2016-11-06', 'hari', 'manideep', 'SWE408', 'present'),
('2016-10-03', 'gale', 'sandeep', 'SWE401', 'present'),
('2016-10-03', 'krish', 'sandeep', 'SWE401', 'present'),
('2016-10-31', 'josh', 'manideep', 'SWE407', 'present'),
('2016-10-31', 'kiran', 'manideep', 'SWE407', 'absent'),
('2016-10-31', 'priya', 'sandeep', 'SWE408', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `sub_code` varchar(7) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `password`, `sub_code`, `email`) VALUES
('manideep', '123', 'SWE407', 'chatakondamanideep0@gmail.com'),
('sandeep', '456', 'SWE408', 'sandeep.9952622337@gmail.com'),
('manideep', '123', 'SWE408', 'chatakondamanideep0@gmail.com'),
('sandeep', '456', 'SWE403', 'sandeep.9952622337@gmail.com'),
('sandeep', '456', 'SWE401', 'sandeep.9952622337@gmail.com'),
('kiran', 'zxc', 'SWE301', 'kiran@gmail.com'),
('supriya', 'abc', 'SWE202', 'supriya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`username`, `password`) VALUES
('deepu451', '45193'),
('sandeep', '78912');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(15) DEFAULT NULL,
  `sub_code` varchar(7) DEFAULT NULL,
  `faculty` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `sub_code`, `faculty`) VALUES
('josh', 'SWE407', 'manideep'),
('kiran', 'SWE407', 'manideep'),
('priya', 'SWE408', 'sandeep'),
('hari', 'SWE408', 'manideep'),
('gale', 'SWE401', 'sandeep'),
('peter', 'SWE403', 'sandeep'),
('krish', 'SWE401', 'sandeep'),
('peter', 'SWE301', 'kiran'),
('pila', 'SWE202', 'supriya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
