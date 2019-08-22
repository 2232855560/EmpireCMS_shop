(function(g,a,h){var b=a.event,c;b.special.smartscroll={setup:function(){a(this).bind("scroll",b.special.smartscroll.handler)},teardown:function(){a(this).unbind("scroll",b.special.smartscroll.handler)},handler:function(d,b){var e=this,f=arguments;d.type="smartscroll";c&&clearTimeout(c);c=setTimeout(function(){a(e).trigger("smartscroll",f)},"execAsap"===b?0:100)}};a.fn.smartscroll=function(a){return a?this.bind("smartscroll",a):this.trigger("smartscroll",["execAsap"])}})(window,jQuery);;(function(e){e.extend(e.nmTheme,{infload_init:function(){var a=this.$shopBrowseWrap.children(".nm-pagination");a.length&&a.hasClass("nm-infload")&&this.shopInfLoadBind()},shopInfLoadBind:function(){var a=this,b=a.$shopBrowseWrap.children(".nm-infload-controls");a.shopInfLoadBound=!0;a.infloadScroll=b.hasClass("scroll-mode")?!0:!1;if(a.infloadScroll){a.infscrollLock=!1;var f,c=Math.round(a.$document.height()-b.offset().top),d=null;a.$window.resize(function(){d&&clearTimeout(d);d=setTimeout(function(){var b=a.$shopBrowseWrap.children(".nm-infload-controls");c=Math.round(a.$document.height()-b.offset().top)},100)});a.$window.bind("smartscroll.infscroll",function(){a.infscrollLock||(f=0+a.$document.height()-a.$window.scrollTop()-a.$window.height(),f<c&&a.shopInfLoadGetPage())})}else b=e("#nm-shop-products"),b.on("click",".nm-infload-btn",function(b){b.preventDefault();a.shopInfLoadGetPage()}),b.on("click",".nm-infload-to-top",function(b){b.preventDefault();a.shopScrollToTop()});a.infloadScroll&&a.$window.trigger("scroll")},shopInfLoadGetPage:function(){var a=this;if(a.shopAjax)return!1;a.shopRemoveNotices();var b=a.$shopBrowseWrap.children(".nm-infload-link").find("a"),f=a.$shopBrowseWrap.children(".nm-infload-controls"),c=b.attr("href");c?(c=a.updateUrlParameter(c,"shop_load","products"),f.addClass("nm-loader"),a.shopAjax=e.ajax({url:c,dataType:"html",cache:!1,headers:{"cache-control":"no-cache"},method:"GET",error:function(a,b,c){console.log("NM: AJAX error - shopInfLoadGetPage() - "+c)},complete:function(){f.removeClass("nm-loader")},success:function(d){d=e("<div>"+d+"</div>");var g=d.children(".nm-products").children("li");a.$shopBrowseWrap.find(".nm-products").append(g);a.shopLoadImages();(c=d.find(".nm-infload-link").children("a").attr("href"))?b.attr("href",c):(a.$shopBrowseWrap.addClass("all-products-loaded"),a.infloadScroll?a.infscrollLock=!0:f.addClass("hide-btn"),b.removeAttr("href"));a.shopAjax=!1;a.infloadScroll&&a.$window.trigger("scroll")}})):a.infloadScroll&&(a.infscrollLock=!0)}});e.nmThemeExtensions.infload=e.nmTheme.infload_init})(jQuery);;(function(c){c.extend(c.nmTheme,{filters_init:function(){this.$shopFilterMenu=c("#nm-shop-filter-menu");this.$shopSidebarPopupBtn=c("#nm-shop-sidebar-popup-button");this.shopSidebarLayout=c("#nm-shop-sidebar").data("sidebar-layout");this.filterPanelSliding=!1;this.filterPanelSlideSpeed=200;this.filterPanelHideWidth=551;this.shopFilterMenuFnNames={cat:"shopFiltersCategoriesToggle",filter:"shopFiltersSidebarToggle",search:"shopFiltersSearchToggle"};this.shopFiltersBind()},shopFiltersBind:function(){var a=this;a.$shopFilterMenu.find("a").bind("click",function(f){f.preventDefault();if(!a.filterPanelSliding){a.shopRemoveNotices();a.filterPanelSliding=!0;f=0;var b=c(this).parent("li"),d=b.data("panel");b.hasClass("active")||(f=a.shopFiltersHideActivePanel());b.toggleClass("active");setTimeout(function(){a[a.shopFilterMenuFnNames[d]]()},f)}});if(a.filtersEnableAjax&&a.$pageIncludes.hasClass("shop_categories"))a.$shopWrap.on("click","#nm-shop-categories a",function(b){b.preventDefault();b=c(this);var d=b.parent("li");a.searchEnabled&&a.$searchBtn.parent("li").hasClass("active")&&(a.categoryClicked=!0,a.$searchBtn.trigger("click"));c("#nm-shop-categories").children(".current-cat").removeClass("current-cat");d.addClass("current-cat");a.shopGetPage(b.attr("href"))});if(a.$shopSidebarPopupBtn.length){a.$shopSidebarPopup=c("#nm-shop-sidebar-popup");var b=null;a.$window.bind("scroll.nmShopPopupBtn resize.nmShopPopupBtn",function(){b&&clearTimeout(b);b=setTimeout(function(){a.$body.hasClass("shop-filters-popup-open")||a.shopFiltersPopupButtonToggle()},500)});a.$shopSidebarPopupBtn.bind("click",function(){a.shopFiltersPopupShow()});c("#nm-shop-sidebar-popup-reset-button").bind("click",function(b){b.preventDefault();a.shopFiltersPopupReset()})}var e=a.isTouch?!1:!0,d=!1;a.$shopWrap.on("click","#nm-shop-sidebar .nm-widget-title",function(b){b=c(this).closest("li");if(b.hasClass("show"))e&&b.children(".nm-shop-widget-col").last().css("height",""),b.removeClass("show");else{var g=b.parent("#nm-shop-widgets-ul").children(".show");if(e){var h=b.children(".nm-shop-widget-col").last(),k=h.children().first().outerHeight(!0)+"px",l=g.children(".nm-shop-widget-col").last();h.css("height",k);l.css("height","");d||(d=!0,a.$window.one("resize.nmShopWidget",function(){a.shopFiltersWidgetHideOpen();d=!1}))}g.removeClass("show");b.addClass("show")}});a.filtersEnableAjax&&a.$pageIncludes.hasClass("shop_filters")&&(a.$shopWrap.on("click","#nm-shop-sidebar .nm_widget a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"))}),a.$shopWrap.on("click","#nm-shop-sidebar .widget_product_categories a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"))}),a.$shopWrap.on("click","#nm-shop-sidebar .widget_layered_nav a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"))}),a.$shopWrap.on("click","#nm-shop-sidebar .widget_layered_nav_filters a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"))}),a.$shopWrap.on("click","#nm-shop-sidebar .widget_product_tag_cloud a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"),!1,!0)}),a.$shopWrap.on("click","#nm-shop-sidebar .widget_rating_filter a",function(b){b.preventDefault();a.shopGetPage(c(this).attr("href"))}))},shopFiltersCategoriesToggle:function(){var a=this;c("#nm-shop-categories").slideToggle(a.filterPanelSlideSpeed,function(){var b=c(this);b.toggleClass("fade-in");b.hasClass("fade-in")||b.removeClass("force-show").css("display","");a.filterPanelSliding=!1})},shopFiltersCategoriesReset:function(){c("#nm-shop-categories").removeClass("fade-in force-show").css("display","")},shopFiltersSidebarToggle:function(){var a=this,b=c("#nm-shop-sidebar"),e=b.is(":visible");e&&b.removeClass("fade-in");b.slideToggle(a.filterPanelSlideSpeed,function(){e||b.addClass("fade-in");a.filterPanelSliding=!1})},shopFiltersWidgetHideOpen:function(){var a=c("#nm-shop-widgets-ul").children(".show");a.length&&a.find(".nm-widget-title").trigger("click")},shopFiltersSearchToggle:function(){this.searchPanelToggle();this.currentSearch=""},shopFiltersHideActivePanel:function(){var a=0,b=this.$shopFilterMenu.children(".active");if(b.length){b.removeClass("active");var c=b.data("panel");b.is(":hidden")&&"cat"==c?this.shopFiltersCategoriesReset():(a=300,this[this.shopFilterMenuFnNames[c]]())}return a},shopFiltersPopupButtonToggle:function(){var a=this.$shopSidebarPopupBtn.hasClass("visible")?this.$shopSidebarPopupBtn.offset().top+this.$shopSidebarPopupBtn.outerHeight(!0):this.$shopSidebarPopupBtn.offset().top,b=this.$shopBrowseWrap.offset().top;a>b+190?this.shopFiltersPopupButtonShow():this.shopFiltersPopupButtonHide()},shopFiltersPopupButtonShow:function(){this.$shopSidebarPopupBtn.addClass("visible")},shopFiltersPopupButtonHide:function(){this.$shopSidebarPopupBtn.removeClass("visible")},shopFiltersPopupShow:function(){var a=this;a.shopFiltersPopupButtonHide();a.$shopSidebarPopup.addClass("visible");a.$body.addClass("shop-filters-popup-open");a.$document.bind("mouseup.filtersPopup",function(b){a.$shopSidebarPopup.is(b.target)||0!==a.$shopSidebarPopup.has(b.target).length||a.shopFiltersPopupHide()})},shopFiltersPopupHide:function(){var a=this;a.$shopSidebarPopup.removeClass("visible");a.shopFiltersPopupButtonToggle();a.$body.removeClass("shop-filters-popup-open");a.$document.unbind("mouseup.filtersPopup");setTimeout(function(){c("#nm-shop-search-input").val("");a.shopSearchHideNotice()},a.panelsAnimSpeed)},shopFiltersPopupReset:function(){var a=location.href.replace(location.search,"");this.shopGetPage(a);this.shopFiltersPopupHide()},shopExternalGetPage:function(a){var b=this;if(a==window.location.href)b.shopScrollToTop();else{c("#nm-shop-categories").children(".current-cat").removeClass("current-cat");var e=b.shopScrollToTop();setTimeout(function(){b.shopGetPage(a)},e)}},shopGetPage:function(a,b,e){var d=this;if(d.shopAjax)return!1;a&&(d.shopRemoveNotices(),"popup"==d.shopSidebarLayout&&d.shopFiltersPopupHide(),d.$body.width()<d.filterPanelHideWidth?(d.shopShowLoader(!0),e=d.filterPanelSlideSpeed,d.filterPanelSlideSpeed=0,d.shopFiltersHideActivePanel(),d.filterPanelSlideSpeed=e):d.shopShowLoader(),a=a.replace(/\/?(\?|#|$)/,"/$1"),b||d.setPushState(a),d.shopAjax=c.ajax({url:a,data:{shop_load:"full",shop_filters_layout:d.shopSidebarLayout},dataType:"html",cache:!1,headers:{"cache-control":"no-cache"},method:"POST",error:function(a,b,c){console.log("NM: AJAX error - shopGetPage() - "+c);d.shopHideLoader();d.shopAjax=!1},success:function(a){d.shopUpdateContent(a);d.shopAjax=!1}}))},shopUpdateContent:function(a){var b=this,e=c("<div>"+a+"</div>");nm_wp_vars.shopAjaxUpdateTitle&&(a=e.find("#nm-wp-title").text(),a.length&&(document.title=a));a=e.find("#nm-shop-categories");var d=e.find("#nm-shop-widgets-ul"),e=e.find("#nm-shop-browse-wrap");if(a.length){var f=c("#nm-shop-categories");f.hasClass("fade-in")&&a.addClass("fade-in force-show");f.replaceWith(a)}d.length&&c("#nm-shop-widgets-ul").replaceWith(d);e.length&&b.$shopBrowseWrap.replaceWith(e);b.$shopBrowseWrap=c("#nm-shop-browse-wrap");b.shopLoadImages();b.shopInfLoadBound||b.infload_init();a=b.shopScrollToTop();setTimeout(function(){b.shopHideLoader()},a)}});c.nmThemeExtensions.filters=c.nmTheme.filters_init})(jQuery);