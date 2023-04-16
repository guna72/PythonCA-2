-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 05:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dey_hardware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `uname` varchar(15) NOT NULL,
  `pword` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `uname`, `pword`, `role`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'employ', '123', 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `customer_gstin` float NOT NULL,
  PRIMARY KEY (`ph_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `address`, `ph_no`, `customer_gstin`) VALUES
('sfdfsd', 'gdfgfg', '3333333333', 0),
('Sahed Ali', 'jhargram', '8609024873', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`employee_id`, `name`, `age`, `sex`, `mobile_no`, `email_id`, `role`, `reg_date`) VALUES
(1, 'ssss1', 33, 'm', '1234567890', 'sasasd@fddsg', 0, '0000-00-00'),
(2, 'ssss', 2, 'm', '1234567890', '3', 3, '0000-00-00'),
(3, 'sahed', 22, '', '1234567890', 'sasasd@fddsg', 0, '2017-10-17'),
(4, 'sahed1', 23, 'Male', '8609024873', 'sasasd@fddsg', 0, '2017-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salery_details`
--

CREATE TABLE IF NOT EXISTS `employee_salery_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date_of_payment` date NOT NULL,
  `payment_amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee_salery_details`
--

INSERT INTO `employee_salery_details` (`id`, `employee_id`, `date_of_payment`, `payment_amount`) VALUES
(1, 1, '2017-10-18', 34555),
(2, 1, '2017-12-01', 1200),
(3, 4, '2017-10-19', 15048),
(4, 1, '2017-10-19', 2000),
(5, 2, '2017-10-17', 222);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `ph_no` varchar(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `sac` varchar(10) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `qunty` int(11) NOT NULL,
  `cgst` varchar(10) NOT NULL,
  `sgst` varchar(10) NOT NULL,
  `igst` varchar(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `grand_total_not_gst` varchar(20) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `no_invoice_day` varchar(4) NOT NULL DEFAULT '0',
  `date_diffr` varchar(200) NOT NULL,
  `active` varchar(1) NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `ph_no`, `customer_name`, `product_name`, `sac`, `mrp`, `discount`, `qunty`, `cgst`, `sgst`, `igst`, `date`, `grand_total_not_gst`, `payment`, `no_invoice_day`, `date_diffr`, `active`) VALUES
(1, '8609024873', 'Sahed Ali', 'FANB', 'FAN2', '5000', '24.000000', 2, '5', '5', '0', '26-10-2017', '7600', '18240', '1', '+52', '1'),
(2, '8609024873', 'Sahed Ali', 'FANB', 'FAN2', '5000', '24.000000', 2, '5', '5', '0', '26-10-2017', '7600', '18240', '1', '+52', '1'),
(3, '8609024873', 'Sahed Ali', 'FANA', 'FAN1', '4000', '5.000000', 2, '5', '5', '0', '26-10-2017', '7600', '20520', '2', '+52', '1'),
(4, '8609024873', 'Sahed Ali', 'FANB', 'FAN2', '5000', '5.000000', 2, '5', '5', '0', '26-10-2017', '9500', '20520', '2', '+52', '1'),
(5, '8609024873', 'Sahed Ali', 'bik002', 'bik002', '60000', '5.000000', 2, '5', '5', '0', '03-11-2017', '114000', '125400', '1', '+60', '1'),
(6, '8609024873', 'Sahed Ali', 'FAN2', 'FAN2', '  3555', '5.000000', 2, '2', '2', '0', '08-11-2017', '6755', '7025', '1', '+65', '1'),
(7, '8609024873', 'Sahed Ali', 'FAN2', 'FAN2', '  4000', '5.000000', 2, '2.5', '2.5', '0', '09-11-2017', '7600', '17955', '1', '+66', '1'),
(8, '8609024873', 'Sahed Ali', 'FAN2', 'FAN2', '  5000', '5.000000', 2, '2.5', '2.5', '0', '09-11-2017', '9500', '17955', '1', '+66', '1'),
(9, '8609024873', 'Sahed Ali', 'FAN2', 'FAN2', '  3000', '5.000000', 2, '4', '4', '0', '09-11-2017', '5700', '7182', '2', '+66', '1'),
(10, '8609024873', 'Sahed Ali', 'mo001', 'mo001', ' 1000', '5.000000', 1, '4', '4', '0', '09-11-2017', '950', '7182', '2', '+66', '1');

-- --------------------------------------------------------

--
-- Table structure for table `parches`
--

CREATE TABLE IF NOT EXISTS `parches` (
  `parches_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_status` int(11) NOT NULL,
  PRIMARY KEY (`parches_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `parches`
--

INSERT INTO `parches` (`parches_id`, `vendor_id`, `amount`, `invoice_no`, `invoice_date`, `date`, `payment_status`) VALUES
(1, 1, 40000, '1234', '2017-11-14', '2017-11-09 20:46:43', 1),
(2, 1, 3000000, '1235', '2017-09-11', '2017-11-09 16:18:43', 0),
(3, 1, 3, '1236', '2017-11-13', '2017-11-09 16:18:46', 0),
(4, 1, 2000000, '1237', '2017-11-13', '2017-11-09 16:18:50', 0),
(5, 1, 80000, '1238', '2017-11-27', '2017-11-09 16:18:53', 0),
(6, 1, 5000, '1239', '2017-11-08', '2017-11-09 16:18:56', 0),
(7, 1, 2000, '1240', '2017-11-09', '2017-11-09 16:18:58', 0),
(8, 1, 2000, '1242', '2017-11-08', '2017-11-09 16:19:01', 0),
(9, 1, 60000, '1243', '2017-11-08', '2017-11-09 16:18:27', 0),
(10, 2, 22555, '1245', '2017-11-06', '2017-11-09 20:33:49', 1),
(11, 1, 333, '1246', '2017-11-06', '2017-11-09 16:18:32', 0),
(12, 1, 333, '1247', '2017-11-07', '2017-11-09 16:18:20', 0),
(13, 2, 50000, '1248', '0000-00-00', '2017-11-09 20:45:13', 1),
(14, 2, 50000, '1249', '2017-11-09', '2017-11-09 16:18:16', 0),
(15, 2, 50000, '1250', '2017-11-09', '2017-11-09 20:33:27', 0),
(16, 1, 45000, 'AGT6-146262', '2017-11-10', '2017-11-10 09:25:08', 0),
(17, 2, 30000, 'sahed-008', '2017-11-10', '2017-11-10 09:25:30', 0),
(18, 1, 50000, 'FGDS-67586', '2017-11-10', '2017-11-10 09:26:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parches_payment`
--

CREATE TABLE IF NOT EXISTS `parches_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) NOT NULL,
  `payment_amount` float NOT NULL,
  `cheque_no` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `parches_payment`
--

INSERT INTO `parches_payment` (`id`, `invoice_no`, `payment_amount`, `cheque_no`, `payment_date`, `date`) VALUES
(1, '1245', 22555, 'vhjf', '2017-11-10', '2017-11-09 20:33:49'),
(2, '1248', 25000, '333', '2017-11-10', '2017-11-09 20:34:42'),
(3, '1248', 20000, 'jhgh', '2017-11-10', '2017-11-09 20:35:29'),
(4, '1248', 5000, '333', '2017-11-10', '2017-11-09 20:45:12'),
(5, '1234', 10000, 'dgdsg', '2017-11-09', '2017-11-09 20:45:59'),
(6, '1234', 10000, 'xvxv', '2017-11-10', '2017-11-09 20:46:28'),
(7, '1234', 20000, 'xvcvc', '2017-11-10', '2017-11-09 20:46:43'),
(8, '1238', 60000, 'newhgfg', '2017-11-10', '2017-11-10 09:15:22'),
(9, 'AGT6-146262', 40000, 'ADSRRFRF765456', '2017-11-10', '2017-11-10 09:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment`
--

CREATE TABLE IF NOT EXISTS `partial_payment` (
  `date` varchar(100) NOT NULL,
  `no_invoice_day` varchar(100) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  PRIMARY KEY (`date`,`no_invoice_day`,`ph_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`date`, `no_invoice_day`, `ph_no`, `payment`, `total`) VALUES
('12-10-2017', '3', '8609024873', '2112', '2112'),
('12-10-2017', '6', '8609024873', '69341', '69341'),
('26-10-2017', '2', '8609024873', '20314', '20314');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_name` varchar(200) NOT NULL,
  `sac` varchar(100) NOT NULL COMMENT 'product_id',
  `mrp` float NOT NULL,
  `discount` decimal(10,6) NOT NULL,
  `count` varchar(100) NOT NULL,
  `purches_amount` float NOT NULL,
  `prdoduct_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`sac`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `sac`, `mrp`, `discount`, `count`, `purches_amount`, `prdoduct_cat_id`) VALUES
('bike', 'bik002', 60000, '5.000000', '36', 0, 1),
('FANA', 'FAN1', 4000, '5.000000', '50', 0, 2),
('FANB', 'FAN2', 5000, '5.000000', '15', 0, 3),
('mobile', 'mo001', 2000, '5.000000', '15', 0, 4),
('jhjkdfgd', 'new', 444, '10.000000', '2', 555, 0),
('DEMO', 'S123-34', 5822, '5.000000', '20', 5820, 3),
('zxczxc', 'sajee', 3333, '3.000000', '2', 4444, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(20) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `mrp` float NOT NULL,
  `discount` decimal(10,6) NOT NULL,
  `count` int(11) NOT NULL,
  `purches_amount` float NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `product_id`, `category_name`, `mrp`, `discount`, `count`, `purches_amount`) VALUES
(1, 1, '44', 4, '4.000000', 4, 0),
(2, 1, 'cat1', 22, '2.000000', 24, 0),
(3, 1, 'cat3', 44, '32.000000', 54, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE IF NOT EXISTS `product_master` (
  `product_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_cat_id`, `product_cat_name`) VALUES
(1, 'Faucet'),
(2, 'Sanitaryware'),
(3, 'Hot Water Solution'),
(4, 'G.I Pipes'),
(5, 'PVC Pipes'),
(6, 'Fittings');

-- --------------------------------------------------------

--
-- Table structure for table `tax_table`
--

CREATE TABLE IF NOT EXISTS `tax_table` (
  `cgst` varchar(10) NOT NULL,
  `sgst` varchar(10) NOT NULL,
  `igst` varchar(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_table`
--

INSERT INTO `tax_table` (`cgst`, `sgst`, `igst`, `user_id`) VALUES
('2.5', '2.5', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_no` int(22) NOT NULL,
  `bank_address` varchar(50) NOT NULL,
  `ifsc_code` varchar(40) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `bank_name`, `account_no`, `bank_address`, `ifsc_code`) VALUES
(1, 'Jagure', 'UBI BANK', 1234567890, 'hfghfgjhfgjfgj', 'qwe1234556'),
(2, 'Sahed Ali', 'asdasd', 23423423, 'hfghjfgjgfjg', 'dfgdfg'),
(3, 'fdgdgdf', 'gfdgdfg', 3454354, '', 'rrrrrrrrr'),
(4, 'ffdhfgh', 'fghfgh', 2147483647, 'fhfghgfjghj', 'fhfghfgh35345'),
(5, 'dfgdfgdf', 'dfgdfhgdfh', 2147483647, 'jhargram', 'dfgdfgfg453456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
