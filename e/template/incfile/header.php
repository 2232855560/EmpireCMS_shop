<?php

$muserid=(int)getcvar('mluserid');

$member=$empire->fetch1("select userpic from phome_enewsmemberadd where userid='$muserid'");

?>

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



<!DOCTYPE html>

<html lang="zh-CN" >

<head>

    <meta charset="utf-8">

     

  <title><?=$thispagetitle?></title>



    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="<?=$public_r['newsurl']?>skin_member/css/animate.css" type="text/css" />

    <link rel="stylesheet" href="<?=$public_r['newsurl']?>skin_member/css/font-awesome.min.css" type="text/css" />

    <link rel="stylesheet" href="<?=$public_r['newsurl']?>skin_member/css/bootstrap.css" type="text/css" />



    <!-- Custom CSS -->

    <link href="<?=$public_r['newsurl']?>skin_member/css/angulr-admin.css" rel="stylesheet">



    <link rel="stylesheet" href="<?=$public_r['newsurl']?>skin_member/css/font.css" type="text/css" />

    <link rel="stylesheet" href="<?=$public_r['newsurl']?>skin_member/css/app.css" type="text/css" />



    <script src="<?=$public_r['newsurl']?>skin_member/js/jquery.js"></script>

    <script src="<?=$public_r['newsurl']?>skin_member/js/zbp_add.js"></script>

    <!-- ZCenter js-->

    <!-- zbp system -->

    <script src="<?=$public_r['newsurl']?>skin_member/js/zblogphp.js" type="text/javascript"></script>

    <script src="<?=$public_r['newsurl']?>skin_member/js/c_admin_js_add.js" type="text/javascript"></script>

<!--

    <script src="<?=$public_r['newsurl']?>skin_member/js/jquery-ui.custom.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?=$public_r['newsurl']?>skin_member/css/jquery-ui.custom.css"/>

-->

    <script src="<?=$public_r['newsurl']?>skin_member/js/functions.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="<?=$public_r['newsurl']?>skin_member/js/html5shiv.js"></script>

        <script src="<?=$public_r['newsurl']?>skin_member/js/respond.min.js"></script>

    <![endif]-->

    

</head>

<body>





<div class="app app-header-fixed ">

  



    <!-- header -->

  <header id="header" class="app-header navbar" role="menu">

      <!-- navbar header -->

      <div class="navbar-header bg-info dker">

        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">

          <i class="glyphicon glyphicon-cog"></i>

        </button>

        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">

          <i class="glyphicon glyphicon-align-justify"></i>

        </button>

        <!-- brand -->

        <a target="_blank"  href="<?=$public_r['newsurl']?>" class="navbar-brand text-lt">

<img src="<?=$public_r['newsurl']?>skin_member/picture/logo.png">

