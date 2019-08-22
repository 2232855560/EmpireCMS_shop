<?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='配送地址列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;配送地址列表&nbsp;&nbsp;(<a href='AddAddress.php?enews=AddAddress'>增加配送地址</a>)";
require(ECMS_PATH.'e/template/incfile/header.php');
?>

    <div class="app-content-body ">
      

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">配送地址</h1>
</div>
<div class="wrapper-md">
                <div class="row">
                    <div class="col-lg-12">

                          <div class="form-group input-group">[<font color="#FF0000"
><a href="AddAddress.php?enews=AddAddress">增加配送地址</a></font> ]
                            </div>
                     


                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                      
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                 
         
                                 <tr>
                    <th class="td5"><div align="center">地址名称</div></th>
                    <th class="td15"><div align="center">默认</div></th>
                    <th class="td15"><div align="center">操作</div></th>
                  
                    
                  
    
         
                  </tr>
    
                                </thead>
            
                                <tbody>
                                
   <?php
  while($r=$empire->fetch($sql))
  {
    if($r['isdefault'])
    {
      $isdefault='是';
    }
    else
    {
      $isdefault='--';
    }
  ?>
   <tr>
<td rowspan="1"><div align="center"><?=$r['addressname']?></div></td>
<td rowspan="1"><div align="center"><?=$isdefault?></div></td>
<td><div align="center">[<a href="AddAddress.php?enews=EditAddress&addressid=<?=$r['addressid']?>">修改</a>] [<a href="../doaction.php?enews=DefAddress&addressid=<?=$r['addressid']?>" onclick="return confirm('确认要设为默认?');">默认</a>] [<a href="../doaction.php?enews=DelAddress&addressid=<?=$r['addressid']?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>


</tr>
     
 <?php
  }
  ?>    
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