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
-- Table structure for table `section_contents`
--

DROP TABLE IF EXISTS `section_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_contents`
--

LOCK TABLES `section_contents` WRITE;
/*!40000 ALTER TABLE `section_contents` DISABLE KEYS */;
INSERT INTO `section_contents` VALUES (1,'truong_trinh_khuyen_mai','Chương trình khuyến mãi','Promotion programme',NULL,NULL,'2024-04-15 23:23:59','2024-04-15 23:31:10'),(3,'san_pham_moi','Sản phẩm mới','New Products',NULL,NULL,'2024-04-24 00:38:40','2024-04-24 00:38:40'),(4,'san_pham_ban_chay','Sản phẩm bán chạy','Best Seller',NULL,NULL,'2024-04-24 00:40:04','2024-04-24 00:40:04'),(5,'footer_dia_chi','Địa chỉ: 79/5A DT743 - Phường Tân Đông Hiệp - TP. Dĩ An - Tỉnh Bình Dương','Address: 79/5A DT743 -  Tan Dong Hiep Ward - Dĩ An City - Binh Duong Province',NULL,NULL,'2024-04-24 00:44:36','2024-04-24 00:44:36'),(6,'footer_mst','MST: 0314168571','Tax: 0314168571',NULL,NULL,'2024-04-24 00:53:32','2024-04-24 00:53:32'),(8,'footer_email','Email: nqt3999@gmail.com','Email: nqt3999@gmail.com',NULL,NULL,'2024-04-24 01:01:46','2024-04-24 01:01:46'),(9,'footer_dien_thoai','Điện thoại: (+84) 934.54.13.13','Phone: (+84) 934.54.13.13',NULL,NULL,'2024-04-24 01:02:32','2024-04-24 01:02:32'),(10,'footer_ve_chung_toi','Về chúng tôi','About us',NULL,NULL,'2024-04-24 01:04:01','2024-04-24 01:04:01'),(11,'footer_thong_tin','Thông tin','Information',NULL,NULL,'2024-04-24 01:06:35','2024-04-24 01:06:35'),(12,'footer_ve_nqt','Về Ngọc Quyết Thắng','About Ngoc Quyet Thang',NULL,NULL,'2024-04-24 01:08:10','2024-04-24 01:08:10'),(13,'footer_zalo_chat','https://zalo.me/0934541313',NULL,NULL,NULL,'2024-04-24 20:09:14','2024-04-24 20:09:14'),(14,'footer_facebook_chat',NULL,NULL,NULL,NULL,'2024-04-24 20:10:18','2024-04-24 20:10:18'),(15,'ten_tim_kiem','Tìm kiếm mã gai hoặc size lốp','Search by Code or Size',NULL,NULL,'2024-04-25 02:11:50','2024-04-25 02:11:50'),(16,'ve_nqt_tieu_de','LỊCH SỬ PHÁT TRIỂN','OUR HISTORY',NULL,NULL,'2024-04-25 02:17:12','2024-04-25 02:17:12'),(17,'ve_nqt_thanh_lap','CÔNG TY CỔ PHẦN NGỌC QUYẾT THẮNG được thành lập ngày 21/12/2016','Ngoc Quyet Thang Joint Stock Company was established on 21/12/2016',NULL,'Nguồn nhân lực là yếu tố quan trọng mang đến sự thành công:\r\nGiám đốc có nhiều kinh nghiệm, năng động giúp Công ty phát triển liên tục nhiều năm\r\nĐội ngũ nhân viên, quản lý trình đô cao, sảng tạo\r\nTập thể CBCNV đoàn kết nhất trí, tự tin và có trách nhiệm với công việc.','2024-04-25 02:21:22','2024-04-25 02:28:36'),(18,'ve_nqt_su_menh','SỨ MỆNH','MISSION',NULL,'Luôn thích nghi với sự thay đổi của thị trường. Kịp thời nắm bắt xu hướng phát triển của thế giới, chủ động tạo lợi thế cạnh tranh để phát triển bền vững. Đẩy mạnh nhập khẩu các loại lốp xe tải Radial có chất lượng cao nhất để phục vụ nhu cầu ngày càng cao của khách hàng.','2024-04-25 02:29:57','2024-04-25 02:29:57'),(19,'ve_nqt_tam_nhin','TẦM NHÌN','VISION',NULL,'I.Tầm nhìn Doanh nghiệp\r\nII. Tầm nhìn thương hiệu','2024-04-25 02:33:18','2024-04-25 02:33:18'),(20,'ve_nqt_tam_nhin_1','- Tuyên bố về tầm nhìn doanh nghiệp',NULL,NULL,'Luôn khẳng định NQT là nhà nhập khẩu và phân phối hàng đầu về lốp Ô tô tải, Ô Tô Khách tại Việt Nam.\r\nMở rộng và phát triển lớn mạnh các sản phẩm săm lốp xe truyền thống phục vụ nhu cầu đa dạng của Khách hàng.','2024-04-25 02:37:48','2024-04-25 02:37:48'),(21,'ve_nqt_tam_nhin_12','- Giải thích nội dung tuyên bố tầm nhìn doanh nghiệp',NULL,NULL,'NQT khẳng định với người tiêu dùng là thương hiệu được NQT nhập khẩu và đưa ra thị trường luôn đảm bảo về chất lượng hàng đầu Việt Nam.\r\nNQT luôn luôn lựa chọn nhập khẩu và phân phối các dòng sản phẩm chất lượng cao, giá bán cạnh tranh đáp ứng lợi ích thiết thực của người tiêu dùng, đóng góp tích cực cho sự phát triển kinh tế Việt Nam','2024-04-25 02:42:34','2024-04-25 02:42:34'),(22,'ve_nqt_tam_nhin_2','- Tuyên bố về tầm nhìn thương hiệu sản phẩm',NULL,NULL,'Khẳng định vị trí nhà nhập khẩu, phân phối hàng đầu Việt Nam\r\nNQT phấn đấu là thương hiệu nổi tiếng Việt Nam. Từng bước xây dựng hệ thống khách hàng tin cậy bền vững tại Việt Nam, với số lượng khách hàng ngày càng đông.','2024-04-25 02:44:34','2024-04-25 02:44:34'),(23,'ve_nqt_gia_tri','GIÁ TRỊ CỐT LÕI',NULL,NULL,'Tuyên bố về giá trị cốt lõi của doanh nghiệp:','2024-04-25 02:46:36','2024-04-25 02:46:36'),(24,'ve_nqt_gia_tri_1','Tinh thần đồng đội',NULL,NULL,'Có chung niềm tin và mục tiêu vì sự phát triển Công ty. Không đố kỵ, bè phái và luôn giúp đỡ, tương trợ, quan tâm lẫn nhau trong công việc và cuộc sống.','2024-04-25 02:48:31','2024-04-25 02:48:31'),(25,'ve_nqt_gia_tri_2','Sự nhiệt huyết',NULL,NULL,'Làm việc xuất phát từ tấm lòng, luôn làm việc hết mình với trách nhiệm cao nhất có thể.','2024-04-25 02:52:17','2024-04-25 02:52:17'),(26,'ve_nqt_gia_tri_3','Tính chuyên nghiệp',NULL,NULL,'Làm việc theo kế hoạch, có tinh thần trách nhiệm, tác phong công nghiệp, có tính tự chủ và tinh thần hợp tác trong công việc.','2024-04-25 02:53:43','2024-04-25 02:53:43'),(27,'ve_nqt_gia_tri_4','Không ngừng sáng tạo',NULL,NULL,'Không bao giờ hài lòng, thỏa mãn với kết quả đạt được. Học tập cái mới, không ngừng sáng tạo để thành công.','2024-04-25 02:54:05','2024-04-25 02:54:05'),(28,'ve_nqt_gia_tri_5','Tôn trọng lợi ích Khách hàng – Doanh nghiệp – Cộng đồng',NULL,NULL,'Đặt lợi ích Doanh nghiệp, lợi ích Khách hàng và cộng đồng cao hơn lợi ích cá nhân.','2024-04-25 02:54:20','2024-04-25 02:54:20'),(29,'ve_nqt_he_thong_phan_phoi','HỆ THỐNG PHÂN PHỐI & KHÁCH HÀNG TRONG NƯỚC',NULL,NULL,'NQT đã thiết lập hệ thống phân phối mạnh và rộng khắp Việt Nam. Các nhà phân phối của NQT có nhiều kinh nghiệm, có sự gắn kết, hợp tác vì sự phát triển chung và lâu dài.\r\nNhiều khách hàng lớn tin dùng sản phẩm do NQT nhập khẩu và phân phôi như: Công ty Vận Tải Nam Quốc, Cong Ty TNHH Cảng Quốc Tế Tân Cảng Cái Mép, Công ty Vận Tải Thành Đạt, Công ty Vận Tải Bình Minh Tải, nhiều Cty vận tải , xe khách cả nước.','2024-04-25 02:55:32','2024-04-25 02:55:32'),(30,'ve_nqt_thanh_qua','THÀNH QUẢ VÀ VỊ THẾ CỦA NQT',NULL,NULL,'Bằng sự linh hoạt và sáng tạo NQT đã tạo được lợi thế cạnh tranh trên thị trường. Tốc độ tăng trưởng cao và liên tục trong nhiều năm và hiện nay NQT dần chiếm lĩnh thị phần lốp ô tô tải tại Việt Nam.','2024-04-25 02:57:32','2024-04-25 02:57:32'),(31,'ve_nqt_chien_luoc','CHIẾN LƯỢC PHÁT TRIỂN',NULL,NULL,'Với lợi thế về nguồn nhân lực năng động, trách nhiệm; sản phẩm do NQT nhập khẩu và phân phối có thị phần lớn\r\nVới nhiều năm kinh nghiệm trong ngành nhập khẩu, phân phối săm lốp, NQT tin tưởng sẽ tiếp tục đáp ứng tốt mọi nhu cầu của khách hàng trong nước, xứng đáng là Nhà nhập khẩu, phân phối săm lốp xe hàng đầu tại Việt Nam.','2024-04-25 02:59:19','2024-04-25 02:59:19'),(32,'ve_nqt_hinh_anh','Hình ảnh','Gallery',NULL,NULL,'2024-04-25 03:01:18','2024-04-25 03:01:18');
/*!40000 ALTER TABLE `section_contents` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-26  8:55:25
