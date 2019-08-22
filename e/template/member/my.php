    <?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='帐号状态';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;帐号状态";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
    
    <div class="app-content-body ">
      

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">帐号状态</h1>
</div>
<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                              <tbody>

<tr>
      <td width="44" align="center" class="td5 tdCenter">用户ID:</td>
      <td width="200" class="td25 tdCenter"> <?=$user[userid]?></td>
      
</tr>
                               
                               
<tr>
<td align="center">用户名:</td>
<td> <?=$user[username]?>
      &nbsp;&nbsp;(<a href="../../space/?userid=<?=$user[userid]?>" target="_blank">我的会员空间</a>) </td>

</tr>

<tr>
<td align="center">注册时间:</td>
<td><?=$registertime?></td>

</tr>

<tr>
<td align="center">会员等级:</td>
<td>  <?=$level_r[$r[groupid]][groupname]?></td>

</tr>
<tr>
<td align="center">剩余有效期:</td>
<td> <?=$userdate?>
      天 </td>

</tr>
<tr>
<td align="center">剩余点数:</td>
<td>  <?=$r[userfen]?>
      点</td>

</tr>
<tr>
<td align="center">帐户余额:</td>
<td> <?=$r[money]?>
      元 </td>

</tr>
<tr>
<td align="center">新短消息:</td>
<td>  <?=$havemsg?></td>

</tr>
</tbody>
</table>


                        </div>
                    </div>
                </div>
                <!-- /.row -->


</div>



  </div>
 
 <?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
 