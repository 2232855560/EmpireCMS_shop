<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改安全信息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>



    <div class="app-content-body ">
      
                        <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditSafeInfo>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">修改安全信息</h1>
</div>
<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>

<tr class="color1">
      <td class="td5 tdCenter" align="center">用户名:</td>
      <td class="td25 tdCenter"><input  class="form-control"  id="edtName" size="40" maxlength="20" type="text" value="  <?=$user[username]?>" readonly /></td>
    
  
</tr>
                              
                               
<tr>
<td align="center">原密码:</td>
<td><input name='oldpassword' class="form-control" type='password' id='oldpassword' size="38" maxlength='20'></td>


</tr>
<tr>
<td align="center">新密码:</td>
<td> <input name='password'  class="form-control" type='password' id='password' size="38" maxlength='20'> </td>


</tr>
<tr>
<td align="center">确认新密码:</td>
<td> <input class="form-control" name='repassword' type='password' id='repassword' size="38" maxlength='20'></td>


</tr>
<tr>
<td align="center">邮箱:</td>
<td><input name='email' type='text'  class="form-control"  id='email' value='<?=$user[email]?>' size="38" maxlength='50'></td>

</tr>
</tbody>
</table>
<nav>
  <ul class="pagination">
<li><div class="form-group">
                            <input type="submit" class="btn btn-primary" name="Submit" value="修改信息">
       
                            </div></li>  </ul>
</nav>

                        </div>
                    </div>
                </div>
                <!-- /.row -->


</div>



  </div>
 </form><?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>