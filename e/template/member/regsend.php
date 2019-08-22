<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='发送帐号激活邮件';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;重发帐号激活邮件";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="RegSendForm" method="POST" class="am-form" action="../doaction.php">
    <tr class="header"> 
      <td colspan="2"><div align="center">重发帐号激活邮件</div></td>
    </tr>
    <tr> 
      <td>用户名(*)</td>
      <td><input name="username" type="text" id="username"></td>
    </tr>
    <tr> 
      <td>密码(*)</td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
    <tr> 
      <td>邮箱(*)</td>
      <td><input name="email" type="text" id="email"></td>
    </tr>
    <tr>
      <td>新接收邮箱</td>
      <td><input name="newemail" type="text" id="newemail">
        <font color="#666666">(要改变接收邮箱可填写)</font></td>
    </tr>
    <tr> 
      <td>验证码</td>
      <td><input name="key" type="text" id="key"> <img src="../../ShowKey/?v=regsend"></td>
    </tr>
    <tr> 
      <td>&nbsp; </td>
      <td> <input type="submit" name="button" value="提交"> 
        <input name="enews" type="hidden" id="enews" value="RegSend"></td>
    </tr>
  </form>
</table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>