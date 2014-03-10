-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2014 at 04:06 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tesrok`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  `role_status` int(1) DEFAULT '1' COMMENT '1- active 0- deactive',
  `role_created` date DEFAULT NULL,
  `role_updated` int(11) DEFAULT NULL,
  `rolescol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name_UNIQUE` (`role_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings_email`
--

CREATE TABLE IF NOT EXISTS `settings_email` (
  `es_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_type` varchar(45) DEFAULT NULL,
  `es_smtp_host` varchar(45) DEFAULT NULL,
  `es_smtp_port` int(11) DEFAULT NULL,
  `es_smto_username` varchar(45) DEFAULT NULL,
  `es_smtp_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings_general`
--

CREATE TABLE IF NOT EXISTS `settings_general` (
  `gs_id` int(11) NOT NULL AUTO_INCREMENT,
  `gs_register` tinyint(4) DEFAULT '0' COMMENT 'Allow New User to Register, if value is 1- allow to register',
  `gs_user_act` tinyint(4) DEFAULT '0' COMMENT 'Every new user has to activated manually,\n\nIf 1 list new users in admin',
  `gs_notify_user_reg` tinyint(4) DEFAULT '0' COMMENT 'Notify admin of system when new user register\n\n1- send email',
  `gs_unreg_delete` int(11) DEFAULT '1' COMMENT 'Unregistered users get deleted after',
  `gs_default_blog` varchar(45) DEFAULT NULL COMMENT 'Default Blog Access',
  `gs_is_auto_logoff` tinyint(4) NOT NULL DEFAULT '1',
  `gs_logoff` int(11) DEFAULT '5',
  `gs_display_ticker` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`gs_id`,`gs_is_auto_logoff`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='General Settings ' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings_general`
--

INSERT INTO `settings_general` (`gs_id`, `gs_register`, `gs_user_act`, `gs_notify_user_reg`, `gs_unreg_delete`, `gs_default_blog`, `gs_is_auto_logoff`, `gs_logoff`, `gs_display_ticker`) VALUES
(1, 1, 0, 0, 1, NULL, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings_password`
--

CREATE TABLE IF NOT EXISTS `settings_password` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_enabled` tinyint(4) DEFAULT '1' COMMENT 'Enhanced password reset security enabled',
  `ps_max_attempt` int(11) DEFAULT '0' COMMENT 'Maximum Number of Security Attempts 0 to 25',
  `ps_max_password_reset` tinyint(4) DEFAULT '1' COMMENT 'Max Number of Password Resets Allowed per Hour',
  `ps_max_security_question_have` int(11) DEFAULT '1' COMMENT 'Maximum Number of Security Questions to have',
  `ps_max_security_quation_ask` int(11) DEFAULT '1' COMMENT 'Maximum Number of Security Questions to ask',
  `ps_max_password_reset_time` int(11) DEFAULT '1' COMMENT 'Max Time for Password Reset Request to expire',
  `ps_password_strength` varchar(20) DEFAULT 'simple',
  `ps_password_letter_count` int(11) DEFAULT '3' COMMENT 'minnumbers in letter',
  `ps_password_upper_letter_count` int(11) DEFAULT '2',
  `ps_password_num_count` int(11) DEFAULT '2' COMMENT 'Total Numbers in character',
  `ps_password_char_count` int(11) DEFAULT '6' COMMENT 'min Characters in Password',
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Password related Settings' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings_password`
--

INSERT INTO `settings_password` (`ps_id`, `ps_enabled`, `ps_max_attempt`, `ps_max_password_reset`, `ps_max_security_question_have`, `ps_max_security_quation_ask`, `ps_max_password_reset_time`, `ps_password_strength`, `ps_password_letter_count`, `ps_password_upper_letter_count`, `ps_password_num_count`, `ps_password_char_count`) VALUES
(1, 1, 5, 1, 1, 1, 1, 'simple', 3, 2, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_firstname` varchar(45) DEFAULT NULL,
  `usr_lastname` varchar(45) DEFAULT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_password` varchar(45) DEFAULT NULL,
  `usr_phone` varchar(40) NOT NULL,
  `usr_gender` int(11) DEFAULT NULL COMMENT '1- male 0 female',
  `usr_dob` date DEFAULT NULL,
  `usr_timezone` varchar(100) DEFAULT NULL,
  `usr_created` date DEFAULT NULL,
  `usr_last_login_datetime` datetime DEFAULT NULL,
  `usr_last_login_ip` varchar(45) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `usr_verification_key` varchar(100) DEFAULT NULL,
  `usr_status` int(45) DEFAULT '2' COMMENT '2- Not Active 1- active',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_email_UNIQUE` (`usr_email`),
  UNIQUE KEY `usr_phone_UNIQUE` (`usr_phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_firstname`, `usr_lastname`, `usr_email`, `usr_password`, `usr_phone`, `usr_gender`, `usr_dob`, `usr_timezone`, `usr_created`, `usr_last_login_datetime`, `usr_last_login_ip`, `role_id`, `usr_verification_key`, `usr_status`) VALUES
(4, 'Subash', 'PS', 'pssubashps@gmail.com', 'f04fd946f949026635ce4876969898b9', '0', 1, '0000-00-00', 'Africa/Ceuta', NULL, NULL, '127.0.0.1', NULL, 'ca22514867665e8d2d000593df63f001', 1),
(7, 'Subash', 'PS', 'pssubash@gmail.com', 'f04fd946f949026635ce4876969898b9', '(123) 456-7891', 1, '0000-00-00', 'Africa/Conakry', NULL, NULL, '127.0.0.1', NULL, '93c5d4fb2992b3690aa610b3bd16ac3e', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
