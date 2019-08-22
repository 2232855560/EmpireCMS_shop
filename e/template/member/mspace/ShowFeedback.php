<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>查看信息</title>
<link href="../../data/images/qcss.css" rel="stylesheet" type="text/css">
</head>

<body>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr class=header> 
    <td colspan="2">标题：<?=$r[title]?></td>
  </tr>
  <tr> 
    <td>提交者:</td>
    <td> 
      <?=$r[uname]?>
    </td>
  </tr>
  <tr> 
    <td>发布时间:</td>
    <td> 
      <?=$r[addtime]?>
    </td>
  </tr>
  <tr> 
    <td>IP地址:</td>
    <td> 
      <?=$r[ip]?>
    </td>
  </tr>
  <tr> 
    <td>姓名:</td>
    <td><?=$r[name]?></td>
  </tr>
  <tr> 
    <td>公司名称:</td>
    <td><?=$r[company]?></td>
  </tr>
  <tr> 
    <td>联系邮箱:</td>
    <td><?=$r[email]?></td>
  </tr>
  <tr> 
    <td>联系电话:</td>
    <td><?=$r[phone]?></td>
  </tr>
  <tr> 
    <td>传真:</td>
    <td><?=$r[fax]?></td>
  </tr>
  <tr> 
    <td>联系地址:</td>
    <td><?=$r[address]?></td>
  </tr>
  <tr> 
    <td>邮编:</td>
    <td><?=$r[zip]?></td>
  </tr>
  <tr> 
    <td>信息标题:</td>
    <td><?=$r[title]?></td>
  </tr>
  <tr> 
    <td valign="top">信息内容:</td>
    <td><?=nl2br($r[ftext])?></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center">[ <a href="javascript:window.close();">关 
        闭</a> ]</div></td>
  </tr>
</table>
</body>
</html>