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
<?php
}

//网页标题
$thispagetitle=$public_diyr['pagetitle']?$public_diyr['pagetitle']:'会员中心';
//会员信息
$tmgetuserid=(int)getcvar('mluserid');	//用户ID
$tmgetusername=RepPostVar(getcvar('mlusername'));	//用户名
$tmgetgroupid=(int)getcvar('mlgroupid');	//用户组ID
$tmgetgroupname='游客';
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}

//模型
$tgetmid=(int)$_GET['mid'];
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
    <tr> 
      <td height="27" bgcolor="#FFFFFF"><strong>订单号: 
        <?=$ddno?>
        <input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>">
        </strong></td>
    </tr>
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
			<span class="wc_payment_method payment_method_cheque active">
				<?=$showpayfs?>
			</span>
				
			
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
<script type='text/javascript' src='/scripts/country-select.min.js'></script>
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
