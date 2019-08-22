<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='消费记录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;消费记录";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
    <div class="app-content-body ">
	    

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">下载消费记录</h1>
</div>
<div class="wrapper-md">
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                      
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                 
         
                                 <tr>
                    <th class="td5"><div align="center">标题</div></th>
                    <th class="td15"><div align="center">扣除点数</div></th>
                    <th class="td15"><div align="center">时间</div></th>
                  
    
         
                  </tr>
    
                                </thead>
            
                                <tbody>
   <?php
	while($r=$empire->fetch($sql))
	{
		if(empty($class_r[$r[classid]][tbname]))
		{continue;}
		$nr=$empire->fetch1("select title,isurl,titleurl,classid from {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." where id='$r[id]' limit 1");
		//标题链接
		$titlelink=sys_ReturnBqTitleLink($nr);
		if(!$nr['classid'])
		{
			$r['title']="此信息已删除";
			$titlelink="#EmpireCMS";
		}
		if($r['online']==0)
		{
			$type='下载';
		}
		elseif($r['online']==1)
		{
			$type='观看';
		}
		elseif($r['online']==2)
		{
			$type='查看';
		}
		elseif($r['online']==3)
		{
			$type='发布';
		}
	?>   
   <tr>
<td rowspan="1">[
              <?=$type?>
              ] &nbsp;<a href='<?=$titlelink?>' target='_blank'> 
              <?=$r[title]?>
              </a> </td>
<td rowspan="1"><div align="center"> 
                <?=$r[cardfen]?>
              </div></td>
<td><div align="center"> 
                <?=date("Y-m-d H:i:s",$r[truetime])?>
              </div></td>


                    
                    </tr>
     
  <?
	}
	?>
            
              </tbody>

                    
                    
                    
</table>

          <nav>
  <ul class="pagination">
<li> <?=$returnpage?></li>  </ul>
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