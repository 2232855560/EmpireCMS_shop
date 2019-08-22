<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='在线充值';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;在线充值";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="payform" method="post" class="am-form" action="../../payapi/BuyGroupPay.php">
    <tr class="header"> 
      <td>请选择要购买的充值类型：</td>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
	  if($r[buygroupid]&&$level_r[$r[buygroupid]][level]>$level_r[$user[groupid]][level])
	  {
		  continue;
	  }
  ?>
    <tr> 
      <td><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <tr> 
            <td> <input type="radio" name="id" value="<?=$r[id]?>"> 
            </td>
            <td> 
              <?=$r[gmoney]?>
              元 （ 
              <?=$r[gname]?>
              ）</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><font color="#666666">
              <?=nl2br($r[gsay])?>
              </font></td>
          </tr>
        </table></td>
    </tr>
    <?
  }
  ?>
    <tr>
      <td>支付平台：
        <SELECT name="payid" style="WIDTH: 120px">
          <?=$pays?>
        </SELECT></td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="马上充值">
        &nbsp;&nbsp; <input type="button" name="Submit2" value="返回" onclick="self.location.href='../../../';"> 
      </td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>