<?php
//cada vez q cambia de categoria
$sqlAllProds = "SELECT prod_id, prod_name, prod_description FROM products WHERE prod_category=$tmpCatLevel ORDER BY prod_order, prod_id DESC";
if($queryAllProds = @mysql_query($sqlAllProds,$db_conn)){
    
    if(mysql_num_rows($queryAllProds)>0){
        $tiene = $tmpCatLevel;
        $show_later = '<div class="catProdsDIV">';
       while($resAllProds = mysql_fetch_array($queryAllProds)){
            $prod_id = $resAllProds['prod_id'];
            $prod_name = $resAllProds['prod_name'];
            $prod_description = $resAllProds['prod_description'];
            
            $sqlMainImg = "SELECT images.img_link FROM images, imgs_prods WHERE images.img_id=imgs_prods.img_id AND imgs_prods.prod_id=$prod_id AND imgs_prods.img_is_main=1";
            if($queryMainImg = @mysql_query($sqlMainImg,$db_conn)){
                if($resMainImg = mysql_fetch_array($queryMainImg)){
                    $mainImg = $resMainImg['img_link'];
                }
            }
            
            $show_later .= '<a href="index.php?ref=viewProd&id='.$prod_id.'" class="catProd"><img class="catProd" src="'.$mainImg.'" /><div class="prod_ech_div"><b>'.$prod_name.'</b><br />'.$prod_description.'</div></a>';
            //estoy dentro del nodo aun
        }
        
        $show_later .= '</div>';
    }
    
}

?>