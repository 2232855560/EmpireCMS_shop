<?php
    require('../class/connect.php');
    require('../class/db_sql.php');
    require('../data/dbcache/class.php');
    if($_POST[action] == 'getmorenews'){
    $table=htmlspecialchars($_POST[table]);
    if(empty($_POST[orderby])){$orderby='newstime';}else{ $orderby=htmlspecialchars($_POST[orderby]);}
    if(empty($_POST[myorder])){$myorder='desc';}else{ $myorder='asc';}
    if(empty($_POST[limit])){$limit=6;}else{ $limit=(int)$_POST[limit];}
    if(empty($_POST[classid])){$where=null;}else{ $where='where classid in('.$_POST[classid].')';}
    if(empty($_POST[length])){$length=50;}else{ $length=(int)$_POST[length];}
    if(empty($_POST[small_length])){$small_length=500;}else{ $small_length=(int)$_POST[small_length];}
    
    // next：第几页
    // table：调用数据表
    // limit：每次调用数量
    // small_length：简介截取字符数
    // length：标题截取字符数
    // classid：调用栏目，允许多个，如1,2,3,4  特别注意，必须是调用同一数据表的栏目
    // orderby：排序，默认是newstime，传什么就按什么来排序，如 id
    // myorder：正反序，默认是asc，传值怎为desc
    $link=db_connect();
    $empire=new mysqlquery();
    $num =(int)$_POST['next'] *$limit;
     
      if($table){
            $sql=$empire->query("SELECT * FROM `".$dbtbpre."ecms_".$table."` $where order by $orderby $myorder limit $num,$limit");
     
        while($r=$empire->fetch($sql)){
     
            if($r[mtitlepic]==''){ 
                $r[mtitlepic]=$public_r[news.url]."e/data/images/notimg.gif";
            }
        $oldtitle=stripSlashes($r[title]);
        $title=sub($oldtitle,'',$length);
        $smalltext=stripSlashes($r[smalltext]);
        $smalltext=sub($smalltext,'',$small_length);
        $classname=$class_r[$r[classid]][classname];
        $newsurl=$public_r[newsurl];
        $classurl=$newsurl.$class_r[$r[classid]][classpath];
        $urls = sys_ReturnBqTitleLink($r);
     
    ?>
    <!-- 以下代码是显示列表的标签模板 -->
    <li class="hover-image-load post-253 product type-product status-publish has-post-thumbnail product_cat-interior product_tag-classic product_tag-interior product_tag-leather first instock featured shipping-taxable purchasable product-type-simple">
                                                <div class="nm-shop-loop-thumbnail nm-loader">
                                                    <a href="<?=$r[titleurl]?>">
                                                        <img src="/picture/placeholder.gif" data-src="<?=$r[titlepic]?>"
                                                        width="350" height="434" alt="product-classic-chair" class="attachment-shop-catalog unveil-image"
                                                        />
                                                        <img src="/picture/transparent.gif" data-src="<?=$r[pic1]?>"
                                                        width="350" height="434" class="attachment-shop-catalog hover-image" />
                                                    </a>
                                                </div>
                                                <div class="nm-shop-loop-details">
                                                    <div class="nm-shop-loop-wishlist-button">
                                                        <a href="#" id="nm-wishlist-item-253-button" class="nm-wishlist-button nm-wishlist-item-253-button"
                                                        data-product-id="253" title="Add to Wishlist">
                                                            <i class="nm-font nm-font-heart-o">
                                                            </i>
                                                        </a>
                                                    </div>
                                                    <h3>
                                                        <a href="<?=$r[titleurl]?>">
                                                             <?=$r[title]?>
                                                        </a>
                                                    </h3>
                                                    <div class="nm-shop-loop-after-title action-link-hide">
                                                        <div class="nm-shop-loop-price">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">
                                                                        &#36;
                                                                    </span>
                                                                     <?=$r[price]?>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div class="nm-shop-loop-actions">
                                                            <a href="<?=$r[titleurl]?>" data-product_id="253"
                                                            class="nm-quickview-btn product_type_simple">
                                                                Show more
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
     </li>

    <?php
        }
       }
    }
    db_close();
    $empire=null;
?>