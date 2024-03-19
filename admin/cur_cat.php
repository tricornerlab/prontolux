<?php
include('db_conn.php');

if($pcat != 0 || !isset($pcat) || strlen($pcat)==0){
    $pcat = $_GET['pcat'];
}
$catLevel = $_GET['catl'];

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
   $sqlYoureHere = "SELECT cat_name FROM categories WHERE cat_id=$pcat";
    if($queryYoureHere = @mysql_query($sqlYoureHere,$db_conn)){
        while($resYoureHere = mysql_fetch_array($queryYoureHere)){
            $parent_cat_name = $resYoureHere['cat_name'];
            $toShow .= '<h4>'.$parent_cat_name.'</h4> <a href="index.php?ref=mod&go=cats&id='.$pcat.'" class="modLink">Modifier '.$parent_cat_name.'</a>   <a href="index.php?ref=del&go=cats&id='.$pcat.'" class="delLink">Effacer '.$parent_cat_name.'</a><br />';
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
            $toShow .= '<a id="'.$cat_id.'" class="catLink" href="#" onclick="showCat('.$cat_id.', '.$pcat.', '.$catLevel.', \''.$cat_name.'\')">
            <img src="'.$catImg.'" /><br />';
        }else{
            $toShow .= '<a id="'.$cat_id.'" class="catLinkLong" href="#" onclick="showCat('.$cat_id.', '.$pcat.', '.$catLevel.', \''.$cat_name.'\')">';
        }
        
        $toShow .= $cat_name.'</a>';   
    }
}

if($pcat == 0){
    $toShow .= '<a class="addCatLinkLong" href="index.php?ref=add&go=cats&pcat='.$pcat.'&lvl='.$catLevel.'">Ajouter classe</a>';
}else{
    $toShow .= '<a class="addCatLink" href="index.php?ref=add&go=cats&pcat='.$pcat.'&lvl='.$catLevel.'"><img src="images/add.jpg">Ajouter cat&eacute;gorie</a>';
}

$sqlProducts = "SELECT prod_id, prod_name, prod_description FROM products WHERE prod_category = $pcat ORDER BY prod_order, prod_id DESC";
if($queryProducts = @mysql_query($sqlProducts,$db_conn)){
    if(mysql_num_rows($queryProducts)>0){
        $toShow .= '<div class="prodsDiv">';
        $terminarDiv = true;
    }elseif(mysql_num_rows($queryProducts)==0 && $catLevel>=2){
        $toShow .= '<div class="prodsDiv">
        <a class="subCat" href="index.php?ref=add&go=prods&cat='.$pcat.'"><img src="images/add.jpg" /><div class="prod_opt_div">AJOUTER PRODUIT</div></a>
        </div>';
    }
    while($resProducts = mysql_fetch_array($queryProducts)){
        /////hacer aca el echo de los productos
        $prod_id = $resProducts['prod_id'];
        $prod_name = $resProducts['prod_name'];
        $prod_description = $resProducts['prod_description'];
        
        $sqlMainImg = "SELECT images.img_link FROM images, imgs_prods WHERE images.img_id=imgs_prods.img_id AND imgs_prods.prod_id=$prod_id AND imgs_prods.img_is_main=1";
        if($queryMainImg = @mysql_query($sqlMainImg,$db_conn)){
            if($resMainImg = mysql_fetch_array($queryMainImg)){
                $mainImg = $resMainImg['img_link'];
            }
        }
        
        //$toShow .= '<a href="index.php?ref=viewProd&id='.$prod_id.'" class="catProd"><img src="'.$mainImg.'" /><div class="prod_ech_div"><h5>'.$prod_name.'</h5><br />'.$prod_description.'</div></a>';
		$toShow .= "<a onclick=\"return popitup('index.php?ref=viewProd&id=".$prod_id."')\" class=\"catProd\"><img src=\"".$mainImg."\" /><div class=\"prod_ech_div\"><h5>".$prod_name."</h5><br />".$prod_description."</div></a>";
    }
    
    if($terminarDiv){
        $toShow .= '<a class="subCat" href="index.php?ref=add&go=prods&cat='.$pcat.'"><img src="images/add.jpg" /><div class="prod_opt_div">AJOUTER PRODUIT</div></a>';
        //cierra el div de productos que abrio si habia resultados
        $toShow .= '</div>';
    }
    
}

if($pcat == 0){
    $toShow .= '</div>';
}else{
    echo utf8_encode($toShow);
}

?>