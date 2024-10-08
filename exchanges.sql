-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: exchanges
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exchangerix_content`
--

DROP TABLE IF EXISTS `exchangerix_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_content` (
  `content_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `link_title` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `page_location` varchar(10) NOT NULL DEFAULT '',
  `page_url` varchar(255) NOT NULL DEFAULT '',
  `meta_description` varchar(255) NOT NULL DEFAULT '',
  `meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_content`
--

LOCK TABLES `exchangerix_content` WRITE;
/*!40000 ALTER TABLE `exchangerix_content` DISABLE KEYS */;
INSERT INTO `exchangerix_content` VALUES
(1,'english','home','','Home page','<h1 style=\'border:none;text-align:center;\'>Welcome to our exchange site!</h1>\r\n<p style=\'text-align: justify;\'>We have the best rates. Simply start your exchange right now. Sign up for our parther program and earn commission from each exchange. The earnings are credited in your account instantly and can be withdrawn right away.</p>\r\n<br/>','','','','','active','2024-10-08 19:33:27'),
(2,'english','aboutus','','About Us','<p>Information about site.</p>','','','','','active','0000-00-00 00:00:00'),
(3,'english','howitworks','','How it works','<p>how it works information</p>','','','','','active','2024-10-08 19:33:27'),
(4,'english','help','','Help','some help information here (you can edit from content admin area)','','','','','active','2024-10-08 19:33:27'),
(5,'english','terms','','Terms and Conditions','<p>site\'s terms and conditions, edit from admin panel</p>','','','','','active','2024-10-08 19:33:27'),
(6,'english','privacy','','Privacy Policy','<p>privacy policy information, edit from admin panel</p>','','','','','active','2024-10-08 19:33:27'),
(7,'english','contact','','Contact Us','<p>If you have any questions, please contact us.</p>\r\n<p>Email: support@yourdomain.com</p>','','','','','active','2024-10-08 19:33:27'),
(8,'english','affiliate','','Affiliate Program','<p>Do you have an account? Then you\'re already an affiliate! Just sign in to your account and start earning money by referring visitors to our site. It\'s fast, FREE and as easy as telling us how you want to be paid! You will receive commission of the fees charged for all exchange orders made by your referrals. The earnings are credited in your account instantly and can be withdrawn right away.</p>','','','','','active','2024-10-08 19:33:27'),
(9,'english','payment_success','','Successful Payment','<h3>Thank you for payment!</h3>','','','','','active','2024-10-08 19:33:27'),
(10,'english','payment_declined','','Payment Declined','<h3>Your payment was declined.</h3> <p>Please try to make it again our you can contact us to resolve this problem.</p>','','','','','active','2024-10-08 19:33:27');
/*!40000 ALTER TABLE `exchangerix_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_countries`
--

DROP TABLE IF EXISTS `exchangerix_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `currency` varchar(3) NOT NULL DEFAULT '',
  `signup` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_countries`
--

LOCK TABLES `exchangerix_countries` WRITE;
/*!40000 ALTER TABLE `exchangerix_countries` DISABLE KEYS */;
INSERT INTO `exchangerix_countries` VALUES
(1,'AF','Afghanistan','',1,0,'active'),
(2,'AX','Aland Islands','',1,0,'active'),
(3,'AL','Albania','',1,0,'active'),
(4,'DZ','Algeria','',1,0,'active'),
(5,'AS','American Samoa','',1,0,'active'),
(6,'AD','Andorra','',1,0,'active'),
(7,'AO','Angola','',1,0,'active'),
(8,'AI','Anguilla','',1,0,'active'),
(9,'AG','Antigua and Barbuda','',1,0,'active'),
(10,'AR','Argentina','',1,0,'active'),
(11,'AM','Armenia','',1,0,'active'),
(12,'AW','Aruba','',1,0,'active'),
(13,'AU','Australia','',1,0,'active'),
(14,'AT','Austria','',1,0,'active'),
(15,'AZ','Azerbaijan','',1,0,'active'),
(16,'BS','Bahamas','',1,0,'active'),
(17,'BH','Bahrain','',1,0,'active'),
(18,'BD','Bangladesh','',1,0,'active'),
(19,'BB','Barbados','',1,0,'active'),
(20,'BY','Belarus','',1,0,'active'),
(21,'BE','Belgium','',1,0,'active'),
(22,'BZ','Belize','',1,0,'active'),
(23,'BJ','Benin','',1,0,'active'),
(24,'BM','Bermuda','',1,0,'active'),
(25,'BT','Bhutan','',1,0,'active'),
(26,'BO','Bolivia','',1,0,'active'),
(27,'BA','Bosnia and Herzegovina','',1,0,'active'),
(28,'BW','Botswana','',1,0,'active'),
(29,'BV','Bouvet Island','',1,0,'active'),
(30,'BR','Brazil','',1,0,'active'),
(31,'IO','British Indian Ocean Territory','',1,0,'active'),
(32,'BN','Brunei Darussalam','',1,0,'active'),
(33,'BG','Bulgaria','',1,0,'active'),
(34,'BF','Burkina Faso','',1,0,'active'),
(35,'BI','Burundi','',1,0,'active'),
(36,'KH','Cambodia','',1,0,'active'),
(37,'CM','Cameroon','',1,0,'active'),
(38,'CA','Canada','',1,0,'active'),
(39,'CV','Cape Verde','',1,0,'active'),
(40,'KY','Cayman Islands','',1,0,'active'),
(41,'CF','Central African Republic','',1,0,'active'),
(42,'TD','Chad','',1,0,'active'),
(43,'CL','Chile','',1,0,'active'),
(44,'CN','China','',1,0,'active'),
(45,'CX','Christmas Island','',1,0,'active'),
(46,'CC','Cocos (Keeling) Islands','',1,0,'active'),
(47,'CO','Colombia','',1,0,'active'),
(48,'KM','Comoros','',1,0,'active'),
(49,'CG','Congo','',1,0,'active'),
(50,'CD','Congo, The Democratic Republic of the','',1,0,'active'),
(51,'CK','Cook Islands','',1,0,'active'),
(52,'CR','Costa Rica','',1,0,'active'),
(53,'CI','Cote D\'Ivoire','',1,0,'active'),
(54,'HR','Croatia','',1,0,'active'),
(55,'CU','Cuba','',1,0,'active'),
(56,'CY','Cyprus','',1,0,'active'),
(57,'CZ','Czech Republic','',1,0,'active'),
(58,'DK','Denmark','',1,0,'active'),
(59,'DJ','Djibouti','',1,0,'active'),
(60,'DM','Dominica','',1,0,'active'),
(61,'DO','Dominican Republic','',1,0,'active'),
(62,'EC','Ecuador','',1,0,'active'),
(63,'EG','Egypt','',1,0,'active'),
(64,'SV','El Salvador','',1,0,'active'),
(65,'GQ','Equatorial Guinea','',1,0,'active'),
(66,'ER','Eritrea','',1,0,'active'),
(67,'EE','Estonia','',1,0,'active'),
(68,'ET','Ethiopia','',1,0,'active'),
(69,'FK','Falkland Islands (Malvinas)','',1,0,'active'),
(70,'FO','Faroe Islands','',1,0,'active'),
(71,'FJ','Fiji','',1,0,'active'),
(72,'FI','Finland','',1,0,'active'),
(73,'FR','France','',1,0,'active'),
(74,'GF','French Guiana','',1,0,'active'),
(75,'PF','French Polynesia','',1,0,'active'),
(76,'TF','French Southern Territories','',1,0,'active'),
(77,'GA','Gabon','',1,0,'active'),
(78,'GM','Gambia','',1,0,'active'),
(79,'GE','Georgia','',1,0,'active'),
(80,'DE','Germany','',1,0,'active'),
(81,'GH','Ghana','',1,0,'active'),
(82,'GI','Gibraltar','',1,0,'active'),
(83,'GR','Greece','',1,0,'active'),
(84,'GL','Greenland','',1,0,'active'),
(85,'GD','Grenada','',1,0,'active'),
(86,'GP','Guadeloupe','',1,0,'active'),
(87,'GU','Guam','',1,0,'active'),
(88,'GT','Guatemala','',1,0,'active'),
(89,'GN','Guinea','',1,0,'active'),
(90,'GW','Guinea-Bissau','',1,0,'active'),
(91,'GY','Guyana','',1,0,'active'),
(92,'HT','Haiti','',1,0,'active'),
(93,'HM','Heard Island and McDonald Islands','',1,0,'active'),
(94,'VA','Holy See (Vatican City State)','',1,0,'active'),
(95,'HN','Honduras','',1,0,'active'),
(96,'HK','Hong Kong','',1,0,'active'),
(97,'HU','Hungary','',1,0,'active'),
(98,'IS','Iceland','',1,0,'active'),
(99,'IN','India','',1,0,'active'),
(100,'ID','Indonesia','',1,0,'active'),
(101,'IR','Iran, Islamic Republic of','',1,0,'active'),
(102,'IQ','Iraq','',1,0,'active'),
(103,'IE','Ireland','',1,0,'active'),
(104,'IL','Israel','',1,0,'active'),
(105,'IT','Italy','',1,0,'active'),
(106,'JM','Jamaica','',1,0,'active'),
(107,'JP','Japan','',1,0,'active'),
(108,'JO','Jordan','',1,0,'active'),
(109,'KZ','Kazakhstan','',1,0,'active'),
(110,'KE','Kenya','',1,0,'active'),
(111,'KI','Kiribati','',1,0,'active'),
(112,'KP','Korea, Democratic People\'s Republic of','',1,0,'active'),
(113,'KR','Korea, Republic of','',1,0,'active'),
(114,'KW','Kuwait','',1,0,'active'),
(115,'KG','Kyrgyzstan','',1,0,'active'),
(116,'LA','Lao People\'s Democratic Republic','',1,0,'active'),
(117,'LV','Latvia','',1,0,'active'),
(118,'LB','Lebanon','',1,0,'active'),
(119,'LS','Lesotho','',1,0,'active'),
(120,'LR','Liberia','',1,0,'active'),
(121,'LY','Libyan Arab Jamahiriya','',1,0,'active'),
(122,'LI','Liechtenstein','',1,0,'active'),
(123,'LT','Lithuania','',1,0,'active'),
(124,'LU','Luxembourg','',1,0,'active'),
(125,'MO','Macao','',1,0,'active'),
(126,'MK','Macedonia','',1,0,'active'),
(127,'MG','Madagascar','',1,0,'active'),
(128,'MW','Malawi','',1,0,'active'),
(129,'MY','Malaysia','',1,0,'active'),
(130,'MV','Maldives','',1,0,'active'),
(131,'ML','Mali','',1,0,'active'),
(132,'MT','Malta','',1,0,'active'),
(133,'MH','Marshall Islands','',1,0,'active'),
(134,'MQ','Martinique','',1,0,'active'),
(135,'MR','Mauritania','',1,0,'active'),
(136,'MU','Mauritius','',1,0,'active'),
(137,'YT','Mayotte','',1,0,'active'),
(138,'MX','Mexico','',1,0,'active'),
(139,'FM','Micronesia, Federated States of','',1,0,'active'),
(140,'MD','Moldova, Republic of','',1,0,'active'),
(141,'MC','Monaco','',1,0,'active'),
(142,'MN','Mongolia','',1,0,'active'),
(143,'ME','Montenegro','',1,0,'active'),
(144,'MS','Montserrat','',1,0,'active'),
(145,'MA','Morocco','',1,0,'active'),
(146,'MZ','Mozambique','',1,0,'active'),
(147,'MM','Myanmar','',1,0,'active'),
(148,'NA','Namibia','',1,0,'active'),
(149,'NR','Nauru','',1,0,'active'),
(150,'NP','Nepal','',1,0,'active'),
(151,'NL','Netherlands','',1,0,'active'),
(152,'AN','Netherlands Antilles','',1,0,'active'),
(153,'NC','New Caledonia','',1,0,'active'),
(154,'NZ','New Zealand','',1,0,'active'),
(155,'NI','Nicaragua','',1,0,'active'),
(156,'NE','Niger','',1,0,'active'),
(157,'NG','Nigeria','',1,0,'active'),
(158,'NU','Niue','',1,0,'active'),
(159,'NF','Norfolk Island','',1,0,'active'),
(160,'MP','Northern Mariana Islands','',1,0,'active'),
(161,'NO','Norway','',1,0,'active'),
(162,'OM','Oman','',1,0,'active'),
(163,'PK','Pakistan','',1,0,'active'),
(164,'PW','Palau','',1,0,'active'),
(165,'PS','Palestinian Territory, Occupied','',1,0,'active'),
(166,'PA','Panama','',1,0,'active'),
(167,'PG','Papua New Guinea','',1,0,'active'),
(168,'PY','Paraguay','',1,0,'active'),
(169,'PE','Peru','',1,0,'active'),
(170,'PH','Philippines','',1,0,'active'),
(171,'PN','Pitcairn','',1,0,'active'),
(172,'PL','Poland','',1,0,'active'),
(173,'PT','Portugal','',1,0,'active'),
(174,'PR','Puerto Rico','',1,0,'active'),
(175,'QA','Qatar','',1,0,'active'),
(176,'RE','Reunion','',1,0,'active'),
(177,'RO','Romania','',1,0,'active'),
(178,'RU','Russian Federation','',1,0,'active'),
(179,'RW','Rwanda','',1,0,'active'),
(180,'SH','Saint Helena','',1,0,'active'),
(181,'KN','Saint Kitts and Nevis','',1,0,'active'),
(182,'LC','Saint Lucia','',1,0,'active'),
(183,'PM','Saint Pierre and Miquelon','',1,0,'active'),
(184,'VC','Saint Vincent and the Grenadines','',1,0,'active'),
(185,'WS','Samoa','',1,0,'active'),
(186,'SM','San Marino','',1,0,'active'),
(187,'ST','Sao Tome and Principe','',1,0,'active'),
(188,'SA','Saudi Arabia','',1,0,'active'),
(189,'SN','Senegal','',1,0,'active'),
(190,'RS','Serbia','',1,0,'active'),
(191,'SC','Seychelles','',1,0,'active'),
(192,'SL','Sierra Leone','',1,0,'active'),
(193,'SG','Singapore','',1,0,'active'),
(194,'SK','Slovakia','',1,0,'active'),
(195,'SI','Slovenia','',1,0,'active'),
(196,'SB','Solomon Islands','',1,0,'active'),
(197,'SO','Somalia','',1,0,'active'),
(198,'ZA','South Africa','',1,0,'active'),
(199,'GS','South Georgia','',1,0,'active'),
(200,'ES','Spain','',1,0,'active'),
(201,'LK','Sri Lanka','',1,0,'active'),
(202,'SD','Sudan','',1,0,'active'),
(203,'SR','Suriname','',1,0,'active'),
(204,'SJ','Svalbard and Jan Mayen','',1,0,'active'),
(205,'SZ','Swaziland','',1,0,'active'),
(206,'SE','Sweden','',1,0,'active'),
(207,'CH','Switzerland','',1,0,'active'),
(208,'SY','Syrian Arab Republic','',1,0,'active'),
(209,'TW','Taiwan, Province Of China','',1,0,'active'),
(210,'TJ','Tajikistan','',1,0,'active'),
(211,'TZ','Tanzania, United Republic of','',1,0,'active'),
(212,'TH','Thailand','',1,0,'active'),
(213,'TL','Timor-Leste','',1,0,'active'),
(214,'TG','Togo','',1,0,'active'),
(215,'TK','Tokelau','',1,0,'active'),
(216,'TO','Tonga','',1,0,'active'),
(217,'TT','Trinidad and Tobago','',1,0,'active'),
(218,'TN','Tunisia','',1,0,'active'),
(219,'TR','Turkey','',1,0,'active'),
(220,'TM','Turkmenistan','',1,0,'active'),
(221,'TC','Turks and Caicos Islands','',1,0,'active'),
(222,'TV','Tuvalu','',1,0,'active'),
(223,'UG','Uganda','',1,0,'active'),
(224,'UA','Ukraine','',1,0,'active'),
(225,'AE','United Arab Emirates','',1,0,'active'),
(226,'GB','United Kingdom','',1,0,'active'),
(227,'US','United States','',1,0,'active'),
(228,'UM','United States Minor Outlying Islands','',1,0,'active'),
(229,'UY','Uruguay','',1,0,'active'),
(230,'UZ','Uzbekistan','',1,0,'active'),
(231,'VU','Vanuatu','',1,0,'active'),
(232,'VE','Venezuela','',1,0,'active'),
(233,'VN','Viet Nam','',1,0,'active'),
(234,'VG','Virgin Islands, British','',1,0,'active'),
(235,'VI','Virgin Islands, U.S.','',1,0,'active'),
(236,'WF','Wallis And Futuna','',1,0,'active'),
(237,'EH','Western Sahara','',1,0,'active'),
(238,'YE','Yemen','',1,0,'active'),
(239,'ZM','Zambia','',1,0,'active'),
(240,'ZW','Zimbabwe','',1,0,'active');
/*!40000 ALTER TABLE `exchangerix_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_currencies`
--

DROP TABLE IF EXISTS `exchangerix_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_currencies` (
  `currency_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gateway_id` int(11) unsigned NOT NULL DEFAULT 0,
  `currency_name` varchar(255) NOT NULL DEFAULT '',
  `currency_code` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `is_crypto` tinyint(1) NOT NULL DEFAULT 0,
  `reserve` varchar(20) NOT NULL DEFAULT '0',
  `min_reserve` varchar(20) NOT NULL DEFAULT '0',
  `fee` varchar(20) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT '',
  `site_code` varchar(100) NOT NULL DEFAULT '',
  `xml_code` varchar(100) NOT NULL DEFAULT '',
  `allow_send` tinyint(1) NOT NULL DEFAULT 0,
  `allow_receive` tinyint(1) NOT NULL DEFAULT 0,
  `allow_affiliate` tinyint(1) NOT NULL DEFAULT 0,
  `default_send` tinyint(1) NOT NULL DEFAULT 0,
  `default_receive` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` tinyint(1) NOT NULL DEFAULT 0,
  `is_new_currency` tinyint(1) NOT NULL DEFAULT 0,
  `hide_code` tinyint(1) NOT NULL DEFAULT 0,
  `curr_code` varchar(100) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_currencies`
--

LOCK TABLES `exchangerix_currencies` WRITE;
/*!40000 ALTER TABLE `exchangerix_currencies` DISABLE KEYS */;
INSERT INTO `exchangerix_currencies` VALUES
(1,6,'Bitcoin','BTC','BTC.png',1,'12.68','','','','https://bitcoin.org','','',1,1,0,0,0,2,0,1,'bitcoin','active','2024-10-08 19:32:00'),
(2,12,'Ethereum','ETH','ETH.png',1,'120','','','','https://ethereum.org','','',1,1,0,0,0,4,0,0,'','active','2024-10-08 19:32:00'),
(3,7,'Bitcoin Cash','BCH','BCH.png',1,'20','','3','','','','',1,1,0,0,0,3,0,0,'','active','2024-10-08 19:32:00'),
(4,15,'Ripple','XRP','XRP.png',1,'89700','','5','','','','',1,1,0,0,0,8,0,0,'','active','2024-10-08 19:32:00'),
(5,8,'Litecoin','LTC','LTC.png',1,'3000','','5','','https://litecoin.org','LTC','LTC',1,1,1,0,0,6,0,0,'','active','2024-10-08 19:32:00'),
(6,10,'Dash','DASH','DASH.png',1,'174','','','','','','',1,1,0,0,0,5,0,0,'','active','2024-10-08 19:32:00'),
(7,0,'NEO','NEO','NEO.png',1,'','','','','','','',1,1,0,0,0,7,0,0,'','active','2024-10-08 19:32:00'),
(8,0,'NEM','NEM','NEM.png',1,'','','','','','','',1,1,0,0,0,16,0,0,'','active','2024-10-08 19:32:00'),
(9,14,'Monero','XMR','XMR.png',1,'50','','','','','','',1,1,0,0,0,9,0,0,'','active','2024-10-08 19:32:00'),
(10,16,'Zcash','ZEC','ZCASH.png',1,'73','','','','','','',1,1,0,0,0,11,0,0,'','active','2024-10-08 19:32:00'),
(11,1,'Paypal','USD','PAYPAL.png',0,'78000','','','','','','',1,1,0,0,0,10,0,0,'','active','2024-10-08 19:32:00'),
(12,2,'Perfect Money','USD','PM.png',0,'73500','','','','','','',1,1,0,0,0,17,0,0,'','active','2024-10-08 19:32:00'),
(13,5,'Payeer','USD','PR.png',0,'41300','','','','','','',1,1,0,0,0,12,0,0,'','active','2024-10-08 19:32:00'),
(14,24,'AdvCash','USD','ADVC.png',0,'23900','','','','','','',1,1,0,0,0,13,0,0,'','active','2024-10-08 19:32:00'),
(15,34,'Bank Transfer','USD','BANK.png',0,'50000','','','','','','',1,1,0,0,0,14,0,0,'','active','2024-10-08 19:32:00'),
(16,37,'Webmoney','USD','WM.png',0,'50000','','','','','','',1,1,0,0,0,14,0,0,'','active','2024-10-08 19:32:00'),
(17,0,'Cash','USD','CASH.png',0,'','','','','','','',1,1,0,0,0,1,0,0,'','active','2024-10-08 19:32:00');
/*!40000 ALTER TABLE `exchangerix_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_email_templates`
--

DROP TABLE IF EXISTS `exchangerix_email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_email_templates` (
  `template_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL DEFAULT '',
  `email_name` varchar(50) NOT NULL DEFAULT '',
  `email_subject` varchar(255) NOT NULL DEFAULT '',
  `email_message` text DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_email_templates`
--

LOCK TABLES `exchangerix_email_templates` WRITE;
/*!40000 ALTER TABLE `exchangerix_email_templates` DISABLE KEYS */;
INSERT INTO `exchangerix_email_templates` VALUES
(1,'english','signup','Welcome to exchange site!','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nDear {first_name},<br /><br />\r\nThank you for registering!<br /><br />\rYou can start to make e-currency exchanges!<br /><br />\r\nHere is your login information:<br /><br />\r\nLogin: <b>{username}</b><br />\r\nPassword: <b>{password}</b><br /><br />\r\nPlease click at <a href=\'{login_url}\'>click here</a> to login in to your account.<br /><br />Thank you.\r\n</p>','2024-10-08 19:36:14'),
(2,'english','activate','Registration confirmation email','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHi {first_name},<br /><br />\r\nThank you for registering!<br /><br />\r\nHere is your login information:<br /><br />\r\nUsername: <b>{username}</b><br />\r\nPassword: <b>{password}</b><br /><br />\r\n\r\nPlease click the following link to activate your account: <a href=\'{activate_link}\'>{activate_link}</a><br /><br />Thank you.\r\n</p>','2024-10-08 19:36:14'),
(3,'english','activate2','Account activation email','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHi {first_name},<br /><br />\r\nPlease click the following link to activate your account: <a href=\'{activate_link}\'>{activate_link}</a><br /><br />Thank you.\r\n</p>','2024-10-08 19:36:14'),
(4,'english','forgot_password','Forgot password email','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nDear {first_name},<br /><br />\r\nAs you requested, here is new password for your account:<br /><br />\r\nLogin: <b>{username}</b><br />Password: <b>{password}</b> <br /><br />\r\nPlease <a href=\'{login_url}\'>click here</a> to log in.\r\n<br /><br />\r\nThank you.\r\n</p>','2024-10-08 19:36:14'),
(5,'english','invite_friend','Invitation from your friend','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {friend_name}, <br /><br />\r\nYour friend <b>{first_name}</b> wants to invite you to register on our site.<br /><br />\r\nPlease <a href=\'{referral_link}\'>click here</a> to accept his invitation.\r\n<br /><br />\r\nBest Regards.\r\n</p>','2024-10-08 19:36:14'),
(6,'english','cashout_paid','Your cash out request was paid','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYour cash out request was paid.<br />Transaction ID: {transaction_id}<br />Amount: <b>{amount}</b><br /><br />\r\nThank you for choosing us.<br /><br />\r\nBest Regards.\r\n</p>','2024-10-08 19:36:14'),
(7,'english','cashout_declined','Your cash out request was declined','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYour cash out request #<b>{transaction_id}</b> for {amount} was declined.<br />Reason: {reason}<br /><br />\r\n</p>','2024-10-08 19:36:14'),
(8,'english','manual_credit','Your account balance was updated','<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYou received new payment.<br /><br /> Transaction ID: <b>{transaction_id}</b><br/>Payment name: <b>{payment_type}</b><br />Amount: <b>{amount}</b><br /><br />\r\n</p>','2024-10-08 19:36:14');
/*!40000 ALTER TABLE `exchangerix_email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_exchanges`
--

DROP TABLE IF EXISTS `exchangerix_exchanges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_exchanges` (
  `exchange_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `exdirection_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `reference_id` varchar(50) NOT NULL DEFAULT '',
  `from_currency_id` int(11) NOT NULL DEFAULT 0,
  `to_currency_id` int(11) NOT NULL DEFAULT 0,
  `from_currency` varchar(100) NOT NULL DEFAULT '0',
  `to_currency` varchar(100) NOT NULL DEFAULT '0',
  `ex_from_rate` varchar(50) NOT NULL DEFAULT '0',
  `ex_to_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `receive_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `exchange_fee` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `from_account` text DEFAULT NULL,
  `to_account` text DEFAULT NULL,
  `client_email` varchar(100) NOT NULL DEFAULT '',
  `client_details` text DEFAULT NULL,
  `proof` varchar(200) NOT NULL DEFAULT '',
  `ref_id` int(11) NOT NULL DEFAULT 0,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `status` varchar(20) NOT NULL DEFAULT '',
  `reason` text DEFAULT NULL,
  `notification_sent` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `process_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`exchange_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_exchanges`
--

LOCK TABLES `exchangerix_exchanges` WRITE;
/*!40000 ALTER TABLE `exchangerix_exchanges` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_exchanges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_exdirections`
--

DROP TABLE IF EXISTS `exchangerix_exdirections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_exdirections` (
  `exdirection_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_currency` int(11) unsigned NOT NULL DEFAULT 0,
  `to_currency` int(11) unsigned NOT NULL DEFAULT 0,
  `from_rate` varchar(50) NOT NULL DEFAULT '0',
  `to_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_rate` varchar(50) NOT NULL DEFAULT '0',
  `fee` varchar(20) NOT NULL DEFAULT '0',
  `min_amount` varchar(50) NOT NULL DEFAULT '0',
  `max_amount` varchar(50) NOT NULL DEFAULT '0',
  `user_instructions` text NOT NULL,
  `description` text NOT NULL,
  `is_manual` tinyint(1) NOT NULL DEFAULT 0,
  `hide_from_visitors` tinyint(1) NOT NULL DEFAULT 0,
  `allow_affiliate` tinyint(1) NOT NULL DEFAULT 0,
  `auto_rate` tinyint(1) NOT NULL DEFAULT 0,
  `today_exchanges` int(11) unsigned NOT NULL DEFAULT 0,
  `total_exchanges` int(11) unsigned NOT NULL DEFAULT 0,
  `sort_order` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_exchange_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`exdirection_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_exdirections`
--

LOCK TABLES `exchangerix_exdirections` WRITE;
/*!40000 ALTER TABLE `exchangerix_exdirections` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_exdirections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_gateways`
--

DROP TABLE IF EXISTS `exchangerix_gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_gateways` (
  `gateway_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gateway_name` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(100) NOT NULL DEFAULT '',
  `account_id` varchar(200) NOT NULL DEFAULT '',
  `api_key` varchar(255) NOT NULL DEFAULT '',
  `secret_key` varchar(255) NOT NULL DEFAULT '',
  `other_val` varchar(255) NOT NULL DEFAULT '',
  `other_val2` varchar(255) NOT NULL DEFAULT '',
  `other_val3` varchar(255) NOT NULL DEFAULT '',
  `other_val4` varchar(255) NOT NULL DEFAULT '',
  `other_val5` varchar(255) NOT NULL DEFAULT '',
  `gateway_description` text NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`gateway_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_gateways`
--

LOCK TABLES `exchangerix_gateways` WRITE;
/*!40000 ALTER TABLE `exchangerix_gateways` DISABLE KEYS */;
INSERT INTO `exchangerix_gateways` VALUES
(1,'PayPal','PAYPAL.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(2,'Perfect Money','PM.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(3,'Perfect Money Voucher','PM.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(4,'Skrill','SKRILL.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(5,'Payeer','PR.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(6,'Bitcoin','BTC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(7,'Bitcoin Cash','BCH.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(8,'Litecoin','LTC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(9,'Dogecoin','DOGE.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(10,'Dash','DASH.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(11,'Peercoin','PPC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(12,'Ethereum','ETH.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(13,'TheBillioncoin','TBC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(14,'Monero','XMR.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(15,'Ripple','XRP.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(16,'Zcash','ZCASH.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(17,'Ether Classic','ETC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(18,'Augur','REP.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(19,'Golem','GNT.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(20,'Gnosis','GNO.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(21,'Lisk','LSK.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(22,'Clams','CLAM.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(23,'Namecoin','NMC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(24,'AdvCash','ADVC.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(25,'OKPay','OK.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(26,'Entromoney','EM.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(27,'SolidTrust Pay','STP.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(28,'Neteller','NTLR.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(29,'UQUID','UQUID.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(30,'WEX (BTC-e)','WEX.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(31,'Yandex Money','YAM.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(32,'QIWI','QIWI.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(33,'Payza','PZ.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(34,'Bank Transfer','BANK.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(35,'Western Union','WU.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(36,'Moneygram','MoneyGram.png','','','','','','','','','','','active','0000-00-00 00:00:00'),
(37,'WebMoney','WM.png','','','','','','','','','','','active','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `exchangerix_gateways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_languages`
--

DROP TABLE IF EXISTS `exchangerix_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(2) NOT NULL DEFAULT '',
  `language` varchar(100) NOT NULL DEFAULT '',
  `currency` varchar(3) NOT NULL DEFAULT '',
  `sort_order` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_languages`
--

LOCK TABLES `exchangerix_languages` WRITE;
/*!40000 ALTER TABLE `exchangerix_languages` DISABLE KEYS */;
INSERT INTO `exchangerix_languages` VALUES
(1,'us','english','',0,'active');
/*!40000 ALTER TABLE `exchangerix_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_news`
--

DROP TABLE IF EXISTS `exchangerix_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_news` (
  `news_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL DEFAULT '',
  `news_description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_news`
--

LOCK TABLES `exchangerix_news` WRITE;
/*!40000 ALTER TABLE `exchangerix_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_pmethods`
--

DROP TABLE IF EXISTS `exchangerix_pmethods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_pmethods` (
  `pmethod_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pmethod_title` varchar(100) NOT NULL DEFAULT '',
  `min_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `commission` varchar(10) NOT NULL DEFAULT '',
  `pmethod_details` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`pmethod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_pmethods`
--

LOCK TABLES `exchangerix_pmethods` WRITE;
/*!40000 ALTER TABLE `exchangerix_pmethods` DISABLE KEYS */;
INSERT INTO `exchangerix_pmethods` VALUES
(1,'PayPal',0.0000,'','Please enter your paypal account','active'),
(2,'Bank Check',0.0000,'','Please enter following information: <br />\r\n - Your Full Name <br />\r\n - Bank Name <br />\r\n - Bank Address <br />\r\n - Account #','inactive'),
(3,'Wire Transfer',0.0000,'','Please enter following information: <br />\r\n - Your Full Name <br />\r\n - Bank Name <br />\r\n - Bank Address <br />\r\n - Account #','active'),
(4,'Skrill',0.0000,'','Please enter your skrill account','inactive');
/*!40000 ALTER TABLE `exchangerix_pmethods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_reserve_requests`
--

DROP TABLE IF EXISTS `exchangerix_reserve_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_reserve_requests` (
  `reserve_request_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `exdirection_id` int(11) unsigned NOT NULL DEFAULT 0,
  `currency_name` varchar(255) NOT NULL DEFAULT '',
  `currency_id` int(11) unsigned NOT NULL DEFAULT 0,
  `amount` varchar(100) NOT NULL DEFAULT '',
  `currency_code` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `is_viewed` tinyint(1) NOT NULL DEFAULT 0,
  `is_notified` tinyint(1) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `status` enum('confirmed','declined','pending') NOT NULL DEFAULT 'pending',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`reserve_request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_reserve_requests`
--

LOCK TABLES `exchangerix_reserve_requests` WRITE;
/*!40000 ALTER TABLE `exchangerix_reserve_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_reserve_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_reviews`
--

DROP TABLE IF EXISTS `exchangerix_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_reviews` (
  `review_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `exchange_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL DEFAULT '',
  `review_title` varchar(255) NOT NULL DEFAULT '',
  `rating` tinyint(1) NOT NULL DEFAULT 0,
  `review` text DEFAULT NULL,
  `status` enum('active','pending','inactive') NOT NULL DEFAULT 'active',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_reviews`
--

LOCK TABLES `exchangerix_reviews` WRITE;
/*!40000 ALTER TABLE `exchangerix_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_settings`
--

DROP TABLE IF EXISTS `exchangerix_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL DEFAULT '',
  `setting_value` text DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1090 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_settings`
--

LOCK TABLES `exchangerix_settings` WRITE;
/*!40000 ALTER TABLE `exchangerix_settings` DISABLE KEYS */;
INSERT INTO `exchangerix_settings` VALUES
(1000,'website_title','Exchange Site'),
(1001,'website_url','{$domain}'),
(1002,'website_mode','live'),
(1003,'website_home_title','Best Online Exchange Service'),
(1004,'email_from_name','Exchange Site Support'),
(1005,'website_email','admin@domain.com'),
(1006,'noreply_email','noreply@domain.com'),
(1007,'alerts_email','alerts@domain.com'),
(1008,'website_language','english'),
(1009,'multilingual','0'),
(1010,'website_timezone','America/New_York'),
(1011,'website_date_format','%d %b %Y'),
(1012,'website_currency','$'),
(1013,'website_currency_format','1'),
(1014,'account_activation','0'),
(1015,'signup_captcha','1'),
(1016,'exchange_captcha','0'),
(1017,'login_attempts_limit','0'),
(1018,'signup_credit','5'),
(1019,'refer_credit','5'),
(1020,'referral_commission','10'),
(1021,'min_payout','100'),
(1022,'min_transaction','50'),
(1023,'cancel_withdrawal','1'),
(1024,'view_list_style','1'),
(1025,'one_review','1'),
(1026,'homepage_reviews_limit','5'),
(1027,'homepage_exchanges_limit','5'),
(1028,'featured_items_limit','12'),
(1029,'results_per_page','12'),
(1030,'reviews_per_page','10'),
(1031,'news_per_page','20'),
(1032,'image_width','120'),
(1033,'image_height','60'),
(1034,'show_statistics','1'),
(1035,'show_site_statistics','1'),
(1036,'show_landing_page','1'),
(1037,'reviews_approve','1'),
(1038,'max_review_length','500'),
(1039,'email_new_exchange','0'),
(1040,'email_new_amount_request','0'),
(1041,'email_new_review','0'),
(1042,'email_new_ticket','0'),
(1043,'email_new_ticket_reply','0'),
(1044,'email_new_report','0'),
(1045,'sms_new_amount_request','0'),
(1046,'smtp_mail','0'),
(1047,'smtp_port','25'),
(1048,'smtp_host',''),
(1049,'smtp_username',''),
(1050,'smtp_password',''),
(1051,'smtp_ssl',''),
(1052,'reg_sources','Search Engine,Facebook,Twitter,Other'),
(1053,'addthis_id','YOUR-ACCOUNT-ID'),
(1054,'facebook_page',''),
(1055,'show_fb_likebox','0'),
(1056,'twitter_page',''),
(1057,'facebook_connect','0'),
(1058,'facebook_appid',''),
(1059,'facebook_secret',''),
(1060,'google_analytics',''),
(1061,'email_verification','0'),
(1062,'phone_verification','0'),
(1063,'document_verification','1'),
(1064,'address_verification','1'),
(1065,'payment_proof','1'),
(1066,'require_login','0'),
(1067,'reserve_minutes','20'),
(1068,'update_rates_minutes','10'),
(1069,'operator_status','online'),
(1070,'contact_phone',''),
(1071,'contact_phone2',''),
(1072,'contact_phone3',''),
(1073,'show_operator_hours','0'),
(1074,'operator_hours',''),
(1075,'operator_timezone',''),
(1076,'chat_code',''),
(1077,'whatsapp',''),
(1078,'skype',''),
(1079,'telegram',''),
(1080,'viber',''),
(1081,'sms_api_key',''),
(1082,'sms_api_secret',''),
(1083,'allowed_files','jpg|png|jpeg'),
(1084,'files_max_size','5242880'),
(1085,'total_exchanges_usd','0.00'),
(1086,'license','{$license_key}'),
(1087,'last_admin_login',''),
(1088,'word','{$my_pwd}'),
(1089,'iword','{$my_word}');
/*!40000 ALTER TABLE `exchangerix_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_transactions`
--

DROP TABLE IF EXISTS `exchangerix_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_transactions` (
  `transaction_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ref_id` int(11) NOT NULL DEFAULT 0,
  `payment_type` varchar(50) NOT NULL DEFAULT '',
  `payment_method` int(10) NOT NULL DEFAULT 0,
  `payment_details` text DEFAULT NULL,
  `transaction_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `transaction_commision` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `status` varchar(20) NOT NULL DEFAULT '',
  `reason` text DEFAULT NULL,
  `notification_sent` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `process_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_transactions`
--

LOCK TABLES `exchangerix_transactions` WRITE;
/*!40000 ALTER TABLE `exchangerix_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchangerix_users`
--

DROP TABLE IF EXISTS `exchangerix_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchangerix_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_group` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(70) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `fname` varchar(32) NOT NULL DEFAULT '',
  `lname` varchar(25) NOT NULL DEFAULT '',
  `gender` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(32) NOT NULL DEFAULT '',
  `address2` varchar(70) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(50) NOT NULL DEFAULT '',
  `zip` varchar(10) NOT NULL DEFAULT '',
  `country` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(20) NOT NULL DEFAULT '',
  `payment_method` varchar(50) NOT NULL DEFAULT '',
  `reg_source` varchar(100) NOT NULL DEFAULT '',
  `ref_id` int(11) unsigned NOT NULL DEFAULT 0,
  `discount` tinyint(1) NOT NULL DEFAULT 0,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `ip` varchar(15) NOT NULL DEFAULT '',
  `verified_email` tinyint(1) NOT NULL DEFAULT 0,
  `verified_phone` tinyint(1) NOT NULL DEFAULT 0,
  `verified_document` varchar(100) NOT NULL DEFAULT '',
  `verified_address` varchar(100) NOT NULL DEFAULT '',
  `verification_progress` varchar(3) NOT NULL DEFAULT '',
  `sms_code` varchar(100) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `auth_provider` varchar(100) NOT NULL DEFAULT '',
  `auth_uid` varchar(50) NOT NULL DEFAULT '',
  `activation_key` varchar(100) NOT NULL DEFAULT '',
  `unsubscribe_key` varchar(100) NOT NULL DEFAULT '',
  `login_session` varchar(255) NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_count` int(8) unsigned NOT NULL DEFAULT 0,
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `block_reason` tinytext DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchangerix_users`
--

LOCK TABLES `exchangerix_users` WRITE;
/*!40000 ALTER TABLE `exchangerix_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `exchangerix_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'exchanges'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-08 20:02:05
