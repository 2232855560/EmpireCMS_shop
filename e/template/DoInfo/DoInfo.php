<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='管理信息';
$url="<a href=../../>首页</a>&nbsp;>&nbsp;<a href=../member/cp/>会员中心</a>&nbsp;>&nbsp;管理信息";
require(ECMS_PATH.'e/template/incfile/header.php');
?> 
      <p>&nbsp;</p>
      <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
        <tr class="header">
          <td><div align="center">欢迎来到信息管理中心</div></td>
        </tr>
        <tr>
          <td> 
          <div align="center">选择下面您要增加或管理的信息。</div></td>
        </tr>
<tr>
          <td>
          <?php
			//输出可管理的模型
			$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
			while($tmodr=$empire->fetch($tmodsql))
			{
				$fontb="";
				$fontb1="";
				if($tmodr['mid']==$tgetmid)
				{
					$fontb="<b>";
					$fontb1="</b>";
				}
			?>
          <a class="am-btn am-btn-success am-margin-left am-margin-bottom" href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>管理<?=$tmodr[qmname]?><?=$fontb1?></a>
          <a class="am-btn am-btn-success am-margin-left am-margin-bottom" href="<?=$public_r['newsurl']?>e/DoInfo/ChangeClass.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>发布<?=$tmodr[qmname]?><?=$fontb1?></a>
          <?php
			}
			?> 

          </td>
        </tr>
      </table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>