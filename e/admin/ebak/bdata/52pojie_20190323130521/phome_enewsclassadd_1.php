<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsclassadd`;");
E_C("CREATE TABLE `phome_enewsclassadd` (
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `classtext` mediumtext NOT NULL,
  `ttids` text NOT NULL,
  `enlish` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsclassadd` values('1','','','');");
E_D("replace into `phome_enewsclassadd` values('2','','','测试');");
E_D("replace into `phome_enewsclassadd` values('3','','','');");
E_D("replace into `phome_enewsclassadd` values('4','','','');");
E_D("replace into `phome_enewsclassadd` values('5','','','');");

@include("../../inc/footer.php");
?>