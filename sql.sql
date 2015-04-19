# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: final
# Generation Time: 2014-11-16 22:32:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bills`;

CREATE TABLE `bills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `service` varchar(255) NOT NULL DEFAULT '',
  `statue` tinyint(1) NOT NULL,
  `ends_at` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `create_period` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL DEFAULT '',
  `site_email` varchar(255) NOT NULL DEFAULT '',
  `site_desc` varchar(255) NOT NULL DEFAULT '',
  `site_tags` varchar(255) NOT NULL DEFAULT '',
  `site_close` tinyint(1) NOT NULL DEFAULT '0',
  `site_message` text NOT NULL,
  `version` VARCHAR(10) NOT NULL DEFAULT '0.1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ssections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ssections`;

CREATE TABLE `ssections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tcomments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tcomments`;

CREATE TABLE `tcomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `staff` tinyint(1) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tickets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `statue` varchar(255) NOT NULL DEFAULT '',
  `last_comment` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tsections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tsections`;

CREATE TABLE `tsections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL,
  `active_c` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `restore` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
