-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 26, 2010 at 11:03 PM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1
-- 
-- Database: `harder2scan`
-- 

CREATE DATABASE `harder2scan` ;
USE `harder2scan` ;

-- --------------------------------------------------------

-- 
-- Table structure for table `accounts`
-- 

CREATE TABLE `accounts` (
  `id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `accounts`
-- 

INSERT INTO `accounts` (`id`, `user`, `type`, `balance`) VALUES 
('1001160140', 'jsmith', 'Checking', 2490),
('1001160141', 'jsmith', 'Savings', 15510);

-- --------------------------------------------------------

-- 
-- Table structure for table `email`
-- 

CREATE TABLE `email` (
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

-- 
-- Table structure for table `surveys`
-- 

CREATE TABLE `surveys` (
  `email` varchar(255) NOT NULL,
  `impressed` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `transactions`
-- 

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(255) NOT NULL DEFAULT '1001160141',
  `date` int(11) NOT NULL DEFAULT '1267219500',
  `description` varchar(255) NOT NULL DEFAULT 'Payment',
  `amount` varchar(255) NOT NULL DEFAULT '1200',
  `type` varchar(255) NOT NULL DEFAULT 'debit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `transactions`
-- 

INSERT INTO `transactions` (`id`, `account_id`, `date`, `description`, `amount`, `type`) VALUES 
(1, '1001160140', 1261219500, 'Payment', '1200', 'credit'),
(2, '1001160140', 1262219500, 'Payment', '1200', 'credit'),
(3, '1001160140', 1263219500, 'Payment', '1200', 'credit'),
(4, '1001160140', 1264219500, 'Payment', '1200', 'credit'),
(5, '1001160140', 1265219500, 'Payment', '1200', 'credit'),
(6, '1001160140', 1266219500, 'Payment', '1200', 'credit'),
(7, '1001160140', 1261519500, 'Department Store', '100', 'debit'),
(8, '1001160140', 1267219500, 'Groceries', '55', 'debit'),
(11, '1001160140', 1261519500, 'Cable TV', '99.5', 'debit'),
(12, '1001160140', 1261519500, 'Phone Bill', '56.8', 'debit'),
(13, '1001160140', 1267219500, 'Withdrawal', '20', 'debit'),
(14, '1001160140', 1266519500, 'Withdrawal', '40', 'debit'),
(15, '1001160141', 1261219500, 'Transfer from Checking', '800', 'credit'),
(16, '1001160141', 1262219500, 'Transfer from Checking', '500', 'credit'),
(17, '1001160141', 1264219500, 'Transfer from Checking', '600', 'credit'),
(18, '1001160141', 1265219500, 'Transfer from Checking', '1000', 'credit'),
(19, '1001160141', 1267219500, 'Caribbean Resort', '3000', 'debit'),
(20, '1001160141', 1265219500, 'Wide Screen TV', '1516.5', 'debit'),
(21, '1001160141', 1267219500, 'Payment', '1200', 'debit'),
(22, '1001160141', 1267236963, 'Transfer from 1001160140', '10', 'credit');


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`user`, `pass`, `role`, `name`) VALUES 
('admin', 'admin', 'admin', 'Admin'),
('jsmith', 'Demo1234', 'user', 'John Smith');
