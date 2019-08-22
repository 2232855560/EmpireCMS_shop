<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>


    <div class="app-content-body ">
      

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">个人资料管理</h1>
</div>
<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
  <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditInfo>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                           
                   <table class="table table-bordered table-hover table-striped table_striped table_hover">
                         <tbody>

<tr class="color1">
      <td  align="center" class="td5 tdCenter">名称:</td>
      <td class="td25 tdCenter"><?=$user[username]?></td>
    

</tr>
                             
    
    
    

        
                       <?php
  @include($formfile);
  ?>
                
                

      <nav>
  <ul class="pagination">
<li>
  <input type='submit'  class="btn btn-primary" name='Submit' value='修改信息'>
</li>  </ul>
</nav>

                        </div>
                    </div>
                </div>
</form>


                    </div>
                </div>
                <!-- /.row -->


</div>



  <!-- /content -->


<script type="text/javascript">
function checkInfo(){
  document.getElementById("edit").action=zcenter_userurl+"cmd.php?act=MemberPst&token=358b2786be21c3c6cceff4c875314987";


  if(!$("#edtEmail").val()){
    alert("邮箱格式不正确，可能过长或为空");
    return false
  }


  if(!$("#edtName").val()){
    alert("名称不能为空或格式不正确");
    return false
  }

  if($("#edtPassword").val()!==$("#edtPasswordRe").val()){
    alert("请确认密码是否设置正确");
    return false
  }

}
  </script>
  </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>