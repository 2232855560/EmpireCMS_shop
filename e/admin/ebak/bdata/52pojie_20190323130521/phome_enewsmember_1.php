<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmember`;");
E_C("CREATE TABLE `phome_enewsmember` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `rnd` char(20) NOT NULL DEFAULT '',
  `email` char(50) NOT NULL DEFAULT '',
  `registertime` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `userfen` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `userdate` int(10) unsigned NOT NULL DEFAULT '0',
  `money` float(11,2) NOT NULL DEFAULT '0.00',
  `zgroupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `havemsg` tinyint(1) NOT NULL DEFAULT '0',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `salt` char(8) NOT NULL DEFAULT '',
  `userkey` char(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsmember` values('1','lehuyun','398d22a21589e859c37b0ee606124476','W2DhdiHpORySMMTgt5kX','987312033@qq.com','1523499975','1','9980','0','2651.00','0','0','1','5RzBlF','7DJsPuuOxmJt');");
E_D("replace into `phome_enewsmember` values('2','meishu','ca39ef72b4269e886c0f1a7d1530f5be','OQaRaK4ma1WWdwxUxAfc','czw2009@qq.com','1524315714','1','0','0','0.00','0','0','1','Wo03Xg','G2yUD29SgoMU');");

@include("../../inc/footer.php");
?>