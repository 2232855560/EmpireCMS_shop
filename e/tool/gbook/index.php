<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//分类id
$bid=(int)$_GET['bid'];
$gbr=$empire->fetch1("select bid,bname,groupid from {$dbtbpre}enewsgbookclass where bid='$bid'");
if(empty($gbr['bid']))
{
	printerror("EmptyGbook","",1);
}
//权限
if($gbr['groupid'])
{
	include("../../member/class/user.php");
	$user=islogin();
	include("../../data/dbcache/MemberLevel.php");
	if($level_r[$gbr[groupid]][level]>$level_r[$user[groupid]][level])
	{
		echo"<script>alert('您的会员级别不足(".$level_r[$gbr[groupid]][groupname].")，没有权限提交信息!');history.go(-1);</script>";
		exit();
	}
}
esetcookie("gbookbid",$bid,0);
$bname=$gbr['bname'];
$search="&bid=$bid";
$page=(int)$_GET['page'];
$page=RepPIntvar($page);
$start=0;
$line=$public_r['gb_num'];//每页显示条数
$page_line=12;//每页显示链接数
$offset=$start+$page*$line;//总偏移量
$totalnum=(int)$_GET['totalnum'];
if($totalnum>0)
{
	$num=$totalnum;
}
else
{
	$totalquery="select count(*) as total from {$dbtbpre}enewsgbook where bid='$bid' and checked=0";
	$num=$empire->gettotal($totalquery);//取得总条数
}
$search.="&totalnum=$num";
$query="select lyid,name,email,`mycall`,lytime,lytext,retext from {$dbtbpre}enewsgbook where bid='$bid' and checked=0";
$query=$query." order by lyid desc limit $offset,$line";
$sql=$empire->query($query);
$listpage=page1($num,$line,$page_line,$start,$page,$search);
$url="<a href='".ReturnSiteIndexUrl()."'>".$fun_r['index']."</a>&nbsp;>&nbsp;".$fun_r['saygbook'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板 - Powered by EmpireCMS</title>
<meta name="keywords" content="<?=$bname?>" />
<meta name="description" content="<?=$bname?>" />
<link href="/skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
</head>
<body class="listpage">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%">
<!-- 登录 -->
<script>
document.write('<script src="/e/member/login/loginjs.php?t='+Math.random()+'"><'+'/script>');
</script>
</td>
<td align="right">
<a onclick="window.external.addFavorite(location.href,document.title)" href="#ecms">加入收藏</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('/')" href="#ecms">设为首页</a> | <a href="/e/member/cp/">会员中心</a> | <a href="/e/DoInfo/">我要投稿</a> | <a href="/e/web/?type=rss2" target="_blank">RSS<img src="/skin/default/images/rss.gif" border="0" hspace="2" /></a>
</td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="10">
<tr valign="middle">
<td width="240" align="center"><a href="/"><img src="/skin/default/images/logo.gif" width="200" height="65" border="0" /></a></td>
<td align="center"><a href="http://www.phome.net/OpenSource/" target="_blank"><img src="/skin/default/images/opensource.gif" width="100%" height="70" border="0" /></a></td>
</tr>
</table>
<!-- 导航tab选项卡 -->
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
  <tr> 
    <td class="nav_global"><ul>
        <li class="curr" id="tabnav_btn_0" onmouseover="tabit(this)"><a href="/">首页</a></li>
        <li id="tabnav_btn_1" onmouseover="tabit(this)"><a href="/news/">新闻中心</a></li>
        <li id="tabnav_btn_2" onmouseover="tabit(this)"><a href="/download/">下载中心</a></li>
        <li id="tabnav_btn_3" onmouseover="tabit(this)"><a href="/movie/">影视频道</a></li>
        <li id="tabnav_btn_4" onmouseover="tabit(this)"><a href="/shop/">网上商城</a></li>
        <li id="tabnav_btn_5" onmouseover="tabit(this)"><a href="/flash/">FLASH频道</a></li>
        <li id="tabnav_btn_6" onmouseover="tabit(this)"><a href="/photo/">图片频道</a></li>
        <li id="tabnav_btn_7" onmouseover="tabit(this)"><a href="/article/">文章中心</a></li>
        <li id="tabnav_btn_8" onmouseover="tabit(this)"><a href="/info/">分类信息</a></li>
      </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="list_content"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
<tr>
<td>现在的位置：<a href=../../../>首页</a>&nbsp;>&nbsp;<?=$bname?>
</td>
</tr>
</table><table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
	<tr>
		<td><table width="100%" border="0" cellpadding="3" cellspacing="2">
			<tr>
				<td align="center" bgcolor="#E1EFFB"><strong><?=$bname?></strong></td>
			</tr>
			<tr>
				<td align="left" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF">
						<tr>
							<td height="100%" valign="top" bgcolor="#FFFFFF"> 
<?
while($r=$empire->fetch($sql))
{
	$r['retext']=nl2br($r[retext]);
	$r['lytext']=nl2br($r[lytext]);
?>

								<table width="92%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#F4F9FD" class="tableborder">
										<tr class="header">
											<td width="55%" height="23">发布者: <?=$r[name]?> </td>
											<td width="45%">发布时间: <?=$r[lytime]?> </td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td height="23" colspan="2"><table border="0" width="100%" cellspacing="1" cellpadding="8" bgcolor='#cccccc'>
													<tr>
														<td width='100%' bgcolor='#FFFFFF' style='word-break:break-all'> <?=$r[lytext]?> </td>
													</tr>
												</table>
												
<?
if($r[retext])
{
?>

												<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
													<tr>
														<td><img src="../../data/images/regb.gif" width="18" height="18" /><strong><font color="#FF0000">回复:</font></strong> <?=$r[retext]?> </td>
													</tr>
												</table>
												
<?
}
?> </td>
										</tr>
									</table>
								<br />
								
<?
}
?>

								<table width="92%" border="0" align="center" cellpadding="4" cellspacing="1">
									<tr>
										<td>分页: <?=$listpage?></td>
									</tr>
								</table>
								<form action="../../enews/index.php" method="post" name="form1" id="form1">
									<table width="92%" border="0" align="center" cellpadding="4" cellspacing="1"class="tableborder">
										<tr class="header">
											<td colspan="2" bgcolor="#F4F9FD"><strong>请您留言:</strong></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td width="20%">姓名:</td>
											<td width="722" height="23"><input name="name" type="text" id="name" />
												*</td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td>联系邮箱:</td>
											<td height="23"><input name="email" type="text" id="email" />
												*</td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td>联系电话:</td>
											<td height="23"><input name="mycall" type="text" id="mycall" /></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td>留言内容(*):</td>
											<td height="23"><textarea name="lytext" cols="60" rows="12" id="lytext"></textarea></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td height="23">&nbsp;</td>
											<td height="23"><input type="submit" name="Submit3" value="提交" />
											<input type="reset" name="Submit22" value="重置" />
											<input name="enews" type="hidden" id="enews" value="AddGbook" /></td>
										</tr>
									</table>
								</form></td>
						</tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
</table></td>
</tr>
</table>
<footer id="nm-footer" class="nm-footer">
			<div class="nm-footer-bar">
				<div class="nm-footer-bar-inner">
					<div class="nm-row">
						<div class="nm-footer-bar-left col-md-8 col-xs-12">
							<ul id="nm-footer-bar-menu" class="menu">
								<li id="menu-item-386" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-386"><a href="/abouts.html">关于我们</a></li>
								<li id="menu-item-384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384"><a href="/eq.html">帮助中心</a></li>
								<li id="menu-item-385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385"><a href="/contact.html">联系我们</a></li>
								<li class="nm-footer-bar-text menu-item"><div>© By <a href="http://www.lehucloud.com">LehuCloud</a></div></li>
							</ul>
						</div>
						<div class="nm-footer-bar-right col-md-4 col-xs-12">
						<ul class="nm-footer-bar-social">
							<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</footer>
		<div id="nm-mobile-menu" class="nm-mobile-menu">
                <div class="nm-mobile-menu-scroll">
                    <div class="nm-mobile-menu-content">
                        <div class="nm-row">
                            <div class="nm-mobile-menu-top col-xs-12">
                                <ul id="nm-mobile-menu-top-ul" class="menu">
                                    <li class="nm-mobile-menu-item-cart menu-item">
                                        <a href="/e/ShopSys/buycar/" id="nm-mobile-menu-cart-btn">
                                            <span class="nm-menu-cart-title">
                                               购物车
                                            </span>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nm-mobile-menu-main col-xs-12">
                                <ul id="nm-mobile-menu-main-ul" class="menu">
                                    <li class="shop-link menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children current-menu-item current_page_item menu-item-20">
                                        <a href="http://haohuo.029mh.com/">
                                            首页
                                        </a>
                                        <span class="nm-menu-toggle">
                                        </span>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-391">
                                        <a href="/product">
                                            产品中心
                                        </a>
                                        <span class="nm-menu-toggle">
                                        </span>
                                        [showclasstemp]1,13,0,0[/showclasstemp]
                                    </li>
                                    <li class="megamenu col-3 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-271">
                                        <a href="/abouts.html">
                                            关于我们
                                        </a>
                                        <span class="nm-menu-toggle">
                                        </span>
                                    </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
							<div class="nm-mobile-menu-secondary col-xs-12">
                                <ul id="nm-mobile-menu-secondary-ul" class="menu">
                                    <script src="/e/member/login/loginjs_mb.php"></script>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<div id="nm-widget-panel" class="nm-widget-panel">
			<div class="nm-widget-panel-inner"><div class="nm-widget-panel-header">
			<div class="nm-widget-panel-header-inner"> <a href="#" id="nm-widget-panel-close"> 
				<span class="nm-cart-panel-title">Cart <span class="nm-menu-cart-count count">0</span></span> 
				<span class="nm-widget-panel-close-title">Close</span> 
				</a>
				</div>
				</div>
				<div class="widget_shopping_cart_content">
					<div id="nm-cart-panel" class="nm-cart-panel-empty">
						<div id="nm-cart-panel-loader"><h5 class="nm-loader">Updating&hellip;</h5></div>
						<div class="nm-cart-panel-list-wrap">
							<ul class="cart_list product_list_widget "><li class="empty">No products in the cart.</li></ul>
						</div>
						<div class="nm-cart-panel-summary">
							<div class="nm-cart-panel-summary-inner">
								<p class="buttons nm-cart-empty-button">
									<a href="http://savoy.nordicmade.com/" id="nm-cart-panel-continue" class="button border">Continue Shopping</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="nm-quickview" class="clearfix"></div>
		<div id="nm-page-includes" class="quickview products banner-slider banner shop_categories shop_filters " style="display:none;">&nbsp;</div> 
		<script type="text/template" id="tmpl-variation-template">
		
		<div class="woocommerce-variation-description">
		{{{ data.variation.variation_description }}}
			</div>

    <div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>

    <div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
		</script> 
		<script type="text/template" id="tmpl-unavailable-variation-template"><p>Sorry, this product is unavailable. Please choose a different combination.</p></script> 
		
		<script type='text/javascript'>/*  */
var nm_wp_vars = {"themeUri":"http:\/\/haohuo.029mh.com\","\/":"","searchUrl":"http:\/\/haohuo.029mh.com\/?s=","pageLoadTransition":"0","shopFiltersAjax":"1","shopAjaxUpdateTitle":"1","shopImageLazyLoad":"1","shopScrollOffset":"70","shopScrollOffsetTablet":"70","shopScrollOffsetMobile":"70","shopSearch":"shop","shopSearchMinChar":"2","shopSearchAutoClose":"1","shopAjaxAddToCart":"1","shopRedirectScroll":"1","shopCustomSelect":"1","wpGalleryPopup":"1"};
/*  */</script> 
		<!-- <script type='text/javascript'>/*  */
var _wpUtilSettings = {"ajax":{"url":"\/[!--class.id--]"}};
/*  */</script>  -->
		<script type='text/javascript'>/*  */
var wc_add_to_cart_variation_params = {"i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
/*  */</script> 
		<script type='text/javascript'>/*  */
var nm_wishlist_vars = {"wlButtonTitleAdd":"Add to Wishlist","wlButtonTitleRemove":"Remove from Wishlist"};
/*  */</script> 
		<script src="scripts/1179d34135e6a7dae4d28531d9c681e3.js" data-minify="1"></script>
		<script src="scripts/b9e3d9a907aea99495296c26edb361a8.js" data-minify="1"></script>
		<script src="scripts/8f5532cf724f8e8bbffcefe0909b4601.js" data-minify="1"></script> 
		</div>
	</body>
</html>
</body>
</html>
<?php
db_close();
$empire=null;
?>