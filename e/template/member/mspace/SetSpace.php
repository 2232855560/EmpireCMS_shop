<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='设置空间';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;设置空间";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
		<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
        <form name="setspace" method="post" class="am-form" action="index.php">
          <tr class="header"> 
            <td colspan="2">设置空间</td>
          </tr>
          <tr> 
            <td>空间名称</td>
            <td> 
              <input name="spacename" type="text" id="spacename" value="<?=$addr[spacename]?>"></td>
          </tr>
          <tr> 
            <td>空间公告</td>
            <td> 
              <textarea name="spacegg" id="spacegg"><?=$addr[spacegg]?></textarea></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td> 
              <input type="submit" name="Submit" value="提交">
              <input type="reset" name="Submit2" value="重置">
              <input name="enews" type="hidden" id="enews" value="DoSetSpace"></td>
          </tr>
		  </form>
        </table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>