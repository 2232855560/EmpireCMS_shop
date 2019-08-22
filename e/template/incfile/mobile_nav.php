<div id="nm-mobile-menu" class="nm-mobile-menu">
                <div class="nm-mobile-menu-scroll">
                    <div class="nm-mobile-menu-content">
                        <div class="nm-row">
                                                    
                            <div class="nm-mobile-menu-top col-xs-12">
                                <ul id="nm-mobile-menu-top-ul" class="menu">
                                                                        <li class="nm-mobile-menu-item-cart menu-item">
                                        <a href="http://savoy.nordicmade.com/cart/" id="nm-mobile-menu-cart-btn">
                                            <span class="nm-menu-cart-title">Cart</span>                                            <span class="nm-menu-cart-count count nm-count-zero">0</span>                                        </a>
                                    </li>
                                                                                                        </ul>
                            </div>
                             
                            <div class="nm-mobile-menu-main col-xs-12">
                                <ul id="nm-mobile-menu-main-ul" class="menu">
                                    <li class="shop-link menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-20"><a href="http://www.shangcheng.me/">首页</a><span class="nm-menu-toggle"></span>
                                  </li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-391"><a href="/product">产品中心</a><span class="nm-menu-toggle"></span>
</li>
<li class="megamenu col-3 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-271"><a href="#">Elements</a><span class="nm-menu-toggle"></span>
</li>
                                </ul>
                            </div>
        <?php
	if($tmgetuserid)	//已登录
	{
	?>
                            <div class="nm-mobile-menu-secondary col-xs-12">
                                <ul id="nm-mobile-menu-secondary-ul" class="menu">
                                                                                                            <li class="nm-menu-item-login menu-item">
                                        <a href="/e/member/cp" id="nm-menu-account-btn"><?=$tmgetusername?></a>                                    </li>
                                 </ul>
                            </div>
	<?php
	}
	else	//游客
	{
	?>
							<div class="nm-mobile-menu-secondary col-xs-12">
                                <ul id="nm-mobile-menu-secondary-ul" class="menu">
                                        <li class="nm-menu-item-login menu-item">
                                        <a href="/e/member/login" id="nm-menu-account-btn">登陆</a>                                    </li>
                                </ul>
                            </div>
  <?php
	}
	?>
                        </div>
                    </div>
                </div>
            </div>