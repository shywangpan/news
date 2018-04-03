/*
SQLyog v10.2 
MySQL - 5.5.40 : Database - news
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`news` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `news`;

/*Table structure for table `admin_group` */

DROP TABLE IF EXISTS `admin_group`;

CREATE TABLE `admin_group` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(20) DEFAULT NULL COMMENT '组名：',
  `coutent` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `admin_group` */

insert  into `admin_group`(`gid`,`gname`,`coutent`) values (20,'广告管理员','a:6:{i:0;s:3:\"2,0\";i:1;s:3:\"2,2\";i:2;s:3:\"2,3\";i:3;s:3:\"2,4\";i:4;s:3:\"2,5\";i:5;s:3:\"3,0\";}'),(10,'超级管理员','a:27:{i:0;s:3:\"0,0\";i:1;s:3:\"0,1\";i:2;s:3:\"0,2\";i:3;s:3:\"0,3\";i:4;s:3:\"0,4\";i:5;s:3:\"0,5\";i:6;s:3:\"0,6\";i:7;s:3:\"0,7\";i:8;s:3:\"0,8\";i:9;s:3:\"1,0\";i:10;s:3:\"1,1\";i:11;s:3:\"1,2\";i:12;s:3:\"1,3\";i:13;s:3:\"1,4\";i:14;s:3:\"1,5\";i:15;s:3:\"2,0\";i:16;s:3:\"2,1\";i:17;s:3:\"2,2\";i:18;s:3:\"2,3\";i:19;s:3:\"2,4\";i:20;s:3:\"2,5\";i:21;s:3:\"3,0\";i:22;s:3:\"3,1\";i:23;s:3:\"3,2\";i:24;s:3:\"3,4\";i:25;s:3:\"3,5\";i:26;s:3:\"3,6\";}'),(19,'技术部','N;'),(18,'销售部','a:27:{i:0;s:3:\"0,0\";i:1;s:3:\"0,1\";i:2;s:3:\"0,2\";i:3;s:3:\"0,3\";i:4;s:3:\"0,4\";i:5;s:3:\"0,5\";i:6;s:3:\"0,6\";i:7;s:3:\"0,7\";i:8;s:3:\"0,8\";i:9;s:3:\"1,0\";i:10;s:3:\"1,1\";i:11;s:3:\"1,2\";i:12;s:3:\"1,3\";i:13;s:3:\"1,4\";i:14;s:3:\"1,5\";i:15;s:3:\"2,0\";i:16;s:3:\"2,1\";i:17;s:3:\"2,2\";i:18;s:3:\"2,3\";i:19;s:3:\"2,4\";i:20;s:3:\"2,5\";i:21;s:3:\"3,0\";i:22;s:3:\"3,1\";i:23;s:3:\"3,2\";i:24;s:3:\"3,4\";i:25;s:3:\"3,5\";i:26;s:3:\"3,6\";}'),(21,'广告管理员','a:6:{i:0;s:3:\"2,0\";i:1;s:3:\"2,1\";i:2;s:3:\"2,2\";i:3;s:3:\"2,3\";i:4;s:3:\"2,4\";i:5;s:3:\"2,5\";}'),(22,'admin','a:28:{i:0;s:3:\"0,0\";i:1;s:3:\"0,1\";i:2;s:3:\"0,2\";i:3;s:3:\"0,3\";i:4;s:3:\"0,4\";i:5;s:3:\"0,5\";i:6;s:3:\"0,6\";i:7;s:3:\"0,7\";i:8;s:3:\"0,8\";i:9;s:3:\"1,0\";i:10;s:3:\"1,1\";i:11;s:3:\"1,2\";i:12;s:3:\"1,3\";i:13;s:3:\"1,4\";i:14;s:3:\"1,5\";i:15;s:3:\"2,0\";i:16;s:3:\"2,1\";i:17;s:3:\"2,2\";i:18;s:3:\"2,3\";i:19;s:3:\"2,4\";i:20;s:3:\"2,5\";i:21;s:3:\"3,0\";i:22;s:3:\"3,1\";i:23;s:3:\"3,2\";i:24;s:3:\"3,3\";i:25;s:3:\"3,4\";i:26;s:3:\"3,5\";i:27;s:3:\"4,0\";}');

