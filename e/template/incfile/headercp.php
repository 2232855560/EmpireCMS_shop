<?php

if(!defined('InEmpireCMS'))

{

	exit();

}



//--------------- 界面参数 ---------------



//会员界面附件地址前缀

$memberskinurl=$public_r['newsurl'].'skin/member/images/';



//LOGO图片地址

$logoimgurl=$memberskinurl.'logo.jpg';



//加减号图片地址

$addimgurl=$memberskinurl.'add.gif';

$noaddimgurl=$memberskinurl.'noadd.gif';



//上下横线背景色

$bgcolor_line='#4FB4DE';



//其它色调可修改CSS部分



//--------------- 界面参数 ---------------





//识别并显示当前菜单

function EcmsShowThisMemberMenu(){

	global $memberskinurl,$noaddimgurl;

	$selffile=eReturnSelfPage(0);

	if(stristr($selffile,'/member/msg'))

	{

		$menuname='menumsg';

	}

	elseif(stristr($selffile,'e/DoInfo'))

	{

		$menuname='menuinfo';

	}

	elseif(stristr($selffile,'/member/mspace'))

	{

		$menuname='menuspace';

	}

	elseif(stristr($selffile,'e/ShopSys'))

	{

		$menuname='menushop';

	}

	elseif(stristr($selffile,'e/payapi')||stristr($selffile,'/member/buygroup')||stristr($selffile,'/member/card')||stristr($selffile,'/member/buybak')||stristr($selffile,'/member/downbak'))

	{

		$menuname='menupay';

	}

	else

	{

		$menuname='menumember';

	}

	echo'<script>turnit(do'.$menuname.',"'.$menuname.'img");</script>';

	?>

	<script>

	do<?=$menuname?>.style.display="";

	document.images.<?=$menuname?>img.src="<?=$noaddimgurl?>";

	</script>

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

<header id="nm-header" class="nm-header centered clear ">

                        <div class="nm-header-inner">

                            <div class="nm-row">

                                <div class="nm-header-logo">

                                    <a href="http://savoy.nordicmade.com/">

                                        <img src="/picture/logo@2x.png" class="nm-logo" alt="Savoy">

                                    </a>

                                </div>

                                <div class="nm-main-menu-wrap col-xs-6">

                                    <nav class="nm-main-menu">

                                        <ul id="nm-main-menu-ul" class="nm-menu">

                                            <li class="nm-menu-offscreen menu-item">

                                                <span class="nm-menu-cart-count count nm-count-zero">

                                                    0

                                                </span>

                                                <a href="#" id="nm-mobile-menu-button" class="clicked">

                                                    <div class="nm-menu-icon">

                                                        <span class="line-1">

                                                        </span>

                                                        <span class="line-2">

                                                        </span>

                                                        <span class="line-3">

                                                        </span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li id="menu-item-20" class="shop-link menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-20">

                                                <a href="/">

                                                    首页

                                                </a>

                                            </li>

                                            <li id="menu-item-391" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-391">

                                                <a href="/product">

                                                    产品中心

                                                </a>

                                            </li>

                                            <li id="menu-item-271" class="megamenu col-3 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-271">

                                                <a href="/abouts.html">



                                                    关于我们

                                                </a>

                                            </li>

                                        </ul>

                                    </nav>

                                </div>

                                <!--登陆状态开始-->

								<div class="nm-right-menu-wrap col-xs-6">

                    <nav class="nm-right-menu">

                        <ul id="nm-right-menu-ul" class="nm-menu">

	<?php

	if($tmgetuserid)	//已登录

	{

	?>

                                                        <li class="nm-menu-account menu-item">

                            	<a href="/e/member/cp" id="nm-menu-account-btn"><?=$tmgetusername?></a>							</li>

							                            <li class="nm-menu-cart menu-item no-icon">

                                <a href="/e/ShopSys/buycar/" id="nm-menu-cart-btn">

                                    <span class="nm-menu-cart-title">Cart</span>									

									<span class="nm-menu-cart-count count nm-count-zero"><script src="/e/ShopSys/buycar/buycarjs.php"></script></span>                                </a>

                            </li>

                                                    </ul>

                    </nav>

                </div>

<?php

	}

	else	//游客

	{

	?>

<div class="nm-right-menu-wrap col-xs-6">

                    <nav class="nm-right-menu">

                        <ul id="nm-right-menu-ul" class="nm-menu">

                                            <li class="nm-menu-account menu-item">

                            	<a href="<?=$public_r['newsurl']?>e/member/login/" id="nm-menu-account-btn">Login</a>							

						                    </li>

                                        </ul>

                                    </nav>

                                </div>

<?php

	}

	?>

								<!--登陆状态结束-->

                            </div>

                        </div>

                    </header>