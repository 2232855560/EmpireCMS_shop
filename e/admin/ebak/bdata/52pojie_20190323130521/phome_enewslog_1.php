<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewslog`;");
E_C("CREATE TABLE `phome_enewslog` (
  `loginid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginip` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(30) NOT NULL DEFAULT '',
  `loginauth` tinyint(1) NOT NULL DEFAULT '0',
  `ipport` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`loginid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewslog` values('1','lechucloud','2018-04-10 12:58:22','127.0.0.1','1','','0','51891');");
E_D("replace into `phome_enewslog` values('2','lechucloud','2018-04-10 13:51:15','127.0.0.1','1','','0','52740');");
E_D("replace into `phome_enewslog` values('3','lechucloud','2018-04-10 17:07:47','127.0.0.1','1','','0','50184');");
E_D("replace into `phome_enewslog` values('4','lechucloud','2018-04-10 18:29:02','127.0.0.1','1','','0','51323');");
E_D("replace into `phome_enewslog` values('5','lechucloud','2018-04-11 01:07:18','127.0.0.1','1','','0','53793');");
E_D("replace into `phome_enewslog` values('6','lechucloud','2018-04-11 08:50:32','127.0.0.1','1','','0','50361');");
E_D("replace into `phome_enewslog` values('7','lechucloud','2018-04-11 10:07:58','127.0.0.1','1','','0','51730');");
E_D("replace into `phome_enewslog` values('8','lechucloud','2018-04-11 11:22:07','127.0.0.1','1','','0','53212');");
E_D("replace into `phome_enewslog` values('9','lechucloud','2018-04-11 17:39:23','127.0.0.1','1','','0','55549');");
E_D("replace into `phome_enewslog` values('10','lechucloud','2018-04-11 18:31:14','127.0.0.1','1','','0','56687');");
E_D("replace into `phome_enewslog` values('11','lechucloud','2018-04-11 19:19:11','127.0.0.1','1','','0','57493');");
E_D("replace into `phome_enewslog` values('12','lechucloud','2018-04-11 21:00:02','127.0.0.1','1','','0','58799');");
E_D("replace into `phome_enewslog` values('13','52pojie','2018-04-12 10:12:13','127.0.0.1','0','','0','49804');");
E_D("replace into `phome_enewslog` values('14','52pojie','2018-04-12 10:12:22','127.0.0.1','0','','0','49824');");
E_D("replace into `phome_enewslog` values('15','52pojie','2018-04-12 10:12:32','127.0.0.1','0','','1','49843');");
E_D("replace into `phome_enewslog` values('16','52pojie','2018-04-12 10:12:43','127.0.0.1','0','','0','49865');");
E_D("replace into `phome_enewslog` values('17','lechucloud','2018-04-12 10:13:10','127.0.0.1','1','','0','49906');");
E_D("replace into `phome_enewslog` values('18','lechucloud','2018-04-12 10:55:30','127.0.0.1','1','','0','54243');");
E_D("replace into `phome_enewslog` values('19','52pojie','2018-04-12 14:47:58','127.0.0.1','0','','0','60374');");
E_D("replace into `phome_enewslog` values('20','52pojie','2018-04-12 14:48:09','127.0.0.1','0','','1','60403');");
E_D("replace into `phome_enewslog` values('21','52pojie','2018-04-12 14:48:21','127.0.0.1','0','','0','60438');");
E_D("replace into `phome_enewslog` values('22','lechucloud','2018-04-12 14:50:02','127.0.0.1','1','','0','60742');");
E_D("replace into `phome_enewslog` values('23','lechucloud','2018-04-12 15:41:41','127.0.0.1','1','','0','50258');");
E_D("replace into `phome_enewslog` values('24','lechucloud','2018-04-12 16:50:11','127.0.0.1','1','','0','56897');");
E_D("replace into `phome_enewslog` values('25','lechucloud','2018-04-12 22:08:35','127.0.0.1','1','','0','64643');");
E_D("replace into `phome_enewslog` values('26','lechucloud','2018-04-13 08:50:55','127.0.0.1','1','','0','52118');");
E_D("replace into `phome_enewslog` values('27','lechucloud','2018-04-13 09:49:26','127.0.0.1','1','','0','53456');");
E_D("replace into `phome_enewslog` values('28','lechucloud','2018-04-13 10:13:01','127.0.0.1','1','','0','54043');");
E_D("replace into `phome_enewslog` values('29','lechucloud','2018-04-13 10:59:53','127.0.0.1','1','','0','49943');");
E_D("replace into `phome_enewslog` values('30','lechucloud','2018-04-13 13:12:18','127.0.0.1','1','','0','62831');");
E_D("replace into `phome_enewslog` values('31','lechucloud','2018-04-13 18:32:02','127.0.0.1','1','','0','51752');");
E_D("replace into `phome_enewslog` values('32','lechucloud','2018-04-13 23:01:12','127.0.0.1','1','','0','55347');");
E_D("replace into `phome_enewslog` values('33','52pojie','2018-04-15 20:36:04','127.0.0.1','0','','0','51527');");
E_D("replace into `phome_enewslog` values('34','52pojie','2018-04-15 20:36:08','127.0.0.1','0','','0','51533');");
E_D("replace into `phome_enewslog` values('35','52pojie','2018-04-15 20:36:24','127.0.0.1','0','','1','51536');");
E_D("replace into `phome_enewslog` values('36','52pojie','2018-04-15 20:36:44','127.0.0.1','0','','0','51543');");
E_D("replace into `phome_enewslog` values('37','52pojie','2018-04-15 20:44:40','127.0.0.1','0','','0','51702');");
E_D("replace into `phome_enewslog` values('38','52pojie','2018-04-15 20:47:33','127.0.0.1','0','','0','51782');");
E_D("replace into `phome_enewslog` values('39','52pojie','2018-04-15 21:38:16','127.0.0.1','1','','0','51220');");
E_D("replace into `phome_enewslog` values('40','52pojie','2018-04-16 20:40:44','127.0.0.1','0','','0','60132');");
E_D("replace into `phome_enewslog` values('41','52pojie','2018-04-16 20:43:18','127.0.0.1','1','','0','60236');");
E_D("replace into `phome_enewslog` values('42','52pojie','2018-04-17 00:44:40','127.0.0.1','0','','0','50104');");
E_D("replace into `phome_enewslog` values('43','52pojie','2018-04-17 00:44:46','127.0.0.1','0','','0','50104');");
E_D("replace into `phome_enewslog` values('44','52pojie','2018-04-17 00:44:54','127.0.0.1','1','','0','50112');");
E_D("replace into `phome_enewslog` values('45','52pojie','2018-04-17 01:23:27','127.0.0.1','1','','0','54595');");
E_D("replace into `phome_enewslog` values('46','52pojie','2018-04-17 02:15:31','113.143.142.55','0','','1','46588');");
E_D("replace into `phome_enewslog` values('47','52pojie','2018-04-17 02:15:44','113.143.142.55','1','','0','46588');");
E_D("replace into `phome_enewslog` values('48','52pojie','2018-04-17 08:57:22','113.143.142.55','1','','0','48766');");
E_D("replace into `phome_enewslog` values('49','52pojie','2018-04-17 18:22:53','113.143.142.55','0','','1','46769');");
E_D("replace into `phome_enewslog` values('50','52pojie','2018-04-17 18:22:57','113.143.142.55','1','','0','46769');");
E_D("replace into `phome_enewslog` values('51','52pojie','2018-04-17 20:41:19','113.143.142.55','0','','1','49492');");
E_D("replace into `phome_enewslog` values('52','52pojie','2018-04-17 20:41:23','113.143.142.55','0','','0','49510');");
E_D("replace into `phome_enewslog` values('53','52pojie','2018-04-17 20:41:28','113.143.142.55','1','','0','49518');");
E_D("replace into `phome_enewslog` values('54','52pojie','2018-04-17 21:33:28','113.143.142.55','1','','0','50074');");
E_D("replace into `phome_enewslog` values('55','52pojie','2018-04-17 23:07:21','113.143.142.55','1','','0','48927');");
E_D("replace into `phome_enewslog` values('56','52pojie','2018-04-18 10:11:52','113.143.164.25','1','','0','26015');");
E_D("replace into `phome_enewslog` values('57','52pojie','2018-04-18 11:04:48','113.143.164.25','1','','0','25989');");
E_D("replace into `phome_enewslog` values('58','52pojie','2018-04-18 12:54:32','113.143.164.25','1','','0','28309');");
E_D("replace into `phome_enewslog` values('59','lehuyun','2018-04-18 14:32:26','113.143.164.25','0','','0','25936');");
E_D("replace into `phome_enewslog` values('60','52pojie','2018-04-18 14:32:36','113.143.164.25','1','','0','25936');");
E_D("replace into `phome_enewslog` values('61','52pojie','2018-04-18 16:15:13','113.143.164.25','1','','0','27528');");
E_D("replace into `phome_enewslog` values('62','52pojie','2018-04-18 16:17:01','113.143.164.25','0','','1','27779');");
E_D("replace into `phome_enewslog` values('63','52pojie','2018-04-18 16:17:07','113.143.164.25','0','','0','27793');");
E_D("replace into `phome_enewslog` values('64','52pojie','2018-04-18 16:17:48','113.143.164.25','1','','0','27860');");
E_D("replace into `phome_enewslog` values('65','52pojie','2018-04-18 19:40:09','113.143.164.25','1','','0','26870');");
E_D("replace into `phome_enewslog` values('66','52pojie','2018-04-19 00:34:08','113.143.164.25','1','','0','26970');");
E_D("replace into `phome_enewslog` values('67','52pojie','2018-04-19 08:51:01','113.143.164.25','1','','0','29207');");
E_D("replace into `phome_enewslog` values('68','52pojie','2018-04-20 13:55:51','113.143.142.164','0','','0','21564');");
E_D("replace into `phome_enewslog` values('69','52pojie','2018-04-20 13:56:01','113.143.142.164','0','','0','21564');");
E_D("replace into `phome_enewslog` values('70','52pojie','2018-04-20 13:56:13','113.143.142.164','0','','0','21564');");
E_D("replace into `phome_enewslog` values('71','52pojie','2018-04-20 23:26:29','113.143.143.97','0','','0','28077');");
E_D("replace into `phome_enewslog` values('72','52pojie','2018-04-20 23:26:40','113.143.143.97','1','','0','28077');");
E_D("replace into `phome_enewslog` values('73','52pojie','2018-04-21 00:37:42','113.143.143.97','1','','0','26298');");
E_D("replace into `phome_enewslog` values('74','admin','2018-04-21 02:45:55','113.143.143.97','0','','0','27047');");
E_D("replace into `phome_enewslog` values('75','52pojie','2018-04-21 14:09:30','113.143.143.97','1','','0','26582');");
E_D("replace into `phome_enewslog` values('76','52pojie','2018-04-21 20:29:43','113.143.143.97','1','','0','27967');");
E_D("replace into `phome_enewslog` values('77','52pojie','2018-04-22 01:58:59','113.143.143.97','0','','0','26294');");
E_D("replace into `phome_enewslog` values('78','52pojie','2018-04-22 01:59:06','113.143.143.97','1','','0','26303');");
E_D("replace into `phome_enewslog` values('79','52pojie','2018-04-22 10:16:33','113.143.143.97','1','','0','25664');");
E_D("replace into `phome_enewslog` values('80','52pojie','2018-04-23 08:53:08','113.143.165.217','1','','0','8389');");
E_D("replace into `phome_enewslog` values('81','52pojie','2018-04-23 11:55:07','113.143.165.217','1','','0','8607');");
E_D("replace into `phome_enewslog` values('82','52pojie','2018-04-23 15:28:16','113.143.165.217','1','','0','5232');");
E_D("replace into `phome_enewslog` values('83','52pojie','2018-04-24 08:43:59','113.143.142.200','1','','0','62421');");
E_D("replace into `phome_enewslog` values('84','52pojie','2018-04-30 12:23:52','113.143.142.216','0','','1','12099');");
E_D("replace into `phome_enewslog` values('85','52pojie','2018-04-30 12:24:01','113.143.142.216','1','','0','12099');");
E_D("replace into `phome_enewslog` values('86','52pojie','2018-04-30 12:44:10','113.143.142.216','1','','0','11228');");
E_D("replace into `phome_enewslog` values('87','52pojie','2018-05-04 21:29:36','113.143.166.235','1','','0','7104');");
E_D("replace into `phome_enewslog` values('88','52pojie','2018-05-05 19:16:38','111.19.35.96','0','','0','8255');");
E_D("replace into `phome_enewslog` values('89','52pojie','2018-05-05 19:16:44','111.19.35.96','1','','0','8255');");
E_D("replace into `phome_enewslog` values('90','52pojie','2018-05-11 13:40:54','111.18.34.180','1','','0','21662');");
E_D("replace into `phome_enewslog` values('91','52pojie','2018-05-11 13:54:33','111.18.34.180','1','','0','21452');");
E_D("replace into `phome_enewslog` values('92','52pojie','2018-05-11 14:13:02','113.143.166.75','1','','0','40618');");
E_D("replace into `phome_enewslog` values('93','52pojie','2018-05-18 17:42:07','113.143.165.239','0','','0','41465');");
E_D("replace into `phome_enewslog` values('94','52pojie','2018-05-18 17:42:15','113.143.165.239','1','','0','41465');");
E_D("replace into `phome_enewslog` values('95','52pojie','2018-06-18 22:05:27','111.19.35.110','0','','0','12684');");
E_D("replace into `phome_enewslog` values('96','52pojie','2018-06-18 22:05:35','111.19.35.110','1','','0','12684');");
E_D("replace into `phome_enewslog` values('97','52pojie','2018-06-18 22:06:24','111.19.35.110','0','','1','12679');");
E_D("replace into `phome_enewslog` values('98','52pojie','2018-06-18 22:06:30','111.19.35.110','1','','0','12679');");
E_D("replace into `phome_enewslog` values('99','52pojie','2018-11-11 10:58:46','113.143.166.30','1','','0','8870');");
E_D("replace into `phome_enewslog` values('100','admin','2019-01-08 04:04:46','182.254.149.98','0','','0','64415');");
E_D("replace into `phome_enewslog` values('101','admin','2019-01-08 16:40:07','182.254.149.98','0','','0','64089');");
E_D("replace into `phome_enewslog` values('102','52pojie','2019-03-23 12:45:08','113.107.217.107','1','','0','49618');");
E_D("replace into `phome_enewslog` values('103','52pojie','2019-03-23 13:01:10','127.0.0.1','1','','0','50626');");
E_D("replace into `phome_enewslog` values('104','52pojie','2019-03-23 13:02:13','127.0.0.1','1','','0','50667');");

@include("../../inc/footer.php");
?>