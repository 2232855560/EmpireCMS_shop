<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='点卡充值记录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;点卡充值记录";
require(ECMS_PATH.'e/template/incfile/header.php');
?>

    <div class="app-content-body ">
	    

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">点卡充值记录</h1>
</div>
<div class="wrapper-md">
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                      
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                 
         
                                 <tr>
                    <th class="td5"><div align="center">类型</div></th>
                    <th class="td15"><div align="center">充值卡号</div></th>
                    <th class="td15"><div align="center">充值金额</div></th>
                    <th><div align="center">购买点数</div></th>
                    <th><div align="center">有效期</div></th>
                     <th><div align="center">购买时间</div></th>
    
         
                  </tr>
    
                                </thead>
            
                                <tbody>
         
         <?php
		while($r=$empire->fetch($sql))
		{
			//类型
			if($r['type']==0)
			{
				$type='点卡充值';
			}
			elseif($r['type']==1)
			{
				$type='在线充值';
			}
			elseif($r['type']==2)
			{
				$type='充值点数';
			}
			elseif($r['type']==3)
			{
				$type='充值金额';
			}
			else
			{
				$type='';
			}
		?>       
   <tr>
<td rowspan="1"><div align="center"> 
                 <?=$type?>
                </div></td>
<td rowspan="1"><div align="center"> 
                <?=$r[card_no]?>
              </div></td>
<td><div align="center"> 
                <?=$r[money]?>
              </div></td>
<td><div align="center"> 
                <?=$r[cardfen]?>
              </div></td>
<td><div align="center">&nbsp;[<a href="../doaction.php?enews=DelMsg&mid=<?=$r[mid]?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
<td><div align="center"> 
                <?=$r[buytime]?>
              </div></td>

                    
                    </tr>
       <?php
			}
			?>
                     
  
            
              </tbody>

                    
                    
                    
</table>

          <nav>
  <ul class="pagination">
<li>  <?=$returnpage?>    </li>  </ul>
</nav>   
          
            </div>
                    </div>
                </div>
                <!-- /.row -->
</div>



	</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>