/*Table structure for table `admin_users` */

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `pass_word` varchar(32) DEFAULT '',
  `status` char(1) DEFAULT '1' COMMENT '1正常；2禁用',
  `add_time` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL COMMENT '用户组表',
  PRIMARY KEY (`id`,`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `admin_users` */

insert  into `admin_users`(`id`,`user_name`,`pass_word`,`status`,`add_time`,`group_id`) values (30,'张三','e10adc3949ba59abbe56e057f20f883e','2',NULL,19),(1,'admin','7fef6171469e80d32c0559f88b377245','1',NULL,10);

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL COMMENT '广告ID',
  `type` char(1) DEFAULT '1' COMMENT '1:图片2:文字3：其他',
  `pic` varchar(300) DEFAULT '' COMMENT '图片路径',
  `text` varchar(500) DEFAULT '' COMMENT '文字内容textarea',
  `href` varchar(200) DEFAULT NULL COMMENT '广告链接地址',
  `aname` varchar(100) DEFAULT '' COMMENT '广告名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `ads` */

insert  into `ads`(`id`,`pid`,`type`,`pic`,`text`,`href`,`aname`) values (30,18,'2','','11','11','wq'),(31,18,'1','static/upload/2017/03/20/585192473b1b931b6fd78852df627736.png','','wqqwq','assa'),(23,2,'2','','111','111','22');

/*Table structure for table `ads_position` */

DROP TABLE IF EXISTS `ads_position`;

CREATE TABLE `ads_position` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) DEFAULT NULL COMMENT '广告位名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `ads_position` */

insert  into `ads_position`(`id`,`pname`) values (20,'头部广告'),(19,'我去'),(1,'首页-头部 1248*30'),(18,'wsq');

/*Table structure for table `china_classify` */

DROP TABLE IF EXISTS `china_classify`;

CREATE TABLE `china_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `cname` varchar(20) DEFAULT NULL,
  `hierarchy` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `china_classify` */

insert  into `china_classify`(`id`,`pid`,`cname`,`hierarchy`) values (1,0,'中国',1),(2,1,'陕西',2),(3,2,'西安',3),(4,0,'国外',1),(5,4,'',2),(6,3,'',4),(7,0,'',1);

/*Table structure for table `database` */

DROP TABLE IF EXISTS `database`;

CREATE TABLE `database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `db_name` varchar(60) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `database` */

/*Table structure for table `demo` */

DROP TABLE IF EXISTS `demo`;

CREATE TABLE `demo` (
  `img_id` int(20) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(200) DEFAULT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `demo` */

insert  into `demo`(`img_id`,`img_name`,`img_url`) values (1,'111','11'),(2,'11','11111'),(3,'333','333');

/*Table structure for table `example` */

DROP TABLE IF EXISTS `example`;

CREATE TABLE `example` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `content` text COMMENT '服务内容',
  `price` decimal(9,1) DEFAULT '0.0' COMMENT '案例费用',
  `logo` varchar(200) DEFAULT '' COMMENT 'logo',
  `plan` text COMMENT '设计方案',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Data for the table `example` */

insert  into `example`(`id`,`title`,`content`,`price`,`logo`,`plan`) values (57,'11','2112','11.0','static/upload/example//1744c3f2baa74fbcb1540963acb45248.jpg','121');

/*Table structure for table `example_gallery` */

DROP TABLE IF EXISTS `example_gallery`;

CREATE TABLE `example_gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gtitle` varchar(200) DEFAULT '' COMMENT '图片描述',
  `href` varchar(200) DEFAULT '' COMMENT '相片路径',
  `example_id` int(10) DEFAULT NULL COMMENT '案例id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Data for the table `example_gallery` */

insert  into `example_gallery`(`id`,`gtitle`,`href`,`example_id`) values (61,'2121','static/upload/example//7b40a91d21c2165e896501c997b4fc98.jpg',57),(60,'2121','static/upload/example/9e82798fb4268ba6fe8f91ca2b184589.jpg',57);

/*Table structure for table `flink` */

DROP TABLE IF EXISTS `flink`;

CREATE TABLE `flink` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(30) NOT NULL DEFAULT '',
  `link_href` varchar(200) DEFAULT '',
  `order` int(10) DEFAULT '0',
  `logo` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`,`link_name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `flink` */

insert  into `flink`(`id`,`link_name`,`link_href`,`order`,`logo`) values (19,'111','http://localhost/qy/admin/flink.php?act=add',1,'static/upload/flink//af5def65ecf01807b5abb80d2f635b59.jpg');

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '产品',
  `classify_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `goods_name` varchar(100) NOT NULL DEFAULT '',
  `goods_info` varchar(200) DEFAULT '',
  `shop_price` decimal(9,1) NOT NULL DEFAULT '0.0' COMMENT '本店价格',
  `market_price` decimal(9,1) NOT NULL DEFAULT '0.0' COMMENT '市场价格',
  `is_shelves` tinyint(1) DEFAULT NULL COMMENT '1上架2下架',
  `click` int(10) DEFAULT '0',
  `goods_pic` varchar(200) NOT NULL COMMENT '产品图路径',
  `sales` smallint(3) DEFAULT '0' COMMENT '销量',
  `count` int(10) DEFAULT '0' COMMENT '库存',
  `description` text NOT NULL,
  `add_time` date DEFAULT NULL COMMENT '添加时间',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`goods_id`,`classify_id`,`brand_id`,`goods_name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `goods` */

insert  into `goods`(`goods_id`,`classify_id`,`brand_id`,`goods_name`,`goods_info`,`shop_price`,`market_price`,`is_shelves`,`click`,`goods_pic`,`sales`,`count`,`description`,`add_time`,`time`) values (18,59,70,'完全','可选请问','111.0','111.0',2,0,'static/upload/2017/03/01/0a9a31c8107ef491e00eb756a363d26d.png',11,1111,'<p>2121</p>','2017-03-01',NULL),(19,59,70,'我的钱','请问请问','111.0','111.0',NULL,0,'static/upload/2017/03/01/a173771acb9b876dfe357d9441e036c3.png',111,1111,'<p>2额 额2 21 </p>','2017-03-01',NULL),(20,59,71,'1111','可选21 21','111.0','111.0',NULL,0,'static/upload/2017/03/01/43fe176c12fe6e064ab268b3b60833ad.png',111,111,'<p>21の1 </p>','2017-03-01',NULL),(21,59,71,'1211','可选12','11.0','111.0',NULL,0,'static/upload/2017/03/01/f18a89e6219323514610c4c6dac7d703.png',0,111,'<p>21</p>','2017-03-01',NULL),(22,59,71,'21','可选','1.0','1.0',NULL,0,'static/upload/2017/03/01/0601acb7c9260cf8c7ec5b57869d2bb0.png',0,111,'','2017-03-01',NULL),(23,59,70,'21','可选','231.0','34543.0',NULL,0,'static/upload/2017/03/01/0940516a9d8a94b5b88742ddf822d0fb.png',0,455,'','2017-03-01',NULL),(24,59,70,'wd','qw','54654.0','54645.0',NULL,0,'static/upload/2017/03/01/40235ad17882e26bd0da6e23c972d9b3.png',0,100,'','2017-03-01',NULL),(25,59,70,'wq','wq','12.0','12.0',NULL,0,'static/upload/2017/03/01/643bc2972823102ebbc432925bad099f.png',0,100,'','2017-03-01',NULL),(40,61,70,'111','121','1111.0','111.0',1,0,'static/upload/2017/03/07/20c9681cba5de57e89e089ce18ffd837.png',11,0,'<p>11</p>','2017-03-07',NULL),(41,62,71,'21','可选11','11.0','11.0',1,0,'static/upload/2017/03/07/5bbddf4d9fabda824e84117ef9c3479e.gif',11,0,'<p>11111</p>','2017-03-07',NULL),(42,65,71,'1211','11','1111.0','0.0',1,0,'static/upload/2017/03/07/d4ae65646cbe8483972d1cdd5f808436.jpg',111,1111,'','2017-03-07',NULL),(47,65,73,'3456789','12121','1111.0','0.0',1,0,'static/upload/2017/03/17/2cdf1dd1d930e6b1752e68050d6c9049.png',1111,111,'<p>111</p>','2017-03-17',NULL);

/*Table structure for table `goods_brand` */

DROP TABLE IF EXISTS `goods_brand`;

CREATE TABLE `goods_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(20) DEFAULT '',
  `brand_pic` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

/*Data for the table `goods_brand` */

insert  into `goods_brand`(`id`,`brand_name`,`brand_pic`) values (83,'wq wq','static/upload/2017/03/09/993bf2acd45e3a09b6238c8e363f1a1e.jpg'),(80,'221','static/upload/2017/03/09/e883e33572b8a8735d8edc3cf8d6845a.jpg'),(81,'wq','static/upload/2017/03/09/cee7962796e97ef0caadeaa292fffd16.jpg'),(82,'wq','static/upload/2017/03/09/11c24d3a922f8812fca86e10b4931e30.jpg'),(75,'21e21','static/upload/2017/03/09/523978e63bb6acc5e68a1f060bf8e0c0.jpg'),(72,'小米','static/upload/2017/03/01/67ff2a8098842e7826ca8e67bcd8fd58.png'),(73,'111','static/upload/2017/03/09/d93668b02ba27e5b9089d4a6953d7729.jpg'),(74,'21d1','static/upload/2017/03/09/516870bf9d29d37042d6331056546789.jpg'),(71,'华为','static/upload/2017/02/28/00efafe4b6a576ec6c1448a241f7e1bb.png'),(70,'诺基亚','static/upload/2017/02/28/61b1d030264991dbcd1c59a9f21a92b1.png'),(84,'wwq','static/upload/2017/03/09/dd7d8a9a7be23e1ed0f80bef23738a03.jpg'),(85,'2121','static/upload/2017/03/09/ca46a06c509ed597625373afb49b1322.jpg'),(86,'wqwqwq','static/upload/2017/03/09/d1316677a28c6ad6a683e184d23d6887.jpg'),(88,'wq','static/upload/2017/03/09/924845662a7b4c987cfca3d671eeb3f9.jpg'),(89,'wqq','static/upload/2017/03/20/5674da6ba4d5b54fee5b72a84cf806c5.png');

/*Table structure for table `goods_classify` */

DROP TABLE IF EXISTS `goods_classify`;

CREATE TABLE `goods_classify` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `pid` int(10) DEFAULT '0',
  `hierarchy` tinyint(1) DEFAULT '1' COMMENT '分类层级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

/*Data for the table `goods_classify` */

insert  into `goods_classify`(`id`,`cname`,`pid`,`hierarchy`) values (60,'小米充电宝',60,2),(59,'苹 7',59,2),(63,'诺基亚耳机',62,2),(65,'2510系列',64,2),(66,'苹果',0,1),(68,'耳机',66,2);

/*Table structure for table `goods_gallery` */

DROP TABLE IF EXISTS `goods_gallery`;

CREATE TABLE `goods_gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) DEFAULT NULL,
  `img_discription` varchar(200) DEFAULT NULL COMMENT '图片描述',
  `img_position` varchar(200) DEFAULT NULL COMMENT '上传图片位置',
  `out_href` varchar(200) DEFAULT NULL COMMENT '图片外部链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

/*Data for the table `goods_gallery` */

insert  into `goods_gallery`(`id`,`goods_id`,`img_discription`,`img_position`,`out_href`) values (58,43,'图片描述:2','static/upload/2017/03/07/bffab430775820287a0de980dbe4bcd6.jpg',''),(65,44,'','static/upload/2017/03/08/ed93883412bfb9c11f746b4ee9e9797f.jpg',''),(57,42,'图片描述','static/upload/2017/03/07/6ddfd590e912d5e252aa4b4083b71e96.jpg',''),(111,46,'','static/upload/2017/03/08/2a8ab0b4c770bdc245dd5ef37938682a.jpg',''),(91,45,'','static/upload/2017/03/08/2023fb878b86999e33ddeba3161c6713.jpg',''),(51,1000,'图片描述','static/upload/2017/03/07/1000/3902e155d7dee808f1e5650fe9ac95d1.jpg',''),(50,1000,'图片描述','static/upload/2017/03/07/1000/0b86db4e3c85fdfbc7c8426229c5e97b.jpg',''),(49,1000,'图片描述','static/upload/2017/03/07/1000/be5c2acbc1d2069710d3fe59c0b77d87.jpg',''),(47,41,'图片描述:2','static/upload/2017/03/07/bf382aed385affba7e1e43df8d215b38.jpg',''),(45,18,'','static/upload/2017/03/07/1000/a2e2cd21e39a78df6aa43f402ee4dfc4.png',''),(46,18,'','static/upload/2017/03/07/1000/160c9f3484073ae47968142d3fb1f0ce.png',''),(52,1000,'图片描述','static/upload/2017/03/07/1000/cb502a4a3669f470279ec5603d77e129.jpg',''),(53,1000,'图片描述','static/upload/2017/03/07/1000/f468b8e7493c642686a813558a122f30.png',''),(124,NULL,NULL,'static/upload/2017/03/08/e7e8f798c732715bb5aae01f6ae5a1b6.jpg',NULL),(121,NULL,NULL,'static/upload/2017/03/08/a2606e197778444388ebcef4e043656a.jpg',NULL),(120,NULL,NULL,'static/upload/2017/03/08/73c821acf1fdb5bad86fdf90dcde020a.jpg',NULL),(116,NULL,NULL,'static/upload/2017/03/08/fb212d3f2445842cebcf3897a9e0c263.jpg',NULL),(84,45,'','static/upload/2017/03/08/512c7085dd33d4a4166029a81fee79c8.jpg',''),(117,NULL,NULL,'static/upload/2017/03/08/ff918058beda8e7a7a3347fde3fbacaa.jpg',NULL),(118,NULL,NULL,'static/upload/2017/03/08/c816543ff1dc786684960da275b7e526.jpg',NULL),(119,NULL,NULL,'static/upload/2017/03/08/0cd24dc9d8d3c9bfb7cd443709592d0c.jpg',NULL),(122,NULL,NULL,'static/upload/2017/03/08/dd0e14d9fb6f037b2a2c08c6ad2eeff1.jpg',NULL),(123,NULL,NULL,'static/upload/2017/03/08/0c408aa4093275fb82166d4a3465e7b1.jpg',NULL),(115,NULL,NULL,'static/upload/2017/03/08/e4a3ecfd2b63523d85ecfcba84c7d403.gif',NULL),(125,47,'','static/upload/2017/03/09/73f4c1dee62c2f0b7f7f2d991e0f27df.jpg',''),(126,48,'22','static/upload/2017/03/09/8753b4dcdc995b60f82adf024f99f6cb.jpg',''),(131,48,'','static/upload/2017/03/09/ce08435b21456eb44c60042b25b0af9f.jpg',''),(128,48,'333','static/upload/2017/03/09/e7aedf900987451c8938975cd80655ec.jpg',''),(130,48,'','static/upload/2017/03/09/e07cc4d4894c1011cccc031daa170197.jpg',''),(132,48,'','static/upload/2017/03/09/47758d11087477787095886aaa0d5d24.gif',''),(133,48,'','static/upload/2017/03/09/f5b8aee0b59a9eac3a8b1d1356d5a796.gif','');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT NULL COMMENT '分类id',
  `title` varchar(100) DEFAULT '',
  `info` varchar(200) DEFAULT '' COMMENT '简介',
  `content` text,
  `logo` varchar(255) DEFAULT NULL COMMENT 'logo',
  `click` int(10) DEFAULT NULL COMMENT '点击量',
  `add_time` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1' COMMENT '1显示2隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

insert  into `news`(`id`,`cid`,`title`,`info`,`content`,`logo`,`click`,`add_time`,`status`) values (39,143,'ew','ew ew','<p>few few</p>','static/upload/2017/03/03/1a195b7d404a7b6df6e9ef1b07e5c733.png',NULL,'2017-03-02 16:31:48','1'),(40,141,'1111','111112','<p>121</p>','static/upload/2017/03/03/966e4176a1734ab63d7d7bc6d01adfc5.png',NULL,'2017-03-03 08:54:51','1'),(41,143,'221','121212','<p>212121</p>','static/upload/2017/03/03/346378613af31032264a976bdf591796.png',NULL,'2017-03-03 09:17:42','2'),(45,142,'完全','完全','','static/upload/2017/03/03/3656d9eadedd9abdb014dbb13bbd68c5.png',NULL,'2017-03-03 09:49:25','1'),(49,151,'121','1 1','','static/upload/2017/03/03/96b56892768cc93646557f08df8f0b40.png',NULL,'2017-03-03 10:15:49','1'),(50,143,'221','1 1','<p>21 1 </p>','static/upload/2017/03/03/df243c50017e8b526eea327fd754e450.png',NULL,'2017-03-03 10:16:10','1'),(51,142,'212121','12 1','<p>21 21 </p>','static/upload/2017/03/03/50ee89d05c6f5f7718a5ee80cdd9dcf7.png',NULL,'2017-03-03 10:16:53','1'),(52,143,'完全去','完全请问去','<p>完全完全</p>','static/upload/2017/03/03/25e91fdb0b130b3ce47b9de294286710.png',NULL,'2017-03-03 10:21:55','1'),(54,151,'请问','完全完全','<p>完全去</p>','static/upload/2017/03/03/71521743f490024001e50f634f4806de.png',NULL,'2017-03-03 10:54:48','1'),(55,148,'2222222222222','wq','<p>qw </p>','static/upload/2017/03/20/0d3157c728bb1c9f1449ebad4a54b3d4.',NULL,'2017-03-20 13:08:02','1'),(56,143,'dwq wqdqw','wq','<p>qw </p>','static/upload/2017/03/20/0d9cfcba38972ce84325dcaad61ee7dd.png',NULL,'2017-03-20 13:11:50','1'),(57,142,'wqd dwq qw','wq','<p>wq </p>','static/upload/2017/03/20/5da439f5183e44819f5c6c5508ae99a9.png',NULL,'2017-03-20 13:15:02','1');

/*Table structure for table `news_classify` */

DROP TABLE IF EXISTS `news_classify`;

CREATE TABLE `news_classify` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(32) NOT NULL DEFAULT '' COMMENT '新闻分类名',
  `pid` int(10) DEFAULT '0' COMMENT '父id',
  `hierarchy` tinyint(3) DEFAULT '1' COMMENT '分类层级',
  PRIMARY KEY (`id`,`cname`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

/*Data for the table `news_classify` */

insert  into `news_classify`(`id`,`cname`,`pid`,`hierarchy`) values (142,'陕西',141,2),(143,'西安',142,3),(144,'美国',0,1),(145,'加州单位',0,1),(147,'湖南',141,2),(148,'襄樊',147,3),(149,'永州',148,4),(150,'未央区',143,4),(151,'凤城一路',150,5),(153,'308',152,7),(154,'带我去的',0,1),(156,'美国',0,1),(157,'请问',144,2);

/*Table structure for table `people_classify` */

DROP TABLE IF EXISTS `people_classify`;

CREATE TABLE `people_classify` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT '',
  `pid` int(20) DEFAULT NULL,
  `hierarchy` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `people_classify` */

/*Table structure for table `web_focus` */

DROP TABLE IF EXISTS `web_focus`;

CREATE TABLE `web_focus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '幻灯片名',
  `href` varchar(200) DEFAULT NULL COMMENT '上传图片的地址',
  `pic_url` varchar(300) DEFAULT NULL COMMENT '图片到什么链接',
  `sort_seq` int(10) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;

/*Data for the table `web_focus` */

insert  into `web_focus`(`id`,`title`,`href`,`pic_url`,`sort_seq`) values (227,'1221','static/upload/2017/03/03/eba6dfda3e534491b0dd441d242f9e1b.png','http://localhost/qy/admin/web_focus.php?act=add',1),(225,'21 21','static/upload/2017/03/03/9e245a1f79c3c42d8d2d064b6b0d7f2b.png','http://localhost/qy/admin/web_focus.php',1),(226,'完全21 12 21','static/upload/2017/03/03/6b3d1a0100e2547f66612e79ebbc1e61.png','http://localhost/qy/admin/web_focus.php?act=add',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
