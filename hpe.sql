-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2018 at 05:42 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `checkin` varchar(10) NOT NULL,
  `checkout` varchar(10) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pgid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `uid_2` (`uid`),
  KEY `pgid` (`pgid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `checkin`, `checkout`, `uid`, `pgid`) VALUES
(1, '2018-08-01', '2018-08-15', 'abc', '1'),
(13, '08/13/2018', '08/29/2018', 'x', '1');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE IF NOT EXISTS `checks` (
  `bid` int(11) NOT NULL,
  `oid` varchar(20) NOT NULL,
  PRIMARY KEY (`bid`,`oid`),
  KEY `oid` (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `loc_id` varchar(20) NOT NULL,
  `loc_name` varchar(20) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`) VALUES
('2', 'cv'),
('5', 'vf'),
('x', 'mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `oid` varchar(20) NOT NULL,
  `oname` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `log` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`oid`, `oname`, `address`, `email`, `phone`, `gender`, `log`, `pass`) VALUES
('1', 'abc', 'mysore', 'prarthanaushanbhag@gmail.com', 2147483647, 'male', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE IF NOT EXISTS `pg` (
  `pid` varchar(20) NOT NULL,
  `pgname` varchar(20) NOT NULL,
  `noacc` int(11) NOT NULL,
  `pgtype` varchar(20) NOT NULL,
  `rent` int(11) NOT NULL,
  `loc_id` varchar(20) NOT NULL,
  `oid` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `loc_id` (`loc_id`),
  KEY `oid` (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg`
--

INSERT INTO `pg` (`pid`, `pgname`, `noacc`, `pgtype`, `rent`, `loc_id`, `oid`) VALUES
('1', 'aaa', 4, 'girls', 1000, 'x', '1'),
('2', 'hv', 1, 'bvb', 1000, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `logid` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `oid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `oid` (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `address`, `email`, `phone`, `gender`, `logid`, `pass`, `oid`) VALUES
('abc', 'UDAYA SHANBHAG', 'HOUSE AND POST PANAKAJE, BELTHANGADY TALUK,, DAKSHINA KANNADA, KARNATAKA-574224', 'prarthanaushanbhag@gmail.com', 2147483647, 'male', 'uday', 'abc', '1'),
('x', 'sds', 'asd', 'sds@gmail.com', 2132322, 'male', 'aaa', 'aaa', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`pgid`) REFERENCES `pg` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checks_ibfk_3` FOREIGN KEY (`bid`) REFERENCES `booking` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg`
--
ALTER TABLE `pg`
  ADD CONSTRAINT `pg_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
