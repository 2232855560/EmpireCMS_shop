<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='管理留言';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;管理留言";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
        <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
		<form name="gbookform" method="post" action="index.php" class="am-form" onsubmit="return confirm('确认要删除?');">
		<?php
		while($r=$empire->fetch($sql))
		{
			$i++;
			$bgcolor=" class='tableborder'";
			if($i%2==0)
			{
				$bgcolor="";
			}
			$private='';
			if($r['isprivate'])
			{
				$private='*悄悄话* / ';
			}
			$msg='';
			if($r['uid'])
			{
				$msg=" / <a href='../msg/AddMsg/?username=$r[uname]' target='_blank'>消息回复</a>";
				$r['uname']="<b><a href='../../space/?userid=$r[uid]' target='_blank'>$r[uname]</a></b>";
			}
			$gbuname=$private.$r[uname]." / 留言于 ".$r[addtime]." / ip: ".$r[ip].$msg;
		?>
          <tr> 
            <td>
			<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
                <tr> 
                  <td><div align="center"> 
                      <input name="gid[]" type="checkbox" id="gid[]" value="<?=$r[gid]?>">
                    </div></td>
                  <td>
                    <?=$gbuname?>                  </td>
                  <td><div align="center">[<a href="#ecms" onclick="window.open('ReGbook.php?gid=<?=$r[gid]?>','','width=600,height=380,scrollbars=yes');">回复</a>]&nbsp;&nbsp;[<a href="index.php?enews=DelMemberGbook&gid=<?=$r[gid]?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td colspan="2"> <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
                      <tr> 
                        <td width='100%' style='word-break:break-all'> 
                          <?=nl2br($r['gbtext'])?>                        </td>
                      </tr>
                    </table>
					<?
					if($r['retext'])
					{
					?>
                    <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
                      <tr> 
                        <td><img src="../../data/images/regb.gif" width="18" height="18"><strong><font color="#FF0000">回复:</font></strong>
                          <?=nl2br($r['retext'])?>                        </td>
                      </tr>
                    </table>
					<?
					}
					?>				  </td>
                </tr>
              </table>
			<br></td>
          </tr>
		  <?
		  }
		  ?>
          <tr> 
            <td> 
              <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
                <tr>
                  <td><div align="center"><input type='checkbox' name='chkall' value='on' onClick='CheckAll(this.form)'></div></td>
                  <td>
                    <?=$returnpage?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='批量删除'>
                    <input name="enews" type="hidden" id="enews" value="DelMemberGbook_All"> </td>
                </tr>
              </table></td>
          </tr>
		</form>
        </table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>