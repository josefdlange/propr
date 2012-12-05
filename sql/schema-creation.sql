CREATE DATABASE IF NOT EXISTS `propr`;
USE `propr`;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `category` (
  `category-id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  
  PRIMARY KEY(`category-id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8  AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `in-category` (

  `prop-id` int(11) NOT NULL,
  `category-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;



CREATE TABLE IF NOT EXISTS `in-production` (

  `date-out` date NOT NULL,
  `date-due` date NOT NULL,
  `date-returned` date NOT NULL,
  `condition-out` enum('poor','normal','good','excellent','new') NOT NULL,
  `condition-returned` enum('poor','normal','good','excellent','new') NOT NULL,
  `prop-id` int(11) NOT NULL,
  `production-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `involved-in` (

  `person-id` int(11) NOT NULL,
  `production-id` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `person` (

  `person-id` int(11) NOT NULL AUTO_INCREMENT,
  `last-name` varchar(30) NOT NULL,
  `first-name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address-line1` varchar(30) NOT NULL,
  `address-line2` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state-province` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `person-type` enum('actor','director','assistant','designer','faculty','scholar','manager','other') NOT NULL,
  `orginization` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,

  PRIMARY KEY (`person-id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `photo` (

  `prop-id` int(30) NOT NULL,
  `photo-mime-type` varchar(30) NOT NULL,
  `photo-blob` longblob NOT NULL,

  PRIMARY KEY (`prop-id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `production` (

  `production-id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `playwright` varchar(40) NOT NULL,
  `orginization` varchar(40) NOT NULL,
  `start-date` date NOT NULL,
  `end-date` text NOT NULL,

  PRIMARY KEY (`production-id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `prop` (

  `prop-id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `photo-id` int(11),
  `tag` varchar(30) NOT NULL,

  PRIMARY KEY (`prop-id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

