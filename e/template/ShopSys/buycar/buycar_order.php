<?php

if(!defined('InEmpireCMS'))

{

	exit();

}

?>

<?php

$buycar=getcvar('mybuycar');

if(empty($buycar))

{

	printerror('你的购物车没有商品','',1,0,1);

}

$record="!";

$field="|";

$totalmoney=0;	//商品总金额

$buytype=0;	//支付类型：1为金额,0为点数

$totalfen=0;	//商品总积分

$classids='';	//栏目集合

$cdh='';

$buycarr=explode($record,$buycar);

$bcount=count($buycarr);

?>



<thead>

		<tr>

			<th class="product-name">产品</th>

			<th class="product-total">统计</th>

		</tr>

	</thead>

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

	$thistotalfen=$productr[buyfen]*$pnum;

	$totalfen+=$thistotalfen;

	//产品图片

	if(empty($productr[titlepic]))

	{

		$productr[titlepic]="../../data/images/notimg.gif";

	}

	//返回链接

	$titleurl=sys_ReturnBqTitleLink($productr);

	$thistotal=$productr[price]*$pnum;

	$totalmoney+=$thistotal;

	//栏目集合

	$classids.=$cdh.$productr['classid'];

	$cdh=',';

?>

	<tbody>

							<tr class="cart_item">

                        <td colspan="2">

                            

                            <div class="nm-checkout-product-wrap">

                                <div class="nm-checkout-product-thumbnail">

                                    <a href="<?=$productr[titleurl]?>" target="_blank"><img src="<?=$productr[titlepic]?>" sizes="(max-width: 102px) 100vw, 102px" width="102" height="127"> </a>                               </div>



                                <div class="nm-checkout-product-name product-name">

                                    <?=$productr[title]?>&nbsp;                                     <strong class="product-quantity">× <?=$pnum?></strong>                                                                    </div>



                                <div class="nm-checkout-product-total product-total">

                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#165;</span><?=$productr[price]?></span>                                </div>

                            </div>

                            

						</td>

					</tr>

		<tfoot>

					<?php

}

?>

<?php

if(!$buytype)//点数付费

{

?>





		<tr class="cart-subtotal">

			<th>总计</th>

			<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#165;</span><?=$totalfen?></span></td>

		</tr>

<?php

}

else

{

?>

			<tr class="cart-subtotal">

			<th>总计</th>

			<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span><?=$totalmoney?></span></td>

		</tr>

<?php

}

?>					

						</tbody>