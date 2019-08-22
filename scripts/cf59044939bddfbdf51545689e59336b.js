(function(b){function m(){this.BREAKPOINT_LARGE=864;this.classHeaderFixed="header-on-scroll";this.classMobileMenuOpen="mobile-menu-open";this.classWidgetPanelOpen="widget-panel-open";this.$window=b(window);this.$document=b(document);this.$html=b("html");this.$body=b("body");this.$pageIncludes=b("#nm-page-includes");this.$pageOverlay=b("#nm-page-overlay");this.$widgetPanelOverlay=b("#nm-widget-panel-overlay");this.$topBar=b("#nm-top-bar");this.$header=b("#nm-header");this.$headerPlaceholder=b("#nm-header-placeholder");this.headerScrollTolerance=0;this.$mobileMenuBtn=b("#nm-mobile-menu-button");this.$mobileMenu=b("#nm-mobile-menu");this.$mobileMenuScroller=this.$mobileMenu.children(".nm-mobile-menu-scroll");this.$mobileMenuLi=this.$mobileMenu.find("ul li.menu-item");this.$widgetPanel=b("#nm-widget-panel");this.widgetPanelAnimSpeed=250;this.panelsAnimSpeed=200;this.$shopWrap=b("#nm-shop");this.isShop=this.$shopWrap.length?!0:!1;this.shopCustomSelect="0"!=nm_wp_vars.shopCustomSelect?!0:!1;this.searchInHeader=this.searchEnabled=!1;"0"!==nm_wp_vars.shopSearch&&(this.searchEnabled=!0,this.$searchPanel=b("#nm-shop-search"),this.$searchNotice=b("#nm-shop-search-notice"),"header"===nm_wp_vars.shopSearch?(this.searchInHeader=!0,this.$searchBtn=b("#nm-menu-search-btn")):this.isShop&&(this.$searchBtn=b("#nm-shop-search-btn")));this.init()}b.nmThemeExtensions||(b.nmThemeExtensions={});m.prototype={init:function(){var a=this;if("0"!=nm_wp_vars.pageLoadTransition){a.isIos=navigator.userAgent.match(/iPad/i)||navigator.userAgent.match(/iPhone/i);if(!a.isIos)a.$window.on("beforeunload",function(c){b("#nm-page-load-overlay").addClass("nm-loader");a.$html.removeClass("nm-page-loaded")});"onpagehide"in window?window.addEventListener("pageshow",function(){setTimeout(function(){a.$html.addClass("nm-page-loaded")},150)},!1):setTimeout(function(){a.$html.addClass("nm-page-loaded")},150)}a.$body.removeClass("nm-preload");a.headerIsFixed=a.$body.hasClass("header-fixed")?!0:!1;a.$html.hasClass("history")?(a.hasPushState=!0,window.history.replaceState({nmShop:!0},"",window.location.href)):a.hasPushState=!1;a.setScrollbarWidth();a.headerCheckPlaceholderHeight();a.headerIsFixed&&(a.headerSetScrollTolerance(),a.mobileMenuPrep());a.widgetPanelPrep();0<window.navigator.userAgent.indexOf("MSIE ")&&a.$html.addClass("nm-old-ie");a.isTouch=a.$html.hasClass("touch")?!0:!1;a.loadExtension();a.bind();a.initPageIncludes();a.$body.hasClass("nm-added-to-cart")&&(a.$body.removeClass("nm-added-to-cart"),a.$window.load(function(){a.$widgetPanel.length&&(a.widgetPanelShow(!0),setTimeout(function(){a.widgetPanelCartHideLoader()},1E3))}))},loadExtension:function(){b.nmThemeExtensions.shop&&b.nmThemeExtensions.shop.call(this);b.nmThemeExtensions.singleProduct&&b.nmThemeExtensions.singleProduct.call(this);b.nmThemeExtensions.cart&&b.nmThemeExtensions.cart.call(this);b.nmThemeExtensions.checkout&&b.nmThemeExtensions.checkout.call(this)},setScrollbarWidth:function(){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;";document.body.appendChild(a);this.scrollbarWidth=a.offsetWidth-a.clientWidth;document.body.removeChild(a)},pageIsScrollable:function(){return document.body.scrollHeight>document.body.clientHeight},urlGetParameter:function(a){var b=decodeURIComponent(window.location.search.substring(1)).split("&"),e,d;for(d=0;d<b.length;d++)if(e=b[d].split("="),e[0]===a)return void 0===e[1]?!0:e[1]},updateUrlParameter:function(a,b,e){var d=a.indexOf("#"),f=-1===d?"":a.substr(d);a=-1===d?a:a.substr(0,d);var d=new RegExp("([?&])"+
b+"=.*?(&|$)","i"),g=-1!==a.indexOf("?")?"&":"?";a=a.match(d)?a.replace(d,"$1"+b+"="+e+"$2"):a+g+b+"="+e;return a+f},setPushState:function(a){this.hasPushState&&window.history.pushState({nmShop:!0},"",a)},headerCheckPlaceholderHeight:function(){if(!this.$body.hasClass(this.classHeaderFixed)){var a=this.$header.innerHeight(),b=parseInt(this.$headerPlaceholder.css("height"));a!==b&&this.$headerPlaceholder.css("height",a+"px")}},headerSetScrollTolerance:function(){this.headerScrollTolerance=this.$topBar.length&&this.$topBar.is(":visible")?this.$topBar.outerHeight(!0):0},headerToggleFixedClass:function(a){a.$document.scrollTop()>a.headerScrollTolerance?a.$body.hasClass(a.classHeaderFixed)||a.$body.addClass(a.classHeaderFixed):a.$body.hasClass(a.classHeaderFixed)&&a.$body.removeClass(a.classHeaderFixed)},bind:function(){var a=this,c=null,e;a.$window.resize(function(){c&&clearTimeout(c);c=setTimeout(function(){e=parseInt(a.$html.css("width"));a.$body.hasClass(a.classMobileMenuOpen)&&e>a.BREAKPOINT_LARGE&&a.$pageOverlay.trigger("click");a.headerCheckPlaceholderHeight();a.headerIsFixed&&(a.headerSetScrollTolerance(),a.mobileMenuPrep())},250)});a.headerIsFixed&&(a.$window.bind("scroll.nmheader",function(){a.headerToggleFixedClass(a)}),a.$window.trigger("scroll"));var d=b("#nm-top-menu").children(".menu-item"),f=b("#nm-main-menu-ul").children(".menu-item");b.merge(d,f).hover(function(){var c=b(this).children(".sub-menu");if(c.length){var d=a.$window.innerWidth(),e=c.offset().left,f=c.width(),d=d-(e+f);0>d?c.css("left",d-33+"px"):c.css("left","")}});a.$mobileMenuBtn.bind("click",function(b){b.preventDefault();a.$body.hasClass(a.classMobileMenuOpen)?a.mobileMenuClose(!0):a.mobileMenuOpen()});a.$mobileMenuLi.bind("click",function(a){a.preventDefault();a.stopPropagation();a=b(this);var c=a.children("ul");c.length&&(a.toggleClass("active"),c.toggleClass("open"))});a.$mobileMenuLi.find("a").bind("click",function(a){a.stopPropagation();var c=b(this),d=c.parent("li"),e=d.children("ul");!e.length&&"#"!=c.attr("href").substr(0,1)||d.hasClass("nm-notoggle")||(a.preventDefault(),d.toggleClass("active"),e.toggleClass("open"))});if(a.searchEnabled){a.searchInHeader&&a.$searchBtn.bind("click",function(c){c.preventDefault();b(this).toggleClass("active");a.$body.toggleClass("header-search-open");a.searchPanelToggle()});b("#nm-shop-search-close").bind("click",function(b){b.preventDefault();a.$searchBtn.trigger("click")});var g;b("#nm-shop-search-input").on("input",function(){(g=a.shopSearchValidateInput(b(this).val()))?a.$searchNotice.addClass("show"):a.$searchNotice.removeClass("show")}).trigger("input")}a.$widgetPanel.length&&a.widgetPanelBind();a.$pageIncludes.hasClass("login-popup")&&b("#nm-menu-account-btn").bind("click",function(a){a.preventDefault();b("#nm-login-wrap").children(".login").css("display","");b.magnificPopup.open({mainClass:"nm-login-popup nm-mfp-fade-in",alignTop:!0,closeMarkup:'<a class="mfp-close nm-font nm-font-close2"></a>',removalDelay:180,items:{src:"#nm-login-popup-wrap",type:"inline"},callbacks:{close:function(){b("#nm-login-wrap").addClass("inline fade-in slide-up");b("#nm-register-wrap").removeClass("inline fade-in slide-up")}}})});b("#nm-blog-categories-toggle-link").bind("click",function(a){a.preventDefault();var c=b(this);b("#nm-blog-categories-list").slideToggle(200,function(){var a=b(this);c.toggleClass("active");c.hasClass("active")||a.css("display","")})});b("#nm-page-overlay, #nm-widget-panel-overlay").bind("click",function(){var c=b(this);a.$body.hasClass(a.classMobileMenuOpen)?a.mobileMenuClose(!1):a.widgetPanelHide();c.addClass("fade-out");setTimeout(function(){c.removeClass("show fade-out")},a.panelsAnimSpeed)})},mobileMenuPrep:function(){var a=this.$window.height()-this.$header.outerHeight(!0);this.$mobileMenuScroller.css({"max-height":a+"px","margin-right":"-"+this.scrollbarWidth+"px"})},mobileMenuOpen:function(a){a=this.$header.outerHeight(!0);this.$mobileMenuScroller.css("margin-top",a+"px");this.$body.addClass(this.classMobileMenuOpen);this.$pageOverlay.addClass("show")},mobileMenuClose:function(a){this.$body.removeClass(this.classMobileMenuOpen);a&&this.$pageOverlay.trigger("click");setTimeout(function(){b("#nm-mobile-menu-main-ul").children(".active").removeClass("active").children("ul").removeClass("open");b("#nm-mobile-menu-secondary-ul").children(".active").removeClass("active").children("ul").removeClass("open")},250)},searchPanelToggle:function(){var a=this,c=b("#nm-shop-search-input");a.$searchPanel.slideToggle(200,function(){a.$searchPanel.toggleClass("fade-in");a.$searchPanel.hasClass("fade-in")?c.focus():c.val("");a.filterPanelSliding=!1});a.shopSearchHideNotice()},shopSearchValidateInput:function(a){return/\S/.test(a)&&a.length>nm_wp_vars.shopSearchMinChar-1?!0:!1},shopSearchHideNotice:function(a){b("#nm-shop-search-notice").removeClass("show")},widgetPanelPrep:function(){var a=this;a.widgetPanelCartHideScrollbar();a.cartPanelAjax=null;a.quantityInputsBindButtons(a.$widgetPanel);a.$widgetPanel.on("blur","input.qty",function(){var c=b(this),e=parseFloat(c.val()),d=parseFloat(c.attr("max"));if(""===e||"NaN"===e)e=0;"NaN"===d&&(d="");e>d&&(c.val(d),e=d);0<e&&a.widgetPanelCartUpdate(c)});a.$document.on("nm_qty_change",function(c,e){a.$body.hasClass(a.classWidgetPanelOpen)&&a.widgetPanelCartUpdate(b(e))})},widgetPanelBind:function(){var a=this;if(a.isTouch){if(a.headerIsFixed)a.$pageOverlay.on("touchmove",function(a){a.preventDefault()});a.$widgetPanelOverlay.on("touchmove",function(a){a.preventDefault()});a.$widgetPanel.on("touchmove",function(a){a.stopPropagation()})}b("#nm-menu-cart-btn, #nm-mobile-menu-cart-btn").bind("click",function(c){c.preventDefault();if(a.$body.hasClass(a.classMobileMenuOpen)){var e=b(this);a.$pageOverlay.trigger("click");setTimeout(function(){e.trigger("click")},a.panelsAnimSpeed)}else a.widgetPanelShow()});b("#nm-widget-panel-close").bind("click.nmWidgetPanelClose",function(a){a.preventDefault();b("#nm-widget-panel-overlay").trigger("click")});a.$widgetPanel.on("click.nmCartPanelClose","#nm-cart-panel-continue",function(a){a.preventDefault();b("#nm-widget-panel-overlay").trigger("click")});a.$widgetPanel.on("click","#nm-cart-panel .cart_list .remove",function(b){b.preventDefault();a.cartPanelAjax||a.widgetPanelCartRemoveProduct(this)})},widgetPanelShow:function(a){var b=this;a&&b.widgetPanelCartShowLoader();b.$body.addClass("widget-panel-opening "+b.classWidgetPanelOpen);b.$widgetPanelOverlay.addClass("show");setTimeout(function(){b.$body.removeClass("widget-panel-opening")},b.widgetPanelAnimSpeed)},widgetPanelHide:function(){var a=this;a.$body.addClass("widget-panel-closing");a.$body.removeClass(a.classWidgetPanelOpen);setTimeout(function(){a.$body.removeClass("widget-panel-closing")},a.widgetPanelAnimSpeed)},widgetPanelCartShowLoader:function(){b("#nm-cart-panel-loader").addClass("show")},widgetPanelCartHideLoader:function(){b("#nm-cart-panel-loader").addClass("fade-out");setTimeout(function(){b("#nm-cart-panel-loader").removeClass("fade-out show")},200)},widgetPanelCartHideScrollbar:function(){this.$widgetPanel.children(".nm-widget-panel-inner").css("marginRight","-"+this.scrollbarWidth+"px")},widgetPanelCartRemoveProduct:function(a){var c=this;a=b(a);var e=a.closest("li"),d=e.parent("ul");a=a.data("cart-item-key");e.closest("li").addClass("loading");c.cartPanelAjax=b.ajax({type:"POST",url:nm_wp_vars.ajaxUrl,data:{action:"nm_cart_panel_remove_product",cart_item_key:a},dataType:"json",error:function(a,b,c){console.log("NM: AJAX error - widgetPanelCartRemoveProduct() - "+c);e.closest("li").removeClass("loading")},complete:function(a){c.cartPanelAjax=null;var g=a.responseJSON;g&&"1"===g.status?(e.css({"-webkit-transition":"0.2s opacity ease",transition:"0.2s opacity ease",opacity:"0"}),setTimeout(function(){e.css("display","block").slideUp(150,function(){e.remove();1==d.children("li").length&&b("#nm-cart-panel").addClass("nm-cart-panel-empty");c.shopReplaceFragments(g.fragments);c.$body.trigger("added_to_cart",[g.fragments,g.cart_hash,!1])})},160)):console.log("NM: Couldn't remove product from cart")}})},widgetPanelCartUpdate:function(a){var c=this;c.cartPanelAjax&&c.cartPanelAjax.abort();a.closest("li").addClass("loading");var e={action:"nm_cart_panel_update"};e[a.attr("name")]=a.val();c.cartPanelAjax=b.ajax({type:"POST",url:nm_wp_vars.ajaxUrl,data:e,dataType:"json",complete:function(a){c.cartPanelAjax=null;(a=a.responseJSON)&&"1"===a.status&&c.shopReplaceFragments(a.fragments);b("#nm-cart-panel .cart_list").children(".loading").removeClass("loading")}})},shopReplaceFragments:function(a){var c;b.each(a,function(a,d){c=b(d);c.length&&b(a).replaceWith(c)})},quantityInputsBindButtons:function(a){var c=this;a.off("click.nmQty").on("click.nmQty",".nm-qty-plus, .nm-qty-minus",function(){var a=b(this),d=a.closest(".quantity").find(".qty"),f=parseFloat(d.val()),g=parseFloat(d.attr("max")),h=parseFloat(d.attr("min")),l=d.attr("step");f&&""!==f&&"NaN"!==f||(f=0);if(""===g||"NaN"===g)g="";if(""===h||"NaN"===h)h=0;if("any"===l||""===l||void 0===l||"NaN"===parseFloat(l))l=1;a.hasClass("nm-qty-plus")?g&&(g==f||f>g)?d.val(g):(d.val(f+parseFloat(l)),c.quantityInputsTriggerEvents(d)):h&&(h==f||f<h)?d.val(h):0<f&&(d.val(f-parseFloat(l)),c.quantityInputsTriggerEvents(d))})},quantityInputsTriggerEvents:function(a){a.trigger("change");this.$document.trigger("nm_qty_change",a)},initPageIncludes:function(){var a=this;if(a.$pageIncludes.hasClass("row-full-height")){var c=function(){var c=b(".nm-row-full-height:first");if(c.length){var d=a.$window.height(),e=c.offset().top,f;d>e&&(f=100-e/(d/100),c.css("min-height",f+"vh"))}};c();var e=null;a.$window.bind("resize.nmRow",function(){e&&clearTimeout(e);e=setTimeout(function(){c()},250)})}!a.isTouch&&a.$pageIncludes.hasClass("video-background")&&b(".nm-row-video").each(function(){var a=b(this),c=a.data("video-url");c&&(c=vcExtractYoutubeId(c))&&insertYoutubeVideoAsBackground(a,c)});a.$window.load(function(){if(a.$pageIncludes.hasClass("blog-grid")){var c=b("#nm-blog-grid-ul");c.packery({itemSelector:".post",gutter:0,isInitLayout:!1});c.packery("once","layoutComplete",function(){c.removeClass("nm-loader hide")});c.packery()}if(a.$pageIncludes.hasClass("banner")){var d=b(".nm-banner"),e=d.find(".nm-banner-alt-image");a.isShop&&a.filtersEnableAjax&&d.find(".nm-banner-shop-link").bind("click",function(c){c.preventDefault();b(this).attr("href")&&a.shopExternalGetPage(b(this).attr("href"))});var f=function(){if(768>=a.$window.width()){for(var c,d,f=0;f<e.length;f++)c=b(e[f]),d=b(e[f]).data("src"),c.hasClass("img")?c.attr("src",d):c.css("background-image","url("+d+")");a.$window.unbind("resize.banners")}},g=null;a.$window.bind("resize.banners",function(){g&&clearTimeout(g);g=setTimeout(function(){f()},250)});f()}if(a.$pageIncludes.hasClass("banner-slider")){var h=function(a,b){a.$bannerContent=b.find(".nm-banner-text-inner");a.$bannerContent.length&&(a.bannerAnimation=a.$bannerContent.data("animate"),a.$bannerContent.addClass(a.bannerAnimation))};b(".nm-banner-slider").each(function(){var c=b(this),d={arrows:!1,prevArrow:'<a class="slick-prev"><i class="nm-font nm-font-angle-thin-left"></i></a>',nextArrow:'<a class="slick-next"><i class="nm-font nm-font-angle-thin-right"></i></a>',dots:!1,edgeFriction:0,infinite:!1,pauseOnHover:!1,speed:350,touchThreshold:30};c.children().wrap("<div></div>");d=b.extend(d,c.data());c.on("init",function(){a.$document.trigger("banner-slider-loaded");h(c,c.find(".slick-track .slick-active"))});c.on("afterChange",function(a,b,d){c.slideIndex!=d&&(c.slideIndex=d,c.$bannerContent&&c.$bannerContent.removeClass(c.bannerAnimation),h(c,c.find(".slick-track .slick-active")))});c.on("setPosition",function(a,c){var d=b(c.$slides[c.currentSlide]).children(".nm-banner");d.hasClass("has-alt-image")?d.children(".nm-banner-alt-image").is(":visible")?c.$slider.addClass("alt-image-visible"):c.$slider.removeClass("alt-image-visible"):c.$slider.removeClass("alt-image-visible")});c.slick(d)})}if(a.$pageIncludes.hasClass("product-slider")){var d=b(".nm-product-slider"),k={adaptiveHeight:!0,arrows:!1,dots:!0,edgeFriction:0,infinite:!1,speed:350,touchThreshold:30,slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:518,settings:{slidesToShow:1,slidesToScroll:1}}]};d.each(function(){var a=b(this),c=a.find(".nm-products:first");k=b.extend(k,a.data());c.slick(k)})}a.$pageIncludes.hasClass("post-slider")&&(d=b(".nm-post-slider"),k={adaptiveHeight:!0,arrows:!1,dots:!0,edgeFriction:0,infinite:!1,pauseOnHover:!1,speed:350,touchThreshold:30,slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:518,settings:{slidesToShow:1,slidesToScroll:1}}]},d.each(function(){var a=b(this);k=b.extend(k,a.data());a.slick(k)}));a.$pageIncludes.hasClass("blog-slider")&&(d=b(".nm-blog-slider"),k={prevArrow:'<a class="slick-prev"><i class="nm-font nm-font-angle-left"></i></a>',nextArrow:'<a class="slick-next"><i class="nm-font nm-font-angle-right"></i></a>',dots:!0,edgeFriction:0,infinite:!1,pauseOnHover:!1,speed:350,touchThreshold:30,responsive:[{breakpoint:550,settings:{slidesToShow:1}}]},d.each(function(){var a=b(this);k=b.extend(k,a.data());a.slick(k)}));"0"!=nm_wp_vars.wpGalleryPopup&&a.$pageIncludes.hasClass("wp-gallery")&&b(".gallery").each(function(){b(this).magnificPopup({mainClass:"nm-wp-gallery-popup nm-mfp-fade-in",closeMarkup:'<a class="mfp-close nm-font nm-font-close2"></a>',removalDelay:180,delegate:".gallery-icon > a",type:"image",gallery:{enabled:!0,arrowMarkup:'<a title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% nm-font nm-font-angle-right"></a>'},closeBtnInside:!1})})});if(a.$pageIncludes.hasClass("product_categories")){var d=b(".nm-product-categories");a.isShop&&a.filtersEnableAjax&&d.find(".product-category a").bind("click",function(c){c.preventDefault();a.shopExternalGetPage(b(this).attr("href"))});a.$pageIncludes.hasClass("product_categories_packery")&&a.$window.load(function(){for(var a=0;a<d.length;a++){var c=b(d[a]).children(".woocommerce").children("ul");c.packery({itemSelector:".product-category",gutter:0,isInitLayout:!1});c.packery("once","layoutComplete",function(){c.closest(".nm-product-categories").removeClass("nm-loader");c.addClass("show")});c.packery()}})}if(a.$pageIncludes.hasClass("lightbox")){var f,g,h;b(".nm-lightbox").each(function(){b(this).bind("click",function(a){a.preventDefault();a.stopPropagation();f=b(this);g=f.data("mfp-type");h={mainClass:"nm-wp-gallery-popup nm-mfp-zoom-in",closeMarkup:'<a class="mfp-close nm-font nm-font-close2"></a>',removalDelay:180,type:g,closeBtnInside:!1};h.closeOnContentClick="inline"==g?!1:!0;f.magnificPopup(h).magnificPopup("open")})})}}};b.nmTheme=m.prototype;b(document).ready(function(){new m})})(jQuery);