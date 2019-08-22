<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='发送消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;发送消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
       <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <form action="../../doaction.php" method="post" class="am-form" name="sendmsg" id="sendmsg">
            <tr class="header"> 
              <td  colspan="2">发送消息</td>
            </tr>
            <tr> 
              <td  >标题</td>
              <td  ><input name="title" type="text" id="title2" value="<?=ehtmlspecialchars(stripSlashes($title))?>">
                *</td>
            </tr>
            <tr> 
              <td >接收者</td>
              <td ><input name="to_username" type="text" id="to_username2" value="<?=$username?>">
                [<a href="#EmpireCMS" onclick="window.open('../../friend/change/?fm=sendmsg&f=to_username','','width=250,height=360');">选择好友</a>] 
                *</td>
            </tr>
            <tr> 
              <td  valign="top">内容</td>
              <td>
              <textarea name="msgtext" id="textarea"><?=ehtmlspecialchars(stripSlashes($msgtext))?></textarea>
                *</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="发送">
                &nbsp; 
                <input type="reset" name="Submit2" value="重置"> <input name="enews" type="hidden" id="enews" value="AddMsg">              </td>
            </tr>
          </form>
        </table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>