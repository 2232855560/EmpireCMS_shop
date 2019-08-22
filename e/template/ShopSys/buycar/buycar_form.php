<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$buycar=getcvar('mybuycar');
$record="!";
$field="|";
$totalmoney=0;	//商品总金额
$buytype=0;	//支付类型：1为金额,0为点数
$totalfen=0;	//商品总积分
$buycarr=explode($record,$buycar);
$bcount=count($buycarr);
?>
<table class="shop_table shop_table_responsive cart" cellspacing="0">
  <form name=form1 method=post action='../doaction.php'>
  <input type=hidden name=enews value=EditBuycar>
    <tr class="cart_item"> 
      <td > <div align=center>图片</div></td>
      <td> <div align=center>名称</div></td>
      <td><div align=center>单价</div></td>
      <td> <div align=center>数量</div></td>
      <td> <div align=center>小计</div></td>
      <td> <div align=center>删除</div></td>
    </tr>
<?php
for($i=0;$i<$bcount-1;$i++)
{
	$pr=explode($field,$buycarr[$i]);
	$productid=$pr[1];
	$fr=explode(",",$pr[1]);
	//ID
	$classid=(int)$fr[0];
	$id=(int)$fr[1];
	if(empty($class_r[$classid][tbname]))
	{
		continue;
	}
	//属性
	$addatt='';
	if($pr[2])
	{
		$addatt=$pr[2];
	}
	//数量
	$pnum=(int)$pr[3];
	if($pnum<1)
	{
		$pnum=1;
	}
	//取得产品信息
	$productr=$empire->fetch1("select title,tprice,price,isurl,titleurl,classid,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
	if(!$productr['id']||$productr['classid']!=$classid)
	{
		continue;
	}
	//是否全部点数
	if(!$productr[buyfen])
	{
		$buytype=1;
	}
	$totalfen+=$productr[buyfen]*$pnum;
	//产品图片
	if(empty($productr[titlepic]))
	{
		$productr[titlepic]="../../data/images/notimg.gif";
	}
	//返回链接
	$titleurl=sys_ReturnBqTitleLink($productr);
	$thistotal=$productr[price]*$pnum;
	$totalmoney+=$thistotal;
?>
<tr>
	<td align="center"><a href="<?=$titleurl?>" target="_blank"><img src="<?=$productr[titlepic]?>" border=0 width=80 height=80></a></td>
	<td align="center"><a href="<?=$titleurl?>" target="_blank"><?=$productr[title]?></a><?=$addatt?' - '.$addatt:''?></td>
	<td align="center">￥<?=$productr[price]?></td>
	<td align="center"><div class="nm-product-quantity-pricing">
                            <div class="product-quantity" data-title="Quantity">
                                <div class="nm-quantity-wrap">
    
    <div class="quantity">
        <div class="nm-qty-minus nm-font nm-font-media-play flip"></div>
        
        <input step="1" min="0" max="" name="num[]" value="<?=$pnum?>" class="input-text qty text" size="4" pattern="[0-9]*" type="number">
        
        <div class="nm-qty-plus nm-font nm-font-media-play"></div>
    </div>
</div>                            </div>
                            
                            <div class="product-subtotal" data-title="Total">
                                                          </div>
                        </div></td>
	
	<td align="center">￥<?=$thistotal?></td>
	<td class="product-remove"><input type="checkbox" name="del[]" value="<?=$productid.'|'.$addatt?>"></td>
	<input type="hidden" name="productid[]" value="<?=$productid?>">
	<input type="hidden" name="addatt[]" value="<?=$addatt?>">
</tr>
<?php
}
?>
<?php
if(!$buytype)//点数付费
{
?>
<tr height="25"> 
    <td colspan="5"><div align="right">合计点数:<strong><?=$totalfen?></strong></div></td>
    <td>&nbsp;</td>
</tr>
<?php
}
else
{
?>
<tr height="27"> 
    <td colspan="5"><div align="right">合计:<strong>￥<?=$totalmoney?></strong></div></td>
    <td>&nbsp;</td>
</tr>
<?php
}
?>
<tr> 
    <td colspan="6" height="25"><div align="right">
		
		<input class="button border" name="update_cart" value="清空" type="button"  onclick="javascript:location='../doaction.php?enews=ClearBuycar'">
<!--		  <input name="imageField" type="image" src="../../data/images/shop/editbuycar.gif" width=135 height=23 border=0>-->
		<input class="button border"  name="imageField" value="更新" type="submit">
<!--
		<a href="javascript:window.close();"><img src="../../data/images/shop/buynext.gif" class="button border"></a>
		&nbsp;&nbsp;
-->
	   <input class="button border"  value="继续购物" type="button"  onclick="javascript:location='/'">
<!--		<a href="../order/"><img src="../../data/images/shop/buycarnext.gif" class="button border"></a>-->
		<input class="button border"  value="去结算" type="button"  onclick="javascript:location='../order/'">
	</div></td>
</tr>
</form>
</table>
