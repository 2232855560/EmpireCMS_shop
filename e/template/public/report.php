<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='提交错误报告';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href='".$titleurl."'>".$r[title]."</a>&nbsp;>&nbsp;提交错误报告";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<form name="form1" method="post" class="am-form" action="../../enews/index.php">
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <input type="hidden" name="cid" value="<?=$cid?>">
    <tr class=header> 
      <td colspan="2">提交错误报告</td>
    </tr>
    <tr> 
      <td><div align="left">信息标题:</div></td>
      <td><a href='<?=$titleurl?>' target=_blank><?=$r[title]?></a></td>
    </tr>
    <tr> 
      <td><div align="left">您的邮箱:</div></td>
      <td><input name="email" type="text" id="email">
        （方便回复您）</td>
    </tr>
    <tr> 
      <td><div align="left">报告内容(*):</div></td>
      <td><textarea name="errortext" id="name4"></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="提交"> <input type="reset" name="Submit2" value="重置"> 
        <input name="enews" type="hidden" id="enews" value="AddError">
        <input name="id" type="hidden" id="id" value="<?=$id?>">
        <input name="classid" type="hidden" id="classid" value="<?=$classid?>"></td>
    </tr>
  </table>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>