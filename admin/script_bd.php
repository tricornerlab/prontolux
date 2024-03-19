<?php
include('db_conn.php');

if($getfolders = opendir('images/products/LED/')){
    while (false !== ($subfolder = readdir($getfolders))) {
            if($subfolder != '.' && $subfolder != '..'){
                $subcat_order = substr($subfolder,0,1);
                $subcat_name = substr($subfolder,2);
                $subcat_name = str_replace('_',' ',$subcat_name);
                $subcat_name = str_replace('+',' + ',$subcat_name);
                
                $sqlSubcat = "INSERT INTO categories(cat_name, cat_level, parent_cat_id, cat_order) VALUES('$subcat_name',2,3,$subcat_order)";
                if($querySubcat = @mysql_query($sqlSubcat,$db_conn)){
                    //insertar los productos para la subcat
                    $last_cat_id = mysql_insert_id($db_conn);
                    if($getproducts = opendir('images/products/LED/'.$subfolder)){
                        while (false !== ($prods = readdir($getproducts))) {
                            if($prods != '.DS_Store' && $prods != '.' && $prods != '..'){                                
                                $sans_ext = substr($prods,0,-4);
                                /*
                                if(substr($sans_ext,-4)=='_tec'){
                                    $new_name = str_replace('_tec','-tec',$prods);
                                    rename('images/products/LED/'.$subfolder.'/'.$prods,'images/products/LED/'.$subfolder.'/'.$new_name);
                                }
                                */
                                
                                if(substr($sans_ext,-4)!='-ill' && substr($sans_ext,-5)!='-ill2' && substr($sans_ext,-4)!='-tec' && substr($sans_ext,-4)!='_ill' && substr($sans_ext,-4)!='_tec'){
                                    $prod_name = $sans_ext;
                                    $prod_name = str_replace('-',' ',$prod_name);
                                    $prod_name = str_replace('_',' ',$prod_name);
                                    $sqlProd = "INSERT INTO products(prod_name, prod_category) VALUES('$prod_name',$last_cat_id)";
                                    if($queryProd = @mysql_query($sqlProd,$db_conn)){
                                      $last_prod_id = mysql_insert_id($db_conn);
                                    }
                                    
                                    $image_link = 'images/products/LED/'.$subfolder.'/'.$prods;
                                    $sqlImg = "INSERT INTO images(img_link) VALUES('$image_link')";
                                    if($queryImg = @mysql_query($sqlImg,$db_conn)){
                                      $last_img_id = mysql_insert_id($db_conn);
                                    }
                                    
                                    $sqlImgsProds = "INSERT INTO imgs_prods(prod_id, img_id, img_is_main) VALUES($last_prod_id,$last_img_id,1)";
                                    if($queryImgsProds = @mysql_query($sqlImgsProds,$db_conn)){
                                        echo 'ok <br />';
                                    }
                                }
                                
                                
                            }
                        }
                    }
                }
            }
            
        }
    closedir($getfolders);
}

?>