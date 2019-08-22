<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//显示配送方式
function ShowPs(){
	global $empire,$dbtbpre;
	$sql=$empire->query("select pid,pname,price,psay,isdefault from {$dbtbpre}enewsshopps where isclose=0 order by pid");
	$str='';
	while($r=$empire->fetch($sql))
	{
		$checked=$r[isdefault]==1?' checked':'';
		$str.="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
  <tr> 
    <td width='69%' height=23> 
      <input type=radio name=psid value='".$r[pid]."'".$checked."><strong>".$r[pname]."</strong>
    </td>
    <td width='31%'><strong>费用:￥".$r[price]."</strong></td>
  </tr>
  <tr> 
    <td colspan=2><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[psay]."</td></tr></table></td>
  </tr>
</table>";
	}
	return $str;
}

//显示支付方式
function ShowPayfs($pr,$user){
	global $empire,$dbtbpre;
	$str='';
	$sql=$empire->query("select payid,payname,payurl,paysay,userpay,userfen,isdefault from {$dbtbpre}enewsshoppayfs where isclose=0 order by payid");
	while($r=$empire->fetch($sql))
	{
		$checked=$r[isdefault]==1?' checked':'';
		$dis="";
		$words="";
		//扣点数
		if($r[userfen])
		{
			if($pr['buytype'])
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(您选择的商品至少有一个不支持点数购买)</font>";
			}
			else
			{
				if(getcvar('mluserid'))
				{
					if($user[userfen]<$pr['totalfen'])
					{
						$dis=" disabled";
						$words="&nbsp;<font color='#666666'>(您的帐号点数不足,不能使用此支付方式)</font>";
					}
				}
				else
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(您未登录,不能使用此支付方式)</font>";
				}
			}
		}
		//余额扣除
		elseif($r[userpay])
		{
			if(getcvar('mluserid'))
			{
				if($user[money]<$pr['totalmoney'])
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(您的帐号余额不足,不能使用此支付方式)</font>";
				}
			}
			else
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(您未登录,不能使用此支付方式)</font>";
			}
		}
		//网上支付
		elseif($r[payurl])
		{
			$words="";
		}
		else
		{}
		$str.="<tr><td><b><input type=radio name=payfsid value='".$r[payid]."'".$checked."".$dis.">".$r[payname]."</b>".$words."</td></tr><tr><td><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[paysay]."</td></tr></table></td></tr>";
	}
	if($str)
	{
		$str="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>".$str."</table>";
	}
	return $str;
}

//提交地址
if($shoppr['buystep']==0)
{
	$formaction='../SubmitOrder/index.php';
	$formconfirm='';
	$formsubmit='<input type="submit" name="Submit" value=" 下一步 ">';
	$enewshidden='';
	$ddno='';
}
else
{
	$formaction='../doaction.php';
	$formconfirm=' onsubmit="return confirm(\'确认提交?\');"';
	$formsubmit='<input type="hidden" name="Submit" value=" 提交订单 ">';
	$enewshidden='<input type=hidden name=enews value=AddDd>';
	$ddno=ShopSys_ReturnDdNo();//订单ID
}
?>
<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN>
<html lang="en-US" class=" footer-sticky-1">
	
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
                <!-- Title -->
        <title>Cart &ndash; Savoy</title>
        
		<link href="http://savoy.nordicmade.com/wp-content/uploads/2015/10/favicon.png" rel="shortcut icon">
