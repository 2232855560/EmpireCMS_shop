<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='点卡充值';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;点卡充值";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function GetFen1()
{
var ok;
ok=confirm("确认要充值?");
if(ok)
{
document.GetFen.Submit.disabled=true
return true;
}
else
{return false;}
}
</script>
 

    <div class="app-content-body ">
      
        

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">点卡冲值 </h1>
</div>
<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
       <form name=GetFen method=post action=../doaction.php onsubmit="return GetFen1();">
    <input type=hidden name=enews value=CardGetFen>
                            <table align="center" class="table table-bordered table-hover table-striped">
                                <tbody>


<tr class="color1">
      <td width="280" align="right" class="td5 tdCenter">冲值的用户名:</td>
      <td width="282" class="td25 tdCenter">  <input name="username" type="text" id="username" value="<?=$user[username]?>">
        *</td>
    
  
</tr>
                              
                               
<tr>
<td align="right">重复用户名:</td>
<td> <input name="reusername" type="text" id="reusername" value="<?=$user[username]?>">
        * </td>


</tr>
<tr>
<td align="right">冲值卡号：</td>
<td> <input name="card_no" type="text" id="card_no">
        *</td>


</tr>

<tr>
<td align="right">冲值卡密码</td>
<td><input name="password" type="password" id="password">
        *</td>


</tr>

<tr>
<td colspan="2" align="center">
  <input type="submit" name="Submit" value="开始冲值" class="btn btn-primary"> 
  &nbsp; 
  <input type="reset" name="Submit2" value="重置" class="btn btn-primary"></td>
</tr>
<tr>
<td colspan="2" align="center">说明：带*的为必填项。</td>
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