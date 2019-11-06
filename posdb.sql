/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - posdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`posdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `posdb`;

/*Table structure for table `actors` */

DROP TABLE IF EXISTS `actors`;

CREATE TABLE `actors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `actors` */

insert  into `actors`(`id`,`name`,`pincode`,`role`,`created_at`,`updated_at`) values 
(11,'Administrator','7c4a8d09ca3762af61e59520943dc26494f8941b','admin','2019-11-01 14:15:18','2019-11-01 14:15:18'),
(12,'Manager','908f704ccaadfd86a74407d234c7bde30f2744fe','manager','2019-11-01 14:15:18','2019-11-01 14:15:18'),
(13,'Cashier','118a43489e2f9ab66823eabdada672c906bb387f','cashier','2019-11-01 14:15:18','2019-11-01 14:15:18');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_10_28_000000_create_actors_table',1),
(2,'2019_10_31_081825_create_contacts_table',2),
(3,'2019_10_31_083223_create_contacts_table',3),
(5,'2019_11_01_140853_create_products_table',4),
(8,'2019_11_02_131104_create_work_hours_table',5);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`price`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'1','12',11.00,'2019-11-01 16:51:44','2019-11-01 16:59:08','2019-11-01 16:59:08'),
(2,'11','fsdfsdfsdfsd',0.05,'2019-11-01 17:08:48','2019-11-01 18:44:11',NULL),
(3,'hhhh','sdsd',0.02,'2019-11-02 14:10:43','2019-11-02 14:10:43',NULL);

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `session` */

insert  into `session`(`id`,`uid`,`session`) values 
(170,11,'5cxklh4Q6sPAdTPVmqKMkQb67Qm4aExgqRV2plCP'),
(171,11,'5cxklh4Q6sPAdTPVmqKMkQb67Qm4aExgqRV2plCP'),
(172,11,'XSvxbKwNuAlYI6rpomctlalK1iVkJ2vFrV3VDNY5'),
(173,11,'a2cK1ZXotomozm2xLgMvB3tOtr4AkiCaFpfOeWJR'),
(174,11,'ktMt3W9cDcIvVFVEqU2QwSeqZCUyqzQ89IgjrR02'),
(175,11,'mcsL7fpkHJXqdTRu8EKqppvoUt72fUNtqQhm5Eys'),
(176,11,'mcsL7fpkHJXqdTRu8EKqppvoUt72fUNtqQhm5Eys'),
(177,11,'mcsL7fpkHJXqdTRu8EKqppvoUt72fUNtqQhm5Eys'),
(178,11,'mcsL7fpkHJXqdTRu8EKqppvoUt72fUNtqQhm5Eys'),
(179,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(180,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(181,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(182,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(183,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(184,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(185,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(186,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(187,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(188,11,'CmXglosMFnKis0cyRCLWaozw8Ef7GjdNXJfaVrfA'),
(189,11,'73V6hOePUC4GmwGXzKz828QYFDpqrTcPgnR0od0N'),
(190,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(191,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(192,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(193,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(194,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(195,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(196,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(197,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(198,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(199,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(200,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(201,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(202,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW'),
(203,11,'ZSQwzd0KnWTdPqEtlJTGQD8Xt2kSGCzWtnP2v0HW');

/*Table structure for table `work_hours` */

DROP TABLE IF EXISTS `work_hours`;

CREATE TABLE `work_hours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actor_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `work_hours` */

insert  into `work_hours`(`id`,`actor_id`,`login_status`,`created_at`,`updated_at`) values 
(47,'11','out','2019-11-03 10:13:47','2019-11-03 10:14:42'),
(48,'11','in','2019-11-03 11:00:47','2019-11-03 11:00:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
