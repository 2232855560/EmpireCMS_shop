<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsfava`;");
E_C("CREATE TABLE `phome_enewsfava` (
  `favaid` bigint(20) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `favatime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `classid` smallint(6) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`favaid`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsfava` values('1','39','2018-04-18 19:08:55','1','lehuyun','3','0');");
E_D("replace into `phome_enewsfava` values('2','47','2018-04-21 22:23:02','1','lehuyun','5','0');");
E_D("replace into `phome_enewsfava` values('3','37','2018-04-21 22:23:28','1','lehuyun','5','0');");
E_D("replace into `phome_enewsfava` values('4','21','2018-04-21 22:51:32','1','lehuyun','2','0');");
E_D("replace into `phome_enewsfava` values('5','16','2018-04-21 23:12:24','1','lehuyun','4','0');");

@include("../../inc/footer.php");
?>