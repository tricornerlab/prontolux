<?php

$prod_id = $_GET['id'];
$sqlProdBasicInfo = "SELECT categories.cat_name, products.prod_category, products.prod_name, products.prod_description FROM categories,products WHERE categories.cat_id=products.prod_category AND products.prod_id=$prod_id";
//$sqlTest = "REPEAT SELECT categories.cat_id, categories.cat_name, categories.parent_cat_id FROM categories WHERE categories.parent_cat_id=(SELECT products.prod_category FROM products WHERE products.prod_category=categories.cat_id AND products.prod_id=$prod_id) UNTIL parent_cat_id=0";
if($queryProdBasicInfo = @mysql_query($sqlProdBasicInfo,$db_conn)){
    while($resProdBasicInfo = mysql_fetch_array($queryProdBasicInfo)){
        $category = $resProdBasicInfo['cat_name'];
        $category_id = $resProdBasicInfo['prod_category'];
        $tmp_cat_id = $category_id;
        $product = $resProdBasicInfo['prod_name'];
        $description = $resProdBasicInfo['prod_description'];
        
        while($tmp_cat_id != 0){
            $sqlCTrail = "SELECT parent_cat_id FROM categories WHERE cat_id = $tmp_cat_id";
            if($queryCTrail = @mysql_query($sqlCTrail,$db_conn) or die(mysql_error())){
                while($resCTrail = mysql_fetch_array($queryCTrail)){
                    $new_cat_id = $resCTrail['parent_cat_id'];
                    $sqlCTName = "SELECT cat_name FROM categories WHERE cat_id=$new_cat_id";
                    if($queryCTName = @mysql_query($sqlCTName,$db_conn)){
                        while($resCTName = mysql_fetch_array($queryCTName)){
                            $trail .= ' > '.$resCTName['cat_name'];
                        }
                    }  
                }
            }
            $tmp_cat_id = $resCTrail['cat_id']; 
        }
    }
}

$sqlImgsProds = "SELECT imgs_prods.img_is_main, imgs_prods.img_is_technique, images.img_link FROM imgs_prods, images WHERE imgs_prods.img_id=images.img_id AND imgs_prods.prod_id=$prod_id";

$show = '<div id="prodInfo">
<span class="belongsTo">'.$trail.' > '.$category.'</span><br />
<div id="prodHeader"><h2>'.$product.'</h2><div id="iconsDiv">';

//consulta iconos
$sqlIcons = "SELECT icons.icon_id, icons.icon_info, icons.icon_url, icons_prods.icon_value FROM icons, icons_prods WHERE icons_prods.icon_id=icons.icon_id AND icons_prods.prod_id=$prod_id ORDER BY icon_order";
if($queryIcons = @mysql_query($sqlIcons,$db_conn)){
    while($resIcons = mysql_fetch_array($queryIcons)){
        $show .= '<div id="singleIcon"><img src="admin/'.$resIcons['icon_url'].'" alt="'.$resIcons['icon_info'].'" />';
        if(strlen($resIcons['icon_value'])>0 && $resIcons['icon_value']!=''){
            $show .= '<br />'.$resIcons['icon_value'].'</div>';
        }else{
            $show .= '</div>';
        }
    }
}


$show .= '</div></div><div id="prodSpecs"><p class="descText">'.$description.'</p>';

//consulta caracteristicas
$sqlChars = "SELECT characteristics.char_name, prods_chars.char_value FROM characteristics,prods_chars WHERE characteristics.char_id=prods_chars.char_id AND prods_chars.prod_id=$prod_id ORDER BY prods_chars.char_order";
if($queryChars = @mysql_query($sqlChars,$db_conn)){
	$show .= '<p class="descText">';
    while($resChars = mysql_fetch_array($queryChars)){
        $char_name = $resChars['char_name'];
        $char_value = $resChars['char_value'];
        $show .= '<b>'.$char_name.':</b> '.$char_value.'<br />';
    }
	$show .= '</p>';
}

//tableau
include('pub_tables.php');

//consulta imagenes
$sqlImgs = "SELECT images.img_link, imgs_prods.img_is_main, imgs_prods.img_is_technique FROM images, imgs_prods WHERE imgs_prods.img_id=images.img_id AND imgs_prods.prod_id=$prod_id";
if($queryImgs = @mysql_query($sqlImgs,$db_conn)){
    while($resImgs = mysql_fetch_array($queryImgs)){
        if($resImgs['img_is_main']==1){
            $main_img = 'admin/'.$resImgs['img_link'];
        }elseif($resImgs['img_is_technique']==1){
            $tech_img = 'admin/'.$resImgs['img_link'];
        }else{
            $imgsArr[] = 'admin/'.$resImgs['img_link'];
        }
    }
    
    $show .= '<div id="prodImgsDIV">
    <img src="'.$main_img.'" class="prodDetImgs" />';

    if(sizeof($imgsArr)>0){
        foreach($imgsArr as $key=>$all_img_link){
            $show .= '<img src="'.$all_img_link.'" class="prodDetImgs" />';
        }
    }
    
    if(strlen($tech_img)>1){
        $show .= '<img src="'.$tech_img.'" class="prodDetImgs" />';    
    }
    
    if(strlen($show_table)>1){
        $show .= '<div class="prodDetTable">'.$show_table.'</div>';
        }
    $show .= '</div>';
}

$show .= '</div>
</div>';

?>