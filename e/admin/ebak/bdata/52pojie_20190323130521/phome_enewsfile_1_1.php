<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsfile_1`;");
E_C("CREATE TABLE `phome_enewsfile_1` (
  `fileid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pubid` bigint(16) unsigned NOT NULL DEFAULT '0',
  `filename` char(60) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `path` char(20) NOT NULL DEFAULT '',
  `adduser` char(30) NOT NULL DEFAULT '',
  `filetime` int(10) unsigned NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `no` char(60) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `onclick` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `cjid` int(10) unsigned NOT NULL DEFAULT '0',
  `fpath` tinyint(1) NOT NULL DEFAULT '0',
  `modtype` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileid`),
  KEY `id` (`id`),
  KEY `type` (`type`),
  KEY `classid` (`classid`),
  KEY `pubid` (`pubid`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsfile_1` values('29','1000060000000031','8737a211a5c43adc2dba7a9d366cb83b.jpg','39349','2018-04-13','lechucloud','1523615608','5','1.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('28','1000060000000031','11eb6ad0640feb76fa6d03276b9e90f3.jpg','43961','2018-04-13','lechucloud','1523615602','5','2.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('3','1000060000000002','d611bab667a2e83c67a3115dae2ebca8.jpg','23156','2018-04-11','lechucloud','1523409317','3','1.jpg','1','0','2','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('15','1000060000000014','ccb156f69eed96ef68622564d3e32745.jpg','51325','2018-04-13','lechucloud','1523608484','4','1.jpg','1','0','14','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('14','1000060000000014','9f5e0df5b9cdf3b14b3590f21f65dd30.jpg','45622','2018-04-13','lechucloud','1523608477','4','2.jpg','1','0','14','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('17','1000060000000013','7cae5018f9a0a0d8a970bd78c00adf98.jpg','20742','2018-04-13','lechucloud','1523608544','4','1.jpg','1','0','13','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('16','1000060000000013','edaae4c24fbcc7b26b5c82318fac14ed.jpg','19166','2018-04-13','lechucloud','1523608538','4','2.jpg','1','0','13','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('19','1000060000000012','9dd964782f6ee81fbd9b2c65137e6583.jpg','44161','2018-04-13','lechucloud','1523608584','4','1.jpg','1','0','12','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('18','1000060000000012','96f9d210af1af71892a614fdb3151d42.jpg','40025','2018-04-13','lechucloud','1523608579','4','2.jpg','1','0','12','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('21','1000060000000011','4822c0f97904dc83124096c61d189b45.jpg','21799','2018-04-13','lechucloud','1523608630','4','1.jpg','1','0','11','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('20','1000060000000011','4120d7bc23ae4db99741d8a4266040e5.jpg','18897','2018-04-13','lechucloud','1523608624','4','2.jpg','1','0','11','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('23','1000060000000010','536be9e20656853118953cb2f11bed0a.jpg','64506','2018-04-13','lechucloud','1523608682','4','1.jpg','1','0','10','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('22','1000060000000010','5d07c7e96acce677b9beeb9027eae218.jpg','56226','2018-04-13','lechucloud','1523608676','4','2.jpg','1','0','10','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('24','1000060000000015','9c771df284aa4745fbde0bd1fb8c1fce.jpg','35680','2018-04-13','lechucloud','1523608792','4','1.jpg','1','0','15','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('25','1000060000000015','e41ecc46e28be3eb952649588e95863c.jpg','36032','2018-04-13','lechucloud','1523608799','4','2.jpg','1','0','15','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('26','1000060000000016','4a6db8c8a2cc6bb1f408360f9efac945.jpg','82138','2018-04-13','lechucloud','1523612007','4','2.jpg','1','0','16','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('27','1000060000000016','1bf6f9e580f9ae52b33ecb59c1e1207a.jpg','81669','2018-04-13','lechucloud','1523612032','4','1.jpg','1','0','16','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('30','1000060000000032','e9b9f95051c74e23a56323ccca786511.jpg','14542','2018-04-13','lechucloud','1523615690','5','2.jpg','1','0','32','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('31','1000060000000032','f1ef3ec5161d29e9be59777e4a7e46a1.jpg','14885','2018-04-13','lechucloud','1523615697','5','1.jpg','1','0','32','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('32','1000060000000033','26df54bf6be99c4e4dc44c1c455dfb7c.jpg','20959','2018-04-13','lechucloud','1523615800','5','2.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('33','1000060000000033','2a679a5cd87978ff31ad606b2a634e96.jpg','22585','2018-04-13','lechucloud','1523615805','5','1.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('34','1000060000000034','2239a31bbfad9f517c7ee114707c26f0.jpg','30326','2018-04-13','lechucloud','1523616338','5','2.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('35','1000060000000034','428a5dc8cca1a9126bb33da1a6e100ee.jpg','44628','2018-04-13','lechucloud','1523616346','5','1.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('36','1000060000000034','79b116a16d7069ed0dc62333f0bb4d30.jpg','47622','2018-04-13','lechucloud','1523616356','5','3.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('37','1000060000000034','4930b1dab792a5316c0828723780024f.jpg','179658','2018-04-13','lechucloud','1523616477','5','flpqpd_05.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('38','1000060000000035','8c9d5eb8ddbda2df2d15c133cf084637.jpg','29393','2018-04-13','lechucloud','1523617369','5','1.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('39','1000060000000035','97fd75b8bb50e0b15eaf64469b624f10.jpg','18143','2018-04-13','lechucloud','1523617378','5','2.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('40','1000060000000035','2c0841bfe21a341d3971eb01e696c87b.jpg','25036','2018-04-13','lechucloud','1523617386','5','3.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('41','1000060000000035','ee5cc2efabd4f7914de9192c9ad5faa1.jpg','29992','2018-04-13','lechucloud','1523617468','5','4.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('42','1000060000000030','977062ceb77315b589330df00379e302.jpg','34318','2018-04-17','admin','1523961819','2','19.jpg','1','0','30','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('43','1000060000000029','edc57558c078302d862830c08d4e50a3.jpg','49513','2018-04-17','admin','1523961844','2','18.jpg','1','0','29','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('44','1000060000000028','b7ce48fac5df09cddf1782e77194a47c.jpg','51435','2018-04-17','admin','1523961866','2','17.jpg','1','0','28','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('45','1000060000000024','b3f88a8481a466f5c3e2a8ea01e5266f.jpg','52274','2018-04-17','admin','1523961887','2','16.jpg','1','0','24','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('46','1000060000000023','1ebff5024452f536b8736d0010c7897e.jpg','42703','2018-04-17','admin','1523961912','2','15.jpg','1','0','23','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('47','1000060000000022','178048c12b6e3794d2f4b7a7be7d44fa.jpg','68716','2018-04-17','admin','1523961938','2','14.jpg','1','0','22','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('48','1000060000000021','5526f7e0a0f14f9a523ad4008e5d41f4.jpg','36717','2018-04-17','admin','1523961960','2','13.jpg','1','0','21','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('49','1000060000000021','3bd82b02d93f4c48beab4ff7a02761a6.jpg','45984','2018-04-17','admin','1523961997','2','12.jpg','1','0','21','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('50','1000060000000030','9b37704e2f77b028d13fcc56d8988b2d.jpg','33436','2018-04-17','admin','1523962259','2','19.jpg','1','0','30','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('51','1000060000000030','7d08b1c047e85d8ec52a4f0306b8d005.jpg','33816','2018-04-17','admin','1523962408','2','19.jpg','1','0','30','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('52','1000060000000028','2216888cd4bd6a25a5579154a3cf9e8c.jpg','46092','2018-04-17','admin','1523962545','2','17.jpg','1','0','28','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('53','1000060000000029','823145bb6e71ab851511b427c13070a4.jpg','44138','2018-04-17','admin','1523962832','2','18.jpg','1','0','29','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('54','1000060000000023','3b4977c2bf66a987b700de307e7acc4d.jpg','36948','2018-04-17','admin','1523962944','2','15.jpg','1','0','23','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('55','1000060000000024','ed3a64a1020f22132a34721101ba6dde.jpg','50833','2018-04-17','admin','1523963145','2','16.jpg','1','0','24','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('56','1000060000000022','d86abf97205b0f234575beb2de192ebc.jpg','29653','2018-04-17','admin','1523963565','2','1.jpg','1','0','22','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('57','1000060000000021','c0a01eab1499026c6067727e986e7093.jpg','41919','2018-04-17','admin','1523963630','2','12.jpg','1','0','21','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('58','1000060000000045','c5906c7c8176bc59d69c7d403885b870.jpg','31915','2018-04-17','admin','1523963666','2','13.jpg','1','0','45','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('59','1000060000000044','be9b9dc6ff5f955066e84bfd2d942be1.jpg','98988','2018-04-17','admin','1523964936','3','爱彼.jpg','1','0','44','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('60','1000060000000043','e38455c07b2d904cc0552fd13a5fc1ca.jpg','101190','2018-04-17','admin','1523965053','3','百达翡丽.jpg','1','0','43','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('61','1000060000000042','4490cdaae1df21e8413d2f46d5c2203b.jpg','84115','2018-04-17','admin','1523965098','3','伯爵.jpg','1','0','42','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('62','1000060000000041','dce2809f995c682c60ba38c578395fb7.jpg','89233','2018-04-17','admin','1523965173','3','江诗丹顿.jpg','1','0','41','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('63','1000060000000040','d3a00b363c09d04e4c9265282b88310d.jpg','87558','2018-04-17','admin','1523965245','3','卡迪娅.jpg','1','0','40','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('64','1000060000000039','0fc84c448f6e1b3b603f8153569d26af.jpg','66571','2018-04-17','admin','1523965342','3','浪琴.jpg','1','0','39','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('65','1000060000000038','f7f13bffd4cf291a02ca3180835b1bf1.jpg','100349','2018-04-17','admin','1523965395','3','劳力士.jpg','1','0','38','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('66','1000060000000002','09df6a9e82ced505248b46b16d4e3638.jpg','86022','2018-04-17','admin','1523965451','3','芝柏.jpg','1','0','2','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('67','1000060000000016','9a51ec81685cb23623daacfec8788185.jpg','51325','2018-04-17','admin','1523968903','4','1.jpg','1','0','16','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('68','1000060000000015','7e36913d8b74fe6160b8cf8a3543a681.jpg','64506','2018-04-17','admin','1523968932','4','2.jpg','1','0','15','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('69','1000060000000014','4a2b9bbaf57ce5d79e1fe5d7af8047e8.jpg','49767','2018-04-17','admin','1523968953','4','3.jpg','1','0','14','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('70','1000060000000013','17caa71aa5ee8a81fecb7bcfd727b674.jpg','68854','2018-04-17','admin','1523968989','4','4.jpg','1','0','13','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('71','1000060000000012','46a034d6b7dcf7a88d5b8ca043b422a0.jpg','76636','2018-04-17','admin','1523969091','4','5.jpg','1','0','12','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('72','1000060000000011','4c87cc2ca220001644b81c436d2df927.jpg','106782','2018-04-17','admin','1523969126','4','6.jpg','1','0','11','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('73','1000060000000010','29e1c8006fb976966e6b40c84b01e63d.jpg','101914','2018-04-17','admin','1523969151','4','7.jpg','1','0','10','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('74','1000060000000046','924102040dd5e0ded2bf751bf78513ec.jpg','106960','2018-04-17','admin','1523969236','4','8.jpg','1','0','46','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('75','1000060000000037','93e3eb8039ea5d370fff0d5207aa8149.jpg','71222','2018-04-17','admin','1523972047','5','1.jpg','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('76','1000060000000036','c23c42cb84b7b65c0c63644b1b637da7.jpg','18652','2018-04-17','admin','1523972151','5','3.jpg','1','0','36','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('77','1000060000000035','a51099f3335e90ecfa9d97b72da4dbcb.jpg','31135','2018-04-17','admin','1523972205','5','5.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('78','1000060000000034','81fa7015d53c3b9e21a185c58d2fd596.jpg','36926','2018-04-17','admin','1523972293','5','6.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('79','1000060000000033','ae7db4a3599d017ca8e06161b3ee3079.jpg','32886','2018-04-17','admin','1523972482','5','7.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('80','1000060000000032','6378742d1e18001f38fd57d177054b30.jpg','33900','2018-04-17','admin','1523972578','5','8.jpg','1','0','32','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('81','1000060000000031','aa91838b92b0085c1d94f80b6d75c1e4.jpg','67894','2018-04-17','admin','1523972683','5','9.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('82','1000060000000047','77397cb04d9d9336e9b1f2c243bcb086.jpg','23277','2018-04-17','admin','1523972795','5','4.jpg','1','0','47','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('83','1000060000000047','ae1fbd3b028e73b83aedf46f57ea8c54.jpg','115356','2018-04-18','admin','1524017565','5','tv.jpg','1','0','47','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('84','1000060000000031','804c2e311b5aa9a9c820963709ea01aa.jpg','46266','2018-04-18','admin','1524018181','5','[URL]804c2e311b5aa9a9c820963709ea01aa.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('85','1000060000000031','26bf0a177615d83959a24383b9aa2f1e.jpg','139518','2018-04-18','admin','1524018181','5','[URL]26bf0a177615d83959a24383b9aa2f1e.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('86','1000060000000031','ebe00b7aeeebed2c42042a03dfb3b365.jpg','164846','2018-04-18','admin','1524018181','5','[URL]ebe00b7aeeebed2c42042a03dfb3b365.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('87','1000060000000031','62774b0cfb338712c597a2431b53ee0a.jpg','137751','2018-04-18','admin','1524018182','5','[URL]62774b0cfb338712c597a2431b53ee0a.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('88','1000060000000031','d5f36b757f0163f35c1d676a8c29b7ad.jpg','162433','2018-04-18','admin','1524018182','5','[URL]d5f36b757f0163f35c1d676a8c29b7ad.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('89','1000060000000031','9a49a5e653e6482036b7bc5fa6947532.jpg','270833','2018-04-18','admin','1524018182','5','[URL]9a49a5e653e6482036b7bc5fa6947532.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('90','1000060000000031','ab0715aab0b0eea921864937695fa3f2.jpg','100405','2018-04-18','admin','1524018183','5','[URL]ab0715aab0b0eea921864937695fa3f2.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('91','1000060000000031','6fa97bb269c1b0897c218b4c5d9266f4.jpg','342689','2018-04-18','admin','1524018183','5','[URL]6fa97bb269c1b0897c218b4c5d9266f4.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('92','1000060000000031','acbf1ace6f211acaf2019ca329463db1.jpg','88090','2018-04-18','admin','1524018184','5','[URL]acbf1ace6f211acaf2019ca329463db1.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('93','1000060000000031','bf312adb5837ba763df5bb121879aa6e.jpg','366695','2018-04-18','admin','1524018184','5','[URL]bf312adb5837ba763df5bb121879aa6e.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('94','1000060000000031','9be14f6972c29a12383e507c95012b76.jpg','122623','2018-04-18','admin','1524018184','5','[URL]9be14f6972c29a12383e507c95012b76.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('95','1000060000000031','be37c2b0c26b9fde8d4bd9dd6ad5db57.jpg','231998','2018-04-18','admin','1524018185','5','[URL]be37c2b0c26b9fde8d4bd9dd6ad5db57.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('96','1000060000000031','253148e1f57f70a76e08e65d254ec181.jpg','266751','2018-04-18','admin','1524018185','5','[URL]253148e1f57f70a76e08e65d254ec181.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('97','1000060000000031','0409d24b75ad512402c428b6b0cee16a.jpg','91399','2018-04-18','admin','1524018185','5','[URL]0409d24b75ad512402c428b6b0cee16a.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('98','1000060000000031','5abc198977eb33a26682c06f0c04a0a5.jpg','343082','2018-04-18','admin','1524018186','5','[URL]5abc198977eb33a26682c06f0c04a0a5.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('99','1000060000000031','ed45e370ce0487e80196109acf2e6278.jpg','248054','2018-04-18','admin','1524018186','5','[URL]ed45e370ce0487e80196109acf2e6278.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('100','1000060000000031','3000a40b2dd6a46f06a0617bfa1e5ba6.jpg','130546','2018-04-18','admin','1524018187','5','[URL]3000a40b2dd6a46f06a0617bfa1e5ba6.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('101','1000060000000031','39aec19896ac638dcfce3b6d16f0ccd2.jpg','373243','2018-04-18','admin','1524018187','5','[URL]39aec19896ac638dcfce3b6d16f0ccd2.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('102','1000060000000031','9e5794cb089fc9866ea6ce62d65911e7.jpg','134026','2018-04-18','admin','1524018187','5','[URL]9e5794cb089fc9866ea6ce62d65911e7.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('103','1000060000000031','9baf89133bd75cf06f19c0963c8e57bb.jpg','39121','2018-04-18','admin','1524018188','5','[URL]9baf89133bd75cf06f19c0963c8e57bb.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('104','1000060000000031','f4419c32e79636c1b9792d45f4a014f2.jpg','56733','2018-04-18','admin','1524027286','5','9-3.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('105','1000060000000031','bff24bf2351769f36566333bce7283f3.jpg','56946','2018-04-18','admin','1524027300','5','9-2.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('106','1000060000000031','50601b34d228e28b08a447dfa3fed970.jpg','35156','2018-04-18','admin','1524027309','5','9.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('107','1000060000000031','077f2435771213601ccbec893665525a.jpg','10333','2018-04-18','admin','1524027315','5','9-1.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('108','1000060000000031','21626ad339a7bd70bd022b9a953d87bb.jpg','57220','2018-04-18','admin','1524027752','5','9-2.jpg','1','0','31','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('109','1000060000000047','5d80115ea3ee4c977c2b107505f09e3f.jpg','130359','2018-04-18','admin','1524030071','5','tv-1.jpg','1','0','47','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('110','1000060000000047','abf3a10f18e29864a2f8d8dbb9c75e23.jpg','38996','2018-04-18','admin','1524030109','5','tv-3.jpg','1','0','47','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('111','1000060000000047','9fb09f013e90116b67d61ce600720fc3.jpg','80292','2018-04-18','admin','1524030115','5','tv-2.jpg','1','0','47','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('112','1000060000000032','2a65f0a344a70b6363959a67c244d824.jpg','29338','2018-04-18','admin','1524033208','5','8-1.jpg','1','0','32','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('113','1000060000000032','93989addab6ecd3b9517fb200515eba6.jpg','32180','2018-04-18','admin','1524033215','5','8-2.jpg','1','0','32','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('114','1000060000000033','323072a4baf63d8fc50b990cf1adb5ff.jpg','35831','2018-04-18','luozhanhu','1524039892','5','7-1.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('115','1000060000000033','1e06607511c778a2030027b40474f2ac.jpg','34142','2018-04-18','luozhanhu','1524039898','5','7-2.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('116','1000060000000033','3e436ab1eb73789a216ecc3a3feebf2d.jpg','51462','2018-04-18','luozhanhu','1524039904','5','7-3.jpg','1','0','33','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('117','1000060000000034','b5cb8b762bc19caa9b6c09f8389043f4.jpg','29553','2018-04-18','luozhanhu','1524040200','5','6-1.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('118','1000060000000034','4430b62dec19f4ef4cf2347af46934ef.jpg','33062','2018-04-18','luozhanhu','1524040207','5','6-2.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('119','1000060000000034','8d5591c6972afee238b6b1010ec0ffdc.jpg','31845','2018-04-18','luozhanhu','1524040213','5','6-3.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('120','1000060000000034','5f8c6fc874b780f546093bde2c02cdb9.jpg','34992','2018-04-18','luozhanhu','1524040544','5','6-1.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('121','1000060000000034','8f13bedb38fdd22d67325d7bfca07d45.jpg','37876','2018-04-18','luozhanhu','1524040550','5','6-2.jpg','1','0','34','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('122','1000060000000036','2d5b59ca02113bde9deb7d7093655013.jpg','36565','2018-04-18','luozhanhu','1524041231','5','sj.jpg','1','0','36','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('123','1000060000000036','7f6ad564c879974a60706f932bb99e83.jpg','51607','2018-04-18','luozhanhu','1524041242','5','sj-1.jpg','1','0','36','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('124','1000060000000036','401f6100ffe777486d999ade32cb7fd2.jpg','32479','2018-04-18','luozhanhu','1524041249','5','sj-2.jpg','1','0','36','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('125','1000060000000036','d22387201ef054c6b12de6e92f8bf654.jpg','14370','2018-04-18','luozhanhu','1524041255','5','sj-3.jpg','1','0','36','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('126','1000060000000037','a78de361499b37f6e1de76b99a9774bf.jpg','18652','2018-04-18','luozhanhu','1524041441','5','3.jpg','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('127','1000060000000037','32ffa26957e68caecabe02a4f83d3173.jpg','41560','2018-04-18','luozhanhu','1524042860','5','sound-st-01-01.png','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('128','1000060000000037','42eaaab03f4656a6873fe2b9ca2a6e9c.jpg','42793','2018-04-18','luozhanhu','1524042872','5','yx-1.jpg','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('129','1000060000000037','86101f85fabba06dfdbc0792a82d835c.jpg','41451','2018-04-18','luozhanhu','1524042880','5','yx-2.jpg','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('130','1000060000000037','b56b8c4b2da6047a08e4a7af62267989.jpg','25168','2018-04-18','luozhanhu','1524042993','5','yx-3.jpg','1','0','37','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('131','1000060000000035','7977cfe296a5af7484dd75d3c9b07029.jpg','35396','2018-04-18','luozhanhu','1524043247','5','sd-1.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('132','1000060000000035','895e23a58f48aecffda1e88b8581b08c.jpg','32486','2018-04-18','luozhanhu','1524043257','5','sd-2.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('133','1000060000000035','d95562acc15ef8bb3c84dd519ffb743b.jpg','30674','2018-04-18','luozhanhu','1524043275','5','sd-3.jpg','1','0','35','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('134','0','15244728615807.jpg','73467','2018-04-23 16:41:01','luozhanhu','1524412800','3','15244728615807.jpg','0','0','1524412800','0','0','0');");
E_D("replace into `phome_enewsfile_1` values('135','0','15244728611643.jpg','67684','2018-04-23 16:41:01','luozhanhu','1524412800','3','15244728611643.jpg','0','0','1524412800','0','0','0');");

@include("../../inc/footer.php");
?>