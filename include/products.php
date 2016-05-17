
   <?php 

         $num = 8; 
    $page = (int)$_GET['page'];              
    
    $count = mysql_query("SELECT COUNT(*) FROM products WHERE products_visible = '1'",$link);
    $temp = mysql_fetch_array($count);

    if ($temp[0] > 0)
    {  
    $tempcount = $temp[0];

   
    $total = (($tempcount - 1) / $num) + 1;
    $total =  intval($total);

    $page = intval($page);

    if(empty($page) or $page < 0) $page = 1;  
       
    if($page > $total) $page = $total;
     
    $start = $page * $num - $num;

    $qury_start_num = " LIMIT $start, $num"; 
    }
   

if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="index.php?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="index.php?page='.($page + 1).'">&gt;</a></li>';



if($page - 5 > 0) $page5left = '<li><a href="index.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="index.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="index.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="index.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="index.php?page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="index.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="index.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="index.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="index.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="index.php?page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pstrnav class="col-md-12 col-sm-12 col-xs-12">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
}


$products = mysql_query("SELECT * FROM `products` WHERE `products_visible` = '1' ORDER BY '$sorting' $qury_start_num", $link);

    $row_products = mysql_fetch_array($products);



    do{
        if(strlen($row_products['products_img'])> 0 && file_exists("img/product/".$row_products["products_img"])){

          $img_patch='img/product/'.$row_products["products_img"];

        }else{

            $img_patch="img/product/noimage.png";

          }
 ?>                               
         <div class="block-product-block col-md-3 col-sm-6 col-xs-8">
            <p class="title-product"><?php echo $row_products['products_name'] ?></p>
            <div class="img-product col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12" style="background: url(<?php echo $img_patch ?>)no-repeat center; background-size: 100%;"></div>
            <i class="eye fa fa-eye fa-2x col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1  col-xs-6" aria-hidden="true"></i>
            <p class="col-pros col-md-1 col-sm-2  col-xs-6"><?php echo $row_products['products_licke'] ?></p>

            <i class="fa fa-thumbs-o-up fa-2x col-md-2 col-sm-2  col-xs-6 like" aria-hidden="true"></i>
            <p class="col-pros col-md-1 col-sm-2   col-xs-6"><?php echo $row_products['products_show'] ?></p>

            <i class="star-prod fa fa-star fa-2x col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-1 col-xs-6" aria-hidden="true"></i>

            <p class="description"><?php echo $row_products['products_discription'] ?></br><a href="#">подробнее..</a></p>
            <div class="click-cart  col-md-10 col-sm-10 col-xs-10">
            <div class="price-product-t"><i class="cart cart-prod fa fa-shopping-cart fa-2x" aria-hidden="true"></i><p><?php echo $row_products['products_price'] ?><br> руб.</p></div>
                <div id="container_buttons" class="col-md-12" tid="<?php echo $row_products['products_id']?>">
                    <p class="bttn-cr col-md-12">
                        <a style="content:"1";" class="a_demo_three text" tid="<?php echo $row_products['products_id'] ?>">
                            <span> в корзину</span>
                        </a>
                      <!--<div class="psevdo1"></div>
                        <button class="col-md-2 button button--sacnite"><i class="star fa fa-2x fa-star-o" aria-hidden="true"></i><span>User</span></button>-->
                    </p>
                </div>
            </div>
             
        </div>
 <?php

}while($row_products=mysql_fetch_array($products));

if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="index.php?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="index.php?page='.($page + 1).'">&gt;</a></li>';



if($page - 5 > 0) $page5left = '<li><a href="index.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="index.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="index.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="index.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="index.php?page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="index.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="index.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="index.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="index.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="index.php?page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
}
?>