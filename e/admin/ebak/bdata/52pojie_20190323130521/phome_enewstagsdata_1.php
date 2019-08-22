<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewstagsdata`;");
E_C("CREATE TABLE `phome_enewstagsdata` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(10) unsigned NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `newstime` int(10) unsigned NOT NULL DEFAULT '0',
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `tagid` (`tagid`),
  KEY `classid` (`classid`),
  KEY `id` (`id`),
  KEY `newstime` (`newstime`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewstagsdata` values('20','7','5','34','1523607838','6');");
E_D("replace into `phome_enewstagsdata` values('19','7','5','32','1523611943','6');");
E_D("replace into `phome_enewstagsdata` values('17','3','4','16','1523611943','6');");
E_D("replace into `phome_enewstagsdata` values('16','3','4','15','1523608744','6');");
E_D("replace into `phome_enewstagsdata` values('18','7','5','31','1523608744','6');");

@include("../../inc/footer.php");
?>