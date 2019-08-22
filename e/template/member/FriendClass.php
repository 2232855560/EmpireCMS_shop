<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='好友分类';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../friend/>好友列表</a>&nbsp;>&nbsp;管理分类";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function DelFriendClass(cid)
{
var ok;
ok=confirm("确认要删除?");
if(ok)
{
self.location.href='../../doaction.php?enews=DelFriendClass&doing=1&cid='+cid;
}
}
</script>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr> 
    <td> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" class="am-form" action="../../doaction.php">
            <tr class="header"> 
              <td>增加好友分类</td>
            </tr>
            <tr> 
              <td>分类名称: 
                <input name="cname" type="text" id="cname"> <input type="submit" name="Submit" value="增加"> 
                <input name="enews" type="hidden" id="enews" value="AddFriendClass">
                <input name="doing" type="hidden" id="doing" value="1"></td>
            </tr>
          </form>
        </table>
        <br>
        <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <tr class="header"> 
            <td> <div align="center">ID</div></td>
            <td><div align="center">分类名称</div></td>
            <td><div align="center">操作</div></td>
          </tr>
        <?php
		while($r=$empire->fetch($sql))
		{
		?>
          <form name=form method=post class=am-form action=../../doaction.php>
            <tr> 
              <td> <div align="center"> 
                  <?=$r[cid]?>
                </div></td>
              <td><div align="center">
                  <input name="doing" type="hidden" id="doing" value="1">
                  <input name="enews" type="hidden" id="enews" value="EditFriendClass">
                  <input name="cid" type="hidden" value="<?=$r[cid]?>">
                  <input name="cname" type="text" id="cname" value="<?=$r[cname]?>">
                </div></td>
              <td><div align="center"> 
                  <input type="submit" name="Submit2" value="修改">
                  &nbsp; 
                  <input type="button" name="Submit3" value="删除" onclick="javascript:DelFriendClass(<?=$r[cid]?>);">
                </div></td>
            </tr>
          </form>
		<?php
		}
		?>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>