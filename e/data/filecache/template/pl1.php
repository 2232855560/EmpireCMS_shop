<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$pagetitle?> 信息评论 - Powered by EmpireCMS</title>
<meta name="keywords" content="<?=$pagetitle?> 信息评论" />
<meta name="description" content="<?=$pagetitle?> 信息评论" />
<style type="text/css">
<!--
body,Table{ color: #222; font-size: 12px; }
a { color: #222; text-decoration: none; }
a:hover { color: #f00; text-decoration: underline; }
h1 { font-size:32px; font-weight: bold; }
h2 { color: #1e3a9e; font-size: 25px; font-weight: bold;  }
.you { color: #1f3a87; font-size: 14px; }
.text { font-size: 14px; padding-left: 5px; padding-right: 5px; line-height: 20px}
.re a { color: #1f3a87; }
.name { color: #1f3a87; }
.name a { color: #1f3a87; text-decoration: underline;}
.retext { background-color: #f3f3f3; width: 100%; float: left; padding-top: 22px; padding-bottom: 22px; border-top: 1px solid #ccc; }
.retext textarea { width: 535px; height: 130px; float: left; margin-left: 60px; border-top-style: inset; border-top-width: 2px; border-left-style: inset; border-left-width: 2px; }
.hrLine{BORDER-BOTTOM: #807d76 1px dotted;}

.ecomment {margin:0;padding:0;}
.ecomment {margin-bottom:12px;overflow-x:hidden;overflow-y:hidden;padding-bottom:3px;padding-left:3px;padding-right:3px;padding-top:3px;background:#FFFFEE;padding:3px;border:solid 1px #999;}
.ecommentauthor {float:left; color:#F96; font-weight:bold;}
.ecommenttext {clear:left;margin:0;padding:0;}
-->
</style>
<script src="/e/data/js/ajax.js"></script>
</head>

<body topmargin="0">
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td width="210"><a href="/"><img src="/skin/default/images/logo.gif" border="0" /></a></td>
    <td><h1>网友评论</h1></td>
    <td><div align="right"><a href="#tosaypl"><strong><font color="#FF0000">我也评两句</font></strong></a></div></td>
  </tr>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#222">
  <tr>
    <td height="2"></td>
  </tr>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td height="42"> 
      <h2>评论：<a href="<?=$titleurl?>" target="_blank"><font color="#1e3a9e"><?=$title?></font></a></h2></td>
    <td><div align="right"><a href="<?=$titleurl?>" target="_blank">查看原文</a></div></td>
  </tr>
</table>
<hr align="center" width="766" size=1 class=hrline>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#384EA3">
  <form action="../enews/index.php" method="post" name="infopfenform">
    <input type="hidden" name="enews" value="AddInfoPfen" />
    <input type="hidden" name="classid" value="<?=$classid?>" />
    <input type="hidden" name="id" value="<?=$id?>" />
    <tr> 
      <td width="50%" height="27" valign="middle"><font color="#FFFFFF">&nbsp;评分: 
        <input type="radio" name="fen" value="1">
        1分 
        <input type="radio" name="fen" value="2">
        2分 
        <input name="fen" type="radio" value="3" checked>
        3分 
        <input type="radio" name="fen" value="4">
        4分 
        <input type="radio" name="fen" value="5">
        5分 
        <input type="submit" name="Submit" value="提交">
        </font></td>
      <td width="50%" valign="middle"><div align="center"><font color="#FFFFFF">平均得分: 
          <strong><span id="pfendiv"><?=$pinfopfen?></span></strong> 分，共有 <strong><?=$infopfennum?></strong> 
          人参与评分</font></div></td>
    </tr>
  </form>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr> 
    <td height="30" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="17%">&nbsp;&nbsp;&nbsp;网友评论</td>
          <td width="83%"><div align="right"><?=$listpage?>&nbsp;&nbsp;&nbsp;</div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#f8fcff"> 
<?php
while($r=$empire->fetch($sql))
{
	$plusername=$r[username];
	if(empty($r[username]))
	{
		$plusername=$fun_r['nomember'];
	}
	if($r[userid])
	{
		$plusername="<a href='$public_r[newsurl]e/space/?userid=$r[userid]' target='_blank'>$r[username]</a>";
	}
	$saytime=date('Y-m-d H:i:s',$r['saytime']);
	//ip
	$sayip=ToReturnXhIp($r[sayip]);
	$saytext=RepPltextFace(stripSlashes($r['saytext']));//替换表情
	$includelink=" onclick=\"javascript:document.saypl.repid.value='".$r[plid]."';document.saypl.saytext.focus();\"";
?>
 
      <table width="96%" border="0" align="center" cellpadding="3" cellspacing="1" style="word-break:break-all; word-wrap:break-all;">
        <tr> 
          <td height="30"><span class="name">本站网友 <?=$plusername?></span> <font color="#666666">ip:<?=$sayip?></font></td>
          <td><div align="right"><font color="#666666"><?=$saytime?> 发表</font></div></td>
        </tr>
        <tr valign="top"> 
          <td height="50" colspan="2" class="text"><?=$saytext?></td>
        </tr>
        <tr> 
          <td height="30">&nbsp;</td>
          <td><div align="right" class="re"><a href="#tosaypl"<?=$includelink?>>回复</a>&nbsp; 
              <a href="JavaScript:makeRequest('../pl/doaction.php?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=1&doajax=1&ajaxarea=zcpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">支持</a>[<span id="zcpldiv<?=$r[plid]?>"><?=$r[zcnum]?></span>]&nbsp; 
              <a href="JavaScript:makeRequest('../pl/doaction.php?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=0&doajax=1&ajaxarea=fdpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">反对</a>[<span id="fdpldiv<?=$r[plid]?>"><?=$r[fdnum]?></span>]
            </div></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td background="/skin/default/images/plhrbg.gif"></td>
        </tr>
      </table>
      
<?
}
?>
 
      <div align="right"><br />
        <?=$listpage?>&nbsp;&nbsp;&nbsp;<br />
        <br />
        <font color="#FF0000">网友评论仅供网友表达个人看法，并不表明本站同意其观点或证实其描述&nbsp;&nbsp;&nbsp;</font><br><br> </div></td>
  </tr>
  <script>
  function CheckPl(obj)
  {
  	if(obj.saytext.value=="")
  	{
  		alert("错误，评论不能为空");
  		obj.saytext.focus();
  		return false;
  	}
  	return true;
  }
  </script>
  <form action="../pl/doaction.php" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
  <tr id="tosaypl"> 
    <td bgcolor="#f8fcff"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
            <td width="13%" height="28">&nbsp;&nbsp;&nbsp;<span class="you">我也评两句</span></td>
            <td valign="middle">用户名： 
              <input name="username" type="text" id="username" size="12" value="<?=$lusername?>" />
            密码： 
            <input name="password" type="password" id="password" size="12" value="<?=$lpassword?>" />
            验证码： 
            <input name="key" type="text" id="key" size="6" />
              <img src="/e/ShowKey/?v=pl" align="middle" name="plKeyImg" id="plKeyImg" onclick="plKeyImg.src='/e/ShowKey/?v=pl&t='+Math.random()" title="看不清楚,点击刷新" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/e/member/register/" target="_blank">还没有注册？</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#f8fcff"> <table width="100%" border="0" cellspacing="1" cellpadding="3" class="retext">
        <tr> 
          <td width="78%"><div align="center"> 
              <textarea name="saytext" cols="58" rows="6" id="saytext"></textarea>
            </div></td>
          <td width="22%" rowspan="2"> <div align="center">
              <input name="nomember" type="checkbox" id="nomember" value="1" checked="checked" />
                匿名发表<br>
                <br />
              <input name="imageField" type="submit" id="imageField" value=" 提 交 " />
            </div></td>
        </tr>
        <tr> 
          <td><div align="center"> 
              <script src="/d/js/js/plface.js"></script>
            </div></td>
        </tr>
      </table> </td>
  </tr>
  <input name="id" type="hidden" id="id" value="<?=$id?>" />
  <input name="classid" type="hidden" id="classid" value="<?=$classid?>" />
  <input name="enews" type="hidden" id="enews" value="AddPl" />
  <input name="repid" type="hidden" id="repid" value="0" />
  </form>
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