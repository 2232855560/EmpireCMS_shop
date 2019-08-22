  <?php
if(!defined('InEmpireCMS'))
{
  exit();
}
?>
<?php
$public_diyr['pagetitle']='在线支付';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href=../member/cp/>会员中心</a>&nbsp;>&nbsp;在线支付";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function ChangeShowBuyFen(amount){
  var fen;
  fen=Math.floor(amount)*<?=$pr[paymoneytofen]?>;
  document.getElementById("showbuyfen").innerHTML=fen+" 点";
}
</script>  

    <div class="app-content-body ">
      
        

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">在线支付 </h1>
</div>
<div class="wrapper-md">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
        <form name="paytofenform" method="post" action="pay.php">
                            <table align="center" class="table table-bordered table-hover table-striped">
                                <tbody>

<tr class="color1">
      <td colspan="2" align="center" class="td5 tdCenter"><strong><font color="red">购买点数: </font></strong><input type="hidden" name="phome" value="PayToFen"></td>
      </tr>
<tr class="color1">
      <td width="280" align="right" class="td5 tdCenter">购买金额:</td>
      <td width="282" class="td25 tdCenter">   <input name="money" type="text" value="" size="8" onchange="ChangeShowBuyFen(document.paytofenform.money.value);">
        元 <font color="#333333">( 1元 = 
        <?=$pr[paymoneytofen]?>
        点数)</font> </td>
    
  
</tr>
                              
                               
<tr>
<td align="right">购买点数:</td>
<td id="showbuyfen">   0 点 </td>


</tr>
<tr>
<td align="right">支付平台：</td>
<td> <SELECT name="payid" style="WIDTH: 120px">
          <?=$pays?>
        </SELECT></td>


</tr>

<tr>
<td align="center">&nbsp;</td>
<td><input type="submit" name="Submit" value="确定购买" class="btn btn-primary"></td>


</tr>



</tbody>
</table>
</form>
<hr align="center" noshade>
<hr align="center" noshade>
<form name="paytomoneyform" method="post" action="pay.php">

<table align="center" class="table table-bordered table-hover table-striped">
                                <tbody>

<tr class="color1">
      <td colspan="2" align="center" class="td5 tdCenter"><strong><font color="red">存预付款:</font></strong>  <input name="phome" type="hidden" id="phome" value="PayToMoney"></td>
      </tr>
<tr class="color1">
      <td width="281" align="right" class="td5 tdCenter">金额:</td>
      <td width="281" class="td25 tdCenter">  <input name="money" type="text" value="" size="8">
        元  </td>
    
  
</tr>
                              
                               
<tr>
<td align="right">支付平台:</td>
<td> <SELECT name="payid" style="WIDTH: 120px">
          <?=$pays?>
        </SELECT>    </td>


</tr>
<tr>
<td align="center">&nbsp;</td>
<td> <input type="submit" name="Submit3" value="确定支付" class="btn btn-primary"></td>


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