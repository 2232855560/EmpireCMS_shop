<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsfile_other`;");
E_C("CREATE TABLE `phome_enewsfile_other` (
  `fileid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pubid` tinyint(1) NOT NULL DEFAULT '0',
  `filename` char(60) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `path` char(20) NOT NULL DEFAULT '',
  `adduser` char(30) NOT NULL DEFAULT '',
  `filetime` int(10) unsigned NOT NULL DEFAULT '0',
  `classid` tinyint(1) NOT NULL DEFAULT '0',
  `no` char(60) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `onclick` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `cjid` int(10) unsigned NOT NULL DEFAULT '0',
  `fpath` tinyint(1) NOT NULL DEFAULT '0',
  `modtype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileid`),
  KEY `id` (`id`),
  KEY `type` (`type`),
  KEY `modtype` (`modtype`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsfile_other` values('1','0','e72c3ddb05ab4553d2ec08caaa339588.jpg','16886','2018-04-10','lechucloud','1523357202','0','category-chair.jpg','1','0','2','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('2','0','4f8321a8324c75672a7338ab5dda6e65.jpg','15058','2018-04-10','lechucloud','1523359929','0','category-watch.jpg','1','0','3','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('3','0','10e3042900a6ff8c690e294e104b4a66.jpg','23101','2018-04-10','lechucloud','1523359952','0','category-lantern.jpg','1','0','4','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('4','0','273610775504ea5a23f006b34d9a4aab.jpg','23101','2018-04-10','lechucloud','1523359966','0','category-lantern.jpg','1','0','5','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('5','0','33ad1715fdedf6a47da1635681dfd051.jpg','11822','2018-04-10','lechucloud','1523359978','0','category-bag.jpg','1','0','4','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('6','0','6cd81143e752a795249137f4f7971697.jpg','7015','2018-04-10','lechucloud','1523360350','0','category-bag.jpg','1','0','4','0','0','1');");
E_D("replace into `phome_enewsfile_other` values('7','0','9c5f3c50ff6ead6c337d1a43160d9a15.jpg','11782','2018-04-10','lechucloud','1523360489','0','category-lantern.jpg','1','0','5','0','0','1');");

@include("../../inc/footer.php");
?>