<link rel='stylesheet' id='nm_js_composer_front-css'  href='/css/nm-js_composer.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-portfolio-css'  href='/css/nm-portfolio.css' type='text/css' media='all' />
<link rel='stylesheet' id='normalize-css'  href='/css/normalize.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-slider-css'  href='/css/slick.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-slider-theme-css'  href='/css/slick-theme.css' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='/css/magnific-popup.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-grid-css'  href='/css/grid.css' type='text/css' media='all' />
<link rel='stylesheet' id='selectod-css'  href='/css/selectod.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-shop-css'  href='/css/shop.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-icons-css'  href='/css/theme-icons.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-core-css'  href='/css/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='nm-elements-css'  href='/css/elements.css' type='text/css' media='all' />
<script type='text/javascript' src='/scripts/jquery.js'></script>
<script type='text/javascript' src='/scripts/jquery-migrate.min.js'></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-6317200-6', 'auto');
ga('send', 'pageview');
</script>
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="/css/vc_lte_ie9.min.css" media="screen"><![endif]--><style type="text/css" class="nm-custom-styles">@font-face{font-family:'MaisonNeue';src:url(http://savoy.nordicmade.com/wp-content/fonts/MaisonNeueWEB-Book.woff2) format('woff2'),url(http://savoy.nordicmade.com/wp-content/fonts/MaisonNeueWEB-Book.woff) format('woff');font-weight:300;font-style:normal;font-stretch:normal;}body{font-family:'MaisonNeue',sans-serif;}.widget ul li a,body{color:#777777;}h1, h2, h3, h4, h5, h6{color:#282828;}a,a.dark:hover,a.gray:hover,a.invert-color:hover,.nm-highlight-text,.nm-highlight-text h1,.nm-highlight-text h2,.nm-highlight-text h3,.nm-highlight-text h4,.nm-highlight-text h5,.nm-highlight-text h6,.nm-highlight-text p,.nm-menu-cart a .count,.nm-menu li.nm-menu-offscreen .nm-menu-cart-count,#nm-mobile-menu .nm-mobile-menu-cart a .count,.page-numbers li span.current,.nm-blog .sticky .nm-post-thumbnail:before,.nm-blog .category-sticky .nm-post-thumbnail:before,.nm-blog-categories ul li.current-cat a,.commentlist .comment .comment-text .meta time,.widget ul li.active,.widget ul li a:hover,.widget ul li a:focus,.widget ul li a.active,#wp-calendar tbody td a,.nm-banner-text .nm-banner-link:hover,.nm-banner.text-color-light .nm-banner-text .nm-banner-link:hover,.nm-portfolio-filters li.current a,.add_to_cart_inline ins,.woocommerce-breadcrumb a:hover,.products .price ins,.products .price ins .amount,.no-touch .nm-shop-loop-actions > a:hover,.nm-shop-menu ul li a:hover,.nm-shop-menu ul li.current-cat a,.nm-shop-menu ul li.active a,.nm-shop-heading span,.nm-single-product-menu a:hover,#nm-product-images-slider .nm-product-image-icon:hover,.product-summary .price .amount,.product-summary .price ins,.nm-product-wishlist-button-wrap a.added:active,.nm-product-wishlist-button-wrap a.added:focus,.nm-product-wishlist-button-wrap a.added:hover,.nm-product-wishlist-button-wrap a.added,.woocommerce-tabs .tabs li a span,#review_form .comment-form-rating .stars:hover a,#review_form .comment-form-rating .stars.has-active a,.product_meta a:hover,.star-rating span:before,.nm-order-view .commentlist li .comment-text .meta,.nm_widget_price_filter ul li.current,.widget_product_categories ul li.current-cat > a,.widget_layered_nav ul li.chosen a,.widget_layered_nav_filters ul li.chosen a,.product_list_widget li ins .amount,.woocommerce.widget_rating_filter .wc-layered-nav-rating.chosen > a,.nm-wishlist-button.added:active,.nm-wishlist-button.added:focus,.nm-wishlist-button.added:hover,.nm-wishlist-button.added,#nm-wishlist-empty .note i,.slick-prev:not(.slick-disabled):hover, .slick-next:not(.slick-disabled):hover,.pswp__button:hover{color:#dc9814;}.nm-blog-categories ul li.current-cat a,.nm-portfolio-filters li.current a,.widget_layered_nav ul li.chosen a,.widget_layered_nav_filters ul li.chosen a,.slick-dots li.slick-active button{border-color:#dc9814;}.blockUI.blockOverlay:after,.nm-loader:after,.nm-image-overlay:before,.nm-image-overlay:after,.gallery-icon:before,.gallery-icon:after,.widget_tag_cloud a:hover,.widget_product_tag_cloud a:hover,.nm-page-not-found-icon:before,.nm-page-not-found-icon:after,.demo_store,.nm-order-info mark,.nm-order-info .order-number,.nm-order-info .order-date,.nm-order-info .order-status{background:#dc9814;}@media all and (max-width:400px){.slick-dots li.slick-active button{background:#dc9814;}}.button,input[type=submit],.widget_tag_cloud a, .widget_product_tag_cloud a,.add_to_cart_inline .add_to_cart_button,#nm-shop-sidebar-popup-button{color:#ffffff;background-color:#282828;}.button:hover,input[type=submit]:hover{color:#ffffff;}.product-summary .quantity .nm-qty-minus,.product-summary .quantity .nm-qty-plus{color:#282828;}.nm-page-wrap{background-color:#ffffff;}.nm-top-bar{background:#282828;}.nm-top-bar .nm-top-bar-text,.nm-top-bar .nm-top-bar-text a,.nm-top-bar .nm-menu > li > a,.nm-top-bar-social li i{color:#eeeeee;}.nm-header-placeholder{height:79px;}.nm-header{line-height:50px;padding-top:14px;padding-bottom:15px;background:#ffffff;}.home .nm-header{background:#ffffff;}.header-search-open .nm-header,.mobile-menu-open .nm-header{background:#ffffff !important;}.header-on-scroll .nm-header,.home.header-transparency.header-on-scroll .nm-header{background:#ffffff;}.header-on-scroll .nm-header:not(.static-on-scroll){padding-top:10px;padding-bottom:10px;}.nm-header.stacked .nm-header-logo,.nm-header.stacked-centered .nm-header-logo{padding-bottom:0px;}.nm-header-logo img{height:16px;}@media all and (max-width:880px){.nm-header-placeholder{height:70px;}.nm-header{line-height:50px;padding-top:10px;padding-bottom:10px;}.nm-header.stacked .nm-header-logo,.nm-header.stacked-centered .nm-header-logo{padding-bottom:0px;}.nm-header-logo img{height:16px;}}@media all and (max-width:400px){.nm-header-placeholder{height:70px;}.nm-header{line-height:50px;}.nm-header-logo img{height:16px;}}.nm-menu li a{color:#707070;}.nm-menu li a:hover{color:#282828;}.nm-menu ul.sub-menu{background:#282828;}.nm-menu ul.sub-menu li a{color:#a0a0a0;}.nm-menu ul.sub-menu li a:hover,.nm-menu ul.sub-menu li a .label,.nm-menu .megamenu > ul > li > a{color:#eeeeee;}.nm-menu-icon span{background:#707070;}#nm-mobile-menu{ background:#ffffff;}#nm-mobile-menu li{border-bottom-color:#eeeeee;}#nm-mobile-menu a,#nm-mobile-menu ul li .nm-menu-toggle,#nm-mobile-menu .nm-mobile-menu-top .nm-mobile-menu-item-search input,#nm-mobile-menu .nm-mobile-menu-top .nm-mobile-menu-item-search span{color:#555555;}.no-touch #nm-mobile-menu a:hover,#nm-mobile-menu ul li.active > a,#nm-mobile-menu ul > li.active > .nm-menu-toggle:before,#nm-mobile-menu a .label{color:#282828;}#nm-mobile-menu ul ul{border-top-color:#eeeeee;}#nm-shop-search.nm-header-search{top:15px;}.nm-footer-widgets{background-color:#ffffff;}.nm-footer-widgets,.nm-footer-widgets .widget ul li a,.nm-footer-widgets a{color:#777777;}.widget .nm-widget-title{color:#282828;}.nm-footer-widgets .widget ul li a:hover,.nm-footer-widgets a:hover{color:#dc9814;}.nm-footer-widgets .widget_tag_cloud a:hover,.nm-footer-widgets .widget_product_tag_cloud a:hover{background:#dc9814;}.nm-footer-bar{color:#aaaaaa;}.nm-footer-bar-inner{background-color:#282828;}.nm-footer-bar a{color:#aaaaaa;}.nm-footer-bar a:hover,.nm-footer-bar-social li i{color:#eeeeee;}.nm-footer-bar .menu > li{border-bottom-color:#3a3a3a;}#nm-shop-taxonomy-header.has-image{height:370px;}.nm-shop-taxonomy-text-col{max-width:none;}.nm-shop-taxonomy-text h1{color:#282828;}.nm-shop-taxonomy-text .term-description{color:#777777;}@media all and (max-width:991px){#nm-shop-taxonomy-header.has-image{height:370px;}}@media all and (max-width:768px){#nm-shop-taxonomy-header.has-image{height:210px;}}.nm-shop-widget-scroll{height:145px;}.onsale{color:#373737;background:#ffffff;}#nm-shop-products-overlay{background:#ffffff;}.nm-single-product-bg{background:#eeeeee;}@media (max-width:1199px){.nm-product-images-col{max-width:530px;}}.nm-featured-video-icon{color:#282828;background:#ffffff;}.nm-validation-inline-notices .form-row.woocommerce-invalid-required-field:after{content:"Required field.";}.widget-panel-dark.widget-panel-open .nm-page-overlay {background:rgba(255,255,255,0.73);}.nm-header.menu-centered .nm-menu-account { display:none; }.nm-banner-text .nm-banner-title {line-height:1.21 !important;}.widget-panel-dark #nm-widget-panel .buttons .button.checkout {background-color:#111;}.single_variation {display:none !important;}@media (max-width: 767px) {#tab-description .vc_custom_1462135333419 { padding-bottom:0 !important; }#tab-description .vc_custom_1462135341599 { padding-bottom:10px !important; }}@media all and (min-width: 1299px) {.nm-blog-classic .nm-post-thumbnail a,.nm-blog-list .nm-post-thumbnail a {position:relative;height:390px;overflow:hidden;}.nm-blog-classic .nm-blog-sidebar-none .nm-post-thumbnail a {height:550px;}.nm-blog-classic .nm-post-thumbnail img,.nm-blog-list .nm-post-thumbnail img {position:absolute;bottom:-41%;}}.nm-checkout-login-coupon {display:none;}</style>
<noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>    
	</head>
    
	<body class="page-template-default page page-id-8  nm-page-load-transition-0 nm-preload header-fixed header-border-1 widget-panel-dark header-mobile-alt woocommerce-cart woocommerce-page wpb-js-composer js-comp-ver-5.0.1 vc_responsive">
        
                
        <!-- page overflow wrapper -->
        <div class="nm-page-overflow">
        
            <!-- page wrapper -->
            <div class="nm-page-wrap">
            
                                            
                <div class="nm-page-wrap-inner">
                
                    <div id="nm-header-placeholder" class="nm-header-placeholder"></div>
                            
                    	
    <!-- header -->
 <?php
require(ECMS_PATH.'e/template/incfile/headercp.php');
?>
    <!-- /header -->
                    	
<div class="nm-row">
    <div class="col-xs-12">
        
        <div id="post-8" class="post-8 page type-page status-publish hentry">
            <div class="woocommerce">
<!--购物车调用开始-->

		<form action="<?=$formaction?>" method="post" name="myorder" id="myorder"<?=$formconfirm?>>
<!--			<input type="hidden" name="ecmsfrom" value="/e/member/cp">-->
         <div class="col2-set nm-validation-inline-notices" id="customer_details">
            <div class="col-1">
				<div class="woocommerce-billing-fields">
    
		<h3>账单明细</h3>
	
		<p class="form-row form-row form-row-first validate-required" id="billing_first_name_field"><label for="billing_first_name" class="">真实姓名 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="truename" id="truename" placeholder="" autocomplete="given-name" value="<?=$useraddr[truename]?>" type="text"><?=stristr($shoppr['ddmust'],',truename,')?'*':''?></p>
	
		<p class="form-row form-row form-row-last validate-required" id="billing_last_name_field"><label for="billing_last_name" class="">固定电话 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="mycall" id="mycall" placeholder="" autocomplete="family-name" value="<?=$useraddr[mycall]?>" type="text"><?=stristr($shoppr['ddmust'],',mycall,')?'*':''?></p><div class="clear"></div>
		
		<p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field"><label for="billing_email" class="">邮箱账号 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="email" id="email" placeholder="" autocomplete="email" value="<?=$email?>" type="email"><?=stristr($shoppr['ddmust'],',email,')?'*':''?></p>
	
		<p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field"><label for="billing_phone" class="">手机号码 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="phone" id="phone" placeholder="" autocomplete="tel" value="<?=$useraddr[phone]?>" type="tel"><?=stristr($shoppr['ddmust'],',phone,')?'*':''?></p><div class="clear"></div>
					
		<p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field"><label for="billing_phone" class="">邮政编码 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="zip" id="zip" placeholder="" autocomplete="tel" value="<?=$useraddr[zip]?>" type="tel"><?=stristr($shoppr['ddmust'],',zip,')?'*':''?></p><div class="clear"></div>
		
	    <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field"><label for="billing_address_1" class="">收货地址 <abbr class="required" title="required">*</abbr></label><input class="input-text " name="address" id="address" placeholder="Street address" autocomplete="address-line1" value="<?=$useraddr[address]?>" type="text"><?=stristr($shoppr['ddmust'],',address,')?'*':''?></p>
					
<!--		<p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field"><label for="billing_address_1" class="">备注 <abbr class="required" title="required">*</abbr></label><textarea name="bz" cols="65" rows="6" id="bz"></textarea><?=stristr($shoppr['ddmust'],',bz,')?'*':''?></p>-->
	
	
	
	</div>
			</div>
            
		</div>
        
		<?php
  if($ddno)
  {
  ?>
    <h3>
      <td height="27" bgcolor="#FFFFFF">订单号: 
        <?=$ddno?>
        <input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>">
        </td>
   </h3> 
  <?php
  }
  ?>
	    
    <h3 id="order_review_heading">您选择的产品</h3>
        
	            
	<div id="order_review" class="woocommerce-checkout-review-order">
		<table class="shop_table woocommerce-checkout-review-order-table">
	
	<?php
	  include('buycar/buycar_order.php');
	  $pr=array();
	  $pr['totalmoney']=$totalmoney;
	  $pr['buytype']=$buytype;
	  $pr['totalfen']=$totalfen;
	  ?>
			<tr class="shipping">
	<td colspan="2" data-title="Shipping">
		<p class="nm-shipping-th-title">配送方式</p>
        <?php
	if($shoppr['shoppsmust'])
	{
	$showps=ShowPs();
	if($showps)
	{
	?>
        			<ul id="shipping_method">
									 <?=$showps?>
							</ul>
		
		
			</td>
</tr>
	</tfoot>
</table>
    <?php
	}
	}
	?>
	<?php
	if($shoppr['shoppayfsmust'])
	{
	$showpayfs=ShowPayfs($pr,$user);
	if($showpayfs)
	{
	?>
<div id="payment" class="woocommerce-checkout-payment">
    		<ul class="wc_payment_methods payment_methods methods">
				<li><?=$showpayfs?></li>
		</ul>
	
	<?php
	}
	}
	?>	
	<tr> 
      <td height="25">
<div align="center"> 
		<?php
		if($shoppr['buystep']!=2)
		{
		?>
          <input type="button" name="Submit3" value=" 上一步 " onclick="history.go(-1)">
          &nbsp;&nbsp; &nbsp;&nbsp; 
		<?php
		}
		?>
		<?=$formsubmit?>
		<?=$enewshidden?>
          <input type="hidden" name="alltotal" id="alltotal" value="<?=$pr['totalmoney']?>">
          <input name="alltotalfen" type="hidden" id="alltotalfen" value="<?=$pr['totalfen']?>">
        </div></td>
    </tr>
		<div class="form-row place-order">
<!--
		<noscript>
			Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
		</noscript>
-->
			
		<span style="margin-left: 30%;"><input class="button alt" name="alltotal" id="alltotal" value="立即下单" data-value="<?=$pr['totalmoney']?>" type="submit"></span>
		
			</div>
	
</div>

	</div>
    
	
</form>    
<!--购物车调用结束-->
</div>
        </div>
            
            </div>
</div>


                

                </div>
            </div>
            <!-- /page wrappers -->
            
            <div id="nm-page-overlay" class="nm-page-overlay"></div>
            <div id="nm-widget-panel-overlay" class="nm-page-overlay"></div>
            
            <!-- footer -->
            <footer id="nm-footer" class="nm-footer">
                                
                <div class="nm-footer-bar">
                    <div class="nm-footer-bar-inner">
                        <div class="nm-row">
                            <div class="nm-footer-bar-left col-md-8 col-xs-12">
                                                                
                                <ul id="nm-footer-bar-menu" class="menu">
                                    <li id="menu-item-386" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-386"><a href="http://savoy.nordicmade.com/about/">About Us</a></li>
<li id="menu-item-388" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-388"><a href="http://savoy.nordicmade.com/blog/">Blog</a></li>
<li id="menu-item-384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384"><a href="http://savoy.nordicmade.com/faq/">FAQs</a></li>
<li id="menu-item-387" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-387"><a href="http://savoy.nordicmade.com/order-tracking/">Order Tracking</a></li>
<li id="menu-item-385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385"><a href="http://savoy.nordicmade.com/contact/">Contact</a></li>
                                                                        <li class="nm-footer-bar-text menu-item"><div>© By <a href="http://themeforest.net/user/nordicmade/?ref=nordicmade">NordicMade</a></div></li>
                                                                    </ul>
                            </div>
                            
                            <div class="nm-footer-bar-right col-md-4 col-xs-12">
                                									<ul class="nm-footer-bar-social"><li><a href="http://www.facebook.com" target="_blank" title="Facebook"><i class="nm-font nm-font-facebook"></i></a></li><li><a href="http://www.twitter.com" target="_blank" title="Twitter"><i class="nm-font nm-font-twitter"></i></a></li><li><a href="http://plus.google.com" target="_blank" title="Google+"><i class="nm-font nm-font-google-plus"></i></a></li></ul>                                                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /footer -->
            
            <!-- mobile menu -->
            <?php

require(ECMS_PATH.'e/template/incfile/mobile_nav.php');
?>
            <!-- /mobile menu -->
            
                        
                        
            <!-- quickview -->
            <div id="nm-quickview" class="clearfix"></div>
            <!-- /quickview -->
            
                        
            <div id="nm-page-includes" class="quickview " style="display:none;">&nbsp;</div>

<script type='text/javascript' src='/scripts/nm-js_composer_front.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/cart\/?wc-ajax=%%endpoint%%","i18n_view_cart":"Edit Cart","cart_url":"http:\/\/savoy.nordicmade.com\/cart\/","is_cart":"1","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/add-to-cart.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_country_select_params = {"countries":"{\"AF\":[],\"AT\":[],\"AX\":[],\"BE\":[],\"BI\":[],\"CZ\":[],\"DE\":[],\"DK\":[],\"EE\":[],\"FI\":[],\"FR\":[],\"IS\":[],\"IL\":[],\"KR\":[],\"NL\":[],\"NO\":[],\"PL\":[],\"PT\":[],\"SG\":[],\"SK\":[],\"SI\":[],\"LK\":[],\"SE\":[],\"VN\":[],\"AR\":{\"C\":\"Ciudad Aut\u00f3noma de Buenos Aires\",\"B\":\"Buenos Aires\",\"K\":\"Catamarca\",\"H\":\"Chaco\",\"U\":\"Chubut\",\"X\":\"C\u00f3rdoba\",\"W\":\"Corrientes\",\"E\":\"Entre R\u00edos\",\"P\":\"Formosa\",\"Y\":\"Jujuy\",\"L\":\"La Pampa\",\"F\":\"La Rioja\",\"M\":\"Mendoza\",\"N\":\"Misiones\",\"Q\":\"Neuqu\u00e9n\",\"R\":\"R\u00edo Negro\",\"A\":\"Salta\",\"J\":\"San Juan\",\"D\":\"San Luis\",\"Z\":\"Santa Cruz\",\"S\":\"Santa Fe\",\"G\":\"Santiago del Estero\",\"V\":\"Tierra del Fuego\",\"T\":\"Tucum\u00e1n\"},\"AU\":{\"ACT\":\"Australian Capital Territory\",\"NSW\":\"New South Wales\",\"NT\":\"Northern Territory\",\"QLD\":\"Queensland\",\"SA\":\"South Australia\",\"TAS\":\"Tasmania\",\"VIC\":\"Victoria\",\"WA\":\"Western Australia\"},\"BD\":{\"BAG\":\"Bagerhat\",\"BAN\":\"Bandarban\",\"BAR\":\"Barguna\",\"BARI\":\"Barisal\",\"BHO\":\"Bhola\",\"BOG\":\"Bogra\",\"BRA\":\"Brahmanbaria\",\"CHA\":\"Chandpur\",\"CHI\":\"Chittagong\",\"CHU\":\"Chuadanga\",\"COM\":\"Comilla\",\"COX\":\"Cox's Bazar\",\"DHA\":\"Dhaka\",\"DIN\":\"Dinajpur\",\"FAR\":\"Faridpur \",\"FEN\":\"Feni\",\"GAI\":\"Gaibandha\",\"GAZI\":\"Gazipur\",\"GOP\":\"Gopalganj\",\"HAB\":\"Habiganj\",\"JAM\":\"Jamalpur\",\"JES\":\"Jessore\",\"JHA\":\"Jhalokati\",\"JHE\":\"Jhenaidah\",\"JOY\":\"Joypurhat\",\"KHA\":\"Khagrachhari\",\"KHU\":\"Khulna\",\"KIS\":\"Kishoreganj\",\"KUR\":\"Kurigram\",\"KUS\":\"Kushtia\",\"LAK\":\"Lakshmipur\",\"LAL\":\"Lalmonirhat\",\"MAD\":\"Madaripur\",\"MAG\":\"Magura\",\"MAN\":\"Manikganj \",\"MEH\":\"Meherpur\",\"MOU\":\"Moulvibazar\",\"MUN\":\"Munshiganj\",\"MYM\":\"Mymensingh\",\"NAO\":\"Naogaon\",\"NAR\":\"Narail\",\"NARG\":\"Narayanganj\",\"NARD\":\"Narsingdi\",\"NAT\":\"Natore\",\"NAW\":\"Nawabganj\",\"NET\":\"Netrakona\",\"NIL\":\"Nilphamari\",\"NOA\":\"Noakhali\",\"PAB\":\"Pabna\",\"PAN\":\"Panchagarh\",\"PAT\":\"Patuakhali\",\"PIR\":\"Pirojpur\",\"RAJB\":\"Rajbari\",\"RAJ\":\"Rajshahi\",\"RAN\":\"Rangamati\",\"RANP\":\"Rangpur\",\"SAT\":\"Satkhira\",\"SHA\":\"Shariatpur\",\"SHE\":\"Sherpur\",\"SIR\":\"Sirajganj\",\"SUN\":\"Sunamganj\",\"SYL\":\"Sylhet\",\"TAN\":\"Tangail\",\"THA\":\"Thakurgaon\"},\"BR\":{\"AC\":\"Acre\",\"AL\":\"Alagoas\",\"AP\":\"Amap\u00e1\",\"AM\":\"Amazonas\",\"BA\":\"Bahia\",\"CE\":\"Cear\u00e1\",\"DF\":\"Distrito Federal\",\"ES\":\"Esp\u00edrito Santo\",\"GO\":\"Goi\u00e1s\",\"MA\":\"Maranh\u00e3o\",\"MT\":\"Mato Grosso\",\"MS\":\"Mato Grosso do Sul\",\"MG\":\"Minas Gerais\",\"PA\":\"Par\u00e1\",\"PB\":\"Para\u00edba\",\"PR\":\"Paran\u00e1\",\"PE\":\"Pernambuco\",\"PI\":\"Piau\u00ed\",\"RJ\":\"Rio de Janeiro\",\"RN\":\"Rio Grande do Norte\",\"RS\":\"Rio Grande do Sul\",\"RO\":\"Rond\u00f4nia\",\"RR\":\"Roraima\",\"SC\":\"Santa Catarina\",\"SP\":\"S\u00e3o Paulo\",\"SE\":\"Sergipe\",\"TO\":\"Tocantins\"},\"BG\":{\"BG-01\":\"Blagoevgrad\",\"BG-02\":\"Burgas\",\"BG-08\":\"Dobrich\",\"BG-07\":\"Gabrovo\",\"BG-26\":\"Haskovo\",\"BG-09\":\"Kardzhali\",\"BG-10\":\"Kyustendil\",\"BG-11\":\"Lovech\",\"BG-12\":\"Montana\",\"BG-13\":\"Pazardzhik\",\"BG-14\":\"Pernik\",\"BG-15\":\"Pleven\",\"BG-16\":\"Plovdiv\",\"BG-17\":\"Razgrad\",\"BG-18\":\"Ruse\",\"BG-27\":\"Shumen\",\"BG-19\":\"Silistra\",\"BG-20\":\"Sliven\",\"BG-21\":\"Smolyan\",\"BG-23\":\"Sofia\",\"BG-22\":\"Sofia-Grad\",\"BG-24\":\"Stara Zagora\",\"BG-25\":\"Targovishte\",\"BG-03\":\"Varna\",\"BG-04\":\"Veliko Tarnovo\",\"BG-05\":\"Vidin\",\"BG-06\":\"Vratsa\",\"BG-28\":\"Yambol\"},\"CA\":{\"AB\":\"Alberta\",\"BC\":\"British Columbia\",\"MB\":\"Manitoba\",\"NB\":\"New Brunswick\",\"NL\":\"Newfoundland and Labrador\",\"NT\":\"Northwest Territories\",\"NS\":\"Nova Scotia\",\"NU\":\"Nunavut\",\"ON\":\"Ontario\",\"PE\":\"Prince Edward Island\",\"QC\":\"Quebec\",\"SK\":\"Saskatchewan\",\"YT\":\"Yukon Territory\"},\"CN\":{\"CN1\":\"Yunnan \\\/ \u4e91\u5357\",\"CN2\":\"Beijing \\\/ \u5317\u4eac\",\"CN3\":\"Tianjin \\\/ \u5929\u6d25\",\"CN4\":\"Hebei \\\/ \u6cb3\u5317\",\"CN5\":\"Shanxi \\\/ \u5c71\u897f\",\"CN6\":\"Inner Mongolia \\\/ \u5167\u8499\u53e4\",\"CN7\":\"Liaoning \\\/ \u8fbd\u5b81\",\"CN8\":\"Jilin \\\/ \u5409\u6797\",\"CN9\":\"Heilongjiang \\\/ \u9ed1\u9f99\u6c5f\",\"CN10\":\"Shanghai \\\/ \u4e0a\u6d77\",\"CN11\":\"Jiangsu \\\/ \u6c5f\u82cf\",\"CN12\":\"Zhejiang \\\/ \u6d59\u6c5f\",\"CN13\":\"Anhui \\\/ \u5b89\u5fbd\",\"CN14\":\"Fujian \\\/ \u798f\u5efa\",\"CN15\":\"Jiangxi \\\/ \u6c5f\u897f\",\"CN16\":\"Shandong \\\/ \u5c71\u4e1c\",\"CN17\":\"Henan \\\/ \u6cb3\u5357\",\"CN18\":\"Hubei \\\/ \u6e56\u5317\",\"CN19\":\"Hunan \\\/ \u6e56\u5357\",\"CN20\":\"Guangdong \\\/ \u5e7f\u4e1c\",\"CN21\":\"Guangxi Zhuang \\\/ \u5e7f\u897f\u58ee\u65cf\",\"CN22\":\"Hainan \\\/ \u6d77\u5357\",\"CN23\":\"Chongqing \\\/ \u91cd\u5e86\",\"CN24\":\"Sichuan \\\/ \u56db\u5ddd\",\"CN25\":\"Guizhou \\\/ \u8d35\u5dde\",\"CN26\":\"Shaanxi \\\/ \u9655\u897f\",\"CN27\":\"Gansu \\\/ \u7518\u8083\",\"CN28\":\"Qinghai \\\/ \u9752\u6d77\",\"CN29\":\"Ningxia Hui \\\/ \u5b81\u590f\",\"CN30\":\"Macau \\\/ \u6fb3\u95e8\",\"CN31\":\"Tibet \\\/ \u897f\u85cf\",\"CN32\":\"Xinjiang \\\/ \u65b0\u7586\"},\"GR\":{\"I\":\"\\u0391\\u03c4\\u03c4\\u03b9\\u03ba\\u03ae\",\"A\":\"\\u0391\\u03bd\\u03b1\\u03c4\\u03bf\\u03bb\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1 \\u03ba\\u03b1\\u03b9 \\u0398\\u03c1\\u03ac\\u03ba\\u03b7\",\"B\":\"\\u039a\\u03b5\\u03bd\\u03c4\\u03c1\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"C\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"D\":\"\\u0389\\u03c0\\u03b5\\u03b9\\u03c1\\u03bf\\u03c2\",\"E\":\"\\u0398\\u03b5\\u03c3\\u03c3\\u03b1\\u03bb\\u03af\\u03b1\",\"F\":\"\\u0399\\u03cc\\u03bd\\u03b9\\u03bf\\u03b9 \\u039d\\u03ae\\u03c3\\u03bf\\u03b9\",\"G\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"H\":\"\\u03a3\\u03c4\\u03b5\\u03c1\\u03b5\\u03ac \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"J\":\"\\u03a0\\u03b5\\u03bb\\u03bf\\u03c0\\u03cc\\u03bd\\u03bd\\u03b7\\u03c3\\u03bf\\u03c2\",\"K\":\"\\u0392\\u03cc\\u03c1\\u03b5\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"L\":\"\\u039d\\u03cc\\u03c4\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"M\":\"\\u039a\\u03c1\\u03ae\\u03c4\\u03b7\"},\"HK\":{\"HONG KONG\":\"Hong Kong Island\",\"KOWLOON\":\"Kowloon\",\"NEW TERRITORIES\":\"New Territories\"},\"HU\":{\"BK\":\"B\\u00e1cs-Kiskun\",\"BE\":\"B\\u00e9k\\u00e9s\",\"BA\":\"Baranya\",\"BZ\":\"Borsod-Aba\\u00faj-Zempl\\u00e9n\",\"BU\":\"Budapest\",\"CS\":\"Csongr\\u00e1d\",\"FE\":\"Fej\\u00e9r\",\"GS\":\"Gy\\u0151r-Moson-Sopron\",\"HB\":\"Hajd\\u00fa-Bihar\",\"HE\":\"Heves\",\"JN\":\"J\\u00e1sz-Nagykun-Szolnok\",\"KE\":\"Kom\\u00e1rom-Esztergom\",\"NO\":\"N\\u00f3gr\\u00e1d\",\"PE\":\"Pest\",\"SO\":\"Somogy\",\"SZ\":\"Szabolcs-Szatm\\u00e1r-Bereg\",\"TO\":\"Tolna\",\"VA\":\"Vas\",\"VE\":\"Veszpr\\u00e9m\",\"ZA\":\"Zala\"},\"IN\":{\"AP\":\"Andhra Pradesh\",\"AR\":\"Arunachal Pradesh\",\"AS\":\"Assam\",\"BR\":\"Bihar\",\"CT\":\"Chhattisgarh\",\"GA\":\"Goa\",\"GJ\":\"Gujarat\",\"HR\":\"Haryana\",\"HP\":\"Himachal Pradesh\",\"JK\":\"Jammu and Kashmir\",\"JH\":\"Jharkhand\",\"KA\":\"Karnataka\",\"KL\":\"Kerala\",\"MP\":\"Madhya Pradesh\",\"MH\":\"Maharashtra\",\"MN\":\"Manipur\",\"ML\":\"Meghalaya\",\"MZ\":\"Mizoram\",\"NL\":\"Nagaland\",\"OR\":\"Orissa\",\"PB\":\"Punjab\",\"RJ\":\"Rajasthan\",\"SK\":\"Sikkim\",\"TN\":\"Tamil Nadu\",\"TS\":\"Telangana\",\"TR\":\"Tripura\",\"UK\":\"Uttarakhand\",\"UP\":\"Uttar Pradesh\",\"WB\":\"West Bengal\",\"AN\":\"Andaman and Nicobar Islands\",\"CH\":\"Chandigarh\",\"DN\":\"Dadar and Nagar Haveli\",\"DD\":\"Daman and Diu\",\"DL\":\"Delhi\",\"LD\":\"Lakshadeep\",\"PY\":\"Pondicherry (Puducherry)\"},\"ID\":{\"AC\":\"Daerah Istimewa Aceh\",\"SU\":\"Sumatera Utara\",\"SB\":\"Sumatera Barat\",\"RI\":\"Riau\",\"KR\":\"Kepulauan Riau\",\"JA\":\"Jambi\",\"SS\":\"Sumatera Selatan\",\"BB\":\"Bangka Belitung\",\"BE\":\"Bengkulu\",\"LA\":\"Lampung\",\"JK\":\"DKI Jakarta\",\"JB\":\"Jawa Barat\",\"BT\":\"Banten\",\"JT\":\"Jawa Tengah\",\"JI\":\"Jawa Timur\",\"YO\":\"Daerah Istimewa Yogyakarta\",\"BA\":\"Bali\",\"NB\":\"Nusa Tenggara Barat\",\"NT\":\"Nusa Tenggara Timur\",\"KB\":\"Kalimantan Barat\",\"KT\":\"Kalimantan Tengah\",\"KI\":\"Kalimantan Timur\",\"KS\":\"Kalimantan Selatan\",\"KU\":\"Kalimantan Utara\",\"SA\":\"Sulawesi Utara\",\"ST\":\"Sulawesi Tengah\",\"SG\":\"Sulawesi Tenggara\",\"SR\":\"Sulawesi Barat\",\"SN\":\"Sulawesi Selatan\",\"GO\":\"Gorontalo\",\"MA\":\"Maluku\",\"MU\":\"Maluku Utara\",\"PA\":\"Papua\",\"PB\":\"Papua Barat\"},\"IR\":{\"KHZ\":\"Khuzestan  (\\u062e\\u0648\\u0632\\u0633\\u062a\\u0627\\u0646)\",\"THR\":\"Tehran  (\\u062a\\u0647\\u0631\\u0627\\u0646)\",\"ILM\":\"Ilaam (\\u0627\\u06cc\\u0644\\u0627\\u0645)\",\"BHR\":\"Bushehr (\\u0628\\u0648\\u0634\\u0647\\u0631)\",\"ADL\":\"Ardabil (\\u0627\\u0631\\u062f\\u0628\\u06cc\\u0644)\",\"ESF\":\"Isfahan (\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646)\",\"YZD\":\"Yazd (\\u06cc\\u0632\\u062f)\",\"KRH\":\"Kermanshah (\\u06a9\\u0631\\u0645\\u0627\\u0646\\u0634\\u0627\\u0647)\",\"KRN\":\"Kerman (\\u06a9\\u0631\\u0645\\u0627\\u0646)\",\"HDN\":\"Hamadan (\\u0647\\u0645\\u062f\\u0627\\u0646)\",\"GZN\":\"Ghazvin (\\u0642\\u0632\\u0648\\u06cc\\u0646)\",\"ZJN\":\"Zanjan (\\u0632\\u0646\\u062c\\u0627\\u0646)\",\"LRS\":\"Luristan (\\u0644\\u0631\\u0633\\u062a\\u0627\\u0646)\",\"ABZ\":\"Alborz (\\u0627\\u0644\\u0628\\u0631\\u0632)\",\"EAZ\":\"East Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u0634\\u0631\\u0642\\u06cc)\",\"WAZ\":\"West Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u063a\\u0631\\u0628\\u06cc)\",\"CHB\":\"Chaharmahal and Bakhtiari (\\u0686\\u0647\\u0627\\u0631\\u0645\\u062d\\u0627\\u0644 \\u0648 \\u0628\\u062e\\u062a\\u06cc\\u0627\\u0631\\u06cc)\",\"SKH\":\"South Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u062c\\u0646\\u0648\\u0628\\u06cc)\",\"RKH\":\"Razavi Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0631\\u0636\\u0648\\u06cc)\",\"NKH\":\"North Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u062c\\u0646\\u0648\\u0628\\u06cc)\",\"SMN\":\"Semnan (\\u0633\\u0645\\u0646\\u0627\\u0646)\",\"FRS\":\"Fars (\\u0641\\u0627\\u0631\\u0633)\",\"QHM\":\"Qom (\\u0642\\u0645)\",\"KRD\":\"Kurdistan \\\/ \\u06a9\\u0631\\u062f\\u0633\\u062a\\u0627\\u0646)\",\"KBD\":\"Kohgiluyeh and BoyerAhmad (\\u06a9\\u0647\\u06af\\u06cc\\u0644\\u0648\\u06cc\\u06cc\\u0647 \\u0648 \\u0628\\u0648\\u06cc\\u0631\\u0627\\u062d\\u0645\\u062f)\",\"GLS\":\"Golestan (\\u06af\\u0644\\u0633\\u062a\\u0627\\u0646)\",\"GIL\":\"Gilan (\\u06af\\u06cc\\u0644\\u0627\\u0646)\",\"MZN\":\"Mazandaran (\\u0645\\u0627\\u0632\\u0646\\u062f\\u0631\\u0627\\u0646)\",\"MKZ\":\"Markazi (\\u0645\\u0631\\u06a9\\u0632\\u06cc)\",\"HRZ\":\"Hormozgan (\\u0647\\u0631\\u0645\\u0632\\u06af\\u0627\\u0646)\",\"SBN\":\"Sistan and Baluchestan (\\u0633\\u06cc\\u0633\\u062a\\u0627\\u0646 \\u0648 \\u0628\\u0644\\u0648\\u0686\\u0633\\u062a\\u0627\\u0646)\"},\"IT\":{\"AG\":\"Agrigento\",\"AL\":\"Alessandria\",\"AN\":\"Ancona\",\"AO\":\"Aosta\",\"AR\":\"Arezzo\",\"AP\":\"Ascoli Piceno\",\"AT\":\"Asti\",\"AV\":\"Avellino\",\"BA\":\"Bari\",\"BT\":\"Barletta-Andria-Trani\",\"BL\":\"Belluno\",\"BN\":\"Benevento\",\"BG\":\"Bergamo\",\"BI\":\"Biella\",\"BO\":\"Bologna\",\"BZ\":\"Bolzano\",\"BS\":\"Brescia\",\"BR\":\"Brindisi\",\"CA\":\"Cagliari\",\"CL\":\"Caltanissetta\",\"CB\":\"Campobasso\",\"CI\":\"Carbonia-Iglesias\",\"CE\":\"Caserta\",\"CT\":\"Catania\",\"CZ\":\"Catanzaro\",\"CH\":\"Chieti\",\"CO\":\"Como\",\"CS\":\"Cosenza\",\"CR\":\"Cremona\",\"KR\":\"Crotone\",\"CN\":\"Cuneo\",\"EN\":\"Enna\",\"FM\":\"Fermo\",\"FE\":\"Ferrara\",\"FI\":\"Firenze\",\"FG\":\"Foggia\",\"FC\":\"Forl\\u00ec-Cesena\",\"FR\":\"Frosinone\",\"GE\":\"Genova\",\"GO\":\"Gorizia\",\"GR\":\"Grosseto\",\"IM\":\"Imperia\",\"IS\":\"Isernia\",\"SP\":\"La Spezia\",\"AQ\":\"L&apos;Aquila\",\"LT\":\"Latina\",\"LE\":\"Lecce\",\"LC\":\"Lecco\",\"LI\":\"Livorno\",\"LO\":\"Lodi\",\"LU\":\"Lucca\",\"MC\":\"Macerata\",\"MN\":\"Mantova\",\"MS\":\"Massa-Carrara\",\"MT\":\"Matera\",\"ME\":\"Messina\",\"MI\":\"Milano\",\"MO\":\"Modena\",\"MB\":\"Monza e della Brianza\",\"NA\":\"Napoli\",\"NO\":\"Novara\",\"NU\":\"Nuoro\",\"OT\":\"Olbia-Tempio\",\"OR\":\"Oristano\",\"PD\":\"Padova\",\"PA\":\"Palermo\",\"PR\":\"Parma\",\"PV\":\"Pavia\",\"PG\":\"Perugia\",\"PU\":\"Pesaro e Urbino\",\"PE\":\"Pescara\",\"PC\":\"Piacenza\",\"PI\":\"Pisa\",\"PT\":\"Pistoia\",\"PN\":\"Pordenone\",\"PZ\":\"Potenza\",\"PO\":\"Prato\",\"RG\":\"Ragusa\",\"RA\":\"Ravenna\",\"RC\":\"Reggio Calabria\",\"RE\":\"Reggio Emilia\",\"RI\":\"Rieti\",\"RN\":\"Rimini\",\"RM\":\"Roma\",\"RO\":\"Rovigo\",\"SA\":\"Salerno\",\"VS\":\"Medio Campidano\",\"SS\":\"Sassari\",\"SV\":\"Savona\",\"SI\":\"Siena\",\"SR\":\"Siracusa\",\"SO\":\"Sondrio\",\"TA\":\"Taranto\",\"TE\":\"Teramo\",\"TR\":\"Terni\",\"TO\":\"Torino\",\"OG\":\"Ogliastra\",\"TP\":\"Trapani\",\"TN\":\"Trento\",\"TV\":\"Treviso\",\"TS\":\"Trieste\",\"UD\":\"Udine\",\"VA\":\"Varese\",\"VE\":\"Venezia\",\"VB\":\"Verbano-Cusio-Ossola\",\"VC\":\"Vercelli\",\"VR\":\"Verona\",\"VV\":\"Vibo Valentia\",\"VI\":\"Vicenza\",\"VT\":\"Viterbo\"},\"JP\":{\"JP01\":\"Hokkaido\",\"JP02\":\"Aomori\",\"JP03\":\"Iwate\",\"JP04\":\"Miyagi\",\"JP05\":\"Akita\",\"JP06\":\"Yamagata\",\"JP07\":\"Fukushima\",\"JP08\":\"Ibaraki\",\"JP09\":\"Tochigi\",\"JP10\":\"Gunma\",\"JP11\":\"Saitama\",\"JP12\":\"Chiba\",\"JP13\":\"Tokyo\",\"JP14\":\"Kanagawa\",\"JP15\":\"Niigata\",\"JP16\":\"Toyama\",\"JP17\":\"Ishikawa\",\"JP18\":\"Fukui\",\"JP19\":\"Yamanashi\",\"JP20\":\"Nagano\",\"JP21\":\"Gifu\",\"JP22\":\"Shizuoka\",\"JP23\":\"Aichi\",\"JP24\":\"Mie\",\"JP25\":\"Shiga\",\"JP26\":\"Kyoto\",\"JP27\":\"Osaka\",\"JP28\":\"Hyogo\",\"JP29\":\"Nara\",\"JP30\":\"Wakayama\",\"JP31\":\"Tottori\",\"JP32\":\"Shimane\",\"JP33\":\"Okayama\",\"JP34\":\"Hiroshima\",\"JP35\":\"Yamaguchi\",\"JP36\":\"Tokushima\",\"JP37\":\"Kagawa\",\"JP38\":\"Ehime\",\"JP39\":\"Kochi\",\"JP40\":\"Fukuoka\",\"JP41\":\"Saga\",\"JP42\":\"Nagasaki\",\"JP43\":\"Kumamoto\",\"JP44\":\"Oita\",\"JP45\":\"Miyazaki\",\"JP46\":\"Kagoshima\",\"JP47\":\"Okinawa\"},\"MY\":{\"JHR\":\"Johor\",\"KDH\":\"Kedah\",\"KTN\":\"Kelantan\",\"LBN\":\"Labuan\",\"MLK\":\"Malacca (Melaka)\",\"NSN\":\"Negeri Sembilan\",\"PHG\":\"Pahang\",\"PNG\":\"Penang (Pulau Pinang)\",\"PRK\":\"Perak\",\"PLS\":\"Perlis\",\"SBH\":\"Sabah\",\"SWK\":\"Sarawak\",\"SGR\":\"Selangor\",\"TRG\":\"Terengganu\",\"PJY\":\"Putrajaya\",\"KUL\":\"Kuala Lumpur\"},\"MX\":{\"Distrito Federal\":\"Distrito Federal\",\"Jalisco\":\"Jalisco\",\"Nuevo Leon\":\"Nuevo Le\\u00f3n\",\"Aguascalientes\":\"Aguascalientes\",\"Baja California\":\"Baja California\",\"Baja California Sur\":\"Baja California Sur\",\"Campeche\":\"Campeche\",\"Chiapas\":\"Chiapas\",\"Chihuahua\":\"Chihuahua\",\"Coahuila\":\"Coahuila\",\"Colima\":\"Colima\",\"Durango\":\"Durango\",\"Guanajuato\":\"Guanajuato\",\"Guerrero\":\"Guerrero\",\"Hidalgo\":\"Hidalgo\",\"Estado de Mexico\":\"Edo. de M\\u00e9xico\",\"Michoacan\":\"Michoac\\u00e1n\",\"Morelos\":\"Morelos\",\"Nayarit\":\"Nayarit\",\"Oaxaca\":\"Oaxaca\",\"Puebla\":\"Puebla\",\"Queretaro\":\"Quer\\u00e9taro\",\"Quintana Roo\":\"Quintana Roo\",\"San Luis Potosi\":\"San Luis Potos\\u00ed\",\"Sinaloa\":\"Sinaloa\",\"Sonora\":\"Sonora\",\"Tabasco\":\"Tabasco\",\"Tamaulipas\":\"Tamaulipas\",\"Tlaxcala\":\"Tlaxcala\",\"Veracruz\":\"Veracruz\",\"Yucatan\":\"Yucat\\u00e1n\",\"Zacatecas\":\"Zacatecas\"},\"NP\":{\"BAG\":\"Bagmati\",\"BHE\":\"Bheri\",\"DHA\":\"Dhawalagiri\",\"GAN\":\"Gandaki\",\"JAN\":\"Janakpur\",\"KAR\":\"Karnali\",\"KOS\":\"Koshi\",\"LUM\":\"Lumbini\",\"MAH\":\"Mahakali\",\"MEC\":\"Mechi\",\"NAR\":\"Narayani\",\"RAP\":\"Rapti\",\"SAG\":\"Sagarmatha\",\"SET\":\"Seti\"},\"NZ\":{\"NL\":\"Northland\",\"AK\":\"Auckland\",\"WA\":\"Waikato\",\"BP\":\"Bay of Plenty\",\"TK\":\"Taranaki\",\"GI\":\"Gisborne\",\"HB\":\"Hawke\u2019s Bay\",\"MW\":\"Manawatu-Wanganui\",\"WE\":\"Wellington\",\"NS\":\"Nelson\",\"MB\":\"Marlborough\",\"TM\":\"Tasman\",\"WC\":\"West Coast\",\"CT\":\"Canterbury\",\"OT\":\"Otago\",\"SL\":\"Southland\"},\"PE\":{\"CAL\":\"El Callao\",\"LMA\":\"Municipalidad Metropolitana de Lima\",\"AMA\":\"Amazonas\",\"ANC\":\"Ancash\",\"APU\":\"Apur\u00edmac\",\"ARE\":\"Arequipa\",\"AYA\":\"Ayacucho\",\"CAJ\":\"Cajamarca\",\"CUS\":\"Cusco\",\"HUV\":\"Huancavelica\",\"HUC\":\"Hu\u00e1nuco\",\"ICA\":\"Ica\",\"JUN\":\"Jun\u00edn\",\"LAL\":\"La Libertad\",\"LAM\":\"Lambayeque\",\"LIM\":\"Lima\",\"LOR\":\"Loreto\",\"MDD\":\"Madre de Dios\",\"MOQ\":\"Moquegua\",\"PAS\":\"Pasco\",\"PIU\":\"Piura\",\"PUN\":\"Puno\",\"SAM\":\"San Mart\u00edn\",\"TAC\":\"Tacna\",\"TUM\":\"Tumbes\",\"UCA\":\"Ucayali\"},\"PH\":{\"ABR\":\"Abra\",\"AGN\":\"Agusan del Norte\",\"AGS\":\"Agusan del Sur\",\"AKL\":\"Aklan\",\"ALB\":\"Albay\",\"ANT\":\"Antique\",\"APA\":\"Apayao\",\"AUR\":\"Aurora\",\"BAS\":\"Basilan\",\"BAN\":\"Bataan\",\"BTN\":\"Batanes\",\"BTG\":\"Batangas\",\"BEN\":\"Benguet\",\"BIL\":\"Biliran\",\"BOH\":\"Bohol\",\"BUK\":\"Bukidnon\",\"BUL\":\"Bulacan\",\"CAG\":\"Cagayan\",\"CAN\":\"Camarines Norte\",\"CAS\":\"Camarines Sur\",\"CAM\":\"Camiguin\",\"CAP\":\"Capiz\",\"CAT\":\"Catanduanes\",\"CAV\":\"Cavite\",\"CEB\":\"Cebu\",\"COM\":\"Compostela Valley\",\"NCO\":\"Cotabato\",\"DAV\":\"Davao del Norte\",\"DAS\":\"Davao del Sur\",\"DAC\":\"Davao Occidental\",\"DAO\":\"Davao Oriental\",\"DIN\":\"Dinagat Islands\",\"EAS\":\"Eastern Samar\",\"GUI\":\"Guimaras\",\"IFU\":\"Ifugao\",\"ILN\":\"Ilocos Norte\",\"ILS\":\"Ilocos Sur\",\"ILI\":\"Iloilo\",\"ISA\":\"Isabela\",\"KAL\":\"Kalinga\",\"LUN\":\"La Union\",\"LAG\":\"Laguna\",\"LAN\":\"Lanao del Norte\",\"LAS\":\"Lanao del Sur\",\"LEY\":\"Leyte\",\"MAG\":\"Maguindanao\",\"MAD\":\"Marinduque\",\"MAS\":\"Masbate\",\"MSC\":\"Misamis Occidental\",\"MSR\":\"Misamis Oriental\",\"MOU\":\"Mountain Province\",\"NEC\":\"Negros Occidental\",\"NER\":\"Negros Oriental\",\"NSA\":\"Northern Samar\",\"NUE\":\"Nueva Ecija\",\"NUV\":\"Nueva Vizcaya\",\"MDC\":\"Occidental Mindoro\",\"MDR\":\"Oriental Mindoro\",\"PLW\":\"Palawan\",\"PAM\":\"Pampanga\",\"PAN\":\"Pangasinan\",\"QUE\":\"Quezon\",\"QUI\":\"Quirino\",\"RIZ\":\"Rizal\",\"ROM\":\"Romblon\",\"WSA\":\"Samar\",\"SAR\":\"Sarangani\",\"SIQ\":\"Siquijor\",\"SOR\":\"Sorsogon\",\"SCO\":\"South Cotabato\",\"SLE\":\"Southern Leyte\",\"SUK\":\"Sultan Kudarat\",\"SLU\":\"Sulu\",\"SUN\":\"Surigao del Norte\",\"SUR\":\"Surigao del Sur\",\"TAR\":\"Tarlac\",\"TAW\":\"Tawi-Tawi\",\"ZMB\":\"Zambales\",\"ZAN\":\"Zamboanga del Norte\",\"ZAS\":\"Zamboanga del Sur\",\"ZSI\":\"Zamboanga Sibugay\",\"00\":\"Metro Manila\"},\"ZA\":{\"EC\":\"Eastern Cape\",\"FS\":\"Free State\",\"GP\":\"Gauteng\",\"KZN\":\"KwaZulu-Natal\",\"LP\":\"Limpopo\",\"MP\":\"Mpumalanga\",\"NC\":\"Northern Cape\",\"NW\":\"North West\",\"WC\":\"Western Cape\"},\"ES\":{\"C\":\"A Coru\u00f1a\",\"VI\":\"Araba\\\/\u00c1lava\",\"AB\":\"Albacete\",\"A\":\"Alicante\",\"AL\":\"Almer\u00eda\",\"O\":\"Asturias\",\"AV\":\"\u00c1vila\",\"BA\":\"Badajoz\",\"PM\":\"Baleares\",\"B\":\"Barcelona\",\"BU\":\"Burgos\",\"CC\":\"C\u00e1ceres\",\"CA\":\"C\u00e1diz\",\"S\":\"Cantabria\",\"CS\":\"Castell\u00f3n\",\"CE\":\"Ceuta\",\"CR\":\"Ciudad Real\",\"CO\":\"C\u00f3rdoba\",\"CU\":\"Cuenca\",\"GI\":\"Girona\",\"GR\":\"Granada\",\"GU\":\"Guadalajara\",\"SS\":\"Gipuzkoa\",\"H\":\"Huelva\",\"HU\":\"Huesca\",\"J\":\"Ja\u00e9n\",\"LO\":\"La Rioja\",\"GC\":\"Las Palmas\",\"LE\":\"Le\u00f3n\",\"L\":\"Lleida\",\"LU\":\"Lugo\",\"M\":\"Madrid\",\"MA\":\"M\u00e1laga\",\"ML\":\"Melilla\",\"MU\":\"Murcia\",\"NA\":\"Navarra\",\"OR\":\"Ourense\",\"P\":\"Palencia\",\"PO\":\"Pontevedra\",\"SA\":\"Salamanca\",\"TF\":\"Santa Cruz de Tenerife\",\"SG\":\"Segovia\",\"SE\":\"Sevilla\",\"SO\":\"Soria\",\"T\":\"Tarragona\",\"TE\":\"Teruel\",\"TO\":\"Toledo\",\"V\":\"Valencia\",\"VA\":\"Valladolid\",\"BI\":\"Bizkaia\",\"ZA\":\"Zamora\",\"Z\":\"Zaragoza\"},\"TH\":{\"TH-37\":\"Amnat Charoen (\u0e2d\u0e33\u0e19\u0e32\u0e08\u0e40\u0e08\u0e23\u0e34\u0e0d)\",\"TH-15\":\"Ang Thong (\u0e2d\u0e48\u0e32\u0e07\u0e17\u0e2d\u0e07)\",\"TH-14\":\"Ayutthaya (\u0e1e\u0e23\u0e30\u0e19\u0e04\u0e23\u0e28\u0e23\u0e35\u0e2d\u0e22\u0e38\u0e18\u0e22\u0e32)\",\"TH-10\":\"Bangkok (\u0e01\u0e23\u0e38\u0e07\u0e40\u0e17\u0e1e\u0e21\u0e2b\u0e32\u0e19\u0e04\u0e23)\",\"TH-38\":\"Bueng Kan (\u0e1a\u0e36\u0e07\u0e01\u0e32\u0e2c)\",\"TH-31\":\"Buri Ram (\u0e1a\u0e38\u0e23\u0e35\u0e23\u0e31\u0e21\u0e22\u0e4c)\",\"TH-24\":\"Chachoengsao (\u0e09\u0e30\u0e40\u0e0a\u0e34\u0e07\u0e40\u0e17\u0e23\u0e32)\",\"TH-18\":\"Chai Nat (\u0e0a\u0e31\u0e22\u0e19\u0e32\u0e17)\",\"TH-36\":\"Chaiyaphum (\u0e0a\u0e31\u0e22\u0e20\u0e39\u0e21\u0e34)\",\"TH-22\":\"Chanthaburi (\u0e08\u0e31\u0e19\u0e17\u0e1a\u0e38\u0e23\u0e35)\",\"TH-50\":\"Chiang Mai (\u0e40\u0e0a\u0e35\u0e22\u0e07\u0e43\u0e2b\u0e21\u0e48)\",\"TH-57\":\"Chiang Rai (\u0e40\u0e0a\u0e35\u0e22\u0e07\u0e23\u0e32\u0e22)\",\"TH-20\":\"Chonburi (\u0e0a\u0e25\u0e1a\u0e38\u0e23\u0e35)\",\"TH-86\":\"Chumphon (\u0e0a\u0e38\u0e21\u0e1e\u0e23)\",\"TH-46\":\"Kalasin (\u0e01\u0e32\u0e2c\u0e2a\u0e34\u0e19\u0e18\u0e38\u0e4c)\",\"TH-62\":\"Kamphaeng Phet (\u0e01\u0e33\u0e41\u0e1e\u0e07\u0e40\u0e1e\u0e0a\u0e23)\",\"TH-71\":\"Kanchanaburi (\u0e01\u0e32\u0e0d\u0e08\u0e19\u0e1a\u0e38\u0e23\u0e35)\",\"TH-40\":\"Khon Kaen (\u0e02\u0e2d\u0e19\u0e41\u0e01\u0e48\u0e19)\",\"TH-81\":\"Krabi (\u0e01\u0e23\u0e30\u0e1a\u0e35\u0e48)\",\"TH-52\":\"Lampang (\u0e25\u0e33\u0e1b\u0e32\u0e07)\",\"TH-51\":\"Lamphun (\u0e25\u0e33\u0e1e\u0e39\u0e19)\",\"TH-42\":\"Loei (\u0e40\u0e25\u0e22)\",\"TH-16\":\"Lopburi (\u0e25\u0e1e\u0e1a\u0e38\u0e23\u0e35)\",\"TH-58\":\"Mae Hong Son (\u0e41\u0e21\u0e48\u0e2e\u0e48\u0e2d\u0e07\u0e2a\u0e2d\u0e19)\",\"TH-44\":\"Maha Sarakham (\u0e21\u0e2b\u0e32\u0e2a\u0e32\u0e23\u0e04\u0e32\u0e21)\",\"TH-49\":\"Mukdahan (\u0e21\u0e38\u0e01\u0e14\u0e32\u0e2b\u0e32\u0e23)\",\"TH-26\":\"Nakhon Nayok (\u0e19\u0e04\u0e23\u0e19\u0e32\u0e22\u0e01)\",\"TH-73\":\"Nakhon Pathom (\u0e19\u0e04\u0e23\u0e1b\u0e10\u0e21)\",\"TH-48\":\"Nakhon Phanom (\u0e19\u0e04\u0e23\u0e1e\u0e19\u0e21)\",\"TH-30\":\"Nakhon Ratchasima (\u0e19\u0e04\u0e23\u0e23\u0e32\u0e0a\u0e2a\u0e35\u0e21\u0e32)\",\"TH-60\":\"Nakhon Sawan (\u0e19\u0e04\u0e23\u0e2a\u0e27\u0e23\u0e23\u0e04\u0e4c)\",\"TH-80\":\"Nakhon Si Thammarat (\u0e19\u0e04\u0e23\u0e28\u0e23\u0e35\u0e18\u0e23\u0e23\u0e21\u0e23\u0e32\u0e0a)\",\"TH-55\":\"Nan (\u0e19\u0e48\u0e32\u0e19)\",\"TH-96\":\"Narathiwat (\u0e19\u0e23\u0e32\u0e18\u0e34\u0e27\u0e32\u0e2a)\",\"TH-39\":\"Nong Bua Lam Phu (\u0e2b\u0e19\u0e2d\u0e07\u0e1a\u0e31\u0e27\u0e25\u0e33\u0e20\u0e39)\",\"TH-43\":\"Nong Khai (\u0e2b\u0e19\u0e2d\u0e07\u0e04\u0e32\u0e22)\",\"TH-12\":\"Nonthaburi (\u0e19\u0e19\u0e17\u0e1a\u0e38\u0e23\u0e35)\",\"TH-13\":\"Pathum Thani (\u0e1b\u0e17\u0e38\u0e21\u0e18\u0e32\u0e19\u0e35)\",\"TH-94\":\"Pattani (\u0e1b\u0e31\u0e15\u0e15\u0e32\u0e19\u0e35)\",\"TH-82\":\"Phang Nga (\u0e1e\u0e31\u0e07\u0e07\u0e32)\",\"TH-93\":\"Phatthalung (\u0e1e\u0e31\u0e17\u0e25\u0e38\u0e07)\",\"TH-56\":\"Phayao (\u0e1e\u0e30\u0e40\u0e22\u0e32)\",\"TH-67\":\"Phetchabun (\u0e40\u0e1e\u0e0a\u0e23\u0e1a\u0e39\u0e23\u0e13\u0e4c)\",\"TH-76\":\"Phetchaburi (\u0e40\u0e1e\u0e0a\u0e23\u0e1a\u0e38\u0e23\u0e35)\",\"TH-66\":\"Phichit (\u0e1e\u0e34\u0e08\u0e34\u0e15\u0e23)\",\"TH-65\":\"Phitsanulok (\u0e1e\u0e34\u0e29\u0e13\u0e38\u0e42\u0e25\u0e01)\",\"TH-54\":\"Phrae (\u0e41\u0e1e\u0e23\u0e48)\",\"TH-83\":\"Phuket (\u0e20\u0e39\u0e40\u0e01\u0e47\u0e15)\",\"TH-25\":\"Prachin Buri (\u0e1b\u0e23\u0e32\u0e08\u0e35\u0e19\u0e1a\u0e38\u0e23\u0e35)\",\"TH-77\":\"Prachuap Khiri Khan (\u0e1b\u0e23\u0e30\u0e08\u0e27\u0e1a\u0e04\u0e35\u0e23\u0e35\u0e02\u0e31\u0e19\u0e18\u0e4c)\",\"TH-85\":\"Ranong (\u0e23\u0e30\u0e19\u0e2d\u0e07)\",\"TH-70\":\"Ratchaburi (\u0e23\u0e32\u0e0a\u0e1a\u0e38\u0e23\u0e35)\",\"TH-21\":\"Rayong (\u0e23\u0e30\u0e22\u0e2d\u0e07)\",\"TH-45\":\"Roi Et (\u0e23\u0e49\u0e2d\u0e22\u0e40\u0e2d\u0e47\u0e14)\",\"TH-27\":\"Sa Kaeo (\u0e2a\u0e23\u0e30\u0e41\u0e01\u0e49\u0e27)\",\"TH-47\":\"Sakon Nakhon (\u0e2a\u0e01\u0e25\u0e19\u0e04\u0e23)\",\"TH-11\":\"Samut Prakan (\u0e2a\u0e21\u0e38\u0e17\u0e23\u0e1b\u0e23\u0e32\u0e01\u0e32\u0e23)\",\"TH-74\":\"Samut Sakhon (\u0e2a\u0e21\u0e38\u0e17\u0e23\u0e2a\u0e32\u0e04\u0e23)\",\"TH-75\":\"Samut Songkhram (\u0e2a\u0e21\u0e38\u0e17\u0e23\u0e2a\u0e07\u0e04\u0e23\u0e32\u0e21)\",\"TH-19\":\"Saraburi (\u0e2a\u0e23\u0e30\u0e1a\u0e38\u0e23\u0e35)\",\"TH-91\":\"Satun (\u0e2a\u0e15\u0e39\u0e25)\",\"TH-17\":\"Sing Buri (\u0e2a\u0e34\u0e07\u0e2b\u0e4c\u0e1a\u0e38\u0e23\u0e35)\",\"TH-33\":\"Sisaket (\u0e28\u0e23\u0e35\u0e2a\u0e30\u0e40\u0e01\u0e29)\",\"TH-90\":\"Songkhla (\u0e2a\u0e07\u0e02\u0e25\u0e32)\",\"TH-64\":\"Sukhothai (\u0e2a\u0e38\u0e42\u0e02\u0e17\u0e31\u0e22)\",\"TH-72\":\"Suphan Buri (\u0e2a\u0e38\u0e1e\u0e23\u0e23\u0e13\u0e1a\u0e38\u0e23\u0e35)\",\"TH-84\":\"Surat Thani (\u0e2a\u0e38\u0e23\u0e32\u0e29\u0e0e\u0e23\u0e4c\u0e18\u0e32\u0e19\u0e35)\",\"TH-32\":\"Surin (\u0e2a\u0e38\u0e23\u0e34\u0e19\u0e17\u0e23\u0e4c)\",\"TH-63\":\"Tak (\u0e15\u0e32\u0e01)\",\"TH-92\":\"Trang (\u0e15\u0e23\u0e31\u0e07)\",\"TH-23\":\"Trat (\u0e15\u0e23\u0e32\u0e14)\",\"TH-34\":\"Ubon Ratchathani (\u0e2d\u0e38\u0e1a\u0e25\u0e23\u0e32\u0e0a\u0e18\u0e32\u0e19\u0e35)\",\"TH-41\":\"Udon Thani (\u0e2d\u0e38\u0e14\u0e23\u0e18\u0e32\u0e19\u0e35)\",\"TH-61\":\"Uthai Thani (\u0e2d\u0e38\u0e17\u0e31\u0e22\u0e18\u0e32\u0e19\u0e35)\",\"TH-53\":\"Uttaradit (\u0e2d\u0e38\u0e15\u0e23\u0e14\u0e34\u0e15\u0e16\u0e4c)\",\"TH-95\":\"Yala (\u0e22\u0e30\u0e25\u0e32)\",\"TH-35\":\"Yasothon (\u0e22\u0e42\u0e2a\u0e18\u0e23)\"},\"TR\":{\"TR01\":\"Adana\",\"TR02\":\"Ad\u0131yaman\",\"TR03\":\"Afyon\",\"TR04\":\"A\u011fr\u0131\",\"TR05\":\"Amasya\",\"TR06\":\"Ankara\",\"TR07\":\"Antalya\",\"TR08\":\"Artvin\",\"TR09\":\"Ayd\u0131n\",\"TR10\":\"Bal\u0131kesir\",\"TR11\":\"Bilecik\",\"TR12\":\"Bing\u00f6l\",\"TR13\":\"Bitlis\",\"TR14\":\"Bolu\",\"TR15\":\"Burdur\",\"TR16\":\"Bursa\",\"TR17\":\"\u00c7anakkale\",\"TR18\":\"\u00c7ank\u0131r\u0131\",\"TR19\":\"\u00c7orum\",\"TR20\":\"Denizli\",\"TR21\":\"Diyarbak\u0131r\",\"TR22\":\"Edirne\",\"TR23\":\"Elaz\u0131\u011f\",\"TR24\":\"Erzincan\",\"TR25\":\"Erzurum\",\"TR26\":\"Eski\u015fehir\",\"TR27\":\"Gaziantep\",\"TR28\":\"Giresun\",\"TR29\":\"G\u00fcm\u00fc\u015fhane\",\"TR30\":\"Hakkari\",\"TR31\":\"Hatay\",\"TR32\":\"Isparta\",\"TR33\":\"\u0130\u00e7el\",\"TR34\":\"\u0130stanbul\",\"TR35\":\"\u0130zmir\",\"TR36\":\"Kars\",\"TR37\":\"Kastamonu\",\"TR38\":\"Kayseri\",\"TR39\":\"K\u0131rklareli\",\"TR40\":\"K\u0131r\u015fehir\",\"TR41\":\"Kocaeli\",\"TR42\":\"Konya\",\"TR43\":\"K\u00fctahya\",\"TR44\":\"Malatya\",\"TR45\":\"Manisa\",\"TR46\":\"Kahramanmara\u015f\",\"TR47\":\"Mardin\",\"TR48\":\"Mu\u011fla\",\"TR49\":\"Mu\u015f\",\"TR50\":\"Nev\u015fehir\",\"TR51\":\"Ni\u011fde\",\"TR52\":\"Ordu\",\"TR53\":\"Rize\",\"TR54\":\"Sakarya\",\"TR55\":\"Samsun\",\"TR56\":\"Siirt\",\"TR57\":\"Sinop\",\"TR58\":\"Sivas\",\"TR59\":\"Tekirda\u011f\",\"TR60\":\"Tokat\",\"TR61\":\"Trabzon\",\"TR62\":\"Tunceli\",\"TR63\":\"\u015eanl\u0131urfa\",\"TR64\":\"U\u015fak\",\"TR65\":\"Van\",\"TR66\":\"Yozgat\",\"TR67\":\"Zonguldak\",\"TR68\":\"Aksaray\",\"TR69\":\"Bayburt\",\"TR70\":\"Karaman\",\"TR71\":\"K\u0131r\u0131kkale\",\"TR72\":\"Batman\",\"TR73\":\"\u015e\u0131rnak\",\"TR74\":\"Bart\u0131n\",\"TR75\":\"Ardahan\",\"TR76\":\"I\u011fd\u0131r\",\"TR77\":\"Yalova\",\"TR78\":\"Karab\u00fck\",\"TR79\":\"Kilis\",\"TR80\":\"Osmaniye\",\"TR81\":\"D\u00fczce\"},\"US\":{\"AL\":\"Alabama\",\"AK\":\"Alaska\",\"AZ\":\"Arizona\",\"AR\":\"Arkansas\",\"CA\":\"California\",\"CO\":\"Colorado\",\"CT\":\"Connecticut\",\"DE\":\"Delaware\",\"DC\":\"District Of Columbia\",\"FL\":\"Florida\",\"GA\":\"Georgia\",\"HI\":\"Hawaii\",\"ID\":\"Idaho\",\"IL\":\"Illinois\",\"IN\":\"Indiana\",\"IA\":\"Iowa\",\"KS\":\"Kansas\",\"KY\":\"Kentucky\",\"LA\":\"Louisiana\",\"ME\":\"Maine\",\"MD\":\"Maryland\",\"MA\":\"Massachusetts\",\"MI\":\"Michigan\",\"MN\":\"Minnesota\",\"MS\":\"Mississippi\",\"MO\":\"Missouri\",\"MT\":\"Montana\",\"NE\":\"Nebraska\",\"NV\":\"Nevada\",\"NH\":\"New Hampshire\",\"NJ\":\"New Jersey\",\"NM\":\"New Mexico\",\"NY\":\"New York\",\"NC\":\"North Carolina\",\"ND\":\"North Dakota\",\"OH\":\"Ohio\",\"OK\":\"Oklahoma\",\"OR\":\"Oregon\",\"PA\":\"Pennsylvania\",\"RI\":\"Rhode Island\",\"SC\":\"South Carolina\",\"SD\":\"South Dakota\",\"TN\":\"Tennessee\",\"TX\":\"Texas\",\"UT\":\"Utah\",\"VT\":\"Vermont\",\"VA\":\"Virginia\",\"WA\":\"Washington\",\"WV\":\"West Virginia\",\"WI\":\"Wisconsin\",\"WY\":\"Wyoming\",\"AA\":\"Armed Forces (AA)\",\"AE\":\"Armed Forces (AE)\",\"AP\":\"Armed Forces (AP)\"}}","i18n_select_state_text":"Select an option\u2026","i18n_matches_1":"One result is available, press enter to select it.","i18n_matches_n":"%qty% results are available, use up and down arrow keys to navigate.","i18n_no_matches":"No matches found","i18n_ajax_error":"Loading failed","i18n_input_too_short_1":"Please enter 1 or more characters","i18n_input_too_short_n":"Please enter %qty% or more characters","i18n_input_too_long_1":"Please delete 1 character","i18n_input_too_long_n":"Please delete %qty% characters","i18n_selection_too_long_1":"You can only select 1 item","i18n_selection_too_long_n":"You can only select %qty% items","i18n_load_more":"Loading more results\u2026","i18n_searching":"Searching\u2026"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/country-select.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_address_i18n_params = {"locale":"{\"AE\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"AF\":{\"state\":{\"required\":false}},\"AT\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"AU\":{\"city\":{\"label\":\"Suburb\"},\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"State\"}},\"AX\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"BD\":{\"postcode\":{\"required\":false},\"state\":{\"label\":\"District\"}},\"BE\":{\"postcode_before_city\":true,\"state\":{\"required\":false,\"label\":\"Province\"}},\"BI\":{\"state\":{\"required\":false}},\"BO\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"BS\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"CA\":{\"state\":{\"label\":\"Province\"}},\"CH\":{\"postcode_before_city\":true,\"state\":{\"label\":\"Canton\",\"required\":false}},\"CL\":{\"city\":{\"required\":true},\"postcode\":{\"required\":false},\"state\":{\"label\":\"Region\"}},\"CN\":{\"state\":{\"label\":\"Province\"}},\"CO\":{\"postcode\":{\"required\":false}},\"CZ\":{\"state\":{\"required\":false}},\"DE\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"DK\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"EE\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"FI\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"FR\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"HK\":{\"postcode\":{\"required\":false},\"city\":{\"label\":\"Town \\\/ District\"},\"state\":{\"label\":\"Region\"}},\"HU\":{\"state\":{\"label\":\"County\"}},\"ID\":{\"state\":{\"label\":\"Province\"}},\"IE\":{\"postcode\":{\"required\":false,\"label\":\"Postcode\"}},\"IS\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"IL\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"IT\":{\"postcode_before_city\":true,\"state\":{\"required\":true,\"label\":\"Province\"}},\"JP\":{\"state\":{\"label\":\"Prefecture\"}},\"KR\":{\"state\":{\"required\":false}},\"NL\":{\"postcode_before_city\":true,\"state\":{\"required\":false,\"label\":\"Province\"}},\"NZ\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"required\":false,\"label\":\"Region\"}},\"NO\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"NP\":{\"state\":{\"label\":\"State \\\/ Zone\"},\"postcode\":{\"required\":false}},\"PL\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"PT\":{\"state\":{\"required\":false}},\"RO\":{\"state\":{\"required\":false}},\"SG\":{\"state\":{\"required\":false}},\"SK\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"SI\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"ES\":{\"postcode_before_city\":true,\"state\":{\"label\":\"Province\"}},\"LI\":{\"postcode_before_city\":true,\"state\":{\"label\":\"Municipality\",\"required\":false}},\"LK\":{\"state\":{\"required\":false}},\"SE\":{\"postcode_before_city\":true,\"state\":{\"required\":false}},\"TR\":{\"postcode_before_city\":true,\"state\":{\"label\":\"Province\"}},\"US\":{\"postcode\":{\"label\":\"ZIP\"},\"state\":{\"label\":\"State\"}},\"GB\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"County\",\"required\":false}},\"VN\":{\"postcode_before_city\":true,\"state\":{\"required\":false},\"postcode\":{\"required\":false,\"hidden\":false},\"address_2\":{\"required\":false,\"hidden\":true}},\"WS\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"ZA\":{\"state\":{\"label\":\"Province\"}},\"ZW\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"default\":{\"first_name\":{\"label\":\"First Name\",\"required\":true,\"class\":[\"form-row-first\"],\"autocomplete\":\"given-name\"},\"last_name\":{\"label\":\"Last Name\",\"required\":true,\"class\":[\"form-row-last\"],\"clear\":true,\"autocomplete\":\"family-name\"},\"company\":{\"label\":\"Company Name\",\"class\":[\"form-row-wide\"],\"autocomplete\":\"organization\"},\"country\":{\"type\":\"country\",\"label\":\"Country\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\",\"update_totals_on_change\"],\"autocomplete\":\"country\"},\"address_1\":{\"label\":\"Address\",\"placeholder\":\"Street address\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line1\"},\"address_2\":{\"placeholder\":\"Apartment, suite, unit etc. (optional)\",\"class\":[\"form-row-wide\",\"address-field\"],\"required\":false,\"autocomplete\":\"address-line2\"},\"city\":{\"label\":\"Town \\\/ City\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-level2\"},\"state\":{\"type\":\"state\",\"label\":\"State \\\/ County\",\"required\":true,\"class\":[\"form-row-first\",\"address-field\"],\"validate\":[\"state\"],\"autocomplete\":\"address-level1\"},\"postcode\":{\"label\":\"Postcode \\\/ ZIP\",\"required\":true,\"class\":[\"form-row-last\",\"address-field\"],\"clear\":true,\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\"}}}","locale_fields":"{\"address_1\":\"#billing_address_1_field, #shipping_address_1_field\",\"address_2\":\"#billing_address_2_field, #shipping_address_2_field\",\"state\":\"#billing_state_field, #shipping_state_field, #calc_shipping_state_field\",\"postcode\":\"#billing_postcode_field, #shipping_postcode_field, #calc_shipping_postcode_field\",\"city\":\"#billing_city_field, #shipping_city_field, #calc_shipping_city_field\"}","i18n_required_text":"required"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/address-i18n.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/cart\/?wc-ajax=%%endpoint%%","update_shipping_method_nonce":"f1e86fd4a0","apply_coupon_nonce":"e831a84b09","remove_coupon_nonce":"ad7368688a"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/cart.min.js'></script>
<script type='text/javascript' src='/scripts/jquery.blockui.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/cart\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/woocommerce.min.js'></script>
<script type='text/javascript' src='/scripts/jquery.cookie.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/cart\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/cart-fragments.min.js'></script>
<script type='text/javascript' src='/scripts/wp-embed.min.js'></script>
<script type='text/javascript' src='/scripts/modernizr.min.js'></script>
<script type='text/javascript' src='/scripts/jquery.unveil.min.js'></script>
<script type='text/javascript' src='/scripts/slick.min.js'></script>
<script type='text/javascript' src='/scripts/jquery.magnific-popup.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var nm_wp_vars = {"themeUri":"http:\/\/cdn.savoy.nordicmade.com\/wp-content\/themes\/savoy","ajaxUrl":"\/wp-admin\/admin-ajax.php","searchUrl":"http:\/\/savoy.nordicmade.com\/?s=","pageLoadTransition":"0","shopFiltersAjax":"1","shopAjaxUpdateTitle":"1","shopImageLazyLoad":"1","shopScrollOffset":"70","shopScrollOffsetTablet":"70","shopScrollOffsetMobile":"70","shopSearch":"shop","shopSearchMinChar":"2","shopSearchAutoClose":"1","shopAjaxAddToCart":"1","shopRedirectScroll":"1","shopCustomSelect":"1","wpGalleryPopup":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='/scripts/nm-core.min.js'></script>
<script type='text/javascript' src='/scripts/selectod.custom.min.js'></script>
<script type='text/javascript' src='/scripts/nm-shop.min.js'></script>
<script type='text/javascript' src='/scripts/nm-shop-cart.min.js'></script>
        
        </div>
        <!-- /page overflow wrapper -->
    	
	</body>
    
</html>
