<?php

$prod_id = $_GET['id'];

$sqlProdBasicInfo = "SELECT categories.cat_name, products.prod_category, products.prod_name, products.prod_description FROM categories,products WHERE categories.cat_id=products.prod_category AND products.prod_id=$prod_id";

if($queryProdBasicInfo = @mysql_query($sqlProdBasicInfo,$db_conn)){
    while($resProdBasicInfo = mysql_fetch_array($queryProdBasicInfo)){
        $category = $resProdBasicInfo['cat_name'];
        $category_id = $resProdBasicInfo['prod_category'];
        $tmp_cat_id = $category_id;
        $product = $resProdBasicInfo['prod_name'];
        $description = $resProdBasicInfo['prod_description'];       
    }
}

$sqlImgsProds = "SELECT imgs_prods.img_is_main, imgs_prods.img_is_technique, images.img_link FROM imgs_prods, images WHERE imgs_prods.img_id=images.img_id AND imgs_prods.prod_id=$prod_id";

//hacer la consulta para tener el cookie trail

$show = '<div id="prodInfo">
<span class="belongsTo">'.$category.' <a class="modLink" href="index.php?ref=mod&go=prods&act=cats&pid='.$prod_id.'">(Modifier)</a></span><br />
<div id="prodHeader"><h2>'.$product.'</h2><br /><a href="index.php?ref=del&go=prods&id='.$prod_id.'" class="delLink">Effacer '.$product.'</a></div><div id="iconsDiv">';

//consulta iconos
$sqlIcons = "SELECT icons.icon_id, icons.icon_info, icons.icon_url, icons_prods.icon_value FROM icons, icons_prods WHERE icons_prods.icon_id=icons.icon_id AND icons_prods.prod_id=$prod_id ORDER BY icon_order";
if($queryIcons = @mysql_query($sqlIcons,$db_conn)){
    while($resIcons = mysql_fetch_array($queryIcons)){
        $show .= '<div id="singleIcon"><img src="'.$resIcons['icon_url'].'" alt="'.$resIcons['icon_info'].'" />';
        if(strlen($resIcons['icon_value'])>0 && $resIcons['icon_value']!=''){
            $show .= '<br />'.$resIcons['icon_value'].'</div>';
        }else{
            $show .= '</div>';
        }
    }
}

$show .= '<br /> <a href="index.php?ref=mod&go=icons&pid='.$prod_id.'" class="modLink">Modifier icones</a>';

$show .= '</div><div id="prodSpecs"><p class="descText">'.$description.'</p>
<a href="index.php?ref=mod&go=prods&id='.$prod_id.'&act=basic" class="modLink">Modifier nom ou description du produit</a><br /><br />';

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

$show .= '<a href="index.php?ref=mod&go=prods&act=chars&pid='.$prod_id.'" class="modLink">Modifier characteristiques</a><br />';

//tableau
include('tables.php');

//consulta imagenes
$sqlImgs = "SELECT images.img_id, images.img_link, imgs_prods.img_is_main, imgs_prods.img_is_technique FROM images, imgs_prods WHERE imgs_prods.img_id=images.img_id AND imgs_prods.prod_id=$prod_id";
if($queryImgs = @mysql_query($sqlImgs,$db_conn)){
    while($resImgs = mysql_fetch_array($queryImgs)){
        if($resImgs['img_is_main']==1){
            $main_img = $resImgs['img_link'];
            $main_img_id = $resImgs['img_id'];
        }elseif($resImgs['img_is_technique']==1){
            $tech_img = $resImgs['img_link'];
            $tech_img_id = $resImgs['img_id'];
        }else{
            $imgsArr[$resImgs['img_id']] = $resImgs['img_link'];
        }
    }
    
    $show .= '<div id="prodImgsDIV">';
    if(strlen($main_img)>1){
        $show .= '<div class="prodDetImgs"><img src="'.$main_img.'" /><br /><a href="index.php?ref=del&go=img&id='.$main_img_id.'" class="delLink">Effacer image principale</a><br /></div>';
    }else{
        $show .= '<a href="index.php?ref=add&go=img&pid='.$prod_id.'&type=main" class="addLink">Ajouter image principale</a><br />';
    }
    
    if(strlen($show_table)>1){
        $show .= '<div class="prodDetTable">'.$show_table.'</div>';
        }
    if(strlen($tech_img)>1){
        $show .= '<div class="prodDetImgs"><img src="'.$tech_img.'" /><br /><a href="index.php?ref=del&go=img&id='.$tech_img_id.'" class="delLink">Effacer image technique</a><br /></div>';    
    }else{
        $show .= '<a href="index.php?ref=add&go=img&pid='.$prod_id.'&type=tech" class="addLink">Ajouter image technique</a><br />';
    }
    if(sizeof($imgsArr)>0){
        foreach($imgsArr as $key=>$all_img_link){
            $show .= '<div class="prodDetImgs"><img src="'.$all_img_link.'" /><br /><a href="index.php?ref=del&go=img&id='.$key.'" class="delLink">Effacer image</a><br /></div>';
        }
    }
    
    $show .= '<a href="index.php?ref=add&go=img&pid='.$prod_id.'" class="addLink">Ajouter image</a><br />';
    $show .= '</div>';
}

$show .= '</div>
</div>';

?>