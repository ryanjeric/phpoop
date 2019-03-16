-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 07:34 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `address` text NOT NULL,
  `company` text NOT NULL,
  `contact` text NOT NULL,
  `position` text NOT NULL,
  `status` text NOT NULL,
  `datecreated` date NOT NULL,
  `usertype` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `fname`, `lname`, `mname`, `address`, `company`, `contact`, `position`, `status`, `datecreated`, `usertype`) VALUES
(1, 'Superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'rjsaturday19@gmail.com', 'Super', 'admin', 'SuperAdmin', 'Villasis', 'GeekNest', '09234234223', 'SYSTEM ADMIN', 'ACTIVE', '2015-05-05', 'SUPERADMIN'),
(16, 'james', 'b4cc344d25a2efe540adbf2678e2304c', 'jbutt@gmail.com', 'James', 'Butt', 'Bitbitbot', '6649 N Blue Gum St', 'Benton', '09343453454', 'Nurse', 'ACTIVE', '2015-05-08', 'ADMIN'),
(17, 'Josephine', '8a0d597aaf17e980338fe62b5bc9eb56', 'josephine_darakjy@darakjy.org', 'Josephine', 'Darakjy', 'Darara', '4 B Blue Ridge Blvd', 'Chanay', '09765734534', 'Doctor', 'ACTIVE', '2015-05-08', 'ADMIN'),
(18, 'Ryanjeric', '21232f297a57a5a743894a0e4a801fc3', 'ryanjericsabado@yahoo.com', 'Ryan jeric', 'Sabado', 'Fernandez', '#301 San blas,Villasis,Pangasinan', 'GeekNest', '09314111116', 'Web Developer', 'ACTIVE', '2015-05-08', 'ADMIN'),
(19, 'ArtArt', '8943f909f9c2e98f44fa6ffa2ea470eb', 'Art@venere.org', 'Art', 'Venere', 'Wart', '8 W Cerritos Ave #54', 'Chemel', '09873453453', 'Web Designer', 'ACTIVE', '2015-05-08', 'ADMIN'),
(20, 'Lene', '21232f297a57a5a743894a0e4a801fc3', 'Paprocki@hotmail.com', 'Lene', 'Paprocki', 'Popo', '639 Main St', 'Feltz Service', '09345345256', 'Web Analyst', 'ACTIVE', '2015-05-08', 'ADMIN'),
(21, 'Donette', '1d183da10b2db09a8691d1db5e23ad07', 'donette.foller@cox.net', 'Donette', 'Foller', 'Foll', '34 Center St', 'Printing Dimension', '09323677777', 'Printer', 'ACTIVE', '2015-05-08', 'ADMIN'),
(22, 'Simona', 'b30bd351371c686298d32281b337e8e9', 'simona@morasca.com', 'Simona', 'Morasca', 'Morere', '3 Mcauley Dr', 'Chapman', '09889789789', 'Massager', 'ACTIVE', '2015-05-08', 'ADMIN'),
(23, 'Mitsue', '7eea638bdd873141b538fb37f5f729f5', 'mitsue_tollner@yahoo.com', 'Mitsue', 'Tollner', 'Toll', '7 Eads St', 'Morlong', '04111223423', 'Adviser', 'ACTIVE', '2015-05-08', 'ADMIN'),
(24, 'Leota', 'fe32cde989d7a9dfda7ead68580ae129', 'leota@hotmail.com', 'Leota', 'Dilliard', 'Dilda', '7 W Jackson Blvd', 'Commercial Press', '09393453422', 'Model', 'ACTIVE', '2015-05-08', 'ADMIN'),
(25, 'Sage', '72c8db4ba761522efbaadebd5ad3b419', 'sage_wieser@cox.net', 'Sage', 'Wieser', 'Will', '5 Boston Ave #88', 'Truhlar Attys', '09773457345', 'Attorney', 'DEACTIVATE', '2015-05-08', 'ADMIN'),
(26, 'KrisKris', 'eac2492029358e2f7b2e29d50ba3eed9', 'krisz@gmail.com', 'Krisz', 'Marrierz', 'Marrrz', '228 Runamuck Pl #2808z', 'King Esqz', '09787878787', 'Directorz', 'ACTIVE', '2015-05-08', 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
