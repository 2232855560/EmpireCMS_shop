<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_ecms_shop_data_1`;");
E_C("CREATE TABLE `phome_ecms_shop_data_1` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `keyid` char(255) NOT NULL DEFAULT '',
  `dokey` tinyint(1) NOT NULL DEFAULT '0',
  `newstempid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `closepl` tinyint(1) NOT NULL DEFAULT '0',
  `haveaddfen` tinyint(1) NOT NULL DEFAULT '0',
  `infotags` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `phome_ecms_shop_data_1` values('21','2','39,16,45,38,15,44,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('2','3','','1','0','0','0','');");
E_D("replace into `phome_ecms_shop_data_1` values('15','4','16,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('16','4','15,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('23','2','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('24','2','41,14,42,10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('31','5','','1','0','0','0','light');");
E_D("replace into `phome_ecms_shop_data_1` values('28','2','41,14,24,42,10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('22','2','39,16,45,38,15,44,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('10','4','14','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('11','4','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('12','4','','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('13','4','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('14','4','10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('29','2','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('30','2','','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('32','5','','1','0','0','0','light');");
E_D("replace into `phome_ecms_shop_data_1` values('33','5','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('34','5','','1','0','0','0','light');");
E_D("replace into `phome_ecms_shop_data_1` values('35','5','14,46,10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('36','5','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('37','5','','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('38','3','16,15,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('39','3','16,15,13,12,11','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('40','3','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('41','3','14,10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('42','3','41,14,10','1','0','0','0','Backpack');");
E_D("replace into `phome_ecms_shop_data_1` values('43','3','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('44','3','','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('45','2','39,16,38,15,44,37,12','1','0','0','0','bag');");
E_D("replace into `phome_ecms_shop_data_1` values('46','4','','1','0','0','0','glassic');");
E_D("replace into `phome_ecms_shop_data_1` values('47','5','','1','0','0','0','light');");

@include("../../inc/footer.php");
?>