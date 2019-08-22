<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

//配置查询自定义字段列表,逗号开头，多个用逗号格开，格式“ui.字段名”
$useraddf=',ui.userpic';

//分页SQL
$query='select '.eReturnSelectMemberF('userid,username,email,registertime,groupid','u.').$useraddf.' from '.eReturnMemberTable().' u'.$add." order by u.".egetmf('userid')." desc limit $offset,$line";
$sql=$empire->query($query);

//导航
$public_diyr['pagetitle']='会员列表';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;会员列表";
require(ECMS_PATH.'e/template/incfile/header.php');
?>

<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="memberform" method="get" class="am-form" action="index.php">
    <input type="hidden" name="sear" value="1">
    <input type="hidden" name="groupid" value="<?=$groupid?>">
    <thead>
     <tr> 
      <th><div align="center">ID</div></th>
      <th><div align="center">用户名</div></th>
      <th><div align="center">注册时间</div></th>
      <th><div align="center"></div></th>
      </tr>
    </thead>
    <?php
	while($r=$empire->fetch($sql))
	{
		//注册时间
		$registertime=eReturnMemberRegtime($r['registertime'],"Y-m-d H:i:s");
		//用户组
		$groupname=$level_r[$r['groupid']]['groupname'];
		//用户头像
		$userpic=$r['userpic']?$r['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	?>
    <tbody>
    <tr> 
      <td><?=$r['userid']?></td>
      <td><a href='<?=$public_r[newsurl]?>e/space/?userid=<?=$r['userid']?>' target='_blank'><?=$r['username']?></a></td>
      <td><?=$registertime?></td>
      <td>[<a href="<?=$public_r[newsurl]?>e/member/ShowInfo/?userid=<?=$r['userid']?>" target="_blank">会员资料</a>] [<a href="<?=$public_r[newsurl]?>e/space/?userid=<?=$r['userid']?>" target="_blank">会员空间</a>]</td>
    </tr>
    
    <?
  	}
  	?>
    <tr > 
      <td colspan="3"><?=$returnpage?></td>
      <td> 
          <input name="keyboard" type="text" id="keyboard" size="10">
          <input type="submit" name="Submit" value="搜索">
      </td>
    </tr>
    </tbody>
  </form>
</table>

<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
