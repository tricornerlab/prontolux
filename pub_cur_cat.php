<?php
include('admin/db_conn.php');

$startup_img = $_GET['img'];

if($pcat != 0 || !isset($pcat) || strlen($pcat)==0){
    $pcat = $_GET['pcat'];
}

/*
$sqlLevel = "SELECT cat_level FROM categories WHERE parent_cat_id=$pcat";
if($queryLevel = @mysql_query($sqlLevel,$db_conn)){
    while($resLevel = mysql_fetch_array($queryLevel)){
        $cat_level = $resLevel['cat_level'];
    }
}

$toShow = '<div id="level'.$cat_level.'" class="catLevel">';
*/

if($pcat == 0){
   $toShow = '<div id="level0" class="catLevel">'; 
}else{
   $sqlYoureHere = "SELECT cat_name, cat_level FROM categories WHERE cat_id=$pcat";
    if($queryYoureHere = @mysql_query($sqlYoureHere,$db_conn)){
        while($resYoureHere = mysql_fetch_array($queryYoureHere)){
            $parent_cat_name = $resYoureHere['cat_name'];
            $cat_level = $resYoureHere['cat_level'];
            //echo $cat_level;
            if(intval($cat_level) > 0){
                $toShow .= '<h4 id="h'.$pcat.'">'.$parent_cat_name.'</h4><br />';
            }
        }
    } 
}

$sqlCategories = "SELECT * FROM categories WHERE parent_cat_id=$pcat ORDER BY cat_order, cat_id";
if($queryCategories = @mysql_query($sqlCategories,$db_conn)){
    while($resCategories = mysql_fetch_array($queryCategories)){
        $cat_id = $resCategories['cat_id'];
        $cat_name = $resCategories['cat_name'];
        $catImg = $resCategories['img_url'];
        $catLevel = $resCategories['cat_level'];
        
        if($catLevel>0){
            $toShow .= '<a id="'.$cat_id.'" class="catLink" href="#h'.$cat_id.'" onclick="showCat('.$cat_id.', '.$pcat.', '.$catLevel.', \''.$cat_name.'\')">
            <img src="admin/'.$catImg.'" /><br />';
        }else{
            $toShow .= '<a id="'.$cat_id.'" class="catLinkLong" href="#h'.$cat_id.'" onclick="showCat('.$cat_id.', '.$pcat.', '.$catLevel.', \''.$cat_name.'\')">';
        }
        
        $toShow .= $cat_name.'</a>';
        
    }
    
}

$sqlProducts = "SELECT prod_id, prod_name, prod_description FROM products WHERE prod_category = $pcat ORDER BY prod_order, prod_id DESC";
if($queryProducts = @mysql_query($sqlProducts,$db_conn)){
    if(mysql_num_rows($queryProducts)>0){
        $toShow .= '<div class="prodsDiv">';
        $terminarDiv = true;
    }
    while($resProducts = mysql_fetch_array($queryProducts)){
        /////hacer aca el echo de los productos
        $prod_id = $resProducts['prod_id'];
        $prod_name = $resProducts['prod_name'];
        $prod_description = $resProducts['prod_description'];
        
        $sqlMainImg = "SELECT images.img_link FROM images, imgs_prods WHERE images.img_id=imgs_prods.img_id AND imgs_prods.prod_id=$prod_id AND imgs_prods.img_is_main=1";
        if($queryMainImg = @mysql_query($sqlMainImg,$db_conn)){		
            if($resMainImg = mysql_fetch_array($queryMainImg)){
				if(mysql_num_rows($queryMainImg)>0 && strlen($resMainImg['img_link'])>0 && isset($resMainImg['img_link'])){
                	$mainImg = $resMainImg['img_link'];
				}else{
					$mainImg = 'images/noimg.jpg';
					}
            }
        }
        
        $toShow .= "<a onclick=\"return popitup('index.php?ref=viewProd&id=".$prod_id."&img=".$startup_img."')\" class=\"catProd\"><img src=\"admin/".$mainImg."\" /><div class=\"prod_ech_div\"><h5>".$prod_name."</h5><br />".$prod_description."</div></a>";
    }
    
    if($terminarDiv){
        $toShow .= '</div>';
    }
    
}

if($pcat == 0){
    $toShow .= '</div>';
}else{
    echo utf8_encode($toShow);
}

?>