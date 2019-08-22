<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='查看消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;查看消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
        <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <form name="form1" method="post" class="am-form" action="../../doaction.php">
            <tr class="header"> 
              <td colspan="2">
                <?=stripSlashes($r[title])?>              </td>
            </tr>
            <tr> 
              <td>发送者：</td>
              <td><a href="../../ShowInfo/?userid=<?=$r[from_userid]?>"> 
                <?=$r[from_username]?>
                </a></td>
            </tr>
            <tr> 
              <td>发送时间：</td>
              <td>
                <?=$r[msgtime]?>              </td>
            </tr>
            <tr> 
              <td valign="top">内容：</td>
              <td> 
                <?=nl2br(stripSlashes($r[msgtext]))?>              </td>
            </tr>
            <tr> 
              <td valign="top">&nbsp;</td>
              <td>[<a href="#ecms" onclick="javascript:history.go(-1);"><strong>返回</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&re=1&mid=<?=$mid?>"><strong>回复</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&mid=<?=$mid?>"><strong>转发</strong></a>] 
                [<a href="../../doaction.php?enews=DelMsg&mid=<?=$mid?>" onclick="return confirm('确认要删除?');"><strong>删除</strong></a>]</td>
            </tr>
          </form>
        </table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>