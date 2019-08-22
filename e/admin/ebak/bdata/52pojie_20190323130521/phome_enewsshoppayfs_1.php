<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsshoppayfs`;");
E_C("CREATE TABLE `phome_enewsshoppayfs` (
  `payid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `payname` varchar(60) NOT NULL DEFAULT '',
  `payurl` varchar(255) NOT NULL DEFAULT '',
  `paysay` text NOT NULL,
  `userpay` tinyint(1) NOT NULL DEFAULT '0',
  `userfen` tinyint(1) NOT NULL DEFAULT '0',
  `isclose` tinyint(1) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
E_D("replace into `phome_enewsshoppayfs` values('1','邮政汇款','','<p>邮政汇款地址:******</p>','0','0','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('2','银行转帐','','<p>银行转帐帐号:******</p>','0','0','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('3','网银支付','/e/payapi/ShopPay.php?paytype=alipay','<p>网银支付</p>','0','0','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('4','预付款支付','','<p>预付款支付</p>','1','0','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('5','货到付款(或上门收款)','','<p>货到付款(或上门收款)说明</p>','0','0','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('6','点数购买','','<p>点数购买</p>','0','1','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('7','支付宝','/e/payapi/ShopPay.php?paytype=alipay','<p>支付宝支付<br/></p>','0','0','0','1');");

@include("../../inc/footer.php");
?>