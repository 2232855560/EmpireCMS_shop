<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

$public_diyr['pagetitle']='".$r[title]." 投票';

$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;投票";

require(ECMS_PATH.'e/template/incfile/header.php');

?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr class="header">
    <td>标题:<?=$r[title]?>&nbsp;(<?=$voteclass?>)</td>
  </tr>
  <tr>
    <td><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
<?php
//取得行
$r_r=explode($r_exp,$r[votetext]);
for($i=0;$i<count($r_r);$i++)
{
	$f_r=explode($f_exp,$r_r[$i]);
	if($r[votenum])
	{
		$width=number_format(($f_r[1]/$r[votenum])*100,2);
	}
	else
	{
		$width=0;
	}
	?>
        <tr> 
          <td><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp; 
            <?=$f_r[0]?>
          </td>
          <td><div align="center"><?=$f_r[1]?>票</div></td>
          <td><img src="../../data/images/showvote.gif" width="<?=$width?>" height="6" border=0>
            <?=$width?>%
          </td>
        </tr>
	<?php
}
?>
      </table></td>
  </tr>
  <tr>
    <td><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
        <tr>
          <td>发布时间：<?=$r[addtime]?>，&nbsp;&nbsp;共&nbsp;<b><?=$r[votenum]?></b>&nbsp;票</td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<br>
<br>
<center><input type=button name=button value=关闭 onclick="self.window.close();"></center>
<?php

require(ECMS_PATH.'e/template/incfile/footer.php');

?>