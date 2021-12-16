/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 10.4.21-MariaDB : Database - nakiti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nakiti` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nakiti`;

/*Table structure for table `kategorija` */

DROP TABLE IF EXISTS `kategorija`;

CREATE TABLE `kategorija` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategorija` */

insert  into `kategorija`(`id`,`naziv`) values 
(1,'Zlato'),
(2,'Srebro');

/*Table structure for table `nakit` */

DROP TABLE IF EXISTS `nakit`;

CREATE TABLE `nakit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kategorija_id` bigint(20) DEFAULT NULL,
  `ime` varchar(40) DEFAULT 'null',
  `detalji` text DEFAULT NULL,
  `slika` text DEFAULT NULL,
  `gramaza` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategorija_id` (`kategorija_id`),
  CONSTRAINT `nakit_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nakit` */

insert  into `nakit`(`id`,`kategorija_id`,`ime`,`detalji`,`slika`,`gramaza`) values 
(1,1,'Ogrlica','Zenska zlatna ogrlica sa priveskom kljuca.','./slike/pozadina1.jpg',5),
(2,2,'Narukvica','Muska srebrna narukvica','./slike/pozadina2.jpg',4),
(3,2,'Prsten','rrrrrrr','./slike/pozadina2.jog',2),
(4,2,'Nesto','uuuu','./slike/pozadina3.jpg',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
