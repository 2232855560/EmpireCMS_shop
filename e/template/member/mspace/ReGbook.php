<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>登录</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="alternate icon" type="image/png" href="<?=$public_r['newsurl']?>skin/moyu_usercp/favicon.png">
<link rel="stylesheet" href="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.css"/>
</head>

<body>
<form name="regbook" method="post" class="am-form" action="index.php">
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
    <tr class=header> 
      <td colspan="2">回复/修改留言
        <input name="enews" type="hidden" id="enews" value="ReMemberGbook">
        <input name="gid" type="hidden" id="gid" value="<?=$gid?>">
        </td>
    </tr>
    <tr> 
      <td>留言发表者:</td>
      <td> 
        <?=$r['uname']?>
      </td>
    </tr>
    <tr> 
      <td>留言内容:</td>
      <td style='word-break:break-all'> 
        <?=nl2br($r[gbtext])?>
      </td>
    </tr>
    <tr> 
      <td>发布时间:</td>
      <td>
        <?=$r[addtime]?>&nbsp;
        (IP:
        <?=$r[ip]?>)
      </td>
    </tr>
    <tr> 
      <td><strong>回复内容:</strong></td>
      <td><textarea name="retext" id="retext"><?=$r[retext]?></textarea> </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="提交">
        <input type="reset" name="Submit2" value="重置"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">[ <a href="javascript:window.close();">关 
          闭</a> ]</div></td>
    </tr>
  </table>
</form>
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