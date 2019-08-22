<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='取回密码';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;取回密码";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br>
<div class="app-content-body ">
<table class="table table-bordered table-hover table-striped table_striped table_hover" width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="GetPassForm" method="POST" action="../doaction.php">
    <tr class="header"> 
      <td height="25" colspan="2"><div align="center">取回密码</div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="50%" height="25" align="right">用户名</td>
      <td width="50%"><input name="username" type="text" id="username" size="38"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" align="right">邮箱</td>
      <td><input name="email" type="text" id="email" size="38"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" align="right">验证码</td>
      <td><input name="key" type="text" id="key" size="6"> <img src="../../ShowKey/?v=getpassword" name="getpasswordKeyImg" id="getpasswordKeyImg" onclick="getpasswordKeyImg.src='../../ShowKey/?v=getpassword&t='+Math.random()" title="看不清楚,点击刷新"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp; </td>
      <td> <input type="submit" name="button" value="提交" class="btn btn-primary"> <input name="enews" type="hidden" id="enews" value="SendPassword"></td>
    </tr>
  </form>
</table></div>

<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>