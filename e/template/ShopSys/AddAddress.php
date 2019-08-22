<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$postword=$enews=='EditAddress'?'修改地址':'增加地址';
$public_diyr['pagetitle']=$postword;
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;<a href='ListAddress.php'>配送地址列表</a>&nbsp;>&nbsp;".$postword;
require(ECMS_PATH.'e/template/incfile/header.php');
?>
    
    <div class="app-content-body ">
      


<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                        <form action="../doaction.php" method="post" name="addform" id="addform">
                            <table class="table table-bordered table-hover table-striped">
                              <tbody>
  <tr class="header">
      <td height="23" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$postword?></strong></td>
    </tr>
<tr>
      <td width="161" align="center" class="td5 tdCenter">地址名称*:</td>
      <td width="510" class="td25 tdCenter"><input name="addressname" class="form-control" type="text" id="title2" value="<?=$r[addressname]?>" size="42">
      </td>
      
</tr>
                               
                               
<tr>
<td align="center">姓名:</td>
<td><input name="truename" type="text" id="addressname" class="form-control" value="<?=$r[truename]?>" size="42"></td>

</tr>

<tr>
<td align="center">邮箱地址:</td>
<td><input name="email" type="text" class="form-control" id="truename" value="<?=$r[email]?>" size="42"></td>

</tr>

<tr>
<td align="center">固定电话:</td>
<td><input name="mycall" type="text" class="form-control" id="email" value="<?=$r[mycall]?>" size="42"></td>

</tr>
<tr>
<td align="center">手机号码:</td>
<td><input name="phone" type="text" class="form-control" id="mycall" value="<?=$r[phone]?>" size="42"></td>

</tr>
<tr>
<td align="center">QQ号码:</td>
<td><input name="oicq" type="text" class="form-control" id="oicq" value="<?=$r[oicq]?>" size="42"></td>

</tr>
<tr>
<td align="center">MSN:</td>
<td><input name="msn" type="text" class="form-control" id="msn" value="<?=$r[msn]?>" size="42"></td>

</tr>
<tr>
<td align="center">收货地址:</td>
<td> <input name="address" type="text" class="form-control" id="phone" value="<?=$r[address]?>" size="42"></td>

</tr>
<tr>
<td align="center">邮编:</td>
<td><input name="zip" type="text" class="form-control" id="address" value="<?=$r[zip]?>" size="42"></td>

</tr>
<tr>
<td align="center">地址周边标志性建筑:</td>
<td><input name="signbuild" type="text" class="form-control" id="zip" value="<?=$r[signbuild]?>" size="42"></td>

</tr>
<tr>
<td align="center">最佳收货时间:</td>
<td><input name="besttime" type="text" class="form-control" id="signbuild" value="<?=$r[besttime]?>" size="42"></td>

</tr>
<tr>
<td align="center">&nbsp;</td>
<td><input type="submit" name="Submit" value="提交" class="btn btn-primary">
        &nbsp;
        <input type="reset" name="Submit2" value="重置" class="btn btn-primary">
        <input name="enews" type="hidden" id="enews" value="<?=$enews?>">      <input name="addressid" type="hidden" id="addressid" value="<?=$addressid?>"></td>

</tr>
</tbody>
</table>

  </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


</div>



  </div>
 
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
