/*
SQLyog Community v13.1.2 (32 bit)
MySQL - 5.7.35 : Database - customers
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`customers` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `customers`;

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customers` */

insert  into `customers`(`id`,`firstname`,`lastname`,`email`,`username`,`country`,`gender`,`city`,`phone`,`passwd`,`created_at`,`updated_at`) values 
(1,'Brianna','Williams','margie.matthews@example.com','happylion107','Australia','female','Busselton','01-8940-2784','6baf2897ebd68792218ea5bb8acffecd','2021-09-04 05:59:13','2021-09-04 06:13:56'),
(2,'Kristen','Vasquez','kristen.vasquez@example.com','lazypanda934','Australia','female','Hobart','09-6714-8231','b5065483e0048a0dca5a3b73660d9dc0','2021-09-04 05:59:29','2021-09-04 05:59:29'),
(3,'Heidi','Duncan','heidi.duncan@example.com','ticklishbear779','Australia','female','Mackay','06-7112-4735','09568addbe31c1b1b8108a2fb9a0d76a','2021-09-04 05:59:31','2021-09-04 05:59:31'),
(4,'Shannon','Phillips','shannon.phillips@example.com','tinypeacock168','Australia','female','Orange','04-3848-2101','cf8b7a1ca043f59629c6caafb5c25b16','2021-09-04 05:59:43','2021-09-04 05:59:43'),
(5,'Hunter','Garcia','hunter.garcia@example.com','greenleopard539','Australia','male','Wollongong','03-8616-1846','0bcf3d200e41c3b349416e6abd9b0190','2021-09-04 06:25:45','2021-09-04 06:25:45'),
(6,'Connor','Brown','connor.brown@example.com','bigwolf615','Australia','male','Bowral','07-9182-7062','9a275537aead3cc2bc19665dcf99c9f3','2021-09-04 06:41:56','2021-09-04 06:41:56');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2021_09_04_034542_customers',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
