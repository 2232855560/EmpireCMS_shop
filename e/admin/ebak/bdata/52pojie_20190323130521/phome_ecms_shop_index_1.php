<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_ecms_shop_index`;");
E_C("CREATE TABLE `phome_ecms_shop_index` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `newstime` int(10) unsigned NOT NULL DEFAULT '0',
  `truetime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastdotime` int(10) unsigned NOT NULL DEFAULT '0',
  `havehtml` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`,`id`),
  KEY `havehtml` (`classid`,`truetime`,`havehtml`,`checked`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8");
E_D("replace into `phome_ecms_shop_index` values('22','2','1','1523611943','1523612351','1523963588','1');");
E_D("replace into `phome_ecms_shop_index` values('2','3','1','1523409240','1523409334','1523965487','1');");
E_D("replace into `phome_ecms_shop_index` values('24','2','1','1523607838','1523612366','1523963155','1');");
E_D("replace into `phome_ecms_shop_index` values('23','2','1','1523607334','1523612366','1523963041','1');");
E_D("replace into `phome_ecms_shop_index` values('41','3','1','1523607838','1523617673','1523965232','1');");
E_D("replace into `phome_ecms_shop_index` values('21','2','1','1523608744','1523612351','1523963641','1');");
E_D("replace into `phome_ecms_shop_index` values('16','4','1','1523611943','1523612060','1523968921','1');");
E_D("replace into `phome_ecms_shop_index` values('15','4','1','1523608744','1523608817','1523968943','1');");
E_D("replace into `phome_ecms_shop_index` values('40','3','1','1523607334','1523617673','1523965306','1');");
E_D("replace into `phome_ecms_shop_index` values('10','4','1','1523606683','1523608345','1523969164','1');");
E_D("replace into `phome_ecms_shop_index` values('11','4','1','1523607018','1523608345','1523969138','1');");
E_D("replace into `phome_ecms_shop_index` values('12','4','1','1523607247','1523608345','1523969102','1');");
E_D("replace into `phome_ecms_shop_index` values('13','4','1','1523607334','1523608345','1523969007','1');");
E_D("replace into `phome_ecms_shop_index` values('14','4','1','1523607838','1523608345','1523968967','1');");
E_D("replace into `phome_ecms_shop_index` values('31','5','1','1523608744','1523615572','1524027756','1');");
E_D("replace into `phome_ecms_shop_index` values('39','3','1','1523611943','1523617673','1524472872','1');");
E_D("replace into `phome_ecms_shop_index` values('38','3','1','1523608744','1523617673','1523965440','1');");
E_D("replace into `phome_ecms_shop_index` values('28','2','1','1523606683','1523612415','1523962557','1');");
E_D("replace into `phome_ecms_shop_index` values('29','2','1','1523607018','1523612415','1523962842','1');");
E_D("replace into `phome_ecms_shop_index` values('30','2','1','1523607247','1523612415','1523962419','1');");
E_D("replace into `phome_ecms_shop_index` values('32','5','1','1523611943','1523615572','1524033277','1');");
E_D("replace into `phome_ecms_shop_index` values('33','5','1','1523607334','1523615572','1524039907','1');");
E_D("replace into `phome_ecms_shop_index` values('34','5','1','1523607838','1523615572','1524040559','1');");
E_D("replace into `phome_ecms_shop_index` values('35','5','1','1523606683','1523615572','1524043279','1');");
E_D("replace into `phome_ecms_shop_index` values('36','5','1','1523607018','1523615572','1524041332','1');");
E_D("replace into `phome_ecms_shop_index` values('37','5','1','1523607247','1523615572','1524042996','1');");
E_D("replace into `phome_ecms_shop_index` values('42','3','1','1523606683','1523617673','1523965162','1');");
E_D("replace into `phome_ecms_shop_index` values('43','3','1','1523607018','1523617673','1523965085','1');");
E_D("replace into `phome_ecms_shop_index` values('44','3','1','1523607247','1523617673','1523964986','1');");
E_D("replace into `phome_ecms_shop_index` values('45','2','1','1523608744','1523961987','1523963678','1');");
E_D("replace into `phome_ecms_shop_index` values('46','4','1','1523607334','1523969175','1523969306','1');");
E_D("replace into `phome_ecms_shop_index` values('47','5','1','1523608744','1523972785','1524317834','1');");

@include("../../inc/footer.php");
?>