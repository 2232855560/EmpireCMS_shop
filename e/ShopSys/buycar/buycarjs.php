<?php
require("../../class/connect.php");
require("../../class/q_functions.php");
require("../../class/db_sql.php");
require("../../data/dbcache/class.php");
eCheckCloseMods('shop');//关闭模块
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
$buycar=getcvar('mybuycar');
$record="!";
$r=explode($record,$buycar);
$count=count($r)-1;
?>
document.write(" <?=$count?> ");