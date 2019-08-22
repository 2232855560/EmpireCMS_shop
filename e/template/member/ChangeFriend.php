<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>选择好友</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="alternate icon" type="image/png" href="<?=$public_r['newsurl']?>skin/moyu_usercp/favicon.png">
<link rel="stylesheet" href="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.css"/>
</head>

<body>
 <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="changeuser" method="GET" class="am-form" action="index.php?<?=$addvar?>">
    <tr class="header"> 
      <td>选择用户</td>
    </tr>
    <tr> 
      <td>分类：
        <select name="cid" id="select" onchange=window.location='index.php?<?=$addvar?>&cid='+this.options[this.selectedIndex].value>
          <option value="0">显示全部</option>
          <?=$select?>
        </select></td>
    </tr>
    <tr> 
      <td>
<select name="fname" size="16" id="fname" style="width:200">
<?=$hyselect?>
        </select></td>
    </tr>
    <tr> 
      <td>
<input type="button" name="Submit" value="确定" onclick="ChangeHy();"></td>
    </tr>
	</form>
  </table>
      <!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/rem.min.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/respond.min.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.legacy.js"></script>
<![endif]--> 

<!--[if (gte IE 9)|!(IE)]><!--> 
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/jquery.min.js"></script> 
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.js"></script> 
<!--<![endif]-->
</body>
</html>