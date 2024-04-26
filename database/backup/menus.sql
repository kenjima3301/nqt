-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: nqt
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `parent_id` int DEFAULT NULL,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Trang chủ','Home','/','Chọn cấp menu','public',NULL,NULL,'2024-04-15 20:04:03','2024-04-25 02:13:19'),(2,'Sản phẩm','Products',NULL,'1','public',NULL,NULL,'2024-04-15 20:05:30','2024-04-24 23:25:32'),(3,'Dịch vụ','Services',NULL,'1','public',NULL,NULL,'2024-04-15 20:05:56','2024-04-25 00:39:15'),(4,'Thông Tin','Information',NULL,'1','public',NULL,NULL,'2024-04-15 20:06:24','2024-04-25 00:39:25'),(5,'Tìm đại lý','Find Dealers','tim-dai-ly','Chọn cấp menu','public',NULL,NULL,'2024-04-15 20:06:52','2024-04-25 01:50:10'),(6,'Liên hệ','Contact us','lien-he','Chọn cấp menu','public',NULL,NULL,'2024-04-15 20:07:11','2024-04-25 01:50:37'),(7,'Tài khoản','Account',NULL,'Chọn cấp menu','unpublic',NULL,NULL,'2024-04-15 20:07:31','2024-04-25 00:28:45'),(8,'Lốp xe tải Trazano','Trazano Tyres',NULL,'2','public',2,NULL,'2024-04-15 20:08:19','2024-04-24 23:29:00'),(9,'Lốp xe tải Golden Crown','Golden Crown Tyres',NULL,'0','public',2,NULL,'2024-04-15 20:14:42','2024-04-15 20:14:42'),(10,'Lốp xe tải các nhãn hiệu khác','Other Brand Tyres',NULL,'0','public',2,NULL,'2024-04-15 20:15:15','2024-04-15 20:15:15'),(11,'Liên hệ','Contact us','lien-he','Chọn cấp menu','unpublic',NULL,NULL,'2024-04-15 20:46:08','2024-04-25 01:50:27'),(12,'Về Trazano','About Trazano','ve-trazano','Chọn cấp menu','public',8,NULL,'2024-04-24 23:33:02','2024-04-24 23:33:02'),(13,'Điểm nổi bật','Highlights',NULL,'Chọn cấp menu','public',8,NULL,'2024-04-25 00:45:05','2024-04-25 00:45:05'),(14,'Về chúng tôi','About us',NULL,'Chọn cấp menu','unpublic',NULL,NULL,'2024-04-25 01:20:54','2024-04-25 01:21:07');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-26  8:54:04
