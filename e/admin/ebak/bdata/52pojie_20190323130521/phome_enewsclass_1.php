<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsclass`;");
E_C("CREATE TABLE `phome_enewsclass` (
  `classid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bclassid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `classname` varchar(50) NOT NULL DEFAULT '',
  `sonclass` text NOT NULL,
  `is_zt` tinyint(1) NOT NULL DEFAULT '0',
  `lencord` smallint(6) NOT NULL DEFAULT '0',
  `link_num` tinyint(4) NOT NULL DEFAULT '0',
  `newstempid` smallint(6) NOT NULL DEFAULT '0',
  `onclick` int(11) NOT NULL DEFAULT '0',
  `listtempid` smallint(6) NOT NULL DEFAULT '0',
  `featherclass` text NOT NULL,
  `islast` tinyint(1) NOT NULL DEFAULT '0',
  `classpath` text NOT NULL,
  `classtype` varchar(10) NOT NULL DEFAULT '',
  `newspath` varchar(20) NOT NULL DEFAULT '',
  `filename` tinyint(1) NOT NULL DEFAULT '0',
  `filetype` varchar(10) NOT NULL DEFAULT '',
  `openpl` tinyint(1) NOT NULL DEFAULT '0',
  `openadd` tinyint(1) NOT NULL DEFAULT '0',
  `newline` int(11) NOT NULL DEFAULT '0',
  `hotline` int(11) NOT NULL DEFAULT '0',
  `goodline` int(11) NOT NULL DEFAULT '0',
  `classurl` varchar(200) NOT NULL DEFAULT '',
  `groupid` smallint(6) NOT NULL DEFAULT '0',
  `myorder` smallint(6) NOT NULL DEFAULT '0',
  `filename_qz` varchar(20) NOT NULL DEFAULT '',
  `hotplline` tinyint(4) NOT NULL DEFAULT '0',
  `modid` smallint(6) NOT NULL DEFAULT '0',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `firstline` tinyint(4) NOT NULL DEFAULT '0',
  `bname` varchar(50) NOT NULL DEFAULT '',
  `islist` tinyint(1) NOT NULL DEFAULT '0',
  `searchtempid` smallint(6) NOT NULL DEFAULT '0',
  `tid` smallint(6) NOT NULL DEFAULT '0',
  `tbname` varchar(60) NOT NULL DEFAULT '',
  `maxnum` int(11) NOT NULL DEFAULT '0',
  `checkpl` tinyint(1) NOT NULL DEFAULT '0',
  `down_num` tinyint(4) NOT NULL DEFAULT '0',
  `online_num` tinyint(4) NOT NULL DEFAULT '0',
  `listorder` varchar(50) NOT NULL DEFAULT '',
  `reorder` varchar(50) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `classimg` varchar(255) NOT NULL DEFAULT '',
  `jstempid` smallint(6) NOT NULL DEFAULT '0',
  `addinfofen` int(11) NOT NULL DEFAULT '0',
  `listdt` tinyint(1) NOT NULL DEFAULT '0',
  `showclass` tinyint(1) NOT NULL DEFAULT '0',
  `showdt` tinyint(1) NOT NULL DEFAULT '0',
  `checkqadd` tinyint(1) NOT NULL DEFAULT '0',
  `qaddlist` tinyint(1) NOT NULL DEFAULT '0',
  `qaddgroupid` text NOT NULL,
  `qaddshowkey` tinyint(1) NOT NULL DEFAULT '0',
  `adminqinfo` tinyint(1) NOT NULL DEFAULT '0',
  `doctime` smallint(6) NOT NULL DEFAULT '0',
  `classpagekey` varchar(255) NOT NULL DEFAULT '',
  `dtlisttempid` smallint(6) NOT NULL DEFAULT '0',
  `classtempid` smallint(6) NOT NULL DEFAULT '0',
  `nreclass` tinyint(1) NOT NULL DEFAULT '0',
  `nreinfo` tinyint(1) NOT NULL DEFAULT '0',
  `nrejs` tinyint(1) NOT NULL DEFAULT '0',
  `nottobq` tinyint(1) NOT NULL DEFAULT '0',
  `ipath` varchar(255) NOT NULL DEFAULT '',
  `addreinfo` tinyint(1) NOT NULL DEFAULT '0',
  `haddlist` tinyint(4) NOT NULL DEFAULT '0',
  `sametitle` tinyint(1) NOT NULL DEFAULT '0',
  `definfovoteid` smallint(6) NOT NULL DEFAULT '0',
  `wburl` varchar(255) NOT NULL DEFAULT '',
  `qeditchecked` tinyint(1) NOT NULL DEFAULT '0',
  `wapstyleid` smallint(6) NOT NULL DEFAULT '0',
  `repreinfo` tinyint(1) NOT NULL DEFAULT '0',
  `pltempid` smallint(6) NOT NULL DEFAULT '0',
  `cgroupid` text NOT NULL,
  `yhid` smallint(6) NOT NULL DEFAULT '0',
  `wfid` smallint(6) NOT NULL DEFAULT '0',
  `cgtoinfo` tinyint(1) NOT NULL DEFAULT '0',
  `bdinfoid` varchar(25) NOT NULL DEFAULT '',
  `repagenum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `keycid` smallint(6) NOT NULL DEFAULT '0',
  `allinfos` int(10) unsigned NOT NULL DEFAULT '0',
  `infos` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`classid`),
  KEY `bclassid` (`bclassid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsclass` values('1','0','产品中心','|2|3|4|5|','0','8','10','0','0','6','','0','product','.html','Y-m-d','0','.html','0','1','10','10','10','','0','0','','10','6','1','10','产品中心','1','0','6','shop','0','0','2','2','id DESC','newstime DESC','','','1','0','0','0','0','0','0','','0','0','0','','0','1','0','0','0','0','','1','0','0','0','','0','0','0','0','','0','0','0','','0','0','0','0','1523339935');");
E_D("replace into `phome_enewsclass` values('2','1','家具-furniture','','0','6','10','7','0','9','|1|','1','product/furniture','.html','','0','.shtml','0','1','10','10','10','','0','0','','10','6','1','10','家具-furniture','1','0','6','shop','0','0','2','2','id DESC','newstime DESC','Interior','/d/file/p/2018-04-10/e72c3ddb05ab4553d2ec08caaa339588.jpg','1','0','0','0','0','0','0','','0','0','0','','0','1','0','0','0','0','product','1','0','0','0','','0','0','0','0','','0','0','0','','0','0','8','8','1523342295');");
E_D("replace into `phome_enewsclass` values('3','1','计时器-Calculagraph','','0','6','10','7','0','9','|1|','1','product/timer','.html','','0','.shtml','0','1','10','10','10','','0','0','','10','6','1','10','计时器-Calculagraph','1','0','6','shop','0','0','2','2','id DESC','newstime DESC','Essentials','/d/file/p/2018-04-10/4f8321a8324c75672a7338ab5dda6e65.jpg','1','0','0','0','0','0','0','','0','0','0','','0','1','0','0','0','0','product','1','0','0','0','','0','0','0','0','','0','0','0','','0','0','8','8','1523348071');");
E_D("replace into `phome_enewsclass` values('4','1','旅游-tourism','','0','6','10','7','0','9','|1|','1','product/travel','.html','','0','.shtml','0','1','10','10','10','','0','0','','10','6','1','10','旅游-tourism','1','0','6','shop','0','0','2','2','id DESC','newstime DESC','Bags & Backpacks','/d/file/p/2018-04-10/6cd81143e752a795249137f4f7971697.jpg','1','0','0','0','0','0','0','','0','0','0','','0','1','0','0','0','0','product','1','0','0','0','','0','0','0','0','','0','0','0','','0','0','8','8','1523348098');");
E_D("replace into `phome_enewsclass` values('5','1','居家-Household','','0','25','10','7','0','9','|1|','1','product/lighting','.html','','0','.shtml','0','1','10','10','10','','0','0','','10','6','1','10','居家-Household','1','0','6','shop','0','0','2','2','id DESC','newstime DESC','Decoration','/d/file/p/2018-04-10/9c5f3c50ff6ead6c337d1a43160d9a15.jpg','1','0','0','0','0','0','0','','0','0','0','','0','1','0','0','0','0','product','1','0','0','0','','0','0','0','0','','0','0','0','','0','0','8','8','1523348123');");

@include("../../inc/footer.php");
?>