<?php

//vino sin ningun producto, asi que hay que mostrar toda la lista de categorias y sus productos.
//se hace la consulta de categorias, se agrupan por su parent_cat. cuando se termina con la consulta de todas las de un parent_cat, se hace la consulta de los productos
//ajax: separar la consulta, poner en cada cat un link que llama a la funcion que hace la consulta por todas las hijas de esa.
//verificar si viene algun parent_cat. si no viene nada, se arranca con 0; sino, se buscan todas las hijas de la elegida.
$show = '<br />';
$pcat = $_GET['pcat'];
$act = $_GET['act'];
$startup_img = $_GET['img'];
if(strlen($pcat)==0 || $pcat==0){
    if($act=='search'){  
        $qry = $_POST['qry'];
        $sqlSrc = "SELECT products.prod_id, products.prod_name, products.prod_description FROM products WHERE (products.prod_description LIKE '%$qry%') OR (products.prod_name LIKE '%$qry%')";
        if($querySrc = @mysql_query($sqlSrc,$db_conn) or die(mysql_error())){
            if(mysql_num_rows($querySrc)>0){
                $show .= '<p>R&eacute;sultats de votre recherche</p>';
               while($resSrc = mysql_fetch_array($querySrc)){
                    $prod_id = $resSrc['prod_id'];
                    $prods[$resSrc['prod_id']] = $resSrc['prod_name'];
                    $prods_desc[$resSrc['prod_id']] = $resSrc['prod_description'];
                    
                    $sqlMainImg = "SELECT images.img_link FROM images, imgs_prods WHERE images.img_id=imgs_prods.img_id AND imgs_prods.prod_id=$prod_id AND imgs_prods.img_is_main=1";
                    if($queryMainImg = @mysql_query($sqlMainImg,$db_conn)){
                        if($resMainImg = mysql_fetch_array($queryMainImg)){
                            $mainImg[$prod_id] = $resMainImg['img_link'];
                        }
                    }
                }
                
                $sqlCharSrc = "SELECT products.prod_id, products.prod_name, products.prod_description FROM products, prods_chars WHERE products.prod_id=prods_chars.prod_id AND prods_chars.char_value LIKE '%$qry%' AND products.prod_id NOT IN (SELECT products.prod_id, products.prod_name, products.prod_description FROM products WHERE (products.prod_description LIKE '%$qry%') OR (products.prod_name LIKE '%$qry%'))";
                if($queryCharSrc = @mysql_query($sqlCharSrc,$db_conn)){
                    if(mysql_num_rows($queryCharSrc)>0){
                        while($resCharSrc = mysql_fetch_array($queryCharSrc)){
                            $prods[$resCharSrc['prod_id']] = $resCharSrc['prod_name'];
                            $prods_desc[$resCharSrc['prod_id']] = $resCharSrc['prod_description'];
                        
                            $sqlMainImg2 = "SELECT images.img_link FROM images, imgs_prods WHERE images.img_id=imgs_prods.img_id AND imgs_prods.prod_id=$prod_id AND imgs_prods.img_is_main=1";
                            if($queryMainImg2 = @mysql_query($sqlMainImg2,$db_conn)){
                                if($resMainImg2 = mysql_fetch_array($queryMainImg2)){
                                    $mainImg[$prod_id] = $resMainImg2['img_link'];
                                }
                            } 
                        }
                    }
                }
                     
                foreach($prods as $prod_id=>$prod_name){
                    $show .= '<a href="index.php?ref=viewProd&id='.$prod_id.'&img='.$startup_img.'" class="catProd"><img src="admin/'.$mainImg[$prod_id].'" /><div class="prod_ech_div"><h5>'.$prod_name.'</h5><br />'.$prods_desc[$prod_id].'</div></a>';
                }
         
            }else{
                $show .= '<p>Votre recherche n\'a donn&eacute; aucun r&eacute;sultat</p>';
            }
            
        }
        
        
    }else{
        $pcat = 0;
        include('pub_cur_cat.php');
        $show .= $toShow;
    }
}



?>