<span class="hidden-folded m-l-xs">LehuCloud</span>

        </a></div>

        

        <?php

	if($tmgetuserid)	//已登录

	{

	?>

        <!-- / brand -->

      

      <!-- / navbar header -->



      <!-- navbar collapse -->

      <div class="collapse pos-rlt navbar-collapse box-shadow bg-info dk">

        <!-- buttons -->

        <div class="nav navbar-nav hidden-xs">

          <a onclick="ZCenter_hideMenu()" id="aZCenter_Menu"  class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">

            <i class="fa fa-dedent fa-fw text"></i>

            <i class="fa fa-indent fa-fw text-active"></i>

          </a>

        </div>

        <!-- nabar right -->

        <ul class="nav navbar-nav navbar-right">

          <li id="topmenu_ZCenterCart">

         <a href="#ecms" onclick="window.open('<?=$public_r['newsurl']?>e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');">

              <i class="fa fa-shopping-cart fa-fw"></i> &nbsp;&nbsp;购物车

            </a>

          </li>

          <li class="dropdown">

            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" >

              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">

                <img src="<?=$member[userpic]?>">

                <!--<i class="on md b-white bottom"></i>-->

              </span>

              <span class="hidden-sm hidden-md"><?=$tmgetgroupname?>：<?=$tmgetusername?></span> <b class="caret"></b>

            </a>

            <!-- dropdown -->

            <ul class="dropdown-menu animated fadeInRight w">

                            <li>

                            <a target="_blank" href="<?=$public_r['newsurl']?>"><i class="fa fa-fw fa-home"></i> 返回首页</a>

                        </li>                        <li>

                            <a href="<?=$public_r['newsurl']?>e/member/EditInfo/"><i class="fa fa-fw fa-user"></i> &nbsp;&nbsp;个人资料</a>

                        </li>

              <li class="divider"></li>





                        <li>

                            <a href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" onclick="return confirm('确认要退出?');"><i class="fa fa-fw fa-power-off"></i> 注销</a>

                        </li>

                       

           

            </ul>

            <!-- / dropdown -->

          </li>

        </ul>

        <!-- / navbar right -->

      </div>

      <!-- / navbar collapse -->

                            <?php

	}

	else	//游客

	{

	?>

    

    

    <div class="collapse pos-rlt navbar-collapse box-shadow bg-info dk">

        <!-- buttons -->

        <div class="nav navbar-nav hidden-xs">

          <a onclick="ZCenter_hideMenu()" id="aZCenter_Menu"  class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">

            <i class="fa fa-dedent fa-fw text"></i>

            <i class="fa fa-indent fa-fw text-active"></i>

          </a>

        </div>

        <!-- / buttons -->
        <!-- nabar right -->

        <ul class="nav navbar-nav navbar-right">

          

          <li>

         

           <a>

              <span class="hidden-sm hidden-md">您好，<strong>游客</strong> &lt;游客&gt;</span> </a>

        

          </li>

<li><a href="<?=$public_r['newsurl']?>e/member/login/">

      <span class="hidden-sm hidden-md">[马上登录]</span></a> 

        

          

          </li>

          <li>  <a href="<?=$public_r['newsurl']?>e/member/register/">

      <span class="hidden-sm hidden-md">[注册帐号]</span></a>

        

          

          </li>

          

<li>

           

           <a href="<?=$public_r['newsurl']?>">

              <span class="hidden-sm hidden-md"><u>网站首页</u></span> 

            </a>

          

          </li>

        </ul>

        <!-- / navbar right -->

      </div>



    

    

    

    

	<?php

	}

	?>

  </header>

  <!-- / header -->



            <!-- aside -->

  <aside id="aside" class="app-aside hidden-xs bg-black">

      <div class="aside-wrap">

        <div class="navi-wrap">

          <!-- nav -->

          <nav ui-nav class="navi clearfix">

      

          <ul class="nav">

          <?php

	if($tmgetuserid)	//已登录

	{

	?>

<li id="nav_home" class=""><a id="aDashboard" href="<?=$public_r['newsurl']?>e/member/cp/" title="控制面板"><i class="glyphicon glyphicon-stats icon"></i><span class="font-bold">&nbsp;控制面板</span></a></li>                    



<li id="nav_ZCenter_Order" class="">

                        <a href="javascript:;" id="aZCenter_Order" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw  fa-list"></i>

	

                         <span>账号</span>

                         </a>

                <ul class="nav nav-sub dk" style="display: none;">

               <li>

                                <a title="修改资料" id="aZCenter_Order_All" href="<?=$public_r['newsurl']?>e/member/EditInfo/"><span>修改资料</span></a>

                            </li>

                            <li>

                                <a title="修改安全信息" id="aZCenter_Order_Payed" href="<?=$public_r['newsurl']?>e/member/EditInfo/EditSafeInfo.php"><span>修改安全信息</span></a>

                            </li>

                            <li>

                                <a title="帐号状态" id="aZCenter_Order_UnPayed" href="<?=$public_r['newsurl']?>e/member/my/"><span>帐号状态</span></a>

                            </li>
                            <li>

                                <a title="我的收藏" id="aZCenter_Order_UnPayed" href="<?=$public_r['newsurl']?>e/member/fava/"><span>我的收藏</span></a>

                            </li>

                </ul>

                    </li>

<!--

<li id="nav_ZCenter_Order" class="">

                        <a href="javascript:;" id="aZCenter_Order" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw  fa-list"></i>



                         <span>站内信息</span>

                         </a>

                <ul class="nav nav-sub dk" style="display: none;">

               <li>

                                <a title="发送消息" id="aZCenter_Order_All"  href="<?=$public_r['newsurl']?>e/member/msg/AddMsg/?enews=AddMsg"><span>发送消息</span></a>

                            </li>

                            <li>

                                <a title="消息列表" id="aZCenter_Order_Payed" href="<?=$public_r['newsurl']?>e/member/msg/"><span>消息列表</span></a>

                            </li>

                        

                </ul>

                    </li>

-->

<!--

<li id="nav_ZCenter_Order" class="">

                        <a href="javascript:;" id="aZCenter_Order" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw  fa-list"></i>



                         <span>投稿</span>

                         </a>

                <ul class="nav nav-sub dk" style="display: none;">

                <?php

			//输出可管理的模型

			$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");

			while($tmodr=$empire->fetch($tmodsql))

			{

				$fontb="";

				$fontb1="";

				if($tmodr['mid']==$tgetmid)

				{

					$fontb="<b>";

					$fontb1="</b>";

				}

			?>

                

                

                

                   <li>

                                <a title="管理<?=$tmodr[qmname]?><?=$fontb1?>" id="aZCenter_Order_All" href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=<?=$tmodr['mid']?>"><span>管理<?=$tmodr[qmname]?><?=$fontb1?></span></a>

                            </li>

                

                  	<?php

			}

			?>          

                            

                            

                            

                            

                </ul>

                    </li>

-->

<!--

			  <li id="nav_ZCenter_Order" class="">

                        <a href="javascript:;" id="aZCenter_Order" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw  fa-list"></i>



                         <span>会员空间</span>

                         </a>

                <ul class="nav nav-sub dk" style="display: none;">

               <li>

                                <a title=" 预览空间" id="aZCenter_Order_All"  href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>"><span> 预览空间</span></a>

                            </li>

                            <li>

                                <a title="设置空间" id="aZCenter_Order_Payed" href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php"><span>设置空间</span></a>

                            </li>

                            <li>

                                <a title="选择模板" id="aZCenter_Order_UnPayed" href="<?=$public_r['newsurl']?>e/member/mspace/ChangeStyle.php"><span>选择模板</span></a>

                            </li>

                     <li>

                                <a title="管理留言" id="aZCenter_Order_UnPayed"  href="<?=$public_r['newsurl']?>e/member/mspace/gbook.php"><span>管理留言</span></a>

                            </li>

                     <li>

                                <a title="管理反馈" id="aZCenter_Order_UnPayed" href="<?=$public_r['newsurl']?>e/member/mspace/feedback.php"><span>管理反馈</span></a>

                            </li>

                </ul>

                    </li>  -->                  

<li id="nav_ZCenter_Charge" class="">



                        <a href="javascript:;" id="aZCenter_Charge" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw fa-rmb"></i>



                         <span>财务管理</span>

                        </a>

                <ul class="nav nav-sub dk" style="display: none;">

                            <li>

                                <a title="在线支付" id="aZCenter_Charge_All" href="<?=$public_r['newsurl']?>e/payapi/"> <span>在线支付</span></a>

                            </li>

                            

                            <li>

                                <a title="点卡充值" id="aZCenter_Charge_UnPayed"  href="<?=$public_r['newsurl']?>e/member/card/"><span>点卡充值</span></a>

                            </li>

                    <li>

                                <a title="点卡充值记录" id="aZCenter_Charge_UnPayed" href="<?=$public_r['newsurl']?>e/member/buybak/"><span>点卡充值记录</span></a>

                            </li>

                    <li>

                                <a title="下载消费记录" id="aZCenter_Charge_UnPayed" href="<?=$public_r['newsurl']?>e/member/downbak/"><span>下载消费记录</span></a>

                            </li>



                        </ul>

                    </li>                    <li id="nav_ZCenter_Enchashment" class="">

                        <a href="javascript:;" id="aZCenter_Enchashment" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw fa-rmb"></i>



                         <span>商城</span>

                        </a>

                <ul class="nav nav-sub dk" style="display: none;">

                            <li>

                                <a title="我的订单" id="aZCenter_Enchashment_All"  href="<?=$public_r['newsurl']?>e/ShopSys/ListDd/"> <span>我的订单</span></a>

                            </li>

                            <li>

                                <a title="我的购物车" id="aZCenter_EnchashmentNew" href="#ecms" onclick="window.open('<?=$public_r['newsurl']?>e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');"><span>我的购物车</span></a>

                            </li>

                            <li>

                                <a title="管理配送地址" id="aZCenter_EnchashmentNew" href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php"><span>管理配送地址</span></a>

                            </li>





                        </ul>

                    </li><li class="line dk hidden-folded"></li><li id="nav_help"><a id="aHelpLink" href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" onclick="return confirm('确认要退出?');" title="退出"><i class="icon-question icon"></i><span class="">退出</span></a></li>            </ul>

                    

<?php

	}

	else	//游客

	{

	?>

    <li id="nav_ZCenter_Order" class="">

                        <a href="javascript:;" id="aZCenter_Order" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw  fa-list"></i>

    

       <span>账号</span>

                         </a>

                <ul class="nav nav-sub dk" style="display: none;">

               <li><a title="会员登录" id="aZCenter_Order_All" href="<?=$public_r['newsurl']?>e/member/login/"><span>会员登录</span></a> </li>

                 <li> <a title="注册帐号" id="aZCenter_Order_Payed" href="<?=$public_r['newsurl']?>e/member/register/"><span>注册帐号</span></a></li>

                   

                </ul>

                    </li>

                <li id="nav_ZCenter_Enchashment" class="">

                        <a href="javascript:;" id="aZCenter_Enchashment" class="auto">

              <span class="pull-right text-muted">

                    <i class="fa fa-fw fa-angle-right text"></i>

                    <i class="fa fa-fw fa-angle-down text-active"></i>

                  </span>

                  <i class="fa fa-fw fa-rmb"></i>



                         <span>商城</span>

                        </a>

                <ul class="nav nav-sub dk" style="display: none;">

                            

                            <li>

                                <a title="我的购物车" id="aZCenter_EnchashmentNew" href="#ecms" onclick="window.open('<?=$public_r['newsurl']?>e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');"><span>我的购物车</span></a>

                            </li>

                            





                        </ul>

                    </li>

                    

                    

                              </ul>

       

	

	<?php

	}

	?>

          

          </nav>

          <!-- nav -->



        </div>

      </div>

  </aside>

  <!-- / aside -->



  <!-- content -->

  <div id="content" class="app-content" role="main">

  

 

    

