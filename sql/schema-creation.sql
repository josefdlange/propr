CREATE DATABASE IF NOT EXISTS `propr`;
USE `propr`;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  
  PRIMARY KEY(`category_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8  AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `in_category` (

  `prop_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;



CREATE TABLE IF NOT EXISTS `in_production` (

  `date_out` date NOT NULL,
  `date_due` date NOT NULL,
  `date_returned` date NOT NULL,
  `condition_out` enum('poor','normal','good','excellent','new') NOT NULL,
  `condition_returned` enum('poor','normal','good','excellent','new') NOT NULL,
  `prop_id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `involved_in` (

  `person_id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `owns_prop` (

  `person_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  
  PRIMARY KEY (`prop_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `person` (

  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address_line1` varchar(30) NOT NULL,
  `address_line2` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state_province` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `person_type` enum('actor','director','assistant','designer','faculty','scholar','manager','other') NOT NULL,
  `orginization` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,

  PRIMARY KEY (`person_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `photo` (

  `prop_id` int(30) NOT NULL,
  `photo_mime_type` varchar(30) NOT NULL,
  `photo_blob` longblob NOT NULL,

  PRIMARY KEY (`prop_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `production` (

  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `playwright` varchar(40) NOT NULL,
  `orginization` varchar(40) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` text NOT NULL,

  PRIMARY KEY (`production_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `prop` (

  `prop_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL,

  PRIMARY KEY (`prop_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

